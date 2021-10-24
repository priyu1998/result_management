<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['admin_name']);
unset($_SESSION['student_id']);
header("location:index.php");

?>