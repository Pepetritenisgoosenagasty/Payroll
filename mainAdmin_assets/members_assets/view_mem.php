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
    
      if(!isset($_SESSION['name'])){
    header("Location: /payroll/index");
  }
?>
<style>
    .dataTable thead .sorting_asc:after {
    content: ''; 
     opacity: 0; 
}
    .dataTable thead .sorting_desc:after {
    content: '';
    opacity: 0;
}
    </style>

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
                    <div class="row " style="margin:0px 10px 20px;">
                        <div class="col " style="margin-left:0px; margin-top:35px;">
                            <button type="button" onclick="del_al_mem()" id="_del_items_all" class="btn btn-outline-danger"><i class="icon-trash-alt mr-2"></i> <span class="ladda-label labll2 mr-2">Delete All</span> </button>
                        </div>
                        <div class="col " style="margin-left:0px; margin-top:35px;">
                            <button type="button" onclick="del_chkd_mem()" id="_del_item_chkd" class="btn btn-outline-warning"><i class="icon-trash mr-2"></i><span class="ladda-label labll mr-2">Delete Checked</span>
                            </button>
                        </div>


                        <!--
                        <div class="col" style="margin-left:0px; margin-top:35px;">
                            <button type="submit" class="btn btn-outline-warning"><i class="icon-cog3 mr-2"></i> Generate Payroll Slip </button>
                        </div>
