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
      <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title" style="margin-left:500px;"> <span class="text-justify text-center text-default font-weight-semibold"> List Of All Employees Not On Payroll</span><span style="font-size:15px;"> <?php  ?></span></h5>
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
                                <th class="text-center">NAME</th>
                                <th class="text-center">ACCOUNT#.</th>
                                <th class="text-center">BANK<br /> BRANCH</th>
                                <th class="text-center">SSNIT#</th>
                                <th class="text-center">DEPARTMENT.</th>
                                <th class="text-center">POSITION.</th>
                                <th class="text-center">CATEGORY.</th>
                                <th class="text-center">ADD TO PAYROLL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vSkyStmt = mysqli_query($vSky, "SELECT * FROM `employees` AS emp
                            INNER JOIN `department` AS dept ON emp.`emp_dept_id`=dept.`id`
                            INNER JOIN `positions` AS pos ON emp.`emp_pos_id`=pos.`pos_id`
                            INNER JOIN `main_category` AS cat ON emp.`emp_main_cat_id`=cat.`cat_id`
                            WHERE emp.`on_payroll`='0'");
                            while($vSkyRow = mysqli_fetch_assoc($vSkyStmt)){
                                $emp_iddd = $vSkyRow['emp_id'];
                                            ?>
                            <tr id='row_<?php echo $vSkyRow['emp_id']; ?>'>
                                <td class="text-center">
                                    <?php echo $vSkyRow['emp_name']; ?>
                                </td>
                                <td class="text-center">
                                        <?php echo $vSkyRow['emp_bank_account_no']; ?></td>
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
                                    <button onclick="add_to_payroll('<?php echo $vSkyRow['emp_id']?>','<?php echo $vSkyRow['emp_main_cat_id']; ?>')" class="list-icons-item btn btn-light">
                                            <i class="icon-pointer add_to_payRoll<?php echo $vSkyRow['emp_id']?>" style="color:#529c1a;"></i>
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