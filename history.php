<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();

?>

<?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
    <!-- ############################################################################################################### -->
    <?php include "prepare_bannermain.php";?>
    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
    <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
       

            <div class="row">
              <div class="col-12  mt-4 mb-4"> 
                <span class="topic_text  lang_historydept"> ประวัติกรม</span> 
              </div> 
            </div>


          <?php 
          
          if($_SESSION['LANGCODE']=='en'){

          ?>
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

          

          <?php } 
          else{
            ?>
            
            <div class="row">
              <div class="col-12 mt-4"> 
                <p>กรมควบคุมโรค กระทรวงสาธารณสุข เป็นหนึ่งในหน่วยงานราชการที่มีความสำคัญต่อการพัฒนาสุขภาพของประชาชน ที่มุ่งเน้นการเป็นผู้นำด้านวิชาการและเทคโนโลยีการป้องกันและควบคุมโรคของประเทศและระดับนานาชาติ กรมควบคุมโรค มีพันธกิจและภารกิจดังนี้</p>
                <p class="text1">พันธกิจ</p>
                <p>วิจัย พัฒนา และถ่ายทอดองค์ความรู้เทคโนโลยีการป้องกันควบคุมโรคที่ได้ มาตรฐาน และสามารถประยุกต์ใช้ได้อย่างมีประสิทธิภาพ ให้แก่หน่วยงานที่เกี่ยวข้องและประชาชน ตลอดจนหน่วยงานระดับนานาชาติ</p>
                <p class="text1">ภารกิจ</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ศึกษา ค้นคว้า วิจัย พัฒนาและกำหนดมาตรฐานทางวิชาการและเทคโนโลยีตลอดจนการพัฒนาบุคลากรด้าน ป้องกันควบคุมโรคและภัยที่คุกคามสุขภาพ</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> เผยแพร่ความรู้ทางวิชาการด้านป้องกันควบคุมโรคและภัยที่คุกคามสุขภาพให้หน่วยงานที่เกี่ยวข้องและประชาชน</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ควบคุม กำกับ นิเทศ และประเมินผลด้านควบคุมโรค</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ให้บริการรักษาและฟื้นฟูสภาพผู้ป่วยเฉพาะโรค</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ประสานนโยบายและแผนป้องกันควบคุมโรคและภัยที่คุกคามสุขภาพ</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> พัฒนาเครือข่ายการป้องกันควบคุมโรคตลอดจนการเฝ้าระวังโรคกับหน่วยงานที่เกี่ยวข้องและองค์กรท้องถิ่น</p>
                <p><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> สร้างเครือข่ายความร่วมมือกับนานาประเทศหรือองค์กรระหว่างประเทศในการป้องกันควบคุมโรคและปัญหาสุขภาพระหว่างประเทศ</p>
                <p class="text1"    >ความเป็นมา</p>
                <p>กรมควบคุมโรคนั้น เดิมเป็นกองโรคติดต่อ สังกัดกรมสาธารณสุข กระทรวงมหาดไทย ทำหน้าที่ควบคุมและป้องกันโรคติดต่อ</p>
                
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">2485</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">ต่อมาในปี พ.ศ. 2485 ได้มีประกาศราชกฤษฎีกาสถาปนา กรมสาธารณสุข ให้เป็นกระทรวงสาธารณสุขมีกรมในสังกัดรวม 7 กรม ซึ่งมีกรมที่เกี่ยวข้อง กับงานโรคติดต่อ 2 กรม คือ กรมการแพทย์ และกรมสาธารณสุข(ภายหลังเปลี่ยนเป็นกรมอนามัย) กรมการแพทย์ จะรับผิดชอบกิจการของโรงพยาบาล เช่น โรงพยาบาลโรคเรื้อนพระประแดง โรงพยาบาลโรคเรื้อนขอนแก่น โรงพยาบาลโรคเรื้อนเชียงใหม่ โรงพยาบาลโรคเรื้อนนครศรีธรรมราช นิคมโรคเรื้อนเชียงราย โรงพยาบาลบางรัก โรงพยาบาลวัณโรค โรงพยาบาลบำราศนราดูร ส่วนงานควบคุมโรคอื่นๆยังอยู่ในความรับผิดชอบของกรม ควบคุมโรคติดต่อ กรมสาธารณสุข</p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">2495</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">ได้เปลี่ยนชื่อ กรมสาธารณสุขเป็นกรมอนามัย และโอนกิจการของโรงพยาบาลเฉพาะโรคในสังกัดกรมอนามัย และยกฐานะหน่วยงานเฉพาะโรคให้เป็นกอง คือ กองควบคุมวัณโรค กองควบคุมโรคเรื้อน ปรับปรุงขยายงานควบคุมไข้มาลาเรียและโรคเท้าช้าง เป็นกองควบคุมมาลาเรียและโรคเท้าช้าง รวมงาน ควบคุมคุดทะราดกับกามโรคตั้งเป็นกองควบคุมกามโรคและคุดทะราด</p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani m-auto">
                        <p class="text_ani">2515</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">ได้มีการรวมกรมการแพทย์และกรมอนามัย เข้าด้วยกันเป็นกรมการแพทย์และอนามัย งานควบคุมโรคติดต่อทั้งหมดจึงขึ้นกับกรมการแพทย์และอนามัย</p>
                  </div>
                </div>
                <div class="  ">
                  <div class="row">
                    <div class="col-lg-2 ">
                      <div class="box_ani m-auto">
                        <p class="text_ani">2517</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">ได้มีการแยกกรมการแพทย์และกรมอนามัยออกจากกัน ในครั้งนั้นได้มีการรวมหน่วยงานควบคุมโรคติดต่อเข้าด้วยกันจัดตั้งเป็นกรมควบคุมโรคติดต่อ กรม ควบคุมโรคติดต่อ แบ่งส่วนราชการเป็นกลุ่มงานที่ปรึกษา กองวิชาการเกี่ยวกับโรคติดต่อต่างๆ 7 กอง กองและหน่วยงานสนับสนุนการบริหารงาน ของกรมฯ 4 หน่วยงาน โรงพยาบาลเฉพาะโรค 4 แห่งนอกจากนั้นยังมีหน่วยงานที่ตั้งอยู่ในส่วนภูมิภาคได้แก่สำนักงานควบคุม โรคติดต่อเขต 12 เขต และสำนักงานควบคุมโรคติดต่อ นำโดยแมลง 5 สำนักงาน</p>
                  </div>
                </div>
                <div class=" ">
                  <div class="row">
                    <div class="col-lg-2">
                      <div class="box_ani  m-auto">
                        <p class="text_ani">2545</p>
                      </div>
                    </div>
                    <p class="history_block col-lg-10">ได้มีการออกกฎหมายปฏิรูปราชการ ทำให้การแบ่งหน่วยงานของกรมควบคุมโรค ประกอบด้วย หน่วยงานสนับสนุนการบริหารงาน 4 กอง กองวิชาการ เกี่ยวกับโรคติดต่อต่าง 8 สำนัก และมีหน่วยงานที่ตั้งอยู่ในส่วนภูมิภาค ได้แก่ สำนักงานป้องกันควบคุมโรค 12 เขต กรมควบคุมโรค มีภารกิจเกี่ยวกับการพัฒนาวิชาการเพื่อการควบคุมโรคและภัยที่คุกตามสุขภาพ โดยมีการศึกษา วิจัย พัฒนา รวมทั้งการถ่ายทอด องค์ความรู้และเทคโนโลยีเพื่อการเฝ้าระวัง ป้องกัน ควบคุม วินิจฉัย และรักษาโรคและภัยที่คุกคามสุขภาพ โดยมีอำนาจหน้าที่ ดังต่อไปนี้</p>
                  </div>
                </div>
                <br>
                
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ดำเนินการตามกฎหมายว่าด้วยโรคติดต่อ อนุสัญญาหรือกฎข้อบังคับระหว่างประเทศและกฎหมายอื่น ที่เกี่ยวข้อง</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ศึกษา วิเคราะห์ วิจัย และพัฒนาองค์ความรู้และเทคโนโลยีในการเฝ้าระวัง ป้องกันและควบคุมโรค และภัยที่คุกคามสุขภาพของประชาชน</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> กำหนดและพัฒนาคุณภาพมาตรฐานการดำเนินงานในการเฝ้าระวัง ป้องกัน และการควบคุมโรคและภัยที่คุกคามสุขภาพของประชาชน</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ถ่ายทอดองค์ความรู้และเทคโนโลยีในการเฝ้าระวัง ป้องกัน และควบคุมโรคและภัยที่คุกคามสุขภาพให้แก่หน่วยงานภาครัฐ ภาคเอกชน องค์กรปกครองส่วนท้องถิ่นและประชาชน</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> จัดและพัฒนาระบบกลไกและเครือข่ายในการเฝ้าระวัง ป้องกัน และการควบคุมโรคและภัยที่คุกคามสุขภาพ รวมทั้งสื่อสัญญาณเตือนภัยการระบาด ของโรคแก่หน่วยงานที่เกี่ยวข้องและสาธารณะชน</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> จัดให้มีบริการเพื่อรองรับการส่งต่อผู้ป่วยโรคติดต่อ เฉพาะโรคติดต่อสำคัญและโรคติดต่อร้ายแรง ในระดับตติยภูมิ และกักกันผู้ป่วยโรคติดต่อ อันตรายตามข้อตกลงระหว่างประเทศ</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ดำเนินการร่วมกับหน่วยงานที่เกี่ยวข้อง หรือองค์กรปกครองส่วนท้องถิ่น ในการเฝ้าระวังป้องกัน ควบคุมโรค และภัยที่คุกคามสุขภาพกรณีที่เป็น ปัญหาวงกว้าง เกิดโรคระบาดรุนแรงหรือมีแนวโน้มที่จะขยายตัวเป็นปัญหารุนแรง</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ดำเนินการร่วมกับนานาประเทศ หรือองค์กรระหว่างประเทศในการเฝ้าระวัง ป้องกัน และการควบคุมโรคและปัญหาสุขภาพระหว่างประเทศ</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> พัฒนาระบบและกลไก เพื่อให้มีการดำเนินการบังคับใช้กฎหมายที่อยู่ในความรับผิดชอบ</p>
                <p class="history_detail"><i class="fa fa-chevron-right arrow-history" aria-hidden="true"></i> ปฏิบัติการอื่นใดตามที่กฎหมายกำหนดให้เป็นอำนาจหน้าที่ของกรมควบคุมโรค หรือตามที่กระทรวงหรือคณะรัฐมนตรีมอบหมาย</p>

              </div>
            </div>
           


            <?php

          }?>
             
          </div>
        </div>
      </div>
    </section>  
     <!--/ section#box_content -->
  
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    
  </body>
</html>