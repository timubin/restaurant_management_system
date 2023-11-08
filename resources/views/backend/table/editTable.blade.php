@extends('admin.admin_master')
@section('content')

    <div class="container mt-5">
      <div class="row">
        @include('backend.management.inc.sidebar')
        <div class="col-md-8">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-chair"></i> Edit a Menu</h2>
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
          <form action="{{ url('management/table/' . $table->id) }} }}" method="POST"> 
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="TableName">Table Name</label>
              <input type="text" placeholder="Table Update" name="name" value="{{ old('name', $table->name) }}" class="form-control mt-2">
            </div>
            <button type="submit" class="btn btn-primary bg-primary mt-3">Update</button>
          </form>
        </div>
      </div>
    </div>
@endsection




