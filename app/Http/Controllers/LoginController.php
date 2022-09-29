<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function show()
    {
        if (Auth::check()) {
            return redirect('/homemy');
        }
        return view('auth.login');
    }
    public function loginmy(LoginRequest $request)
    {
        // se obtienen las credenciales
        $credentials = $request->all();
        // \Log::info($credentials);
        //validaciones obtenidas del loginrequest
        if (Auth::validate($credentials)) {
            return redirect()->to('/loginmy')->withErrors('Nombre o password son incorrectos');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        // \Log::info($user);
        return $this->authenticated($request, $user);
    }
    public function authenticated(Request $request, $user)
    {
        return redirect('/homemy');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'Administrador') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('articulosuser');
            }
        }


        return back()->withErrors([
            'email' => 'correo o contraseña mal ingresado, intentelo de nuevo',
        ])->onlyInput('email');
    }
}
