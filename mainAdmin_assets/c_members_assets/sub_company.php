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
                                <h6 class="card-title">Positions</h6>
                                <div class="header-elements">
                                </div>
                            </div>

                            <div class="card-body">
                                List Of All Sub Companies
                            </div>

                            <div class="table-responsive">
                                <table class="table" data-toggle="context" data-target=".context-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>Main Company Name</th>
                                            <th>Sub Company Name</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $vSkyStmt = mysqli_query($vSky, "SELECT com.`name`, sub_com.* FROM `main_companies` AS  com INNER JOIN `sub_companies` AS sub_com ON com.id=sub_com.main_company_id");
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo htmlentities($vSkyRow['id']); ?>
                                            </td>
                                            <td><a href="javascript:;">
                                                    <?php echo htmlentities($vSkyRow['name']); ?></a>
                                            </td>
                                            <td><a href="javascript:;">
                                                    <?php echo htmlentities($vSkyRow['sub_name']); ?></a>
                                            </td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <button onclick="display_sub_com(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_sub_com">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>

                                                    <button onclick="del_sub_com(<?php echo htmlentities($vSkyRow['id']); ?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash posDel<?phpecho $skyRow['id']?>" style="color:red;"></i>
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

                    <div class="col-md-8">

                        <!-- Grey background -->
                        <form action="#">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Add New Sub Company</h6>
                                    <div class="header-elements">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-form-label">Main Company</label>
                                        <select class="form-control" id="comVsky">
                                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_companies`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                            <option value="<?php echo $vSkyRow['id']?>">
                                                <?php echo $vSkyRow['name']?>
                                            </option>
                                            <?php
                            }
                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Company name:</label>
                                        <input type="text" name="vSkySubComName" id="vSkySubComName" class="form-control wordsonly-format" placeholder="Supervisor">
                                    </div>

                                    <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                    <div class='text-center'><b>TRANSPORTER ATTRIBUTES</b></div>
                                    <hr style='border: 1px solid orange; margin-top:0px;'>
                                    <div class='row'>
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Transporter::</label>
                                                <input type='text' class='form-control wordsonly-format' name='ttPresentedTo' id='ttPresentedTo' placeholder='THE MANAGING DIRECTOR'>
                                            </div>
                                        </div>

                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Main Name:</label>
                                                <input type='text' class='form-control' name='ttMaincomName' id='ttMaincomName' placeholder='KGL CONSTRUCTION LIMITED'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Address:</label>
                                                <input type='text' class='form-control' name='ttLocation' id='ttLocation' placeholder='P.O.BOX CS 7967 ,   TEMA'>
                                            </div>
                                        </div>

                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Tel.:</label>
                                                <input type='text' class='form-control' name='ttComTel' id='ttComTel' placeholder='0303 305730/0501 530390'>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="button" onclick="add_sub_com()" class="btn bg-blue"><span id="addSubCom" class="ladda-label labll5">Add Sub Company</span><i class="icon-plus3 ml-2 addSubComIcon"></i></button> </div>
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
    <div id="modal_form_sub_com" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Company</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#">
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Main Company</label>
                                        <select class="form-control" id="vSkyCom">
                                            <option value="0">--- Select To Change Main Company (Ignore If You Dont Want To Change) ---</option>
                                            <?php
                                                $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_companies`");
                                                while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                                            ?>
                                            <option value="<?php echo $vSkyRow['id']?>">
                                                <?php echo $vSkyRow['name']?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <label>Company Name</label>
                                    <input type="text" name="vSkyEditSubComName" id="vSkyEditSubComName" class="form-control wordsonly-format">
                                    
                                                                        <hr style='border: 1px solid orange; margin-bottom:0px;'>
                                    <div class='text-center'><b>TRANSPORTER ATTRIBUTES</b></div>
                                    <hr style='border: 1px solid orange; margin-top:0px;'>
                                    <div class='row'>
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Transporter::</label>
                                                <input type='text' class='form-control wordsonly-format' name='ettPresentedTo' id='ettPresentedTo' placeholder='THE MANAGING DIRECTOR'>
                                            </div>
                                        </div>

                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Main Name:</label>
                                                <input type='text' class='form-control' name='ettMaincomName' id='ettMaincomName' placeholder='KGL CONSTRUCTION LIMITED'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Address:</label>
                                                <input type='text' class='form-control' name='ettLocation' id='ettLocation' placeholder='P.O.BOX CS 7967 ,   TEMA'>
                                            </div>
                                        </div>

                                        <div class='col-lg-6'>
                                            <div class='form-group'>
                                                <label>Company Tel.:</label>
                                                <input type='text' class='form-control' name='ettComTel' id='ettComTel' placeholder='0303 305730/0501 530390'>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="vSkySubComId" id="vSkySubComId" class="form-control">
                                    <input type="hidden" name="vSkyComId" id="vSkyComId" class="form-control">
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" onclick="editSubCom()" class="btn bg-primary"><span id="updateSubCom" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateSubComIcon"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->
</body>

</html>
