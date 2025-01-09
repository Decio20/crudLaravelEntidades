<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carreras;
use Illuminate\Http\Request;


class CarrerasController extends Controller
{
  
    public function index()
    {
        $carreras = Carreras::all();

        return view('carreras', compact('carreras'));
    }

    
    public function create()
    {
        //
    }

    // el medoto store sirve para guardar datos en la base de datos
    public function store(Request $request)
    {
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect("carreras");
    }

  
    public function show($id)
    {   

        // muestra un elemento de la tabla en específico
        $carrera = Carreras::find($id);

        return view('editCarrera', compact('carrera'));
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {   
        // edita o actualiza
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect("carreras");
    }

    public function destroy($id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect("carreras");
    }
}
