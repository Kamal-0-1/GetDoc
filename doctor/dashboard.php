<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>GetDoc - Dashboard</title>
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->


 <?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>



<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
	<div class="wrap">
		<section class="app-content">
				
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<!-- <span class="card-img-top pull-right"><i class="fa fa-plus" style="font-size:24px"></i></span> -->
							<h4 class="card-title">Total New Appointments</h4>
							<?php 
								$docid=$_SESSION['damsid'];;
								$sql ="SELECT * from  tblappointment where Status is null && Doctor=:docid ";
								$query = $dbh -> prepare($sql);
								$query-> bindParam(':docid', $docid, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$totnewapt=$query->rowCount();
							?>
							<h3 class="card-text"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totnewapt);?></span></h3>
							<a href="new-appointment.php" class="btn btn-primary">View Detail</a>
						</div>
					</div><!-- .widget -->
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<!-- <span class="card-img-top pull-right"><i class="fa fa-check" style="font-size:24px"></i></span> -->
							<h4 class="card-title">Total Approved Appointments</h4>
							<?php 
								$docid=$_SESSION['damsid'];;
								$sql ="SELECT * from  tblappointment where Status='Approved' && Doctor=:docid ";
								$query = $dbh -> prepare($sql);
								$query-> bindParam(':docid', $docid, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$totappapt=$query->rowCount();
							?>
							<h3 class="card-text"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totappapt);?></span></h3>
							<a href="approved-appointment.php" class="btn btn-primary">View Detail</a>
					</div><!-- .widget -->
				</div>
  			</div>
				<div class="col-md-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<!-- <span class="card-img-top pull-right"><i class="fa fa-ban" style="font-size:24px"></i></span> -->
							<h4 class="card-title">Cancelled Appointments</h4>
							<?php 
								$docid=$_SESSION['damsid'];;
								$sql ="SELECT * from  tblappointment where Status='Cancelled' && Doctor=:docid ";
								$query = $dbh -> prepare($sql);
								$query-> bindParam(':docid', $docid, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$totncanapt=$query->rowCount();
							?>
							<h3 class="card-title"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totncanapt);?></span></h3>
							<a href="cancelled-appointment.php" class="btn btn-primary">View Detail</a>
							
						</div>
					</div><!-- .widget -->
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="card">
						<div class="card-body">
							<!-- <span class="card-img-top pull-right"><i class="fa fa-file" style="font-size:24px"></i></span> -->
							<h4 class="card-title">Total Appointments</h4>
								<?php 
									$docid=$_SESSION['damsid'];;
									$sql ="SELECT * from  tblappointment where Doctor=:docid ";
									$query = $dbh -> prepare($sql);
									$query-> bindParam(':docid', $docid, PDO::PARAM_STR);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$totapt=$query->rowCount();
								?>
								<h3 class="card-text"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totapt);?></span></h3>
								<a href="cancelled-appointment.php" class="btn btn-primary">View Detail</a>
						</div>
					</div><!-- .widget -->
				</div>
			</div><!-- .row -->
			
		</section><!-- #dash-content -->
	</div><!-- .wrap -->
  	<!-- APP FOOTER -->
 	<?php include_once('includes/footer.php');?>
  	<!-- /#app-footer -->
</main>
<!--========== END app main -->
		

	<!-- build:js assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>
</body>
</html>
<?php }  ?>