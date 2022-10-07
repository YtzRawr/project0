<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Exports\UsersExport;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    //
    public function show()
    {
        // para la autenticacion
        if (Auth::check()) {
            return redirect('/homemy');
        }
        // me retornara la vista
        return view('auth.register');
    }
    public function registermy(Request $request)
    {
        //el objeto me permitira manipular la solicitud
        // $user = User::create($request->validated());
        // return redirect('/loginmy')->with('succes', 'Cuenta creada con exito!');
        $request->validate([
            'name' => 'required', 'email' => 'required', 'password' => 'required', 'role' => 'required', 'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        $user = $request->all();
        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'img/';
            $imagenUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUser);
            $user['image'] = "/{$rutaGuardarImg}{$imagenUser}";
        }
        $newuser = User::create($user);
        $correo = new UserRegister($newuser);
        Mail::to($newuser->email)->send($correo);

        // $users = new User();
        // $users->name = $request->get('name');
        // $users->email = $request->get('email');
        // $users->password = $request->get('password');
        // $users->role = $request->get('role');
        // $users->image = $request->get('image');
        // $users->save();
        return redirect('/loginmy');
    }
    public function index()
    {
        $users = User::all();
        return view('usuario.index')->with('usuarios', $users);
    }
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('auth.edit')->with('user', $user);
    }
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        return redirect('/usuarios');
    }
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('/usuarios');
    }
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }

    public function exportPdf()
    {
        $users = User::get();
        $pdf   = PDF::loadView('pdf.users', compact('users'));

        return $pdf->download('user-list.pdf');
    }
}
