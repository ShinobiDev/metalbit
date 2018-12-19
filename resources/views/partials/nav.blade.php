<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENÚ DE NAVEGACION</li>

  <li class="{{setActiveRoute('welcome')}}">
      <a href="{{route('welcome')}}">
      <i class="fa fa-dashboard"></i> <span>Inicio</span>
    </a>
  </li>

@can ('view', new \App\User)
  <li class="treeview {{setActiveRoute(['users.index','users.create'])}}">
    <a href="#">
      <i class="fa fa-users"></i>
      <span>Usuarios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu ">
      <li class="{{setActiveRoute('users.index')}}"><a href="{{route('users.index')}}"><i class="fa fa-eye"></i>Lista De Usuarios</a></li>
      <li class="{{setActiveRoute('users.create')}}"><a href="{{route('users.create')}}"><i class="fa fa-user-plus"></i>Crear Usuario</a></li>
    </ul>
  </li>
@else
  <li class="{{setActiveRoute(['users.edit', 'users.show'])}}">
    <a href="{{route('users.show', auth()->user())}}">
      <i class="fa fa-user"></i>
      <span>Perfil</span>
    </a>
  </li>
@endcan

@can ('view', new \Spatie\Permission\Models\Role)
    <li class="{{setActiveRoute(['roles.index','roles.create'])}}">
      <a href="{{route('roles.index')}}">
        <i class="fa fa-street-view"></i>
        <span>Roles</span>
      </a>
    </li>
@endcan

@can ('view', new \Spatie\Permission\Models\Permission)
    <li class="{{setActiveRoute(['permissions.index','permissions.create'])}}">
      <a href="{{route('permissions.index')}}">
        <i class="fa fa-address-book"></i>
        <span>Permisos</span>
      </a>
    </li>
@endcan





  {{--<li>
     <a href="../widgets.html">
      <i class="fa fa-th"></i> <span>Widgets</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green">Hot</small>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
      <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
      <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
      <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-pie-chart"></i>
      <span>Charts</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
      <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
      <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
      <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-laptop"></i>
      <span>UI Elements</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
      <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
      <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
      <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
      <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
      <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Forms</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
      <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
      <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-table"></i> <span>Tables</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
      <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
    </ul>
  </li>
  <li>
    <a href="../calendar.html">
      <i class="fa fa-calendar"></i> <span>Calendar</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-red">3</small>
        <small class="label pull-right bg-blue">17</small>
      </span>
    </a>
  </li>
  <li>
    <a href="../mailbox/mailbox.html">
      <i class="fa fa-envelope"></i> <span>Mailbox</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-yellow">12</small>
        <small class="label pull-right bg-green">16</small>
        <small class="label pull-right bg-red">5</small>
      </span>
    </a>
  </li>
  <li class="treeview active">
    <a href="#">
      <i class="fa fa-folder"></i> <span>Examples</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
      <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
      <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
      <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
      <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
      <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
      <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
      <li><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
      <li class="active"><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Multilevel</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-circle-o"></i> Level One
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level Two
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
    </ul>
  </li>
  <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
  <li class="header">LABELS</li>
  <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
</ul>
