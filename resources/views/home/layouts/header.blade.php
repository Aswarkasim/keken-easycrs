<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">
       <img src="/img/logo.png" alt="Logo" width="80px" class="" style="opacity: .8">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
           
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'menu-active' : ''}}" href="/">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link {{ Request::is('profile*') ? 'menu-active' : ''}} " href="/profile">Profil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('galeri*') ? 'menu-active' : ''}} " href="/galeri">Galeri</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('artikel*') ? 'menu-active' : ''}} " href="/artikel">Artikel</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('kelas*') ? 'menu-active' : ''}}" href="/kelas">Kelas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('lowongan*') ? 'menu-active' : ''}}" href="/lowongan">Lowongan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('contact*') ? 'menu-active' : ''}}" href="/contact">Kontak</a>
          </li>
  
        </ul>

        @auth
        <a href="/admin/dashboard" class="btn btn-success btn-sm mx-2">
          <i class="fas fa-user"></i> Profile
        </a>
       
        @else
          <a href="/admin/auth" class="btn btn-success btn-sm">
            <i class="fas fa-sign-in-alt"></i> Masuk
          </a>
        @endauth

      </div>
    </div>
  </nav>
</header> 