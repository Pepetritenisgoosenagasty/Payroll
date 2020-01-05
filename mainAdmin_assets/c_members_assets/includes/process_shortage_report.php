<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/functions.php");


if(isset($_POST['process'])){
    
    $month_no = escape($vSky, $_POST['month_shortage']);
    $process = escape($vSky, $_POST['process']);
    $total = 0;
    
    if($process == "get_shortage_value"){
        
        //////////////////check if month no. exist///////////////////////
        
        $chk_for_month = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`, '%Y-%m')='$month_no'");
        $c_dem = rows($chk_for_month);
        
        if( $c_dem > 0 ){
            /////////////////////////////// get total shortage value ////////////////////////////
        $get_values = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`,'%Y-%m')='$month_no'");
            
            while($fetch = assoc($get_values)){
                $total += $fetch['shortage_val'];                 
            }
                $data['month_no'] = $c_dem;
                        
            $exploded = explode("-", $month_no);
            $month_no = $exploded[1];
            $year = $exploded[0];
        ///////////////////////////// get month name ////////////////////////////////////    
        $get_month_name = queryn($vSky, "SELECT DISTINCT MONTHNAME(`discharging_date`) AS month_name, YEAR(`discharging_date`) AS year FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1");
            
            if($get_month = arr($get_month_name)){
                
                $month_name = $get_month[0];
                $year = $get_month[1];
                
            }
            
            
            ////////////////////// get driver name and car no. with highest shortage value /////////////////////////
            $get_driver_no = queryn($vSky, "SELECT `driver_name`, `truck_no`, MAX(`shortage_val`) AS `max` FROM `trips_history` WHERE (MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year') AND `shortage_val`=(SELECT MAX(`shortage_val`) FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1)");
            
            if($fetch = assoc($get_driver_no)){
                $driver_name = $fetch['driver_name'];                 
                $truck_no = $fetch['truck_no'];                 
                $max = $fetch['max'];                 
            }
            
            if($get_driver_no){
            
                $data['shortage_value'] = $total;
                $data['month_name'] = $month_name;
                $data['year'] = $year;
                $data['driver_name'] = $driver_name;
                $data['truck_no'] = $truck_no;
                $data['vSkySuc'] = true;
               // $data['max'] = number_format($max, 2);
            }else{
                
                $data['vSkySuc'] = false;
                
            }
        }
    }
    
    echo json_encode($data);
    exit();
}

if(isset($_POST['process_variable'])){
    
    $shortVariable = escape($vSky, $_POST['shortVariable']);
    $process_variable = escape($vSky, $_POST['process_variable']);
    $total = 0;
    
    if($process_variable == "get_variable"){
                
        //////////////////check if month no. exist///////////////////////
        
        $chk_for_month = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`,'%Y-%m')='$shortVariable'");
        $c_dem = rows($chk_for_month);
        
        if( $c_dem > 0 ){
               $get_values = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`,'%Y-%m')='$shortVariable'");
            
            while($fetch = assoc($get_values)){
                $total += $fetch['shortage'];                 
            }

            $exploded = explode("-", $shortVariable);
            $month_no = $exploded[1];
            $year = $exploded[0];
            
        ///////////////////////////// get month smd year name ////////////////////////////////////    
        $get_month_name = queryn($vSky, "SELECT DISTINCT MONTHNAME(`discharging_date`) AS month_name, YEAR(`discharging_date`) AS year FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1");
            
            if($get_month = arr($get_month_name)){
                
                $month_name = $get_month[0];
                $year = $get_month[1];
                
            }         
            ////////////////////// get driver name and car no. with highest shortage value /////////////////////////
            
            $get_driver_no = queryn($vSky, "SELECT `driver_name`, `truck_no`, MAX(`shortage`) AS `max` FROM `trips_history` WHERE (MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year') AND `shortage`=(SELECT MAX(`shortage`) FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1)");
            
            
            if($fetch = assoc($get_driver_no)){
                $driver_name = $fetch['driver_name'];                 
                $truck_no = $fetch['truck_no'];                 
                $max = $fetch['max'];                 
            }
            
            if($get_driver_no){
            
                $data['shortage_value'] = $total;
                $data['month_name'] = $month_name;
                $data['year'] = $year;
                $data['driver_name'] = $driver_name;
                $data['truck_no'] = $truck_no;
                $data['vSkySuc'] = true;
               // $data['max'] = number_format($max, 2);
            }else{
                
                $data['vSkySuc'] = false;
                
            }
        }
        
    }
    echo json_encode($data);
    exit();
}


