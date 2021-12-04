<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\patient;
use App\Rules\login;
use \App\Mail\SendMail;
use Illuminate\Support\Facades\Hash;
class patientController extends Controller
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
      //  $id=session()->get('id');
      //  $data =patient::where('id',$id)->get();
      // return view('monprofil',['profile'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

$req->validate ([
     'nom'=>'alpha' ,
     'prenom'=>'alpha',
     'ville' =>'alpha',
       'cin'=> 'numeric|digits:8|unique:patients',
       'mail'=> 'email|unique:patients',
       'tel'=> 'numeric|digits:8|unique:patients',
       'confirm'=>'same:mdp'
]
, [

        'nom.alpha' => "nom doit uniqument contenir des caractéres.",
       'prenom.alpha' => "prenom doit uniqument contenir des caractéres.",
       'ville.alpha' => "ville doit uniqument contenir des caractéres.",
        'cin.numeric' => "numero de carte d'identite doit uniqument contenir des chiffres.",
       'cin.digits'=> " numéro de carte d'identite doit contenir 8 chiffres.",

    'cin.unique'=> "cette numero de carte d'identité existe deja.",
      'mail.email'=> "il faut respecter la format d'une adresse mail",
    'mail.unique'=> "ce mail existe deja.",

  'tel.numeric' => " numéro de telephone doit uniqument contenir des chiffres.",
    'tel.digits'=> " numéro de telephone doit contenir 8 chiffres.",


    'tel.unique'=> "cette numero de téléphone existe deja.",
    'confirm.same'=> "vous avez entrer une valeur incorrecte."
]);

$details = [

            'body' => " Merci d'avoir créé un compte sur Go Médical" ,
            "test"=>  " Pour activer votre compte sur le site de Go Médical, merci de cliquer sur le lien suivant:",
            "cin"=>$req->cin,
            "nom"=> $req->nom,
            "prenom"=> $req->prenom,
            "date"=> $req->date,
            "adrs"=> $req->adrs,
            "ville"=> $req->ville,
            "mail"=> $req->mail,
            "tel"=> $req->tel,
            "mdp"=> $req->mdp
        ];

        Mail::to('chaima.salaani18@gmail.com')->send(new SendMail($details));
        alert()->success("un mail d'activation vient d'etre envoyée a l'adresse mail renseignée \n si vous ne recevez pas le mail de confirmation aprés votre inscription.Veuillez Vérifier dans l dossier SPAM ", "Activer Maintenant votre compte")->autoclose(5500);
        return view('/inscrire');}

  public function activer (Request $req){
  $patient = new patient();
    $patient->cin=$req->cin;
    $patient->nom=$req->nom;
    $patient->prenom=$req->prenom;
    $patient->dateNaissance=$req->date;
    $patient->adresse=$req->adrs;
    $patient->ville=$req->ville;
    $patient->mail=$req->mail;
    $patient->tel=$req->tel;
    $patient->mdp=hash::make($req->mdp);
 $created= $patient->save();
 if($created) {

 alert()->success('Vous pouver Maintenant connecter', 'Votre compte est activé')->autoclose(5500);
 return  redirect('connect');
}
  }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function update(Request $req)
    {

  $id=session()->get('id');
  $data=patient::find($id);
  $ancienne =$data->mdp;

 if(Hash::check($req->ancienne,$ancienne)) {
$req->validate ([
              'confirm'=>'same:password'
      ]
      , [
        'confirm.same'=> "vous avez entrer une valeur incorrecte."
      ]);
      $data->mdp=hash::make(  $req->password);
       $data->save();
       alert()->success('votre mot de pass est modifié')->autoclose(5500);
      return redirect('profil');

    } else {

        return redirect('profil')->with('error','vous avez entrer une valeur incorrecte.');
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

 //regex:/^([0-9]{8})||([A-Za-z0-9._%\+\-]+@[a-z0-9.\-]+\.[a-z]{2,3})$/
    function login(Request $req){
      $req->validate ([
           'login'=> new login()


      ]);


     $login=$req->login;

     $session= patient::where('mail',$login)
     ->orwhere('tel',$login)
     ->get();

     if(count($session)>0){
       $password=$req->password;
       $s= patient::where('id',$session[0]->id)
        ->get();
       if(Hash::check($password,$s[0]->mdp) ){
         $req->session()->put('id',$session[0]->id);
         $req->session()->put('name',$session[0]->nom);
         $req->session()->put('prenom',$session[0]->prenom);

         return redirect('/');
       }else {
      return redirect('connect')->with('pass','Veuillez verifier votre mote de passe');
       }
       }else {
         return redirect('connect')->with('log','email entré ne correspond à aucun compte.');
     }




}
/*
*/
/*function protect(Request $req){
    if(!$req->session()->has('id')) {
        //return redirect('/');
  } else {
    $name=$req->session()->get('name');
    $capsule =array('name' => $name);
    return view('index')->with($capsule);
 }
}*/



function logout(Request $req){
  $req->session()->forget('id');
  $req->session()->forget('name');
  $req->session()->forget('prenom');

  return redirect('/');
}

function desactiver(Request $req) {
  $id=session()->get('id');
 DB::select(DB::raw("DELETE from patients where id=".$id));

  $req->session()->forget('id');
 $req->session()->forget('name');
 $req->session()->forget('prenom');
  alert()->success('Votre compte est désactivée ')->autoclose(5500);
  return redirect('/');

} }
