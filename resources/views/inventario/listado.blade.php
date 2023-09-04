@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
    </nav>
    <div class="container">
        <form method="GET" action="{{ route('inventario.show','inventario') }}">
            <!--div class="form-row"-->
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
                        
                        
                <!--/div-->
            
        </form>
        @php
            //print_r($listado);
        @endphp
        @if ($listado->isEmpty())
        <div class="alert alert-danger" role="alert">
            <p>No se encontraron resultados.</p>
        </div>
        
        @else
        <h3> {{ $listado->first()->nomEmpresa }}</h3>
        <div class="mx-auto" style="width: 200px;"> 
            <p class="font-weight-bold"><span class="alert"> Total de registros: {{ $listado->total() }} </span></p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Grupo</th>
                        <th>Sub Grupo</th>
                        <th>Existencia</th>
                        <th>Precio 1</th>
                        <th>Precio 2</th>
                        <th>Precio 3</th>
                        <th>Precio 4</th>
                        <th>Precio 5</th>
                        <th>Costo Promedio</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($listado as $inventario)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $inventario->codProducto }}</td>
                            <td>{{ $inventario->descripcionProducto }}</td>
                            <td>{{ $inventario->descripcionGrupo }}</td>
                            <td>{{ $inventario->descripcionSubGrupo }}</td>
                            <td>{{ $inventario->existencia }}</td>
                            <td>{{ $inventario->precioREF1 }}</td>
                            <td>{{ $inventario->precioREF2 }}</td>
                            <td>{{ $inventario->precioREF3 }}</td>
                            <td>{{ $inventario->precioREF4 }}</td>
                            <td>{{ $inventario->precioREF5 }}</td>
                            <td>{{ $inventario->costoPromedio }}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    <div class="d-flex justify-content-center">
    {{ $listado->links('pagination::bootstrap-4') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm">
            
            </div>
            <div class="col-sm">
            
            </div>
            <div class="col-sm">
            
            </div>
            <hr>
        </div>
        
    </div>
</div>
@endsection