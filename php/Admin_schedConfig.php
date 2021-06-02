<?php
session_start();
include("db_conn.php");
if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
     require './backMonitor/fetch_date.php';
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/BUHS LOGO.png">
        <link rel="stylesheet" type="text/css" href="../css/admin_css/style2_actLogs.css">
        <link rel="stylesheet" type="text/css" href="../css/admin_css/electionConfig.css">
        <link rel="stylesheet" href="../css/admin_css/bootstrap_addAdmin.css">
        <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_addAdmin.css">
        <script src="../js/jquery-1.11.1.min_addAdmin.js"></script>
        <script src="../js/jquery.dataTables.min_addAdmin.js"></script>
        <script src="../js/dataTables.bootstrap_addAdmin.js"></script>
        <script src="../js/bootstrap.min_addADmin.js"></script>
        <script type="text/javascript" src="../js/admin_session_timer.js"></script>
        <!-- <script src="../js/electionConfig.js"></script> -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>


        <title>Election Schedule Configuration | BUCEILS HS Online Voting System </title>
    </head>

    <body>

        <!-- Navigation Bar -->
        <?php include "navAdmin.php"; ?>


        <div class="Dheader" id="Dheader">
            <h3 class="Dheader-txt">Time Scheduler</h3>
        </div>

        <div class="leftContain">
        <form onsubmit="return showConfirm();" class="isog2" method="POST" action="backFun_addElecPeriod.php">        
        <div class="current">
                    <label id="DtD"> 
                <?php

                include "db_conn.php";


                    $event = mysqli_query($conn, "SELECT * FROM vote_event");
                    $row = mysqli_fetch_array($event);

                    if (empty($row)) {
                        echo " NO ELECTION SCHEDULE";
                    } else {
    
                        $event = mysqli_query($conn, "SELECT * FROM vote_event");
                        while ($row = mysqli_fetch_array($event)) {
                            $stdate = $row['start_date'];
                            $endate = $row['end_date'];
                        }
                        if(($stdate == "0000-00-00 00:00:00") && ($endate == "0000-00-00 00:00:00")){
                            echo "NO ELECTION SCHEDULE ";
                        }else{
                            $startDate = date_create("$stdate");
                            $endDate = date_create("$endate");
                            echo $startDate->format('M d, Y (h:ia)');
                            echo " to ";
                            echo $endDate->format('M d, Y (h:ia)');
                        } 
                    }
                ?>
                </label><br>
                <label id="Dtd">
                <?php
                    $event = mysqli_query($conn, "SELECT * FROM vote_event");
                    $row = mysqli_fetch_array($event);
                    if ($row != "") {
                        $event = mysqli_query($conn, "SELECT * FROM vote_event");
                        while ($row = mysqli_fetch_array($event)) {
                            $occur = $row['vote_duration'];   
                        }

                        if($occur == 1){
                            echo "START OF SCHOOL YEAR";
                        }elseif($occur == 0){
                            echo "END OF SCHOOL YEAR";
                        }
                    } 
                ?>
                </label>
                </div>
                <hr style="margin-top: 0px; margin-left: 0px;">
                <div>
                    <label for="election">ELECTION PERIOD</label>
                    <select name="election" id="Elec" style="font-size:100%;" required>
                        <option value="">select</option>
                        <option value="1">start of school year</option>
                        <option value="0">end of school year</option>
                    </select>
                </div>

                <div>
                    <button class="btn" type="submit" name="editperiod" 
                    <?php 
                    $event = mysqli_query($conn, "SELECT * FROM vote_event");
                    $row = mysqli_fetch_array($event);
                    if(!empty($row)){ 
                        $stdate = $row['start_date'];
                        if($stdate != "0000-00-00 00:00:00"){
                            if ($current_date_time>=$start_date){ 
                        ?> disabled <?php   } }}?>><span class="fas fa-clock"></span> UPDATE PERIOD</button>
                </div>

        </form>

        <form class="isog" method="POST" action="backFun_setcountdown.php">
            <div class="leftdiv">
                
            <hr style="margin-top: 0px;">
                <div>
                    <label for="election">ELECTION SCHEDULE</label> <br><br>
                    <label for="date">Date Start:</label>

                    <input type="date" id="date" name="date" value="yyyy-mm-dd" placeholder="" required></input>
                </div>
                <br>

                <div>
                    <label for="tstart">Time Starts:</label>
                    <input type="time" id="tstart" name="tstart" placeholder="" required></input>
                </div>
                <br>
                <div>
                    <label for="date">Date Ends:</label>
                    <input type="date" id="date" name="dateEnd" value="yyyy-mm-dd" placeholder="" required></input>
                </div>
                <br>
                <div>
                    <label for="tends">Time Ends:</label>
                    <input type="time" id="tends" name="tends" placeholder="" required></input>
                </div>
                <br>
                <br>
                <div>
                    <!-- <script type="text/javascript" src="../assets/js/awaw.js"></script>onclick="passvalues();"-->
                    <!--<button class="btn" type="submit" id="btnsave" name="savesched" >SAVE</button>-->
                    <!-- onclick="myFunction('date','tstart','tends')-->
                    <button class="btn" type="submit" name="editsched"><span class="fas fa-clock"></span> UPDATE SCHEDULE</button>
                </div>
            </div>

        </form>

        </div> <?php // end of leftContainer ?>

        <div class="rightContain">
        <form method="post" action="backFun_schedConfig.php" class="remind">
            <div class="input-group">
                <label>Vote Reminders:</label>
                <textarea rows="15" cols="68" name="message" placeholder="" required></textarea>
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save"><span class="fas fa-bell"></span> SEND REMINDERS</button>
            </div>
        </form>
       </div>

        <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

        <script>
             
        function showConfirm() {
            if( confirm("WARNING: Updating the election schedule with different vote period from previous schedule may delete existing candidates. Do you wish to proceed? " ) == false){
                return false;
            }else{
                return true;
            }
        }
             
            $('.icon').click(function() {
                $('span').toggleClass("cancel");
            });
        </script>
        </div>


        <?php if (isset($_SESSION['message'])) : ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

    </body>

    </html>
<?php
} else {
    header("Location: AdminLogin.php");
    exit();
}
?>
