<aside class="main-sidebar sidebar-dark-primary">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{admin()->name}}</a>
                <div class="small text-muted">
                    Administrator
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @include('admin.layouts.partials.menu')
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
