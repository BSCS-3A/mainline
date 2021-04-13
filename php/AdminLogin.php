<?php
//  session_start();
//  if(!isset($_SESSION['incorrectTry'])){
//      $_SESSION['incorrectTry'] = 0;
//  }
     
//     if($_SESSION['incorrectTry']>=3){
//       $_GET['error'] = "Oops! It seems like you logged in incorrectly 3 times. Please verify that you are not a bot by clicking the checkbox before logging in.";
//     }
    
//    /* if(isset($_GET[''])){
//         $message = $_GET['inactivityError'];
//          echo "<script type='text/javascript'>alert('$message');</script>"; 
//     }*/
//  if (isset($_SESSION['admin_id']) && isset($_SESSION['username']))
//     {
//         header("Location: ..\..\Admin Dashboard\AdminDashboard.php");
//     }
//     else if(isset($_SESSION['student_id'])){
//         header("Location: ..\..\Student Dashboard\StudentDashboard.php");
//     }
 

?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="../css/style_Login.css">
<script type="text/javascript" src="../js/loginLink.js"></script>
<link rel="icon" href="../img/BUHS LOGO.png" type="image/png">  
<title> BUCEILS Voting System </title> 
<script src="https://www.google.com/recaptcha/api.js"></script>   
</head>    
<body>
    <!-- Login Banner -->
        <div class="Awelcome-banner">
        <h2>ONLINE</h2>
        <div class="Alogo-container">
        <img class="Alogos" src="../img/BU logo.png">
        <img class="Alogos" src="../img/BUHS LOGO.png">
        <img class="Alogos" src="../img/SSG LOGO.png">
        </div>
        <h2>VOTING SYSTEM</h2>
        <p>BICOL UNIVERSITY COLLEGE OF EDUCATION<br>INTEGRATED LABORATORY SCHOOL HIGH SCHOOL DEPT.</p>
        </div>

        <div class="Alogo-banner">
            <p class="Abanner-text">BUCEILS HS ONLINE VOTING SYSTEM</p>
            <img class="Arlogo" src="../img/BU logo.png">
            <img class="Arlogo" src="../img/BUHS LOGO.png">
            <img class="Arlogo" src="../img/SSG LOGO.png">
        </div>
    <!-- end Login Banner --> 

    <!-- Login Form -->
    <form action="Admin_Login_Button.php" method="post"> 
        <div class="Acontainer">
            <img src="../img/admin.png" alt="Logo" title="Logo" width="138">
            <h1>SIGN IN AS</h1>
                <div class="Aselect">
                    <select name="formal" onchange="javascript:handleSelect(this)">
                        <option value="AdminLogin">ADMINISTRATOR</option>
                        <option value="../index">STUDENT</option>
                    </select>
                </div>
                <?php if (isset($_GET['error'])) { 
                    echo '<p class="error" align="center" ><font color="#E42217"  size="3">'.$_GET['error'].'</font></p>';
                 } ?>
            <input type="text" placeholder="Enter BU Email" name="username" required>  
            <input type="password" placeholder="Enter Password" name="password" required>  
            <?php 
            // if($_SESSION['incorrectTry']>=3){
            // echo '<div class="g-recaptcha" data-sitekey="6LflenwaAAAAAAmK_ZEd0aJwcROAUe3gH2Cbmzkg"></div>';
            // }
            ?>
            <button type="submit">LOG IN</button>   
        </div>   
    </form> 
    <!-- end Login Form -->
</body>     
</html>  