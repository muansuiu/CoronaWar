<?php

$host="localhost";
$user="root";
$pass="";
$datab="coronawar";

$conn=new mysqli($host,$user,$pass,$datab);

if($conn -> connect_error ){
	die($conn -> error);
}
else{
	// echo "Database Connected";
}

function formatDate($date){
	return date('g:i a',strtotime($date));

}

?>