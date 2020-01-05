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
                        <h5 class="card-title text-center">Add New Employee</h5>
                        <div class="header-elements">

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="row">

                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name:</label>
                                                    <input type="text" name="emp_name" id="emp_name" placeholder="Aidoo Michael" class="form-control wordsonly-format">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone #:</label>
                                                    <input type="text" name="emp_number" id="emp_number" placeholder="0264432039" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text" name="emp_email" id="emp_email" placeholder="aidoomichael20@gmail.com" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <input type="text" placeholder="" id="emp_nat" class="form-control wordsonly-format">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Bank Account Nuumber:</label>
                                                    <input type="text" id="empBankNumber" placeholder="0610162138416" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank Branch:</label>
                                                    <input type="text" id="empBankBranch" placeholder="Unibank, Ashiaman" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>SSNIT Number:</label>
                                                    <input type="text" id="empSSNIT" placeholder="20120093039" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Additional Info.:</label>
                                            <textarea rows="5" cols="5" id="empAddInfo" class="form-control" placeholder="Enter your message here"></textarea>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <legend class="font-weight-semibold"><i class="icon-hammer-wrench mr-2"></i> Work details</legend>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Category</label>
                                                    <select class="form-control" id="vSkyeCategory">
                                                        <?php
                                                $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_category`");
                                                while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                                            ?>
                                                        <option value="<?php echo $vSkyRow['cat_id']?>">
                                                            <?php echo $vSkyRow['cat_name']?>
                                                        </option>
                                                        <?php
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                          <div class="form-group">
                                                    <label class="col-form-label">Department</label>
                                                    <select class="form-control" id="vSkyeDepartment">
                                                        <?php
                                                $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `department`");
                                                while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                                            ?>
                                                        <option value="<?php echo $vSkyRow['id']?>">
                                                            <?php echo $vSkyRow['dep_name']?>
                                                        </option>
                                                        <?php
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                         <div class="form-group">
                                                    <label class="col-form-label">Position</label>
                                                    <select class="form-control" id="vSkyePosition">
                                                        <?php
                                                $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `positions`");
                                                while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                                            ?>
                                                        <option value="<?php echo $vSkyRow['pos_id']?>">
                                                            <?php echo $vSkyRow['pos_type_name']?>
                                                        </option>
                                                        <?php
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                                        
                                                 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Basic Salary:</label>
                                                    <input type="text" id="empBasicSal" placeholder="0" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </div> 
                                          
                                        <div class="row">
                                                 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">PAYE:</label>
                                                    <input readonly type="text" id="empPaye" placeholder="0" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>

                            <div class="text-right">
                                <button type="button" onclick="addEmp()" id="empempempADD" class="btn btn-primary"><span id="addEm" class="ladda-label labll">Add Employee</span><i class="icon-paperplane ml-2 addEmp"></i></button>
<!--                                <button type="button" id="update_emp_emp" onclick="updateEmpEmp()" class="btn bg-primary"><span id="updatePos" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateEmpEmp"></i></button>-->
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
