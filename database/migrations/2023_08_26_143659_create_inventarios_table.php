<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empresa');
            $table->string('codProducto');
            $table->string('descripcionProducto');
            $table->string('descripcionGrupo');
            $table->string('descripionDubGrupo');
            $table->decimal('existencia', 10, 2);
            $table->decimal('precioREF1', 10, 2);
            $table->decimal('precioREF2', 10, 2);
            $table->decimal('precioREF3', 10, 2);
            $table->decimal('precioREF4', 10, 2);
            $table->decimal('precioREF5', 10, 2);
            $table->decimal('costoPromedio', 10, 2);
            $table->timestamps();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onUpdate('cascade');
        });

        /*SELECT id_producto, id_empresa, codProducto, descripcionProducto, descripcionGrupo, descripcionSubGrupo,
         existencia, precioREF1, precioREF2, precioREF3, precioREF4, precioREF5, costoPromedio, fechaActualizacion
        FROM albertpz_apps.mod_Inventario;*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
