/////////////////////////////////////////////////////////////////////////////////////
////////////////////           office   Script          ///////////////////////////
var office = {
				url : '../gates/office.inc.php',
				path :  'http://'+window.location.host 
			};
  
//////////////////////////////////////////////////////////////////////////////////////////////////
office.callModalAdd=function(FuncName,table){

	//alert(FuncName);
	var btn_add = '<button type="button" class="btn btn-success" onclick="'+FuncName+'();"> <i class="fa fa-save"> </i> ยืนยันการเพิ่มข้อมูล </button>';
	$("#btn_add").html(btn_add);

	$('#modal_add').modal('show');
};

office.callModalEdit=function(FuncName,table,table_id,detail){

	//$("#txt_mo_name").html(detail);

	var btn_edit = '<button type="button" class="btn btn-warning" onclick="'+FuncName+'();"> <i class="fa fa-trash"> </i> ยืนยันการแก้ไข </button>';
	$("#btn_edit").html(btn_edit);

	$('#modal_edit').modal('show');
};

office.callModalDelete=function(table,table_id,detail,link){


	$("#txt_mo_name").html("ต้องการยืนยันการลบข้อมูล "+ detail);

	var btn_delete = '<button type="button" class="btn btn-danger" onclick="office.callDelete(\''+table+'\',\''+table_id+'\',\''+link+'\');"> <i class="fa fa-trash"> </i> ยืนยัน </button>';
	$("#btn_delete").html(btn_delete);

	$('#modal_delete').modal('show');
};

office.callModalDisable=function(table,table_id,detail,link){


	$("#txt_detail_dis").html("ต้องการยืนยันการลบข้อมูล "+ detail);

	var btn_disable = '<button type="button" class="btn btn-danger" onclick="office.callDisable(\''+table+'\',\''+table_id+'\',\''+link+'\');"> <i class="fa fa-trash"> </i> ยืนยัน </button>';
	$("#btn_disable").html(btn_disable);

	$('#modal_disable').modal('show');
};


office.callModalDeleteTruly=function(table,table_id,detail){
	$("#txt_mo_name").html(detail);

	var btn_delete = '<button type="button" class="btn btn-danger" onclick="office.callDeleteTruly(\''+table+'\',\''+table_id+'\');"> <i class="fa fa-trash"> </i> ยืนยันการลบ </button>';
	$("#btn_delete").html(btn_delete);

	$('#modal_delete').modal('show');
};

office.callDelete=function(table,table_id,link){
	//alert(table);
	//alert(table_id);
	if(!fieldname){
		var fieldname = 'id';
	}
	var DataSet = {
					table : table ,
					data  : {
						deleted : '1' ,
						} ,
					where : { id : table_id }
				};
	//console.log(DataSet);

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
			$('#modal_delete').modal('hide');
		},
		success:function(data){
			//console.log(data);

			if( data.success == "COMPLETE" ){

				 duck.ModalSShow();

				// setTimeout(duck.ModalSHide, 3000);
				if(link=='backlink'){
					setTimeout( duck.OpenBack   , 500   );
				}else{
					setTimeout( duck.ReloadPage   , 3000   );
				}
			}else{
				 	duck.ModalWShow();
			}

		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callDelete');
			console.log(data);
				duck.NotiDanger();
		}
	});
};

office.callDisable=function(table,table_id,link){
	//alert(table);
	//alert(table_id);
	$('#modal_disable').modal('hide');
	if(!fieldname){
		var fieldname = 'id';
	}
	var DataSet = {
					table : table ,
					data  : {
						enable : 'N' ,
						} ,
					where : { id : table_id }
				};
	//console.log(DataSet);

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
			$('#modal_delete').modal('hide');
		},
		success:function(data){
			//console.log(data);

			if( data.success == "COMPLETE" ){

				 duck.ModalSShow();

				// setTimeout(duck.ModalSHide, 3000);
				if(link=='backlink'){
					setTimeout( duck.OpenBack   , 500   );
				}else{
					setTimeout( duck.ReloadPage   , 3000   );
				}
			}else{
				 	duck.ModalWShow();
			}

		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callDelete');
			console.log(data);
				duck.NotiDanger();
		}
	});
};

office.callDelete_EX=function(table,table_id,id_name,status_name,link){
	var DataSet = {
					table : table ,
					data  : {
						status : 'D' , //status_name
						id : table_id, //status_name
					},
					data_name :{
						status_n	: status_name ,
						id_n		: id_name ,
					}
				};
	//console.log(DataSet);

	$.ajax({
		url:office.url+'?mode=StatusDataSetEX',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
				if( data.success == "COMPLETE" ){
					 duck.ModalSShow();
					if(link=='backlink'){
						setTimeout( duck.OpenBack   , 500   );
					}else{
						setTimeout( duck.ReloadPage   , 3000   );
					}
				}else{
					 	duck.ModalWShow();
				}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callDelete');
			console.log(data);
				duck.NotiDanger();
		}
	});


};

office.callDeleteTruly=function(table,table_id){

	var DataSet = {
					table : table ,
					where : { id : table_id }
				};
	//console.log(DataSet);

	$.ajax({
		url:office.url+'?mode=DeleteDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
			$('#modal_delete').modal('hide');
		},
		success:function(data){
			//console.log(data);

			if( data.success == "COMPLETE" ){
				alert("ลบรายการสำเร็จ");
				window.location.reload(); ;

			}else{
				alert("ลบรายการไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");

			}

		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callDelete');
			console.log(data);
		}
	});


};

office.callSetEnable=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "enable";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						enable : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();

			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetEnable');
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.callSetEnableTH=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "enable_th";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						enable_th : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();

			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetEnableTH');
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.callSetEnableEN=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "enable_en";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						enable_en : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();

			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetEnableEN');
			console.log(data);
			duck.NotiDanger();
		}
	});
};


