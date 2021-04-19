<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_monitor.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/jquery-1.11.1.min_monitor.js"></script>
    <script src="../js/jquery.dataTables.min_monitor.js"></script>
    <script src="../js/dataTables.bootstrap_monitor.js"></script>
    <script src="../js/bootstrap.min_monitor.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>    
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>   
    <title>BUCEILS Voting System</title>
</head>
<body>

<?php include "navAdmin.php"; ?>

<!-- <nav>
    <input id="nav-toggle" type="checkbox">
    <div class="logo">
        <h2>BUCEILS HS</h2>
        <h3>ONLINE VOTING SYSTEM</h3>
    </div>
    <label for="btn" class="icon"><span class="fa fa-bars"></span></label>
    <input type="checkbox" id="btn">
    <ul>
        <li>
            <label for="btn-1" class="show">ACCOUNTS</label>
            <a href="#">ACCOUNTS</a>
            <input type="checkbox" id="btn-1">
            <ul>
                <li><a href="important.html">Students</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
        </li>
        <li>
            <label for="btn-2" class="show">ELECTION</label>
            <a href="#">ELECTION</a>
            <input type="checkbox" id="btn-2">
            <ul>
                <li><a href="#">Archive</a></li>
                <li><a href="#">Vote Status</a></li>
                <li><a href="#">Vote Result</a>
                    <ul>
                        <li><a href="#">Make Report</a></li>
                    </ul>
                </li>
                <li><a href="#">Configuration</a>
                
            </ul>
        </li>
        <li><a href="#">CANDIDATES</a></li>
        <li>
            <label for="btn-4" class="show">LOGS</label>
            <a href="#">LOGS</a>
            <input type="checkbox" id="btn-4">
            <ul>
                <li><a href="#">Access Log</a></li>
                <li><a href="#">Activity Log</a></li>
                <li><a href="#">Vote Summary</a></li>
            </ul>
        </li>
        <li><a href="#">MESSAGES</a></li>
        <li>
            <label for="btn-5" class="show">Admin Name</label>
            <a class="user" href="#"><img class="user-profile" src="assets/img/user.png"></a>
            <input type="checkbox" id="btn-5">
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
        echo '<p>GRADE '.$samp.'</p>';?>
    </div>
    
    <div class="container"><br>
    <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">            
            <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
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
        $(document).ready(function(){
            var table = $('#datatable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "ajax": {
                    "url": <?php echo '"./backMonitor/fetch_students.php?level='.$samp.'"'?>,
                    "type": "POST",
                    "dataSrc": ""
                },
                "columns": [
                    {data: "lname"},
                    {data: "fname"},
                    {data: "Mname"},
                    {data: "voting_status"}
                ]
            } );
            setInterval(function(){
                table.ajax.reload(null, false);
            }, 1000);
        });
        function goBack() {
            window.history.back()
        }
    </script>
</body>
        
        </html>