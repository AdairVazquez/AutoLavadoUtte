<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use App\Models\servicios;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    public function ver(){
        $etapas = Etapas::all();
        return $etapas;
    }

    public function crear(Request $req){
        if($req->id == 0){
            $etapa = new Etapas();
        }else{
            $etapa = Etapas::find($req->id);            
        }
        $etapa->id_servicio = $req->id_servicio;
        $etapa->nombre = $req->nombre;
        $etapa->duracion = $req->duracion;
        $etapa->save();
        return "Ok";
    }

    public function eliminar(Request $req){
        $etapa = Etapas::find($req->id);
        $etapa->delete();

        return 'Ok';
    }

    public function etapasA(Request $req){
        $etapas = Etapas::where('id_servicio', $req->id)->get();
        return response()->json($etapas);
    }

    public function show(Request $req){
        $etapa = Etapas::find($req->id);
        

        return response()->json($etapa);
    }
    public function etapaSola(Request $req){
        $etapa = Etapas::find($req->servicio_id);
        $servicio =  Servicios::find($req->id);
        if($etapa == $servicio){
             return'Ok';
        }
        return'No hay etapas en el servicio';
    }
}
