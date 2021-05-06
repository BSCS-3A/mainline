<?php       // SESSION ISSUE, details at last part
 session_start();
 include('db_conn.php');
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) 
 {
     $idletime=900;//after 15 minutes the user gets logged out

 if (time()-$_SESSION['timestamp']>$idletime){
     $_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
    header("Location: AdminLogout.php");
 }else{
    $_SESSION['timestamp']=time();
 }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_addAdmin.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_addAdmin.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_addAdmin.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_addAdmin.css">

    <script src="../js/jquery-1.11.1.min_addAdmin.js"></script>
    <script src="../js/jquery.dataTables.min_addAdmin.js"></script>
    <script src="../js/dataTables.bootstrap_addAdmin.js"></script>
    <script src="../js/popper.min_addAdmin.js"></script>
    <script src="../js/bootstrap.min_addAdmin.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/a076d05399_addAdmin.js"></script>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
    <!--additional scripts-->
    <script src="../js/bootstrap-show-password.min_addAdmin.js"></script>
    <!--<script src="../assets/js/customized.js"></script>-->
    <link rel="stylesheet" href="../css/admin_css/customized_addAdmin.css">


    <title>Admin Account Management | BUCEILS HS Online Voting System</title>
</head>

        <!-- navigation, footer, log sessions -->
        <?php include "navAdmin.php" ?>

<body>
    

    <div class="cheader">
        <h3>ADMINISTRATOR ACCOUNT MANAGEMENT</h3>
    </div>
    <div class="container">
        <section>
            <div class="btn-toolbar">
                <button name="AddAccountButton" class="btn btn-button2" data-title="otp" data-toggle="modal" data-target="#otp" data-placement="top" data-toggle="modal" title="Add Account" 
                <?php if($_SESSION['admin_position'] == "Admin"){
                ?> disabled <?php 
                }?>>
                
                <span class="fa fa-user-plus"></span> ADD ACCOUNT</button>
            </div>
            <?php //echo("{$_SESSION['admin_position']}") ?>
        </section>
        <!--######################################################################################################################################################################################-->
        <!-- TABLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                        <thead>
                            <tr>
                                <th class="text-center">NO.</th>
                                <th style="display:none;"></th>
                                <th class="text-center">FIRST NAME</th>
                                <th class="text-center">MIDDLE NAME</th>
                                <th class="text-center">LAST NAME</th>
                                <th class="text-center">EMAIL ADDRESS</th>
                                <th class="text-center">COMELEC POSITION</th>
                                <th class="text-center">ADMIN POSITION</th>
                                <th class="text-center">ACTION</th>
                                <th style="display:none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //Create connection
                            include 'db_conn.php';

                            $query = "SELECT * FROM admin";
                            $query_run = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($query_run)) { #START OF FETCHING OF RECORDS FROM DATABASE
                            ?>
                                <tr>
                                    <td></td>
                                    <td style="display:none;"><?php echo $row['admin_id']; ?></td>
                                    <td><?php echo $row['admin_fname']; ?></td>
                                    <td><?php echo $row['admin_mname']; ?></td>
                                    <td><?php echo $row['admin_lname']; ?></td>
                                    <td style="word-wrap: break-word"><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['comelec_position']; ?></td>
                                    <td><?php echo $row['admin_position']; ?></td>
                                    <td style="display:none;"><?php echo $row['password']; ?></td>
                                    <td style="white-space: nowrap;">
                                        <button class="btn btn-primary btn-xs editbtn" data-title="Edit" name="editinfo" data-toggle="modal" data-target="#edit" data-placement="top" data-toggle="tooltip" title="Edit"
                                        <?php if($_SESSION['admin_position'] == "Admin"){
                                        ?> disabled <?php 
                                        }?>>
                                        <span class="glyphicon glyphicon-pencil"></span> EDIT</button>
                                        <button class="btn btn-danger btn-xs deletebtn" data-title="Delete" data-toggle="modal" data-target="#delete"
                                        <?php if($_SESSION['admin_position'] == "Admin"){
                                        ?> disabled <?php
                                        }?>><span class="fa fa-trash"></span> DELETE</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--######################################################################################################################################################################################-->
    <!-- ADD MODAL -->
    <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">REGISTER</h4>
                </div>

                <form action="backFun_adAccnts_v0_1.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" name="admin_fname" type="text" placeholder="Firstname" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="admin_mname" type="text" placeholder="Middle Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="admin_lname" type="text" placeholder="Surname" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="username" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="comelec_position" type="text" placeholder="COMELEC Position" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Admin Position:</label>
                            <select class="form-control" name="admin_position" id="sel1" required>
                                <option><\choose></option>
                                <option>Admin</option>
                                <option>Head Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="conpassword" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>
                        <div class="container container1">
                            <label for="photo" width="70%">Upload photo</label><br />
                            <input type="file" name="my_image" id="my_image" required><br />
                            <span id="admin_newupload_errorloc" class="error"></span>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" name="saveAccount" class="btn btn-success" id="go"><span class="fa fa-check-circle"></span> Save Account</button>
                            <button type="button" class="btn btn-default" id="cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!--######################################################################################################################################################################################-->
    <!-- EDIT MODAL -->
    <form action="backFun_editAccnts_v0_1.php" method="POST">
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">Edit Admin Information</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input class="form-control" name="admin_fname" id="admin_fname" type="text" placeholder="Firstname" required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name:</label>
                            <input class="form-control" name="admin_mname" id="admin_mname" type="text" placeholder="Middle Name" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input class="form-control" name="admin_lname" id="admin_lname" type="text" placeholder="Surname" required>
                        </div>
                        <div class="form-group">
                            <label>Username (e-mail):</label>
                            <input class="form-control" name="username" id="username" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <label>COMELEC Position:</label>
                            <input class="form-control" name="comelec_position" id="comelec_position" type="text" placeholder="COMELEC Position" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Admin Position:</label>
                            <select class="form-control" name="admin_position" id="admin_position" required>
                                <option><\choose></option>
                                <option>Admin</option>
                                <option>Head Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="conpassword" id="conpassword" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success" name="updateData" id="go"><span class="fa fa-check-circle"></span> Update Account</button>
                        <button type="button" class="btn btn-default" id="cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
    <!--######################################################################################################################################################################################-->
    <!-- DELETE MODAL -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <form action="backFun_delAccnts_v0_1.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="Delete_ID" id="Delete_ID">
                        <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Are you sure you want to delete this account?</div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success" name="yes_delete" id="continue"><span class="fa fa-check-circle"></span> Yes</button>
                        <button type="button" class="btn btn-default" id="no" data-dismiss="modal"><span class="fa fa-times-circle"></span> No</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

    <!-- DATATABLES JAVASCRIPT -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
            $("[data-toggle=tooltip]").tooltip();
        });
    </script>

    <!-- DELETE SCRIPT -->
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#Delete_ID').val(data[1]);

            });
        });
    </script>

    <!-- EDIT and UPDATE SCRIPT -->
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[1]);
                $('#admin_fname').val(data[2]);
                $('#admin_mname').val(data[3]);
                $('#admin_lname').val(data[4]);
                $('#username').val(data[5]);
                $('#comelec_position').val(data[6]);
                $('#admin_position').val(data[7]);
                $('#password').val(data[8]);
                $('#conpassword').val(data[8]);
            });
        });
    </script>


    <!-- JS FOR CLEARING INPUT IN TEXT FIELDS -->
    <script>
        $('#otp').on('hidden.bs.modal', function(e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
        })
    </script>

    <!-- CONFIRM PASSWORD -->
    <script>
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=conpassword]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>

</body>

</html>

<?php

}else{
    // session issue, after add/edit/delete, logout after lol 
    // status: fixed and applied 05/01/2021 9:53pm
    header("Location: AdminLogin.php");
    exit();
}
 ?> 
