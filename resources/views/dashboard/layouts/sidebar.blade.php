 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('indexdashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('indexsparepart')}}">
          <i class="bi bi-grid"></i>
          <span>Spare Part</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}

      <!-- Start Spare Part Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sparepart-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wrench"></i><span>Spare Part</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sparepart-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('indexsparepart')}}">
              <i class="bi bi-circle"></i><span>List Spare Part</span>
            </a>
          </li>
          <li>
            <a href="{{ route('sparepartin')}}">
              <i class="bi bi-circle"></i><span>Spare Part In</span>
            </a>
          </li>
          <li>
            <a href="{{ route('sparepartout')}}">
              <i class="bi bi-circle"></i><span>Spare Part Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Spare Part Sidebar -->

      <!-- Start Asset Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tools-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-tools"></i><span>Asset Tools</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tools-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('indexassettools')}}">
              <i class="bi bi-circle"></i><span>List Tools</span>
            </a>
          </li>
          <li>
            <a href="{{ route('assettoolsin')}}">
              <i class="bi bi-circle"></i><span>Tools In</span>
            </a>
          </li>
          <li>
            <a href="{{ route('assettoolsout')}}">
              <i class="bi bi-circle"></i><span>Tools Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Asset Sidebar -->

      <!-- Start ATK Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#atk-nav" data-bs-toggle="collapse" href="#">
          <i class="bbi bi-journal-check"></i><span>ATK</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="atk-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('indexatk')}}">
              <i class="bi bi-circle"></i><span>List ATK</span>
            </a>
          </li>
          <li>
            <a href="{{ route('atkin')}}">
              <i class="bi bi-circle"></i><span>ATK In</span>
            </a>
          </li>
          <li>
            <a href="{{ route('atkout')}}">
              <i class="bi bi-circle"></i><span>ATK Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End ATK Sidebar -->

      <!-- Start Supplier Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('indexsupplier')}}">
          <i class="bi bi-truck"></i>
          <span>Supplier</span>
        </a>
      </li>
      <!-- End Supplier Sidebar -->

      <!-- Start Users Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('indexusers')}}">
          <i class="bi bi-person-circle"></i>
          <span>Users</span>
        </a>
      </li>
      <!-- End Users Sidebar -->

      <!-- Start Spare Part Sidebar -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#configuration-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="configuration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('indexbrand')}}">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="{{ route('indexwarehouse')}}">
              <i class="bi bi-circle"></i><span>Warehouse</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Spare Part Sidebar -->
      
    </ul>

  </aside><!-- End Sidebar-->