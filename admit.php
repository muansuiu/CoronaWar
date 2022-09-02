<?php
include('dataconfig.php');
if(isset($_POST['name']) && isset($_POST['age']))
{
	$name =  $_POST['name'];
	$age = $_POST['age'];
	$hospital = $_POST['Hospital'];
	$bed = $_POST['Bed'];
	$date = date('Y-m-d',strtotime($_POST['date']));
	$toekn = rand()%10000;

	$sql = "INSERT INTO admit (patient,age,hospital,bed,admit_date,token_id) 
	VALUES ('$name','$age','$hospital','$bed','$date','$toekn')";
	mysqli_query($conn,$sql);
}

$query = "SELECT * from admit order by id DESC LIMIT 1";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$p_name = $data['patient'];
$p_age = $data['age'];
$p_hospital = $data['hospital'];
$p_bed = $data['bed'];
$p_date = $data['admit_date'];
$p_token = $data['token_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- fonts link -->
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admit.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Hospital Admission</title>
</head>

<body>
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
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item border rounded-pill border-warning float-left">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- navbar end -->
		</div>
	</header>
	<!-- Apply start -->
	<section class="custom_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="custom_h1">Fill the Form to Apply</h1>
				</div>	
			</div>
			<div class="row">
				<div class="col-md-4 offset-4 c_border mt-2 mb-2">
					<form action="admit.php" method="POST" onsubmit="myFunctions()">
						Enter Patient Name:	<input class="mt-5 coustom_margin1" type="text" name="name"><br><br>
						Enter Age:	<input class="ml-5 coustom_margin2" type="text" name="age"><br><br>

						Select Hospital:
						<select name="Hospital" class="ml-4 coustom_margin3">
							<option value="">Select Hospital</option>
							<option value="Square Hospital">Square Hospital</option>
							<option value="Evercare Hospital">Evercare Hospital</option>
							<option value="United Hospital">United Hospital</option>
							<option value="IBN SINA Hospital">IBN SINA Hospital</option>
							<option value="BRB Hospital">BRB Hospital</option>
							<option value="LAB AID Hospital">Lab Aid Hospital</option>
						</select><br><br>
						Select Bed Type:
						<select name="Bed" class="ml-3 coustom_margin4">
							<option value="">Select Bed Type</option>
							<option value="General">General Bed</option>
							<option value="Cabin Bed">Cabin Bed</option>
							<option value="ICU">ICU</option>

						</select><br>
						<br>
						Enter Date: <input class="ml-5 coustom_margin5" type="date" name="date"><br><br>
						<input class="btn btn-warning mt-2 mb-0 ml-4  pl-5 pr-5" type="submit" value="Appy for Hospital Admission" onclick="myFunc()">
						<script>
							function myFunc() {
								alert("Application Received!");
							}
						</script>	
						<br><br>


						<br>
						<div class="text-center">
							<?php
							if(isset($_POST['name']) && isset($_POST['age']))
							{	
								echo "<h4>Your admission details</h4>";
								echo "<p>Name: {$p_name}</p>";

								echo "<p>Age: {$p_age}</p>";

								echo "<p>Hospital: {$p_hospital}</p>";

								echo "<p>Bed Type: {$p_bed}</p>";

								echo "<p>Date of Admission: {$p_date}</p>";

								echo "<p>Token No: {$p_token}</p>";

							}
							?>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- Apply end -->       


		<!-- <center>
			<form action="admit.php" method="POST" onsubmit="myFunctions()">
				Enter Patient Name:	<input type="text" name="name"><br><br>
				Enter Age:	<input type="text" name="age"><br><br>

				Select Hospital:
				<select name="Hospital">
					<option value="">Select Hospital</option>
					<option value="Square Hospital">Square Hospital</option>
					<option value="Evercare Hospital">Evercare Hospital</option>
					<option value="United Hospital">United Hospital</option>
					<option value="IBN SINA Hospital">IBN SINA Hospital</option>
					<option value="BRB Hospital">BRB Hospital</option>
					<option value="LAB AID Hospital">Lab Aid Hospital</option>
				</select><br><br>
				Select Bed Type:
				<select name="Bed" >
					<option value="">Select Bed Type</option>
					<option value="General">General Bed</option>
					<option value="Cabin Bed">Cabin Bed</option>
					<option value="ICU">ICU</option>

				</select><br>
				<br>
				Enter Date: <input type="date" name="date"><br><br>
				<input type="submit" value="Appy for Hospital Admission" onclick="myFunc()">
				<script>
					function myFunc() {
						alert("Application Received!");
					}
				</script>	
				<br><br>


				<br>
				// <?php
				//if(isset($_POST['name']) && isset($_POST['age']))
				//{	
					//echo "<h4>Your admission details</h4>";
					//echo "<p>Name: {$p_name}</p>";

					//echo "<p>Age: {$p_age}</p>";

					//echo "<p>Hospital: {$p_hospital}</p>";

					//echo "<p>Bed Type: {$p_bed}</p>";

					//echo "<p>Date of Admission: {$p_date}</p>";

					// echo "<p>Token No: {$p_token}</p>";


				//}
				//?>


			</center> -->


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
								<li><a href="index.php">Experts</a></li>
							</ul>
						</div>

						<div class="offset-lg-1 col-lg-2 offset-md-1 col-md-3 offset-sm-0  col-sm-3 offset-1 col-5 f_contact">
							<ul class="list-unstyled">
								<li><a href="index.php">Live Report</a></li>
								<li><a href="index.php">Todays Death</a></li>
								<li><a href="index.php">Total Recovered</a></li>
								<li><a href="index.php">Todays Effected</a></li>
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
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		</body>
		</html>


