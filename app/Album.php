<?php namespace GestorImagenes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Album extends Model  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'albumes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','nombre', 'descripcion', 'usuario_id'];

 	//Un album tiene muchas fotos
	public function fotos(){

		return $this->hasMany('GestorImagenes\Foto');

	}

	//Un album pertenece a un usuario
	public function propietario(){

		return $this->belongsTo('GestorImagenes\Usuario');

	}

}
