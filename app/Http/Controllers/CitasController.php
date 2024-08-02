<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class CitasController extends Controller
{
    public function crear(Request $req){
        if($req->id == 0){
            $cita = new Citas();
        }else{
            $cita = Citas::find($req->id);
        }
        $user = Auth::id();
        $cita->id_usuario = $user;
        $cita->id_servicio = $req->id_servicio;
        $cita->id_auto = $req->id_auto;
        $cita->fecha = $req->fecha;
        $cita->save();
        return "Ok";
    }

    public function showCitas(){
        $user = Auth::id();
        //$citas = Citas::where('id_usuario',$user)->get();
        $citas = Citas::join('autos','citas.id_auto','=','autos.id')
        ->select('citas.*','autos.matricula as matriculaAuto')->where('citas.id_usuario',$user)->get();
        return response()->json($citas);
    }

    public function showCita(Request $req){
        $cita = Citas::find($req->id);
        return response()->json($cita);
    }

    public function deleteCita(Request $req){
        $cita = Citas::find($req->id);
        $cita->delete();
        return "Ok";
    }
}
