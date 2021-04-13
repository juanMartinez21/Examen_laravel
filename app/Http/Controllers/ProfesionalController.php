<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profesional;


class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesional = profesional::all();//Select * from Categorias
        //$categorias = Categoria::orderBy('id','desc')->get();
        return $profesional;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesional = new profesional;
        $profesional->nroDocumento = $request->nroDocumento;
        $profesional->nombre = $request->nombre;
        $profesional->apellido = $request->apellido;
        $profesional->habilidades = $request->habilidades;
        $profesional->disponible = '1';
        $profesional->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profesional = profesional::findOrFail($request->id);
        $profesional->nroDocumento = $request->nroDocumento;
        $profesional->nombre = $request->nombre;
        $profesional->apellido = $request->apellido;
        $profesional->habilidades = $request->habilidades;
        $profesional->disponible = '1';
        $profesional->update();//actualizar
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
    }

    public function desactivar(Request $request){
        $profesional = profesional::findOrFail($request->id);
        $profesional->disponible = '0';
        $profesional->update();//actualizar
    }

    public function activar(Request $request){
        $profesional = profesional::findOrFail($request->id);
        $profesional->disponible = '1';
        $profesional->update();//actualizar
    }
}
