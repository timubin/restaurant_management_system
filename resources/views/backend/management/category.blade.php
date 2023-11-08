@extends('admin.admin_master')
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...">
   
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
              <h4 class="text-primary"><i class="fas fa-utensils"></i> Category</h4>
              <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Create Category</a>
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
                  <th scope="col">Category</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->name}}</td>
                  <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                </td>
                
                  <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger bg-danger">Delete</button>
                     
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$categories->links(('vendor.pagination.custom'))}}


          </div>
          
        </div>
       </div>

       <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      axios.get('/api/categories')
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

  const deleteCategory = (categoryId) => {
  axios.delete(`/api/categories/${categoryId}`)
    .then(response => {
      console.log(response.data);
      // reload the page to update the category list
      location.reload();
    })
    .catch(error => {
      console.error(error);
    });
};

const handleSubmit = (event) => {
  event.preventDefault();
  const categoryId = event.target.dataset.categoryId;
  deleteCategory(categoryId);
};
    </script>
  </body>
</html>


@endsection
