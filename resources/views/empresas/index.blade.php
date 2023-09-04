@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Empresas</h1>

        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Rif</th>
                        <th>Empresa</th>
                        <th>Estatus</th>
                        <th>ID Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->codEmpresa }}</td>
                        <td>{{ $empresa->nomEmpresa }}</td>
                        <td>{{ $empresa->estatus }}</td>
                        <td>{{ $empresa->uid }}</td>
                        <td> 
                            <a href="{{ url('/empresas/'.$empresa->id.'/edit')}}" class="btn btn-warning">Editar</a>                       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $empresas->links('pagination::bootstrap-4') }}
        </div>
</div>
@endsection