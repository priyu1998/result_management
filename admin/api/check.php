
<?php

include "../../dbconfig.php";
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



    echo $student_id;
    ?>