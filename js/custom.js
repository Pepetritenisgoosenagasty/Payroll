$(function () {

    const percentage = 100;

    ////////////////////////////////////////////////// shortage report ////////////////////////////////////////////////////////////////
    $(document).on("change", "#dPt", function () {

        var com_sub = $("#dPt").val();

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
            com_sub: com_sub,
            prc: "prc"
        }, function (r) {
            console.log(r);
            $("#other_dPt").html(r);
            $("#other_pdt_sub").fadeIn("slow").css("display", "block");

        });
    });

    $(document).on("click", "#print_shortage", function () {

        var archHistoryProcessID = $("#requested_vals").val(),
            archHistoryProcess = "archHistoryProcess";

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
            archHistoryProcessID: archHistoryProcessID,
            archHistoryProcess: archHistoryProcess
        }, function (r) {
            console.log(r);
            $("#contd").html(r);

        });
    });

    $(document).on("click", "#print_id_now", function () {

        var ePresTo = $("#ePresTo").val(),
            eMaincomName = $("#eMaincomName").val(),
            eLocation = $("#eLocation").val(),
            eComTel = $("#eComTel").val(),
            tPresentedTo = $("#tPresentedTo").val(),
            tMaincomName = $("#tMaincomName").val(),
            tLocation = $("#tLocation").val(),
            tComTel = $("#tComTel").val();

        var process_vals = window.location.search;

        window.open("/payroll/mainAdmin_assets/c_members_assets/includes/process_print_shortage" + process_vals + "&ePresTo=" + ePresTo + "&eMaincomName=" + eMaincomName + "&eLocation=" + eLocation + "&eComTel=" + eComTel + "&tPresentedTo=" + tPresentedTo + "&tMaincomName=" + tMaincomName + "&tLocation=" + tLocation + "&tComTel=" + tComTel, "_blank");

    });

    $(document).on("click", "#shortage_value_btn", function () {

        var month_shortage = $("#shortage_value").val(),
            process = "get_shortage_value";
        console.log(month_shortage);
        if (month_shortage == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
                month_shortage: month_shortage,
                process: process
            }, function (r) {
                var r = JSON.parse(r);

                console.log(r);
                if (r.vSkySuc) {

                    $("#shortage_month_m").text(r.month_name + " - " + r.year);
                    $("#shortage_valuem").text(r.shortage_value);
                    $("#driver_name").text(r.driver_name);
                    $("#driver_car_no").text(r.truck_no);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                        text: 'Error Fetching Data',
                        addclass: 'bg-danger border-danger'
                    });

                }

            });
        }
    });

    $(document).on("click", "#getShortageVariablesInfo", function () {

        var shortVariable = $("#shortVariable").val(),
            process_variable = "get_variable";

        if (shortVariable == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
                shortVariable: shortVariable,
                process_variable: process_variable
            }, function (r) {
                var r = JSON.parse(r);

                console.log(r);
                if (r.vSkySuc) {

                    $("#shortage_month_m_v").text(r.month_name + " - " + r.year);
                    $("#shortage_valuem_v").text(r.shortage_value);
                    $("#driver_name_v").text(r.driver_name);
                    $("#driver_car_no_v").text(r.truck_no);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                        text: 'Error Fetching Data',
                        addclass: 'bg-danger border-danger'
                    });

                }

            });
        }
    });

    $(document).on("click", "#overNytbtn", function () {


        var selOverNyt = $("#selOverNyt").val(),
            process_variable_overnyt = "get_variable_overnyt";

        if (selOverNyt == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
                selOverNyt: selOverNyt,
                process_variable_overnyt: process_variable_overnyt
            }, function (r) {

                $("#contd").html(r);

            });
        }
    });

    ////////////////////////////////////////////////// shortage report ////////////////////////////////////////////////////////////////   


    ////////////////////////////////////////////////// shortage report archieve /////////////////////////////////////////////////////// 
    $(document).on("change", "#dPt_arc", function () {

        var com_sub = $("#dPt_arc").val();

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
            com_sub: com_sub,
            prc: "prc"
        }, function (r) {
            console.log(r);
            $("#other_dPt").html(r);
            $("#other_pdt_sub").fadeIn("slow").css("display", "block");

        });
    });

    $(document).on("click", "#shortage_value_btn_arc", function () {

        var month_shortage = $("#shortage_value").val(),
            process = "get_shortage_value";
        console.log(month_shortage);
        if (month_shortage == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
                month_shortage: month_shortage,
                process: process
            }, function (r) {
                var r = JSON.parse(r);

                console.log(r);
                if (r.vSkySuc) {

                    $("#shortage_month_m").text(r.month_name + " - " + r.year);
                    $("#shortage_valuem").text(r.shortage_value);
                    $("#driver_name").text(r.driver_name);
                    $("#driver_car_no").text(r.truck_no);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                        text: 'Error Fetching Data',
                        addclass: 'bg-danger border-danger'
                    });

                }

            });
        }
    });

    $(document).on("click", "#getShortageVariablesInfo_arch", function () {

        var shortVariable = $("#shortVariable").val(),
            process_variable = "get_variable";

        if (shortVariable == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
                shortVariable: shortVariable,
                process_variable: process_variable
            }, function (r) {
                var r = JSON.parse(r);

                console.log(r);
                if (r.vSkySuc) {

                    $("#shortage_month_m_v").text(r.month_name + " - " + r.year);
                    $("#shortage_valuem_v").text(r.shortage_value);
                    $("#driver_name_v").text(r.driver_name);
                    $("#driver_car_no_v").text(r.truck_no);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                        text: 'Error Fetching Data',
                        addclass: 'bg-danger border-danger'
                    });

                }

            });
        }
    });

    $(document).on("click", "#overNytbtn_arch", function () {


        var selOverNyt = $("#selOverNyt").val(),
            process_variable_overnyt = "get_variable_overnyt";

        if (selOverNyt == 0) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Month From The Drop Down',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
                selOverNyt: selOverNyt,
                process_variable_overnyt: process_variable_overnyt
            }, function (r) {

                $("#contd").html(r);

            });
        }
    });

    $(document).on("click", "#print_shortage_arch", function () {

        var archHistoryProcessID = $("#requested_vals").val(),
            archHistoryProcess = "archHistoryProcess";

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
            archHistoryProcessID: archHistoryProcessID,
            archHistoryProcess: archHistoryProcess
        }, function (r) {
            console.log(r);
            $("#contd").html(r);

        });
    });

    $(document).on("click", "#print_id_now_arc", function () {
            
              var  ePresTo = $("#ePresTo").val(),
                eMaincomName = $("#eMaincomName").val(),
                eLocation = $("#eLocation").val(),
                eComTel = $("#eComTel").val(),
                tPresentedTo = $("#tPresentedTo").val(),
                tMaincomName = $("#tMaincomName").val(),
                tLocation = $("#tLocation").val(),
                tComTel = $("#tComTel").val();
    
            var process_vals = window.location.search;
    
            window.open("/payroll/mainAdmin_assets/c_members_assets/includes/process_print_shortage_arch"+process_vals+"&ePresTo="+ePresTo+"&eMaincomName="+eMaincomName+"&eLocation="+eLocation+"&eComTel="+eComTel+"&tPresentedTo="+tPresentedTo+"&tMaincomName="+tMaincomName+"&tLocation="+tLocation+"&tComTel="+tComTel, "_blank");
    
        });

    ////////////////////////////////////////////////// shortage report archieve ///////////////////////////////////////////////////////    

    $(document).on("click", "#update_trip_trip", function () {

        var e_trip_id = $("#e_trip_id").val(),
            e_drID = $("#e_drID").val(),
            e_tkID = $("#e_tkID").val(),
            location_id = $("#location_id").val(),
            e_drName = $("#e_drName").val(),
            e_vName = $("#e_vName").val(),
            e_lDate = $("#e_lDate").val(),
            e_dDate = $("#e_dDate").val(),

            e_oldMcom = $("#e_oldMcom").val(),
            e_oldSubCom = $("#e_oldSubCom").val(),

            mainCom_id_e = $("#mainCom_id_e").val(),
            subCom_id_e = $("#subCom_id_e").val(),

            e_waybill = $("#e_waybill").val(),
            e_product = $("#e_product").val(),
            e_quantity = $("#e_quantity").val(),

            e_l_d_pt = $("#e_l_d_pt").val(),

            e_old_loading_pt = $("#e_old_loading_pt").val(),
            e_old_discharging_pt = $("#e_old_discharging_pt").val(),

            e_distance = $("#e_distance").val(),

            e_rate = $("#e_rate").val(),
            e_amount = $("#e_amount").val(),
            e_nyt_alw = $("#e_nyt_alw").val();

        if (mainCom_id_e == "e_sel" && subCom_id_e == null) {

            mainCom_id_e = "oldM";
            subCom_id_e = "oldSub";

        } else {

            mainCom_id_e = mainCom_id_e;
            subCom_id_e = subCom_id_e;

        }

        if (e_l_d_pt == "e_l_dSel") {

            e_l_d_pt = location_id;

        } else {

            e_l_d_pt = e_l_d_pt;

        }


        if (e_lDate == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Loading Date Needed',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (e_waybill == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Waybill Number Needed',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (e_product == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Product Needed',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (e_amount == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Click On "Click To Calculate Values" To Get Value For Amount',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                e_trip_id: e_trip_id,
                e_drID: e_drID,
                e_tkID: e_tkID,
                e_drName: e_drName,
                e_vName: e_vName,
                e_lDate: e_lDate,
                e_dDate: e_dDate,
                mainCom_id_e: mainCom_id_e,
                subCom_id_e: subCom_id_e,
                e_waybill: e_waybill,
                e_product: e_product,
                e_quantity: e_quantity,
                e_l_d_pt: e_l_d_pt,
                e_distance: e_distance,
                e_rate: e_rate,
                e_amount: e_amount,
                e_nyt_alw: e_nyt_alw,
                e_process: "update_the_new_trip"
            }, function (r) {
                var r = JSON.parse(r);
                //console.log(r);
                if (r.vSkySuc) {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                        text: 'Trip Updated Successfully',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-cancel-circle2 icon-3x "></i></div>',
                        text: 'Error Updating Trip',
                        addclass: 'bg-warning border-warning'
                    });

                }


                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
                }
            });
        }


    });

    $(document).on("click", "#apply_trip_trip", function () {

        var t_drID = $("#t_drID").val(),
            t_tkID = $("#t_tkID").val(),
            t_drName = $("#t_drName").val(),
            t_vName = $("#t_vName").val(),
            t_lDate = $("#t_lDate").val(),
            t_dDate = $("#t_dDate").val(),
            mainCom_id = $("#mainCom_id").val(),
            subCom_id = $("#subCom_id").val(),
            t_waybill = $("#t_waybill").val(),
            t_product = $("#t_product").val(),
            t_quantity = $("#t_quantity").val(),
            t_l_d_pt = $("#t_l_d_pt").val(),
            t_distance = $("#t_distance").val(),
            t_rate = $("#t_rate").val(),
            t_nyt_alw = $("#t_nyt_alw").val(),
            t_amount = $("#t_amount").val();

        if (t_lDate == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Loading Date Needed',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (mainCom_id == "t_sel" && subCom_id == null) {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Select Company And its Sub Company',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (t_waybill == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Waybill Number Needed',
                addclass: 'bg-info border-info'
            });

            $("#t_waybill").css("border", "1px solid red");
            $("#t_waybill").css("box-shadox", "0 0 0 solid red");

            return false;

        } else if (t_product == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Product Needed',
                addclass: 'bg-info border-info'
            });

            $("#t_product").css("border", "1px solid red");
            $("#t_product").css("box-shadox", "0 0 0 solid red");

            return false;
        } else if (t_l_d_pt == "t_l_dSel") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Loading And Discharging Point Needed',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (t_amount == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Please Click On "Click To Calculate Values" To Get Value For Amount',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                t_drID: t_drID,
                t_tkID: t_tkID,
                t_drName: t_drName,
                t_vName: t_vName,
                t_lDate: t_lDate,
                mainCom_id: mainCom_id,
                subCom_id: subCom_id,
                t_waybill: t_waybill,
                t_product: t_product,
                t_quantity: t_quantity,
                t_l_d_pt: t_l_d_pt,
                t_distance: t_distance,
                t_rate: t_rate,
                t_amount: t_amount,
                t_nyt_alw: t_nyt_alw,
                process: "add_new_trip"
            }, function (r) {
                var r = JSON.parse(r);
                console.log(r);
                if (r.vSkySuc) {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                        text: 'New Trip Added Successfully',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                } else {

                    new PNotify({
                        title: '<div class="ml-3 text-center"><i class = "icon-cancel-circle2 icon-3x "></i></div>',
                        text: 'Error Adding Trip',
                        addclass: 'bg-warning border-warning'
                    });

                }


                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
                }
            });
        }


    });

    $(document).on("click", "#get_dr_info", function () {
        var driver_id = $("#trip_id").val();

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
            driver_id: driver_id,
            process_driver: "getDriverInfo"
        }, function (r) {
            var r = JSON.parse(r);

            if (r.vSkySuc) {
                $("#t_drID").val(r.driver_id);
                $("#t_drName").val(r.driver_name);
                $("#t_vName").val(r.truck_no);
                $("#t_tkID").val(r.truck_id);

            }
        });

    });

    $(document).on("click", "#amt_calculate_r", function () {

        var r_nyt_alw = $("#r_nyt_alw").val(),
            r_shortage = $("#r_shortage").val(),
            r_shortage_rate = $("#r_shortage_rate").val(),
            r_shortage_val = $("#r_shortage_val").val(),
            r_amt_due = $("#r_amt_due").val(),
            r_fuel_consumed = $("#r_fuel_consumed").val(),
            r_fuel_in_cash_rate = $("#r_fuel_in_cash_rate").val(),
            r_pay_due_kodson = $("#r_pay_due_kodson").val(),
            r_amt_recievable = $("#r_amt_recievable").val(),
            r_amt_recievable_surchage = $("#r_amt_recievable_surchage").val(),
            r_balance = $("#r_balance").val(),
            r_cash_paid_to_make_loss = $("#r_cash_paid_to_make_loss").val(),
            r_fuel_in_cash = $("#r_fuel_in_cash").val();
            console.log("amt_rer1: " + r_amt_recievable);
        


        if (r_shortage == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Shortage Field Can Not Be Empty. Please Put A Zero(0) If No Shortage Should Be Applied',
                addclass: 'bg-info border-info'
            });

            $("#r_shortage").css("border", "1px solid red");
            $("#r_shortage").css("box-shadox", "0 0 0 solid red");

            return false;

        } else if (r_fuel_consumed == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Fuel Consumed Field Can Not Be Empty. Please Put A Zero(0) If No Fuel Consumed Should Be Applied',
                addclass: 'bg-info border-info'
            });

            $("#r_fuel_consumed").css("border", "1px solid red");
            $("#r_fuel_consumed").css("box-shadox", "0 0 0 solid red");

            return false;

        } else if (r_fuel_in_cash == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Fuel Consumed In Cash Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            $("#r_fuel_in_cash").css("border", "1px solid red");
            $("#r_fuel_in_cash").css("box-shadox", "0 0 0 solid red");

            return false;

        } else if (r_shortage_val == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Shortage Value Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            $("#r_shortage_val").css("border", "1px solid red");
            $("#r_shortage_val").css("box-shadox", "0 0 0 solid red");

            return false;

        } else if (r_amt_due == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Amount Due Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            $("#r_amt_due").css("border", "1px solid red");
            $("#r_amt_due").css("box-shadox", "0 0 0 solid red");

            return false;

        } else {
            
            console.log("amt_rer2: " + r_amt_recievable);

            r_shortage_val = parseFloat(r_shortage * r_shortage_rate).toFixed(2);
            r_amt_due = parseFloat(r_nyt_alw - r_shortage_val).toFixed(2);
            r_fuel_in_cash = parseFloat(r_fuel_consumed * r_fuel_in_cash_rate).toFixed(2);
                
            r_pay_due_kodson = parseFloat(r_nyt_alw - r_shortage_val).toFixed(2);

            if (r_pay_due_kodson < 0) {
            console.log("amt_rer3: " + r_pay_due_kodson);
                //    console.log("0");

                r_amt_recievable = r_pay_due_kodson;
                temp_pay_due_kodson = 0;

                $("#r_pay_due_kodson").val(temp_pay_due_kodson);
                $("#r_amt_recievable").val(r_amt_recievable);
                $("#r_amt_recievable_surchage").val(Math.abs(r_amt_recievable));
                    console.log("amt_re: "+ r_amt_recievable);
                if (r_cash_paid_to_make_loss != "") {

                    //console.log("1");

                    var y = $("#r_amt_recievable").val();
                  //  var w = $("#r_amt_recievable_surchage").val();
                    console.log("amt_rer: " + y);
                    
                    x = parseFloat(parseFloat(y) + parseFloat(r_cash_paid_to_make_loss)).toFixed(2);
                    t = parseFloat(parseFloat(y) + parseFloat(r_cash_paid_to_make_loss)).toFixed(2);

                    if (x != 0 && x < 0) {

                        //console.log("2");
                        $("#r_amt_recievable").val(x);
                        if(t < 0){
                        $("#r_amt_recievable_surchage").val(Math.abs(t));
                        }
                        $("#r_balance").val("0");

                    } else if (x == 0) {

                        //console.log("3");
                        $("#r_amt_recievable_surchage").val("0");
                        $("#r_balance").val("0");

                    } else if (x != 0 && x > 0) {

                        //console.log("4");

                        r_balance = x;
                        $("#r_balance").val(r_balance);
                        $("#r_amt_recievable_surchage").val("0");
                    }

                } else {

                    //console.log("5");

                    $("#r_balance").val("0");

                }

            } else {

                //console.log("6");

                $("#r_pay_due_kodson").val(r_pay_due_kodson);
                $("#r_amt_recievable").val("0");
                $("#r_amt_recievable_surchage").val("0");
                $("#r_balance").val("0");

            }

            $("#r_shortage_val").val(r_shortage_val);
            $("#r_amt_due").val(r_amt_due);
            $("#r_fuel_in_cash").val(r_fuel_in_cash);

        }
    });
    
    $(document).on("click", "#amt_calculate_r_edit", function () {

        var r_nyt_alw = $("#r_edit_nyt_alw").val(),
            r_shortage = $("#r_edit_shortage").val(),
            r_shortage_rate = $("#r_edit_shortage_rate").val(),
            r_shortage_val = $("#r_edit_shortage_val").val(),
            r_amt_due = $("#r_edit_amt_due").val(),
            r_fuel_consumed = $("#r_edit_fuel_consumed").val(),
            r_fuel_in_cash_rate = $("#r_edit_fuel_in_cash_rate").val(),
            r_pay_due_kodson = $("#r_edit_pay_due_kodson").val(),
            r_amt_recievable = $("#r_edit_amt_recievable").val(),
            r_edit_amt_recievable_surcharg = $("#r_edit_amt_recievable_surcharg").val(),
            r_cash_paid_to_make_loss = $("#r_edit_cash_paid_to_make_loss").val(),
            r_balance = $("#r_edit_balance").val(),
            r_fuel_in_cash = $("#r_edit_fuel_in_cash").val();

        if (r_shortage == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Shortage Field Can Not Be Empty. Please Put A Zero(0) If No Shortage Should Be Applied',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (r_fuel_consumed == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Fuel Consumed Field Can Not Be Empty. Please Put A Zero(0) If No Fuel Consumed Should Be Applied',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (r_fuel_in_cash == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Fuel Consumed In Cash Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (r_shortage_val == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Shortage Value Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (r_amt_due == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Amount Due Field Can Not Be Empty. Please Put A Zero(0) In There',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {

            r_shortage_val = parseFloat(r_shortage * r_shortage_rate).toFixed(2);
            r_amt_due = parseFloat(r_nyt_alw - r_shortage_val).toFixed(2);
            r_fuel_in_cash = parseFloat(r_fuel_consumed * r_fuel_in_cash_rate).toFixed(2);

            r_pay_due_kodson = parseFloat(r_nyt_alw - r_shortage_val).toFixed(2);

            if (r_pay_due_kodson < 0) {

                //console.log("0");

                r_amt_recievable = r_pay_due_kodson;
                temp_pay_due_kodson = 0;

                $("#r_edit_pay_due_kodson").val(temp_pay_due_kodson);
                $("#r_edit_amt_recievable").val(r_amt_recievable);
                $("#r_edit_amt_recievable_surcharg").val(Math.abs(r_amt_recievable));

                if (r_cash_paid_to_make_loss != "") {

                    //console.log("1");

                    var y = $("#r_edit_amt_recievable").val();

                    x = parseFloat(parseFloat(y) + parseFloat(r_cash_paid_to_make_loss)).toFixed(2);
                    t = parseFloat(parseFloat(y) + parseFloat(r_cash_paid_to_make_loss)).toFixed(2);

                    if (x != 0 && x < 0) {

                        //console.log("2");

                        $("#r_edit_amt_recievable").val(x);
                        if(t < 0){
                        $("#r_edit_amt_recievable_surcharg").val(Math.abs(t));
                        }
                        $("#r_edit_balance").val("0");

                    } else if (x == 0) {

                        //console.log("3");
                        $("#r_edit_amt_recievable_surcharg").val("0");
                        $("#r_edit_balance").val("0");

                    } else if (x != 0 && x > 0) {

                        //console.log("4");

                        r_balance = x;
                        $("#r_edit_balance").val(r_balance);
                        $("#r_edit_amt_recievable_surcharg").val("0");
                    }

                } else {

                    //console.log("5");

                    $("#r_edit_balance").val("0");

                }

            } else {

                //console.log("6");

                $("#r_edit_pay_due_kodson").val(r_pay_due_kodson);
                $("#r_edit_amt_recievable").val("0");
                $("#r_edit_amt_recievable_surcharg").val("0");
                $("#r_edit_balance").val("0");

            }

            $("#r_edit_shortage_val").val(r_shortage_val);
            $("#r_edit_amt_due").val(r_amt_due);
            $("#r_edit_fuel_in_cash").val(r_fuel_in_cash);
        }
    });

    $(document).on("click", "#apply_trip_return", function () {

        var r_drID = $("#r_drID").val(),
            r_tkID = $("#r_tkID").val(),
            r_shortage = $("#r_shortage").val(),
            r_shortage_val = $("#r_shortage_val").val(),
            r_amt_due = $("#r_amt_due").val(),
            r_fuel_consumed = $("#r_fuel_consumed").val(),
            r_fuel_in_cash = $("#r_fuel_in_cash").val(),
            r_dDate = $("#r_dDate").val(),
            r_trip_id = $("#r_trip_id").val(),
            r_pay_due_kodson = $("#r_pay_due_kodson").val(),
            r_amt_recievable = $("#r_amt_recievable").val(),
            r_amt_recievable_surchage = $("#r_amt_recievable_surchage").val(),
            r_cash_paid_to_make_loss = $("#r_cash_paid_to_make_loss").val(),
            r_receipt_no = $("#r_receipt_no").val(),
            r_balance = $("#r_balance").val(),
            r_apply_return_trip = "return_trip";

        var notice = new PNotify({
            title: '<div class="ml-3 text-center"><i class = "icon-question3 icon-3x "></i></div>',
            text: '<p>Are You Sure You Want To Return This Trip?</p>',
            hide: false,
            type: 'info',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })

        notice.get().on('pnotify.confirm', function () {

            if (r_dDate == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Please Select Discharging Date',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_shortage == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Shortage Field Can Not Be Empty. Please Put A Zero(0) If No Shortage Should Be Applied',
                    addclass: 'bg-info border-info'
                });

                $("#r_shortage").css("border", "1px solid red");
                $("#r_shortage").css("box-shadox", "0 0 0 solid red");

                return false;

            } else if (r_fuel_consumed == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Fuel Consumed Field Can Not Be Empty. Please Put A Zero(0) If No Fuel Consumed Should Be Applied',
                    addclass: 'bg-info border-info'
                });

                $("#r_fuel_consumed").css("border", "1px solid red");
                $("#r_fuel_consumed").css("box-shadox", "0 0 0 solid red");

                return false;

            } else if (r_fuel_in_cash == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Fuel Consumed In Cash Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                $("#r_fuel_in_cash").css("border", "1px solid red");
                $("#r_fuel_in_cash").css("box-shadox", "0 0 0 solid red");

                return false;

            } else if (r_shortage_val == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Shortage Value Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                $("#r_shortage_val").css("border", "1px solid red");
                $("#r_shortage_val").css("box-shadox", "0 0 0 solid red");

                return false;

            } else if (r_amt_due == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Amount Due Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                $("#r_amt_due").css("border", "1px solid red");
                $("#r_amt_due").css("box-shadox", "0 0 0 solid red");

                return false;

            } else {

                $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                    r_r_drID: r_drID,
                    r_r_tkID: r_tkID,
                    r_r_trip_id: r_trip_id,
                    r_r_shortage: r_shortage,
                    r_r_shortage_val: r_shortage_val,
                    r_r_amt_due: r_amt_due,
                    r_r_fuel_consumed: r_fuel_consumed,
                    r_r_fuel_in_cash: r_fuel_in_cash,
                    r_r_dDate: r_dDate,
                    r_pay_due_kodson: r_pay_due_kodson,
                    r_amt_recievable: r_amt_recievable,
                    r_amt_recievable_surchage: r_amt_recievable_surchage,
                    r_cash_paid_to_make_loss: r_cash_paid_to_make_loss,
                    r_receipt_no: r_receipt_no,
                    r_balance: r_balance,
                    r_r_apply_return_trip: r_apply_return_trip
                }, function (r) {

                    var r = JSON.parse(r);
                    console.log(r);
                    if (r.vSkySuc) {

                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                            text: 'Trip Returned Successfully',
                            addclass: 'bg-success border-success'
                        });

                        setTimeout(redirect, 1000);

                    } else if (r.tripNun == "tripNun") {

                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-alert icon-3x "></i></div>',
                            text: 'Illegal Trip Passed',
                            addclass: 'bg-warning border-warning'
                        });

                    } else if (r.tripUpdateErr == "tripUpdateErr") {

                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-alert icon-3x "></i></div>',
                            text: 'Error Returning Trip',
                            addclass: 'bg-warning border-warning'
                        });

                    } else {
                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-alert icon-3x "></i></div>',
                            text: 'Error Returning Trip',
                            addclass: 'bg-warning border-warning'
                        });

                    }

                    function redirect() {
                        window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
                    }

                });

            }

        });

        // On cancel
        notice.get().on('pnotify.cancel', function () {
            new PNotify({
                title: 'INFO.!',
                text: 'Cancelled!',
                addclass: 'bg-info border-info'
            });
        });

    });

    $(document).on("click", "#apply_trip_r_edit", function () {

        var r_edit_trip_id = $("#r_edit_trip_id").val(),
            r_edit_drID = $("#r_edit_drID").val(),
            r_edit_dDate = $("#r_edit_dDate").val(),
            r_edit_shortage = $("#r_edit_shortage").val(),
            r_edit_shortage_val = $("#r_edit_shortage_val").val(),
            r_edit_amt_due = $("#r_edit_amt_due").val(),
            r_edit_fuel_consumed = $("#r_edit_fuel_consumed").val(),
            r_edit_fuel_in_cash = $("#r_edit_fuel_in_cash").val(),
            r_edit_pay_due_kodson = $("#r_edit_pay_due_kodson").val(),
            r_edit_amt_recievable = $("#r_edit_amt_recievable").val(),
            r_edit_amt_recievable_surcharg = $("#r_edit_amt_recievable_surcharg").val(),
            r_edit_cash_paid_to_make_loss = $("#r_edit_cash_paid_to_make_loss").val(),
            r_edit_receipt_no = $("#r_edit_receipt_no").val(),
            r_edit_balance = $("#r_edit_balance").val(),
            r_apply_return_trip = "return_trip_edit_update";

        var notice = new PNotify({
            title: '<div class="ml-3 text-center"><i class = "icon-question3 icon-3x "></i></div>',
            text: '<p>Are You Sure You Want To Update This Returned Trip?</p>',
            hide: false,
            type: 'info',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })

        notice.get().on('pnotify.confirm', function () {

            if (r_edit_dDate == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Please Select Discharging Date',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_edit_shortage == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Shortage Field Can Not Be Empty. Please Put A Zero(0) If No Shortage Should Be Applied',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_edit_fuel_consumed == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Fuel Consumed Field Can Not Be Empty. Please Put A Zero(0) If No Fuel Consumed Should Be Applied',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_edit_fuel_in_cash == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Fuel Consumed In Cash Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_edit_shortage_val == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Shortage Value Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else if (r_edit_amt_due == "") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Amount Due Field Can Not Be Empty. Please Put A Zero(0) In There',
                    addclass: 'bg-info border-info'
                });

                return false;

            } else {

                $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                    r_edit_trip_id_update: r_edit_trip_id,
                    r_edit_drID_update: r_edit_drID,
                    r_edit_dDate_update: r_edit_dDate,
                    r_edit_shortage_update: r_edit_shortage,
                    r_edit_shortage_val_update: r_edit_shortage_val,
                    r_edit_amt_due_update: r_edit_amt_due,
                    r_edit_fuel_consumed_update: r_edit_fuel_consumed,
                    r_edit_fuel_in_cash_update: r_edit_fuel_in_cash,
                    r_edit_pay_due_kodson_update: r_edit_pay_due_kodson,
                    r_edit_amt_recievable_update: r_edit_amt_recievable,
                    r_edit_amt_recievable_surcharg_update: r_edit_amt_recievable_surcharg,
                    r_edit_cash_paid_to_make_loss_update: r_edit_cash_paid_to_make_loss,
                    r_edit_receipt_no_update: r_edit_receipt_no,
                    r_edit_balance_update: r_edit_balance,
                    r_apply_return_trip: r_apply_return_trip
                }, function (r) {

                    var r = JSON.parse(r);
                    console.log(r);
                    if (r.vSkySuc) {

                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                            text: 'Returned Trip Updated Successfully',
                            addclass: 'bg-success border-success'
                        });

                        setTimeout(redirect, 1000);

                    } else if (r.tripNun == "tripNun") {

                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-alert icon-3x "></i></div>',
                            text: 'Illegal Trip Passed',
                            addclass: 'bg-warning border-warning'
                        });

                    } else {
                        new PNotify({
                            title: '<div class="ml-3 text-center"><i class = "icon-alert icon-3x "></i></div>',
                            text: 'Error Updating Returned Trip',
                            addclass: 'bg-warning border-warning'
                        });

                    }

                    function redirect() {
                        window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
                    }

                });

            }

        });

        // On cancel
        notice.get().on('pnotify.cancel', function () {
            new PNotify({
                title: 'INFO.!',
                text: 'Cancelled!',
                addclass: 'bg-info border-info'
            });
        });

    });

    $(document).on("change", "#mainCom_id_e", function () {
        var mainCom_id = $("#mainCom_id_e").val();

        if (mainCom_id == "e_sel") {
            return $("#subComSel_e").css("display", "none");
        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                mainCom_id: mainCom_id
            }, function (r) {
                var r = $("#subCom_id_e").html(r);
                $("#subComSel_e").css("display", "block");
            })
        }
    });

    $(document).on("change", "#e_l_d_pt", function () {

        var location_id = $("#e_l_d_pt").val();

        if (location_id == "e_l_dSel") {

            $("#e_distance").val("0");
            $("#e_rate").val("0");

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                location_id: location_id
            }, function (r) {
                var r = JSON.parse(r);
                console.log(r);
                if (r.vSkySuc) {
                    $("#e_distance").val(r.distance);
                    $("#e_rate").val(r.rate);
                } else {

                }
            })

        }

    });

    $(document).on("change", "#mainCom_id", function () {
        var mainCom_id = $("#mainCom_id").val();

        if (mainCom_id == "optMCom") {
            return $("#subComSel").css("display", "none");
        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                mainCom_id: mainCom_id
            }, function (r) {
                var r = $("#subCom_id").html(r);
                $("#subComSel").css("display", "block");
            })
        }
    });

    $(document).on("change", "#t_l_d_pt", function () {

        var location_id = $("#t_l_d_pt").val();

        if (location_id == "t_l_dSel") {

            $("#t_distance").val("0");
            $("#t_rate").val("0");

        } else {

            $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
                location_id: location_id
            }, function (r) {
                var r = JSON.parse(r);
                console.log(r);
                if (r.vSkySuc) {
                    $("#t_distance").val(r.distance);
                    $("#t_rate").val(r.rate);
                } else {

                }


            })

        }

    });

    $(document).on("click", "#amt_calculate", function () {
        var rate = $("#t_rate").val(),
            qty = $("#t_quantity").val();
        amt = 0;

        if (rate == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Rate Field Can Not Be Empty',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (qty == "") {

            $("#t_quantity").css("border", "1px solid red");
            $("#t_quantity").css("box-shadox", "0 0 0 solid red");

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Quantity Field Can Not Be Empty',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {
            amt = parseFloat(+qty) * parseFloat(+rate);
            $("#t_amount").val(parseFloat(amt).toFixed(2));
        }

    });

    $(document).on("click", "#amt_calculate_update", function () {
        var rate = $("#e_rate").val(),
            qty = $("#e_quantity").val();
        amt = 0;

        if (rate == "") {

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Rate Field Can Not Be Empty',
                addclass: 'bg-info border-info'
            });

            return false;

        } else if (qty == "") {

            $("#e_quantity").css("border", "1px solid red");
            $("#e_quantity").css("box-shadox", "0 0 0 solid red");

            new PNotify({
                title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                text: 'Quantity Field Can Not Be Empty',
                addclass: 'bg-info border-info'
            });

            return false;

        } else {
            amt = parseFloat(+qty) * parseFloat(+rate);
            $("#e_amount").val(parseFloat(amt).toFixed(2));
        }

    });

    $(document).on("click", "#save_chngs", function () {

        var select_val = $("#duration_select").val();

        $.post("/payroll/mainAdmin_assets/members_assets/process_backup_restore", {
            select_val: select_val
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Updated.',
                    addclass: 'bg-success border-success'
                });
                setTimeout(redirect, 1000);

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/members_assets/bk_re");
                }
            }
        });

    });

    $(document).on("click", "#add_u_btn", function () {
        var empsAvail = $("#empsAvail").val(),
            e_pwd = $("#e_pwd").val(),
            e_c_pwd = $("#e_c_pwd").val(),
            e_email = $("#e_email").val(),
            e_c_email = $("#e_c_email").val(),
            u_tS = $("#u_tS").val(),
            proce = "add_dem";

        $("i.u_icon").removeClass("icon-plus2").addClass("icon-spinner4 spinner");

        if (e_pwd == "") {

            new PNotify({
                title: 'INFO.!',
                text: 'Password Field Can Not Be Empty. Please Set A Default Password For The New User. He/She Will Be Able To Change It After You Have Added Him/Her',
                addclass: 'bg-info border-info'
            });

            $("#e_pwd").css("border", "2px solid red");
            $("#e_pwd").css("box-shadow", "0 0 0 1 solid red");

            $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

        } else if (e_c_pwd == "") {

            new PNotify({
                title: 'INFO.!',
                text: 'Confirm Password Field Can Not Be Empty',
                addclass: 'bg-info border-info'
            });

            $("#e_c_pwd").css("border", "2px solid red");
            $("#e_c_pwd").css("box-shadow", "0 0 0 1 solid red");

            $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

        } else if (e_c_pwd != e_pwd) {

            new PNotify({
                title: 'INFO.!',
                text: 'Password Do Not Match',
                addclass: 'bg-info border-info'
            });

            $("#e_pwd").css("border", "1px solid red");
            $("#e_c_pwd").css("border", "1px solid red");
            $("#e_pwd").css("box-shadow", "0 0 0 1 solid red");
            $("#e_c_pwd").css("box-shadow", "0 0 0 1 solid red");

            $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

        } else if (e_email != "" && (e_c_email != e_email)) {

            new PNotify({
                title: 'INFO.!',
                text: 'Email Address Do Not Match',
                addclass: 'bg-info border-info'
            });

            $("#e_email").css("border", "1px solid red");
            $("#e_c_email").css("border", "1px solid red");
            $("#e_email").css("box-shadow", "0 0 0 1 solid red");
            $("#e_c_email").css("box-shadow", "0 0 0 1 solid red");

            $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

        } else if (empsAvail === null) {

            new PNotify({
                title: 'INFO.!',
                text: 'Please Select Category New user Is In To Be Able To Get His/Her Name',
                addclass: 'bg-warning border-warning'
            });

            $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

        } else {

            $.post("/payroll/mainAdmin_assets/members_assets/includes/process_new_user", {
                empsAvail: empsAvail,
                e_pwd: e_pwd,
                e_c_pwd: e_c_pwd,
                e_email: e_email,
                e_c_email: e_c_email,
                u_tS: u_tS,
                proce: proce
            }, function (r) {
                var r = JSON.parse(r);
                if (r.vSkySuc == "true") {
                    new PNotify({
                        title: 'INFO.!',
                        text: 'New User Inserted',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                    function redirect() {
                        window.location.assign("/payroll/mainAdmin_assets/members_assets/add_u");
                    }

                } else if (r.pwd_err == "pwd_err") {
                    new PNotify({
                        title: 'INFO.!',
                        text: 'Passwords Do Not Match',
                        addclass: 'bg-info border-info'
                    });

                    $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

                } else if (r.vSkySuc == "false") {

                    new PNotify({
                        title: 'INFO.!',
                        text: 'Error Adding New User',
                        addclass: 'bg-warning border-warning'
                    });

                    $("i.u_icon").removeClass("icon-spinner4 spinner").addClass("icon-plus2");

                } else if (r.emp_id_err == "emp_id_err") {

                    new PNotify({
                        title: 'INFO.!',
                        text: 'Employee Not Found',
                        addclass: 'bg-warning border-warning'
                    });

                } else {

                    new PNotify({
                        title: 'INFO.!',
                        text: 'System Error Please Contact VB IT Consult Ltd For Support',
                        addclass: 'bg-warning border-warning'
                    });

                }
            })

        }

    });

    $(document).on("keydown", "#e_pwd, #e_c_pwd", function () {
        $("#e_pwd").css("border", "1px solid #dddddd");
        $("#e_c_pwd").css("border", "1px solid #dddddd");
        $("#e_pwd").css("box-shadow", "0 0 0 0 solid #dddddd");
        $("#e_c_pwd").css("box-shadow", "0 0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#e_email, #e_c_email", function () {
        $("#e_email").css("border", "1px solid #dddddd");
        $("#e_c_email").css("border", "1px solid #dddddd");
        $("#e_email").css("box-shadow", "0 0 0 0 solid #dddddd");
        $("#e_c_email").css("box-shadow", "0 0 0 0 solid #dddddd");
    });

    $(document).on("click", "#chnCat", function () {
        var catD = $("#chnCat").val(),
            process = "add_u";

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_new_user", {
            process: process,
            catD: catD
        }, function (r) {

            var t = $("#empsAvail").html(r);
            $("#empsFill").css("display", "block");

        });
    });

    $(document).on("click", "#empsAvail", function () {
        var emp_id_got = $("#empsAvail").val(),
            pro = "get_u";

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_new_user", {
            pro: pro,
            emp_id_got: emp_id_got
        }, function (r) {
            var r = JSON.parse(r);
            $("#e_department").val(r.dept_name);
            $("#e_position").val(r.pos_name);
        });
    });

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).on("click", "#getCatInfoss", function () {
        getCatall("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", "#selydCat", "#selCatName", "#totCatsSel", "#cat_idsd");
    });

    $(".catsel, #duration_select2, #catSelAdvice, #selydCat, #duration_select, .shortage, .report_com_name, .variable, .overNyt, #dPt, #other_dPt, #year_month, #dPt_arc").select2({
        width: 'resolve'
    });

    $(document).on("click", "#getCaInfosAdvice", function () {
        getCatall("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", "#catSelAdvice", "#selCatNameAdvice", "#totCatsSelAdvice", "#cat_idsdAdvice");
    });

    $(document).on("click", "#payslipBycat", function () {
        redirectURLAdvice("/payroll/mainAdmin_assets/members_assets/payroll/includes/regenByCat?", "#selCatName", "#totCatsSel", "#btCat", "#cat_idsd", "dDFp_d=", "&fdp_fdp=");
    });

    $(document).on("click", "#payslipBycatAdice", function () {
        redirectURLAdvice("/payroll/mainAdmin_assets/members_assets/payroll/includes/regenByCatAdvice?", "#selCatNameAdvice", "#totCatsSelAdvice", "#btCatAdvice", "#cat_idsdAdvice", "dDFp_d=", "&fdp_fdp=");
    });

    var redirectURLAdvice = function (a, b, c, d, e, g, h) {

        var selCatName = $(b).val(),
            totCatsSel = $(c).val(),
            btCatDate = $(d).val(),
            cat_idsd = $(e).val();

        var cat_date_encoded = btoa(btCatDate),
            cat_id_encoded = btoa(cat_idsd);

        u = a + g + cat_date_encoded + h + cat_id_encoded;

        window.open(u, "_blank");
    }

    var getCatall = function (q, el, el1_id, el2_id, el3_id) {
        var selVal = $(el).val();

        $.post(q, {
            selVal: selVal
        }, function (r) {
            var r = JSON.parse(r);
            $(el1_id).val(r.cat_na);
            $(el2_id).val(r.count);
            $(el3_id).val(r.cat_idsd);
        });
    }

    $("#tax_form_2").on("submit", function (e) {
        e.preventDefault();

        $("input[name='chrg_income']").each(function (r, t) {
            if (this.value == "") {
                new PNotify({
                    title: 'INFO...!',
                    text: 'Field At ' + (parseInt(r) + 1) + ' Can Not Be Empty',
                    addclass: 'bg-info border-info'
                });

                return false;
            }
        });

        var ar = [],
            ra = [],
            ids = [],
            tax = [],
            tax_cum = [];

        var form = document.getElementById("tax_form_2").elements,
            formLen = form.length;

        for (var i = 0; i < formLen; i++) {
            if (form[i].name == "") {

            } else {
                if (form[i].name == "chrg_income") {
                    var a = form[i].value;
                    ar.push(a);
                }

                if (form[i].name == "rates") {
                    var b = form[i].value;
                    ra.push(b);
                }

                if (form[i].name == "tax_cum") {
                    var b = form[i].value;
                    tax_cum.push(b);
                }

                if (form[i].name == "tax") {
                    var b = form[i].value;
                    var ida = form[i].id;
                    tax.push(b);
                    ids.push(ida);
                }
            }
        }

        //console.log(tax);


        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process",
            method: "POST",
            data: {
                produce: "produce",
                chrg_income: ar,
                rates: ra,
                tax_cum: tax_cum,
                tax: tax,
                ids: ids
            },
            success: function (data) {
                var data = JSON.parse(data);
                if (data.vSkySuc) {
                    new PNotify({
                        title: "Updated...",
                        text: "tax Tabled Successfully Updated",
                        addclass: "bg-success border-success"
                    });
                } else {
                    new PNotify({
                        title: "Error...",
                        text: "Error Updating Tax Tables",
                        addclass: "bg-warning border-warning"
                    });
                }
            }
        });
    });

    $(document).on("click", "#tax_calculator", function () {
        var ar = [],
            ra = [],
            ids = [],
            tax_cum = [];

        var form = document.getElementById("tax_form_2").elements,
            formLen = form.length;

        for (var i = 0; i < formLen; i++) {
            if (form[i].name == "") {

            } else {
                if (form[i].name == "chrg_income") {
                    var a = form[i].value;
                    ar.push(a);
                }

                if (form[i].name == "rates") {
                    var b = form[i].value;
                    ra.push(b);
                }

                if (form[i].name == "tax_cum") {
                    var b = form[i].value;
                    tax_cum.push(b);
                }

                if (form[i].name == "tax") {
                    var b = form[i].value;
                    var ida = form[i].id;
                    ids.push(ida);
                }
            }
        }

        var s = 0,
            sA = [],
            arlen = ar.length,
            m = 0,
            n = [],
            tempS = 0.00;

        for (var q = 0; q < arlen; q++) {

            s += parseFloat(ar[q]);
            m = (parseFloat(ra[q] / 100)) * ar[q];

            if (q == arlen - 1) {
                sA.push(tempS);
                n.push(tempS);
            } else {
                sA.push(s.toFixed(2));
                n.push(m);
            }

        }

        ids.forEach(function (w, z) {
            $("#row_" + w + ", input[name='tax']#" + w).val(n[z]);
            $("#row_" + w + ", input[name='tax_cum']#" + w).val(sA[z]);
        })
    });

    $(document).on("click", ".remv_row", function () {
        var rowID = $(this).attr("id");
        $("#row_" + rowID).remove();
    });

    $(document).on("click", ".add_row", function () {
        var x = $("#appen tr:last").attr("id");
        var subId = x.substr(x.length - 1);
        var count = +subId + 1;
        add_input_field(count);
    });

    function add_input_field(count) {
        var button = '';
        if (count < 9) {
            if (count > 1) {
                button = '<button type="button" name="remove_btn" id="' + count + '" class="btn btn-warning remv_row"><span id="remove_row_' + count + '" class="ladda-label labll"></span><i class="icon-minus3 ic ml-0"></i></button>';
            } else {
                button = '<button type="button" name="add_more" id="add_more" class="btn bg-blue add_row"><i class="icon-plus3 ic ml-0"></i></button>';
            }
            output = '<tr id="row_' + count + '">';
            output += '<td class="text-center"><input value="0" type="number" min="0" id="' + count + '" name="chrg_income" class="form-control text-center numbersonly-format" /></td>';
            output += '<td class="text-center"><input value="0" type="number" min="0" id="' + count + '" name="rates" class="form-control text-center numbersonly-format" /></td>';
            output += '<td class="text-center"><input value="0" type="number" min="0" id="' + count + '" readonly name="tax" class="form-control text-center numbersonly-format" /></td>';
            output += '<td class="text-center"><input value="0" type="number" min="0" id="' + count + '" readonly name="tax_cum" class="form-control text-center numbersonly-format" /></td>';
            output += '<td align="center">' + button + '</td></tr>';
            $('#tax_table3').append(output);
            count++;

        } else {
            new PNotify({
                title: 'Can Not Add More Row',
                text: 'Maximum Number Of Rows Reached',
                addclass: 'bg-info border-info'
            });
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).on("change", "#duration_select", function () {
        var select_val = $("#duration_select").val();
        // //console.log(select_val);
        if (select_val == 0) {
            $('#bk_btn').prop("disabled", true);
            $("#backUpStats").text("Never")
        } else if (select_val == 1) {
            $('#bk_btn').prop("disabled", false);
            $("#backUpStats").text("Only When I Tap 'Back up'")
        } else if (select_val == 2) {
            $('#bk_btn').prop("disabled", true);
            $("#backUpStats").text("Daily")
        } else if (select_val == 3) {
            $('#bk_btn').prop("disabled", true);
            $("#backUpStats").text("Weekly")
        }
    })

    $(document).on("click", "#b", function () {
        var n = $("#n").val(),
            p = $("#p").val();

        if (n == "") {
            new PNotify({
                title: 'INFO.!',
                text: 'User Name Field Cannot Be Empty',
                addclass: 'bg-info border-info'
            });
        } else if (p == "") {
            new PNotify({
                title: 'INFO.!',
                text: 'Password Field Cannot Be Empty',
                addclass: 'bg-info border-info'
            });
        } else {
            $("i.lgb").removeClass("icon-circle-right2").addClass("icon-spinner4 spinner");
            $("#lgspan").text("Signing in...");

            $.post("/payroll/mainAdmin_assets/members_assets/includes/process_logins", {
                n: n,
                p: p
            }, function (r) {
                var r = JSON.parse(r);
                //console.log(r);
                if (r.vSkySuc) {
                    $("i.lgb").removeClass("icon-spinner4 spinner").addClass("icon-checkmark3");
                    $("#lgspan").text("Successfull...");

                    window.location.assign("/payroll/mainAdmin_assets/dashboard");

                } else if (r.pwd_user_error == "pwd_user_error") {
                    $("i.lgb").removeClass("icon-spinner4 spinner").addClass("icon-circle-right2");
                    $("#lgspan").text("Sign in");

                    new PNotify({
                        title: 'INFO.!',
                        text: 'User Name Or Password Is Not Correct',
                        addclass: 'bg-info border-info'
                    });
                } else if (r.user_not_found == "user_not_found") {

                    $("i.lgb").removeClass("icon-spinner4 spinner").addClass("icon-circle-right2");
                    $("#lgspan").text("Sign in");

                    new PNotify({
                        title: 'INFO.!',
                        text: 'User Name Or Password Is Not Correct',
                        addclass: 'bg-warning border-warning'
                    });
                }



            });
        }
    })

    $(document).on("keydown", "#empBasicSal", function () {
        $("#empBasicSal").css("border", "1px solid #dddddd");
        $("#empBasicSal").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#e_quantity", function () {
        $("#e_quantity").css("border", "1px solid #dddddd");
        $("#e_quantity").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#r_shortage", function () {
        $("#r_shortage").css("border", "1px solid #dddddd");
        $("#r_shortage").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#r_fuel_consumed", function () {
        $("#r_fuel_consumed").css("border", "1px solid #dddddd");
        $("#r_fuel_consumed").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#r_fuel_in_cash", function () {
        $("#r_fuel_in_cash").css("border", "1px solid #dddddd");
        $("#r_fuel_in_cash").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#r_shortage_val", function () {
        $("#r_shortage_val").css("border", "1px solid #dddddd");
        $("#r_shortage_val").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#r_amt_due", function () {
        $("#r_amt_due").css("border", "1px solid #dddddd");
        $("#r_amt_due").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#loadingPtName", function () {
        $("#loadingPtName").css("border", "1px solid #dddddd");
        $("#loadingPtName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#dischargingPtName", function () {
        $("#dischargingPtName").css("border", "1px solid #dddddd");
        $("#dischargingPtName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#editloadingPtName", function () {
        $("#editloadingPtName").css("border", "1px solid #dddddd");
        $("#editloadingPtName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#t_product", function () {
        $("#t_product").css("border", "1px solid #dddddd");
        $("#t_product").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#editdischargingPtName", function () {
        $("#editdischargingPtName").css("border", "1px solid #dddddd");
        $("#editdischargingPtName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#comName", function () {
        $("#comName").css("border", "1px solid #dddddd");
        $("#comName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#vSkyComName", function () {
        $("#vSkyComName").css("border", "1px solid #dddddd");
        $("#vSkyComName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#vSkySubComName", function () {
        $("#vSkySubComName").css("border", "1px solid #dddddd");
        $("#vSkySubComName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#vSkyEditSubComName", function () {
        $("#vSkyEditSubComName").css("border", "1px solid #dddddd");
        $("#vSkyEditSubComName").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#t_quantity", function () {
        $("#t_quantity").css("border", "1px solid #dddddd");
        $("#t_quantity").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $(document).on("keydown", "#t_waybill", function () {
        $("#t_waybill").css("border", "1px solid #dddddd");
        $("#t_waybill").css("box-shadow", "0 0 0 solid #dddddd");
    });

    $("#vSkyDebtbdd, #vSkyCurLoanSur, #vSkyDebtSal, #vSkyBalawtSal, #vSkyTotDucSal").on("click", function () {
        new PNotify({
            title: 'INFO.!',
            text: 'You Can Not Edit This Here Check The (Debts / Loans / Surcharges / Deductions Tab) For The Required Action',
            addclass: 'bg-info border-info'
        });
    });

    $("#vSkyAllow, #vSkyGrossSal, #vSkyBideduc, #vSkyNetSal, #vSkyNetSalPay, #vSkyTaxableSal, #vSkyTotStatDuc").on("click", function () {
        new PNotify({
            title: 'INFO.!',
            text: 'You Can Not Edit This Here Check The (Payroll -> View payroll Tab) For The Required Action',
            addclass: 'bg-info border-info'
        });
    });

    $("#vSkyEmpSsf, #vSkyEmplerSsf").on("click", function () {
        new PNotify({
            title: 'INFO.!',
            text: 'You Can Not Edit This Here Check The ( Settings -> Tax Settings Tab) For The Required Action',
            addclass: 'bg-info border-info'
        });
    });

    $("#emp_perc").on("keyup", function () {
        var emper_perc = $("#emp_perc").val();
        var _emp_perc_ = $("#emplyer_perc").val();
        var results = emper_perc / percentage;
        $("#emp_perc_result").val(results);

        if (emper_perc != '' && _emp_perc_ != '') {
            var total = parseFloat(emper_perc) + parseFloat(_emp_perc_);
            $("#tax_Perc_total").val(total + "%");
        } else if (_emp_perc_ == '' && emper_perc != '') {
            $("#tax_Perc_total").val(parseFloat(emper_perc) + "%");
        } else if (emper_perc == '' && _emp_perc_ != '') {
            $("#tax_Perc_total").val(parseFloat(_emp_perc_) + "%");
        } else if (emper_perc == '' && _emp_perc_ == '') {
            $("#tax_Perc_total").val(parseFloat(0));

        }
    })

    $("#emplyer_perc").on("keyup", function () {
        var _emp_perc_ = $("#emp_perc").val();
        var emp_perc = $("#emplyer_perc").val();
        var results = emp_perc / percentage;
        $("#emplyer_perc_result").val(results);

        if (emp_perc != '' && _emp_perc_ != '') {
            var total = parseFloat(emp_perc) + parseFloat(_emp_perc_);
            $("#tax_Perc_total").val(total + "%");
        } else if (_emp_perc_ == '' && emp_perc != '') {
            $("#tax_Perc_total").val(parseFloat(emp_perc) + "%");
        } else if (_emp_perc_ != '' && emp_perc == '') {
            $("#tax_Perc_total").val(parseFloat(_emp_perc_) + "%");
        } else if (emp_perc == '' && _emp_perc_ == '') {
            $("#tax_Perc_total").val(parseFloat(0));
        }
    })
    //////////////////////////////////////////// edit ///////////////////////////////////////
    $("#edit_emp").on("keyup", function () {
        var emper_perc = $("#edit_emp").val();
        var _emp_perc_ = $("#empler_edit").val();
        var results = emper_perc / percentage;
        $("#edit_emp_converted").val(results);

        if (emper_perc != '' && _emp_perc_ != '') {
            var total = parseFloat(emper_perc) + parseFloat(_emp_perc_);
            $("#edit_total").val(total + "%");
        } else if (_emp_perc_ == '' && emper_perc != '') {
            $("#edit_total").val(parseFloat(emper_perc) + "%");
        } else if (emper_perc == '' && _emp_perc_ != '') {
            $("#edit_total").val(parseFloat(_emp_perc_) + "%");
        } else if (emper_perc == '' && _emp_perc_ == '') {
            $("#edit_total").val(parseFloat(0));

        }
    })

    $("#empler_edit").on("keyup", function () {
        var _emp_perc_ = $("#edit_emp").val();
        var emp_perc = $("#empler_edit").val();
        var results = emp_perc / percentage;
        $("#edit_empler_convert").val(results);

        if (emp_perc != '' && _emp_perc_ != '') {
            var total = parseFloat(emp_perc) + parseFloat(_emp_perc_);
            $("#edit_total").val(total + "%");
        } else if (_emp_perc_ == '' && emp_perc != '') {
            $("#edit_total").val(parseFloat(emp_perc) + "%");
        } else if (_emp_perc_ != '' && emp_perc == '') {
            $("#edit_total").val(parseFloat(_emp_perc_) + "%");
        } else if (emp_perc == '' && _emp_perc_ == '') {
            $("#edit_total").val(parseFloat(0));
        }
    })

    $("#vSkymainCatSelectsRule").on("change", function () {
        var catVal = $("#vSkymainCatSelectsRule").val();
        $("#vSkyEmpDbMainCatId").val(catVal);
    });

    $("#vSkydepartmentRule").on("change", function () {
        var deptVal = $("#vSkydepartmentRule").val();
        $("#vSkyEmpDbDeptId").val(deptVal);
    });

    $("#vSkypositionRule").on("change", function () {
        var posVal = $("#vSkypositionRule").val();
        $("#vSkyEmpDbPosId").val(posVal);
    });

    ////////////////////////////////////////////BVOs ////////////////////////////////////////////////    

    $("#vSkyBasSal").on("keyup", function () {
        var basic = parseFloat($("#vSkyBasSal").val());
        var tax = $('input[name=tax]:checked', '#sal_form').val();
        if (tax == undefined) {
            tax = 0;
            $(".percen").text(tax * percentage);
        } else if (tax == "emp") {
            tax = "emp";

            $.post("/payroll/mainAdmin_assets/members_assets/includes/process_sal_default_rules", {
                tax_emp: tax
            }, function (r) {
                var r = JSON.parse(r);
                var employee = r.emp_tax_db;
                $(".percen").text(employee * percentage);

            });


        } else if (tax == "empler") {
            tax = "empler";

            $.post("/payroll/mainAdmin_assets/members_assets/includes/process_sal_default_rules", {
                tax_empler: tax
            }, function (r) {
                var r = JSON.parse(r);
                //console.log(r);
                var employer = r.empler_tax_db;
                $(".percen").text(employer * percentage);
            });
        }
    })
    ////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////// allow gross and allowance /////////////////////////////
    $("#allow_gross").on("click", function () {
        var nor = $("#noww").val();
        if (nor == 0) {
            $("#noww").val("1");
            $("#vSkyGrossSal").prop("disabled", false);
            $("#vSkyAllow").prop("disabled", false);
            $("i.unlck").removeClass("icon-lock").addClass("icon-unlocked");
            $("#isOn").text("Click To Disable (Allowance And Gross Salary)")
        } else {
            $("#noww").val("0");
            $("#vSkyGrossSal").prop("disabled", true);
            $("#vSkyAllow").prop("disabled", true);
            $("i.unlck").removeClass("icon-unlocked").addClass("icon-lock");
            $("#isOn").text("Click To Enable (Allowance And Gross Salary)");
        }
    });
    ///////////////////// allow gross and allowance ///////////////////////////// 

    $("#toggle_tables").on("click", function () {
        var tog_val = $("#toggle_val").val();
        if (tog_val == 0) {
            $("#toggle_val").val("1");
            $("#employees_list").fadeIn("slow").css("display", "table");
            $("#current_debs").fadeOut("slow").css("display", "none");
            $("#previous_debs").fadeOut("fast").css("display", "none");
            $("#cat_field_hide").fadeIn("fast").css("display", "contents");
        } else if (tog_val == 1) {
            $("#toggle_val").val("2");
            $("#employees_list").fadeOut("fast").css("display", "none");
            $("#current_debs").fadeIn("slow").css("display", "table");
            $("#previous_debs").fadeOut("fast").css("display", "none");
            $("#cat_field_hide").fadeOut("fast").css("display", "none");

        } else if (tog_val == 2) {
            $("#toggle_val").val("0");
            $("#employees_list").fadeOut("slow").css("display", "none");
            $("#current_debs").fadeOut("fast").css("display", "none");
            $("#previous_debs").fadeIn("slow").css("display", "table");
            $("#cat_field_hide").fadeIn("fast").css("display", "none");
        }
    });

    $("#toggle_tables_trip").on("click", function () {
        var tog_val = $("#toggle_val_trip").val();
        if (tog_val == 0) {
            $("#toggle_val_trip").val("1");
            $("#current_trips_list").fadeIn("slow").css("display", "table");
            $("#trip_history").fadeOut("fast").css("display", "none");
            $("#dr_field_hide").fadeIn("fast").css("display", "contents");
            $("#mv_to_history").fadeOut("slow").css("display", "none");
        } else if (tog_val == 1) {
            $("#toggle_val_trip").val("0");
            $("#current_trips_list").fadeOut("slow").css("display", "none");
            $("#mv_to_history").fadeIn("slow").css("display", "contents");
            $("#trip_history").fadeIn("slow").css("display", "table");
            $("#dr_field_hide").fadeIn("fast").css("display", "none");
        }
    });

    $("#genBasic").on("keyup", function () {
        var genbasic = $("#genBasic").val(),
            genPaye = $("#genPaye").val();
        if (genPaye == "") {
            $("#genPaye").val(0);
        }

        getIDvalues();
    });

    $("#genPaye").on("keyup", function () {
        var genbasic = $("#genBasic").val(),
            genPaye = $("#genPaye").val();
        if (genbasic == "") {
            $("#genBasic").val(0);
        } else if (genPaye == "") {
            $("#genPaye").val("0");
        }
        getIDvalues();
    });
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function getIDvalues() {
        var genbasic = $("#genBasic").val(),
            genCatID = $("#genCatID").val(),
            genTaxable = $("#genTaxableS").val(),
            genSFFL = $("#genSSFl").val(),
            genSSFP = $("#genSSFP").val(),
            genPaye = $("#genPaye").val(),
            genEmpP = $("#genEmpP").text(),
            genEmplerP = $("#genEmplerP").text(),
            genBeforeDeductions = $("#genBeforOdaDeduc").val(),
            genStatDeduc = $("#genStatDeduc").val(),
            memberTax = $('input[name=tax]:checked', '#gen_form').val(),
            taxPerc = 100;


        genAllPay(genCatID, genbasic, genTaxable, genSFFL, genSSFP, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
    }

    function genAllPay(genCatID, genbasic, genTaxable, genSFFL, genSSFP, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc) {

        vSkyEmpSsf = parseFloat(parseFloat(genbasic) * (genEmpP / taxPerc)).toFixed(2);
        vSkyEmplerSsf = parseFloat(parseFloat(genbasic) * (genEmplerP / taxPerc)).toFixed(2);
        vSkyEmpZeroSsf = parseFloat(parseFloat(genbasic) * (0 / taxPerc)).toFixed(2);

        if ((genCatID == 4 || genCatID == 3)) {
            switch (memberTax) {
                case "emp":
                    console.log("1");
                    genFuc(vSkyEmpSsf, vSkyEmplerSsf, vSkyEmpZeroSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
                case "empler":
                    console.log("2");
                    genFuc(vSkyEmplerSsf, vSkyEmplerSsf, vSkyEmpZeroSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
                case undefined:
                    console.log("3");
                    vSkyEmpSsf = 0;
                    vSkyEmplerSsf = 0;
                    vSkyEmpZeroSsf = 0;
                    genFuc(vSkyEmpZeroSsf, vSkyEmplerSsf, vSkyEmpSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
            }
        } else if ((genCatID != 4 || genCatID != 3)) {
            switch (memberTax) {
                case "emp":
                    console.log("4");
                    genFuc(vSkyEmpSsf, vSkyEmplerSsf, vSkyEmpZeroSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
                    break;
                case "empler":
                    console.log("5");

                    genFuc(vSkyEmplerSsf, vSkyEmplerSsf, vSkyEmpZeroSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
                case undefined:
                    console.log("6");
                    vSkyEmpSsf = 0;
                    vSkyEmplerSsf = 0;
                    vSkyEmpZeroSsf = 0;
                    genFuc(vSkyEmpZeroSsf, vSkyEmplerSsf, vSkyEmpSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc);
                    break;
            }
        }

    }

    function genFuc(vSkySsf, vSkyEmplerSsf, vSkyEmpZeroSsf, genCatID, genbasic, genTaxable, genPaye, genBeforeDeductions, genEmpP, genEmplerP, memberTax, taxPerc, genStatDeduc) {

        genStatDeduc = parseFloat(parseFloat(vSkySsf) + parseFloat(genPaye)).toFixed(2);

        if (genbasic == "") {
            vSkySsf = 0;
            vSkyEmplerSsf = 0;
            vSkyEmpSsf = 0;
            vSkyEmpZeroSsf = 0;
            genStatDeduc = parseFloat(parseFloat(vSkySsf) + parseFloat(genPaye)).toFixed(2);

            var tempBasic = 0;
            if (genCatID == 2 || genCatID == 4 || genCatID == 1) {
                genTaxable = parseFloat(parseFloat(tempBasic) - parseFloat(vSkySsf)).toFixed(2);
            } else if (genCatID == 3 || genCatID == 5 || genCatID == 6) {
                genTaxable = parseFloat(parseFloat(tempBasic) + parseFloat(vSkySsf)).toFixed(2);
            }

            if (genCatID == 1 || genCatID == 2) {
                genBeforeDeductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkySsf) + parseFloat(genPaye))).toFixed(2);
            } else {
                genBeforeDeductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkySsf) - parseFloat(genPaye))).toFixed(2);
            }

        } else {

            if (genCatID == 2 || genCatID == 4 || genCatID == 1) {
                genTaxable = parseFloat(parseFloat(genbasic) - parseFloat(vSkySsf)).toFixed(2);
            } else if (genCatID == 3 || genCatID == 5 || genCatID == 6) {
                genTaxable = parseFloat(parseFloat(genbasic) + parseFloat(vSkySsf)).toFixed(2);
            }

            if (genCatID == 1 || genCatID == 2) {
                genBeforeDeductions = parseFloat(parseFloat(genbasic) - (parseFloat(vSkySsf) + parseFloat(genPaye))).toFixed(2);
                console.log("1");
            } else {
                genBeforeDeductions = parseFloat(parseFloat(genbasic) - parseFloat(vSkySsf) - parseFloat(genPaye)).toFixed(2);
                console.log("2");
            }
        }

        if (memberTax == "emp") {
            $("input[name=tax][value='emp']").prop("checked", true);
            $("input[name=tax][value='empler']").prop("checked", false);
        } else if (memberTax == "empler") {
            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", true);
        } else if (memberTax == undefined) {
            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", false);
        }

        $("#genbasic").val(genbasic);
        $("#genPaye").val(genPaye);
        $("#genTaxableS").val(genTaxable);
        $("#genStatDeduc").val(genStatDeduc);
        $("#genSSFl").val(vSkyEmplerSsf);
        $("#genSSFP").val(vSkyEmpSsf);
        $("#genBeforOdaDeduc").val(genBeforeDeductions);
    }

    // Dynamic loader
    $(document).on('click', '#gem_senior_staff', function () {
        var percent = 0;
        var notice = new PNotify({
            text: "Please wait",
            addclass: 'bg-primary border-primary',
            type: 'info',
            icon: 'icon-spinner4 spinner',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            opacity: .9,
            width: "430px"
        });

        setTimeout(function () {
            notice.update({
                title: "Generating Slips For All Senior Staffs"
            });
            var interval = setInterval(function () {
                percent += 1;
                var options = {
                    text: percent + "% Complete..."
                };
                if (percent == 30) {
                    options.title = "A little Bit Of Patience Almost There";
                    options.addclass = "bg-info border-info";
                    options.type = "info";
                    options.opacity = 1;
                }
                if (percent == 70) options.title = "Page Will Be Redirected To Confirm All Calculations";
                if (percent >= 100) {
                    window.clearInterval(interval);
                    options.title = "Done!";
                    options.addclass = "bg-success border-success";
                    options.type = "success";
                    options.hide = true;
                    options.buttons = {
                        closer: true,
                        sticker: true
                    };
                    options.icon = 'icon-checkmark3';
                    options.opacity = 1;
                    options.width = PNotify.prototype.options.width;
                }
                notice.update(options);
            }, 120);
        }, 2000);
    });

    $(document).on('click', '#main_generate_payroll', function () {
        var lat_encoded;

        $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
            chk_avail: "chk_avail"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

                var notice = new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-question3 icon-3x "></i></div>',
                    text: '<p>Are you sure you want to Generate new Sheet? Changes can not be reverted!!!</p>',
                    hide: false,
                    type: 'error',
                    confirm: {
                        confirm: true,
                        buttons: [
                            {
                                text: 'Yes',
                                addClass: 'btn btn-sm btn-primary'
                    },
                            {
                                addClass: 'btn btn-sm btn-link'
                    }
                ]
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                })


                notice.get().on('pnotify.confirm', function () {

                    var percent = 0;

                    var notice = new PNotify({
                        text: "Please wait",
                        addclass: 'bg-primary border-primary',
                        type: 'info',
                        icon: 'icon-spinner4 spinner',
                        hide: false,
                        buttons: {
                            closer: false,
                            sticker: false
                        },
                        opacity: .9,
                        width: "430px"
                    });

                    setTimeout(function () {
                        notice.update({
                            title: "Generating New Payroll Sheet From The Currently Proccessed Infos."
                        });
                        var interval = setInterval(function () {
                            percent += 1;
                            var options = {
                                text: percent + "% Complete..."
                            };
                            if (percent == 20) {
                                options.title = "A little Bit Of Patience! Almost There";
                                options.addclass = "bg-info border-info";
                                options.type = "info";
                                options.opacity = 1;
                            }
                            if (percent == 36) {
                                options.icon = "icon-spinner9 spinner";
                                options.title = "Checking All Calculations";
                                //AJAX Request
                                $.ajax({
                                    url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
                                    type: "POST",
                                    data: {
                                        action: "proceed_generation"
                                    },
                                    success: function (r) {
                                        console.dir(r);
                                        var r = JSON.parse(r);
                                        if (r.vSkySuc) {
                                            $.ajax({
                                                url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
                                                type: "POST",
                                                data: {
                                                    idsUpdate: r.idsUpdate,
                                                    for_debts: r.for_debts
                                                },
                                                success: function (q) {
                                                    var q = JSON.parse(q);
                                                    console.log(q)
                                                    if (q.vSkySuc) {

                                                        $.ajax({
                                                            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
                                                            type: "POST",
                                                            data: {
                                                                idsnowNow: q.debts,
                                                                cat_ids_now: q.cat_id
                                                            },
                                                            success: function (w) {
                                                                var w = JSON.parse(w);

                                                                var cat_id = w.cat_id;
                                                                var lat_encoded = btoa(cat_id);
                                                            }
                                                        });
                                                    }
                                                }
                                            });

                                        } else {

                                            window.clearInterval(interval);
                                            options.title = "Error Processing Data!";
                                            options.addclass = "bg-danger border-danger";
                                            options.type = "danger";
                                            options.hide = true;
                                            options.buttons = {
                                                closer: true,
                                                sticker: true
                                            };
                                            options.icon = 'icon-x';
                                            options.opacity = 1;
                                            options.width = PNotify.prototype.options.width;
                                            notice.update(options);
                                            return false;
                                        }
                                    }
                                });

                            }
                            if (percent == 70) {
                                options.icon = "icon-spinner4 spinner";
                                options.title = "Page Will Be Refreshed To Enable You Print";
                            }
                            if (percent >= 100) {
                                window.clearInterval(interval);
                                options.title = "Done!";
                                options.addclass = "bg-success border-success";
                                options.type = "success";
                                options.hide = true;
                                options.buttons = {
                                    closer: true,
                                    sticker: true
                                };
                                options.icon = 'icon-checkmark3';
                                options.opacity = 1;
                                options.width = PNotify.prototype.options.width;

                                setTimeout(redirect, 1000);

                                function redirect() {
                                    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/includes/g_p_r?sky=" + lat_encoded);
                                }
                            }
                            notice.update(options);
                        }, 420);
                    }, 2000);

                })
                // On cancel
                notice.get().on('pnotify.cancel', function () {

                });

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
            } else {
                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'PLease Start The Generation Of Payroll By Selecting Category From The Drop Down On Your Left View And Click On "Click To Proceed" To Do All Calculations.',
                    addclass: 'bg-info border-info'
                });
            }


        });
    });

    $(document).on('click', '#move_to_history_btn', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
            chk_avail: "chk_avail"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

                var notice = new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-question3 icon-3x "></i></div>',
                    text: '<p>Are you sure you want to move all current returned trips to history? Changes can not be reverted!!!</p>',
                    hide: false,
                    type: 'error',
                    confirm: {
                        confirm: true,
                        buttons: [
                            {
                                text: 'Yes',
                                addClass: 'btn btn-sm btn-primary'
                    },
                            {
                                addClass: 'btn btn-sm btn-link'
                    }
                ]
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                })


                notice.get().on('pnotify.confirm', function () {

                    var percent = 0;

                    var notice = new PNotify({
                        text: "Please wait",
                        addclass: 'bg-primary border-primary',
                        type: 'info',
                        icon: 'icon-spinner4 spinner',
                        hide: false,
                        buttons: {
                            closer: false,
                            sticker: false
                        },
                        opacity: .9,
                        width: "430px"
                    });

                    setTimeout(function () {
                        notice.update({
                            title: "Preparing Returned Trips."
                        });
                        var interval = setInterval(function () {
                            percent += 1;
                            var options = {
                                text: percent + "% Complete..."
                            };
                            if (percent == 20) {
                                options.title = "A little Bit Of Patience! Almost There";
                                options.addclass = "bg-info border-info";
                                options.type = "info";
                                options.opacity = 1;
                            }
                            if (percent == 36) {
                                options.icon = "icon-spinner9 spinner";
                                options.title = "Moving All Returned Trips";
                                //AJAX Request
                                $.ajax({
                                    url: "/payroll/mainAdmin_assets/c_members_assets/includes/process_trips",
                                    type: "POST",
                                    data: {
                                        proceed_action: "proceed_movement"
                                    },
                                    success: function (r) {
                                        console.dir(r);
                                        var r = JSON.parse(r);
                                        if (r.vSkySuc) {

                                            options.icon = "icon-spinner9 spinner";
                                            options.title = "Cleared Current Trips Table";

                                        } else {

                                            window.clearInterval(interval);
                                            options.title = "Error Processing Data!";
                                            options.addclass = "bg-danger border-danger";
                                            options.type = "danger";
                                            options.hide = true;
                                            options.buttons = {
                                                closer: true,
                                                sticker: true
                                            };
                                            options.icon = 'icon-x';
                                            options.opacity = 1;
                                            options.width = PNotify.prototype.options.width;
                                            notice.update(options);
                                            return false;
                                        }
                                    }
                                });

                            }
                            if (percent >= 100) {
                                window.clearInterval(interval);
                                options.title = "Done!";
                                options.addclass = "bg-success border-success";
                                options.type = "success";
                                options.hide = true;
                                options.buttons = {
                                    closer: true,
                                    sticker: true
                                };
                                options.icon = 'icon-checkmark3';
                                options.opacity = 1;
                                options.width = PNotify.prototype.options.width;

                                setTimeout(redirect, 1000);

                                function redirect() {
                                    window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
                                }
                            }
                            notice.update(options);
                        }, 420);
                    }, 2000);

                })
                // On cancel
                notice.get().on('pnotify.cancel', function () {

                });

                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
            } else {
                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'No Returned Trips Found',
                    addclass: 'bg-info border-info'
                });
            }


        });
    });

})
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function backupDB() {
    var bk = "back_up";

    $("i.back_up").removeClass("icon-download").addClass("icon-spinner4 spinner");
    $("#backUP").text("Backing up...");

    $.post("/payroll/mainAdmin_assets/members_assets/process_backup_restore", {
        bk: bk
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            new PNotify({
                title: 'INFO.!',
                text: 'Successfully Backedup..',
                addclass: 'bg-info border-info'
            });
            $("i.back_up").removeClass("icon-spinner4 spinner").addClass("icon-download");
            $("#backUP").text("Backup");
        }
    });
}

function update_pwd(pwd_id) {
    var usd = $("#usd").val(),
        curl_pwd = $("#curl_pwd").val(),
        new_pwd = $("#new_pwd").val(),
        repeat_pwd = $("#repeat_pwd").val(),
        pd_id = pwd_id;
    if (usd == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'User Name Needed',
            addclass: 'bg-warning border-warning'
        });
        return false;
    } else if (curl_pwd == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'Current Password Needed',
            addclass: 'bg-warning border-warning'
        });
        return false;
    } else if (new_pwd == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'New Password Cannot Be Empty',
            addclass: 'bg-warning border-warning'
        });
        return false;
    } else if (repeat_pwd == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'Repeat Password Cannot Be Empty',
            addclass: 'bg-warning border-warning'
        });
        return false;
    } else if (new_pwd != repeat_pwd) {
        new PNotify({
            title: 'INFO.!',
            text: 'New Password And Repeat Password Do Not Match',
            addclass: 'bg-warning border-warning'
        });
        return false;
    } else {
        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_user", {
            usd: usd,
            curl_pwd: curl_pwd,
            new_pwd: new_pwd,
            repeat_pwd: repeat_pwd,
            pd_id: pd_id
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Updated Successfully',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/members_assets/account_setting");
                }


            } else if (r.curlPwdNtMatch == "curlPwdNtMatch") {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Current Password Does Not Match With The Old One',
                    addclass: 'bg-warning border-warning'
                });

            } else if (r.new_pwd_not_match == "new_pwd_not_match") {
                new PNotify({
                    title: 'INFO.!',
                    text: 'New Password And Repeat Password Do Not Match',
                    addclass: 'bg-warning border-warning'
                });

            }
        });
        return true;
    }
}

