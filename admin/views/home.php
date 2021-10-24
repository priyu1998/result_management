<?Php
session_start();
if(!isset($_SESSION['email'])){
    header("location:../../index.php");
}else{
    $admin = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../header.php' ?>
    <title>Home</title>
</head>
<body style="background: linear-gradient(
273deg, #0276a0, #10d4b085);">
<div class="container-fluid" style="max-height:100vh;">

<?php include "../../partials/navbar2.php"; ?> 

<div class="container" style="text-align:left;  margin-top:5%;width:100%;height:80vh;">
<label class="dashboard">Dashboard</label>
<div class="cardss" style="margin-top:40px;width:100%;display:flex;justify-content:center;align-items:center;">


<div class="cards" style="background-color:whitesmoke;">

<div class="card-img"   >
<img src="../images/add_student.png" style="width:90%;"/>

</div>

<div class="card-footer" style="padding-top:4px;padding-bottom:4px;display:flex;justify-content:center;width:100%;">
  <a href="add_student.php"  style="margin:0;padding:0;"><input type="button" class="btn" value="Add Student" style="padding-left:10px;padding-right:10px;font-size:20px;"></input></a>
</div>

</div>


<div class="cards" style="background-color:whitesmoke;">

<div class="card-img">
    <img src="../images/add_marks.jpg" style="width:90%;"/>
</div>

<div class="card-footer" style="padding-top:4px;padding-bottom:4px;display:flex;justify-content:center;width:100%;">
    <!-- <button type="button" class="btn" style="width:50%;font-size:20px;">Add Marks</button> -->
      <a href="add_marks.php"  style="margin:0;padding:0;"><input type="button" class="btn" value="Add Marks" style="padding-left:10px;padding-right:10px;font-size:20px;"></input></a>

</div>

</div>



<div class="cards" style="background-color:whitesmoke;">

<div class="card-img">
    <img src="../images/check1.png" style="width:90%;"/>
</div>

<div class="card-footer" style="padding-top:4px;padding-bottom:4px;display:flex;justify-content:center;width:100%;">
    <!-- <button type="button" class="btn" style="width:50%;font-size:20px;">View Marks</button> -->
    <a href="view_marks.php"  style="margin:0;padding:0;"><input type="button" class="btn" value="View Marks" style="padding-left:10px;padding-right:10px;font-size:20px;"></input></a>

</div>

</div>


<div class="cards" style="background-color:whitesmoke;">

<div class="card-img">
    <img src="../images/vs.jpg" style="width:90%; height:90%;"/>
</div>

<div class="card-footer" style="padding-top:4px;padding-bottom:4px;display:flex;justify-content:center;width:100%;">
    <!-- <button type="button" class="btn" style="width:50%;font-size:20px;">View Students</button> -->
    <a href="view_Student.php"  style="margin:0;padding:0;"><input type="button" class="btn" value="View Students" style="padding-left:10px;padding-right:10px;font-size:20px;"></input></a>

</div>

</div>


</div>
<br>
<br>
<br>
<br>
<?php include "../../partials/contact.php";?>

<?php include "../../partials/footer.php"; ?>

</body>
</html>


<?php
}
?>
<style>

    .card-img{
        margin:auto;
        display:flex;
        align-items:center;
        justify-content:center;
        /* background-color:red; */
         width:90%;height:90%;
    }
    .dashboard{
        /* background-color:red; */
        font-family:sans-serif;
       
        padding:20px;
        font-size:30px;
        font-weight:500;
    }
    .cards{
        height:350px;
    width:18em;
    margin:10px;
        
    }
    .cards:hover{
      transform:scale(1.06);
      cursor:pointer;
      cursor:hand;
        
    }
.cardss{
    min-height:500px;
   height:auto;
    flex-wrap:wrap;
    background-color: #0c0b0b54;
    width:90%;
}

.card-footer{
background-color:black;
}








