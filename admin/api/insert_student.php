<?php include '../../dbconfig.php'; 


    
    
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['password'])&&isset($_POST['cpass'])){


    $generate_id = "SELECT max(student_id) as student_id FROM students";
    $stmt = $con->prepare($generate_id);
    $stmt->execute();
    $result2 = $stmt->get_result();
    if($result2->num_rows > 0){
    $row2 = $result2->fetch_assoc();
    $student_id = $row2['student_id'];
    $initial = "S";
    $x = substr($student_id,1);
    $increment = $x + 1;
    $student_id = $initial.$increment;
    }
    else{
    $student_id = "S1960";
    }


$name = $_POST['name'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpass = $_POST['cpass'];



$hash1 = password_hash($password,PASSWORD_BCRYPT);
$hash2 = password_hash($cpass,PASSWORD_BCRYPT);
if($password==$cpass){
echo $name.$email.$phone.$password.$cpass;
$query = "INSERT INTO students(student_id,name,email,phone,password,cpass) values(?,?,?,?,?,?)";
$stmt =  $con->prepare($query);
$stmt->bind_param('ssssss',$student_id,$name,$email,$phone,$hash1,$hash2);
$stmt->execute();
        }else{

            echo 'no';
        }
    }

// 
?>