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
if(isset($_GET['view_marks'])){

if(isset($_GET['reg'])&&isset($_GET['sem'])){

$reg = $_GET['reg'];
$sem = $_GET['sem'];

$query = "SELECT * from exam where student_id=? AND class_id=?";
$stmt =  $con->prepare($query);
$stmt->bind_param('ss',$reg,$sem);
$stmt->execute();
$result = $stmt->get_result();
echo '<div class="container" style="padding:30px;border-radius:22px;
background: #4d45456e; margin-top:8%;">';
if($result->num_rows>0){
echo '<div class="label_field">
<label id="subject" name="subject">Subject</label>
</div>


<div class="label_field">
<label id="subject" name="subject">CIA1</label>
</div>

<div class="label_field">
<label id="subject" name="subject">CIA2/MIDSEM</input>
</div>


<div class="label_field">
<label id="subject" name="subject">CIA3</input>
</div>


<div class="label_field">
<label id="subject" name="subject">ENDSEM</input>
</div><form>';
$i=1;
    while($row = $result->fetch_assoc()){
        
        $subject_id = $row['subject'];
        $cia1 = $row['cia1'];
        $cia2 = $row['cia2'];
        $cia3 = $row['cia3'];
        $endsem = $row['endsem'];

echo '


<input class="reg" type="text" hidden="true" id="regn'.$i.'" name="regn" value="'.$reg.'"></input>

<div class="form_field">
<input class="sub" type="text" id="subject'.$i.'" name="subject" value="'.$subject_id.'"></input>
</div>


<div class="form_field">
<input type="text" id="cia1'.$i.'" name="cia1" value="'.$cia1.'"></input>
</div>


<div class="form_field">
<input type="text" id="cia2'.$i.'" name="cia2" value="'.$cia2.'"></input>
</div>




<div class="form_field">
<input type="text" id="cia3'.$i.'" name="cia3" value="'.$cia3.'"></input>
</div>




<div class="form_field">
<input type="text" id="endsem'.$i.'" name="endsem" value="'.$endsem.'"></input>
</div>';
  $i++;  }
}

echo '<button id="ubtn" class="butt" type="button" style="width:100px;padding:5px;margin-left:45%;margin-top:20px;font-size:18px;">Update</button>
</form></div>';

include "../../partials/footer.php";?>
</body>
</html>
<?php
}
}
}
?>
<style>
input{

font-size:17px;
padding:5px;
}
    .form_field{

        display:inline;
    }
    .label_field{
    font-size:18px;
        display:inline;
        padding-left:60px;
        padding-right:88px;
        /* padding-right:100px; */

    }
    body{


        background:linear-gradient(74deg, #1868c1, transparent);

    }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script>

$('#ubtn').click(function(){
let i=1;
while(i<=6){
    var reg = $("#regn"+i+"").val();

var subject = $("#subject"+i+"").val();
var cia1 = $("#cia1"+i+"").val();
var cia2 = $("#cia2"+i+"").val();
var cia3 = $("#cia3"+i+"").val();
var endsem = $("#endsem"+i+"").val();



$.ajax({


url:"./update_all.php",
type:"GET",
data:{reg:reg,subject:subject,cia1:cia1,cia2:cia2,cia3:cia3,endsem:endsem},
success:function(response){


}


});



i=i+1;
}
alert("SuccessFUl");

});

</script>
