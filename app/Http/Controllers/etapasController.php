<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use App\Models\servicios;
use App\Models\User;
use Illuminate\Http\Request;

class etapasController extends Controller
{
    public function store(Request $req){
        $etapas = new Etapas();
        $etapas -> id_servicio = $req -> id;
        $etapas -> nombre = $req -> txtNombreEtapa;
        $etapas -> duracion = $req -> txtDuracion;
        $etapas->save();
        return redirect()->route("servicios");
    }

    public function view(Request $req){
        if($req->id == 0){
        $servicio = new Etapas();
        }else{
        $servicio = Etapas::find($req->id);
        }
        return view('create_servicio',compact('servicio'));
    }

    public function etapaSola(Request $req){
        $etapa = Etapas::find($req->id);
        $servicio = servicios::find($req->idserv);
        $etapas = Etapas::where('id_servicio',$req->id)->get();
        return view('create_servicio',compact('etapa','servicio','etapas'), ['tab' => 'nueva']);
    }

    public function edit(Request $req){
        $etapa = Etapas::find($req->id);
        $etapa -> nombre = $req -> txtNombreEtapa;
        $etapa -> duracion = $req -> txtDuracion;
        $etapa->save();
        return redirect()->route("servicios");
    }

    public function index(){ 
        $servicios = Etapas::all();
        return view('servicios',compact('servicios'));
    }

    public function delete($id){
        $servicio = Etapas::find($id);
        $servicio->delete();
        return redirect()->back();
    }

    
}
