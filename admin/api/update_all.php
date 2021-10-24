<?php
include "../../dbconfig.php";
$reg = $_GET['reg'];
$subject = $_GET['subject'];
$cia1 = $_GET['cia1'];
$cia2 = $_GET['cia2'];
$cia3 = $_GET['cia3'];
$endsem = $_GET['endsem'];

$update_query = "UPDATE exam SET cia1=?,cia2=?,cia3=?,endsem=? WHERE student_id=? AND subject=?";
$stmt   =  $con->prepare($update_query);
$stmt->bind_param('iiiiss',$cia1,$cia2,$cia3,$endsem,$reg,$subject);
$stmt->execute();

?>