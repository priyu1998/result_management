<?php include 'dbconfig.php'; 
if(isset($_GET['register'])){

if(isset($_GET['name'])&&isset($_GET['email'])&&isset($_GET['phone'])&&isset($_GET['password'])&&isset($_GET['cpass'])){



$name = $_GET['name'];
$email= $_GET['email'];
$phone = $_GET['phone'];
$password = $_GET['password'];
$cpass = $_GET['cpass'];





$hash1 = password_hash($password,PASSWORD_BCRYPT);
$hash2 = password_hash($cpass,PASSWORD_BCRYPT);
if($password==$cpass){
echo $name.$email.$phone.$password.$cpass;
$query = "INSERT INTO admin(admin_name,email,phone,password,cpass) values(?,?,?,?,?)";
$stmt =  $con->prepare($query);
$stmt->bind_param('sssss',$name,$email,$phone,$hash1,$hash2);
$stmt->execute();
header("location:index.php");        
}else{

    header("location:index.php");

}
    }

}

else if(isset($_GET['login'])){


    if(isset($_GET['email'])&&isset($_GET['password'])){



        $email  = $_GET['email'];
        $password = $_GET['password'];
        $type = substr($email,0, 1);

        if($type=='S'){


            $search_user = "SELECT * from students where student_id=?";
            $stmt = $con->prepare($search_user);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();


            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $uid = $row['student_id'];
                $demail = $row['email'];
                $dpassword = $row['password'];
                $uname = $row['name'];
                
                
                $verify = password_verify($password,$dpassword);
                if($verify){
                header('location:./student/views/home.php');
                session_start();
                $_SESSION['student_id'] = $uid;
                $_SESSION['email'] = $demail;
                $_SESSION['name'] = $uname; }
                        }


        }else if($type=="T"){
        
        
        
            $search_user = "SELECT * from teachers where teacher_id=?";
            $stmt = $con->prepare($search_user);
            $stmt->bind_param('s',$tid);
            $stmt->execute();
            $result = $stmt->get_result();


            if( $result->num_rows > 0){
                $row = $result->fetch_assoc();
                $tid = $row['teacher_id'];
                $demail = $row['email'];
                $dpassword = $row['password'];
                $uname = $row['name'];
                
                
                $verify = password_verify($password,$dpassword);
                if($verify){
                header('location:./teachers/views/home.php');
                session_start();
                $_SESSION['teacher_id'] = $tid;
                $_SESSION['email'] = $demail;
                $_SESSION['name'] = $uname; }
                        }
        
        
        
    }
    else{

            $search_user = "SELECT * from admin where email=?";
            $stmt = $con->prepare($search_user);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();


            if( $result->num_rows > 0){
                $row = $result->fetch_assoc();
                $demail = $row['email'];
                $dpassword = $row['password'];
                $uname = $row['admin_name'];
                
                
                $verify = password_verify($password,$dpassword);
                if($verify){
                header('location:./admin/views/home.php');
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['admin_name'] = $uname; }
                }

        }



       



    }
}
?>