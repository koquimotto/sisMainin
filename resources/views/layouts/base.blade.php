<!doctype html>
<html lang="es" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="dark">

<head>

    <meta charset="utf-8" />
    <title>@yield('title','SIGA MAININ') - SIGA MAININ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png">

    <!-- plugin css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('styles')


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('modules') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="60">
                        </span>
                    </a>

                    <a href="{{ route('modules') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="60">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                @include('partials.search')
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                  <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <span class="d-flex align-items-center">
                          <img class="rounded-circle header-profile-user" src="{{ asset('uploads/photos/'.Auth::user()->photo)}}"
                              alt="Header Avatar">
                          <span class="text-start ms-xl-2">
                              <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</span>
                              <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->type!='admin'?'Almacenero':'Administrador' }}</span>
                          </span>
                      </span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <h6 class="dropdown-header">Bienvenido {{ Auth::user()->nombres }}</h6>
                      <a class="dropdown-item" href="#"><i
                              class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                              class="align-middle">Perfil</span></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('login.destroy') }}"><i
                              class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                              class="align-middle" data-key="t-logout">Salir</span></a>
                  </div>
              </div>
            </div>
        </div>
    </div>
</header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">

                      <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('almacen.almacenes') }}">
                            <i class="ri-home-5-line"></i> <span data-key="t-widgets">Almacen</span>
                        </a>
                      </li>

                      <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('configuracion.usuarios') }}">
                                <i class="ri-settings-5-line"></i> <span data-key="t-widgets">Configuracion</span>
                            </a>
                      </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    
                    @yield('content')
                    
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-analytics.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('scripts')
</body>

</html>