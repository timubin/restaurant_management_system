@extends('admin.admin_master')
@section('content')

  <div class="container mt-5">
    <div class="row">
      @include('backend.management.inc.sidebar')
      <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="text-primary"><i class="fas fa-user"></i> Edit a User</h4>
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
        <form action="{{ url('management/users/'.$user->id) }}" method="POST" >
          @csrf
          @method('PUT')
          <div class="form-group mb-3">
            <label for="name" class="form-label"> Name</label>
            <input type="text" value="{{$user->name}}" placeholder="name...." name="name" class="form-control">
          </div>

          <div class="form-group mb-3">
            <label for="email" class="form-label"> Email</label>
            <input type="text"  value="{{$user->email}}"  placeholder="Email...." name="email" class="form-control">
          </div>

          <div class="form-group mb-3">
            <label for="password" class="form-label"> Password</label>
            <input type="password" placeholder="Password...." name="password" class="form-control">
          </div>

          <div class="form-group mb-3">
            <label for="password" class="form-label"> Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{$user->role == 'admin' ? 'selected': ''}}>Admin</option>
                <option value="user" {{$user->role == 'user' ? 'selected': ''}}>User</option>
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
