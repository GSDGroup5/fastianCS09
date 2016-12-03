<?php
session_start();  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "realestate";
$sql_query = "";
if(isset($_POST["update"]))
{
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	//retrieve values from input form
	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);  
    $last_name  = mysqli_real_escape_string($conn, $_POST['last_name']);  
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);  
    $mobile  = mysqli_real_escape_string($conn, $_POST['mobile']); 
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $location  = mysqli_real_escape_string($conn, $_POST['location']);  
	$password = mysqli_real_escape_string($conn, $_POST['password']); 
    $password2  = mysqli_real_escape_string($conn, $_POST['password2']);
	
	if(isset($first_name) && $first_name != '')
	{
		$sql_query = "UPDATE users SET FIRST_NAME='$first_name' WHERE user_id='1';";
	}
	
	if(isset($last_name) && $last_name != '')
	{
		
		$sql_query .= "UPDATE users SET LAST_NAME='$last_name' WHERE user_id='1';";
	}

	if(isset($phone) && $phone != '')
	{
		$sql_query .= "UPDATE users SET PHONE='$phone' WHERE user_id='1';";
	}
	
	if(isset($mobile) && $mobile != '')
	{
		
		$sql_query .= "UPDATE users SET MOBILE='$mobile' WHERE user_id='1';";
	}

	if(isset($email) && $email != '')
	{
		
		$sql_query .= "UPDATE users SET EMAIL='$email' WHERE user_id='1';";
	} 
	
	if(isset($location) && $location != '')
	{
		
		$sql_query .= "UPDATE users SET LOCATION='$location' WHERE user_id='1';";
	} 
	
	if(isset($password) && $password != '' && $password == $password2)
	{
		
		$sql_query .= "UPDATE users SET PASSWORD='$password' WHERE user_id='1';";
	} 
	
	
	
	if ($conn->multi_query($sql_query)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	
}

?>

<html>
	<head>
	
		<title>User Profile Update</title>
	
	</head>
	
	
	<body>
	
		<div class="tab-pane" id="settings">

                  <hr>
                  <form class="form" method="post" id="registrationForm">
                      <div class="form-group">
							<input type = "hidden" name="id">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="location"><h4>Location</h4></label>
                              <input type="text" class="form-control" name="location" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="submit" name="update"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
								
                            </div>
							<span class="text-success">  
								<?php  
									if(isset($success_message))  
									{  
										echo $success_message;  
									}  
								?>  
							</span>  
                      </div>
                </form>
	
	
	</body>


	


</html>