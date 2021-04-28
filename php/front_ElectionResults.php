<?php
// front_Election_v5_0.php
require './backMonitor/fetch_candidates.php';
require './backMonitor/fetch_candidate_position.php';
require './backMonitor/position_vote_count.php';
require './backMonitor/fetch_date.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="utf-8">
  <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/font-awesome_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">
  <!-- <script src="assets/js/a076d05399.js"></script> -->
  <!-- <script src="../js/dataTables.bootstrap4.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/jquery.dataTables.min_monitor.js"></script>
  <!-- <script src="../../Admin/assets/js/countdown.js"></script> -->
  <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
  <title>BUCEILS Voting System</title>
</head>

<body>
  <?php include 'navAdmin.php'; ?>
  <!-- <nav>
    <input class="nav-toggle1" type="checkbox">
    <div class="aLogo">
      <h2 class="aLogo-txt1"><a href="adminDashboard.html">BUCEILS HS</a></h2>
      <h3 class="aLogo-txt2"><a href="adminDashboard.html">ONLINE VOTING SYSTEM</a></h3>
    </div>
    <label for="btn" class="ADicon"><span class="fa fa-bars"></span></label>
    <input class="nav-toggle2" type="checkbox" id="btn">
    <ul>
      <li>
        <label for="btn-1" class="Ashow">ACCOUNTS</label>
        <a href="#">ACCOUNTS</a>
        <input class="nav-toggle3" type="checkbox" id="btn-1">
        <ul>
          <li><a href="#">Students</a></li>
          <li><a href="#">Admin</a></li>
        </ul>
      </li>
      <li>
        <label for="btn-2" class="Ashow">ELECTION</label>
        <a href="#">ELECTION</a>
        <input class="nav-toggle4" type="checkbox" id="btn-2">
        <ul>
          <li><a href="front_ArchFolder_v8_0.php">Archive</a></li>
          <li><a href="front_VsPercentage_v6_1.php">Vote Status</a></li>
          <li><a href="front_Election_v5_0">Vote Result</a>
            <ul>
              <li><a href="../../functionality_php/report/generate-pdf.php">Make Report</a></li>
            </ul>
          </li>
          <li><a href="#">Configuration</a>
            <ul>
              <li><a href="#">Scheduler</a></li>
              <li><a href="#">Signatory</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">CANDIDATES</a></li>
      <li>
        <label for="btn-4" class="Ashow">LOGS</label>
        <a href="#">LOGS</a>
        <input class="nav-toggle5" type="checkbox" id="btn-4">
        <ul>
          <li><a href="accessLogs-v2.0.html">Access Log</a></li>
          <li><a href="#">Activity Log</a></li>
          <li><a href="#">Vote Summary</a></li>
        </ul>
      </li>
      <li><a href="#">MESSAGES</a></li>
      <li>
        <label for="btn-5" class="Ashow">Admin Name</label>
        <a class="user" href="#"><img class="user-profile" src="../../Admin/assets/img/user.png"></a>
        <input class="nav-toggle6" type="checkbox" id="btn-5">
        <ul>
          <li><a class="username" href="#">Admin Name</a></li>
          <li class="logout">
            <span class="fa fa-sign-out"></span><a href="#">LOGOUT</a></span>
          </li>
        </ul>
      </li>
    </ul>
    
  </nav> -->

  <div class="Belecstat">
    <p><b>ELECTION RESULTS</b></p>
  </div>

  <div class="Belection_container">

    <?php
    for ($i = 0; $i < $size; $i++) {
      echo '<div class="Bposition1">';
      echo '<h1><b>' . $candidate_positions[$i]['position_name'] . '</b></h1>';
      foreach ($candidates as $candidate) {
        if ($candidate['position'] == $candidate_positions[$i]['position_name']) {
          if ($position_votes[$i]['votes_per_position'] != 0) {
            $percentage = round(($candidate['total_votes'] / $position_votes[$i]['votes_per_position']) * 100);
          } else {
            $percentage = 0;
          }
          if($current_date_time > $row['end_date']){
            echo '<div class ="Bcan"><b>'.$candidate['first_name'].' '.$candidate['last_name'].'</b></div>';
            echo '<div class ="Bparty"><b>'.$candidate['party_name'].'</b></div>';
            echo '<div class="Bbar1">';
            echo '<img class="Banon" src="../img/anon.png" width="45px" height="45px">';
            echo '<div class="Bvote_percentage">';
            echo '<div class="Bvote_level" style="width:' . $percentage . '%">';
            echo '<b><span>'.$candidate['total_votes'].'</span></b>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }else {
          echo '<div class ="Bcan"><b>Candidate Name</b></div>';
          echo '<div class ="Bparty"><b>Party</b></div>';
          echo '<div class="Bbar1">';
          echo '<img class="Banon" src="../img/anon.png" width="45px" height="45px">';
          echo '<div class="Bvote_percentage">';
          echo '<div class="Bvote_level" style="width:'.$percentage.'%">';
          echo '<b><span>'.$percentage.'%</span></b>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          }
        }
      }
      echo '</div>';
    }
    ?>
  </div>


  <div class="Bbtn_post">
    <button type="submit" id="post_button" name="post_button" class="Bbtn_postresults scs-responsive"><b>POST RESULT</b></button>
  </div>>

  <div class="Bbtn_reset">
    <button onclick="" name='button2' class="Bbtn_resetresults scs-responsive"><b>RESET ELECTION</b></button>
  </div>



  <br>
  <br>
  <br>
  <br>
  <br>


  <!-- <div class="footer">
    <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
  </div> -->

  <script>
    $(document).ready(function() {
      $("#post_button").click(function() {
        var temp = 1;
        $.ajax({
          url: "./backMonitor/fetch_date.php",
          data: {
            post_button: temp
          },
          success: function(response) {
            console.log(response);
          }
        });
      });
    });

    $('.ADicon').click(function() {
      $('span').toggleClass("cancel");
    });
  </script>
</body>

</html>