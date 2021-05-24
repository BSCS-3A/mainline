<?php
    session_start();
    include 'db_conn.php';
    if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    include 'navAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
        <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="../css/admin_css/style_about.css">
        <title> About Us | BUCEILS HS Online Voting System</title>
    </head>

    <body>

        <div class="aboutheader" id="aboutheader">
            <h3>ABOUT US</h3>
        </div>

        <div class="text-contain" id="text-contain">
            <div class="about-title" id="about-title">
                THE SYSTEM
            </div>
            <div class="text-des" id="text-des">
            The Bicol University College of Education Integrated Laboratory School High School Department (BUCEILS HS) Online Voting System is a web-based software that allows students to vote electronically anywhere for the annual Student Supreme Government Elections. It also permits administrators, specifically the Commission on Election (COMELEC) of the institution, to conduct the election and manage its process and other necessary information. It benefits users in terms of accessibility, fast data collection, and automatic generation of results and reports.

                <div class="userMan">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="a-userMan">
                        To learn how to use the system, you may view and download the user manual by clicking here.
                    </a>
                </div>

            </div>
        </div>

        <div class="text-contain" id="text-contain">
            <div class="about-title" id="about-title">
                THE DEVELOPERS
            </div>
            <div class="text-des" id="text-des">
            The BUCEILS HS OVS is a system developed by third year block A students taking the program Bachelor of Science in Computer Science at Bicol University College of Science during the academic year 2020 - 2021. The project is an academic requirement for CS 117 and CS 118 (Software Engineering 1 & 2) under the supervision of Prof. Lany L. Maceda and Prof. Christian Y. Sy.

            <?php
                // read developers from txt file to display on page
                $inputFile = fopen("../other/developers.txt","r") or die("Unable to open file");
                while(!feof($inputFile)){
                    // for proj leaders
                    echo "<div class='devCard1'>";
                    echo fgets($inputFile);
                    $firstString = fgets($inputFile);
                        while((strlen($firstString)) > 3){      // 0 string is 3 in length, i dunno why
                            echo "<p class='devName1'>". $firstString ."</p>";
                            echo "<p class='devStand1'>". fgets($inputFile) ."</p>";
                            $firstString = fgets($inputFile);
                        }
                    echo "</div>";

                    // for every team
                    echo "<div class='devContain'>";
                    for($count = 0; $count < 6; $count++){
                        echo "<div class='devCard'>";
                        echo fgets($inputFile);
                        $firstString = fgets($inputFile);
                            while((strlen($firstString)) > 3){      // 0 string is 3 in length, i dunno why
                                echo "<p class='devName'>". $firstString ."</p>";
                                echo "<p class='devStand'>". fgets($inputFile) ."</p>";
                                $firstString = fgets($inputFile);
                            }
                        echo "</div>";
                    }
                    echo "</div>";
                }
            ?>

            </div>    
        </div>
    </body>
</html>
<?php
}else{
    header("Location: AdminLogin.php");
     exit();
}
 ?>