@extends('welcome')
@section('edit')
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>

.calendar {
    margin: auto;
    width: 480px;
    background-color: #fff;
    box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.2);
    position:relative;
    top:-100px;
    left:50px;
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
  left:190px;


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





<section id="hero" class="d-flex align-items-center">

  @include('sweet::alert')


  <form action="Home" method="post">


@csrf



<h2 style="text-align: center;padding:0 400px;margin-top:-10px;height:60px;margin-left:100px;">Renouvellement d'un rendez-vous

</h2> <br/> <br/> <br/>
@foreach($edit as $m)
<div class="calendar" >
    <div >

        <div>
            <div id="day"  style="text-align:center;" >



<div style='text-align:center;color:#014A6A;font-weight: 700'>{{$m['date']}}</div>

     <?php
         $duree= strtotime($m->duree);
         $minute = date("i", $duree);
         $second = date("s", $duree);
         $hour = date("H", $duree);
         $i = strtotime($m->heure_d); ?>

         <a href="deplacer{{$id}}-{{$i}}-{{$m['date']}}" role="button">
         <button class="btn btn-outline" type="button" style="margin-left:25px;margin-top:12px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;">{{date('H:i:s', $i)}}
         </button> </a>

         <?php
         while(date('H:i:s', $i) < $m->heure_f) {
           $convert = strtotime("+$minute minutes", $i);
            $convert = strtotime("+$second seconds", $convert);
            $convert = strtotime("+$hour hours", $convert);
           $i = $convert;?>

      <a href="deplacer{{$id}}-{{$i}}-{{$m['date']}}" role="button">
        <button type="button" class="btn btn-outline" style="margin-left:25px;margin-top:14px;border:2px solid #00DFC6;color:#014A6A;font-weight: bold;padding:2px 8px;" > {{date('H:i:s', $i)}}</button>
      </a>

       <?php   }
       ?>
     </div>
@endforeach
     <span style="margin-left:150px">{{$edit->links()}}</span>











      </form>

</section>
@endsection
