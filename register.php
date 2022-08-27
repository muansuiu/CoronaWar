<?php 
include ("dataconfig.php");
$result=null;
$ntfy=null;

if (isset($_POST['add_info'])) {
  $name   = $_POST['InputName'];
  $email  = $_POST['InputEmail'];
  $type  = $_POST['Inputtype'];
  $pass   = md5($_POST['InputPassword']);
  $c_pass = md5($_POST['InputC_Password']);
  $reg_as_d=isset($_POST['reg_doc'])?1:0;
  $reg_as_p=isset($_POST['reg_pat'])?1:0;

  $rse1=mysqli_query($conn,"SELECT * FROM doctors WHERE email = '$email' ");
  $rse2=mysqli_query($conn,"SELECT * FROM patients WHERE email = '$email' ");
  $num1 = mysqli_num_rows($rse1);
  $num2 = mysqli_num_rows($rse2);
  if ($num1==1 && $num2==1) {
    $ntfy="The E-mail you have chosen is already taken!";
  }

   else if ( ($pass==$c_pass) && ($reg_as_d==1) ) {
    $insertSql=" INSERT INTO doctors(name,email,type,pass) VALUES ('$name','$email','$type','$pass') ";

    if ($conn-> query($insertSql)) {
      header("location:login.php");
    }else {
      die($conn-> error);
    }
  }
  else if ( ($pass==$c_pass) && ($reg_as_p==1) ) {
    $insertSql=" INSERT INTO patients(name,email,pass) VALUES ('$name', '$email','$pass') ";

    if ($conn-> query($insertSql)) {
      header("location:login.php");
    }else {
      die($conn-> error);
    }
  }
  else {
    $result="Password didn't Matched";
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
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16"> 

	<title>Corona War|Register</title>
</head>
<body>
	<section class="container">
		<div class="row">
			<div class="col-md-5 offset-2 mt-5 card bg-countom centered">
				<form action=" <?php echo $_SERVER['PHP_SELF'];?> " method="post">
					<div class="form-group c_font">
						<label for="InputName">Full Name:</label>
						<input type="name" class="form-control radious" id="InputName" name="InputName" placeholder="Enter Your Full Name" required>
					</div>
					<div class="form-group c_font">
						<label for="InputEmail">Email address:</label>
						<input type="email" class="form-control col-md-10 radious" id="InputEmail" name="InputEmail" placeholder="Enter Valid Email Address" required>
					</div>
					<div class="form-group c_font">
						<label for="Inputtype">Experience:</label>
						<input type="name" class="form-control col-md-10 radious" id="Inputtype" name="Inputtype" placeholder="Enter experience if you are a Doctor">
					</div>
					<div class="form-group c_font">
						<label for="InputPassword">Password:</label>
						<input type="password" class="form-control col-md-8 radious" name="InputPassword" id="InputPassword" placeholder="Enter A Strong Password" required>
					</div>
					<div class="form-group c_font">
						<label for="InputC_Password">Confirm Password:</label>
						<input type="password" class="form-control col-md-8 radious" name="InputC_Password" id="InputC_Password" placeholder="Re-type Password" required>
					</div>
					<div class="form-check c_font">
						<input class="form-check-input" type="radio" name="reg_doc" id="reg_doc" value="option1">
						<label class="form-check-label" for="reg_doc">
							Register as Doctor
						</label>
					</div>
					<div class="form-check c_font">
						<input class="form-check-input" type="radio" name="reg_pat" id="reg_pat" value="option2">
						<label class="form-check-label" for="reg_pat">
							Register as Patient
						</label>
					</div>
					<button type="submit" name="add_info" class="btn btn-warning radious">Submit</button>

					<div class="h6 mt-3 rounded bg-warning text-danger font-weight-bold col-md-10">
						 <?php echo $ntfy;?> 
					</div>

					<div class="h6 mt-3 rounded bg-warning text-danger font-weight-bold col-md-6">
						 <?php echo $result;?> 
					</div>
				</form>
				<h5 class="c_font">Already have an account?<a class="btn btn-link" href="login.php">Login here.</a></h5>

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