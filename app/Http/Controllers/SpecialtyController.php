<?php

namespace App\Http\Controllers;
use App\Models\Specialty;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
 

    public function index(){
        $specialties= Specialty::all();
        return view('specialties.index', compact('specialties'));
    }
    public function create(){
        return view('specialties.create');
    }
    private function performValidation(Request $request){
        $rules=[
            'name'=>'required|min:3'
        ];
        $messages=[
            'name.required'=>'Es necesario ingresar un nombre',
            'name.min'=>'Minimo 3 caracteres para el nombre',
        ];
        $this->validate($request, $rules,$messages);
    }
    public function store(Request $request){
        //dd($request->all());
       $this->performValidation($request);

        
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();//insert into
        $notification = "La especialidad se ha registrado correctamente.";
        return redirect('specialties')->with(compact('notification'));
    }
    public function edit(Specialty $specialty){

        return view('specialties.edit', compact('specialty'));
    }
    public function update(Request $request, Specialty $specialty){
        //dd($request->all());
     
        $this->performValidation($request);
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();//insert into

        $notification = "La especialidad se ha actualizado correctamente.";
        return redirect('specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $deleteName = $specialty->name;
        $specialty->delete();
        $notification = "La especialidad  $deleteName se ha Eliminado correctamente.";
        return redirect('specialties')->with(compact('notification'));
    }
   
}
