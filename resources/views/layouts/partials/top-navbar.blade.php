<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                @if (isset($searchUrl))
                    <form class="form-inline" action="{{ route('' . $searchUrl . '') }}" method="GET">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="search" type="text"
                                placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>

                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-header">
                User Details
            </div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="far fa-user-circle mr-2"></i> {{ Auth::user()->username }}
            </a>
            <a href="#" class="dropdown-item">
                <i class="far fa-envelope mr-2"></i> {{ Auth::user()->email }}
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout.perform') }}" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
            <div class="dropdown-divider"></div>
        </div>
    </li>



    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li>

    </ul>
</nav>
