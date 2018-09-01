<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pk_empleado)
    {
        //En este momento se muestra en la view que se encuentra en Local>Resource>View>empleados>verEmpleado.blade.php y allá se reciben todos los datos del respectivo empleado en una variable tipo Object $empleado. 

        $empleado = Empleado::where('pk_empleado', $pk_empleado)->get()[0];
        
        //return $empleado; 
        return view("empleados.verEmpleado",compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pk_empleado)
    {
        //

        $empleado = Empleado::where('pk_empleado', $pk_empleado)->first();
        return view("empleados.editarEmpleado", compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        // if($this->validar($request)){
            // $empleado->update([
            //     'pk_empleado' => $request->input('codigo'),
            //     'cedula'      => $request->input('cedula'),
            //     'nombre'      => $request->input('nombre'),
            //     'apellido'    => $request->input('apellido'),
            //     'correo'      => $request->input('correo'),
            //     'direccion'   => $request->input('direccion'),
            //     'titulo'      => $request->input('titulo'),
            //     'rol'         => $request->input('rol'),
            //     'estado'      => $request->input('estado'),
            //     'foto'        => $request->input('foto')
            // ]);
            $empleado->update($request->all());
        // }

        // redirect
        return Redirect()->action('EmpleadoController@edit', ['pk_empleado' => $empleado->pk_empleado]);
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

    private function mover(Request $request){
        dd($request->file('foto')->store('public'));
    }

    private function validar(Request $request){
        $request->validate([
            'pk_empleado' => 'required|numeric|unique:empleado',
            'cedula' => 'required|numeric|unique:empleado',
            'nombre' => 'required|string|max:20|',
            'apellido' => 'required|string|max:20',
            'correo' => 'required|string|max:20',
            'direccion' => 'required|string|max:20',
            'titulo' => 'required|numeric|max:20',
            'rol' => 'required|string',
            'estado' => 'required',
            'foto'=> 'image|required|mimes:jpeg,bmp,png,jpg',  
        ]);
        $this->mover($request);
    }
}
