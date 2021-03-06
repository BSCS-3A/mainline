<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//palitan na lang ang location kung nasan ang composer na folder
require '../other/composer/vendor/autoload.php';

if(isset($_POST["sendEmail"])){

    while($row = mysqli_fetch_array($result)){

        try {

            if(!empty($_POST['glevel'])){
                 $selected = $_POST['glevel'];
                 $grade_level = $row['grade_level'];

                 if($selected == $grade_level){  
                    
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    
                    $mail->Username = 'buceilsovs.noreply@gmail.com';
                    $mail->Password = 'glwztqusjeyuwmin';

                    /* Disable some SSL checks. */
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $user_otp = $row['otp'];
                    $user_email = $row['bumail'];

                    //palitan na lang ang mga message
                    $mail->setFrom('buceilsovs.noreply@gmail.com', 'buceilsovs.noreply@gmail.com');
                    $mail->Subject = 'User Credentials';
                    $mail->Body = "Good day! Your password for the current election is $user_otp . Please do not disclose your login credentials. Thank you!";
                    $mail->addAddress($user_email);
                
                    $mail->send();
                    
                }
            }
        }
            catch (Exception $e){
                echo $e->errorMessage();
            }
            catch (\Exception $e){
                echo $e->getMessage();
            }
        
    }
    //For Logs
    $_SESSION['action'] = "sent students' OTP.";
    include 'backFun_actLogs_v0_1.php';
   
    header("location: Admin_studAcc.php?success");
}
?>
