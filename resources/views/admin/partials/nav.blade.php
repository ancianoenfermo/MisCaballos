<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

  <li class="nav-item">
    <a href="{{route('admin')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>Dasboard
      </p>
    </a>
  </li>
   
<li class="nav-item has-treeview mt-3  {{request()->is('admin/caballos/*')  ? 'menu-open' : ''}}">
    <a href="#" class="nav-link {{request()->is('admin/caballos/*')  ? 'active' : ''}} ">
      <i class="nav-icon fas fa-horse-head"></i>
      <p>Caballos<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
      
      <li class="nav-item ml-4">
        <a href="{{route('admin.caballos.index')}}" class="nav-link {{request()->is('admin/caballos/miscaballos')  ? 'active' : ''}}">
          <i class="far fa-eye nav-icon"></i>
          <p>Mis caballos</p>
        </a>
      </li>

      <li class="nav-item ml-4">
        <a href="{{route('admin.caballos.create')}}" class="nav-link {{request()->is('admin/caballos/create')  ? 'active' : ''}}">
          <i class="fas fa-pencil-alt nav-icon"></i>
          <p>Nuevo caballo</p>
        </a>
      </li>
    </ul>
  </li>
  
  <li class="nav-item mt-3">
    <a href="{{route('logout')}}" class="nav-link"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"
    >
      <i class="nav-icon fas fa-power-off"></i>
      <p>Cerrar sesión
      </p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </li> 
  
  </ul>

  