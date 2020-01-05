<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/head.php");
?>	

<body>
	<!-- Main navbar -->
<?php
include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/main_navbar.php");
?>	
	<!-- /main navbar -->

	<!-- Secondary navbar -->
	<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/sec_navbar.php");
	?>	
	<!-- /secondary navbar -->

	<!-- Page content -->
	<div class="page-content ">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content">
                


			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
	<!-- Footer -->
	<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
	?>	
	<!-- /footer -->
		
</body>
</html>