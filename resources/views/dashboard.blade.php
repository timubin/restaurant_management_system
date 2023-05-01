
@extends('admin.admin_master')

@section('content')

<style>
    .card {
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
}
.card img{
  width: 100px;
  height: 100px;
  margin: auto;
  padding-top: 10px;
}
.card:hover {
  transform: translateY(-5px);
}

.card-img-top {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 0;
}

.card-title a {
  text-decoration: none;
}

.card-title a:hover {
  text-decoration: underline;
}
</style>

   <div class="container mt-5">
    <div class="row">
        <div class="card-title text-center">
            <h2 class="py-3 ">Eurosia Restaurant</h2>
        </div>



        <div class="col-md-4 mb-4  text-center">

          @if(Auth::user()->checkAdmin())
            <div class="card h-100">
              <a href="{{ route('categories.index')}}">
                <img  width="100px" height="120px" src="{{asset('backend/image/management.png')}}" class="card-img-top" alt="Management">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="{{route('categories.index') }}" class="text-dark">Management</a></h5>
              </div>
            </div>
            @endif
          </div>

        <div class="col-md-4 mb-4 text-center">
            <div class="card h-100">
              <a href="{{url('/cashier')}}">
                <img width="100px" height="120px" src="{{asset('backend/image/cashier.png')}}" class="card-img-top" alt="Cashier">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="{{url('/cashier')}}" class="text-dark">Cashier</a></h5>
              </div>
            </div>
          </div>

        <div class="col-md-4 mb-4  text-center">
          @if(Auth::user()->checkAdmin())
            <div class="card h-100">
              <a href="/report">
                <img width="100px" height="120px" src="{{asset('backend/image/report.png')}}" class="card-img-top" alt="Report">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="/report" class="text-dark">Report</a></h5>
              </div>
            </div>
            @endif
          </div>

        <div class="col-md-4 mb-4  text-center">
          
            <div class="card h-100">
              <a href="{{url('/logout')}}">
                <img width="100px" height="120px" src="{{asset('backend/image/report.png')}}" class="card-img-top" alt="Report">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="/report" class="text-dark">Log Out</a></h5>
              </div>
            </div>
          </div>
        
    </div>
   </div>


@endsection