office.callSetEnableDept=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "enable_dept";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						enable_dept : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();

			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetEnableDept');
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.callSetEnableOffice=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "enable_office";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						enable_office : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();

			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}
		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetEnableOffice');
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.callSetDisplay=function(table_name,table_id,refto){
	var x= 'N';
	if(!refto){
		refto = "display";
	}
	if(  $("#"+refto+table_id).is(':checked') == true ){
			 x='Y';
	}
	var DataSet = {
					table : table_name ,
					data  : {
						display : x ,
						} ,
					where : { id : table_id }
	};

	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: DataSet,
		beforeSend:function(){
		},
		success:function(data){
			if( data.success == "COMPLETE" ){
				duck.NotiSuccess();
				/*
				 duck.ModalSShow();

				// setTimeout(duck.ModalSHide, 3000);
				if(link=='backlink'){
					setTimeout( duck.OpenBack   , 500   );
				}else{
					setTimeout( duck.ReloadPage   , 3000   );
				}
				*/
			}else{
				 //	duck.ModalWShow();
				 duck.NotiWarning();
			}

		},
		complete:function(){
		},
		error:function(data){
			console.log('Please check scripts callSetDisplay');
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.LoadProvince=function(v_val,element_id){
	if(v_val){
		//		alert(v_val);
	}
	var exDat = {
					table : "provinces" ,
					where : { enable:"Y" },
					orderby : " CONVERT (   provincesname_th  USING tis620 ) ASC " ,
					limit : "" ,
				};

	$.ajax({
		url:office.url+'?mode=LoadAllData',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			//console.log(data);
			$('#'+element_id).find('option').remove()
			$('<option>').attr('value','').text("กรุณาเลือกจังหวัด").appendTo('#'+element_id);
			$.each(data, function(i, result) {
				if(result.id == v_val ){
					$(".select2-chosen").text(result.provincesname_th);
					$('<option>').attr('value', result.id).attr('selected', 'selected').text( result.provincesname_th).appendTo('#'+element_id);
				}else{
					$('<option>').attr('value', result.id).text(   result.provincesname_th).appendTo('#'+element_id);
				}
			});

		},
		error:function(data){
			console.log(data);
			console.log('check LoadProvince');
			duck.NotiDanger();
		}
	});

};


office.SetFrom=function(action,data_id){

	$('#data_id').val(data_id);
	$('#action').val(action);

	$("#form_set").submit();
};


office.SetFromAction=function(action,data_id,actionlink){
	$("#form_set").attr("action", actionlink);
	$('#data_id').val(data_id);
	$('#action').val(action);

	$("#form_set").submit();
};
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

office.CallModalEditSettingHome=function(id){
	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "setting_home" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id);
			$("#sectionname").text(data.sectionname);
			$("#sectionname_th").val(data.sectionname_th);
			$("#sectionname_en").val(data.sectionname_en);
			$("#numrow").val(data.numrow);
		 
			if(id==3){
				$(".box_numrow").removeClass('hide');
			}
			//data.department_code_ch
			 
		  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditSettingHome');
		  duck.NotiDanger();
		}
	  });
};

office.EditSettingHome=function(){
	$("#edit_modal").modal('hide');

	var exDat = {
		table : "setting_home",
		where : {id : $("#id_dm").val(),	},
		data :{
			sectionname_th : $("#sectionname_th").val(),
			sectionname_en : $("#sectionname_en").val(),
			numrow : $("#numrow").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
					var link =  'setting_home.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};


office.CallModalEditDiseaseHeader=function(id){
	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "disease_header" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id); 
			$("#disease_header_th").val(data.disease_header_th);
			$("#disease_header_en").val(data.disease_header_en);
			$("#orderby_edit").val(data.orderby);
	 
			 
		  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditDiseaseHeader');
		  duck.NotiDanger();
		}
	  });
};

