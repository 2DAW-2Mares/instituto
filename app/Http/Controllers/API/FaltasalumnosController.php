<?php

namespace App\Http\Controllers\API;

use App\Faltaalumno;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaltasalumnosResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaltaalumnoController extends Controller
{
   public function __construct()
    {
       $this->authorizeResource(Faltaalumno::class, 'faltaalumno');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*  return Faltaalumno::collection(Faltaalumno::paginate());  */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*  $Faltaalumno = Faltaalumno::create(json_decode($request->getContent(), true));


        return new FaltaalumnoResource($Faltaalumno); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return \Illuminate\Http\Response
     */
    public function show(Faltaalumno $Faltaalumno)
    {
      /*   return new FaltaalumnoResource($Faltaalumno); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faltaalumno $Faltaalumno)
    {
        $aula->update(json_decode($request->getContent(), true));
        return new FaltaalumnoResource($Faltaalumno);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faltaalumno $Faltaalumno)
    {
        /* $this->authorize('delete', $Faltaalumno);  */
        $Faltaalumno->delete();
}
}
