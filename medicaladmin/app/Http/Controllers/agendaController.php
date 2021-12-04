<?php

namespace App\Http\Controllers;
use App\Models\agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class agendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id=session()->get('id');
        $data= DB::select(DB::raw("SELECT distinct agendas.id,agendas.date
      FROM agendas,Laboratoires where agendas.labo_id =Laboratoires.id  AND agendas.labo_id=".$id));
      return view('listeagendas',['agd'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
//$jours=implode(" ",$req->input('choix'));
  $agenda = new agenda();
    $agenda->date=$req->date;
    $agenda->heure_d=$req->debut;
    $agenda->heure_f=$req->fin;
    $agenda->duree=$req->duree;
    $agenda->labo_id=session()->get('id');
    $agenda->save();
      alert()->success('crée avec succées')->autoclose(5500);
          return redirect('listeAgd');
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
    public function edit(Request $req)
    {
        //
        $agenda=agenda::find($req->id);
        $agenda->date=$req->date;
       $agenda->heure_d=$req->debut;
      $agenda->heure_f=$req->fin;
     $agenda->duree=$req->duree;

       $agenda->save();

  alert()->success(' modifié avec succées')->autoclose(5500);
       return redirect('listeAgd');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        //
        $data= DB::select(DB::raw("SELECT distinct agendas.id,agendas.date,agendas.heure_d,agendas.heure_f,agendas.duree
      FROM agendas where  agendas.id=".$id));

        return view('modifagd',['agd'=>$data]);
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
        $data=agenda::find($id);
        $data->delete();
          alert()->success('supprimé avec succées')->autoclose(5500);
        return redirect('listeAgd');
    }
}
