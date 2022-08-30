<?php 
session_start();

// doctor
if (isset($_SESSION['auth']) || isset($_COOKIE['auth2'])) {
	session_destroy();
	if (isset($_COOKIE['auth2'])) {
		setcookie('auth2','', time()-(3600),'/');
	}
	header("location:login.php");
}
// patient
else if (isset($_SESSION['auth3']) || isset($_COOKIE['auth4'])) {
	session_destroy();
	if (isset($_COOKIE['auth4'])) {
		setcookie('auth4','', time()-(3600),'/');
	}
	header("location:login.php");
}
// admin
else if (isset($_SESSION['auth5']) || isset($_COOKIE['auth6'])) {
	session_destroy();
	if (isset($_COOKIE['auth6'])) {
		setcookie('auth6','', time()-(3600),'/');
	}
	header("location:login.php");
}


else {
	header("location:login.php");
}
 ?>

