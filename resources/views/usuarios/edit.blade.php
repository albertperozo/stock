@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edicion de Usuario</h1>
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <form action="{{ url('/usuarios/'.$usuario->id) }}" method="post">
            @method('PATCH')    
            @csrf
            @include('usuarios.form',['modo'=>'Editar'])
        </form>
    </div>
@endsection
