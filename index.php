<?php
  include('dataconfig.php');

  $sql_w = "SELECT * FROM info_world ORDER BY id DESC LIMIT 1";

  $sql_bd = "SELECT * FROM info_bd ORDER BY id DESC LIMIT 1";

  $sql_prevn = "SELECT * FROM prevents ORDER BY id DESC LIMIT 1";

  $result_w = mysqli_query($conn,$sql_w);

  $result_bd = mysqli_query($conn,$sql_bd);

  $result_prevn = mysqli_query($conn,$sql_prevn);

  if($result_w)
  {
    $data = mysqli_fetch_assoc($result_w);
    $cases_world = $data['cases'];
    $recovered_world = $data['recovered'];
    $deaths_world = $data['deaths'];
  }

  if($result_bd)
  {
    $data = mysqli_fetch_assoc($result_bd);
    $cases_bd = $data['cases'];
    $recovered_bd = $data['recovered'];
    $deaths_bd = $data['deaths'];
  }
  if($result_prevn){
    $data = mysqli_fetch_assoc($result_prevn);
    $wash_hand=$data['WASH_HAND'];
    $use_mask=$data['USE_MASK'];
    $use_sanaitizer=$data['USE_SANITIZER'];
    $avoid_handshake=$data['AVOID_HANDSHAKE'];
    $avoid_touch=$data['AVOID_TOUCH'];
    $doctor_appointment=$data['D_APPOINTMENT'];
  }

  
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- fonts link -->
  <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">


  <!-- favicon link -->
  <link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

  <title>Corona War</title>
