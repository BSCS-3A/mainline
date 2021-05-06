<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../js/jquery-1.11.1.min_monitor.js"></script>
    <!-- <script src="../js/jquery.dataTables.min_monitor.js"></script> -->
    <script src="../../Monitoring/Admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap_monitor.js"></script>
    <!-- <script src="../js/countdown.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>Election Vote Status  | BUCEILS HS Online Voting System</title>
</head>

<body>
    <?php include 'navAdmin.php'; ?>
    

    <div class="Bvotestat">
        <p><b>VOTE STATUS</b></p>
    </div>
    <br><br>
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
                    "url": <?php echo '"./backMonitor/fetch_students.php?level=' . $samp . '"' ?>,
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
