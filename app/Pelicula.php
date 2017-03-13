<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Pelicula extends Model
{
    protected $table = "peliculas";
    protected $fillable = ['nombre','reparto','ruta','direccion','duracion','genero_id'];

    public function setPathAttribute($ruta){
    	if(! empty($ruta)){

    		$nombre = Carbon::now()->second.$path->getClientOriginalName();
			$this->attributes['ruta'] = $nombre;
			\Storage::disk('local')->put($nombre, \File::get($ruta));

			//$this->attributes['ruta'] = $nombre; //Carbon::now()->second.$ruta->getClientOriginalName();
			//$nombre = Carbon::now()->second.$ruta->getClientOriginalName();
			//\Storage::disk('local')->put($nombre, \File::get($ruta));
    	}
	}

	public static function Peliculas(){
		return DB::table('peliculas')
			->join('generos','generos.id','=','peliculas.genero_id')
			->select('peliculas.*', 'generos.genero')
			->get();
	}
}