</head>
<body >
  <!-- header start -->
  <header class="fixed-top">
    <div class="container">
      <!-- navbar start -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand l_img" href="index.php">
          <img class="img-fluid" src="images/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#prevention">Prevention</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#experts">Experts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link border rounded-pill border-warning mr-3" href="register.php">Register</a>
            </li>
            <li class="nav-item border rounded-pill border-warning float-left">
              <a class="nav-link" href="login.php">Login→</a>
            </li>
            <li class="nav-item float-left">
              <a class="nav-link" href="#">
                <?php 
                 echo isset($_SESSION['username'])?$_SESSION['username']:"";
                ?>  
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- navbar end -->  
    </div>
  </header>
  <!-- header end -->
  <!-- banner start -->
  <section class="banner" id="home">
    <div class="container" >
      <!-- 1st row start -->
      <div class="row" id="particles-js">
        <div class="offset-md-2 col-md-9 pb-0 text-center">
          <h1>Save The World From Corona War</h1>
          <h2>Together We Fight Corona Virus</h2>
          <p>Many countries in the World are in a lockdown.So, this time it will be proved that if we <br> come together we can stand against anything.</p> 
          <a href="#prevention"><button id="" class="btn btn-custom" type="submit">How to Protect</button></a>
          <a href="#experts"><button id="" class="btn btn-custom" type="submit">Find Doctor</button></a>
        </div>
      </div>
      <!-- 1st row end -->
      <!-- 2nd row start -->
      <div class="row">
        <div class="text-center img-padding">
          <img class="img-fluid" src="images/bannerimg.png" alt="covid-19">
        </div>
      </div>
      <!-- 2nd row end -->
    </div>
  </section>
  <!-- banner end -->
  <!-- counter start for whole world-->
  <section id="counter">
    <div class="container">
      <div class="row symptoms_text offset-md-3">
        <h1>Total cases of Whole World</h1>
      </div>
      <div class="row text-center">
        <div class="col counter">
          <div class=" c_border">
            <h2 class="timer count-title count-number" data-to=<?php echo $cases_world; ?>></h2>
            <p class="count-text ">Total Confirmed</p>
          </div>
        </div>
        <div class="col counter">
         <div class=" c_border">
          <h2 class="timer count-title count-number" data-to=<?php echo $recovered_world; ?>></h2>
          <p class="count-text ">Total Recoverd</p>
        </div>
      </div>
      <div class="col counter">
        <div class=" c_border">
          <h2 class="timer count-title count-number" data-to=<?php echo $deaths_world; ?>></h2>
          <p class="count-text ">Total Death</p>
        </div></div>
      </div>
    </div>
  </section>
  <!-- counter end for whole world-->
  <!-- counter start for Bangladesh-->
  <section id="counter">
    <div class="container">
      <div class="row symptoms_text offset-md-3">
        <h1>Total cases of Bangladesh</h1>
      </div>
      <div class="row text-center">
        <div class="col counter">
          <div class=" c_border">
            <h2 class="timer count-title count-number" data-to=<?php echo $cases_bd; ?>></h2>
            <p class="count-text ">Total Confirmed</p>
          </div>
        </div>
        <div class="col counter">
         <div class=" c_border">
          <h2 class="timer count-title count-number" data-to=<?php echo $recovered_bd; ?>></h2>
          <p class="count-text ">Total Recoverd</p>
        </div>
      </div>
      <div class="col counter">
        <div class=" c_border">
          <h2 class="timer count-title count-number" data-to=<?php echo $deaths_bd; ?>></h2>
          <p class="count-text ">Total Death</p>
        </div></div>
      </div>
    </div>
  </section>
  <!-- counter end for Bangladesh-->
  <!-- about start -->
  <section class="about" id="about">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 d-md-block d-none about-img">
          <img class="img-fluid" src="images/Corona-about-img.png" alt="corona about">
        </div>
        <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-5 about-content">
          <h2>What is Covid 19</h2>
          <h1>About Corona Virus</h1>
          <p>Coronavirus disease 2019 (COVID-19) is an infectious disease caused by severe acute respiratory syndrome coronavirus 2. The disease was first identified in 2019 in Wuhan, the capital of Hubei, China, and has since spread globally.</p>
          <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.</p>
          <a href="#" class="btn btn-custom" type="submit">Discover More</a>
        </div>
        <div class="d-xl-none d-lg-none d-md-none about-img">
          <img class="img-fluid" src="images/Corona-about-img.png" alt="corona about">
        </div>
      </div>
    </div>
  </section>
  <!-- about end -->
  <!-- symptoms start -->
  <section class="symptoms" id="">
    <div class="container">
      <!-- 1sr row -->
      <div class="row symptoms_text">
        <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 ">
          <h2 >Covid-19 Symptoms</h2>
          <h1 >Symptoms of Corona</h1>
        </div>
      </div>
      <!-- 1sr row end-->
      <!-- 2nd row -->
      <div class="row symptoms_img">
        <div class="col-md-12">
          <div class="top-left">
            <img class="img-fluid " src="images/sym01.png" alt="">
            <p>Headache</p>
          </div>
          <div class="top-right">
            <img class="img-fluid " src="images/sym02.png" alt="">
            <p>Fever</p>
          </div>
          <div class="middle-left">
            <img class="img-fluid " src="images/sym03.png" alt="">
            <p>Dry Cough</p>
          </div>
          <div class="centered d-lg-block d-none ">
            <img class="img-fluid" src="images/sym_ills.png" alt="">
          </div>
          <div class="middle-right">
            <img class="img-fluid " src="images/sym04.png" alt="">
            <p>Shortness of breath</p>
          </div>
          <div class="bottom-left">
            <img class="img-fluid " src="images/sym05.png" alt="">
            <p>Diarrhea</p>
          </div>
          <div class="bottom-right ">
            <img class="img-fluid" src="images/sym06.png" alt="">
            <p>Cold</p>
          </div>
        </div>    
      </div>
      <!-- 2nd row end-->
    </div>
  </section>
  <!-- symptoms end -->
  <!-- emergency start -->
  <section class="emergency">
    <div class="container">
      <div class="row bg_img">
       <div class="offset-lg-1 col-lg-6 col-md-6 col-sm-12 custon_padding">
        <h1>Emergency Service 24/7</h1>
        <p>Emergency services have one or more dedicated emergency telephone numbers reserved for critical emergency calls.</p>
        <a href="tel:+8805554280940" style="color: #ffffff;" type="button" class="btn btn-custom">Call:+880 55542 80940</a>
      </div>
      <div class=" col-lg-4 col-md-6 col-sm-12">
        <img class="img-fluid img_pos" src="images/doctor_img.png" alt="">
      </div>
    </div>
  </div>
</section>
<!-- emergency end -->
<!-- prevention start -->
<section class="prevention" id="prevention">
  <div class="container">
    <!-- 1st row start -->
    <div class="row">
      <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 text-center pre_title">
        <h2 class="custom_h2">How to Protect Our life</h2>
        <h1 class="custom_h1">Prevention of Corona</h1>
      </div>
    </div>
    <!-- 1st row end -->
    <!-- 2nd row start -->
    <div class="row">
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item">
        <img class="img-fluid" src="images/hand-wash.png" alt="hand-wash">
        <h3>Wash Your Hands</h3>
        <p><?php echo $wash_hand; ?></p>
      </div>
      <!-- single item end -->
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item extra-padding">
        <img class="img-fluid" src="images/mask.png" alt="mask">
        <h3>Use Mask</h3>
        <p><?php echo $use_mask; ?></p>
      </div>
      <!-- single item end -->
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item">
        <img class="img-fluid" src="images/sanatizir.png" alt="sanatizir">
        <h3>Use Hand Sanitizer</h3>
        <p><?php echo $use_sanaitizer; ?></p>
      </div>
      <!-- single item end -->
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item">
        <img class="img-fluid" src="images/shekeing-hand.png" alt="aviod-shakeing">
        <h3>Avoid Handshake</h3>
        <p><?php echo $avoid_handshake; ?></p>
      </div>
      <!-- single item end -->
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item">
        <img class="img-fluid" src="images/aviod-touch.png" alt="aviod-touch">
        <h3>Avoid Touch</h3>
        <p><?php echo $avoid_touch; ?></p>
      </div>
      <!-- single item end -->
      <!-- single item start -->
      <div class="col-md-4 col-sm-6 col-12 text-center pre_item">
        <img class="img-fluid" src="images/doc-appointment.png" alt="appointment">
        <h3>Doctor Appointment</h3>
        <p><?php echo $doctor_appointment; ?></p>
      </div>
      <!-- single item end -->
    </div>
    <!-- 2nd row end -->
  </div>
