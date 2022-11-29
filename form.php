<?php
        session_start();
        if(!isset($_SESSION['user']));
		$usr = 	$_SESSION['user'];
?>

<?php

	include('conn.php');
	
		$u = "SELECT 'username' FROM `user`";
		$use = mysqli_query($con, $u);

		if(isset($_POST['save'])){
			
		$ST = $_POST['ST'];
		
		if (isset($_POST['tsk']) && $_POST['tsk'] == 'Other')
			{
				$task_name = $_POST["task_nam"];
			}
			else
			{
				$task_name = $_POST["tsk"];
			}
		
		
		if (isset($_POST['esc_g']) && $_POST['esc_g'] == 'Others')
			{
				$esc_grp = $_POST["es_g"];
			}
			else
			{
				$esc_grp = $_POST["esc_g"];
			}
		
		// $off = 4*60*60;
		$now = time(); //+$off;

		$id = date('YmdHi',$now);
		
		$now = time();
		$update_time = date('Y/m/d H:i',$now);
		
		$mail_reference = htmlspecialchars(($_POST["mail_ref"]), ENT_QUOTES);
		$updates = htmlspecialchars(($_POST["updt"]), ENT_QUOTES);
		// $history = ($update_time . " " . $updates . " User: " . $usr . ".</br>");
		$history = ($update_time . " " . " User: " . $usr . " " . $updates . ".</br>");

		$q = "INSERT INTO task (task_ID, ST, task_name, esc_grp, esc_time, severity, stat, end_t, mail_ref, history, updt, user) 
		VALUES ('$id','".$_POST["ST"]."','$task_name','$esc_grp','".$_POST["esc_time"]."','".$_POST["severity"]."', '".$_POST["sta"]."', '".$_POST["en_t"]."' ,'$mail_reference', '$history', '$updates','$usr')" ;	
		
		var_dump($q);
		
		$query = mysqli_query($con,$q)
					or die("Could not update".mysqli_error());
									
		$_SESSION['message'] = "Task Updated!";					
		$_SESSION['msg_type'] = "warning";				
					header('location: home.php');	
		
		}
		
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create</title>
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
				<a class="navbar-brand" href="home.php"> Create Task </a>
			</div>
			<a href="index.php" class="btn btn-primary btn-sm" role="button"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
		</nav>
		
	</header>
	
	<body>

		<form enctype="multipart/form-data" action="form.php" method="post">
			<div class="needs-validation">
				<h3 class="text-white">Creating Task</h3>
				<table class="table table-bordered table-hover">
					<thead class="thead-dark text-sm-center">	
						<tr>
							<th>ST</th> 
							<th>Task Name</th>
							<th>Escalation Group</th>
							<th>Escalated Time</th>
							<th>Severity</th>
							<th>Status</th>
							<th id="tim">ET</th>						
							<th>Mail Reference</th>
							<th>Task Update</th>
						</tr>		
					</thead>	
							<tbody class="table-primary">
								<tr>
									<td> 
										
										<div class="row" required>
											<div class='col-sm-12'>
												<input type='text' class="form-control" name="ST" id='datetimepicker1' />
											</div>
										</div>
									
								
									</td>					
									<td>
										<select id="slct" class="form-control selectpicker" data-live-search="true" name="tsk" required>
											<option selected>Choose...</option>
											<option>ERS Health check</option>
											<option>DPDP Charging/Connectivity issue/Delivery</option>
											<option>DPDP GUI Access Problem</option>
											<option>Sudden ERS SR droped</option>
											<option>Connectivity Problem with SMSC/NGW</option>
											<option>CMP Login, IP withelist, SMS sending Problem</option>
											<option>ERS Dump Missing</option>
											<option>MFS Bank Connectivity down, Cash IN and Out Problem (Mobicash Dashboard)</option>
											<option>GPAY, Train ticketing Issue</option>
											<option>GPAY DB Purging</option>
											<option>Link down issue with DMS</option>
											<option>Different error issue from DPDP for API hit</option>
											<option>SMS revenue drop, PPU success count drop issue for CP</option>
											<option>Alarms in vVSMSC</option>
											<option>Prepaid meter bill payment issue</option>
											<option>UMB To Other node high response time ESB,Bkash</option>
											<option>Sudden bandwidth Fall at IGW</option>
											<option>Less Data Trends</option>
											<option>Link Down With IGW</option>
											<option>Link Down With Akamai</option>
											<option>Poor Browsing SR</option>
											<option>Latency, Packet loss issue for FB</option>
											<option>Suddden fall in FNA traffic</option>
											<option>Suddden fall in DAC traffic</option>
											<option>Traffic reroute of SMS link</option>
											<option>Traffic reroute of ICX link for a Zone</option>
											<option>CIC reset & unblock</option>
											<option>E1 Check for TX path</option>
											<option>CS Node Hardware Replacement</option>
											<option>Link Down with IPBB</option>
											<option>IN Node Down, Hardware issue</option>
											<option>IN Node Dump missing</option>
											<option>OCC MAP discripency</option>
											<option>File Count Mismatch </option>
											<option>CDR missing</option>
											<option>Customer inappropriate charging complain</option>
											<option>SDP SOG interface Shut down</option>
											<option>ESB High Session at AIR</option>
											<option>Provisoing Related Issue</option>
											<option>Connectivity Problem between AIR and IT Nodes</option>
											<option>Customer Calling problem</option>
											<option>MO/MT, Push/Pull SMS problem</option>
											<option>Signalling link down</option>
											<option>Call Test Support with ICX/Other Operator</option>
											<option>RSG Access</option>
											<option>LAI Alarms</option>
											<option>FB DAC and GGC fault/performance issue</option>
											<option>Exception form IN And VAS Node For EDW</option>
											<option>IPTSP Call Block from GP</option>
											<option>High RTT, Retransmission rate for GGC</option>
											<option>Power Alarms escalation</option>
											<option>MUSIC360 GUI, Performance, Customer Complain</option>
											<option>SMS Link down with Other Operator</option>
											<option>Link down with Bank</option>
											<option>Corporate APN and Link Down in APN FW</option>
											<option>Roaming link fluctuations </option>
											<option>TINTIN Call, SMS, Internet Problem</option>
											<option>SIM services SR degradation</option>
											<option>CBVMP server issue, MNP issue, Shortcode unavailable</option>
											<option>Bluebox shut/unshut, BB inaccessible</option>
											<option>CSP issues, BICP Report, Cockpit Issue, Database Utilization, Purging, New user creation</option>
											<option>121 Service abnormality, 121 IVR down, IVR trace, OS log collection, Agent log, System Alarms in I2000</option>
											<option>GERP/Atlas/Wow Portal/Workday Slow /down Issue</option>
											<option>Roaming Support (Test, Complaints) with RP</option>
											<option>Signalling link down, Traffic drop, OTP problem</option>
											<option>Roaming SIM support</option>
											<option>Perceived Call SR drop due to overloads</option>
											<option>Contextual Marketing Platform (CMP) customer complaints</option>
											<option>Bit errors in BR links</option>
											<option>BDIX, Novonix, Bioscope Link down</option>
											<option>Vivo, Locationguru, Tonic etc. VPN/Access problem</option>
											<option>Core tools (Opam, Navigator, M2k, U2k, SQMS, E2E) inaccessible, data not updated</option>
											<option>MNP port in Issue</option>
											<option>FB, WhatSapp IP expiration, Page Navigation</option>
											<option>GGSN live trace</option>
											<option>AF issue, number block issue</option>
											<option>CBVMP/EC Connectivity issue</option>
											<option>Alarms in vU2000 (DSC, VM, UGW)</option>
											<option>ERS SR degradation, Package Activation</option>
											<option>Adhoc complaints, Genex/Digicon link down</option>
											<option>Intl. SMS delivery, SMS routing</option>
											<option>IPBB U2000 alarms (100+ IPBB nodes)</option>
											<option>NSS U2000 Alarms ( 82 CS, 15+ PS Core Nodes), KPI & SR Monitoring</option>
											<option>IN (164 nodes) alarms, CCN, OCC, SDP, AIR graph issue</option>
											<option>CVAS (230 VAS & Refill nodes) alarms, DPDP alarms, SMSC, DPDP, E2E UMB Graph abnormality</option>
											<option>LI connectivity issue</option>
											<option value="Other">Others</option>
										</select>
										
										<textarea class="form-control" id="txtarea" name="task_nam" rows="3"></textarea>		
									</td>
									<td>
										<select id="slect" class="form-control selectpicker" data-live-search="true" name="esc_g" required>
											<option selected>Choose...</option>
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
										<div class="row" required>
											<div class='col-sm-12'>
												<input type='text' class="form-control" name="esc_time" id='datetimepicker2' />
											</div>

										</div>
									<td>
										<select class="form-control" data-live-search="true" name="severity" required>
											<option selected>Choose...</option>
											<option>Critical</option>
											<option>Major</option>
											<option>Minor</option>
										</select>
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
												<input type='text' class="form-control" name="en_t" id='datetimepicker3'/>
											</div>
										</div>
									</td>
									<td><textarea rows="5" type="text" class="form-control" value="" name="mail_ref" required></textarea></td>
									<td><textarea rows="5" type="text" class="form-control" value="" name="updt" required></textarea></td>
								</tr>
							</tbody>
				</table>
							
							<button class="btn btn-primary" type="submit" name="save"> Submit </button><br>			
					
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
						$('#datetimepicker1').datetimepicker();
					});
				</script>
				
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker2').datetimepicker();
					});
				</script>
				
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker3').datetimepicker();
					});
				</script>
				
				<script type="text/javascript">
					$(function () {
					  $('.selectpicker').selectpicker();
					});
				</script>
				
				<script>
				
					$("#txtarea").hide();
					$( "#slct" ).change(function() {
					  var val = $("#slct").val();
						if(val=="Other"){
							$("#txtarea").show();
						} else {
							$("#txtarea").hide();
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
		
		
	</body>
</html>