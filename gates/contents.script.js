/////////////////////////////////////////////////////////////////////////////////////
////////////////////           contents   Script          ///////////////////////////
var contents = {
				url : '../gates/contents.inc.php',
				path :  'http://'+window.location.host ,
				path2 :  'http://'+window.location.host+'/en' 
			};
  
//////////////////////////////////////////////////////////////////////////////////////////////////
contents.callModalAdd=function(FuncName,table){

	//alert(FuncName);
	var btn_add = '<button type="button" class="btn btn-success" onclick="'+FuncName+'();"> <i class="fa fa-save"> </i> ยืนยันการเพิ่มข้อมูล </button>';
	$("#btn_add").html(btn_add);

	$('#modal_add').modal('show');
};

contents.callModalEdit=function(FuncName,table,table_id,detail){

	//$("#txt_mo_name").html(detail);

	var btn_edit = '<button type="button" class="btn btn-warning" onclick="'+FuncName+'();"> <i class="fa fa-trash"> </i> ยืนยันการแก้ไข </button>';
	$("#btn_edit").html(btn_edit);

	$('#modal_edit').modal('show');
};

contents.callModalDelete=function(table,table_id,detail,link){


	$("#txt_mo_name").html("ต้องการยืนยันการลบข้อมูล "+ detail);

	var btn_delete = '<button type="button" class="btn btn-danger" onclick="contents.callDelete(\''+table+'\',\''+table_id+'\',\''+link+'\');"> <i class="fa fa-trash"> </i> ยืนยัน </button>';
	$("#btn_delete").html(btn_delete);

	$('#modal_delete').modal('show');
};

contents.callModalDisable=function(table,table_id,detail,link){


	$("#txt_detail_dis").html("ต้องการยืนยันการลบข้อมูล "+ detail);

	var btn_disable = '<button type="button" class="btn btn-danger" onclick="contents.callDisable(\''+table+'\',\''+table_id+'\',\''+link+'\');"> <i class="fa fa-trash"> </i> ยืนยัน </button>';
	$("#btn_disable").html(btn_disable);

	$('#modal_disable').modal('show');
};


contents.callModalDeleteTruly=function(table,table_id,detail){
	$("#txt_mo_name").html(detail);

	var btn_delete = '<button type="button" class="btn btn-danger" onclick="contents.callDeleteTruly(\''+table+'\',\''+table_id+'\');"> <i class="fa fa-trash"> </i> ยืนยันการลบ </button>';
	$("#btn_delete").html(btn_delete);

	$('#modal_delete').modal('show');
};