office.EditDiseaseHeader=function(){
	$("#edit_modal").modal('hide');

	var exDat = {
		table : "disease_header",
		where : {id : $("#id_dm").val(),	},
		data :{
			disease_header_th : $("#disease_header_th").val(),
			disease_header_en : $("#disease_header_en").val(),
			orderby : $("#orderby_edit").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			update_by : $("#update_by").val(),
			update_date: $("#update_date").val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
					var link =  'diseasetype.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CreateDiseaseHeader=function(){
	$("#create_modal").modal('hide');

	var exDat = {
		table : "disease_header", 
		data :{
			disease_header_th : $("#disease_header_th_1").val(),
			disease_header_en : $("#disease_header_en_1").val(),
			orderby : $("#orderby_1").val(), 
			enable : $('input[type=radio][name=enable_1]:checked').val(),
			create_by : $("#create_by").val(),
			create_date: $("#create_date").val(),
			update_by : $("#create_by").val(),
			update_date: $("#create_date").val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
					var link =  'diseasetype.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CheckFormDisease=function(){
	var x = 0 ;
	if($('#disease_name_th').val() ==""){
		$('#disease_name_th').addClass('danger_form');
		$('#disease_name_th').focus();
		setTimeout(function(){$('#disease_name_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#disease_name_en').val() ==""){
		$('#disease_name_en').addClass('danger_form');
		$('#disease_name_en').focus();
		$('#disease_name_en').focus();
		setTimeout(function(){$('#disease_name_en').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#department_code_ch').val() ==""){
		$('#department_code_ch').addClass('danger_form');
		$('#department_code_ch').focus();
		$('#department_code_ch').focus();
		setTimeout(function(){$('#department_code_ch').removeClass('danger_form'); }, 8000);
		x=1 ;
	}

	 
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};


office.EditDisease=function(){
	$("#modal_confirm").modal('hide');


	// var exDat = {
	// 	datag1 :{
	// 		table : "disease",
	// 		where : {id : $("#diseaseid").val(),	},
	// 		data :{
	// 			disease_name_th : $("#disease_name_th").val(),
	// 			disease_name_en : $("#disease_header_en").val(),
	// 			department_code_ch : $("#department_code_ch").val(), 
	// 			enable : $('input[type=radio][name=enable_edit]:checked').val(),
	// 		}
	// 	},
	// 	datag2 :{

	// 	}
		
	// };

	var exDat = { 
			table : "disease",
			where : {id : $("#diseaseid").val(),	},
			data :{
				disease_name_th : $("#disease_name_th").val(),
				disease_name_en : $("#disease_header_en").val(),
				department_code_ch : $("#department_code_ch").val(), 
				enable : $('input[type=radio][name=enable_edit]:checked').val(),
			} 
		
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
				
				var numh = $("#numh").val() ;  
				for( var i=1 ;i<=numh;i++ ){
					var hdid = $('#dh_'+i).val();
					office.EditDiseaseDetail(hdid);
				//	alert(hdid)
				}
 

				if($('#disease_pic').val()){
					if($('#disease_pic').val() ){
						office.UploadImgDisease($('#diseaseid').val(),disease_pic,'disease_pic');
					}
				}else{ 
					var link =  'disease.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CreateDisease=function(){
	$("#modal_confirm").modal('hide');
	//	var Howto_Content = $("#Howto_Content").summernote('code');
	var exDat = {
		table : "disease", 
		data :{
			disease_name_th : $("#disease_name_th").val(),
			disease_name_en : $("#disease_header_en").val(),
			department_code_ch : $("#department_code_ch").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);

				
			


			if( data.success == "COMPLETE"){

				var numh = $("#numh").val() ;  
				for( var i=1 ;i<=numh;i++ ){
					var hdid = $('#dh_'+i).val();
					office.EditDiseaseDetail(hdid);
				//	alert(hdid)
				}

				if($('#disease_pic').val()){
					if($('#disease_pic').val() ){
						office.UploadImgDisease($('#diseaseid').val(),disease_pic,'disease_pic');
					}
				}else{ 
					var link =  'disease.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.UploadImgDisease=function(diseaseid,source_id,file_id){

	var file_data = $('#'+file_id).prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	console.log(source_id);
	console.log(file_id);
	$.ajax({
			url:office.url+'?mode=UploadImgDisease&source_id='+source_id+'&diseaseid='+diseaseid,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data:  form_data ,
			type: 'post',
			success: function(php_script_response){

				var img_state = JSON.parse(php_script_response) ;
				console.log(php_script_response);

				if( img_state.state == '1' ){
					var link =  'disease.php';
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}else {
					var link =  'disease.php';
					duck.ModalWShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			},error:function(data){
				console.log('Please check UploadImgDisease');
				console.log(data);
				duck.NotiDanger();
			}
	});
};

office.EditDiseaseDetail=function(dhid){

	//	var Howto_Content = $("#Howto_Content").summernote('code');
	 
	var diseasedetail = $("#diseasedetail"+dhid).summernote('code');
	

	var exDat = { 
		table : "disease_detail",
		where : {
			disease_id : $("#diseaseid").val(),
			disease_header_id : dhid,
		},
		data :{ 
			
			enable : $('input[type=radio][name=enable]:checked').val(),
		} ,
		data_content:{
			detail_th :diseasedetail, 
		}
	
	};


	console.log(exDat);
 
	$.ajax({
		url:office.url+'?mode=EditDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			// if( data.success == "COMPLETE"){

			// }else{
			// 	duck.ModalWShow();
			// }
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
 

};

office.CreateDiseaseDetail=function(dhid){
 
	var diseasedetail = $("#diseasedetail"+dhid).summernote('code');
	

	var exDat = { 
		table : "disease_detail",
		data :{ 
			disease_id : $("#diseaseid").val(),
			disease_header_id : dhid,
			detail_th :diseasedetail, 
			enable : $('input[type=radio][name=enable]:checked').val(),
		} ,
		data_content:{
			detail_th :diseasedetail, 
		}
	
	};


	console.log(exDat);
 
	$.ajax({
		url:office.url+'?mode=AddDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			// if( data.success == "COMPLETE"){

			// }else{
			// 	duck.ModalWShow();
			// }
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
 

};


office.CallModalEditBanners=function(id){

	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "banners" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id);

			$("#bannername_th").val(data.bannername_th);
			$("#bannername_en").val(data.bannername_en);
			$("#pathlink").val(data.pathlink);
			//$("#pathpic").val(data.pathpic);
			$("#orderby_edit").val(data.orderby);

			$("#picture_disp").attr('src','../uploads/bannerslink/'+data.pathpic)
			
			// if(data.pathpic){
			// 	var imgpic = '<img src="../uploads/bannerslink/'+data.pathpic+'" style="width:100px;height:100px;">' ;
			// 	$('#box_pathpic').html(imgpic);
			// }else{
			// 	$('#box_pathpic').html("-- ไม่มีรูปภาพแสดง -- ");
			// }
			
			$("#department_code_ch").val(data.department_code_ch);
			//data.department_code_ch
			  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditSettingHome');
		  duck.NotiDanger();
		}
	  });
};

office.CallModalEditBannersSystem=function(id){

	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "bannerssystem" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id);

			$("#bannername_th").val(data.bannername_th);
			$("#bannername_en").val(data.bannername_en);
			$("#pathlink").val(data.pathlink);
			//$("#pathpic").val(data.pathpic);
			$("#orderby_edit").val(data.orderby);

			$("#picture_disp").attr('src','../uploads/bannerslink/'+data.pathpic)
		 
			$("#department_code_ch").val(data.department_code_ch); 
			  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditBannersSystem');
		  duck.NotiDanger();
		}
	  });
};


office.CheckFormBanners=function(){
	var x = 0 ;
	if($('#bannername_th').val() ==""){
		$('#bannername_th').addClass('danger_form');
		$('#bannername_th').focus();
		setTimeout(function(){$('#bannername_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#bannername_en').val() ==""){
		$('#bannername_en').addClass('danger_form');
		$('#bannername_en').focus();
		$('#bannername_en').focus();
		setTimeout(function(){$('#bannername_en').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#pathlink').val() ==""){
		$('#pathlink').addClass('danger_form');
		$('#pathlink').focus();
		$('#pathlink').focus();
		setTimeout(function(){$('#pathlink').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	 
 
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.EditBanners=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "banners",
		where : {id : $("#id_dm").val(),	},
		data :{
			bannername_th : $("#bannername_th").val(),
			bannername_en : $("#bannername_en").val(),
			pathlink : $("#pathlink").val(), 
			department_code_ch : $("#department_code_ch").val(), 
			orderby : $("#orderby_edit").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
				$("#edit_modal").modal('hide'); 
			if( data.success == "COMPLETE"){

				if($('#pathpic').val()){
					if($('#pathpic').val() ){
						office.UploadImgBanners($('#id_dm').val(),pathpic,'pathpic','bannerslink.php');
					}
				}else{ 
					var link =  'bannerslink.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CreateBanners=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "banners",
		data :{
			bannername_th : $("#bannername_th1").val(),
			bannername_en : $("#bannername_en1").val(),
			pathlink : $("#pathlink1").val(), 
			department_code_ch :  $("#department_code_ch").val(), 
			orderby : $("#orderby1").val(), 
			enable : $('input[type=radio][name=enable_edit1]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
				$("#create_modal").modal('hide'); 
			if( data.success == "COMPLETE"){

				if($('#pathpic1').val()){
					if($('#pathpic1').val() ){
						office.UploadImgBanners(data.code,pathpic1,'pathpic1','bannerslink.php');
					}
				}else{ 
					var link =  'bannerslink.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.EditBannersSystem=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "bannerssystem",
		where : {id : $("#id_dm").val(),	},
		data :{
			bannername_th : $("#bannername_th").val(),
			bannername_en : $("#bannername_en").val(),
			pathlink : $("#pathlink").val(), 
			department_code_ch : $("#department_code_ch").val(), 
			orderby : $("#orderby_edit").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
				$("#edit_modal").modal('hide'); 
			if( data.success == "COMPLETE"){

				if($('#pathpic').val()){
					if($('#pathpic').val() ){
						office.UploadImgBanners($('#id_dm').val(),pathpic,'pathpic','bannerssystem.php');
					}
				}else{ 
					var link =  'bannerssystem.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CreateBannersSystem=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "bannerssystem",
		data :{
			bannername_th : $("#bannername_th1").val(),
			bannername_en : $("#bannername_en1").val(),
			pathlink : $("#pathlink1").val(), 
			department_code_ch :  $("#department_code_ch").val(), 
			orderby : $("#orderby1").val(), 
			enable : $('input[type=radio][name=enable_edit1]:checked').val(),
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
				$("#create_modal").modal('hide'); 
			if( data.success == "COMPLETE"){

				if($('#pathpic1').val()){
					if($('#pathpic1').val() ){
						office.UploadImgBanners(data.code,pathpic1,'pathpic1','bannerssystem.php');
					}
				}else{ 
					var link =  'bannerssystem.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};


office.UploadImgBanners=function(bannerid,source_id,file_id,pageto){

	var file_data = $('#'+file_id).prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	console.log(source_id);
	console.log(file_id);
	$.ajax({
			url:office.url+'?mode=UploadImgBanners&source_id='+source_id+'&bannerid='+bannerid,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data:  form_data ,
			type: 'post',
			success: function(php_script_response){

				var img_state = JSON.parse(php_script_response) ;
				console.log(php_script_response);

				if( img_state.state == '1' ){
					var link =  pageto;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}else {
					var link =  pageto;
					duck.ModalWShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			},error:function(data){
				console.log('Please check UploadImgBanners');
				console.log(data);
				duck.NotiDanger();
			}
	});
};
 




office.CheckFormMenu=function(){
	var x = 0 ;
	if($('#menumain_id').val() ==""){
		$('#menumain_id').addClass('danger_form');
		$('#menumain_id').focus();
		setTimeout(function(){$('#menumain_id').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#menumain_name_th').val() ==""){
		$('#menumain_name_th').addClass('danger_form');
		$('#menumain_name_th').focus();
		$('#menumain_name_th').focus();
		setTimeout(function(){$('#menumain_name_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#menumain_linktype').val() ==""){
		$('#menumain_linktype').addClass('danger_form');
		$('#menumain_linktype').focus();
		$('#menumain_linktype').focus();
		setTimeout(function(){$('#menumain_linktype').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#orderby').val() ==""){
		$('#orderby').addClass('danger_form');
		$('#orderby').focus();
		$('#orderby').focus();
		setTimeout(function(){$('#orderby').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
 
 
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.EditMenuMain=function(dataid){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "menumain",
		where : {id : $("#id_dm").val(),	},
		data :{ 
			menumain_name_th : $("#menumain_name_th").val(),
			menumain_name_en : $("#menumain_name_en").val(), 
			menumain_level : $("#menumain_level").val(), 
			menumain_linktype : $('input[type=radio][name=menumain_linktype]:checked').val(),
			menumain_otherlink : $("#menumain_otherlink").val(),
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'menu.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};

office.CreateMenuMain=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "menumain",
		data :{
			menumain_id : $("#menumain_id").val(),
			menumain_name_th : $("#menumain_name_th").val(),
			menumain_name_en : $("#menumain_name_en").val(), 
			menumain_level : $("#menumain_level").val(), 
			menumain_linktype : $('input[type=radio][name=menumain_linktype]:checked').val(),
			menumain_otherlink : $("#menumain_otherlink").val(),
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			create_by : $("#create_by").val(),  
			update_by : $("#update_by").val(),  
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'menu.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};



office.CallModalEditAuctionsCate=function(id){
	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "auctions_category" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id); 
			$("#auctions_category_th").val(data.auctions_category_th);
			$("#auctions_category_en").val(data.auctions_category_en);
			$("#auctions_category_code").val(data.auctions_category_code);
			$("#orderby_edit").val(data.orderby);
	 
			  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditAuctionsCate');
		  duck.NotiDanger();
		}
	  });
};


office.CheckFormEditAuctionsCate=function(){
	var x = 0 ;
	if($('#auctions_category_th').val() ==""){
		$('#auctions_category_th').addClass('danger_form');
		$('#auctions_category_th').focus();
		setTimeout(function(){$('#auctions_category_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#auctions_category_en').val() ==""){
		$('#auctions_category_en').addClass('danger_form');
		$('#auctions_category_en').focus();
		$('#auctions_category_en').focus();
		setTimeout(function(){$('#auctions_category_en').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#auctions_category_code').val() ==""){
		$('#auctions_category_code').addClass('danger_form');
		$('#auctions_category_code').focus();
		$('#auctions_category_code').focus();
		setTimeout(function(){$('#auctions_category_code').removeClass('danger_form'); }, 8000);
		x=1 ;
	}

	 
	if( x==0 ){
		$("#edit_modal").modal('hide') ;
		$("#modal_confirm").modal('show') ;
	}
};

office.EditAuctionsCate=function(){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "auctions_category",
		where : {id : $("#id_dm").val(),	},
		data :{
			auctions_category_th : $("#auctions_category_th").val(),
			auctions_category_en : $("#auctions_category_en").val(),
			auctions_category_code : $("#auctions_category_code").val(),  
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'auctionscate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.CheckFormCreateAuctionsCate=function(){
	var x = 0 ;
	if($('#auctions_category_th1').val() ==""){
		$('#auctions_category_th1').addClass('danger_form');
		$('#auctions_category_th1').focus();
		setTimeout(function(){$('#auctions_category_th1').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#auctions_category_en1').val() ==""){
		$('#auctions_category_en1').addClass('danger_form');
		$('#auctions_category_en1').focus();
		$('#auctions_category_en1').focus();
		setTimeout(function(){$('#auctions_category_en1').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#auctions_category_code1').val() ==""){
		$('#auctions_category_code1').addClass('danger_form');
		$('#auctions_category_code1').focus();
		$('#auctions_category_code1').focus();
		setTimeout(function(){$('#auctions_category_code1').removeClass('danger_form'); }, 8000);
		x=1 ;
	}

	 
	if( x==0 ){
		$("#create_modal").modal('hide') ;
		$("#modal_confirmcreate").modal('show') ;
	}
};

 
office.CreateAuctionsCate=function(){
	$("#modal_confirmcreate").modal('hide'); 
	var exDat = {
		table : "auctions_category", 
		data :{
			auctions_category_th : $("#auctions_category_th1").val(),
			auctions_category_en : $("#auctions_category_en1").val(),
			auctions_category_code : $("#auctions_category_code1").val(),  
			orderby : $("#orderby1").val(), 
			enable : $('input[type=radio][name=enable1]:checked').val(),
			create_by : $("#create_by").val(), 
			create_date : $("#create_date").val(), 
			update_by : $("#create_by").val(), 
			update_date : $("#create_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'auctionscate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};


office.CallModalEditLawCate=function(id){
	$('#edit_modal').modal('show');
	// var id = $(this).attr('data-id');

	var exDat = {
		table : "law_category" ,
		where : { id:id },
	  };
	  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#id_dm").val(id); 
			$("#category_th").val(data.category_th);
			$("#category_en").val(data.category_en); 
			$("#orderby_edit").val(data.orderby);
			$("#remark1").val(data.remark);
	 
	 
			  
			if (data.enable == "Y") {
			$('#enable_edit_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable_edit_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalEditLawCate');
		  duck.NotiDanger();
		}
	  });
};

office.EditLawCate=function(){
	$("#edit_modal").modal('hide'); 
	var exDat = {
		table : "law_category",
		where : {id : $("#id_dm").val(),	},
		data :{
			category_th : $("#category_th").val(),
			category_en : $("#category_en").val(),  
			orderby : $("#orderby").val(), 
			remark : $("#remark1").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.CreateLawCate=function(){
	//$("#modal_confirmcreate").modal('hide'); 
	var exDat = {
		table : "law_category", 
		data :{
			category_th : $("#category_th1").val(),
			category_en : $("#category_en1").val(), 
			orderby : $("#orderby1").val(), 
			remark : $("#remark1").val(), 
			enable : $('input[type=radio][name=enable1]:checked').val(),
			create_by : $("#create_by").val(), 
			create_date : $("#create_date").val(), 
			update_by : $("#create_by").val(), 
			update_date : $("#create_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};



office.CallModalLawHeader=function(id,action,cateid){
	//alert('office.CallModalLawHeader');
	$('#modal2').modal('show'); 
	var btncont =""
	if(action=='CREATE'){
		btncont = '\
					<button type="button" class="btn btn-info" onclick="office.CreateLawHeader();">\
						<i class="la la-check-square-o"></i> บันทึก \
					</button>'; 
	}else{
		btncont = '\
					<button type="button" class="btn btn-info" onclick="office.EditLawHeader();">\
						<i class="la la-check-square-o"></i> บันทึกการแก้ไข\
					</button>';
	}

	$("#button_modal2").html(btncont);
	$("#law_category_id").val(cateid); 
	var exDat = {
		table : "law_header" ,
		where : { id:id },
	  };
	//  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#law_header_id").val(id); 

			//$("#law_category_id").val(data.law_category_id);
		 
			
			$("#law_header_name").val(data.law_header_name); 
			$("#orderby").val(data.orderby);
			$("#remark").html(data.remark);
	 
			  
			if (data.enable == "Y") {
			$('#enable2_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable2_N").iCheck('check');
			}
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalLawHeader');
		  duck.NotiDanger();
		}
	  });
};
 
office.EditLawHeader=function(){
	$("#modal2").modal('hide'); 
	var exDat = {
		table : "law_header",
		where : {id : $("#law_header_id").val(),	},
		data :{
			law_category_id : $("#law_category_id").val(),
			law_header_name : $("#law_header_name").val(),  
			remark : $("#remark").val(),  
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable2]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' ); 
			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.CreateLawHeader=function(){
	$("#modal2").modal('hide'); 
	var exDat = {
		table : "law_header", 
		data :{
			law_category_id : $("#law_category_id").val(),
			law_header_name : $("#law_header_name").val(),  
			remark : $("#remark").val(),  
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable2]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' ); 
			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};


office.CallModalLawDetail=function(id,action,headerid){
	//alert('office.CallModalLawDetail');
	$('#modal3').modal('show'); 
	var btncont =""
	if(action=='CREATE'){
		btncont = '\
					<button type="button" class="btn btn-info" onclick="office.CreateLawDetail();">\
						<i class="la la-check-square-o"></i> บันทึก \
					</button>'; 
	}else{
		btncont = '\
					<button type="button" class="btn btn-info" onclick="office.EditLawDetail();">\
						<i class="la la-check-square-o"></i> บันทึกการแก้ไข\
					</button>';
	}

	$("#button_modal3").html(btncont);
	$("#law_header_id3").val(headerid); 
	var exDat = {
		table : "law_detail" ,
		where : { id:id },
	  };
	//  console.log(exDat);
	  $.ajax({
		url:office.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
			console.log(data);

			$("#law_detail_id").val(data.id); 
			if(headerid){
				
				$("#law_header_id3").val(headerid); 
			}else{
				$("#law_header_id3").val(data.law_header_id); 
			}
			

			$("#lawname").val(data.lawname); 
			$("#orderby").val(data.orderby); 
			$("#remark").html(data.remark);

			if( data.lawfiles ){ 
				var cont = 	'	<a href="'+data.lawfiles+'" class="btn btn-sm btn-info linkfile" target="_blank" > <i class="fa fa-download"></i> </a>';
				$('.boxfile').html(cont); 
			}
			
			
			if (data.enable == "Y") {
			$('#enable3_Y').iCheck('check');
			}else if (data.enable == "N") {
			$("#enable3_N").iCheck('check');
			}

			//
		},
		error:function(data){
		  console.log(data);
		  console.log('check CallModalLawDetail');
		  duck.NotiDanger();
		}
	  });
};
 
office.EditLawDetail=function(){
	$("#modal3").modal('hide'); 
	var exDat = {
		table : "law_detail",
		where : {id : $("#law_detail_id").val(),	},
		data :{ 
			lawname : $("#lawname").val(), 
			law_header_id : $("#law_header_id3").val(), 
			remark : $("#remark").val(),  
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable3]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){

				if( $('#lawfiles').val() ){
					office.UploadFileLaws($("#law_detail_id").val(),'lawfiles','lawfiles');
				}else{ 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' ); 
				}
			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.CreateLawDetail=function(){
	$("#modal3").modal('hide'); 
	var exDat = {
		table : "law_detail", 
		data :{
			 
			lawname : $("#lawname").val(), 
			law_header_id : $("#law_header_id3").val(), 
			remark : $("#remark").val(),  
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable3]:checked').val(),
			create_by : $("#create_by").val(), 
			create_date : $("#create_date").val(), 
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'lawcate.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' ); 
			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

office.UploadFileLaws=function(lawdetailid,source_id,file_id){

	var file_data = $('#'+file_id).prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	console.log(source_id);
	console.log(file_id);
	$.ajax({
			url:office.url+'?mode=UploadFileLaws&source_id='+source_id+'&lawdetailid='+lawdetailid,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data:  form_data ,
			type: 'post',
			success: function(php_script_response){

				var img_state = JSON.parse(php_script_response) ;
				console.log(php_script_response);

				if( img_state.state == '1' ){
					var link =  'lawcate.php';
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}else {
					var link =  'lawcate.php';
					duck.ModalWShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			},error:function(data){
				console.log('Please check UploadFileLaws');
				console.log(data);
				duck.NotiDanger();
			}
	});
};

///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

office.CheckFormMenuSub=function(){
	var x = 0 ;
	if($('#menusub_id').val() ==""){
		$('#menusub_id').addClass('danger_form');
		$('#menusub_id').focus();
		setTimeout(function(){$('#menusubn_id').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#menusub_name_th').val() ==""){
		$('#menusub_name_th').addClass('danger_form');
		$('#menusub_name_th').focus();
		$('#menusub_name_th').focus();
		setTimeout(function(){$('#menusub_name_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#menusub_linktype').val() ==""){
		$('#menusub_linktype').addClass('danger_form');
		$('#menusub_linktype').focus();
		$('#menusub_linktype').focus();
		setTimeout(function(){$('#menusub_linktype').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#department_code_ch').val() ==""){
		$('#department_code_ch').addClass('danger_form');
		$('#department_code_ch').focus();
		$('#department_code_ch').focus();
		setTimeout(function(){$('#department_code_ch').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#orderby').val() ==""){
		$('#orderby').addClass('danger_form');
		$('#orderby').focus();
		$('#orderby').focus();
		setTimeout(function(){$('#orderby').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
 
 
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.EditMenuSub=function(dataid){
	$("#modal_confirm").modal('hide'); 
	var exDat = {
		table : "menusub",
		where : {id : $("#id_dm").val(),	},
		data :{
			menusub_id : $("#menusub_id").val(),
			menusub_name_th : $("#menusub_name_th").val(),
			menusub_name_en : $("#menusub_name_en").val(), 
			menusub_level : $("#menusub_level").val(), 
			menusub_linktype : $('input[type=radio][name=menusub_linktype]:checked').val(),
			menusub_otherlink : $("#menusub_otherlink").val(),
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			update_by : $("#update_by").val(), 
			update_date : $("#update_date").val(), 
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'menu.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};
 
office.CreateMenuSub=function(){
	$("#modal_confirm").modal('hide'); 
	var menusub_code = "" ;
	var exDat = {
		table : "menusub",
		data :{ 
			menusub_name_th : $("#menusub_name_th").val(),
			menusub_name_en : $("#menusub_name_en").val(), 
			menusub_level : $("#menusub_level").val(), 
			menusub_id : $("#menusub_id").val(), 
			menusub_linktype : $('input[type=radio][name=menusub_linktype]:checked').val(),
			menusub_otherlink : $("#menusub_otherlink").val(),
			department_code_ch : $("#department_code_ch").val(),
			menusub_code : menusub_code,
			orderby : $("#orderby").val(), 
			enable : $('input[type=radio][name=enable_edit]:checked').val(),
			create_by : $("#create_by").val(),  
			update_by : $("#update_by").val(),  
		}
	};

	console.log(exDat);
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){
 
					var link =  'menu.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
			 

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});

};


office.CheckFormNews=function(){
	var x = 0 ;
	if($('#news_type').val() ==""){
		$('#news_type').addClass('danger_form');
		$('#news_type').focus();
		setTimeout(function(){$('#news_type').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#news_title_th').val() ==""){
		$('#news_title_th').addClass('danger_form');
		$('#news_title_th').focus();
		$('#news_title_th').focus();
		setTimeout(function(){$('#news_title_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	  
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.CheckFormNewsSD=function(){
	var x = 0 ;
 
	if($('#news_title_th').val() ==""){
		$('#news_title_th').addClass('danger_form');
		$('#news_title_th').focus();
		$('#news_title_th').focus();
		setTimeout(function(){$('#news_title_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	  
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.CreateNewsSD=function(){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}

	// alert($("#news_desc_th").summernote('code'));
	// alert(  $("#news_desc_th")[0].innerHTML );
	// console.log(  $("#news_desc_th")[0].innerHTML );
	// 	return false;
	var exDat = { 
			table : "news", 
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_title_th : $("#news_title_th").val(),
				news_menu :   $("#news_menu").val(),
				news_youtube : $("#news_youtube").val(), 
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
				version: 2 
			}  
			 
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=AddDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews(data.code ,news_cover,'news_cover','newssd.php?'+$("#news_menu").val());
					} 
					
				}else{ 
					 
					var link =  'newssd.php?' +$("#news_menu").val() ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' ); 
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.EditNewsSD=function(dataid){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}

	var exDat = { 
			table : "news",
			where : {id : $("#newsid").val(),	},
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_menu : $("#news_menu").val(), 
				news_title_th : $("#news_title_th").val(), 
				news_youtube : $("#news_youtube").val(), 
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
			}    
			 
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=EditDataSet',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews( $('#newsid').val(),news_cover,'news_cover','newssd.php?'+$("#news_menu").val());
					}  
				}else{ 
					var link =  'newssd.php?'+$("#news_menu").val() ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.EditNews=function(dataid){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}

	var exDat = { 
			table : "news",
			where : {id : $("#newsid").val(),	},
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_menu : $("#news_menu").val(), 
				news_title_th : $("#news_title_th").val(), 
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
			}   ,
			data_content:{
				news_desc_th : $("#news_desc_th").summernote('code'),
			}
			 
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=EditDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews($('#newsid').val(),news_cover,'news_cover','news.php');
					} 
					if($('#news_file').val() ){
						office.UploadFileNews($('#newsid').val(),news_file,'news_file','news.php');
					} 
				}else{ 
					var link =  'news.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.CreateNews=function(){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}

	// alert($("#news_desc_th").summernote('code'));
	// alert(  $("#news_desc_th")[0].innerHTML );
	// console.log(  $("#news_desc_th")[0].innerHTML );
	// 	return false;
	var exDat = { 
			table : "news", 
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_title_th : $("#news_title_th").val(),
				news_menu :  newsmenu,
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
				version: 2 
			} ,
			data_content:{
				news_desc_th : $("#news_desc_th").summernote('code'),
			}
			 
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=AddDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews($('#newsid').val(),news_cover,'news_cover','news.php');
					} 
					if($('#news_file').val() ){
						office.UploadFileNews($('#newsid').val(),news_file,'news_file','news.php');
					} 
				}else{ 
					var link =  'news.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.CloneNews=function(){
	var exDat = { 
		table : "news_mapping", 
		data :{
			news_office : $("#news_office").val(),
			news_type : $("#news_type").val(), 
			news_title_th : $("#news_title_th").val(),
			news_menu : "news",
			news_datetime :   $("input[name=news_datetime_submit]").val(),
			news_main : $('input[type=radio][name=news_main]:checked').val(),
			news_home  : $('input[type=radio][name=news_home]:checked').val(),
			news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
			news_starttime  :    $("input[name=news_starttime_submit]").val(),
			news_endtime:    $("input[name=news_endtime_submit]").val(),
			enable : $('input[type=radio][name=enable]:checked').val(),
			version: 2 
		} ,
		data_content:{
			news_desc_th : $("#news_desc_th").summernote('code'),
		} 
	};


	console.log(exDat);

	$.ajax({
		url:office.url+'?mode=AddDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews($('#newsid').val(),news_cover,'news_cover');
					} 
					if($('#news_file').val() ){
						office.UploadFileNews($('#newsid').val(),news_file,'news_file');
					} 
				}else{ 
					var link =  'news.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.UploadImgNews=function(newsid,source_id,file_id, linkpage){

	var file_data = $('#'+file_id).prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	console.log(source_id);
	console.log(file_id);
	$.ajax({
			url:office.url+'?mode=UploadImgNews&source_id='+source_id+'&newsid='+newsid,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data:  form_data ,
			type: 'post',
			success: function(php_script_response){

				var img_state = JSON.parse(php_script_response) ;
				console.log(php_script_response);
				
				if( img_state.state == '1' ){
					var link =  linkpage;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}else {
					var link =  linkpage;
					duck.ModalWShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			},error:function(data){
				console.log('Please check UploadImgNews');
				console.log(data);
				duck.NotiDanger();
			}
	});
};
 
office.UploadFileNews=function(newsid,source_id,file_id,linkpage){

	var file_data = $('#'+file_id).prop('files')[0];
	var form_data = new FormData();
	form_data.append('file', file_data);

	console.log(source_id);
	console.log(file_id);
	$.ajax({
			url:office.url+'?mode=UploadFileNews&source_id='+source_id+'&newsid='+newsid,
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data:  form_data ,
			type: 'post',
			success: function(php_script_response){

				var img_state = JSON.parse(php_script_response) ;
				console.log(php_script_response);

				if( img_state.state == '1' ){
					var link =  linkpage;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}else {
					var link =  linkpage;
					duck.ModalWShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			},error:function(data){
				console.log('Please check UploadImgNews');
				console.log(data);
				duck.NotiDanger();
			}
	});
};


office.CheckFormPublish=function(){
	var x = 0 ;
	if($('#news_type').val() ==""){
		$('#news_type').addClass('danger_form');
		$('#news_type').focus();
		setTimeout(function(){$('#news_type').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#news_title_th').val() ==""){
		$('#news_title_th').addClass('danger_form');
		$('#news_title_th').focus();
		$('#news_title_th').focus();
		setTimeout(function(){$('#news_title_th').removeClass('danger_form'); }, 8000);
		x=1 ;
	}
	if($('#news_type').val() == 'news_vdo'){
		if($('#news_youtube').val() ==""){
			$('#news_youtube').addClass('danger_form');
			$('#news_youtube').focus();
			$('#news_youtube').focus();
			setTimeout(function(){$('#news_youtube').removeClass('danger_form'); }, 8000);
			x=1 ;
		}
	}
	  
	if( x==0 ){
		$("#modal_confirm").modal('show') ;
	}
};

office.EditPublish=function(dataid){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}
	var exDat = { 
			table : "news",
			where : {id : $("#newsid").val(),	},
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_menu: newsmenu,
				news_title_th : $("#news_title_th").val(),
				news_vdo : $("#news_vdo").val(),  
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
			}   ,
			data_content:{
				news_desc_th : $("#news_desc_th").summernote('code'),
			}
			 
	}; 

	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=EditDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews($('#newsid').val(),news_cover,'news_cover','publish.php?'+$("#news_type").val());
					} 
					if($('#news_file').val() ){
						office.UploadFileNews($('#newsid').val(),news_file,'news_file','publish.php?'+$("#news_type").val());
					} 
				}else{ 
					var link =  'news.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

office.CreatePublish=function(){
	$("#modal_confirm").modal('hide');
	var newsmenu = "news"; //news_info
	if($("#news_type").val()== "news_info"){
		newsmenu = "news_info" ;
	}

	var exDat = { 
			table : "news", 
			data :{
				news_office : $("#news_office").val(),
				news_type : $("#news_type").val(), 
				news_title_th : $("#news_title_th").val(),
				news_menu : newsmenu,
				news_datetime :   $("input[name=news_datetime_submit]").val(),
				news_main : $('input[type=radio][name=news_main]:checked').val(),
				news_home  : $('input[type=radio][name=news_home]:checked').val(),
				news_timeline  : $('input[type=radio][name=news_timeline]:checked').val(),
				news_starttime  :    $("input[name=news_starttime_submit]").val(),
				news_endtime:    $("input[name=news_endtime_submit]").val(),
				enable : $('input[type=radio][name=enable]:checked').val(),
				version: 2 
			} ,
			data_content:{
				news_desc_th : $("#news_desc_th").summernote('code'),
			}
			 
	};


	console.log(exDat);
	
	$.ajax({
		url:office.url+'?mode=AddDataContents',
		type:'POST',
		dataType:'json',
		data: exDat ,
		success:function(data){
				console.log(data);
			if( data.success == "COMPLETE"){ 
				 
				if($('#news_cover').val() || $('#news_file').val()  ){
					if($('#news_cover').val() ){
						office.UploadImgNews($('#newsid').val(),news_cover,'news_cover','publish.php?'+$("#news_type").val());
					} 
					if($('#news_file').val() ){
						office.UploadFileNews($('#newsid').val(),news_file,'news_file','publish.php?'+$("#news_type").val());
					} 
				}else{ 
					var link =  'news.php' ;
					duck.ModalSShow();
					setTimeout(duck.ModalSHide, 3000);
					setTimeout( duck.OpenPage   , 3200 , link ,'_self' );
				}

			}else{
				duck.ModalWShow();
			}
		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	}); 
};

///////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
// $(function() {
// 	$('.summernote').summernote({
// 		height: 400 ,
// 		toolbar: [ 
// 			['style', ['bold', 'italic', 'underline', 'clear']],
// 			['font', ['strikethrough', 'superscript', 'subscript']],
// 			['fontsize', ['fontsize']],
// 			['color', ['color']], 
// 			['height', ['height']] ,
// 			['Insert', ['table','hr','picture','link','video'] ] ,
// 			['View', ['codeview']] ,
// 			['para', ['ul', 'ol', 'paragraph']],
// 		  ],
// 		callbacks: {
// 			onImageUpload: function(files) {
// 				for(var i = 0 ; i < files.length ; i++)
// 				{
// 					sendFile(files[i], $(this));
// 				}
// 			},
// 			onPaste: function (e) {
// 				var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
// 				e.preventDefault();
// 				document.execCommand('insertText', false, bufferText);
// 			}
// 		}	
// 	});
// });

// function sendFile(file, editor) 
// {	
// 	var path_upload = '../uploads/summernote';
// 	//console.log(path_upload);
// 	data = new FormData();
// 	data.append("file", file);
// 	data.append("path_upload", path_upload);
// 	$.ajax({
// 		data: data,
// 		type: "POST",
// 		url: "../gates/UploadTempSummernote.php",
// 		cache: false,
// 		contentType: false,
// 		processData: false,
// 		success: function(url) {
// 			console.log(url);
// 			var title_error = "Unknow" ; 
// 			var message_error  = "Unknow Error";
// 			var is_error = false;

// 			switch (url)
// 			{ 
// 				case "Upload Error" :
// 					title_error 			= 	'Failed upload to server';
// 					message_error 	=	'File upload to server failed , Please try upload again.';
// 					is_error = true;
// 				break;
// 				case "Invalid File" :
// 					title_error 			= 	'Picture not allow';
// 					message_error 	=	'Picture extension allow jpg or jpeg only.';
// 					is_error = true;
// 				break;
// 				case "Not Image File" :
// 					title_error 			= 	'Not image file';
// 					message_error 	=	'File uploaded is not a image.';
// 					is_error = true;
// 				break;
// 				case "File too big" :
// 					title_error 			= 	'File too big';
// 					message_error 	=	'Picture uploaded is too big , Please try another picture.';
// 					is_error = true;
// 				break;
// 				case "Move File Error" :
// 					title_error 			= 	'Error while move file ';
// 					message_error 	=	'Server can\'t move upload file , Please try upload again.';
// 					is_error = true;
// 					break;					
// 				default :					
// 				break;		
// 			}			
				
// 			if (is_error)
// 				alert(title_error + " : " + message_error);
// 			else
// 			{ 
// 				editor.summernote("insertImage",JSON.parse(url));
// 			}
// 		}
// 	}).fail(function(){
// 		//console.log('Failed to upload file');
// 		alert('Failed to upload file');
// 	});
// }


/////////////////////////////////////////////////////////////////////////////////////
$( document ).ready(function() {
	 

	if(!localStorage.numperpage){
		localStorage.numperpage = 10;
	}
	localStorage.numperpage = 10;


	 
	 // ===== Scroll to Top ==== 
	 $(window).scroll(function() {
		if ($(this).scrollTop() >= 200) {       
			$('#btn_totop').fadeIn(200);   
		} else {
			$('#btn_totop').fadeOut(200);  
		}
	});
	$('#btn_totop').click(function() {      
		$('body,html').animate({
			scrollTop : 0  
		}, 500);
	});

	//alert(office.path);

});

////////////////////          END office Script         ///////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
//UPDATE auctions SET auctions_type_code = 'auctions_announ' , auctions_category_code = 'auctions_rent' where auction_menu = 'auction_rent'
//UPDATE auctions SET  auctions_group_code = 'auctions_rent' where auction_menu = 'auction_rent'