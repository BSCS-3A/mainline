<!-- 
    proj mngr notes:
    - changed navigation barr
    - changed db_conn
    - change photo fix
    - fix responsiveness table

-->

<!DOCTYPE html>
<?php
    include_once 'db_conn.php';
    session_start();
    if (!(isset($_SESSION['admin_id']) && isset($_SESSION['username']))) {//if not logged in
        header("location:AdminLogin.php");
    }    
    if(isset($_SESSION['student_id']) && isset($_SESSION['bumail'])){//if logged in as student
        header("location:AdminLogin.php");
        //or put a warning page stating that you cannot enter because you are a student
    }
    //if sql finished and done editing candidate deter from going back to page 
    if(isset($_SESSION['message']) && isset($_GET['id'])){
        unset($_SESSION['message']);
        unset($_SESSION['msg_typ']);
        header("location:Admin_candidate.php"); 
    } 
    
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png"> 
    <link rel="stylesheet" type="text/css" href="../css/admin_css/admin_Pos.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_Pos.css"> 
    <link rel="stylesheet" href="../css/admin_css/font-awesome_Pos.css">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@2.0.1/umd/simplebar.css" />
<script src="https://unpkg.com/simplebar@2.0.1/umd/simplebar.js"></script>
     
    <!-- <script src="assets/js/a076d05399.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/dataTables.bootstrap.min_Cand.js"></script>
    <!-- <script src="../js/jquery-3.5.1.js"></script> -->
    <script src="../js/jQuery.dataTables.min_Pos.js"></script>
    <script src="../js/bootstrap.min_Pos.js"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
