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
              <h4 class="text-primary"><i class="fas fa-clipboard-list"></i> Menu</h4>
              <a href="{{url('management/menu/create')}}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Create Menu</a>
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
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Description</th>
                  <th scope="col">Category</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
             @foreach ($menus as $menu)
                 <tr>
                  <td>{{$menu->id}}</td>
                  <td>{{$menu->name}}</td>
                  <td>{{$menu->price}}</td>
                  <td>
                  <img src="{{asset('menu_images')}}/{{$menu->image}}" alt="{{$menu->name}}" width="120px" height="120px" class="img-thumbnail">
                  </td>
                  <td>{{$menu->description}}</td>
                  <td>{{$menu->category ? $menu->category->name : 'No Category'}}</td>
                  <td><a href="{{url('management/menu/'.$menu->id.'/edit')}}" class="btn btn-warning">Edit</a></td>

                  <td>
                    <form action="{{url('management/menu/'.$menu->id)}}" method="post">
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