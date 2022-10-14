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
use App\Models\Country;



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
        return view('auth.register', ['countries' => Country::all()]);
    }
    public function registermy(Request $request)
    {
        //el objeto me permitira manipular la solicitud
        // $user = User::create($request->validated());
        // return redirect('/loginmy')->with('succes', 'Cuenta creada con exito!');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'state_id' =>'required',
            'city_id' =>'required',
            'country_id' =>'required'
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
    public function create()
    {
        $countries = Country::all();

        return view('dropdown-page', compact('countries'));
    }
    public function select2()
    {
        $countries = Country::all();

        return view('select2-page', compact('countries'));
    }
    public function store(Request $request)
    {
    }
}
