<?php
session_start();
if(!isset($_SESSION['email'])){
header("location:../../index.php");
}else{

include '../header.php';?>
<?php include '../../partials/navbar2.php';?>
<div class="containers" style="display:flex;margin-left:auto;
margin-right:auto;margin-top:5%;width:90%;padding:40px; ">

<div class="card" style="margin-left:auto;margin-top:auto;margin-right:auto;margin-bottom:auto;">
                <div class="cardheader" style="display:flex; justify-content:center;background-color:black; color:white;padding:5px;">
                <span>Add Student</span></div>
                <form id="student_form">            
                <div class="card-body">
               
                <div class="form-control">
                <label class="form_label" for="name">Name</label>
                <input class="form_input" type="text" id ="name"name="name"></input>
                </div>

                <div class="form-control">
                <label class="form_label" for="name">Email</label>
                <input class="form_input" type="text" id="email" name="email"></input>
                </div>


                <div class="form-control">
                <label class="form_label" for="name">Phone</label>
                <input class="form_input" type="text"id="phone" hone"></input>
                </div>


                <div class="form-control">
                <label class="form_label" for="name">Password</label>
                <input class="form_input" type="text" id="password" name="password"></input>
                </div>


                <div class="form-control">
                <label class="form_label" for="name">Repeat Password</label>
                <input class="form_input" type="text" id="cpass" name="cpass"></input>
            </div>
                
    </div>
<div class="btn" style="padding:10px;background-color:black;color:white; display:flex; justify-content:center;">
<button class="btn" type="button" id="r" name="add" style="font-size:22px;padding:5px;">Add Now</button>
</div>
</form>


</div>
</div>
<br>
<br>
<br>
<br>
<br>
<!-- <?php include '../../partials/contact.php';?> -->

<?php include '../../partials/footer.php';}?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$('#r').click(function(){

var name = $('#name').val();
var email = $('#email').val();
var phone =$('#phone').val();
var password = $('#password').val();
var cpass = $('#cpass').val();


alert(password);
 $.ajax({

url:"../api/insert_student.php",
type:"POST",
 data:{name:name,email:email,phone:phone,password:password,cpass:cpass},
success:function(data){
    $('#name').val("");
    $('#email').val("");
    $('#phone').val("");
    $('#password').val("");
    $('#cpass').val("");
},
});

});
    </script>
    <style>
        body{

         background:linear-gradient(74deg, #1868c1, transparent);
        }

        
        </style>
        