<script>
          $(document).ready(function(){
            $("#lastnamesearch").keyup(function(){
                var lastname = $(this).val();
                if(lastname != ''){
                    $.ajax({
                        url:'./backPos/lastnamesearch.php',
                        method:'post', 
                        data:{query:lastname},
                        success:function(response){ 
                            $(".lastname-list").html(response);
                            $(".lastname-list").show();
                            console.log(response);
                        }
                    });
                }
                else{
                    $(".lastname-list").html('');
                } 
            });
            $(document).on("click","#l",function(){
                var message = $(this).text();
                var split = message.split("_");
                $("#lastnamesearch").val(split[0]);
                $("#firstnamesearch").val(split[1]); 
                $(".lastname-list").html('');
                $(".firstname-list").html('');
                
            }); 
            $(document).on("click","#f",function(){
                var message = $(this).text();
                var split = message.split("_");
                $("#firstnamesearch").val(split[0]);
                $("#lastnamesearch").val(split[1]); 
                $(".lastname-list").html('');
                $(".firstname-list").html('');
            });
            $("#lastnamesearch").focus(function(){
                $(".lastname-list").show();
                $(".firstname-list").hide();
            }); 
            $("#firstnamesearch").focus(function(){
                $(".lastname-list").hide();
                $(".firstname-list").show();
            });
            
            //when clicked other forms
            $("#etc-add1").focus(function(){
                $(".firstname-list").hide();
                $(".lastname-list").hide();
            });
            $("#etc-add2").focus(function(){
                $(".firstname-list").hide();
                $(".lastname-list").hide(); 
            });
            $("#etc-add3").focus(function(){
                $(".firstname-list").hide();
                $(".lastname-list").hide();  
            });
            $("#etc-edit1").focus(function(){
                $(".edit-firstname-list").hide(); 
                $(".edit-lastname-list").hide();
            });
            $("#etc-edit2").focus(function(){
                $(".edit-firstname-list").hide(); 
                $(".edit-lastname-list").hide();
            });
            $("#etc-edit3").focus(function(){
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide();
            });
            $("#position-add").focus(function(){
                $(".firstname-list").hide();
                $(".lastname-list").hide();
            });
            $("#position-edit").focus(function(){
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide();
            });
        
            
            //remove list when clcicking elsewhere
            $(document).on("click",".modal-header",function(e){
                if(e.target !== this){
                    return;
                }
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide(); 
                $(".firstname-list").hide();
                $(".lastname-list").hide();
            });
            $(document).on("click",".modal-body",function(e){
                if(e.target !== this){
                    return;
                }
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide();
                $(".firstname-list").hide();
                $(".lastname-list").hide(); 
            });
            
            $(document).on("click",".modal-footer",function(e){
                if(e.target !== this){
                    return;
                }
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide();
                $(".firstname-list").hide();
                $(".lastname-list").hide();
            });

            //first name search
            $("#firstnamesearch").keyup(function(){
                var firstname = $(this).val();
                if(firstname != ''){
                    $.ajax({
                        url:'./backPos/firstnamesearch.php',
                        method:'post',
                        data:{query:firstname},
                        success:function(response){
                            $(".firstname-list").html(response);
                            $(".firstname-list").show();
                            console.log(response);
                        }
                    });
                }
                else{
                    $(".firstname-list").html('');
                }
            });
            
//######################################################

            $("#editlastnamesearch").keyup(function(){
                var lastname = $(this).val();
                if(lastname != ''){
                    $.ajax({
                        url:'./backPos/lastnamesearch.php',
                        method:'post',
                        data:{query:lastname},
                        success:function(response){
                            $(".edit-lastname-list").html(response);
                            $(".edit-lastname-list").show();
                            console.log(response);
                        }
                    });
                }
                else{
                    $(".edit-lastname-list").html('');
                }
            });
            
            $("#editfirstnamesearch").keyup(function(){
                var firstname = $(this).val();
                if(firstname != ''){
                    $.ajax({
                        url:'./backPos/firstnamesearch.php',
                        method:'post',
                        data:{query:firstname},
                        success:function(response){
                            $(".edit-firstname-list").html(response);
                            $(".edit-firstname-list").show();
                        }
                    });
                }
                else{
                    $(".edit-firstname-list").html('');
                } 
            });
            $(document).on("click","#l",function(){
                var message = $(this).text();
                var split = message.split("_");
                $("#editlastnamesearch").val(split[0]);
                $("#editfirstnamesearch").val(split[1]); 
                $(".edit-lastname-list").html('');
                $(".edit-firstname-list").html('');
            });
            $(document).on("click","#f",function(){
                var message = $(this).text();
                var split = message.split("_");
                $("#editfirstnamesearch").val(split[0]);
                $("#editlastnamesearch").val(split[1]); 
                $(".edit-lastname-list").html('');
                $(".edit-firstname-list").html('');
            });
             $("#editlastnamesearch").focus(function(){
                $(".edit-lastname-list").show();
                $(".edit-firstname-list").hide();
            });
            $("#editfirstnamesearch").focus(function(){
                $(".edit-firstname-list").show();
                $(".edit-lastname-list").hide();
            });
            $(document).on("click","#noresults",function(){
                $(".edit-firstname-list").hide();
                $(".edit-lastname-list").hide();
                $(".firstname-list").hide();
                $(".lastname-list").hide();
            });
            
        });
    </script>

    <title>BUCEILS Voting System</title>
</head>

