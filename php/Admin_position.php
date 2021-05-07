<!-- Proj mngr notes
- changed db_conn
- add navigation bar

Need:
- load default
- add pop up confirmation

-->

<!DOCTYPE html>
<?php 
     session_start();
    include "db_conn.php";
    
    if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])){
     if(!$conn){
       // add 404 error
         echo "<script>alert('Cannot connect to database');
   	 		window.location.href = '../../index.html';
   	 		</script>";
     }
    
     if(isset($_SESSION['message']) && isset($_GET['id'])){
         unset($_SESSION['message']);
         unset($_SESSION['msg_typ']);
         header("location: candidate.php");
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
    <script type="text/javascript" src="../js/admin_session_timer.js"></script> 
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>   

    <title>Update Position | BUCEILS HS Online Voting System</title>
    <script>
    //edit nag gawa pa ako bagong file na allow.php
        $(document).ready(function(){
            $(document).on("click","#vote_allow",function(){
                var position_id = $(this).attr("posid");
                $.ajax({
                   url:'./backPos/allow.php', 
                   method:'post',
                   data:{voteallow:position_id},
                   success:function(response){
                       console.log(response);
                   }
                });
            });
//edit 04-23-21    
            
            $(document).on("click","#continue",function(){
                var temp= true;
                $("#delete").modal("hide");
                $.ajax({
                    url:'./backPos/loadDefault.php', 
                    method:'post',
                    data:{btnclicked:temp},
                    success:function(response){
                        console.log(response);
                        alert(response);
                    }
                });
            });
        });

//edit 04-23-21
    //edit
    </script>
</head>

<body>

   <!-- The sidetable -->
   <div class="Uheader" id="CM_Header">
            <h2>Candidate Information Management</h2>
        </div>
        <div class="btn-toolbar" style="margin-left: 18px;">
          <button type="submit" id="defaultButton" name = "" class="btn btn-button1 btn-s" data-toggle="modal" data-target="#delete">Load Default Positions</button>
        </div>
      
<form autocomplete = "off" action = "<?php if(isset($_GET['id'])){$positionId =$_GET['id']; echo "./backPos/addPosition.php?id=".$positionId;}else{ echo "./backPos/addPosition.php";}?>" method ="POST">  
<div class ="wrapper">
  <div class = "left">
<div class = "center" id = "CPTable2">
      <div class="col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Add or Edit Position
          </div>
          <!-- Heirarchy ID Form group-->
          <div class="panel-body">
              <div class="form-group">
              <label for="heirarchy_id">
                Heirarchy ID
              </label>
              <input type="text" 
                     value= "<?php if(isset($_GET['heirarchy'])){ $heirarchyId = $_GET['heirarchy'];echo $heirarchyId;}?>"
                     <?php if(isset($_GET['heirarchy'])){echo "readonly style=\"background-color:#cfcfcf; color: #8e8e8e;\"";}?>
                     class="form-control" 
                     placeholder="Heirarchy ID" 
                     id="heirarchy_id" 
                     name ="heirarchy">
                     
            </div>
            <!--Heirarchy ID From group-->
            <div class="form-group">
              <label for="position_name">
                Position Name
              </label>
              <input type="text"
                     value= "<?php if(isset($_GET['name'])){ $positionName = $_GET['name'];echo $positionName;}?>"
                     name ="positionname" 
                     class="form-control"
                     placeholder="Position Name" 
                     id="position_name"
                     >
            </div>
             <div class="form-group">
              <label for="position_description">
                Position Description
              </label>
              <input type="text"
                     value= "<?php if(isset($_GET['description'])){ $descriptionName = $_GET['description'];echo $descriptionName;}?>"
                     class="form-control"
                     placeholder="Position Description" 
                     id="position_description"
                     name = "positiondes">
            </div>
                <button type="submit" id="updateButton" name = "<?php if(isset($_GET['id'])){echo "editbtn";}else{echo "addbtn";}?>" 
                        class="btn btn-button1 btn-s" onclick = "positionDisplay(this)">
                  <?php if(isset($_GET['id'])){echo "Update";}else{echo "+ Add";}?>
                </button>
                
            
          </div>
              </div>
            </div>
          </div>
        </div>
</form>
        <div class = "right">
          <div class = "center" id = CPTable>
            <div class="col-md-12">
              <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
              <thead>
                              <tr> 
                                  <th class ="text-center">Heirarchy ID</th>
                                  <th class= "text-center">Position</th>
                                  <th class="padThisCell">Description</th>
                                  <th class = "text-center">Edit</th>
                                  <th class = "text-center">Delete</th>
                                  <th class = "text-center">Allow All</th> 
                                </tr> 
                              </thead>
                              <tbody>
                              <?php
                                //retrieves data from database
                                
                                $sql = "SELECT * FROM `candidate_position` ORDER BY heirarchy_id";
                                $result = mysqli_query($conn,$sql);
                                $numrows = mysqli_num_rows($result);
                                
                                if($numrows > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr><td>".$row['heirarchy_id']."</td><td>".$row['position_name']."</td><td>".$row['position_description']."</td><td><a href=\"./backPos/updatePosition.php?edit=".$row['position_id']."\"><button type='button' class='btn btn-primary btn-xs'>EDIT</button></td><td><a href=\"./backPos/deletePosition.php?delete=".$row['position_id']."\"><button type='button' class='btn btn-danger btn-xs'>DELETE</button></td><td><label class= 'switch'>";
                                        //edit
                                        if($row['vote_allow']==0){
                                            echo "<input id='vote_allow' posid='".$row['position_id']."' type='checkbox'> <span class='slider round'></span></label></td></tr>";
                                        }
                                        else{
                                            echo "<input id='vote_allow' posid='".$row['position_id']."' type='checkbox' checked> <span class='slider round'></span></label></td></tr>";
                                        }
                                        //edit
                                    }
                                }else{
                                    echo "<tr><td>no data inside position table.</td></tr>";
                                }
                                
                                
                              ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        </div>
                     </div>
      <!--edit 04-23-21-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Load Default Positions</h4>
                </div>
                <div class="modal-body">             
                    <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span>Are you sure you want to delete existing positions and replace it with the system default?</div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" name="continue-delete-btn" class="btn btn-success" id="continue"><span class= "fa fa-check-circle"></span>Continue</button>
                    <button type="button" name="cancel-delete-btn" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span>Cancel</button>
                </div> 
             </div>
         <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
<!--edit 04-23-21-->   


<!--Start of form panel scripts
<script>
   // Current product being edited
    var editRow = null;
    
    function positionDisplay(ctl) {
    document.getElementById("heirarchy_id").disabled = true; /*Disables Heirarchy ID input field when editing*/
      editRow = $(ctl).parents("tr");
      var cols = editRow.children("td");

      $("#heirarchy_id").val($(cols[0]).text());
      $("#position_name").val($(cols[1]).text());
      $("#position_description").val($(cols[2]).text()); /*Just change to proper database name*/
        
      // Change Update Button Text
      $("#updateButton").text("Update");
    }

    function positionUpdate() {
      if ($("#updateButton").text() == "Update") {
        positionUpdateInTable();
        document.getElementById("heirarchy_id").disabled = false; /*Re-enables position input field after*/
      }                                                           /*so admins can continue adding*/
      else {
        positionAddToTable();
      }

      // Clear form fields
      formClear();

      // Focus to product name field
      $("#position_name").focus();
            $("#position_description").focus();
    }

    // Add product to <table>
    function positionAddToTable() {
      // First check if a <tbody> tag exists, add one if not
      if ($("#datatable tbody").length == 0) {
        $("#datatable").append("<tbody></tbody>");
      }

      // Append product to table
      $("#datatable tbody").append(
        positionBuildTableRow());
    }

    // Update product in <table>
    function positionUpdateInTable() {
      // Add changed product to table
      $(editRow).after(positionBuildTableRow());

      // Remove original product
      $(editRow).remove();

      // Clear form fields
      formClear();

      // Change Update Button Text
      $("#updateButton").text("Add");
    }

    // Build a <table> row of Product data
    function positionBuildTableRow() {
      var ret =
      "<tr>" +
        "<td>" + $("#heirarchy_id").val() + "</td>" + /*Just change to proper database name*/
        "<td>" + $("#position_name").val() + "</td>" +
        "<td class = 'padThisCell'>" + $("#position_description").val() + "</td>" +

        "<td>"  +
          "<button type='button' " +
                  "onclick='positionDisplay(this);' " + /*'positionDisplay is for editing"*/
                  "class='btn btn-primary btn-xs'>" +
                  "EDIT" +
          "</button>" +
          "</td>"+

          "<td>"+
          "<button type='button' " +
                  "onclick='positionDelete(this);' " +
                  "class='btn btn-danger btn-xs'>" +
                   "DELETE"+
                   "</button>"+
                   "</td>" 
      "</tr>"
      return ret;
    }

    // Delete product from <table>
    function positionDelete(ctl) {
      $(ctl).parents("tr").remove();
    }
    //saving data from data table to database
    function saveToDatabase(){
     $(document).ready(function() {
	$('#butsave').on('click', function() {
		var positionname = $('#position_name').val();
		var position_description = $('#position_description').val();
		if(position_name!="" && position_description!=""){
			$.ajax({
				url: "./backPos/save.php",
				type: "POST",
				data: {
					position_name: position_name,
					position_description: position_description,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !');
						alert("Data added successfully !");
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
    }
    // Clear form fields
    function formClear() {
      $("#heirarchy_id").val("");
      $("#position_name").val("");
      $("#position_description").val("");
    }
  </script>
</script>


    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>

</body>
</html>
<?php

 }else{
     // session issue, after add/edit/delete, logout after lol
     header("Location: AdminLogin.php");
     exit();
 }
 ?> 