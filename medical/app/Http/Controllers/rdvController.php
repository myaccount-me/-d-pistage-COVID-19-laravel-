<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\reservation;
use App\Models\laboratoire;
use App\Models\agendas;
use DateTime;


class rdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$i,$date)
    {
        //
        $dt= $date.' '.date('H:i:s', $i);
        $data=reservation::where('date',$dt)
           ->get();
if(count($data)>0) {
 alert()->error('ce rendez-vous est deja réservé')->autoclose(5500);
  return redirect('labo');
}   else {
        $labo=laboratoire::find($id);
return view('reserver', ['labo'=>$labo],['date'=>$dt]);


}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $d=date('Y-m-d ');
        $dt= strtotime($d);
        $Date = date('Y-m-d ',$dt);

         $id=session()->get('id');
         $data= DB::select(DB::raw("SELECT distinct reservations.id,reservations.labo_id, CAST(reservations.date AS DATE) as date ,CAST(reservations.date AS TIME) as time,
         reservations.motif,laboratoires.nom_labo,laboratoires.mail,laboratoires.cp,laboratoires.adresse,laboratoires.ville,laboratoires.telB
         FROM reservations ,Laboratoires
         where reservations.etat='confirmé' AND reservations.labo_id= Laboratoires.id AND reservations.patient_id =".$id." AND CAST(reservations.date AS DATE) >'".$Date."'"));
          return view('rdv',['r'=>$data]);




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $id_patient=session()->get('id');
        $reservation = new reservation();
        $reservation->motif=$req->motif;
        $reservation->date=$req->date;
        $reservation->labo_id=$req->id;
        $reservation->patient_id=$id_patient;
      $created=$reservation->save();
        if($created) {
          alert()->success('votre demande est envoyée')->autoclose(5500);
        return  redirect('labo');
        }
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
    public function edit($labo_id,$id)
    {
        //
        $d=date('Y-m-d ');
        $dt= strtotime($d);
        $Date = date('Y-m-d ',$dt);
        $data= agendas :: where('labo_id',$labo_id)
        ->where('date','>=',$Date)
        ->simplePaginate(1);
//return $data;
return view('editrdv',['edit'=>$data],['id'=>$id]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,$i,$date)
    {
        //
        $d= $date.' '.date('H:i:s', $i);
        $data=reservation::where('date',$date)
           ->get();

if(count($data)>0) {
 alert()->error('ce rendez-vous est deja réservé')->autoclose(5500);
  return redirect('rdv');
} else {
        $dk=date('Y-m-d H:i:s');
        $dt= strtotime($dk);
        $newDate = date('Y-m-d H:i:s',$dt);
        $data=reservation::find($id);
 $r = DB::select(DB::raw("SELECT DATEDIFF('".$data->date."','".$newDate."') as date"));

 foreach ($r as $r) {
   $di=$r->date;
 }

if($di >=2){

    $result= DB::table('reservations')
                ->where('id', $id)
                ->update(['date' => $d,'etat' => 'en attente']);
                alert()->success('votre demande est renvoyée')->autoclose(5500);
      return  redirect('rdv');
     }
      else {
        alert()->error('Vous ne pouvez pas deplacer votre rendez-vous')->autoclose(5500);
        return  redirect('rdv');
      }
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
$dt=date('Y-m-d H:i:s');
$date = strtotime($dt);
$newDate = date('Y-m-d H:i:s',$date);
$data=reservation::find($id);

$r = DB::select(DB::raw("SELECT DATEDIFF('".$data->date."','".$newDate."') as date"));
foreach ($r as $r) {
  $d=$r->date;
}
if($d >=2) {
$data->delete();
  alert()->success('votre rendez-vous est annulée')->autoclose(5500);
return redirect('rdv');
} else {
    alert()->error('Vous ne pouvez pas annuler votre rendez-vous')->autoclose(5500);
return redirect('rdv');
}
    }
}
