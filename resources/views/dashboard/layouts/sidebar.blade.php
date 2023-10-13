<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboards*') ? 'active' : '' }}" aria-current="page" href="/dashboards">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}" aria-current="page" href="/profiles">
            <span data-feather="users"></span>
            Profile Petugas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="edit"></span>
            Input Data
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('post*') ? 'active' : '' }}" href="/post">
            <span data-feather="grid"></span>
            Data Ticket CCAN
          </a>
        </li>
      
    
      </ul>
      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="/user">
            <span data-feather="user-check"></span>
            User Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/dashboards*') ? 'active' : '' }}" href="/dashboard/dashboards">
            <span data-feather="folder"></span>
            Data Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/areas*') ? 'active' : '' }}" href="/dashboard/areas">
            <span data-feather="disc"></span>
            Data Area
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/petugasans*') ? 'active' : '' }}" href="/dashboard/petugasans">
            <span data-feather="user-plus"></span>
            Data Petugas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/perbaikans*') ? 'active' : '' }}" href="/dashboard/perbaikans">
            <span data-feather="settings"></span>
            Data Perbaikan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="bookmark"></span>
            Type Data
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/statusas*') ? 'active' : '' }}" href="/dashboard/statusas">
            <span data-feather="loader"></span>
            Status
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>