function acDel(sffID) {
    var ssFIDDS = sffID,
        activate_ssf = "activate_ssf";

    $.post("/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process", {
        ssFIDDS: ssFIDDS,
        activate_ssf: activate_ssf
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            new PNotify({
                title: 'ACTIVATED!',
                text: 'ACTIVATED!',
                addclass: 'bg-info border-info'
            });

            setTimeout(redirect, 1000);

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/members_assets/tax/tax_set");
            }

        }
    });
}

////////////////////////////////////////////Main Processing of payslip calculations ////////////////////////////////

function process_remaining(cat_id_id) {
    var cat_id_id = cat_id_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to Generate new Sheet? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        var percent = 0;

        var notice = new PNotify({
            text: "Please wait",
            addclass: 'bg-primary border-primary',
            type: 'info',
            icon: 'icon-spinner4 spinner',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            },
            opacity: .9,
            width: "430px"
        });

        setTimeout(function () {
            notice.update({
                title: "Applying All Necessary Formulars"
            });
            var interval = setInterval(function () {
                percent += 1;
                var options = {
                    text: percent + "% Complete..."
                };
                if (percent == 20) {
                    options.title = "A little Bit Of Patience! Almost There";
                    options.addclass = "bg-info border-info";
                    options.type = "info";
                    options.opacity = 1;
                }
                if (percent == 30) {
                    options.icon = "icon-spinner9 spinner";
                    options.title = "Applying Calculations Based On the Previous Values";
                    // AJAX Request
                }
                if (percent == 70) {
                    options.icon = "icon-spinner4 spinner";
                    options.title = "Page Will Be Refreshed To Display All New Values in The Table Below";
                }
                if (percent >= 100) {
                    window.clearInterval(interval);
                    options.title = "Done!";
                    options.addclass = "bg-success border-success";
                    options.type = "success";
                    options.hide = true;
                    options.buttons = {
                        closer: true,
                        sticker: true
                    };
                    options.icon = 'icon-checkmark3';
                    options.opacity = 1;
                    options.width = PNotify.prototype.options.width;

                    $.ajax({
                        url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
                        type: "POST",
                        data: {
                            cat_id_id: cat_id_id
                        },
                        success: function (r) {
                            console.dir(r);
                            var r = JSON.parse(r);

                            var cat_id = r.cat_id;
                            var lat_encoded = btoa(cat_id);

                            setTimeout(redirect, 1000);

                            function redirect() {
                                window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/gen_by_cat?__c_g_=" + lat_encoded);
                            }

                        }
                    });

                }
                notice.update(options);
            }, 120);
        }, 2000);

    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {

    });
}
///////////////////////////////////////////////////////////////////////////////////////////////
function del_next_pay(id, cat_id) {
    var chkchkchkID = id;
    var chkchkcat_id = cat_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.delempnw" + chkchkchkID).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
            type: 'POST',
            data: {
                chkchkchkID: chkchkchkID,
                chkchkcat_id: chkchkcat_id,
                del: 'del'
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkySuc) {

                    $("i.delempnw" + chkchkchkID).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
                var cat_id = r.cat_id;
                var lat_encoded = btoa(cat_id);

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/gen_by_cat?__c_g_=" + lat_encoded);
                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });


}

