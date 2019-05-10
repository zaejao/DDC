<?php
  include "prepare_htmlhead.php";

  $menucode = "MENU" ;
  $menucode1 = "MENUDATA" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clscont = new ContentsClass();
	$clsoffice = new OfficeClass();

	$menusub1 = $clsoffice->Load('menusub',array('menusub_level'=>'1' ,'department_code_ch'=>$_SESSION['deptcode'],'deleted'=>0 ),' orderby desc ','');
	//$menusub1 = $clsoffice->Load('menusub',array('menusub_level'=>'1','deleted'=>0 ),' orderby desc ','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php // echo "<pre>".print_r($menusub1,true)."</pre>" ;?>
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					  <div class="card-header"> 
							<a href="menu_create.php"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม <?php echo $menuname;?> </a>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
							<div class="heading-elements">
							</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata" class="table table-xs table-white-space  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th  class="text-left"> ลำดับ </th>
											<th> ชื่อเมนูภาษาไทย </th>
											<th> ประเภท </th>  
											 <th> ลิงก์ </th>  
											<th> แสดงผล </th>
											<th class="text-center"> เรียงลำดับ </th>
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($menusub1){  
											foreach($menusub1 as $key1 => $val1 ) { 
												
											 
											
									?>
										<tr class="group">
											<td  class="text-left"> <?php echo $key1+1 ;?> </td>
											<td> 
											<?php echo $val1['menusub_name_th']; ?> 
										
											</td>
										 	<td> <?php echo SetMenuLinktype($val1['menusub_linktype']); ?> </td>  
											 <td> <?php echo $val1['menusub_otherlink']; ?> </td>  
											<td> 
												<?php // echo $val1['enable_en']; ?> 
											  <fieldset>
														<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('menusub','<?php echo $val1['id']?>','enable');"  />
												</fieldset>  
											</td>
											<td  class="text-center"> <?php echo $val1['orderby']; ?> </td>
											<td class="text-center">  
												<a href="javascript:contents.SetFrom('EDIT','<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
												<a href="javascript:contents.callModalDelete('menusub','<?php echo $val1['id'];?>','<?php echo $val1['menusub_name_th']; ?>','menu.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												 
											</td> 
										</tr >
									<?php 
										$menusub2 = $clsoffice->Load('menusub',array('menusub_level'=>'2','department_code_ch'=>$_SESSION['deptcode'],'menusub_id'=>$val1['id'],'deleted'=>0 ),' orderby desc ','');
									 // echo "<pre>".print_r($menusub2,true)."</pre>" ;
										if($menusub2){
											foreach( $menusub2 as $key2 => $val2){
												?>
													<tr >
														<td  class="text-left"> <?php echo "&nbsp;".($key1+1).".".($key2+1) ;?> </td>
														<td>  	<?php echo $val2['menusub_name_th']; ?>  
														</td>
														<td> <?php echo SetMenuLinktype($val2['menusub_linktype']); ?> </td>  
														<td> <?php echo $val2['menusub_otherlink']; ?> </td>  
														<td>  
														<fieldset>
															<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val2['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val2['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('menusub','<?php echo $val2['id']?>','enable');"  />
														</fieldset>  
														</td>
														<td  class="text-center"> <?php echo $val2['orderby']; ?> </td>
														<td class="text-center"> 
															<a href="javascript:contents.SetFrom('EDIT','<?php echo $val2['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
															<a href="javascript:contents.callModalDelete('menusub','<?php echo $val2['id'];?>','<?php echo $val2['menusub_name_th']; ?>','menu.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												 	</td> 
													</tr >	

													<?php 
														$menusub3 = $clsoffice->Load('menusub',array('menusub_level'=>'3','department_code_ch'=>$_SESSION['deptcode'],'menusub_id'=>$val2['id'],'deleted'=>0 ),' orderby desc ','');
														if($menusub3){
															foreach( $menusub3 as $key3 => $val3){
																?>
																	<tr >
																		<td  class="text-left"> <?php echo "&nbsp;&nbsp;".($key1+1).".".($key2+1).".".($key3+1) ;?> </td>
																		<td>  	<?php echo $val3['menusub_name_th']; ?>  
																		</td>
																		<td> <?php echo SetMenuLinktype($val3['menusub_linktype']); ?> </td>  
																		<td> <?php echo $val3['menusub_otherlink']; ?> </td>  
																		<td>  
																		<fieldset>
																			<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val3['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val3['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('menusub','<?php echo $val3['id']?>','enable');"  />
																		</fieldset>  
																		</td>
																		<td  class="text-center"> <?php echo $val3['orderby']; ?> </td>
																		<td class="text-center"> 
																			<a href="javascript:contents.SetFrom('EDIT','<?php echo $val3['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
																			<a href="javascript:contents.callModalDelete('menusub','<?php echo $val3['id'];?>','<?php echo $val3['menusub_name_th']; ?>','menu.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
																	</td> 
																	</tr >	
																	<?php 
																			$menusub4 = $clsoffice->Load('menusub',array('menusub_level'=>'4','department_code_ch'=>$_SESSION['deptcode'],'menusub_id'=>$val3['id'],'deleted'=>0 ),' orderby desc ','');
																			if($menusub4){
																				foreach( $menusub4 as $key4 => $val4){
																					?>
																						<tr >
																							<td  class="text-left"> <?php echo "&nbsp;&nbsp;&nbsp;".($key1+1).".".($key2+1).".".($key3+1).".".($key4+1) ;?> </td>
																							<td>  	<?php echo $val4['menusub_name_th']; ?>  
																							</td>
																							<td> <?php echo SetMenuLinktype($val4['menusub_linktype']); ?> </td>  
																							<td> <?php echo $val4['menusub_otherlink']; ?> </td>  
																							<td>  
																							<fieldset>
																								<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val4['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val4['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('menusub','<?php echo $val4['id']?>','enable');"  />
																							</fieldset>  
																							</td>
																							<td  class="text-center"> <?php echo $val4['orderby']; ?> </td>
																							<td class="text-center"> 
																								<a href="javascript:contents.SetFrom('EDIT','<?php echo $val4['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
																								<a href="javascript:contents.callModalDelete('menusub','<?php echo $val4['id'];?>','<?php echo $val4['menusub_name_th']; ?>','menu.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
																						</td> 
																						</tr >	
																					<?php
																				
																				}

																			}
																		?>
																<?php
															
															}

														}
													?>


												<?php
											 
											}

										}
									?>



									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="menu_edit.php">
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
