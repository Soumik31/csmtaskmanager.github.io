<?php
        session_start();
        if(!isset($_SESSION['user']));
		$usr = 	$_SESSION['user'];
		


	include('conn.php');
		
		if( isset($_GET['edit']) )
		{
		$id = $_GET['edit'];
		$update = true;
		$g = " SELECT `task_ID`, `task_name`, `updt`, `history`, `esc_grp`, `stat`, `end_t`, `severity` FROM `task` WHERE task_ID = $id";
		$res= mysqli_query($con, $g);
		$ed= mysqli_fetch_array($res);
		
		$fo = $ed['task_ID'];
		$name = $ed['task_name'];
		$updt = $ed['updt'];
		$esc = $ed['esc_grp'];
		$stat  = $ed['stat'];
		$end_t = $ed['end_t'];
		$severity = $ed['severity'];
		$hist = $ed['history'];
		
		}
		
		
		if( isset($_POST['update']) )
		{
			
			
			if (isset($_POST['sev']) && $_POST['sev'] != 'ko')
			{
				$se = $_POST["sev"];
			}
			else
			{
				$se = $_POST["ser"];
			}
			
			if (isset($_POST['esc_g']) && $_POST['esc_g'] == 'choose')
				{
					$esc_grp = $_POST["escc"];
				}	
				elseif(isset($_POST['esc_g']) && $_POST['esc_g'] == 'Others')
				{
					$esc_grp = $_POST["es_g"];
				}
				else
				{
					$esc_grp = $_POST["esc_g"];
				}
			//{
				//$esc_grp = $_POST["escc"];
			//}
			
		
		$now = time();
		$update_time = date('Y/m/d H:i',$now);
		echo $update_time;

		$bo = $_POST['bo'];
		$histo = $_POST['histories'];
		$updates = htmlspecialchars(($_POST["upt"]), ENT_QUOTES);
		$total_history = ($histo . $update_time . " " . " User: " . $usr . " " . $updates . ".</br>");
		$total_histories = htmlspecialchars(($total_history), ENT_QUOTES);
		
		
		$sql     = "UPDATE `task` SET stat = '".$_POST["sta"]."', updt = '$updates', history = '$total_histories', esc_grp = '$esc_grp', end_t = '".$_POST["en_t"]."', severity = '$se', uuser = '$usr' WHERE task_ID = '$bo'";
		var_dump($sql);$res 	 = mysqli_query($con, $sql); 
                                    //or die("Could not update".mysqli_error());

		$_SESSION['message'] = "Task Updated!";					
		$_SESSION['msg_type'] = "warning";					
					header('location: home.php');		
		}
		
		// upto this
		
		if( isset($_POST['cancel']) ){
			header('location: home.php');
		}
		
?>	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
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
				<a class="navbar-brand" href="home.php"> Edit Task </a>
			</div>
			<a href="index.php" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
		</nav>
		
	</header>
	
	<body>

		<form enctype="multipart/form-data" action="action.php" method="post">
			<div class="container needs-validation">
				<h3 class="text-white">Editing Task</h3>
				<table class="table table-bordered table-hover">
					<thead class="thead-dark text-sm-center">	
						<tr>

							<th>Task Name</th> 
							<th>Task Update</th> 
							<th>Escalation Group</th> 
							<th>Status</th>
							<th id="tim">ET</th>
							<th>Severity</th>
						</tr>		
					</thead>	
							<tbody class="table-primary">
								<tr>
										<input type="hidden" name="histories" value="<?php echo $hist; ?>" >
										<input type="hidden" name="bo" value="<?php echo $fo; ?>" >
									<td> 
										<?php echo $name ?>
									</td>
									<td>
										<textarea rows="5" type="text" class="form-control" name="upt"></textarea>
									</td>
									<td>				
										<input type="hidden" name="escc" value="<?php echo $esc; ?>" >
										<select id="slect" class="form-control selectpicker" data-live-search="true" name="esc_g" required>
											<option selected value="choose">Choose...</option>
											<option>VAS & DO</option>
											<option>IN</option>
											<option>Content Provider</option>
											<option>FS Operations</option>
											<option>Link3</option>
											<option>Metro Net</option>
											<option>ADN</option>
											<option>Summit Communications</option>
											<option>BDCOM</option>
											<option>Telnet</option>
											<option>Wipro</option>
											<option>Level3</option>
											<option>VDSO</option>
											<option>RO</option>
											<option>TNO</option>
											<option>RNBM</option>
											<option>Facebook</option>
											<option>Google</option>
											<option>ICX</option>
											<option>Summit</option>
											<option>TCM</option>
											<option>Other Operator</option>
											<option>Ericsson</option>
											<option>I & C</option>
											<option>Corporate Affairs- Inter Connection</option>
											<option>Assurance</option>
											<option>On-mobile</option>
											<option>Bank</option>
											<option>TGS</option>
											<option>ATL</option>
											<option>Election Commission</option>
											<option>Synesis IT</option>
											<option>ShebaTech</option>
											<option>Huawei</option>
											<option>Mango</option>
											<option>RP</option>
											<option>IR</option>
											<option>CNP</option>
											<option>CVM</option>
											<option>BDIX</option>
											<option>NTTN</option>
											<option>Digi Jadoo</option>
											<option>Bongo</option>
											<option>OSS</option>
											<option>ISEM</option>
											<option>RAFM</option>
											<option>Digital Partnership</option>
											<option>Nokia</option>
											<option>EC Connectivity Provider</option>
											<option>Tonic</option>
											<option>Digital Channels</option>
											<option>Ezzy Support</option>
											<option value="Others">Others</option>	
										</select>	
										
										<textarea class="form-control" id="txarea" name="es_g" rows="3"></textarea>
									</td>
									<td>
										<select id="sct" class="form-control" data-live-search="true" name="sta" required>
											<option>Pending</option>
											<option value="Done">Done</option>
										</select>	
									</td>
									<td id="til">
										<div class="row" required>
											<div class='col-sm-12'>
												<input type='text' class="form-control" name="en_t" placeholder="" id='datetimepicker3'/>
											</div>
										</div>
									</td>
									<td>
										<input type="hidden" name="ser" value="<?php echo $severity; ?>" >
										<select class="form-control" data-live-search="true" name="sev" required>
											<option value="ko" selected>Choose...</option>
											<option>Critical</option>
											<option>Major</option>
											<option>Minor</option>
										</select>
										<?php echo $severity; ?>
									</td>
								</tr>
							</tbody>
				</table>
							
							<button class="btn btn-primary" type="submit" name="update"> Update </button>
							<button class="btn btn-primary" type="submit" name="cancel"> Cancel </button> 		
					
			</div>
	
		</form>	
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
		<script src="build/js/bootstrap-datetimepicker.min.js"></script>
		
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker3').datetimepicker();
					});
				</script>
				
				<script>
				
					$("#tim").hide();
					$("#til").hide();
					$( "#sct" ).change(function() {
					  var val = $("#sct").val();
						if(val=="Done"){
							$("#tim").show();
							$("#til").show();
						} else {
							$("#tim").hide();
							$("#til").hide();
						}
					});
				
				</script>
				
				<script>
				
					$("#txarea").hide();
					$( "#slect" ).change(function() {
					  var val = $("#slect").val();
						if(val=="Others"){
							$("#txarea").show();
						} else {
							$("#txarea").hide();
						}
					});
				
				</script>
		
	</body>

</html>