function processgetEdit_vals() {
    ////////////////////////////////////////////////////////////////////////    
    var vSkyempIDD = $("#eempID").val(),
        vSkyempBasicSalary = $("#eempbasic").val(),
        vSkyempDebtBalance = $("#eempDebtBal").val(),
        vSkyempPaye = $("#eempPaye").val(),
        vSkyempBicycleDeduction = $("#eempBicyc").val(),
        vSkyempNetSalary = $("#eempNetSal").val(),
        vSkyemNetSalaryPayable = $("#eempNetSalPay").val(),
        vSkyempTaxableSalary = $("#eempTaxableS").val(),
        vSkyempTotalStatutoryDeductions = $("#eempStatuDeduc").val(),
        vSkyempCurrentLoan = $("#eempCurLoanSur").val(),
        vSkyempTotalDebt = $("#eempTotDebt").val(),
        vSkyempDeductions = $("#eempDeduct").val(),
        vSkyempBalanceOutStanding = $("#eempBlaAwt").val(),
        vSkyempTotalDeductions = $("#eempTotDeduc").val(),
        vSkyeempBeforOdaDeduc = $("#eempBeforOdaDeduc").val(),
        vSkyeempAdjust = $("#eempAdjust").val(),
        vSkyempSsf = $("#eempSSFP").val(),
        vSkyemplerSsf = $("#eempSSFl").val(),
        vSkyTaxEmp = $("#taxEmpP").text(),
        vSkyTaxEmpler = $("#taxEmplerP").text(),
        taxPerc = 100,
        memberTax = $('input[name=tax]:checked', '#edit_payslip').val(),
        ///////////////////////////////////////////////////////////////////////////////
        vSkyempPosID = $("#eempPosID").val(),
        vSkyempDeptID = $("#eempDeptID").val(),
        vSkyempMainCatID = $("#eempCatID").val();
    // calledAt = "preEditCal";
    ///////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////

    if (vSkyempBasicSalary != "") {

        if (parseFloat(vSkyempBasicSalary) > 0) {

            if (parseFloat(vSkyempDeductions) < parseFloat(vSkyempBasicSalary)) {

                edit_getval(vSkyempBasicSalary, vSkyTaxEmp, taxPerc, vSkyTaxEmpler, vSkyempMainCatID, vSkyempSsf, vSkyemplerSsf, memberTax, vSkyempPaye, vSkyempTotalDebt, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempTaxableSalary, vSkyeempAdjust);

            } else if (parseFloat(vSkyempDeductions) >= parseFloat(vSkyempBasicSalary)) {
                new PNotify({
                    title: 'WARNING.!',
                    text: 'The Amount Being Deducted Seems To Be More Or Equal To The Employees Basic Salary. Please Deducte An Amount Below His/Her Basic Salary!',
                    addclass: 'bg-warning border-warning'
                });
                return false;
            }
        } else {
            new PNotify({
                title: 'INFO.!',
                text: 'Basic Salary Is Set To Zero(0) Please Re-Check And Set The Right Amount!',
                addclass: 'bg-info border-info'
            });
            return false;
        }
    } else if (vSkyempBasicSalary == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'Basic Salary Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    }

    ///////////////////////////////////////////////////////////////////////////////
}

function edit_getval(vSkyempBasicSalary, vSkyTaxEmp, taxPerc, vSkyTaxEmpler, vSkyempMainCatID, vSkyempSsf, vSkyemplerSsf, memberTax, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempTaxableSalary, vSkyeempAdjust) {
    vSkyEmpSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (vSkyTaxEmp / taxPerc)).toFixed(2);
    vSkyEmplerSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (vSkyTaxEmpler / taxPerc)).toFixed(2);
    vSkyEmpZeroSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (0 / taxPerc)).toFixed(2);

    if ((vSkyempMainCatID == 4 || vSkyempMainCatID == 3)) {

        switch (memberTax) {
            case "emp":
                edit_do_calcv(vSkyEmpSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmplerSsf, vSkyEmpZeroSsf);
                break;
            case "empler":
                edit_do_calcv(vSkyEmplerSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf);
                break;
            case undefined:
                console.log("50");
                edit_do_calcv(vSkyEmpZeroSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmplerSsf);
                break;
        }
    } else if ((vSkyempMainCatID != 4 || vSkyempMainCatID != 3)) {
        console.log(memberTax);
        switch (memberTax) {
            case "emp":
                console.log("25");
                edit_do_calcv(vSkyEmpSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmplerSsf, vSkyEmpZeroSsf);
                break;
            case "empler":
                edit_do_calcv(vSkyEmplerSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf);
                break;
            case undefined:
                console.log("51");
                edit_do_calcv(vSkyEmpZeroSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmplerSsf);
                break;
        }
    }

}

