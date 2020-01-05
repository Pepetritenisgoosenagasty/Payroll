<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php
    include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/head.php");
?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/payroll/DiskStatus.class.php");

try {
$diskStatus = new DiskStatus('c:');
 
$freeSpace = $diskStatus->freeSpace();
$totalSpace = $diskStatus->totalSpace();
$barWidth = ($diskStatus->usedSpace()/100) * 400;
 
} catch (Exception $e) {
echo 'Error ('.$e->getMessage().')';
exit();
}

?>
<style>
    .disk {
    margin-left: 180px;
border: 4px solid black;
width: 400px;
padding: 2px;
}
 
.used {
display block;
background: red;
text-align: right;
padding: 0 0 0 0;
}   
    
#f1_upload_process{
   z-index:100;
   position:absolute;
   visibility:hidden;
   text-align:center;
   width:400px;
   margin-top:100px;
   margin-left:180px;
   padding:0px;
   background-color:#fff;
   border:1px solid #ccc;
}
</style>
<script language="javascript" type="text/javascript">
    <!--

    function startUpload() {
        document.getElementById('f1_upload_process').style.visibility = 'visible';
        document.getElementById('f1_upload_form').style.visibility = 'hidden';
        return true;
    }

    function stopUpload(success) {
        var result = '';
        if (success == 1) {

            new PNotify({
                title: "INFO.!",
                text: "Successfully Restored..",
                addclass: "bg-info border-info"
            });

            setTimeout(redirect, 1000);

            function redirect() {
                window.location.assign("/payroll/mainAdmin_assets/members_assets/bk_re");
            }

        } else {

            new PNotify({
                title: "INFO.!",
                text: "There Was A Problem Restoring This File..",
                addclass: "bg-info border-info"
            });

        }
        document.getElementById('f1_upload_process').style.visibility = 'hidden';
        //      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
        //        document.getElementById('f1_upload_form').style.visibility = 'visible';
        return true;
    }
    //-->

