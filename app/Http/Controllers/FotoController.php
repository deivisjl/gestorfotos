<?php namespace GestorImagenes\Http\Controllers;

use GestorImagenes\Http\Requests\MostrarFotoRequest;
use GestorImagenes\Http\Requests\CrearFotoRequest;
use GestorImagenes\Http\Requests\ActualizarFotoRequest;
use GestorImagenes\Http\Requests\EliminarFotoRequest;


use Illuminate\Http\Request;
use GestorImagenes\Album;
use GestorImagenes\Foto;

use Carbon\Carbon;

class FotoController extends Controller {

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

	public function getIndex(MostrarFotoRequest $request){
		
		$id = $request->get('id');

		$fotos = Album::find($id)->fotos;

		return view('fotos.mostrar', ['fotos' => $fotos, 'id' => $id]); 
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getCrearFoto(Request $request)
	{
		$id = $request->get('id');

		return view('fotos.crear-foto', ['id' => $id]);
	}

	public function postCrearFoto(CrearFotoRequest $request)
	{
		$id = $request->get('id');
		$imagen = $request->file('imagen');

		$ruta = '/img/';
		$nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();

		$imagen->move(getcwd().$ruta,$nombre);

		Foto::create(
			[
				'nombre' => $request->get('nombre'),
				'descripcion' => $request->get('descripcion'),
				'ruta' => $ruta.$nombre,
				'album_id' => $id
			]);

		return redirect("/validado/fotos?id=$id")->with('creada','La foto ha sido subida');
	}

	public function getActualizarFoto($id)
	{
		$foto = Foto::find($id);

		return view('fotos.actualizar-foto', ['foto' => $foto]);
	}

	public function postActualizarFoto(ActualizarFotoRequest $request)
	{

		$foto = Foto::find($request->get('id'));

		$foto->nombre = $request->get('nombre');

		$foto->descripcion = $request->get('descripcion');

		if($request->hasFile('imagen')){			

			$imagen = $request->file('imagen');

			$ruta = '/img/';

			$nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();

			$imagen->move(getcwd().$ruta,$nombre);

			$rutaanterior = getcwd().$foto->ruta;

			if(file_exists($rutaanterior)){

				unlink(realpath($rutaanterior));
				
			}


			$foto->ruta = $ruta.$nombre;

		}

		$foto->save();

		return view("/validado/fotos?id=$foto->album_id")->with('editada','La foto fue editada');
	}

	public function getEliminarFoto()
	{
		return null;
	}

	public function postEliminarFoto(EliminarFotoRequest $request)
	{
		$foto = Foto::find($request->get('id'));

		$rutaanterior = getcwd().$foto->ruta;

		if(file_exists($rutaanterior)){

			unlink(realpath($rutaanterior));
		}

		$foto->delete();

		return view("/validado/fotos?id=$foto->album_id")->with('eliminado','La foto fue eliminada');
	}

	public function missingMethod($parameters = array()){

		abort(404);

	}
}
