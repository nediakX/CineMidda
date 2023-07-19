<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User;


class FuncionController extends Controller
{
    public function showWelcome()
    {
        $funciones = Funcion::orderBy('fecha', 'asc')->take(5)->get();

        foreach ($funciones as $funcion) {
            $asientosOcupados = count($this->getAsientosOcupados($funcion->id));
            $asientosDisponibles = $funcion->numero_reservas - $asientosOcupados;
            $funcion->asientosDisponibles = $asientosDisponibles;
        }

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

    public function reservas()
    {
        $user = Auth::user();
        $reservas = Reserva::where('email', $user->email)->get();
        return view('administracion-user.reservas', compact('reservas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'numero_reservas' => 'required|integer|min:1'
        ], [
            'required' => 'El campo :attribute es obligatorio.'
        ]);

        $funcion = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImg = public_path('storage/imagen/');
            $imagenFuncion = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenFuncion);
            $funcion['imagen'] = $imagenFuncion;
        }

        Funcion::create($funcion);
        return redirect()->route('funciones.index');
    }

    public function show(string $id)
    {
        $funcion = Funcion::findOrFail($id);

        $asientosOcupados = count($this->getAsientosOcupados($id));
        $asientosDisponibles = $funcion->numero_reservas - $asientosOcupados;

        if (Auth::check()) {
            if (Auth::user()->role === 'user') {
                return view('funciones.showUser', compact('funcion', 'asientosDisponibles'));
            }

            return view('funciones.show', compact('funcion', 'asientosDisponibles'));
        }

        return view('funciones.showUser', compact('funcion', 'asientosDisponibles'));
    }

    public function edit($id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('funciones.edit', compact('funcion'));
    }

    public function contacto()
    {
        return view('Contacto');
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

        if ($request->hasFile('imagen')) {
            $request->validate([
                'imagen' => 'image|mimes:jpeg,png,svg|max:1024'
            ]);

            $rutaGuardarImg = public_path('storage/imagen/');
            $imagenFuncion = date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move($rutaGuardarImg, $imagenFuncion);
            $funcion->imagen = $imagenFuncion;
        }

        $funcion->save();

        return redirect()->route('funciones.index');
    }


    public function reservarAsientos($id)
    {
        $funcion = Funcion::findOrFail($id);
        $asientosDisponibles = $funcion->numero_reservas;
        $asientosOcupados = $this->getAsientosOcupados($id);
        $numAsientosReservados = Reserva::where('funcion_id', $id)->count();


        return view('funciones.reservar', compact('funcion', 'asientosDisponibles', 'asientosOcupados', 'numAsientosReservados'));
    }

    public function getAsientosOcupados($id)
    {
        $reservas = Reserva::where('funcion_id', $id)->get();
        $asientosOcupados = [];

        foreach ($reservas as $reserva) {
            $asientos = explode(',', $reserva->asientos);
            $asientosOcupados = array_merge($asientosOcupados, $asientos);
        }

        return $asientosOcupados;
    }


    public function ingresarDatos(Request $request)
    {
        $request->validate([
            'asientos_seleccionados' => 'required',
        ], [
            'asientos_seleccionados.required' => 'Por favor, seleccione al menos un asiento.',
        ]);

        $funcionid = $request->input('funcionid');
        $asientos = $request->input('asientos_seleccionados');

        return view('funciones.ingresardatos', compact('funcionid', 'asientos'));
    }

    public function cartelera()
    {
        $funciones = Funcion::all();

        return view('Cartelera', compact('funciones'));
    }



    public function buscar(Request $request)
    {
        $rut = $request->input('rut');
        $funcionId = $request->input('funcion_id');

        $query = Funcion::query();

        if ($rut) {
            $query->whereHas('reservas', function ($q) use ($rut) {
                $q->where('rut', $rut);
            });
        }

        if ($funcionId) {
            $query->where('id', $funcionId);
        }

        $funciones = $query->orderBy('fecha')->paginate(5);

        return view('funciones.index', compact('funciones'));
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

        return redirect()->route('welcome')->with('success', 'La reserva se ha guardado exitosamente. ¡Puedes ver tus reservas accediendo con el correo que proporcionaste anteriormente! Código de validación: ' . $reserva->codigo_validacion);
    }


    public function validarReservas(Request $request)
    {
        $rut = $request->input('rut');
        $funcionId = $request->input('funcion_id');

        $query = Reserva::query();

        if ($rut) {
            $query->where('rut', $rut);
        }

        if ($funcionId) {
            $query->whereHas('funcion', function ($q) use ($funcionId) {
                $q->where('id', $funcionId);
            });
        }

        $reservas = $query->get();
        $funciones = Funcion::orderBy('fecha')->get();

        return view('dashboard', compact('reservas', 'funciones'));
    }


    public function destroy($id)
    {
        $funcion = Funcion::findOrFail($id);

        $reservas = Reserva::where('funcion_id', $funcion->id)->get();

        if ($reservas->count() > 0) {
            $mensajeError = "No se puede eliminar la función porque tiene reservas asociadas. Elimina las reservas primero.";
            return redirect()->route('funciones.index')->with('error', $mensajeError);
        }

        $funcion->delete();

        return redirect()->route('funciones.index')->with('success', 'La función se ha eliminado exitosamente.');
    }


    public function destroyReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        $funcionId = $reserva->funcion_id;

        $reserva->delete();

        return redirect()->route('dashboard')->with('success', 'La reserva se ha eliminado exitosamente.');
    }
}