contents.callDelete=function(table,table_id,link){
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
		url:contents.url+'?mode=EditDataSet',
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

contents.callDisable=function(table,table_id,link){
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
		url:contents.url+'?mode=EditDataSet',
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

contents.callDelete_EX=function(table,table_id,id_name,status_name,link){
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
		url:contents.url+'?mode=StatusDataSetEX',
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

contents.callDeleteTruly=function(table,table_id){

	var DataSet = {
					table : table ,
					where : { id : table_id }
				};
	//console.log(DataSet);

	$.ajax({
		url:contents.url+'?mode=DeleteDataSet',
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

contents.callSetEnable=function(table_name,table_id,refto){
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
		url:contents.url+'?mode=EditDataSet',
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


contents.callSetDisplay=function(table_name,table_id,refto){
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
		url:contents.url+'?mode=EditDataSet',
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

contents.LoadProvince=function(v_val,element_id){
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
		url:contents.url+'?mode=LoadAllData',
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


contents.SetFrom=function(action,data_id){

	$('#data_id').val(data_id);
	$('#action').val(action);
	//console.log(action+" || "+data_id);
	$("#form_set").submit();
};


contents.SetFromAction=function(action,data_id,actionlink){
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

contents.ChangeSessionLang=function(){
	var langcode = localStorage.langcode ; 
	var setData = {
		langcode : langcode, 
	};
	$.ajax({
		url:contents.url+'?mode=SetLang',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
			console.log(result.LANG ); 
		},
		complete:function(xhr,status){
		},
		error:function(xhr,status,error){
			console.log('===== error contents.ChangeSessionLang'); 
			duck.NotiDanger();
		}
	});
};


contents.LoadContentsSetLang=function(){
	var langcode = localStorage.langcode ; 
	var setData = {
		table : "setting_lang",
		where : {
			enable: "Y",
			deleted: 0
		},
		orderby : "",
		limit : ""
	};
	$.ajax({
		url:contents.url+'?mode=LoadSetCode',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
			console.log(result); 
			///////  HOME 
			$("title").text(result.TITLESITE['setting_lang_'+langcode]) ; 
			$('.lang_text').text(result.FONTSIZE['setting_lang_'+langcode]);
			$('.lang_complain').text(result.COMPLAIN['setting_lang_'+langcode]);
			$('.lang_sitemap').text(result.SITEMAP['setting_lang_'+langcode]); 
			$('.lang_disease').text(result.DISEASE['setting_lang_'+langcode]); 
			$('.lang_fonta').text(result.FONTA['setting_lang_'+langcode]); 


			$('.lang_servicedept').text(result.SERVICEINDEPT['setting_lang_'+langcode]); 
			$('.lang_lawnews').text(result.LAWSNEWS['setting_lang_'+langcode]); 
			$('.lang_sarabun').text(result.SARABUN['setting_lang_'+langcode]); 
			$('.lang_emeeting').text(result.EMEETING['setting_lang_'+langcode]); 
			$('.lang_estimatesm').text(result.ESTIMATESM['setting_lang_'+langcode]); 

			$('.lang_viewall').text(result.VIEWALL['setting_lang_'+langcode]); 
			$('.lang_view').text(result.VIEW['setting_lang_'+langcode]); 
			$('.lang_readmore').text(result.READMORE['setting_lang_'+langcode]); 

			///////  Footer 
			$('.lang_diseasegroup').text(result.DISEASEGROUP['setting_lang_'+langcode]); 
			$('.lang_diseaseplace').text(result.DISEASEPLACE['setting_lang_'+langcode]); 
			$('.lang_mediapublic').text(result.MEDIAPUBLIC['setting_lang_'+langcode]); 
			$('.lang_deptdisease').text(result.DEPTDISEASE['setting_lang_'+langcode]); 
			$('.lang_address').text(result.ADDRESS['setting_lang_'+langcode]); 
			$('.lang_copyright2019').text(result.COPYRIGHT2019['setting_lang_'+langcode]); 
			$('.lang_websitepolicy').text(result.WEBSITEPOLICY['setting_lang_'+langcode]); 
			///////   
			$('.lang_diseasedetail').text(result.DISEASEDETAIL['setting_lang_'+langcode]);
			$('.lang_preparedata').text(result.PREPAREDATA['setting_lang_'+langcode]); 
			$('.lang_organization').text(result.ORGANIZATION['setting_lang_'+langcode]); 
			$('.lang_deptcentral').text(result.DEPARTMENTCENTRAL['setting_lang_'+langcode]); 
			$('.lang_deptprovincial').text(result.DEPARTMENTPROVINCIAL['setting_lang_'+langcode]); 
			$('.lang_visitsite').text(result.VISITWEBSITE['setting_lang_'+langcode]); 
			$('.lang_tel').text(result.TELEPHONE['setting_lang_'+langcode]); 
			$('.lang_fax').text(result.FAX['setting_lang_'+langcode]); 
			$('.lang_hotline').text(result.HOTLINE['setting_lang_'+langcode]); 
			$('.lang_address').text(result.ADDRESS['setting_lang_'+langcode]);
			$('.lang_executive').text(result.EXECUTIVE['setting_lang_'+langcode]);
			$('.lang_contactdept').text(result.CONTACTDEPT['setting_lang_'+langcode]);
			
			$('.lang_addressdept').text(result.ADDRESSDEPT['setting_lang_'+langcode]);
			$('.lang_graphicmap').text(result.GRAPHICMAP['setting_lang_'+langcode]);
			$('.lang_googlemap').text(result.GOOGLEMAP['setting_lang_'+langcode]);
			$('.lang_historydept').text(result.HISTORYDEPT['setting_lang_'+langcode]);
			

			// MicroSite
			$('.lang_searchindept').text(result.SEARCHINDEPT['setting_lang_'+langcode]);
			$('.lang_mission').text(result.MISSION['setting_lang_'+langcode]);
			$('.lang_vision').text(result.VISION['setting_lang_'+langcode]);
			$('.lang_organizationdept').text(result.ORGANIZATIONDEPT['setting_lang_'+langcode]);
			
			

		},
		complete:function(xhr,status){
		},
		error:function(xhr,status,error){
			console.log('===== error contents.LoadContentsSetAll'); 
			duck.NotiDanger();
		}
	});
};
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

contents.LoadSlideImageHome=function(){
	//console.log('contents.LoadSlideImageHome');
};

contents.LoadMenuMain=function(){
	var langcode = localStorage.langcode ; 
	if(langcode=="th"){
		var setData = {
			table : 'menumain',
			where : {
				enable_th : 'Y',
				deleted : 0 
			},
			orderby : ' orderby DESC ',
			limit : ''
		};
	}else{
		var setData = {
			table : 'menumain',
			where : {
				enable_en : 'Y',
				deleted : 0 
			},
			orderby : ' orderby DESC ',
			limit : ''
		};
	}
	

	$.ajax({
		url:contents.url+'?mode=LoadMenuMain',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
		
		//	console.log(result);
			
			var cont = "";
			cont += '<li class="nav-item "> <a href="/index.php" class="nav-link"> <i class="fa fa-home"> </i> </a> </li>' ;
			$.each( result , function( key1, value1 ) {
			//	console.log( key1 + ": " + value1['menumain_name_'+langcode] );
			//	console.log( key1 + ": " + value1.menumain_name_+langcode  );

				var d1 = "";
				var dt1 = "";

				if(value1['menumain2']){
					d1 = "dropdown";
					dt1 = "dropdown-toggle";
				
 
				cont += '\
							<li class="nav-item '+d1+'">\
								<a class="nav-link '+dt1+'" data-toggle="'+d1+'" href="'+contents.path+'/'+value1['menumain_otherlink']+'"> '+value1['menumain_name_'+langcode] +' </a>\
								<div class="dropdown-menu bg-white-custom">\
									<ul class="listsub">';
									$.each( value1['menumain2'] , function( key2, value2 ) {
										if(value2['menumain3']){
											cont += '\
													<li class="dropdown">\
														<a class="" href="'+contents.path+'/'+value2['menumain_otherlink']+'" > '+value2['menumain_name_'+langcode]+'\
															<span class="arrow">\
															<i class="fa fa-chevron-right"></i>\
															</span>\
														</a>\
														<div class="dropdown-menu bg-white-custom">\
															<ul class="listsub listsub2 ">\
														';
														$.each( value2['menumain3'] , function( key3, value3 ) {
															if(value3['menumain4']){
																cont += '\
																		<li class="dropdown">\
																			<a class="" href="'+contents.path+'/'+value3['menumain_otherlink']+'" > '+value3['menumain_name_'+langcode]+'\
																				<span class="arrow">\
																				<i class="fa fa-chevron-right"></i>\
																				</span>\
																			</a>\
																			<div class="dropdown-menu bg-white-custom">\
																				<ul class="listsub listsub2 ">\
																			'; 

																			$.each( value3['menumain4'] , function( key4, value4 ) {
																			 
																				cont +=	'\
																					<li>  <a class="" href="#"> '+value4['menumain_name_'+langcode]+' </a> </li>\
																				';
																				 
																			});



																cont +=	'\
																				</ul>\
																			</div>\
																		</li>\
																';
															}else{
																if(value3.menumain_linktype==1 ){
																	cont +=	'\
																	<li>  <a class="" href="'+value3['menumain_otherlink']+'" target="_blank"> '+value3['menumain_name_'+langcode]+' </a> </li>\
																	';
																}else{
																	cont +=	'\
																	<li>  <a class="" href="'+contents.path+'/'+value3['menumain_otherlink']+'"> '+value3['menumain_name_'+langcode]+' </a> </li>\
																	';
																}
															
															}
														});
											cont +=	'\
															</ul>\
														</div>\
													</li>\
											';
										}else{
											if(value2.menumain_linktype==1 ){
											
												cont +=  '<li> <a class="" href="'+value2['menumain_otherlink']+'" target="_blank">'+value2['menumain_name_'+langcode]+'</a> </li>' ;
									
											}else{
												cont +=  '<li> <a class="" href="'+contents.path+'/'+value2['menumain_otherlink']+'">'+value2['menumain_name_'+langcode]+'</a> </li>' ;
											}
											
										} 
									}); 
					cont += 		'\
									</ul>\
								</div>\
							</li>';
				}else{
					if(value1.menumain_linktype==1 ){ 
						cont +=  '<li class="nav-item"> <a class="nav-link" href="'+value1['menumain_otherlink']+'" target="_blank">'+value1['menumain_name_'+langcode]+'</a> </li>' ;
			
					}else{
						cont +=  '<li class="nav-item"> <a class="nav-link" href="'+contents.path+'/'+value1['menumain_otherlink']+'">'+value1['menumain_name_'+langcode]+'</a> </li>' ;
					}
				}
			
				// $('#ul_menumain').prepend(cont);

			});
			$('#ul_menumain').prepend(cont);

			var d = "" ;
			if(localStorage.lang=="EN"){
				d = "Disease";
			}else{
				d = "รายชื่อโรค";
			}

			// var cont2 = '\
			// <li class="nav-item dropdown disease-name-dropdown dropdown">\
			// 	<a class="nav-link dropdown-toggle lang_disease"  href="#">'+d+'</a>\
			// </li>\
			// ';


			//$('#ul_menumain').append(cont2);

		},
		complete:function(xhr,status){ 
			//console.log('=====complete contents.LoadMenuMain===='); 
		},
		error:function(xhr,status,error){
			console.log('===== error contents.LoadMenuMain');
		
			console.log(xhr);
			console.log(status);
			console.log(error);
			duck.NotiDanger();
		}
 
	});

	

	//   console.log(data);
	//   console.log('check dept.LoadDiseaseByTitleName');
	//   duck.NotiDanger();
	/*

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">รู้ทันโรค </a>
			<div class="dropdown-menu bg-white-custom">

				<ul class="listsub"> 
				<li> <a class=" " href="#">รายชื่อโรค</a> </li>
				<li class="dropdown">   
					<a class="" href="#" > สื่อเผยแพร่ 
					<span class="arrow"> 
						<i class="fa fa-chevron-right"></i>
					</span>
					</a>
					<div class="dropdown-menu bg-white-custom">
						<ul class="listsub listsub2 "> 
						<li  class="dropdown">  <a class="" href="#"> AA 
							<span class="arrow">
							<i class="fa fa-arrow-right"></i>
							</span>
						</a> 
								<div class="dropdown-menu bg-white-custom">
								<ul class="listsub listsub2 "> 
									<li>  <a class="" href="#"> AA 1</a>  </li>
									<li>  <a class="" href="#"> AA2 </a> </li> 
									<li>  <a class="" href="#"> AA3 </a> </li> 
								</ul>
								</div> 
						</li>
						<li>  <a class="" href="#"> BB </a> </li> 
						</ul>
					</div> 
					</li>
				</ul>
			</div>
		</li>
		*/


};


 
contents.LoadSettingHomeNewsAuction=function(){

	var langcode = localStorage.langcode ; 
	if(langcode=='th'){

	}
	var setData = {
		table : 'setting_home_newsauction',
		where : { 
			
		},
		orderby : ' orderby DESC ',
		limit : ''
	};
	// var setData2 = [];
	// setData2['table'] = 'setting_home_newsauction';
	// setData2['where'] = [];
	// setData2['orderby'] = 'orderby DESC';
	// setData2['limit'] = '';

 
	// console.log(setData);
	// console.log(typeof(setData));
	// console.log(setData2);
	// console.log(typeof(setData2));
	$.ajax({
		url:contents.url+'?mode=LoadAllData',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){

			console.log(result);
			var cnt = 0 ;
			$.each( result , function( key1, value1 ) {
				if(value1['enable_'+langcode] =="Y" ){
					
					var setactive = "";
					var setactivesub = "fade";
					if(cnt==0){
						setactive = " active ";
						setactivesub ="active" ;
					}
					if(result.key1+1 ){ 
						console.log(cnt); 
					}
					str ="";
					//console.log(value1['contents_type_name_'+langcode]);
					
					var contents_type_name = value1['contents_type_name_'+langcode] ;
					var content_li ='\
									<li  class="nav-item">\
										<a  class="nav-link newstype '+setactive+' " data-toggle="tab" href="#'+value1.contents_type_code+'">'+contents_type_name+'</a>\
									</li>\
									';
					$("ul#nav_newshome").append(content_li);
					//contents.LoadSettingHomeNewsAuctionDetail(value1.contents_type_code ,value1.contents_type, contents_type_name, cnt);
					contents.LoadSettingHomeNewsDetail(value1.contents_type_code ,value1.contents_type, contents_type_name, cnt);
					cnt++;
				} 
			});

		},
		complete:function(xhr,status){ 
			//console.log('=====complete contents.LoadSettingHomeNewsAuction===='); 
		},
		error:function(xhr,status,error){
			console.log('===== error contents.LoadSettingHomeNewsAuction');
		
			console.log(xhr);
			//console.log(status);
			//console.log(error);
			duck.NotiDanger();
		}
 
	});

};

contents.LoadSettingHomeNewsAuctionDetail=function(contents_type_code,contents_type,contents_type_name,num){
	
	console.log(contents_type_code);


	var langcode = localStorage.langcode ; 
	var tablename = "";
	if(contents_type=="news"){
		tablename = 'news_mapping';
	}else{
		tablename = 'auction_mapping';
	}


	var setData = {
		table : tablename,
		where : { 
			enable_th : "Y",
			type : contents_type_code,
			home: '1' 
		},
		orderby : ' datetime  DESC ',
		limit : ' 0,5 '
	};
	

	console.log(setData);


	var setactivesub = "fade";
	if(num==0){ 
		setactivesub ="active" ;
	}


	var cnt = 0 ;
	var content_lisub = '<div id="'+contents_type_code+'" class="container tab-pane mt-4   '+setactivesub+'">';  

	content_lisub += '<div class="row txtmobile">\
						<div class="col-lg-12 mt-4">\
						<div class="text5"> '+contents_type_name+'  </div>\
						</div>\
					</div>';
	$("#news_main_home").append(content_lisub);

	


	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsAuction',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){

			console.log(result);

			
			if( result) {
				$.each( result , function( key1, value1 ) {
					
					var datenews = duck.ConvertDate(value1['datetime'],'full',langcode);
					//var deptname = contents.LoadDepartmentByCode(value1['office']);
					var content_lisub2 ="";
					content_lisub2 +='	<div class="row">\
											<div class="col-lg-12 mt-2">\
												<div class="card">\
													<div class="card-body">\
														<div class="row">\
															<div class="col-lg-11 col-sm-11">\
															<h5 class="card-title">\
															<a href="'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'">'+value1['title_'+langcode]+'</a>\
															</h5>\
															</div>\
														</div>\
														<div class="footer-detail">\
															<div class="row">\
																<div class=" col-md-2   col-6 time ">\
																<i class="fa fa-calendar" aria-hidden="true"> </i> \
																<span class="ml-0">'+datenews+'</span>\
																</div>\
																<div class=" col-md-2   col-6 view">\
																<i class="fa fa-eye" aria-hidden="true"> </i> \
																<span class="ml-0">'+value1['views']+'  view</span>\
																</div>\
																<div class="col-md-8   col-12 text-right name-depart">\
																<span class="mr-2"><a href="'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'" class="text6"> '+value1['department_name_'+langcode]+' </a></span>  \
																</div>\
															</div> \
														</div>  \
														<hr class="lines linehomenews">\
													</div>\
												</div>  \
											</div>\
										</div>' ;

				


					cnt++
					$('#'+contents_type_code).append(content_lisub2);
				});

				if(contents_type=="news"){
					var contents_type_code2 = contents_type_code.replace("_", "");
				}else{
					var contents_type_code2 = contents_type_code;
				}
				

				var content_lisub3 = "";
				content_lisub3 += '<div class="text-center mt-4">\
										<a href="'+contents_type_code2+'.php" class="btn btn-danger btn-primary btn-sx lang_viewall" > ดูทั้งหมด </a>\
									</div>\
									'; 
				$('#'+contents_type_code).append(content_lisub3);
		}
		else{
			
				content_lisub +='<div class="row">\
									<div class="col-lg-12 mt-4">\
										<div class="card">\
											<div class="card-body">\
												<div class="row">\
													<div class="col-lg-11 col-sm-11">\
													<h5 class="card-title"> </h5>\
													</div>\
												</div>\
												<div class="footer-detail">\
													<div class="row">\
													 </div> \
												</div>  \
												<hr class="lines">\
											</div>\
										</div>  \
									</div>\
								</div>' ;
				
		}


		
		content_lisub +='	 </div>'; 
			

		}
	});
		
};
 

contents.LoadSettingHomeNewsDetail=function(contents_type_code,contents_type,contents_type_name,num){
	
	console.log(contents_type_code);


	var langcode = localStorage.langcode ; 
	var tablename = "";
	if(contents_type=="news"){
		tablename = 'news';
	}else{
		 
	}


	var setData = {
		table : tablename,
		where : {  
			news_type : contents_type_code,
			news_home: '1' 
		},
		orderby : ' news_datetime  DESC ',
		limit : ' 0,5 '
	};
	

	console.log(setData);


	var setactivesub = "fade";
	if(num==0){ 
		setactivesub ="active" ;
	}


	var cnt = 0 ;
	var content_lisub = '<div id="'+contents_type_code+'" class="container tab-pane mt-4   '+setactivesub+'">';  

	content_lisub += '<div class="row txtmobile">\
						<div class="col-lg-12 mt-4">\
						<div class="text5"> '+contents_type_name+'  </div>\
						</div>\
					</div>';
	$("#news_main_home").append(content_lisub);

	


	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsList',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){

			console.log(result);

			
			if( result) {
				$.each( result , function( key1, value1 ) {
					
					var datenews = duck.ConvertDate(value1['news_datetime'],'full',langcode);
					//var deptname = contents.LoadDepartmentByCode(value1['office']);
					var content_lisub2 ="";
					content_lisub2 +='	<div class="row">\
											<div class="col-lg-12 mt-2">\
												<div class="card">\
													<div class="card-body">\
														<div class="row">\
															<div class="col-lg-11 col-sm-11">\
															<h5 class="card-title">\
															<a href="'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'">'+value1['news_title_th']+'</a>\
															</h5>\
															</div>\
														</div>\
														<div class="footer-detail">\
															<div class="row">\
																<div class=" col-md-2   col-6 time ">\
																<i class="fa fa-calendar" aria-hidden="true"> </i> \
																<span class="ml-0">'+datenews+'</span>\
																</div>\
																<div class=" col-md-2   col-6 view">\
																<i class="fa fa-eye" aria-hidden="true"> </i> \
																<span class="ml-0">'+value1['news_views']+'  view</span>\
																</div>\
																<div class="col-md-8   col-12 text-right name-depart">\
																<span class="mr-2"><a href="'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'" class="text6"> '+value1['department_name_'+langcode]+' </a></span>  \
																</div>\
															</div> \
														</div>  \
														<hr class="lines linehomenews">\
													</div>\
												</div>  \
											</div>\
										</div>' ;

				


					cnt++
					$('#'+contents_type_code).append(content_lisub2);
				});

				if(contents_type=="news"){
					var contents_type_code2 = contents_type_code.replace("_", "");
				}else{
					var contents_type_code2 = contents_type_code;
				}
				

				var content_lisub3 = "";
				content_lisub3 += '<div class="text-center mt-4">\
										<a href="'+contents_type_code2+'.php" class="btn btn-danger btn-primary btn-sx lang_viewall" > ดูทั้งหมด </a>\
									</div>\
									'; 
				$('#'+contents_type_code).append(content_lisub3);
		}
		else{
			
				content_lisub +='<div class="row">\
									<div class="col-lg-12 mt-4">\
										<div class="card">\
											<div class="card-body">\
												<div class="row">\
													<div class="col-lg-11 col-sm-11">\
													<h5 class="card-title"> </h5>\
													</div>\
												</div>\
												<div class="footer-detail">\
													<div class="row">\
													 </div> \
												</div>  \
												<hr class="lines">\
											</div>\
										</div>  \
									</div>\
								</div>' ;
				
		}


		
		content_lisub +='	 </div>'; 
			

		}
	});
		
};

