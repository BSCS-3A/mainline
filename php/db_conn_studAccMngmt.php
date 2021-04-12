<!--
Proj Mngr Notes:
- change connect for host
- changed dbname for local testing
- changed header location
- 4/11 updated CSV overwriting (y)
-->

<?php

// Host version
// $dbServername = "localhost";
// $dbUsername = "id16218880_bscs";
// $dbPassword = "J!\-~q!r]fZJf0EH";
// $dbname = "id16218880_buceils";


// local version
$dbServername = "localhost";
$dbUsername = "root";   //id1621880_webhostingbscs3a
$dbPassword = "";       //id16218880_buceils
//$dbName = "seproject";
$dbName = "bucielsmain2";   // for local -Den

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die ('Unable to connect');
$message = "";


$query = "SELECT * FROM student";
$result = mysqli_query($connect, $query);
$deleteAll = "DELETE FROM student";

if(isset($_POST["upload"])){

    //check if there is data in the database, delete all if true
    if (mysqli_num_rows($result) != 0) {
       mysqli_query($connect, $deleteAll);
    }

    if($_FILES['info_file']['name']){
        $filename = explode(".", $_FILES['info_file']['name']);
        if($filename[1] == "csv"){
            $handle = fopen($_FILES['info_file']['tmp_name'], "r");
            while($data = fgetcsv($handle)){

                $student_id = mysqli_real_escape_string($connect, $data[0]);

                $fname = mysqli_real_escape_string($connect, $data[1]);

                $Mname = mysqli_real_escape_string($connect, $data[2]);

                $lname = mysqli_real_escape_string($connect, $data[3]);

                $gender = mysqli_real_escape_string($connect, $data[4]);

                $bumail = mysqli_real_escape_string($connect, $data[5]);

                $grade_level = mysqli_real_escape_string($connect, $data[6]);

                $otp = mysqli_real_escape_string($connect, $data[7]);

                $voting_status = mysqli_real_escape_string($connect, $data[8]);

                $query = "INSERT into student(student_id, fname, Mname, lname, gender, bumail, grade_level, otp, voting_status) values ('$student_id', '$fname', '$Mname', '$lname', '$gender', '$bumail', '$grade_level', '$otp', '$voting_status')";

                mysqli_query($connect, $query);
            }
            fclose($handle);
            header("location: Admin_StudentAccountManagement.php");
        }
        else{
            $message = '<label class="text-danger">Please Select CSV File only</label>';
        }
    }
    else{
        $message = '<label class="text-danger">Please Select File</label>';
    }
}
if(isset($_GET["updation"])){
    $message = '<label class="text-success">File Updated</label>';
}
?>
