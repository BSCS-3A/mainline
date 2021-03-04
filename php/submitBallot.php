<?php  
    $pos_id = 90;
    if (isset($_POST['submit'])){
        if(!empty($_POST[$pos_id])){
            echo "<br>Voted: <br>";
            while($pos_id > 80){
                echo "Position $pos_id: ", $_POST[$pos_id], "<br>";
                $pos_id-=10;
            }
        }
        else{
            echo "none";
        }
    }
?>