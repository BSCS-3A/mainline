<?php
// This is a single-line comment

# This is also a single-line comment


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "main";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if (isset($_POST['signup']))
		{
            $nem = $_POST['name'];
            $emel = $_POST['email'];
            $pas = $_POST['pass'];
            $rpas = $_POST['re_pass'];
				                
//			echo $nem, $emel, $pas, $rpas;
			
			mysqli_query($conn,"INSERT INTO profiles (full_name, email_address, password) VALUES ('$nem', '$emel', '$pas')");
			
//			echo $nem, $emel, $pas, $rpas;
		}
    ?>