<?php
  include "prepare_htmlhead.php";

  $menucode = "NEWS" ;
  $menucode1 = "NEWSDATA" ;

  include "../gates/duck.class.php";
  include "../gates/contents.class.php";
  include "../gates/grade.class.php";
  include "../gates/func.php";


?>
    <?php include "prepare_navtop.php";?>
    <?php include "prepare_navside.php";?>


  <div class="app-content content">
    <div class="content-wrapper">
		  <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
          <h3 class="content-header-title">E-News จัดการข่าว</h3>
          <div class="row breadcrumbs-top col-12">
            <div class="breadcrumb-wrapper col-10">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="news_data.php">E-News</a> </li>
              </ol>
            </div>
          </div>
        </div>
  			<div class="content-header-right col-md-6 col-12">
  			</div>
    </div>

		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					  <div class="card-header">
						<h4 class="card-title"> ข่าวประชาสัมพันธ์</h4>
						<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
						<div class="heading-elements">
							<a href="news_create.php">
						  <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> เพิ่มข่าวประชาสัมพันธ์</button>
						  </a>
						</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body">
						<!-- Task List table -->
						<div class="table-responsive">
						  <table id="tbdata_news" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
							<thead>
							  <tr>
								  <th> ลำดับ </th>
								  <th>ประเภท</th>
								  <th>ชนิด</th>
								  <th>เรื่อง</th>
								  <th>Hilight</th>
								  <th>แสดงผล</th>
								  <th>จัดการข้อมูล</th>
							  </tr>
							</thead>
							<tbody>
								<tr >
									<td> z </td>
									<td> fff </td>
									<td> z </td>
									<td> fff </td>
									<td> z </td>
									<td> fff </td>
									<td> z </td> 
      							
								</tr >
							
							</tbody>
						  </table>
              <form id="form_set" method="post">
                <input type="hidden" id="data_id" name="data_id" value="">
                <input type="hidden" id="action" name="action" value=""> <!-- EDIT  CREATE  VIEW -->
              </form>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
			</div>
		  </div>
	</div>
  </div>

    <!-- ////////////////////////////////////////////////////////////////////////////-->



    <?php include "prepare_script.php";?>

  <!-- BEGIN VENDOR JS-->
  <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="../app-assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->

  <?php include "prepare_footer.php";?>


	<script >
	$(document).ready(function () {
		 $('#tbdata_news').DataTable();
	});
	</script>