</script>

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
    <div class="page-content" style="background-color:#8d98b3;">

        <!-- Main content -->
        <div class="content-wrapper">
            <?php  
    $query = mysqli_query($vSky, "SELECT * FROM `payroll_date` WHERE `active`='1'");
                    if($fetch = mysqli_fetch_assoc($query)){
                        $val8 = $fetch['auto_man'];
                    }
                    
            if($val8 == 0){
        ?>
            <script>
                $(function () {
        $('#bk_btn').prop("disabled", true);
        $("#backUpStats").text("Never");
        $("#duration_select option[value='0']").prop("selected", true);                
            })
                </script>
            <?php
                }else if($val8 == 1){
        ?>
            <script>
                $(function () {
        $('#bk_btn').prop("disabled", false);
        $("#backUpStats").text("Only When I Tap 'Back up'");
        $("#duration_select option[value='1']").prop("selected", true);                
            })
                </script>
            <?php
                }else if($val8 == 2){
                ?>
            <script>
                $(function () {
        $('#bk_btn').prop("disabled", true);
        $("#backUpStats").text("Daily");
        $("#duration_select option[value='2']").prop("selected", true);                
            })
                </script>
            <?php
                }else if($val8 == 3){
                    ?>
            <script>
                $(function () {
        $('#bk_btn').prop("disabled", true);
        $("#backUpStats").text("Weekly");
        $("#duration_select option[value='3']").prop("selected", true);                
            })
                </script>
            <?php
                    
            }
                    ?>
            <!-- Content area -->
            <div class="content">
                <div><input type="hidden" id="free" value="<?= $freeSpace ?>"> </div>
                <div><input type="hidden" id="total" value="<?= $totalSpace ?>"></div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Colored info widget -->
                        <div class="card card-body bg-pink-400" style="background-image: url(../../../../../../../assets/images/bg.html);">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-database-upload icon-2x"></i>
                                </div>


                                <div class="media-body text-left">
                                    <h6 class="media-title font-weight-semibold">Last Backup</h6>
                                    <span class="opacity-75">Local Drive C: </span><span id="backUpStats">Never</span><br />
                                    <span class="opacity-100 text-justify">Backups Are Taken Every Day At <b>4:00pm Each Day</b> As The Default Settings. Changes Can Be Made To Change The Duration In Which Backups Should Be Done.
                                    </span>

                                </div>
                            </div>
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-database-refresh icon-2x"></i>
                                </div>
                                <?php
                                
                                $queries = mysqli_query($vSky, "SELECT `date_restored` FROM `last_restored` WHERE  `is_last`='1' AND `is_inUse`='1'");
                            
                                if($fetch = mysqli_fetch_array($queries)){
                                    $restoreDate = $fetch[0];
                                        $ddateToTime = strtotime($restoreDate);
                                        $realDateToTime = date("l F m Y h:i:s", $ddateToTime);
                                }else{
                                    $realDateToTime ="Never";
                                }
                                ?>

                                <div class="media-body text-left">
                                    <h6 class="media-title font-weight-semibold">Last Restored</h6>
                                    <span class="opacity-75">From Local Drive C: </span><span>
                                        <?= $realDateToTime; ?></span><br />
                                    <span class="opacity-100">Restoring Database Is Done Manualy. To Do This Select A File To Restore And Click On The Restore Button. <b><span class="text-uppercase"> (Please Note That We Will Not Be responsible for any data lose Check date of file When Selecting A file to restore.</span>) Files Are With Extention .sql ( eg. 2019-03-08-payroll_kodson.sql )</b></span>

                                </div>
                            </div>
                        </div>
                        <!-- /colored info widget -->
                    </div>
                    <div class="col-md-6">
                        <!-- Colored info widget -->
                        <div class="card card-body bg-blue-400" style="background-image: url(../../../../../../../assets/images/bg.html);">
                            <span class="text-uppercase text-center opacity-100" style="font-size:15px;"><b>Backup Settings</b></span>
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-drive icon-3x"></i>
                                </div>
                                <div class="media-body text-left">
                                    <!-- Basic select -->
                                    <div class="form-group" style="margin-bottom:5px; margin-top:-10px;">
                                        <label class="col-form-label col-lg-3"><b>Select Duration</b></label>
                                        <div class="col-lg-6">
                                            <select name="duration_select" id="duration_select" class="form-control">
                                                <option value="0">Never</option>
                                                <option value="1">Only When I Tap "Back up"</option>
                                                <option value="2">Daily</option>
                                                <option value="3">Weekly</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <button type="button" id="save_chngs" class="btn btn-light">Save Changes<i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <br />
                                        </div>
                                    </div>
                                    <!-- /basic select -->

                                </div>
                            </div>
                        </div>
                        <!-- /colored info widget -->
                    </div>
                </div>

                <div class="col-md-6" style=" margin-left:420px;">
                    <div class="card card-body justify-content-center text-center" style="min-height: 330px;">
                        <div>
                            <div class="disk">
                                <div class="used" style="width: <?= $barWidth ?>px">
                                    <?= $diskStatus->usedSpace() ?>%&nbsp;</div>
                            </div>
                            Free:
                            <?= $freeSpace ?> (of
                            <?= $totalSpace ?>)
                            <form action="process_backup_restore" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();">
                                <p id="f1_upload_process">Restoring...<br /><img src="loader.gif" /><br /></p>
                                <p id="f1_upload_form" align="center"><br />
                                    <div class="row" style="margin-left:100px; padding:10px;">
                                        <button type="button" onclick="backupDB()" id="bk_btn" class="btn bg-primary-400"><span id="backUP">Backup</span><i class="icon-download back_up ml-3"></i></button>
                                        <input type="file" name="restore" class="btn bg-warning-400" style="margin-right:10px; margin-left:30px;">
                                        <button type='submit' class="btn bg-success-400">Restore <i class="icon-upload ml-3"></i></button>
                                    </div>
                            </form>
                            <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                        </div>
                    </div>
                </div>
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

</html>
