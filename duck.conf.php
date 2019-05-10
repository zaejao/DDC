<?php
session_start();
if(!$_SESSION["LANG"]){
    $_SESSION["LANG"] = "TH";
    $_SESSION["LANGCODE"] = "th";
}



$pathf =  $_SERVER['DOCUMENT_ROOT'] ; 

$path['img'] = "/img/" ;

//$path['news'] = "https://ddc.moph.go.th/uploads/news/";

$path['uploads'] = "/uploads/";
$path['ckeditor'] = "/uploads/ckeditor/";
$path['summernote'] = "/uploads/summernote/";
$path['news'] = "/uploads/news/";
$path['files'] = "/uploads/files/" ;
$path['userboard'] = "/uploads/userboard/" ;
$path['others'] = "/uploads/others/" ;


$path['banners'] = "/uploads/banners/" ;
$path['bannerlink'] = "/uploads/bannerslink/" ;
$path['disease'] = "/uploads/disease/" ;



$path['banners_en'] = "/uploads/banners_en/" ;
$path['files_en'] = "/uploads/files_en/" ;
$path['bannerlink_en'] = "/uploads/bannerslink_en/" ;
// echo '<br>-'.$_SERVER['HTTP_SELF'] ;
// echo '<br>-'.$_SERVER['SCRIPT_NAME'];
// echo '<br>-'.$_SERVER['QUERY_STRING'];
// echo '<br>-'.$_SERVER['DOCUMENT_ROOT'];


$pathpiclang['th'] = "/img/icons/flag-th.png" ;
$pathpiclang['en'] = "/img/icons/flag-en.png" ;
$pathfllang['th']  = '<img src="'.$pathpiclang['th'].'" class="box_flag">';
$pathfllang['en']  = '<img src="'.$pathpiclang['en'].'" class="box_flag">';
?>