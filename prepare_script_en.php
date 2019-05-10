<!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
<!--
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->

  <script src="/js/jquery-3.3.1.min.js"></script> 
  <script src="/bootstrap/js/bootstrap.js"></script>
  <script src="/gates/duck.script.js"></script>
  <script src="/gates/contents.script.js"></script>
  <script src="/gates/dept.script.js"></script>
  <script src="/js/owlcarousel/owl.carousel.js"></script>
  <!--<script src="https://ddc.moph.go.th/asset/site/js/jquery.mmenu.all.js"></script>-->
  
  <!-- <script src="http://demos.jquerymobile.com/1.4.5/js/jquery.mobile-1.4.5.min.js"></script> -->

  <style>
      #sidebar {
          min-width: 100%;
          max-width: 100%;
          color: #4b4b4b;
          transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
          transform-origin: bottom left;
      }

      #sidebar.active {
          margin-left: -250px;
          transform: rotateY(100deg);
      }

      #sidebar .sidebar-header {
          padding: 20px;
          background: #6d7fcc;
      }

      #sidebar ul.components {
          padding: 20px 0;
        
      }

      #sidebar ul p {
          color: #fff;
          padding: 10px;
      }
      #sidebar ul li{
        padding: 0px 20px;
      } 
      #sidebar ul li a {
          padding: 10px;
          font-size: 1.1em;
          display: block;
          color: #3a3a3a;
      }
      #sidebar ul li a:hover {
          color: #E84c93;
          /*background: #fff;*/
      }

      #sidebar ul li.active > a, #sidebar a[aria-expanded="true"] {
          color: #E84c93;
        /* background: #6d7fcc;*/
      }


      #sidebar a[data-toggle="collapse"] {
          position: relative;
      }

      #sidebar .dropdown-toggle::after {
          display: block;
          position: absolute;
          top: 50%;
          right: 20px;
          transform: translateY(-50%);
      }
      #sidebar ul ul a {
          font-size: 0.9em !important;
          padding-left: 30px !important;
      }
      #nav_newshome li.nav-item{
        padding: 0px 15px;
      }


  </style>
    <!-- Optional JavaScript -->
   
  <script>
    
      $( document ).ready(function() {
       // contents.LoadSlideImageHome();
       contents.LoadMenuMainEN();

        $('.owl-carousel').owlCarousel({
          loop:false,
          margin:10,
          nav:true,
          dots:false,
          navText : ['<i class="fa fa-play-circle-o prev-left" aria-hidden="true"></i>','<i class="fa fa-play-circle-o next-right" aria-hidden="true"></i>'],
          responsive:{
            0:{
              items:1
            },
            481:{
              items:2
            },
            768:{
              items:3
            },
            1024:{
              items:3
            }
          }
        });
      });
    </script>  
    <script>
      /*
      function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;
      
        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
      
        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
      
        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }      */
    </script>