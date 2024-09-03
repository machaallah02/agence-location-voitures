  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href={{route('client')}}>
          <i class="bi bi-grid"></i>
          <span>Bonjour {{ Auth::user()->nom }}</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#res-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard"></i><span>Réservations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="res-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href={{route('historique')}}>
              <i class="bi bi-person-lines-fill"></i><span>Vos réservations</span>
            </a>
          </li>
          <li>
            <a href={{route('home')}}>
              <i class="bi bi-person-plus-fill"></i><span>Faite une réservation</span>
            </a>
          </li>
        </ul>
      </li>



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->





    </ul>

  </aside><!-- End Sidebar-->
