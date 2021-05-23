<?php
    require '../db_conn.php';

    $truncate_record = mysqli_query($conn, 'TRUNCATE TABLE vote_event');

    $file = fopen("../../other/post_result.txt", "w") or die("Unable to open file!");

    $flag_post = 0;

    fwrite($file, $flag_post);

    fclose($file);

?>