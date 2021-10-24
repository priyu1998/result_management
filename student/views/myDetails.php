<?php
include "../../dbconfig.php";
session_start();
if(!isset($_SESSION['student_id'])){
header("location:index.php");
}else{
$uid = $_SESSION['student_id'];
include '../partials/header.php';?>
<?php include '../partials/navbar2.php';?>
<div class="containers" style="display:flex;margin-left:auto;
margin-right:auto;margin-top:5%;width:90%;padding:40px; ">

<?php 
$mydetail = "SELECT * FROM students where student_id =?";
$stmt = $con->prepare($mydetail);
$stmt->bind_param('s',$uid);
$stmt->execute();
$result  = $stmt->get_result();
if($result->num_rows >0){
$row = $result->fetch_assoc();
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$id = $row['student_id'];
}

echo '
<div class="contanier" style="border-radius:22px;margin-left:auto;margin-right:auto;padding:20px;margin-top:4%;width:60%;background-color:#20171759;">
<span Style="margin-left:44%; font-size:30px;">My Details</span>


<table class="table" style="width:70%;margin-left:auto;margin-right:auto;padding:10px;margin-top:2%;">

<tbody style="width:100%;background: linear-gradient(157deg, #a3caccc7, transparent);">




<tr style="font-size:22px;">
<th style="padding:14px;">Reg No.</th>
<th>'.$id.'</th>
</tr>


<tr style="font-size:22px;">
<th style="padding:14px;">Name</th>
<th>'.$name.'</th>
</tr>

<tr style="font-size:22px;">
<th style="padding:14px;">Email</th>
<th>'.$email.'</th>
</tr>


<tr style="font-size:22px;">
<th style="padding:14px;">Phone</th>
<th>'.$phone.'</th>
    

    


</tbody>
</table></div>';
?>

</div>
<!-- <?php include '../partials/contact.php';?> -->

<?php include '../partials/footer.php';}?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        body{

         background:linear-gradient(74deg, #1868c1, transparent);
        }

        
        </style>
        