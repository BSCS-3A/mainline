<?php
    include_once "../db_conn.php";
    session_start();
    
    if(isset($_POST['uploadphoto'])){
        $candidateid = $_GET['id']; 
        $file = $_FILES['datafile']; 
        
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowedExt = array("jpg","png");
    
        if(in_array($fileActualExt,$allowedExt)){
            if($fileError === 0){
                if($fileSize < 500000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $url= "../../img/dp/".$fileNameNew;
                    $fileDestination = mysqli_real_escape_string($conn,$url);
                    
                    $sql = "UPDATE candidate SET photo = '$fileDestination' WHERE candidate.candidate_id = $candidateid";
                    $result = mysqli_query($conn,$sql);
                    if($result){//if query successful
                        if(move_uploaded_file($fileTmpName,$fileDestination)){//if upload file successfull
                            echo "success";
                            $_SESSION['message']="upload photo succesfull";
                            header("Location:../Admin_candidate.php?success=true");
                        }else{
                            $sqlremove = "UPDATE candidate SET photo = '' WHERE candidate.candidate_id = $candidateid";
                            mysqli_query($conn,$sqlremove); 
                            echo "failed to upload picture to website";   
                        }
                    }else{
                        echo mysqli_error($conn)."<br>";
                        echo "failed";
                    }
                    
                }else{
                    echo "file is too big";   
                }
            }else{
                echo "error uploading file";
            }
        }else{
            echo "file not supported!";
        }
        
    }
    if(isset($_POST['change'])){
        $change_id=$_GET['id'];
        header("Location:../Admin_candidate.php?change=".$change_id."");
    }
    if(isset($_POST['cancel'])){
        $_SESSION['message'] = "cancelled changing of photo";
        header("Location:../Admin_candidate.php");
    }



?>