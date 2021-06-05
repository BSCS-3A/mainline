<?php
require 'db_conn.php';

 $sql = "CREATE TABLE `temp_candidatoooraa`(
                      `candidate_id` int(11) NOT NULL,
                      `student_id` int(11) NOT NULL,
                      `position_id` int(11) NOT NULL,
                      `total_votes` int(11) NOT NULL,
                      `party_name` varchar(30) NOT NULL,
                      `platform_info` varchar(100) NOT NULL,
                      `credentials` varchar(500) NOT NULL,
                      `photo` varchar(100) NOT NULL
              )";
              

$conn->query($sql);





?>