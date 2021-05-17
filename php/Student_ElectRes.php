<!--Election Results (Student)-->
<?php
    require './backMonitor/fetch_candidates.php';
?>
<link rel="stylesheet" href="../css/student_css/style_monitor.css">

      <div class="bheader">
        <h3>
          ELECTION RESULTS
        </h3>
      </div>

  <?php $samp = 50.5;?>
  <div class="bgraph"></div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script><script  src="../js/script_monitor1.js"></script>

  <script type="text/javascript">
	donutGraph('.bgraph', <?php echo $samp;?>);
  </script>

  <hr>

  <div class="Belec_container" id="candidate">  
        <?php
            foreach($candidates as $candidate){
                echo '<div class="Bposition">';
                if(empty($candidate['photo'])){
                  echo '<img src="../img/admin_anon.png" width="40px" height="40px"/>';
                }else{
                  echo '<img src="'.$candidate['photo'].'" width="40px" height="40px"/>';
                }
                echo '<p class="Bnum_votes">TOTAL VOTES: '.$candidate['total_votes'].'</p>';
                echo '<p class="Bname">'.$candidate['first_name'].' '.$candidate['middle_name'].' '.$candidate['last_name'].'</p>';
                echo '<p class="Bposition">'.$candidate['position'].'</p>';
                echo '<p class="Bparty">'.$candidate['party_name'].'</p>';
                echo '</div>';
            }
        ?>
  </div>

