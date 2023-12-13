<aside id="layout-menu" class="layout-menu menu-vertikal menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="#" class="app-brand-link">
      <span>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/favicon/PLN.ico') }}" />
</span>
<span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: x-large;">SISTEM INVENTARIS</span>


      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
          @if(Auth::user()->role == 'adminn')
          <a href="adminn" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-smile"></i>
          <div data-i18n="Analytics">HOME</div>
          @endif
          @if(Auth::user()->role == 'pengguna')
          <a href="pengguna" class="menu-link">
          <div data-i18n="Analytics">HOME</div>
          @endif
        </a>
      </li>
      <!-- Layouts -->
      @if(Auth::user()->role == 'adminn')
      <li class="menu-item">
        <a href="data_register" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-pin"></i>
          <div data-i18n="Basic">Info Akun</div>
        </a>
      </li>
      @endif
        <li class="menu-item">
        <a href="kontakperson" class="menu-link">
        <i class="menu-icon bx bxs-user-rectangle"></i>
          <div data-i18n="Basic">Contact Person Admin</div>
        </a>
        <li class="menu-item">
        <a href="{{route('data_arsip.index')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-folder"></i>
          <div data-i18n="Basic"> Arsip Surat Berita Acara</div>
        </a>
      <li class="menu-item">
        <a href="{{route('data_pengembalian.index')}}" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-bottom"></i>
          <div data-i18n="Basic">Data Mitra</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('data_mitrapengembalian.index')}}" class="menu-link">
              <div data-i18n="Basic">Pengembalian Barang Mitra</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('data_mitra.index')}}" class="menu-link">
              <div data-i18n="Notifications">Penerimaan Barang Mitra</div>
            </a>
          </li>
            </a>
          </li>
        </ul>
      </li>
     
      <!-- Components -->

      <!-- Cards -->
      <li class="menu-item">
        <a href="{{route('data_pengembalian.index')}}" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Basic">Data Pegawai</div>
        </a>
        <ul class="menu-sub">
        <li class="menu-item">
            <a href="{{route('data_penerimas.index')}}" class="menu-link">
              <div data-i18n="Notifications">Penerimaan Barang Pegawai</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('data_pengembalian.index')}}" class="menu-link">
              <div data-i18n="Basic">Pengembalian Barang Pegawai</div>
            </a>
          </li>
            </a>
          </li>
        </ul>
      </li>

      <!-- Extended components -->
  

      <!-- Forms & Tables -->
      
      <!-- Forms -->

      <!-- Misc -->

        <a
          href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
          target="_blank"
          class="menu-link"
        >

      
        </a>
      </li>
    </ul>
  </aside>