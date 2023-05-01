@extends('admin.admin_master')
@section('content')

    <div class="container mt-5">
      <div class="row">
        @include('backend.management.inc.sidebar')
        <div class="col-md-8">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-chair"></i> Create a Table</h2>
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
          <form action="{{ url('management/table') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="tableName">Table Name</label>
              <input type="text" placeholder="Table...." name="name" class="form-control mt-2">
            </div>
            <button type="submit" class="btn btn-primary bg-primary mt-3">Save</button>
          </form>
        </div>
      </div>
    </div>
@endsection


