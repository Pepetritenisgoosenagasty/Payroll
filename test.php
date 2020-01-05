<?php

        $str = "Gone Are";
 //   $strCount = str_word_count($str, 1);

    //   if(count($strCount) > 1){
    //     foreach($strCount as $word){
    //         echo $word."<br />";
    //     }
    // }

    $strCount = str_word_count($str, 1);
    
        $c = count($strCount);

        $l = array();
        $k = array();

        for($y = 0; $y < $c; $y++){
          
        }

        if($c < 3){
            $l[] = $str;

            foreach($l as $nl){
                echo $nl;
            }
        }else{
            
        }

        print_r($l);
?>

<div style="display:table;" id="employees_list">
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
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">DISCHARGING DATE</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">WAYBILL No.</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">VEHICLE NO.</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">PRDT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">QTY</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">LOADING PT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">DISCARGING PT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">DISTANCE</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">RATE</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">AMOUNT</span></th>
                                    <th class="text-left"><span style="font-size:12px; font-weight:bold;">ACTION</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                        $vSkyStmt = mysqli_query($vSky, "SELECT emp.`emp_id`, emp.`emp_name`, emp.`emp_ssnit`, emp.`emp_basic`, cat.`cat_name`, pos.`pos_type_name`, emp.`emp_gross_salary`, emp.`input_date`, emp.`last_update` FROM `employees` AS emp
                        INNER JOIN `main_category` AS cat ON cat.`cat_id`=emp.`emp_main_cat_id`
                        INNER JOIN `positions` AS pos ON pos.`pos_id`=emp.`emp_pos_id`
                        WHERE emp.`is_pending`='0' AND emp.`on_leave`='0' AND emp.`sacked`='0'");
                            
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                <tr id='row_<?php echo $vSkyRow[' emp_id']; ?>'>

                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"><?php echo $vSkyRow['emp_name']; ?></span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;"> <?php echo $vSkyRow['input_date']; ?></span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;">   <?php echo $vSkyRow['last_update']; ?></span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"> 386509</span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"> KD 8070-17</span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"> CRUDE OIL</span>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"> 54000</span>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;">     HABOUR</span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;">    SPINTEX</span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;">   285</span></a>
                                    </td>
                                    <td class="text-left"><a href="javascript:;">
                                        <span style="font-size:10.5px; font-weight:bold;">   0.271813</span></a>
                                    </td>
                                    <td class="text-left">
                                        <span style="font-size:10.5px; font-weight:bold;"> <?php echo $currency." ".number_format($vSkyRow['emp_basic'], 2); ?></span>
                                    </td>
                                    <td class="text-left">
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
                            </tbody>
                        </table>
                    </div>
