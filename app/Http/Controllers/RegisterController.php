<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function show(){
        // para la autenticacion
        if(Auth::check()){
            return redirect('/homemy');
        }
        // me retornara la vista
        return view('auth.register');
    }
    public function registermy(RegisterRequest $request){
        //el objeto me permitira manipular la solicitud
        $user = User::create($request->validated());
        return redirect('/loginmy')->with('succes','Cuenta creada con exito!');
    }
    public function index () {
        $users = User::all();
        return view('usuarios.index')->with('usuarios',$users);
    }

}
