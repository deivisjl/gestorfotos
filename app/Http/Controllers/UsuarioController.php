<?php namespace GestorImagenes\Http\Controllers;

use GestorImagenes\Http\Requests\EditarPerfilRequest;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getEditarPerfil(){

		return view('usuario.actualizar');

	}

	public function postEditarPerfil(EditarPerfilRequest $request){


		$usuario = Auth::user();
		$nombre = $request->get('nombre');
		
		$usuario->nombre = $nombre;

		if($request->has('password')){
			$usuario->password = bcrypt($request->get('password'));
		}
		if($request->has('pregunta')){
			$usuario->pregunta = $request->get('pregunta');
			$usuario->respuesta = $request->get('respuesta');
		}

		$usuario->save();

		return redirect('/validado')->with('actualizado','Su perfil ha sido actualizado');

	}

	public function missingMethod($parameters = array()){

		abort(404);

	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getCrearUsuario()
	{
		return 'formulario de crear Usuarios';
	}

	public function postCrearUsuario()
	{
		return 'almacenando Usuarios';
	}

	public function getActualizarUsuario()
	{
		return 'formulario de actualizar Usuarios';
	}

	public function postActualizarUsuario()
	{
		return 'actualizando Usuarios';
	}

	public function getEliminarUsuario()
	{
		return 'formulario de eliminar Usuarios';
	}

	public function postEliminarUsuario()
	{
		return 'eliminando Usuarios';
	}
}
