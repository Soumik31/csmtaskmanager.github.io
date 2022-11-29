<?php
        session_start();
        if(!isset($_SESSION['user']));
?>
<?php

	if(isset($_POST['search']))
	{
		$startdate = $_POST['startdate'];
		$lastdate = $_POST['lastdate'];

		$query = "SELECT * FROM `task` WHERE `ST` BETWEEN '$startdate' AND '$lastdate' ";
		$search_result = filterTable($query);
		
	}
	 else {
		$query = "SELECT * FROM `task`";
		$search_result = filterTable($query);
	}

	// function to connect and execute the query
	function filterTable($query)
	{
		$connect = mysqli_connect("127.0.0.1","root","", "csm_task_creater");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}

?>


	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search by date</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">			
	<meta name="viewport" content="width=device-width, initial-scale=1">		   
	<meta name="csrf-token" content="HmodUpT3Rmmfqssc9MKEuKy7nanhPAocHShWizsz">
	<meta name="HandheldFriendly" content="true">
	
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/back.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="build/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<header>
		
		<nav class="navbar navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="home.php"> Search Task </a>
			</div>
			<a href="index.php" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-log-in"></span>Logout</a>		
		</nav>
		
</header>	
	
<body>
	<form action="searchdate.php" method="post">
		<div class="input-group mb-3">
		  
			<input type="text" id="startdatepicker" width="35%" name="startdate" class="form-control" placeholder="From">
			<input type="text" id="lastdatepicker" width="35%" name="lastdate" class="form-control" placeholder="To">
			<div class="input-group-prepend">
				<input class="btn btn-outline-secondary bg-dark text-white" type="submit" name="search" value="Search by Date">
			</div>
		</div>


		<!--<div class="container">-->
			<h3 class="text-white"> All Tasks </h3>
			
			<table id="projectSpreadsheet" class="table table-bordered table-hover">
				<thead class="thead-dark text-sm-center">	
					<tr>
						<th>Task ID</th>
						<th>ST</th>
						<th>Task Name</th>
				<!--	<th>Pending Time</th>	-->
						<th>Escalation Group</th>
						<th>Escalation Time</th>
						<th>Mail Reference</th>
						<th>Task Update</th>
						<th>Status</th>
						<th>ET</th>
						<th>Severity</th>
						<th>User</th>
					</tr>		
				</thead>	
				<tbody class="table-primary" id="tbodyid">
	
							<?php while($row = mysqli_fetch_array($search_result)):	?>
							
								<tr class="text-center">
								 <td> <?php echo $row['task_ID'];  ?> </td>
								 <td> <?php echo $row['ST'];  ?> </td>
								 <td> <?php echo $row['task_name'];  ?> </td>							 
						<!--	 <td> < ?php echo $pendingD . "d " . $pendingH . "h " . $pendingM . "m";  ?> </td>	-->
								 <td> <?php echo $row['esc_grp'];  ?> </td>
								 <td> <?php echo $row['esc_time'];  ?> </td>						 
								 <td> <?php echo $row['mail_ref'];  ?> </td>
								 <td> <?php echo $row['updt'];  ?> </td>
								 <td> <?php echo $row['stat'];  ?> </td>
								 <td> <?php echo $row['end_t'];  ?> </td>
								 <td> <?php echo $row['severity'];  ?> </td>
								 <td> <?php echo $row['user'];  ?> </td>
								</tr> 
							
							<?php endwhile;?>

				</tbody>	
			</table>
		<!--</div>-->
	</form>	
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
		<script src="build/js/bootstrap-datetimepicker.min.js"></script>
		<script src="export.js"></script>
	
	
		<script type="text/javascript">
			$(function () {
				$('#startdatepicker').datetimepicker();
			});
		</script>
		<script type="text/javascript">
			$(function () {
				$('#lastdatepicker').datetimepicker();
			});
		</script>
		
		<a href="#" id="xx" class="btn btn-info float-right">Export Table data into Excel</a>

</body>		
</html>