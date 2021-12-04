@extends('welcome')


@section('connect')
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
    left: 48.5%;
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





<section id="hero" class="d-flex align-items-center">

  @include('sweet::alert')


  <form action="Home" method="post">
@csrf
   <div >

     <h2 style=" text-align:center;padding:0 500px;margin-left:85px;margin-top:5px;height:250px;"> Se Connecter</h2> <br/>

 <div class="form-group" style="height:470px;">
  <input type="text" name="login"  class="form-control" required  >
  <label for="login" style="text-transform: uppercase;font-weight:bold;color:#DBDBDB"  class="l">Mail ou Numéro de telephone</label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:10%;position:absolute;width:500px;">
   @error('login'){{$message}}@enderror</span>
   <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:10%;position:absolute;width:500px;">
    @if(session('log')){{session('log')}}@endif</span>
</div>

</div>
<div class="form-group" style="height:330px;">

    <input type="password" name="password" id="password" class="form-control" required>
           <label for="password" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" class="l" >Mot de Passe
          </label>
 <span style="position: absolute;  right: 15px;  transform: translate(0,-50%);top: 6.5%;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye"  onclick="toggle()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle()"></i>
</span>
<span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;top:12.2%;position:absolute;width:500px;">
@if(session('pass')){{session('pass')}}@endif</span>
</div>

<div class="form-group" style="height:160px;padding: 0px 68px;margin-right:50px;">

<button type="submit" class="btn1" >Connecter</button>


</div>
<div class="form-group" style="height:50px; ">

<p style=" font-size:11px; text-align:right;"> Nouveau sur GO Médical ? <a href="/inscrire"style="text-decoration: underline; color:#014A6A;">s'inscrire</a></p>


</div>

      </div>

      </form>
<script>

var state= false;
function toggle(){
    if(state){
	document.getElementById("password").setAttribute("type","password");

  document.getElementById("eye2").style.display='none';
    document.getElementById("eye").style.display='block';
	state = false;
     }
     else{
	document.getElementById("password").setAttribute("type","text");

  	document.getElementById("eye").style.display='none';
    	document.getElementById("eye2").style.display='block';
	state = true;
     }
}

</script>


</section>


@endsection
