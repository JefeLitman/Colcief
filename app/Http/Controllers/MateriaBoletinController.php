<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MateriaBoletinUpdateController;
use App\MateriaBoletin;
use App\NotaPeriodo;

class MateriaBoletinController extends Controller
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaBoletinUpdateController $request, $pk_materia_boletin)
    {
        if($request->ajax()){
            $notaMateria=MateriaBoletin::where('pk_materia_boletin',$pk_materia_boletin)->get();
            if (!empty($notaMateria[0])) {
                $notaMateria=$notaMateria[0];
                $notaMateria->nota_materia=$request->nota_materia; 
                $notaMateria->save();
                return response()->json([
                    'mensaje' => 'Guardada con exito.'
                ]);
            }
            return response()->json([
                'mensaje' => 'Error: La nota no ha sido encontrada. Los datos no guardados aparecen en rojo'
            ]);
        }
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

    public static function actualizarNota(int $pk_materia_boletin){
        $m=MateriaBotelin::where($pk_materia_boletin)->get();
        if (empty($m[0])) {
            return "Materia boletin no encontrada.";
        }else{
            $m=$m[0];
            $m->nota_materia=0;
            $periodos=NotaPeriodo::where('fk_materia_boletin',$pk_materia_boletin)->get();
            if (empty($periodos[0])) {
                $m[0]->save();
            } else {
                foreach ($periodos as $p) {
                    $m->nota_materia=+$p->nota_final;
                }
            }
            $m->nota_materia=$m->nota_materia/4; //Porque siempre son 4 periodos
            $m->save();
        }
    }
}
