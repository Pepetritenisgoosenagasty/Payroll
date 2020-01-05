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

						<!-- 2 columns form -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h4 class="card-title" style="padding-left:610px;"><b>SYSTEM CONFIGURATIONS</b></h4>
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
							<div class="row">
								<div class="col-md-6">
									<fieldset>
									<?php
									
									$query = mysqli_query($vSky, "SELECT * FROM `sys_settings`");
									while($fetch = mysqli_fetch_assoc($query)){
										$com_name = $fetch['company_name'];
										$com_id = $fetch['id'];
										$currency = $fetch['currency'];
										$location = $fetch['location'];
										$tel = $fetch['tel'];
										$email = $fetch['email'];
										$name_on_payslip = $fetch['name_on_payslip'];
										$bank_name_on_payslip = $fetch['bank_name_on_payslip'];
										$bank_location_on_payslip = $fetch['bank_location_on_payslip'];
									}

									if($currency == "GHC"){
										$currency = "GHC";
									}

									?>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> <b>Company Name:</b> </label>
											<div class="col-lg-9">
												<input type="text" id="com_name_id" value="<?= $com_name; ?>" class="form-control" >
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Currency:</b></label>
											<div class="col-lg-9">
												<input readonly type="text" id="sys_currency_id" value="<?= $currency; ?>" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Company Location:</b></label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" id="com_location_id" class="form-control" ><?= $location; ?></textarea>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Company Bank Location:</b></label>
											<div class="col-lg-9">
												<textarea rows="5" cols="5" id="bank_location_id" class="form-control"><?= $bank_location_on_payslip; ?></textarea>
											</div>
										</div>
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Name On Payslip:</b></label>
													<div class="col-md-9">
														<input type="text" id="name_on_payroll_id" value="<?= $name_on_payslip; ?>" class="form-control">
													</div>
										</div>
								        <div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Bank Name On Payslip:</b></label>
											<div class="col-lg-9">
												<input type="text" id="bank_name_id" value="<?= $bank_name_on_payslip; ?>"  class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label"><b>Email:</b></label>
											<div class="col-lg-9">
												<input type="text" id="email_id" value="<?= $email; ?>"  class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> <b>Tel#:</b></label>
											<div class="col-lg-9">
												<input type="text" id="tel_id" value="<?= $tel; ?>" class="form-control">
											</div>
										</div>



									</fieldset>
								</div>
							</div>

							<div class="text-right">
								<button type="button" onclick="update_sys_config(<?= $com_id; ?>)" id="update_system_config_btn" class="btn btn-primary"><span id="update_text_span">update</span><i class="icon-paperplane sys_icon ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /2 columns form -->


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