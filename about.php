
  <body>
    <div class="page-wrapper">
      <!--HEADER-->
       <?php
	  include('header.php');
	  ?>
      <!--//HEADER-->
<section class="career-section">
        <div class="row no-gutters">
          <div class="owl-carousel owl-theme position-relative careers-slider">
            <div class="item">
              <div class="career-img"><img src="assets/images/b4.jpg" title="Scrap Collector" alt="Scrap Collector" ></div>
            </div>
            <div class="item">
              <div class="career-img"><img src="assets/images/b6.jpg" title="Scrap Collector" alt="Scrap Collector" ></div>
            </div>            
            <div class="item">
              <div class="career-img"><img src="assets/images/b7.jpg" title="Scrap Collector" alt="Scrap Collector" ></div>
            </div>
          </div>
        </div>
      </section>
      <!-- about -->
      <div class="" id="about">
        <div class="container">
         <div class="title-div">
            <h3 class="tittle">
              <span>A</span>Bout Us
            </h3>
            <div class="tittle-style">
            </div>
          </div>
          <div class="row welcome-sub-wthree">
            <div class="col-md-5 banner_bottom_left">
             <p>We at Scrap Collector are providing you the oppurtunity to go green, via providing you with easy digitised access to recycle your Scrap, so that both we and you can create a greener, cleaner and beautiful future!
Recycle now with Scrap Collector.</p>
<p>Every day we encounter hundreds of recyclable items. By recycling properly, you help materials get to their next best use, which in turn saves tons upon tons of raw material, time, energy and expense.</p>
               
            </div>
            <!-- Stats-->
            <div class="col-md-7 stats-info-agile">
              <div class="w3l-right-stats">
                
              </div>
            </div>
            <!-- //Stats -->
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
      <!-- //about -->

       

       <!--FOOTER-->
      <?php
	  include('footer.php');
	  ?>
      <!--//FOOTER-->


    </div>

    <!--bootstrap-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/custom-owlcarousel.js"></script>
    <script defer src="assets/js/fontawesome-all.js"></script> 
    <script type="text/javascript" src="assets/js/modernizr-2.6.2.min.js"></script>
    <!-- stats numscroller-js-file -->
    <script src="assets/js/numscroller-1.0.js"></script>
    <!--style-->

    <script src="assets/js/style.js"></script>
    <script>
      $(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});
</script>

  </body>
 
</html>