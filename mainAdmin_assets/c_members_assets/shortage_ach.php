<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");

  if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/head.php");
    
    $totShotageVal = 0;
    $totShortageVaria = 0;
    $totShortageOvaNyt = 0;
    
    $query = "SELECT * FROM `arch_trips`";
    $results = mysqli_query($vSky, $query);
    while($row = mysqli_fetch_assoc($results)){
        $shortage = $row['shortage'];
        $shortageVal = $row['shortage_val'];
        $totNytAl = $row['overnight_allowance'];
        
       $totShotageVal+=$shortage;
       $totShortageVaria+=$shortageVal;
       $totShortageOvaNyt+=$totNytAl;
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

                <div class="row" style="margin-top:15px;">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-slate-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f",$totShortageVaria),2); 
                                            ?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Entire Shortage Values</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-plus22 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-brown-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= "Ltrs"." ".number_format(sprintf("%0.2f", $totShotageVal) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Entire Shortage Variables</span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <i class="icon-dash icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-teal-400 has-bg-image">

                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f", $totShortageOvaNyt) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Entire Shortage Overnight</span>
                                </div>
                                <div class="mr-3 align-self-center">
                                    <i class="icon-balance icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-orange-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0">
                                        <?= $currency." ".number_format(sprintf("%0.2f", 222) ,2)?>
                                    </h3>
                                    <span class="text-uppercase font-size-xs">Entire Road Expenses</span>
                                </div>
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cash4 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /simple statistics -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-left-3 border-right-3 border-right-primary border-left-success rounded-left-0">
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <!-- Basic select -->
                                    <form action="<?= $_SERVER['PHP_SELF']; ?>" class="row">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>View Months Entire Shortage Value </b></label>
                                            <div class="col-lg-12">
                                                <select name="shortage_value" id="shortage_value" class="form-control shortage">
                                                    <?php
                                                $query = mysqli_query($vSky, "SELECT DISTINCT DATE_FORMAT(`discharging_date`,'%Y-%m') AS yearmonth FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $month_name = $fetch['yearmonth'];
                                                    $con = date('F Y', strtotime($month_name))
                                                ?>
                                                    <option value="<?= $month_name; ?>">
                                                        <?= $con; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col" style="margin-left:-10px; margin-top:35px;">
                                            <button type="button" data-toggle="modal" data-target="#for_shortage_values" id="shortage_value_btn_arc" class="btn btn-outline-success"><i class="icon-cursor2 mr-2"></i> <span class="ladda-label labllPay mr-2">Click</span> </button>
                                        </div>
                                    </form>

                                    <!--                        ///////////////////////////////////////////////////////            -->

                                    <form class="row" style="margin-left:55px;">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>View Months Entire Shortage Variable</b></label>
                                            <div class="col-lg-12">
                                                <select name="shortVariable" id="shortVariable" class="form-control variable">
                                              <?php
                                                $query = mysqli_query($vSky, "SELECT DISTINCT DATE_FORMAT(`discharging_date`,'%Y-%m') AS yearmonth FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $month_name = $fetch['yearmonth'];
                                                    $con = date('F Y', strtotime($month_name))
                                                ?>
                                                    <option value="<?= $month_name; ?>">
                                                        <?= $con; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col" style="margin-left:-5px; margin-top:35px;">
                                            <button type="button" id="getShortageVariablesInfo_arch" class="btn btn-light" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-touch mr-2"></i> <span class="ladda-label labllPay mr-2">Click</span> </button>
                                        </div>
                                    </form>

                                    <!--                        ///////////////////////////////////////////////////////            -->

                                    <form class="row" style="margin-left:25px;">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>View Months Entire Shortage Overnight</b></label>
                                            <div class="col-lg-12">
                                                <select name="selOverNyt" id="selOverNyt" class="form-control overNyt">
                               <?php
                                                $query = mysqli_query($vSky, "SELECT DISTINCT DATE_FORMAT(`discharging_date`,'%Y-%m') AS yearmonth FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $month_name = $fetch['yearmonth'];
                                                    $con = date('F Y', strtotime($month_name))
                                                ?>
                                                    <option value="<?= $month_name; ?>">
                                                        <?= $con; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col" style="margin-left:-10px; margin-top:35px;">
                                            <button type="button" id="overNytbtn_arch" class="btn btn-outline-warning" data-toggle="modal" data-target="#over_nyt_expensis"><i class="icon-select2 mr-2"></i> <span class="ladda-label labllPay mr-2">Click</span> </button>
                                        </div>
                                    </form>

                                    <!--                        ///////////////////////////////////////////////////////            -->

                                    <div class="col ">

                                    </div>
                                    <div class="col ">

                                    </div>
                                    <!--                           ////////////////////////////////////////////////////             -->
                                    <form class="row" action="" method="GET" target="_blank">
                                        <div class="form-group">
                                            <label class="col-form-label col-lg-12"><b>View Months Entire Road Expenses</b></label>
                                            <div class="col-lg-12">
                                                <select disabled name="duration_select2" id="duration_select2" class="form-control">
                                  <?php
                                                $query = mysqli_query($vSky, "SELECT DISTINCT DATE_FORMAT(`discharging_date`,'%Y-%m') AS yearmonth FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $month_name = $fetch['yearmonth'];
                                                    $con = date('F Y', strtotime($month_name))
                                                ?>
                                                    <option value="<?= $month_name; ?>">
                                                        <?= $con; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col " style="margin-left:-10px; margin-top:35px;">
                                            <button disabled type="button" class="btn btn-outline-primary"><i class="icon-cursor mr-2"></i> <span class="ladda-label labllPay mr-2">Click</span> </button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                <span>
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


                <!-- 2 columns form -->
                <div class="card">
                    <span class="card-title text-center" style="font-size:15px;"> <b>Select Company And Date To Generate Shortage Report</b></span>
                    <div class="card-body">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>">
                            <div class="row" style="margin-left:0px;">
                                <div class="col-md-3">
                                    <fieldset>

                                        <div class="form-group row" style="margin-left:-25px;">
                                            <label class="col-lg-4 col-form-label">Company Name :</label>
                                            <div class="col-lg-5" style="margin-left:-20px;">
                                                <select class="form-control report_com_name" name="r_c_n" id="r_c_n">
                                                    <?php
                                         $query = mysqli_query($vSky, "SELECT DISTINCT `sub_company_name` FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $sub_company_name = $fetch['sub_company_name'];
                                                    
                                                ?>
                                                    <option value="<?= $sub_company_name; ?>">
                                                        <?= $sub_company_name; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-md-3" style="margin-left:-95px; display:block;">
                                    <fieldset>

                                        <div class="form-group row" >
                                            <label class="col-lg-5 col-form-label" style="margin-left:-25px;">Discharging Pt :</label>
                                            <div class="col-lg-5" style="margin-left:-55px;">
                                                <select class="form-control report_dPt" name="dPt_arc" id="dPt_arc">
                                                    <option value="pdt"> -- Select -- </option>

                                                          <?php
                                            $query = mysqli_query($vSky, "SELECT DISTINCT `discharging_pt` FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $sub_company_name = $fetch['discharging_pt'];
                                                    
                                                ?>
                                                    <option value="<?= $sub_company_name; ?>">
                                                        <?= $sub_company_name; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
                                <div class="col-md-3" id="other_pdt_sub" style="margin-left:-95px; display:block;">
                                    <fieldset>

                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label" style="margin-left:-50px;"> Other Discharging Pt :</label>
                                            <div class="col-lg-5" style="margin-left:-20px;">
                                                <select class="form-control report_other_dPt" name="other_dPt" id="other_dPt">
                                                    <option value="non"> -- Select -- </option>
                                                </select>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>

                                <div class="col-md-6" style="margin-left:-190px;">
                                    <fieldset>

                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label" style="margin-left:50px;">Date:</label>
                                            <div class="col-md-3" style="margin-left:-20px;">
                                                <select name="year_month" id="year_month" class="form-control month_year">
                                                  <?php
                                                $query = mysqli_query($vSky, "SELECT DISTINCT `arch_id` AS yearmonth FROM `arch_trips`");
                                                
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                    $date_ex = $fetch['yearmonth'];
                                                    $into_two = explode("_", $date_ex);
                                                    $date_ex_got = $into_two[1];

                                                    $con = date('F Y', strtotime($date_ex_got))
                                                ?>
                                                    <option value="<?= $date_ex; ?>">
                                                        <?= $con; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>


                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Search<i class="icon-search4 ml-2"></i></button>
                                            </div>
                                            <?php
                                            if( isset($_REQUEST['year_month']) && !empty($_REQUEST['year_month']) ){
                                                ?>
                                            <div class="text-right" style="margin-left:10px;">
                                               <input type="hidden" id="requested_vals" value="<?= $_REQUEST['year_month']; ?>">
                                                <button type="button" id="print_shortage_arch" class="btn btn-warning" data-target="#over_nyt_expensis" data-toggle="modal">Print<i class="icon-printer ml-2"></i></button>
                                            </div>

                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </fieldset>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
                <!-- /2 columns form -->


                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <?php
                            if( isset($_REQUEST['r_c_n']) && !empty($_REQUEST['r_c_n']) && isset($_REQUEST['year_month']) && !empty($_REQUEST['year_month']) ){
                                $sub_name = mysqli_real_escape_string($vSky, $_REQUEST['r_c_n']);
                                $content = "";
                                
                                    
                                    $getSubCom = mysqli_query($vSky, "SELECT * FROM `sub_companies` WHERE `sub_name`='$sub_name' LIMIT 1");
                                    if($name = mysqli_fetch_assoc($getSubCom)){
                                        $company_name = $name['sub_name'];
                                    } 
                                    
                                    
                                  $content = "SHORTAGE REPORTS FOR ".$company_name;
                                    
                            ?>

                        <span class="card-title text-center" style="font-size:20px; font-weight:bold; margin-left:550px;">
                            <?= $content; ?>
                        </span>

                        <?php
                                
                            }else{
                            ?>
                        <span class="card-title text-center" style="font-size:20px; font-weight:bold; margin-left:650px;"> SHORTAGE REPORTS</span>
                        <?php   
                                
                            }
                            ?>
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
                                <th class="text-center">#</th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">LOADING DATE</th>
                                <th class="text-center">DISCHARGING DATE</th>
                                <th class="text-center">WAYBILL No.</th>
                                <th class="text-center">VEHICLE No.</th>
                                <th class="text-center">DISCHARGING PT</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    
                        if( isset($_REQUEST['r_c_n']) && !empty($_REQUEST['r_c_n']) && isset($_REQUEST['year_month']) && !empty($_REQUEST['year_month']) ){

                            $r_c_n = $_REQUEST['r_c_n'];
                            $dPt = $_REQUEST['dPt_arc'];
                            $other_dPt = $_REQUEST['other_dPt'];
                            $year_month = $_REQUEST['year_month'];
                            
                            if($year_month == ""){
                                                        
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='NONAME' AND `arch_id`='NOID'");
                                
                            }else{
                                
                                if($dPt == "pdt" && $other_dPt == "non"){
                                                                      
                                    $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$r_c_n' AND `arch_id`='$year_month'");
                                    
                                }else if( $dPt != "pdt" && $other_dPt == "non" ){
                                    
                                  $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$r_c_n' AND `discharging_pt`='$dPt' AND `arch_id`='$year_month'");  
                                    
                                }else if( $dPt != "pdt" && $other_dPt != "non" ){
                                    
                                    $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `arch_trips` WHERE `sub_company_name`='$r_c_n' AND (`discharging_pt`='$dPt' OR `discharging_pt`='$other_dPt') AND (`arch_id`='$year_month')");
                                    
                                }                            
                            }
                            //$sacked = "";
                            
                           while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                            <tr id='row_<?= e($vSkyRow['id']); ?>' style="color:red;">

                                <td class="text-center">
                                    <?= e($vSkyRow['id']); ?>
                                </td>
                                <td class="text-center">
                                    <?= e($vSkyRow['driver_name']); ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?= e($vSkyRow['loading_date']); ?></a></td>
                                <td class="text-center">
                                    <?= e($vSkyRow['discharging_date']); ?>
                                </td>
                                <td class="text-center">
                                    <?= e($vSkyRow['waybill_no']); ?>
                                </td>
                                <td class="text-center">
                                    <?= e($vSkyRow['truck_no']); ?>
                                </td>
                                <td class="text-center">
                                    <?= e($vSkyRow['discharging_pt']); ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <button type="button" data-target="#over_nyt_expensis" onclick="gettripHistoryInfoArch(<?= e($vSkyRow['id']); ?>)" id="viewRemainingInfo" data-toggle="modal" class="list-icons-item btn btn-light">
                                            <i class="icon-eye" style="color:orange;"></i>
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
    <div id="over_nyt_expensis" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="contd">

            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

    <?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/footer.php");
	?>
    <!-- /footer -->
    <!-- Vertical form modal -->
    <div id="for_shortage_values" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="text-center" style="margin-left:130px; font-size:20px;">Shortage Value For <b><span id="shortage_month_m">[MONTH HERE]</span></b></span>
                </div>

                <form action="#">
                    <div class="modal-body">
                        <!-- Shortage Values Report -->
                        <div class="card bg-pink-400 text-white text-center p-3">
                            <div>
                                <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">
                                    <i class="icon-cash4"></i>
                                </a>
                            </div>

                            <blockquote class="blockquote mb-0">
                                <p>"Entire Shortage Value For The Month Selected Is <b>GHC <span id="shortage_valuem">[Amount Here]</span></b>"</p>
                                <footer class="blockquote-footer text-white">
                                    <span>
                                        Driver <cite title="Source Title"><b> <span id="driver_name">[Driver Name Here]</span></b></cite> With Car No. <cite title="Source Title"><b> <span id="driver_car_no"> [Car No. Here] </span></b></cite> Made The Highest Shortage Value For That Month.
                                    </span>
                                </footer>
                            </blockquote>
                        </div>
                        <!-- /Shortage Values Report -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

</body>
<!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-center" style="margin-left:130px; font-size:20px;">Shortage Variable For <b><span id="shortage_month_m_v">[MONTH HERE]</span></b></span>
            </div>
            <form action="#">
                <div class="modal-body">
                    <!-- Shortage Values Report -->
                    <div class="card bg-orange-400 text-white text-center p-3">
                        <div>
                            <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">
                                <i class="icon-cash4"></i>
                            </a>
                        </div>

                        <blockquote class="blockquote mb-0">
                            <p>"Entire Shortage Variable For The Month Selected Is <b>Ltrs <span id="shortage_valuem_v">[ltrs Here]</span></b>"</p>
                            <footer class="blockquote-footer text-white">
                                <span>
                                    Driver <cite title="Source Title"><b> <span id="driver_name_v">[Driver Name Here]</span></b></cite> With Car No. <cite title="Source Title"><b> <span id="driver_car_no_v"> [Car No. Here] </span></b></cite> Made The Highest Shortage Variable For That Month.
                                </span>
                            </footer>
                        </blockquote>
                    </div>
                    <!-- /Shortage Values Report -->
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

</html>
