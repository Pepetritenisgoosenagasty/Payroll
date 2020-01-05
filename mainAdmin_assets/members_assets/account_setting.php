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
    $id = $_SESSION['id'];
    
    $users = mysqli_query($vSky, "SELECT * FROM `users` WHERE `id`='$id' LIMIT 1");
    
    while($user = mysqli_fetch_assoc($users)){
        $new_id = $user['id'];
    }
    
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

			    

							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Account settings</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="#">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" id="usd" value="<?= $_SESSION['name'] ?>"  class="form-control">
												</div>

												<div class="col-md-6">
													<label>Current password</label>
													<input type="password" id="curl_pwd" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>New password</label>
													<input type="password" id="new_pwd" placeholder="Enter new password" class="form-control">
												</div>

												<div class="col-md-6">
													<label>Repeat password</label>
													<input type="password" id="repeat_pwd" placeholder="Repeat new password" class="form-control">
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="button" onclick="update_pwd(<?= $new_id; ?>)" id="update-btn" class="btn btn-primary">Save changes</button>
				                        </div>
			                        </form>
								</div>
							</div>
							<!-- /account settings -->


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