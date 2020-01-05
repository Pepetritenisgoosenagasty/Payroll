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
    
    $query_d = mysqli_query($vSky, "SELECT * FROM `employees` WHERE `is_pending`='0' AND `on_leave`='0' AND `sacked`='0' AND `emp_main_cat_id`='2'");
    $count_dem = mysqli_num_rows($query_d);
    
    $query_assigned = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='1'");
    $count_assigned = mysqli_num_rows($query_assigned);
    
    $query_unassigned = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `is_assigned`='0'");
    $count_unassigned = mysqli_num_rows($query_unassigned);
    
    $query_d_truck = mysqli_query($vSky, "SELECT * FROM `truck`");
    $count_dem_trucks = mysqli_num_rows($query_d_truck);
    
    $query_assigned_truck = mysqli_query($vSky, "SELECT * FROM `truck` WHERE `is_assigned`='1'");
    $count_assigned_truck = mysqli_num_rows($query_assigned_truck);
    
    $query_unassigned_truck = mysqli_query($vSky, "SELECT * FROM `truck` WHERE `is_assigned`='0'");
    $count_unassigned_truck = mysqli_num_rows($query_unassigned_truck);
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
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-blue-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $count_dem; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF BVO DRIVERS</b></span>
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
                                        <?= $count_assigned; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL ASSIGNED DRIVERS TO TRUCK</b></span>
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
                                    <h3 class="mb-0"><?= $count_dem_trucks; ?></h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL NUMBER OF TRUCKS</b></span>
                                </div>

                                <div class="mr-3 align-self-center">
                                    <i class="icon-steering-wheel icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><?= $count_assigned_truck ?></h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL ASSIGNED TRUCKS TO DRIVERS</b></span>
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
                                        <?= $count_unassigned; ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL UNASSIGNED DRIVERS TO TRUCKS</b></span>
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
                                    <h3 class="mb-0"><?= $count_unassigned_truck; ?></h3>
                                    <span class="text-uppercase font-size-xs"><b>TOTAL UNASSIGNED TRUCKS TO DRIVERS</b></span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /content area -->

                <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////              
                <!-- Scrollable datatable -->

                <div class="card">
                    <div style="display:table;" id="employees_list">
                        <div class="card-header header-elements-inline">
                            <span class="card-title" style="margin-left:550px; font-size:25px;"> LIST OF DRIVERS</span>
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
                                    <th class="text-center" width="10">DRIVER NAME</th>
                                    <th class="text-center" width="10">DRIVER CATEGORY</th>
                                    <th class="text-center" width="10">MATE NAME</th>
                                    <th class="text-center" width="10">STATUS</th>
                                    <th class="text-center" width="10">TRUCK NUMBER</th>
                                    <th class="text-center" width="10">ASSIGN TRUCK/UNASSIGN TRUCK</th>
                                    <th class="text-center" width="10">ASSIGN MATE/UNASSIGN MATE</th>
                                    <th class="text-center" width="10">ADD TRUCK/ADD MATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, emp.`emp_basic`, cat.`cat_name`, pos.`pos_type_name`, emp.`emp_gross_salary` FROM `employees` AS emp
                        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                        INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                        WHERE emp.`is_pending`='0' AND emp.`on_leave`='0' AND emp.`sacked`='0' AND emp.`emp_main_cat_id`='2'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                
                                $emp_id = $vSkyRow['emp_id'];
                            ?>
                                <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>

                                    <td class="text-center" width="10">
                                        <?php echo $vSkyRow['emp_name']; ?>
                                    </td>
                                    <td class="text-center" width="10"><a href="javascript:;">
                                            <?php echo $vSkyRow['cat_name']; ?></a>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php
                                       $query_o = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr 
                                                                    INNER JOIN `mates` AS mt ON mt.`emp_mate_id`=dr.`mate_emp_id` WHERE dr.`driver_emp_id`='$emp_id' AND mt.`is_available`='1'");
                                            while($d_o = mysqli_fetch_assoc($query_o)){
                                                $mate_name = $d_o['mate_name'];
                                            echo $mate_name;
                                            }
                                        
                                        ?>
                                    </td>
                                    <td width="30">
                                        <?php
                                        
                                        $query_chk_status = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$emp_id' AND (`on_trip`='0' OR `on_trip`='1')");
                                
                                        if($get_status = mysqli_fetch_assoc($query_chk_status)){
                                            $is_ass = $get_status['is_assigned'];
                                            $is_driver = $get_status['is_driver'];
                                            $has_mate = $get_status['has_mate'];
                                            $is_mate_assigned = $get_status['is_mate_assigned'];
                                            $is_available = $get_status['is_available'];
                                            $on_trip = $get_status['on_trip'];

                                            if( $is_ass == 1 && $is_driver == 1 && $on_trip == 0){
                                                echo "<span class='text-center' style='color:green;'> Active And Has Truck </span>";
                                            }else if( $is_ass == 0 && $is_driver == 1){
                                                echo "<span style='color:#ff9800;'> Truck Not Assigned </span>";
                                            }else if( $is_ass == 0 && $is_driver == 0 ){
                                                echo "<span class='text-center' style='color:#3a7d9e;'> No Truck Added </span>";
                                            }else if($on_trip == 1 && $is_ass == 1 && $is_driver == 1){
                                                echo "<span class='text-center' style='color:#5c6bc0;'> On Trip </span>";
                                            }
                                        }else{
                                            
                                             echo "<span class='text-center' style='color:red;'>Not Active</span>"; 
                                        }
                                        
                                        
                                        
                                        ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php
                                       $query5 = mysqli_query($vSky, "SELECT * FROM `drivers` AS dr 
                                                                    INNER JOIN `truck` AS tr ON dr.`driver_emp_id`=tr.`emp_id` WHERE `driver_emp_id`='$emp_id' AND tr.`is_available`='1' AND `is_deleted`='0'");
                                            while($d = mysqli_fetch_assoc($query5)){
                                                $truck_no = $d['truck_no'];
                                            echo "<span style='font-weight:bold;'>$truck_no</span>";
                                            }
                                        
                                        ?>
                                    </td>
                                    <td class="text-center" width="10">
                                        <?php
                                            
                                  $query = mysqli_query($vSky, "SELECT `is_assigned` FROM `drivers`  WHERE `driver_emp_id`='$emp_id' AND `is_driver`='1' AND `on_trip`='0'");
                                
                                while($get = mysqli_fetch_assoc($query)){
                                $is_assigned = $get['is_assigned'];
                                        
                                        if($is_assigned == 1){
                                         ?>
                                        <div class="list-icons">
                                            <button disabled class="list-icons-item btn btn-primary" onclick="assign_truck('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-steering-wheel"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-warning" onclick="unassign_truck('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-minus3"></i>
                                            </button>
                                        </div>
                                        <?php   
                                        }else if($is_assigned == 0){
                                        ?>
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-primary" onclick="assign_truck('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-steering-wheel"></i>
                                            </button>
                                            <button disabled class="list-icons-item btn btn-warning" onclick="unassign_truck('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-minus3"></i>
                                            </button>
                                        </div>
                                        <?php  
                                        }
                                    }
                                        ?>

                                    </td>
                                    <td class="text-center" width="10">
                                        <?php
                                            
                                  $query = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$emp_id' AND `has_mate`='1' AND (`on_trip`='0' OR `on_trip`='1')");
                                
                                while($get = mysqli_fetch_assoc($query)){
                                $is_assigned = $get['is_mate_assigned'];
                                        
                                        if($is_assigned == 1){
                                         ?>
                                        <div class="list-icons">
                                            <button disabled class="list-icons-item btn btn-default" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-user-plus"></i>
                                            </button>
                                            <button class="list-icons-item btn btn-danger" onclick="un_assign_mate('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-user-minus"></i>
                                            </button>
                                        </div>
                                        <?php   
                                        }else if($is_assigned == 0){
                                        ?>
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-default" onclick="assign_mate('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-user-plus"></i>
                                            </button>
                                            <button disabled class="list-icons-item btn btn-danger" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')">
                                                <i class="icon-user-minus"></i>
                                            </button>
                                        </div>
                                        <?php  
                                        }
                                    }
                                        ?>

                                    </td>
                                    <td class="text-center" width="10">
                                        <?php
                                            
                                  $query = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$emp_id' AND `is_driver`='1'");
                                    $c = mysqli_num_rows($query);
                                    
                                        if($get_fetch = mysqli_fetch_assoc($query)){
                                            $is_chk = $get_fetch['is_assigned'];
                                        }
                                
                                        if($is_chk == 1){
                                            
                                        if($c > 0){
                                         ?>

                                        <?php   
                                        }else{
                                        ?>
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-primary" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')" data-toggle="modal" data-target="#addTruck">
                                                <i class="icon-plus22"></i>
                                            </button>
                                        </div>
                                        <?php  
                                        }
                                            
                                        }else if($is_chk == 0){
                                            
                                        if($c > 0){
                                         ?>
                                        <button class="list-icons-item btn btn-warning" onclick="del_truck('<?= $vSkyRow['emp_id']; ?>')">
                                            <i class="icon-trash"></i>
                                        </button>
                                        <?php   
                                        }else{
                                        ?>
                                        <div class="list-icons">
                                            <button class="list-icons-item btn btn-primary" onclick="get_empDEtailsAdd('<?php echo $vSkyRow['emp_id']; ?>')" data-toggle="modal" data-target="#addTruck">
                                                <i class="icon-plus22"></i>
                                            </button>
                                        </div>
                                        <?php  
                                        }
                                    }
                                
                                
                                $query9 = mysqli_query($vSky, "SELECT * FROM `drivers` WHERE `driver_emp_id`='$emp_id' AND `has_mate`='1'");
                                    $c7 = mysqli_num_rows($query9);
                                
                                    if($get_mate_id = mysqli_fetch_assoc($query9)){
                                        $mate_id = $get_mate_id['mate_emp_id'];
                                        $is_mate_assigned = $get_mate_id['is_mate_assigned'];
                                    }
                                
                                    if($is_mate_assigned == 1){
                                        
                                         if($c7 > 0){
                                            ?>
                                  
                                        <?php  
                                        }else{
                                           ?>
                                        <button class="list-icons-item btn btn-default" data-toggle="modal" data-target="#addMate" onclick="put_driver_id(<?= $emp_id; ?>)">
                                            <i class="icon-user"></i>
                                        </button>
                                        <?php
                                        }

                                    }else if($is_mate_assigned == 0){
                                        
                                        if($c7 > 0){
                                            ?>
                                        <button class="list-icons-item btn btn-warning" onclick="del_mate('<?= $mate_id; ?>')">
                                            <i class="icon-user-cancel"></i>
                                        </button>
                                        <?php  
                                        }else{
                                           ?>
                                        <button class="list-icons-item btn btn-default" data-toggle="modal" data-target="#addMate" onclick="put_driver_id(<?= $emp_id; ?>)">
                                            <i class="icon-user"></i>
                                        </button>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /scrollable datatable -->
            </div>

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

    <!-- /page content -->
    <!-- Footer -->
    <?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
	?>
    <!-- /footer -->
    <!-- Vertical form modal -->
    <div id="addTruck" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="#" id="truck_form">
                    <div class="modal-body">

                        <div class="card-body">
                            <form action="#" id="edit_payslip">
                                <input type="hidden" id="eAmpID" name="eAmpID">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label"><b>Driver's Name:</b></label>
                                                <div class="col-lg-4">
                                                    <input readonly type="text" name="eAmpName" id="eAmpName" class="form-control">
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
                                <div class="text-center"><b>TRUCK DETAILS</b></div>
                                <hr style="border: 1px solid orange; margin-top:0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="form-group row">

                                                <label class="col-lg-2 col-form-label"><b> Truck Number:</b></label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="truckNumber" id="truckNumber" class="form-control">
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
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" id="apply_truck" onclick="aplytruck()" class="btn bg-primary"><span id="apTru" class="ladda-label labll">Apply</span><i class="icon-plus22 ml-2 apptru"></i></button>

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
<div id="addMate" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="truck_form">
                <div class="modal-body">
                    <div id="previous_debs">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title"> LIST OF MATES</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                </div>
                            </div>
                            <input type="hidden" id="driver_id">
                        </div>
                        <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                            <thead>
                                <tr>
                                    <!--                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>-->
                                    <th class="text-center">NAME</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">PHONE NUMBER</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center">ADD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $vSkyStmt = mysqli_query($vSky, "SELECT `emp_id`, `emp_name`, `emp_phone`, `is_pending`, `on_leave`, `sacked` FROM employees WHERE `is_pending`='0' AND `on_leave`='0' AND `sacked`='0' AND `emp_main_cat_id`='3'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                
                                $mate_emp_id = $vSkyRow['emp_id'];
                                $mate_emp_name = $vSkyRow['emp_name'];
                                $mate_emp_phone= $vSkyRow['emp_phone'];
                                
                                $query_8 = mysqli_query($vSky, "SELECT * FROM `mates` WHERE `emp_mate_id`='$mate_emp_id'");
                                
                                $get_mates = mysqli_num_rows($query_8);
                                if($get_mates > 0){
                                    
                                }else{
                            ?>
                                <tr id='row_<?= $mate_emp_id; ?>'>

                                    <td class="text-center">
                                        <?= $mate_emp_name; ?>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center"><a href="javascript:;">
                                            <?= $mate_emp_phone; ?></a>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <button type="button" class="list-icons-item btn btn-primary" onclick="add_mate_to_driver('<?= $mate_emp_id; ?>')">
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
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

</html>
