
@extends('welcome')
@section('index')
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.td{
  text-align:center;
  text-transform:uppercase;
  font-family: "Dosis";

  font-weight:bold;
  font-size:14px;
  color:#000000;
}
.th{
text-align:center;
text-transform:uppercase;
font-family: "Dosis";

font-size:16px;
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
  padding: 3px 30px;
  color:#FFFFFF;

  text-transform: uppercase;
  cursor: pointer;

}
.bt:focus {
outline: none;
}
.label{
  font-family:'Dosis', sans-serif;font-size:15px;color:#000000;
  margin-left:5%;
  font-weight: 700;
}

</style>
<div class="content">
    @include('sweet::alert')
    <form class="navbar-left navbar-form nav-search mr-md-3" action="" style="margin-left:450px;">
      <div class="input-group">
        <input type="text" placeholder="rechercher ..." class="form-control">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="la la-search search-icon"></i>
          </span>
        </div>
      </div>
    </form>
    <br/>
<div class="container-fluid">
  <div class="row">
<div class="col-md-12">
	<div class="card card-tasks">
	<div class="card-header ">
    		<h2 class="card-title" style="margin-right:65px;">Liste Des Rendez-vous
					<p style="font-size:13px;font-weight:bold;color:#2CC5FF;text-transform:uppercase;
     font-family: 'Dosis';text-align:center;">Test dépistage COVID-19</p></h2>
									</div>
	<div class="card-body ">
	<div class="table-full-width">
		<table class="table">
		<thead>
		<tr>
		<th width="4%"></th>
	<th width="22%" class="th">Motif de consultation</th>
	<th  width="19%" class="th">Date&Heure de Rendez-vous </th>
  <th width="20%"></th>
</tr>
</thead>
<tbody>
  @foreach ($r as $r)
	<tr>
	<td>

<div class="form-check">
  	<label class="form-check-label">
       @if($r->etat == 'en attente')
<input class="form-check-input task-select" type="checkbox" disabled >
    @else
    <input class="form-check-input task-select" type="checkbox" disabled checked>
    @endif
	<span class="form-check-sign"></span>
		</label>
	</div>
		</td>
<td class="td">{{$r->motif}}</td>
<td class="td">{{$r->date}} {{$r->time}}</td>

<td>
  @if($r->etat == 'en attente')
  <a data-target="#my-Modal-{{ $r->id }}"
    data-toggle="modal"   role="button"><button type="button" class="b" style="background:#FF3A3A">annuler</button></a>
          <!-- Modal delete-->
<div id="my-Modal-{{ $r->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-body">
    <form method="get" action={{"del/".$r->id}} >
      @csrf
    <input type="hidden"  name="id[]" value="{{ $r->patient }}"/>

    <input type="hidden"  name="ids[]" value="{{ $r->id }}"/>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
      <br/>
  <h2 class="modal-title" style="margin-top:15px;font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:15px; text-transform: uppercase;text-align:center;">
              Etes vous sur de vouloir annuler ce rendez-vous ?</h2>
            <br/>
 <button type="submit" class="bt" style="margin-left:90px;">Confirmer</button>
 <button type="button" class="bt" data-dismiss="modal" style="margin-left:250px;position:relative;top:-35px;background:#FF3A3A;">annuler</button>
                 </form>
                   </div>
                    <div class="modal-footer">

                    </div>
                      </div>

                    </div>
                  </div>
                 <!-- end Modal-->

  <a href={{"confirmer/".$r->id}}   role="button">  <button type="button" class="b">confirmer</button></a>

@endif
<a data-target="#Modal-{{ $r->id }}"
  data-toggle="modal"   role="button"><button  type="button" class="b" style="background:#2CC5FF;">Fiche Patient</button>	</a>



  <!-- fiche patient -->
  <div id="Modal-{{ $r->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      @csrf
    <button type="button" class="close" data-dismiss="modal">&times;</button>
<br/>
 <input type="hidden"  name="ids[]" value="{{ $r->id }}"/>
<h2 style="margin-top:8px;font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:20px;text-transform:uppercase;text-align:center;">
Fiche Patient
<p style="font-size:11px;font-weight:bold;color:#2CC5FF;text-transform:uppercase;
    font-family: 'Dosis';text-align:center;margin-top:5px;" >Motif de consultation : {{$r->motif}}
  <br/> Date de Rendez-vous: {{$r->date}}</p></h2>
<span  class=" label">Nom&Prenom : {{$r->prenom}} {{$r->nom}}</span><br/>
<span  class="label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-map-marker"> </i> </span> {{$r->ville}},{{$r->adresse}}. </span><br/>
<span  class=" label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-envelope" > </i> </span> {{$r->mail}} </span><br/>
<span  class=" label"><span style="font-size:12px;margin-top:4px;"><i class="fa fa-phone" > </i> </span> {{$r->tel}}</span><br/>
<br/>

<button type="submit" class="bt" style="margin-left:180px;background:#2CC5FF;" data-dismiss="modal">Fermer</button></div>
<div class="modal-footer">
   </div>
  </div>
   </div>
    </div>


</td>
	</tr>
@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer ">
										<div class="stats">
											<i class="now-ui-icons loader_refresh spin"></i>
										</div>
									</div>
								</div>
							</div>

</div>



</div>
</div>

@endsection
