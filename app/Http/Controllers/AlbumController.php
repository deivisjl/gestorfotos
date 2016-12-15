<?php namespace GestorImagenes\Http\Controllers;

class AlbumController extends Controller {

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
	public function getIndex(){
		return 'mostrando album del usuario';
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getCrearAlbum()
	{
		return 'formulario de crear Albums';
	}

	public function postCrearAlbum()
	{
		return 'almacenando Albums';
	}

	public function getActualizarAlbum()
	{
		return 'formulario de actualizar Albums';
	}

	public function postActualizarAlbum()
	{
		return 'actualizando Albums';
	}

	public function getEliminarAlbum()
	{
		return 'formulario de eliminar Albums';
	}

	public function postEliminarAlbum()
	{
		return 'eliminando Albums';
	}

	public function missingMethod($parameters = array()){

		abort(404);

	}
}
