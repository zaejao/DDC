<?php 
include "../duck.conf.php";
include $pathf."/prepare_html_en.php"; 

$menucode = "DEPT" ;
$menucode1 = "HOME" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();
 
?>
 

  <?php include $pathf."/prepare_css.php";?>

<body>
  <?php //echo $depttype;?>
  <?php include $pathf."/prepare_header_en.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain_en.php";?>
 

  <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
       

            <div class="row">
              <div class="col-12  mt-4 mb-4"> 
                <span class="topic_text  lang_historydept"> ประวัติกรม</span> 
              </div> 
            </div>

 
               <div class = "row">
                 <div class = "col-12 mt-4">
                    <p>
                       Department of Disease Control Ministry of Public Health Is one of the government agencies that is important to the development of public health Which focuses on academic and technology leadership in disease prevention and control of the country and internationally. The Department of Disease Control has the mission and mission as follows:
                    </p>
                    <p class = "text1"> Mission </p>
                    <p> 
                      Research, develop and transfer knowledge, technology to prevent and control diseases that are standardized and can be applied effectively. To related agencies and people As well as international agencies </p>
                    <p class = "text1"> Mission </p>
                    <p> 
                       <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i>
                       Study, research, develop and define academic and technological standards as well as human resource development. Prevent and control diseases and threats that threaten health. 
                    </p>
                    <p> 
                      <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Publish academic knowledge on prevention, control of diseases and threats to health related agencies and People 
                    </p>
                    <p> 
                      <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Control of supervision and evaluation of disease control 
                    </p>
                    <p> 
                      <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Provides treatment and rehabilitation services for specific patients. </p>
                      <p> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Coordinate policies and plans to prevent disease and threats that threaten health. </p>
                      <p> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Developing a network for disease control and disease surveillance with related agencies and organizations Local </p>
                      <p> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Create a network of cooperation with international or international organizations to prevent and control diseases and health problems. International </p>
                      <p class = "text1"> Background </p><p> Department of Disease Control Was originally a communicable disease division Under the Department of Public Health Ministry of the Interior Serves to control and prevent contagious diseases </p>
                    
                    
                    
                      <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">1942</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">
                        Later in the year 2485, there was a Decree establishing the Department of Public Health to be the Ministry of Public Health. There were 7 departments under the department which had related departments. With the work of communicable diseases, 2 departments, namely the Department of Medical Services and the Department of Public Health (after being changed to the Department of Health) Khon Kaen Leprosy Hospital Chiang Mai Leprosy Hospital Leprosy Hospital Nakhon Si Thammarat Chiang Rai Leprosy Estate Bang Rak Hospital Tuberculosis Hospital Bamrasnaradura Hospital Other disease control work is still under the responsibility of the department. Control of communicable diseases Department of Public Health
                    </p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">1952</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10"> 
                      Has changed the name Department of Public Health is the Department of Health. And transfer the business of a specialized hospital under the Department of Health And raised the position as a specialized disease unit to be the tuberculosis control division Leprosy Control Division Improve the expansion of control of malaria and elephantiasis. Is a control group for malaria and filariasis, including control of yaws and venereal disease, forming a control group for sexually transmitted diseases and yaws.
                    </p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">1972</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10"> Has included the Department of Medicine and the Department of Health Together as the Department of Medical and Health Control of all communicable diseases depends on the Department of Medical and Health. </p>
                  </div>
                </div>
                <div class="  ">
                  <div class="row">
                    <div class="col-lg-2 ">
                      <div class="box_ani m-auto">
                        <p class="text_ani">1974</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">  
                      The Department of Medical Affairs and the Department of Health have separated At that time, the Communicable Disease Control Unit was incorporated into the Department of Communicable Disease Control, Department of Communicable Disease Control. Divide the government into a consultant group. Academic Division of Communicable Diseases 7 Division, Division and Department of Administration Support of the Department, 4 departments, 4 special hospital diseases Control of communicable diseases, led by 5 office insects  
                    </p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani  m-auto">
                        <p class="text_ani">2002</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10"> Has issued a government reform law Causing the division of departments of the Department of Disease Control to consist of 4 administrative support departments, the Division of Communicable Diseases, 8 different departments, and there are agencies located in the region, namely the Office of Disease Prevention and Control, 12 districts, the Department of Disease Control. Academic development for disease control and prison-based health hazards With research, development and transfer Knowledge and technology for surveillance, prevention, control, diagnosis and treatment of diseases and threats that threaten health With authority As follows</p>
                  </div>
                </div>
                <br>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Follow the Communicable Diseases Act Convention or international regulations and other laws Related </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Study, analyze, research and develop knowledge and technology for surveillance Prevent and control diseases And threats that threaten people's health </p>
                 <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Define and improve the operational standards for surveillance, prevention and Control diseases and threats that threaten people's health </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> convey knowledge and technology for surveillance, prevention and control of diseases and Health threat threats to government agencies, the private sector, local administrative organizations and the public. </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Organize and develop mechanisms and networks for surveillance, prevention and Control diseases and threats that threaten health Including the outbreak warning media Of diseases to relevant agencies and the public. </p>
                 <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Provide services to support the transmission of communicable diseases. Only important communicable diseases and serious communicable diseases At tertiary level And quarantine of communicable diseases patients Dangerous according to international agreements </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Proceed with related agencies Or local government organization In surveillance, prevention, control of diseases and threats that threaten health, in the case of wide-ranging problems, severe epidemics or tendency to expand into severe problems </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Collaborate with many countries Or international organizations for surveillance, prevention and control of diseases and international health problems </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Develop systems and mechanisms In order to have the enforcement of the laws in place. </p>
                <p class = "history_detail"> <i class = "fa fa-chevron-right arrow-history" aria-hidden = "true"> </i> Any other actions required by law to be the authority of the Department of Disease Control. Or as assigned by the ministry or cabinet. </p>
              </div>
            </div>

          

       
          
             
          </div>
        </div>
      </div>
    </section>  
     <!--/ section#box_content -->


   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer_en.php";?>
    <?php include $pathf."/prepare_script_en.php";?>
 <script>

      $( document ).ready(function() {
        
       
      });
    </script>  

    
  </body>
</html>



         
       