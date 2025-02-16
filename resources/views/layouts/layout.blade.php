<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center text-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center" >
        <span class="d-block d-lg-none">CRM</span>
        <span class="d-none d-lg-block">CRM Center</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#">
            <i class="bi bi-cake2"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#">
            <i class="bi bi-bell"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>
        </li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle" style="font-size: 25px;"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->email }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->user_name }}</h6>
              <span>{{ auth()->user()->email }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Chiqish</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['home', 'dashboard']) ? '' : 'collapsed' }}" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-people"></i>
          <span>Tashriflar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-menu-button-wide"></i>
          <span>Guruhlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-inboxes"></i>
          <span>Varonka</span>
        </a>
      </li>
      @if(auth()->user()->type === 'sAdmin' || auth()->user()->type === 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt"></i><span>Hisobot</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Barcha talabalar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Barcha to'lovlar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Aktiv talabalar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Barcha hodimlar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Ish haqi to'lovlari</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Xarajatlar tarixi</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Kirimlar tarixi</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Barcha guruhlar</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-briefcase"></i>
          <span>O'qituvchilar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-card-list"></i>
          <span>Hodimlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Statistika</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Kunlik Statistika</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Oylik Statistika</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Varonka</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gear-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Sozlamalar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="gear-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('setting_sms') }}">
              <i class="bi bi-circle"></i><span>SMS sozlamalari</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_holiday') }}">
              <i class="bi bi-circle"></i><span>Dam olish va bayram kunlari</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>To'lov sozlamalari</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Chegirmali to'lovlar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Dars xonalari</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Kurslar</span>
            </a>
          </li>
        </ul>
      </li>
      @endif
      @if(auth()->user()->type === 'sAdmin')
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs(['sadmin_setting', 'sadmin_sms', 'sadmin_time']) ? '' : 'collapsed' }}" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="setting-nav" class="nav-content collapse {{ request()->routeIs(['sadmin_setting', 'sadmin_sms', 'sadmin_time']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('sadmin_setting') }}" class="{{ request()->routeIs(['sadmin_setting']) ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Tizim sozlamalari</span>
              </a>
            </li>
            <li>
              <a href="{{ route('sadmin_time') }}" class="{{ request()->routeIs(['sadmin_time']) ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Dars vaqtlari</span>
              </a>
            </li>
            <li>
              <a href="{{ route('sadmin_sms') }}" class="{{ request()->routeIs(['sadmin_sms']) ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>SMS paketlari</span>
              </a>
            </li>
          </ul>
        </li>
      @endif
    </ul>
  </aside>
  
  <main id="main" class="main">

    @yield('content')

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>