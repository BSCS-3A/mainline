<?php


    include "db_conn.php";

    // Remove this section when inserting into mainline
    session_start();
    $_SESSION['bumail'] = "student";
    $_SESSION['fname'] = "student";
    $_SESSION['lname'] = "student";
    $_SESSION['student_id'] = 34;
    $_SESSION['grade_level'] = 12;
    $_SESSION['timestamp']=time();
    $_SESSION['voting_status'] = 0;

    
    $table = $conn->query("SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); // get positions

    $candidateErr = "";
    $candidate = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["candidate"])) {
        $candidateErr = "Candidate is required";
    } else {
        $candidate = test_input($_POST["candidate"]);
    }
    }

?>