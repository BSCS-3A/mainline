<?php
  session_start();
   if(!isset($_SESSION['incorrectTry'])){
      $_SESSION['incorrectTry'] = 0;
  }
      if($_SESSION['incorrectTry']>=3){
       $_GET['BOTerror'] = "Oops! It seems like you logged in incorrectly 3 times. Please verify that you are not a bot by clicking the checkbox before logging in.";
     }
  if (isset($_SESSION['student_id']) && isset($_SESSION['bumail']))
     {
         header("Location: php\Student_studDash.php");
     }
     else if(isset($_SESSION['admin_id'])){
         header("Location: php\Admin_adminDash.php");
     }
?>

<!DOCTYPE html>   
<html>   
<head>  
<script src="https://www.google.com/recaptcha/api.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<script type="text/javascript" src="./js/loginLink.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style_Login.css">
<link rel="stylesheet" type="text/css" href="css/session_modal.css">
<link rel="icon" href="./img/BUHS LOGO.png" type="image/png">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title> BUCEILS HS Online Voting System</title>
</head>    
<body>
    <!-- Login Banner -->
        <div class="Awelcome-banner">
        <h2>ONLINE</h2>
        <div class="Alogo-container">
        <img class="Alogos" src="./img/BU logo.png">
        <img class="Alogos" src="./img/BUHS LOGO.png">
        <img class="Alogos" src="./img/SSG LOGO.png">
        </div>
        <h2>VOTING SYSTEM</h2>
        <p>BICOL UNIVERSITY COLLEGE OF EDUCATION<br>INTEGRATED LABORATORY SCHOOL HIGH SCHOOL DEPT.</p>
        </div>

        <div class="Alogo-banner">
            <p class="Abanner-text">BUCEILS HS ONLINE VOTING SYSTEM</p>
            <img class="Arlogo" src="./img/SSG LOGO.png">
            <img class="Arlogo" src="./img/BUHS LOGO.png">
            <img class="Arlogo" src="./img/BU logo.png">
        </div>
    <!-- end Login Banner --> 
     

    <!-- Login Form -->
    <div class="Acontainer">
        <form action="./php/Student_Login_Button.php" method="post">   
            <img src="./img/student.png" alt="Logo" title="Logo" width="138">
            <h1>SIGN IN AS</h1>
                <div class="Aselect">
                    <select name="formal" onchange="javascript:handleSelect(this)">
                        <option value="index">STUDENT</option>
                        <option value="./php/AdminLogin">ADMINISTRATOR</option>
                    </select>
                </div>
                <?php if (isset($_GET['error']) && isset($_GET['BOTerror'])) { ?>
                    <p class="error" align="center" ><font color="#E42217"  size="3"><?php echo $_GET['error']; ?></font></p>
                <?php }else if (isset($_GET['error'])) { ?>
                    <p class="error" align="center" ><font color="#E42217"  size="3"><?php echo $_GET['error']; ?></font></p>
                <?php }else if (isset($_GET['BOTerror'])){ ?>
                    <p class="error" align="center" ><font color="#E42217"  size="3"><?php echo $_GET['BOTerror']; ?></font></p>
                <?php } ?>
            <input type="text" placeholder="Enter BU Email" name="username" required>  
            <input type="password" placeholder="Enter Password" name="password" required>
            <?php 
             if($_SESSION['incorrectTry']>=3){
             echo '<div class="g-recaptcha" data-sitekey="6LflenwaAAAAAAmK_ZEd0aJwcROAUe3gH2Cbmzkg"></div>';
             }
            ?>  
            

            <button type="submit">LOG IN</button>   
        </form>
    </div>
    <!-- end Login Form --> 
            <!-- Error Message Modal content -->
            <div id="No-election-scheduled" class="F-modal-error">
        <div class="F-modal-content-error">
          <div class="F-modal-header-error">
          </div>
          <div class="F-modal-body-error">
            <p id = "F-modal-message-text">.</p>
          </div>
          <div class="F-modal-footer-error">
            <button type="button" id="ok-button" class="F-OkBTN-error">OK</button>
          </div>
        </div>
    </div>

    <!-- for modal script and disabling inspect element -->
    <script src="js/scripts_nav.js"></script>
<!-- end err modal -->

    <!-- FOR MODAL FIRING -->
<?php
 if(isset($_GET['session'])){
     ?>
  <script type=text/javascript>
    // Get the modal
    var modal = document.getElementById("No-election-scheduled");
    //Get the button that closes the modal
    var close = document.getElementById("ok-button");
    //DISPLAY MODAL
    document.getElementById('F-modal-message-text').innerHTML = "<h3>SESSION TIMEOUT </h3><br>You have been logged out due to inactivity.";
    modal.style.display = "block";
    document.querySelector("body").style.overflow = 'hidden';
    //OK button
    close.onclick = function() {
        modal.style.display = "none";
        document.querySelector("body").style.overflow = 'visible';
    }
  </script>
<?php  }?>
    <!-- END MODAL FIRING   -->
</body>     
</html>  