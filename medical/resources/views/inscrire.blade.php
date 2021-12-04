@extends('welcome')

@section('inscrire')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="{{asset('assets\air-datepicker\dist\css\datepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.form-control{
    position: relative;
    height: ;
    font-size: 15px;
    border: none;
    border-bottom: 1px solid #49b5e7;
    border-radius: 0;
    transition: .5s ease-in-out;
}
.form-control:focus {
    box-shadow: none;
    border-bottom:  2px solid #49b5e7
}
.form-group {
    width: 350px;
    height: auto;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
}
label {
    position: absolute;
    top: 0;
    font-size: 14px;
    padding-left: 12px;

    line-height: 50px;
    transition: .5s ease;
}
.form-control:focus + label,
.form-control:valid + label {
    top: -25px;
    padding-left: 0;
    font-size: 10px;
}

.btn1{
border-radius: 50px;

border:2px solid #00DFC6;
background:#FFFFFF;
padding: 5px 40px;
color:#00DFC6;
text-transform: uppercase;
cursor: pointer;

}
.btn1:focus {
outline: none; /* Pour enlever la bordure bleu */
}
</style>




<section id='hero' class="d-flex align-items-center" style="height: 145vh;">
  @include('sweet::alert')
<form action="addPatient" method="post">
  @csrf
   <div >
 <h2 style="text-align: center;padding:0 600px;margin-top:-20px;height:620px;">S'inscrire</h2>

 <div class="form-group" style="top:190px;">
  <input type="text" name="nom"  class="form-control" required>
  <label for="nom" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Nom
  </label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:100%;position:absolute;width:500px;">@error('nom'){{$message}}@enderror</span>


</div>
<div class="form-group" style="top:260px;">
  <input type="text" name="prenom"  class="form-control" required>
  <label for="prenom" style="font-weight:bold;color:#DBDBDB;text-transform:uppercase" >Prenom
</label>
<span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:100%;position:absolute;width:500px;">@error('prenom'){{$message}}@enderror</span>

</div>
 <div class="form-group" style="top:325px;">

  <input type="text" name="cin"  class="form-control" required>
  <label for="cin" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Carte d'identité
  </label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:112%;position:absolute;width:500px;">@error('cin'){{$message}}@enderror</span>
</div>


<div class="form-group" style="top:390px;">
  <input type="text" name="mail"  class="form-control" required>
  <label for="mail" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Mail
</label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:112%;position:absolute;width:500px;">@error('mail'){{$message}}@enderror</span>
</div>
<div class="form-group" style="top:455px;">
  <input type="text" name="tel"  class="form-control" required>
  <label for="tel" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Téléphone
</label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:112%;position:absolute;width:500px;">@error('tel'){{$message}}@enderror</span>
</div>
<div class="form-group" style="top:520px;">
  <input type="text" name="adrs"  class="form-control" required>
  <label for="adrs" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Adresse
</label>
</div>
<div class="form-group" style="top:585px;">
  <input type="text" name="ville"  class="form-control" required>
  <label for="ville" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >ville
</label>
<span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:100%;position:absolute;width:500px;">@error('ville'){{$message}}@enderror</span>

</div>
<div class="form-group" style="top:650px;" >

  <input type="text" name="date"  class="form-control datepicker-here" data-language='fr-FR' data-date-format ='yyyy-mm-dd' required  >
  <label for="date" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >date de naissance

</label>
<span style="position: absolute;  right: 15px;  transform: translate(0,-50%);top:55%;cursor: pointer;"  >
<i class="far fa-calendar-alt"  style='font-size:15px;color:#DBDBDB;display:block;'></i></span>
</div>

<div class="form-group" style="top:715px;">

    <input type="password" name="mdp" class="form-control" id="p1" required>
           <label for="password" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Mot de Passe
          </label>
 <span style="position: absolute;  right: 15px;  transform: translate(0,-50%);top: 55%;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye"  onclick="toggle()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle()"></i>
</span>

</div>
<div class="form-group" style="top:780px;">

    <input type="password" name="confirm" class="form-control"  id="p2" required>
           <label for="confirm" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" >Confirmer Mot de passe
          </label>
 <span style="position: absolute;  right: 15px;  transform: translate(0,-50%);top: 55%;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye"  onclick="toggle1()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle1()"></i>
</span>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:112%;position:absolute;width:500px;">@error('confirm'){{$message}}@enderror</span>
</div>



 <div class="form-group" style="top:850px;">

 <button type="submit" class="btn1" style="margin-left:90px;padding: 4px 11px ; font-size:12px;font-weight:700">S'inscrire</button>





 <button type="reset" class="btn1"  style="padding: 4px 10px ; font-size:12px;font-weight:700">Annuler</button>

 </div>
      </div>
      </form>
</section>


<script>



var state= false;
function toggle(){
    if(state){
         	document.getElementById("p1").setAttribute("type","password");


           document.getElementById("eye2").style.display='none';
             document.getElementById("eye").style.display='block';
         	state = false;
              }
              else{
         	document.getElementById("p1").setAttribute("type","text");

           	document.getElementById("eye").style.display='none';
             	document.getElementById("eye2").style.display='block';
         	state = true;
              }
         }
function toggle1(){
             if(state){
                  	document.getElementById("p2").setAttribute("type","password");


                    document.getElementById("eye2").style.display='none';
                      document.getElementById("eye").style.display='block';
                  	state = false;
                       }
                       else{
                  	document.getElementById("p2").setAttribute("type","text");

                    	document.getElementById("eye").style.display='none';
                      	document.getElementById("eye2").style.display='block';
                  	state = true;
                       }
                  }

</script>


<script src="{{asset('assets\air-datepicker\dist\js\datepicker.min.js')}}"></script>
<script src="{{asset('assets\air-datepicker\src\js\i18n\datepicker.en.js')}}"></script>

@endsection
