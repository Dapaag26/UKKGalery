<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('adminlte')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('evara/assets/imgs/theme/G.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gallery Foto</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{-- <img class="profile-user-img img-fluid img-circle"
            src="{{ asset('storage/photo/'.Auth::user()->profile_foto) }}"
            alt="User profile picture" > --}}
            @if (Auth::user()->profile_foto == null)
            <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('adminlte') }}/dist/img/user4-128x128.jpg"
                alt="User profile picture">
        @else
            <img class="profile-user-img img-fluid img-circle"
                src="{{ asset('storage/photo/'.Auth::user()->profile_foto) }}"
                style="width: 50px; height: 50px; object-fit: cover; object-position: center;"
                alt="User profile picture">
        @endif
        </div>
        <div class="info">
            <a href="{{ route('user.show',Auth::User()->id) }}" class="d-block">{{Auth::user()->name}}</a>

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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          @php
              $role = Auth::user()->role;
          @endphp
          @foreach ($role as $i)
           @if ($i->id_akses == 8 || $i->id_akses == 9)
            <li class="nav-item">
                <a href="/dashboard" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @endif
           <li class="nav-item {{ Route::is('user.index') || Route::is('akses.index') || Route::is('role.index') ? 'menu-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                   @if ($i->id_akses == 8)
                    <li class="nav-item ">
                        <a href=" {{ route('user') }} " class="nav-link {{ Route::is('user.index')  ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                       <a href=" {{ route('akses.index') }} " class="nav-link {{ Route::is('akses.index')  ? 'active' : '' }}">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Data Akses</p>
                       </a>
                   </li>
                   <li class="nav-item ">
                       <a href=" {{ route('role.index') }} " class="nav-link {{ Route::is('role.index')  ? 'active' : '' }}">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Data Role</p>
                       </a>
                   </li>
                   @endif
                   @if ($i->id_akses == 8 || $i->id_akses == 9)
                   <li class="nav-item">
                       <a href=" {{route('photo.index')}}" class="nav-link">
                           <i class="far fa-circle nav-icon"></i>
                           <p>Data Foto</p>
                       </a>
                   </li>
                    @endif
                </ul>
            </li>
            @if ($i->id_akses == 8 || $i->id_akses == 9)
            <li class="nav-item">
                <a href="{{ route('photo.create') }}" class="nav-link">
                   <i class=" nav-icon fas fa-plus"></i>
                    <p>
                        Post
                    </p>
                </a>
            </li>
            @endif
            @if ($i->id_akses == 8 || $i->id_akses == 9)
         <li class="nav-item">
           <a href="{{ route('landing') }}" class="nav-link ">
               <i class="nav-icon fas fa-search"></i>
               <p>
                   Explore
               </p>
           </a>
         </li>
         @endif

         @if ($i->id_akses == 8)


         <li class="nav-item {{ Route::is('laporan.photo')  ? 'menu-open' : '' }} ">
            <a href="{{route('laporan.photo')}}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Laporan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
        </li>
        @endif
            @if ($i->id_akses == 8 || $i->id_akses == 9)
         <li class="nav-item">
           <a href="{{ route('logout') }}" class="nav-link ">
               <i class="nav-icon fas fa-sign-out-alt"></i>
               <p>
                   Logout
               </p>
           </a>
         </li>
         @endif
         @endforeach
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
