<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");

if(isset($_REQUEST['__i_g_'])){
    $val = $_REQUEST['__i_g_'];
    $val2 = base64_decode($val);
    $totBasicPay = 0;
    $totDeductions = 0;
    $totNetSalary = 0;
    $totNetSalaryPayable = 0;
    
    $query = "SELECT * FROM `employees` AS emp 
                INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=emp.`emp_id` 
                INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                INNER JOIN `pay_dates_pay` AS py ON emp.`emp_id`=py.`emp_id`
                WHERE emp.`emp_id`='$val2'";
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
        $last_payID = $row['payroll_lastPayId'];
        $lastDate = $row['last_payDate'];
        $gg_sacked = $row['sacked'];
        
       $totBasicPay+=$basicPay;
       $totDeductions+=$totDeduc;
       $totNetSalary+=$totNetSal;
       $totNetSalaryPayable+=$totNetSalPay;
    }
    
    $lastPayableAmtQuery = mysqli_query($vSky, "SELECT `empnet_salary_payable` FROM `payroll_store` WHERE `id`='$last_payID' LIMIT 1");
    if($lastPayFetch = mysqli_fetch_array($lastPayableAmtQuery)){
        $lastpay = $lastPayFetch[0];
    }
    
    ////// Remaining Days
    $timestamp = strtotime(date('Y-m-d'));
    $daysRemaining = (int)date('t', $timestamp) - (int)date('j', $timestamp);

    /// last day of next month
    $lastDateOfNextMonth =strtotime('last day of next month') ;
    $lastDay = date('Y-m-d', $lastDateOfNextMonth);

    
    function getExactDateAfterMonths($timestamp, $months){
    $day_current_date            = date('d', $timestamp);
    $first_date_of_current_month = date('01-m-Y', $timestamp);
    // 't' gives last day of month, which is equal to no of days
    $days_in_next_month          = date('t',  strtotime("+".$months." months", strtotime($first_date_of_current_month)));

    $days_to_substract = 0;
    if($day_current_date > $days_in_next_month)
         $days_to_substract = $day_current_date - $days_in_next_month;

    $php_date_after_months   = strtotime("+".$months." months", $timestamp);
    $exact_date_after_months = strtotime("-".$days_to_substract." days", $php_date_after_months);

    return date('Y-m-d',$exact_date_after_months);
}

$query_system = mysqli_query($vSky, "SELECT * FROM `sys_settings`");
while($get_infos = mysqli_fetch_assoc($query_system)){
    $com_name = $get_infos['company_name'];
    $com_currency = $get_infos['currency'];
}

if($com_currency == "GHC"){
    $currency = "GH₵";
}

