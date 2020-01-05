<?php
 include($_SERVER["DOCUMENT_ROOT"]."/payroll/includes/vSky.inc.php");
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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row" style="margin:0px 10px ;">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-5">Main Category</label>
                            <select class="form-control" name="mainCatSelects" id="mainCatSelects">
                                <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_category`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                <option value="<?php echo $vSkyRow['cat_id']?>">
                                    <?php echo $vSkyRow['cat_name']?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group row" style="margin-left:20px;">
                            <label class="col-form-label col-lg-5">Department</label>
                            <select class="form-control" name="department" id="department">
                                <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `department`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                <option value="<?php echo $vSkyRow['id']?>">
                                    <?php echo $vSkyRow['dep_name']?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group row" style="margin-left:20px;">
                            <label class="col-form-label col-lg-5">Position</label>
                            <select class="form-control" name="position" id="position">
                                <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `positions`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                <option value="<?php echo $vSkyRow['pos_id']?>">
                                    <?php echo $vSkyRow['pos_type_name']?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:20px; margin-top:35px;">
                            <button type="submit" class="btn btn-outline-primary"><i class="icon-cog3 mr-2"></i> Search</button>
                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col-auto" style="margin-top:35px;">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-cog3 mr-2"></i> Add New Salary Rule</button>

                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">

                        <!-- Scrollable datatable -->
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Main Category: </h5><span style="">Senior Staff</span>
                                <h5 class="card-title">Department: </h5><span>Admin</span>
                                <h5 class="card-title">Positions: </h5><span>suhflksf</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

                            <table class="table datatable-scroll-y" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Basic</th>
                                        <th class="text-center">Allowance</th>
                                        <th class="text-center">Gross <br />Salary</th>
                                        <th class="text-center">Taxable<br /> Salary</th>
                                        <th class="text-center">Paye</th>
                                        <th class="text-center">Net<br /> Salary</th>
                                        <th class="text-center">Total<br /> Statutory<br /> Deduction</th>
                                        <th class="text-center">Bicycle<br /> Deduction</th>
                                        <th class="text-center">Net<br /> Salary<br /> Payable</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($_REQUEST['mainCatSelects']) && isset($_REQUEST['department']) && isset($_REQUEST['position'])){
                                        
                                $vSkyPos = mysqli_real_escape_string($vSky, trim(strip_tags($_REQUEST['position'])));
                                $vSkyDept = mysqli_real_escape_string($vSky, trim(strip_tags($_REQUEST['department'])));
                                $vSkyMainCat = mysqli_real_escape_string($vSky, trim(strip_tags($_REQUEST['mainCatSelects'])));
                                            
                                        $vSkyStmt = mysqli_query($vSky, "SELECT `salary_rules_id`, `ssf_id`, `dpt_id`, `cat_id`, `employee_type_name`, `department_id`, `position_id`, `Allowances`, `Basic`, `gross_salary`, `taxable_salary`, `paye`, `total_statutory_deductions`, `net_salary`, `bicycle_deduction`, `net_salary_payable`, `input_date`, `last_update` FROM `mst_salary_rules` WHERE `cat_id`='$vSkyMainCat' AND `department_id`='$vSkyDept' AND `position_id`='$vSkyPos'");
                                        
                                        while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center"><a href="#">
                                                <?php echo $vSkyRow['Basic']?></a></td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $vSkyRow['Basic']?>
                                        </td>
                                        <td class="text-center"><span class="badge badge-success">
                                                <?php echo $vSkyRow['Basic']?></span></td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:;" onclick="view_sal('hi')" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                                        <a href="javascript:;" onclick="" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                                        <a href="javascript:;" onclick="" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }else{
                                        
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /scrollable datatable -->

                    </div>
                    <div class="col-md-6">

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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Salary Rule</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#" id="sal_form">
                    <div class="modal-body">
                        <div class="row" style="margin:0px 10px ;">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-5">Main Category</label>
                                <select class="form-control" id="mainCatSelectsRule">
                                    <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `main_category`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                    <option value="<?php echo $vSkyRow['cat_id']?>">
                                        <?php echo $vSkyRow['cat_name']?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                            </div>
                            <div class="form-group row" style="margin-left:20px;">
                                <label class="col-form-label col-lg-5">Department</label>
                                <select class="form-control" id="departmentRule">
                                    <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `department`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                    <option value="<?php echo $vSkyRow['id']?>">
                                        <?php echo $vSkyRow['dep_name']?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                            </div>
                            <div class="form-group row" style="margin-left:20px;">
                                <label class="col-form-label col-lg-5">Position</label>
                                <select class="form-control" id="positionRule">
                                    <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `positions`");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){                                
                        ?>
                                    <option value="<?php echo $vSkyRow['pos_id']?>">
                                        <?php echo $vSkyRow['pos_type_name']?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Basic Salary</label>
                                    <input type="text" value="0" name="vSkyBasSal" id="vSkyBasSal" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-4">
                                    <label>Allowances</label>
                                    <input disabled type="text" value="0" name="vSkyAllow" id="vSkyAllow" class="form-control numbersonly-format">
                                </div>
                                <div class="col-sm-4">
                                    <label>Gross Salary <span style="color:blue;">(Basic Salary + Allowances)</span></label>
                                    <input disabled type="text" value="0" name="vSkyGrossSal" id="vSkyGrossSal" class="form-control numbersonly-format">
                                    <input disabled type="hidden" value="0" class="numbersonly-format" name="noww" id="noww" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Paye</label>
                                    <input type="text" name="vSkyPaye" id="vSkyPaye" value="0" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-4">
                                    <label>Bicycle Deduction</label>
                                    <input type="text" value="0" name="vSkyBideduc" id="vSkyBideduc" class="form-control numbersonly-format">
                                </div>
                                <div class="col-sm-4">
                                    <label>Net Salary <span style="color:blue;">(Basic Salary - Total Deductions)</span></label>
                                    <input readonly type="text" name="vSkyNetSal" value="0" id="vSkyNetSal" class="form-control numbersonly-format">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label>Taxable Salary</label> <span style="color:blue;">(Basic Salary - (Basic Salary * TAX(<span class="percen"></span>%)))</span>
                                    <input type="text" readonly value="0" name="vSkyTaxSal" id="vSkyTaxSal" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-5">
                                    <label>Net Salary Payable</label><span style="color:blue;"> (Net Salary - Bicycle Deduction)</span>
                                    <input type="text" readonly value="0" name="vSkyNetSal" id="vSkyNetSal" class="form-control numbersonly-format">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Total Statutory Deductions</label> <span style="color:blue;">(TAx(basic Salary * TAX(<span class="percen"></span>%)) + Paye)</span>
                                    <input type="text" readonly value="0" name="vSkyTotStatDec" id="vSkyTotStatDec" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-5">
                                    <label>Total Deductiion </label><span style="color:blue;"> (Total Statutory Deductions + Deduction)</span>
                                    <input type="text" readonly value="0" name="vSkyTotDec" id="vSkyTotDec" class="form-control numbersonly-format">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Balance</label><span style="color:blue;">(Total Dept - Deductions)</span>
                                    <input type="text" readonly name="vSkyBal" id="vSkyBal" value="0" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-5">
                                    <label>Total Debt</label> <span style="color:blue;">(Debt Bal B/D + Current Loans Surcharges)</span>
                                    <input type="text" readonly value="0" name="vSkyTotalDebt" id="vSkyTotalDebt" class="form-control numbersonly-format">
                                </div>

                                <div class="col-sm-4">
                                    <label>Debt Bal B/D </label>
                                    <input type="text" value="0" name="vSkyDebtBal" id="vSkyDebtBal" class="form-control numbersonly-format">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Deduction</label>
                                    <input type="text" name="vSkyDeduc" id="vSkyDeduc" value="0" class="form-control numbersonly-format">
                                </div>
                                <div class="col-sm-3">
                                    <label>Current Loans Surcharges</label>
                                    <input type="text" value="0" name="vSkyCurLoanSur" id="vSkyCurLoanSur" class="form-control numbersonly-format">
                                </div>
                                <div class="col-sm-6" style="margin:10px 0px 0px 70px;">
                                    <label class="d-block font-weight-semibold">Allow TAX (Please Do Not Select Any If You Do Not Want TAX Added)</label><span style="color:red;"></span>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="tax" value="emp" id="allow_emp" >
                                        <label class="custom-control-label" for="allow_emp">Use Employee (%)</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="tax" value="empler" id="allow_empler">
                                        <label class="custom-control-label" for="allow_empler">Use Employer (%)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" id="allow_gross" class="btn bg-danger"><span id="isOn">Click To Enable (Allowance And Gross Salary)</span> &nbsp;<i class="icon-lock mr-1 unlck"></i></button>
                        <button type="button" id="add_new_rule" onclick="addNewRule()" class="btn bg-primary">Add New Rule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->
</body>

</html>
