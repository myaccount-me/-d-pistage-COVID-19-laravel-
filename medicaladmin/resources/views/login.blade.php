<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Medical | ADMIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">

</head>
<body>
<style>
  .main-panel {
    position: relative;
    width :calc(100% - 400px);
    min-height: 100%;
    float: right;
    background: #DBDBDB;
  }
   .content {
      position: relative;
      height: 90vh;

  }
  .btn1{

border-radius: 10px;

border:2px solid #00DFC6;
background:#ffffff;
padding: 5px 45px;
color:#00DFC6;
text-transform: uppercase;
cursor: pointer;

}
.btn1:focus {


    outline: none; /* Pour enlever la bordure bleu */
}
</style>


<div class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-4" style="margin-top:75px;margin-left:450px;">
      <form action="connect" method="post">
        @csrf
              <div class="card" style="margin-bottom:15px;">
                  <div class="card-body">
                 <img src="assets/img/login.png" alt="" class="img-fluid"  style="width:40%;margin-left:120px;"/>


                    <br/> <br/>
      <div class="form-group">
  <input type="text" class="form-control" name="login" placeholder="Enter Login" style="width:250px;margin-left:60px;font-weight:bold;font-size:14px;">
  <span style="font-size:10px;color:red;text-transform:uppercase;font-weight:bold;position:absolute;margin-left:62px;">
    @if(session('log')){{session('log')}}@endif
  </span>
            </div>
                  <div class="form-group">

    	<input type="password" id="password"class="form-control" name="password" placeholder="Enter password" style="width:250px;margin-left:60px;font-weight:bold;font-size:14px;">
<span style="position: absolute;  right:93px;top:69%;cursor: pointer;" >
<i class="fa fa-eye-slash" style="font-size:13px;color:#DBDBDB;display:block;" aria-hidden="true" id="eye"  onclick="toggle()"></i>
<i class="fa fa-eye" style="font-size:13px;color:#DBDBDB;display:none;" aria-hidden="true" id="eye2"  onclick="toggle()"></i></span>
<span style="font-size:10px;color:red;text-transform:uppercase;font-weight:bold;position:absolute;margin-left:62px;">
  @if(session('pass')){{session('pass')}}@endif
</span>
    															</div>


                  <div class="form-group" style="margin-left:100px;margin-top:16px;">

                  <button type="submit" class="btn1" >Connecter</button>


                  </div>


                </div>
              </div>
              </form>
        </div>
      </div>
</div>
</div>


</body>

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
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>

<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
</html>
