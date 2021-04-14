<!--
Proj Mngr Note:
- directory change for PHP Mailer
- changed header
- fixed email function, added username and password
-->

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//palitan na lang ang location kung nasan ang composer na folder
// require_once('C:\Users\Christian Diesta\Desktop\composer\vendor\autoload.php');
require '../other/composer/vendor/autoload.php';

if(isset($_POST["sendEmail"])){
   
    $mail = new PHPMailer();

    while($row = mysqli_fetch_array($result)){

        try {
                
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';

            // reason why email works now
            $mail->Username = 'buceilshighschool@gmail.com';
            $mail->Password = 'aacbysxikqgbrdfl';
            
            // // Host credentials
            // $mail->Username = '';   //email
            // $mail->Password = '';   //password
        
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
            $mail->SetFrom('BSCS3A@bu.com');
            $mail->Subject = 'User Credentials';

            // $mail->Body = "Good day! Your one time password for the current election is $user_otp . Please do not disclose your login credentials. Thank you!";
            $mail->addAddress($user_email);
            
            /*-------------------------------*/
            $mail->Body = "Your one time password: $user_otp";
            $mail->send();
            $mail->ClearAllRecipients();

        }
            catch (Exception $e){
                echo $e->errorMessage();
            }
            catch (\Exception $e){
                echo $e->getMessage();
            }
            
            
        }
        // $mail->send();
        header("location: Admin_StudentAccountManagement.php");
}
?>
