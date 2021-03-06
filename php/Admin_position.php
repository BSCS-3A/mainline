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

    $sqlDate = "SELECT * FROM `vote_event`";
    $resultDate = mysqli_query($conn,$sqlDate);
    $rowDate = mysqli_fetch_assoc($resultDate);


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

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- datatable scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="../js/jQuery.dataTables.min_Pos.js"></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>BUCEILS Voting System</title>
    <script>
        $(document).ready(function() {
            reloadTable();
            var startDate,endDate,today;
            <?php
                if(!(empty($rowDate['start_date']))){
                    echo "startDate = new Date('". $rowDate['start_date']."').getTime();";
                    echo "endDate = new Date('". $rowDate['end_date']."').getTime();";
                }else{
                    echo "startDate = 0;";
                    echo "endDate = 0;";
                }
            ?>
            today = new Date().getTime();
            function reloadTable() {       
                $.ajax({    
                    url: 'backCandidate/tablePosition.php',
                    success: function(response) {
                        $("tbody").html(response);
                        if(startDate != 0 && endDate != 0){
                            if((today>=startDate) && (today<=endDate)){//if election is on going 
                                alert("Election is ongoing. Please proceed with caution. Any changes done during the election may affect the results.");
                                $("#add_button").attr("disabled",true);
                                $('#icon_add').removeClass('.fas fa-plus');
                                $('#icon_add').addClass('.fa fa-lock');
                                $(".btn-danger").attr("disabled",true);
                                $(".vote_allow").attr("disabled",true);
                                $("#defaultButton").attr("disabled",true);
                                $("#iconLoad").removeClass(".fas fa-portrait");
                                $("#iconLoad").addClass("fa fa-lock");
                            }
                        }             
                    }
                });
            }
            //adding the position
            $("#addForm").submit(function(e) {
                e.preventDefault();
                $("#add").modal("hide");
                var temp = true;
                var hid = $.trim($("#add_Hid").val());
                var posname = $.trim($("#add_Pos").val());
                var posdes = $.trim($("#add_Desc").val());

                if (hid == "" || posname == "" || posdes == "") { //no input in one or more fields
                    alert("Please dont leave any fields blank.");
                } else {
                    $.ajax({
                        url:"backCandidate/addPosition.php",
                        method:"post",
                        data:{
                            addbtn: temp,
                            heirarchy: hid,
                            positionname: posname,
                            positiondes: posdes
                        },
                        success:function(response) {
                            if (response != "") {
                               alert(response);
                            }else{
                                formClear();
                                reloadTable();
                            }
                        }
                    });
                }
            });
            //editing the position
            $("#editForm").submit(function(e) {
                e.preventDefault();
                $("#edit").modal("hide");
                var temp = true;
                var posid = $("#positionId").attr("posid");
                var hid = $.trim($("#edit_Hid").val());
                var posname = $.trim($("#edit_Pos").val());
                var posdes = $.trim($("#edit_Desc").val());

                $.ajax({
                  url: 'backCandidate/checkPosition.php',
                  method: 'post',
                  data: {check: temp, positionid: posid, checkhid: hid},
                  success:function(response){
                    console.log(response);
                    console.log(posid+" "+hid+" "+posname+" ");
                    if(response == "Exists"){
                        $.ajax({
                          url:"backCandidate/addPosition.php",
                          method:"post",
                          data:{
                            id:posid,
                            positionname: posname,
                            positiondes: posdes
                          },
                          success:function(response) {
                            if (response != "") {
                               alert(response);
                            }
                              reloadTable();
                              formClear();
                          }
                        });
                    }
                    else if(response == "Not_exist"){
                        alert("Position does not exist");
                        reloadTable();
                        formClear();
                    }
                    else{
                        console.log(response);
                    }
                  }
                });
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
                        $("#load").modal("hide");
                        console.log(response);
                        alert(response);
                        reloadTable();
                    }
                });
            });
            

        });
        //edit
                $(function () {
                 $('[data-toggle="tooltip"]').tooltip()
                })
    </script>
</head>

