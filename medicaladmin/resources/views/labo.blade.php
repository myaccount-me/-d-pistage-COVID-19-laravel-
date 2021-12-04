@extends('welcome')
@section('labo')
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
.td{
  text-align:center;
  text-transform:uppercase;


  font-weight:bold;
  font-size:12px;
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
    @include('sweet::alert')
  <div class="row">
<div class="col-md-12">
	<div class="card card-tasks">
	<div class="card-header ">
    		<h2 class="card-title" style="margin-right:65px;">Liste des laboratoires
					<p style="font-size:13px;font-weight:bold;color:#2CC5FF;text-transform:uppercase;
     font-family: 'Dosis';text-align:center;">De dépistage COVID-19</p></h2>
     <a  href="/compte" role="button"><button type="button" class="b" style="background:#00C8B0;margin-left:850px;">Nouveau Compte</button></a>
									</div>
	<div class="card-body ">
	<div class="table-full-width">
		<table class="table">
		<thead>
		<tr>
  <th width="19%" class="th">Laboratoire</th>
	<th width="23%" class="th">Email</th>
	<th  width="20%" class="th">Numéro de téléphone</th>
  <th width="18%"></th>
</tr>
</thead>
<tbody>
  @foreach($labo as $l)
  <tr>
    <td class="td">{{$l->nom_labo}} </td>
    <td class="td">{{$l->mail}} </td>
    <td class="td">{{$l->telB}}</td>
    <td>

  <a  href="edit{{$l->id}}" role="button">  <button type="button" class="b">Modifier</button></a>
  <a  data-target="#my-Modal-{{ $l->id }}"
    data-toggle="modal" role="button">  <button type="button" class="b" style="background:#FF3A3A">Supprimer</button></a>

    <!-- Modal delete-->
<div id="my-Modal-{{ $l->id }}" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-body">
<form method="get" action={{"supp/".$l->id}} >
@csrf
<input type="hidden"  name="ids[]" value="{{$l->id}}"/>
<button type="button" class="close" data-dismiss="modal">&times;</button>
<br/>
<h2 class="modal-title" style="margin-top:15px;font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:15px; text-transform: uppercase;text-align:center;">
        Etes vous sur de vouloir supprimer ce compte?</h2>
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
