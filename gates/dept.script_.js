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
						cont += '<a class="disease_listsub"  href="disease_detail.php?'+value3['id']+'" ><i class="fa fa-circle-o disease_listsub_icon" ></i>\
									'+value3['disease_name_th']+ '\
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

dept.OpenDiseaseDetail=function(disease_id){
	// console.log(" dept.OpenDiseaseDetail : "+disease_id);

};


//////////////////////////////////////////////////////////////////////////////////////////////////
$( document ).ready(function() {
	dept.LoadCharOfDisease();

});

////////////////////          END dept Script         ///////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
