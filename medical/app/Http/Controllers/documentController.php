<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use Illuminate\Support\Facades\DB;
class documentController extends Controller
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
        $id=session()->get('id');
        $data= DB::select(DB::raw("SELECT distinct documents.id,documents.code,documents.date_rslt,documents.resultat,documents.description,
          reservations.date,reservations.motif,laboratoires.nom_labo,laboratoires.adresse,laboratoires.cp,laboratoires.ville,laboratoires.mail,
          laboratoires.telB
        FROM documents,reservations,laboratoires
  where documents.rdv_id= reservations.id AND reservations.labo_id=laboratoires.id AND reservations.patient_id =".$id));

    return view('docs',['doc'=>$data]);
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
