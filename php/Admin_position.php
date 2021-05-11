<!-- Proj mngr notes
- changed db_conn
- add navigation bar

Need:
- load default
- add pop up confirmation

-->

<!DOCTYPE html>
<?php
include "db_conn.php";
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    $idletime = 900; //after 15 minutes the user gets logged out

    if (time() - $_SESSION['timestamp'] > $idletime) {
        $_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
        header("Location: AdminLogout.php");
    } else {
        $_SESSION['timestamp'] = time();
    }
} else {
    header("Location: AdminLogin.php");
    exit();
}

include "navAdmin.php";

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/admin_Pos.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_Pos.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_Pos.css">

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- datatable scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="../js/jQuery.dataTables.min_Pos.js"></script> -->
    <script src="../js/bootstrap.min_Pos.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>

    <title>BUCEILS Voting System</title>
    <script>
        $(document).ready(function() {
            reloadTable();

            function reloadTable() {
                $.ajax({
                    url: 'backCandidate/tablePosition.php',
                    success: function(response) {
                        $("tbody").html(response);
                    }
                });
            }
            //editing the position
            $(document).on("click", "#updateButton", function() {
                var posid = $("#pid").attr("posid");
                var hid = $.trim($("#heirarchy_id").val());
                var posname = $.trim($("#position_name").val());
                var posdes = $.trim($("#position_description").val());

                if (hid == "" || posname == "" || posdes == "") { //no input in one or more fields
                    alert("Please dont leave any fields blank.");
                } else {
                    if (posid == "") { //if you are adding a position
                        var temp = true;
                        $.ajax({
                            url: 'backCandidate/addPosition.php',
                            method: 'post',
                            data: {
                                addbtn: temp,
                                heirarchy: hid,
                                positionname: posname,
                                positiondes: posdes
                            },
                            success: function(response) {
                                if (response != "") {
                                    alert(response);
                                }
                                formClear();
                                reloadTable();
                            }
                        });
                    } else { //if you are editing a position
                        $.ajax({
                            url: 'backCandidate/addPosition.php',
                            method: 'post',
                            data: {
                                id: posid,
                                heirarchy: hid,
                                positionname: posname,
                                positiondes: posdes
                            },
                            success: function(response) {
                                $(document).html(response);
                                formClear();
                                reloadTable();
                            }
                        });
                    }
                }
            });
            //vote allow toggle 
            $(document).on("click", ".vote_allow", function() {
                var position_id = $(this).closest('tr').attr("posid");
                $.ajax({
                    url: './backCandidate/allow.php',
                    method: 'post',
                    data: {
                        voteallow: position_id
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
            $(document).on("click", "#continue-load", function() {
                var temp = true;
                $("#load").modal("show");
                $.ajax({
                    url: './backCandidate/loadDefault.php',
                    method: 'post',
                    data: {
                        btnclicked: temp
                    },
                    success: function(response) {
                        console.log(response);
                        alert(response);
                        reloadTable();
                    }
                });
            });

        });
        //edit
    </script>
</head>

<body>

    <!-- The sidetable -->
    <div class="Uheader" id="CM_Header">
        <h2 class="Uheader-txt">Candidate Information Management</h2>
    </div>
    <div class="btn-toolbar" style="margin-left: 18px;">
        <button type="submit" id="defaultButton" name="" class="btn btn-button1 btn-s" data-toggle="modal" data-target="#load">Load Default Positions</button>
    </div>
    <form autocomplete="off">
        <div class="wrapper">
            <div class="left">
                <div class="center" id="CPTable2">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Add or Edit Position
                            </div>
                            <!-- Heirarchy ID Form group-->
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="heirarchy_id" class= "label_panel">
                                        Hierarchy ID
                                    </label>
                                    <div id="pid" posid=""></div>
                                    <input type="text" class="form-control" placeholder="Hierarchy ID" id="heirarchy_id" name="heirarchy">

                                </div>
                                <!--Heirarchy ID From group-->
                                <div class="form-group">
                                    <label for="position_name" class = "label_panel">
                                        Position Name
                                    </label>
                                    <input type="text" name="positionname" class="form-control" placeholder="Position Name" id="position_name">
                                </div>
                                <div class="form-group">
                                    <label for="position_description" class = "label_panel">
                                        Position Description
                                    </label>
                                    <input type="text" class="form-control" placeholder="Position Description" id="position_description" name="positiondes">
    </form>
    </div>
    <button type="button" id="updateButton" class="btn btn-button1 btn-s">
        + Add
    </button>


    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="right">
        <!--Added container and row to accomodate table responsiveness-->
        <div class="container">
            <div class="row">
                <div class="center" id=CPTable>
                    <div class="col-md-12">
                        <div class="table-responsive table-body">
                            <table class="center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                                <thead>
                                    <tr>
                                        <th class="text-center">Hierarchy ID</th>
                                        <th class="text-center">Position</th>
                                        <th class="padThisCell">Description</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Allow All</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- data enters here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="load" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading-load">Load Default Positions</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="loadD"><span class="fa fa-exclamation-triangle"></span>Are you sure you want to delete existing positions and replace it with the system default?</div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" name="continue-delete-btn" class="btn btn-success" id="continue-load"><span class="fa fa-check-circle"></span>Continue</button>
                    <button type="button" name="cancel-delete-btn" class="btn btn-default" id="cancel-load" data-dismiss="modal"><span class="fa fa-times-circle"></span>Cancel</button>
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
                    <h4 class="modal-title custom_align" id="Heading-delete">Delete Position</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="deleteD"><span class="fa fa-exclamation-triangle"></span></div>
                </div>
                <div class="modal-footer ">
                    <form method="post" id="delete-form">
                        <button type="submit" name="continue-delete-btn" class="btn btn-success" id="continue-delete"><span class="fa fa-check-circle"></span>Continue</button>
                        <button type="button" name="cancel-delete-btn" class="btn btn-default" id="cancel" data-dismiss="modal"><span class="fa fa-times-circle"></span>Cancel</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    Start of form panel scripts
    <script>
        // Current product being edited
        var editRow = null;

        function positionDisplay(ctl) {
            document.getElementById("heirarchy_id").disabled = true; /*Disables Heirarchy ID input field when editing*/
            editRow = $(ctl).parents("tr");
            var cols = editRow.children("td");
            var pid = editRow.attr("posid");

            $("#pid").attr("posid", pid);
            $("#heirarchy_id").val($(cols[0]).text());
            $("#position_name").val($(cols[1]).text());
            $("#position_description").val($(cols[2]).text());

            // Change Update Button Text
            $("#updateButton").text("Update");
        }

        function deleteRow(row) {
            editRow = $(row).parents("tr");
            var cols = editRow.children("td");
            var pid = editRow.attr("posid");
            $("#Heading-delete").text("Delete Position");
            var deletemess = "Are you sure you want to DELETE position: " + $(cols[1]).text() + " with heirarchy_id: " + $(cols[0]).text();
            $("#deleteD").text(deletemess);

            $("#delete-form").submit(function() {
                $("#delete").modal("hide");
                $.ajax({
                    url: 'backCandidate/deletePosition.php',
                    method: 'post',
                    data: {
                        delete: pid
                    },
                    success: function(response) {
                        if (response != "") {
                            alert(response);
                        }
                        reloadTable();
                    }
                });
            });
        }

        function reloadTable() {
            $.ajax({
                url: 'backCandidate/tablePosition.php',
                success: function(response) {
                    $("tbody").html(response);
                }
            });
        }


        //     function positionUpdate() {
        //       if ($("#updateButton").text() == "Update") {
        //         positionUpdateInTable();
        //         document.getElementById("heirarchy_id").disabled = false; /*Re-enables position input field after*/
        //       }                                                           /*so admins can continue adding*/
        //       else {
        //         positionAddToTable();
        //       }

        //       // Clear form fields
        //       formClear();

        //       // Focus to product name field
        //       $("#position_name").focus();
        //             $("#position_description").focus();
        //     }

        //     // Add product to <table>
        //     function positionAddToTable() {
        //       // First check if a <tbody> tag exists, add one if not
        //       if ($("#datatable tbody").length == 0) {
        //         $("#datatable").append("<tbody></tbody>");
        //       }

        //       // Append product to table
        //       $("#datatable tbody").append(
        //         positionBuildTableRow());
        //     }

        //     // Update product in <table>
        //     function positionUpdateInTable() {
        //       // Add changed product to table
        //       $(editRow).after(positionBuildTableRow());

        //       // Remove original product
        //       $(editRow).remove();

        //       // Clear form fields
        //       formClear();

        //       // Change Update Button Text
        //       $("#updateButton").text("Add");
        //     }

        //     // Build a <table> row of Product data
        //     function positionBuildTableRow() {
        //       var ret =
        //       "<tr>" +
        //         "<td>" + $("#heirarchy_id").val() + "</td>" + /*Just change to proper database name*/
        //         "<td>" + $("#position_name").val() + "</td>" +
        //         "<td class = 'padThisCell'>" + $("#position_description").val() + "</td>" +

        //         "<td>"  +
        //           "<button type='button' " +
        //                   "onclick='positionDisplay(this);' " + 'positionDisplay is for editing"
        //                   "class='btn btn-primary btn-xs'>" +
        //                   "EDIT" +
        //           "</button>" +
        //           "</td>"+

        //           "<td>"+
        //           "<button type='button' " +
        //                   "onclick='positionDelete(this);' " +
        //                   "class='btn btn-danger btn-xs'>" +
        //                    "DELETE"+
        //                    "</button>"+
        //                    "</td>" 
        //       "</tr>"
        //       return ret;
        //     }

        //     // Delete product from <table>
        //     function positionDelete(ctl) {
        //       $(ctl).parents("tr").remove();
        //     }
        //     //saving data from data table to database
        //     function saveToDatabase(){
        //      $(document).ready(function() {
        // 	$('#butsave').on('click', function() {
        // 		var positionname = $('#position_name').val();
        // 		var position_description = $('#position_description').val();
        // 		if(position_name!="" && position_description!=""){
        // 			$.ajax({
        // 				url: "./backCandidate/save.php",
        // 				type: "POST",
        // 				data: {
        // 					position_name: position_name,
        // 					position_description: position_description,
        // 				},
        // 				cache: false,
        // 				success: function(dataResult){
        // 					var dataResult = JSON.parse(dataResult);
        // 					if(dataResult.statusCode==200){
        // 						$("#butsave").removeAttr("disabled");
        // 						$('#fupForm').find('input:text').val('');
        // 						$("#success").show();
        // 						$('#success').html('Data added successfully !');
        // 						alert("Data added successfully !");
        // 					}
        // 					else if(dataResult.statusCode==201){
        // 					   alert("Error occured !");
        // 					}

        // 				}
        // 			});
        // 		}
        // 		else{
        // 			alert('Please fill all the field !');
        // 		}
        // 	});
        // });
        //     }
        //     // Clear form fields
        function formClear() {
            document.getElementById("heirarchy_id").disabled = false;
            $("#pid").attr("posid", "");
            $("#heirarchy_id").val("");
            $("#position_name").val("");
            $("#position_description").val("");
        }

    /*<!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->*/


        $('.icon').click(function() {
            $('span').toggleClass("cancel");
        });

        /**Added this move to edit/add panel function for mobile QoL**/
        $("button").click(function() {
                    $('html,body').animate({
                            scrollTop: $(".left").offset().top
                        },
                        'slow');
        });
    </script>

</body>

</html>
<?php

?>
