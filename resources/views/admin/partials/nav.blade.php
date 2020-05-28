<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>


    <li class="nav-item has-treeview menu-close mt-2">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-horse-head"></i>
        <p>
          Caballos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('admin.caballos.index')}}" class="nav-link">
            <i class="far fa-eye nav-icon"></i>
            <p>Mis caballos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.caballos.create')}}" class="nav-link">
            <i class="fas fa-pencil-alt nav-icon"></i>
            <p>Nuevo caballo</p>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="nav-item has-treeview menu-close mt-2">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-trailer"></i>
          <p>
            Vans
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.vans.index')}}" class="nav-link">
              <i class="far fa-eye nav-icon"></i>
              <p>Mis van</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.vans.create')}}" class="nav-link">
              <i class="fas fa-pencil-alt nav-icon"></i>
              <p>Nuevo van</p>
            </a>
          </li>
        </ul>
      </li>

  </ul>