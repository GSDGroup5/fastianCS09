<?php
	
	$to = $_POST['email'];
	
	$subject = "Reset Password Request";
	
	$message = "This is an automated message, please don't reply to it \n";
	
	mail($to , $subject, $message);
	
	header('location: index1.html');
	
	
?>