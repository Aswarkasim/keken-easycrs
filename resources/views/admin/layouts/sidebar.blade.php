  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/img/logo.png" alt="AdminLTE Logo" target="blank" width="40px" class="" style="opacity: .8"> 
      <span class="brand-text text-success"><strong>ADMIN</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/saran" class="nav-link {{Request::is('admin/saran*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Saran
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/kelas" class="nav-link {{Request::is('admin/kelas') ? 'active' : ''}}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/lowongan" class="nav-link {{Request::is('admin/lowongan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Lowongan
              </p>
            </a>
          </li>

            <li class="nav-item {{Request::is('admin/posts*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('admin/posts*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Artikel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/posts/post" class="nav-link {{Request::is('admin/posts/post*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artikel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/posts/kategori" class="nav-link {{Request::is('admin/posts/kategori*') ? 'child-active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{Request::is('admin/user*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('admin/user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              {{-- <li class="nav-item">
                <a href="/admin/user?role=user" class="nav-link {{request('role')== 'user' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="/admin/user?role=admin" class="nav-link  {{request('role')== 'admin' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <a href="/admin/banner" class="nav-link {{Request::is('admin/banner*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banner
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/konfigurasi" class="nav-link {{Request::is('admin/konfigurasi*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Konfigurasi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


