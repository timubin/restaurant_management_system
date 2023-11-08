@extends('admin.admin_master')
@section('content')

    <div class="container mt-5">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <button class="btn btn-primary  btn-block" id="btn-show-tables">View All Table</button>
                <div id="selected-table"></div>
                <div id="order-detail"></div>
            </div>
            <div class="col-md-7">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $category)
                            <a href="#" class="nav-item nav-link" data-id="{{ $category->id }}" data-toggle="tab">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <div id="list-menu" class="row mt-2"></div>
            </div>



        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="totalAmount"></h3>
          <div class="col-md-12 my-3">
            <h4 class="changeAmount"></h4>
           </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">৳</span>
            </div>
            <input type="number" id="recieved-amount" class="form-control">
          </div>
          <div class="row">
            <div class="form-group">
                <label for="payment">Payment Type</label>
                <select name="form-control" id="payment-type">
                    <option value="cash">Cash</option>
                    <option value="cread card">Credit Card</option>
                </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-save-payment" disabled >Save Payment</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
$(document).ready(function() {
    //make table-detail hidden 
    $("#table-detail").hide();

    //show all table when a client click on the button
    $("#btn-show-tables").click(function() {
        if($("#table-detail").is(":hidden")) {
            $.ajax({
                url: "{{ url('/cashier/getTable') }}",
                method: "GET",
                success: function(response) {
                    $("#table-detail").html(response);
                    $("#table-detail").slideDown('fast');
                    $("#btn-show-tables").html("Hide Tables").removeClass('btn-primary').addClass('btn-danger');
                }
            });
        } else {
            $("#table-detail").slideUp('fast');
            $("#btn-show-tables").html("View All Table").removeClass('btn-danger').addClass('btn-primary');
        }
    });

    //load menu items based on selected category
    $("#nav-tab a").click(function() {
        var category_id = $(this).data("id");
        $.ajax({
            url: "{{ url('/cashier/getMenuByCategory') }}/" + category_id,
            method: "GET",
            success: function(response) {
                $("#list-menu").html(response);
            }
        });
    });

    // detect button table onclick to show table data 
    var SELECTED_TABLE_ID ="";
    var SELECTED_TABLE_NAME = "";
    var SALE_ID =""
    $("#table-detail").on("click", ".btn-table",function(){
        SELECTED_TABLE_ID = $(this).data("id");
        SELECTED_TABLE_NAME = $(this).data("name");
        $("#selected-table").html('<br><h3>Table: '+SELECTED_TABLE_NAME+'</h3><hr>');
      
        $.ajax({
    url: "{{url('/cashier/getSaleDetailsByTable')}}/" + SELECTED_TABLE_ID,
    method: "GET",
    success: function(data) {
        $("#order-detail").html(data);
    },
    error: function(xhr, status, error) {
        console.log("Error: " + error);
    }
});
    
    });

    $("#list-menu").on("click", ".btn-menu", function(){
        if(SELECTED_TABLE_ID==""){
            alert("Your need to select a table for the coustomer first")
        }else{
            var menu_id = $(this).data("id");
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    "menu_id":menu_id,
                    "table_id": SELECTED_TABLE_ID,
                    "table_name": SELECTED_TABLE_NAME,
                    "quantity": 1
                } ,
                url: "{{ url('/cashier/orderFood') }}",
                success: function(data){
                    $("#order-detail").html(data)
                }
            });
        }
    });

    $("#order-detail").on('click',".btn-confirm-order",function(){
        var SaleID = $(this).data("id");
        $.ajax({
            type: "POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                "sale_id": SaleID
            },
            url: "{{ url('/cashier/confirmOrderStatus') }}",
            success: function(data){
                $("#order-detail").html(data);
            }
        })

    });

    //delete saledetail
    $("#order-detail").on("click", ".btn-delete-saledetail", function(){
        var saleDetailId = $(this).data("id");
        $.ajax({
            type: "POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                "saleDetail_id": saleDetailId
            },
            url: "{{ url('/cashier/deleteSaleDetail') }}",
            success: function(data){
                $("#order-detail").html(data);
            }
        })
    });

    //when a user click on the payment button 
    $("#order-detail").on("click", ".btn-payment", function(){
        var totalAmount = $(this).attr('data-totalAmount');
        $(".totalAmount").html("Total Amount " + " ৳ " + totalAmount);
        $("#recieved-amount").val('');
        $(".changeAmount").html('');
        SALE_ID = $(this).data('id');
    });

    // calcuate change 
    $("#recieved-amount").keyup(function(){
        var totalAmount = $(".btn-payment").attr('data-totalAmount');
        var recievedAmount = $(this).val();
        var changeAmount = recievedAmount - totalAmount;
        $(".changeAmount").html("Total Change :  ৳" + changeAmount);
  
      // check if cashier enter the right amount, then enable or disable  save payment btn 

      if(changeAmount >= 0){
      $('.btn-save-payment').prop('disabled', false);
    }else{
      $('.btn-save-payment').prop('disabled', true);
    }
    });

    // save payment 

    $('.btn-save-payment').click(function(){
        var recievedAmount = $("#recieved-amount").val();
        var paymentType = $("#payment-type").val();
        var saleId =SALE_ID;
        $.ajax({
            type: "POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                "saleID": saleId,
                "recievedAmount" : recievedAmount,
                "paymentType":paymentType
            },
            url: "{{ url('/cashier/savePayment') }}",
            success: function(data){
                window.location.href =data;
            }
        })
    })
});



    </script>
    @endsection
    
