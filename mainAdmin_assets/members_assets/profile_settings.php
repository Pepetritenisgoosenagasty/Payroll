<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
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

			<!-- Page header -->
			<div class="page-header page-header-light border-bottom-0">



			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">

					<!-- Left content -->
					<div class="tab-content w-100 overflow-auto order-2 order-md-1">

					    <div class="tab-pane fade active show" id="settings">

							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Profile information</h5>
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
													<input type="text" value="Eugene" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Full name</label>
													<input type="text" value="Kopyov" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Address line 1</label>
													<input type="text" value="Ring street 12" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Address line 2</label>
													<input type="text" value="building D, flat #67" class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>City</label>
													<input type="text" value="Munich" class="form-control">
												</div>
												<div class="col-md-4">
													<label>State/Province</label>
													<input type="text" value="Bayern" class="form-control">
												</div>
												<div class="col-md-4">
													<label>ZIP code</label>
													<input type="text" value="1031" class="form-control">
												</div>
											</div>
										</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->

				    	</div>
					</div>
					<!-- /left content -->


					<!-- Right sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- User card -->
							<div class="card">
								<div class="card-body text-center">
									<div class="card-img-actions d-inline-block mb-3">
										<div class="card-img-actions-overlay card-img rounded-circle">
											<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
												<i class="icon-plus3"></i>
											</a>
											<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
												<i class="icon-link"></i>
											</a>
										</div>
									</div>

						    		<h6 class="font-weight-semibold mb-0">Hanna Dorman</h6>
						    		<span class="d-block text-muted">UX/UI designer</span>

					    			<div class="list-icons list-icons-extended mt-3">
				                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
				                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
				                    	<a href="#" class="list-icons-item" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
			                    	</div>
						    	</div>
					    	</div>
					    	<!-- /user card -->


							<!-- Navigation -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold">Navigation</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body p-0">
									<ul class="nav nav-sidebar my-2">
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-user"></i>
												 My profile
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-cash3"></i>
												Position
												<span class="text-muted font-size-sm font-weight-normal ml-auto">CFO</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="icon-tree7"></i>
												Category
												<span class="badge bg-danger badge-pill ml-auto">SENIOR STAFF</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /navigation -->
						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

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