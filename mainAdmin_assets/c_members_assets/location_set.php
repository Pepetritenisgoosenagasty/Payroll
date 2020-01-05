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
                    <div class="col-md-7">

                        <!-- Table attachment -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <span style="margin-left:375px; font-size:25px;"> LOCATIONS </span>
                                <div class="header-elements">
                                </div>
                            </div>

                            <div class="card-body">
                                <span style="margin-left:330px; font-size:20px; font-weight:bold;"> LIST OF ALL LOCATIONS </span>
                            </div>

                            <div class="table-responsive">
                                <table class="table" data-toggle="context" data-target=".context-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Loading Point Name</th>
                                            <th class="text-center"></th>
                                            <th class="text-center">Discharging Point Name</th>
                                            <th class="text-center">Rate</th>
                                            <th class="text-center">Distane</th>
                                            <th class="text-center">Fuel</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `locations`");
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= htmlentities($vSkyRow['id']); ?>
                                            </td>
                                            <td class="text-center"><a href="javascript:;">
                                                    <?= htmlentities($vSkyRow['loading_pt_name']); ?></a>
                                            </td>
                                            <td class="text-center">
                                                    <span style="color:green;"> TO </span>
                                            </td>
                                            <td class="text-center"><a href="javascript:;">
                                                    <?= htmlentities($vSkyRow['discharging_pt_name']); ?></a>
                                            </td>
                                            <td class="text-center"><a href="javascript:;">
                                                    <?= htmlentities($vSkyRow['rate']); ?></a>
                                            </td>
                                            <td class="text-center"><a href="javascript:;">
                                                    <?= htmlentities($vSkyRow['distance']); ?></a>
                                            </td>
                                            <td class="text-center"><a href="javascript:;">
                                                    <?= htmlentities($vSkyRow['fuel']); ?></a>
                                            </td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <button onclick="display_loc(<?= htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_loc">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>

                                                    <button onclick="del_loc(<?= htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash locDel<?= $skyRow['id']?>" style="color:red;"></i>
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

                    <div class="col-md-5">

                        <!-- Grey background -->
                        <form action="#">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <span style="margin-left:175px; font-size:25px;"> Add New Location </span>
                                    <div class="header-elements">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Loading Point Name</b></label>
                                                <input type="text" name="loadingPtName" id="loadingPtName" class="form-control" placeholder="APD">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Discharging Point Name</b></label>
                                                <input type="text" name="dischargingPtName" id="dischargingPtName" class="form-control" placeholder="Kumasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Rate</b></label>
                                                <input type="text" name="locRate" id="locRate" class="form-control numbersonly-format" placeholder="0.271813">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Distance(km)</b></label>
                                                <input type="text" name="locDistance" id="locDistance" class="form-control numbersonly-format" placeholder="285">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Fuel(ltr)</b></label>
                                                <input type="text" name="locFuel" id="locFuel" class="form-control numbersonly-format" placeholder="350">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="button" onclick="add_location()" class="btn bg-blue"><span id="addLoc" class="ladda-label labll5">Add New Location</span><i class="icon-plus3 ml-2 addLocIcon"></i></button> </div>
                            </div>
                        </form>
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
    <div id="modal_form_loc" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <span style="margin-left:175px; font-size:25px;"> Edit Location </span>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#">
                    <div class="modal-body">
                             <!-- Grey background -->
                        <form action="#">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <div class="header-elements">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Loading Point Name</b></label>
                                                <input type="text" name="editloadingPtName" id="editloadingPtName" class="form-control" placeholder="APD">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Discharging Point Name</b></label>
                                                <input type="text" name="editdischargingPtName" id="editdischargingPtName" class="form-control" placeholder="Kumasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Rate</b></label>
                                                <input type="text" name="editlocRate" id="editlocRate" class="form-control numbersonly-format" placeholder="0.271813">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Distance(km)</b></label>
                                                <input type="text" name="editlocDistance" id="editlocDistance" class="form-control numbersonly-format" placeholder="285">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Fuel(ltr)</b></label>
                                                <input type="text" name="editlocFuel" id="editlocFuel" class="form-control numbersonly-format" placeholder="350">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="locId">

                                </div>

                                
                            </div>
                        </form>
                        <!-- /grey background -->

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" onclick="editLoc()" class="btn bg-primary"><span id="updateLoc" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateLocIcon"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->
</body>

</html>
