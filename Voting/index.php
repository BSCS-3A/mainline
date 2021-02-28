<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
				<h2 class="form-title">Vote</h2>
				<form method="POST" action = "index.php" class="register-form" id="register-form">
				  	<div class="form-group">
						<?php
						showInfo();
						vtSubmit();
						?>
				  </div>
					<div class="form-group form-button">
						<input type="submit" name="submit" id="1submit" class="form-submit" value="Submit"/>
					</div>
				</form>
            </div>
        </section>

    </div>

    <!-- PHP -->
<!--<?php include 'php/submit.php';?>-->
	<?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "test";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
		$candidates = array(1, 1);
		$canCtr = 0;
		function showInfo(){
			$pos_id = 10;
			while($pos_id < 40){
				$can_nm = 1; //var that stores candidate id that is voted
				echo "<section class='Position' id='Pos'> Position ", $pos_id;
					echo '<table>';
						echo '<tr>';
						while($can_nm < 4){
							echo "<td><div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = '$can_nm'/> Candidate $can_nm </div></td>";
							$candidates[$canCtr][$pos_id] = $can_nm;
							$can_nm++;
							$canCtr++;
						}
						echo '</tr>';
					echo '</table>';
				echo '</section>';
				$pos_id+=10;
			}
		}

		function vtSubmit(){
			$pos_id = 10;
			if (isset($_POST['submit'])){
				if(!empty($_POST[$pos_id])){
					echo "<br>Voted: <br>";
					while($pos_id < 40){
						echo "Position $pos_id: ", $_POST[$pos_id], "<br>";
						$pos_id+=10;
					}
				}
				else{
					echo "none";
				}
			}
		}

		function validate(){
			isValidCandidate();
			isValidVote();
			isLegitUser();
		}

		function sanitize(){
		}

		function isValidCandidate(){
			// $i = $canCtr;
			// while($i>0){
			// 	while($j<)
			// 	if($candidates[$i][])
			}
		}
	?>
    
</body>
</html>