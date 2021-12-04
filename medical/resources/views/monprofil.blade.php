@extends('welcome')
@section('profil')
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
    width: 300px;
    height: auto;
    position: absolute;
    left: 49%;
  transform: translate(-50%, -50%);
}
.l {
    position: absolute;
    top: 0;
    font-size: 14px;
    padding-left: 12px;

    line-height: 50px;
    transition: .5s ease;
}
.form-control:focus + .l,
.form-control:valid + .l {
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

<section id="hero" class="d-flex align-items-center " >
@include('sweet::alert')
  <form action="updateP" method="post">
    @csrf
     <div >
<h2 style=" text-align:center;margin-top:5px;margin-left:350px;height:250px;width:100%;">Modifier Mon Mot de passe</h2><br/>

<div class="form-group" style="height:450px;">

<input type="password"  id="p1"  class="form-control" required name="ancienne">
    <label for="password" style="text-transform: uppercase;font-weight:bold;color:#DBDBDB"  class="l" >Ancienne Mot de Passe
   </label>
<span style="position: absolute;  right: 15px;margin-top:-15px;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye1"  onclick="toggle()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle()"></i>
</span>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:10%;position:absolute;width:500px;">@if(session('error')){{session('error')}}@endif</span>
</div>

<div class="form-group" style="height:300px;">

<input type="password" name="password"  id="p2" class="form-control" required>
    <label for="password" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" class="l"  >Nouveau Mot de Passe
   </label>
<span style="position: absolute;  right: 15px;margin-top:-15px;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye3"  onclick="toggle1()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye4"  onclick="toggle1()"></i>
</span>

</div>

<div class="form-group" style="height:150px;">

<input type="password"  id="p3"  class="form-control" required name="confirm">
    <label for="password" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" class="l"  >confirmer
   </label>
<span style="position: absolute;  right: 15px;margin-top:-15px;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye5"  onclick="toggle2()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye6"  onclick="toggle2()"></i>
</span>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:30%;position:absolute;width:500px;">@error('confirm'){{$message}}@enderror</span>
</div>

<div class="form-group" style="margin-top:55px;margin-left:20px;padding: 0px 20px;">
  <button type="submit" class="btn1" style="margin-left:20px;padding: 4px 11px ; font-size:12px;font-weight:700">Modifier</button>
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
    document.getElementById("eye1").style.display='block';
	state = false;
     }
     else{
	document.getElementById("p1").setAttribute("type","text");

  	document.getElementById("eye1").style.display='none';
    	document.getElementById("eye2").style.display='block';
	state = true;
     }
}
function toggle1(){
    if(state){
	document.getElementById("p2").setAttribute("type","password");


  document.getElementById("eye4").style.display='none';
    document.getElementById("eye3").style.display='block';
	state = false;
     }
     else{
	document.getElementById("p2").setAttribute("type","text");

  	document.getElementById("eye3").style.display='none';
    	document.getElementById("eye4").style.display='block';
	state = true;
     }
}
function toggle2(){
    if(state){
	document.getElementById("p3").setAttribute("type","password");


  document.getElementById("eye6").style.display='none';
    document.getElementById("eye5").style.display='block';
	state = false;
     }
     else{
	document.getElementById("p3").setAttribute("type","text");

  	document.getElementById("eye5").style.display='none';
    	document.getElementById("eye6").style.display='block';
	state = true;
     }
}
</script>
@endsection
