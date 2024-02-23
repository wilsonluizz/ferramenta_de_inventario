<nav class="navbar-dark bg-dark px-1 vh-100 pt-5">
    <div class="pt-4">

        <ul class="nav nav-pills nav-flush flex-sm-column flex-row">
    
            @can('admin')
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : 'text-white' }}">
                        <i class="bi bi-gear-fill fs-4"></i>
                        <span class="nav-label ms-2 ">Configurações</span>
                    </a>
                </li>
        
                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-people-fill fs-4"></i>
                        <span class="nav-label ms-2 ">Usuários</span>
                    </a>
                </li>
        
                <li class="nav-item">
                    <a href="{{ route('perfis.index') }}" class="nav-link {{ request()->routeIs('perfis.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-person-badge fs-4"></i>
                        <span class="nav-label ms-2">Perfis e permissões</span>
                    </a>
                </li>

                @can('dev')
                <li class="nav-item">
                    <a href="{{ route('permissoes.index') }}" class="nav-link text-white {{ request()->routeIs('permissoes.*') ? 'active' : '' }}" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="permissoes">
                        <i class="bi bi-toggles fs-4"></i>
                        <span class="nav-label ms-2 ">Permissões</span>
                    </a>
                </li>
                @endcan

                <hr class="text-white" />

                {{-- GERENCIAMENTO DA APLICAÇÃO - INVENTÁRIO --}}

                {{-- GERENCIAR MARCAS DE EQUIPAMENTOS --}}
                <li class="nav-item">
                    <a href="{{ route('marca.index') }}" class="nav-link {{ request()->routeIs('marca.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-c-circle fs-4"></i>
                        <span class="nav-label ms-2 ">Marcas</span>
                    </a>
                </li>

                {{-- GERENCIAR TIPOS DE EQUIPAMENTOS --}}
                <li class="nav-item">
                    <a href="{{ route('tipo.index') }}" class="nav-link {{ request()->routeIs('tipo.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-box-seam-fill fs-4"></i>
                        <span class="nav-label ms-2 ">Tipos de equipamento</span>
                    </a>
                </li>

                {{-- GERENCIAR CATEGORIAS --}}
                <li class="nav-item">
                    <a href="{{ route('categoria.index') }}" class="nav-link {{ request()->routeIs('categoria.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-tag-fill fs-4"></i>
                        <span class="nav-label ms-2 ">Categorias contábeis</span>
                    </a>
                </li>


                <hr class="text-white" />


                {{-- GERENCIAR CENTROS DE CUSTO --}}
                <li class="nav-item">
                    <a href="{{ route('centros-de-custo.index') }}" class="nav-link {{ request()->routeIs('centros-de-custo.*') ? 'active' : 'text-white' }}">
                        <i class="bi bi-currency-dollar fs-4"></i>
                        <span class="nav-label ms-2 ">Centros de custo</span>
                    </a>
                </li>
                
    
            @endcan
    
    
            
        </ul>
    </div>
</nav>