////////////////////////////////////////////////////////////////////////////////////////////

contents.LoadCountNewsAuct=function(dept,type ,page , limit ){

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}
 
	var limitload = "" ;
 
	var langcode = localStorage.langcode ; 
	var tablename = "";
	var contents_type ="news" ;
	var contents_type_code = "";

	if(contents_type=="news"){
		tablename = 'news_mapping';
		contents_type_code = type;
	}else{
		tablename = 'auction_mapping';
		contents_type_code = type;
	}
 
	
	if(dept=="ALL"){
		if(langcode=="th"){
			var setData = {
				table : tablename,
				where : { 
					enable_th : "Y",
					type : contents_type_code ,
					home : '1'
				},
				orderby : ' datetime  DESC ',
				limit : limitload
			};
		}else{
			var setData = {
				table : tablename,
				where : { 
					enable_en : "Y",
					type : contents_type_code ,
					home : '1'
				},
				orderby : ' datetime  DESC ',
				limit :  limitload
			};
		}
	}else{
		if(langcode=="th"){
			var setData = {
				table : tablename,
				where : { 
					enable_th : "Y",
					type : contents_type_code ,
					office : dept ,
					home : '1'
				},
				orderby : ' datetime  DESC ',
				limit : limitload
			};
		}else{
			var setData = {
				table : tablename,
				where : { 
					enable_en : "Y",
					type : contents_type_code ,
					office : dept ,
					home : '1'
				},
				orderby : ' datetime  DESC ',
				limit :  limitload
			};
		}
	}
	

	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsAuction',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
		//	page  limit 
			if(result){
				var pagenum = result.length/limit ; 
				pagenum = Math.ceil(pagenum);
			
				//alert(result.length +":"+pagenum);

				if(pagenum!=0){
					var i;
					var x=0;
					var cont="";
					var act= "";
					cont += '\
					<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'1\',\'10\')"> <i class="fa  fa-angle-double-left"  aria-hidden="true"></i>  </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'dec\',\'10\')"> <i class="fa fa-angle-left"  aria-hidden="true"></i>  </a></li> ';

					for (i = 1; i <= pagenum; i++) { 
						x++; 
						act= "";
						if(i==1){
							act="active";
						}

						cont += '\
						<li class="page-item "><a class="page-link pagenum pagenum'+i+' '+act+'" href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+i+'\'\,\'10\')">'+i+'</a></li> ';
					
						/*
						if(x>10){

						}else{ 
							cont += '\
						<li class="page-item "><a class="page-link pagenum pagenum'+i+' '+act+'" href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+i+'\'\,\'10\')">'+i+'</a></li> ';
						}*/

					}
					cont += '\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'inc\',\'10\')"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+pagenum+'\'\,\'10\')"> <i class="fa  fa-angle-double-right"  aria-hidden="true"></i>  </a></li>';

					$("#section_paging ul.pagination").html(cont);
				}
			}else{
				$("#section_paging ul.pagination").html("");
			}
			//alert(pagenum)
			//console.log(result.length);

			/*
			<nav aria-label="Page navigation " id="section_paging">
                <ul class="pagination justify-content-end">
                    <li class="page-item ">
                        <a class="page-link ic active" href="#" tabindex="-1"> <i class="fa fa-caret-left"  aria-hidden="true"></i> </a>
                    </li>
                    <li class="page-item "><a class="page-link pagenum active" href="javascript:contents.LoadNewsMass('ALL','1',10)">1</a></li>
                    <li class="page-item "><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','2',10)">2</a></li>
                    <li class="page-item"><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','3',10)">3</a></li>
                    <li class="page-item">
                        <a class="page-link ic active" href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> </a>
                    </li>
                </ul>
			</nav>
			*/


		},error:function(xhr,status,error){
			console.log('===== error contents.LoadCountNewsAuct'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});
			


};

