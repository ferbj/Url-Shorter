<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LinksRequest;
use App\Link;
use Laracasts\Flash\Flash;
use DB;

class LinksController extends Controller
{
    //constructor
	public function __construct()
    {
        $this->link = new Link;
    }
    //obtengo toda la collecion de datos de mi tabla Link 
    //envio los valores a mi vista home.
    public function index(){
        $links = Link::all();
        return view('home')->with(compact('links'));
    }

    //metodo que uso para guardar los datos en la BD.
    public function store(LinksRequest $request)
    {
        //comparo si existe url en la bd, si existe el url el contador incrementa en 1 
        if ($this->link->where('url',$request->url)->exists()) {
            DB::table('links')->where('url',$request->url)->increment('contador',1);
            return redirect()->back()->with('link',$this->link->hash);
        }
        else{
        //si no existe se crea un nuevo enlace y el contador incrementa su valor en 1 asi 
        //como tambien obtengo el ip y se genera el hash del link.
            $link = new Link($request->all());
            $link->contador = 1;
            $link->url = $request->url;
            $link->ip = $request->ip('url');
            Flash::success('El Url ha sido acortado');   
            $link->save();
            return redirect()->back()->with('link',$link->hash);
          
        }   
    }	
    //redirecciona metodo que permite obtener el hash de la BD y 
    //hace el redireccionamiento a link de destino.
    public function redirecciona($hash)
    {
        if (!$link = $this->link->getHash($hash)) {
           abort(404);
       }
       return redirect($link->url);
      }
   



}