function edit_do_calcv(vSkyEmplerSsf, vSkyEmpBasicSalary, vSkyEmpPaye, vSkyEmpDebtBalance, vSkyEmpCurrentLoan, vSkyEmpDeductions, vSkyEmpBicycleDeduction, vSkyEmpMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf) {

    if (vSkyeempAdjust == "" && vSkyEmpDeductions != "") {
        var tempvSkyEmpDeductions = 0;
        var tempvSkyeempAdjust = 0;

        vSkyEmpDeductions = parseFloat(tempvSkyeempAdjust) + parseFloat(vSkyEmpDeductions);

        console.log("1");

    } else if (vSkyEmpDeductions == "" && vSkyeempAdjust != "") {

        console.log("2");

        vSkyEmpDeductions = parseFloat(vSkyeempAdjust) + parseFloat(tempvSkyEmpDeductions);

    } else if (vSkyEmpDeductions != "" && vSkyeempAdjust != "") {

        console.log("3");
        vSkyEmpDeductions = parseFloat(vSkyeempAdjust) + parseFloat(vSkyEmpDeductions);


    } else if (vSkyEmpDeductions == "" && vSkyeempAdjust == "") {

        console.log("4");

        vSkyEmpDeductions = parseFloat(tempvSkyeempAdjust) + parseFloat(tempvSkyEmpDeductions);

    } else {
        console.log("5");

        vSkyEmpDeductions = 0;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if (vSkyEmpDebtBalance == "" || vSkyEmpCurrentLoan == "") {
        var tempvSkyEmpDebtBalance = 0;
        var tempvSkyEmpCurrentLoan = 0

        if (vSkyEmpCurrentLoan == "" && vSkyEmpDebtBalance != "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)).toFixed(2);

            vSkyEmpBalanceOutStanding = parseFloat((parseFloat(vSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)) - parseFloat(vSkyEmpDeductions)).toFixed(2);
            console.log("11");
        } else if (vSkyEmpCurrentLoan == "" && vSkyEmpDebtBalance == "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(tempvSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)).toFixed(2);
            console.log("12");
        } else if (vSkyEmpCurrentLoan != "" && vSkyEmpDebtBalance == "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(tempvSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);
            console.log("13");
        } else if (vSkyEmpCurrentLoan != "" && vSkyEmpDebtBalance != "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);
            console.log("14");
        }


    } else {
        vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);

        vSkyEmpBalanceOutStanding = parseFloat((parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)) - parseFloat(vSkyEmpDeductions)).toFixed(2);
        console.log("15");
    }

    if (vSkyEmpBasicSalary == "") {
        // vSkyEmpBasicSalary = 0;
        var tempBasic = 0;
        if (vSkyEmpMainCatID == 2 || vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 1) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else if (vSkyEmpMainCatID == 3 || vSkyEmpMainCatID == 5 || vSkyEmpMainCatID == 6) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        }

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////

        //        var vSkyEmpPaye;
        //        
        //        $.ajax({
        //            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
        //            type: "post",
        //            async: false,
        //            data: {
        //                x: vSkyEmpTaxableSalary
        //            },
        //            success: function (r) {
        //                var r = JSON.parse(r);
        //                vSkyEmpPaye = r.paye;
        //            }
        //        });

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////

        vSkyEmpTotalDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions)).toFixed(2);


        if (vSkyEmpMainCatID == 1 || vSkyEmpMainCatID == 2) {
            net_salary_before_other_deductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye))).toFixed(2);
        } else {
            net_salary_before_other_deductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) - parseFloat(vSkyEmpPaye))).toFixed(2);
        }

        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions)).toFixed(2);

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }

        } else {

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }
        }
    } else {

        console.log("6");
        if (vSkyEmpMainCatID == 2 || vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 1) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)).toFixed(2);
            console.log("here");
        } else if (vSkyEmpMainCatID == 3 || vSkyEmpMainCatID == 5 || vSkyEmpMainCatID == 6) {
            console.log("not here");
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        }

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////
        //        
        //        var vSkyEmpPaye;
        //        
        //        $.ajax({
        //            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
        //            type: "post",
        //            async: false,
        //            data: {
        //                x: vSkyEmpTaxableSalary
        //            },
        //            success: function (r) {
        //                var r = JSON.parse(r);
        //                vSkyEmpPaye = r.paye;
        //            }
        //        });

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////

        vSkyEmpTotalDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions)).toFixed(2);


        if (vSkyEmpMainCatID == 1 || vSkyEmpMainCatID == 2) {
            net_salary_before_other_deductions = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye))).toFixed(2);
        } else {
            net_salary_before_other_deductions = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) - parseFloat(vSkyEmpPaye))).toFixed(2);
        }

        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions)).toFixed(2);

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }

        } else {

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }
        }
    }

    vSkyEmpTotalStatutoryDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye)).toFixed(2);


    console.log("always here");
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //$("#vSkyEmpIDDD").val(vSkyEmpIDD);
    //$("#payEmpID").val(vSkyEmpBasicSalary);
    //$("#vSkyAllow").val(vSkyEmpAllowance);
    //$("#vSkyGrossSal").val(vSkyEmpGrossSalary);
    $("#eempPaye").val(vSkyEmpPaye);
    $("#eempBicyc").val(vSkyEmpBicycleDeduction);
    $("#eempNetSal").val(vSkyEmpNetSalary);
    $("#eempNetSalPay").val(vSkyEmNetSalaryPayable);
    $("#eempTaxableS").val(vSkyEmpTaxableSalary);
    $("#eempStatuDeduc").val(vSkyEmpTotalStatutoryDeductions);
    $("#eempAdjust").val(vSkyeempAdjust);
    $("#eempDebtBal").val(vSkyEmpDebtBalance);
    $("#eempCurLoanSur").val(vSkyEmpCurrentLoan);
    $("#eempTotDebt").val(vSkyEmpTotalDebt);
    $("#eempBeforOdaDeduc").val(net_salary_before_other_deductions);
    $("#eempDeduct").val(vSkyEmpDeductions);
    $("#eempBlaAwt").val(vSkyEmpBalanceOutStanding);
    $("#eempTotDeduc").val(vSkyEmpTotalDeductions);
    $("#taxEmpP").text(vSkyTaxEmp);
    $("#taxEmplerP").text(vSkyTaxEmpler);

    memberTax = $('input[name=tax]:checked', '#edit_payslip').val();

    if (memberTax == "emp") {
        $("#eempSSFl").val(vSkyEmpSsf);
        $("#eempSSFP").val(vSkyEmplerSsf);

        $("input[name=tax][value='emp']").prop("checked", true);
        $("input[name=tax][value='empler']").prop("checked", false);

    } else if (memberTax == "empler") {

        $("#eempSSFl").val(vSkyEmplerSsf);
        $("#eempSSFP").val(vSkyEmpSsf);

        $("input[name=tax][value='emp']").prop("checked", false);
        $("input[name=tax][value='empler']").prop("checked", true);

    } else if (memberTax == undefined) {

        $("#eempSSFl").val(vSkyEmplerSsf);
        $("#eempSSFP").val(vSkyEmplerSsf);

        $("input[name=tax][value='emp']").prop("checked", false);
        $("input[name=tax][value='empler']").prop("checked", false);

    }

}

