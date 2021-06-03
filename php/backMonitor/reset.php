<?php
    require '../db_conn.php';
    require '../db_clean.php';

    $val = $conn->query('SELECT 1 from temp_candidate LIMIT 1');
    if($val != FALSE){ $conn->query('DROP TABLE temp_candidate');}


    $truncate_record = mysqli_query($conn, 'TRUNCATE TABLE vote_event');
    $truncate_vote = mysqli_query($conn, 'TRUNCATE TABLE vote');
    $reset_voting_status = mysqli_query($conn, 'UPDATE student SET voting_status = 0');
    $reset_total_votes = mysqli_query($conn, 'UPDATE candidate SET total_votes = 0');


    $file = fopen("../../other/post_result.txt", "w") or die("Unable to open file!");

    $flag_post = 0;

    fwrite($file, $flag_post);

    fclose($file);
    eventCopy($conn);

?>