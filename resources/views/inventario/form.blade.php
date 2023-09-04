<h3>Formulario de producto</h3>

    <div class="form-group">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="id_producto">ID Producto:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="id_producto" value="{{ $producto->id }}" name="id_producto" required readonly><br>
            </div>
        </div>

        <label for="id_empresa">ID Empresa:</label>
        <input type="text" id="id_empresa" name="id_empresa" required value="{{ $producto->id_empresa }}"><br>

        <label for="codProducto">Código de Producto:</label>
        <input type="text" id="codProducto" name="codProducto" required value="{{ $producto->codProducto }}"><br>

        <label for="descripcionProducto">Descripción del Producto:</label>
        <input type="text" id="descripcionProducto" name="descripcionProducto" required value="{{ $producto->descripcionProducto }}"><br>

        <label for="descripcionGrupo">Descripción del Grupo:</label>
        <input type="text" id="descripcionGrupo" name="descripcionGrupo" required value="{{ $producto->descripcionGrupo }}"><br>

        <label for="descripcionSubGrupo">Descripción del Subgrupo:</label>
        <input type="text" id="descripcionSubGrupo" name="descripcionSubGrupo" required value="{{ $producto->descripcionSubGrupo }}"><br>

        <label for="existencia">Existencia:</label>
        <input type="number" id="existencia" name="existencia" required value="{{ $producto->existencia }}"><br>

        <label for="precioREF1">Precio Referencia 1:</label>
        <input type="number" id="precioREF1" name="precioREF1" step="0.01" required value="{{ $producto->precioREF1 }}"><br>

        <label for="precioREF2">Precio Referencia 2:</label>
        <input type="number" id="precioREF2" name="precioREF2" step="0.01" required value="{{ $producto->precioREF2 }}"><br>

        <label for="precioREF3">Precio Referencia 3:</label>
        <input type="number" id="precioREF3" name="precioREF3" step="0.01" required value="{{ $producto->precioREF3 }}"><br>

        <label for="precioREF4">Precio Referencia 4:</label>
        <input type="number" id="precioREF4" name="precioREF4" step="0.01" required value="{{ $producto->precioREF4 }}"><br>

        <label for="precioREF5">Precio Referencia 5:</label>
        <input type="number" id="precioREF5" name="precioREF5" step="0.01" required value="{{ $producto->precioREF5 }}"><br>

        <label for="costoPromedio">Costo Promedio:</label>
        <input type="number" id="costoPromedio" name="costoPromedio" step="0.01" required value="{{ $producto->costoPromedio }}"><br>

        <input type="submit" value="{{ $modo }} datos">
        <a href="{{ url('inventario/')}}">Volver</a>
    </div>