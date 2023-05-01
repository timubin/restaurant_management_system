<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restuarnt App - Receipt - SaleID : {{$sale->id}}</title>
    <link rel="stylesheet" href="{{asset('/css/receipt.css')}}">
</head>
<body>
    <div id="wrapper">
        <div id="receipt-header">
            <h3 id="resturant-name">Eurosai Restuarnt </h3>
            <p>Eurosia,147/1/A, Mirpur DOHS Link Road [Middle of ECB Circle & Mirpur DOHS], Dhaka-1206, Bangladesh </p>
            <p>Mobile: +8801709371525, +8801711408724</p>
            <p>Reference Receipt: <strong>{{$sale->id}}</strong></p>
        </div>
        <div id="receipt-body">
            <div class="tb-sale-detail">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            
                        
                        @foreach ($saleDetails as $key => $saleDetail)
                        <tr>
                            <td width='30'>{{ $key + 1 }}</td>
                            <td width='180'>{{$saleDetail->menu_name}}</td>
                            <td width='50'>{{$saleDetail->quantity}}</td>
                            <td width='55'>{{$saleDetail->menu_price}}</td>
                            <td width='65'>{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="tb-sale-total">
                    <tbody>
                        <tr>
                            <td>Total Quantity</td>
                            <td>{{$saleDetail->count()}}</td>
                            <td>Total</td>
                            <td>৳ {{number_format($sale->total_price, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Payment Type</td>
                            <td colspan="2">{{$sale->payment_type}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Paid Amount</td>
                            <td colspan="2">৳ {{number_format($sale->total_price, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Change</td>
                            <td colspan="2">৳ {{number_format($sale->change, 2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <div id="receipt-footer">
            <p>Thank You !!!</p>
        </div>
        <div id="button">
            <a href="{{url('/cashier')}}">
                <button class="btn btn-black"> 
                    Back to Cashier 
                </button>
            </a>
            <button class="btn btn-print" type="button" onclick="window.print(); return false;"> 
               Print 
            </button>
        </div>
    </div>
</body>
</html>