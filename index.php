<?php
session_start();
    
  if(isset($_SESSION['name'])){
        header("Location: /payroll/mainAdmin_assets/dashboard");
  }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/head.php");
?>	
<style>
.page-content {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-positive: 1;
    flex-grow: 1;
	padding: 0rem 0rem;
}
</style>
<body>

	<!-- Main navbar -->
<?php
include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/index_main_navbar.php");
?>	
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" id="lgF">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" id="n" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" id="p" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="button" id="b" class="btn btn-primary btn-block"><span id="lgspan">Sign in</span> <i class="icon-circle-right2 lgb ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
<?php
include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
?>	
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>