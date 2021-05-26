<?php // SESSION ISSUE, details at last part
session_start();
include('db_conn.php');
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
        <link rel="stylesheet" href="../css/admin_css/bootstrap_addAdmin.css">
        <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_addAdmin.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">

        <script src="../js/jquery-1.11.1.min_addAdmin.js"></script>
        <script src="../js/jquery.dataTables.min_addAdmin.js"></script>
        <script src="../js/dataTables.bootstrap_addAdmin.js"></script>
        <script src="../js/popper.min_addAdmin.js"></script>
        <script src="../js/bootstrap.min_addAdmin.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="../js/a076d05399_addAdmin.js"></script>
        <script type="text/javascript" src="../js/admin_session_timer.js"></script>

        <!--additional scripts-->
        <!-- <script src="../js/bootstrap-show-password.min_addAdmin.js"></script> -->

        <!--for upload photo crop-->
        <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js">
        <script src="../js/cropper.js"></script>

        <title>Admin Account Management | BUCEILS HS Online Voting System</title>
    </head>

    <!-- navigation, footer, log sessions -->
    <?php include "navAdmin.php" ?>

    <style type="text/css">

    </style>

    <body>
        <div class="cheader" id="Dheader">
            <h3 class="Dheader-txt">ADMINISTRATOR ACCOUNT MANAGEMENT</h3>
        </div>
        <div class="container">
            <section>
                <div class="flex-container">
                    <button name="AddAccountButton" class="btn btn-button2" data-title="add" data-toggle="modal" data-target="#add" title="Add New Account" <?php if ($_SESSION['admin_position'] == "Admin") { ?> disabled <?php                                                                                                                                                                                        } ?>>
                        <span class="fa fa-user-plus"></span> ADD ACCOUNT</span></button>
                </div>
                <?php //echo("{$_SESSION['admin_position']}") 
                ?>
            </section>
            <!--######################################################################################################################################################################################-->
            <!-- TABLE -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table-center" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th class="min-mobile" id="tablehead">NO.</th>
                                    <th style="display:none;"></th>
                                    <th class="min-mobile">FIRST NAME</th>
                                    <th class="min-mobile">MIDDLE NAME</th>
                                    <th class="min-mobile">LAST NAME</th>
                                    <th class="min-mobile">USERNAME</th>
                                    <th class="min-mobile">COMELEC POSITION</th>
                                    <th class="min-mobile">ADMIN POSITION</th>
                                    <th class="min-mobile">ACTION</th>
                                    <!-- <th style="display:none;"></th>
                                    <th style="display:none;"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Create connection
                                include 'db_conn.php';

                                $query = "SELECT * FROM admin";
                                $query_run = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_array($query_run)) { #START FETCHING OF RECORDS FROM DATABASE
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
                                        <!-- <td style="display:none;"></td> -->
                                        <!-- <td style="display:none;"></td> -->
                                        <td style="white-space: nowrap;">
                                            <button class="btn btn-primary btn-xs editbtn" data-title="Edit" name="editinfo" data-toggle="modal" data-target="#edit" data-placement="top" data-toggle="tooltip" title="Edit" <?php if ($_SESSION['admin_position'] == "Admin") {
                                                                                                                                                                                                                                ?> disabled <?php
                                                                                                                                                                                                                                        } ?>>
                                                <span class="fa fa-edit"></span> EDIT</button>
                                            <button class="btn btn-danger btn-xs deletebtn" data-title="Delete" data-toggle="modal" data-target="#delete" title="Delete" <?php if ($_SESSION['admin_position'] == "Admin") {
                                                                                                                                                                            ?> disabled <?php
                                                                                                                                                                                    } ?>><span class="fa fa-trash"></span> DELETE</button>
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
        <div class="modal fade" id="add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">Add Admin Account</h4>
                    </div>

                    <form id="add_form" action="backAdmin/backFun_adAccnts_v0_1.php" autocomplete="off" method="POST">
                        <div class="modal-body scroll">
                            <textarea style="display:none;" name="base64" id="base64"></textarea>
                            <div class="form-group">
                                <input class="form-control" name="admin_fname" type="text" placeholder="Firstname" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="admin_mname" type="text" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="admin_lname" type="text" placeholder="Surname" required>
                            </div>

                            <div class="form-group">
                                <input class="form-control" name="username" type="text" placeholder="Username : e.g surname_Comelec" required>
                            </div>
                            <div class="form-group">
                                <label for="sel2">Comelec Position:</label>
                                <select class="form-control" name="comelec_position" id="sel2" required>
                                    <option value="" disabled selected>
                                        <\choose>
                                    </option>
                                    <option>Adviser</option>
                                    <option>Chairperson</option>
                                    <option>Co-Chairperson</option>
                                    <option>Board Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Admin Position:</label>
                                <select class="form-control" name="admin_position" id="sel1" required>
                                    <option value="" disabled selected>
                                        <\choose>
                                    </option>
                                    <option>Admin</option>
                                    <option>Head Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <div class="input-group">
                                    <input id="password_main" type="password" name="password" class="form-control left-border-none" onInput="CheckStrength()" placeholder="*********" onChange="onChange()" required>
                                    <span class="input-group-addon transparent">
                                        <i toggle="#password-field" class='fa fa-fw fa-eye toggle-password' aria-hidden='true'></i>
                                    </span>
                                </div>
                                <div class="indicator">
                                    <span class="weak"></span>
                                    <span class="medium"></span>
                                    <span class="strong"></span>
                                </div>
                                <div class="text"></div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <!-- <input type="password" name="conpassword" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required> -->
                                <div class="input-group">
                                    <input id="conpassword_main" type="password" name="conpassword" class="form-control left-border-none" placeholder="*********" onChange="onChange()" required>
                                    <span class="input-group-addon transparent">
                                        <i toggle="#password-field" class='fa fa-fw fa-eye toggle-password-confirm' aria-hidden='true'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="container upload">
                                <label for="photo" width="70%">Upload photo</label><br />
                                <input type="file" name="image" id="my_image" required><br />
                                <span id="admin_newupload_errorloc" class="error"></span>
                            </div>
                            <div class="modal-footer ">
                                <button type="submit" name="saveAccount" class="btn btn-button6"><span class="fa fa-check-circle"></span> Save Account</button>
                                <button id="cancel_add" type="button" class="btn btn-cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
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
        <form action="./backAdmin/backFun_editAccnts_v0_1.php" autocomplete="off" method="POST">
            <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <textarea style="display:none;" name="base64_edit" id="base64_edit"></textarea>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title custom_align" id="Heading">Edit Admin Information</h4>
                        </div>
                        <div class="modal-body scroll">
                            <input type="hidden" name="update_id" id="update_id">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input class="form-control" name="admin_fname" id="admin_fname" type="text" placeholder="Firstname" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name:</label>
                                <input class="form-control" name="admin_mname" id="admin_mname" type="text" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input class="form-control" name="admin_lname" id="admin_lname" type="text" placeholder="Surname" required>
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <input class="form-control" name="username" id="username" type="text" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group">
                                <label for="sel2">Comelec Position:</label>
                                <select class="form-control" name="comelec_position" id="comelec_position" required>
                                    <option value="" disabled selected>
                                        <\choose>
                                    </option>
                                    <option>Adviser</option>
                                    <option>Chairperson</option>
                                    <option>Co-Chairperson</option>
                                    <option>Board Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Admin Position:</label>
                                <select class="form-control" name="admin_position" id="admin_position" required>
                                    <option value="" disabled selected>
                                        <\choose>
                                    </option>
                                    <option>Admin</option>
                                    <option>Head Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <div class="input-group">
                                    <input id="password_edit" type="password" name="password" class="form-control left-border-none" onInput="CheckStrength_edit()" placeholder="*********">
                                    <span class="input-group-addon transparent">
                                        <i toggle="#password-field" class='fa fa-fw fa-eye toggle-password' aria-hidden='true'></i>
                                    </span>
                                </div>
                                <div class="indicator_edit">
                                    <span class="weak_edit"></span>
                                    <span class="medium_edit"></span>
                                    <span class="strong_edit"></span>
                                </div>
                                <div class="text_edit"></div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <!-- <input type="password" name="conpassword" id="conpassword_edit" class="form-control" data-toggle="password" placeholder="*********"> -->
                                <div class="input-group">
                                    <input id="conpassword_edit" type="password" name="conpassword" class="form-control left-border-none" placeholder="*********">
                                    <span class="input-group-addon transparent">
                                        <i toggle="#password-field" class='fa fa-fw fa-eye toggle-password-confirm' aria-hidden='true'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="container upload">
                                <label for="photo" width="70%">Upload photo</label><br />
                                <input type="file" name="my_image_edit" id="my_image_edit"><br />
                                <span id="admin_newupload_errorloc" class="error"></span>
                            </div>
                            <div class="modal-footer ">
                                <button type="submit" class="btn btn-button6" name="updateData" id="go"><span class="fa fa-check-circle"></span> Update Account</button>
                                <button class="btn btn-cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                            </div>
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
                    <form action="./backAdmin/backFun_delAccnts_v0_1.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="Delete_ID" id="Delete_ID">
                            <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Are you sure you want to delete this account?</div>
                            <div class="modal-footer ">
                                <button type="submit" class="btn btn-success" name="yes_delete" id="continue"><span class="fa fa-check-circle"></span> Yes</button>
                                <button type="button" class="btn btn-default" id="cancel" data-dismiss="modal"><span class="fa fa-times-circle"></span> No</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--######################################################################################################################################################################################-->
        <!-- CROP MODAL -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body scroll">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="imagine" />
                                </div>
                                <div class="col-md-4">
                                    <div class="prev"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop" class="btn btn-button6">Crop</button>
                            <button class="btn btn-cancelcrop" data-dismiss="modal" id="cancel_crop"><span class="fa fa-times-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--######################################################################################################################################################################################-->
        <!-- CROP MODAL FOR EDIT -->
        <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body scroll">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="imagine_edit" />
                                </div>
                                <div class="col-md-4">
                                    <div class="prev_edit"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop_edit" class="btn btn-button6">Crop</button>
                            <button class="btn btn-cancelcrop" data-dismiss="modal" id="cancel_crop_edit"><span class="fa fa-times-circle"></span> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

        <!-- DATATABLES JAVASCRIPT -->
        <!-- <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ]
                });
                $("[data-toggle=tooltip]").tooltip();
            });
        </script> -->

        <!-- <script>
            $(document).ready(function() {
                $('#form').on('input change', function() {
                    $('#checkout').attr('disabled', false);
                });
            })
        </script> -->

        <script>
            $(document).on('click', '.toggle-password', function() {

                $(this).toggleClass("fa-eye fa-eye-slash");

                var input = $("#password_main");
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')

                var input_edit = $("#password_edit");
                input_edit.attr('type') === 'password' ? input_edit.attr('type', 'text') : input_edit.attr('type', 'password')
            });

            $(document).on('click', '.toggle-password-confirm', function() {

                $(this).toggleClass("fa-eye fa-eye-slash");

                var input = $("#conpassword_main");
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')

                var input_edit = $("#conpassword_edit");
                input_edit.attr('type') === 'password' ? input_edit.attr('type', 'text') : input_edit.attr('type', 'password')
            });
        </script>

        <script>
            $(document).ready(function() {
                var t = $('#datatable').DataTable({
                    "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    }],
                    "order": [
                        [1, 'asc']
                    ],
                    "lengthMenu": [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, "All"]
                    ]
                });

                t.on('order.dt search.dt', function() {
                    t.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
                $("[data-toggle=tooltip]").tooltip();
            });
        </script>

        <!-- DELETE SCRIPT -->
        <script>
            $(document).ready(function() {
                $('#datatable').on('click', '.deletebtn', function() {

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
                $('#datatable').on('click', '.editbtn', function() {

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
                    // $('#base64_edit').val(data[9]);
                });
            });
        </script>


        <!-- JS FOR CLEARING INPUT IN TEXT FIELDS -->
        <script>
            $('#add').on('hidden.bs.modal', function(e) {
                $(this)
                    .find("input,textarea,select")
                    .val('')
                    .end()
                    .find("input[type=checkbox], input[type=radio]")
                    .prop("checked", "")
                    .end();

            })
            $('#edit').on('hidden.bs.modal', function(e) {
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

        <script>
            var password = document.getElementById("password_edit"),
                confirm_password = document.getElementById("conpassword_edit");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>

        <script>
            function CheckStrength() {
                var modal = $('#add')
                const indicator = document.querySelector(".indicator");
                const input = document.getElementById("password_main");
                const weak = document.querySelector(".weak");
                const medium = document.querySelector(".medium");
                const strong = document.querySelector(".strong");
                const text = document.querySelector(".text");

                let regExpWeak = /[a-zA-Z]/;
                let regExpMedium = /\d+/;
                let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

                if (input.value != "") {
                    indicator.style.display = "block";
                    indicator.style.display = "flex";
                    if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
                    if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
                    if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;
                    if (no == 1) {
                        weak.classList.add("active");
                        text.style.display = "block";
                        text.textContent = "Your password is too weak";
                        text.classList.add("weak");
                        input.setCustomValidity("Please change your password. Hint: The password should be at least 6 characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like !.\"?$%^&/.");
                    }
                    if (no == 2) {
                        medium.classList.add("active");
                        text.textContent = "Your password is medium";
                        text.classList.add("medium");
                        input.setCustomValidity('');
                    } else {
                        medium.classList.remove("active");
                        text.classList.remove("medium");
                    }
                    if (no == 3) {
                        weak.classList.add("active");
                        medium.classList.add("active");
                        strong.classList.add("active");
                        text.textContent = "Your password is strong";
                        text.classList.add("strong");
                        input.setCustomValidity('');
                    } else {
                        strong.classList.remove("active");
                        text.classList.remove("strong");
                    }
                } else {
                    indicator.style.display = "none";
                    text.style.display = "none";
                    input.setCustomValidity('');
                }
                modal.on('hidden.bs.modal', function() {
                    indicator.style.display = "none";
                    text.style.display = "none";
                });
            }

            function CheckStrength_edit() {
                var modal = $('#edit')
                const indicator = document.querySelector(".indicator_edit");
                const input = document.getElementById("password_edit");
                const weak = document.querySelector(".weak_edit");
                const medium = document.querySelector(".medium_edit");
                const strong = document.querySelector(".strong_edit");
                const text = document.querySelector(".text_edit");

                let regExpWeak = /[a-zA-Z]/;
                let regExpMedium = /\d+/;
                let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;

                if (input.value != "") {
                    indicator.style.display = "block";
                    indicator.style.display = "flex";
                    if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
                    if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
                    if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;
                    if (no == 1 && input.value.length != 0) {
                        weak.classList.add("active");
                        text.style.display = "block";
                        text.textContent = "Your password is too weak";
                        text.classList.add("weak");
                        input.setCustomValidity("Please change your password. Hint: The password should be at least 6 characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like !.\"?$%^&/.");
                    }
                    if (no == 2) {
                        medium.classList.add("active");
                        text.textContent = "Your password is medium";
                        text.classList.add("medium");
                        input.setCustomValidity('');
                    } else {
                        medium.classList.remove("active");
                        text.classList.remove("medium");
                    }
                    if (no == 3) {
                        weak.classList.add("active");
                        medium.classList.add("active");
                        strong.classList.add("active");
                        text.textContent = "Your password is strong";
                        text.classList.add("strong");
                        input.setCustomValidity('');
                    } else {
                        strong.classList.remove("active");
                        text.classList.remove("strong");
                    }
                    // showBtn.style.display = "block";
                    // showBtn.onclick = function() {
                    //     if (input.type == "password") {
                    //         input.type = "text";
                    //         showBtn.textContent = "HIDE";
                    //         showBtn.style.color = "#23ad5c";
                    //     } else {
                    //         input.type = "password";
                    //         showBtn.textContent = "SHOW";
                    //         showBtn.style.color = "#000";
                    //     }
                    // }
                } else {
                    indicator.style.display = "none";
                    text.style.display = "none";
                    input.setCustomValidity('');
                }
                modal.on('hidden.bs.modal', function() {
                    indicator.style.display = "none";
                    text.style.display = "none";
                });
            }
        </script>

        <!-- CROP BEFORE UPLOAD FOR ADD-->
        <script>
            (function() {
                var bs_modal = $('#modal');
                var image = document.getElementById('imagine');
                var cropper, reader, file;

                $("body").on("change", "#my_image", function(e) {
                    filesize = this.files[0].size / 1024 / 1024; //mb 
                    maxsize = 1; //mb
                    if (maxsize < filesize) {
                        alert("Cannot upload picture higher than 1mb.");
                        return;
                    }
                    var fileExtension = ['jpeg', 'jpg', 'png'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Formats allowed : " + fileExtension.join(', '));
                        return;
                    }
                    if (image != null) {
                        var files = e.target.files;
                        var done = function(url) {
                            image.src = url;
                            bs_modal.modal('show');
                        };
                        if (files && files.length > 0) {
                            file = files[0];

                            if (URL) {
                                done(URL.createObjectURL(file));
                            } else if (FileReader) {
                                reader = new FileReader();
                                reader.onload = function(e) {
                                    done(reader.result);
                                };
                                reader.readAsDataURL(file);
                            }
                        }
                    }
                    return;
                });
                bs_modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 0,
                        preview: '.prev'
                    });
                }).on('hidden.bs.modal', function() {
                    $(".image").val('');
                    cropper.destroy();
                    cropper = null;
                });
                $('#cancel_crop').click('hide.bs.modal', function() {
                    $('#my_image').val('')
                });
                $("#crop").click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 160,
                        height: 160,
                    });
                    console.log(canvas);

                    canvas.toBlob(function(blob) {
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            $("#base64").val(base64data);
                        };
                    });
                    bs_modal.modal('hide');
                });
            })();
        </script>

        <!-- CROP BEFORE UPLOAD FOR EDIT-->
        <script>
            (function() {
                var bs_modal = $('#modal_edit');
                var image = document.getElementById('imagine_edit');
                var cropper, reader, file;

                $("body").on("change", "#my_image_edit", function(e) {
                    filesize = this.files[0].size / 1024 / 1024; //mb 
                    maxsize = 1; //mb
                    if (maxsize < filesize) {
                        alert("Cannot upload picture higher than 1mb.");
                        return;
                    }
                    var fileExtension = ['jpeg', 'jpg', 'png'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Formats allowed : " + fileExtension.join(', '));
                        return;
                    }
                    if (image != null) {
                        var files = e.target.files;
                        var done = function(url) {
                            image.src = url;
                            bs_modal.modal('show');
                        };
                        if (files && files.length > 0) {
                            file = files[0];

                            if (URL) {
                                done(URL.createObjectURL(file));
                            } else if (FileReader) {
                                reader = new FileReader();
                                reader.onload = function(e) {
                                    done(reader.result);
                                };
                                reader.readAsDataURL(file);
                            }
                        }
                    }
                    return;
                });
                bs_modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 0,
                        preview: '.prev_edit'
                    });
                }).on('hidden.bs.modal', function() {
                    $(".image").val('');
                    cropper.destroy();
                    cropper = null;
                });
                $('#cancel_crop_edit').click('hide.bs.modal', function() {
                    $('#my_image_edit').val('')
                });
                $("#crop_edit").click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 160,
                        height: 160,
                    });
                    console.log(canvas);

                    canvas.toBlob(function(blob) {
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            $("#base64_edit").val(base64data);
                        };
                    });
                    bs_modal.modal('hide');
                });
            })();
        </script>
    </body>

    </html>

<?php

} else {
    // session issue, after add/edit/delete, logout after lol 
    // status: fixed and applied 05/01/2021 9:53pm
    header("Location: AdminLogin.php");
    exit();
}
?>