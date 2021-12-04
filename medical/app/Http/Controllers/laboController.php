<?php

namespace App\Http\Controllers;
use App\Models\laboratoire;
use App\Models\agendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)

    {
        //
        
        $d=date('Y-m-d ');
        $dt= strtotime($d);
        $Date = date('Y-m-d ',$dt);
        $data= agendas :: where('labo_id',$id)
        ->where('date','>=',$Date)
        ->simplePaginate(1);

       return redirect('labo')->with('h',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

    if($req->recherche == "") {

    $data=DB::select(DB::raw("SELECT distinct laboratoires.*
        FROM  laboratoires , agendas
        where agendas.labo_id=Laboratoires.id"));

  return view('labo',['labos'=>$data]);
        }
  else {
    $input="'%".$req->recherche."%'";
    $data= DB::select(DB::raw(" SELECT distinct laboratoires.*
      FROM agendas , laboratoires
     where agendas.labo_id=laboratoires.id  AND nom_labo  like ".$input));
return view('labo',['labos'=>$data]);
  }

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
    public function search()

    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      //  $data=laboratoire::find($id);

        //return redirect('/reserver',$data);
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
