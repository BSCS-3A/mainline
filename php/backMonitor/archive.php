<?php
	require 'db_conn.php';

    // Report and PDF date/time
    $sched_row = $conn->query("SELECT * FROM `vote_event` ORDER BY `vote_event_id` DESC LIMIT 1");
    $sched = $sched_row->fetch_assoc();
    $end_date = new DateTime($sched['end_date']);


    //=========store the final result to archive table===============
    //additional notes: if there is a tie, the tie should be resolve first before calling this function.
      function insertToArchive($conn, $school_year)
      {
        $sql = "SELECT candidate.student_id, student.student_id, grade_level, position_name, platform_info, vote_allow, candidate.position_id, candidate_position.position_id, Max(total_votes) AS total_votes from (candidate inner join candidate_position on candidate.position_id = candidate_position.position_id) inner join student where candidate.student_id = student.student_id group by candidate.position_id order by heirarchy_id";

        $getlist = $conn->query($sql);
        $count_query = "SELECT * FROM student";
        $count_res = mysqli_query($conn, $count_query);
        $total = mysqli_num_rows($count_res);
        $QoutaAll = floor($total/2)+1;

        while($row = $getlist->fetch_assoc())
        {
          if($row['vote_allow']==1)
          {
            if($row['total_votes']>=$QoutaAll)
            {
              $sql2 = "SELECT * from student where student_id= ".$row['student_id']."";
              $q1 = $conn->query($sql2);
              while($row1 = $q1->fetch_assoc())
              {
                  $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row['position_name']."','".$row1['fname']."','".$row1['Mname']."','".$row1['lname']."','".$school_year."','".$row['platform_info']."')";
                $conn->query($sql_insert);
              }
            }
          }
          else
          {
            $count_query1 = "SELECT * FROM student where grade_level = ".$row['grade_level']."";
            $count_res1 = mysqli_query($conn, $count_query1);
            $total1 = mysqli_num_rows($count_res1);
                                
            $QoutaAll1 = floor($total1/2)+1;
            if($row['total_votes']>=$QoutaAll1)
            {
              $sql2 = "SELECT * from student where student_id= ".$row['student_id']."";
              $q1 = $conn->query($sql2);
              while($row1 = $q1->fetch_assoc())
              {
                $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row['position_name']."','".$row1['fname']."','".$row1['Mname']."','".$row1['lname']."','".$school_year."','".$row['platform_info']."')";
                $conn->query($sql_insert);
              }
            }
          }
        }           
      }

?>
