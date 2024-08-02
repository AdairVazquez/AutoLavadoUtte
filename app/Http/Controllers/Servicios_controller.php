<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use App\Models\servicios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Servicios_controller extends Controller
{
    public function store(Request $req){
        if($req->id == 0){
            $servicio = new servicios();
            }else{
            $servicio = Servicios::find($req->id);
        }
        $servicio -> codigo = $req -> txtCodigo;
        $servicio -> nombre = $req -> txtNombre;
        $servicio -> descripcion = $req -> txtDescripcion;
        $servicio -> precio = $req -> txtPrecio;
        $servicio->save();
        return redirect()->route("servicios");
    }

    public function storeA(Request $req){
        if($req->id == 0){
            $servicio = new servicios();
            }else{
            $servicio = Servicios::find($req->id);
        }
        $servicio -> codigo = $req -> txtCodigo;
        $servicio -> nombre = $req -> txtNombre;
        $servicio -> descripcion = $req -> txtDescripcion;
        $servicio -> precio = $req -> txtPrecio;
        $servicio->save();
        return "Ok";
    }
 
    public function view(Request $req){
        if($req->id == 0){
        $servicio = new servicios();
        return view('create_servicio',compact('servicio'));
        }else{
        $servicio = Servicios::find($req->id);
        $etapas = Etapas::where('id_servicio',$req->id)->get();
        return view('create_servicio',compact('servicio','etapas'));
        }
        
    }

    public function viewA(Request $req){
        if($req->id == 0){
        $servicio = new servicios();
        }else{
        $servicio = Servicios::find($req->id);
        $etapas = Etapas::where('id_servicio',$req->id)->get();
        }
        return "Ok";
    }

    public function unosolo(Request $req){
        $servicio = Servicios::find($req->id);
        $etapas = Etapas::where('id_servicio',$req->id)->get();
        return ['servicio'=>$servicio, 'etapas'=>$etapas];
    }

    public function unosoloA(Request $req){
        $servicio = Servicios::find($req->id);
        $etapas = Etapas::where('id_servicio',$req->id)->get();
        return "Ok";
    }

    public function index(){ 
        $servicios = servicios::all();
        return view('servicios',compact('servicios'));
    }

    public function indexA(){ 
        $servicios = servicios::all();
        return response()->json($servicios);
    }

    public function delete($id){
        $servicio = servicios::find($id);
        $servicio->delete();
        return redirect()->route("servicios");
    }
    
    public function deleteA($id){
        $servicio = servicios::find($id);
        $servicio->delete();
        return "Ok";
    }




    //Funciones de API
    public function ver(){
        $servicios = Servicios::all();
        return $servicios;
    }

    public function crear(Request $req){
        if($req->id == 0){
            $servicio = new Servicios();
        }else{
            $servicio = Servicios::find($req->id);
        }
        
        $servicio->codigo = $req->codigo;
        $servicio->nombre = $req->nombre;
        $servicio->descripcion = $req->descripcion;
        $servicio->precio = $req->precio;

        $servicio->save();
        //return redirect()->to("home");
        return "Ok";
    }

    public function eliminar(Request $req){
        $servicio = Servicios::find($req->id);
        $servicio->delete();

        return 'Ok';
    }


    public function show(Request $req){
        $servicio = Servicios::find($req->id);
        return response()->json($servicio);
    }
    
    public function showI(Request $req){
        $servicio = Servicios::find($req->id);
        $id_serv = $servicio->id;
        $et = Etapas::where('id_servicio',$id_serv)->get();
        if(blank($et)){
            return "No hay nada aqui :c";
       }else{
       //return response()->json($et);
       return 'Ok';
       }
        /*
        $etapa = Etapa::find($req->id);
        
        $id_etapa = $etapa->servicio_id;

        return $id_etapa;
       
        //return response()->json($servicio);*/
    }
}


//php artisan (ip de la compu)