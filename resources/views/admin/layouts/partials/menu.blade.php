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
        <li class="nav-item @if(request()->is(['admin/admins*','admin/users*'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-circle"></i>
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
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{trans_choice('labels.user',2)}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(request()->is(['admin/attribute*'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                    {{trans_choice('labels.attribute',3)}} && {{trans_choice('labels.value',3)}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.attributes.index')}}"
                       class="nav-link {{request()->routeIs('admin.attributes*') ? 'active' : ''}}"
                       data-link="/admin/attributes">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>{{trans_choice('labels.admin',3)}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.attribute-values.index')}}" {{request()->routeIs('admin.attributes*') ? 'active' : ''}}
                       data-link="/admin/attribute-values"
                       class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>{{trans_choice('labels.value',2)}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item ">
            <a href="{{route('admin.brands.index')}}" data-link="/admin/brands"
               class="nav-link {{request()->routeIs('admin.brands*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-bold"></i>
                <p>
                    {{trans_choice('labels.brand',3)}}
                </p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.products.index')}}" data-link="/admin/products"
               class="nav-link {{request()->routeIs('admin.products*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-mobile"></i>
                <p>
                    {{trans_choice('labels.product',3)}}
                </p>
            </a>
        </li>
        {{--        <li class="nav-header">EXAMPLES</li>--}}

    </ul>
</nav>
