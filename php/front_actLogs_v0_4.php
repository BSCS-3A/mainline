<!--
Proj Mngr NOTES:
dunno why pero sa original version, style2 ang ginamit pero gumagana naman bg
pero paglipat sa main, ayaw lumabas ng background image kahit napalitan ko na ng correct
na filepath yung background image url, kaya ginawa ko same nlng sa addAdmin yung stylesheet
"style1_addAdmin" tapos yung header para sa title ng ACTIVITY LOGS pinalitan ko from
header to cheader

kerby, latest update:
30 day expiry of logs, 
use of username instead of admin id in the display table
-->
<?php
session_start();
include("db_conn.php");
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_addAdmin.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/admin_css/style2_actLogs.css"> -->
    <link rel="stylesheet" href="../css/admin_css//bootstrap_addAdmin.css">
    <link rel="stylesheet" href="../css/admin_css//dataTables.bootstrap_addAdmin.css">
    <link rel="stylesheet" href="../css/admin_css//font-awesome_addAdmin.css">
    
    <script src="../js/jquery-1.11.1.min_addAdmin.js"></script>
    <script src="../js/jquery.dataTables.min_addAdmin.js"></script>
    <script src="../js/dataTables.bootstrap_addAdmin.js"></script>
    <script src="../js/popper.min_addAdmin.js"></script>
    <script src="../js/bootstrap.min_addAdmin.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/a076d05399_addAdmin.js"></script>
    <script type="text/javascript" src="../js/admin_session_timer.js"></script>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>

    <title> Activity Logs | BUCEILS HS Online Voting System</title>
</head>

<body>

        <!-- connection -->
        <?php include "navAdmin.php"; ?>

    <section>
    <div class="cheader" id="myHeader">
        <h1>ACTIVITY LOGS</h1>
    </div>
    <div class="container">
       <section>
              <div class="row">
              <div class="col-md-12">
                  
      <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                          <thead>
                              <tr> 
                                  <th class="text-center">DATE</th>
                                  <th class="text-center">TIME</th>
                                  <th class="text-center">ADMIN USERNAME</th>
                                  <th class="text-center">ACTION</th>    
                    
                              </tr>
                          </thead> 
     
                          <tbody>
                              <?php
                                //   while($row = mysqli_fetch_array($results))
                                //   {
                                //       echo "<tr>";
                                //           echo "<td>" . $row['activity_date'] . "</td>";
                                //           echo "<td>" . $row['activity_time'] . "</td>";
                                //           echo "<td>" . $row['admin_id'] . "</td>";
                                //           echo "<td>" . $row['activity_description'] . "</td>";
                                //       echo "</tr>";
                                //   }
                              
                                  // Create connection
                                  include "db_conn.php";
                              
                                  mysqli_query($conn, "DELETE FROM admin_activity_log WHERE activity_date < DATE_SUB(NOW(), INTERVAL 1 MONTH)");
                                  $results = mysqli_query($conn, "SELECT activity_time, activity_date, activity_description, username FROM admin INNER JOIN admin_activity_log ON admin.admin_id = admin_activity_log.admin_id WHERE activity_description!='Login' AND activity_description!='Logout' ORDER BY activity_log_id desc");

                                  while($row = mysqli_fetch_array($results))
                                  {
                                      echo "<tr>";
                                          echo "<td>" . $row['activity_date'] . "</td>";
                                          echo "<td>" . $row['activity_time'] . "</td>";
                                          echo "<td>" . $row['username'] . "</td>";
                                          echo "<td>" . $row['activity_description'] . "</td>";
                                      echo "</tr>";
                                  }
                              ?>
                          </tbody>
                      </table>
          </div>
          </div>
      </div>
    </div>
  </section>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Import new list?</h4>
      <div class="modal-footer ">
      <button type="button" class="btn btn-success" id="go" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
      <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
      </div>
    </div>
    <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
    <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title custom_align" id="Heading">Generate One Time Password for this list?</h4>
    <div class="modal-footer ">
    <button type="button" class="btn btn-success" id="go" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
    <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
  </div>
    </div>
  </div>
  <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</section>
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Admin Information</h4>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Username">
                </div>
                <div class="form-group">              
                    <input class="form-control " type="text" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Confirm Password">
                </div>
                
            </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update Account</button>
                    
                </div>
            </div>
          <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
          </div>       
          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
          </div>
                <div class="modal-body">             
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
          </div>
              <div class="modal-footer ">
              <button type="button" class="btn btn-success" id="continue" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
              <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
              </div>
          <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
          </div>

    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

     <script>
        $('.icon').click(function() 
        {
            $('span').toggleClass("cancel");
        });
    </script>

    <script>
        $(document).ready(function() 
        {
            $('#datatable').DataTable({
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
            });
            $("[data-toggle=tooltip]").tooltip();
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