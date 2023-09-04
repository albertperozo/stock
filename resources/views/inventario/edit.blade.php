@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edicion de Inventario</h1>

        <form action="{{ url('/inventario/'.$producto->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('inventario.form',['modo'=>'Editar'])
        </form>
    </div>
@endsection