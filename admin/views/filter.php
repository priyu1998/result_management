<?php
include "../../dbconfig.php"; 
$reg_no = $_GET['reg_no'];
$query = "SELECT class_id FROM exam WHERE student_id=? group by class_id";
$stmt = $con->prepare($query);
$stmt->bind_param('s',$reg_no);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    
    $class_id = $row['class_id'];

echo ' <option>'.$class_id.'</option>';

} 

?>