<body>

    <!-- The sidetable -->
    <div class="Uheader" id="CM_Header">
        <h2 class="Uheader-txt">Candidate Information Management</h2>
    </div>
        
    <div class="right">
        <!--Added container and row to accomodate table responsiveness-->
        <div class="container">
            <div class="btn-toolbar" style="margin-left: 18px;">
                <button id="defaultButton" name="" class="btn btn-button1 btn-s" data-toggle="modal" data-target="#load" > 
                <span class = "fas fa-portrait" id="iconLoad"></span> 
                Load Default Positions 
                </button>

        <button id="add_button" class="btn btn-button1 btn-s" data-toggle="modal" data-target="#add" title="Add" data-placement="top"> 
            <span class = "fas fa-plus" id = "icon_add"></span>
            Add Position 
        </button>
        </div>

            <div class="row">
                <div class="center" id=CPTable>
                    <div class="col-md-12">
                        <div class="table-responsive table-body">
                            <table class="center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                                <thead>
                                    <tr>
                                      <th class="text-center" data-toggle="tooltip" data-placement="top" data-container="body" title="Hierarchical structure of the Election with 1 being the highest position"><i class="fa fa-info-circle" aria-hidden="true"></i> Hierarchy ID
                                        </th>
                                        <th class="text-center">Position</th>
                                        <th class="padThisCell">Description</th>
                                        <th class="text-center">Manage</th>
                                        <th class="text-center" data-toggle="tooltip" data-placement="top" data-container="body" title=" Turning the slider on enables the position to be included in the voting process"><i class="fa fa-info-circle" aria-hidden="true"></i> Allow All
                                        </th>
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
    <div class="modal fade" id="load" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <button type="submit" name="continue-delete-btn" class="btn btn-button6" id="continue-load"><span class="fa fa-check-circle"></span> Continue</button>
                    <button type="button" name="cancel-delete-btn" class="btn btn-button4" id="cancel-load" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

        <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title custom_align" id="HeadingAdd">Edit Position</h4>
          </div>
          <form autocomplete = "off" method="post" action="backCandidate/addPosition.php" id="editForm">
              <div class="modal-body">
                <div id="positionId" posid=""></div>
                  <div class="form-group">              
                      <input class="form-control" id="edit_Hid" name="edit_Hid" type="text" placeholder="Enter Hierarchy ID" disabled required>
                  </div>
                  <div class="form-group">              
                      <input class="form-control" id="edit_Pos" name="edit_Pos" type="text" placeholder="Enter Position Name" required>
                  </div>
                  <div class = "form-group">
                       <textarea class="form-control" id ="edit_Desc" name="edit_Desc" type="text" placeholder="Enter Position Description" required></textarea>
                  </div>
              </div>
              <div class="modal-footer ">
                  <button type="submit" name="save-btn" class="btn btn-warning btn-lg" id="save-edit" style="width: 100%;"><span class= "fa fa-check-circle"></span> Save</button>
                  <button type="submit" name="cancel-btn" class="btn btn-default" id="cancel-edit" style= "width:100%;" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
              </div>
          </form>
    </div>
</div>
</div>

<div class="modal fade" id="add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title custom_align" id="HeadingAdd">Add New Position</h4>
          </div>
          <form autocomplete = "off" method="post" action="backCandidate/addPosition.php" id="addForm">
              <div class="modal-body">
                  <div class="form-group">              
                      <input class="form-control" id="add_Hid" name="add_Hid" type="text" placeholder="Enter Hierarchy ID" required>
                  </div>
                  <div class="form-group">              
                      <input class="form-control" id="add_Pos" name="add_Pos" type="text" placeholder="Enter Position Name" required>
                  </div>
                  <div class = "form-group">
                       <textarea class="form-control " id ="add_Desc" name="add_Desc" type="text" placeholder="Enter Position Description" required></textarea>
                  </div>
              </div>
              <div class="modal-footer ">
                  <button type="submit" name="save-btn" class="btn btn-warning btn-lg" id="save-add" style="width: 100%;"><span class= "fa fa-check-circle"></span> Save</button>
                  <button type="submit" name="cancel-btn" class="btn btn-default" id="cancel-add" style= "width:100%;" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
              </div>
          </form>
    </div>
</div>
</div>




        <!-- /.modal-dialog -->
    <div class="modal fade" id="delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading-delete">Delete Position</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="deleteD"><span class="fa fa-exclamation-triangle"></span> Are you sure you want to delete this position?</div>
                </div>
                <div class="modal-footer ">
                        <button type="submit" name="continue-delete-btn" class="btn btn-button6" id="continue-delete"><span class="fa fa-check-circle"></span> Continue</button>
                        <button type="button" name="cancel-delete-btn" class="btn btn-button4" id="cancel" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        // Current product being edited
        var editRow = null;

        function positionDisplay(ctl) {
            editRow = $(ctl).parents("tr");
            var cols = editRow.children("td");
            var pid = editRow.attr("posid");

            $("#positionId").attr("posid", pid);
            $("#edit_Hid").val($(cols[0]).text());
            $("#edit_Pos").val($(cols[1]).text());
            $("#edit_Desc").val($(cols[2]).text());
        }

        function deleteRow(row) {
            editRow = $(row).parents("tr");
            var cols = editRow.children("td");
            var pid = editRow.attr("posid");
            $("#Heading-delete").text("Delete Position");
            var deletemess = "Are you sure you want to DELETE position: " + $(cols[1]).text() + " with heirarchy_id: " + $(cols[0]).text();
            $("#deleteD").text(deletemess);

            $("#continue-delete").on("click",function() {
                $("#delete").modal("hide");
                $.ajax({
                    url: 'backCandidate/deletePosition.php',
                    method: 'post',
                    data: {
                        delete: pid
                    },
                    success: function(response) {
                        if (response != "") {
                            console.log(response);
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

        function formClear() {
            $("#positionId").attr("posid", "");
            $("#add_Hid").val("");
            $("#add_Pos").val("");
            $("#add_Desc").val("");
            
            $("#edit_Hid").val("");
            $("#edit_Pos").val("");
            $("#edit_Desc").val("");
        }

        $('.icon').click(function() {
            $('span').toggleClass("cancel");
        });
    </script>

</body>

</html>
<?php

?>
