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
				<form method="POST" action = "ballot.php" class="register-form" id="register-form">
				  	<div class="form-group">
					  	<?php 
						  	include 'php/connect.php';
							include 'php/fetch.php';
							include 'php/submit.php';
							include 'php/security.php';
							$conn->close();
						?>
				  </div>
					<div class="form-group form-button">
						<input type="submit" name="submit" id="1submit" class="form-submit" value="Submit"/>
					</div>
				</form>
            </div>
        </section>

    </div>
</body>
</html>