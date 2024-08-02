<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoController extends Controller
{
    public function view(Request $req){
        if($req->id == 0){
            $auto = new Auto();
        }else{
            $auto = Auto::find($req->id);
        }
        return view('auto',compact('auto'));
    }

    //Ver todos los registros
    public function ver(){
        $autos = Auto::all();

        return $autos;
    }

    //Crear nuevos registros de autos
    public function crear(Request $req){
        if($req->id == 0){
            $auto = new Auto();
        }else{
            $auto = Auto::find($req->id);
        }
        $user = Auth::id();
        $auto->matricula = $req->matricula;
        $auto->color = $req->color;
        $auto->modelo = $req->modelo;
        $auto->marca = $req->marca;
        $auto->id_usuario = $user;
        $auto->save();
        return "Ok";
    }
    
    //Editar registros de autos
    public function act(Request $req){
        if($req->id == 0){
            $auto = new Auto();
        }else{
            $auto = Auto::find($req->id);
        }
        $userId = auth()->id();
        $auto->matricula = $req->matricula;
        $auto->color = $req->color;
        $auto->modelo = $req->modelo;
        $auto->marca = $req->marca;
        $auto->id_usuario = $userId;
        $auto->save();
        //return redirect()->to("home");
        return "Ok";
    }

    public function eliminar($id){ 
        $auto = Auto::find($id);
        $auto->delete();
        return "Ok";
    }

    public function store(Request $req){
        if($req->id == 0){
            $auto = new Auto();
        }else{
            $auto = Auto::find($req->id);
        }
        $userId = auth()->id();
        $auto->matricula = $req->matricula;
        $auto->color = $req->color;
        $auto->modelo = $req->modelo;
        $auto->marca = $req->marca;
        $auto->id_usuario = $userId;
        $auto->save();
        //return redirect()->to("home");
        return redirect()->route("autos");
    }

    public function index(){
        $autos = Auto::all();

        return view('autos',compact('autos'));
    }

    // public function delete($id){
    //     $auto = Auto::find($id);
    //     $auto->delete();

    //     return redirect()->route("autos");
    // }

    public function showAutoCliente(){
        $user = Auth::id();
        $autos = Auto::where('id_usuario',$user)->get();
        return response()->json($autos);
    }

    public function show(Request $req){
        $auto = Auto::find($req->id);
        return response()->json($auto);
    }
}
