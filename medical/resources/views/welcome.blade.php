<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8 ">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home | Médical</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/logo1.png" rel="apple-touch-icon">
  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets\air-datepicker\dist\css\datepicker.min.css')}}">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="/" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Butterfly</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
  @if(! Route :: is('profil') )
  <li class="active"><a href="/">Acceuil</a></li>
  @endif
  @if( Route :: is('index') && !session()->has('id'))
  <li><a href="#about">A Propos</a></li>
  <li><a href="#team">Equipe</a></li>
  @endif
  @if(! Route :: is('index') )
  <li><a href="/labo">Prendre Rendez-vous</a></li>
  @endif
@if(session()->has('id'))

<li  class="drop-down"><a href="#"><span><i class=" far fa-user" style="font-size:15px;"></i>
 {{session()->get('prenom')}} {{session()->get('name')}}
</span> </a>
 <ul>

<li><a href="/rdv"><span><i class="fa fa-calendar" style="font-size:13px;"> </i> </span>  Mes rendez-vous</a></li>
<li><a href="/docs"><span><i class="fa fa-file"></i></span> Mes documents</a></li>
<li class="drop-down"><a href=""> <span><i class="fa fa-cogs"></i></span> Paramétres</a>
  <ul>


<li><a href="/profil"> <span><i class="fa fa-cog"></i></span> Changer  mot de passe</a></li>
<li><a role="button" data-toggle="modal" data-target="#myModa"><span><i class="fa fa-user-times" style="font-size:12px;"></i></span> Désactiver Compte</a></li>
</ul></li>
<li><a href="logout"> <span><i class="fas fa-sign-out-alt"></i></span> Déconnexion</a></li>
</ul>
<p style="font-size:10.5px;padding:0px 55px;margin:0px;font-weight:bold;color:#00DFC6;">Connecté(e)</p>
</li>
@else
@if( ! Route ::is('inscrire'))
<li><a href="/connect"> <span><i class="fas fa-user"></i></span> Se Connecter<p style="font-size:10px;padding:0px 40px;margin:0px;">Gérer Mes Rdv</p></a>
@endif
@endif

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

@yield('index')
@yield('connect')
@yield('inscrire')
@yield('labo')
@yield('profil')
@yield('rdv')
@yield('docs')
@yield('reserver')
@yield('edit')
  <!-- ======= Footer ======= -->
  <footer id="footer">




    <div class="container py-1">
      <div class="social-links credits" >
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  </div>
      <div class="copyright">
        <div>&copy; Copyright <span>Go Médical.
        </span></div>
      <div>Designed by Team Go Médical.</div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets\air-datepicker\dist\js\datepicker.min.js')}}"></script>
<script src="{{asset('assets\air-datepicker\src\js\i18n\datepicker.en.js')}}"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


    <!-- Compiled and minified CSS -->
    @if( ! Route :: is('connect') )
    <style>

    .form-groupe {
       width: 300px;
       height: auto;
       position:relative;


    }

    .btt{
      border-radius: 5px;
      border:2px solid #00DFC6;
      background:#FFFFFF;
      padding: 3px 25px;
      color:#00DFC6;
      margin-top:-5px;
      text-transform: uppercase;
      cursor: pointer;
      font-weight: bold;
      font-size:14px;

    }
    .btt:focus {
    outline: none;
    }

    </style>
    <div id="myModa" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h2 class="modal-title" style="font-family:'Dosis',sans-serif;color:#014A6A;font-weight:bolder;font-size:15px; text-transform: uppercase;text-align:center;">
               Etes-vous sur de vouloir désactiver votre compte ?
             <p style="font-size:13px;font-weight:bold;color:#00DFC6;text-transform:uppercase;
               font-family: 'Dosis';text-align:center;" >Go-Médiacal</p></h2>


<form>
             <br/>
             <div class="form-groupe" >
    <a href="desactiver">
             <button type="button" class="btt" style="margin-left:120px;padding:5px 10px">Désactiver</button></a>
             <button type="button" class="btt" style="padding:5px 10px;position:relative;left:250px;top:-30px;" data-dismiss="modal">Annuler</button>
           </div>
         </form>
  <div class="modal-footer">

          </div>
        </div>

      </div>
    </div></div>
    @endif
</body>



</html>
