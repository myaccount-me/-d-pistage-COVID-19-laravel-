@extends('welcome')
@section('rdv')


<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.th{
text-align:center;
text-transform:uppercase;
font-family: "Dosis";
color:#42C3CF;
font-size:16px;
}
.td{
  text-align:center;
  text-transform:uppercase;
  font-family: "Dosis";

  font-weight:bold;
  font-size:14px;
  color:#000000;
}
.b{
  border-radius: 5px;
  font-weight: bold;
  border:2px solid #FFFFFF;
  background:#00DFC6;
  padding: 4px 5.5px;
  color:#FFFFFF;
  font-size:10px;
  text-transform: uppercase;
  cursor: pointer;
}
.b:focus {
outline: none;
}
.bt{
  border-radius: 5px;
  border:2px solid #FFFFFF;
  background:#00DFC6;
  padding: 3px 15px;
  color:#FFFFFF;

  text-transform: uppercase;
  cursor: pointer;

}
.bt:focus {
outline: none;
}

.form-control{
     position: relative;
    height: ;
    font-size: 15px;
    border: none;
    border-bottom: 1px solid #2CC5FF;
    border-radius: 0;
    transition: .5s ease-in-out;
}


.form-control:focus {
  box-shadow: none;
    border-bottom:  2px solid #2CC5FF;
}

.form-group {
   width: 250px;
   height: auto;
   position:relative;


}
label {
    position: absolute;
    top: 0;
    font-size: 14px;
    padding-left: 12px;
    line-height: 35px;
    transition: .5s ease;
}
.form-control:focus + label,
.form-control:valid + label {
    top: -20px;
    padding-left: 0;
    font-size: 10px;
}
</style>
<section id='hero' class="d-flex ">
@include('sweet::alert')
  <h2 style="text-align:center;top:50px;left:500px;font-size:19px;width: 250px;color:#014A6A;position:relative;">
    Mes rendez-vous</h2>


    <table class="table"  style="position:relative;top:140px;width:70%;right:65px;">
    <thead>
      <tr>

        <th   width='8%' class="th">Laboratoire</th>
        <th  width='8%' class="th">Date&Heure</th>
        <th  width='12%'  class="th"></th>

      </tr>
    </thead>
    <tbody>
      @foreach ($r as $r)
       <tr>

        <td class="td" >{{$r->nom_labo}}<br/><p style="font-size:11px;font-weight:bold;color:#515A5A;"><i class="fa fa-map-marker"></i> {{$r->ville}},{{$r->adresse}} {{$r->cp}} <br/><i class="fa fa-envelope"></i> {{$r->mail}}<br/>
    <i class="fa fa-phone"></i> {{$r->telB}}  </p></td>
        <td class="td">{{$r->date}} {{$r->time}}</td>
<td><a data-target="#my-Modal-{{ $r->id }}"
          data-toggle="modal"   role="button"><button type="button" class="b" style="background:#FF3A3A" >Anuuler</button></a>


          <!-- Modal delete-->

          <div id="my-Modal-{{ $r->id }}" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
              <form method="get" action={{"delete/".$r->id }} >
                @csrf

                <input type="hidden"  name="ids[]" value="{{ $r->id }}"/>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <br/>
              <h2 class="modal-title" style="margin-top:15px;font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:15px; text-transform: uppercase;text-align:center;">Etes vous sur de vouloir annuler votre rendez vous ?</h2>
              <br/>

             <button type="submit" class="bt" style="margin-left:120px;">Confirmer</button>
               <button type="button" class="bt" data-dismiss="modal" style="margin-left:250px;position:relative;top:-33px;background:#FF3A3A;">annuler</button>
         </form>
           </div>
            <div class="modal-footer">

            </div>
              </div>

            </div>
          </div>
         <!-- end Modal-->

        <a href="edit{{$r->labo_id}}-{{$r->id}}"  role="button" ><button type="button" class="b" style="background:#2CC5FF">Deplacer</button></a>









     </tr>
      @endforeach

    </tbody>
  </table>

</section>










@endsection
