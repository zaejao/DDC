<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: text/html; charset=utf-8");

require_once "duck.class.php";
require_once "func.php";
require_once "contents.class.php";


function AddDataSet(){
	$clscont = new ContentsClass();

	$table  = $_POST['table'];
	$data  	= $_POST['data'];

	$result = $clscont->AddData($table,$data);

	echo json_encode($result);
}

function EditDataSet(){
	$clscont = new ContentsClass();

	$table  = $_POST['table'];
	$data  	= $_POST['data'];
	$where  = $_POST['where'];

	$result = $clscont->EditData($table,$data,$where);

	echo json_encode($result);
}

function DeleteDataSet(){
	$clscont = new ContentsClass();

	$table  = $_POST['table'];
	$where  = $_POST['where'];

	$result = $clscont->DeleteData($table,$where);

	echo json_encode($result);

}
 
function EditDataContents(){

		$clscont = new ContentsClass();

		$table  = $_POST['table'];
		$data  	= $_POST['data'];
		$data_content  	= $_POST['data_content'];
		$where  = $_POST['where'];

		foreach($data_content as $key => $value ){
			$data_informations = ContentFormat( $value );
			$data[$key] = $data_informations ;
		}

		$result = $clscont->EditData($table,$data,$where);
		echo json_encode($result);
}

function AddDataContents(){

		$clscont = new ContentsClass();

		$table  = $_POST['table'];
		$data  	= $_POST['data'];
		$data_content  	= $_POST['data_content'];

		if($data_content){
			foreach($data_content as $key => $value ){
				$data_informations = ContentFormat( $value );
				$data[$key] = $data_informations ;
			}
		}

		$result = $clscont->AddData($table,$data,$where);
		echo json_encode($result);
}

function LoadAllData(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->Load($table, $where , $orderby,$limit);
	echo json_encode($result);
}

function LoadOneRow(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];


	$result=$clscont->LoadOnce($table, $where  );
	echo json_encode($result);
}

function LoadLikeTitle(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$wherelike = $_POST['wherelike'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->LoadLikeTitle($table, $where , $wherelike, $orderby,$limit );
	echo json_encode($result);
}

////////////////////////////////////////////////////////////////////////////////////////////


function LoadMenuMain(){
	$clscont = new ContentsClass();

	$result1 = $clscont->Load('menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>1 ) ,' orderby DESC '  ,'');
	if($result1){
		foreach( $result1 as $key1 => $val1){
			$result1[$key1]['menumain2'] = $clscont->Load('menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>2 , 'menumain_id'=> $val1['id'] ) ,' orderby DESC '  ,'');
			if($result1[$key1]['menumain2']){ 
				foreach( $result1[$key1]['menumain2'] as $key2 => $val2){
					$result1[$key1]['menumain2'][$key2]['menumain3'] = $clscont->Load('menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>3 , 'menumain_id'=> $val2['id'] ) ,' orderby DESC '  ,'');
					if($result1[$key1]['menumain2'][$key2]['menumain3']){ 
						foreach( $result1[$key1]['menumain2'][$key2]['menumain3'] as $key3 => $val3){
							$result1[$key1]['menumain2'][$key2]['menumain3'][$key3]['menumain4'] = $clscont->Load('menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>4 , 'menumain_id'=> $val3['id'] ) ,' orderby DESC '  ,'');
						}
					}
				}
			}
		}
	}
	echo json_encode($result1);

}

function LoadSetCode(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->LoadSetCode($table, $where , $orderby,'');
	echo json_encode($result);

}

function SetLang(){
	session_start();

	$langcode = $_POST['langcode'];
	if( $langcode =="th" ){
		$_SESSION["LANG"] = "TH";
		$_SESSION["LANGCODE"] = "th";
	}else{
		$_SESSION["LANG"] = "EN";
		$_SESSION["LANGCODE"] = "en";
	}
	$result['LANG'] = array($_SESSION["LANG"],$_SESSION["LANGCODE"]);
	echo json_encode($result);
}

function LoadHomeNewsAuction(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->LoadHomeNewsAuction($table, $where , $orderby,$limit);
	echo json_encode($result);
}

function LoadHomeNewsList(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->LoadHomeNewsList($table, $where , $orderby,$limit);
	echo json_encode($result);
}



function LoadAuctionsList(){
	$clscont = new ContentsClass();

	$table = $_POST['table'];
	$where = $_POST['where'];
	$orderby = $_POST['orderby'];
	$limit = $_POST['limit'];

	$result=$clscont->LoadAuctionsList($table, $where , $orderby,$limit);
	echo json_encode($result);
}




function LoadAuctionsCategoryByType(){
	$clscont = new ContentsClass();

 
	$typecode = $_POST['typecode'];

	$result=$clscont->LoadAuctionsCategoryByType( $typecode);
	echo json_encode($result);
}


function LoadMenuMainEN(){
	$clscont = new ContentsClass();

	$result1 = $clscont->Load('en_menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>1 ) ,' orderby DESC '  ,'');
	if($result1){
		foreach( $result1 as $key1 => $val1){
			$result1[$key1]['menumain2'] = $clscont->Load('en_menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>2 , 'menumain_id'=> $val1['id'] ) ,' orderby DESC '  ,'');
			if($result1[$key1]['menumain2']){ 
				foreach( $result1[$key1]['menumain2'] as $key2 => $val2){
					$result1[$key1]['menumain2'][$key2]['menumain3'] = $clscont->Load('en_menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>3 , 'menumain_id'=> $val2['id'] ) ,' orderby DESC '  ,'');
					if($result1[$key1]['menumain2'][$key2]['menumain3']){ 
						foreach( $result1[$key1]['menumain2'][$key2]['menumain3'] as $key3 => $val3){
							$result1[$key1]['menumain2'][$key2]['menumain3'][$key3]['menumain4'] = $clscont->Load('en_menumain',array('enable'=>'Y','deleted'=>0 , 'menumain_level'=>4 , 'menumain_id'=> $val3['id'] ) ,' orderby DESC '  ,'');
						}
					}
				}
			}
		}
	}
	echo json_encode($result1);

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
	case "LoadLikeTitle" : LoadLikeTitle(); break;

	////////////////////////////////////////////////////////////////////////////////////////
	case "LoadMenuMain" : LoadMenuMain(); break; 
	case "LoadSetCode" : LoadSetCode(); break; 
	case "LoadHomeNewsAuction" : LoadHomeNewsAuction(); break; 
	case "LoadHomeNewsList" : LoadHomeNewsList(); break; 
	
	
	
	case "SetLang" : SetLang(); break; 

	case "LoadAuctionsList" : LoadAuctionsList(); break; 
	case "LoadAuctionsCategoryByType" : LoadAuctionsCategoryByType(); break; 
	
	
	case "LoadMenuMainEN" : LoadMenuMainEN(); break; 
	////////////////////////////////////////////////////////////////////////////////////////
	default : echo '{"success":"FAIL INC contentClass"}';
}
?>
