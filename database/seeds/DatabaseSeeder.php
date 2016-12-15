<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use GestorImagenes\Album;
use GestorImagenes\Foto;
use GestorImagenes\Usuario;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		//DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		//Foto::truncate();
		//Album::truncate();
		//Usuario::truncate();

		//$this->call(UsuariosSeeder::class);
		//$this->call(AlbumesSeeder::class);
		//$this->call(FotosSeeder::class);

	

		/*for($i = 0; $i < 50; $i++){
			DB::table('usuarios')->insert([
            'nombre' => "usuario $i",
			'email' => "email$i@test.com",
			'password' => bcrypt("pass$i"),
			'pregunta' => "preg$i",
			'respuesta' => "resp$i"
        ]);
		}*/

		/*$usuarios = Usuario::all();

		foreach ($usuarios as $usuario) {

			$cantidad = rand(0, 15);

			for ($i=0; $i < $cantidad; $i++) { 

				Album::create([
					'nombre' => "Nombre album $i",
					'descripcion' => "Descripcion album $i",
					'usuario_id' => $usuario->id
					]);
			}
		}*/


		/*$albumes = Album::all();

		foreach ($albumes as $album) {

			$cantidad = rand(0,5);

			for ($i=0; $i < $cantidad; $i++) { 

				Foto::create([
					'nombre' => "Nombre album $i",
					'descripcion' => "Descripcion album $i",
					'ruta' => '/img/text.png',
					'album_id' => $album->id
					]);
			}
		}*/


	}

}
