<?php
  function notifMessage($message)
  {
      echo '<link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">';
      require_once 'navAdmin.php';
      echo '<main>
            <div id="error-message-container" class="error-message-container">      
              <div id="election-finished-msg" class="error-message">
                <h3>'.$message.'</h3>
              </div>

              <div id="error-button" class="error-button">
                      <button type="button" id="msg-ok-button" class="OkBTN-error">OK</button>
                    </div>
                  </div>
          </main>';
        echo '<script>
          // Get Home button
          var home = document.getElementById("msg-ok-button");

          home.onclick = function() {
              window.location.href = "../index.php";
          }
          </script>';
  }

  function resMsg($message, $button)
  {
    echo '<link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">';
    require_once 'navAdmin.php';
    echo '<main>
            <div id="error-message-container" class="error-message-container">      
              <div id="election-finished-msg" class="error-message">
                <h3>'.$message.'</h3>
              </div>

              <div id="error-button" class="error-button">
                      <button type="button" id="msg-ok-button" class="OkBTN-error">'.$button.'</button>
                    </div>
                  </div>
          </main>';

    if($button=="DOWNLOAD")
    {
      echo '<script>
              var download = document.getElementById("msg-ok-button");
              download.onclick = function()
              {
                location.href = "Admin_generate-pdf.php"; // generate report
              }
            </script>';
    }
    else
    {
?>
      <script>
        var archive = document.getElementById("msg-ok-button");
        archive.onclick = function()
        {
<?php
          include('db_conn.php');
          require_once './backMonitor/fetch_report.php';
          Archive($conn, $end_date->format('Y-m-d'));
?>
        }
      </script>;
<?php
    }//end of else
  }//end of function
 ?>