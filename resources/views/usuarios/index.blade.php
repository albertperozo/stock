@extends('layouts.app')

@section('content')
<div class="container">
        <div class="container">
        <form method="GET" action="{{ route('usuarios.index') }}">
            <table>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="searchs" placeholder="ingrese para buscar...">
                    </td>
                    <td>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    </td>
                </tr>
                <tr><td><br></td><td></td></tr>
            </table>
        </form>
        <h1>Lista de Usuarios</h1>
        @if(Session::has('mensaje'))        
            <p class="alert alert-info">{{ Session::get('mensaje') }}</p>
        @endif
        @php
            //var_dump($usuarios);
        @endphp
        <h1> </h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Empresa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->nomEmpresa }}</td>                        
                        <td> 
                            <a href="{{ url('/usuarios/'.$usuario->id.'/edit') }}"  class="btn btn-warning">Editar</a>
                            <form action="{{ url('/usuarios/'.$usuario->id ) }}" method="post" class="d-inline">
                                @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quieres borrar el registro selecionado ?')" value="Borrar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $usuarios->links('pagination::bootstrap-4') }}
        </div>
</div>
@endsection