//////////////////////////////////////////////////////////////////////////////////////////////////
function holding_vals() {
    ////////////////////////////////////////////////////////////////////////    
    var vSkyempIDD = $("#payEmpID").val(),
        vSkyempBasicSalary = $("#payEmpbasic").val(),
        vSkyempDebtBalance = $("#payEmpDebtBal").val(),
        vSkyempPaye = $("#payEmpPaye").val(),
        vSkyempBicycleDeduction = $("#payEmpBicyc").val(),
        vSkyempNetSalary = $("#payEmpNetSal").val(),
        vSkyemNetSalaryPayable = $("#payEmpNetSalPay").val(),
        vSkyempTaxableSalary = $("#payEmpTaxableS").val(),
        vSkyempTotalStatutoryDeductions = $("#payEmpStatuDeduc").val(),
        vSkyempCurrentLoan = $("#payEmpCurLoanSur").val(),
        vSkyempTotalDebt = $("#payEmpTotDebt").val(),
        vSkyempDeductions = $("#payEmpDeduct").val(),
        vSkyempBalanceOutStanding = $("#payEmpBlaAwt").val(),
        vSkyempTotalDeductions = $("#payEmpTotDeduc").val(),
        vSkyeempBeforOdaDeduc = $("#payEmpBeforOdaDeduc").val(),
        vSkyeempAdjust = $("#payEmpAdjust").val(),
        vSkyempSsf = $("#payEmpSSFP").val(),
        vSkyemplerSsf = $("#payEmpSSFl").val(),
        vSkyTaxEmp = $("#taxEmpP").text(),
        vSkyTaxEmpler = $("#taxEmplerP").text(),
        taxPerc = 100,
        memberTax = $('input[name=tax]:checked', '#gen_form').val(),
        ///////////////////////////////////////////////////////////////////////////////
        vSkyempPosID = $("#payEmpPosID").val(),
        vSkyempDeptID = $("#payEmpDeptID").val(),
        vSkyempMainCatID = $("#payEmpCatID").val(),
        calledAt = "postEditCal";

    console.log(memberTax);

    ///////////////////////////////////////////////////////////////////////////////

    if (vSkyempBasicSalary != "") {

        if (parseFloat(vSkyempBasicSalary) > 0) {
            console.log("basic salary: " + vSkyempBasicSalary);
            console.log("deductions : " + vSkyempDeductions);
            if (parseFloat(vSkyempDeductions) < parseFloat(vSkyempBasicSalary)) {

                getval(vSkyempBasicSalary, vSkyTaxEmp, taxPerc, vSkyTaxEmpler, vSkyempMainCatID, vSkyempSsf, vSkyemplerSsf, memberTax, vSkyempPaye, vSkyempBalanceOutStanding, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempTaxableSalary, vSkyeempAdjust, calledAt);

            } else if (parseFloat(vSkyempDeductions) >= parseFloat(vSkyempBasicSalary)) {
                new PNotify({
                    title: 'WARNING.!',
                    text: 'The Amount Being Deducted Seems To Be More Or Equal To The Employees Basic Salary. Please Deducte An Amount Below His/Her Basic Salary!',
                    addclass: 'bg-warning border-warning'
                });
                return false;
            }
        } else {
            new PNotify({
                title: 'INFO.!',
                text: 'Basic Salary Is Set To Zero(0) Please Re-Check And Set The Right Amount!',
                addclass: 'bg-info border-info'
            });
            return false;
        }

    } else if (vSkyempBasicSalary == "") {
        new PNotify({
            title: 'INFO.!',
            text: 'Basic Salary Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    }
    ///////////////////////////////////////////////////////////////////////////////
}

function getval(vSkyempBasicSalary, vSkyTaxEmp, taxPerc, vSkyTaxEmpler, vSkyempMainCatID, vSkyempSsf, vSkyemplerSsf, memberTax, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempTaxableSalary, vSkyeempAdjust, calledAt) {
    vSkyEmpSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (vSkyTaxEmp / taxPerc)).toFixed(2);
    vSkyEmplerSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (vSkyTaxEmpler / taxPerc)).toFixed(2);
    vSkyEmpZeroSsf = parseFloat(parseFloat(vSkyempBasicSalary) * (0 / taxPerc)).toFixed(2);

    if ((vSkyempMainCatID == 4 || vSkyempMainCatID == 3)) {

        switch (memberTax) {
            case "emp":
                do_calcv(vSkyEmpSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmplerSsf, vSkyEmpZeroSsf, calledAt);
                break;
            case "empler":
                do_calcv(vSkyEmplerSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf, calledAt);
                break;
            case undefined:
                console.log("50");
                do_calcv(vSkyEmpZeroSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmplerSsf, calledAt);
                break;
        }
    } else if ((vSkyempMainCatID != 4 || vSkyempMainCatID != 3)) {
        console.log(memberTax);
        switch (memberTax) {
            case "emp":
                console.log("25");
                do_calcv(vSkyEmpSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmplerSsf, vSkyEmpZeroSsf, calledAt);
                break;
            case "empler":
                do_calcv(vSkyEmplerSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf, calledAt);
                break;
            case undefined:
                console.log("51");
                do_calcv(vSkyEmpZeroSsf, vSkyempBasicSalary, vSkyempPaye, vSkyempDebtBalance, vSkyempCurrentLoan, vSkyempDeductions, vSkyempBicycleDeduction, vSkyempMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmplerSsf, calledAt);
                break;
        }
    }

}

function do_calcv(vSkyEmplerSsf, vSkyEmpBasicSalary, vSkyEmpPaye, vSkyEmpDebtBalance, vSkyEmpCurrentLoan, vSkyEmpDeductions, vSkyEmpBicycleDeduction, vSkyEmpMainCatID, vSkyTaxEmp, vSkyTaxEmpler, vSkyempTaxableSalary, vSkyeempAdjust, vSkyEmpSsf, vSkyEmpZeroSsf, calledAt) {

    if (vSkyeempAdjust == "" && vSkyEmpDeductions != "") {
        var tempvSkyEmpDeductions = 0;
        var tempvSkyeempAdjust = 0;

        vSkyEmpDeductions = parseFloat(tempvSkyeempAdjust) + parseFloat(vSkyEmpDeductions);

        console.log("1");

    } else if (vSkyEmpDeductions == "" && vSkyeempAdjust != "") {

        console.log("2");

        vSkyEmpDeductions = parseFloat(vSkyeempAdjust) + parseFloat(tempvSkyEmpDeductions);

    } else if (vSkyEmpDeductions != "" && vSkyeempAdjust != "") {

        console.log("3");
        vSkyEmpDeductions = parseFloat(vSkyeempAdjust) + parseFloat(vSkyEmpDeductions);


    } else if (vSkyEmpDeductions == "" && vSkyeempAdjust == "") {

        console.log("4");

        vSkyEmpDeductions = parseFloat(tempvSkyeempAdjust) + parseFloat(tempvSkyEmpDeductions);

    } else {
        console.log("5");

        vSkyEmpDeductions = 0;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if (vSkyEmpDebtBalance == "" || vSkyEmpCurrentLoan == "") {
        var tempvSkyEmpDebtBalance = 0;
        var tempvSkyEmpCurrentLoan = 0

        if (vSkyEmpCurrentLoan == "" && vSkyEmpDebtBalance != "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)).toFixed(2);

            vSkyEmpBalanceOutStanding = parseFloat((parseFloat(vSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)) - parseFloat(vSkyEmpDeductions)).toFixed(2);
            console.log("11");
        } else if (vSkyEmpCurrentLoan == "" && vSkyEmpDebtBalance == "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(tempvSkyEmpDebtBalance) + parseFloat(tempvSkyEmpCurrentLoan)).toFixed(2);
            console.log("12");
        } else if (vSkyEmpCurrentLoan != "" && vSkyEmpDebtBalance == "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(tempvSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);
            console.log("13");
        } else if (vSkyEmpCurrentLoan != "" && vSkyEmpDebtBalance != "") {

            vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);
            console.log("14");
        }


    } else {
        vSkyEmpTotalDebt = parseFloat(parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)).toFixed(2);

        vSkyEmpBalanceOutStanding = parseFloat((parseFloat(vSkyEmpDebtBalance) + parseFloat(vSkyEmpCurrentLoan)) - parseFloat(vSkyEmpDeductions)).toFixed(2);
        console.log("15");
    }

    if (vSkyEmpBasicSalary == "") {
        // vSkyEmpBasicSalary = 0;
        var tempBasic = 0;
        if (vSkyEmpMainCatID == 2 || vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 1) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else if (vSkyEmpMainCatID == 3 || vSkyEmpMainCatID == 5 || vSkyEmpMainCatID == 6) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(tempBasic) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        }

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////

        //        var vSkyEmpPaye;
        //        
        //        $.ajax({
        //            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
        //            type: "post",
        //            async: false,
        //            data: {
        //                x: vSkyEmpTaxableSalary
        //            },
        //            success: function (r) {
        //                var r = JSON.parse(r);
        //                vSkyEmpPaye = r.paye;
        //            }
        //        });

        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////


        if (vSkyEmpMainCatID == 1 || vSkyEmpMainCatID == 2) {
            net_salary_before_other_deductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye))).toFixed(2);
        } else {
            net_salary_before_other_deductions = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) - parseFloat(vSkyEmpPaye))).toFixed(2);
        }

        vSkyEmpTotalDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions)).toFixed(2);


        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions)).toFixed(2);
            console.log("using this");

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat((parseFloat(tempBasic) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }

        } else {

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat(parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(tempBasic) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }
        }
    } else {

        console.log("6");
        if (vSkyEmpMainCatID == 2 || vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 1) {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)).toFixed(2);
            console.log("here");
        } else if (vSkyEmpMainCatID == 3 || vSkyEmpMainCatID == 5 || vSkyEmpMainCatID == 6) {
            console.log("not here");
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        } else {
            vSkyEmpTaxableSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) + parseFloat(vSkyEmplerSsf)).toFixed(2);
        }

        //        var vSkyEmpPaye;
        //
        //        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////
        //        $.ajax({
        //            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips",
        //            type: "post",
        //            async: false,
        //            data: {
        //                x: vSkyEmpTaxableSalary
        //            },
        //            success: function (r) {
        //                var r = JSON.parse(r);
        //                vSkyEmpPaye = r.paye;
        //            }
        //        });
        //        console.log(vSkyEmpPaye);
        //////////////////////////////////// Paye ///////////////////////////////////////////////////////////


        if (vSkyEmpMainCatID == 1 || vSkyEmpMainCatID == 2) {
            net_salary_before_other_deductions = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye))).toFixed(2);
        } else {
            net_salary_before_other_deductions = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) - parseFloat(vSkyEmpPaye))).toFixed(2);
        }

        vSkyEmpTotalDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions)).toFixed(2);


        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {
            console.log("100");
            // taxable salary - total deductions where taxable salary = basic - employee SSF
            vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions)).toFixed(2);

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;
                console.log("101");
                vSkyEmpNetSalary = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {
                console.log("102");
                vSkyEmpNetSalary = parseFloat((parseFloat(vSkyEmpBasicSalary) - parseFloat(vSkyEmplerSsf)) - parseFloat(vSkyEmpTotalDeductions) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }

        } else {

            if (vSkyEmpBicycleDeduction == "") {
                var tempvSkyEmpBicycleDeduction = 0;

                vSkyEmpNetSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(tempvSkyEmpBicycleDeduction)).toFixed(2);

            } else {

                vSkyEmpNetSalary = parseFloat(parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))).toFixed(2);

                vSkyEmNetSalaryPayable = parseFloat((parseFloat(vSkyEmpBasicSalary) - (parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye) + parseFloat(vSkyEmpDeductions))) - parseFloat(vSkyEmpBicycleDeduction)).toFixed(2);

            }
        }
    }

    vSkyEmpTotalStatutoryDeductions = parseFloat(parseFloat(vSkyEmplerSsf) + parseFloat(vSkyEmpPaye)).toFixed(2);


    if (calledAt == "postEditCal") {
        console.log("here noe");
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //$("#vSkyEmpIDDD").val(vSkyEmpIDD);
        //$("#payEmpID").val(vSkyEmpBasicSalary);
        //$("#vSkyAllow").val(vSkyEmpAllowance);
        //$("#vSkyGrossSal").val(vSkyEmpGrossSalary);
        $("#payEmpPaye").val(vSkyEmpPaye);
        $("#payEmpBicyc").val(vSkyEmpBicycleDeduction);

        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {

            $("#payEmpNetSal").val(vSkyEmNetSalaryPayable);
            $("#payEmpNetSalPay").val(vSkyEmpNetSalary);

        } else {

            $("#payEmpNetSal").val(vSkyEmpNetSalary);
            $("#payEmpNetSalPay").val(vSkyEmNetSalaryPayable);

        }

        $("#payEmpTaxableS").val(vSkyEmpTaxableSalary);
        $("#payEmpStatuDeduc").val(vSkyEmpTotalStatutoryDeductions);
        $("#payEmpAdjust").val(vSkyeempAdjust);
        $("#payEmpDebtBal").val(vSkyEmpDebtBalance);
        $("#payEmpCurLoanSur").val(vSkyEmpCurrentLoan);
        $("#payEmpTotDebt").val(vSkyEmpTotalDebt);
        $("#payEmpBeforOdaDeduc").val(net_salary_before_other_deductions);
        $("#payEmpDeduct").val(vSkyEmpDeductions);
        $("#payEmpBlaAwt").val(vSkyEmpBalanceOutStanding);
        $("#payEmpTotDeduc").val(vSkyEmpTotalDeductions);
        $("#taxEmpP").text(vSkyTaxEmp);
        $("#taxEmplerP").text(vSkyTaxEmpler);


        memberTax = $('input[name=tax]:checked', '#gen_form').val();

        if (memberTax == "emp") {
            $("#payEmpSSFl").val(vSkyEmpSsf);
            $("#payEmpSSFP").val(vSkyEmplerSsf);

            $("input[name=tax][value='emp']").prop("checked", true);
            $("input[name=tax][value='empler']").prop("checked", false);

        } else if (memberTax == "empler") {

            $("#payEmpSSFl").val(vSkyEmplerSsf);
            $("#payEmpSSFP").val(vSkyEmpSsf);

            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", true);

        } else if (memberTax == undefined) {

            $("#payEmpSSFl").val(vSkyEmplerSsf);
            $("#payEmpSSFP").val(vSkyEmplerSsf);

            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", false);

        }

    } else if (calledAt == "preEditCal") {
        console.log("always here");
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //$("#vSkyEmpIDDD").val(vSkyEmpIDD);
        //$("#payEmpID").val(vSkyEmpBasicSalary);
        //$("#vSkyAllow").val(vSkyEmpAllowance);
        //$("#vSkyGrossSal").val(vSkyEmpGrossSalary);


        $("#eempPaye").val(vSkyEmpPaye);
        $("#eempBicyc").val(vSkyEmpBicycleDeduction);

        if (vSkyEmpMainCatID == 4 || vSkyEmpMainCatID == 3) {

            $("#eempNetSal").val(vSkyEmNetSalaryPayable);
            $("#eempNetSalPay").val(vSkyEmpNetSalary);

        } else {

            $("#eempNetSal").val(vSkyEmpNetSalary);
            $("#eempNetSalPay").val(vSkyEmNetSalaryPayable);

        }

        $("#eempTaxableS").val(vSkyEmpTaxableSalary);
        $("#eempStatuDeduc").val(vSkyEmpTotalStatutoryDeductions);
        $("#eempAdjust").val(vSkyeempAdjust);
        $("#eempDebtBal").val(vSkyEmpDebtBalance);
        $("#eempCurLoanSur").val(vSkyEmpCurrentLoan);
        $("#eempTotDebt").val(vSkyEmpTotalDebt);
        $("#eempBeforOdaDeduc").val(net_salary_before_other_deductions);
        $("#eempDeduct").val(vSkyEmpDeductions);
        $("#eempBlaAwt").val(vSkyEmpBalanceOutStanding);
        $("#eempTotDeduc").val(vSkyEmpTotalDeductions);
        $("#taxEmpP").text(vSkyTaxEmp);
        $("#taxEmplerP").text(vSkyTaxEmpler);

        memberTax = $('input[name=tax]:checked', '#edit_payslip').val();

        if (memberTax == "emp") {
            $("#eempSSFl").val(vSkyEmpSsf);
            $("#eempSSFP").val(vSkyEmplerSsf);

            $("input[name=tax][value='emp']").prop("checked", true);
            $("input[name=tax][value='empler']").prop("checked", false);

        } else if (memberTax == "empler") {

            $("#eempSSFl").val(vSkyEmplerSsf);
            $("#eempSSFP").val(vSkyEmpSsf);

            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", true);

        } else if (memberTax == undefined) {

            $("#eempSSFl").val(vSkyEmplerSsf);
            $("#eempSSFP").val(vSkyEmplerSsf);

            $("input[name=tax][value='emp']").prop("checked", false);
            $("input[name=tax][value='empler']").prop("checked", false);

        }
    }

}
//////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
function prepare_single_emp() {
    var payEmpDeptID = $("#payEmpDeptID").val(),
        payEmpPosID = $("#payEmpPosID").val(),
        payEmpCatID = $("#payEmpCatID").val(),
        payEmpID = $("#payEmpID").val(),
        payEmpbasic = $("#payEmpbasic").val(),
        payEmpDebtBal = $("#payEmpDebtBal").val(),
        payEmpSSFl = $("#payEmpSSFl").val(),
        payEmpCurLoanSur = $("#payEmpCurLoanSur").val(),
        payEmpSSFP = $("#payEmpSSFP").val(),
        payEmpAdjust = $("#payEmpAdjust").val(),
        payEmpTaxableS = $("#payEmpTaxableS").val(),
        payEmpDeduct = $("#payEmpDeduct").val(),
        payEmpPaye = $("#payEmpPaye").val(),
        payEmpBicyc = $("#payEmpBicyc").val(),
        payEmpStatuDeduc = $("#payEmpStatuDeduc").val(),
        payEmpBeforOdaDeduc = $("#payEmpBeforOdaDeduc").val(),
        payEmpNetSal = $("#payEmpNetSal").val(),
        payEmpTotDebt = $("#payEmpTotDebt").val(),
        payEmpBlaAwt = $("#payEmpBlaAwt").val(),
        payEmpTotDeduc = $("#payEmpTotDeduc").val(),
        payEmpNetSalPay = $("#payEmpNetSalPay").val(),
        payEmpPayMethod = $("#payEmpPayMethod").val(),
        payEmpDescrp = $("#payEmpDescrp").val(),
        payEmpcomment = $("#payEmpcomment").val(),
        save_single = "save_single";

    $("i.preEmp").removeClass("icon-plus22").addClass("icon-spinner9 spinner chk_dell");
    $("#single").text("Saving...");
    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
        payTOEmpDeptID: payEmpDeptID,
        payTOEmpPosID: payEmpPosID,
        payTOEmpCatID: payEmpCatID,
        payTOEmpID: payEmpID,
        payTOEmpbasic: payEmpbasic,
        payTOEmpDebtBal: payEmpDebtBal,
        payTOEmpSSFl: payEmpSSFl,
        payTOEmpCurLoanSur: payEmpCurLoanSur,
        payTOEmpSSFP: payEmpSSFP,
        payTOEmpAdjust: payEmpAdjust,
        payTOEmpTaxableS: payEmpTaxableS,
        payTOEmpDeduct: payEmpDeduct,
        payTOEmpPaye: payEmpPaye,
        payTOEmpBicyc: payEmpBicyc,
        payTOEmpStatuDeduc: payEmpStatuDeduc,
        payTOEmpBeforOdaDeduc: payEmpBeforOdaDeduc,
        payTOEmpNetSal: payEmpNetSal,
        payTOEmpTotDebt: payEmpTotDebt,
        payTOEmpBlaAwt: payEmpBlaAwt,
        payTOEmpTotDeduc: payEmpTotDeduc,
        payTOEmpNetSalPay: payEmpNetSalPay,
        payTOEmpPayMethod: payEmpPayMethod,
        payTOEmpDescrp: payEmpDescrp,
        payTOEmpComment: payEmpcomment,
        save_single: save_single
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            new PNotify({
                title: 'INFO.!',
                text: 'Added and awaiting to be processed!',
                addclass: 'bg-info border-info'
            });

            $("i.preEmp").removeClass("icon-spinner9 spinner").addClass("icon-plus22 chk_dell");
            $("#single").text("Save");

            setTimeout(redirect, 1000);

        } else {
            new PNotify({
                title: 'ERROR.!',
                text: 'Error Saving!',
                addclass: 'bg-error border-error'
            });
            $("i.preEmp").removeClass("icon-spinner9 spinner").addClass("icon-plus22 chk_dell");
            $("#single").text("Save");
        }
        var cat_id = r.cat_id;
        var lat_encoded = btoa(cat_id);

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/gen_by_cat?__c_g_=" + lat_encoded);
        }

    });

}

function edit_emp_infos(emiid, catt_id) {
    var catId_id = catt_id;
    var emp_id = emiid;
    var cat_id = btoa(catId_id);
    var emp_encoded = btoa(emp_id);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/preEditPayRoll?__i_g_=" + cat_id + "&_f__st=" + emp_encoded);
}

function updateSlipSlip() {
    var eempDeptID = $("#eempDeptID").val(),
        eempPosID = $("#eempPosID").val(),
        eempCatID = $("#eempCatID").val(),
        eempID = $("#eempID").val(),
        eempName = $("#eempName").val(),
        eempPDate = $("#eempPDate").val(),
        eempSsnit = $("#eempSsnit").val(),
        eempCatName = $("#eempCatName").val(),
        eempbasic = $("#eempbasic").val(),
        eempDebtBal = $("#eempDebtBal").val(),
        eempSSFl = $("#eempSSFl").val(),
        eempCurLoanSur = $("#eempCurLoanSur").val(),
        eempSSFP = $("#eempSSFP").val(),
        eempAdjust = $("#eempAdjust").val(),
        eempTaxableS = $("#eempTaxableS").val(),
        eempDeduct = $("#eempDeduct").val(),
        eempPaye = $("#eempPaye").val(),
        eempBicyc = $("#eempBicyc").val(),
        eempStatuDeduc = $("#eempStatuDeduc").val(),
        eempBeforOdaDeduc = $("#eempBeforOdaDeduc").val(),
        eempNetSal = $("#eempNetSal").val(),
        eempTotDebt = $("#eempTotDebt").val(),
        eempBlaAwt = $("#eempBlaAwt").val(),
        eempTotDeduc = $("#eempTotDeduc").val(),
        eempNetSalPay = $("#eempNetSalPay").val(),
        eempPayMethod = $("#eempPayMethod").val(),
        eempDescrp = $("#eempDescrp").val(),
        eempPaidAmt = $("#eempPaidAmt").val(),
        eempcomment = $("#eempcomment").val(),
        preedit = "updatePrePost";

    $("#updateSlip").text("Updating...");
    $("i.updateSlip").removeClass("icon-reset").addClass("icon-spinner4 spinner");

    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
        eempDeptID: eempDeptID,
        eempPosID: eempPosID,
        eempCatID: eempCatID,
        eempID: eempID,
        eempName: eempName,
        eempPDate: eempPDate,
        eempSsnit: eempSsnit,
        eempCatName: eempCatName,
        eempbasic: eempbasic,
        eempDebtBal: eempDebtBal,
        eempSSFl: eempSSFl,
        eempCurLoanSur: eempCurLoanSur,
        eempSSFP: eempSSFP,
        eempAdjust: eempAdjust,
        eempTaxableS: eempTaxableS,
        eempDeduct: eempDeduct,
        eempPaye: eempPaye,
        eempBicyc: eempBicyc,
        eempStatuDeduc: eempStatuDeduc,
        eempBeforOdaDeduc: eempBeforOdaDeduc,
        eempNetSal: eempNetSal,
        eempTotDebt: eempTotDebt,
        eempBlaAwt: eempBlaAwt,
        eempTotDeduc: eempTotDeduc,
        eempNetSalPay: eempNetSalPay,
        eempPayMethod: eempPayMethod,
        eempDescrp: eempDescrp,
        eempPaidAmt: eempPaidAmt,
        eempcomment: eempcomment,
        preedit: preedit
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {
            new PNotify({
                title: 'INFO.!',
                text: 'Updated Successfully!',
                addclass: 'bg-info border-info'
            });
            $("#updateSlip").text("Update");
            $("i.updateSlip").removeClass("icon-spinner4 spinner").addClass("icon-reset");

            setTimeout(redirect, 1000);
        } else {
            new PNotify({
                title: 'INFO.!',
                text: 'Updating Failed!',
                addclass: 'bg-error border-error'
            });
            $("#updateSlip").text("Update");
            $("i.updateSlip").removeClass("icon-spinner4 spinner").addClass("icon-reset");
        }

        var catId_id = r.cat_id;
        var emp_id = r.emp_id;
        var cat_id = btoa(catId_id);
        var emp_encoded = btoa(emp_id);

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/preEditPayRoll?__i_g_=" + cat_id + "&_f__st=" + emp_encoded);
        }
    })


}

function add_to_payroll(emp_id, emp_main_cat_id) {
    console.log(emp_id);
    console.log(emp_main_cat_id);
    var emp_id_new = emp_id,
        emp_main_cat_id_new = emp_main_cat_id;

    $("i.add_to_payRoll" + emp_id).removeClass("icon-pointer").addClass("icon-spinner4 spinner");

    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
        emp_id_new: emp_id_new,
        emp_main_cat_id_new: emp_main_cat_id_new
    }, function (t) {
        var t = JSON.parse(t);
        console.log(t);
        if (t.vSkySuc) {
            $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
                lastIDD: t.lastIDD,
                emp_idNEW: t.emp_id
            }, function (z) {
                var z = JSON.parse(z);
                console.log(z);
                if (z.vSkySuc) {
                    new PNotify({
                        title: 'INFO.!',
                        text: 'Added Successfully',
                        addclass: 'bg-info border-info'
                    });

                    $("i.add_to_payRoll" + emp_id).removeClass("icon-spinner4 spinner").addClass("icon-pointer");

                    setTimeout(redirect, 1000);

                }

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/not_on_payroll");
                }

            });
        }

    })
}
/////////////////////////////////////////////End Main Processing of payslip calculations/////////////////////////////

function applyEmpEmp() {
    var genebasic = $("#genBasic").val(),
        geneCatID = $("#genCatID").val(),
        geneTaxable = $("#genTaxableS").val(),
        geneSFFL = $("#genSSFl").val(),
        geneSSFP = $("#genSSFP").val(),
        genePaye = $("#genPaye").val(),
        geneEmpP = $("#genEmpP").text(),
        geneEmplerP = $("#genEmplerP").text(),
        geneBeforeDeductions = $("#genBeforOdaDeduc").val(),
        geneStatDeduc = $("#genStatDeduc").val(),
        membereTax = $('input[name=tax]:checked', '#gen_form').val();

}

function aplychrgs() {

    $("i.appEmp").removeClass("icon-plus22").addClass("icon-spinner9 spinner chk_dell");
    $("#appEmp").text("Adding...");

    var geneEmpID = $("#eAmpID").val(),
        eAmpName = $("#eAmpName").val(),
        eAmpPDate = $("#eAmpPDate").val(),
        eAmpSsnit = $("#eAmpSsnit").val(),
        eAmpCatName = $("#eAmpCatName").val(),
        eAmpCurLoanSur = $("#eAmpCurLoanSur").val(),
        od_chrg = $("#od_chrg").val(),
        comment = $("#comment").val(),
        prs = "add_charges";

    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_debt", {
        geneEmpID: geneEmpID,
        eAmpName: eAmpName,
        eAmpPDate: eAmpPDate,
        eAmpSsnit: eAmpSsnit,
        eAmpCatName: eAmpCatName,
        eAmpCurLoanSur: eAmpCurLoanSur,
        od_chrg: od_chrg,
        comment: comment,
        prs: prs

    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("i.appEmp").removeClass("icon-spinner9 spinner").addClass("icon-plus22");
            $("#appEmp").text("Add");

            new PNotify({
                title: 'Success!',
                text: 'Added!',
                addclass: 'bg-success border-success'
            });
            setTimeout(rerect, 1000);
        }

    })

    function rerect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/debts_loans_set");
    }

}

function get_empDEtails(deduc_id, emp_id) {

    var deducID = deduc_id,
        empID = emp_id;

    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_debt", {
        deducID: deducID,
        empID: empID
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#eEmpCatID").val(r.deduc_id);
            $("#eEmpID").val(r.emp_id);
            $("#eEmpName").val(r.emp_name);
            $("#eEmpCatName").val(r.cat_name);
            $("#eEmpSsnit").val(r.emp_ssnit);
            $("#eEmpPDate").val(r.deduc_date);
            $("#eEmpDebtBal").val(r.debt_bal_b_d);
            $("#eEmpCurLoanSur").val(r.current_loans_surcharges);
            $("#eEmpTotDebt").val(r.total_debt);
            $("#eEmpDeduct").val(r.deductions);
            $("#eEmpBlaAwt").val(r.bal_outstanding);
        }

    })
}

