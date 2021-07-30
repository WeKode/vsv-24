<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item ">
            <a href="{{route('admin.dashboard')}}" data-link="/admin/dashboard"
               class="nav-link {{request()->routeIs('admin.dashboard*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('labels.dashboard')}}
                </p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.brands.index')}}" data-link="/admin/brands"
               class="nav-link {{request()->routeIs('admin.brands*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans_choice('brand', 3)}}
                </p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.attributes.index')}}" data-link="/admin/attributes"
               class="nav-link {{request()->routeIs('admin.attributes*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans_choice('attribute', 3)}}
                </p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.products.index')}}" data-link="/admin/products"
               class="nav-link {{request()->routeIs('admin.products*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{trans_choice('product', 3)}}
                </p>
            </a>
        </li>

        <li class="nav-item @if(request()->is(['admin/admins*','admin/users*'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <p>
                    {{trans_choice('labels.accounts',1)}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.admins.index')}}"
                       class="nav-link {{request()->routeIs('admin.admins*') ? 'active' : ''}}"
                       data-link="/admin/admins">
                        <i class="fas fa-users-cog"></i>
                        <p>{{trans_choice('labels.admin',3)}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-link="/admin/users"
                       class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>{{trans_choice('labels.user',2)}}</p>
                    </a>
                </li>
            </ul>
        </li>


        {{--        <li class="nav-header">EXAMPLES</li>--}}

    </ul>
</nav>
