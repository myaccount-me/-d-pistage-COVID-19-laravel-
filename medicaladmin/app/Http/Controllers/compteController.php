<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compte;
use App\Models\laboratoire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class compteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session()->has('id')) {
          return redirect('rdv');
        } else {
          return view ('/login');
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

    function login(Request $req){

   $login=$req->login;
   $session= compte::where('login',$login)
  ->get();
if(count($session)>0){
      $password=$req->password;
      if($session[0]->login != 'admin') {
      $session2=compte::where('labo_id',$session[0]->labo_id)
     ->get();
     if(Hash::check($password,$session2[0]->mdp)){
     $data=laboratoire::find($session[0]->labo_id);
     $req->session()->put('id',$session[0]->labo_id);
     $req->session()->put('privilége',$session[0]->privilége);
     $req->session()->put('nom_labo',$data->nom_labo);
     return redirect('/rdv');
   }
   else {
         return redirect('/login')->with('pass','Veuillez confirmer votre mote de passe');
     }

 } else {
     $session2=compte::where('login',$session[0]->login)
     ->where('mdp',$password)
    ->get();
    if(count($session2)>0){
    $req->session()->put('privilége',$session[0]->privilége);
    return redirect('/labo');}
    else {
          return redirect('/login')->with('pass','Veuillez confirmer votre mote de passe');
      }
  }

}


else {
       return redirect('/login')->with('log','Veuillez confirmer votre login');
   }

}


function logout(Request $req){
  $req->session()->forget('id');
  $req->session()->forget('privilége');


  return redirect('/login');
}

}
