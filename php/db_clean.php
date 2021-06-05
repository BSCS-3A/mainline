<?php
require 'db_conn.php';
date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d', time());
function eventCopy($conn)
{
	$check = $conn->query('SELECT 1 from temp_event limit 1');

	if($val != false)
	{
		$conn->query('DROP table temp_event');
	}

	$sql = 'CREATE TABLE `temp_event` (
    `vote_event_id` int(11) NOT NULL,
    `start_date` datetime NOT NULL,
    `end_date` datetime NOT NULL
    )';

    $conn->query($sql);

    $insert = 'INSERT INTO temp_event SELECT * FROM vote_event';
    $conn->query($insert);

}
function dateDifference($end_date, $current_date1)
{
    // calulating the difference in timestamps 
    $diff = strtotime($end_date) - strtotime($current_date);
     
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}

function ThanosSnap($conn)
{
	$checkExist = $conn->query('SELECT 1 FROM temp_event limit 1');

	if($checkExist != FALSE)
	{
		$sched = $conn->query('SELECT * from temp_event order by vote_event_id');
		$sched_get = $sched->fetch_assoc();
		if($sched_get != NULL)
		{
			$end_date = date('Y-m-d', strtotime($sched_get['end_date']));
            $current_date1 = date('Y-m-d', time());
			$dateDiff = dateDifference($end_date, $current_date1);

			if($dateDiff > 30)
			{
				//set the foreign key check to 0 for an easier truncate of tables
				$q1 = 'SET GLOBAL FOREIGN_KEY_CHECKS=0';
				$conn->query($sql);

				/*====code to truncate all tables==============*/

				$trunc_table = 'TRUNCATE table student; TRUNCATE table candidate; TRUNCATE table vote;
				TRUNCATE table candidate_position; TRUNCATE table admin_activity_log; TRUNCATE table student_access_log;
				TRUNCATE table vote_event;';

				$conn->query($trunc_table);

				/*==========drop temporary tables================*/
				 $val = $conn->query('SELECT 1 from temp_candidate LIMIT 1');

				 if($val != FALSE)
	 			{
	 				$drop_temp = 'drop table temp_candidate';
	 			}
	 			
	 			 $val2 = $conn->query('SELECT 1 from temp_event limit 1');

				 if($val2 != FALSE)
	 			{
	 				$conn->query('drop table temp_event');

	 			}
			}

		}
		$q2 = 'SET GLOBAL FOREIGN_KEY_CHECKS=1';
				$conn->query($q2);
	}
	
	
}

function dropTempCandidate($conn)
{
		$sched = $conn->query('SELECT * from vote_event order by vote_event_id');
		$sched_get = $sched->fetch_assoc();
		if($sched_get == NULL)
		{
			$val = $conn->query('SELECT 1 from temp_candidate LIMIT 1');

				 if($val != FALSE)
	 			{
	 				$drop_temp = 'drop table temp_candidate';
	 			}
		}
}

?>