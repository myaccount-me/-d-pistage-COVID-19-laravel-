@extends('welcome')

  @section('index')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <section id="hero" class="d-flex align-items-center">
@include('sweet::alert')
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Prendre un rendez-vous en ligne pour un dépistage COVID-19</h1>
          <h2>
          Les résultats de votre test RT-PCR sont disponibles au plus tard 24 heures après la réalisation du test</h2>
          <div><a href="labo" class="btn-get-started scrollto">Trouver un laboratoire COVID-19</a></div>
        </div>
        <div class="col-lg-6 order-2 order-lg-2 hero-img">
          <img src="assets/img/Covid19.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="text-center title">

<h3> Vous présentez des symptômes s’apparentant à la COVID-19?<h3>
<p>Notre site web GO-MEDICAL vous propose de prendre rendez-vous en ligne pour un depistage Covid-19</p>
<p>Ce service est progressivement déployé dans tous les laboratoires.<p>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->


    <!-- ======= Clients Section ======= -->
  <!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
  <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
  <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Equipe</h2>
          </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/chaima.jpg" class="img-fluid" alt="">
                <div class="social">

                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>

                </div>
              </div>
              <div class="member-info">
                <h4>Salaani Chaima</h4>
                <span>Adminstrateur de site</span>
              </div>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Team Section -->



  </main><!-- End #main -->
@endsection
