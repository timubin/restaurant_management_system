@extends('admin.admin_master')
@section('content')
 <div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Main Function</a></li>
            <li class="breadcrumb-item">Report</li>
        </ol>
    </nav>
    <div class="row">
        <form action="{{url('report/show')}}" method="GET">
        <div class="col-md-6">
            <label>Choose Date for Report</label>
            <div class="form-group">
                <div class="input-group date" id="date-start" data-target-input="nearest">
                     <input type="text" name="dateStart" class="form-control datetimepicker-input" data-target="#date-start"/>
                     <div class="input-group-append" data-target="#date-start" data-toggle="datetimepicker">
                         <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                     </div>
                 </div>
        </div>


        <div class="form-group mt-2">
            <div class="input-group date" id="date-end" data-target-input="nearest">
                 <input type="text" name="dateEnd" class="form-control datetimepicker-input" data-target="#date-end"/>
                 <div class="input-group-append" data-target="#date-end" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                 </div>
             </div>
         </div>

         <input class="btn btn-primary mt-2" type="submit" value="Show Report">
        </div>
        </form>
   


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       
        <script type="text/javascript">
           $(function () {
               $('#date-start').datetimepicker({
                   format:'L'
               });
               $('#date-end').datetimepicker({
                   format:'L',
                   useCurrent: false
               });
               $("#date-start").on("change.datetimepicker", function (e) {
                   $('#date-end').datetimepicker('minDate', e.date);
               });
               $("#date-end").on("change.datetimepicker", function (e) {
                   $('#date-start').datetimepicker('maxDate', e.date);
               });
           });
       </script>
 </div>
 @endsection