</section>
<!-- prevention end -->
<!-- meet start -->
<section class="meet" id="experts">
  <div class="container">
    <!-- 1st row start -->
    <div class="row">
      <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 text-center meet_title">
        <h2 class="custom_h2">Covid-19 Specialist</h2>
        <h1 class="custom_h1">Meet Our Experts</h1>
      </div>
    </div>
    <!-- 1st row end -->
    <!-- 2nd row start -->
    <div class="row">
      <!-- single start -->
      <div class="col-md-4 col-12 text-center c_padding">
        <div><img class="img-fluid" src="images/robin.png" alt="robin"></div>
        <div class="meet_content">
          <h3>Dr. Robin Hernadez</h3>
          <p>Coronavirus Specialist</p>
          <a href="patient.php" type="button" class="btn btn-custom mt-0">Visit Now</a>
        </div>
      </div>
      <!-- single end -->
      <!-- single start -->
      <div class="col-md-4 col-12 text-center c_padding">
        <div><img class="img-fluid" src="images/scott.png" alt="scott"></div>
        <div class="meet_content">
          <h3>Dr. Scott Harmon</h3>
          <p>Coronavirus Expert</p>
          <a href="patient.php" type="button" class="btn btn-custom mt-0">Visit Now</a>
        </div> 
      </div>
      <!-- single end -->
      <!-- single start -->
      <div class="col-md-4 col-12 text-center c_padding">
        <div><img class="img-fluid" src="images/marini.png" alt="Marini"></div>
        <div class="meet_content">
          <h3>Dr. Jesus Marini</h3>
          <p>Coronavirus Expert</p>
          <a href="patient.php" type="button" class="btn btn-custom mt-0">Visit Now</a>
        </div>
      </div>
      <!-- single end -->
    </div>
    <!-- 2nd row end -->
  </div>
</section>
<!-- meet end -->
<!-- footer start -->
<footer>
  <div class="container">
    <div class="row" style="padding-bottom: 50px;">

      <div class="col-lg-3 col-sm-12 col-12 coronawar">
        <h3>Corona<span>War</span></h3>
        <p>This interactive dashboard/map provides the latest global numbers and numbers by country of COVID-19 cases on a daily basis.</p>
      </div>
      <div class="offset-lg-1 col-lg-1 offset-md-2 col-md-1 offset-sm-2  col-sm-2 offset-1 col-5 f_contact">
        <ul class="list-unstyled">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#prenention">Prevention</a></li>
          <li><a href="#blog">Blog</a></li>
          <li><a href="#">Member</a></li>
        </ul>
      </div>

      <div class="offset-md-1 col-md-1 offset-md-1 col-md-1 offset-sm-0 col-sm-2 offset-1 col-4 f_contact">
        <ul class="list-unstyled">
          <li><a href="#faq">Faq</a></li>
          <li><a href="#">Check Symptoms</a></li>
          <li><a href="#experts">Experts</a></li>
        </ul>
      </div>

      <div class="offset-lg-1 col-lg-2 offset-md-1 col-md-3 offset-sm-0  col-sm-3 offset-1 col-5 f_contact">
        <ul class="list-unstyled">
          <li><a href="#counter">Live Report</a></li>
          <li><a href="#counter">Todays Death</a></li>
          <li><a href="#counter">Total Recovered</a></li>
          <li><a href="#counter">Todays Effected</a></li>
        </ul>
      </div>

      <div class="offset-lg-0 col-lg-1 offset-md-0 col-md-2 offset-sm-0  col-sm-2 offset-1  col-4 f_contact">
        <ul class="list-unstyled">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Youtube</a></li>
          <li><a href="#">Linked In</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
      </div>

    </div>
    <div class="row designed">
      <div class="col-12">
        <h2>Designed by <a href="#" target="_blank">CoronaWar Team</a></h2>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script src="js/particles.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>