<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-info">Edición</div>

                <div class="card-body">
                    

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="inlineFormInputGroupUsername2" value="{{ $usuario->name }}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        
                            <label  class="col-md-4 col-form-label text-md-end" for="inputGroupSelect01">Empresa</label>
                            <div class="col-md-6">
                                <select name="id_empresa" class="custom-select" id="inputGroupSelect01">
                                    @if(!empty($usuario->nomEmpresa))
                                    <option value="{{ $usuario->id_empresa}}" selected>{{ $usuario->nomEmpresa }}</option>
                                    @endif
                                    <option value="0">-------------</option>
                                    @foreach($empresas as $empresa)
                                        <option value="{{ $empresa->id }}">{{ $empresa->nomEmpresa }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="{{ $modo }} datos">                                                                    
                                <a href="{{ url('usuarios/') }}"  class="btn btn-default">
                                    volver
                                </a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>