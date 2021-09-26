<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> {{ $name }} </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{ route('backend.dashboard.index') }}" class="nav-link @if (request()->is('backend/dashboard')) active @endif">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              Dashboard
              </p>
          </a>
          </li>
        <li class="nav-header">Quản lý chung</li>
        <li class="nav-item @if (request()->routeIs('backend.posts.*')) menu-open @endif">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Quản lý bài viết
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.posts.index') }}" class="nav-link @if (request()->is('backend/posts')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách bài viết</p>
              </a>
            </li>
            <li class="nav-item">
              <a href=" {{ route('backend.posts.add') }} " class="nav-link @if (request()->is('backend/posts/create')) active @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới bài viết</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Quản lý danh mục</li>
        <li class="nav-item @if (request()->routeIs('backend.category.*')) menu-open @endif">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Bài viết
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.category.index') }}" class="nav-link @if (request()->is('backend/category')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>
            <li class="nav-item">
              <a href=" {{ route('backend.category.create') }} " class="nav-link @if (request()->is('backend/category/create')) active @endif ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới danh mục</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Hệ thống</li>
        <li class="nav-item @if (request()->routeIs('backend.users.*')) menu-open @endif">
          <a href="#2" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Quản lý Users
              <i class="fas fa-angle-left right"></i>

            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('backend.users.index') }}" class="nav-link @if (request()->is('backend/users')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('backend.users.create') }}" class="nav-link @if (request()->is('backend/users/create')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới user</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('backend.users.edit', 1) }}" class="nav-link @if (request()->is('backend/users/edit')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Chỉnh sửa users</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>