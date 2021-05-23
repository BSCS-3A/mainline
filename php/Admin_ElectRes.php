<?php
session_start();
include("db_conn.php");
if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])){
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
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/jquery-1.11.1.min_monitor.js"></script>
    <script src="../js/jquery.dataTables.min_monitor.js"></script>
    <script src="../js/dataTables.bootstrap_monitor.js"></script>
    <script src="../js/bootstrap.min_monitor.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  
    <script type="text/javascript" src="../js/admin_session_timer.js"></script>  
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>   
    <title>Election Results | BUCEILS HS Online Voting System</title>
</head>

<body>
  <?php include 'navAdmin.php'; ?>
  
  <?php 
  if($row_count > 0){ 
    echo '<div class="ADheader" id="ADheader">';
        echo '<h2 class="aHeader-txt">ELECTION RESULTS</h2>';
    echo'</div>'
  ?>

  <div class="Belection_container" id="election_res">

    </div> <!-- end of ajax output -->
  </div> <!-- End of #election-res div -->
  
  <form action="" method="post" target="_self" class="form-buttons">
    <div class="Bbtn_post" id="post_b">
      <button onclick='' type='submit' id='post_button' name='post_button' class='Bbtn_postresults scs-responsive'><b>POST RESULT</b></button>
    </div>

    <div class="Bbtn_reset" id="reset_b">
      <button onclick='' type='submit' id='reset_button' name='reset_button' class='Bbtn_resetresults scs-responsive'><b>RESET ELECTION</b></button>
    </div>
  </form>
  
  <?php
  }else{
    require '../html/admin_no_election.html';
  }
  ?>
  
  <?php
    if(isset($_POST['post_button'])){
      $file = fopen("../other/post_result.txt", "w") or die("Unable to open file!");
      
      $flag_post = 1;

      fwrite($file, $flag_post);
    
      fclose($file);
    }

    if(isset($_POST['reset_button'])){
      $truncate_record = mysqli_query($conn, 'TRUNCATE TABLE vote_event');

      $file = fopen("../other/post_result.txt", "w") or die("Unable to open file!");

      $flag_post = 0;

      fwrite($file, $flag_post);

      fclose($file);
    }
  ?>

  <br>
  <br>
  <br>

  <div class="footer">
    <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
  </div>

  <script>
    const candidatesBody = document.querySelector(".Belection_container");

    let auto_refresh = setInterval(
        function loadCandidates(){
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'backMonitor_Election_Result.php', true);

            xhr.onload = function(){
              if(this.status == 200){
                let candidates_all = JSON.parse(this.responseText);

                let output = '';
                let flag = 0;
                let prev_pos = 'yes';
                
                for(let i in candidates_all){
                  if(candidates_all[i].current_date > candidates_all[i].end_date){
                    if(prev_pos=='yes' || (prev_pos != candidates_all[i].position)){
                      flag = 0;
                    }
                    if((candidates_all[i].position!="President")&&(flag==0)){
                      output += '</div>';
                    }

                    if(flag==0){
                      output += 
                      '<div class="Bposition1">' + 
                      '<h1><b>'+candidates_all[i].position+'</b></h1>';
                      flag = 1;
                    }

                    output += 
                    '<div class ="Bcan"><b>'+candidates_all[i].name+'</b></div>' +
                    '<div class ="Bparty"><b>'+candidates_all[i].party_name+'</b></div>' +
                    '<div class="Bbar1">' +
                    '<img class="Banon" src="'+candidates_all[i].photo+'" width="40px" height="40px">' +
                    '<div class="Bvote_percentage">' +
                    '<div class="Bvote_level" style="width:'+candidates_all[i].percentage+'%">' +
                    '<b><span>'+candidates_all[i].total_votes+'</span></b>' +
                    '</div>' + '</div>' + '</div>';
                    
                    // output += '</div>';
                    prev_pos = candidates_all[i].position;
                    
                  }else{
                    if(prev_pos=='yes' || (prev_pos != candidates_all[i].position)){
                      flag = 0;
                    }
                    if((candidates_all[i].position!="President")&&(flag==0)){
                      output += '</div>';
                    }

                    if(flag==0){
                      output += 
                      '<div class="Bposition1">' + 
                      '<h1><b>'+candidates_all[i].position+'</b></h1>';
                      flag = 1;
                    }

                    output += 
                    '<div class ="Bcan"><b>'+candidates_all[i].name+'</b></div>' +
                    '<div class ="Bparty"><b>'+candidates_all[i].party_name+'</b></div>' +
                    '<div class="Bbar1">' +
                    '<img class="Banon" src="'+candidates_all[i].photo+'" width="40px" height="40px">' +
                    '<div class="Bvote_percentage">' +
                    '<div class="Bvote_level" style="width:'+candidates_all[i].percentage+'%">' +
                    '<b><span>'+candidates_all[i].percentage+'%</span></b>' +
                    '</div>' + '</div>' + '</div>';
                    
                    // output += '</div>';
                    prev_pos = candidates_all[i].position;
                  }
                }
                document.getElementById('election_res').innerHTML = output;
              }
            }
            xhr.send();
        }, 100
    );
  </script>
  <script> 
    $('.ADicon').click(function() {
      $('span').toggleClass("cancel");
    });
  </script>
</body>

</html>
<?php
}else{
    header("Location: AdminLogin.php");
    exit();
}
?>