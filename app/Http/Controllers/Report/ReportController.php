<?php

namespace App\Http\Controllers\Report;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(){
        return view('backend.report.index');
    }

/*     public function show(Request $request){
        $request->validate([
            'dateStart' => 'required',
            'dateEnd' => 'required'
        ]);
        $dateStart = date("Y-m-d H:i:s", strtotime($request->dateStart.' 00:00:00'));
        $dateEnd = date("Y-m-d H:i:s", strtotime($request->dateEnd.' 23:59:59'));
        $sales = Sale::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid');
        return view('backend.report.showReport')->with('dateStart', date("m/d/Y H:i:s", strtotime($request->dateStart.' 00:00:00')))->with('dateEnd', date("m/d/Y H:i:s", strtotime($request->dateEnd.' 23:59:59')))->with('totalSale', $sales->sum('total_price'))->with('sales', $sales->paginate(5));
    } */


/*     public function show(Request $request){
        $request->validate([
            'dateStart' => 'required',
            'dateEnd' => 'required'
        ]);
        $dateStart = date("Y-m-d H:i:s", strtotime($request->dateStart.' 00:00:00'));
        $dateEnd = date("Y-m-d H:i:s", strtotime($request->dateEnd.' 23:59:59'));
        $sales = Sale::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid')->get();
        $totalSale = $sales->sum('total_price');
        $sales = Sale::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid')->paginate(5);
        return view('backend.report.showReport', compact('dateStart', 'dateEnd', 'totalSale', 'sales'));
    } */
    
    public function show(Request $request){
        $request->validate([
            'dateStart' => 'required',
            'dateEnd' => 'required'
        ]);
        $dateStart = date("Y-m-d H:i:s", strtotime($request->dateStart.' 00:00:00'));
        $dateEnd = date("Y-m-d H:i:s", strtotime($request->dateEnd.' 23:59:59'));
        $sales = Sale::whereBetween('updated_at', [$dateStart, $dateEnd])->where('sale_status','paid');
        return view('backend.report.showReport')->with('dateStart', date("m/d/Y H:i:s", strtotime($request->dateStart.' 00:00:00')))->with('dateEnd', date("m/d/Y H:i:s", strtotime($request->dateEnd.' 23:59:59')))->with('totalSale', $sales->sum('total_price'))->with('sales', $sales->paginate(5));
    }


    public function export(Request $request){
        return Excel::download(new SaleReportExport($request->dateStart, $request->dateEnd), 'saleReport.xlsx');
    }





    
}
