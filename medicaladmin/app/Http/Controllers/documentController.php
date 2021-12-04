<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\document;
use App\Models\patient;
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
        $id=session()->get('id');
        $data= DB::select(DB::raw("SELECT distinct reservations.id,reservations.date,patients.nom,patients.prenom
      FROM patients,reservations where reservations.patient_id =patients.id AND reservations.etat='confirmé' AND reservations.labo_id=".$id));
      return view('docs',['rdv'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

    //  return $req->option;
    $req->validate ([
           'code'=> 'numeric|digits:5|unique:documents',
            'description'=> 'required',
            'option' =>'required'
    ]
    , [
        'code.numeric' => "code de document doit uniqument contenir des chiffres.",
        'code.digits'=> " code de document doit contenir 5 chiffres.",

        'code.unique'=> "cet code existe deja.",
         'description.required'=>'Veuillez renseigner ce champ',
          'option.required'=>'Veuillez choisir un élément'
    ]);

         $document = new document();

          $document->description=$req->description;
          $document->rdv_id=$req->id;
          $document->code=$req->code;
          $document->resultat=$req->option;
          $document->date_rslt=$req->date;
         $created=$document->save();

          if($created) {
              alert()->success('resultat ajouté avec succées')->autoclose(5500);
            return  redirect('liste')->with('success');
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
  $id=session()->get('id');
  $data= DB::select(DB::raw("SELECT distinct documents.id,documents.code,documents.date_rslt,documents.resultat,documents.description,
    reservations.date,reservations.motif,patients.id as patient,patients.nom,patients.prenom,patients.cin,patients.dateNaissance,patients.mail,patients.tel,
    patients.adresse,patients.ville
            FROM documents,reservations,patients
      where documents.rdv_id= reservations.id AND reservations.patient_id=patients.id AND reservations.labo_id =".$id));

        return view('listedoc',['doc'=>$data]);

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

        $req->validate ([
               'code'=> 'numeric|digits:5',
                'description'=> 'required',
                'option' =>'required'
        ]
        , [
            'code.numeric' => "code de document doit uniqument contenir des chiffres.",
            'code.digits'=> " code de document doit contenir 5 chiffres.",


             'description.required'=>'Veuillez renseigner ce champ',
              'option.required'=>'Veuillez choisir un élément'
        ]);
        $document=document::find($req->id);
        $document->description=$req->description;
        $document->rdv_id=$req->rdv;
        $document->code=$req->code;
        $document->resultat=$req->option;
        $document->date_rslt=$req->date;

       $document->save();
         alert()->success('resultat modifié avec succées')->autoclose(5500);
        return redirect('liste');
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
        $data= DB::select(DB::raw("SELECT distinct documents.id,documents.code,documents.date_rslt,documents.resultat,documents.description,
        reservations.id as rdv,  reservations.date,reservations.patient_id,patients.nom,patients.prenom
        FROM documents,reservations,patients
      where documents.rdv_id= reservations.id AND reservations.patient_id=patients.id AND documents.id =".$id));
foreach ($data as $d){

  $p=$d->patient_id;
}


$id_labo=session()->get('id');
      $patients= DB::select(DB::raw("SELECT distinct reservations.id,reservations.date, patients.id as patient,patients.nom,patients.prenom
      FROM reservations,patients
  where reservations.patient_id=patients.id AND reservations.labo_id =".$id_labo." AND reservations.patient_id <>".$p));
      return view('modifdoc',['doc'=>$data],['patients'=>$patients]);
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
          $data=document::find($id);
          $data->delete();
            alert()->success(' résultat supprimé avec succées')->autoclose(5500);
          return redirect('liste')->with('msg','document est supprimé avec succées');
    }
}
