<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleccioncomite;
use App\Models\Eleccion;
use App\Models\Funcionario;
use App\Models\Rol;

class EleccionComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecs=Eleccioncomite::all();
        return view ('eleccioncomite/list', compact('ecs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eleccion=Eleccion::all();
        $funcionario=Funcionario::all();
        $roles=Rol::all();
        return view ('eleccioncomite/create', compact('eleccion', 'funcionario', 'roles'));
    }

    function validateData(Request $request)
    {
        $request->validate([
            'idEleccion'    => 'required|min:0',
            'idFuncionario' => 'required|min:0',
            'idRol'         => 'required|min:0',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);

        $campos
            = array(
                'eleccion_id'       => $request->idEleccion,
                'funcionario_id'    => $request->idFuncionario,
                'rol_id'            => $request->idRol,
            );
        Eleccioncomite::create($campos);
        return redirect('eleccioncomite')->with('success', 'Registrado correctamente...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleccioncomite=Eleccioncomite::find($id);
        $eleccion=Eleccion::all();
        $funcionario=Funcionario::all();
        $roles=Rol::all();
        return view ('eleccioncomite/edit', compact('eleccioncomite','eleccion','funcionario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
