<?php

namespace App\Http\Controllers\Cashier;

use App\Models\Menu;
use App\Models\Sale;
use App\Models\Table;
use App\Models\Category;
use App\Models\SaleDatail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    //first page of cashier 
    public function index(){
        $categories = Category::all();
        return view('backend.cashier.index',compact('categories'));
    }

    public function getTables(){
        $tables = Table::all();
        $html = '<ul class="list-unstyled">';
        foreach($tables as $table){
            $html .= '<li class="mb-4">';
            $html .= '<button class="btn btn-primary btn-table" data-id="'.$table->id.'" data-name="'.$table->name.'">';
            $html .= '<img class="img-fluid mr-2" src="' . url('/backend/image/table.png') . '" alt="Table Image" style="width: 50px; height: 50px; object-fit: cover; padding: 5px; border-radius: 50%; background-color: #fff; box-shadow: 0 0 5px rgba(0,0,0,0.3);">';
            if($table->status == "available"){
                $html .= '<span class="badge bg-success">'.$table->name.'</span>';
            }else{ // a table is not available
                $html .= '<span class="badge bg-danger">'.$table->name.'</span>';
            }
            $html .= '</button>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }



  


    

    public function getMenuByCategory($category_id){
        $menus = Menu::where('category_id',$category_id)->get();
        $html = '';
        foreach($menus as $menu){
            $html .= '
            <div class="col-md-3 text-center">
            <a class="btn btn-outline-secondary btn-menu" data-id="'.$menu->id.'">
            <img class=" img-fluid" src="'.url('/menu_images/'.$menu->image).'">
            <br>
            '.$menu->name.'
            <br>
            $'.number_format($menu->price).'
            </a>
            </div>
            ';
        }
        return $html;
    }
    
    public function orderFood(Request $request){
        $menu = Menu::find($request->menu_id);
        $table_id = $request->table_id;
        $table_name = $request->table_name;
        $sale = Sale::where('table_id', $table_id)->where('sale_status','unpaid')->first();
        // if there is no sale for the selected table, create a new sale record
        if(!$sale){
            $user = Auth::user();
            $sale = new Sale();
            $sale->table_id = $table_id;
            $sale->table_name = $table_name;
            $sale->user_id = $user->id;
            $sale->user_name = $user->name;
            $sale->save();
            $sale_id = $sale->id;
            // update table status
            $table = Table::find($table_id);
            $table->status = "unavailable";
            $table->save();
        }else{ // if there is a sale on the selected table
            $sale_id = $sale->id;
        }

        // add ordered menu to the sale_details table
        $saleDetail = new SaleDatail();
        $saleDetail->sale_id = $sale_id;
        $saleDetail->menu_id = $menu->id;
        $saleDetail->menu_name = $menu->name;
        $saleDetail->menu_price = $menu->price;
        $saleDetail->quantity = $request->quantity;
        $saleDetail->save();
        //update total price in the sales table
        $sale->total_price = $sale->total_price + ($request->quantity * $menu->price);
        $sale->save();



        $html = $this->getSaleDetails($sale_id);
        return $html; //testing 
    }
    public function getSaleDetailsByTable($table_id){
        $sale = Sale::where('table_id', $table_id)->where('sale_status','unpaid')->first();
        $html = '';
        if($sale){
            $sale_id = $sale->id;
            $html .= $this->getSaleDetails($sale_id);
        }else{
            $html .= "Not Found Any Sale Details for the Selected Table";
        }
        return $html;
        
    }


    private function getSaleDetails($sale_id){

                //list all saledetail 
                $html = '<p>Sale ID:'.$sale_id.'</p>';
                $saleDetails = SaleDatail::where('sale_id', $sale_id)->get();
                $html .= '<div class="table-responsive-md" style="overflow-y:scroll; height:400px; border:1px solid #343A40">
                <table class="table table-stripped table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>';
                $showBtnPayment = true;
                foreach($saleDetails as $saleDetail){
                  
                    $decreaseButton= '<button class="btn btn-danger btn-sm btn-decrease-quantity" disabled> - </button>';
                    if($saleDetail->quantity >1 ){
                        $decreaseButton = '<button data-id="'.$saleDetail->id.'" class="btn btn-danger btn-sm btn-decrease-quantity"> - </button>';
                    }

                    $html .= '
                    <tr>
                        <td>'.$saleDetail->menu_id.'</td>
                        <td>'.$saleDetail->menu_name.'</td>
                        <td> '.$decreaseButton. ' ' .$saleDetail->quantity.'<button data-id="'.$saleDetail->id.'" class="btn btn-primary btn-sm btn-increase-quantity">+</button> </td>
                        <td>'.$saleDetail->menu_price.'</td>
                        <td>'.($saleDetail->menu_price * $saleDetail->quantity).'</td>';
                        if($saleDetail->status == "noConfirm"){
                            $showBtnPayment = false;
                            $html .= '<td><a data-id="'.$saleDetail->id.'" class="btn btn-danger btn-delete-saledetail"> Trash <i class="far fa-trash-alt"></i></a></td>';
                        }else{ //status == "confirm"
                            $html .= '<td>Check <i class="fas fa-check"></i></td>';     
                        }
                        $html .= '</tr>';
                }
               $html .='</tbody></table></div>';
                $sale = Sale::find($sale_id);
                $html .= '<hr>';
                $html .= '<h3>Total Amount: &#2547; '.number_format($sale->total_price).' </h3>';
                if($showBtnPayment){
                    $html .= '<button data-id="'.$sale_id.'" data-totalAmount="'.$sale->total_price.'" class="btn btn-success btn-block btn-payment" data-toggle="modal" data-target="#exampleModal">Payment</button>';
                }else{
                    $html .= '<button data-id="'.$sale_id.'" class="btn btn-warning btn-block btn-confirm-order">Confirm Order</button>';
                }
                
               return $html;
    }


 public function increaseQuantity(Request $request){
    $saleDetail_id = $request->saleDetail_id;
    $saleDetail = SaleDatail::where('id',$saleDetail_id)->first();
    $saleDetail -> quantity = $saleDetail->quantity + 1;
    $saleDetail->save();

    //update total amoutn
    $sale = Sale::where('id', $saleDetail->sale_id)->first();
    $sale->total_price =  $sale->total_price + $saleDetail->menu_price;
    $sale->save();
    $html = $this->getSaleDetails($saleDetail->sale_id);

    return $html;
 }
 public function decreaseQuantity(Request $request){
    $saleDetail_id = $request->saleDetail_id;
    $saleDetail = SaleDatail::where('id',$saleDetail_id)->first();
    $saleDetail -> quantity = $saleDetail->quantity - 1;
    $saleDetail->save();

    //update total amoutn
    $sale = Sale::where('id', $saleDetail->sale_id)->first();
    $sale->total_price =  $sale->total_price - $saleDetail->menu_price;
    $sale->save();
    $html = $this->getSaleDetails($saleDetail->sale_id);

    return $html;
 }



    public function confirmOrderStatus(Request $request){
        $sale_id = $request->sale_id;
        $saleDetails = SaleDatail::where('sale_id', $sale_id)->update(['status'=>'confirm']);
        $html =$this->getSaleDetails($sale_id);
        return $html;

    }

    public function deleteSaleDetail(Request $request){
        $saleDetail_id = $request->saleDetail_id;
        $saleDetail= SaleDatail::find($saleDetail_id);
        $sale_id = $saleDetail->sale_id;
        $menu_price = ($saleDetail->menu_price * $saleDetail->quantity);
        $saleDetail->delete();
        // update total price 

        $sale = Sale::find($sale_id);
        $sale->total_price = $sale->total_price - $menu_price;
        $sale->save();
        //check if there any saledetail having the sale id
        $saleDetails = SaleDatail::where('sale_id', $sale_id)->first();
        if($saleDetail){
            $html = $this->getSaleDetails($sale_id);
        }else{
            $html .= "Not Found Any Sale Details for the Selected Table";
        }

        return $html;
    }


    // pamyent  option add 
    
    public function savePayment(Request $request){
        $saleID = $request->saleID;
        $recievedAmount = $request->recievedAmount;
        $paymentType = $request->paymentType;
        //update sale information in the sales table by using sale model

        $sale = Sale::find($saleID);
        $sale->total_recieved = $recievedAmount;
        $sale->change = $recievedAmount - $sale->total_price;
        $sale->payment_type = $paymentType;
        $sale->sale_status = "paid";
        $sale->save();
        //update table to be available

        $table =Table::find($sale->table_id);
        $table->status = "available";
        $table->save();
        return "/cashier/showReceipt/".$saleID;
        
    }

    public function showReceipt($saleID){
        $sale = Sale::find($saleID);
        $saleDetails = SaleDatail::where('sale_id', $saleID)->get();
        return view('backend.cashier.showReceipt', [
            'sale' => $sale,
            'saleDetails' => $saleDetails
        ]);
    }
    
}