if(isset($_POST['process_variable_overnyt'])){
    

    $selOverNyt = escape($vSky, $_POST['selOverNyt']);
    $process_variable_overnyt = escape($vSky, $_POST['process_variable_overnyt']);
    $total = 0;
    
    if($process_variable_overnyt == "get_variable_overnyt"){
                
        //////////////////check if month no. exist///////////////////////
        
        $chk_for_month = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`,'%Y-%m')='$selOverNyt'");
        $c_dem = rows($chk_for_month);
        
        if( $c_dem > 0 ){
            /////////////////////////////// get total shortage value ////////////////////////////
        $get_values = queryn($vSky, "SELECT * FROM `trips_history` WHERE DATE_FORMAT(`discharging_date`,'%Y-%m')='$selOverNyt'");
            
            while($fetch = assoc($get_values)){
                $total += $fetch['overnight_allowance'];                 
            }
            
            $exploded = explode("-", $selOverNyt);
            $month_no = $exploded[1];
            $year = $exploded[0];
            
            
        ///////////////////////////// get month smd year name ////////////////////////////////////    
        $get_month_name = queryn($vSky, "SELECT DISTINCT MONTHNAME(`discharging_date`) AS month_name, YEAR(`discharging_date`) AS year FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1");
            
            if($get_month = arr($get_month_name)){
                
                $month_name = $get_month[0];
                $year = $get_month[1];
                
            }  
            
            ////////////////////// get driver name and car no. with highest overnight value /////////////////////////
            $get_driver_no = queryn($vSky, "SELECT `driver_name`, `truck_no`, MAX(`overnight_allowance`) AS `max` FROM `trips_history` WHERE (MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year') AND `overnight_allowance`=(SELECT MAX(`overnight_allowance`) FROM `trips_history` WHERE MONTH(`discharging_date`)='$month_no' AND YEAR(`discharging_date`)='$year' LIMIT 1)");
            
            
            if($fetch = assoc($get_driver_no)){
                $driver_name = $fetch['driver_name'];                 
                $truck_no = $fetch['truck_no'];                 
                $max = $fetch['max'];                 
            }
            
            if($get_driver_no){
                
                echo $output = "
                  <div class='modal-header'>
                    <span class='text-center' style='margin-left:70px; font-size:20px;'>Entire Overnight Allowance For <b><span id='shortage_month_m_o'>$month_name - $year</span></b></span>  
                  </div>

                <form >
                
                <div class='modal-body'>
                        <div class='card bg-blue-400 text-white text-center p-3'>
                            <div>
                                <a href='#' class='btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2'>
                                    <i class='icon-cash3'></i>
                                </a>
                            </div>

                            <blockquote class='blockquote mb-0'>
                                <p>'Entire Shortage Value For The Month Selected Is <b>GHC <span id='shortage_valuem'>$total</span></b>'</p>
                            </blockquote>
                        </div>
                    </div>

                    <div class='modal-footer'>
                        <button type='button' class='btn btn-link' data-dismiss='modal'>Close</button>
                    </div>
                </form>";
                
            }else{
                
                echo "false";
                
            }
        }
        
    }
    exit();
}


if(isset($_POST['historyProcess'])){
    
        $hisID = escape($vSky, $_POST['hisID']);
        $historyProcess = escape($vSky, $_POST['historyProcess']);
    
    if($historyProcess == "get_trip_history"){
        
        $query_trips = queryn($vSky, "SELECT * FROM `trips_history` WHERE `id`='$hisID' LIMIT 1");
        
        while($tripsInfo = assoc($query_trips)){
            $driver_name = $tripsInfo['driver_name'];
            $loading_date = $tripsInfo['loading_date'];
            $discharging_date = $tripsInfo['discharging_date'];
            $waybill_no = $tripsInfo['waybill_no'];
            $truck_no = $tripsInfo['truck_no'];
            $product = $tripsInfo['product'];
            $qty = $tripsInfo['qty'];
            $loading_pt = $tripsInfo['loading_pt'];
            $discharging_pt = $tripsInfo['discharging_pt'];
            $distance = $tripsInfo['distance'];
            $amount = $tripsInfo['amount'];
            $shortage = $tripsInfo['shortage'];
            $pay_due_kodson = $tripsInfo['pay_due_kodson'];
            $amt_recievable = $tripsInfo['amt_recievable'];
            $cash_paid_to_make_loss = $tripsInfo['cash_paid_to_make_loss'];
            $shortage_val = $tripsInfo['shortage_val'];
            $overnight_allowance = $tripsInfo['overnight_allowance'];
            $amount_due = $tripsInfo['amount_due'];
            $fuel_consumed = $tripsInfo['fuel_consumed'];
            $fuel_consumed_in_cash = $tripsInfo['fuel_consumed_in_cash'];
            $balance = $tripsInfo['balance'];
            $receipt_no = $tripsInfo['receipt_no'];
            
        }
        
        $sys_vals = queryn($vSky, "SELECT `value_multiplied_by_short` FROM `sys_settings`");
        
        while($sys = arr($sys_vals)){
            
            $value_multiplied_by_short = $sys['value_multiplied_by_short'];
            
        }
        
            
        if($query_trips){
            
        echo $output = "
                  <div class='modal-header'>
                    <span class='text-center' style='margin-left:350px; font-size:20px;'><b>TRIP DETAILS</b> <b><span id='shortage_month_m_o'></span></b></span>  
                  </div>

                 <div class='card-body'>
                            <form action'#' id='edit_payslip'>
                                <input type='hidden' id='eAmpID' name='eAmpID'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-3 col-form-label'><b>Driver's Name :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='dName' id='dName' value='$driver_name' class='form-control'>
                                                </div>

                                                <label class='col-lg-2 col-form-label'><b>Vehicle No. :</b></label>
                                                <div class='col-lg-3'>
                                                    <input readonly type='text' name='vNo' id='vNo' value='$truck_no' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:-5px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-3 col-form-label'><b>Loading Date :</b></label>
                                                <div class='col-lg-3'>
                                                    <input readonly type='text' name='lDate' id='lDate' value='$loading_date' class='form-control'>
                                                </div>

                                                <label class='col-lg-3 col-form-label'><b>Discharging Date :</b></label>
                                                <div class='col-lg-3'>
                                                    <input readonly type='text' name='dDate' id='dDate' value='$discharging_date' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>TRIP ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Loading Pt :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='lPt' id='lPt' value='$loading_pt' class='form-control'>
                                                </div>

                                                <label class='col-lg-3 col-form-label'><b>Discharging Pt :</b></label>
                                                <div class='col-lg-3'>
                                                    <input readonly type='text' name='dPt' id='dPt' value='$discharging_pt' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:-5px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Waybill No. </b></label>
                                                <div class='col-lg-2' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='wBill' id='wBill' value='$waybill_no' class='form-control'>
                                                </div>

                                                <label class='col-lg-2 col-form-label' style='margin-left:-5px;'><b>Product :</b></label>
                                                <div class='col-lg-4' style='margin-left:-60px;'>
                                                    <input readonly type='text' value='$product' name='prdt' id='prdt' class='form-control'>
                                                </div>
                                                
                                                <label class='col-lg-2 col-form-label' style='margin-left:5px;'><b>Quantity :</b></label>
                                                <div class='col-lg-2' style='margin-left:-27px;'>
                                                    <input readonly type='text' name='qty' id='qty' value='$qty' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:-5px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Distance : </b></label>
                                                <div class='col-lg-2' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='wBill' id='wBill' value='$distance' class='form-control'>
                                                </div>

                                                <label class='col-lg-2 col-form-label' style='margin-left:-5px;'><b>Rate :</b></label>
                                                <div class='col-lg-3' style='margin-left:-90px;'>
                                                    <input readonly type='text' value='$value_multiplied_by_short' name='prdt' id='prdt' class='form-control'>
                                                </div>
                                                
                                                <label class='col-lg-2 col-form-label' style='margin-left:35px;'><b>Amount :</b></label>
                                                <div class='col-lg-3' style='margin-left:-27px;'>
                                                    <input readonly type='text' name='qty' id='qty' value='$amount' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Shortage :</b></label>
                                                <div class='col-lg-2' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='shortage' id='shortage' value='$shortage' class='form-control'>
                                                </div>

                                                <label class='col-lg-3 col-form-label' style='margin-left:35px;'><b>Shortage Value :</b></label>
                                                <div class='col-lg-2' style='margin-left:-100px;'>
                                                    <input readonly type='text' name='sValue' id='sValue' value='$shortage_val' class='form-control'>
                                                </div>
                                                
                                                <label class='col-lg-3 col-form-label' style='margin-left:35px;'><b>Overnight Allowance :</b></label>
                                                <div class='col-lg-2' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='ovaNytAllow' id='ovaNytAllow' value='$overnight_allowance' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Amount Due :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='amtDue' id='amtDue' value='$amount_due' class='form-control'>
                                                </div>
                                                
                                                <label class='col-lg-2 col-form-label'><b>Fuel Consumed :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='fConsumed' id='fConsumed' value='$fuel_consumed' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-3 col-form-label'><b>Fuel Consumed In Cash :</b></label>
                                                <div class='col-lg-4' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='fConInCash' id='fConInCash' value='$fuel_consumed_in_cash' class='form-control'>
                                                </div>
                                                
                                                <label class='col-lg-3 col-form-label'><b>Payment Due BVO/Kodson :</b></label>
                                                <div class='col-lg-3' style='margin-left:-15px;'>
                                                    <input readonly type='text' name='pDueK' id='pDueK' value='$pay_due_kodson' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-3 col-form-label'><b>Amount Recievable :</b></label>
                                                <div class='col-lg-3' style='margin-left:-60px;'>
                                                    <input readonly type='text' name='amtR' id='amtR' value='$amt_recievable' class='form-control'>
                                                </div>

                                                <label class='col-lg-3 col-form-label'><b>Cash Paid To Make Loss :</b></label>
                                                <div class='col-lg-4' style='margin-left:-15px;'>
                                                    <input readonly type='text' name='cashPaid' id='cashPaid' value='$cash_paid_to_make_loss' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                <div class='row' style='margin-top:0px;'>
                                    <div class='col-md-12'>
                                        <fieldset>
                                            <div class='form-group row'>
                                                <label class='col-lg-2 col-form-label'><b>Receipt No. :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='receiptNo' id='receiptNo' value='$receipt_no' class='form-control'>
                                                </div>

                                                <label class='col-lg-2 col-form-label'><b>Balance :</b></label>
                                                <div class='col-lg-4'>
                                                    <input readonly type='text' name='balance' id='balance' value='$balance' class='form-control'>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>


                                <hr style='border: 1px solid orange;'>
                                <hr style='border: 1px solid orange;'>
                            </form>
                        </div>";    
            
        }
        
    }

    exit();
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['archHistoryProcess'])){
    
        $archHistoryProcessID = escape($vSky, $_POST['archHistoryProcessID']);
        $archHistoryProcess = escape($vSky, $_POST['archHistoryProcess']);
    
    if($archHistoryProcess == "archHistoryProcess"){
        
        $query_trips = queryn($vSky, "SELECT * FROM `sub_companies` WHERE `sub_name`='$archHistoryProcessID' LIMIT 1");
        $count = rows($query_trips);
        
        if($count > 0){
            
        $query_trips = queryn($vSky, "SELECT * FROM `sub_companies` WHERE `sub_name`='$archHistoryProcessID' LIMIT 1");

                   
        while($tripsInfo = assoc($query_trips)){
            $sub_name = $tripsInfo['sub_name'];
            $main_company_id = $tripsInfo['main_company_id'];
            $transporter = $tripsInfo['transporter'];
            $t_main_name = $tripsInfo['t_main_name'];
            $t_address = $tripsInfo['t_address'];
            $t_tel = $tripsInfo['t_tel'];
        }
        
        $query_tripst = queryn($vSky, "SELECT * FROM `main_companies` WHERE `id`='$main_company_id' LIMIT 1");
        
        while($tripsInfot = assoc($query_tripst)){
            $name = $tripsInfot['name'];
            $presented_to = $tripsInfot['presented_to'];
            $main_name = $tripsInfot['main_name'];
            $location = $tripsInfot['location'];
            $tel = $tripsInfot['tel'];
        }
            
        if($query_trips){
            
        echo $output = "<div class='modal-header'>
                    <span class='modal-title' style='margin-left:320px; font-size:20px; font-weight:bold;'>Confirm Details</span>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>

                <form action='#'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='form-group'>
                                            <label>Company Name</label>
                                            <input readonly type='text' value='$name' name='vSkyComName' id='vSkyComName' class='form-control wordsonly-format'>
                                            <input type='hidden' name='vSkyComId' id='vSkyComId' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>FREIGHT CLAIMS ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Presented To:</label>
                                            <input type='text' class='form-control wordsonly-format' value='$presented_to' name='ePresTo' id='ePresTo' placeholder='THE MANAGING DIRECTOR'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Main Name:</label>
                                            <input type='text' class='form-control' name='eMaincomName' id='eMaincomName' value='$main_name' placeholder='AKWAABA LINK INVESTMENTS LTD.'>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Location:</label>
                                            <input type='text' class='form-control' name='eLocation' id='eLocation' value='$location' placeholder='SPINTEX LIGHT INDUSTRIAL AREA'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Tel.:</label>
                                            <input readonly type='text' class='form-control' name='eComTel' id='eComTel' value='$tel' placeholder='0303 305730/0501530390'>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>TRANSPORTER ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Transporter:</label>
                                            <input readonly type='text' class='form-control wordsonly-format' value='$transporter' name='tPresentedTo' id='tPresentedTo' placeholder='THE MANAGING DIRECTOR'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Main Name:</label>
                                            <input type='text' class='form-control' name='tMaincomName' id='tMaincomName' value='$t_main_name' placeholder='KGL CONSTRUCTION LIMITED'>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Address:</label>
                                            <input type='text' class='form-control' name='tLocation' id='tLocation' value='$t_address' placeholder='P.O.BOX CS 7967 ,   TEMA'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Tel.:</label>
                                            <input type='text' class='form-control' name='tComTel' id='tComTel' value='$t_tel' placeholder='0303 305730/0501 530390'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal-footer'>
                        <button type='button' class='btn btn-link' data-dismiss='modal'>Close</button>
                        <button type='button' class='btn bg-primary' id='print_id_now' ><span class='ladda-label labll'>Print</span><i class='icon-printer ml-2 updateComIcon'></i></button>
                    </div>
                </form>";    
            
            } 
            
        }else{
            
            echo $output = "<div class='modal-header'>
                    <h5 class='modal-title'>Edit Main Company</h5>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                </div>

                <form action='#'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='form-group'>
                                            <label>Company Name</label>
                                            <input readonly type='text' value='' name='vSkyComName' id='vSkyComName' class='form-control wordsonly-format'>
                                            <input type='hidden' name='vSkyComId' id='vSkyComId' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>FREIGHT CLAIMS ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Presented To:</label>
                                            <input type='text' class='form-control wordsonly-format' value='' name='ePresTo' id='ePresTo' placeholder='THE MANAGING DIRECTOR'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Main Name:</label>
                                            <input type='text' class='form-control' name='eMaincomName' id='eMaincomName' value='' placeholder='AKWAABA LINK INVESTMENTS LTD.'>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Location:</label>
                                            <input type='text' class='form-control' name='eLocation' id='eLocation' value='' placeholder='SPINTEX LIGHT INDUSTRIAL AREA'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Tel.:</label>
                                            <input readonly type='text' class='form-control' name='eComTel' id='eComTel' value='' placeholder='0303 305730/0501530390'>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>TRANSPORTER ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Transporter:</label>
                                            <input type='text' class='form-control wordsonly-format' value='' name='tPresentedTo' id='tPresentedTo' placeholder='THE MANAGING DIRECTOR'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Main Name:</label>
                                            <input type='text' class='form-control' name='tMaincomName' id='tMaincomName' value='' placeholder='KGL CONSTRUCTION LIMITED'>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Address:</label>
                                            <input type='text' class='form-control' name='tLocation' id='tLocation' value='' placeholder='P.O.BOX CS 7967 ,   TEMA'>
                                        </div>
                                    </div>

                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Company Tel.:</label>
                                            <input readonly type='text' class='form-control' name='tComTel' id='tComTel' value='' placeholder='0303 305730/0501 530390'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='modal-footer'>
                        <button type='button' class='btn btn-link' data-dismiss='modal'>Close</button>
                        <button type='button' class='btn bg-primary'><span id='update_com' class='ladda-label labll'>Print</span><i class='icon-printer ml-2 updateComIcon'></i></button>
                    </div>
                </form>";
            
        }
    }

    exit();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['prc'])){
    
        $com_sub = escape($vSky, $_POST['com_sub']);
        $prc = escape($vSky, $_POST['prc']);
        $output = "<option value='non'> -- Select -- </option>";
    
    if($prc == "prc"){
        
        if($com_sub == "pdt"){
           
            echo $output;
            
        }else{
            
        $lts_go = queryn($vSky, "SELECT DISTINCT `discharging_pt` FROM `trips_history` WHERE `discharging_pt`!='$com_sub'");
        
        while($d = arr($lts_go)){
            $subName = $d[0];
            
            $output .= "<option value='$subName'>$subName</option>";
        }
        
        echo $output;
            
        }
        
    }
    
    exit();
}
?>