@extends('welcome')
@section('modif')
<style>
input[name=date] {
     pointer-events: none;
  }
</style>
<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-6" style="margin-left:220px;">
      @foreach($doc as $d)
      <form action="editDocument" method="post">
@csrf
<input type="hidden" name="id" value="{{$d->id}}">
              <div class="card">
                <div class="card-header">
                  <h2  class="card-title">Modiffier un Document</h2>
                </div>
                <div class="card-body">

                  <div class="form-group">
                    <label for="mois" style="font-size:20px;font-weight:700;">Selectionner un rendez-vous </label>

												<select class="form-control"  name="rdv" required>
													<option value="">selectionner ..</option>

													<option value="{{$d->rdv}}" selected>{{$d->prenom}} {{$d->nom}} : {{$d->date}} </option>
                                    @foreach($patients as $p)
                          	<option value="{{$p->id}}">{{$p->prenom}} {{$p->nom}} : {{$p->date}} </option>
                            @endforeach

												</select>
                  </div>
                  <div class="form-group">
                    <label for="code" style="font-size:20px;font-weight:700;">Code de Document:</label>
                    <input type="text" class="form-control" value="{{$d->code}}" name="code" required>
    <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                      @error('code'){{$message}}@enderror</span>
                  </div>
                  <div class="form-check">
                        <label  style="font-size:20px;font-weight:700;">Résultat de Test</label><br/>
                        <label class="form-radio-label">
                        @if($d->resultat == 'POSITIVE')
                          <input class="form-radio-input" type="radio" name="option" value="POSITIVE" name="op1" checked>
                        @else
                          <input class="form-radio-input" type="radio" name="option" value="POSITIVE" name="op1" >
                        @endif
                          <span class="form-radio-sign">POSITIVE</span>
                        </label>
                        <label class="form-radio-label ml-3">
                          @if($d->resultat == 'NEGATIVE')
                        <input class="form-radio-input" type="radio" name="option" value="NEGATIVE" name="op2" checked>
                         @else
                          <input class="form-radio-input" type="radio" name="option" value="NEGATIVE" name="op2" >
                          @endif
                          <span class="form-radio-sign">NEGATIVE</span>
                        </label>
  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;left:220px;top:53%;">
                        @error('option'){{$message}}@enderror</span>
                      </div>
                  <div class="form-group">
                    <label for="password" style="font-size:20px;font-weight:700;">Date:</label>
                    <input type="text" class="form-control" value="{{date('Y-m-d H:i:s')}}" name="date">

                  </div>
                  <div class="form-group">
                    <label for="password" style="font-size:20px;font-weight:700;">Description:</label>
                    <textarea class="form-control" name="description" rows="3">
                   {{$d->description}}
                 </textarea>
                 <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                   @error('description'){{$message}}@enderror</span>
                  </div>
@endforeach


                      <div class="card-action" style="margin-left:160px;">
											<button class="btn btn-success" type="submit">MODIFIER</button>
											<button class="btn btn-danger"type="reset">ANNULER</button>
										</div>
                </div>
              </div>
              </form>
        </div>
      </div>
</div>
</div>


@endsection
