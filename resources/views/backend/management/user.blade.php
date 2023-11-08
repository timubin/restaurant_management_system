@extends('admin.admin_master')
@section('content')
<div class="container mt-5">
    <div class="row">
      @include('backend.management.inc.sidebar')
      <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="text-primary"><i class="fas fa-users"></i> User</h2>
          <a href="#" class="btn btn-success btn-sm"><i class="fas fa-users"></i> Create User</a>
        </div>
        <hr class="my-4">
      </div>
      
    </div>
   </div>







   @extends('admin.admin_master')
   @section('content')
   
    <style>
   /*       body {
           background-color: #f8f9fa;
         } */
         
         .list-group-item {
           background-color: #fff;
           color: #495057;
           border: none;
           border-radius: 0;
           margin-bottom: 1px;
         }
         
         .list-group-item:hover {
           background-color: #e9ecef;
         }
         
         .list-group-item i {
           margin-right: 10px;
         }
       </style>
     </head>
     <body>
   
   
          <div class="container mt-5">
           <div class="row">
             @include('backend.management.inc.sidebar')
             <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-primary"><i class="fas fa-users"></i> User</h2>
                    <a href="{{url('management/users/create')}}" class="btn btn-success btn-sm"><i class="fas fa-users"></i> Create User</a>
                  </div>
               <hr class="my-4">
   
               @if(Session()->has('status'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{Session()->get('status')}}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
               
   
   
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Name</th>
                     <th scope="col">Role</th>
                     <th scope="col">Email</th>
                     <th scope="col">Edit</th>
                     <th scope="col">Delete</th>
                   </tr>
                 </thead>
                 <tbody>
                @foreach ($users as $user)
                    <tr>
                     <td>{{$user->id}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->role}}</td>
                     <td>{{$user->email}}</td>
                    
                     <td><a href="{{url('management/users/'.$user->id.'/edit')}}" class="btn btn-warning">Edit</a></td>
   
                     <td>
                       <form action="{{url('management/users/'.$user->id)}}" method="post">
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





@endsection