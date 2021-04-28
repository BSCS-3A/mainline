<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

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
    <!-- <script src="../js/dataTables.bootstrap4.min_adminDash.js"></script> -->
    <!-- <script src="../js/jquery-3.5.1_adminDash.js"></script> -->
    <script src="../js/jquery.dataTables.min_studAc.js"></script>
    <!-- <script src="../../Admin/assets/js/countdown.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>
    <?php include "navAdmin.php" ?>
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
                    <li><a href="front_VsPercentage_v6_0.php">Vote Status</a></li>
                    <li><a href="front_Election_v5_0.php">Vote Result</a>
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


    <div class="Bvotestat">
        <p><b>VOTE STATUS</b></p>
    </div>
    <button class="Bbtn_goback" onclick="goBack()">Go Back</button>
    <div class="Bvs_gradelevel">
        <?php $samp = $_GET['level']; //gets the value from prev page
        echo '<p>GRADE ' . $samp . '</p>'; ?>
    </div>

    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                        <thead>
                            <tr>
                                <th class="text-center">LASTNAME</th>
                                <th class="text-center">FIRSTNAME</th>
                                <th class="text-center">MIDDLENAME</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br><br><br><br>
    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "ajax": {
                    "url": <?php echo '"./backMonitor/fetch_students.php?level='.$samp.'"' ?>,
                    "type": "POST",
                    "dataSrc": ""
                },
                "columns": [{
                        data: "lname"
                    },
                    {
                        data: "fname"
                    },
                    {
                        data: "Mname"
                    },
                    {
                        data: "voting_status"
                    }
                ]
            });
            setInterval(function() {
                table.ajax.reload(null, false);
            }, 1000);
        });

        function goBack() {
            window.history.back()
        }
    </script>
</body>

</html>