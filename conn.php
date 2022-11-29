<?php
$con=mysqli_connect('localhost','root','') or die('Not Connected');

mysqli_select_db($con,'csm_task_creater') or die('No Database Found'); //task is database name
?>

