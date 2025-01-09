<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumnos;
use App\Models\Carreras;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{

    public function index()
    {
        // $alumnos  = Alumnos::all();
        $alumnos  = Alumnos::select('alumnos.id', 'nombre', 'correo', 'id_carrera', 'carrera')
                            ->join('carreras', 'carreras.id', '=', 'alumnos.id_carrera')
                            ->get();

        $carreras = Carreras::all();
        return view('alumnos', compact('alumnos', 'carreras'));
    }

    
    public function create()
    {
        //
    }

    // el medoto store sirve para guardar datos en la base de datos
    public function store(Request $request)
    {
        $alumno = new Alumnos($request->input());
        $alumno->saveOrFail();
        return redirect('alumnos');
    }

    // Mostrar elemento por id
    public function show($id)
    {
        $alumno   = Alumnos::find($id);
        $carreras = Carreras::all();
        return view("editAlumno", compact('alumno', 'carreras'));
    }

    
    public function edit($id)
    {
        //
    }

    
    // Editarlo actualizarlo
    public function update(Request $request, $id)
    {
        $alumno   = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();

        return redirect('alumnos');
    }

    
    // Eliminar registros
    public function destroy($id)
    {
       $alumno = Alumnos::find($id);
       $alumno->delete();
       return redirect('alumnos');
    }
}
