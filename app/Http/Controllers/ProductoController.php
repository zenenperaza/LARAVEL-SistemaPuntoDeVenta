<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos=DB::table('producto as a')
        ->join('categoria as c', 'a.id_categoria', 'c.id_categoria')
        ->select('a.codigo', 'a.id_producto', 'a.nombre', 'a.stock', 'c.categoria', 'a.descripcion', 'a.image', 'a.estatus')
        ->where('a.nombre', 'LIKE', '%'.$texto.'%')
        ->orwhere('a.codigo', 'LIKE', '%'.$texto.'%')
        ->orderBy('id_producto', 'desc')
        ->paginate(7);
        // dd($productos);
        return view('almacen.producto.index', compact('productos', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('almacen.producto.create', compact('productos', 'texto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
