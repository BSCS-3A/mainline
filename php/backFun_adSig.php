<?php
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection, 'buceils_db');
include "db_conn.php";

$sigfname = $_POST['sigfname'];
$siglname = $_POST['siglname'];
$sigpos = $_POST['sigpos'];
$file = file_get_contents('../other/sig_array.txt');
$decode = json_decode($file, true);


$fname_query = "SELECT * FROM admin_table WHERE admin_fname = '$sigfname'";
$lname_query = "SELECT * FROM admin_table WHERE admin_lname = '$siglname'";
$position_query = "SELECT * FROM admin_table WHERE comelec_position = '$sigpos'";

$fname_query_run = mysqli_query($connection, $fname_query);
$lname_query_run = mysqli_query($connection, $lname_query);
$position_query_run = mysqli_query($connection, $position_query);

  if(mysqli_num_rows($fname_query_run) >0){
    if(mysqli_num_rows($lname_query_run) >0){
      if(mysqli_num_rows($position_query_run) >0){


        $sql = "SELECT * FROM admin_table WHERE admin_lname ='$siglname'";
        $result = mysqli_query($connection,$sql);
          if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $source = $row['admin_id'];
              $string =  $decode .",". $source;
              $encodedString = json_encode($string);
              file_put_contents('sig_array.txt',($encodedString));
              echo"<script language='javascript'>
              alert('Signatory Added');
              </script>
              ";
            }
          }

      }
      else{
        echo"<script language='javascript'>
        alert('Position does not exist');
        </script>
        ";
      }
    }
    else{
      echo"<script language='javascript'>
      alert('Last Name does not exist');
      </script>
      ";
    }
  }
  else{
    echo"<script language='javascript'>
    alert('First Name does not exist');
    </script>
    ";
  }

?>
