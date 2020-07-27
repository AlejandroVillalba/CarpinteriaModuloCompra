<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    public function __construct()
      {
        $this->middleware('auth');
      }
    public function index(Request $request)
    {
      if ($request->ajax()) {
        $users = User::all();

        return DataTables::of($users)
          ->addColumn('rol', function($user){
            foreach ($user->roles as $role) {
              return $role->name;
            }
          })
          ->addColumn('imagen', function($user){
            if (empty($user->imagen)) {
              return '';
            }
            return '<img src="imagenes/'.$user->imagen.'" width="50" height="50" />';
          })
          ->addColumn('action', 'usuarios.actions')
          ->rawColumns(['imagen', 'action']) //redendirizar las columnas que tenga html
          ->make(true); // para que la tabla muestre datos
      }
      return view('usuarios.index');
    }

    public function create()
    {
      $roles = Role::all();
      return view('usuarios.create', ['roles' => $roles]);
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
      $user = User::findOrFail($id);
      $roles = Role::all();
        return view('usuarios.edit', ['user' => $user, 'roles' => $roles]);
    }


    public function update(UserEditFormRequest $request, $id)
    {
      $this->validate(request(), ['email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id]]);
      $usuario = User::findOrFail($id);

      $usuario-> name = $request->get( 'name' );
      $usuario-> email = $request->get( 'email');

      if ($request->hasFile('imagen')) {
        $file = $request->imagen;
        $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
        $usuario->imagen = $file->getClientOriginalName();
      }
      // guardamos nuestro contraseña y validamos y preguntamos si el usuario escribio la contraseña significa que quiere actualizar y si no no hacemos nada
      $pass = $request->get('password');
      if ($pass != null) {
        $usuario->password = bcrypt($request->get('password'));
      }else {
        unset($usuario->password);
      }
      // guardamos el rol que tenemo y verificamos si es mayor a cero es que tiene un rol y le asignamos  a la varialble
      // role_id ese rol y con el modelo buscamos el id y actualizamos
      // si no tiene rol le asignamos un rol
      $role = $usuario->roles;
      if (count($role) > 0) {
        $role_id = $role[0]->id;
        User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);
      }else {
        $usuario->asignarRol($request->get('rol'));
      }



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
