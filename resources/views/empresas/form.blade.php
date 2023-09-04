    <div class="form-inline">        
        <!--label class="sr-only" for="inlineFormInputGroupUsername1">ID</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">ID</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername1" value="{{ $empresa->id }}" name="id_empresa" readonly>
        </div-->

        <label class="sr-only" for="inlineFormInputGroupUsername1">Empresa</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Empresa</div>
            </div>
            <input type="text" class="form-control" name="nomEmpresa" id="inlineFormInputGroupUsername2" value="{{ $empresa->nomEmpresa }}" readonly>
        </div>

        <label class="sr-only" for="inlineFormInputGroupUsername3">Estatus</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Estatus</div>
            </div>
            <input type="text" class="form-control" name="estatus" id="inlineFormInputGroupUsername3" value="{{ $empresa->estatus }}" readonly>
        </div>

        <label class="sr-only" for="inlineFormInputGroupUsername3">ID usuario</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">UID</div>
            </div>
            <input type="number" class="form-control" name="uid" id="inlineFormInputGroupUsername4" value="{{ $empresa->uid }}">
        </div>
        
        <input type="submit" class="btn btn-info" value="{{ $modo }} datos">
        <span>&nbsp; &nbsp;</span>
        <a class="btn btn-secondary" href="{{ url('empresas/')}}">Volver</a>
    </div>