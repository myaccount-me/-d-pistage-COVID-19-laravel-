@extends('welcome')

@section('labo')

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.calendar {
    margin: auto;
    width: 460px;
    background-color: #fff;
    box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.2);
    position:relative;
    top:-150px;
    left:180px;
}


.btn1{
  border-color: #000000;
  padding: 7.5px 10px;
  border-top-right-radius: 50px;
  border-bottom-right-radius:50px;
  background: #F8F6FA;

  border: 3px solid #F8F6FA;
  border:none;
  position:relative;
  top:50px;
  left:280px;


}
.btn1:focus {
outline: none; /* Pour enlever la bordure bleu */
}

 .i{

  position:relative;
  top:50px;
  left:290px;
  padding: 5px 4px;
  background-color: #F8F6FA;
  border-top-left-radius: 45px;
  border-bottom-left-radius:45px;
  border: 3px solid #F8F6FA;
  border:none;
  font-size:10px;
  font-weight: 400;

}
.i:focus {
outline: none; /* Pour enlever la bordure bleu */
}

.s{
  font-size:13.5px;
  font-weight:bold;
  color:#000000;
  text-transform:uppercase;
  font-family: 'Dosis';
}
</style>

<section id="services" class="services section-bg" style="background:#FFFFFF;">
  @include('sweet::alert')
     <div class="container">
  <form action="/labo" method="get" >
       <div class="section-title">
         <h2 style=" text-align: center;position:relative;top:55px;font-size:18px;color:#014A6A;">Trouvez un centre de dépistage Covid-19 et réservez en ligne</h2>

         <input type='text' name='recherche'  class="i" />

           <button class="btn1" type="submit" > <span class="fas fa-search" style="color: #000000;"></span> </button>

       </div>

       <div class="row">

         <div class="col-lg-10 col-md-6"  >
           @foreach ($labos as $l)
           <div class="icon-box">

             <h4 class="title"><a href="">{{$l->nom_labo}}</a></h4>
             <div class="description">
  <span class="label"> Téléphone: </span> <span class="s"> {{$l->telB}}</span><br/>
                <span class="label"> Email : </span><span class="s"> {{$l->mail}}</span><br/>
              <span class="label"> Adresse : </span><span class="s"> {{$l->ville}} ,{{$l->adresse}} ,{{$l->cp}}.</span><br/>
              <span class="label"> Contact: </span> <span class="s"> {{$l->contact}} </span><br/>

<a href="horraire{{$l->id}}" role="button">
<button  class="button" type="button"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> AFFICHER LES HORRAIRS </button></a>


@if($message = Session::get('h'))
@if ($message[0]['labo_id']==$l->id)
<div class="calendar" >
    <div >

        <div>
            <div id="day"  style="text-align:center;" >
<div style='display:inline-block;padding-left:2px;font-size:14px;color:#014A6A;font-weight: 700'>{{$message[0]['date']}}</div>
</div>
</div>


<?php
    $duree= strtotime($message[0]['duree']);
    $minute = date("i", $duree);
    $second = date("s", $duree);
    $hour = date("H", $duree);
    $i = strtotime($message[0]['heure_d']); ?>
    @if(! session()->has('id'))
    <a role="button" data-toggle="modal" data-target="#myModal" >
    <button class="btn btn-outline" style="margin-left:25px;margin-top:12px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;">{{date('H:i:s', $i)}}
    </button> </a>
    @else
    <a href="reserver{{$l->id}}-{{$i}}-{{$message[0]['date']}}" role="button">
    <button class="btn btn-outline" type="button" style="margin-left:25px;margin-top:12px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;">{{date('H:i:s', $i)}}
    </button> </a>
    @endif
    <?php
    while(date('H:i:s', $i) < $message[0]['heure_f']) {
      $convert = strtotime("+$minute minutes", $i);
       $convert = strtotime("+$second seconds", $convert);
       $convert = strtotime("+$hour hours", $convert);
      $i = $convert;?>
      @if(! session()->has('id'))
      <a role="button" data-toggle="modal" data-target="#myModal" >
    <button class="btn btn-outline" style="margin-left:25px;margin-top:14px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;" > {{date('H:i:s', $i)}}</button>
  </a>
 @else
 <a href="reserver{{$l->id}}-{{$i}}-{{$message[0]['date']}}" role="button">
   <button type="button" class="btn btn-outline" style="margin-left:25px;margin-top:14px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;" > {{date('H:i:s', $i)}}</button>
 </a>
 @endif
  <?php   }
  ?>
</div>
<span style="margin-left:150px">{{$message->links()}}</span>


<div> <hr/></div>



 </div>
 @endif
@endif
</diV>


</div>
 @endforeach




 </div>
</div>

</div>
</form>

     </div>

   </section>



   <!-- Modal -->

   <style>

   .form-group {
      width: 300px;
      height: auto;
      position:relative;


   }

   .bt{
     border-radius: 5px;
     border:2px solid #00DFC6;
     background:#FFFFFF;
     padding: 3px 25px;
     color:#00DFC6;
     margin-top:-5px;
     text-transform: uppercase;
     cursor: pointer;
     font-weight: bold;
     font-size:14px;

   }
   .bt:focus {
   outline: none;
   }

   </style>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h2 class="modal-title" style="font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:15px; text-transform: uppercase;text-align:center;">Se connecter
         <p style="font-size:13px;font-weight:bold;color:#00DFC6;text-transform:uppercase;
           font-family: 'Dosis';text-align:center;" >il faut connecter d'abord</p></h2>



         <br/>
<a href="/connect">
         <button type="button" class="bt" style="margin-left:160px;">Connecter</button></div></a>
  <div class="form-group" style="margin-left:160px;">

         <p style=" font-size:11px; text-align:right;"> Nouveau sur GO Médical ? <a href="/inscrire"style="text-decoration: underline; color:#014A6A;">s'inscrire</a></p>


         </div>

        </form>


      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>

<script>

    var dt = new Date();
    function renderDate() {



      document.getElementById("day").innerHTML = "<div style='display:inline-block;padding-left:5px;font-size:11px'>" + dt.toLocaleString('fr-FR',{
              weekday:'long',

      })+"<br/>"+dt.toLocaleString('fr-FR',{

        month:'long',
        day:'numeric'

      })+"</div>";

      for(i=1;i<6;i++) {

        dt.setDate(dt.getDate() + 1);
      document.getElementById("day").innerHTML += "<div style='display:inline-block;padding-left:20px;font-size:11px'>" + dt.toLocaleString('fr-FR',{
              weekday:'long',

      })+"<br/>"+dt.toLocaleString('fr-FR',{

        month:'long',
        day:'numeric'

      })+"</div>";

      }


    }

    function moveDate(para) {
       if(para == 'next') {

            dt.setDate(dt.getDate() + 1);
              renderDate();
        } else if(para == 'prev') {
          dt.setDate(dt.getDate() -11);

          renderDate();


}


    }



</script>
@endsection
