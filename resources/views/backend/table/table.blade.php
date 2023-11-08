@extends('admin.admin_master')
@section('content')

  <div class="container mt-5">
   <div class="row">
     @include('backend.management.inc.sidebar')
     <div class="col-md-8">
       <div class="d-flex justify-content-between align-items-center">
         <h4 class="text-primary"><i class="fas fa-utensils"></i> Table</h4>
         <a href="{{url('management/table/create')}}" class="btn btn-success btn-sm"><i class="fas fa-chair"></i> Create a Table</a>
       </div>
       <hr class="my-4">

       @if(Session()->has('status'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{Session()->get('status')}}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
       </div>
       @endif


       <table class="table table-bordered">
         <thead>
           <tr>
             <th scope="col">ID</th>
             <th scope="col">Table</th>
             <th scope="col">Status</th>
             <th scope="col">Edit</th>
             <th scope="col">Delete</th>
           </tr>
         </thead>
         <tbody>
          @foreach ($tables as $table)
              <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->name}}</td>
                <td>{{$table->status}}</td>
                <td><a href="{{url('management/table/'.$table->id.'/edit')}}" class="btn btn-warning">Edit</a></td>
                <td>
                  <form action="{{url('management/table/'.$table->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                  </form>
                </td>
              </tr>
          @endforeach
         </tbody>
       </table>

     </div>
     
   </div>
  </div>
@endsection
