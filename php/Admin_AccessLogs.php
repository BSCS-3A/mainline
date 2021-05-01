<?php
session_start();
include("db_conn.php");
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    
         $idletime=900;//after 60 seconds the user gets logged out

         if (time()-$_SESSION['timestamp']>$idletime){
           header("Location: Logout.php");
         }else{
           $_SESSION['timestamp']=time();
         }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_AdminDash.css">
    
    <link rel="stylesheet" href="../css/admin_css/rowReorder.dataTables.min_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/responsive.dataTables.min_AdminDash.css">

    <link rel="stylesheet" href="../css/admin_css/font-awesome_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_AdminDash.css">
    <!-- <script src="../js/a076d05399.js"></script> -->
    
    <script src="../js/dataTables.bootstrap4.min_AdminDash.js"></script>

    <script src="../js/dataTables.rowReorder.min_AdminDash.js"></script>
    <script src="../js/dataTables.responsive.min_AdminDash.js"></script>

    <script src="../js/jquery-3.5.1_adminDash.js"></script>

    <script src="../js/jquery.dataTables.min_adminDash.js"></script>

    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>Access Logs</title>
</head>

<body>

    <!-- navigation and footer -->
    <?php include "navAdmin.php"; ?>

    <!-- <nav>
        <input class="nav-toggle1" type="checkbox">
        <div class="aLogo">
            <h2 class="aLogo-txt1"><a href="AdminDashboard.php">BUCEILS HS</a></h2>
            <h3 class="aLogo-txt2"><a href="AdminDashboard.php">ONLINE VOTING SYSTEM</a></h3>
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
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
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
            <li><a href="../../Candidate-Management-main/LandingPage/LandingPageV1.0.php">CANDIDATES</a></li>
            <li>
                <label for="btn-4" class="Ashow">LOGS</label>
                <a href="#">LOGS</a>
                <input class="nav-toggle5" type="checkbox" id="btn-4">
                <ul>
                    <li><a href="AccessLogs.php">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow"><?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></label>
                <a class="user" href="#"><img class="user-profile" src="assets/img/<?php echo $_SESSION['photo'];?>"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#"><?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="Logout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        
    </nav> -->

    <div class="ADheader" id="ADheader">
        <h2 class="aHeader-txt">ADMIN ACCESS LOGS</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table id="ADdataTable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="min-mobile">Access Date</th>
                                <th class="min-mobile">Access Time</th>
                                <th class="min-mobile">Action</th>
                                <th class="min-mobile">Accessed By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            mysqli_query($conn, "DELETE FROM admin_activity_log WHERE activity_date < DATE_SUB(NOW(), INTERVAL 1 MONTH)");
                            $res = mysqli_query($conn, "SELECT * FROM admin_activity_log INNER JOIN admin ON admin_activity_log.admin_id=admin.admin_id  WHERE activity_description='Login' OR activity_description='Logout' ORDER BY activity_date DESC,activity_time DESC"); //query and join activity log and admin
                            while($result = mysqli_fetch_array($res)){
                                 echo "<tr>";
                                 echo "<td>".date( 'm-d-Y', strtotime($result['activity_date']))."</td>"; 
                                 echo "<td>".$result['activity_time']."</td>";
                                 echo "<td>".$result['activity_description']."</td>";
                                 echo "<td>".$result['admin_fname']." ".$result['admin_lname']."</td>";
                                 echo "</tr>";
                                
                             }

                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="ADheader" id="ADheader">
        <h2 class="aHeader-txt">STUDENT ACCESS LOGS</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table id="ADdataTable2" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="min-mobile">Access Date</th>
                                <th class="min-mobile">Access Time</th>
                                <th class="min-mobile">Action</th>
                                <th class="min-mobile">Accessed By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            mysqli_query($conn, "DELETE FROM student_access_log WHERE date < DATE_SUB(NOW(), INTERVAL 1 MONTH)");
                            $res2 = mysqli_query($conn, "SELECT * FROM student_access_log INNER JOIN student ON student_access_log.student_id=student.student_id  WHERE activity_description='Login' OR activity_description='Logout' ORDER BY date DESC, time DESC"); //query and join student access log and student
                            while($resultA = mysqli_fetch_array($res2)){
                                    echo "<tr>";
                                    echo "<td>"."<center>".date( 'm-d-Y', strtotime($resultA['date']))."</center>"."</td>"; 
                                    echo "<td>"."<center>".$resultA['time']."</center>"."</td>";
                                    echo "<td>"."<center>".$resultA['activity_description']."</center>"."</td>";
                                    echo "<td>"."<center>".$resultA['fname']." ".$resultA['lname']."</center>"."</td>";
                                    echo "</tr>";
                                }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

    <script>
        $('.ADicon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
    </script> -->
    <script>
        $(document).ready(function() {
            $('#ADdataTable').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
            $('#ADdataTable2').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
            $("[data-toggle=tooltip]").tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#ADdataTable2').DataTable();
        });
    </script>
        <script>
        $(document).ready(function () {
            $('#ADdataTable2').DataTable();
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