<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link nav-ite" href="{{ route('admin.staffs.index') }}">
                            <i class="fa-solid fa-users me-2"></i>Staffs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item">
                            <i class="fa-solid fa-user-friends me-2"></i>Users
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item">
                            <i class="fa-solid fa-comments me-2"></i>Reports
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-item">
                            <i class="fa-solid fa-shopping-basket me-2"></i>Complaints
                        </a>
                    </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-circle me-2"></i> Hi, {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item nav-item" href="{{ route('admin.profile.edit') }}">
                                <i class="fa-solid fa-user-edit me-2"></i>Edit Profile
                            </a>
                        </li>
                        
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.password.edit') }}">
                                <i class="fa-solid fa-asterisk me-2"></i>Change Password
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-link-dropdown-item">
                                       <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout
                                    </button>
                                </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>