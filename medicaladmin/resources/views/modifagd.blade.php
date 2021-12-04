@extends('welcome')
@section('modifA')

<div class="content">
<div class="container-fluid">

<style>
input[name='date']{

}
</style>
<div class="row">
            <div class="col-md-6" style="margin-left:220px;">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-title">Modifier mon agenda</h2>
                </div>
                <div class="card-body">
          <form action="modifAgenda" method="post">
            @csrf
            <div class="form-group">
              @foreach($agd as $a)
              <input type="hidden" name="id" value="{{$a->id}}">
              <label for="password" style="font-size:20px;font-weight:700;">Date:</label>
              <input type="text" class="form-control datepicker-here" data-date-format="yyyy-mm-dd" value="{{$a->date}}" name="date">

            </div>


<div class="form-group">

<span style="font-weight:bolder;"> De: </span>  <input type="time" class="form-control"  min="9:00" max="12:00"  value="{{$a->heure_d}}" required name='debut'>
<span style="font-weight:bolder;">  Jusqu'à : </span>  <input type="time" class="form-control" min="13:00" max="17:00"  value="{{$a->heure_f}}" required name="fin">
<span style="font-weight:bolder;">  Durée : </span>  <input type="time" class="form-control" required name="duree" min="00:30" max="01:00" value="{{$a->duree}}">
</div>
@endforeach
<div class="card-action" style="margin-left:180px;">
                    <button class="btn btn-success" type="submit">MODIFIER</button>
                    <button class="btn btn-danger" type="reset">ANNULER</button>
                  </div>
                </form>
                </div>
              </div>
        </div>
      </div>
</div>
</div>


@endsection
