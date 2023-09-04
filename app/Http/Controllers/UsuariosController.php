<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\isNull;

class UsuariosController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('searchs');
        $consulta = DB::table('users')
            ->leftJoin('empresas', 'empresas.id', '=', 'users.id_empresa')
            ->select('users.id', 'users.name', 'users.email', 'users.id_empresa', 'empresas.nomEmpresa', 'empresas.estatus')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('id_empresa', 'LIKE', '%' . $search . '%');
                });
            })
            ->paginate(10);
            //dd($consulta);
        $usuarios = $consulta;

        return view('usuarios.index', compact('usuarios'));
    }
    public function show(){

    }
    public function edit($id)
    {
        $consulta = DB::table('users')
            ->leftJoin('empresas', 'empresas.id', '=', 'users.id_empresa')
            ->select('users.id', 'users.name', 'users.email', 'users.id_empresa', 'empresas.nomEmpresa')
            ->where('users.id','=',$id)
            ->first();
        /*$consulta = DB::table('users')
            ->leftJoin('empresas','users.id_empresa','=','empresas.id')
            ->select('users.id', 'users.name', 'users.email', 'users.id_empresa','empresas.id','empresas.nomEmpresa')
            ->where('users.id','=',$id)->get();*/
            //->first();
            //->get();            
        $usuario = $consulta;
        $empresas = DB::table('empresas')->select('empresas.id','empresas.nomEmpresa')->get();
    
        return view('usuarios.edit', compact(['usuario','empresas']));
    }
    public function update(Request $request, $id)
    {
        $datosUsuario = $request->except(['_token','_method']);
        $mensaje ='';
        //return response()->json($datosUsuario);
        $query = DB::table('users')->where('id','=',$id)->update($datosUsuario);
        //Usuarios::where('id','=',$id)->update($datosUsuario);
        if($query >0){
            $mensaje ='Registro actualizado correctamente...';
        }else{
            $mensaje ='Error a intentar actualizar el registro...';
        }
        return redirect()->route('usuarios.index',['mensaje'=> $mensaje]);
    }
    public function store(Request $request)
    {
        //
        //return redirect('usuarios')->with('mensaje','Registro Actaulizado correctamente!');
    }
    public function destroy($id)
    {
        //
        $mensaje='';
        $usuarioDel = DB::table('users')->where('id', $id)->delete();
        if(!$usuarioDel){
            $mensaje='Se produjo un error al intentar eliminar el registro';
        }else{
            $mensaje='Registro eliminado correctamente';
            
        }
        return redirect('usuarios')->with('mensaje',$mensaje);
    }
}
