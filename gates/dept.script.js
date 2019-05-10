/////////////////////////////////////////////////////////////////////////////////////
////////////////////           dept Script          ///////////////////////////
var dept = {
				url : '../gates/dept.inc.php'
			};
 
//////////////////////////////////////////////////////////////////////////////////////////////////
dept.LoadCharOfDisease=function(){
	var setData = {};
	$.ajax({
		url:dept.url+'?mode=LoadCharOfDisease',
		type:'POST',
		dataType:'json',
		data: setData , 
		success:function(data){
			console.log(data);  
			 
			var cont = '' ; 
			$.each( data['char_th'] , function( key1, value1 ) {  
				
			}); 
		//	$(".box_disease_list").html(cont); 
		},
		error:function(data){
			console.log(data);
			console.log('check dept.LoadCharOfDisease');
			duck.NotiDanger();
		}
	});
};

dept.LoadDiseaseAllByStep=function(){
	
	var setData = {};

	$.ajax({
		url:dept.url+'?mode=LoadDiseaseAllByStep',
		type:'POST',
		dataType:'json',
		data: setData , 
		success:function(data){
			console.log(data);  
			 
			var cont = '' ; 

			$.each( data['char_th'] , function( key1, value1 ) {  

				$.each( value1 , function( key2, value2 ) {  
					cont += '<p class="disease_list">'+key2+'</p>' ; 
					cont += '<div class="disease_list_box">' ;  
					$.each( value2 , function( key3, value3 ) {  
						cont += '<a class="disease_listsub"  href="disease_detail.php?d='+value3['id']+'" ><i class="fa fa-circle-o disease_listsub_icon" ></i>\
									'+value3['disease_name_th']+ '\
								</a>' ;
					});
					cont += '</div>' ; 
				});
			}); 

			$.each( data['char_en'] , function( key1, value1 ) {  

				$.each( value1 , function( key2, value2 ) {  
					cont += '<p class="disease_list">'+key2+'</p>' ; 
					cont += '<div class="disease_list_box">' ;  
					$.each( value2 , function( key3, value3 ) {  
						cont += '<a class="disease_listsub"  href="disease_detail.php?d='+value3['id']+'" ><i class="fa fa-circle-o disease_listsub_icon" ></i>\
									'+value3['disease_name_en']+ '\
								</a>' ;
					});
					cont += '</div>' ; 
				});
			}); 

			$(".box_disease_list").html(cont); 

		},
		error:function(data){
			console.log(data);
			console.log('check dept.LoadDiseaseByStep');
			duck.NotiDanger();
		}
	});

};

dept.LoadDiseaseByTitleName=function(titlename,langtype){
	 //var txt = "disease_name_"+localStorage.langcode ;
	 
	if(langtype=="en"){
		var setData = {
			table : "disease" , 
			where : {  
				enable: "Y" ,
				deleted: 0 ,
			},
			wherelike : {  
				disease_name_en : titlename
			}, 
			orderby: "   disease_name_en  ASC " ,
			limit : "" , 
		};
	
	}else{
		
		var setData = {
			table : "disease" , 
			where : {  
				enable: "Y" ,
				deleted: 0 ,
			},
			wherelike : {  
				disease_name_th : titlename
			}, 
			orderby: " CONVERT (   disease_name_th  USING tis620 ) ASC " ,
			limit : "" , 
		};
	} 
 
	

	console.log(setData);

	$.ajax({
		url:dept.url+'?mode=LoadLikeTitle',
		type:'POST',
		dataType:'json',
		data: setData , 
		success:function(data){
			console.log(data); 
			 
			var cont = '' ; 
			cont += '<p class="disease_list">'+titlename+'</p>' ; 
			cont += '<div class="disease_list_box">' ;  
			$.each( data , function( key, value ) { 
				// cont += '<a class="disease_listsub"  href="javascript:dept.OpenDiseaseDetail(\''+value['id']+'\'\)" ><i class="fa fa-circle-o disease_listsub_icon" ></i>\
				// 			'+value['disease_name_'+langtype]+ '\
				// 		</a>' ;
				cont += '<a class="disease_listsub"  href="disease_detail.php?d='+value['id']+'" ><i class="fa fa-circle-o disease_listsub_icon" ></i>\
							'+value['disease_name_'+langtype]+ '\
						</a>' ;
			});
			cont += '</div>' ; 


			$(".box_disease_list").html(cont);
			

		},
		error:function(data){
			console.log(data);
			console.log('check dept.LoadDiseaseByTitleName');
			duck.NotiDanger();
		}
	});

};

dept.LoadDiseaseContents=function(disease_id){
	
	 var mydata  = {
		disease_id : disease_id
	 };
	console.log(mydata)
	$.ajax({
			url:dept.url+'?mode=LoadDiseaseContents',
			type:'POST',
			dataType:'json',
			data: mydata ,
			success:function(data){ 

			    console.log(data); 
				var dept ="" ;
				var discont ="";
				var x = 0 ;
				
				if(data.detail && data.detail != null ){
					$('.row_prepare').addClass('hide');
					$('.row_data').removeClass('hide');
					

					data.detail.map((item) =>{  
						var active = "";
						var show = "";
						if(x==0){ 
							active = "active" ;
							show = "show" ;
						}
						dept += ' <a class="nav-link '+active+' linknone2" data-toggle="pill" href="#disease_'+item.disease_header_id+'" role="tab" aria-selected="true">'+item.disease_header+'<i class="fa fa-chevron-down"></i> </a>' ;
						discont += ' <div class="tab-pane fade  '+show+'  '+active+'" id="disease_'+item.disease_header_id+'" role="tabpanel" > '+item.detail+' </div> ';
						x++;
					});

					$("#pills_tab").html(dept); // แสดงผล html 
					$("#pills_tab_content").html(discont);
				}else{
					$('.row_prepare').removeClass('hide');
					$('.row_data').addClass('hide');
				}
		   },error:function(data){
				// alert('NOT OK');
		    console.log(data);
		    duck.NotiDanger();
		   }
	});
};

dept.LoadDiseaseName=function(disease_id,element_class){
	
	var setData = {
		table : "disease" , 
		where : {  
			enable: "Y" ,
			deleted: 0 ,
			id: disease_id
		},
		orderby: "" ,
		limit : "" , 
	};

	$.ajax({
		url:dept.url+'?mode=LoadOneRow',
		type:'POST',
		dataType:'json',
		data: setData ,
		success:function(data){
				console.log(data); 
				if(localStorage.langcode=="en"){
					$("."+element_class).text(data.disease_name_en);
				}else{
					$("."+element_class).text(data.disease_name_th);
				}
				

		},error:function(data){
			console.log(data);
			duck.NotiDanger();
		}
	});
};

dept.OpenDiseaseDetail=function(disease_id){
	// console.log(" dept.OpenDiseaseDetail : "+disease_id);
};





//////////////////////////////////////////////////////////////////////////////////////////////////
$( document ).ready(function() {
 

});

////////////////////          END dept Script         ///////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