<body>

        <!-- navigation bar -->
        <?php include "navAdmin.php"; ?>



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
            <li>
                <label for="btn-3" class="Ashow">CANDIDATES</label>
                <a href="#">CANDIDATES</a>
                <input class="nav-toggle5" type="checkbox" id="btn-3">
                <ul>
                    <li><a href="#">Update Info</a></li>
                    <li><a href="#">Positions</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-4" class="Ashow">LOGS</label>
                <a href="#">LOGS</a>
                <input class="nav-toggle6" type="checkbox" id="btn-4">
                <ul>
                    <li><a href="accessLogs-v2.0.html">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="../IMG/user.png"></a>
                <input class="nav-toggle7" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Admin Name
                    <?php //echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname'];?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="AdminLogout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
       
    </nav> -->
    


    <div class="Uheader" id="CM_Header">
        <h2>Candidate Information Management</h2>
    </div>

    <div class="btn-toolbar" style="margin-left: 18px;">
        <button class="btn btn-button1 btn-s" data-title="Add" data-toggle="modal" data-target="#add" data-placement="top" title="Add"> + Add New Candidate </button>      
    </div>
              <div class="col-md-12">
                  
      <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                          <thead>
                              <tr> 
                                  <th class="text-center">Upload Photo</th>
                                  <th class="text-center">Last Name</th>
                                  <th class="text-center">First Name</th>
                                  <th class="text-center">Position</th>    
                                  <th class="text-center">Partylist</th>   
                                  <th class="text-center">Platorm/s</th>
                                  <th class ="text-center">Credential/s</th>
                                  <th class ="text-center">Manage</th>

                              </tr> 
                          </thead> 
     
                          <tbody>
                                <?php 
                                    $sql = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id)";
                                    $result = mysqli_query($conn,$sql);
                                    $numrows = mysqli_num_rows($result);
                                    
                                    if($numrows > 0){
                                        while( $row = mysqli_fetch_assoc($result)){
                                ?>
                                        <tr>
                                            <form action="./backPos/uploadphoto.php?id=<?php echo $row['candidate_id']?>" method="POST" enctype="multipart/form-data">
                                            <?php 
                                                if(!(empty($row['photo'])||isset($_GET['change']))){//if has photo change photo and has $get change variable
                                                    echo '<td><button name="change">Change Photo</button></td>';
                                                }
                                                elseif(isset($_GET['change'])&&$_GET['change']==$row['candidate_id']){
                                                    echo '<td style="text-align:left;"><input type="file" name="datafile"><button name="uploadphoto">Apply Changes</button><button name="cancel" >cancel</button></td>';
                                                }
                                                else{
                                                    echo '<td style="text-align:left;"><input type="file" name="datafile"><button name="uploadphoto">Upload</button></td>';
                                                }
                                            ?>
                                                
                                            </form>
                                            <td><?php echo $row['lname'];?></td>
                                            <td><?php echo $row['fname'];?></td>
                                            <td><?php echo $row['position_name'];?></td>
                                            <td><?php echo $row['party_name'];?></td>
                                            <td><?php echo $row['platform_info'];?></td>
                                            <td><?php echo $row['credentials'];?></td>
                                            <td style="white-space: nowrap;">
                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-target="#edit" data-placement="top" data-toggle="tooltip" title="Edit" ><span class="fa fa-edit"></span> <a href="./backPos/editCandidate.php?id=<?php echo $row['candidate_id']?>">EDIT</a></button>
                                                <button class="btn btn-danger btn-xs" data-title="Delete" data-target="#delete"  data-placement="top" data-toggle="tooltip" title="Delete" ><span class="fa fa-trash-alt"></span><a href="./backPos/deleteCandidate.php?id=<?php echo $row['candidate_id']?>">DELETE</a></button>
                                            </td>
                                        </tr>
                                <?php
                                        }
                                    }
                                ?>                            
                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
 <?php
    if(isset($_GET['candidateid'])&&!isset($_GET['delete'])){
        echo '<script>$(document).ready(function(){
            $("#edit").modal("show");
        });</script>';
    }else if(isset($_GET['delete'])){
        echo '<script>$(document).ready(function(){
            $("#delete").modal("show");
        });</script>';
    }
    
 ?>

  <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog -->  