contents.LoadNewsMass=function(dept,type ,page , limit ){

	// console.log("NewsMass:"+dept+" page:"+page+" limit:"+limit );
	if(dept=="" || dept=="ALL"){

	}
	if(page=="dec" || page=="inc"){
		page =1
	}

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}

	$(".page-link.pagenum").removeClass('active');
	$(".pagenum"+page).addClass('active');

	//var numrun = page*limit ;
	//var no = (page-1)*limit;
	var limitload =  (page-1)*limit +" , "+ limit ;
	//console.log(" Limit: "+ no +" , "+limit );
	var langcode = localStorage.langcode ; 
	var tablename = "";

	if( !type.search("news") ){
		var contents_type ="news" ;
	}else{
		var contents_type ="auction" ;
	} 

	
	var contents_type_code = "";


	if(contents_type=="news"){
		tablename = 'news_mapping';
		contents_type_code = type;
	}else{
		tablename = 'auction_mapping';
		contents_type_code = type;
	}




	if(!type.search("news")){
		if(dept=="ALL"){
			if(langcode=="th"){
				var setData = {
					table : tablename,
					where : { 
						enable_th : "Y",
						type : contents_type_code ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : tablename,
					where : { 
						enable_en : "Y",
						type : contents_type_code ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit :  limitload
				};
			}
		}else{
			if(langcode=="th"){
				var setData = {
					table : tablename,
					where : { 
						enable_th : "Y",
						type : contents_type_code ,
						office : dept ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : tablename,
					where : { 
						enable_en : "Y",
						type : contents_type_code ,
						office : dept ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit :  limitload
				};
			}
		}
	}else{// Auction
		if(dept=="ALL"){
			if(langcode=="th"){
				var setData = {
					table : tablename,
					where : { 
						enable_th : "Y",
						type : contents_type_code ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : tablename,
					where : { 
						enable_en : "Y",
						type : contents_type_code ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit :  limitload
				};
			}
		}else{
			if(langcode=="th"){
				var setData = {
					table : tablename,
					where : { 
						enable_th : "Y",
						type : contents_type_code ,
						office : dept ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : tablename,
					where : { 
						enable_en : "Y",
						type : contents_type_code ,
						office : dept ,
						home: '1'
					},
					orderby : ' datetime  DESC ',
					limit :  limitload
				};
			}
		}
	}
	
	



	console.log(setData);
	$('#newsmass').empty();
	$('#auctions_list').empty();
	
	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsAuction',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
			
 			console.log(result);
			if( result) {
				$.each( result , function( key1, value1 ) {
					
					var datenews = duck.ConvertDate(value1['datetime'],'full',langcode);

					if( !type.search("news") ){
						  

						var content_lisub2 ="";
								content_lisub2 +='	<div class="container">\
														<div class="row">\
															<div class="col-lg-12">\
																<div class="card">\
																	<div class="card-body">\
																		<div>\
																			<h5 class="card-title mt-1">\
																				<a href="/'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'"  class="linknonepink">'+value1['title_'+langcode]+'</a>\
																			</h5>\
																		</div>\
																		<div class="footer-detail mt-2">\
																			<div class="row">\
																				<div class=" col-md-2   col-6 time ">\
																				<i class="fa fa-calendar" aria-hidden="true"> </i> \
																				<span class="ml-0">'+datenews+'</span>\
																				</div>\
																				<div class=" col-md-2   col-6 view">\
																				<i class="fa fa-eye" aria-hidden="true"> </i> \
																				<span class="ml-0">'+value1['views']+'  view</span>\
																				</div>\
																				<div class="col-md-8   col-12 text-right name-depart">\
																				<span class="mr-2"> <a href="/'+value1['folderpath_name']+'"> '+value1['department_name_'+langcode]+'</a> </span>  \
																				</div>\
																			</div> \
																		</div> \
																	</div>\
																		<hr class="lines">\
																</div>\
															</div>\
														</div>\
													</div>' 
													;
					
						$('#newsmass').append(content_lisub2);

					}else{
						var content_lisub2 ="";
						content_lisub2 +='<div class="container">\
						<div class="row">\
							<div class="col-lg-12 mt-2">\
								<div class="card">\
									<div class="card-body">\
										<div class="row">\
											<div class="col-lg-11 col-sm-11">\
												<h5 class="card-title"><a href="/'+value1['folderpath_name']+'/auctions.php?id='+value1['id']+'"  class="linknonepink">'+value1['title_'+langcode]+'</a>\
												</h5>\
											</div>\
											<div class="col-lg-1 col-sm-1">\
												<div class="box_ic">\
												<i class="fa fa-download icon-2x" aria-hidden="true"></i>\
												</div>\
											</div>\
										</div>\
										<div class="footer-detail mt-2">\
											<div class="row">\
												<div class=" col-md-2   col-6 time ">\
												<i class="fa fa-calendar" aria-hidden="true"> </i> \
												<span class="ml-0">'+datenews+'</span>\
												</div>\
												<div class=" col-md-2   col-6 view">\
												<i class="fa fa-eye" aria-hidden="true"> </i> \
												<span class="ml-0">'+value1['views']+'  view</span>\
												</div>\
												<div class="col-md-8   col-12 text-right name-depart">\
												<span class="mr-2"> <a href="/'+value1['folderpath_name']+'"> '+value1['department_name_'+langcode]+'</a> </span>  \
												</div>\
											</div> \
										</div> \
									</div>\
										<hr class="lines">\
								</div>\
							</div>\
						</div>\
					</div>\
						';
						$('#auctions_list').append(content_lisub2);
					}



				});
			}else{
				var content_lisub2 ="";
							content_lisub2 +='	<div class="container">\
													<div class="row">\
														<div class="col-lg-12">\
															<div class="card">\
																<div class="card-body">\
																	<div>\
																		<h5 class="card-title mt-1 text-center ">\
																		-- เตรียมการข้อมูล --  \
																		</h5>\
																	</div>\
																</div>\
																	<hr class="lines">\
															</div>\
														</div>\
													</div>\
												</div>' 
												;
				 
					$('#newsmass').append(content_lisub2);
					$('#auctions_list').append(content_lisub2);
			}

		},error:function(xhr,status,error){
			console.log('===== error contents.LoadNewsMass'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});


};

contents.LoadCountAuctions=function(dept,cate,type ,page , limit ){

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}
 
	var limitload = "" ;
 
	var langcode = localStorage.langcode ; 
 
 
	var	tablename = 'auctions';
	var	contents_type_code = type;

	 
	var contents_type_code = type;
	var auctions_category_code = cate ; 

 
		if(dept=="ALL"){
			if(cate=="ALL"){
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code , 
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						auctions_category_code : auctions_category_code ,
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}
				
			
		}else{ 
			if(cate=="ALL"){
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						department_code_ch : dept , 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						auctions_category_code : auctions_category_code ,
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}
		} 

	$.ajax({
		url:contents.url+'?mode=LoadAuctionsList',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
		//	page  limit 
			if(result){
				var pagenum = result.length/limit ; 
				pagenum = Math.ceil(pagenum);
			
				//alert(result.length +":"+pagenum);

				if(pagenum!=0){
					var i;
					var x=0;
					var cont="";
					var act= "";
					cont += '\
					<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadAuctionsList(\''+dept+'\'\,\''+cate+'\'\,\''+type+'\'\,\'1\',\'10\')"> <i class="fa  fa-angle-double-left"  aria-hidden="true"></i>  </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadAuctionsList(\''+dept+'\'\,\''+cate+'\'\,\''+type+'\'\,\'dec\',\'10\')"> <i class="fa fa-angle-left"  aria-hidden="true"></i>  </a></li> ';

					for (i = 1; i <= pagenum; i++) { 
						x++; 
						act= "";
						if(i==1){
							act="active";
						}

						cont += '\
						<li class="page-item "><a class="page-link pagenum pagenum'+i+' '+act+'" href="javascript:contents.LoadAuctionsList(\''+dept+'\'\,\''+cate+'\'\,\''+type+'\'\,\''+i+'\'\,\'10\')">'+i+'</a></li> ';
					
			 

					}
					cont += '\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadAuctionsList(\''+dept+'\'\,\''+cate+'\'\,\''+type+'\'\,\'inc\',\'10\')"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadAuctionsList(\''+dept+'\'\,\''+cate+'\'\,\''+type+'\'\,\''+pagenum+'\'\,\'10\')"> <i class="fa  fa-angle-double-right"  aria-hidden="true"></i>  </a></li>';

					$("#section_paging ul.pagination").html(cont);
				}
			}else{
				$("#section_paging ul.pagination").html("");
			}
	 

		},error:function(xhr,status,error){
			console.log('===== error contents.LoadCountAuctions'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});
			


};


contents.LoadCountNewsAuctOffice=function(dept,type ,page , limit ){

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}
 
	var limitload = "" ;
 
	var langcode = localStorage.langcode ; 
	var tablename = "";
	var contents_type ="news" ;
	var contents_type_code = "";

	if(contents_type=="news"){
		tablename = 'news_mapping';
		contents_type_code = type;
	}else{
		tablename = 'auction_mapping';
		contents_type_code = type;
	}
 
	
	
			var setData = {
				table : tablename,
				where : { 
					enable_th : "Y",
					type : contents_type_code ,
					office : dept
				},
				orderby : ' datetime  DESC ',
				limit : limitload
			};
		
	

	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsAuction',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
		//	page  limit 
			if(result){
				var pagenum = result.length/limit ; 
				pagenum = Math.ceil(pagenum);
			
				//alert(result.length +":"+pagenum);

				if(pagenum!=0){
					var i;
					var x=0;
					var cont="";
					var act= "";
					cont += '\
					<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'1\',\'10\')"> <i class="fa  fa-angle-double-left"  aria-hidden="true"></i>  </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'dec\',\'10\')"> <i class="fa fa-angle-left"  aria-hidden="true"></i>  </a></li> ';

					for (i = 1; i <= pagenum; i++) { 
						x++; 
						act= "";
						if(i==1){
							act="active";
						}

						cont += '\
						<li class="page-item "><a class="page-link pagenum pagenum'+i+' '+act+'" href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+i+'\'\,\'10\')">'+i+'</a></li> ';
					
						/*
						if(x>10){

						}else{ 
							cont += '\
						<li class="page-item "><a class="page-link pagenum pagenum'+i+' '+act+'" href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+i+'\'\,\'10\')">'+i+'</a></li> ';
						}*/

					}
					cont += '\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\'inc\',\'10\')"> <i class="fa fa-angle-right" aria-hidden="true"></i> </a></li>\
						<li class="page-item "><a class="page-link ic " href="javascript:contents.LoadNewsMass(\''+dept+'\'\,\''+type+'\'\,\''+pagenum+'\'\,\'10\')"> <i class="fa  fa-angle-double-right"  aria-hidden="true"></i>  </a></li>';

					$("#section_paging ul.pagination").html(cont);
				}
			}else{
				$("#section_paging ul.pagination").html("");
			}
			//alert(pagenum)
			//console.log(result.length);

			/*
			<nav aria-label="Page navigation " id="section_paging">
                <ul class="pagination justify-content-end">
                    <li class="page-item ">
                        <a class="page-link ic active" href="#" tabindex="-1"> <i class="fa fa-caret-left"  aria-hidden="true"></i> </a>
                    </li>
                    <li class="page-item "><a class="page-link pagenum active" href="javascript:contents.LoadNewsMass('ALL','1',10)">1</a></li>
                    <li class="page-item "><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','2',10)">2</a></li>
                    <li class="page-item"><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','3',10)">3</a></li>
                    <li class="page-item">
                        <a class="page-link ic active" href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> </a>
                    </li>
                </ul>
			</nav>
			*/


		},error:function(xhr,status,error){
			console.log('===== error contents.LoadCountNewsAuct'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});
			


};

contents.LoadNewsMassOffice=function(dept,type ,page , limit ){

	// console.log("NewsMass:"+dept+" page:"+page+" limit:"+limit );
	if(dept=="" || dept=="ALL"){

	}
	if(page=="dec" || page=="inc"){
		page =1
	}

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}

	$(".page-link.pagenum").removeClass('active');
	$(".pagenum"+page).addClass('active');

	//var numrun = page*limit ;
	//var no = (page-1)*limit;
	var limitload =  (page-1)*limit +" , "+ limit ;
	//console.log(" Limit: "+ no +" , "+limit );
	var langcode = localStorage.langcode ; 
	var tablename = "";

	if( !type.search("news") ){
		var contents_type ="news" ;
	}else{
		var contents_type ="auction" ;
	} 

	
	var contents_type_code = "";


	if(contents_type=="news"){
		tablename = 'news_mapping';
		contents_type_code = type;
	}else{
		tablename = 'auction_mapping';
		contents_type_code = type;
	}




	if(!type.search("news")){
		var setData = {
			table : tablename,
			where : { 
				enable_th : "Y",
				type : contents_type_code ,
				office : dept ,
			
			},
			orderby : ' datetime  DESC ',
			limit : limitload
		};
		
	}else{// Auction
		var setData = {
			table : tablename,
			where : { 
				enable_th : "Y",
				type : contents_type_code ,
				office : dept ,
			},
			orderby : ' datetime  DESC ',
			limit : limitload
		};
	}
	
	

	console.log(setData);
	$('#newsmass').empty();
	$('#auctions_list').empty();
	
	$.ajax({
		url:contents.url+'?mode=LoadHomeNewsAuction',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
			
 			console.log(result);
			if( result) {
				$.each( result , function( key1, value1 ) {
					
					var datenews = duck.ConvertDate(value1['datetime'],'full',langcode);

					if( !type.search("news") ){
						  

						var content_lisub2 ="";
								content_lisub2 +='	<div class="container">\
														<div class="row">\
															<div class="col-lg-12">\
																<div class="card">\
																	<div class="card-body">\
																		<div>\
																			<h5 class="card-title mt-1">\
																				<a href="/'+value1['folderpath_name']+'/news.php?news='+value1['id']+'&deptcode='+value1['folderpath_name']+'"  class="linknonepink">'+value1['title_'+langcode]+'</a>\
																			</h5>\
																		</div>\
																		<div class="footer-detail mt-2">\
																			<div class="row">\
																				<div class=" col-md-6   col-6 time ">\
																				<i class="fa fa-calendar" aria-hidden="true"> </i> \
																				<span class="ml-0">'+datenews+'</span>\
																				</div>\
																				<div class=" col-md-3   col-6 view">\
																				<i class="fa fa-eye" aria-hidden="true"> </i> \
																				<span class="ml-0">'+value1['views']+'  view</span>\
																				</div>\
																			</div> \
																		</div> \
																	</div>\
																		<hr class="lines">\
																</div>\
															</div>\
														</div>\
													</div>' 
													;
					
						$('#newsmass').append(content_lisub2);

					}else{
						var content_lisub2 ="";
						content_lisub2 +='<div class="container">\
						<div class="row">\
							<div class="col-lg-12 mt-2">\
								<div class="card">\
									<div class="card-body">\
										<div class="row">\
											<div class="col-lg-11 col-sm-11">\
												<h5 class="card-title"><a href="/'+value1['folderpath_name']+'/news.php?id='+value1['id']+'"  class="linknonepink">'+value1['title_'+langcode]+'</a>\
												</h5>\
											</div>\
											<div class="col-lg-1 col-sm-1">\
												<div class="box_ic">\
												<i class="fa fa-download icon-2x" aria-hidden="true"></i>\
												</div>\
											</div>\
										</div>\
										<div class="footer-detail mt-2">\
											<div class="row">\
												<div class=" col-md-2   col-6 time ">\
												<i class="fa fa-calendar" aria-hidden="true"> </i> \
												<span class="ml-0">'+datenews+'</span>\
												</div>\
												<div class=" col-md-2   col-6 view">\
												<i class="fa fa-eye" aria-hidden="true"> </i> \
												<span class="ml-0">'+value1['views']+'  view</span>\
												</div>\
												<div class="col-md-8   col-12 text-right name-depart">\
												<span class="mr-2"> <a href="/'+value1['folderpath_name']+'"> '+value1['department_name_'+langcode]+'</a> </span>  \
												</div>\
											</div> \
										</div> \
									</div>\
										<hr class="lines">\
								</div>\
							</div>\
						</div>\
					</div>\
						';
						$('#auctions_list').append(content_lisub2);
					}



				});
			}else{
				var content_lisub2 ="";
							content_lisub2 +='	<div class="container">\
													<div class="row">\
														<div class="col-lg-12">\
															<div class="card">\
																<div class="card-body">\
																	<div>\
																		<h5 class="card-title mt-1 text-center ">\
																		-- เตรียมการข้อมูล --  \
																		</h5>\
																	</div>\
																</div>\
																	<hr class="lines">\
															</div>\
														</div>\
													</div>\
												</div>' 
												;
				 
					$('#newsmass').append(content_lisub2);
					$('#auctions_list').append(content_lisub2);
			}

		},error:function(xhr,status,error){
			console.log('===== error contents.LoadNewsMass'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});


};






contents.LoadAuctionsList=function(dept,cate,type ,page , limit ){

	// console.log("NewsMass:"+dept+" page:"+page+" limit:"+limit );
	if(dept=="" || dept=="ALL"){

	}
	if(page=="dec" || page=="inc"){
		page =1
	}

	if(!page){
		page = 1 ; 
	}
	if(!limit){
		limit =10 ;
	}

	$(".page-link.pagenum").removeClass('active');
	$(".pagenum"+page).addClass('active');


	var limitload =  (page-1)*limit +" , "+ limit ;
	var langcode = localStorage.langcode ; 
	var tablename = "auctions";

	  
	var contents_type ="auctions" ;
	var contents_type_code = type;
	var auctions_category_code = cate ; 

 
		if(dept=="ALL"){
			if(cate=="ALL"){
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code , 
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						auctions_category_code : auctions_category_code ,
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}
				
			
		}else{ 
			if(cate=="ALL"){
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						department_code_ch : dept , 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}else{
				var setData = {
					table : "auctions",
					where : { 
						enable : "Y",
						auctions_type_code : contents_type_code ,
						auctions_category_code : auctions_category_code ,
					 
					},
					orderby : ' auctions_startdate  DESC ',
					limit : limitload
				};
			}
		} 
	 

	console.log(setData);
	 
	$('#auctions_list').empty();
	
	$.ajax({
		url:contents.url+'?mode=LoadAuctionsList',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
			
 			console.log(result);
			if( result) {
				$.each( result , function( key1, value1 ) {
					
				 
					var startdate = duck.ConvertDate(value1['auctions_startdate'],'full',langcode);

					 
						var content_lisub2 ="";
						content_lisub2 +='\
						<div class="container">\
							<div class="row">\
								<div class="col-lg-12 mt-2">\
									<div class="card">\
										<div class="card-body">\
											<div class="row">\
												<div class="col-lg-11 col-sm-11">\
													<h5 class="card-title">\
													<a href="/'+value1['folderpath_name']+'/auctionsdet.php?auctions='+value1['id']+'&deptcode='+value1['folderpath_name']+'"  class="linknonepink"> ' +value1['title_th']+'</a>\
													</h5>\
												</div>\
												<div class="col-lg-1 col-sm-1">';
													
												if(value1['file']){ 
						content_lisub2 +='			<a href="/uploads/files/'+value1['file']+'" title="'+value1['file']+'" target="_blank">\
														<div class="box_ic">\
															<i class="fa fa-download icon-2x" aria-hidden="true"></i>\
														</div>\
													</a>\
												';
												}
												if(value1['file2']){ 
						content_lisub2 +='			<div class="box_ic">\
														<a href="/uploads/files/'+value1['file2']+'" title="'+value1['file2']+'" target="_blank"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>\
													</div>\
												';
												}
												if(value1['file3']){ 
						content_lisub2 +='			<div class="box_ic">\
														<a href="/uploads/files/'+value1['file3']+'" title="'+value1['file3']+'" target="_blank"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>\
													</div>\
												';
												}
												if(value1['file4']){ 
						content_lisub2 +='			<div class="box_ic">\
														<a href="/uploads/files/'+value1['file4']+'" title="'+value1['file4']+'" target="_blank"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>\
													</div>\
												';
												}
												if(value1['file5']){ 
						content_lisub2 +='			<div class="box_ic">\
														<a href="/uploads/files/'+value1['file5']+'" title="'+value1['file5']+'" target="_blank"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>\
													</div>\
												';
												}

						 
							var catename = "";
							if(value1['auctions_category_th']==null){
								catename = " - ";
							}else{
								catename = value1['auctions_category_th'];
							}
							var gname = "";
							if(value1['auctions_group_th']==null){
								gname = " - ";
							}else{
								gname = value1['auctions_group_th'];
							}
							var hidedraft ="hide " ; 
							if(contents_type_code=="auctions_draft"){
								hidedraft =""; 
							}

						content_lisub2 +='\		</div>\
											</div>\
											<div class="footer-detail mt-2">\
												<div class="row">\
													<div class=" col-md-4   col-6 view">\
														<span class="ml-0"> เลขที่เอกสาร <span class="font7"> #'+value1['docno']+'</span>  </span>\
													</div>\
													<div class=" col-md-4   col-6 view">\
														<span class="ml-0"> วิธีซื้อ/จ้าง <span class="font7"> '+catename +'</span>  </span>\
													</div>\
													<div class=" col-md-4   col-6 view '+ hidedraft+'">\
														<span class="ml-0"> ชนิด <span class="font7"> '+gname +'</span>  </span>\
													</div>\
												</div>\
												<div class="row">\
													<div class=" col-md-4   col-6 time ">\
													<i class="fa fa-calendar" aria-hidden="true"> </i> \
													<span class="ml-0"> วันที่ประกาศ '+startdate+'</span>\
													</div>\
													<div class=" col-md-2   col-6 view">\
													<i class="fa fa-eye" aria-hidden="true"> </i> \
													<span class="ml-0">'+value1['views']+'  view</span>\
													</div>\
													<div class="col-md-6   col-12 text-right name-depart">\
													<span class="mr-2"> <a href="/'+value1['folderpath_name']+'"> '+value1['department_name_th']+'</a> </span>  \
													</div>\
												</div> \
											</div> \
										</div>\
											<hr class="lines">\
									</div>\
								</div>\
							</div>\
						</div>\
						';
						 
						$('#auctions_list').append(content_lisub2);
				});
			}else{
				var content_lisub2 ="";
							content_lisub2 +='	<div class="container">\
													<div class="row">\
														<div class="col-lg-12">\
															<div class="card">\
																<div class="card-body">\
																	<div>\
																		<h5 class="card-title mt-1 text-center ">\
																		-- เตรียมการข้อมูล --  \
																		</h5>\
																	</div>\
																</div>\
																	<hr class="lines">\
															</div>\
														</div>\
													</div>\
												</div>' 
												;
				 
					 
					$('#auctions_list').append(content_lisub2);
			}

		},error:function(xhr,status,error){
			console.log('===== error contents.LoadAuctionsList'); 
			console.log(xhr); 
			duck.NotiDanger();
		}
	});


};
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
contents.LoadDepartmentSL=function(v_val,element_id){

	//department_sel
	if(v_val || v_val=="ALL" ){
		//		alert(v_val);
		v_val ="";
	}
	var langcode =localStorage.langcode ;
	var selectdept = "";
	if(langcode=="th"){
		var exDat = {
			table : "department" ,
			where : { enable:"Y" },
			orderby : " CONVERT (   department_name_th  USING tis620 ) ASC " ,
			limit : "" ,
		};
		selectdept = "ทุกสำนัก"  ;
	}else{
		var exDat = {
			table : "department" ,
			where : { enable:"Y" },
			orderby : "  department_name_en    ASC " ,
			limit : "" ,
		};
		selectdept = "All office"  ;
	}
	

	$.ajax({
		url:contents.url+'?mode=LoadAllData',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
		//	console.log(data);
			$('#'+element_id).find('option').remove()
			$('<option>').attr('value','ALL').text(selectdept).appendTo('#'+element_id);
			$.each(data, function(i, result) {
				var deptname= "";
				if(langcode=="th"){
					deptname = result.department_name_th ; 
				}else{
					deptname = result.department_name_en ; 
				}
				if(result.department_code_ch == v_val ){
					$(".select2-chosen").text(result.deptname);
					$('<option>').attr('value', result.department_code_ch).attr('selected', 'selected').text(deptname).appendTo('#'+element_id);
				}else{
					$('<option>').attr('value', result.department_code_ch).text(deptname).appendTo('#'+element_id);
				}
			});

		},
		error:function(data){
			console.log(data);
			console.log('check LoadDepartmentSL');
			duck.NotiDanger();
		}
	});

};

contents.LoadAuctionsCategorySL=function(v_val,element_id,aucttype){

	//department_sel
	if(v_val || v_val=="ALL" ){
		//		alert(v_val);
		v_val ="";
	}
	var langcode =localStorage.langcode ;
	var selectdept = "";
	 
		var exDat = { 
			typecode : aucttype,
		};
		selectdept = "วิธีซื้อ/จ้างทุกหมวดหมู่"  ;
 
	

	$.ajax({
		url:contents.url+'?mode=LoadAuctionsCategoryByType',
		type:'POST',
		dataType:'json',
		data:exDat ,
		success:function(data){
		 	console.log(data);
			$('#'+element_id).find('option').remove()
			$('<option>').attr('value','ALL').text(selectdept).appendTo('#'+element_id);
			$.each(data, function(i, result) {
				var name= "";
				if(langcode=="th"){
					name = result.auctions_category_th ; 
				}else{
					name = result.auctions_category_en ; 
				}
				if(result.auctions_category_code == v_val ){
					$(".select2-chosen").text(result.name);
					$('<option>').attr('value', result.auctions_category_code).attr('selected', 'selected').text(name).appendTo('#'+element_id);
				}else{
					$('<option>').attr('value', result.auctions_category_code).text(name).appendTo('#'+element_id);
				}
			});

		},
		error:function(data){
			console.log(data);
			console.log('check LoadDepartmentSL');
			duck.NotiDanger();
		}
	});

};

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

contents.LoadMenuMainEN=function(){
	var langcode = localStorage.langcode ; 
 
 
		var setData = {
			table : 'en_menumain',
			where : {
				enable_en : 'Y',
				deleted : 0 
			},
			orderby : ' orderby DESC ',
			limit : ''
		};
 
	

	$.ajax({
		url:contents.url+'?mode=LoadMenuMainEN',
		type:'POST',
		dataType:'json',
		data: setData , 
		beforeSend:function(){
		},
		success:function(result,status,xhr){
		
		//	console.log(result);
			
			var cont = "";
			cont += '<li class="nav-item "> <a href="/en/index.php" class="nav-link"> HOME </a> </li>' ;
			$.each( result , function( key1, value1 ) { 

				var d1 = "";
				var dt1 = "";

				if(value1['menumain2']){
					d1 = "dropdown";
					dt1 = "dropdown-toggle";
				
 
				cont += '\
							<li class="nav-item '+d1+'">\
								<a class="nav-link '+dt1+'" data-toggle="'+d1+'" href="'+contents.path2+'/'+value1['menumain_otherlink']+'"> '+value1['menumain_name_'+langcode] +' </a>\
								<div class="dropdown-menu bg-white-custom">\
									<ul class="listsub">';
									$.each( value1['menumain2'] , function( key2, value2 ) {
										if(value2['menumain3']){
											cont += '\
													<li class="dropdown">\
														<a class="" href="'+contents.path2+'/'+value2['menumain_otherlink']+'" > '+value2['menumain_name_'+langcode]+'\
															<span class="arrow">\
															<i class="fa fa-chevron-right"></i>\
															</span>\
														</a>\
														<div class="dropdown-menu bg-white-custom">\
															<ul class="listsub listsub2 ">\
														';
														$.each( value2['menumain3'] , function( key3, value3 ) {
															if(value3['menumain4']){
																cont += '\
																		<li class="dropdown">\
																			<a class="" href="'+contents.path2+'/'+value3['menumain_otherlink']+'" > '+value3['menumain_name_'+langcode]+'\
																				<span class="arrow">\
																				<i class="fa fa-chevron-right"></i>\
																				</span>\
																			</a>\
																			<div class="dropdown-menu bg-white-custom">\
																				<ul class="listsub listsub2 ">\
																			'; 

																			$.each( value3['menumain4'] , function( key4, value4 ) {
																			 
																				cont +=	'\
																					<li>  <a class="" href="#"> '+value4['menumain_name_'+langcode]+' </a> </li>\
																				';
																				 
																			});



																cont +=	'\
																				</ul>\
																			</div>\
																		</li>\
																';
															}else{
																if(value3.menumain_linktype==1 ){
																	cont +=	'\
																	<li>  <a class="" href="'+contents.path2+'/'+value3['menumain_otherlink']+'" target="_blank"> '+value3['menumain_name_'+langcode]+' </a> </li>\
																	';
																}else{
																	cont +=	'\
																	<li>  <a class="" href="'+contents.path2+'/'+value3['menumain_otherlink']+'"> '+value3['menumain_name_'+langcode]+' </a> </li>\
																	';
																}
															
															}
														});
											cont +=	'\
															</ul>\
														</div>\
													</li>\
											';
										}else{
											if(value2.menumain_linktype==1 ){
											
												cont +=  '<li> <a class="" href="'+contents.path2+'/'+value2['menumain_otherlink']+'" target="_blank">'+value2['menumain_name_'+langcode]+'</a> </li>' ;
									
											}else{
												cont +=  '<li> <a class="" href="'+contents.path2+'/'+value2['menumain_otherlink']+'">'+value2['menumain_name_'+langcode]+'</a> </li>' ;
											}
											
										} 
									}); 
					cont += 		'\
									</ul>\
								</div>\
							</li>';
				}else{
					if(value1.menumain_linktype==1 ){ 
						cont +=  '<li class="nav-item"> <a class="nav-link" href="'+value1['menumain_otherlink']+'" target="_blank">'+value1['menumain_name_'+langcode]+'</a> </li>' ;
			
					}else{
						cont +=  '<li class="nav-item"> <a class="nav-link" href="'+contents.path+'/'+value1['menumain_otherlink']+'">'+value1['menumain_name_'+langcode]+'</a> </li>' ;
					}
				}
			
				// $('#ul_menumain').prepend(cont);

			});
			$('#ul_menumain').prepend(cont);

			var d = "" ;
			if(localStorage.lang=="EN"){
				d = "Disease";
			}else{
				d = "รายชื่อโรค";
			}

			// var cont2 = '\
			// <li class="nav-item dropdown disease-name-dropdown dropdown">\
			// 	<a class="nav-link dropdown-toggle lang_disease"  href="#">'+d+'</a>\
			// </li>\
			// ';


			//$('#ul_menumain').append(cont2);

		},
		complete:function(xhr,status){ 
			//console.log('=====complete contents.LoadMenuMain===='); 
		},
		error:function(xhr,status,error){
			console.log('===== error contents.LoadMenuMain');
		
			console.log(xhr);
			console.log(status);
			console.log(error);
			duck.NotiDanger();
		}
 
	});

	 

};

/////////////////////////////////////////////////////////////////////////////////////
$( document ).ready(function() {
	
	contents.LoadContentsSetLang();

	if(!localStorage.numperpage){
		localStorage.numperpage = 10;
	}
	localStorage.numperpage = 10;


	$(".site-logo").click(function(){
		window.localtion.href = 'index.php' ;
	});

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

	//alert(contents.path);

});

////////////////////          END contents Script         ///////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
