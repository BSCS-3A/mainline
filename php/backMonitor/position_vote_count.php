<?php
    // require 'db_connection.php';   
    require 'db_conn.php';
    
    $query = "SELECT c.position_id as position, cp.heirarchy_id as hierarchy_order, sum(c.total_votes) as votes_per_position
    FROM candidate c
    LEFT JOIN candidate_position cp ON c.position_id=cp.position_id
    GROUP BY position
    ORDER BY position";

    $result = mysqli_query($conn, $query);
    
    $position_votes = array();
	  while($vote=mysqli_fetch_array($result)){
      $position_votes[] = array( 
        "position"=>$vote['position'],
        "votes_per_position"=>$vote['votes_per_position']
      );
    }
?>
