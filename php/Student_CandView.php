<!DOCTYPE html>
<?php
    include 'db_conn.php';
    // session_start();
    // if (!(isset($_SESSION['student_id']) && isset($_SESSION['bumail']))) {//if not logged in
    //     header("location:../../DashboardAuthentication/Login UI v2/html/AdminLogin.php");
    // }
    // if(isset($_SESSION['admin_id']) && isset($_SESSION['username'])){//if logged in as admin
    //     header("location:../../DashboardAuthentication/Login UI v2/html/AdminLogin.php");
    // }
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_Pos.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_Pos.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/user_Cand.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/bootstrap.min_Pos.js"></script>
    <title>BUCEILS HS Online Voting System</title>
    

    
    <script>
    $(document).ready(function() {
        if($("#select").val()==0){
            var selected = 0;
            $.ajax({
                url: './backPos/view.php',
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
                url: './backPos/view.php',
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
        });
        
    });
</script>
     
     
</head>

<body>

    <?php include "navStudent.php"; ?>


    <!-- <nav id="nav-container">
        <input id="nav-toggle" type="checkbox">
        <div class="Alogo">
            <h2>BUCEILS HS</h2>
            <h3>ONLINE VOTING SYSTEM</h3>
        </div>
        <label for="btn" class="Aicon"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="Ashow">VOTE</label>
                <a class="topnav" href="#">VOTE</a>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a class="Atopnav" href="#">ELECTION</a> 
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#" class="Aelec-text">ELECTION PROCESS</a></li>
                    <li><a href="#">ARCHIVE</a></li>
                    <li><a href="#">RESULTS</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="Ashow">CANDIDATES</label>
                <a class="Atopnav" href="#">CANDIDATES</a>
            </li>
            <li>
                <label for="btn-4" class="Ashow">CHAT US</label>
                <a class="Atopnav" href="#">CHAT US</a>
            </li>
            <li>
                <label for="btn-5" class="Ashow">JUAN S. DELA CRUZ</label>
                <a class="Auser" href="#"><img class="Auser-profile" src="../IMG/student.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a href="#" class="Aelec-text">JUAN S. DELA CRUZ</a></li>
                    <li><a href="../../DashboardAuthentication/Student Dashboard/Logout.php">LOGOUT</a></li>
                </ul>
            </li>
        </ul>
        
    </nav> -->

     <section id="section-container">
        <!--Left Content-->
        <article>
            <!-- <div class="Alogo-container">
                <img class="Alogos" src="../IMG/BU-LOGO.png">
                <img class="Alogos" src="../IMG/BUHS_LOGO.png">
                <img class="Alogos" src="../IMG/SSG_LOGO.png">
            </div> -->
            <!-- <p>WELCOME TO THE OFFICIAL</p> -->
            <h1>OFFICIAL CANDIDATES</h1>
        </article>
    </section>

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


<!--Modal Content-->
</div>
      <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true"> <!--Modal Contains 2 containers 1 container for the platforms and another for the credentials-->
        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Platforms and Credentials</h4>
                </div>
                    <div class="modal-body">
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
        });
    </script>

    <script>
      
    </script>
</body>

</html>