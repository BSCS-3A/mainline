<?php
    // require 'db_connection.php';
    require "db_conn.php";

    // Fetch latest data from the database
    $result = mysqli_query($conn, 'SELECT * FROM vote_event ORDER BY vote_event_id DESC LIMIT 1') or die('Invalid query: ' . mysqli_connect_error());

    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Asia/Manila');
    $current_date_time = date('Y-m-d H:i:s');
    $yes = 0;
    if(empty($row['vote_event_id'])){
        $vote_stat = 0;
    }elseif($_POST['post_button']){
        $vote_stat = 3;
    }else{
        $after_election_date = date('Y-m-d H:i:s', strtotime($row['end_date']. ' + 2 days'));

        $vote_stat = 0;

        if($current_date_time>=$row['start_date'] && $current_date_time<$row['end_date']){
            $vote_stat = 1;
        }elseif($current_date_time>=$row['end_date']&&$current_date_time<$after_election_date){
            $vote_stat = 2;
        }else{
            $vote_stat = 0;
        }
    }

    $reset_election = date('Y-m-d H:i:s', strtotime($row['end_date']. ' + 5 days'));

    if($current_date_time>=$reset_election){
        $vote_stat = 0;
    }

    mysqli_free_result($result);
?>
