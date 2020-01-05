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

                <div class="row">
                    <div class="col-md-4">

                        <!-- Table attachment -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title">Main Company</h6>
                                <div class="header-elements">
                                </div>
                            </div>

                            <div class="card-body">
                                List Of All Main Companies.
                            </div>

                            <div class="table-responsive">
                                <table class="table" data-toggle="context" data-target=".context-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>Company Name</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_companies` WHERE `is_deleted`='0'");
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt))
                                        {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo htmlentities($vSkyRow['id']); ?>
                                            </td>
                                            <td><a href="javascript:;">
                                                    <?php echo htmlentities($vSkyRow['name']); ?></a></td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <button onclick="display_com(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_com">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>

                                                    <button onclick="del_com(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash mainComDel<?phpecho $skyRow['id']?>" style="color:red;"></i>
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
                        <!-- /table attachment -->


                    </div>

                    <div class="col-lg-8">

                        <!-- Grey background -->

                        <div class="row">
                            <div class="col-lg-12">
                                <form action="#">
                                    <div class="card">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title">Add New Main Company</h6>
                                            <div class="header-elements">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Company name:</label>
                                                        <input type="text" class="form-control wordsonly-format" name="comName" id="comName" placeholder="AKWAABA">
                                                    </div>
                                                </div>

                                            </div>
                                            <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                            <div class='text-center'><b>FREIGHT CLAIMS ATTRIBUTES</b></div>
                                            <hr style='border: 1px solid orange; margin-top:0px;'>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Presented To:</label>
                                                        <input type="text" class="form-control wordsonly-format" name="presentedTo" id="presentedTo" placeholder="THE MANAGING DIRECTOR">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Company Main Name:</label>
                                                        <input type="text" class="form-control wordsonly-format" name="mainComName" id="mainComName" placeholder="AKWAABA LINK INVESTMENTS LTD.">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Company Location:</label>
                                                        <input type="text" class="form-control wordsonly-format" name="comLocation" id="comLocation" placeholder="SPINTEX LIGHT INDUSTRIAL AREA">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Company Tel.:</label>
                                                        <input readonly type="text" class="form-control wordsonly-format" name="comTel" id="comTel" placeholder="0303 305730/0501530390">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer d-flex justify-content-between align-items-center">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="button" onclick="addmMainCom()" class="btn bg-blue"><span id="add_com" class="ladda-label labll5">Add</span><i class="icon-plus3 ml-2 addComIcon"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /grey background -->

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
    <!-- Vertical form modal -->
    <div id="modal_form_com" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Main Company</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" name="vSkyComName" id="vSkyComName" class="form-control wordsonly-format">
                                            <input type="hidden" name="vSkyComId" id="vSkyComId" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                <div class='text-center'><b>FREIGHT CLAIMS ATTRIBUTES</b></div>
                                <hr style='border: 1px solid orange; margin-top:0px;'>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Presented To:</label>
                                            <input type="text" class="form-control wordsonly-format" name="edtPresentedTo" id="edtPresentedTo" placeholder="THE MANAGING DIRECTOR">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Company Main Name:</label>
                                            <input type="text" class="form-control" name="editMaincomName" id="editMaincomName" placeholder="AKWAABA LINK INVESTMENTS LTD.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Company Location:</label>
                                            <input type="text" class="form-control" name="edtLocation" id="edtLocation" placeholder="SPINTEX LIGHT INDUSTRIAL AREA">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Company Tel.:</label>
                                            <input readonly type="text" class="form-control" name="edtComTel" id="edtComTel" placeholder="0303 305730/0501530390">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" onclick="editMainCom()" class="btn bg-primary"><span id="update_com" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateComIcon"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->
</body>

</html>
