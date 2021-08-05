
<html lang="en">


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
              <div class="career-img"><img src="assets/images/b4.jpg" title="Scrapbin"></div>
            </div>
            <div class="item">
              <div class="career-img"><img src="assets/images/b6.jpg" title="Scrapbin"></div>
            </div>
            <div class="item">
              <div class="career-img"><img src="assets/images/b7.jpg" title="Scrapbin"></div>
            </div>
          </div>
        </div>
      </section>
      <!--SCRAP-->
      <section class="scrap-section">
        <div class="title-div">
           <h3 class="tittle">
             <span>R</span>ate Card
           </h3>
           <div class="tittle-style">
           </div>
         </div>

        <div class="row no-gutters rate-container">
        <div class="note">  <span>NOTE</span>
        <ul>
          <li>All item price may vary according to its market price.</li>
        </ul>
        </div>
        <div class="wrapdiv">
        <div class="container">
  <div class="row text-center btmpad">

    <?php
    include('connection.php');




    $query= "SELECT item_name,item_rate,item_image FROM tbl_items";

  $fetch=mysqli_query($conn,$query);


    while($row=mysqli_fetch_array($fetch))
    {
   echo'  <div class="col-md-3 col-sm-3 card-container">';
      echo'   <div class="card card-flip">';
        echo'   <div class="front card-block">';
          echo'   <div class="img-section">';
            echo'     <img src="uploads/'. $row[2].'" alt="item Icon"   class="img-fluid">';
            echo'     <h4>'. $row[0].'</h4>';
          echo'       <p class="price"><i class="fas fa-dollar-sign"></i><span class="ml-2">'. $row[1].'/KG</span></p>';
          echo'     </div>';
      echo'     </div>';
        echo'   <div class="back card-block">';
        echo'    <h4>'. $row[0].'</h4>';
          echo'  <p>This item price may vary according to its market price.</p>';
        echo'   </div>';
      echo'   </div>';
    echo'   </div>';
  }
  ?>

  </div>
</div>
          </div>

        </div>
      </section>
      <!--//SCRAP-->

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
      $(document).ready(function() {
  var front = document.getElementsByClassName("front");
  var back = document.getElementsByClassName("back");

  var highest = 0;
  var absoluteSide = "";

  for (var i = 0; i < front.length; i++) {
    if (front[i].offsetHeight > back[i].offsetHeight) {
      if (front[i].offsetHeight > highest) {
        highest = front[i].offsetHeight;
        absoluteSide = ".front";
      }
    } else if (back[i].offsetHeight > highest) {
      highest = back[i].offsetHeight;
      absoluteSide = ".back";
    }
  }
  $(".front").css("height", highest);
  $(".back").css("height", highest);
  $(absoluteSide).css("position", "absolute");
});

</script>

  </body>

<!-- Mirrored from scrapbin.in/rate-card.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 19:41:29 GMT -->
</html>
