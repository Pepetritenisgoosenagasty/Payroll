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
    
    
    $totBasicPay = 0;
    $totDeductions = 0;
    $totNetSalary = 0;
    $totNetSalaryPayable = 0;
    
    $query = "SELECT * FROM `employees` AS emp 
                INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=emp.`emp_id` 
                INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`";
    $results = mysqli_query($vSky, $query);
    while($row = mysqli_fetch_assoc($results)){
        $basicPay = $row['basic_pay'];
        $totDeduc = $row['total_deductions'];
        $totNetSal = $row['emp_net_salary'];
        $totNetSalPay = $row['empnet_salary_payable'];
        $emp_name = $row['emp_name'];
        $cat_name = $row['cat_name'];
        $dept_name = $row['dep_name'];
        $pos_name = $row['pos_type_name'];
        
       $totBasicPay+=$basicPay;
       $totDeductions+=$totDeduc;
       $totNetSalary+=$totNetSal;
       $totNetSalaryPayable+=$totNetSalPay;
    }
    
    $query_system = mysqli_query($vSky, "SELECT * FROM `sys_settings`");
while($get_infos = mysqli_fetch_assoc($query_system)){
    $com_name = $get_infos['company_name'];
    $com_currency = $get_infos['currency'];
}

if($com_currency == "GHC"){
    $currency = "GH₵";
}
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
                    <div class="col-lg-12">
                        <div class="card border-left-3 border-right-3 border-right-primary border-left-success rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <!-- Basic select -->
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" class="row">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>Sort By Month Payroll Was Generated</b></label>
                                            <div class="col-lg-12">
                                                <select name="duration_select" id="duration_select" class="form-control">
                                                    <option value="0">ALL</option>
                                                    <?php
                                         $query = mysqli_query($vSky, "SELECT DISTINCT `date_stored` FROM `payroll_store`");
                                                
                                                while($fetch = mysqli_fetch_array($query)){
                                                    $monthDate = $fetch[0];
                                                    
                                                    $realNewDate = strtotime($monthDate);
                                                    $realDate = date("l, F d Y", $realNewDate);
                                                ?>
                                                    <option value="<?= $monthDate; ?>">
                                                        <?= $realDate; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col" style="margin-left:-10px; margin-top:35px;">
                                            <button type="submit" id="" class="btn btn-outline-success"><i class="icon-search4 mr-2"></i> <span class="ladda-label labllPay mr-2">Search</span> </button>
                                        </div>
                                    </form>

             <!--                        ///////////////////////////////////////////////////////            -->

                                   <form class="row" style="margin-left:55px;">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>Print Payslips By Category</b></label>
                                            <div class="col-lg-12">
                                                <select name="selydCat" id="selydCat" class="form-control">
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

                                        <div class="col" style="margin-left:-5px; margin-top:35px;">
                                            <button type="button" id="getCatInfoss" class="btn btn-light" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-touch mr-2"></i> <span class="ladda-label labllPay mr-2">Select</span> </button>
                                        </div>
                                    </form>
                                    
             <!--                        ///////////////////////////////////////////////////////            -->
                                    
                                    <form  class="row" style="margin-left:25px;">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>Print Bulk Advice Linked By Category</b></label>
                                            <div class="col-lg-12">
                                                <select name="catSelAdvice" id="catSelAdvice" class="form-control">
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

                                        <div class="col" style="margin-left:-10px; margin-top:35px;">
                                            <button type="button" id="getCaInfosAdvice" class="btn btn-outline-warning" data-toggle="modal" data-target="#bulk_advice_linked"><i class="icon-select2 mr-2"></i> <span class="ladda-label labllPay mr-2">Select</span> </button>
                                        </div>
                                    </form>
                                    
             <!--                        ///////////////////////////////////////////////////////            -->
                                    
                                    <div class="col ">

                                    </div>
                                    <div class="col ">

                                    </div>
            <!--                           ////////////////////////////////////////////////////             -->
                                    <form class="row" action="/payroll/mainAdmin_assets/members_assets/payroll/includes/reGenAll.php" method="GET" target="_blank">
                                    <div class="form-group">
                                        <label class="col-form-label col-lg-12"><b>Select Month To Print Advice Linked</b></label>
                                        <div class="col-lg-12">
                                            <select name="duration_select2" id="duration_select2" class="form-control">
                                                <?php
                                         $query = mysqli_query($vSky, "SELECT DISTINCT `date_stored` FROM `payroll_store`");
                                                
                                                while($fetch = mysqli_fetch_array($query)){
                                                    $monthDate = $fetch[0];
                                                    
                                                    $realNewDate = strtotime($monthDate);
                                                    $realDate = date("l, F d Y", $realNewDate);
                                                ?>
                                                <option value="<?= $monthDate; ?>">
                                                    <?= $realDate; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col " style="margin-left:-10px; margin-top:35px;">
                                        <button type="submit" class="btn btn-outline-primary"><i class="icon-printer2 mr-2"></i> <span class="ladda-label labllPay mr-2">Print</span> </button>
                                    </div>
                                </form>
                                </div>
                            </div>

                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                <span>
                                    <span class="badge badge-mark border-success mr-2"></span>

                                    <span class="font-weight-semibold">
                                    </span>
                                </span>
                                <span>
                                    <span class="badge badge-mark border-primary mr-2"></span>

                                    <span class="font-weight-semibold">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row" style="margin-top:15px;">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-blue-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f",$totBasicPay),2); 
                                            ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Total Basic</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-plus22 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-danger-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f", $totDeductions) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Total Deductions</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-dash icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-success-400 has-bg-image">

                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f", $totNetSalary) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Total Net Amount</span>
                                </div>
                                <div class="mr-3 align-self-center">
                                    <i class="icon-balance icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f", $totNetSalaryPayable) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Total Paid</span>
                                </div>
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cash4 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /simple statistics -->

                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> PAYROLL REPORTS</h5>
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
                                <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                <th class="text-center">NAME</th>
                                <th class="text-center">PAY DATE</th>
                                <th class="text-center">BASIC AMOUNT</th>
                                <th class="text-center">TOTAL DEDUCTION</th>
                                <th class="text-center">DEBT BAL B/D</th>
                                <th class="text-center">BALANCE OUTSTANDING</th>
                                <th class="text-center">PAID AMOUNT</th>
                                <th class="text-center">NETPAY</th>
                                <th class="text-center">COMMENTS</th>
                                <th class="text-center">VIEW/PRINT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    
                        if(isset($_REQUEST['duration_select'])){
                            
                            $payrollMonth = $_REQUEST['duration_select'];
                            
                            if($payrollMonth == 0){
                        
                         $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`sacked`, pr.`basic_pay`, pr.`total_deductions`, pr.`empnet_salary_payable`, pr.`date_stored`, pr.`id`, pr.`emp_net_salary`, pr.`comment`, pr.`bal_outstanding`, pr.`debt_bal_b/d` FROM `payroll_store` AS pr INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id`");
                                
                            }else{
                        
                         $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`sacked`, pr.`basic_pay`, pr.`total_deductions`, pr.`empnet_salary_payable`, pr.`date_stored`, pr.`id`, pr.`emp_net_salary`, pr.`comment`, pr.`bal_outstanding`, pr.`debt_bal_b/d` FROM `payroll_store` AS pr INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id` 
                        WHERE `date_stored`='$payrollMonth'");
                                
                            }
                            $sacked = "";
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                $g_sacked = $vSkyRow['sacked'];
                                
                                if($g_sacked == 1){
                                    $sacked = "s";
                                }else{
                                    $sacked = "n";
                                }
                                
                            ?>
                              <?php 
                                         if($sacked == "n"){
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:green;">
                                    
                                    <?php
                                            }else{
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:red;">
                                    <?php
                                         }
                                    ?>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['emp_name']); ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?php echo htmlentities($vSkyRow['date_stored']); ?></a></td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['basic_pay']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['total_deductions']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['debt_bal_b/d']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['bal_outstanding']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['empnet_salary_payable']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['emp_net_salary']); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo htmlentities($vSkyRow['comment']); ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <button onclick="redirectToPersonalePayrollPage(<?php echo $vSkyRow['emp_id']?>)" class="list-icons-item btn btn-light">
                                            <i class="icon-pencil5" style="color:orange;"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        }else{
                            $sacked = "";
                                
                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`sacked`, pr.`basic_pay`, pr.`total_deductions`, pr.`empnet_salary_payable`, pr.`date_stored`, pr.`id`, pr.`emp_net_salary`, pr.`comment`, pr.`bal_outstanding`, pr.`debt_bal_b/d` FROM `payroll_store` AS pr INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id`");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                $g_sacked = $vSkyRow['sacked'];
                                
                                if($g_sacked == 1){
                                    $sacked = "s";
                                }else{
                                    $sacked = "n";
                                }
                                
                            ?>
                              <?php 
                                         if($sacked == "n"){
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:green;">
                                    
                                    <?php
                                            }else{
                                    ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>' style="color:red;">
                                    <?php
                                         }
                                    ?>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?php echo $vSkyRow['date_stored']; ?></a></td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['basic_pay']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['total_deductions']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['debt_bal_b/d']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['bal_outstanding']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['empnet_salary_payable']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_net_salary']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['comment']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <button onclick="redirectToPersonalePayrollPage(<?php echo $vSkyRow['emp_id']?>)" class="list-icons-item btn btn-light">
                                            <i class="icon-pencil5" style="color:orange;"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
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
    
    <!-- Vertical form modal -->
<div id="bulk_advice_linked" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-center" style="margin-left:130px; font-size:20px;">Select Month to Print Advice Linked</span>
            </div>

            <form action="#">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Selected Category</label>
                                <input type="hidden" id="cat_idsdAdvice">
                                <input type="text" id="selCatNameAdvice" readonly class="form-control">
                            </div>

                            <div class="col-sm-8">
                                <label>Number Of Employees In The Selected Category</label>
                                <input readonly type="number" id="totCatsSelAdvice" min="0" max="100" step="1" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Available Months</label>
                                <select name="btCatAdvice" id="btCatAdvice" class="form-control">
                                                <?php
                                         $query = mysqli_query($vSky, "SELECT DISTINCT `date_stored` FROM `payroll_store`");
                                                
                                                while($fetch = mysqli_fetch_array($query)){
                                                    $monthDate = $fetch[0];
                                                    
                                                    $realNewDate = strtotime($monthDate);
                                                    $realDate = date("l, F d Y", $realNewDate);
                                                ?>
                                                <option value="<?= $monthDate; ?>">
                                                    <?= $realDate; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="payslipBycatAdice" class="btn bg-primary"><i class="icon-printer mr-2"></i> Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

    <?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
	?>
    <!-- /footer -->

</body>
<!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-center" style="margin-left:130px; font-size:20px;">Select Month to Print Payslips</span>
            </div>

            <form action="#">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Selected Category</label>
                                <input type="hidden" id="cat_idsd">
                                <input type="text" id="selCatName" readonly class="form-control">
                            </div>

                            <div class="col-sm-8">
                                <label>Number Of Employees In The Selected Category</label>
                                <input readonly type="number" id="totCatsSel" min="0" max="100" step="1" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Available Months</label>
                                <select name="btCat" id="btCat" class="form-control">
                                                <?php
                                         $query = mysqli_query($vSky, "SELECT DISTINCT `date_stored` FROM `payroll_store`");
                                                
                                                while($fetch = mysqli_fetch_array($query)){
                                                    $monthDate = $fetch[0];
                                                    
                                                    $realNewDate = strtotime($monthDate);
                                                    $realDate = date("l, F d Y", $realNewDate);
                                                ?>
                                                <option value="<?= $monthDate; ?>">
                                                    <?= $realDate; ?>
                                                </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="payslipBycat" class="btn bg-primary"><i class="icon-printer mr-2"></i> Print</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

</html>
