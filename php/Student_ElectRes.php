<!--Election Results (Student)-->
<?php
    require './backMonitor/fetch_candidates.php';
?>
<link rel="stylesheet" href="../css/student_css/style_monitor.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src="../js/script_monitor1.js?v=<?php echo time(); ?>"></script> 
<script src="../js/script_monitor2.js?v=<?php echo time(); ?>"></script>

  <div class="bheader">
        <h3>
          2020 ELECTION RESULTS
        </h3>
  </div>
  
  <div class="bheader1">
        <h3>
          <b>VOTER'S TURNOUT</b>
        </h3>
  </div>

  <?php
    //====================variables==================
    $gr7 = 0;
    $gr7_voted = 0;
    $gr7_percent = 0;
    $gr8 = 0;
    $gr8_voted = 0;
    $gr8_percent = 0;
    $gr9 = 0;
    $gr9_voted = 0;
    $gr9_percent = 0;
    $gr10 = 0;
    $gr10_voted = 0;
    $gr10_percent = 0;
    $gr11 = 0;
    $gr11_voted = 0;
    $gr11_percent = 0;
    $gr12 = 0;
    $gr12_voted = 0;
    $gr12_percent = 0;

    /*Database query for retrieving data of student and their status*/

    //============================for gr 7 ==========================
    $gr_7 = "SELECT * FROM student where grade_level = 7";
    if ($result = mysqli_query($conn, $gr_7)) {
        $gr7 = mysqli_num_rows($result);
        $gr_7a = "SELECT * FROM student where grade_level = 7 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_7a)) {
            $gr7_voted = mysqli_num_rows($result1);
        }
    }

    
    if($gr7!=0){
        $gr7_percent = ($gr7_voted / $gr7) * 100;
    } else {
        $gr7_percent = ($gr7_voted / 1) * 100;
    }

    //=========================for grade 8============================

    $gr_8 = "SELECT * FROM student where grade_level = 8";
    if ($result = mysqli_query($conn, $gr_8)) {
        $gr8 = mysqli_num_rows($result);
        $gr_8a = "SELECT * FROM student where grade_level = 8 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_8a)) {
            $gr8_voted = mysqli_num_rows($result1);
        }
    }

    if($gr8!=0){
        $gr8_percent = ($gr8_voted / $gr8) * 100;
    } else {
        $gr8_percent = ($gr8_voted / 1) * 100;
    }

    //========================for grade 9 ==============================
    $gr_9 = "SELECT * FROM student where grade_level = 9";
    if ($result = mysqli_query($conn, $gr_9)) {
        $gr9 = mysqli_num_rows($result);
        $gr_9a = "SELECT * FROM student where grade_level = 9 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_9a)) {
            $gr9_voted = mysqli_num_rows($result1);
        }
    }

    if($gr9!=0){
        $gr9_percent = ($gr9_voted / $gr9) * 100;
    } else {
        $gr9_percent = ($gr9_voted / 1) * 100;
    }

    //============================for grade 10 ==========================

    $gr_10 = "SELECT * FROM student where grade_level = 10";
    if ($result = mysqli_query($conn, $gr_10)) {
        $gr10 = mysqli_num_rows($result);
        $gr_10a = "SELECT * FROM student where grade_level = 10 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_10a)) {
            $gr10_voted = mysqli_num_rows($result1);
        }
    }

    if($gr10!=0){
        $gr10_percent = ($gr10_voted / $gr10) * 100;
    } else {
        $gr10_percent = ($gr10_voted / 1) * 100;
    }
    //========================for grade 11 ===============================
    $gr_11 = "SELECT * FROM student where grade_level = 11";
    if ($result = mysqli_query($conn, $gr_11)) {
        $gr11 = mysqli_num_rows($result);
        $gr_11a = "SELECT * FROM student where grade_level = 11 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_11a)) {
            $gr11_voted = mysqli_num_rows($result1);
        }
    }

    if($gr11!=0){
        $gr11_percent = ($gr11_voted / $gr11) * 100;
    } else {
        $gr11_percent = ($gr11_voted / 1) * 100;
    }

    //========================for grade 12 ================================
    $gr_12 = "SELECT * FROM student where grade_level = 12";
    if ($result = mysqli_query($conn, $gr_12)) {
        $gr12 = mysqli_num_rows($result);
        $gr_12a = "SELECT * FROM student where grade_level = 12 and voting_status = 1";
        if ($result1 = mysqli_query($conn, $gr_12a)) {
            $gr12_voted = mysqli_num_rows($result1);
        }
    }

    if($gr12!=0){
        $gr12_percent = ($gr12_voted / $gr12) * 100;
    } else {
        $gr12_percent = ($gr12_voted / 1) * 100;
    }

    //===================== ======end============================================
    ?>

    <div class="Bcon">
        <div class="Bvcontainer">
            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false" > <?php //ang gr7_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na ?>
                       <div class="circle" data-percent=<?php echo '' . $gr7_percent . ''; ?>>
                            <div></div>
                        </div>
                    </div>
                    <p><b> GRADE 7</b></p>
                </div>
            </div>

            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false"><?php //ang gr8_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na
                                                                    ?>
                        <div class="circle" data-percent=<?php echo '' . $gr8_percent . ''; ?>>
                            <div></div>

                        </div>
                    </div>
                    <p><b> GRADE 8</b></p>
                </div>
            </div>

            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false"><?php //ang gr9_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na
                                                                    ?>
                        <div class="circle" data-percent=<?php echo '' . $gr9_percent . ''; ?>>
                            <div></div>

                        </div>
                    </div>
                    <p><b> GRADE 9</b></p>
                </div>
            </div>

            
            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false"><?php //ang gr10_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na
                                                                    ?>
                        <div class="circle" data-percent=<?php echo '' . $gr10_percent . ''; ?>>
                            <div></div>

                        </div>
                    </div>
                    <p><b> GRADE 10</b></p>
                </div>
            </div>

            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false"><?php //ang gr11_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na
                                                                    ?>
                        <div class="circle" data-percent=<?php echo '' . $gr11_percent . ''; ?>>
                            <div></div>
                        </div>
                    </div>
                    <p><b> GRADE 11</b></p>
                </div>
            </div>

            <div class="Bcard1">
                <div class="Bbox1">
                    <div class="progressbar" data-animate="false"><?php //ang gr12_percent sya yung gagamitin para sa bar, yung naga pakita kung ilang percent na
                                                                    ?>
                        <div class="circle" data-percent=<?php echo '' . $gr12_percent . ''; ?>>
                            <div></div>
                        </div>
                    </div>
                     <p><b> GRADE 12</b></p>
                </div>
            </div>

            <?php
            ?>
        </div>
    </div>

  <div class="bheader2">
        <h3>
          <b>VOTE TALLY</b>
        </h3>
  </div>

    <div class="Belection_container">
        <?php
            $set_flag = 0;
            $temp = "yes";
            foreach($candidates as $candidate){
                if($temp=="yes" || ($temp != $candidate['position'])){
                    $set_flag = 0;
                }
                if($candidate['position']!="President"&&($set_flag==0)){
                    echo '</div>';
                }
                if($set_flag==0){
                    echo '<div class="Bposition1">';
                    echo '<h1><b>'.$candidate['position'].'</b></h1>';
                    $set_flag = 1;
                }
                echo '<div class ="Bcan">';
                    if(empty($candidate['middle_name'])){
                        echo '<b class"Bcan_name">'.$candidate['first_name'].' '.$candidate['last_name'].' ('.$candidate['party_name'].')<span class="Btally">'.$candidate['total_votes'].'</span></b>';
                    }else{
                        echo '<b>'.$candidate['first_name'].' '.$candidate['middle_name'][0].'. '.$candidate['last_name'].' ('.$candidate['party_name'].')<span>'.$candidate['total_votes'].'</span></b>';
                    }
                    
                echo '</div>';

                $temp = $candidate['position'];
            }
        ?>
        </div>
    </div>


<br>
<br>