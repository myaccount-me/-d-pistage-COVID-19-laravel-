@extends('welcome')
@section('docs')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
  background:#00F887;
  padding: 2.5px 25px;
  color:#FFFFFF;
  font-size:11.5px;
  text-transform: uppercase;


}
.b:focus {
outline: none;
}
.label{
  font-family:'Dosis', sans-serif;font-weight:bold;font-size:16.5px;color:#000000;
  margin-left:5%;
}
.bt{
  border-radius: 5px;
  border:2px solid #FFFFFF;
  background:#00DFC6;
  padding: 3px 15px;
  color:#FFFFFF;
  text-transform: uppercase;
  font-weight: 500;
  cursor: pointer;

}
.bt:focus {
outline: none;
}

</style>
<section id='hero' class="d-flex ">

  <h2 style="text-align:center;top:50px;left:500px;font-size:19px;width: 250px;color:#014A6A;position:relative;">
    Mes documents</h2>


    <table class="table"  style="position:relative;top:140px;width:70%;right:65px;">
    <thead>
      <tr>

        <th width='9%' class="th">Nom de Document</th>
        <th width='9%' class="th">Date de Résultat</th>
        <th width='9%' class="th">Résultat</th>

        <th  width='9%'  class="th"></th>

      </tr>
    </thead>
    <tbody>
        @foreach($doc as $d)
      <tr>

 <td class="td" >{{$d->description}} {{$d->code}}</td>
 <td class="td" >{{$d->date_rslt}}</td>
<td class="td">
@if($d->resultat=="negative" || $d->resultat=="NEGATIVE")
<button type="button" class="b"  disabled>negative</button>
@else
  <button type="button" class="b" style="background:#FF3A3A;"  disabled>Positive</button>
@endif
</td>
<td><a data-target="#my-Modal-{{ $d->id }}"
          data-toggle="modal"   role="button"><button type="button" class="b" style="background:#00F5D9;padding: 4px 5.5px;font-size:10px;">plus d'infos</button></a></td>
        </tr>
        <div id="my-Modal-{{ $d->id }}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                @csrf
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<br/>
 <input type="hidden"  name="ids[]" value="{{ $d->id }}"/>
<h2 style="margin-top:10px;font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:20px;text-transform:uppercase;text-align:center;margin-left:112px;" class="d-flex">
{{$d->description}}  {{$d->code}}
  </h2>
<p style="font-size:11px;font-weight:bold;color:#2CC5FF;text-transform:uppercase;
    font-family: 'Dosis';text-align:center;margin-top:-20px;" >Date Resultat : {{$d->date_rslt}}</p>
<span  class="d-flex label">Laboratoire : {{$d->nom_labo}}</span>
<span  class="d-flex label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-map-marker"> </i> </span> {{$d->ville}},{{$d->adresse}} {{$d->cp}}. </span>
<span  class="d-flex label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-envelope" > </i> </span> {{$d->mail}} </span>
<span  class="d-flex label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-phone" > </i> </span> {{ $d->telB}}</span>
<span></span>
<span  class="d-flex label">Motif de test: {{$d->motif}}</span>
<span  class="d-flex label">Date de test: {{$d->date}}</span>
<span  class="d-flex label">Resultat de test RPC 00154 : {{$d->resultat}}</span>

<br/>

<button type="submit" class="bt" style="margin-left:180px;background:#2CC5FF;" data-dismiss="modal">Fermer</button></div>
<div class="modal-footer">
   </div>
  </div>
   </div>
    </div>

@endforeach


       </tbody>
     </table>
   </section>
@endsection
