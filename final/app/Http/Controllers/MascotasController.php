<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['mascotas']=Mascotas::paginate(5);
        return view('mascota.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fields=[
            'Nombre'=>'required|string|max:100',
            'Cedula_propietario'=>'required|string|max:100',
            'Fecha_nacimiento'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es necesario para el sistema'
        ];        

        $this->validate($request,$fields, $mensaje);


        $datosMascotas=request()->except('_token');
        Mascotas::insert($datosMascotas);
        return redirect('mascota')->with('mensaje','Mascota Agregada con Exito');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mascota=Mascotas::findOrFail($id);
        return view('mascota.edit',compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $fields=[
            'Nombre'=>'required|string|max:100',
            'Cedula_propietario'=>'required|string|max:100',
            'Fecha_nacimiento'=>'required|date'
        ];
        $mensaje=[
            'required'=>'El :attribute es necesario para el sistema'
        ];        

        $this->validate($request,$fields, $mensaje);

        $datosMascotas=request()->except('_token','_method');
        Mascotas::where('id','=',$id)->update($datosMascotas );

        $mascota=Mascotas::findOrFail($id);
        //return view('mascota.edit',compact('mascota'));
        return redirect('mascota')->with('mensaje','Informacion Actualizada');           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Mascotas::destroy($id);
        return redirect('mascota')->with('mensaje','Mascota Eliminada');   
    }
}
