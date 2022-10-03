<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;


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
        $users = new User();
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = $request->get('password');
        $users->role = $request->get('role');
        $users->save();
        return redirect('/loginmy');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.index')->with('usuarios', $users);
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
