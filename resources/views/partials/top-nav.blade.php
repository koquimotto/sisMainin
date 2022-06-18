<header id="page-topbar">
  <div class="layout-width">
      <div class="navbar-header">
          <div class="d-flex">
              <!-- LOGO -->
              <div class="navbar-brand-box horizontal-logo">
                  <a href="#" class="logo logo-dark">
                      <span class="logo-sm">
                          <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
                      </span>
                      <span class="logo-lg">
                          <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="60">
                      </span>
                  </a>

                  <a href="#" class="logo logo-light">
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

              <div class="dropdown topbar-head-dropdown ms-1 header-item">
                  <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class='bx bx-category-alt fs-22'></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                      <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                          <div class="row align-items-center">
                              <div class="col">
                                  <h6 class="m-0 fw-semibold fs-15"> Módulos </h6>
                              </div>
                              <div class="col-auto">
                                  <a href="{{ route('modules') }}" class="btn btn-sm btn-soft-info"> Ver todos
                                      <i class="ri-arrow-right-s-line align-middle"></i></a>
                              </div>
                          </div>
                      </div>

                      <div class="p-2">
                          <div class="row g-0">
                              <div class="col">
                                  <a class="dropdown-icon-item" href="{{ route('almacen.almacenes') }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                      <span>Almacen</span>
                                  </a>
                              </div>
                              <div class="col">
                                  <a class="dropdown-icon-item" href="{{ route('configuracion.usuarios') }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                      <span>Configuración</span>
                                  </a>
                              </div>
                          </div>
                      </div>
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