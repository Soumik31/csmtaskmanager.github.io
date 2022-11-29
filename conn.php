<?php
$con=mysqli_connect('127.0.0.1','root','') or die('Not Connected');

mysqli_select_db($con,'csm_task_creater') or die('No Database Found'); //task is database name
?>

