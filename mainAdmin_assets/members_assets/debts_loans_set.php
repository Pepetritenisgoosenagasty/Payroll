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
                <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////             -->
                <?php
                
                $totdebt_db= 0;
                $totcur = 0;
                $totDebt_db = 0;
                $totduc_db = 0;
                $totawtstndn_db = 0;
                $totdeduc_of_deduc_db = 0;
                        
                    $stmt = "SELECT de.`deduc_id` , emp.`emp_id`, emp.`emp_name`, de.`deduc_date`,         deb.* 
                            FROM `deduct_date_deduct` AS de 
                            INNER JOIN `debts_loans /_surcharges _deductions` AS deb ON de.`emp_id`=deb.`emp_id`
                            INNER JOIN `employees` AS emp ON emp.`emp_id`=deb.`emp_id`
                            WHERE de.`deduc_id`=deb.`id`";
                
                        $query = mysqli_query($vSky, $stmt);
                        while($row = mysqli_fetch_assoc($query)){
                            $debt_db = $row['debt_bal_b/d'];
                            $cur_db = $row['current_loans/surcharges'];
                            $toDebt_db = $row['total_debt'];
                            $deduc_db = $row['deductions'];
                            $awtstndn_db = $row['bal_outstanding'];
                            $deduc_of_deduc_db = $row['total_deductions'];
                            
                            $totdebt_db += $debt_db;
                            $totcur += $cur_db;
                            $totDebt_db += $toDebt_db;
                            $totduc_db += $deduc_db;
                            $totawtstndn_db += $awtstndn_db;
                            $totdeduc_of_deduc_db += $deduc_of_deduc_db;
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

                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-blue-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totdebt_db, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF TOTAL DEBT BAL B/D</b></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-move-down icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-danger-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totcur, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF CURRENT LOANS/SURCHARGES</b></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-move-right icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totDebt_db, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF TOTAL DEBT</b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-law icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totduc_db, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF DEDUCTIONS</b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-plus22 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-orange-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totawtstndn_db, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF BALANCE OUTSTANDING</b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-sync icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 col-xl-6">
                        <!--
                        <div class="card border-left-3 border-left-success rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <h6 class="font-weight-semibold">
                                        </h6>
                                        <ul class="list list-unstyled mb-0">
                                            <li>
                                            Category:
                                            </li>
                                            <li>
                                            Department:
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                        <h6 class="font-weight-semibold"> </h6>
                                        <ul class="list list-unstyled mb-0">
                                            <li>    Position:
                                           <li>
                                            </li>
                                            <li class="dropdown">
                                                Status: &nbsp;
                                                <a href="#" class="badge bg-success-400 align-top " data-toggle="dropdown">Active</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                <span>
                                    <span class="badge badge-mark border-success mr-2"></span>
                                    Next Deduction Due Date:
                                    <span class="font-weight-semibold">
                                    </span>
                                </span>
                                <span>
                                    <span class="badge badge-mark border-warning mr-2"></span>
                                    Days left For Next Deductions:
                                    <span class="font-weight-semibold">
                                    </span>
                                </span>
                            </div>
                        </div>
-->
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-slate-400 has-bg-image">
                            <div class="media">
                                <div class="mr-0 align-self-center">
                                    <i class="icon-repo-forked icon-3x opacity-75"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format($totdeduc_of_deduc_db, 2); ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>SUM OF TOTAL DEDUCTIONS</b></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /simple statistics -->



                <form action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="row " style="margin:20px;">
                        <div class="col-auto" style="margin-top:35px;">
                            <button type="button" id="toggle_tables" class="btn btn-outline-warning"><i class="icon-drag-left-right mr-2"></i>Toggle Between Last Debt/ Currently Added Charges /Employees List</button>
                        </div>
                        <input type="hidden" id="toggle_val" value="1">
                        <div id="cat_field_hide" style="display:contents">
                            <label class="col-form-label col-lg-1" style="margin-top:35px;"> <b>Categories:</b> </label>
                            <div class="col-lg-3" style="margin-top:35px;">
                                <select class="form-control" id="cat_id" name="cat_id">
                                    <option value="opt1">- Click To Select Category ---</option>
                                    <?php
                                            $stmt = mysqli_query($vSky, "SELECT * FROM `main_category`");
                                            while($row = mysqli_fetch_assoc($stmt)){
                                                
                                            ?>
                                    <option value="<?= $row['cat_id']; ?>">
                                        <?= $row['cat_name']; ?>
                                    </option>
                                    <?php
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="col" style="margin-top:35px;">
                                <button type="submit" id="btn_cat_search" class="btn btn-outline-success"><i class="icon-plus2 mr-2"></i><span id="new_sheet">Search By Category </span></button>
                            </div>
                        </div>


                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>

                        <!--
                        <div class="col-auto" style="margin-top:35px;">
                            <button type="button" id="btn_new_sheet" class="btn btn-outline-primary"><i class="icon-plus2 mr-2"></i><span id="new_sheet"> Add New Sheet</span></button>

                        </div>
-->

                    </div>
                </form>

                <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////              
                <!-- Scrollable datatable -->

                <div class="card">
                    <div style="display:table;" id="employees_list">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> LIST OF EMPLOYEES</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                </div>
                            </div>
                        </div>


                        <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                        <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                        <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                            <thead>
                                <tr>
                                    <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                    <th class="text-center" width="10">NAME</th>
                                    <th class="text-center" width="10">CATEGORY</th>
                                    <th class="text-center" width="10">POSITION</th>
                                    <th class="text-center" width="10">SSNIT NO.</th>
                                    <th class="text-center" width="10">BASIC SALARY</th>
                                    <th class="text-center" width="10">ADD CHARGES/VIEW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            if(isset($_REQUEST['cat_id'])){
                                $cat_id = mysqli_real_escape_string($vSky, trim(strip_tags($_REQUEST['cat_id'])));
                                
                                if($cat_id == "opt1"){
                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, emp.`emp_basic`, cat.`cat_name`, pos.`pos_type_name`, emp.`emp_gross_salary` FROM `employees` AS emp
                        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                        INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                        AND emp.`is_pending`='0' AND emp.`on_leave`='0' AND emp.`sacked`='0'");
                                }else{
                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, emp.`emp_basic`, cat.`cat_name`, pos.`pos_type_name`, emp.`emp_gross_salary` FROM `employees` AS emp
                        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                        INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id` WHERE emp.`emp_main_cat_id`='$cat_id'
                        AND emp.`is_pending`='0' AND emp.`on_leave`='0' AND emp.`sacked`='0'");
                                }
                                
     
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_name']; ?>
                                    </td>
                                    <td class="text-center" width="10"><a href="javascript:;">
                                            <?php echo $vSkyRow['cat_name']; ?></a>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['pos_type_name']; ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_ssnit']; ?>
                                    </td>
                                    <td class="text-center" width="50">
                                        <?php echo $currency." ".number_format($vSkyRow['emp_basic'], 2); ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-primary" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')" data-toggle="modal" data-target="#addDebt">
                                                <i class="icon-plus22"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                                
                             ?>
                                <?php   
                                
                            }else{
                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, emp.`emp_basic`, cat.`cat_name`, pos.`pos_type_name`, emp.`emp_gross_salary` FROM `employees` AS emp
                        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                        INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                        WHERE emp.`is_pending`='0' AND emp.`on_leave`='0' AND emp.`sacked`='0'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_name']; ?>
                                    </td>
                                    <td class="text-center" width="10"><a href="javascript:;">
                                            <?php echo $vSkyRow['cat_name']; ?></a>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['pos_type_name']; ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_ssnit']; ?>
                                    </td>
                                    <td class="text-center" width="50">
                                        <?php echo $currency." ".number_format($vSkyRow['emp_basic'], 2); ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-primary" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')" data-toggle="modal" data-target="#addDebt">
                                                <i class="icon-plus22"></i>
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

                    <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                    <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->

                    <div style="display:none;" id="current_debs">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> Current Surcharges/Debts</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                </div>
                            </div>
                        </div>


                        <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                        <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                        <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                            <thead>
                                <tr>
                                    <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                    <th class="text-center" width="10">NAME</th>
                                    <th class="text-center" width="10">CURRENT DEBT DATE</th>
                                    <th class="text-center" width="10">SURCHARGES</th>
                                    <th class="text-center" width="10">OTHER DEDUCTIONS</th>
                                    <th class="text-center" width="50">COMMENTS</th>
                                    <th class="text-center" width="10">VIEW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        $vSkyStmt = mysqli_query($vSky, "SELECT debt_sur.`id`, emp.`emp_name`, debt_sur.`emp_id`, debt_sur.`debt_surcharges`, debt_sur.`other_deduc`, debt_sur.`input_date`, debt_sur.comments FROM `debt_surcharges` AS debt_sur
                        INNER JOIN `employees` as emp ON emp.`emp_id`=debt_sur.`emp_id` WHERE emp.`is_pending`='0' 
                            AND emp.`on_leave`='0' AND emp.`sacked`='0'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_name']; ?>
                                    </td>
                                    <td class="text-center" width="10"><a href="javascript:;">
                                            <?php echo $vSkyRow['input_date']; ?></a>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $currency." ".number_format($vSkyRow['debt_surcharges'], 2); ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php echo $currency." ".number_format($vSkyRow['other_deduc'], 2); ?>
                                    </td>
                                    <td class="text-center" width="50">
                                        <?php echo $vSkyRow['comments']; ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <div class="list-icons">

                                            <button class="list-icons-item btn btn-light" onclick="get_empCur('<?php echo $vSkyRow['id']; ?>')" data-toggle="modal" data-target="#curChrgs">
                                                <i class="icon-eye" style="color:orange;"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-danger" onclick="del_Cur('<?php echo $vSkyRow['id']; ?>')">
                                                <i class="icon-trash delDebtChr<?php echo $vSkyRow['id']; ?>"></i>
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
                    <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                    <!--   ///////////////////////////////////////////////////////////////////////////////////////////         -->
                    <div style="display:none;" id="previous_debs">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> Previous Debt/Surcharges</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                </div>
                            </div>
                        </div>
                        <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                            <thead>
                                <tr>
                                    <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">LAST DEBT DATE</th>
                                    <th class="text-center">DEBT BAL B/DT</th>
                                    <th class="text-center">PREVIOUS LOANS/ SURCHARGES</th>
                                    <th class="text-center">TOTAL DEBT</th>
                                    <th class="text-center">DEDUCTIONS</th>
                                    <th class="text-center">BALANCE OUTSTANDING</th>
                                    <th class="text-center">TOTAL DEDUCTIONS</th>
                                    <th class="text-center">VIEW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $vSkyStmt = mysqli_query($vSky, "SELECT de.`deduc_id` , emp.`emp_id`, emp.`emp_name`, de.`deduc_date`,         deb.* 
                            FROM `deduct_date_deduct` AS de 
                            INNER JOIN `debts_loans /_surcharges _deductions` AS deb ON de.`emp_id`=deb.`emp_id`
                            INNER JOIN `employees` AS emp ON emp.`emp_id`=deb.`emp_id`
                            WHERE de.`deduc_id`=deb.`id` AND emp.`is_pending`='0' 
                            AND emp.`on_leave`='0' AND emp.`sacked`='0' ORDER BY de.`id` ASC");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                    <td class="text-center">
                                        <?php echo $vSkyRow['emp_name']; ?>
                                    </td>
                                    <td class="text-center"><a href="javascript:;">
                                            <?php echo $vSkyRow['deduc_date']; ?></a></td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['debt_bal_b/d'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['current_loans/surcharges'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['total_debt'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['deductions'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['bal_outstanding'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $currency." ".number_format( $vSkyRow['total_deductions'],2); ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">

                                            <button class="list-icons-item btn btn-light" onclick="get_empDEtails('<?php echo $vSkyRow['deduc_id']; ?>','<?php echo $vSkyRow['emp_id']; ?>')" data-toggle="modal" data-target="#modal_form_vertical">
                                                <i class="icon-eye" style="color:orange;"></i>
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
                <!-- /scrollable datatable -->



            </div>
            <!-- /content area -->


        </div>
        <!-- /main content -->
        <!-- Vertical form modal -->
        <div id="addDebt" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <form action="#" id="gen_form">
                        <div class="modal-body">

                            <div class="card-body">
                                <form action="#" id="edit_payslip">
                                    <input type="hidden" id="eAmpID" name="eAmpID">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"><b>Employee Name:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly type="text" name="eAmpName" id="eAmpName" class="form-control">
                                                    </div>

                                                    <label class="col-lg-2 col-form-label"><b>Payroll Date:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly type="date" name="eAmpPDate" id="eAmpPDate" class="form-control">
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
                                                        <input readonly name="eAmpSsnit" id="eAmpSsnit" type="text" class="form-control">
                                                    </div>

                                                    <label class="col-lg-2 col-form-label"><b>Category:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly readonly type="text" name="eAmpCatName" id="eAmpCatName" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr style="border: 1px solid orange; margin-bottom:0px;">
                                    <div class="text-center"><b>CHARGES FILEDS</b></div>
                                    <hr style="border: 1px solid orange; margin-top:0px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">

                                                    <label class="col-lg-2 col-form-label"><b> Surcharges:</b></label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="eAmpCurLoanSur" id="eAmpCurLoanSur" value="0" class="form-control numbersonly-format">
                                                    </div>

                                                    <label class="col-lg-2 col-form-label"><b>Other Charges:</b></label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="od_chrg" id="od_chrg" class="form-control numbersonly-format">
                                                    </div>

                                                </div>

                                                <div class="form-group row">

                                                    <label class="col-lg-1 col-form-label"><b>Comment:</b></label>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="comment" id="comment" class="form-control">
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>


                                    <hr style="border: 1px solid orange;">
                                    <span style="padding-left:450px;"><b>PLEASE NOTE THAT CHARGES WILL BE ADDED TO HIS/HER NEXT PAYROLL</b></span>
                                    <hr style="border: 1px solid orange;">
                                </form>
                            </div>
                            <div class="modal-footer">

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="button" id="apply_emp_emp" onclick="aplychrgs()" class="btn bg-primary"><span id="addddPos" class="ladda-label labll">Apply</span><i class="icon-plus22 ml-2 appEmp"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /vertical form modal -->
    </div>
    <!-- /page content -->
    <!-- Footer -->
    <?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
	?>
    <!-- /footer -->

</body>
<!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action="#" id="gen_form">
                <div class="modal-body">

                    <div class="card-body">
                        <form action="#" id="edit_payslip">
                            <input type="hidden" id="eEmpCatID" name="eEmpCatID">
                            <input type="hidden" id="eEmpID" name="eEmpID">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employee Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eEmpName" id="eEmpName" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Payroll Date:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="date" name="eEmpPDate" id="eEmpPDate" class="form-control">
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
                                                <input readonly name="eEmpSsnit" id="eEmpSsnit" type="text" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Category:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly readonly type="text" name="eEmpCatName" id="eEmpCatName" class="form-control">
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
                                            <label class="col-lg-2 col-form-label"><b>Debt Bal B/D:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eEmpDebtBal" id="eEmpDebtBal" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Current Loans/ Surcharges:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eEmpCurLoanSur" id="eEmpCurLoanSur" value="0" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Deductions:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eEmpDeduct" id="eEmpDeduct" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Total Debt:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly name="eEmpTotDebt" id="eEmpTotDebt" value="0" type="text" class="form-control numbersonly-format">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="background-color:#e8e1e1; padding:10px; padding-bottom:0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"><b>Balance Outstanding:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="eEmpBlaAwt" id="eEmpBlaAwt" value="0" class="form-control numbersonly-format">
                                                </div>

                                                <label class="col-lg-2 col-form-label"></label>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top:20px;">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><b>Comments:</b></label>
                                                    <input readonly type="text" id="eEmpcomment" name="eEmpcomment" class="form-control">
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

</html>
<!-- Vertical form modal -->
<div id="curChrgs" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action="#" id="gen_form">
                <div class="modal-body">

                    <div class="card-body">
                        <form action="#" id="edit_payslip">
                            <input type="hidden" id="eCmpID" name="eCmpID">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Employee Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eCmpName" id="eCmpName" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Payroll Date:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="date" name="eCmpPDate" id="eCmpPDate" class="form-control">
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
                                                <input readonly name="eCmpSsnit" id="eCmpSsnit" type="text" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Category:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly readonly type="text" name="eCmpCatName" id="eCmpCatName" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange; margin-bottom:0px;">
                            <div class="text-center"><b>CHARGES FILEDS</b></div>
                            <hr style="border: 1px solid orange; margin-top:0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label"><b> Surcharges:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="eCmpCurLoanSur" id="eCmpCurLoanSur" value="0" class="form-control numbersonly-format">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Other Charges:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="od_Cchrg" id="od_Cchrg" class="form-control numbersonly-format">
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-1 col-form-label"><b>Comment:</b></label>
                                            <div class="col-lg-12">
                                                <input readonly type="text" name="cComment" id="cComment" class="form-control">
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->
