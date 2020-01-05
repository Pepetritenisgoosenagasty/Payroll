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
                $date_year = date("Y");
                        
                    $stmt = "SELECT * FROM `current_trips`";
                    $query = mysqli_query($vSky, $stmt);
                    $total_trips = mysqli_num_rows($query);
                    
                    $count_dr = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `on_trip`='1' AND `is_driver`='1' AND `is_assigned`='1'");
                    $total_dr_on_trip = mysqli_num_rows($count_dr);

                    $count_nun_dr = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `on_trip`='0' AND `is_driver`='1' AND `is_assigned`='1'");
                    $total_dr_not_trip = mysqli_num_rows($count_nun_dr);
                
                    $count_his_trips = mysqli_query($vSky, "SELECT * FROM `trips_history`");
                    $total_his_trips = mysqli_num_rows($count_his_trips);
                
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
                                        <?= $total_trips; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF CURRENT TRIPS</b></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-road icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-danger-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $total_dr_on_trip; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF DRIVERS ON TRIP</b></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-user icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $total_dr_not_trip; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF DRIVERS NOT ON TRIP</b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-user-cancel icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $total_his_trips; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF TRIPS FOR
                                            <?= $date_year; ?></b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-database-time2 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /simple statistics -->



                <form>
                    <div class="row " style="margin:20px;">
                        <div class="col-auto" style="margin-top:35px;">
                            <button type="button" id="toggle_tables_trip" class="btn btn-outline-warning"><i class="icon-drag-left-right mr-2"></i>Toggle Between Added Trips / Process Returned Trips</button>
                        </div>
                        <div id="mv_to_history" style="display:none">
                            <div class="col-auto" style="margin-top:35px; margin-left:700px;">
                                <button type="button" id="move_to_history_btn" class="btn btn-outline-primary"><i class="icon-forward mr-2"></i>Click To Move All To History After Confirming Values</button>
                            </div>
                        </div>

                        <input type="hidden" id="toggle_val_trip" value="1">
                        <div id="dr_field_hide" style="display:contents">
                            <label class="col-form-label col-lg-1" style="margin-top:35px;"> <b>Drivers Names:</b> </label>
                            <div class="col-lg-3" style="margin-top:35px;">
                                <select class="form-control catsel" id="trip_id" name="trip_id">
                                    <?php
                                            $stmt = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='1' AND `is_available`='1' AND `is_driver`='1' AND `on_trip`='0'");
                                            while($row = mysqli_fetch_assoc($stmt)){
                                                
                                            ?>
                                    <option value="<?= $row['driver_emp_id']; ?>">
                                        <?= $row['driver_name']; ?>
                                    </option>
                                    <?php
                                            }
                                            ?>
                                </select>

                            </div>
                            <div class="col" style="margin-top:35px;">
                                <button type="button" id="get_dr_info" class="btn btn-outline-success" data-toggle="modal" data-target="#new_trip_n"><i class="icon-plus2 mr-2"></i><span id="new_trip">Click To Process Trip After Selecting Driver </span></button>
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
                    <div style="display:table;" id="current_trips_list">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> LIST OF ADDED TRIPS</h5>
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
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">NAME</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">LOADING DATE</span></th>

                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">WAYBILL No.</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">VEHICLE NO.</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">PRDT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">QTY</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">LOADING PT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">DISCARGING PT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">DISTANCE</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">RATE</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">AMOUNT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">EDIT / RETURN / DELETE</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        $vSkyStmt = mysqli_query($vSky, "SELECT `id`, `emp_id`, `driver_id`, `driver_name`, `location_id`, `main_company_name`, `sub_company_name`, `loading_date`, `discharging_date`, `waybill_no`, `truck_no`, `truck_id`, `product`, `qty`, `loading_pt`, `discharging_pt`, `distance`, `rate`, `amount`, `shortage`, `shortage_val`, `overnight_allowance`, `amount_due`, `fuel_consumed`, `fuel_consumed_in_cash`, `is_done`, `is_inprogress`, `input_date_time` FROM `current_trips` WHERE `is_done`='0' AND `is_inprogress`='1'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?= $vSkyRow[' id']; ?>'>

                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $vSkyRow['driver_name']; ?></span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:10.5px; font-weight:bold;">
                                                <?= $vSkyRow['loading_date']; ?></span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $vSkyRow['waybill_no']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $vSkyRow['truck_no']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $vSkyRow['product']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $vSkyRow['qty']; ?></span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:10.5px; font-weight:bold;">
                                                <?= $vSkyRow['loading_pt']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:10.5px; font-weight:bold;">
                                                <?= $vSkyRow['discharging_pt']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:10.5px; font-weight:bold;">
                                                <?= $vSkyRow['distance']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:10.5px; font-weight:bold;">
                                                <?= $vSkyRow['rate']; ?></span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;">
                                            <?= $currency." ".number_format($vSkyRow['amount'], 2); ?></span>
                                    </td>
                                    <td class="text-left">
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-warning" onclick="return_trip_edit('<?= $vSkyRow['id']; ?>')" data-toggle="modal" data-target="#edit_new_trip">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-primary" onclick="return_trip('<?= $vSkyRow['id']; ?>')" data-toggle="modal" data-target="#returned_trip">
                                                <i class="icon-loop3"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-danger" onclick="return_trip_delete('<?= $vSkyRow['id']; ?>')">
                                                <i class="icon-trash"></i>
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
                    <div style="display:none;" id="trip_history">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> RETURNED FROM TRIP</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                </div>
                            </div>
                        </div>
                        <table class="table datatable-scroll-y" id="recordsTable33" width="100%" style="margin-left:0px; width:1380px;">
                            <thead>
                                <tr>
                                    <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">NAME</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">LOADING DATE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">DISCHARGING DATE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">WAYBILL No.</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">VEHICLE NO.</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">PRDT</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">QTY</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">SHORTAGE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">SHORTAGE VALUE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">OVERNIGHT ALLOWANCE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">AMOUNT DUE</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">FUEL CONSUMED</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">FUEL CONSUMED IN CASH</span></th>
                                    <th class="text-left"><span style="font-size:11px; font-weight:bold;">EDIT/NOT RETURNED</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        $vSkyStmt = mysqli_query($vSky, "SELECT `id`, `emp_id`, `driver_id`, `driver_name`, `location_id`, `main_company_name`, `sub_company_name`, `loading_date`, `discharging_date`, `waybill_no`, `truck_no`, `truck_id`, `product`, `qty`, `loading_pt`, `discharging_pt`, `distance`, `rate`, `amount`, `shortage`, `shortage_val`, `overnight_allowance`, `amount_due`, `fuel_consumed`, `fuel_consumed_in_cash`, `is_done`, `is_inprogress`, `input_date_time` FROM `current_trips` WHERE `is_done`='1' AND `is_inprogress`='0'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?= $vSkyRow[' id']; ?>'>

                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['driver_name']; ?></span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $vSkyRow['loading_date']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $vSkyRow['discharging_date']; ?></span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['waybill_no']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['truck_no']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['product']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['qty']; ?></span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $vSkyRow['shortage']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $vSkyRow['shortage_val']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $currency." ".number_format($vSkyRow['overnight_allowance'], 2); ?>
                                            </span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                            <span style="font-size:9.5px; font-weight:bold;">
                                                <?= $currency." ".number_format($vSkyRow['amount_due'], 2); ?>
                                            </span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $vSkyRow['fuel_consumed']; ?></span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:9.5px; font-weight:bold;">
                                            <?= $currency." ".number_format($vSkyRow['fuel_consumed_in_cash'], 2); ?></span>
                                    </td>
                                    <td class="text-left">
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-default" onclick="edit_returned_vals('<?php echo $vSkyRow['id']; ?>')" data-toggle="modal" data-target="#edit_trip">
                                                <i class="icon-pencil"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-warning" onclick="put_id_back('<?php echo $vSkyRow['id']; ?>')">
                                                <i class="icon-reset"></i>
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
        <div id="new_trip_n" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="#" id="t_form">
                        <div class="modal-body">

                            <div class="card-body">
                                <form action="#" id="t_trip_t">
                                    <input type="hidden" id="t_drID" name="t_drID">
                                    <input type="hidden" id="t_tkID" name="t_tkID">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"><b>Driver Name:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly type="text" name="t_drName" id="t_drName" class="form-control">
                                                    </div>

                                                    <label class="col-lg-2 col-form-label"><b>Vehicle Number:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly type="text" name="t_vName" id="t_vName" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"> <b>Loading Date:</b> </label>
                                                    <div class="col-lg-4">
                                                        <input name="t_lDate" id="t_lDate" type="date" class="form-control">
                                                    </div>

                                                    <label class="col-lg-2 col-form-label"><b>Discharging Date:</b></label>
                                                    <div class="col-lg-4">
                                                        <input readonly readonly type="date" name="t_dDate" id="t_dDate" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"> <b>Main Company:</b> </label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" id="mainCom_id" name="mainCom_id">
                                                            <option value="t_sel">- Click To Select Main Company ---</option>
                                                            <?php
                                                            $stmt = mysqli_query($vSky, "SELECT * FROM `main_companies`");
                                                            while($row = mysqli_fetch_assoc($stmt)){

                                                            ?>
                                                            <option value="<?= $row['id']; ?>">
                                                                <?= $row['name']; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label class="col-lg-2 col-form-label"><b>Sub Company:</b></label>
                                                    <div class="col-lg-4">
                                                        <div id="subComSel" style="display:none;">
                                                            <select class="form-control" id="subCom_id" name="subCom_id">
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr style="border: 1px solid orange; margin-bottom:0px;">
                                    <div class="text-center"><b>TRIP FILEDS</b></div>
                                    <hr style="border: 1px solid orange; margin-top:0px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group row">

                                                    <label class="col-lg-1 col-form-label"><b> Waybill#:</b></label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="t_waybill" id="t_waybill" class="form-control">
                                                    </div>

                                                    <label class="col-lg-1 col-form-label"><b> Product:</b></label>
                                                    <div class="col-lg-3">
                                                        <input type="text" name="t_product" id="t_product" class="form-control">
                                                    </div>

                                                    <label class="col-lg-1 col-form-label"><b> Quantity:</b></label>
                                                    <div class="col-lg-2">
                                                        <input type="text" name="t_quantity" id="t_quantity" value="0" class="form-control numbersonly-format">
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-1 col-form-label"><b>Location:</b></label>
                                                    <div class="col-lg-5">
                                                        <select class="form-control" id="t_l_d_pt" name="t_l_d_pt">
                                                            <option value="t_l_dSel">- Select Loading Pt And Discharging Pt ---</option>
                                                            <?php
                                                            $stmt = mysqli_query($vSky, "SELECT * FROM `locations`");
                                                            while($row = mysqli_fetch_assoc($stmt)){

                                                            ?>
                                                            <option value="<?= $row['id']; ?>">
                                                                <?= $row['loading_pt_name']; ?> TO
                                                                <?= $row['discharging_pt_name']; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label class="col-lg-1 col-form-label"><b> Distance:</b></label>
                                                    <div class="col-lg-2">
                                                        <input readonly type="text" name="t_distance" id="t_distance" class="form-control numbersonly-format">
                                                    </div>
                                                    <label class="col-lg-1 col-form-label"><b> Rate:</b></label>
                                                    <div class="col-lg-2">
                                                        <input readonly type="text" name="t_rate" id="t_rate" class="form-control numbersonly-format">
                                                    </div>

                                                </div>

                                                <div class="form-group row">

                                                    <label class="col-lg-1 col-form-label"><b>Amount:</b></label>
                                                    <div class="col-lg-5">
                                                        <input readonly type="text" name="t_amount" id="t_amount" class="form-control">
                                                    </div>

                                                    <label class="col-lg-3 col-form-label"><b>Over Night Allowance:</b></label>
                                                    <div class="col-lg-3">
                                                        <input type="text" name="t_nyt_alw" id="t_nyt_alw" value="0" class="form-control">
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
                                        <button type="button" id="amt_calculate" class="btn btn-warning">Click To Calculate Values <i class="icon-calculator ml-2"></i></button>
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="button" id="apply_trip_trip" class="btn bg-primary"><span id="addddPos" class="ladda-label labll">Add Trip</span><i class="icon-plus22 ml-2 appTrip"></i></button>

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
    <!-- Vertical form modal -->
    <div id="edit_new_trip" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="#" id="t_form">
                    <div class="modal-body">

                        <div class="card-body">
                            <form action="#" id="t_trip_t">
                                <input type="hidden" id="e_trip_id" name="e_trip_id">
                                <input type="hidden" id="e_drID" name="e_drID">
                                <input type="hidden" id="e_tkID" name="e_tkID">
                                <input type="hidden" id="location_id" name="location_id">
                                <input type="hidden" id="oldMainComId" name="oldMainComId">
                                <input type="hidden" id="oldSubComId" name="oldSubComId">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"><b>Driver Name:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="e_drName" id="e_drName" class="form-control">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Vehicle Number:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="e_vName" id="e_vName" class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"> <b>Loading Date:</b> </label>
                                                <div class="col-lg-4">
                                                    <input name="e_lDate" id="e_lDate" type="date" class="form-control">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Discharging Date:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly readonly type="date" name="e_dDate" id="e_dDate" class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"> <b>Old Main Company:</b> </label>
                                                <div class="col-lg-4">
                                                    <input readonly name="e_oldMcom" id="e_oldMcom" type="text" class="form-control">
                                                </div>

                                                <label class="col-lg-2 col-form-label"><b>Old Sub Company:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly readonly type="text" name="e_oldSubCom" id="e_oldSubCom" class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"> <b>Main Company:</b> </label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" id="mainCom_id_e" name="mainCom_id_e">
                                                        <option value="e_sel">-- Click To Change Main Company --</option>
                                                        <?php
                                                            $stmt = mysqli_query($vSky, "SELECT * FROM `main_companies`");
                                                            while($row = mysqli_fetch_assoc($stmt)){

                                                            ?>
                                                        <option value="<?= $row['id']; ?>">
                                                            <?= $row['name']; ?>
                                                        </option>
                                                        <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 col-form-label"><b>Sub Company:</b></label>
                                                <div class="col-lg-4">
                                                    <div id="subComSel_e" style="display:none;">
                                                        <select class="form-control" id="subCom_id_e" name="subCom_id_e">
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <hr style="border: 1px solid orange; margin-bottom:0px;">
                                <div class="text-center"><b>EDIT TRIP FILEDS</b></div>
                                <hr style="border: 1px solid orange; margin-top:0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">

                                                <label class="col-lg-1 col-form-label"><b> Waybill#:</b></label>
                                                <div class="col-lg-4">
                                                    <input type="text" name="e_waybill" id="e_waybill" class="form-control">
                                                </div>

                                                <label class="col-lg-1 col-form-label"><b> Product:</b></label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="e_product" id="e_product" class="form-control">
                                                </div>

                                                <label class="col-lg-1 col-form-label"><b> Quantity:</b></label>
                                                <div class="col-lg-2">
                                                    <input type="text" name="e_quantity" id="e_quantity" value="0" class="form-control numbersonly-format">
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-lg-3 col-form-label"><b>Old Loading Point:</b></label>
                                                <div class="col-lg-3">
                                                    <input readonly type="text" name="e_old_loading_pt" id="e_old_loading_pt" class="form-control">
                                                </div>

                                                <label class="col-lg-3 col-form-label"><b>Old Discharging Point:</b></label>
                                                <div class="col-lg-3">
                                                    <input readonly type="text" name="e_old_discharging_pt" id="e_old_discharging_pt" class="form-control">
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"><b>Location:</b></label>
                                                <div class="col-lg-5" style="margin-left:-70px;">
                                                    <select class="form-control" id="e_l_d_pt" name="e_l_d_pt">
                                                        <option value="e_l_dSel">- Change Loading Pt And Discharging Pt ---</option>
                                                        <?php
                                                            $stmt = mysqli_query($vSky, "SELECT * FROM `locations`");
                                                            while($row = mysqli_fetch_assoc($stmt)){

                                                            ?>
                                                        <option value="<?= $row['id']; ?>">
                                                            <?= $row['loading_pt_name']; ?> TO
                                                            <?= $row['discharging_pt_name']; ?>
                                                        </option>
                                                        <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                <label class="col-lg-1 col-form-label"><b> Distance:</b></label>
                                                <div class="col-lg-2">
                                                    <input readonly type="text" name="e_distance" id="e_distance" class="form-control numbersonly-format">
                                                </div>
                                                <label class="col-lg-1 col-form-label"><b> Rate:</b></label>
                                                <div class="col-lg-2">
                                                    <input readonly type="text" name="e_rate" id="e_rate" class="form-control numbersonly-format">
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <label class="col-lg-1 col-form-label"><b>Amount:</b></label>
                                                <div class="col-lg-5">
                                                    <input readonly type="text" name="e_amount" id="e_amount" class="form-control">
                                                </div>

                                                <label class="col-lg-3 col-form-label"><b>Over Night Allowance:</b></label>
                                                <div class="col-lg-3">
                                                    <input type="text" name="e_nyt_alw" id="e_nyt_alw" value="0" class="form-control">
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
                                    <button type="button" id="amt_calculate_update" class="btn btn-warning">Click To Recalculate Values <i class="icon-calculator ml-2"></i></button>
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" id="update_trip_trip" class="btn bg-primary"><span id="addddPos" class="ladda-label labll">Update</span><i class="icon-plus22 ml-2 updateTrip"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

</body>
<!-- Vertical form modal -->
<div id="returned_trip" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="r_form">
                <div class="modal-body">

                    <div class="card-body">
                        <form action="#" id="r_trip_t">
                            <input type="hidden" id="r_drID" name="r_drID">
                            <input type="hidden" id="r_tkID" name="r_tkID">
                            <input type="hidden" id="r_trip_id" name="r_trip_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Driver Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_drName" id="r_drName" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Vehicle Number:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_vName" id="r_vName" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"> <b>Loading Date:</b> </label>
                                            <div class="col-lg-4">
                                                <input readonly name="r_lDate" id="r_lDate" type="date" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Discharging Date:</b></label>
                                            <div class="col-lg-4">
                                                <input type="date" name="r_dDate" id="r_dDate" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"> <b>Main Company:</b> </label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_mainCom" id="r_mainCom" class="form-control">
                                            </div>
                                            <label class="col-lg-2 col-form-label"><b>Sub Company:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_subCom" id="r_subCom" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange; margin-bottom:0px;">
                            <div class="text-center"><b>TRIP RETURNED FILEDS</b></div>
                            <hr style="border: 1px solid orange; margin-top:0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">

                                            <label class="col-lg-1 col-form-label"><b> Waybill#:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_waybill" id="r_waybill" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label"><b> Product:</b></label>
                                            <div class="col-lg-3">
                                                <input readonly type="text" name="r_product" id="r_product" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label"><b> Quantity:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_quantity" id="r_quantity" value="0" class="form-control numbersonly-format">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label"><b>Location:</b></label>
                                            <div class="col-lg-5">
                                                <input readonly type="text" name="r_location" id="r_location" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label"><b> Distance:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_distance" id="r_distance" class="form-control numbersonly-format">
                                            </div>
                                            <label class="col-lg-1 col-form-label"><b> Rate:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_rate" id="r_rate" class="form-control numbersonly-format">
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-1 col-form-label"><b>Amount:</b></label>
                                            <div class="col-lg-5">
                                                <input readonly type="text" name="r_amount" id="r_amount" class="form-control">
                                            </div>

                                            <label class="col-lg-3 col-form-label"><b>Over Night Allowance:</b></label>
                                            <div class="col-lg-3">
                                                <input readonly type="text" name="r_nyt_alw" id="r_nyt_alw" value="0" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label"><b>Shortage:</b></label>
                                            <div class="col-lg-2">
                                                <input type="text" name="r_shortage" id="r_shortage" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label" style="margin-left:-10px;"><b>by</b></label>
                                            <div class="col-lg-2" style="margin-left:-45px;">
                                                <input readonly type="text" name="r_shortage_rate" id="r_shortage_rate" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-2 col-form-label" style="margin-left:-15px;"><b>= &nbsp;Shortage Value</b></label>
                                            <div class="col-lg-2" style="margin-left:-15px;">
                                                <input readonly type="text" name="r_shortage_val" id="r_shortage_val" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label" style="margin-top:-10px; margin-left:15px;"><b>Amount Due</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_amt_due" id="r_amt_due" value="0" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label"><b>Fuel Consumed:</b></label>
                                            <div class="col-lg-2" style="margin-left:-35px;">
                                                <input type="text" name="r_fuel_consumed" value="0" id="r_fuel_consumed" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label" style="margin-left:-10px;"><b>by</b></label>
                                            <div class="col-lg-2" style="margin-left:-40px;">
                                                <input readonly type="text" name="r_fuel_in_cash_rate" id="r_fuel_in_cash_rate" value="0" class="form-control">
                                            </div>

                                            <label class="col-lg-3 col-form-label" style="margin-left:-15px;"><b> &nbsp;=&nbsp; Fuel Consumed In Cash:</b></label>
                                            <div class="col-lg-3" style="margin-left:-10px;">
                                                <input readonly type="text" name="r_fuel_in_cash" id="r_fuel_in_cash" value="0" class="form-control">
                                            </div>

                                        </div>

                                        <hr style="border: 1px solid orange;">
                                        <hr style="border: 1px solid orange;">

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label" style="margin-top:-5px;"><b>Payment Due BVO/KODSON:</b></label>
                                            <div class="col-lg-2" style="margin-left:-35px;">
                                                <input readonly type="text" name="r_pay_due_kodson" value="0" id="r_pay_due_kodson" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label" style="margin-left:10px; margin-top:-5px;"><b>Amount Recievable: </b></label>
                                            <div class="col-lg-2" style="margin-left:8px;">
                                                <input readonly type="text" name="r_amt_recievable" id="r_amt_recievable" value="0" class="form-control">

                                            </div>

                                            <label class="col-lg-3 col-form-label" style="margin-left:20px;"><b>Cash Paid To Make Loss:</b></label>
                                            <div class="col-lg-2" style="margin-left:-45px;">
                                                <input type="text" name="r_cash_paid_to_make_loss" id="r_cash_paid_to_make_loss" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label"><b>Receipt No.:</b></label>
                                            <div class="col-lg-3" style="margin-left:-60px;">
                                                <input type="text" name="r_receipt_no" id="r_receipt_no" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label" style="margin-left:-10px;"><b>Balance: </b></label>
                                            <div class="col-lg-2" style="margin-left:-10px;">
                                                <input readonly type="text" name="r_balance" id="r_balance" value="0" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>For Surcharge: </b></label>
                                            <div class="col-lg-3">
                                                <input readonly type="text" name="r_amt_recievable_surchage" id="r_amt_recievable_surchage" value="0" class="form-control"> </div>

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
                                <button type="button" id="amt_calculate_r" class="btn btn-warning">Click To Calculate Returned Values <i class="icon-calculator ml-2"></i></button>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="button" id="apply_trip_return" class="btn bg-primary"><span id="addddTripR" class="ladda-label labll">Save</span><i class="icon-reset ml-2 appTripR"></i></button>

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
<!-- Vertical form modal -->
<div id="edit_trip" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="r_edit_form">
                <div class="modal-body">

                    <div class="card-body">
                        <form action="#" id="r_trip_t">
                            <input type="hidden" id="r_edit_drID" name="r_edit_drID">
                            <input type="hidden" id="r_edit_tkID" name="r_edit_tkID">
                            <input type="hidden" id="r_edit_trip_id" name="r_edit_trip_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"><b>Driver Name:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_drName" id="r_edit_drName" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Vehicle Number:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_vName" id="r_edit_vName" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"> <b>Loading Date:</b> </label>
                                            <div class="col-lg-4">
                                                <input readonly name="r_edit_lDate" id="r_edit_lDate" type="date" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Discharging Date:</b></label>
                                            <div class="col-lg-4">
                                                <input type="date" name="r_edit_dDate" id="r_edit_dDate" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"> <b>Main Company:</b> </label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_mainCom" id="r_edit_mainCom" class="form-control">
                                            </div>
                                            <label class="col-lg-2 col-form-label"><b>Sub Company:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_subCom" id="r_edit_subCom" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr style="border: 1px solid orange; margin-bottom:0px;">
                            <div class="text-center"><b>EDIT TRIP RETURNED FILEDS</b></div>
                            <hr style="border: 1px solid orange; margin-top:0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="form-group row">

                                            <label class="col-lg-1 col-form-label"><b> Waybill#:</b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_waybill" id="r_edit_waybill" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label"><b> Product:</b></label>
                                            <div class="col-lg-3">
                                                <input readonly type="text" name="r_edit_product" id="r_edit_product" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label"><b> Quantity:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_edit_quantity" id="r_edit_quantity" value="0" class="form-control numbersonly-format">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label"><b>Location:</b></label>
                                            <div class="col-lg-5">
                                                <input readonly type="text" name="r_edit_location" id="r_edit_location" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label"><b> Distance:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_edit_distance" id="r_edit_distance" class="form-control numbersonly-format">
                                            </div>
                                            <label class="col-lg-1 col-form-label"><b> Rate:</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_edit_rate" id="r_edit_rate" class="form-control numbersonly-format">
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-1 col-form-label"><b>Amount:</b></label>
                                            <div class="col-lg-5">
                                                <input readonly type="text" name="r_edit_amount" id="r_edit_amount" class="form-control">
                                            </div>

                                            <label class="col-lg-3 col-form-label"><b>Over Night Allowance:</b></label>
                                            <div class="col-lg-3">
                                                <input readonly type="text" name="r_edit_nyt_alw" id="r_edit_nyt_alw" value="0" class="form-control">
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label"><b>Shortage:</b></label>
                                            <div class="col-lg-2">
                                                <input type="text" name="r_edit_shortage" id="r_edit_shortage" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label" style="margin-left:-10px;"><b>by</b></label>
                                            <div class="col-lg-2" style="margin-left:-45px;">
                                                <input readonly type="text" name="r_edit_shortage_rate" id="r_edit_shortage_rate" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-2 col-form-label" style="margin-left:-15px;"><b>= &nbsp;Shortage Value</b></label>
                                            <div class="col-lg-2" style="margin-left:-15px;">
                                                <input type="text" name="r_edit_shortage_val" id="r_edit_shortage_val" value="0" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label" style="margin-top:-10px; margin-left:15px;"><b>Amount Due</b></label>
                                            <div class="col-lg-2">
                                                <input readonly type="text" name="r_edit_amt_due" id="r_edit_amt_due" value="0" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label"><b>Fuel Consumed:</b></label>
                                            <div class="col-lg-2" style="margin-left:-35px;">
                                                <input type="text" name="r_edit_fuel_consumed" value="0" id="r_edit_fuel_consumed" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label" style="margin-left:-10px;"><b>by</b></label>
                                            <div class="col-lg-2" style="margin-left:-40px;">
                                                <input readonly type="text" name="r_edit_fuel_in_cash_rate" id="r_edit_fuel_in_cash_rate" value="0" class="form-control">
                                            </div>

                                            <label class="col-lg-3 col-form-label" style="margin-left:-15px;"><b> &nbsp;=&nbsp; Fuel Consumed In Cash:</b></label>
                                            <div class="col-lg-3" style="margin-left:-10px;">
                                                <input type="text" name="r_edit_fuel_in_cash" id="r_edit_fuel_in_cash" value="0" class="form-control">
                                            </div>
                                        </div>

                                        <hr style="border: 1px solid orange;">
                                        <hr style="border: 1px solid orange;">

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label" style="margin-top:-5px;"><b>Payment Due BVO/KODSON:</b></label>
                                            <div class="col-lg-2" style="margin-left:-35px;">
                                                <input readonly type="text" name="r_edit_pay_due_kodson" value="0" id="r_edit_pay_due_kodson" class="form-control">
                                            </div>

                                            <label class="col-lg-1 col-form-label" style="margin-left:10px; margin-top:-5px;"><b>Amount Recievable: </b></label>
                                            <div class="col-lg-2" style="margin-left:8px;">
                                                <input readonly type="text" name="r_edit_amt_recievable" id="r_edit_amt_recievable" value="0" class="form-control">
                                                <input readonly type="hidden" name="r_edit_amt_recievable_surcharg" id="r_edit_amt_recievable_surcharg" class="form-control">
                                            </div>

                                            <label class="col-lg-3 col-form-label" style="margin-left:20px;"><b>Cash Paid To Make Loss:</b></label>
                                            <div class="col-lg-2" style="margin-left:-45px;">
                                                <input type="text" name="r_edit_cash_paid_to_make_loss" id="r_edit_cash_paid_to_make_loss" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label class="col-lg-2 col-form-label"><b>Receipt No.:</b></label>
                                            <div class="col-lg-4">
                                                <input type="text" name="r_edit_receipt_no" id="r_edit_receipt_no" class="form-control">
                                            </div>

                                            <label class="col-lg-2 col-form-label"><b>Balance: </b></label>
                                            <div class="col-lg-4">
                                                <input readonly type="text" name="r_edit_balance" id="r_edit_balance" value="0" class="form-control">
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
                                <button type="button" id="amt_calculate_r_edit" class="btn btn-warning">Click To Calculate Returned Values <i class="icon-calculator ml-2"></i></button>
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="button" id="apply_trip_r_edit" class="btn bg-primary"><span id="addddTripR_edit" class="ladda-label labll">Update</span><i class="icon-reset ml-2 appTripR_edit"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->
