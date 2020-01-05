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

                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> View Payroll</h5>
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
                                <th class="text-center">LAST PAY DATE</th>
                                <th class="text-center">LAST BASIC AMOUNT</th>
                                <th class="text-center">LAST TOTAL DEDUCTION</th>
                                <th class="text-center">LAST PAID AMOUNT</th>
                                <th class="text-center">LAST PAYSLIP</th>
                                <th class="text-center">VIEW/MODIFY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $vSkyStmt = mysqli_query($vSky, "SELECT py.`payroll_lastPayId`,emp.`emp_id`, emp.`emp_name`, py.`pay_date`, pr.`basic_pay`, pr.`total_deductions`, pr.`empnet_salary_payable` 
                        FROM `pay_dates_pay` AS py 
                        INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=py.`emp_id` 
                        INNER JOIN `employees` AS emp ON pr.`emp_id`=emp.`emp_id` 
                        WHERE py.`payroll_lastPayId`=pr.`id` AND emp.`is_pending`='0' 
                        AND emp.`on_leave`='0' AND emp.`sacked`='0' ORDER BY py.`id` ASC");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?php echo $vSkyRow['pay_date']; ?></a></td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['basic_pay']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['total_deductions']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['empnet_salary_payable']; ?>
                                </td>
                                <td class="text-center">
                                    <button onclick="gen_lastPayRoll_emp('<?php echo $vSkyRow['payroll_lastPayId']?>','<?php echo $vSkyRow['emp_id']; ?>')" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_vertical">
                                        <i class="icon-printer2" style="color:#14b9ea;"></i>
                                    </button> </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <button onclick="redirectToPersonalePayrollPage(<?php echo $vSkyRow['emp_id']?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_vertical">
                                            <i class="icon-pencil5" style="color:orange;"></i>
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

</html>
