

@auth        
    <li class="nav-item">
        <a href="{{ url('inventario/listado')}}" class="nav-link" >
            Productos
        </a>
    </li>
    @if(auth()->id() == 1)
        <li class="nav-item">
            <a href="{{ url('empresas/')}}" class="nav-link" >
                Empresas
            </a>
        </li>        
        <li class="nav-item">
            <a class="nav-link" href="{{ url('usuarios') }}">Usuarios</a>
        </li>        
    @endif                
@endauth
    