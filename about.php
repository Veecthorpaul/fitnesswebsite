<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
if(isset($_POST["Submit"])){
  $Fname    = $_POST["FirstName"];
  $Lname   = $_POST["LastName"];
  $Phone   = $_POST["Phone"];
  $Message   = $_POST["Message"];
  $Date = $_POST["Date"];
  $Time = $_POST["Time"];

  if(empty($Fname)||empty($Lname)||empty($Phone)||empty($Message)||empty($Date)||empty($Time)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("coaches.php");
  }elseif (strlen($Message)>500) {
    $_SESSION["ErrorMessage"]= "Message length should be less than 500 characters";
    Redirect_to("coaches.php");
  }else{
    // Query to insert comment in DB When everything is fine
    global $ConnectingDB;
    $sql  = "INSERT INTO appointments(date,time,fname,lname,phone,message)";
    $sql .= "VALUES(:date,:time,:fname,:lname,:phone,:message)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt -> bindValue(':date',$Date);
    $stmt -> bindValue(':time',$Time);
    $stmt -> bindValue(':fname',$Fname);
    $stmt -> bindValue(':lname',$Lname);
    $stmt -> bindValue(':phone',$Phone);
    $stmt -> bindValue(':message',$Message);
    $Execute = $stmt -> execute();
    //var_dump($Execute);
    if($Execute){
      $_SESSION["SuccessMessage"]="Appointment Booked Successfully";
      Redirect_to("coaches.php");
    }else {
      $_SESSION["ErrorMessage"]="Something went wrong. Try Again !";
      Redirect_to("coaches.php");
    }
  }
} //Ending of Submit Button If-Condition
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Strong | Fitness Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand py-2 px-4" href="index.php">strong</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="program.php" class="nav-link">Program</a></li>
	          <li class="nav-item"><a href="coaches.php" class="nav-link">Coaches</a></li>
	          <li class="nav-item"><a href="schedule.php" class="nav-link">Schedule</a></li>
	          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">About us</h1>
              <p>Our goal is to make health and fitness attainable, affordable and approachable.</p>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>About Us</span></p>
          </div>
        </div>
      </div>
    </section>

    
    <section class="ftco-section-services ftco-degree">
    	<div class="container">
    		<div class="row d-flex align-items-center">
    			<div class="col-xl-6 d-flex align-self-stretch">
    				<div class="align-self-stretch"><img src="images/about.jpg" class="img-fluid" alt=""></div>
    			</div>
    			<div class="col-xl-6 align-self-stretch pt-5">
    				<div class="row justify-content-center mb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<h3 class="subheading">Shape Your Body</h3>
		            <h2 class="mb-4">What We Do?</h2>
		          </div>
		        </div>
    				<div class="services d-flex ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-ruler"></span>
							</div>
							<div class="text ml-5">
								<h3>Analyze Your Goal</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							</div>
  					</div>
  					<div class="services d-flex ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-gym"></span>
							</div>
							<div class="text ml-5">
								<h3>Work Hard On It</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							</div>
  					</div>
  					<div class="services d-flex ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-tools-and-utensils"></span>
							</div>
							<div class="text ml-5">
								<h3>Improve Your Performance</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							</div>
  					</div>
  					<div class="services d-flex ftco-animate">
							<div class="icon d-flex justify-content-center align-items-center">
								<span class="flaticon-abs"></span>
							</div>
							<div class="text ml-5">
								<h3>Achieve Your Perfect Body</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							</div>
  					</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="5000">0</strong>
		              	<span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="4560">0</strong>
		              	<span>Perfect Bodies</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="570">0</strong>
		              	<span>Working Hours</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<strong class="number" data-number="900">0</strong>
		              	<span>Success Stories</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-about d-md-flex bg-light">
    	<div class="one-half img" style="background-image: url(images/about-2.jpg);">
    		<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
      		<span class="icon-play"></a>
      	</a>
    	</div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
        	<h3 class="subheading">About Strong</h3>
          <h2 class="mb-5">Welcome <br>To Our Gym</h2>
        </div>
        <div>
  				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
  			</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<h3 class="subheading">Shape Your Body</h3>
            <h2 class="mb-1">Our Coaches</h2>
          </div>
        </div>
    		<div class="row">
                <?php
           echo ErrorMessage();
           echo SuccessMessage();
           ?>
          <?php
          global $ConnectingDB;
          // SQL query when Searh button is active
          if(isset($_GET["SearchButton"])){
            $Search = $_GET["Search"];
            $sql = "SELECT * FROM trainers
            WHERE datetime LIKE :search
            OR title LIKE :search
            OR category LIKE :search
            OR post LIKE :search";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':search','%'.$Search.'%');
            $stmt->execute();
          }// Query When Pagination is Active i.e index.php?page=1

          // The default SQL query
          else{
            $sql  = "SELECT * FROM trainers ORDER BY id desc LIMIT 0,4";
            $stmt =$ConnectingDB->query($sql);
          }
          while ($DataRows = $stmt->fetch()) {
            $TrainerId          = $DataRows["id"];
            $Name        = $DataRows["name"];
            $Bio       = $DataRows["bio"];
            $Skills        = $DataRows["skills"];
            $Location           = $DataRows["location"];
            $Image           = $DataRows["image"];
            $Phone = $DataRows["phone"];
            $Position = $DataRows["position"];

          ?>
    			<div class="col-lg-3 col-md-4 col-sm-6 d-flex">
    				<div class="coach align-items-stretch">
                         <a href="trainer.php?id=<?php echo $TrainerId; ?>">
                         <img src="Uploads/<?php echo htmlentities($Image); ?>" class="block-20 img" href="trainer.php" /></a>
	    				<div class="text bg-white p-4 ftco-animate">
	    					<span class="subheading"><?php echo htmlentities($Position); ?></span>
	    					<h3><a href="trainer.php?id=<?php echo $TrainerId; ?>"><?php echo htmlentities($Name); ?></a></h3>
	    					<p><?php if (strlen($Bio)>100) { $Bio = substr($Bio,0,100)."...";} echo htmlentities($Bio); ?></p>
	    					<p></p>
	    				</div>
	    			</div>
    			</div>
    		
    			  <?php   } ?> 
    		</div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h3 class="subheading">Testimony</h3>
            <h2 class="mb-1">Successful Stories</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name">Gabby Smith</p>
		                    <span class="position">Customer</span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name">Floyd Weather</p>
		                    <span class="position">Customer</span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name">James Dee</p>
		                    <span class="position">Customer</span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name">Lance Roger</p>
		                    <span class="position">Customer</span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="text">
                    <p class="mb-4 pb-1 pl-4 line">Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>

                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="ml-4">
		                  	<p class="name">Kenny Bufer</p>
		                    <span class="position">Customer</span>
		                  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Strong Fitness is committed to facilitating the accessibility and usability of content and features on its website, including this blog.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://twitter.com/veecthorpaul"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://facebook.com/veecthorpaul"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://instagram.com/veecthorpaul"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"></h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style=""></a>
                <div class="text">
                  <h3 class="heading"><a href="#"></a></h3>
                  <div class="meta">
                  
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="program.php" class="py-2 d-block">Boost Your Body</a></li>
                <li><a href="program.php" class="py-2 d-block">Achieve Your Goal</a></li>
                <li><a href="program.php" class="py-2 d-block">Analyze Your Goal</a></li>
                <li><a href="program.php" class="py-2 d-block">Improve Your Performance</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">35, Oyedeji Street, Ajegunle, Apapa Lagos</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2347031952383</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">veecthorpaul@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://about.me/pauljoshua" target="_blank">Josh Paul Media</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>