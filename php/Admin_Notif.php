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

  function dlMsg($message)
  {
    echo '<link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">';
    require_once 'navAdmin.php';
    echo '<main>
            <div id="error-message-container" class="error-message-container">      
              <div id="election-finished-msg" class="error-message">
                <h3>'.$message.'</h3>
              </div>

              <div id="error-button" class="error-button">
                      <button type="button" id="msg-ok-button" class="OkBTN-error">DOWNLOAD</button>
                    </div>
                  </div>
          </main>';
          
          require 'db_conn.php';
          $sql = $conn->query('SELECT vote_duration from vote_event');
            $row = $sql->fetch_assoc();
            if($row['vote_duration']==1)
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
                echo '<script>
              var download = document.getElementById("msg-ok-button");
              download.onclick = function()
              {
                location.href = "Admin_end_pdf.php"; // generate report
              }
            </script>';
            }
          

   
  }//end of function
 ?>