@extends('welcome')
@section('edit')
<div class="content">
<div class="container-fluid">


<div class="row">
            <div class="col-md-6" style="margin-left:220px;">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-title">Modifier  Laboratoire</h2>
                </div>
                <div class="card-body">
          <form action="editcompte" method="post">
            @csrf
              @foreach($compte as $c)
              <input type="hidden" name='id' value="{{$c->id}}" >
            <div class="form-group">
              <label for="nom" style="font-size:20px;font-weight:700;">Laboratoire:</label>
              <input type="text"  class="form-control"  value="{{$c->nom_labo}}" name="nom" required>
              <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                @error('nom'){{$message}}@enderror</span></div>
              <div class="form-group">
                <label  style="font-size:20px;font-weight:700;">Email:</label>
                <input type="email"  class="form-control" value="{{$c->mail}}" name="mail" required>
                <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                  @error('mail'){{$message}}@enderror</span></div>
                <div class="form-group">
                  <label  style="font-size:20px;font-weight:700;">Adresse:</label>
                  <input type="text"  class="form-control" value="{{$c->adresse}}" name="adress" required>
                  <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                    @error('adress'){{$message}}@enderror</span>
                </div>
                  <div class="form-group">
                    <label  style="font-size:20px;font-weight:700;">Ville :</label>
                    <input type="text"  class="form-control"  value="{{$c->ville}}" name="ville" required>
                    <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                      @error('ville'){{$message}}@enderror</span>


                  </div>
                  <div class="form-group">
                    <label  style="font-size:20px;font-weight:700;">Code postal:</label>
                    <input type="text"  class="form-control"  value="{{$c->cp}}" name="cp" required>
                    <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                      @error('cp'){{$message}}@enderror</span>

                  </div>
                    <div class="form-group">
                      <label  style="font-size:20px;font-weight:700;">contact:</label>
                      <input type="text"  class="form-control" value="{{$c->contact}}" name="contact" required>
                      <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                        @error('contact'){{$message}}@enderror</span>
</div>

                        <div class="form-group">
                          <label  style="font-size:20px;font-weight:700;">téléphone:</label>
                          <input type="text"  class="form-control" value="{{$c->telB}}" name="telB" required>
                          <span style="font-size:10px;color:red;text-transform: uppercase;font-weight:bold;position:absolute;">
                            @error('telB'){{$message}}@enderror</span>

                        </div>
                          <div class="form-group">
                            <label  style="font-size:20px;font-weight:700;">Login:</label>
                            <input type="text"  class="form-control" value="{{$c->login}}" name="login" required></div>

                            <div class="form-group">
                              <label  style="font-size:20px;font-weight:700;">mot de passe:</label>
                              <input type="password"  class="form-control" value="" name="mdp" required id="password">
                              <span style="position: absolute;  left:440px;top:88.4%;cursor: pointer;" >
                              <i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye"  onclick="toggle()"></i>
                              <i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle()"></i></span>

                            </div>

@endforeach



<div class="card-action" style="margin-left:180px;">
                    <button class="btn btn-success" type="submit">ENREGISTRER</button>
                    <button class="btn btn-danger" type="reset">ANNULER</button>
                  </div>
                </form>
                </div>
              </div>
        </div>
      </div>
</div>
</div>
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

@endsection
