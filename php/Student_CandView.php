<!DOCTYPE html>
<?php
    session_start();
    include('db_conn.php');
    if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
        $idletime=900;//after 15 minutes the user gets logged out

        if (time()-$_SESSION['timestamp']>$idletime){
            //$_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
            header("Location: StudentLogout.php");
        }else{
            $_SESSION['timestamp']=time();
        }
    }
    else{
        header("Location: ..\index.php");
        exit();
    }
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_Pos.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/font-awesome_Pos.css" >
    <link rel="stylesheet" type="text/css" href="../css/student_css/user_Cand.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/student_session_timer.js"></script>
    <script src="../js/bootstrap.min_Pos.js"></script>
    <title>BUCEILS HS Online Voting System</title>
    

    
    <script>
    $(document).ready(function() {
        if($("#select").val()==0){
            var selected = 0;
            $.ajax({
                url: './backCandidate/view.php',
                method:'post',
                data:{heirarchy_id:selected},
                success:function(response){ 
                     $("#view-container").html(response);
                }
            });
        }
        $("#select").change(function() {
            var selected = $(this).val();
            $.ajax({
                url: './backCandidate/view.php',
                method:'post',
                data:{heirarchy_id:selected},
                success:function(response){ 
                    $("#view-container").html(response);
                }
            });
        });
        $(document).on("click","#modalbtn",function(){
            $(".credContainer").children("p").html($(this).attr("credentials"));
            $(".platContainer").children("p").html($(this).attr("platform"));
            var name = $(this).siblings("h3").text() + " ";
            if($(this).attr("mname")!= ""){
              name += $(this).attr("mname") + ".";
            }
            $(".nameContainer").children("p").html(name);
            $(".gradeContainer").children("p").html($(this).attr("grade"));
            $(".positionContainer").children("p").html($(this).prev("p").text());
        });
        $("img.pic").on("error",function(){
            console.log($(this).get(0));
        });
    });
</script>
     
</head>

<body>

    <?php include "navStudent.php"; ?>


<div class = "Cand_header">
  <h3>OFFICIAL CANDIDATES</h3>
</div>

    <div class= "Uwrapper">
        <div class="Uleft">
             <table class= "center" id="side_pos" width="75%" cellspacing="0" cellpadding="2px">
                 <thead>
                     <tr>
                         <th>
                             Position
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>
                            <select name = "select-position" id = "select">
                                <option value = "0" selected>All Candidates</option>
                                <?php
                                    $sql = "SELECT position_name FROM `candidate_position` ORDER BY heirarchy_id";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0)
                                    {  
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<option value = '".$i."'>".$row['position_name']."</option>";
                                            $i++;
                                        }
                                    }
                                ?>
                            </select>    
                         </td>
                         <!--<td>
                             <button class="btn-primary btn-xs" onclick="function;">View</button> Button reloads the profile cards and populates it with appropriate data
                         </td>-->
                     </tr>
                 </tbody>
             </table>
        </div>

        <div class="Uright">
           <div class = "Urow" id = "view-container">
            </div>
</div>
        </div>
        
            <div class = "scroll_Top">
    <!--<button id = "scrollToTopBtn" >^</button>-->
</div>

    
     <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true"> <!--Modal Contains 2 containers 1 container for the platforms and another for the credentials-->
        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Platforms and Credentials</h4>
                </div>
                    <div class="modal-body">
                      <div class = "nameContainer">
                      <h3>Name</h3>
                      <p>Lorem ipsum</p>
                      </div>
                            <div class = "gradeContainer">
                            <h3>Grade Level</h3>
                            <p>Lorem ipsum</p>
                            </div>
                                  <div class = "positionContainer">
                                  <h3>Position</h3>
                                  <p>Lorem ipsum</p>
                                  </div>
                    <div class="credContainer">
                        <h3>Credentials</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis laoreet metus, sit amet mollis arcu pretium in. Vestibulum arcu elit, ornare eu dictum id, rutrum et dolor. Nunc tempus commodo rhoncus. Fusce tortor ex, consequat nec tortor id, pharetra tincidunt nunc. Fusce dictum lorem vel iaculis fringilla. Curabitur tristique malesuada ex, at convallis nisl pellentesque sit amet. Nam semper enim id orci lacinia ultricies. Integer consectetur in neque id accumsan. Vivamus ac tellus efficitur, scelerisque risus id, egestas tellus. Fusce tincidunt ex urna, non volutpat ipsum posuere tempus. Vivamus imperdiet mattis tellus eget elementum. Phasellus justo lectus, sagittis ut velit a, mattis imperdiet nibh. Morbi ultricies rhoncus euismod. Morbi et dolor vitae magna vulputate placerat. Cras ac velit sapien.</p>
                   </div>
                   <div class="platContainer">
                    <h3>Platforms</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis laoreet metus, sit amet mollis arcu pretium in. Vestibulum arcu elit, ornare eu dictum id, rutrum et dolor. Nunc tempus commodo rhoncus. Fusce tortor ex, consequat nec tortor id, pharetra tincidunt nunc. Fusce dictum lorem vel iaculis fringilla. Curabitur tristique malesuada ex, at convallis nisl pellentesque sit amet. Nam semper enim id orci lacinia ultricies. Integer consectetur in neque id accumsan. Vivamus ac tellus efficitur, scelerisque risus id, egestas tellus. Fusce tincidunt ex urna, non volutpat ipsum posuere tempus. Vivamus imperdiet mattis tellus eget elementum. Phasellus justo lectus, sagittis ut velit a, mattis imperdiet nibh. Morbi ultricies rhoncus euismod. Morbi et dolor vitae magna vulputate placerat. Cras ac velit sapien.</p>
                   </div>
                </div>
            
                <div class="modal-footer ">
                </div>
            </div>
        </div>
    </div>

                <!-- <footer>
            BS COMPUTER SCIENCE 3A © 2021
            </footer> -->

     <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");

    </script>
    <script>
      var scrollToTopBtn = document.getElementById("scrollToTopBtn")
      var rootElement = document.documentElement

    function scrollToTop() {
  // Scroll to top logic
    rootElement.scrollTo({
    top: 0,
    behavior: "smooth"
  })
}
scrollToTopBtn.addEventListener("click", scrollToTop)
    </script>
</body>
</html>