<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
{{--     <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a> --}}
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <a href="{{url('/dashboard')}}" class="nav-link">
            <i class="fas fa-tachometer-alt  me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Deshboard</span>
        </a>


        @if(Auth::user()->checkAdmin())
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Management</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{url('management/categories')}}" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Category</h6>
                            
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="{{url('management/menu')}}" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Menu</h6>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="{{url('management/table')}}" class="dropdown-item">
                    <div class="d-flex align-items-center">

                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Table</h6>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="{{url('management/table')}}" class="dropdown-item">
                    <div class="d-flex align-items-center">

                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">User</h6>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
          
            </div>
        </div>


@endif


        <a href="{{url('/cashier')}}" class="nav-link ">
            <i class="fas fa-money-bill-wave me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Cashier</span>
        </a>
        @if(Auth::user()->checkAdmin())
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-chart-line me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Report</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{url('/report')}}" class="dropdown-item">
                    <h6 class="fw-normal mb-0">All Report</h6>
                  
                </a>
                <hr class="dropdown-divider">
            </div>
        </div>
        @endif
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ Auth::user()->profile_photo_url }} " alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{url('user/profile')}}" class="dropdown-item">My Profile</a>
               
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button href="#" class="dropdown-item" type="submit">Logout</button>
                </form>

               
            </div>
        </div>
    </div>
</nav>