function get_empDEtailsAdd(emp_id) {
    var dungotey = emp_id;

    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_debt", {
        dungotey: dungotey
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#eAmpID").val(r.emp_id);
            $("#eAmpName").val(r.emp_name);
            $("#eAmpCatName").val(r.cat_name);
            $("#eAmpSsnit").val(r.emp_ssnit);
            $("#eAmpPDate").val(r.date);
        }
    });
}

function get_empCur(emp_id) {
    var dung = emp_id;
    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_debt", {
        dung: dung
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#eCmpID").val(r.emp_id);
            $("#eCmpName").val(r.emp_name);
            $("#eCmpCurLoanSur").val(r.eCmpCurLoanSur);
            $("#eCmpSsnit").val(r.emp_ssnit);
            $("#cComment").val(r.cComment);
            $("#eCmpPDate").val(r.eCmpPDate);
            $("#od_Cchrg").val(r.od_Cchrg);
        }
    });
}

function del_Cur(id) {
    var chkchkchkID = id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.delDebtChr" + chkchkchkID).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/payroll/includes/process_debt",
            type: 'POST',
            data: {
                chkchkchkID: chkchkchkID,
                del: 'del'
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkySuc) {

                    $("i.delDebtChr" + chkchkchkID).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/debts_loans_set");
    }
}

function get_cat_info() {
    var cat_idd = $("#cat_id_info").val();
    var enc_catId = btoa(cat_idd);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/gen_by_cat?__c_g_=" + enc_catId);

}

function redirectToPersonalePayrollPage(id) {
    var content_id = id;
    var val_encoded = btoa(id);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/emp_payRoll_view?__i_g_=" + val_encoded);
}

function display_empPayEdit(storeID, empID) {
    var store_id = storeID;
    var emp_id = empID;
    var store_encoded = btoa(storeID);
    var emp_encoded = btoa(emp_id);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/edit_empPayInfo?__i_g_=" + store_encoded + "&_f__st=" + emp_encoded);
}

function gen_paySlip(lastPayID, emPID) {
    var lastPay_id = lastPayID;
    var emp_id = emPID;
    var lat_encoded = btoa(lastPay_id);
    var emP_encoded = btoa(emp_id);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/includes/paySingpay?__l_p@i$d_=" + lat_encoded + "&_e_i@$d=" + emP_encoded);
}

function gen_lastPayRoll_emp(lastPayID, emPID) {
    var lastPay_id = lastPayID;
    var emp_id = emPID;
    var lat_encoded = btoa(lastPay_id);
    var emP_encoded = btoa(emp_id);
    window.location.assign("/payroll/mainAdmin_assets/members_assets/payroll/includes/sinPay?__l_p@i$d_=" + lat_encoded + "&_e_i@$d=" + emP_encoded);
}

function addmMainCatt() {
    var catName = $("#catName").val();
    if (catName == '') {
        new PNotify({
            title: 'INFO.!',
            text: 'Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
    } else {
        $("i.addCatIcon").removeClass("icon-plus3").addClass("icon-spinner9 spinner chk_dell");
        $("#add_cat").text("Adding...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_cat", {
            catName: catName
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc == true) {

                $("i.addCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#add_cat").text("Add");

                new PNotify({
                    title: 'Successfull.!',
                    text: 'Category Added!',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.vSkySuc == false) {

                $("i.addCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#add_cat").text("Add");

                new PNotify({
                    title: 'Error.!',
                    text: 'Error adding category!',
                    addclass: 'bg-info border-info'
                });

            } else if (r.vSkyFound == "found") {

                $("i.addCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#add_cat").text("Add");

                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Category Twice!',
                    addclass: 'bg-info border-info'
                });

            }


        });
    }

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/main_cat_set");
    }
}

function display_cat(id) {
    var vSkyIdCat = id;
    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_cat", {
        vSkyIdCat: vSkyIdCat
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {
            $("#vSkyCatName").val(r.vSkyCatDbName);
            $("#vSkyCatId").val(r.vSkyCatDbId);
        } else {
            new PNotify({
                title: 'info.!',
                text: 'Error Fetching Data!',
                addclass: 'bg-info border-info'
            });
        }
    })
}

function editMainCat() {
    var vSkyCatName = $("#vSkyCatName").val();
    var vSkyCatId = $("#vSkyCatId").val();

    if (vSkyCatName == '') {
        new PNotify({
            title: 'Inof.!',
            text: 'Category Name Field Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    } else {
        $("i.updateCatIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner chk_dell");
        $("#update_cat").text("Updating...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_cat", {
            vSkyCatName: vSkyCatName,
            vSkyCatId: vSkyCatId
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc == true) {
                new PNotify({
                    title: 'info.!',
                    text: 'Updated Successfully!',
                    addclass: 'bg-success border-success'
                });

                $("i.updateCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#update_cat").text("Update");

                setTimeout(redirect, 1000);
            } else if (r.vSkySuc == false) {
                $("i.updateCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#update_cat").text("Update");
                new PNotify({
                    title: 'Error.!',
                    text: 'Error Updating!',
                    addclass: 'bg-error border-error'
                });
            } else if (r.vSkyFound == "found") {
                $("i.updateCatIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#update_cat").text("Update");
                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Category Twice!',
                    addclass: 'bg-info border-info'
                });
            }
        });

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/members_assets/main_cat_set");
        }
    }


}

function del_cat(id) {
    var vSkyDelId = id;
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.mainCatDel" + vSkyDelId).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/includes/process_cat",
            type: 'POST',
            data: {
                vSkyDelId: vSkyDelId
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkyDel) {

                    $("i.mainCatDel" + vSkyDelId).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/main_cat_set");
    }
}

function display_pos(id) {
    var vSkyIdPos = id;
    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_pos", {
        vSkyIdPos: vSkyIdPos
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {
            $("#vSkyPosName").val(r.vSkyPosDbName);
            $("#vSkyPosId").val(r.vSkyPosDbId);
            $("#vSkyCattId").val(r.vSkyCatDbId);
        } else {
            new PNotify({
                title: 'info.!',
                text: 'Error Fetching Data!',
                addclass: 'bg-info border-info'
            });
        }
    })
}

function editPos() {
    var vSkyPosName = $("#vSkyPosName").val();
    var vSkyPosId = $("#vSkyPosId").val();
    var vSkyPosCat = $("#vSkyCategory").val();
    var vSkyCatID = $("#vSkyCattId").val();

    if (vSkyPosName == '') {
        new PNotify({
            title: 'Inof.!',
            text: 'Position Name Field Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    } else {

        $("i.updatePosIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner chk_dell");
        $("#updatePos").text("Updating...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_pos", {
            vSkyPosName: vSkyPosName,
            vSkyPosId: vSkyPosId,
            vSkyPosCat: vSkyPosCat,
            vSkyCatID: vSkyCatID
        }, function (r) {
            var r = JSON.parse(r);
            console.log(r);
            if (r.vSkySuc == true) {
                new PNotify({
                    title: 'info.!',
                    text: 'Updated Successfully!',
                    addclass: 'bg-success border-success'
                });

                $("i.updatePosIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updatePos").text("Update");

                setTimeout(redirect, 1000);
            } else if (r.vSkySuc == false) {
                $("i.updatePosIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updatePos").text("Update");
                new PNotify({
                    title: 'Error.!',
                    text: 'Error Updating!',
                    addclass: 'bg-error border-error'
                });
            } else if (r.vSkyFound == "found") {
                $("i.updatePosIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updatePos").text("Update");
                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Category Twice!',
                    addclass: 'bg-info border-info'
                });
            }
        });

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/members_assets/pos_set");
        }
    }
}

function del_pos(id) {
    var vSkyDelPosId = id;
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.posDel" + vSkyDelPosId).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/includes/process_pos",
            type: 'POST',
            data: {
                vSkyDelPosId: vSkyDelPosId
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkyDel) {

                    $("i.posDel" + vSkyDelPosId).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/pos_set");
    }
}

function add_pos() {
    var catVsky = $("#categoryVsky").val();
    var vSkyPosiName = $("#vSkyPosiName").val();

    if (vSkyPosiName == '') {
        new PNotify({
            title: 'Inof.!',
            text: 'Position Name Field Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    } else {

        $("i.addPosIcon").removeClass("icon-plus3").addClass("icon-spinner9 spinner chk_dell");
        $("#addPos").text("Adding...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_pos", {
            catVsky: catVsky,
            vSkyPosiName: vSkyPosiName
        }, function (r) {
            var r = JSON.parse(r);
            console.log(r);
            if (r.vSkySuc == true) {

                $("i.addPosIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addPos").text("Add Position");

                new PNotify({
                    title: 'Successfull.!',
                    text: 'Position Added!',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.vSkySuc == false) {

                $("i.addPosIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addPos").text("Add Position");

                new PNotify({
                    title: 'Error.!',
                    text: 'Error adding Position!',
                    addclass: 'bg-info border-info'
                });

            } else if (r.vSkyFound == "found") {

                $("i.addPosIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addPos").text("Add Position");

                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Position Twice!',
                    addclass: 'bg-info border-info'
                });

            }


        });
    }


    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/pos_set");
    }
}

function display_dept(id) {
    var vSkyIdDept = id;
    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_dept", {
        vSkyIdDept: vSkyIdDept
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {
            $("#vSkyIdDept").val(r.vSkyDeptDbName);
            $("#vSkyDeptId").val(r.vSkyDeptDbId);
        } else {
            new PNotify({
                title: 'info.!',
                text: 'Error Fetching Data!',
                addclass: 'bg-info border-info'
            });
        }
    })
}

function editDept() {
    var vSkyDeptName = $("#vSkyIdDept").val();
    var vSkyDeptId = $("#vSkyDeptId").val();

    if (vSkyDeptName == '') {
        new PNotify({
            title: 'Inof.!',
            text: 'Department Name Field Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        return false;
    } else {

        $("i.updateDeptIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner chk_dell");
        $("#updateDept").text("Updating...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_dept", {
            vSkyDeptName: vSkyDeptName,
            vSkyDeptId: vSkyDeptId
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc == true) {
                new PNotify({
                    title: 'info.!',
                    text: 'Updated Successfully!',
                    addclass: 'bg-success border-success'
                });

                $("i.updateDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updateDept").text("Update");

                setTimeout(redirect, 1000);
            } else if (r.vSkySuc == false) {
                $("i.updateDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updateDept").text("Update");
                new PNotify({
                    title: 'Error.!',
                    text: 'Error Updating!',
                    addclass: 'bg-error border-error'
                });
            } else if (r.vSkyFound == "found") {
                $("i.updateDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");
                $("#updateDept").text("Update");
                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Category Twice!',
                    addclass: 'bg-info border-info'
                });
            }
        });

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/members_assets/de_set");
        }
    }
}

function del_dept(id) {
    var vSkyDelDeptId = id;
    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.deptDel" + vSkyDelDeptId).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/includes/process_dept",
            type: 'POST',
            data: {
                vSkyDelDeptId: vSkyDelDeptId
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkyDel) {

                    $("i.deptDel" + vSkyDelDeptId).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/de_set");
    }
}

function add_dept() {

    var vSkyDept = $("#vSkyDept").val();
    if (vSkyDept == '') {
        new PNotify({
            title: 'INFO.!',
            text: 'Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
    } else {
        $("i.addDeptIcon").removeClass("icon-plus3").addClass("icon-spinner9 spinner chk_dell");
        $("#addDept").text("Adding...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_dept", {
            vSkyDept: vSkyDept
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc == true) {

                $("i.addDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addDept").text("Add Department");

                new PNotify({
                    title: 'Successfull.!',
                    text: 'Department Added!',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.vSkySuc == false) {

                $("i.addDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addDept").text("Add Department");

                new PNotify({
                    title: 'Error.!',
                    text: 'Error adding Department!',
                    addclass: 'bg-info border-info'
                });

            } else if (r.vSkyFound == "found") {

                $("i.addDeptIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#addDept").text("Add Department");

                new PNotify({
                    title: 'info.!',
                    text: 'Can Not Add The Same Department Twice!',
                    addclass: 'bg-info border-info'
                });

            }


        });
    }

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/de_set");
    }

}

function _add_tax_() {
    $("i.ic").removeClass("icon-plus3").addClass("icon-spinner9 spinner chk_dell");
    $("#add_tax").text("Adding...");

    var values_top = $("#emp_perc_result").val(),
        values_down = $("#emplyer_perc_result").val(),
        process = "add";

    if (values_top == '' && values_down != '') {
        values_top = 0.00;
        values_down = values_down;
    } else if (values_top != '' && values_down == '') {
        values_down = 0.00;
        values_top = values_top;
    } else if (values_top == '' && values_down == '') {
        new PNotify({
            title: 'INFO.!',
            text: 'Can Not Add Empty Fields!',
            addclass: 'bg-info border-info'
        });
        $("i.ic").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
        $("#add_tax").text("Add");
        return false;
    }

    $.post("/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process", {
        values_top: values_top,
        values_down: values_down,
        process: process
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {
            new PNotify({
                title: 'ADDED!',
                text: 'ADDED!',
                addclass: 'bg-warning border-warning'
            });
            $("i.ic").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
            $("#add_tax").text("Add");
            setTimeout(redirect, 1000);
        }
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/tax/tax_set");
    }
}

function del_tax(id) {
    var vSkyDelId = id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.taxDel" + vSkyDelId).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process",
            type: 'POST',
            data: {
                vSkyDelId: vSkyDelId
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkyDel) {

                    $("i.taxDel" + vSkyDelId).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

    function redirect() {
        window.location.assign("/payroll/mainAdmin_assets/members_assets/tax/tax_set");
    }
}

function display_tax(id) {
    $.post("/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process", {
        id: id
    }, function (r) {
        var r = JSON.parse(r);
        $("#edit_emp").val(r.convEmp);
        $("#edit_emp_converted").val(r.mainEmp);
        $("#empler_edit").val(r.convEmpl);
        $("#edit_empler_convert").val(r.mainEmpl);
        $("#edit_total").val(r.convTotal + "%");
        $("#edit_id").val(r.vSkyId);
    });
}

function update_tax() {
    $("i.iup").removeClass("icon-plus3").addClass("icon-spinner9 spinner chk_dell");
    $("#update_tax").text("Updating...");

    var vSkyEmp = $("#edit_emp").val(),
        vSkyEmpConv = $("#edit_emp_converted").val(),
        vSkyEmpler = $("#empler_edit").val(),
        vSkyEmplerConv = $("#edit_empler_convert").val(),
        vSkyTotal = $("#edit_total").val(),
        vSkyConvTotal = parseFloat(vSkyEmpConv) + parseFloat(vSkyEmplerConv),
        vSkyEmpID = $("#edit_id").val();

    $.post("/payroll/mainAdmin_assets/members_assets/tax/includes/vSky_tax_process", {
            vSkyEmpConv: vSkyEmpConv,
            vSkyEmplerConv: vSkyEmplerConv,
            vSkyConvTotal: vSkyConvTotal,
            vSkyEmpID: vSkyEmpID
        },
        function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {
                $("i.iup").removeClass("icon-spinner9 spinner").addClass("icon-plus3 chk_dell");
                $("#update_tax").text("Update");

                $("#vSkyEmp").text(r.vSkyEmpOrg)
                $("#vSkyEmpler").text(r.vSkyEmplerOrg)

                new PNotify({
                    title: 'Updated!',
                    text: 'Updated!',
                    addclass: 'bg-success border-success'
                });
            } else {
                new PNotify({
                    title: 'ERROR!',
                    text: 'Could not Updated Please Try Again Later!',
                    addclass: 'bg-error border-error'
                });
            }
        });

}

function del_chkd_mem() {
    // Setup
    var post_arr = [];
    // Get checked checkboxes
    $('#recordsTable2 input[type=checkbox]').each(function () {
        if (jQuery(this).is(":checked")) {
            var id = this.id;
            var splitid = id.split('_');
            var postid = splitid[1];

            post_arr.push(postid);

            //  console.log(splitid);

        }
    });
    // console.log(post_arr);

    if (post_arr.length > 0) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to Delete? Changes can not be reverted!!!</p>',
            hide: false,
            type: 'error',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })

        notice.get().on('pnotify.confirm', function () {

            // AJAX Request
            $(".labll").after("<i class='icon-spinner9 spinner mr-1 chk_dell'></i>")
            $(".labll").text("Deleting Please Wait...");
            $.ajax({
                url: "/payroll/mainAdmin_assets/members_assets/includes/process_emp",
                type: "POST",
                data: {
                    post_id: post_arr
                },
                success: function (response) {
                    console.dir(response);
                    if (response == "_suc") {
                        $("i").remove(".chk_dell");
                        $(".labll").text("Delete Checked");

                        var all_check_box = document.getElementById('selectall');

                        if (all_check_box.checked) {
                            all_check_box.checked = false;
                        }

                        $.each(post_arr, function (i, l) {
                            $("#row_" + l).remove();
                        });
                        new PNotify({
                            title: 'Success!',
                            text: 'Deleted!',
                            addclass: 'bg-success border-success'
                        });
                    }
                }
            });
        })
        // On cancel
        notice.get().on('pnotify.cancel', function () {

        });
    } else {

        new PNotify({
            title: 'Error',
            text: 'Check to Delete!',
            addclass: 'bg-danger border-danger'
        });
    }
}

function del_al_mem() {
    var post_arr = [];

    $('#recordsTable2 input[type=checkbox]').each(function () {
        var id = this.id;
        var splitid = id.split('_');
        var postid = splitid[1];

        post_arr.push(postid);

    });

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete all Employees type? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })
    var post_all = "post_all";

    notice.get().on('pnotify.confirm', function () {

        // AJAX Request
        $(".labll2").after("<i class='icon-spinner9 spinner mr-1 chk_dell'></i>")
        $(".labll2").text("Deleting Please Wait...");
        $.ajax({
            url: '/payroll/mainAdmin_assets/members_assets/includes/process_emp',
            type: 'POST',
            data: {
                post_all: post_all
            },
            success: function (response) {
                //console.log(response);
                var response = JSON.parse(response);
                if (response.vSkyDel) {

                    $("i").remove(".chk_dell");
                    $(".labll2").text("Delete All");

                    var all_check_box = document.getElementById('selectall');

                    if (all_check_box.checked) {
                        all_check_box.checked = false;
                    }
                    $.each(post_arr, function (i, l) {
                        $("#row_" + l).remove();
                    });

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    //setTimeout(redirect_new, 1000);


                } else if (response == "_err") {
                    $("i").remove(".chk_dell");
                    $(".labll2").text("Delete All");
                }
            }
        });
    })

    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'Success!',
            text: 'Canceled!',
            addclass: 'bg-success border-success'
        });
    });

}

function redirect_new(path_file) {
    window.location.assign("/payroll/mainAdmin_assets/members_assets/view_mem");
}

function addEmp() {
    var emp_name = $("#emp_name").val();
    var emp_number = $("#emp_number").val();
    var emp_email = $("#emp_email").val();
    var emp_nat = $("#emp_nat").val();
    var empBankNumber = $("#empBankNumber").val();
    var empBankBranch = $("#empBankBranch").val();
    var empSSNIT = $("#empSSNIT").val();
    var empAddInfo = $("textarea#empAddInfo").val();
    var vSkyeCategory = $("#vSkyeCategory").val();
    var vSkyeDepartment = $("#vSkyeDepartment").val();
    var vSkyePosition = $("#vSkyePosition").val();
    var empBasicSal = $("#empBasicSal").val();
    var empPaye = $("#empPaye").val();

    if (empBasicSal == "") {
        new PNotify({
            title: 'Info!',
            text: 'New Employees Basic Salary Can Not Be Empty!',
            addclass: 'bg-info border-info'
        });
        $("#empBasicSal").css("border", "1px solid red");
        $("#empBasicSal").css("box-shadow", "0 0 0 solid red");
    } else if (emp_name == "") {
        new PNotify({
            title: 'Info!',
            text: 'Name Filed Can Not be Empty!',
            addclass: 'bg-info border-info'
        });
    } else {

        $("i.addEmp").removeClass("icon-paperplane").addClass("icon-spinner9 spinner chk_dell");
        $("#addEm").text("Adding Please Wait...");

        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
            emp_name: emp_name,
            emp_number: emp_number,
            emp_email: emp_email,
            emp_nat: emp_nat,
            empBankNumber: empBankNumber,
            empBankBranch: empBankBranch,
            empSSNIT: empSSNIT,
            empAddInfo: empAddInfo,
            vSkyeCategory: vSkyeCategory,
            vSkyeDepartment: vSkyeDepartment,
            vSkyePosition: vSkyePosition,
            empBasicSal: empBasicSal,
            empPaye: empPaye
        }, function (f) {
            var f = JSON.parse(f);
            console.log(f);
            if (f.vSkySuc) {
                new PNotify({
                    title: 'Success!',
                    text: 'Added!',
                    addclass: 'bg-success border-success'
                });
                setTimeout(redirect_new, 1000);
                $("i.addEmp").removeClass("icon-spinner9 spinner chk_dell").addClass("icon-paperplane chk_dell");
                $("#addEm").text("Add");

            } else if (f.ssnit == "ssnit") {
                new PNotify({
                    title: 'Warning!',
                    text: 'SSNIT Value In Use!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.addEmp").removeClass("icon-spinner9 spinner chk_dell").addClass("icon-paperplane chk_dell");
                $("#addEm").text("Add");
            } else if (f.vSkySuc == "false") {
                new PNotify({
                    title: 'ERROR!',
                    text: 'Counld Not Add. Try Again Later!',
                    addclass: 'bg-error border-error'
                });
            }
        })
    }


}

function updateEmpEmp() {

    var e_id = $("#vSkyEmpIDDD").val();
    var e_name = $("#vSkyName").val();
    var e_phone = $("#vSkyPhone").val();
    var e_email = $("#vSkyEmail").val();
    var e_nation = $("#vSkyNation").val();
    var e_bankNo = $("#vSkyBankNum").val();
    var e_bankbranch = $("#vSkyBankBranch").val();
    var e_ssnit = $("#vSkySsnit").val();
    var e_otherInfo = $("#vSkyOtherInfo").val();

    $("i.updateEmpEmp").removeClass("icon-reset").addClass("icon-spinner9 spinner chk_dell");
    $("#updatePos").text("Updating...");

    if (e_id == "") {
        new PNotify({
            title: 'Info!',
            text: 'Name Filed Can Not be Empty!',
            addclass: 'bg-info border-info'
        });
    } else if (e_bankNo == "") {
        new PNotify({
            title: 'Info!',
            text: 'bank No. Filed Can Not be Empty!',
            addclass: 'bg-info border-info'
        });
    } else {
        $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
            e_id: e_id,
            e_name: e_name,
            e_phone: e_phone,
            e_email: e_email,
            e_nation: e_nation,
            e_bankNo: e_bankNo,
            e_bankbranch: e_bankbranch,
            e_ssnit: e_ssnit,
            e_otherInfo: e_otherInfo
        }, function (f) {
            var f = JSON.parse(f);
            console.log(f);
            if (f.vSkySuc) {
                new PNotify({
                    title: 'Success!',
                    text: 'Updated!',
                    addclass: 'bg-success border-success'
                });
                setTimeout(redirect_new, 1000);
                $("i.updateEmpEmp").removeClass("icon-spinner9 spinner chk_dell").addClass("icon-reset chk_dell");
                $("#updatePos").text("Update");

            } else if (f.empNotFound) {
                new PNotify({
                    title: 'Warning!',
                    text: 'Employee Not Found!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.updateEmpEmp").removeClass("icon-spinner9 spinner chk_dell").addClass("icon-reset chk_dell");
                $("#updatePos").text("Update");
            } else {
                new PNotify({
                    title: 'ERROR!',
                    text: 'Counld Not Update At. Try Again Later!',
                    addclass: 'bg-error border-error'
                });
            }
        });
    }

}

function redirect_new() {
    window.location.assign("/payroll/mainAdmin_assets/members_assets/view_mem");
}

