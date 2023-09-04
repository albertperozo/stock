<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class EmpresasController extends Controller
{
    //
    public function index()
    {
        //
        $datos['empresas'] = Empresas::paginate(10);
        return view('empresas.index',$datos);
    }
    public function edit($id)
    {
        //
        $empresa = Empresas::findOrFail($id);
        return view('empresas.edit', compact('empresa'));
    }
    public function update(Request $request, $id)
    {
        $datosEmpresa = $request->except(['_token','_method','id_empresa','nomEmpresa','estatus']);
        Empresas::where('id','=',$id)->update($datosEmpresa);
        $empresa = Empresas::findOrFail($id);
        return view('empresas.edit', compact('empresa'));
    }
}