// $php_date_after_months   => 02-03-2016
// $exact_date_after_months => 28-02-2016
    
        $status = "";
    
    if($gg_sacked == 0){
        $status = "Active";
        $bg_color = "bg-success-400";
        $was = "";
    }else{
        $status = "Not Active";
        $bg_color = "bg-warning-400";
        $lastpay = 0;
        $daysRemaining = "Not Applicable";
        $lastDay = "Not Applicable";
        $was = "Was";
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
                <form id="pay_form" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <!--                    <div class="row " style="margin:0px 10px 20px;">-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border-left-3 border-left-success rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">
                                                <?php echo $emp_name; ?>
                                            </h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Category <?= $was; ?> :
                                                    <?php echo $cat_name; ?>
                                                </li>
                                                <li>Department <?= $was; ?> :
                                                    <?php echo $dept_name; ?>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <h6 class="font-weight-semibold">Next Net Payable:
                                                <?= $currency." ".$lastpay; ?>
                                            </h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Position <?= $was; ?> :
                                                    <?php echo $pos_name; ?>
                                                </li>
                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge <?= $bg_color; ?> align-top " data-toggle="dropdown"><?= $status; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                    <span>
                                        <span class="badge badge-mark border-success mr-2"></span>
                                        Next Pay Due:
                                        <span class="font-weight-semibold">
                                            <?= $lastDay; ?></span>
                                    </span>
                                    <span>
                                        <span class="badge badge-mark border-warning mr-2"></span>
                                        Days left For this Months Pay:
                                        <span class="font-weight-semibold">
                                            <?= $daysRemaining; ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row " style="margin:0px 0px 30px;">
                        <div class="col ">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col ">

                        </div>

                    </div>
                    <div class="row" style="margin-top:-15px;">
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

                    <div class="row " style="margin:0px 0px 20px;">
                        <div class="col " style="margin-left:0px; margin-top:35px;">
                            <!--                            <button type="button" onclick="del_al_slip()" id="_del_items_all" class="btn btn-outline-danger"><i class="icon-trash-alt mr-2"></i> <span class="ladda-label labllPay mr-2">Delete</span> </button>-->
                        </div>
                        <div class="col ">

                        </div>
                        <div class="col">

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
                        </div>

                    </div>
                </form>
                <script>
                    $('#btn_new').click(function(){ window.location = 'add_mem'});
						           </script>
                <!-- Scrollable datatable -->
                <div class="card">
                    <table class="table datatable-scroll-y" id="payroll_form" width="100%">
                        <thead>
                            <tr>
                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>
                                <th class="text-center">Basic Pay</th>
                                <th class="text-center">Pay Date</th>
                                <!--                                <th class="text-center">Pay Period</th>-->
                                <th class="text-center">Gross</th>
                                <th class="text-center">Paye</th>
                                <th class="text-center">Employee (SSF)</th>
                                <th class="text-center">Employer (SSF)</th>
                                <th class="text-center">Deductions</th>
                                <th class="text-center">Net</th>
                                <th class="text-center">Paid</th>
                                <th class="text-center">Recurring</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, pr.* FROM `employees` AS emp 
                                    INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=emp.`emp_id` 
                                    WHERE emp.`emp_id`='$val2'");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                
                                    $vSkyStmt3 = mysqli_query($vSky, "SELECT emp.`emp_id`, pr.* FROM `employees` AS emp 
                                    INNER JOIN `payroll_store` AS pr ON pr.`emp_id`=emp.`emp_id` 
                                    WHERE (emp.`is_pending`!='0' OR emp.`on_leave`!='0' OR emp.`sacked`!='0') AND emp.`emp_id`='$val2'");
                                    
                                    $count = mysqli_num_rows($vSkyStmt3);
                                                                
                            ?>
                            <tr id='row_<?php echo $vSkyRow['id']; ?>'>
                                <td><input type='checkbox' name='<?= $vSkyRow['id']; ?>' id='memTypeId_
                                    <?php echo $vSkyRow['id']; ?>' class='checkboxes'>
                                </td>
                                <td class="text-center">
                                    <?php 
                                        echo $vSkyRow['basic_pay'];
                                    ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?php echo $vSkyRow['date_stored']; ?></a>
                                </td>
                                <!--
                                <td class="text-center">
                                </td>
-->
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_gross_salary']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_paye']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['employee_ssf']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['employer_ssf']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['deductions']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_net_salary']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['empnet_salary_payable']; ?>
                                </td>
                                <td class="text-center">
                                    YES
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <?php
                                            if($count > 0){
                                        ?>
                                        <button onclick="gen_paySlip('<?php echo $vSkyRow['id']?>','<?php echo $vSkyRow['emp_id']?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-printer2" style="color:#1185b1;"></i>
                                        </button>
                                        <?php
                                        }else{
                                        ?>
                                        <button onclick="gen_paySlip('<?php echo $vSkyRow['id']?>','<?php echo $vSkyRow['emp_id']?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-printer2" style="color:#1185b1;"></i>
                                        </button>

                                        <button onclick="display_empPayEdit('<?php echo $vSkyRow['id']?>','<?php echo $vSkyRow['emp_id']?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-pencil5" style="color:#b78b0f;"></i>
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

<script type="text/javascript">
    $('input[type="checkbox"]').on('click', function() {
        if (this.checked) {

            $('#row_' + this.name).css('background-color', '#2e89ab');
            $('#row_' + this.name).css('color', '#fff');
            $('.dropdown').css('color', "#3b3b3b");
            var all_checked = false;

            var check_boxes = document.getElementsByClassName('checkboxes');

            for (var x = 0; x < check_boxes.length; x++) {
                if (check_boxes[x].checked) {
                    all_checked = true;
                } else {
                    all_checked = false;
                    break;
                }
            }
            var all_check_box = document.getElementById('selectall');
            if (all_checked == true) {
                all_check_box.checked = true;
            }

        } else {

            $('#row_' + this.name).css('background-color', '');
            $('#row_' + this.name).css('color', '#000');

            var all_check_box = document.getElementById('selectall');

            if (all_check_box.checked) {
                all_check_box.checked = false;
            }
        }
    });

    $('#selectall').on('click', function() {

        if (this.checked) {
            var check_boxes = document.getElementsByClassName('checkboxes');

            for (var x = 0; x < check_boxes.length; x++) {
                check_boxes[x].checked = true;
                var checkbox_id = check_boxes[x].name;
                $('#row_' + checkbox_id).css('background-color', '#2e89ab');
                $('#row_' + checkbox_id).css('color', '#fff');
                $('.dropdown').css('color', "#3b3b3b");
            }
            for (var x = 0; x < check_boxes.length; x++) {
                check_boxes[x].checked = true;
                var checkbox_id = check_boxes[x].name;
                $('#row_' + checkbox_id).css('background-color', '#2e89ab');
                $('#row_' + checkbox_id).css('color', '#fff');
                $('.dropdown').css('color', "#3b3b3b");
            }
        } else {
            var check_boxes = document.getElementsByClassName('checkboxes');

            for (var x = 0; x < check_boxes.length; x++) {
                check_boxes[x].checked = false;
                var checkbox_id = check_boxes[x].name;
                $('#row_' + checkbox_id).css('background-color', '');
                $('#row_' + checkbox_id).css('color', '#000');
            }
        }
    })


    $("#search_bib").keydown(() => {
        $("#search_bib").css("border", "1px solid #ddd");
        $("#search_bib").css("box-shadow", "0 0 0 0 transparent");
    });

</script>

</html>
<?php
    
    }else{
    echo "HAHAHAHA FUCK OFF MAN WHO SENT YOU :( GO BACK TO YOUR PAPA  ";
}
?>