function view_emp(id) {
    var vSkyEmpIdd = id;
    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
        vSkyEmpIdd: vSkyEmpIdd
    }, function (r) {
        var r = JSON.parse(r);
        if (r.vSkySuc) {

            $("#vSkyEmpIDDD").val(r.vSkyEmpDbEmpID);
            $("#vSkyNameView").val(r.vSkyEmpDbName);
            $("#vSkyPhoneView").val(r.vSkyEmpDbPhone);
            $("#vSkyEmailView").val(r.vSkyEmpDbEmail);
            $("#vSkyNationView").val(r.vSkyEmpDbNation);
            $("#vSkyBankNumView").val(r.vSkyEmpDbbankNo);
            $("#vSkyBankBranchView").val(r.vSkyEmpDbbankBranch);
            $("#vSkySsnitView").val(r.vSkyEmpDbSsint);
            $("#vSkyOtherInfoView").val(r.vSkyEmpDbOtherInfo);
            $("#vSkyBasSalView").val(r.vSkyEmpDbBasic);
            $("#vSkyAllowView").val(r.vSkyEmpDbAllowance);
            $("#vSkyGrossSalView").val(r.vSkyEmpDbGross);
            $("#vSkyPayeView").val(r.vSkyEmpDbPaye);
            $("#vSkyBideducView").val(r.vSkyEmpDbBicycleDuc);
            $("#vSkyNetSalView").val(r.vSkyEmpDbNetSal);
            $("#vSkyNetSalPayView").val(r.vSkyEmpDbNetSalPayable);
            $("#vSkyTaxableSalView").val(r.vSkyEmpDbTaxableSal);
            $("#vSkyTotStatDucView").val(r.vSkyEmpDbTotStatDuc);
            $("#vSkyDebtbddView").val(r.vSkyEmpDbDebtBal);
            $("#vSkyCurLoanSurView").val(r.vSkyEmpDbCurLoanSur);
            $("#vSkyDebtSalView").val(r.vSkyEmpDbTotDebt);
            $("#vSkyDeducTionsView").val(r.vSkyEmpDbDuc);
            $("#vSkyBalawtSalView").val(r.vSkyEmpDbBalanceAwt);
            $("#vSkyTotDucSalView").val(r.vSkyEmpDbTotDuc);
        }
    })
}

function get_emp_infos(id) {
    var getIdsAl = id;

    $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
        getIdsAl: getIdsAl
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#payEmpID").val(r.vSkyTDbTID);
            $("#payEmpName").val(r.vSkyTDbName);
            $("#payEmpPDate").val(r.vSkyTDbDate);
            $("#payEmpBankNo").val(r.vSkyTDbbankNo);
            $("#payEmpBankBranch").val(r.vSkyTDbbankBranch);
            $("#payEmpSsnit").val(r.vSkyTDbSsint);
            $("#payEmpcomment").val(r.vSkyTDbConmments);
            //////////////////////////////////////////////////////////////////////////
            $("#payEmpPosID").val(r.vSkyTDbPosId);
            $("#payEmpDeptID").val(r.vSkyTDbDeptId);
            $("#payEmpCatID").val(r.vSkyTDbMainCatId);
            //////////////////////////////////////////////////////////////////////////
            $("#payEmpbasic").val(r.vSkyTDbBasic);
            $("#payEmpCurLoanSur").val(r.vSkyTDCurLoanSurCharges);
            $("#payEmpDescrp").val(r.vSkyTDbDescriptioin);
            $("#payEmpBicyc").val(r.vSkyTDbBicycleDuc);
            $("#payEmpDebtBal").val(r.vSkyTDbDebtBal);
            $("#payEmpPayMethod").val(r.vSkyTDbPaymentsMethod);
            $("#payEmpTotDebt").val(r.vSkyTDbTotDebt);
            $("#payEmpDeduct").val(r.vSkyTDbDuction);
            $("#payEmpBlaAwt").val(r.vSkyTDbBalanceAwt);
            $("#payEmpTotDeduc").val(r.vSkyTDbTotDuc);
            $("#payEmpCatName").val(r.payEmpCatName);
            var percentage_ssf = 100,
                orgPercentageEmp = r.vSkyEmpPercnt * percentage_ssf,
                orgPercentageEmpler = r.vSkyEmplerPercnt * percentage_ssf;
            $("#taxEmpP").text(orgPercentageEmp)
            $("#taxEmplerP").text(orgPercentageEmpler)


            //                    $data['vSkyTTickEmpTax'] = $vSkyRow['employee_ssf'];
            //                    $data['vSkyEmpTickEmplerTax'] = $vSkyRow['employer_ssf'];
            //                    $data['vSkyEmpEmpleeTax'] = $vSkyRow['employee_%'];
            //                    $data['vSkyEmpEmplerTax'] = $vSkyRow['employer_%'];

            //            var ssfEmplee = parseFloat(r.vSkyTTickTTax),
            //                abs = parseFloat(r.vSkyTDbBasic / percentage_ssf),
            //                emptaxPer = parseFloat(ssfEmplee / abs);
            //
            //            var ssfEmpler = parseFloat(r.vSkyTTickTlerTax),
            //                abst = parseFloat(r.vSkyTDbBasic / percentage_ssf),
            //                emplertaxPer = parseFloat(ssfEmpler / abst);
            //
            //            $("#taxEmpP").text(parseFloat(emptaxPer).toFixed(2));
            //            $("#employeePercentage").text(parseFloat(emptaxPer).toFixed(2));
            //            $("#taxEmplerP").text(parseFloat(emplertaxPer).toFixed(2));
            //            $("#employerPercentage").text(parseFloat(emplertaxPer).toFixed(2));
            //
            //            var realchkemp = parseFloat(emptaxPer / percentage_ssf),
            //                hdemp = parseFloat(r.vSkyTTickTTax / realchkemp);
            //
            //            if (emptaxPer == 0) {
            //                $("input[name=tax][value='emp']").prop('checked', false);
            //                $("input[name=tax][value='empler']").prop('checked', false);
            //            } else if (hdemp.toFixed(2) == parseFloat(r.vSkyTDbBasic)) {
            //                $("input[name=tax][value='emp']").prop('checked', true);
            //                $("input[name=tax][value='empler']").prop('checked', false);
            //            } else if (hdemp.toFixed(2) != parseFloat(r.vSkyTDbBasic)) {
            //                $("input[name=tax][value='emp']").prop('checked', false);
            //                $("input[name=tax][value='empler']").prop('checked', true);
            //            }
        } else if (r.not_on_payroll) {
            new PNotify({
                title: 'INFO!',
                text: 'Employee Is Not On The Payroll List Please Added Him/Her To The Current One Before You Can Generate A New Payroll For Him/Her!',
                addclass: 'bg-info border-info'
            });
        }
    })
}

function display_emp(id) {
    var vSkyEmpIdd = id;

    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_emp", {
        vSkyEmpIdd: vSkyEmpIdd
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#vSkyEmpIDDD").val(r.vSkyEmpDbEmpID);
            $("#vSkyName").val(r.vSkyEmpDbName);
            $("#vSkyPhone").val(r.vSkyEmpDbPhone);
            $("#vSkyEmail").val(r.vSkyEmpDbEmail);
            $("#vSkyNation").val(r.vSkyEmpDbNation);
            $("#vSkyBankNum").val(r.vSkyEmpDbbankNo);
            $("#vSkyBankBranch").val(r.vSkyEmpDbbankBranch);
            $("#vSkySsnit").val(r.vSkyEmpDbSsint);
            $("#vSkyOtherInfo").val(r.vSkyEmpDbOtherInfo);
            //////////////////////////////////////////////////////////////////////////
            $("#vSkyEmpDbPosId").val(r.vSkyEmpDbPosId);
            $("#vSkyEmpDbDeptId").val(r.vSkyEmpDbDeptId);
            $("#vSkyEmpDbMainCatId").val(r.vSkyEmpDbMainCatId);
            //////////////////////////////////////////////////////////////////////////
            $("#vSkyBasSal").val(r.vSkyEmpDbBasic);
            $("#vSkyAllow").val(r.vSkyEmpDbAllowance);
            $("#vSkyGrossSal").val(r.vSkyEmpDbGross);
            $("#vSkyPaye").val(r.vSkyEmpDbPaye);
            $("#vSkyBideduc").val(r.vSkyEmpDbBicycleDuc);
            $("#vSkyNetSal").val(r.vSkyEmpDbNetSal);
            $("#vSkyNetSalPay").val(r.vSkyEmpDbNetSalPayable);
            $("#vSkyTaxableSal").val(r.vSkyEmpDbTaxableSal);
            $("#vSkyTotStatDuc").val(r.vSkyEmpDbTotStatDuc);
            $("#vSkyDebtbdd").val(r.vSkyEmpDbDebtBal);
            $("#vSkyCurLoanSur").val(r.vSkyEmpDbCurLoanSur);
            $("#vSkyDebtSal").val(r.vSkyEmpDbTotDebt);
            $("#vSkyDeducTions").val(r.vSkyEmpDbDuc);
            $("#vSkyBalawtSal").val(r.vSkyEmpDbBalanceAwt);
            $("#vSkyTotDucSal").val(r.vSkyEmpDbTotDuc);
            $("#vSkyEmpSsf").val(r.vSkyEmpTickEmpTax);
            $("#vSkyEmplerSsf").val(r.vSkyEmpTickEmplerTax);

            //        $data['vSkyEmpTickEmpTax'] = $vSkyRow['employee_ssf'];
            //        $data['vSkyEmpTickEmplerTax'] = $vSkyRow['employer_ssf'];
            //        $data['vSkyEmpEmpleeTax'] = $vSkyRow['employee_%'];
            //        $data['vSkyEmpEmplerTax'] = $vSkyRow['employer_%'];
            //
            //            var ssfEmplee = parseFloat(r.vSkyEmpTickEmpTax),
            //                percentage_ssf = 100,
            //                abs = parseFloat(r.vSkyEmpDbBasic / percentage_ssf),
            //                emptaxPer = parseFloat(ssfEmplee / abs);
            //
            //            var ssfEmpler = parseFloat(r.vSkyEmpTickEmplerTax),
            //                abst = parseFloat(r.vSkyEmpDbBasic / percentage_ssf),
            //                emplertaxPer = parseFloat(ssfEmpler / abst);
            //
            //            $("#taxEmpP").text(parseFloat(emptaxPer).toFixed(2));
            //            $("#employeePercentage").text(parseFloat(emptaxPer).toFixed(2));
            //            $("#taxEmplerP").text(parseFloat(emplertaxPer).toFixed(2));
            //            $("#employerPercentage").text(parseFloat(emplertaxPer).toFixed(2));
            //
            //            var realchkemp = parseFloat(emptaxPer / percentage_ssf),
            //                hdemp = parseFloat(r.vSkyEmpTickEmpTax / realchkemp);
            //
            //            if (emptaxPer == 0) {
            //                $("input[name=tax][value='emp']").prop('checked', false);
            //                $("input[name=tax][value='empler']").prop('checked', false);
            //            } else if (hdemp.toFixed(2) == parseFloat(r.vSkyEmpDbBasic)) {
            //                $("input[name=tax][value='emp']").prop('checked', true);
            //                $("input[name=tax][value='empler']").prop('checked', false);
            //            } else if (hdemp.toFixed(2) != parseFloat(r.vSkyEmpDbBasic)) {
            //                $("input[name=tax][value='emp']").prop('checked', false);
            //                $("input[name=tax][value='empler']").prop('checked', true);
            //            }
        }
    })
}

function del_al_slip() {
    var post_arr = [];

    $('#payroll_form input[type=checkbox]').each(function () {
        if (jQuery(this).is(":checked")) {
            var id = this.id;
            var splitid = id.split('_');
            var postid = splitid[1];

            post_arr.push(postid);
        }
    });

    if (post_arr.length > 0) {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete all slips? Changes can not be reverted!!!</p>',
            hide: false,
            type: 'error',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })
        var post_all = "post_all";

        notice.get().on('pnotify.confirm', function () {

            // AJAX Request
            $(".labllPay").after("<i class='icon-spinner9 spinner mr-1 chk_dell'></i>")
            $(".labllPay").text("Deleting Please Wait...");
            $.ajax({
                url: '/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips',
                type: 'POST',
                data: {
                    post_all: post_all,
                    post_all_chk: post_arr
                },
                success: function (response) {
                    //console.log(response);
                    var response = JSON.parse(response);
                    if (response.vSkyDel) {

                        $("i").remove(".chk_dell");
                        $(".labllPay").text("Delete All");

                        var all_check_box = document.getElementById('selectall');

                        if (all_check_box.checked) {
                            all_check_box.checked = false;
                        }
                        $.each(post_arr, function (i, l) {
                            $("#row_" + l).remove();
                        });

                        new PNotify({
                            title: 'Success!',
                            text: 'Deleted!',
                            addclass: 'bg-success border-success'
                        });

                        //setTimeout(redirect_new, 1000);


                    } else if (response == "_err") {
                        $("i").remove(".chk_dell");
                        $(".labllPay").text("Delete All");
                    }
                }
            });
        })

        notice.get().on('pnotify.cancel', function () {
            new PNotify({
                title: 'Success!',
                text: 'Canceled!',
                addclass: 'bg-success border-success'
            });
        });


    } else {

        new PNotify({
            title: 'Error',
            text: 'Check to Delete!',
            addclass: 'bg-danger border-danger'
        });
    }
}

//////////////////////////////////// Validation Center /////////////////////////////////////////////////////////////////////////

$(function () {
    $(document).on("keydown", ".numbersonly-format", function (event) {
        // Prevent shift key since its not needed
        if (event.shiftKey == true) {
            event.preventDefault();
        }
        // Allow Only: keyboard 0-9, numpad 0-9, backspace, tab, left arrow, right arrow, delete
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.which == 190) {
            // Allow normal operation
        } else {
            // Prevent the rest
            event.preventDefault();
        }
    });

    $(document).on("keydown", ".wordsonly-format", function (event) {
        // Allow Only: keyboard a-zA-Z, Shift, backspace, tab, left arrow, right arrow, delete
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
            // Prevent the rest
            event.preventDefault();
        } else {
            // Allow normal operation
        }
    });


    $(document).bind('cut copy paste', '#email, .numbersonly-format, .wordsonly-format', function (e) {
        e.preventDefault();
    });

    //Disable mouse right click
    $(document).on("contextmenu", "#email, .numbersonly-format, .wordsonly-format", function (e) {
        return false;
    });

    $("#email").keyup(function () {
        var editMemeberEmail = $("#email").val();
        $("#email-error").remove();
        $("#email").after('<label id="email-error" class="validation-invalid-label" for="email">Invalid Email Address</label>');

        if (validateEmail(editMemeberEmail)) {
            $("#email-error").remove();
            $("#email").after('<label id="email-error" class="validation-invalid-label validation-valid-label" for="email"> Valid Email </label>');
        } else {
            $("#email-error").remove();
            $("#email").after('<label id="email-error" class="validation-invalid-label" for="email">Invalid Email Address</label>');
        }

        if (editMemeberEmail.length == 0) {
            $("#email-error").remove();
        }


    })


    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        } else {
            return false;
        }
    }


})

/////////////////////////////////// end Validation Center /////////////////////////////////////////////////////////////////////////
var load_ = '';
$.load = function () {
    $.post("/payroll/includes/server_load", {
        a_Se: "a_Se"
    }, (_d_load, _s_after_s) => {
        load_ = _d_load;
        $("#data_val").html(load_ + "%");
    });
}

setInterval($.load, 3000);

function update_sys_config(id) {

    var com_name = $("#com_name_id").val(),
        com_id = id,
        currency = $("#sys_currency_id").val(),
        com_location = $("#com_location_id").val(),
        bank_location = $("#bank_location_id").val(),
        name_on_payroll = $("#name_on_payroll_id").val(),
        bank_name = $("#bank_name_id").val(),
        email = $("#email_id").val(),
        tel = $("#tel_id").val(),
        process = "update_sys";

    $("#update_text_span").text("Updating...");
    $("i.sys_icon").removeClass("icon-paperplane").addClass("icon-spinner4 spinner");

    $.post("/payroll/includes/sys_config", {
            com_name: com_name,
            currency: currency,
            com_location: com_location,
            bank_location: bank_location,
            name_on_payroll: name_on_payroll,
            bank_name: bank_name,
            email: email,
            tel: tel,
            process: process,
            com_id: com_id
        },
        function (r) {
            var r = JSON.parse(r);
            console.log(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'UPDATED',
                    text: 'UPDATED!',
                    addclass: 'bg-success border-success'
                });
                setTimeout(redirect, 1000);
            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/members_assets/sys_set");
            }
        })
}

function display_u(id) {
    var get_u_id = id,
        p = "get_info";

    $.post("/payroll/mainAdmin_assets/members_assets/includes/process_new_user", {
        get_u_id: get_u_id,
        p: p
    }, function (r) {
        var r = JSON.parse(r);
        console.log(r);
        if (r.vSkySuc) {
            $("#u_category").val(r.u_category);
            $("#u_name").val(r.u_name);
            $("#u_department").val(r.u_department);
            $("#u_position").val(r.u_position);
            $("#c_u_type").val(r.c_u_type);
            $("#u_id_id").val(r.u_id_id);
        }
    })
}

function updateUser() {

    var curl_u_id = $("#u_id_id").val(),
        sel_type = $("#e_tS").val();

    if (sel_type == 0) {

        new PNotify({
            title: 'Warning',
            text: 'Select A New User Type To Update With. Click Close To keep Old User Type',
            addclass: 'bg-warning border-warning'
        });

        return false;
    } else {

        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to change the user type!!!</p>',
            hide: false,
            type: 'warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm btn-primary'
                    },
                    {
                        addClass: 'btn btn-sm btn-link'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            }
        })

        notice.get().on('pnotify.confirm', function () {

            $("i.updateU").removeClass("icon-reset").addClass("icon-spinner9 spinner chk_dell");

            $.ajax({
                url: "/payroll/mainAdmin_assets/members_assets/includes/process_new_user",
                type: 'POST',
                data: {
                    curl_u_id: curl_u_id,
                    sel_type: sel_type,
                    prcs: "update"
                },
                success: function (r) {
                    var r = JSON.parse(r);
                    console.dir(r);
                    if (r.vSkySuc) {

                        $("i.updateU").removeClass("icon-spinner9 spinner").addClass("icon-reset chk_dell");

                        new PNotify({
                            title: 'Success!',
                            text: 'Updated!',
                            addclass: 'bg-success border-success'
                        });

                        setTimeout(redirect, 1000);

                    } else if (r.not_ad == "nt_ad") {

                        new PNotify({
                            title: 'Warning',
                            text: 'Unknown User Type!!!',
                            addclass: 'bg-warning border-warning'
                        });

                    } else {

                        new PNotify({
                            title: 'ERROR',
                            text: 'Error Updating User Type!!!',
                            addclass: 'bg-warning border-warning'
                        });

                    }

                    function redirect() {
                        window.location.assign("/payroll/mainAdmin_assets/members_assets/add_u");
                    }
                }
            });
        })

    }
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function del_u(id) {

    var u_id = id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $("i.mainUDel" + u_id).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/members_assets/includes/process_new_user",
            type: 'POST',
            data: {
                u_id: u_id,
                del: 'del'
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkySuc) {

                    $("i.mainUDel" + u_id).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                } else if (r.nun == "u_nun") {

                    new PNotify({
                        title: 'Warning',
                        text: 'Unknown User!!!',
                        addclass: 'bg-warning border-warning'
                    });

                } else {

                    new PNotify({
                        title: 'ERROR',
                        text: 'Error Deleting User!!!',
                        addclass: 'bg-warning border-warning'
                    });

                }

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/members_assets/add_u");
                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}
////////////////////////////////////////////// secretary side //////////////////////////////////////////
////////////////////////////////////////////// secretary side //////////////////////////////////////////
////////////////////////////////////////////// secretary side //////////////////////////////////////////

function aplytruck() {
    var eAmpID = $("#eAmpID").val(),
        eAmpName = $("#eAmpName").val(),
        eAmpCatName = $("#eAmpCatName").val(),
        truckNumber = $("#truckNumber").val(),
        apply_truck = $("#apply_truck").val(),
        truck = "truck";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
        eAmpID: eAmpID,
        eAmpName: eAmpName,
        eAmpCatName: eAmpCatName,
        truckNumber: truckNumber,
        truck: truck
    }, function (r) {

        var r = JSON.parse(r);
        console.log(r);

        if (r.vSkySuc) {

            new PNotify({
                title: 'NOTICE.!',
                text: 'Truck Added To The Driver. Please Click The Assign Button To Assign The Driver To The Truck',
                addclass: 'bg-success border-success'
            });

            setTimeout(redirect, 1000);

        } else if (r.truck_found == "truckNo") {

            new PNotify({
                title: 'INFO.!',
                text: 'Truck Already Has A Driver!',
                addclass: 'bg-info border-info'
            });

        } else {

            new PNotify({
                title: 'INFO.!',
                text: 'Error Adding Truck To The Driver!',
                addclass: 'bg-warning border-warning'
            });

        }


        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
        }



    })
}

function del_truck(emp_id) {

    var emp_id = emp_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete? Changes can not be reverted!!!</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        //        $("i.mainUDel" + u_id).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/c_members_assets/includes/process_truck",
            type: 'POST',
            data: {
                emp_id: emp_id,
                del: 'del'
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkySuc) {

                    //                    $("i.mainUDel" + u_id).removeClass("icon-spinner9 spinner").addClass("icon-trash chk_dell");

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                } else if (r.nun == "u_nun") {

                    new PNotify({
                        title: 'Warning',
                        text: 'Truck Not Found!!!',
                        addclass: 'bg-warning border-warning'
                    });

                } else {

                    new PNotify({
                        title: 'ERROR',
                        text: 'Error Deleting Truck!!!',
                        addclass: 'bg-warning border-warning'
                    });

                }

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function assign_truck(emp_id) {

    var ass_emp_id = emp_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Assigned Truck To Driver?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
            ass_emp_id: ass_emp_id,
            ass_process: "assign"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Assigned',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Assigning Truck',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}

function unassign_truck(emp_id) {

    var un_emp_id = emp_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to Unassigned Truck?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        //        $("i.mainUDel" + u_id).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
            un_emp_id: un_emp_id,
            un_process: "unassign"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Unassigned',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.unassErr == "unassErr") {

                new PNotify({
                    title: 'INFO...!',
                    text: 'There Seems To Be A Logic Problem. Please Consult Your Developers',
                    addclass: 'bg-warning border-warning'
                });

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Unassigning Truck',
                    addclass: 'bg-info border-info'
                });

            }

        });

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
        }
    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}

function del_mate(mate_id) {

    var del_mate_id = mate_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to delete this Mate?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        //        $("i.mainUDel" + u_id).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.ajax({
            url: "/payroll/mainAdmin_assets/c_members_assets/includes/process_truck",
            type: 'POST',
            data: {
                del_mate_id: del_mate_id,
                del_mate: 'del_mate'
            },
            success: function (r) {
                var r = JSON.parse(r);
                console.dir(r);
                if (r.vSkySuc) {

                    new PNotify({
                        title: 'Success!',
                        text: 'Deleted!',
                        addclass: 'bg-success border-success'
                    });

                    setTimeout(redirect, 1000);

                } else if (r.nun == "m_nun") {

                    new PNotify({
                        title: 'Warning',
                        text: 'Mate Not Found!!!',
                        addclass: 'bg-warning border-warning'
                    });

                } else {

                    new PNotify({
                        title: 'ERROR',
                        text: 'Error Deleting Mate!!!',
                        addclass: 'bg-warning border-warning'
                    });

                }

                function redirect() {
                    window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
                }
            }
        });
    })
    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function put_driver_id(driver_id) {
    $("#driver_id").val(driver_id);
}

