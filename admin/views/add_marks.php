<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location:index.php");
}else{


include '../header.php';?>
<?php include '../../partials/navbar2.php';?>
<div class="containers" style="display:flex;margin-left:auto;
margin-right:auto;margin-top:1.6%;width:90%;padding:40px; ">
<!-- <label for="head"><span>Sign Up</span></label> -->
<!-- <div class="content" style="margin-left:30px;height:100%;width:60%;">
<p style="color:white;font-size:30px;">Welcome To Result Management</p>
<p style="color:white;margin-left:30%;margin-top:20%; font-size:30px;">Manage Your Test Scores</p>

<p style="color:white;float:right;margin-top:20%; font-size:50px;">Get Started</p>

</div> -->
<div class="card" style="margin-left:auto;margin-top:auto;margin-right:auto;margin-bottom:auto;">
                <div class="cardheader" style="display:flex; justify-content:center;background-color:black; color:white;padding:5px;">
                <span>Add Marks</span></div>
                <form id="student_form">            
                <div class="card-body">
               
                <div class="form-control">
                <label class="form_label" for="name">Reg no</label>
                <input class="form_input" type="text" id ="reg" name="reg"></input>
                </div>

                <div class="form-control">
                <label class="form_label" for="name">Subjects</label>
                <select id="sub" name="sub" class="form_input">
                    <?php $query = "SELECT * FROM subject";
                    include '../../dbconfig.php';
                        $stmt = $con->prepare($query);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    while($row = $result->fetch_assoc()){
                                                 ?>
                <option><?php echo $row['subject_id']?>
                </option>
                <?php    }
                ?>
                </select>    
                </div>
<!-- 
                <div class="form-control">
                <label class="form_label" for="name">Subjects</label>
                <select class="form_input">
                <option value="cia1">CIA-1</option>
                <option value="cia2">CIA-2</option>
                <option value="cia3">CIA-3</option>
                <option value="endsem">END SEM</option>
                </select>    
                </div> -->

                <div class="form-control">
                <label class="form_label" for="name">CIA-1</label>
                <input class="form_input" type="text" id="cia1" name="cia1"></input>
                </div>


                <div class="form-control">
                <label class="form_label" for="name">CIA-2</label>
                <input class="form_input" type="text" id="cia2" name="cia2"></input>
                </div>

                <div class="form-control">
                <label class="form_label" for="name">CIA-3</label>
                <input class="form_input" type="text" id="cia3" name="cia3"></input>
                </div>



                <div class="form-control">
                <label class="form_label" for="name">END SEM</label>
                <input class="form_input" type="text" id="endsem" name="endsem"></input>
                </div>
                
    </div>
<div class="btn" style="padding:10px;background-color:black;color:white; display:flex; justify-content:center;">
<button class="btn" type="button" id="rr" name="add_marks" style="font-size:22px;padding:5px;">Add Now</button>
</div>
</form>


</div>
</div>
<!-- <br> -->
<!-- <br>
<br>
<br>
<br> -->
<!-- <?php include '../../partials/contact.php';?> -->

<?php include '../../partials/footer.php';?>
<?php
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$('#rr').click(function(){

var reg = $('#reg').val();
var sub = $('#sub').val();
var cia1 = $('#cia1').val();
var cia2 = $('#cia2').val();
var cia3 = $('#cia3').val();
var endsem = $('#endsem').val();


alert(sub);
 $.ajax({

url: "../api/insert_marks.php",
type:"GET",
 data:{reg:reg,sub:sub,cia1:cia1,cia2:cia2,cia3:cia3,endsem:endsem},
success:function(response){
    $('#reg').val("");
    $('#sub').val("");
    $('#cia1').val("");
    $('#cia2').val("");
    $('#cia3').val("");
    $('#endsem').val("");
  

},
});

});
    </script>
    <style>
        body{

         background:linear-gradient(74deg, #1868c1, transparent);
        }

        
        </style>