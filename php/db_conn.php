<?php
    // $servername = "localhost";
    // $username = "id16218880_bscs";
    // $password = "J!\-~q!r]fZJf0EH";
    // $dbname = "id16218880_buceils";

    // Den
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bucielsmain2";
    // $dbname = "check";     
    
   @$conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn -> connect_errno) {
        // echo "Failed to connect to Database: " . $conn -> connect_error;
        require 'vtValSan.php';
        errorMessage("There seems to be an error. <br> It's not you, it's us. We're trying our best to make this work. ");
        exit();
    }

    // Create connection
    // $conn = mysqli_connect($servername,$username,$password,$dbname);
    // if (!$conn) {
    //     printf("Connect failed: %s\n", mysqli_connect_error());
    //     exit();
    // }


    // for student account mgnmt
    $connect  = $conn;
    // $connect = mysqli_connect($servername,$username,$password,$dbname) or die ('Unable to connect');   

    // for backend student account mngmt
    $db = $conn;
    // $connection = mysqli_connect($servername,$username,$password);
    // $db = mysqli_select_db($connection, $dbname);



// JP
    // $dbhost = "localhost";
    // $dbuser = "id16218880_webhostingbscs3a";
    // $dbpass = "t9%~bjqmK)uHAwe[";
    // $db = "id16218880_buceils";
    // $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    
    // if ($conn->connect_error) {
    //     die("Connection to database failed: ". $conn->connect_error);
    // }
?>