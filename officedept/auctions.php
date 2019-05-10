<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "AUCTIONS" ;
  

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();

	$typedet = $clsoffice->Load('auctions_type',array('deleted'=>0 ),' orderby DESC','' ); 
	if($typedet){ 
		foreach( $typedet as $keyt => $valt ){ 
			$typef = ( array_key_exists($valt['auctions_type_code'] ,$_GET)) ; 
			if($typef == 1 ){
				$typecode  = $valt['auctions_type_code'] ;  
				$menuname =  $valt['auctions_type_th'];
				break;
			}else{
				$typecode  =	'auctions_plan'; 
			} 	 
		}
	}
	
	$menucode1 = 	$typecode;
	$dataset = $clsoffice->Load('auctions',array('deleted'=>0 ,'auctions_type_code'=>$typecode ,'department_code_ch'=> $_SESSION['deptcode']),' auctions_startdate DESC','');

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
							<a href="auctions_create.php?<?php echo 	$typecode;?>"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม <?php echo $menuname;?> </a>
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
											<th style="width:550px;"> ชื่อเรื่อง </th> 
											<th> เอกสาร </th>  
											<th> วันที่ประกาศ </th> 
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($dataset){  
											foreach($dataset as $key1 => $val1 ) { 
									 
											
									?>
										<tr >
											<td  class="text-center"> <?php echo $key1+1 ;?> </td>
											<td  style="width:550px;"> 
												<?php echo $val1['title_th']; ?>  
											</td>
											<td> 
											<?php 	
											 	if($val1['file']){
														echo '<a href="../uploads/files/'.$val1['file'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
												}
												if($val1['file2']){
													echo '<a href="../uploads/files/'.$val1['file2'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
												}
												if($val1['file3']){
													echo '<a href="../uploads/files/'.$val1['file3'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
												}
												if($val1['file4']){
													echo '<a href="../uploads/files/'.$val1['file4'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
												}
												if($val1['file5']){
													echo '<a href="../uploads/files/'.$val1['file5'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
												}
											?> 
											</td>  
											<td> <?php echo DateDisplay($val1['auctions_startdate'],8); ?>  </td>
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('auctions','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:contents.SetFrom('EDIT','<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" title="แก้ไข" > <i class="fa fa-edit"></i>   </a> 
												<a href="javascript:contents.callModalDelete('auctions','<?php echo $val1['id'];?>','<?php echo $val1['title_th']; ?>','auctions.php?<?php echo $typecode;?>');" class=" btn btn-icon btn-sm btn-danger" title="ลบ"><i class="fa fa-trash"></i>  </a>
												 
											</td> 
										</tr >
									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="auctions_edit.php">
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
