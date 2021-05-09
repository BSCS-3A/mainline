<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<meta charset="utf-8">
    	<link rel="icon" href="../../img/BUHS LOGO.png" type="image/png">
    	<title>401</title>
		<link rel="stylesheet" type="text/css" href="../../css/student_css/vote_message.css">
		<link rel="stylesheet" type="text/css" href="../../css/style_login.css">
	</head>

	<body>
		<?php
        echo '<main>
			<div id="error-message-container" class="error-message-container">			
				<div id="election-finished-msg" class="error-message">
				<table style = "width:50%; margin-left: auto; margin-right: auto;">
					<tr>
						<th><img src = "../../img/BUHS LOGO.png"></th>
						<th><h2>401</h2><h3>Authorization Required</h3><br><br></th>
					</tr>
				</table>
					
					<p>The OAuth client was not found.</p>
				</div>

				<div id="error-button" class="error-button">
            		<button type="button" id="ok-button" class="OkBTN-error">OK</button>
          		</div>
          	</div>
		</main>';
        echo '<script>
        // Get Home button
        var home = document.getElementById("ok-button");

        home.onclick = function() {
            location.href = "../../index.php";
        }
        </script>';
		?>
	</body>
</html>
