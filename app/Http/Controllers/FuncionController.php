<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $funciones = Funcion::orderBy('fecha')->paginate(5); // Ordenar por fecha ascendente
         return view('funciones.index', compact('funciones'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required', 'descripcion' => 'required', 'fecha' => 'required', 'hora' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

        $funcion = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenFuncion = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenFuncion);
            $funcion['imagen'] = $imagenFuncion;
        }
        Funcion::create($funcion);
        return redirect()->route('Funciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('Funciones.show', compact('funcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('Funciones.edit', compact('funcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $funcion = Funcion::findOrFail($id);

        if ($request->has('titulo')) {
            $funcion->titulo = $request->input('titulo');
        }

        if ($request->has('descripcion')) {
            $funcion->descripcion = $request->input('descripcion');
        }

        if ($request->has('fecha')) {
            $funcion->fecha = $request->input('fecha');
        }

        if ($request->has('hora')) {
            $funcion->hora = $request->input('hora');
        }

        if ($request->has('numero_reservas')) {
            $funcion->numero_reservas = $request->input('numero_reservas');
        }

        $funcion->save();

        return redirect()->route('Funciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $funcion = Funcion::findOrFail($id);
        $funcion->delete();
        return redirect()->route('Funciones.index');
    }
}
