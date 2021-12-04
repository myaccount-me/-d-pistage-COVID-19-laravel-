<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\patient;
use App\Models\laboratoire;
use Illuminate\Support\Facades\DB;
use \App\Mail\SendMail;
use \App\Mail\Send;

class rdvController extends Controller
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
  $data= DB::select(DB::raw("SELECT distinct reservations.id , CAST(reservations.date AS DATE) as date ,CAST(reservations.date AS TIME) as time,
  reservations.motif,reservations.etat,
  patients.id as patient,patients.nom,patients.prenom,patients.cin,patients.dateNaissance,patients.mail,patients.tel,
  patients.adresse,patients.ville
  FROM reservations ,patients
  where reservations.patient_id= patients.id AND reservations.labo_id =".$id));
  return view('rdv',['r'=>$data]);
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
/*$dt=date('Y-m-d H:i:s');
$date = strtotime($dt);
$newDate = date('Y-m-d H:i:s',$date);

$r = DB::select(DB::raw("SELECT DATEDIFF('".$data->date."','".$newDate."') as date"));
foreach ($r as $r) {
  $d=$r->date;
    }
if($d>=1){*/
  $data=reservation::find($id);
  $patient=patient::find($data->patient_id);
  
  $data->delete();
  $details = [
            'title' => session()->get('nom_labo'),
            'patient'=>$patient->prenom.' '.$patient->nom,
            'body' => $data->date

        ];


        Mail::to('chaima.salaani18@gmail.com')->send(new SendMail($details));
          alert()->success("rendez-vous est annulé et un email d'annulation a été envoyé avec succées")->autoclose(5500);
        return redirect('rdv');




    }


    public function confirmer($id)
    {
  $data=reservation::find($id);
  $result= DB::table('reservations')
                ->where('id', $id)
                ->update(['etat' => 'confirmé']);
  $patient=patient::find($data->patient_id);
  $labo=Laboratoire::find($data->labo_id);
  $details = [
            'title' => session()->get('nom_labo'),
            'labo' => $labo->ville.', '.$labo->adresse.''.$labo->cp,
            'tel' => $labo->telB,
            'patient'=>$patient->prenom.' '.$patient->nom,
            'body' => $data->date

        ];


        Mail::to('chaima.salaani18@gmail.com')->send(new Send($details));
          alert()->success('rendez-vous est confirmé et un email de confirmation a été envoyé avec succées')->autoclose(5500);
        return redirect('rdv');
      }

}
