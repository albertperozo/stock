@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Inventario</h1>

        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Codigo Producto</th>
                        <th>Descripcion Producto</th>
                        <th>Descripcion Grupo</th>
                        <th>Descripcion Sub Grupo</th>
                        <th>Existencia</th>
                        <th>Precio 1</th>
                        <th>Precio 2</th>
                        <th>Precio 3</th>
                        <th>Precio 4</th>
                        <th>Precio 5</th>
                        <th>Costo Promedio</th>
                        <!--th>Acciones </th-->

                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventario as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->id_empresa }}</td>
                        <td>{{ $producto->codProducto }}</td>
                        <td>{{ $producto->descripcionProducto }}</td>
                        <td>{{ $producto->descripcionGrupo }}</td>
                        <td>{{ $producto->descripcionSubGrupo }}</td>
                        <td>{{ $producto->existencia }}</td>
                        <td>{{ $producto->precioREF1 }}</td>
                        <td>{{ $producto->precioREF2 }}</td>
                        <td>{{ $producto->precioREF3 }}</td>
                        <td>{{ $producto->precioREF4 }}</td>
                        <td>{{ $producto->precioREF5 }}</td>
                        <td>{{ $producto->costoPromedio }}</td>
                        <!--td>
                            <a href="{{ url('/inventario/'.$producto->id.'/edit')}}" class="btn btn-warning" >
                                Editar
                            </a>
                            |
                            <form action="{{ url('/inventario/'.$producto->id ) }}" method="post" class="d-inline">
                                @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                            </form>
                        </td-->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $inventario->links('pagination::bootstrap-4') }}
        </div>
</div>
@endsection
