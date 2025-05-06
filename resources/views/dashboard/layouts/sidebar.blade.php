 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link {{ request()->routeIs('indexdashboard') ? 'active' : 'collapsed' }}"
                 href="{{ route('indexdashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <!-- Start Spare Part Sidebar -->
         @php
             $isSparePartActive =
                 request()->routeIs('spare-parts.*') ||
                 request()->routeIs('stock-in.*') ||
                 request()->routeIs('stock-out.*') ||
                 request()->routeIs('sparepart.history');
         @endphp

         <li class="nav-item">
             <a class="nav-link {{ $isSparePartActive ? '' : 'collapsed' }}" data-bs-target="#sparepart-nav"
                 data-bs-toggle="collapse" href="#">
                 <i class="bi bi-wrench"></i><span>Spare Part</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="sparepart-nav" class="nav-content collapse {{ $isSparePartActive ? 'show' : '' }}"
                 data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('spare-parts.index') }}"
                         class="{{ request()->routeIs('spare-parts.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>List Spare Part</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('stock-in.index') }}"
                         class="{{ request()->routeIs('stock-in.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Spare Part In</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('stock-out.index') }}"
                         class="{{ request()->routeIs('stock-out.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Spare Part Out</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('sparepart.history') }}"
                         class="{{ request()->routeIs('sparepart.history') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>History In/Out</span>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- End Spare Part Sidebar -->

         <!-- Start Asset Sidebar -->

         @php
             $isAssetToolsActive =
                 request()->routeIs('asset-tools.*') ||
                 request()->routeIs('asset-in.*') ||
                 request()->routeIs('asset-out.*') ||
                 request()->routeIs('assettools.history');
         @endphp

         <li class="nav-item">
             <a class="nav-link {{ $isAssetToolsActive ? '' : 'collapsed' }}" data-bs-target="#tools-nav"
                 data-bs-toggle="collapse" href="#">
                 <i class="bi bi-tools"></i><span>Asset Tools</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="tools-nav" class="nav-content collapse {{ $isAssetToolsActive ? 'show' : '' }}"
                 data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('asset-tools.index') }}"
                         class="{{ request()->routeIs('asset-tools.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>List Asset Tools</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('asset-in.index') }}"
                         class="{{ request()->routeIs('asset-in.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Asset Tools In</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('asset-out.index') }}"
                         class="{{ request()->routeIs('asset-out.*') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Asset Tools Out</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('assettools.history') }}"
                         class="{{ request()->routeIs('assettools.history') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Asset History In/Out</span>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- End Asset Sidebar -->

         <!-- Start ATK Sidebar -->
         {{-- <li class="nav-item">
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
      </li> --}}
         <!-- End ATK Sidebar -->

         <!-- Start Supplier Sidebar -->
         <li class="nav-item">
             <a class="nav-link {{ request()->routeIs('indexsupplier') ? 'active' : 'collapsed' }}"
                 href="{{ route('indexsupplier') }}">
                 <i class="bi bi-truck"></i>
                 <span>Supplier</span>
             </a>
         </li>
         <!-- End Supplier Sidebar -->

         <!-- Start Users Sidebar -->
         @if (Auth::user()->is_role == 2)
             <li class="nav-item">
                 <a class="nav-link {{ request()->routeIs('indexusers') ? 'active' : 'collapsed' }}"
                     href="{{ route('indexusers') }}">
                     <i class="bi bi-person-circle"></i>
                     <span>Users</span>
                 </a>
             </li>
         @endif
         <!-- End Users Sidebar -->

         <!-- Start Spare Part Sidebar -->

         @php
             $isConfigActive = request()->routeIs('indexbrand') || request()->routeIs('indexwarehouse');
         @endphp

         <li class="nav-item">
             <a class="nav-link {{ $isConfigActive ? '' : 'collapsed' }}" data-bs-target="#configuration-nav"
                 data-bs-toggle="collapse" href="#">
                 <i class="bi bi-gear"></i><span>Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="configuration-nav" class="nav-content collapse {{ $isConfigActive ? 'show' : '' }}"
                 data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('indexbrand') }}"
                         class="{{ request()->routeIs('indexbrand') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Brand</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('indexwarehouse') }}"
                         class="{{ request()->routeIs('indexwarehouse') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Warehouse</span>
                     </a>
                 </li>
                 {{-- 
        <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
        </li> 
        --}}
             </ul>
         </li>
         {{-- <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#configuration-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-gear"></i><span>Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="configuration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ route('indexbrand') }}">
                         <i class="bi bi-circle"></i><span>Brand</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('indexwarehouse') }}">
                         <i class="bi bi-circle"></i><span>Warehouse</span>
                     </a>
                 </li> --}}
         {{-- <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li> --}}
         {{-- </ul>
         </li> --}}
         <!-- End Spare Part Sidebar -->

     </ul>

 </aside><!-- End Sidebar-->