-->

                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>
                        <div class="col ">

                        </div>

                        <div class="col-auto" style="margin-top:35px;">
                            <button type="button" id="btn_new" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-plus2 mr-2"></i> Add New Employee</button>

                        </div>

                    </div>
                </form>
                <script>
                    $('#btn_new').click(function(){ window.location = 'add_mem'});
						           </script>
                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title"> Employees Lists</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--						 <code>scrolling</code> in the <code>vertical</code> -->
                    </div>

                    <table class="table datatable-scroll-y" id="recordsTable2" width="100%" style="margin-left:0px; width:1380px;">
                        <thead>
                            <tr>
                                <th><input type='checkbox' name='checkboxe' class='second' id='selectall'></th>
                                <th class="text-center">NAME</th>
                                <th class="text-center">ACCOUNT#.</th>
                                <th class="text-center">BANK<br /> BRANCH</th>
                                <th class="text-center">SSNIT#</th>
                                <th class="text-center">DEPT.</th>
                                <th class="text-center">POS.</th>
                                <th class="text-center">CATE.</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `employees` AS emp 
                                        INNER JOIN department AS dept ON emp.emp_dept_id = dept.id
                                        INNER JOIN positions AS pos ON emp.emp_pos_id = pos.pos_id
                                        INNER JOIN main_category AS mCat ON emp.emp_main_cat_id = mCat.cat_id WHERE emp.is_pending='0' AND emp.on_leave='0' AND emp.sacked='0'");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                            ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>
                                <td><input type='checkbox' name='<?= $vSkyRow['emp_id']; ?>' id='memTypeId_<?php echo $vSkyRow['emp_id']; ?>' class='checkboxes'></td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center"><a href="javascript:;">
                                        <?php echo $vSkyRow['emp_bank_account_no']; ?></a></td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_bank_branch']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_ssnit']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['dep_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['pos_type_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $vSkyRow['cat_name']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <button onclick="display_emp(<?php echo $vSkyRow['emp_id']?>)" class="list-icons-item btn btn-light" data-toggle="modal" data-target="#modal_form_vertical">
                                            <i class="icon-pencil5" style="color:orange;"></i>
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
                <!-- /scrollable datatable -->



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

    <script type="text/javascript">
        $('input[type="checkbox"]').on('click', function() {
            if (this.checked) {

                $('#row_' + this.name).css('background-color', '#2e89ab');
                $('#row_' + this.name).css('color', '#fff');
                $('.dropdown').css('color', "#3b3b3b");
                var all_checked = false;

                var check_boxes = document.getElementsByClassName('checkboxes');

                for (var x = 0; x < check_boxes.length; x++) {
                    if (check_boxes[x].checked) {
                        all_checked = true;
                    } else {
                        all_checked = false;
                        break;
                    }
                }
                var all_check_box = document.getElementById('selectall');
                if (all_checked == true) {
                    all_check_box.checked = true;
                }

            } else {

                $('#row_' + this.name).css('background-color', '');
                $('#row_' + this.name).css('color', '#000');

                var all_check_box = document.getElementById('selectall');

                if (all_check_box.checked) {
                    all_check_box.checked = false;
                }
            }
        });

        $('#selectall').on('click', function() {

            if (this.checked) {
                var check_boxes = document.getElementsByClassName('checkboxes');

                for (var x = 0; x < check_boxes.length; x++) {
                    check_boxes[x].checked = true;
                    var checkbox_id = check_boxes[x].name;
                    $('#row_' + checkbox_id).css('background-color', '#2e89ab');
                    $('#row_' + checkbox_id).css('color', '#fff');
                    $('.dropdown').css('color', "#3b3b3b");
                }
                for (var x = 0; x < check_boxes.length; x++) {
                    check_boxes[x].checked = true;
                    var checkbox_id = check_boxes[x].name;
                    $('#row_' + checkbox_id).css('background-color', '#2e89ab');
                    $('#row_' + checkbox_id).css('color', '#fff');
                    $('.dropdown').css('color', "#3b3b3b");
                }
            } else {
                var check_boxes = document.getElementsByClassName('checkboxes');

                for (var x = 0; x < check_boxes.length; x++) {
                    check_boxes[x].checked = false;
                    var checkbox_id = check_boxes[x].name;
                    $('#row_' + checkbox_id).css('background-color', '');
                    $('#row_' + checkbox_id).css('color', '#000');
                }
            }
        })


        $("#search_bib").keydown(() => {
            $("#search_bib").css("border", "1px solid #ddd");
            $("#search_bib").css("box-shadow", "0 0 0 0 transparent");
        });

    </script>

</body>
<!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action="#" id="emp_form">
                <div class="modal-body">
                    <!-- Personal Infomation start here  -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Name</label>
                                <input type="text" name="vSkyName" id="vSkyName" class="form-control wordsonly-format">
                                <input type="hidden" name="vSkyEmpIDDD" id="vSkyEmpIDDD" class="form-control wordsonly-format">
                            </div>

                            <div class="col-sm-3">
                                <label>Phone Number</label>
                                <input type="text" name="vSkyPhone" id="vSkyPhone" class="form-control numbersonly-format">
                            </div>
                            <div class="col-sm-3">
                                <label>Email</label>
                                <input type="text" name="vSkyEmail" id="vSkyEmail" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Nationality</label>
                                <input type="text" name="vSkyNation" id="vSkyNation" class="form-control wordsonly-format">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Bank Number</label>
                                <input type="text" name="vSkyBankNum" id="vSkyBankNum" class="form-control numbersonly-format">
                            </div>
                            <div class="col-sm-3">
                                <label>Bank Branch</label>
                                <input type="text" name="vSkyBankBranch" id="vSkyBankBranch" class="form-control">
                            </div>

                            <div class="col-sm-3">
                                <label>SSNIT Number</label>
                                <input type="text" name="vSkySsnit" id="vSkySsnit" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Other Info.</label>
                                <input type="text" name="vSkyOtherInfo" id="vSkyOtherInfo" class="form-control wordssonly-format">
                            </div>
                        </div>
                    </div>
                    <!-- personal Informations end here  -->

                    <!--salary info for processing start   -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Basic Salary</label>
                                <input type="text" value="0" name="vSkyBasSal" id="vSkyBasSal" class="form-control numbersonly-format">
                            </div>
                              <div class="col-sm-3">
                                <label>Paye</label>
                                <input readonly type="text" name="vSkyPaye" id="vSkyPaye" value="0" class="form-control numbersonly-format">
                            </div>
                        </div>
                    </div>  
                    <input type="hidden" id="vSkyEmpDbPosId" name="vSkyEmpDbPosId">
                    <input type="hidden" id="vSkyEmpDbDeptId" name="vSkyEmpDbDeptId">
                    <input type="hidden" id="vSkyEmpDbMainCatId" name="vSkyEmpDbMainCatId">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="update_emp_emp" onclick="updateEmpEmp()" class="btn bg-primary"><span id="updatePos" class="ladda-label labll">Update</span><i class="icon-reset ml-2 updateEmpEmp"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

</html>
