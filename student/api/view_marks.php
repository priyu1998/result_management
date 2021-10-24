<?php
session_start();
if(!isset($_SESSION['student_id'])){
header("location:../../index.php");
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Marks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    


<?php 

include '../partials/header.php';
include "../partials/navbar2.php"; 
include '../../dbconfig.php'; 
if(isset($_GET['view_marks'])){

if(isset($_GET['reg'])&&isset($_GET['sem'])){

$reg = $_GET['reg'];
$sem = $_GET['sem'];
$total1=0;

$count= "select count(subject) as count from exam where student_id=? AND class_id=?";
$stmt =  $con->prepare($count);
$stmt->bind_param('ss',$reg,$sem);
$stmt->execute();
$result3 = $stmt->get_result();
$crow = $result3->fetch_assoc();
$count = $crow['count'];
$count = $count *100;
$query1 = "select * from students where student_id=?";
$stmt =  $con->prepare($query1);
$stmt->bind_param('s',$reg);
$stmt->execute();
$result1 = $stmt->get_result();
$row1 = $result1->fetch_assoc();
$name = $row1['name'];


$query = "SELECT * from exam where student_id=? AND class_id=?";
$stmt =  $con->prepare($query);
$stmt->bind_param('ss',$reg,$sem);
$stmt->execute();
$result = $stmt->get_result();
echo '<div class="container" style="padding:30px;border-radius:22px;
background: #4d45456e; margin-top:8%;">';
if($result->num_rows>0){
    echo'
<label style="font-size:20px; float:left;"> Name of Candidate - '.$name.'</label>
<label style="font-size:20px;margin-left:10%;" >Class - '.$sem.'</label>
<table class="table" style="margin-top:20px;margin-bottom:20px;background: linear-gradient(18deg, #dcddef30,#fdff8d52);">
<thead style="font-size:18px;">
<th>Subject</th>
<th>CIA-1</th>
<th>CIA-2</th>
<th>CIA-3</th>
<th>END-SEM</th>
<th>Total</th>

</thead>
<tbody>';
while($row = $result->fetch_assoc()){

    $reg = $row['student_id'];
    $subject = $row['subject'];
    $cia1 = $row['cia1'];
    $cia2 = $row['cia2'];
    $cia3 = $row['cia3'];
    $endsem = $row['endsem'];
    $total = $cia1+$cia2+$cia3+$endsem;
    $total1 = $total1 +$cia1+$cia2+$cia3+$endsem;
    echo '<tr style="font-size:18px;">
    <td>'.$subject.'</td>
    <td>'.$cia1.'</td>
    <td>'.$cia2.'</td>
    <td>'.$cia3.'</td>
    <td>'.$endsem.'</td>
    <td>'.$total.'</td>

  </tr>';
    
}
$percent = intval($total1/$count*100);
if($percent>=40&&$percent<=59){
    $status = "PASS";
    $pass_class= "Second Class";
}else if($percent>=60){
$status = "PASS";
$pass_class = "First Class";
}
else{
    $status ="Fail";
    $pass_class="Third Class";

}
echo '</tbody></table>
<label style="font-size:20px; float:left;"> Total Marks - '.$total1.'/'.$count.'</label>
<label style="font-size:20px;margin-left:10%;" >Percentage - '.$percent.' %</label>
<label style="font-size:20px;margin-left:10%;" >Status - '.$status.'</label>
<label style="font-size:20px;margin-left:10%;" >Division - '.$pass_class.'</label>



</div>';


}else{

    echo '<h1 class="text-center">No Data To Show</h1>
    </div>';
}
    }
}

else{

    echo 'No Data';
}

?>
<?php include "../partials/footer.php";?>
</body>
</html>
<?php
}
?>
<style>
    body{


        background:linear-gradient(74deg, #1868c1, transparent);

    }
    </style>
