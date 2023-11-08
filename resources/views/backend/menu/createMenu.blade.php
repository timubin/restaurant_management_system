@extends('admin.admin_master')
@section('content')

  <div class="container mt-5">
    <div class="row">
      @include('backend.management.inc.sidebar')
      <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="text-primary"><i class="fas fa-clipboard-list"></i> Create a Menu</h4>
        </div>
        <hr class="my-4">
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('management/menu') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3">
            <label for="menuName" class="form-label">Menu Name</label>
            <input type="text" placeholder="Menu...." name="name" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="menuPrice" class="form-label">Price</label>
            <input type="text" placeholder="Price...." name="price" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="menuImage" class="form-label">Image</label>
            <input type="file" placeholder="chose...." name="image" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="menuDescription" class="form-label">Description</label>
            <textarea type="text" placeholder="description...." name="description" class="form-control"></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="menuCategory" class="form-label">Category</label>
            <select name="category_id" class="form-control">
              <option value="">Select a category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary bg-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
