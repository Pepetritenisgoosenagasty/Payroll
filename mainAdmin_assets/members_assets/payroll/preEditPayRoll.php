<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }

if(isset($_REQUEST['__i_g_']) && isset($_REQUEST['_f__st'])){
    $valCatId = $_REQUEST['__i_g_'];
    $valempId = $_REQUEST['_f__st'];
    $val = base64_decode($valCatId);
    $val2 = base64_decode($valempId);
    $totBasicPay = 0;
    $totDeductions = 0;
    $totNetSalary = 0;
    $totNetSalaryPayable = 0;
    $totSurchrg = 0;
    
    $query = "SELECT emp.emp_name, emp.`emp_id`, emp.`emp_dept_id`, emp.`emp_pos_id`, emp.`emp_bank_branch`, emp.`emp_bank_account_no`, emp.`emp_main_cat_id`, emp.`emp_ssnit`, cat.*, dept.*, pos.* ,pr.* FROM `employees` AS emp
                INNER JOIN `payroll_next_pay` AS pr ON pr.`emp_id`=emp.`emp_id` 
                INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                WHERE emp.`emp_main_cat_id`='$val' AND emp.`emp_id`='$val2'";
    $results = mysqli_query($vSky, $query);
    while($row = mysqli_fetch_assoc($results)){
        $emp_id = $row['emp_id'];
        $basicPay = $row['basic_pay'];
        $NetSal = $row['emp_net_salary'];
        $emp_name = $row['emp_name'];
        $cat_name = $row['cat_name'];
        $dept_id = $row['emp_dept_id'];
        $emp_pos_id = $row['emp_pos_id'];
        $cat_id = $row['emp_main_cat_id'];
        $payment_method = $row['payment_method'];
        $emp_bank_branch = $row['emp_bank_branch'];
        $dateStored = $row['date_stored'];
        $empSsnit = $row['emp_ssnit'];
        $empEmpSSF = $row['employee_ssf'];
        $empEmplerSSF = $row['employer_ssf'];
        $emptaxableS = $row['emp_taxable_salary'];
        $empPaye = $row['emp_paye'];
        $empStatuDeduction = $row['emp_total_statutory_deductions'];
        $empNetBeforeDeduction = $row['net_before_deductions'];
        $empdebt_bal_b_d = $row['debt_bal_b/d'];
        $empCurrent_loans_surcharges = $row['current_loans/surcharges'];
        $empAdjustments = $row['adjustments'];
        $empdeductions = $row['deductions'];
        $empemp_oter_deductions = $row['emp_oter_deductions'];
        $emptotal_debt = $row['total_debt'];
        $empNetSalPay = $row['empnet_salary_payable'];
        $empbal_outstanding = $row['bal_outstanding'];
        $totDeduc = $row['total_deductions'];
        $emp_bank_account_no = $row['emp_bank_account_no'];
        $emp_bicycle_deduction = $row['emp_bicycle_deduction'];
        $emp_description = $row['description'];
        $emp_comments = $row['comments'];
        
        $run_query = mysqli_query($vSky, "SELECT * FROM `debt_surcharges` WHERE `emp_id`='$val2'");
        while($get = mysqli_fetch_assoc($run_query)){
            $totSurchrg += $get['debt_surcharges'];
        }
    }
    
    if($empCurrent_loans_surcharges == 0 && $totSurchrg != 0){
        $empCurrent_loans_surcharges = $totSurchrg;
    }else if($empCurrent_loans_surcharges != 0 && $totSurchrg == 0){
        $empCurrent_loans_surcharges = $empCurrent_loans_surcharges;
    }else if($empCurrent_loans_surcharges == 0 && $totSurchrg == 0){
        $empCurrent_loans_surcharges = $empCurrent_loans_surcharges;
    }else if($empCurrent_loans_surcharges != 0 && $totSurchrg != 0){
        $empCurrent_loans_surcharges += $totSurchrg;
    }
        $percentage_ssf = 100;
        $abs = $basicPay/$percentage_ssf;
        $emptaxPer = $empEmpSSF /$abs;

        $abst = $basicPay/$percentage_ssf;
        $emplertaxPer = $empEmplerSSF/$abst;
    
        $realchkemp = $emptaxPer / $percentage_ssf;
        if($empEmpSSF == 0){
          $hdemp = 0;  
        }else{
        $hdemp = $empEmpSSF / $realchkemp;
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
                    <div class="col-lg-6">
<!--                        <h4>EDIT PAYROLL</h4>-->
                    </div>
                </div>
                <!-- 2 columns form -->
                <div class="card">
                    <?php  
            if($emptaxPer == 0){
        ?>
                    <script>
                        $(function () {
              $("input[name=tax][value='emp']").prop('checked', false);
              $("input[name=tax][value='empler']").prop('checked', false);
            })
                    </script>
                    <?php
                }else if(sprintf("%0.2f",$hdemp) == $basicPay){
        ?>
                    <script>
                        $(function () {
              $("input[name=tax][value='emp']").prop('checked', true);
              $("input[name=tax][value='empler']").prop('checked', false);
            })
                    </script>
                    <?php
                }else if(sprintf("%0.2f",$hdemp) != $basicPay){
                ?>
                    <script>
                        $(function () {
              $("input[name=tax][value='emp']").prop('checked', false);
              $("input[name=tax][value='empler']").prop('checked', true);
            })
                    </script>
                    <?php
                }
                    ?>

                    <div class="card-body">
                        <form action="#" id="edit_payslip">
                            <input type="hidden" id="eempDeptID" name="eempDeptID" value="<?= $dept_id; ?>">
                            <input type="hidden" id="eempPosID" name="eempPosID" value="<?= $emp_pos_id; ?>">
                            <input type="hidden" id="eempCatID" name="eempCatID" value="<?= $cat_id; ?>">
                            <input type="hidden" id="eempID" name="eempID" value="<?= $emp_id; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employee Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eempName" id="eempName" value="<?= $emp_name; ?>" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Payroll Date:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="date" name="eempPDate" id="eempPDate" value="<?= $dateStored; ?>" class="form-control">
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
                                                <input readonly name="eempSsnit" id="eempSsnit" value="<?= $empSsnit; ?>" type="text" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Category:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly readonly type="text" name="eempCatName" id="eempCatName" value="<?= $cat_name; ?>" class="form-control">
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
                                        <input type="text" id="eempbasic" name="eempbasic" value="<?= sprintf("%0.2f",$basicPay); ?>" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Debt Bal B/D:</b></label>
                                            <div class="col-lg-4">
                    <input readonly type="text" name="eempDebtBal" id="eempDebtBal" value="<?= sprintf("%0.2f",$empdebt_bal_b_d); ?>" class="form-control numbersonly-format">
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
                        <input readonly type="text" name="eempSFFl" id="eempSSFl" value="<?= sprintf("%0.2f",$empEmplerSSF); ?>" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Current Loans/ Surcharges:</b></label>
                                            <div class="col-lg-4">
        <input readonly type="text" name="eempCurLoanSur" id="eempCurLoanSur" value="<?= sprintf("%0.2f",$empCurrent_loans_surcharges); ?>" class="form-control numbersonly-format">
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
                                                <input readonly type="text" name="eempSSFP" id="eempSSFP" value="<?= sprintf("%0.2f",$empEmpSSF); ?>" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Adjustments:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eempAdjust" id="eempAdjust" value="<?= sprintf("%0.2f",$empAdjustments); ?>" class="form-control numbersonly-format">
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
                                                <input readonly type="text" name="eempTaxableS" id="eempTaxableS" value="<?= sprintf("%0.2f",$emptaxableS); ?>" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="eempDeduct" id="eempDeduct" value="<?= sprintf("%0.2f",$empdeductions); ?>" class="form-control numbersonly-format">
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
                                                <input type="text" name="eempPaye" id="eempPaye" value="<?= sprintf("%0.2f",$empPaye); ?>" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Bicycle Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="eempBicyc" id="eempBicyc" value="<?= sprintf("%0.2f",$emp_bicycle_deduction); ?>" class="form-control numbersonly-format">
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
                                                <?= sprintf("%0.2f",$emptaxPer); ?></span>%)</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="tax" value="empler" id="allow_empler">
                                        <label class="custom-control-label" for="allow_empler">Use Employer (<span id="taxEmplerP">
                                                <?= sprintf("%0.2f",$emplertaxPer); ?></span>%)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Statutory Deduction:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eempStatuDeduc" id="eempStatuDeduc" value="<?= sprintf("%0.2f",$empStatuDeduction); ?>" class="form-control numbersonly-format">
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
                                                <input readonly type="text" name="eempBeforOdaDeduc" id="eempBeforOdaDeduc" value="<?= sprintf("%0.2f",$empNetBeforeDeduction); ?>" class="form-control numbersonly-format">
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
                                                    <input readonly type="text" name="eempNetSal" id="eempNetSal" value="<?= sprintf("%0.2f",$NetSal); ?>" class="form-control numbersonly-format">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Total Debt:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly name="eempTotDebt" id="eempTotDebt" value="<?= sprintf("%0.2f",$emptotal_debt); ?>" type="text" class="form-control numbersonly-format">
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
                                                    <input readonly type="text" name="eempBlaAwt" id="eempBlaAwt" value="<?= sprintf("%0.2f",$empbal_outstanding); ?>" class="form-control numbersonly-format">
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
                                                    <input readonly type="text" name="eempTotDeduc" id="eempTotDeduc" value="<?= sprintf("%0.2f",$totDeduc); ?>" class="form-control numbersonly-format">
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
                                                    <input readonly type="text" name="eempNetSalPay" id="eempNetSalPay" value="<?= sprintf("%0.2f",$empNetSalPay); ?>" class="form-control numbersonly-format">
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
                                                    <input type="text" name="eempPayMethod" id="eempPayMethod" value="<?= $payment_method; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><b>Bank Branch:</b></label>
                                                    <input readonly type="text" name="eempBankBranch" id="eempBankBranch" value="<?= $emp_bank_branch; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><b>Bank Account Number:</b></label>
                                                    <input readonly type="text" name="eempBankNo" id="eempBankNo" value="<?= $emp_bank_account_no; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><b>Description:</b></label>
                                                    <input type="text" name="eempDescrp" value="<?= $emp_description; ?>" id="eempDescrp"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><b>Paid Amount:</b></label>
                                                    <input readonly type="text" name="eempPaidAmt" id="eempPaidAmt" class="form-control">
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
                                                    <input type="text" id="eempcomment" value="<?= $emp_comments;?>" name="eempcomment" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange;">
                            <hr style="border: 1px solid orange;">


                            <div class="text-right">
                            <button type="button" onclick="processgetEdit_vals()" class="btn btn-success" ><span id="addddPos" class="ladda-label labll">Cick To Re-Calculate After Inputing Neccessary Values</span><i class="icon-calculator2 ml-2 appEmp"></i></button>
                     <button type="button" id="update_Slip" onclick="updateSlipSlip()" class="btn bg-primary"><span id="updateSlip" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateSlip"></i></button>
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
<?php
    
    }else{
    echo "HAHAHAHA FUCK OFF MAN WHO SENT YOU :( GO BACK TO YOUR PAPA  ";
}
?>
