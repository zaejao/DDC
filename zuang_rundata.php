<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "NEWS" ;
$navsub = "news" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
//include "conf.php";

$langcode=$_SESSION['LANGCODE'];
$clscont = new ContentsClass();
$clsduck = new DuckClass();
 

?> 

  <?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php //include $pathf."/prepare_navsub.php";?>

  <!-- ############################################################################################################### -->
    
        

  <section>
    <div class="container">
      <div class="row">
        <div id="content-title" class="col-lg-12 mt-5">
          <h2>  <?php //echo $data_news['news_title_'.$langcode] ;?>  </h2>
        </div>
      </div>
      <div class="row">
        <div id="content-detail" class="col-lg-12">
        <?php 
        
        $dept = $clscont->Load('auctions',array(),'','');
        $datafile = array();
        foreach ($dept as $key1 => $val1) {

          if($val1['file']){
            $datafile[] = $val1 ;
          }
            //  echo  "<br>".$key1 .". ".$val1['id']."-" .$val1['file'] ."<br>"; 
           // $add[] =  $clsduck->AddData('auctions_files',array('auctions_id'=>$val1['id'],'filestype'=>1 ,'filesname'=>$val1['file'],'filespath'=>$val1['file'] ,'created_by'=>$val1['created_by'] , 'create_date'=>$val1['create_date'],'update_by'=>$val1['update_by'] , 'update_date'=> $val1['update_date']  ));

          //   $a =  $clsduck->AddData('auctions_files',array('auctions_id'=>$val1['id'],'filestype'=>1 ,'filesname'=>$val1['file'],'filespath'=>$val1['file'] ,'created_by'=>$val1['created_by'] , 'create_date'=>$val1['create_date'] ));
        


             // $d[]=$clscont->EditData('auctions',array('auctions_startdate'=>$val1['auction_datetime'] ), array('id'=> $val1['id']));
          
            /*
            $data_menusub =$clscont->Load('menusub2',array(),' menusub_level ASC,  orderby DESC ','');
            foreach ($data_menusub as $key2 => $val2) {
              echo "---- " . $key2 ." ". $val2['menusub_name_th'] ."<br>";
              $datam[] =$clscont->AddData('menusub',array('menusub_name_th'=>$val2['menusub_name_th'] ,'menusub_name_en'=>$val2['menusub_name_en'], 'menusub_code'=>$val2['menusub_code'],'department_code_ch'=>$val1['department_code_ch'],'menusub_level'=>$val2['menusub_level'],'menusub_id'=>$val2['menusub_id'],'menusub_link'=>$val2['menusub_link'],'menusub_otherlink'=>$val2['menusub_otherlink'],'orderby'=>$val2['orderby'],  ));
            }*/
            
            // $d1=$clscont->AddData('setting_home',array('sectionname'=>'slide_head1','sectionname_th'=>'' ,'sectionname_en'=>'' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'100'  ));
            // $d2=$clscont->AddData('setting_home',array('sectionname'=>'diseaselist','sectionname_th'=>'รายชื่อโรค' ,'sectionname_en'=>'รายชื่อโรค' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'90'  ));
            // $d3=$clscont->AddData('setting_home',array('sectionname'=>'newsactivity','sectionname_th'=>'กิจกรรม' ,'sectionname_en'=>'กิจกรรม' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'80'  ));
            // $d4=$clscont->AddData('setting_home',array('sectionname'=>'news_auctions','sectionname_th'=>'' ,'sectionname_en'=>'' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'70'  ));
            // $d5=$clscont->AddData('setting_home',array('sectionname'=>'bannerssystem','sectionname_th'=>'ระบบงานบริการภายใน' ,'sectionname_en'=>'Service system' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'60'  ));
            // $d6=$clscont->AddData('setting_home',array('sectionname'=>'bannerlink','sectionname_th'=>'ลิงก์ที่เกี่ยวข้อง' ,'sectionname_en'=>'Link' ,'numrow'=>'0','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'50'  ));



            // $b1=$clscont->AddData('bannerssystem',array('bannername_th'=>'E-meeting','bannername_en'=>'E-meeting' ,'pathlink'=>'https://convoke.ddc.moph.go.th/index.php' ,'pathpic'=>'i1.jpg','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'100'  ));
            // $b2=$clscont->AddData('bannerssystem',array('bannername_th'=>'Estimate SM','bannername_en'=>'Estimate SM' ,'pathlink'=>'http://esm.ddc.moph.go.th/' ,'pathpic'=>'i2.jpg','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'90'  ));
            // $b3=$clscont->AddData('bannerssystem',array('bannername_th'=>'ระบบสารบรรณกรมฯ','bannername_en'=>'ระบบสารบรรณกรมฯ' ,'pathlink'=>'http://ryssurvey.com/saraban/login.php' ,'pathpic'=>'i3.jpg','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'80'  ));
            // $b4=$clscont->AddData('bannerssystem',array('bannername_th'=>'พรบ.ข้อมูลข่าวสาร','bannername_en'=>'พรบ.ข้อมูลข่าวสาร' ,'pathlink'=>'http://ddccenter.ddc.moph.go.th/infoc/' ,'pathpic'=>'i4.jpg','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'70'  ));
            

            // $b1=$clscont->AddData('banners',array('bannername_th'=>'กระทรวงสาธารณสุข','bannername_en'=>'Ministry of Public Health' ,'pathlink'=>'https://www.moph.go.th' ,'pathpic'=>'d1.png','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'100'  ));
            // $b2=$clscont->AddData('banners',array('bannername_th'=>'E-Health','bannername_en'=>'E-Health' ,'pathlink'=>'https://eHealth.moph.go.th' ,'pathpic'=>'d4.png','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'90'  ));
            // $b3=$clscont->AddData('banners',array('bannername_th'=>'Medical Hub','bannername_en'=>'Medical Hub' ,'pathlink'=>'https://www.thailandmedicalhub.net/' ,'pathpic'=>'d5.png','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'80'  ));
            // $b4=$clscont->AddData('banners',array('bannername_th'=>'กรมบัญชีกลาง','bannername_en'=>'กรมบัญชีกลาง' ,'pathlink'=>'https://www.cgd.go.th/cs' ,'pathpic'=>'d3.png','department_code_ch'=>$val1['department_code_ch'] ,'orderby'=>'70'  ));
            

          } 
        ?>

          <?php //echo "<pre>".print_r($datafile,true)."</pre>"  ;?> 
          <?php
          
          foreach( $datafile as $k1 => $v1){
            if($k1>=1319){
           //  $x[] = $clscont->AddData('auctions_files',array('auctions_id'=>$v1['id'],'filestype'=>1 ,'filesname'=>$v1['file'],'filespath'=>$v1['file'] ,'create_by'=>$v1['create_by'] , 'create_date'=>$v1['create_date'],'update_by'=>$v1['update_by'] , 'update_date'=> $v1['update_date']  ));
            }
            }
          ?>
        </div>
      </div>  
    </div>  
  </section>

 
   <!-- ############################################################################################################### -->

   <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
        contents.LoadSlideImageHome();
    //    dept.LoadCharOfDisease();
      });
    </script>  
  </body>
</html>