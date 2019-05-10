<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "SLIDE" ;
  //$menucode1 = 	"SLIDE1";

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();

	$news_typedet = $clsoffice->Load('news_type',array('deleted'=>0 ),' orderby DESC','' ); 
	if($news_typedet){ 
		foreach( $news_typedet as $keyt => $valt ){ 
			$news_typef = ( array_key_exists($valt['news_type_code'] ,$_GET)) ; 
			if($news_typef == 1 ){
				$news_typecode  = $valt['news_type_code'] ;  
			//	$menuname = $valt['news_type_th'] ;
				break;
			}else{
				$news_type  =	'mbanner';
			//	$menuname = "อินโฟกราฟิค" ;
			} 	 
		}
	}

	
//	$newsdata = $clsoffice->Load('news',array('deleted'=>0 ,'news_type'=>$news_typecode ,'news_office'=> $_SESSION['deptcode']),' news_datetime DESC','');
$newsdata = $clsoffice->Load('news',array('deleted'=>0 ,'news_menu'=>$news_typecode ,'news_office'=> $_SESSION['deptcode'] ),' news_datetime DESC','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					  <div class="card-header"> 
							<a href="newssd_create.php?menu=<?php echo 	$news_typecode;?>"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม <?php echo $menuname;?> </a>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
							<div class="heading-elements">
							</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							
		<?php  //echo "<pre>".print_r($newsdata,true)."</pre>" ;?>
							<div class="table-responsive">
								<table id="tbdata1" class="table table-white-space  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th  class="text-center"> ลำดับ </th>
											<th> หัวข้อ </th> 
											<th> </th>  
											<th> วันที่ข่าว </th> 
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($newsdata){  
											foreach($newsdata as $key1 => $val1 ) { 
												$newstype =  $clsoffice->LoadOnce('news_type',array('news_type_code'=>$val1['news_menu'] ));
											
									?>
										<tr >
											<td  class="text-center"> <?php echo $key1+1 ;?> </td>
											<td> 
												<?php echo $val1['news_title_th']; ?>  <br>
												<?php  
													if($newstype['displaytype']=='2' ||$newstype['displaytype']=='3'  ){
														?>
														<a href="<?php echo $path['news'].$val1['news_cover']?>" target="_blank"><img src="<?php echo $path['news'].$val1['news_cover']?>" style="height:150px;" > </a>
														<?php
													}
												?>
											</td>
											<td> 
											 
												<?php  
											 	
												echo $newstype['news_type_th']; 
												?>
											</td>  
											<td> <?php echo DateDisplay($val1['news_datetime'],8); ?>  </td>
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('news','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:contents.SetFrom('EDIT','<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" title="แก้ไข" > <i class="fa fa-edit"></i>   </a> 
												<a href="javascript:contents.callModalDelete('news','<?php echo $val1['id'];?>','<?php echo $val1['news_title_th']; ?>'newssd.php?<?php echo $news_typecode;?>');" class=" btn btn-icon btn-sm btn-danger" title="ลบ"><i class="fa fa-trash"></i>  </a>
												 
											</td> 
										</tr >
									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="newssd_edit.php">
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
