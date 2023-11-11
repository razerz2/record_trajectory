<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Menu Usuários -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Usuários
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('usuarios.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('usuarios.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Usuários</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('usuarios.inativos')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inativos</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Menu Veículos -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-car"></i>
          <p>
            Veículos
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('veiculos.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('veiculos.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Veículos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('veiculos.inativos')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inativos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('userVeiculos.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Associar Veículo</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Menu Locais -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-location-dot"></i>
          <p>
            Locais
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('locais.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('locais.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Locais</p>
            </a>
          </li>
        </ul>
      </li>
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
            <a href="{{route('percursos.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('percursos.index')}}" class="nav-link">
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
            <a href="{{route('gastos.create')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cadastrar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('gastos.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Despesas</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-header">Relatórios</li>
      <!-- Relatório de Quilometragem -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-car-side"></i>
          <p>
            Quilometragem
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Mensal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Anual</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Por período</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Relatório de Gastos por Veículo -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-hand-holding-dollar"></i>
          <p>
            Despesas por Veículos
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/UI/general.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Mensal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Anual</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Por período</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Relatório de QMédia(KM) -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-road"></i>
          <p>
            Média(KM) por Litro
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/UI/general.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Mensal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Anual</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Por período</p>
            </a>
          </li>
        </ul>
      </li>      
    </ul>
  </nav>