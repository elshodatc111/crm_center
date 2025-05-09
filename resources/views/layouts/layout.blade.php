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
          <a class="nav-link nav-icon" href="{{ route('all_student_return') }}">
            <i class="bi bi-cash-stack text-danger"></i>
            <span class="badge bg-success badge-number">@include('layouts.returnPaymart')</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="{{ route('user_brithday') }}">
            <i class="bi bi-cake2 text-primary"></i>
            <span class="badge bg-warning badge-number">@include('layouts.tkun')</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="{{ route('user_eslatmalar') }}">
            <i class="bi bi-exclamation-triangle text-primary"></i>
            <span class="badge bg-danger badge-number">@include('layouts.eslatma')</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="{{ route('meneger_varonka_new') }}">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">@include('layouts.murojat')</span>
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
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
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
        <a class="nav-link  {{ request()->routeIs(['all_student','student_show']) ? '' : 'collapsed' }}" href="{{ route('all_student') }}">
          <i class="bi bi-people"></i>
          <span>Tashriflar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['all_groups','create_show']) ? '' : 'collapsed' }} " href="{{ route('all_groups') }}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Guruhlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['meneger_varonka','meneger_varonka_show','meneger_varonka_cancel','meneger_varonka_new','meneger_varonka_pedding','meneger_varonka_success'])? '' : 'collapsed' }}" href="{{ route('meneger_varonka') }}">
          <i class="bi bi-inboxes"></i>
          <span>Murojatlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['compamy_kassa','compamy_kassa'])? '' : 'collapsed' }}" href="{{ route('compamy_kassa') }}">
          <i class="bi bi-cash-stack"></i>
          <span>Kassa</span>
        </a>
      </li>
      @if(auth()->user()->type === 'sAdmin' || auth()->user()->type === 'admin')
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['compamy_moliya'])? '' : 'collapsed' }}" href="{{ route('compamy_moliya') }}">
          <i class="bi bi-graph-up"></i>
          <span>Moliya</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['report_users','report_paymart','report_users_next','report_group_next','report_message_next','report_group','report_paymart_next','report_message']) ? '' : 'collapsed' }}" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt"></i><span>Hisobot</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse {{ request()->routeIs(['report_users','report_group_next','report_message_next','report_users_next','report_paymart','report_paymart_next','report_group','report_message']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('report_users') }}"  class="{{ request()->routeIs(['report_users','report_users_next']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Talabalar</span>
            </a>
          </li>
          <li>
            <a href="{{ route('report_paymart') }}"  class="{{ request()->routeIs(['report_paymart','report_paymart_next']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>To'lovlar</span>
            </a>
          </li>
          <li>
            <a href="{{ route('report_group') }}"  class="{{ request()->routeIs(['report_group','report_group_next']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Guruhlar</span>
            </a>
          </li>
          <li>
            <a href="{{ route('report_message') }}"  class="{{ request()->routeIs(['report_message','report_message_next']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>SMS</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['all_techer','techer_show']) ? '' : 'collapsed' }} " href="{{ route('all_techer') }}">
          <i class="bi bi-briefcase"></i>
          <span>O'qituvchilar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['compamy_hodim','compamy_hodim_show']) ? '' : 'collapsed' }}" href="{{ route('compamy_hodim') }}">
          <i class="bi bi-card-list"></i>
          <span>Hodimlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{ request()->routeIs(['chart_vised','chart_techer_reyting_two','chart_paymart','chart_techer','chart_paymart_show','chart_techer_reyting']) ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Statistika</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse {{ request()->routeIs(['chart_vised','chart_techer_reyting_two','chart_paymart','chart_techer','chart_paymart_show','chart_techer_reyting']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('chart_vised') }}" class="{{ request()->routeIs(['chart_vised']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Tashrif Statistikasi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('chart_paymart') }}" class="{{ request()->routeIs(['chart_paymart','chart_paymart_show']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>To'lovlar Statistikasi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('chart_techer') }}" class="{{ request()->routeIs(['chart_techer']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Guruhlar Statistikasi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('chart_techer_reyting') }}" class="{{ request()->routeIs(['chart_techer_reyting']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>O'qituvchilar Reyting</span>
            </a>
          </li>
          <li>
            <a href="{{ route('chart_techer_reyting_two') }}" class="{{ request()->routeIs(['chart_techer_reyting_two']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Yo'qotishlar</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['setting_book','setting_cours','setting_cours_audio','all_social','setting_cours_video','setting_cours_test','setting_sms', 'setting_holiday','setting_paymart','setting_chegirma','setting_rooms']) ? '' : 'collapsed' }}" data-bs-target="#gear-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Sozlamalar</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="gear-nav" class="nav-content collapse {{ request()->routeIs(['setting_book','setting_cours','setting_cours_video','setting_cours_test','setting_cours_audio','all_social','setting_sms', 'setting_holiday','setting_paymart','setting_chegirma','setting_rooms']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('setting_sms') }}" class="{{ request()->routeIs(['setting_sms']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>SMS sozlamalari</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_holiday') }}" class="{{ request()->routeIs(['setting_holiday']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Dam olish va bayram kunlari</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_paymart') }}" class="{{ request()->routeIs(['setting_paymart']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>To'lov sozlamalari</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_chegirma') }}"  class="{{ request()->routeIs(['setting_chegirma']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Chegirmali to'lov</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_rooms') }}" class="{{ request()->routeIs(['setting_rooms']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Dars xonalari</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting_book') }}" class="{{ request()->routeIs(['setting_book']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Kitoblar</span>
            </a>
          <li>
            <a href="{{ route('setting_cours') }}" class="{{ request()->routeIs(['setting_cours','setting_cours_audio','setting_cours_video','setting_cours_test',]) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Kurslar</span>
            </a>
          </li>
          <li>
            <a href="{{ route('all_social') }}" class="{{ request()->routeIs(['all_social']) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Hududlar</span>
            </a>
          </li>
        </ul>
      </li>
      @endif
      @if(auth()->user()->type === 'sAdmin')
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs(['sadmin_setting', 'sadmin_sms','sadmin_upload_user', 'sadmin_time']) ? '' : 'collapsed' }}" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="setting-nav" class="nav-content collapse {{ request()->routeIs(['sadmin_setting','sadmin_upload_user', 'sadmin_sms', 'sadmin_time']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
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
            <li>
              <a href="{{ route('sadmin_upload_user') }}" class="{{ request()->routeIs(['sadmin_upload_user']) ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Upload User</span>
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
    <strong><span>CodeStart</span></strong> Dev Center
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>