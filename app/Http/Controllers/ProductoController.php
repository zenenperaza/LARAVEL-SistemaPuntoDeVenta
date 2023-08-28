<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoFormRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $categorias=DB::table('categoria')
        ->where('estatus', '=', '1')
        ->get();
       
        return view('almacen.producto.create', ["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $producto = new Producto;
        $producto->id_categoria = $request->input('id_categoria');
        $producto->codigo = $request->input('codigo');
        $producto->nombre = $request->input('nombre');
        $producto->stock = $request->input('stock');
        $producto->descripcion = $request->input('descripcion');
        $producto->estatus = 'Activo';

        if ($request->hasFile("imagen")) {
            $imagen = $request->file("imagen");
            $nombreImagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("imagenes/productos/");

            copy($imagen->getRealPath(), $ruta.$nombreImagen);

            $producto->image = $nombreImagen;
        }
        $producto->save();
        return redirect()->route('producto.index');
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
