<?php

session_start();

if (isset($_SESSION['auth'])) {
	if ($_SESSION['auth']==1) {
		header("location:doctor.php");
	}
}
else if (isset($_SESSION['auth3'])) {
	if ($_SESSION['auth3']==1) {
		header("location:patient.php");
	}
}
else if (isset($_SESSION['auth5'])) {
	if ($_SESSION['auth5']==1) {
		header("location:admin.php");
	}
}

else if (isset($_COOKIE['auth2'])) {
	if ($_COOKIE['auth2']==true) {
		header("location:doctor.php");
	}
}
else if (isset($_COOKIE['auth4'])) {
	if ($_COOKIE['auth4']==true) {
		header("location:patient.php");
	}
}
else if (isset($_COOKIE['auth6'])) {
	if ($_COOKIE['auth6']==true) {
		header("location:admin.php");
	}
}



include "dataconfig.php";

$notify="";
if (isset($_POST['login_btn'])) {
 	$email=$_POST['up_email'];
 	$pass=md5($_POST['up_pass']);
 	$loggdin=isset($_POST['keep_login'])?1:0;

 	$loginQuery_d="SELECT * FROM doctors WHERE email='$email' AND pass='$pass' ";
 	$loginQuery_p="SELECT * FROM patients WHERE email='$email' AND pass='$pass' ";
 	$loginQuery_ad="SELECT * FROM admins WHERE email='$email' AND pass='12345' ";


 	$resultLogin_d=$conn-> query($loginQuery_d);
 	$resultLogin_p=$conn-> query($loginQuery_p);
 	$resultLogin_ad=$conn-> query($loginQuery_ad);


 	if  ($resultLogin_d-> num_rows>0) {

 		while ($result=$resultLogin_d->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}

 		$_SESSION['username']=$username;

 		$_SESSION['auth']=1;
 		if ($loggdin==1) {
 			setcookie('auth2', true, time()+(60*60*24*15),'/');
 		}
 		header("location:doctor.php");
 	}
 	else if ($resultLogin_p-> num_rows>0) {

 		while ($result=$resultLogin_p->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}
 		$_SESSION['username']=$username;

 		$_SESSION['auth3']=1;
 		if ($loggdin==1) {
 			setcookie('auth4', true, time()+(60*60*24*15),'/');
 		}
 		header("location:patient.php");
 	}
 	else if ($resultLogin_ad-> num_rows>0) {

 		while ($result=$resultLogin_ad->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}
 		$_SESSION['username']=$username;

 		$_SESSION['auth5']=1;
 		if ($loggdin==1) {
 			setcookie('auth6', true, time()+(60*60*24*15),'/');
 		}
 		header("location:admin.php");
 	}

 	else{
 		$notify="Invalid Email or Password. IF You are new User. Please! Register.";

 	}

 }

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
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Login</title>
</head>
<body>
	<section class="container">
		<div class="row offset-4 col-md-4 pb-3 card bg-countom centered">
			<div class="col-md-12 mt-2 text-center">
				<a class="btn btn-success border-secondary" href="index.php">Home</a>
			</div>
			<div class="col-md-12 ">
				<form class=" " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label class="row r_color1 c_font pl-1" for="up_email">Email:</label>
					<input class="row col-md-11 pl-2 radious" type="email" name="up_email" id="up_email" placeholder="Enter valid Email Address" required>

					<label class="row r_color1 mt-3 c_font pl-1" for="up_pass">Password:</label>
					<input class="row col-md-10 pl-2 radious" type="password" name="up_pass" id="up_pass" placeholder="Enter Your Password" required>

					<label class="row r_color1 mt-3 c_font" for="keep_login">
						<input class="mt-1 " type="checkbox" name="keep_login" id="keep_login">Keep Me Logged in
					</label>

					<input class="btn btn-secondary offset-5 mt-2 radious text-center" type="submit" name="login_btn" value="Login">
				</form>
				<a href="register.php" class="offset-4"><input class="btn btn-info ml-4 radious mt-2 text-center" type="submit" name="register" value="Register"></a>
			</div>
 			<div class="ml-5 c_font">
				<?php echo $notify; ?>
			</div>
		</div>
	</section>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
