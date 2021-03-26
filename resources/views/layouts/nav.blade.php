<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="profile-image">
            <img src="{{asset('image/1616704905_marvel-spider.jpg')}}" alt="image"/>
          </div>
          <div class="profile-name">
            <p class="name">
              {{auth::user()->name}}
            </p>
            <p class="designation">
                {{auth::user()->roles()->get()[0]->name}}
            </p>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{-- menu --}}

      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="fa fa-tags menu-icon"></i>
          <span class="menu-title">Categorias</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('clients.index')}}">
          <i class="fas fa-users menu-icon"></i>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
          <i class="fa fa-boxes menu-icon"></i>
          <span class="menu-title">Productos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('providers.index')}}">
          <i class="fa fa-truck menu-icon"></i>
          <span class="menu-title">Proveedores</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('purchases.index')}}">
          <i class="fa fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fa fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#configuracion" aria-expanded="false" aria-controls="configuracion">
          <i class="fa fa-cogs menu-icon"></i>
          <span class="menu-title">Configuracion</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="configuracion">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('business.index')}}">Empresa</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('printers.index')}}">Impresora</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fa fa-user-tag menu-icon"></i>
          <span class="menu-title">Usuarios</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('roles.index')}}">
          <i class="fa fa-user-cog menu-icon"></i>
          <span class="menu-title">Roles</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#reportes" aria-expanded="false" aria-controls="reportes">
          <i class="fa fa-chart-line menu-icon"></i>
          <span class="menu-title">Reportes</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="reportes">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{route('reports.day')}}">Reportes por dia</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a></li>
          </ul>
        </div>
      </li>
{{--
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
          <i class="fab fa-trello menu-icon"></i>
          <span class="menu-title">Page Layouts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="melody/pages/layout/boxed-layout.html">Boxed</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/rtl-layout.html">RTL</a></li>
            <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="melody/pages/layout/horizontal-menu.html">Horizontal Menu</a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item d-none d-lg-block">
        <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
          <i class="fas fa-columns menu-icon"></i>
          <span class="menu-title">Sidebar Layouts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sidebar-layouts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/compact-menu.html">Compact menu</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/sidebar-collapsed.html">Icon menu</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/sidebar-hidden.html">Sidebar Hidden</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/sidebar-hidden-overlay.html">Sidebar Overlay</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/layout/sidebar-fixed.html">Sidebar Fixed</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="far fa-compass menu-icon"></i>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/accordions.html">Accordions</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/badges.html">Badges</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/breadcrumbs.html">Breadcrumbs</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/modals.html">Modals</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/progress.html">Progress bar</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/pagination.html">Pagination</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/tabs.html">Tabs</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/typography.html">Typography</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/tooltips.html">Tooltips</a></li>
          </ul>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
          <i class="fas fa-clipboard-list menu-icon"></i>
          <span class="menu-title">Advanced Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-advanced">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/dragula.html">Dragula</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/clipboard.html">Clipboard</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/context-menu.html">Context menu</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/slider.html">Sliders</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/carousel.html">Carousel</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/colcade.html">Colcade</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/ui-features/loaders.html">Loaders</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="fab fa-wpforms menu-icon"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/basic_elements.html">Basic Elements</a></li>
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/advanced_elements.html">Advanced Elements</a></li>
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/validation.html">Validation</a></li>
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/wizard.html">Wizard</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
          <i class="fas fa-pen-square menu-icon"></i>
          <span class="menu-title">Editors</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="editors">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/text_editor.html">Text editors</a></li>
            <li class="nav-item"><a class="nav-link" href="melody/pages/forms/code_editor.html">Code editors</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="fas fa-chart-pie menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/chartjs.html">ChartJs</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/morris.html">Morris</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/flot-chart.html">Flot</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/google-charts.html">Google charts</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/sparkline.html">Sparkline js</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/c3.html">C3 charts</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/chartist.html">Chartists</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/charts/justGage.html">JustGage</a></li>
          </ul>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="fas fa-table menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/tables/basic-table.html">Basic table</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/tables/data-table.html">Data table</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/tables/js-grid.html">Js-grid</a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/tables/sortable-table.html">Sortable table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/popups.html">
          <i class="fas fa-minus-square menu-icon"></i>
          <span class="menu-title">Popups</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/ui-features/notifications.html">
          <i class="fas fa-bell menu-icon"></i>
          <span class="menu-title">Notifications</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="fa fa-stop-circle menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/flag-icons.html">Flag icons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/icons/simple-line-icon.html">Simple line icons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/icons/themify.html">Themify icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
          <i class="fas fa-map-marker-alt menu-icon"></i>
          <span class="menu-title">Maps</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="maps">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/maps/mapeal.html">Mapeal</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/maps/vector-map.html">Vector Map</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/maps/google-maps.html">Google Map</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="fas fa-window-restore menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="fas fa-exclamation-circle menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <i class="fas fa-file menu-icon"></i>
          <span class="menu-title">General Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/profile.html"> Profile </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/faq.html"> FAQ </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/faq-2.html"> FAQ 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/news-grid.html"> News grid </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/timeline.html"> Timeline </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/search-results.html"> Search Results </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/portfolio.html"> Portfolio </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
          <i class="fas fa-briefcase menu-icon"></i>
          <span class="menu-title">Apps</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="apps">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="melody/pages/apps/email.html"> Email </a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/apps/calendar.html"> Calendar </a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/apps/todo.html"> Todo </a></li>
            <li class="nav-item"> <a class="nav-link" href="melody/pages/apps/gallery.html"> Gallery </a></li>
          </ul>`
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">E-commerce</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="e-commerce">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/invoice.html"> Invoice </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/pricing-table.html"> Pricing Table </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders </a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="melody/pages/documentation.html">
          <i class="far fa-file-alt menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
