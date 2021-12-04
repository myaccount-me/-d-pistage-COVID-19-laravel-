<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Medical | ADMIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
  <!--<link rel="stylesheet" href="{{asset('assets\air-datepicker\dist\css\datepicker.css')}}">-->
  <link rel="stylesheet" href="{{asset('assets\air-datepicker\dist\css\datepicker.min.css')}}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
<a href="/">
				<img src="assets/img/logo.png" alt="" class="img-fluid"/></a>

				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">

				
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell" style="color:#ffffff;"></i>

							</a>

						</li>
						<li class="nav-item ">
							<a   href="logout" style="font-size:15px;color:#424949"> <span style="font-size:15px;"><i class="fas fa-sign-out-alt"></i></span>Déconnexion</span>
							</a>

								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">

				<div class="user">
								<div class="photo">
									<img src="assets/img/profile.png" style="margin-top:3px;">

								</div>
								<div class="info" >
									<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
									Bienvenue,
									@if(session()->get('privilége')=='personel')
									<span class="user-level">{{session()->get('nom_labo')}}</span>

                  @else
									<span class="user-level">Adinstrateur<span>

								@endif
									<span class="user-level">
</a>
								</div>
							</div>
					<ul class="nav">

						@if(session()->get('privilége')=='personel')
						<li class="nav-item active">
							<a href="/rdv">
								<i class="la la-dashboard"></i>
								<p>Mes Rendez-vous</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="/listeAgd">
								<i class="fa fa-calendar" style="font-size:16px"></i>
								<p>Mon agenda</p>

							</a>
						</li>
						<li class="nav-item"  >
							<a href="/liste">
								<i class="fa fa-list" style="font-size:16px"></i>
								<p>Liste des Documents</p>

							</a>
						</li>

@else (session()->has('privilége')=='admin')
<li class="nav-item"  >
	<a href="/labo">
		<i class="fa fa-h-square" style="font-size:18px"></i>
		<p>Liste des Laboratoires</p>

	</a>
</li>
@endif
					</ul>
				</div>
			</div>
			<div class="main-panel">
	@yield('agenda')
  @yield('docs')
	@yield('index')
	@yield('liste')
	@yield('modif')
	@yield('lAgenda')
	@yield('modifA')
	@yield("labo")
	@yield('compte')
	@yield('edit')
				</div>
				<footer class="footer">
					<div class="container-fluid">

<div class="copyright" style="text-align: center;
color: #000000;
font-weight: bold;
font-size:12px;">
					&copy; Copyright Go Médical.<br/>
           Designed by Team Go Médical.
			</div>
						</div>

				</footer>
			</div>
		</div>
	</div>


</body>
<!--<script src="{{asset('assets\air-datepicker\dist\js\datepicker.js')}}"></script>-->

<script src="{{asset('assets\air-datepicker\dist\js\datepicker.min.js')}}"></script>
<script src="{{asset('assets\air-datepicker\src\js\i18n\datepicker.fr.js')}}"></script>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<!--<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>-->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
</html>
