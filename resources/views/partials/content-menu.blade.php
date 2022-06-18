<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <a href="#" class="logo logo-dark">
          <span class="logo-sm">
              <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="60">
          </span>
      </a>
      <!-- Light Logo-->
      <a href="#" class="logo logo-light">
          <span class="logo-sm">
              <img src="https://mainin.com.pe/wp-content/themes/industro/images/favicon-mainin.png" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="https://mainin.com.pe/wp-content/themes/industro/images/logo-mainin.png" alt="" height="60">
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
            @php
                use App\Models\Menu;
                use App\Illuminate\Support\Facades\DB;

                $modulo = explode("/", $_SERVER["REQUEST_URI"])[1];

                // dd ($modulo);
                // if($modulo){
                //     $menus = collect(DB::select("SELECT * FROM Menu WHERE estado=1"));
                // }
            @endphp
              <li class="nav-item">
                  <a class="nav-link menu-link" href="{{ route('configuracion.usuarios') }}">
                      <i class="ri-user-2-line"></i> <span data-key="t-widgets">Usuarios</span>
                  </a>
              </li>

              {{-- <li class="nav-item">
                  <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                      aria-expanded="false" aria-controls="sidebarForms">
                      <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Forms</span>
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarForms">
                      <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                              <a href="forms-elements.html" class="nav-link" data-key="t-basic-elements">Basic
                                  Elements</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-select.html" class="nav-link" data-key="t-form-select"> Form Select </a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-checkboxs-radios.html" class="nav-link"
                                  data-key="t-checkboxs-radios">Checkboxs & Radios</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-pickers.html" class="nav-link" data-key="t-pickers"> Pickers </a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-masks.html" class="nav-link" data-key="t-input-masks">Input Masks</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-advanced.html" class="nav-link" data-key="t-advanced">Advanced</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-range-sliders.html" class="nav-link" data-key="t-range-slider"> Range
                                  Slider </a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-validation.html" class="nav-link" data-key="t-validation">Validation</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-wizard.html" class="nav-link" data-key="t-wizard">Wizard</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-editors.html" class="nav-link" data-key="t-editors">Editors</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-file-uploads.html" class="nav-link" data-key="t-file-uploads">File
                                  Uploads</a>
                          </li>
                          <li class="nav-item">
                              <a href="forms-layouts.html" class="nav-link" data-key="t-form-layouts">Form Layouts</a>
                          </li>
                      </ul>
                  </div>
              </li> --}}

          </ul>
      </div>
      <!-- Sidebar -->
  </div>
</div>