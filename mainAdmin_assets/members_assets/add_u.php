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

                <!-- Registration form -->
                <form action="" class="flex-fill">
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Table attachment -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">USERS</h6>
                                    <div class="header-elements">
                                    </div>
                                </div>

                                <div class="card-body">
                                    List Of All Users.
                                </div>

                                <div class="table-responsive">
                                    <table class="table" data-toggle="context" data-target=".context-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 40px;">#</th>
                                                <th>User Name</th>
                                                <th>User Type</th>
                                                <th class="text-center" style="width: 100px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `users`");
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt))
                                        {
                                            
                                            $usT = $vSkyRow['position'];
                                            $pos = '';
                                            
                                            if($usT == 1){
                                                
                                                $pos = "Super Admin";
                                                
                                            }else if($usT == 2){
                                                
                                                $pos = "Admin";
                                                
                                            }else if($usT == 3){
                                                
                                                $pos = "Secretary";
                                            }
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= htmlentities($vSkyRow['id']); ?>
                                                </td>
                                                <td><a href="javascript:;">
                                                        <?= htmlentities($vSkyRow['name']); ?>
                                                    </a>
                                                </td>
                                                <td><a href="javascript:;">
                                                        <?= $pos; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <button type="button" onclick="display_u(<?= htmlentities($vSkyRow['emp_id']); ?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_u">
                                                            <i class="icon-pencil5" style="color:orange;"></i>
                                                        </button>

                                                        <button type="button" onclick="del_u(<?= htmlentities($vSkyRow['emp_id']); ?>)" class="list-icons-item btn btn-light">
                                                            <i class="icon-trash mainUDel<?php echo $vSkyRow['emp_id']?>" style="color:red;"></i>
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


                        <div class="col-lg-6">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                        <h5 class="mb-0">Create New User</h5>
                                        <span class="d-block text-muted">All fields are required</span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label col-lg-12"><b>Select Category New User Is In</b></label>
                                                <select name="chnCat" id="chnCat" class="form-control">
                                                    <?php
                                         $query = mysqli_query($vSky, "SELECT * FROM `main_category`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $cat_name = $fetch['cat_name'];
                                                    $cat_id = $fetch['cat_id'];
                                                ?>
                                                    <option value="<?= $cat_id; ?>">
                                                        <?= $cat_name; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="display:none;" id="empsFill">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label col-lg-12"><b>List Of Emplyees In Selected Category</b></label>
                                                <select name="empsAvail" id="empsAvail" class="form-control">
                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" readonly id="e_department" class="form-control" placeholder="Department">
                                                <div class="form-control-feedback">
                                                    <i class="icon-office text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" readonly autocomplete="position" id="e_position" class="form-control" placeholder="Position">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-tie text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="password" autocomplete="new-password" class="form-control" id="e_pwd" placeholder="Create password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="password" autocomplete="new-password" class="form-control" id="e_c_pwd" placeholder="Repeat password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="email" class="form-control" id="e_email" placeholder="Your email">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="email" class="form-control" id="e_c_email" placeholder="Repeat email">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label col-lg-12"><b>Select User Type</b></label>
                                                <select name="u_tS" id="u_tS" class="form-control">
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Secretary</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" id="add_u_btn" class="btn btn-primary"><span id="add_u_btn_span">Add User</span><i class="icon-plus2 u_icon ml-2"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->

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
<!-- Vertical form modal -->
<div id="modal_form_u" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="emp_form">
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg-12"><b>Category</b></label>
                                        <input type="text" readonly id="u_category" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="empsFill">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg-12"><b>User Full Name</b></label>
                                        <input type="text" readonly id="u_name" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input type="text" readonly id="u_department" class="form-control">
                                        <div class="form-control-feedback">
                                            <i class="icon-office text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input type="text" readonly id="u_position" class="form-control">
                                        <div class="form-control-feedback">
                                            <i class="icon-user-tie text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg-12"><b>Current User Type</b></label>
                                        <input readonly type="text" class="form-control" id="c_u_type">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg-12"><b>Select User Type</b></label>
                                        <select name="e_tS" id="e_tS" class="form-control">
                                            <option value="0">----- Select New User Type ------</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Secretary</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <input type="hidden" id="u_id_id" name="u_id_id">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="update_u" onclick="updateUser()" class="btn bg-primary"><span id="updateU" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateU"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->
</html>
