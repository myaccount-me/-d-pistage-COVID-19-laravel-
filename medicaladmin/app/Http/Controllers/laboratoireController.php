<?php

namespace App\Http\Controllers;
use App\Models\laboratoire;
use App\Models\compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class laboratoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $data=laboratoire::all();
return view('labo',['labo'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $req->validate ([


               'cp'=> 'digits:4|numeric',
               'mail'=> 'unique:laboratoires',
               'telB'=> 'digits:8|unique:laboratoires|numeric'

      ]  , [


                'cp.numeric' => "code postal doit uniqument contenir des chiffres.",
               'cp.digits'=> " code postal doit contenir 4 chiffres.",


            'mail.unique'=> "ce mail existe deja.",


            'telB.digits'=> " numéro de telephone doit contenir 8 chiffres.",

            'telB.numeric' => " numéro de telephone doit uniqument contenir des chiffres.",
            'telB.unique'=> "cette numero de téléphone existe deja."
        ]);
        $laboratoire = new laboratoire();

          $laboratoire->nom_labo=$req->nom;
          $laboratoire->cp=$req->cp;
          $laboratoire->adresse=$req->adress;
          $laboratoire->ville=$req->ville;
          $laboratoire->mail=$req->mail;
          $laboratoire->telB=$req->telB;
          $laboratoire->contact=$req->contact;

        $created= $laboratoire->save();
        if($created) {
            $compte = new compte();
            $compte->login=$req->login;
            $compte->mdp=hash::make($req->mdp);
            $compte->privilége='personel';
            $labo =laboratoire::where('mail',$req->mail)
        ->get();

         $compte->labo_id=$labo[0]->id;
         $create= $compte->save();
           if($create) {
  alert()->success(' compte crée avec succées')->autoclose(5500);

           return  redirect('labo');
          }
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




               'cp'=> 'digits:4|numeric',

               'telB'=> 'digits:8|numeric'

      ]  , [



                'cp.numeric' => "code postal doit uniqument contenir des chiffres.",
               'cp.digits'=> " code postal doit contenir 4 chiffres.",





            'telB.digits'=> " numéro de telephone doit contenir 8 chiffres.",

            'telB.numeric' => " numéro de telephone doit uniqument contenir des chiffres."

        ]);
          $laboratoire=laboratoire::find($req->id);
                    $laboratoire->nom_labo=$req->nom;
                    $laboratoire->cp=$req->cp;
                    $laboratoire->adresse=$req->adress;
                    $laboratoire->ville=$req->ville;
                    $laboratoire->mail=$req->mail;
                    $laboratoire->telB=$req->telB;
                    $laboratoire->contact=$req->contact;

                 $laboratoire->save();
            $compte=compte::where('labo_id',$req->id)
            ->get();

         $compte[0]->login=$req->login;
       $compte[0]->mdp=hash::make($req->mdp);;
        $compte[0]->save();
        alert()->success(' compte modifié avec succées')->autoclose(5500);
                 return redirect('labo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
   $data=DB::select(DB::raw("SELECT distinct laboratoires.id,laboratoires.nom_labo,laboratoires.mail,laboratoires.cp,laboratoires.adresse,laboratoires.ville,laboratoires.telB,
     laboratoires.contact , comptes.login , comptes.mdp
         FROM comptes ,Laboratoires
         where  comptes.labo_id= Laboratoires.id AND Laboratoires.id =".$id));
          return view('editcompte',['compte'=>$data]);

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
        $data=laboratoire::find($id);
    $data->delete();
        $compte=compte::where('labo_id',$id)
        ->get();
  $compte[0]->delete();
  alert()->success(' compte est supprimé avec succées')->autoclose(5500);
        return redirect('labo');
    }
}
