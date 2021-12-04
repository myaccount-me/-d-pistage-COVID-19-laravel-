@extends('welcome')
@section('reserver')
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
    left: 49.5%;
    transform: translate(-50%, -50%);
}
.label {
    position: absolute;
    top: 0;
    font-size: 16px;
    padding-left: 12px;

    line-height: 50px;
    transition: .5s ease;
}
.form-control:focus + .label,
.form-control:valid + .label {
    top: -25px;
    padding-left: 0;
    font-size: 13px;
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

input[name=nom] {
    pointer-events: none;
 }
 input[name=date] {
     pointer-events: none;
  }

  [type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #000000;
    text-transform: uppercase;
    font-weight:bold;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #00DFC6;
    position: absolute;
    top: 2.5px;
    left: 3.1px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>
<section id='hero' class="d-flex align-items-center" style="height: 110vh;">
<form action="addreservation" method="post">
  @csrf
     <div >
       <input type="hidden" name="id" value="{{$labo->id}}">
  <h2 style="text-align:center;margin-top:-150px;margin-left:553px">Prendre un rendez-vous</h2>
  <div class="form-group" style="top:280px;">
   <input type="text" name="nom"  class="form-control"  value="{{$labo->nom_labo}}" required style="font-size :13.5px;font-weight:550" >
   <label for="nom" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" class="label">Laboratoire
   </label>
  </div>
  <div class="form-group" style="top:370px;" >

    <input type="text" name="date"  class="form-control " value="{{$date}}" required style="font-size :13.5px;font-weight:550" >
    <label for="date" style=" text-transform: uppercase;font-weight:bold;color:#DBDBDB" class="label" >date de rendez-vous

  </label>
  <span style="position: absolute;  right: 15px;  transform: translate(0,-50%);top:55%;cursor: pointer;"  >
  <i class="far fa-calendar-alt"  style='font-size:15px;color:#DBDBDB;display:block;'></i></span>
  </div>
  <div class="form-group" style="top:460px;" >
  <input type="radio" id="test1" name="motif" required value="Voyage">
  <label for="test1" style="font-size :12px;margin-left:10px;">Voyage</label>

  <input type="radio" id="test2" name="motif" required value="Sous prescription médical">
  <label for="test2" style="font-size :12px;margin-left:10px;">Sous prescription médical</label>
</div>
<div class="form-group" style="top:550px;">

<button type="submit" class="btn1" style="margin-left:70px;padding: 4px 11px ; font-size:12px;font-weight:700" >Valider</button>
<button type="reset" class="btn1" style="padding: 4px 10px ; font-size:12px;font-weight:700" >Annuler</button>

</div>
</div>
</form>
</section>


@endsection
