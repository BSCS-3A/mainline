<?php
	$conn=mysqli_connect("localhost","root","","databasedesign1.5.1");
		if(!$conn){
			echo "Error! database connect error.".mysqli_error($conn);
		}
?>