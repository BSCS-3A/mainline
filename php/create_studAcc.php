<?php

    session_start();
    include "db_conn.php";

    if (isset($_POST['add'])) {

        $student_id = $_POST['Add_ID'];
        $lname = $_POST['lname'];
        $lname = cleanOutput($conn,strval($lname));
        $fname = $_POST['fname'];
        $fname = cleanOutput($conn,strval($fname));
        $Mname = $_POST['Mname'];
        $Mname = cleanOutput($conn,strval($Mname));
        $gender = $_POST['gender'];
        $bumail = $_POST['bumail'];
        $bumail = cleanOutput($conn,strval($bumail));
        $otp = 0;
        $vs = 0;
        $grade_level = $_POST['grade_level'];

        $AddStudent = "INSERT into student(student_id, fname, Mname, lname, gender, bumail, grade_level, otp, voting_status) values ('$student_id', '$fname', '$Mname', '$lname', '$gender', '$bumail', '$grade_level', '$otp', '$vs')";
        $query_run = mysqli_query($conn, $AddStudent);

        if ($query_run) {
            $_SESSION['message'] = 'Record has been updated!';
            $_SESSION['msg_type'] = 'success';
            
            //For Logs
            $_SESSION['action'] = 'updated Info of Student : ' . $student_id;
            include 'backFun_actLogs_v0_1.php';
            
            header("location: Admin_studAcc.php");
        }
        else{
            $_SESSION['message'] = 'Record has not been added because it already exists.';
            $_SESSION['msg_type'] = 'warning';
            header("location: Admin_studAcc.php");
        }
    }
?>