function add_mate_to_driver(mate_id) {

    var add_mate_id = mate_id,
        driver_id = $("#driver_id").val();

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are you sure you want to add Mate?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        //        $("i.mainUDel" + u_id).removeClass("icon-trash").addClass("icon-spinner9 spinner chk_dell");

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
            add_mate_id: add_mate_id,
            add_driver_id: driver_id,
            add_process: "add_mate"
        }, function (r) {
            var r = JSON.parse(r);
            console.log(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Added Mate Successfully',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.unassErr == "unassErr") {

                new PNotify({
                    title: 'INFO...!',
                    text: 'There Seems To Be A Logic Problem. Please Consult Your Developers',
                    addclass: 'bg-warning border-warning'
                });

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Adding Mate To Driver',
                    addclass: 'bg-info border-info'
                });

            }

        });

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
        }
    });

    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function un_assign_mate(un_ass_emp_id) {

    var un_ass_emp_id_dr = un_ass_emp_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Unassigned Mate From Driver?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
            un_ass_emp_id_dr: un_ass_emp_id_dr,
            un_ass_process_mate: "un_assign_mate"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Unassigned',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Unassigning Mate',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function assign_mate(ass_emp_id) {

    var ass_emp_id_dr = ass_emp_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Assigned Mate To Driver?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_truck", {
            ass_emp_id_dr: ass_emp_id_dr,
            ass_process_mate: "assign_mate"
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Assigned',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Assigning Mate',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/d_v_manager");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function add_location() {

    var loadingPtName = $("#loadingPtName").val(),
        dischargingPtName = $("#dischargingPtName").val(),
        locRate = $("#locRate").val(),
        locDistance = $("#locDistance").val(),
        locFuel = $("#locFuel").val(),
        process = "add_location";

    if (loadingPtName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Loading Point Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#loadingPtName").css("border", "1px solid red");
        $("#loadingPtName").css("box-shadow", "0 0 0 solid red");

        return false;

    } else if (dischargingPtName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Discharging Point Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#dischargingPtName").css("border", "1px solid red");
        $("#dischargingPtName").css("box-shadow", "0 0 0  solid red");

        return false;

    } else {

        $("i.addLocIcon").removeClass("icon-plus3").addClass('icon-spinner9 spinner');
        $("#addLoc").text("Adding...");

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_location", {
            loadingPtName: loadingPtName,
            dischargingPtName: dischargingPtName,
            locRate: locRate,
            locDistance: locDistance,
            locFuel: locFuel,
            process: process
        }, function (r) {
            var r = JSON.parse(r);

            console.log(r);

            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Location Added Successfully!',
                    addclass: 'bg-success border-success'
                });

                $("i.addLocIcon").removeClass("icon-spinner9 spinner").addClass('icon-plus3');
                $("#addLoc").text("Add New Location");

                setTimeout(redirect, 1000);

            } else if (r.locFound == "locFound") {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Location Already In The System!',
                    addclass: 'bg-info border-info'
                });

                $("i.addLocIcon").removeClass("icon-spinner9 spinner").addClass('icon-plus3');
                $("#addLoc").text("Add New Location");

            } else {

                new PNotify({
                    title: 'ERROR.!',
                    text: 'Error Adding New Location!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.addLocIcon").removeClass("icon-spinner9 spinner").addClass('icon-plus3');
                $("#addLoc").text("Add New Location");

            }


            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/location_set");
            }

        });
    }
}

function display_loc(loc_id) {

    var location_id = loc_id,
        process_loc = "get_loc_info";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_location", {
        location_id: location_id,
        process_loc: process_loc
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {

            $("#editloadingPtName").val(r.loading_pt_name),
                $("#editdischargingPtName").val(r.discharging_pt_name),
                $("#editlocRate").val(r.rate),
                $("#editlocDistance").val(r.distance),
                $("#editlocFuel").val(r.fuel),
                $("#locId").val(r.id);

        } else if (r.locNotFount == "locNotFount") {

            new PNotify({
                title: 'ERROR.!',
                text: 'Illegal Location Supplied!',
                addclass: 'bg-warning border-warning'
            });

        } else {

            new PNotify({
                title: 'ERROR.!',
                text: 'Could Not Fetch Location Data!',
                addclass: 'bg-info border-info'
            });

        }
    });

}

function editLoc() {

    var editLoadingPt = $("#editloadingPtName").val(),
        editDischargingPt = $("#editdischargingPtName").val(),
        editrate = $("#editlocRate").val(),
        editDistance = $("#editlocDistance").val(),
        editFuel = $("#editlocFuel").val(),
        editId = $("#locId").val(),
        editProcess = "edit";

    if (editLoadingPt == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Loading Point Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#editloadingPtName").css("border", "1px solid red");
        $("#editloadingPtName").css("box-shadow", "0 0 0 solid red");

        return false;

    } else if (editDischargingPt == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Discharging Point Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#editdischargingPtName").css("border", "1px solid red");
        $("#editdischargingPtName").css("box-shadow", "0 0 0  solid red");

        return false;

    } else {

        $("i.updateLocIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner");
        $("#updateLoc").text("Updating...");


        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_location", {
            editLoadingPt: editLoadingPt,
            editDischargingPt: editDischargingPt,
            editrate: editrate,
            editDistance: editDistance,
            editFuel: editFuel,
            editId: editId,
            editProcess: editProcess
        }, function (r) {

            var r = JSON.parse(r);

            if (r.vSkySuc) {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Location Info. Update!',
                    addclass: 'bg-success border-success'
                });

                $("i.updateLocIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateLoc").text("Update");

                setTimeout(redirect, 1000);

            } else if (r.locFound == "locFound") {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Discharging Point to This Loading Point Exist. Please Use A Different Discharging Point Name!',
                    addclass: 'bg-info border-info'
                });

                $("i.updateLocIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateLoc").text("Update");

            } else {
                new PNotify({
                    title: 'INFO.!',
                    text: 'Error Updating Location Information!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.updateLocIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateLoc").text("Update");

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/location_set");
            }

        })

    }
}

function del_loc(loc_id) {

    var loc_id_del = loc_id,
        del_process = "del_loc";

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Delete This Location?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_location", {
            loc_id_del: loc_id_del,
            del_process: del_process
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Deleted',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.nun == "l_nun") {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Illegal Location Applied',
                    addclass: 'bg-info border-info'
                });

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Deleteing Location. Consult Your Admin.',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/location_set");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}

function addmMainCom() {

    var comName = $("#comName").val(),
        presentedTo = $("#presentedTo").val(),
        mainComName = $("#mainComName").val(),
        comLocation = $("#comLocation").val(),
        comTel = $("#comTel").val(),
        process_com = "add_main_com";

    if (comName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Company Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#comName").css("border", "1px solid red");
        $("#comName").css("box-shadow", "0 0 1 solid red");

        return false;

    } else {

        $("i.addComIcon").removeClass("icon-plus3").addClass("icon-spinner9 spinner");
        $("#add_com").text("Adding...");


        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_main_com", {
            comName: comName,
            presentedTo: presentedTo,
            mainComName: mainComName,
            comLocation: comLocation,
            comTel: comTel,
            process_com: process_com
        }, function (r) {

            var r = JSON.parse(r);

            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Added Successfully!',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.com_found == "com_found") {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Company Name Already Exists!',
                    addclass: 'bg-info border-info'
                });

                $("i.addComIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3");
                $("#add_com").text("Add Company");
            } else {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Error Adding Company Name!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.addComIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3");
                $("#add_com").text("Add Company");

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/main_company");
            }
        });

    }
}

function display_com(id) {

    var dis_com_id = id,
        pro_dis_com = "dis_process";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_main_com", {
        dis_com_id: dis_com_id,
        pro_dis_com: pro_dis_com
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {

            $("#vSkyComName").val(r.com_name);
            $("#edtPresentedTo").val(r.edtPresentedTo);
            $("#editMaincomName").val(r.editMaincomName);
            $("#edtLocation").val(r.edtLocation);
            $("#edtComTel").val(r.edtComTel);
            $("#vSkyComId").val(r.com_id);

        } else if (r.comNotFound == "comNotFound") {

            new PNotify({
                title: 'INFO.!',
                text: 'Illegal Company Name Supplied!',
                addclass: 'bg-warning border-warning'
            });

        } else {

            new PNotify({
                title: 'INFO.!',
                text: 'Can Not Get Company Info Now. Please Try Again Later!',
                addclass: 'bg-info border-info'
            });

        }

    });

}

function editMainCom() {

    var editComName = $("#vSkyComName").val(),
        editComId = $("#vSkyComId").val(),
        edtPresentedTo = $("#edtPresentedTo").val(),
        editMaincomName = $("#editMaincomName").val(),
        edtLocation = $("#edtLocation").val(),
        edtComTel = $("#edtComTel").val(),
        editComProcess = "edit";

    if (editComName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Company Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#vSkyComName").css("border", "1px solid red");
        $("#vSkyComName").css("box-shadow", "0 0 1 solid red");

        return false;

    } else {

        $("i.updateComIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner");
        $("#update_com").text("Updating...");

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_main_com", {
            editComName: editComName,
            edtPresentedTo: edtPresentedTo,
            editMaincomName: editMaincomName,
            edtLocation: edtLocation,
            edtComTel: edtComTel,
            editComId: editComId,
            editComProcess: editComProcess
        }, function (r) {

            var r = JSON.parse(r);

            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Company Name Updated!',
                    addclass: 'bg-success border-success'
                });

                $("i.updateComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#update_com").text("Update");

                setTimeout(redirect, 1000);

            } else if (r.comFound == "comFound") {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Company Name Already Exists!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.updateComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#update_com").text("Update");

            } else {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Error Updating Company Name!',
                    addclass: 'bg-info border-info'
                });

                $("i.updateComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#update_com").text("Update");

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/main_company");
            }

        });

    }

}

function del_com(id) {

    var com_id_del = id,
        del_process = "del_com";

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Delete This Company Name?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_main_com", {
            com_id_del: com_id_del,
            del_process: del_process
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Deleted',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.nun == "l_nun") {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Illegal Company Name Applied',
                    addclass: 'bg-info border-info'
                });

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Deleteing Company. Consult Your Admin.',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/main_company");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });


}

function add_sub_com() {

    var subComName = $("#vSkySubComName").val(),
        comId = $("#comVsky").val(),
        ttPresentedTo = $("#ttPresentedTo").val(),
        ttMaincomName = $("#ttMaincomName").val(),
        ttLocation = $("#ttLocation").val(),
        ttComTel = $("#ttComTel").val(),
        process_sub_com = "add_sub_com";

    if (subComName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Sub Company Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#vSkySubComName").css("border", "1px solid red");
        $("#vSkySubComName").css("box-shadow", "0 0 1 solid red");

        return false;

    } else {

        $("i.addSubComIcon").removeClass("icon-plus3").addClass("icon-spinner9 spinner");
        $("#addSubCom").text("Adding...");


        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_sub_company", {
            subComName: subComName,
            comId: comId,
            ttPresentedTo: ttPresentedTo,
            ttMaincomName: ttMaincomName,
            ttLocation: ttLocation,
            ttComTel: ttComTel,
            process_sub_com: process_sub_com

        }, function (r) {

            var r = JSON.parse(r);
            console.log(r);

            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Added Successfully!',
                    addclass: 'bg-success border-success'
                });

                $("i.addSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3");
                $("#addSubCom").text("Add Sub Company");

                setTimeout(redirect, 1000);

            } else if (r.sub_com_found == "sub_com_found") {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Sub Company Name Already Exists!',
                    addclass: 'bg-info border-info'
                });

                $("i.addSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3");
                $("#addSubCom").text("Add Sub Company");
            } else {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Error Adding Sub Company Name!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.addSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-plus3");
                $("#addSubCom").text("Add Sub Company");

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/sub_company");
            }
        });

    }
}

function display_sub_com(id) {

    var dis_sub_com = id,
        pro_dis_sub_com = "dis_process";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_sub_company", {
        dis_sub_com: dis_sub_com,
        pro_dis_sub_com: pro_dis_sub_com
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {

            $("#vSkyEditSubComName").val(r.sub_com_name);
            $("#ettPresentedTo").val(r.ettPresentedTo);
            $("#ettMaincomName").val(r.ettMaincomName);
            $("#ettLocation").val(r.ettLocation);
            $("#ettComTel").val(r.ettComTel);
            $("#vSkySubComId").val(r.sub_com_id);
            $("#vSkyComId").val(r.com_id);

        } else if (r.comNotFound == "comNotFound") {

            new PNotify({
                title: 'INFO.!',
                text: 'Illegal Sub Company Name Supplied!',
                addclass: 'bg-warning border-warning'
            });

        } else {

            new PNotify({
                title: 'INFO.!',
                text: 'Can Not Get Sub Company Info Now. Please Try Again Later!',
                addclass: 'bg-info border-info'
            });

        }

    });

}

function editSubCom() {

    var vSkyCom = $("#vSkyCom").val(),
        vSkyEditSubComName = $("#vSkyEditSubComName").val(),
        ettPresentedTo = $("#ettPresentedTo").val(),
        ettMaincomName = $("#ettMaincomName").val(),
        ettLocation = $("#ettLocation").val(),
        ettComTel = $("#ettComTel").val(),
        vSkySubComId = $("#vSkySubComId").val(),
        vSkyComId = $("#vSkyComId").val(),
        editComProcess = "edit";

    if (vSkyEditSubComName == "") {

        new PNotify({
            title: 'INFO.!',
            text: 'Sub Company Name Needed!',
            addclass: 'bg-info border-info'
        });

        $("#vSkyEditSubComName").css("border", "1px solid red");
        $("#vSkyEditSubComName").css("box-shadow", "0 0 1 solid red");

        return false;

    } else {

        $("i.updateSubComIcon").removeClass("icon-reset").addClass("icon-spinner9 spinner");
        $("#updateSubCom").text("Updating...");

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_sub_company", {
            vSkyCom: vSkyCom,
            vSkyEditSubComName: vSkyEditSubComName,
            ettPresentedTo: ettPresentedTo,
            ettMaincomName: ettMaincomName,
            ettLocation: ettLocation,
            ettComTel: ettComTel,
            vSkySubComId: vSkySubComId,
            vSkyComId: vSkyComId,
            editComProcess: editComProcess
        }, function (r) {
            console.log(r);
            var r = JSON.parse(r);

            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Company Name Updated!',
                    addclass: 'bg-success border-success'
                });

                $("i.updateSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateSubCom").text("Update");

                setTimeout(redirect, 1000);

            } else if (r.comFound == "comFound") {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Company Name Already Exists!',
                    addclass: 'bg-warning border-warning'
                });

                $("i.updateSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateSubCom").text("Update");

            } else {

                new PNotify({
                    title: 'INFO.!',
                    text: 'Error Updating Company Name!',
                    addclass: 'bg-info border-info'
                });

                $("i.updateSubComIcon").removeClass("icon-spinner9 spinner").addClass("icon-reset");
                $("#updateSubCom").text("Update");

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/sub_company");
            }

        });

    }

}

function del_sub_com(id) {

    var sub_com_id_del = id,
        del_process = "del_sub_com";

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Delete This Sub Company Name?</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_sub_company", {
            sub_com_id_del: sub_com_id_del,
            del_process: del_process
        }, function (r) {
            var r = JSON.parse(r);
            if (r.vSkySuc) {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Deleted',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.nun == "l_nun") {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Illegal Sub Company Name Applied',
                    addclass: 'bg-info border-info'
                });

            } else {

                new PNotify({
                    title: 'INFO...!',
                    text: 'Error Deleteing Sub Company. Consult Your Admin.',
                    addclass: 'bg-warning border-warning'
                });

            }

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/c_members_assets/sub_company");
            }

        });

    });

    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });
}

function return_trip(tp_id) {

    var r_process = "r_process",
        r_rtd = tp_id;

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
        r_process: r_process,
        r_rtd: r_rtd
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {
            var r_drID = $("#r_drID").val(r.driver_id),
                r_tkID = $("#r_tkID").val(r.truck_id),
                r_trip_id = $("#r_trip_id").val(r.r_trip_id),
                r_drName = $("#r_drName").val(r.driver_name),
                r_vName = $("#r_vName").val(r.truck_no),
                r_lDate = $("#r_lDate").val(r.loading_date),
                r_dDate = $("#r_dDate").val(r.discharging_date),
                r_mainCom = $("#r_mainCom").val(r.main_company_name),
                r_subCom = $("#r_subCom").val(r.sub_company_name),
                r_waybill = $("#r_waybill").val(r.waybill_no),
                r_product = $("#r_product").val(r.product),
                r_quantity = $("#r_quantity").val(r.qty),
                r_location = $("#r_location").val(r.loading_pt + " TO " + r.discharging_pt),
                r_distance = $("#r_distance").val(r.distance),
                r_rate = $("#r_rate").val(r.rate),
                r_amount = $("#r_amount").val(r.amount),
                r_shortage_rate = $("#r_shortage_rate").val(r.r_shortage_rate),
                r_fuel_in_cash_rate = $("#r_fuel_in_cash_rate").val(r.r_fuel_in_cash_rate),
                r_nyt_alw = $("#r_nyt_alw").val(r.overnight_allowance);
        }
    });
}

function put_id_back(crr_id) {

    var bk_process = "bk_process",
        crr_id = crr_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Undo This Returned Trip? Clicking Yes Will Set SHORTAGE=0, SHORTAGE VALUE=0, AMOUNT DUE=0, FUEL CONSUMED=0, FUEL CONSUMED IN CASH=0, DISCHARGING DATE=0000-00-00, PAY DUE KODSON=0, AMOUNT RECIEVABLE=0, CASH PAID TO MAKE LOSS=0, RECEIPT NO.=0, BALANCE=0 And Will Put Its Driver Back On Trip</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
            bk_process: bk_process,
            crr_id: crr_id
        }, function (r) {

            var r = JSON.parse(r);
            console.log(r)
            if (r.vSkySuc) {

                $("table#recordsTable33 tr#row_" + crr_id).fadeOut("slow").remove();

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                    text: 'Trip Undone Successfully',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else if (r.dr_err == "dr_err") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'The Driver Previously Associated To This Trip Is On Trip. Please Return His/Her Trip Before Undoing This Trip',
                    addclass: 'bg-info border-info'
                });

            } else if (r.trip_err == "trip_err") {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Illegal Trip Applied',
                    addclass: 'bg-info border-info'
                });

            }
        })

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
        }

    });


    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}

function return_trip_delete(del_id) {

    var del_process = "del_process",
        del_id = del_id;

    var notice = new PNotify({
        title: 'Confirmation',
        text: '<p>Are You Sure You Want To Delete This Trip</p>',
        hide: false,
        type: 'error',
        confirm: {
            confirm: true,
            buttons: [
                {
                    text: 'Yes',
                    addClass: 'btn btn-sm btn-primary'
                    },
                {
                    addClass: 'btn btn-sm btn-link'
                    }
                ]
        },
        buttons: {
            closer: false,
            sticker: false
        }
    })

    notice.get().on('pnotify.confirm', function () {

        $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
            del_process: del_process,
            del_id: del_id
        }, function (r) {

            var r = JSON.parse(r);
            console.log(r)
            if (r.vSkySuc) {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-checkmark4 icon-3x "></i></div>',
                    text: 'Deleted Successfully',
                    addclass: 'bg-success border-success'
                });

                setTimeout(redirect, 1000);

            } else {

                new PNotify({
                    title: '<div class="ml-3 text-center"><i class = "icon-notification2 icon-3x "></i></div>',
                    text: 'Error Deleting',
                    addclass: 'bg-info border-info'
                });

            }
        })

        function redirect() {
            window.location.assign("/payroll/mainAdmin_assets/c_members_assets/trips");
        }

    });


    // On cancel
    notice.get().on('pnotify.cancel', function () {
        new PNotify({
            title: 'INFO.!',
            text: 'Cancelled!',
            addclass: 'bg-info border-info'
        });
    });

}

function return_trip_edit(trip_edit) {

    var tripID = trip_edit,
        getEditInfos = "getEditInfos";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
        tripID: tripID,
        getEditInfos: getEditInfos
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {

            $("#e_trip_id").val(r.r_trip_id);
            $("#e_drID").val(r.driver_id);
            $("#e_tkID").val(r.truck_id);
            $("#location_id").val(r.location_id);
            $("#e_drName").val(r.driver_name);
            $("#e_vName").val(r.truck_no);
            $("#e_lDate").val(r.loading_date);
            $("#e_oldMcom").val(r.main_company_name);
            $("#e_oldSubCom").val(r.sub_company_name);
            $("#e_waybill").val(r.waybill_no);
            $("#e_product").val(r.product);
            $("#e_quantity").val(r.qty);
            $("#e_old_loading_pt").val(r.loading_pt);
            $("#e_old_discharging_pt").val(r.discharging_pt);
            $("#e_distance").val(r.distance);
            $("#e_rate").val(r.rate);
            $("#e_amount").val(r.amount);
            $("#e_nyt_alw").val(r.overnight_allowance);

        }

    });
}

function edit_returned_vals(returned_id) {

    var r_process_edit = "r_process_edit",
        returned_id = returned_id;

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_trips", {
        r_process_edit: r_process_edit,
        returned_id: returned_id
    }, function (r) {

        var r = JSON.parse(r);

        if (r.vSkySuc) {
            var r_edit_drID = $("#r_edit_drID").val(r.driver_id),
                r_edit_tkID = $("#r_edit_tkID").val(r.truck_id),
                r_edit_trip_id = $("#r_edit_trip_id").val(r.id),
                r_edit_drName = $("#r_edit_drName").val(r.driver_name),
                r_edit_vName = $("#r_edit_vName").val(r.truck_no),
                r_edit_lDate = $("#r_edit_lDate").val(r.loading_date),
                r_edit_dDate = $("#r_edit_dDate").val(r.discharging_date),
                r_edit_mainCom = $("#r_edit_mainCom").val(r.main_company_name),
                r_edit_subCom = $("#r_edit_subCom").val(r.sub_company_name),
                r_edit_waybill = $("#r_edit_waybill").val(r.waybill_no),
                r_edit_product = $("#r_edit_product").val(r.product),
                r_edit_quantity = $("#r_edit_quantity").val(r.qty),
                r_edit_location = $("#r_edit_location").val(r.loading_pt + " TO " + r.discharging_pt),
                r_edit_distance = $("#r_edit_distance").val(r.distance),
                r_edit_rate = $("#r_edit_rate").val(r.rate),
                r_edit_amount = $("#r_edit_amount").val(r.amount),
                r_edit_nyt_alw = $("#r_edit_nyt_alw").val(r.overnight_allowance),
                r_edit_shortage = $("#r_edit_shortage").val(r.shortage),
                r_edit_shortage_rate = $("#r_edit_shortage_rate").val(r.value_multiplied_by_short),
                r_edit_shortage_val = $("#r_edit_shortage_val").val(r.shortage_val),
                r_edit_amt_due = $("#r_edit_amt_due").val(r.amount_due),
                r_edit_fuel_consumed = $("#r_edit_fuel_consumed").val(r.fuel_consumed),
                r_edit_fuel_in_cash_rate = $("#r_edit_fuel_in_cash_rate").val(r.value_multiplied_by_fuel),
                r_edit_fuel_in_cash = $("#r_edit_fuel_in_cash").val(r.fuel_consumed_in_cash),
                r_edit_pay_due_kodson = $("#r_edit_pay_due_kodson").val(r.pay_due_kodson),
                r_edit_amt_recievable = $("#r_edit_amt_recievable").val(r.amt_recievable),
                r_edit_amt_recievable_surcharg = $("#r_edit_amt_recievable_surcharg").val(r.r_edit_amt_recievable_surcharg),
                r_edit_cash_paid_to_make_loss = $("#r_edit_cash_paid_to_make_loss").val(r.cash_paid_to_make_loss),
                r_edit_receipt_no = $("#r_edit_receipt_no").val(r.receipt_no),
                r_edit_balance = $("#r_edit_balance").val(r.balance);
        }
    });
}
/////////////////////////////////////////////////shortage side ///////////////////////////////////////////

function gettripHistoryInfo(id) {
    var hisID = id,
        historyProcess = "get_trip_history";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_shortage_report", {
        hisID: hisID,
        historyProcess: historyProcess
    }, function (r) {

        $("#contd").html(r);

    });
}

function gettripHistoryInfoArch(id) {
    var hisID = id,
        historyProcess = "get_trip_history";

    $.post("/payroll/mainAdmin_assets/c_members_assets/includes/process_arch", {
        hisID: hisID,
        historyProcess: historyProcess
    }, function (r) {

        $("#contd").html(r);

    });
}
/////////////////////////////////////////////////shortage side ///////////////////////////////////////////


////////////////////////////////////////////// end secretary side ////////////////////////////////////////
////////////////////////////////////////////// end secretary side ////////////////////////////////////////
////////////////////////////////////////////// end secretary side ////////////////////////////////////////