<?php include '../../dbconfig.php'; 

if(isset($_GET['reg'])&&isset($_GET['sub'])&&isset($_GET['cia1'])&&isset($_GET['cia2'])&&isset($_GET['cia3'])&&isset($_GET['endsem'])){

$reg = $_GET['reg'];
$sub = $_GET['sub'];
$cia1 = $_GET['cia1'];
$cia2 = $_GET['cia2'];
$cia3 = $_GET['cia3'];
$endsem = $_GET['endsem'];

$query1 = "SELECT * FROM subject WHERE subject_id=?";
$stmt =  $con->prepare($query1);
$stmt->bind_param('s',$sub);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$semester = $row['sem'];
If($semester!=NULL){


$semester ="3BTIT";

$query = "INSERT INTO exam(student_id,subject,cia1,cia2,cia3,endsem,class_id) values(?,?,?,?,?,?,?)";
$stmt =  $con->prepare($query);
$stmt->bind_param('ssiiiis',$reg,$sub,$cia1,$cia2,$cia3,$endsem,$semester);
$stmt->execute();

    }
} 
?>
