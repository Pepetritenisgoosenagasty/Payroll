<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <span class="navbar-text">
            &copy; 2018 -
            <?php echo date("Y"); ?>. <a href="#">Kodson Plus Company Ltd</a> by <a href="javascript:;" target="_blank">VB IT Consult Ltd</a>
        </span>
        <div style="margin-left:380px;" id="footerTimer"><b><span id='days'></span> Day(s) : <span id="hours"></span> Hour(s) : <span id="minutes"> </span> Minute(s) : <span id="seconds"> </span> Second(s) </b></div>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item"><a href="javascript:;" style="color:red;" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
        </ul>
    </div>
</div>
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
                    message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Backingup System To Database</span>',
                    timeout: 2000, //unblock after 2 seconds
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
                        $("#footerTimer").html("<b>Backingup Please Wait...</b>");

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
                        $("#footerTimer").html("<b><span id='days'></span> Day(s) : <span id='hours'></span> Hour(s) : <span id='minutes'> </span> Minute(s) : <span id='seconds'> </span> Second(s) </b>");

                        setTimeout(redirect, 1000);
                        
                        function redirect() {
                             var pageURL = $(location).attr("pathname");
                             window.location.assign(pageURL);
                        }
                    }
                });
                clearInterval(intrval);
            }
        }
    }


    var pageNum = $("#pageNum").text();

    if (pageNum == 1) {
        $("#footerTimer").css("display", "none");
    } else {
        (function() {
            var indate = "dueDatesss";
            $.post("/payroll/mainAdmin_assets/members_assets/payroll/includes/process_paySlips", {
                indate: indate
            }, function(r) {
                var r = JSON.parse(r);

                if (r.vSkySuc === true && r.never == "never") {

                    $("#footerTimer").html("<b>Backup Set To Never</b>");

                } else if (r.vSkySuc === true && r.manual == "manual") {

                    $("#footerTimer").html("<b>Backup Set To Manual</b>");

                } else if (r.vSkySuc === true && r.daily == "daily") {

                    countdown(r.indates);

                } else if (r.vSkySuc === true && r.weekly == "weekly") {

                    countdown(r.indates);

                }
            });
        }());
    }

</script>
<script>
    //var zoomlevel =1;
    var zoomlevel = (window.outerWidth - 10) / window.innerWidth;

    var ratio = (screen.availWidth / document.documentElement.clientWidth);
    var zoomLevel = Number(ratio.toFixed(1).replace(".", "") + "0");

    //console.log(zoomLevel);

    //console.log(zoom);
    //    $("body").dblclick(function(){
    //       // zoomlevel = zoomlevel == 0.89375 ? 2 : 0.89375;
    //        
    //        $(this).css({
    //            "-moz-transform":"scale("+0.89375+")",
    //            "-webkit-transform":"scale("+0.89375+")",
    //            "-o-transform":"scale("+0.89375+")",
    //            "-ms-transform":"scale("+0.89375+")"
    //        })
    //    });
</script>
