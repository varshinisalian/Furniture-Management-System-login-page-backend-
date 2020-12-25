<?php 

	//connect the database
	$db = mysqli_connect("localhost" , "root", '', 'furniture', '3306') or die("Could not connect to database"); 

	if(isset($_POST['submit'])){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$pnumber = $_POST['pnumber'];
		$password = $_POST['password'];
		$usertype = $_POST['check'];

		

  		$password = md5($password);
		$sql = "INSERT INTO users(fname, lname, address, pnumber, email, password, usertype) VALUES ('$fname', '$lname', '$address', '$pnumber', '$email', '$password', '$usertype')";
		mysqli_query($db, $sql);
  		header('location: login.html');
  	}

  	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$password = md5($password);
		$query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1) {
			header('location: sample.html');
		}
		else{
			echo "wrong username/password combination";
		}
		
	}


?>


		