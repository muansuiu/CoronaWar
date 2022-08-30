<?php
session_start();
if (isset($_SESSION['auth5'])) {
	if ($_SESSION['auth5']!=1) {
		header("location:login.php");
	}
}else{
	if (isset($_COOKIE['auth6'])) {
		if ($_COOKIE['auth6']!=true) {
			header("location:login.php"); 
		}

	}else {
		header("location:login.php");
	}

}
?>

<?php
include('dataconfig.php');
if(isset($_POST['Cases']) && isset($_POST['Recovered']) && isset($_POST['Deaths']))
{
	$cases =  $_POST['Cases'];
	$recovered = $_POST['Recovered'];
	$deaths = $_POST['Deaths'];

	$sql = "INSERT INTO info_world (cases,recovered,deaths) 
	VALUES ('$cases','$recovered','$deaths')";
	mysqli_query($conn,$sql);
}

else if(isset($_POST['Cases_bd']) && isset($_POST['Recovered_bd']) && isset($_POST['Deaths_bd']))
{
	$cases =  $_POST['Cases_bd'];
	$recovered = $_POST['Recovered_bd'];
	$deaths = $_POST['Deaths_bd'];

	$sql = "INSERT INTO info_bd (cases,recovered,deaths) 
	VALUES ('$cases','$recovered','$deaths')";
	mysqli_query($conn,$sql);
}

else if(isset($_POST['wash_hand']) && isset($_POST['use_mask']) && isset($_POST['use_sanaitizer']) && isset($_POST['avoid_handshake']) && isset($_POST['avoid_touch']) && isset($_POST['doctor_appointment'])){
	$wash_hand=$_POST['wash_hand'];
	$use_mask=$_POST['use_mask'];
	$use_sanaitizer=$_POST['use_sanaitizer'];
	$avoid_handshake=$_POST['avoid_handshake'];
	$avoid_touch=$_POST['avoid_touch'];
	$doctor_appointment=$_POST['doctor_appointment'];

	$sql="INSERT INTO prevents (WASH_HAND,USE_MASK,USE_SANITIZER,AVOID_HANDSHAKE,AVOID_TOUCH,D_APPOINTMENT) VALUES ('$wash_hand','$use_mask','$use_sanaitizer','$avoid_handshake','$avoid_touch','$doctor_appointment')";
	mysqli_query($conn,$sql);
}
 // payment list
$sql_pay = "SELECT * from payment";
$result_pay = mysqli_query($conn,$sql_pay);

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
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Admin Page</title>
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
	<!-- cases start -->
	<section class="custom_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="custom_h2">Enter Whole World Covid Cases</h2>
						</div>
					</div>
					<div class="row c_border">
						<div class="col-md-12 text-center mt-2 mb-2">
							<form action="admin.php" method="POST" onsubmit="myFunctions()">
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Total Cases:</label>
									<input class="coustom_margin1" type="text" name="Cases">		
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Recovered:</label>
									<input class="coustom_margin2" type="text" name="Recovered">
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Total Deaths:</label>
									<input class="coustom_margin3" type="text" name="Deaths">
								</div>
								<div class="text-center">
									<input class="btn btn-warning radious" type="submit" value="submit">
								</div>	
							</form>
						</div>
					</div>	
				</div>
				<div class="col-md-5 offset-2">
					<div class="col-md-12 text-center">
						<h2 class="custom_h2">Enter Bangladesh Covid Cases</h2>
					</div>
					<div class="row c_border">
						<div class="col-md-12 text-center mt-2 mb-2">
							<form action="admin.php" method="POST" onsubmit="myFunctions()">
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Total Cases:</label>
									<input class="coustom_margin1" type="text" name="Cases_bd">		
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Recovered:</label>
									<input class="coustom_margin2" type="text" name="Recovered_bd">
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="">Enter Total Deaths:</label>
									<input class="coustom_margin3" type="text" name="Deaths_bd">
								</div>
								<div class="text-center">
									<input class="btn btn-warning radious" type="submit" value="submit">
								</div>	
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- cases end -->
	<!-- privent start -->
	<section class="prevention" id="prevention">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="custom_h1">Prevention of Corona</h1>
				</div>			
			</div>
			<div class="row">
				<form action="admin.php" method="POST" onsubmit="myFunctions()">
					<div class="row">
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="wash_hand" class="form-label">Wash Your Hands</label>
								<textarea class="form-control" id="wash_hand" name="wash_hand" rows="5"></textarea>
							</div>
						</div>
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="use_mask" class="form-label">Use Mask</label>
								<textarea class="form-control" id="use_mask" name="use_mask" rows="5"></textarea>
							</div>
						</div>
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="use_sanaitizer" class="form-label">Use Hand Sanitizer</label>
								<textarea class="form-control" id="use_sanaitizer" name="use_sanaitizer" rows="5"></textarea>
							</div>
						</div>
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="avoid_handshake" class="form-label">Avoid Handshake</label>
								<textarea class="form-control" id="avoid_handshake" name="avoid_handshake" rows="5"></textarea>
							</div>
						</div>
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="avoid_touch" class="form-label">Avoid Touch</label>
								<textarea class="form-control" id="avoid_touch" name="avoid_touch" rows="5"></textarea>
							</div>
						</div>
						<div class="col-md-6 pre_item">
							<div class="mb-3">
								<label for="doctor_appointment" class="form-label">Doctor Appointment</label>
								<textarea class="form-control" id="doctor_appointment" name="doctor_appointment" rows="5"></textarea>
							</div>
						</div>
					</div>
					<div class="text-center">
						<input class="btn btn-warning radious" type="submit" value="submit" name="submit">
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- privent end -->

	<!-- payment list start -->
	<!-- payment table -->
	<center>
		<h1 class="text-center custom_h1">Payment</h1>
		<table align="center" border="1px" class="mb-3"  style="width:600px; line-height:30px;">
			<tr>
				<th colspan="5" style="background-color: #706AD4; color: white; " class="text-center">Payment Info</th>
			</tr>
			<tr class="text-center">
				<th>Patient</th>
				<th>Bank Client</th>
				<th>Transaction ID</th>
				<th>Amount</th>
				<th>Status</th>
			</tr>
			<?php
			while($row=mysqli_fetch_assoc($result_pay))
			{
				?>    
				<tr class="text-center">
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['client']; ?></td>
					<td><?php echo $row['trans_id']; ?></td>
					<td><?php echo $row['amount']; ?></td>
					<td><?php echo $row['status']; ?></td>
				</tr>
				<?php
			}
			?>

		</table>

		<!-- update payment status-->

		<?php
			
			if(isset($_POST['trans']) && isset($_POST['status']))
			{
				$trans = $_POST['trans'];
				$status = $_POST['status'];

				$query = "UPDATE payment SET status='$status' where trans_id='$trans' ";
				mysqli_query($conn,$query);
				
			

			}

			$conn->close();
		

		?>
		<div class="container">
        <h3 class="custom_h1 text-center mt-5">Confirmation of payment</h3>
		<div>
			<form action="admin.php" method="POST">
			<div class="row offset-4">
				<div class="col-md-6 p_list mb-5">
                    <div class="col-md-12 text-center">
                        <div>
							<h6 class="mt-3 mb-0 c_text">Enter Transaction ID:</h6>
				
							<input type="text" name="trans">
						</div>
						<div>
							<h6 class="mt-3 mb-0 c_text">Update Status:</h6>
							<input type="text" name="status">
						</div>
						<input class="mt-4 mb-2 btn btn-warning" type="submit" value="Update"">
					<div>
				</div>
		</div>

		</form>
		




	</center>

	<!-- payment list end -->
	
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