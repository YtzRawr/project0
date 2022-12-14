<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticuloExport;
use Barryvdh\DomPDF\Facade\PDF;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nos traera todos los registro de la tabla -> all
        $articulos = Articulo::all();
        // retorna y guarda
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'codigo' => 'required', 'descripcion' => 'required', 'precio' => 'required', 'cantidad' => 'required', 'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        // dd($request);
        $articulo = $request->all();
        // dd($articulo);
        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'img/';
            $imagenArticulo = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenArticulo);
            $articulo['image'] = "/{$rutaGuardarImg}{$imagenArticulo}";
        }
        // dd($articulo);
        Articulo::create($articulo);
        // $articulos = new Articulo();
        // $articulos->codigo = $request->get('codigo');
        // $articulos->descripcion = $request->get('descripcion');
        // $articulos->cantidad = $request->get('cantidad');
        // $articulos->precio = $request->get('precio');
        // $articulos->save();
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $articulo = Articulo::find($id);
        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');
        $articulo->save();
        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
    public function exportExcel()
    {
        return Excel::download(new ArticuloExport, 'article-list.xlsx');
    }
    public function exportPdf()
    {

        $articulos = Articulo::get();
        $pdf   = PDF::loadView('pdf.articulo', compact('articulos'));

        return $pdf->download('articulo-list.pdf');
    }

    public function exportPdfOne($id)
    {
        $articulo = Articulo::find($id);
        $pdf   = PDF::loadView('pdf.articuloone', compact('articulo'));

        return $pdf->download('article-list-one-pdf');
    }
}
