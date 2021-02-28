<?php
echo "<!DOCTYPE html>";
echo '<html lang="en">';
echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
    echo '<title>Voting</title>';

    // <!-- Font Icon -->
    echo '<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">';

    // <!-- Main css -->
    echo '<link rel="stylesheet" href="css/style.css">';
echo '</head>';
echo '<body>';

echo '<div class="main">';

//   <!-- Sign up form -->
	echo'<section class="signup">';
        echo'<div class="container">';
				echo'<h2 class="form-title">Vote</h2>';
				echo'<form method="POST" action = "index.php" class="register-form" id="register-form">';
				echo'<div class="form-group">';
						// <?php
						showInfo();
						vtSubmit();
						// ? >
						echo'</div>';
						echo'<div class="form-group form-button">';
						echo'<input type="submit" name="submit" id="1submit" class="form-submit" value="Submit"/>';
					echo'</div>';
				echo'</form>';
			echo'</div>';
		echo'</section>';

	echo'</div>';

    // <!-- PHP -->
// <!--<?php include 'php/submit.php';? >-->
// < ?php
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "test";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

		function showInfo(){
			$pos_id = 10;
			while($pos_id < 40){
				$can_nm = 1; //var that stores candidate id that is voted
				echo "<section class='Position' id='Pos'> Position ", $pos_id;
					echo '<table>';
						echo '<tr>';
						while($can_nm < 4){
							echo '<td>';
							echo "<div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = '$can_nm'/> Candidate $can_nm </div>";
							echo '</td>';
							$can_nm++ ;
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
		}

		function sanitize(){
		}
	// ? >
    
echo '</body>';
echo '</html>';
?>