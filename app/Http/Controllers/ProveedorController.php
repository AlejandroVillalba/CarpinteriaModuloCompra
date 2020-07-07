<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;

use App\Proveedor;
use App\Http\Requests\ProveedorFormRequest;

class ProveedorController extends Controller
{

    public function index(Request $request)
    {
        if ($request) {
        $query = trim($request->get('search'));
        $proveedor = Proveedor::where('nombreEmpresa', 'LIKE', '%' . $query . '%')
          ->orderBy('id', 'asc')
          ->paginate(5);
 
        return view('proveedor.index', ['proveedor' => $proveedor, 'search'=> $query]);
      }
    }


    public function create()
    {
        return view('proveedor.create');
    }


    public function store(Request $request)
    {
        $proveedor = new Proveedor();

        $proveedor-> nombreEmpresa = request( 'nombreEmpresa');
        $proveedor-> ruc = request( 'ruc');
        $proveedor-> direccion = request( 'direccion');
        $proveedor-> telefono = request( 'telefono');
        $proveedor-> email = request( 'email');

        $proveedor->save();

        return redirect( '/proveedor');
    }


    public function show($id)
    {
        return view('proveedor.show', ['proveedor' => Proveedor::findOrFail($id)]);
    }


    public function edit($id)
    {
        return view('proveedor.edit', ['proveedor' => Proveedor::findOrFail($id)]);
    }


    public function update(ProveedorFormRequest  $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor-> nombreEmpresa = $request->get( 'nombreEmpresa' );
        $proveedor-> ruc = $request->get( 'ruc');
        $proveedor-> direccion = $request->get( 'direccion');
        $proveedor-> telefono = $request->get( 'telefono');
        $proveedor-> email = $request->get( 'email');
        $proveedor->update();

        return redirect( '/proveedor');
    }


    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        
        $proveedor->delete();

        return redirect( '/proveedor');
    }
}
