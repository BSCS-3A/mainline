<!--
Proj Mngr Note:
- directory change for PHP Mailer
- changed header
-->

<?php

require_once('../other/PHPMailer/PHPMailer-5.2-stable/PHPMailerAutoload.php');

if(isset($_POST["sendEmail"])){
   
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    
    // Host credentials
    $mail->Username = '';
    $mail->Password = '';

    $mail->Subject = 'User Credentials';
  

    while($row = mysqli_fetch_array($result)){

        $user_otp = $row['otp'];
        $user_email = $row['bumail'];

        $mail->SetFrom('BSCS3A@bu.com');
        $mail->Body = "Your one time password: $user_otp";
        $mail->AddAddress($user_email);

        $mail->Send();
    }
    header("location: Admin_StudentAccountManagement.php?updation=1");
}
?>