</div>

      <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
            <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Add Candidate Information</h4>
                </div>
                <form action="./backPos/addCandidate.php" method = "POST" autocomplete = "off">
                    <div class="modal-body">
                        <div class="form-group">              
                            <input class="form-control" name="lastnamesearch" id="lastnamesearch" type="text" placeholder="Enter Lastname" required>
                                <div id = "show-list" class="lastname-list" style ="display:none;"></div>
                        </div>
                        <div class = "form-group">
                            <input class="form-control"  name="firstnamesearch" id="firstnamesearch" type="text" placeholder="Enter Firstname" required>
                                <div id = "show-list" class="firstname-list"style ="display:none;"></div>
                        </div>
                        <div class="form-group">
                            <label for="position"></label>
                            <select class = "select_position" id="position-add" name="positionlist" required>
                            <option value = "0">- Select -</option>
                            <?php
                                $sql = "SELECT position_name FROM `candidate_position` ORDER BY heirarchy_id";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)> 0){
                                    $i=1;
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value = '".$i."'>".$row['position_name']."</option>";
                                        $i++;
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">  
                            <input class="form-control " id= "etc-add1" name="partylist" type="text" placeholder="Enter Partylist" required>              
                        </div>
                        <div class="form-group">  
                            <textarea class="form-control " id= "etc-add2" name="platform" type="text" placeholder="Enter Platforms" required></textarea>              
                        </div>
                        <div class="form-group">  
                            <textarea class="form-control " id= "etc-add3" name="credentials" type="text" placeholder="Enter Credentials" required></textarea>
                        </div> 
                    </div>
                <div class="modal-footer ">
                    <button type="submit" name="save-btn" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class= "fa fa-check-circle"></span> Save</button>
                    <button type="submit" name="cancel-btn" class="btn btn-default" id="cancel" style= "width:100%;" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                </div>
            </form>
            </div>
          <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
          </div>       
          
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Candidate Information</h4>
                </div>
                <form action="./backPos/addCandidate.php" method = "POST" autocomplete = "off">
                    <div class="modal-body">
                        <div class="form-group">              
                            <input class="form-control" name="editlastnamesearch"  id="editlastnamesearch" type="text" value="<?php if(isset($_GET['candidateid'])){echo $_GET['lname'];}?>" placeholder="Enter Lastname" required>
                            <div id = "edit-show-list" class="edit-lastname-list"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="editfirstnamesearch" id="editfirstnamesearch" type="text" value="<?php if(isset($_GET['candidateid'])){echo $_GET['fname'];}?>" placeholder="Enter Firstname" required>
                                <div id = "edit-show-list" class="edit-firstname-list"></div>
                        </div>
                        <div class="form-group">
                            <label for="position"></label>
                            <select class = "select_position" id="position-edit" name="editpositionlist" required>
                            <?php
                                $sql = "SELECT position_name, heirarchy_id FROM `candidate_position` ORDER BY heirarchy_id";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)> 0){
                                    if(isset($_GET['candidateid'])){
                                        $candidateid = $_GET['candidateid'];
                                        $sql_candidate_id = "SELECT position_name, heirarchy_id FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id)INNER JOIN candidate_position ON candidate_position.position_id = candidate.position_id) WHERE candidate_id = '$candidateid'";
                                        $result_candidate_id = mysqli_query($conn,$sql_candidate_id);
                                        $row_candidate_id = mysqli_fetch_assoc($result_candidate_id);
                                        if(mysqli_num_rows($result_candidate_id)>0){
                                            while($rowposition = mysqli_fetch_assoc($result)){
                                                if($row_candidate_id['heirarchy_id'] != $rowposition['heirarchy_id'] ){
                                                    echo "<option value = '".$rowposition['heirarchy_id']."'>".$rowposition['position_name']."</option>";
                                                }else{
                                                    echo "<option value = '".$row_candidate_id['heirarchy_id']."'selected>".$row_candidate_id['position_name']."</option>";
                                                }
                                            }
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">  
                            <input class="form-control" id="etc-edit1" name="editpartylist" type="text" value="<?php if(isset($_GET['candidateid'])){echo $_GET['partylist'];}?>" placeholder="Enter Partylist" required>              
                        </div>
                        <div class="form-group">  
                            <textarea class="form-control" id="etc-edit2" name="editplatform" type="text" placeholder="Enter Platforms" required><?php if(isset($_GET['candidateid'])){echo nl2br($_GET['platform']);}?></textarea>
                            
                        </div>
                        <div class="form-group">  
                            <textarea class="form-control" id="etc-edit3" name="editcredentials" type="text" placeholder="Enter Credentials" required><?php if(isset($_GET['candidateid'])){echo nl2br($_GET['credentials']);}?></textarea>
                            
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" name="edit-save-btn" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class= "fa fa-check-circle"></span>Save</button>
                        <button type="submit" name="edit-cancel-btn" class="btn btn-default" id="cancel" style= "width:100%;" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                    </div>
                </form>
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
                <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Are you sure you want to delete <b><?php if(isset($_GET['name'])){echo $_GET['name'];}?></b> in position <b> <?php if(isset($_GET['name'])){echo $_GET['position'];}?></b>?</div>
          </div>
          <form action="./backPos/confirmDeleteCandidate.php?id=<?php echo $_GET['id'];?>" method="POST">
              <div class="modal-footer ">
              <button type="submit" name="continue-delete-btn" class="btn btn-success" id="continue" ><span class= "fa fa-check-circle"></span>Continue</button>
              <button type="button" name="cancel-delete-btn" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span>Cancel</button>
            </div> 
          </form>    
              </div>
          <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
          </div>

          <div class="footer">
            <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
        </div>
    
    <script>
        $('.ADicon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
</body> 
</html>