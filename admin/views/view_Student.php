<?php
session_start();
if(!isset($_SESSION['email'])){
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

include '../header.php';
include "../../partials/navbar2.php"; 
include '../../dbconfig.php'; 

$query = "SELECT * from students";
$stmt =  $con->prepare($query);
// $stmt->bind_param('ss',$reg,$sem);
$stmt->execute();
$result = $stmt->get_result();
echo '<div class="container" style="padding:30px;border-radius:22px;
background: #4d45456e; margin-top:8%;">';
if($result->num_rows>0){
    echo'
<label style="margin-left:43%;font-size:20px; float:left;">Students Details</label>

<table class="table" style="margin-top:20px;margin-bottom:20px;background: linear-gradient(18deg, #dcddef30,#fdff8d52);">
<thead style="font-size:18px;">
<th>Reg No.</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>


</thead>
<tbody>';
while($row = $result->fetch_assoc()){

    $reg = $row['student_id'];
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
  
    // $total = $cia1+$cia2+$cia3+$endsem;
    // $total1 = $total1 +$cia1+$cia2+$cia3+$endsem;
    echo '<tr style="font-size:18px;">
    <td>'.$reg.'</td>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$phone.'</td>
   

  </tr>';
    
}

echo '</tbody></table>




</div>';


}else{

    echo '<h1 class="text-center">No Data To Show</h1>
    </div>';
}
    }




?>
<?php include "../../partials/footer.php";?>
</body>
</html>

<style>
    body{


        background:linear-gradient(74deg, #1868c1, transparent);

    }
    </style>
