<?php
    // convert values to acceptable data types
    function fixDataType($data){
        $data = trim($data);
        // $data = cleanInput($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = intval($data);
        if(is_int($data)){
            return $data;
        }
        else{
            $page = "vtBallot.php";
            $sec = "0";
            // inseert sending message to admin about tampered data
            header("url=$page");
        }
    }  

    // remove malicious bits
    function cleanInput($input) {
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
    
        $output = preg_replace($search, '', $input);
        $output = fixDataType($output);
        // $output = mysql_real_escape_string($input)
        return $output;
    }

    function isValidCandidate($candidate, $heir_id){
        // checks if selection is valid candidate
        mysqli_data_seek($table, 0);
        while($poss = $table->fetch_assoc()){
            if($candidate == $poss['candidate_id'] && $heir_id == $poss['heir_id']){
                return true;
            }
        }
        return false;
    }

    function isValidTime(){
        // checks if vote is made at scheduled time
        $date_pr = new DateTime(date("Y-m-d H:i:s"));       // submit date/ time
        $date_st = new DateTime("2021-03-20 08:00:00");     // start sched date
        $date_en = new DateTime("2021-03-30 16:00:00");     // end sched date

        // Compare the dates (current vs scheduled)
        // Fix the date comparison during compilation
        // if ($date_pr > $date_st && $date_pr < $date_en) {
        //     echo $date1->format("Y-m-d") . " is later than " . $date2->format("Y-m-d"); 
        // }
        // else{
        //     echo $date1->format("Y-m-d") . " is older than " . $date2->format("Y-m-d"); 
           // return true;
        // }
        // show schedule message when time is invalid
    }

    function isVoted($conn){
        // check if user has already voted
        $stud_id = $_SESSION['student_id'];
        $voter = $conn->query("SELECT * FROM student WHERE student_id = $stud_id");
        $student = $voter->fetch_assoc();
        // see if login already has voter info
        if($student['voting_status'] == 1){
            return true;
        }
        else{
            return false;
        }
    }

    function isValidUser($conn){  // checks if user is registered
        $studd_id = $_SESSION['student_id'];
        $voter = $conn->query("SELECT * FROM student WHERE student_id = $studd_id");
        $poss = $voter->fetch_assoc();
        // echo $studd_id;
        // echo $poss["fname"]." ".$poss["lname"]." ".$poss["student_id"];
        if($poss["lname"] == $_SESSION['lname'] && $poss["fname"] == $_SESSION['fname'] && $poss["student_id"] == $_SESSION['student_id'] && $poss["bumail"] == $_SESSION['bumail']){
            return true;
        }
        else{
            return false;
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
?>
