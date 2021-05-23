<?php
    require '../db_conn.php';

    $file = fopen("../../other/post_result.txt", "w") or die("Unable to open file!");

    $flag_post = 1;

    fwrite($file, $flag_post);

    fclose($file);
?>