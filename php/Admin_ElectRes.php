<?php
session_start();
include("db_conn.php");
if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])){
// front_Election_v5_0.php
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
  <?php include 'navAdmin.php';?>
  
  <div class="ADheader" id="ADheader">
    <h2 class="aHeader-txt">ELECTION RESULTS</h2>
  </div>
  <div id="freezeLayer" class="freeze-layer" style="display:none;"></div>
  <?php 
  if($row_count==0){
    require_once 'Admin_Notif.php';
    notifMessage("No Election has been scheduled.");
    exit();
  }else{
    $trigger = 0;
    if($current_date_time < $last_election_date){
      $trigger = 1;
    }else{
      $trigger = 0;
    } 
  ?>
  <div class="Belection_container" id="election_res">
      <?php if($current_date_time<=$last_election_date){ ?>
      <link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">
      <main>
        <div id="error-message-container" class="error-message-container" style="margin-top:10px">			
          <div id="election-finished-msg" class="error-message">
          <?php include "../html/spinner.html";?>
					<h3 style = "padding: 0px 50px">Loading results...</h3>
				</div>
      </div>
      </main>
      <?php } ?>
      </div> <!-- end of ajax output -->
  
  </div> <!-- End of #election-res div -->
  
  <div class="Bbtn_post" id="post_b">
    <button formmethod="post" onclick="confirmModal.show('POST ELECTION RESULTS?', postButtonConfirm);" type="submit" id="post_button" name="post_button" class="Bbtn_postresults scs-responsive" <?php if ($current_date_time<$last_election_date){ ?> disabled <?php   } ?>><b>POST RESULT</b></button>
  </div>
  
  <?php if($trigger == 1):?>
  <div class="Bbtn_reset" id="reset_b">
    <button formmethod="post" onclick="confirmModal.show('You are about to reset an ongoing election. All votes will be deleted and count will be back to zero. Proceed?', resetButtonConfirm);" type="submit" id="reset_button" name="reset_button" class="Bbtn_resetresults scs-responsive"><b>RESET ELECTION</b></button>
  </div>
  <?php else: ?>
  <div class="Bbtn_reset" id="reset_b">
    <button formmethod="post" onclick="confirmModal.show('RESET ELECTION RESULTS?', resetButtonConfirm);" type="submit" id="reset_button" name="reset_button" class="Bbtn_resetresults scs-responsive"><b>RESET ELECTION</b></button>
  </div>
  <?php endif; ?>
  
  <!-- Modal Pop up -->
  <div id="dialogCont" class="dlg-container">
        <?php if($trigger==1): ?>
        <div class="dlg-header" style="background: #ab3333;"><center>WARNING!</center></div>
        <?php else: ?>
        <div class="dlg-header"><center>CONFIRM DIALOG</center></div>
        <?php endif; ?>
        <div id="dlgBody" class="dlg-body">DO YOU WANT TO CONTINUE?</div>
        <div class="dlg-footer">
            <a onclick="confirmModal.okay();">YES</a>
            <a onclick="confirmModal.close();">N0</a>
        </div>
  </div>
  <!-- End of Modal container -->
  <?php
  }
  ?>

  <br><br><br>

  <div class="footer">
    <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
  </div>

  <script>

    const candidatesBody = document.querySelector(".Belection_container");

    function loadCandidates(){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'backMonitor_ajax.php', true);

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
      }
    var trigger_func = <?php echo $trigger;?>;
    if(trigger_func == 1){
      auto_refresh = setInterval(loadCandidates, 5000);
    }else{
      window.onload = loadCandidates;
    }

  </script>
  <script> 
      function postButtonConfirm(){
          $.ajax({
                type: "POST",
                url: "./backMonitor/post.php",
                success : function() { 
                    alert("Results have been posted!");
                    window.location.href = window.location.href;

                }
          });
      }
      function resetButtonConfirm(){
          $.ajax({
                type: "POST",
                url: "./backMonitor/reset.php",
                success : function() { 
                    alert("RESET");
                    window.location.href = "../index.php";
                    // window.location.href = "Admin_adminDash.php";

                }
          });
      }

      var confirmModal = new function(){
          this.show = function(msg, callback){
              var dlg = document.getElementById('dialogCont');
              var dlgBody = dlg.querySelector('#dlgBody');
              dlg.style.top = '60%';
              dlg.style.opacity = 1;
              dlgBody.textContent = msg;
              this.callback = callback;
              document.getElementById('freezeLayer').style.display = '';
          };

          this.okay = function(){
              this.callback();
              this.close();
          };
          this.close = function(){
              var dlg = document.getElementById('dialogCont');
              dlg.style.top = '-30%';
              dlg.style.opacity = 0;
              document.getElementById('freezeLayer').style.display = 'none';
          };
      }
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