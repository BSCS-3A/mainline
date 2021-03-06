<?php
    // convert values to acceptable data types
    function fixDataType($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = intval($data);
        if(is_int($data)){
            return $data;
        }
        else{
            $page = "Student_vtBallot.php";
            // inseert sending message to admin about tampered data
            header("url=$page");
        }
    }  

    // remove malicious bits; calls fixDataType()
    function cleanInput($conn, $input) {
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
        
        $output = $conn -> real_escape_string($input);
        $output = preg_replace($search, '', $input);
        $output = fixDataType($output);
        // $output = mysql_real_escape_string($input)
        return $output;
    }

    function cleanOutput($conn, $input) {
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
        
        $output = $conn -> real_escape_string($input);
        $output = preg_replace($search, '', $input);
        $output = trim($output);
        $output = stripslashes($output);
        $output = htmlspecialchars($output);
        // $output = mysql_real_escape_string($input)
        return $output;
    }

    function isVoted($conn){
        // check if user has already voted
        $stud_id = $conn->real_escape_string($_SESSION['student_id']);
        $voter = $conn->query("SELECT * FROM student WHERE student_id = $stud_id");
        $vote_table = $conn->query("SELECT * FROM vote WHERE student_id = $stud_id");
        $student = $voter->fetch_assoc();
        if(($student['voting_status'] == 1)){
                return true;
        }
        if(!empty($vote_table->fetch_assoc())){
            $conn->query("DELETE * FROM vote WHERE student_id = $stud_id");
        }
        return false;
    }

    function isValidUser($conn){  // checks if user is registered
        if(isset($_SESSION['student_id'])){
            $studd_id = $conn->real_escape_string($_SESSION['student_id']);
            $voter = $conn->query("SELECT * FROM student WHERE student_id = $studd_id");
            $poss = $voter->fetch_assoc();
            // echo $studd_id;
            // echo $poss["fname"]." ".$poss["lname"]." ".$poss["student_id"];
            if($poss != NULL && ($poss["lname"] === $_SESSION['lname'] && $poss["fname"] === $_SESSION['fname'] && $poss["student_id"] == $_SESSION['student_id'] && $poss["bumail"] === $_SESSION['bumail'] && password_verify($poss['bumail'].$poss['otp'], $_SESSION['otp'])=='true')){
                return true;
            }
            else{
                return false;
            }
        }
        else if(isset($_SESSION['admin_id'])){
            $admin_id = $conn->real_escape_string($_SESSION['admin_id']);
            $account = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $admin_id");
            $poss = $account->fetch_assoc();
            // echo $studd_id;
            // echo $poss["fname"]." ".$poss["lname"]." ".$poss["student_id"];
            if($poss != NULL && ($poss["admin_lname"] === $_SESSION['admin_lname'] && $poss["admin_fname"] === $_SESSION['admin_fname'] && $poss["admin_id"] == $_SESSION['admin_id'] && $poss["username"] === $_SESSION['username'] && $poss["admin_position"] === $_SESSION['admin_position'] && password_verify($poss['username'].$poss['password'], $_SESSION['password'])=='true')){
                return true;
            }
            else{
                return false;
            }
        }
    }


    function slugify($string){
        $preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
        $pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
        $string = preg_replace($pattern, '', $string);
        $string = preg_replace('~[^\\pL\d]+~u', '-', $string);
        $string = trim($string, '-');
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        $string = strtolower($string);
        $string = preg_replace('[^-\w]+', '', $string);
        
        return $string;
        
    }

    function isValidCandidate($conn, $ballot_cand_id, $ballot_heir_id){
        // checks if selection is valid candidate
        $table = $conn->query("SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); // get positions
        mysqli_data_seek($table, 0);
        if($ballot_cand_id == 0){
            return true;
            // return 1;
        }
        else{
            while($poss = $table->fetch_assoc()){
                // echo $poss['candidate_id']." ".$poss['fname']; 
                if($ballot_cand_id == $poss['candidate_id']){
                    // echo "Matched";
                    if($poss['heirarchy_id'] === $ballot_heir_id){
                        return true;
                        // return 1;
                        // echo "Valid";
                    }
                    else{
                        return false;
                        // return 2;
                        // echo "Invalid";
                    }
                }
                // echo "<br>";
            }
            return false;
            // return 2;
        }
    }

    function errorMessage($message){
        echo '<link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">';
        require_once 'navStudent.php';
        echo '<main>
			<div id="error-message-container" class="error-message-container">			
				<div id="election-finished-msg" class="error-message">
					<h3>'.$message.'</h3>
				</div>

				<div id="error-button" class="error-button">
            		<button type="button" id="msg-ok-button" class="OkBTN-error">OK</button>
          		</div>
          	</div>
		</main>';
        echo '<script>
        // Get Home button
        var home = document.getElementById("msg-ok-button");

        home.onclick = function() {
            // alert("waw");
            window.location.href = "../index.php";
        }
        </script>';
    }

    function redirect($url){
        if (headers_sent()){
          die('<script type="text/javascript">window.location.replace("'.$url.'");</script‌​>');
        }else{
          header('Location: ' . $url);
          die();
        }    
    }

    function notifyAdmin($text){
        if($text != ""){
            if(isset($_SESSION['student_id'])){
                date_default_timezone_set("Asia/Singapore");
                $session_info = "<br><br>More info about the sender: <br>Student Name: ".$_SESSION['fname']." ".$_SESSION['lname'].
                "<br>Grade Level: ".$_SESSION['grade_level'].
                "<br>Email: ".$_SESSION['bumail'].
                "<br>Student ID: ".$_SESSION['student_id'].
                "<br>TIme Attempted: ".date("h:i:sa");
                $text_message = "1||".$text.$session_info."||".date('h:i')."||".date('Y/m/d')."||unread"."##\n";
                $file = "../user/msg/system.html";
                file_put_contents($file, $text_message, FILE_APPEND | LOCK_EX);
            }
            else if(isset($_SESSION['admin_id'])){
                date_default_timezone_set("Asia/Singapore");
                $session_info = "<br><br>More info about the sender: <br>Admin Name: ".$_SESSION['admin_fname']." ".$_SESSION['admin_lname'].
                "<br>Admin Position: ".$_SESSION['admin_position'].
                "<br>Username: ".$_SESSION['username'].
                "<br>Admin ID: ".$_SESSION['admin_id'].
                "<br>TIme Attempted: ".date("h:i:sa");
                $text_message = "1||".$text.$session_info."||".date('h:i')."||".date('Y/m/d')."||unread"."##\n";
                $file = "../user/msg/system.html";
                file_put_contents($file, $text_message, FILE_APPEND | LOCK_EX);
            }
        }
    }
?>
