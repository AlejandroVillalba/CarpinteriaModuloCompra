<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;
class UserController extends Controller
{

    public function index(Request $request)
    {

      if ($request) {
        $query = trim($request->get('search'));
        $users = User::where('name', 'LIKE', '%' . $query . '%')
          ->orderBy('id', 'asc')
          ->paginate(5);

        return view('usuarios.index', ['users' => $users, 'search'=> $query]);
      }
      //$users = User::all();
      //return view('usuarios.index', ['users' => $users]);
    }

    public function create()
    {
      $role = Role::all();
      return view('usuarios.create', ['roles' => $role]);
    }


    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario-> name = request( 'name');
        $usuario-> email = request( 'email');
        $usuario-> password = bcrypt (request( 'password'));
        if ($request->hasFile('imagen')) {
          $file = $request->imagen;
          $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
          $usuario->imagen = $file->getClientOriginalName();
        }
        // guardamos la contraseña encriptada para poder iniciar sesion desde nuestro agregar usuarios
        $usuario->save();

        $usuario->asignarRol($request->get('rol'));
        return redirect( '/usuarios');
    }


    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }


    public function edit($id)
    {
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
    }


    public function update(UserFormRequest $request, $id)
    {
      $usuario = User::findOrFail($id);

      $usuario-> name = $request->get( 'name' );
      $usuario-> email = $request->get( 'email');
      $usuario->update();

      return redirect( '/usuarios');
    }
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect( '/usuarios');
    }
}
