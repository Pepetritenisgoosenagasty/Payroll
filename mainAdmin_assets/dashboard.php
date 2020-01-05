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
        <div id="page"><span style="display:none;" id="pageNum">1</span></div>
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <?php

    if(isset($_SESSION['position'])){

        $position = $_SESSION['position'];

            if($position == 1 || $position == 2){

            include($_SERVER["DOCUMENT_ROOT"]."/payroll/mainAdmin_assets/members_assets/view/admin_v/admin_views.php");

            }else if($position == 3){
                
            include($_SERVER["DOCUMENT_ROOT"]."/payroll/mainAdmin_assets/c_members_assets/view/controller_v/controller_view.php");
                
            }
    }
?>

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
    <script>
        function countdown(endDate) {
            let days, hours, minutes, seconds;

            endDate = new Date(endDate).getTime();

            if (isNaN(endDate)) {
                return;
            }

            var intrval = setInterval(calculate, 1000);

            function calculate() {
                let startDate = new Date();
                startDate = startDate.getTime();

                let timeRemaining = parseInt((endDate - startDate) / 1000);

                if (timeRemaining == 360) {
                    new PNotify({
                        title: 'WARNING.!',
                        text: '6(SIX) Minutes More For System To Automatically Backup. You can Redo The Backup At The (Settings->General Settings->Backup/Restore) And Select (Only When I tap Backup) And Click On Save Changes!',
                        addclass: 'bg-warning border-warning'
                    });
                }

                if (timeRemaining == 180) {
                    new PNotify({
                        title: 'WARNING.!',
                        text: '3(THREE) Minutes More For System To Automatically Backup. You can Redo The Backup At The (Settings->General Settings->Backup/Restore) And Select (Only When I tap Backup) And Click On Save Changes!',
                        addclass: 'bg-warning border-warning'
                    });
                }

                if (timeRemaining == 60) {
                    new PNotify({
                        title: 'WARNING.!',
                        text: '1(ONE) Minutes More For System To Automatically Backup. You can Redo The Backup At The (Settings->General Settings->Backup/Restore) And Select (Only When I tap Backup) And Click On Save Changes!',
                        addclass: 'bg-warning border-warning'
                    });
                }
                // console.log(timeRemaining);
                if (timeRemaining >= 0) {
                    days = parseInt(timeRemaining / 86400);
                    timeRemaining = (timeRemaining % 86400);

                    hours = parseInt(timeRemaining / 3600);
                    timeRemaining = (timeRemaining % 3600);

                    minutes = parseInt(timeRemaining / 60);
                    timeRemaining = (timeRemaining % 60);

                    seconds = parseInt(timeRemaining);

                    document.getElementById("days").innerHTML = parseInt(days, 10);
                    document.getElementById("hours").innerHTML = ("0" + hours).slice(-2);
                    document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);
                    document.getElementById("seconds").innerHTML = ("0" + seconds).slice(-2);
                } else {

                    $.blockUI({
                        message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Backingup System To Database. Page Will Be Refreshed After Backingup</span>',
                        timeout: 20000, //unblock after 2 seconds
                        overlayCSS: {
                            backgroundColor: '#1b2024',
                            opacity: 0.8,
                            cursor: 'wait'
                        },
                        css: {
                            border: 0,
                            color: '#fff',
                            padding: 0,
                            backgroundColor: 'transparent'
                        },
                        onBlock: function() {

                            var bk = "back_up";

                            $.post("/payroll/mainAdmin_assets/members_assets/process_backup_restore", {
                                bk: bk
                            }, function(r) {
                                var r = JSON.parse(r);
                                if (r.vSkySuc) {
                                    $("i.back_up").removeClass("icon-spinner4 spinner").addClass("icon-download");
                                    $("#backUP").text("Backup");
                                }
                            });
                        },
                        onUnblock: function() {
                            setTimeout(redirect, 1000);

                            function redirect() {
                                window.location.assign("/payroll/mainAdmin_assets/dashboard");
                            }
                        }
                    });

                    clearInterval(intrval);

                }
            }
        }

        (function() {
            var today = new Date();
            var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var day = days[today.getDay()];
            var newDay = today.getDay();
            switch (day) {
                case "Mon":
                    $("#mon").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Tue":
                    $("#tue").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Wed":
                    $("#wed").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Thu":
                    $("#thu").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Fri":
                    $("#fri").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Sat":
                    $("#sat").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
                case "Sun":
                    $("#sun").addClass("badge bg-danger mx-1").removeClass("badge bg-grey-300 mx-1");
                    break;
            }
            var indate = "dueDatesss";
            $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
                indate: indate
            }, function(r) {
                var r = JSON.parse(r);
                if (r.vSkySuc === true && r.never == "never") {

                    $("#dashboardTimer").html("<b>Backup Set To Never</b>");

                } else if (r.vSkySuc === true && r.manual == "manual") {

                    $("#dashboardTimer").html("<b>Backup Set To Manual</b>");

                } else if (r.vSkySuc === true && r.daily == "daily") {

                    countdown(r.indates);

                } else if (r.vSkySuc === true && r.weekly == "weekly") {

                    countdown(r.indates);

                }
            });
        }());

    </script>
</body>

</html>
