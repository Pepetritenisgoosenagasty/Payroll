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
                <div class="row">
                    <div class="col-md-4">

                        <!-- Table attachment -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Departments</h6>
                                <div class="header-elements">
                                </div>
                            </div>

                            <div class="card-body">
                                List Of All Departments.
                            </div>

                            <div class="table-responsive">
                                <table class="table" data-toggle="context" data-target=".context-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>Department Name</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `department`");
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($vSkyRow['id']); ?></td>
                                            <td><a href="#"><?php echo htmlentities($vSkyRow['dep_name']); ?></a></td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <button onclick="display_dept(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_dept">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>

                                                    <button onclick="del_dept(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash deptDel<?phpecho $skyRow['id']?>" style="color:red;"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /table attachment -->


                    </div>

                    <div class="col-md-8">

                        <!-- Grey background -->
                        <form action="#">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Add New Department</h6>
                                    <div class="header-elements">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Department name:</label>
                                        <input type="text" class="form-control wordsonly-format" name="vSkyDept" id="vSkyDept" placeholder="Admin">
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="button" onclick="add_dept()" class="btn bg-blue"><span id="addDept" class="ladda-label labll5">Add Department</span><i class="icon-plus3 ml-2 addDeptIcon"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- /grey background -->

                    </div>
                </div>

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
<!-- Vertical form modal -->
				<div id="modal_form_dept" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Department</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="#">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Department Name</label>
												<input type="text" name="vSkyDeptName" id="vSkyIdDept" class="form-control wordsonly-format">
												<input type="hidden" name="vSkyDeptId" id="vSkyDeptId" class="form-control">
											</div>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="button" onclick="editDept()" class="btn bg-primary"><span id="updateDept" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateDeptIcon"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->
</body>

</html>
