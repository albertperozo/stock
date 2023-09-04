<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;
use App\Models\Empresas;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $search = $request->input('search'); // Datos suministrados por el usuario desde el formulario    
        // Construir la consulta
        $consulta = Inventario::whereHas('empresa', function ($query) use ($user_id) {
            $query->where('uid', $user_id);
        })
        ->where(function ($query) use ($search) {
            $query->where('codProducto', 'LIKE', '%'.$search.'%')
                ->orWhere('descripcionProducto', 'LIKE', '%'.$search.'%')
                ->orWhere('descripcionGrupo', 'LIKE', '%'.$search.'%')
                ->orWhere('descripcionSubGrupo', 'LIKE', '%'.$search.'%');
        })
        ->with(['empresa:id,nomEmpresa'])
        ->paginate(10);
    
        return view('inventario.productos', compact('consulta'));
    }


    public function empresasproductos(){

        $empresasConInventarios = Empresas::with('listarproductos')->get();
        return view('inventario.listado', compact('empresasConInventarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return redirect('inventario')->with('mensaje','Registro agregado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $uid = auth()->id();
        $search = $request->input('searchs'); // Datos suministrados por el usuario desde el formulario
        $listado = DB::table('users')
        ->join('empresas','users.id_empresa','=','empresas.id')
        ->join('inventarios','empresas.id','=','inventarios.id_empresa')
        ->select('users.id_empresa','empresas.*','inventarios.*')
        ->where('users.id','=',$uid)
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->orWhere('descripcionProducto', 'LIKE', '%' . $search . '%')
                    ->orWhere('descripcionGrupo', 'LIKE', '%' . $search . '%')
                    ->orWhere('descripcionSubGrupo', 'LIKE', '%' . $search . '%');
            });
        })
        ->paginate(10);     
        return view('inventario.listado',['listado' => $listado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $producto = Inventario::findOrFail($id);
        return view('inventario.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //$datosProductos = $request()->except(['_token','_method']);
        $datosProductos = $request->except(['_token','_method','id_producto']);
        Inventario::where('id','=',$id)->update($datosProductos);
        $producto = Inventario::findOrFail($id);
        return view('inventario.edit', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Inventario::destroy($id);
        return redirect('inventario')->with('mensaje','Registro eliminado correctamente!');
    }
}
