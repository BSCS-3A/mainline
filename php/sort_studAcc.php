<?php
//fetch.php
include "db_conn.php";
$checktime = "SELECT * FROM vote_event"; 
$DnT = $connect->query($checktime);
$rowx =  $DnT->fetch_row(); 
$column = array("student.student_id", "student.lname", "student.fname", "student.Mname","student.gender","student.bumail",  "student.grade_level","student.otp");
$query = "
 SELECT * FROM student";

$query .= " WHERE ";
if(isset($_GET["lvl"]) AND $_GET["lvl"] != 1)
{
 $query .= "grade_level = ".$_GET["lvl"]." AND";
}
else{
 $query .= "grade_level < '13' AND ";
}

if(isset($_GET["search"]["value"]))
{
 $query .= '(student_id LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR lname LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR Mname LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR fname LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR gender LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR bumail LIKE "%'.$_GET["search"]["value"].'%" ';
 $query .= 'OR otp LIKE "%'.$_GET["search"]["value"].'%") ';
}
if(isset($_GET["order"]))
{
 $query .= 'ORDER BY '.$column[$_GET['order']['0']['column']].' '.$_GET['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY student.student_id ASC ';
}

$query1 = '';

if($_GET["length"] != 1)
{
 $query1 .= 'LIMIT ' . $_GET['start'] . ', ' . $_GET['length'];
}


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result= mysqli_query($connect, $query. $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
    $now = date("Y-m-d G:i:s");
    $checkcandidate = "SELECT * FROM candidate WHERE student_id =".$row['student_id'];
    $candid = mysqli_query($connect,$checkcandidate);
    $xzzz = mysqli_fetch_array($candid);

 $sub_array = array();
 $sub_array[] = $row["student_id"];
 $sub_array[] = $row["lname"];
 $sub_array[] = $row["fname"];
 $sub_array[] = $row["Mname"];
 $sub_array[] = $row["gender"];
 $sub_array[] = $row["bumail"];
 $sub_array[] = $row["grade_level"];
 $sub_array[] = $row["otp"];
 if(isset($DTrow) && $now >= $rowx[1] && $now <= $rowx[2]){
 $sub_array[] = '<button class="btn btn-primary btn-xs EditBtn" data-title="Edit" data-toggle="modal"
    data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span> EDIT</button> 
                <button disabled class="btn btn-danger btn-xs DeleteBtn" data-title="Delete" data-toggle="modal"
    data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button> ';
 }
 else{
     if(isset($xzzz['student_id']) && $xzzz['student_id'] == $row['student_id']){
    $sub_array[] = '<button class="btn btn-primary btn-xs EditBtn" data-title="Edit" data-toggle="modal"
    data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span> EDIT</button>
                    <button disabled class="btn btn-danger btn-xs DeleteBtn" data-title="Delete" data-toggle="modal"
    data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button> ';
     }
     else{
        $sub_array[] = '<button class="btn btn-primary btn-xs EditBtn" data-title="Edit" data-toggle="modal"
        data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-edit"></span> EDIT</button> 
                        <button class="btn btn-danger btn-xs DeleteBtn" data-title="Delete" data-toggle="modal"
        data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button>';
     }
 }
 
                          
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM student";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_GET["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
