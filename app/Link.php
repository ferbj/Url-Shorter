<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	//modelo de la tabla links.
	//atributos declarado en el arreglo fillable.
    protected $table= 'links';
    protected $fillable = ['url','hash','ip','contador'];

	//metodo que genera el hash con 10 caracteres aleatorios y 
	//permite setear el valor del url asi como el valor del hash.
 	public function setUrlAttribute($valor)
	{

        $hash = str_random(10);
        $this->attributes['url']  = $valor;
        $this->attributes['hash'] = $hash;
	}
	
	//metodo que obtengo la direccion desde un Hash
	public function getHash($hash)
	{
        return $this->where('hash', $hash)->first();
	}
	
}
