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
                                <span class="text-center" style="margin-left:140px; margin-bottom:-20px; font-size:25px;">SSF LISTS</span>
                                <div class="header-elements">
                                </div>
                            </div>

                            <div class="card-body">
                            </div>

                            <div class="table-responsive">
                                <table class="table" data-toggle="context" id="tax_table" data-target=".context-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>Converted Employee (%)</th>
                                            <th>Converted Employer (%)</th>
                                            <th class="text-center" style="width: 100px;">Edit/Delete/Activate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $skyQuery = mysqli_query($vSky, "SELECT * FROM `ssf`");
                                        while($skyRow = mysqli_fetch_assoc($skyQuery)){
                                            $test = $skyRow['active'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $skyRow['ssf_id']?>
                                            </td>
                                            <td><a href="javascript:;" id="vSkyEmp">
                                                    <?php echo $skyRow['employee_%']?></a></td>
                                            <td><a href="javascript:;" id="vSkyEmpler">
                                                    <?php echo $skyRow['employer_%']?></a></td>
                                            <td class="text-center">
                                                <div class="list-icons">
                                                    <?php
                                               if($test == 1){

                                                    ?>
                                                    <button onclick="display_tax(<?php echo $skyRow['ssf_id']?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_vertical">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>
                                                    <button onclick="del_tax(<?php echo $skyRow['ssf_id']?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash taxDel<?php echo $skyRow['ssf_id']?>" style="color:red;"></i>
                                                    </button>
                                                    <?php
                                            }else{
                                                    ?>
                                                    <button onclick="display_tax(<?php echo $skyRow['ssf_id']?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_vertical">
                                                        <i class="icon-pencil5" style="color:orange;"></i>
                                                    </button>
                                                    <button onclick="del_tax(<?php echo $skyRow['ssf_id']?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-trash taxDel<?php echo $skyRow['ssf_id']?>" style="color:red;"></i>
                                                    </button>
                                                    <button onclick="acDel(<?php echo $skyRow['ssf_id']?>)" class="list-icons-item btn btn-light">
                                                        <i class="icon-touch acICON<?php echo $skyRow['ssf_id']?>" style="color:blue;"></i>
                                                    </button>
                                                    <?php
                                                }
                                                    ?>
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

                    <div class="col-md-3">
                        <!-- Grey background -->
                        <form id="tax_form">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <span class="text-center" style="margin-left:140px; margin-bottom:-20px; font-size:25px;">SSF</span>
                                    <div class="header-elements">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Employee (%):</label>
                                                <input type="text" id="emp_perc" name="emp_perc" class="form-control numbersonly-format" placeholder="5.5%">
                                            </div>
                                            <div class="form-group">
                                                <label>Employer (%):</label>
                                                <input type="text" id="emplyer_perc" name="emplyer_perc" class="form-control numbersonly-format" placeholder="13%">
                                            </div>
                                            <div class="form-group">
                                                <label>Total:</label>
                                                <input type="text" readonly id="tax_Perc_total" name="tax_Perc_total" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Converted Values:</label>
                                                <input type="text" readonly id="emp_perc_result" name="emp_perc_result" class="form-control numbersonly-format" placeholder="0.055">
                                            </div>
                                            <div class="form-group">
                                                <label>Converted Values:</label>
                                                <input type="text" readonly id="emplyer_perc_result" name="emplyer_perc_result" class="form-control" placeholder="0.135">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="button" onclick="_add_tax_()" class="btn bg-blue"><span id="add_tax" class="ladda-label labll">Add</span> <i class="icon-plus3 ic ml-2"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- /grey background -->
                    </div>
                    <div class="col-md-5">
                        <!-- Grey background -->
                        <form methos="POST" id="tax_form_2">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <span class="text-center" style="margin-left:200px; margin-bottom:-20px; font-size:25px;">TAX CALCULATOR <span style="font-size:10px; font-weight:bold;">(Not In Use Will Be Implemented Later)</span></span>
                                    <div class="header-elements">
                                    </div>
                                </div>


                                <div class="row">

                                    <table class="table datatable-scroll-y" id="tax_table3" width="100%" style="margin-left:20px; width:600px;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">CHARGEABLE INCOME</th>
                                                <th class="text-center">RATE</th>
                                                <th class="text-center">TAX</th>
                                                <th class="text-center">CUMULATIVE CHARGEABLE INCOME</th>
                                                <th class="text-center">ACTION</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">GH₵</th>
                                                <th class="text-center">%</th>
                                                <th class="text-center">GH₵</th>
                                                <th class="text-center">GH₵</th>
                                            </tr>
                                        </thead>
                                        <tbody id="appen">
                                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `taxes`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                                            <tr id='row_<?= $vSkyRow['id']; ?>'>
                                                <td class="text-center">
                                                    <input disabled type="number" min="0" step=".1" id="<?= $vSkyRow['id']; ?>" name="chrg_income" value="<?= $vSkyRow['chargeable_income']; ?>" class="form-control text-center numbersonly-format">
                                                </td>
                                                <td class="text-center">
                                                    <input disabled type="number" min="0" step=".1" id="<?= $vSkyRow['id']; ?>" name="rates" value="<?= $vSkyRow['rate']; ?>" class="form-control text-center numbersonly-format">
                                                </td>
                                                <td class="text-center">
                                                    <input disabled type="number" min="0" step=".1" readonly id="<?= $vSkyRow['id']; ?>" value="<?= $vSkyRow['tax']; ?>" name="tax" class="form-control text-center numbersonly-format">
                                                </td>
                                                <td class="text-center">
                                                    <input disabled type="number" min="0" step=".1" readonly id="<?= $vSkyRow['id']; ?>" value="<?= $vSkyRow['cumulative_chargeable_income']; ?>" name="tax_cum" class="form-control text-center numbersonly-format">
                                                </td>
                                                <?php 
                                                    if($vSkyRow['id'] == 1){ 
                                                ?>
                                                <td class="text-center">
                                                    <button disabled type="button" id="<?= $vSkyRow['id']; ?>" class="btn bg-blue add_row"><span id="add_row_<?= $vSkyRow['id']; ?>" class="ladda-label labll"></span> <i class="icon-plus3 ic ml-0"></i></button>
                                                </td>
                                                <?php 
                                                    }else{ 
                                                ?>
                                                <td class="text-center">
                                                    <button disabled type="button" id="<?= $vSkyRow['id']; ?>" class="btn btn-warning remv_row"><span id="remove_row_<?= $vSkyRow['id']; ?>" class="ladda-label labll"></span> <i class="icon-minus3 ic ml-0"></i></button>
                                                </td>
                                                <?php 
                                                    }
                                                ?>
                                            </tr>
                                            <?php
                            }
                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <button disabled type="reset" class="btn btn-light">Reset</button>
                                    <button disabled type="button" id="tax_calculator" class="btn btn-danger"><span id="" class="ladda-label labll">Click To Re-Calculate After Editing</span> <i class="icon-calculator ml-2"></i>
                                    </button>
                                    <input disabled type="hidden" name="action" value="insert" id="action">
                                    <button disabled type="submit" name="submit" value="submit" class="btn btn-success" style="margin-left:-170px;"><span id="" class="ladda-label labll">Save</span> <i class="icon-drawer-in ml-2"></i>
                                    </button>
                                </div>
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
    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT SSF VALUES</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Employee (%):</label>
                                    <input type="text" id="edit_emp" name="edit_emp" class="form-control numbersonly-format">

                                    <input type="hidden" id="edit_id" name="edit_id" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-6">
                                    <label>Converted Values:</label>
                                    <input readonly type="text" id="edit_emp_converted" name="edit_emp_converted" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Employer (%):</label>
                                    <input type="text" id="empler_edit" name="empler_edit" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-6">
                                    <label>Converted Values:</label>
                                    <input readonly type="text" id="edit_empler_convert" name="edit_empler_convert" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Total:</label>
                                    <input readonly type="text" id="edit_total" name="edit_total" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" onclick="update_tax()" class="btn bg-primary"><span id="update_tax" class="ladda-label labll4">Update</span> <i class="icon-plus3 iup ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->
</body>

</html>
