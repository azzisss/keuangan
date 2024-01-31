
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link {{ ($active == 'Dashboard') ? 'active' : '' }}" href="/home">
                        <div class="sb-nav-link-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
                        Dashboard
                    </a>
                    @if(Auth::user()->id_akses==1)
                    <a class="nav-link {{ ($active == 'DataAkun') ? 'active' : '' }}" href="/akun">
                        <div class="sb-nav-link-icon active"><i class="bi bi-people-fill"></i></div>
                        Mengelola Data Akun
                    </a>
                    @endif
                    <a class="nav-link {{ ($active == 'ArusKas') ? 'active' : '' }}" href="/aruskas">
                        <div class="sb-nav-link-icon"><i class="bi bi-clipboard-pulse"></i></div>
                        Mengelola Arus Kas
                    </a>
                    <a class="nav-link {{ ($active == 'LaporanArusKas') ? 'active' : '' }}" href="/laporanaruskas">
                        <div class="sb-nav-link-icon"><i class="bi bi-clipboard-data-fill"></i></div>
                        Laporan Arus Kas
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>
                    <a class="nav-link {{ ($active == 'NeracaSaldo') ? 'active' : '' }}" href="/neracasaldo">
                        <div class="sb-nav-link-icon"><i class="bi bi-bar-chart-fill"></i></i></div>
                        Neraca Saldo
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>
                    <a class="nav-link {{ ($active == 'LabaRugi') ? 'active' : '' }}" href="/labarugi">
                        <div class="sb-nav-link-icon"><i class="bi bi-cash-stack"></i></i></div>
                        Laba Rugi
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>
                    <a class="nav-link {{ ($active == 'BukuBesar') ? 'active' : '' }}" href="/bukubesar">
                        <div class="sb-nav-link-icon"><i class="bi bi-bookmarks-fill"></i></div>
                        Buku Besar
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>

                    
                    
                    {{-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ ($active2 == 'semua') ? 'active' : '' }}" href="/laporan/semua">Semua</a>
                            <a class="nav-link {{ ($active2 == 'harian') ? 'active' : '' }}" href="/laporan/harian">Harian</a>
                            <a class="nav-link" href="">Mingguan</a>
                            <a class="nav-link" href="">Bulanan</a>
                            <a class="nav-link" href="">Tahunan</a>
                        </nav>
                    </div> --}}
                </div>
            </div>
            <div class="sb-sidenav-footer mb-3">
                <div class="small">Logged in as :
                    @if (Auth::user()->id_akses==1)
                    Admin
                    @else
                    Owner
                    @endif
                </div>
            </div>
        </nav>
    </div>