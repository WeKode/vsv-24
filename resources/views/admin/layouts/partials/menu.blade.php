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
        @canany(['view-role','view-admin','view-user','view-fisher'])
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <p>
                    {{trans_choice('labels.accounts',1)}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('view-admin')
                    <li class="nav-item">
                        <a href="{{route('admin.admins.index')}}"
                           class="nav-link {{request()->routeIs('admin.admins*') ? 'admin' : ''}}"
                           data-link="/admin/admins">
                            <i class="fas fa-users-cog"></i>
                            <p>{{trans_choice('labels.admin',3)}}</p>
                        </a>
                    </li>
                @endcan
                @can('view-role')
                    <li class="nav-item">
                        <a href="{{route('admin.roles.index')}}" data-link="/admin/roles"
                           class="nav-link {{request()->routeIs('admin.roles*')? 'active' : ''}} ">
                            <i class="fas fa-user-tag"></i>
                            <p>{{trans_choice('labels.role',3)}}</p>
                        </a>
                    </li>
                @endcan
                @can('view-fisher')
                    <li class="nav-item">
                        <a href="#" data-link="/admin/fishers"
                           class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{trans_choice('labels.fisher',3)}}</p>
                        </a>
                    </li>
                @endcan
                @can('view-user')
                    <li class="nav-item">
                        <a href="#" data-link="/admin/users"
                           class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>{{trans_choice('labels.user',2)}}</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
        @endcanany
        @can('view-category')
            <li class="nav-item ">
                <a href="{{route('admin.categories.index')}}"
                   data-link="/admin/categories"
                   class="nav-link {{request()->routeIs('admin.categories*') ? 'active' : ''}}">
                    <i class="fas fa-check-double"></i>
                    <p>
                        {{trans_choice('labels.category',2)}}
                    </p>
                </a>
            </li>
        @endcan

        @can('view-product')
            <li class="nav-item ">
                <a href="{{route('admin.products.index')}}" data-link="/admin/products"
                   class="nav-link {{request()->routeIs('admin.products*') ? 'active' : ''}}">
                    <i class="fab fa-product-hunt"></i>
                    <p>
                        {{trans_choice('labels.product',2)}}
                    </p>
                </a>
            </li>
        @endcan

        @can('view-image')
            <li class="nav-item ">
                <a href="{{route('admin.images.index')}}" data-link="/admin/images"
                   class="nav-link {{request()->routeIs('admin.images*') ? 'active' : ''}}">
                    <i class="fas fa-image"></i>
                    <p>
                        {{trans_choice('labels.image',2)}}
                    </p>
                </a>
            </li>
        @endcan

        @can('view-unit')
            <li class="nav-item ">
                <a href="{{route('admin.units.index')}}" data-link="/admin/units"
                   class="nav-link {{request()->routeIs('admin.units*') ? 'active' : ''}}">
                    <i class="fas fa-check-double"></i>
                    <p>
                        {{trans_choice('labels.unit',2)}}
                    </p>
                </a>
            </li>
        @endcan

        @can('view-service')
            <li class="nav-item ">
                <a href="{{route('admin.services.index')}}" data-link="/admin/services"
                   class="nav-link {{request()->routeIs('admin.services*') ? 'active' : ''}}">
                    <i class="fab fa-servicestack"></i>
                    <p>
                        {{trans_choice('labels.service',2)}}
                    </p>
                </a>
            </li>
        @endcan

        {{--        <li class="nav-header">EXAMPLES</li>--}}

    </ul>
</nav>
