<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\MateriaPC;

use App\Http\Requests\MateriaStoreController;
use App\Http\Requests\MateriaUpdateController;

/*@Autor Paola C.
Clase materia general, esta clase tendra la descripcion general de las materias. Tambian tendra los logros generales.
*/

class MateriaController extends Controller
{
    public function index()
    {
        $materias=Materia::select('pk_materia','nombre','contenido')->get();
        //$materias=Materia::all();
        return view("materias.listaMaterias",compact("materias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return vista en Local>Resource>View>materias>crearMateria.blade.php
     */
    public function create()
    {
        return view("materias.crearMateria");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     */
    public function store(MateriaStoreController $request)
    {   
        // Los datos al haber pasado por AcudienteStoreController ya están validados en la clase 
        // Local>app>Http>Requests>MateriaStoreController.php
        $materia = (new Materia)->fill($request->all());
        try{
            $materia->save();
            return "Ha sido guardado con exito";
        }catch(Exception $e){
            return "Ha ocurido un error con el servidor, vuelva a intentarlo.";
        }
        
    }


    public function show($id)
    {
        $materia = Materia::where('pk_materia',$id)->get()[0];
        return view("materias.verMateria",compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.editarMateria', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaUpdateController $request, $id)
    {
        $materia = Materia::findOrFail($id)->fill($request->all());
        $materia->save();
        
        //Debido a que el atributo materia.nombre debe ser igual a materia_pc.nombre, cada que el nombre de una materia se modifique la otra debe actualizarse
        $materiapc = MateriaPC::where('fk_materia','=',$materia->pk_materia)->update(['nombre'=>$materia->nombre]);

        return "Se actualizó correctamente";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(session('role')=="administrador"){
            // Solo el administrador puede eliminar una MateriaPC
            $materia = Materia::where("pk_materia","=",$id)->get();
            if(empty($materia[0])){
                return response()->json([
                    'mensaje' => 'Esta materia no existe.'
                ]);
            }
            $materia[0]->delete();
            return response()->json([
                'mensaje' => 'La materia fue eliminada.'
            ]);
            
        }
        return response()->json([
            'mensaje' => 'No tienes los permisos necesarios.'
        ]);
    }
}
