<?php

include "db_conn.php";
$connect->query('SET NAMES LATIN1');

$query = "SELECT * FROM student";
$result = mysqli_query($connect, $query);

$sqlImg = "SELECT * FROM candidate";
$resultImg = mysqli_query($connect, $sqlImg);
$numrowsImg = mysqli_num_rows($resultImg);

$truncateEvent = "TRUNCATE TABLE vote_event"; // reset election sched - Den 6/3/21
$deleteVote = "DELETE FROM vote";
$deleteCandidate = "DELETE FROM candidate";
$deleteStudentLog = "DELETE FROM student_access_log";
$deleteStudent = "DELETE FROM student";

$message = '<b>Select a new file (Only in CSV Format)</b>';

if(isset($_POST["upload"])){
    if($_FILES['info_file']['name']){
        $filename = explode(".", $_FILES['info_file']['name']);
        if($filename[1] == "csv"){
            
            // drop temp_candidate table if exists
            $val = $conn->query('SELECT 1 from temp_candidate LIMIT 1');
            if($val != FALSE){ $connect->query('DROP TABLE temp_candidate');}
            
            // delete data to be replaced by the data in the csv file
            mysqli_query($connect, $truncateEvent);
            mysqli_query($connect, $deleteVote);
            mysqli_query($connect, $deleteCandidate);
            mysqli_query($connect, $deleteStudentLog);
            
            // delete candidate images before data in table
            if($numrowsImg > 0){
                while($rowImg = mysqli_fetch_assoc($resultImg)){
                    if(!(empty($rowImg['photo']))){
                        unlink($rowImg['photo']);
                    }
                }
            }
            
        //check if there is data in the database, delete all if true
            if (mysqli_num_rows($result) != 0) {        
                mysqli_query($connect, $deleteStudent);
            }
            
            $handle = fopen($_FILES['info_file']['tmp_name'], "r");
            while($data = fgetcsv($handle)){

                $student_id = mysqli_real_escape_string($connect, $data[0]);

                $fname = mysqli_real_escape_string($connect, $data[1]);

                $Mname = mysqli_real_escape_string($connect, $data[2]);

                $lname = mysqli_real_escape_string($connect, $data[3]);

                $gender = mysqli_real_escape_string($connect, $data[4]);

                $bumail = mysqli_real_escape_string($connect, $data[5]);

                $grade_level = mysqli_real_escape_string($connect, $data[6]);

                if(!(empty($data[7]))){     // if cell is empty in case admin forgot to fill 0
                    $otp = mysqli_real_escape_string($connect, $data[7]);
                }else{
                    $otp = 0;
                }

                if(!(empty($data[8]))){     // if cell is empty in case admin forgot to fill 0
                    $voting_status = mysqli_real_escape_string($connect, $data[8]);
                }else{
                    $voting_status = 0;
                }

                $query = "INSERT into student(student_id, fname, Mname, lname, gender, bumail, grade_level, otp, voting_status) values ('$student_id', '$fname', '$Mname', '$lname', '$gender', '$bumail', '$grade_level', '$otp', '$voting_status')";

                mysqli_query($connect, $query);
            }
            fclose($handle);
            
            //For Logs
            $_SESSION['action'] = 'uploaded CSV File.';
            include '../backAdmin/backFun_actLogs_v0_1.php';
            
            header("location: Admin_studAcc.php");
        }
        else{
            $message = '<b>Please Select CSV File only</b>';
        }
    }
    else{
        $message = '<b>No file selected, Please Select a CSV File</b>';
    }
}
?>
