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
      include('db_conn.php');
      require './backMonitor/archive.php';
      $date = $end_date->format('Y-m-d');

      echo '<script>
        var archive = document.getElementById("msg-ok-button");
        archive.onclick = function()
        {';
          insertToArchive($conn, $date);
          // header('location: http://localhost/mainline-main/php/Admin_Report.php');
          // die;
          // header("Refresh:0");
          // resMsg($message, "DOWNLOAD");

        echo '}
      </script>';

    }//end of else
  }//end of function
 ?>