<?php
ob_start();
?>
    <div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand wmin-0 mr-5">
			<a href="/payroll/index" class="d-inline-block">
				<img src="/payroll/global_assets/images/logo_fade.png" alt="">
			</a>
		</div>
		
		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
	

			<span class="badge bg-success-400 badge-pill ml-md-3 mr-md-auto">Welcome <?= $_SESSION['name']; ?></span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="javascript:;" class="navbar-nav-link" data-toggle="dropdown">
						<img src="/payroll/global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
						English
					</a>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span><?= $_SESSION['name']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">

						<div class="dropdown-divider"></div>
						<a href="/payroll/mainAdmin_assets/members_assets/account_setting" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="/payroll/mainAdmin_assets/members_assets/includes/process_logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>