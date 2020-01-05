<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }

if(isset($_REQUEST['__c_g_'])){
    $valCatID = $_REQUEST['__c_g_'];
    $val = base64_decode($valCatID);
    $per = 100;
    
    $query = "SELECT * FROM `employees` AS emp 
                INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                INNER JOIN `ssf` AS s ON emp.`ssf_id`= s.`ssf_id`
                WHERE emp.`emp_main_cat_id`='$val' AND s.`active`='1'";
    $results = mysqli_query($vSky, $query);
    while($row = mysqli_fetch_assoc($results)){
        $emp_id = $row['emp_id'];
        $emp_name = $row['emp_name'];
        $cat_name = $row['cat_name'];
        $dept_id = $row['emp_dept_id'];
        $emp_pos_id = $row['emp_pos_id'];
        $cat_id = $row['emp_main_cat_id'];
        $emp_percentage = $row['employee_%'];
        $empler_percentage = $row['employer_%'];
        $emp_bank_branch = $row['emp_bank_branch'];
        $empSsnit = $row['emp_ssnit'];
    }
    
    $emp_per = $emp_percentage*$per;
    $empler_per = $empler_percentage*$per;
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

                <!--
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card card-body border-top-success">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Senior Staff</h6>
                                <p class="mb-3 text-muted">Generate Payroll For All <code>Senior</code> Staff Members</p>

                                <button type="button" id="gem_senior_staff" class="btn btn-success">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button>

                                <button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#forsenior">
                                    &nbsp;Toggle content&nbsp; 
                                </button>
                            </div>

                            <div class="collapse" id="forsenior">
                                <div class="mt-3">
                                    Generating Payroll For All Senior Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-body border-top-warning">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">BVO</h6>
                                <p class="mb-3 text-muted">Generate Payroll For All <code>BVO</code> Staff Members</p>

                                <button type="button" class="btn btn-warning">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button>
                                   
                                   <button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#for_bvo">
                                    &nbsp;Toggle content&nbsp;
                                </button>
                            </div>

                            <div class="collapse" id="for_bvo">
                                <div class="mt-3">
                                    Generating Payroll For All BVO Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-body border-top-default">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">BVO  Assistant</h6>
                                <p class="mb-3 text-muted">Generate Payroll For All <code>BVO Assistant</code> Staff Members</p>

                                <button type="button" class="btn btn-default">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button>
                                <button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#for_bvo_assist">
                                    &nbsp;Toggle content&nbsp;
                                </button>
                            </div>

                            <div class="collapse" id="for_bvo_assist">
                                <div class="mt-3">
                                    Generating Payroll For All BVO Assistant Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-body border-top-danger">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Mechanics & Drivers</h6>
                                <p class="mb-3 text-muted">Generate Payroll For All <code>Mechanics & Drivers</code></p>

                                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#collapse-button-collapsed">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button><button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#for_mechanics">
                                    &nbsp;Toggle content&nbsp;
                                </button>
                            </div>

                            <div class="collapse" id="for_mechanics">
                                <div class="mt-3">
                                Generating Payroll For All Mechanics & Drivers Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-body border-top-primary">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">Security </h6>
                                <p class="mb-3 text-muted">Generate Payroll For All <code>Security</code> Staff Members</p>

                                <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#collapse-button-collapsed">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button><button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#for_security">
                                    &nbsp;Toggle content&nbsp;
                                </button>
                            </div>

                            <div class="collapse" id="for_security">
                                <div class="mt-3">
                                   Generating Payroll For All Security Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card card-body border-top-info">
                            <div class="text-center">
                                <h6 class="font-weight-semibold mb-0">General Staff</h6>
                                <p class="mb-3 text-muted">Generate Payroll For <code>General Staff</code> Staff</p>

                                <button type="button" class="btn btn-defualt" data-toggle="collapse" data-target="#collapse-button-collapsed">
                                    Generate Payroll &nbsp; <i class="icon-printer2"></i>
                                </button><button style="margin-top:5px;" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#for_general_staff">
                                    &nbsp;&nbsp;Toggle content&nbsp;&nbsp;
                                </button>
                            </div>

                            <div class="collapse" id="for_general_staff">
                                <div class="mt-3">
                                    Generating Payroll For All General Staff Members Will Apply The Same Rules For Everyone On That List. Please Make Sure Everything Set Before Procceding.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                   <div class="row">
                   <div class="col-md-12">
                   <?php
                $empsleft = 0;
                        $query = mysqli_query($vSky, "SELECT * FROM `employees` AS emp
                            INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                            INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                            INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                            WHERE emp.`on_payroll`='0'");
                           $count = mysqli_num_rows($query);
                        if($count > 0){
                               ?>
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold" style="padding-left:340px;">Hello!</span> You Have <?= $count; ?> Employee(s) Not Yet Added To The Payroll List <a href="/payroll/mainAdmin_assets/members_assets/payroll/not_on_payroll" class="alert-link">Click Here</a> To Add Them To The List.
                            </div>
                            <?php
                        }else{
                            }
                       ?>
                   </div>

                   </div>
                    <div class="row " style="margin:0px 0px 20px;">

                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>

                        <div class="col-auto" style="margin-top:35px;">
                <button type="button" id="btn_new" onclick="process_remaining(<?= $val; ?>)" class="btn btn-outline-primary"><i class="icon-plus2 mr-2"></i> Click To Calculate The Remaining Employee's Next Payroll</button>

                        </div>

                    </div>
                </form>
                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title" style="margin-left:430px;"> <span class="text-justify text-center text-default font-weight-semibold"> List Of All Employees Under The Category You Selected</span><span style="font-size:15px;"> <?php echo $cat_name; ?></span></h5>
                        <div class="header-elements">
                            <div class="list-icons">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--						 <code>scrolling</code> in the <code>vertical</code> -->
                    </div>

                    <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                        <thead>
                            <tr>
                                <th class="text-center">NAME</th>
                                <th class="text-center">ACCOUNT#.</th>
                                <th class="text-center">BANK<br /> BRANCH</th>
                                <th class="text-center">SSNIT#</th>
                                <th class="text-center">DEPARTMENT.</th>
                                <th class="text-center">POSITION.</th>
                                <th class="text-center">CATEGORY.</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `employees` AS emp
                            INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                            INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                            INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                                WHERE emp.`emp_main_cat_id`='$val' AND emp.`on_payroll`='1'");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                $emp_iddd = $vSkyRow['emp_id'];
                                $query = mysqli_query($vSky, "SELECT * FROM `payroll_next_pay` WHERE emp_id='$emp_iddd'");
                                $count = mysqli_num_rows($query);
                                                            ?>
                                                            
                                    <?php 
                                         if($count == 0){
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:red;">
                                    
                                    <?php
                                            }else{
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:green;">
                                    <?php
                                         }
                                    ?>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center">
                                        <?php echo $vSkyRow['emp_bank_account_no']; ?></td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_bank_branch']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_ssnit']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['dep_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['pos_type_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['cat_name']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                       <?php 
                                         if($count == 0){
                                        ?>
                                        <button onclick="get_emp_infos(<?php echo $vSkyRow['emp_id']?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#add_deductions">
                                            <i class="icon-plus22" style="color:#ffbc43;"></i>
                                        </button>
                                        <?php
                                            }else{
                                        ?>
                                    <button onclick="edit_emp_infos('<?php echo $vSkyRow['emp_id']?>','<?php echo $vSkyRow['emp_main_cat_id']; ?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-pencil" style="color:#529c1a;"></i>
                                    </button>
                                   <button onclick="del_next_pay('<?php echo $vSkyRow['emp_id']?>','<?php echo $vSkyRow['emp_main_cat_id']; ?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-trash delempnw<?php echo $vSkyRow['emp_id']?>" style="color:red;"></i>
                                    </button>
                                        <?php
                                         }
                                        ?>
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
<div id="add_deductions" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action="#" id="gen_form">
                <div class="modal-body">

                            <div class="card-body">
                        <form action="#" id="edit_payslip">
                            <input type="hidden" id="payEmpDeptID" name="payEmpDeptID" value="0">
                            <input type="hidden" id="payEmpPosID" name="payEmpPosID" value="0">
                            <input type="hidden" id="payEmpCatID" name="payEmpCatID" value="0">
                            <input type="hidden" id="payEmpID" name="payEmpID" value="0">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employee Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="payEmpName" id="payEmpName" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Payroll Date:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="date" name="payEmpPDate" id="payEmpPDate" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"> <b>Employee SSNIT No.:</b> </label>
                                            <div class="col-lg-4">
                                                <input readonly name="payEmpSsnit" id="payEmpSsnit" type="text" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Category:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly readonly type="text" name="payEmpCatName" id="payEmpCatName" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange; margin-bottom:0px;">
                            <div class="text-center"><b>PAYROLL FILEDS</b></div>
                            <hr style="border: 1px solid orange; margin-top:0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Basic Salary:</b></label>
                                            <div class="col-lg-4">
                                        <input type="text" id="payEmpbasic" name="payEmpBasic" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Debt Bal B/D:</b></label>
                                            <div class="col-lg-4">
                    <input readonly type="text" name="payEmpDebtBal" id="payEmpDebtBal" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employer(SSF):</b></label>
                                            <div class="col-lg-4">
                        <input readonly type="text" name="payEmpSFFl" id="payEmpSSFl" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Current Loans/ Surcharges:</b></label>
                                            <div class="col-lg-4">
        <input readonly type="text" name="payEmpCurLoanSur" id="payEmpCurLoanSur" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employee(SSF):</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="payEmpSSFP" id="payEmpSSFP" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Adjustments:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="payEmpAdjust" id="payEmpAdjust" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Taxable Salary:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="payEmpTaxableS" id="payEmpTaxableS" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="payEmpDeduct" id="payEmpDeduct" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Paye:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="payEmpPaye" id="payEmpPaye" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Bicycle Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="payEmpBicyc" id="payEmpBicyc" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">

                                <div class="row" style="margin:10px;">
                                    <label class="d-block font-weight-semibold" style="color:red;">(Please do not select any if you do not want changes) &nbsp;&nbsp;</label><span style="color:red;"></span>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="tax" value="emp" id="allow_emp">
                    <label class="custom-control-label" for="allow_emp">Use Employee (<span id="taxEmpP">
                                                </span>%)</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="tax" value="empler" id="allow_empler">
                                 <label class="custom-control-label" for="allow_empler">Use Employer (<span id="taxEmplerP">
                                                </span>%)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Statutory Deduction:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="payEmpStatuDeduc" id="payEmpStatuDeduc" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Net Before Other Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="payEmpBeforOdaDeduc" id="payEmpBeforOdaDeduc" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="background-color:#e8e1e1; <padding:8></padding:8>px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row" style="margin-top:8px;">
                                                <label class="col-lg-2 col-form-label"><b>Net Pay:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="payEmpNetSal" id="payEmpNetSal" value="0" class="form-control numbersonly-format">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Total Debt:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly name="payEmpTotDebt" id="payEmpTotDebt" value="0" type="text" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Balance Outstanding:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="payEmpBlaAwt" id="payEmpBlaAwt" value="0" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Total Deductions:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="payEmpTotDeduc" id="payEmpTotDeduc" value="0" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Net Salary Payable:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="payEmpNetSalPay" id="payEmpNetSalPay" value="0" class="form-control numbersonly-format">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top:8px; margin-bottom:0px; border: 1px solid orange;">
                            <div class="text-center"><b>NET PAY DISTRIBUTION</b></div>
                            <hr style="border: 1px solid orange; margin-top:0px;">


                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><b>Payment Method:</b></label>
                                                    <input type="text" name="payEmpPayMethod" id="payEmpPayMethod"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><b>Bank Branch:</b></label>
                                                    <input readonly type="text" name="payEmpBankBranch" id="payEmpBankBranch" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><b>Bank Account Number:</b></label>
                                                    <input readonly type="text" name="payEmpBankNo" id="payEmpBankNo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><b>Description:</b></label>
                                                    <input type="text" name="payEmpDescrp" id="payEmpDescrp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><b>Paid Amount:</b></label>
                                                    <input readonly type="text" name="payEmpPaidAmt" id="payEmpPaidAmt" value="0" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><b>Comments:</b></label>
                                                    <input type="text" id="payEmpcomment" name="payEmpcomment" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange;">
                            <hr style="border: 1px solid orange;">

                        </form>
                    </div>
                   <div class="modal-footer">

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" onclick="holding_vals()" class="btn btn-success" ><span id="addddPos" class="ladda-label labll">Cick To Calculate After Inputing Neccessary Values</span><i class="icon-calculator2 ml-2 appEmp"></i></button>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="button" id="move_single_prepared" onclick="prepare_single_emp()" class="btn bg-primary"><span id="single" class="ladda-label labll">Save</span><i class="icon-plus22 ml-2 preEmp"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->
</html>
<?php
    
    }else{
    echo "HAHAHAHA FUCK OFF MAN WHO SENT YOU :( GO BACK TO YOUR PAPA  ";
}
?>
