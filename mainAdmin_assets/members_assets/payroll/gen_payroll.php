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
                <fieldset class="mb-3">
								<legend class="text-uppercase font-size-lg font-weight-bold"> Please Select Category From The Below Drop Down To Start The Payroll Generation<code> You Will Be Redirected To Confirm All Calculations  </code>   Before  Generating The Payroll.</legend>
                </fieldset>
                
                                <div class="form-group row">
		                        	<label class="col-form-label col-lg-1"> <b>Select Category</b> </label>
		                        	<div class="col-lg-6">
			                            <select class="form-control" id="cat_id_info">
                                        <?php
                                            $stmt = mysqli_query($vSky, "SELECT * FROM `main_category`");
                                            while($row = mysqli_fetch_assoc($stmt)){
                                                
                                            ?>
			                                <option value="<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></option>
			                              <?php
                                            }
                                            ?>
			                            </select>
		                            </div>
		                            <button onclick="get_cat_info()" class="list-icons-item btn btn-light" > <span class="cat_select"></span> Click To Proceed&nbsp;
                                            <i class="icon-database-add" style="color:#5f96f3;" ></i>
                                        </button>
                 <div class="col-auto">
                <button type="button" id="main_generate_payroll" class="btn btn-outline-success"><i class="icon-printer mr-2"></i> Click To Generate Payroll After Confirming All Calculations</button>

                        </div>
		                        </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row " style="margin:0px 10px 20px;">
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
                    </div>
                </form>
                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> List Of All Employees</h5>
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
                                <th class="text-center">DEPT.</th>
                                <th class="text-center">POS.</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">CATE.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sacked = "";
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `employees` AS emp 
                                        INNER JOIN department AS dept ON emp.emp_dept_id = dept.id
                                        INNER JOIN positions AS pos ON emp.emp_pos_id = pos.pos_id
                                        INNER JOIN main_category AS mCat ON emp.emp_main_cat_id = mCat.cat_id ");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){

                               $g_sacked = $vSkyRow['sacked'];
                                
                                if($g_sacked == 1){
                                    $sacked = "s";
                                    $status = "Not Active";
                                }else{
                                    $sacked = "n";
                                    $status = "Active";
                                }
                                
                            ?>
                              <?php 
                                         if($sacked == "n"){
                                    ?>
                            <tr id='row_<?= $vSkyRow['emp_id']; ?>' style="color:green;">
                                    
                                    <?php
                                            }else{
                                    ?>
                            <tr id='row_<?= $vSkyRow['emp_id']; ?>' style="color:red;">
                                    <?php
                                         }
                                    ?>
                                <td class="text-center">
                                    <?= $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?= $vSkyRow['emp_bank_account_no']; ?></a></td>
                                <td class="text-center">
                                    <?= $vSkyRow['emp_bank_branch']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $vSkyRow['emp_ssnit']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $vSkyRow['dep_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $vSkyRow['pos_type_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $status; ?>
                                </td>
                                <td class="text-center">
                                    <?= $vSkyRow['cat_name']; ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /scrollable datatable -->



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
                                                <input type="text" name="payEmpAdjust" id="payEmpAdjust" value="0" class="form-control numbersonly-format">
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
                                                    <input readonly type="text" name="payEmpDescrp" id="payEmpDescrp" class="form-control">
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
                                                    <input readonly type="text" id="payEmpcomment" name="payEmpcomment" class="form-control">
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
