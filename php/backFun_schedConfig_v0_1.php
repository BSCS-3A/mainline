<!--
    Proj Mngr notes:
    -changed path include
-->

<?php
session_start();
include('Admin_electionConfig.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../other/composer/vendor/autoload.php';
$db = mysqli_connect('localhost', 'root', '', 'bucielsmain2');
$results = mysqli_query($db, "SELECT * FROM student");

$mail = new PHPMailer(TRUE);
	
	//initialize variables
	/* $subject = ""; */
	$message = "";

   function function_alert($msg) { 
      
      // Display the alert box  
      echo "<script>alert('$msg');</script>"; 
  } 

 //Send email
	if (isset($_POST['save'])) {

		/* $subject = $_POST['subject']; */
	$message = $_POST['message'];
      	if(empty($message)){
         function_alert("blank message"); 
      	}else{


      while ($row = mysqli_fetch_array($results)) { 

	try {
   
         $mail->setFrom('buceilshighschool@gmail.com', 'BUCEILS');
         $mail->addAddress($row['bumail']);
         $mail->Subject = 'BUCEILS ELECTION SCHEDULE';
         $mail->Body = $message;
         
         /* SMTP parameters. */
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = TRUE;
         $mail->SMTPSecure = 'tls';
         $mail->Username = 'buceilshighschool@gmail.com';
         $mail->Password = 'aacbysxikqgbrdfl';
         $mail->Port = 587;
      
            /* Enable SMTP debug output. */
           // $mail->SMTPDebug = 4;
         
         /* Disable some SSL checks. */
         $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
         );
         
        
        
      }
      catch (Exception $e)
      {
         echo $e->errorMessage();
      }
      catch (\Exception $e)
      {
         echo $e->getMessage();
      }
   }
   /* Finally send the mail. */
      $mail->send();         
    
     function_alert("Mail Sent"); 
	
    //For Logs
    $_SESSION['action'] = 'sent Election Reminders.';
    include 'backFun_actLogs_v0_1.php';
       
   }
   }else{
      function_alert("Sending failed"); 
	
   }
?>
