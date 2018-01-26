<div class="sidebar-panel">
    <div class="brand text-center p-t-1">
        <h3>RhinoIO.v1</h3>
    </div>
    <div class="nav-profile dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <div class="user-image">
                <img src="{{ asset('images/avatar.jpg') }}" class="avatar img-circle" alt="user" title="user"/>
            </div>
            <div class="user-info expanding-hidden">
                {{ $user->first_name }} {{ $user->last_name }}
                <small class="bold capitalize">{{ $user->role }}</small>
            </div>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:;">Your Profile</a>
            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
        </div>
    </div>
    <!-- main navigation -->
    <nav>
        <p class="nav-title">NAVIGATION</p>
        <ul class="nav">
            <!-- dashboard -->
            <li>
                <a href="{{ url('dashboard') }}">
                    <i class="material-icons text-primary">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- /dashboard -->
            <!-- apps -->
            <li>
                <a href="javascript:;">
                    <span class="menu-caret">
                        <i class="material-icons">arrow_drop_down</i>
                    </span>
                    <i class="material-icons text-success">weekends</i>
                    <span>Products</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ url('products') }}">
                            <span>All Products</span>
                            <li><a href="{{ url('products/create') }}"><span>Create Product</span></a></li>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        
        <p class="nav-title">ADMINISTRATION</p>
        <ul class="nav">
            <!-- maps -->
            <li>
                <a href="javascript:;">
                    <span class="menu-caret">
                        <i class="material-icons">arrow_drop_down</i>
                    </span>
                    <i class="material-icons">face</i>
                    <span>Users</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ url('users') }}"><span>All Users</span></a></li>
                    <li><a href="{{ url('users/create') }}"><span>Create User</span></a></li>
                </ul>
            </li>
            
            <li>
                <a href="javascript:;">
                    <span class="menu-caret">
                        <i class="material-icons">arrow_drop_down</i>
                    </span>
                    <i class="material-icons">view_module</i>
                    <span>Variations</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ url('variations/attributes') }}"><span>Variation Attributes</span></a></li>
                    <li><a href="{{ url('variations/options') }}"><span>Variation Options</span></a></li>
                </ul>
            </li>

            <li>
                <a href="#" target="_blank">
                    <i class="material-icons">local_library</i>
                    <span>Documentation</span>
                </a>
            </li>
        </ul>
    </nav>
</div>