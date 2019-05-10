<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: text/html; charset=utf-8");

require_once "duck.class.php";
require_once "func.php";
require_once "../duck.conf.php";
require_once "dept.class.php";


function AddDataSet(){
	$clsdept = new DeptClass();

	$table  = $_POST['table'];
	$data  	= $_POST['data'];

	$result = $clsdept->AddData($table,$data);

	echo json_encode($result);
}

function EditDataSet(){
	$clsdept = new DeptClass();

	$table  = $_POST['table'];
	$data  	= $_POST['data'];
	$where  = $_POST['where'];

	$result = $clsdept->EditData($table,$data,$where);

	echo json_encode($result);
}

function DeleteDataSet(){
	$clsdept = new DeptClass();

	$table  = $_POST['table'];
	$where  = $_POST['where'];

	$result = $clsdept->DeleteData($table,$where);

	echo json_encode($result);

} 
function EditDataContents(){

		$clsdept = new DeptClass();

		$table  = $_POST['table'];
		$data  	= $_POST['data'];
		$data_content  	= $_POST['data_content'];
		$where  = $_POST['where'];

		foreach($data_content as $key => $value ){
			$data_informations = ContentFormat( $value );
			$data[$key] = $data_informations ;
		}

		$result = $clsdept->EditData($table,$data,$where);
		echo json_encode($result);
}

function AddDataContents(){

		$clsdept = new DeptClass();

		$table  = $_POST['table'];
		$data  	= $_POST['data'];
		$data_content  	= $_POST['data_content'];

		if($data_content){
			foreach($data_content as $key => $value ){
				$data_informations = ContentFormat( $value );
				$data[$key] = $data_informations ;
			}
		}

		$result = $clsdept->AddData($table,$data,$where);
		echo json_encode($result);
}

function LoadAllData(){
	$clsdept = new DeptClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clsdept->Load($table, $where , $orderby,'');
	echo json_encode($result);
}

function LoadOneRow(){
	$clsdept = new DeptClass();

	$table = $_POST['table'];
	$where = $_POST['where'];


	$result=$clsdept->LoadOnce($table, $where  );
	echo json_encode($result);
}

function LoadLikeTitle(){
	$clsdept = new DeptClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$wherelike = $_POST['wherelike'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clsdept->LoadLikeTitle($table, $where , $wherelike, $orderby,$limit );
	echo json_encode($result);
}


///////////////////////////////////////////////////////////////////////////////////////////////


function LoadDiseaseAllByStep(){
	$clsdept = new DeptClass();
	global $thaichar;
	
	$record['char_th'] = array();
	$record['char_en'] = array();

	foreach ($thaichar as $key1 => $alphabet_th) {
		$where_th['enable'] ="Y";
		$where_th['deleted'] =0 ;
		$wherelike_th['disease_name_th'] = $alphabet_th ;
		$data_charth = $clsdept->LoadLikeTitle('disease',$where_th, $wherelike_th,'',''); 
		if($data_charth){
			$record['char_th'][][$alphabet_th] = $data_charth; 
		}
	}

	foreach(range('A','Z') as $key2 => $alphabet_en) { 
		$where_en['enable'] ="Y";
		$where_en['deleted'] =0 ;
		$wherelike_en['disease_name_en'] = $alphabet_en ;
		$data_charen = $clsdept->LoadLikeTitle('disease',$where_en, $wherelike_en,'',''); 
		
		if($data_charen) { 
			$record['char_en'][][$alphabet_en] = $data_charen; 
		} 
	}
	echo json_encode($record); 
}



function LoadCharOfDisease(){
	$clsdept = new DeptClass();
	global $thaichar;
	
	$record['char_th'] = array();
	$record['char_en'] = array();

	foreach ($thaichar as $key1 => $alphabet_th) {
		$where_th['enable'] ="Y";
		$where_th['deleted'] =0 ;
		$wherelike_th['disease_name_th'] = $alphabet_th ;
		$data_charth = $clsdept->LoadLikeTitle('disease',$where_th, $wherelike_th,'',''); 
		if($data_charth){
			$record['char_th'][] = $alphabet_th ;
		}
	}

	foreach(range('A','Z') as $key2 => $alphabet_en) { 
		$where_en['enable'] ="Y";
		$where_en['deleted'] =0 ;
		$wherelike_en['disease_name_en'] = $alphabet_en ;
		$data_charen = $clsdept->LoadLikeTitle('disease',$where_en, $wherelike_en,'',''); 
		
		if($data_charen) { 
			$record['char_en'][] = $alphabet_en ; 
		} 
	}
	echo json_encode($record); 
}

function LoadDiseaseContents(){
	$clsdept = new DeptClass();

	$disease_id = $_POST['disease_id'];
	$record['detail'] = $clsdept->LoadDiseaseContentsById($disease_id);
	if($record['detail']){
		foreach($record['detail']  as $key => $val ){
			$record['detail'][$key]['detail'] =  htmlspecialchars_decode($val['detail']) ;
		}
	}
	

	echo json_encode($record); 
}


///////////////////////////////////////////////////////////////////////////////////////////////
switch($_REQUEST["mode"]){
	case "AddDataSet" : AddDataSet(); break;
	case "EditDataSet" : EditDataSet(); break;
	case "DeleteDataSet" : DeleteDataSet(); break;
	case "AddDataContents" : AddDataContents(); break;
	case "EditDataContents" : EditDataContents(); break; 
	case "LoadAllData" : LoadAllData(); break;
	case "LoadOneRow" : LoadOneRow(); break;

	////////////////////////////////////////////////////////////////////////////////////////
	 
	case "LoadLikeTitle" : LoadLikeTitle(); break;
	case "LoadDiseaseAllByStep" : LoadDiseaseAllByStep(); break; 
	case "LoadCharOfDisease" : LoadCharOfDisease(); break;
	case "LoadDiseaseContents" : LoadDiseaseContents(); break;
	




	////////////////////////////////////////////////////////////////////////////////////////
	default : echo '{"success":"FAIL INC DetpClass"}';
}
?>
