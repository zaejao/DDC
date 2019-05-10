<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "DISEASE" ;
  $menucode1 = "DISEASELIST" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();
	$disease = $clsoffice->Load('disease',array('deleted'=>0 ),'  CONVERT( disease_name_th USING tis620 ) ASC   ','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php // echo "<pre>".print_r($disease,true)."</pre>" ;?>
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					  <div class="card-header"> 
							<a href="disease_create.php"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม <?php echo $menuname;?> </a>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
							<div class="heading-elements">
							</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata1" class="table table-white-space  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th  class="text-center"> ลำดับ </th>
											<th> ชื่อโรค </th>
											<th> หน่วยงาน </th>
											<!-- <th> แสดงผลหน้าหลัก </th>  -->
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($disease){  
											foreach($disease as $key1 => $val1 ) { 
											
									?>
										<tr >
											<td  class="text-center"> <?php echo $key1+1 ;?> </td>
											<td> 
												<?php echo $val1['disease_name_th']; ?><br><?php echo $val1['disease_name_en']; ?> 
												<?php 
												if($val1['disease_pic']) {
													?>
													<br>
														<img class="disease_pic"    src="<?php echo $path['disease'].$val1['disease_pic']?>"   style="width:150px;" >
															<?php 
												}
												?>
											</td>
											<td> <?php echo $val1['department_name']; ?> </td>
											<!-- <td>   
												<?php 
												if($officelevel==1){
													?>
													<fieldset>
														<input type="checkbox" class="switchBootstrap" id="enable_<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable_dept'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnableDept('disease','<?php echo $val1['id']?>','enable_dept');"  />
													</fieldset>
													<?php
												}else{
													?>
													<fieldset>
														<input type="checkbox" class="switchBootstrap" id="enable_<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable_office'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnableOffice('disease','<?php echo $val1['id']?>','enable_office');"  />
													</fieldset>
												<?php
												}
												?>
											
											</td> -->
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable_<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('disease','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:contents.SetFrom('EDIT','<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
												<a href="javascript:contents.callModalDelete('disease','<?php echo $val1['id'];?>','<?php echo $val1['disease_name_th']; ?>','disease.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												 
											</td> 
										</tr >
									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="disease_edit.php">
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
  <?php include "prepare_footer.php";?>


	<script >
	$(document).ready(function () {
		 $('#tbdata1').DataTable();
	});
	</script>
