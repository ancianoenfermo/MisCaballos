<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

         <li class="nav-link {{request()->is('admin')  ? 'active' : ''}}">
            <a href="{{route('admin')}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>


    <li class="nav-item has-treeview menu-open mt-4{{request()->is('admin/caballos')  ? 'active' : ''}} ">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-horse-head"></i>
        <p>
          Caballos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        
        <li class="nav-item">
          <a href="{{route('admin.caballos.index')}}" class="nav-link {{request()->is('admin/caballos')  ? 'active' : ''}}">
            <i class="far fa-eye nav-icon"></i>
            <p>Mis caballos</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.caballos.create')}}" class="nav-link {{request()->is('admin/caballos/create')  ? 'active' : ''}}">
            <i class="fas fa-pencil-alt nav-icon"></i>
            <p>Nuevo caballo</p>
          </a>
        </li>
      </ul>
    </li>

  </ul>