<?php session_start();
if(!isset($_SESSION['email'])){
    header("location:../../index.php");
}
else{ 
include '../header.php';?>
<?php include '../../partials/navbar2.php';?>

<div class="containers" style="display:flex;margin-left:auto;
margin-right:auto;margin-top:5%;width:90%;padding:40px; ">

<div class="card" style="margin-left:auto;margin-top:auto;margin-right:auto;margin-bottom:auto;">
                <div class="cardheader" style="display:flex; justify-content:center;background-color:black; color:white;padding:5px;">
                <span>View Marks</span></div>
                <form action="../api/update_marks.php" action="GET" id="student_form">            
                <div class="card-body">
               
                <div class="form-control">
                <label class="form_label" for="name">Reg no</label>
                <input class="form_input" onchange="regFunction(this.value)"  type="text" id ="reg" name="reg"></input>
                </div>

                <div class="form-control">
                <label class="form_label" for="sem">Semester</label>
                <select id="sem" name="sem" class="form_input">
     
    
                    <?php $query = "SELECT * FROM subject group by sem";
                    include 'dbconfig.php';?>
                </select>    
                </div>

                
    </div>
<div class="btn" style="padding:10px;background-color:black;color:white; display:flex; justify-content:center;">
<button class="btn" type="submit" id="rrr" name="view_marks" style="font-size:22px;padding:5px;">View Marks</button>
</div>
</form>


</div>
</div>
<br>
<br>
<br>
<br>
<br>
<!-- <?php include '.././partials/contact.php';?> -->

<?php include '../../partials/footer.php'; }?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <style>
        body{

         background:linear-gradient(74deg, #1868c1, transparent);
        }
    </style>
<script>
 
    function regFunction(val){
    
    
        var reg_no = val; 
        $.ajax({

            url:"./filter.php",
            type:"GET",
            data:{reg_no:reg_no},

            success:function(response){
                $('#sem').html(response);
         },

});
        
 }
    </script>


                 
          
  