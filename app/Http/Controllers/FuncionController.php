<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuncionController extends Controller
{
    public function showWelcome()
    {
        $funciones = Funcion::orderBy('fecha', 'asc')->take(2)->get();
        return view('welcome', compact('funciones'));
    }

    public function index(Request $request)
    {
        $funciones = Funcion::orderBy('fecha')->paginate(5);
        return view('funciones.index', compact('funciones'));
    }

    public function create()
    {
        return view('funciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

        $funcion = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = public_path('storage/imagen/');
            $imagenFuncion = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenFuncion);
            $funcion['imagen'] = $imagenFuncion;
        }

        Funcion::create($funcion);
        return redirect()->route('Funciones.index');
    }


    public function show(string $id)
    {
        $funcion = Funcion::findOrFail($id);

        if (Auth::check()) {
            return view('Funciones.show', compact('funcion'));
        } else {
            return view('Funciones.showUser', compact('funcion'));
        }
    }

    public function edit($id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('Funciones.edit', compact('funcion'));
    }

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

    public function reservarAsientos($id)
    {
        $funcion = Funcion::findOrFail($id);
        $asientosDisponibles = $funcion->numero_reservas;

        return view('funciones.reservar', compact('funcion', 'asientosDisponibles'));
    }

    public function ingresarDatos(Request $request)
    {
        $funcionid = $request->input('funcionid');
        $asientos = $request->input('asientos_seleccionados');

        return view('funciones.ingresardatos', compact('funcionid', 'asientos'));
    }


    public function guardarReserva(Request $request, $id)
    {
        $funcion = Funcion::findOrFail($id);

        $request->validate([
            'asientos_seleccionados' => 'required',
            'nombre' => 'required',
            'rut' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        $reserva = new Reserva();

        $reserva->funcion_id = $funcion->id;
        $reserva->asientos = $request->input('asientos_seleccionados');
        $reserva->nombre = $request->input('nombre');
        $reserva->rut = $request->input('rut');
        $reserva->telefono = $request->input('telefono');
        $reserva->email = $request->input('email');

        $reserva->save();

        $asientosSeleccionados = count(explode(',', $request->input('asientos_seleccionados')));
        $funcion->numero_reservas -= $asientosSeleccionados;
        $funcion->save();

        return redirect()->route('Funciones.index')->with('success', 'La reserva se ha guardado exitosamente.');
    }

    public function validarReservas()
    {
        $reservas = Reserva::all();

        return view('dashboard', compact('reservas'));
    }

    public function destroy($id)
    {
        $funcion = Funcion::findOrFail($id);
        $funcion->delete();
        return redirect()->route('Funciones.index');
    }
    public function destroyReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        $funcionId = $reserva->funcion_id;

        $reserva->delete();

        return redirect()->route('dashboard')->with('success', 'La reserva se ha eliminado exitosamente.');
    }
}
