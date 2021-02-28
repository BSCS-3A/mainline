<?php
	if (isset($_POST['signin']))
		{
				$nem = $_POST['your_name'];
                $pass = $_POST['your_pass'];
				$nemo = 'JP';
				$path = 
				'mingming';

				if(($nem==$nemo)&($pass==$path))
				{
					header("Location: vizew");
				}
				else
				{
					echo '<center><p>Invalid Username/ Password</p>';
				}
		}
?>