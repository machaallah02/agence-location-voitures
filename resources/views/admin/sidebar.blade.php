  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href={{route('admin.index')}}>
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>gestions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href={{route('admin.reservations.index')}}>
              <i class="bi bi-circle"></i><span>Reservation</span>
            </a>
          </li>
          <li>
            <a href={{route('admin.maintenances.index')}}>
              <i class="bi bi-circle"></i><span>Maintenance</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#res-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard"></i><span>Reservation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="res-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href={{route('admin.reservations.index')}}>
              <i class="bi bi-person-lines-fill"></i><span>liste</span>
            </a>
          </li>
          <li>
            <a href={{route('admin.reservations.create')}}>
              <i class="bi bi-person-plus-fill"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#vehicule-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-command"></i><span>Vehicules</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="vehicule-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href={{route('admin.vehicules.index')}}>
              <i class="bi bi-person-lines-fill"></i><span>liste</span>
            </a>
          </li>
          <li>
            <a href={{route('admin.vehicules.create')}}>
              <i class="bi bi-person-plus-fill"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li>

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href={{route('admin.users.index')}}>
              <i class="bi bi-person-lines-fill"></i><span>liste</span>
            </a>
          </li>
          <li>
            <a href={{route('admin.users.create')}}>
              <i class="bi bi-person-plus-fill"></i><span>Ajouter</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


     


    </ul>

  </aside><!-- End Sidebar-->