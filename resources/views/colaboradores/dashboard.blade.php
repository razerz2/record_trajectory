<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Menu trajetos -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-map-location-dot"></i>
          <p>
            Trajetos
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('trajetos.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Registrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('trajetos.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Trajetos</p>
            </a>
          </li>
        </ul>
      </li>
      <!--  Menu Gastos -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-dollar-sign"></i>
          <p>
            Despesas
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('despesas.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Registrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('despesas.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Despesas</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>