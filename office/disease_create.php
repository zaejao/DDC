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

	//$disease = $clsoffice->Load('disease',array('deleted'=>0 ),'  CONVERT( disease_name_th USING tis620 ) ASC   ','');
	//$dataid = $_POST['data_id'];
	//$dataid = 34;
//	$disease = $clsoffice->LoadOnce('disease',array('id'=>	$dataid  ) );
	$department = $clsoffice->Load('department',array('deleted'=>0 ),'  CONVERT( department_name_th USING tis620 ) ASC   ','');
	$disease_header = $clsoffice->Load('disease_header',array('deleted'=>0 ),' orderby DESC','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php  //echo "<pre>".print_r($disease_header,true)."</pre>" ;?>
			<div class="content-detached">
				<div class="content-body">

					<section class="row">
					<div class="col-12">
						<div class="card">
						<div class="card-head">
							<div class="card-header"> 
								<!-- <h4 class="card-title" id="from-actions-top-bottom-right">เพิ่ม<?php echo $menuname;?></h4> -->
							</div>
						</div>
						<div class="card-content collpase show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10 mx-auto" >
												
												<form class="form form-horizontal">
													<div class="form-body">
														
														<h4 class="form-section"><i class="ft-clipboard"></i> เพิ่มรายชื่อโรค </h4>


														<input id="diseaseid" type="hidden" value="<?php echo $dataid;?>"> 
														<div class="form-group row">
															<label class="col-md-3 label-control" for="disease_name_th">ชื่อโรคภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
															<div class="col-md-9">
																<input id="disease_name_th" type="text" class="form-control" name="disease_name_th" value="<?php echo $disease['disease_name_th'] ?>" placeholder="ชื่อโรคภาษาไทย">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-md-3 label-control" for="disease_name_en">ชื่อโรคภาษาอังกฤษ <?php echo  $pathfllang['en'];?><span class="danger">*</span></label>
															<div class="col-md-9">
																<input id="disease_name_en" type="text" class="form-control" name="disease_name_en" value="<?php echo $disease['disease_name_en'] ?>" placeholder="ชื่อโรคภาษาไทย">
															</div>
														</div>
														

														<div class="form-group row">
															<label class="col-md-3 label-control" for="department_code_ch">หน่วยงาน <span class="danger">*</span></label>
															<div class="col-md-6">
																	<select class="form-control select2" id="department_code_ch" name="department_code_ch" >
																	<?php 
																		if ($department) {
																			foreach ($department as $key_d => $val_d) {
																		?>
																			<option value="<?php echo $val_d['department_code_ch'];?>" <?php if($val_d['department_code_ch']==$disease['department_code_ch']){ echo "selected";}?>>  <?php echo $val_d['department_name_th'];?></option>
																		<?php 
																			}
																		} 
																		?>
																	</select>
															</div>
														</div> 

														 
														<div class="form-group row">
															<label class="col-md-3 label-control" for="">รูปภาพประกอบ <?php //echo $path['disease'].$disease['disease_pic']?> </label>
															<div class="col-md-6">
																<div class="img_center">
																		<img class="disease_pic"  id="picture_disp"  src="<?php echo $path['disease'].$disease['disease_pic']?>"   id="picture_disp" onerror="this.onerror=null;this.src='<?php echo $path['disease'].'/1.png';?>';" >
																</div>
																<br>
																<fieldset class="form-group">
																			<div class="custom-file">
																					<input type="file" class="form-control" id="disease_pic" name="disease_pic" accept="image/*" onchange="duck.DisplayImage(event,'disease_pic','','picture_disp')"> 
																			</div>
																	</fieldset>
															</div>
														</div>

 
														<?php 
																if($disease_header){
																	$numh = 0 ;
																	foreach($disease_header as $key_h => $val_h){ 
																		$numh++;
																		$disease_detail[$val_h['id']] = $clsoffice->LoadOnce('disease_detail',array('deleted'=>0 ,'disease_id'=>	$dataid ,'disease_header_id'=>$val_h['id']));
																				/*
																		for($i=0;$i<=1;$i++){
																			if($i==0){
																				$txtlang = $pathfllang['th'];
																				$txtlang2 ="th";
																			}else{
																				$txtlang = $pathfllang['en'];
																				$txtlang2 ="en";
																			} */
																			$txtlang2 ="th";
																	?>
																	<div class="form-group row">
																		<label class="col-md-3 label-control" for="<?php echo $val_h['id']?>"> 
																			<?php echo $val_h['disease_header_th'].'/'.$val_h['disease_header_en']?>   
																		</label>
																		<input type="hidden" id="dh_<?php echo ($key_h+1);?>" value="<?php echo $val_h['id']?>" >

																		<div class="col-md-9">
																			<div class="summernote" id="diseasedetail<?php echo $val_h['id'];?>" > 
																				<?php echo htmlspecialchars_decode($disease_detail[$val_h['id']]['detail_th']);?>
																				<?php //echo ContentDisplay($disease_detail[$val_h['id']]['detail_th']);?>
																			</div>
																		</div>
																	</div> 

 
																	<?php
																	//	}
																	}
																}
																?> 
											 
												
												<input type="hidden" id="numh" value="<?php echo $numh;?>" >
														 

													</div> 
												</form>
											
											   
															 
                            <div class="form-group ml-5">
                              <label for="">การแสดงผล</label>
                              <div class="row skin skin-square-orange ml-2">
                                <div class="form-check form-check-inline mr-5">
                                <input class="form-check-input mr-1" type="radio" name="enable" id="t1" value="Y" <?php  if($disease['enable']=='Y'){echo "checked";} ?>>
                                <label class="form-check-label ml-1" for="t1">เปิดใช้งาน</label>
                                </div>
                                <div class="form-check form-check-inline mr-5">
                                <input class="form-check-input mr-1" type="radio" name="enable" id="t2" value="N" <?php  if($disease['enable']=='N'){echo "checked";} ?>>
                                <label class="form-check-label ml-1" for="t2">ไม่เปิดใช้งาน</label>
                                </div>
                              </div>
														</div>
														

 	


                      </div>
                    </div>
                    <hr>
                      <div class="text-center my-1">
                        <a href="disease.php" class="btn btn-warning"> <i class="ft-arrow-left"></i> กลับ</a>
											 
												<button  class="btn btn-info" onclick="office.CheckFormDisease();" ><i class="la la-check-square-o"></i> บันทึก  </button>
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
   <!-- modal_confirm -->
	 <div class="modal fade text-left" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true" >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info white text-center">
            <h4 class="modal-title modal-center white" ><i class="la la-save"></i> ยืนยันการบันทึกข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
          <br>
            <p> ต้องการยืนยันการบันทึกข้อมูล </p>
          </div>
          <div class="modal-footer ">
            <div class="modal-center">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-outline-info"  onclick="office.CreateDisease('<?php echo $dataid;?>');" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./modal_confirm -->
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <?php include "prepare_script.php";?>
	<?php include "prepare_footer.php";?>
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/selects/select2.min.css"> 
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/editors/summernote.css">
  <script src="../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
	
 


	<script type="text/javascript">
    $(function() {
		$('.summernote').summernote({
			height: 200 ,
			toolbar: [ 
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']], 
				['height', ['height']] ,
				['Insert', ['table','hr','picture','link','video'] ] ,
				['View', ['codeview']] ,
				['para', ['ul', 'ol', 'paragraph']],
			  ],
			callbacks: {
				onImageUpload: function(files) {
					for(var i = 0 ; i < files.length ; i++)
					{
						sendFile(files[i], $(this));
					}
				},
				onPaste: function (e) {
					var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
					e.preventDefault();
					document.execCommand('insertText', false, bufferText);
				}
			}	
		});
    });
	
	function sendFile(file, editor) 
	{	
		var path_upload = '../uploads/summernote';
		//console.log(path_upload);
		data = new FormData();
		data.append("file", file);
		data.append("path_upload", path_upload);
		$.ajax({
			data: data,
			type: "POST",
			url: "../gates/UploadTempSummernote.php",
			cache: false,
			contentType: false,
			processData: false,
			success: function(url) {
				console.log(url);
				var title_error = "Unknow" ; 
				var message_error  = "Unknow Error";
				var is_error = false;

				switch (url)
				{ 
					case "Upload Error" :
						title_error 			= 	'Failed upload to server';
						message_error 	=	'File upload to server failed , Please try upload again.';
						is_error = true;
					break;
					case "Invalid File" :
						title_error 			= 	'Picture not allow';
						message_error 	=	'Picture extension allow jpg or jpeg only.';
						is_error = true;
					break;
					case "Not Image File" :
						title_error 			= 	'Not image file';
						message_error 	=	'File uploaded is not a image.';
						is_error = true;
					break;
					case "File too big" :
						title_error 			= 	'File too big';
						message_error 	=	'Picture uploaded is too big , Please try another picture.';
						is_error = true;
					break;
					case "Move File Error" :
						title_error 			= 	'Error while move file ';
						message_error 	=	'Server can\'t move upload file , Please try upload again.';
						is_error = true;
						break;					
					default :					
					break;		
				}			
					
				if (is_error)
					alert(title_error + " : " + message_error);
				else
				{ 
					editor.summernote("insertImage",JSON.parse(url));
				}
			}
		}).fail(function(){
			//console.log('Failed to upload file');
			alert('sds');
		});
	}
	
  </script> 
	<script >
	$(document).ready(function () {
		 $('#tbdata1').DataTable();

	 
	});
	</script>
