<?php include 'php/header.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="mechLocator | online mechanic locator">
   <meta name="author" content="paminus">
  <link rel="icon" type="image/png" sizes="32x32" href="icons/new-logo.svg">

    <title>mechLocator | Homepage</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <!--<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>-->

</head>
<body>
    <main class="home_main" id="top">
        <section class="landing-sect flex-wrap">
            <article class="sect-text">
                <h2 class="sect-title white-text">
                    What is mechLocator?
                </h2>
                <p class="white-text">
                    MechLocator is a website that connects <span>car owners</span> with <span>competent mechanics</span>.
                   It also helps keep track of your car's repair history.
                </p>
                <div class="landing-btns">
                <a href="signup.php">
                <button class="add-btn reg-btn">Register now for free</button>
                </a>
            </div>
            </article>
            <picture class="img-holder light-bg flex-wrap">
<!-- <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_gaqtay3b.json"  background="transparent"  speed="1" loop autoplay></lottie-player> -->
                <img src="Images/brown-mech.svg" alt="grow with us" class="landing-img">
            </picture>

            <div class="scroll">
                <div class="rectangle">
                    <img src="icons/arrow-down-white.svg" alt="down" class="icon arrow-icon">
                </div>
                <p>
                    Scroll down
                </p>
            </div>
        </section>

    <section class="mech-locate flex-wrap">
        <aside class="svg_holder">
                    <!-- <img src="Images/seo-edited.svg" alt="search for a mech" class="svg_illustration"> -->
                    <!-- <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_iyskibdv.json"  background="transparent"  speed="1"  style="width: ; height: ;"  loop  autoplay></lottie-player> -->
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_9ee7bmlt.json"  background="transparent"  speed="1" loop  autoplay></lottie-player>
        </aside>


        <article class="resources_text">
                    <h3 class="article-text">
                        Find a mechanic near you
                    </h3>
                    <p class="margin20">
                    No need to worry about finding professional mechanics. 
                    Check out mechanics who have being <span>rated</span> by other users.
                    </p>
                    <a href="mechNear.php" class="card">
                        Mechanics near me
                    </a>
                </article>
    </section>

    <section class="records-sect flex-wrap wrap-reverse">
        <article class="resources_text">
                    <h3 class="article-text">
                        Keep track of your car repairs
                    </h3>
                    <p class="margin20">
                       Track the repair history of your car and the expenses incurred. A mechanic can enter the repair activities done for your car on his/her device and you will 
                       receive a notification.
                    </p>
                    <a href="repairHistory.php" class="card">
                        View records
                    </a>
                </article>
    
        <aside class="svg_holder">
                    <img src="Images/notes.svg" alt="take note" class="svg_illustration">
        </aside>
    </section>

    <section class="mech-locate flex-wrap">
        <aside class="svg_holder">
                    <!-- <img src="Images/agree.svg" alt="search for a mech" class="svg_illustration"> -->
                    <img src="Images/mech1.jpg" alt="search for a mech" class="svg_illustration">
        </aside>

        <article class="resources_text">
                    <h3 class="article-text">
                        Apply to join us as a mechanic
                    </h3>
                    <p class="margin20">
                      Boost your customer reach by using our platform and increase your revenue. 
                      Application is <span>easy</span> and <span>free</span>.
                    </p>
                    <a href="mech-signup.php" class="card">
                        Apply now
                    </a>
        </article>
    </section>

    <section class="review swiper-container">
       <h3 class="review-title listing-title">
           Don't believe us, <span>trust</span>  what our customers have said.
       </h3>

       <div class="swiper-wrapper customer-sect">

           <!-- joy customer  -->
           <article class="swiper-slide cust-card">
               <div class="box-circle"> <div class="semi-circle"></div> </div>
               <img src="Images/mech1.jpg" alt="Joy landlady" class="cust-img">
               <div class="cust-desc">
                   <img src="icons/quote.svg" alt="quote" class="quote-svg">
                   <p class="cust-text">
                       Working with mechLocator has really helped market my engineering skills. My client base has greatly increased.
                   </p>
                   <div class="flex-wrap spaceBetween">
                       <aside class="stars flex-wrap">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">

                       </aside>
                       <p class="cust-name">
                           ~ John Simons
                           
                       </p>
                   </div>
               </div>
           </article>

            <!-- joy customer  -->
            <article class="swiper-slide cust-card">
               <div class="box-circle"> <div class="semi-circle"></div> </div>
               <img src="Images/lady1.jpg" alt="Joy landlady" class="cust-img">
               <div class="cust-desc">
                   <img src="icons/quote.svg" alt="quote" class="quote-svg">
                   <p class="cust-text">
                       mechLocator helped me find a mechanic when my car had broken down. Their services were impeccable.
                   </p>
                   <div class="flex-wrap spaceBetween">
                       <aside class="stars flex-wrap">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">

                       </aside>
                       <p class="cust-name">
                           ~ Joleen Joy
                       </p>
                   </div>
               </div>
           </article>

            <!-- joy customer  -->
            <article class="swiper-slide cust-card">
               <div class="box-circle"> <div class="semi-circle"></div> </div>
               <img src="Images/lady2.jpg" alt="Joy landlady" class="cust-img">
               <div class="cust-desc">
                   <img src="icons/quote.svg" alt="quote" class="quote-svg">
                   <p class="cust-text">
                       It is very easy to store and retrieve my vehicle's repair history. This has helped me keep track of my expenses.
                   </p>
                   <div class="flex-wrap spaceBetween">
                       <aside class="stars flex-wrap">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">
                           <img src="icons/orange-Star.svg" alt="star" class="star-icon">

                       </aside>
                       <p class="cust-name">
                           ~ Linet Juma
                       </p>
                   </div>
               </div>
           </article>
       </div>

   <div class="swiper-pagination"></div>

    </section>
    </main>

    <footer class="flex-wrap">
        <div class="bg-footer"></div>
    
    <aside class="quick-links">
        <h4>Quick Links</h4>
        <ul>
            <li><a href="#top">Home</a></li>
            <li><a href="mechNear.php">Mechanic near me</a></li>
            <li><a href="repairHistory.php">My repair records</a></li>
            <li><a href="addRepair.php">Add a repair record</a></li>
            <li><a href="mech-signup.php">Apply to be a mechanic</a></li>
            <li><a href="userProfile.php">My profile</a></li>
        </ul>
    </aside>
    <aside class="mission">
        <article class="mission-text">
            <h4>Vision</h4>
            To be a leading solution provider.
        </article>
        <article class="vision-text">
            <h4>Mission</h4>
            Connecting car owners to professional mechanics.
        </article>
    </aside>
    
    <aside class="media-handles">
      <h4>Connect with us on our social media accounts</h4>
      <aside class="socio-links">
         <a href="" class="flex-wrap"><img src="icons/twitter.svg" alt="twitter handle" class="icon">Twitter</a>
         <a href="" class="flex-wrap"><img src="icons/facebook.svg" alt="facebook page" class="icon"> Facebook</a>
         <a href="" class="flex-wrap"><img src="icons/IG.svg" alt="instagram" class="icon"> Instagram</a>
      </aside>

    
    </aside>

</footer>

</body>
<script src="js/nav.js" charset="utf-8"></script>
<script src="js/swiperJs/swiper.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="js/swiperJs/swiper.min.css">
<link rel="stylesheet" href="css/footer.css">
<script>
      let swiper = new Swiper('.review', {
   slidesPerView: 'auto',
   spaceBetween: 15,
   centeredSlides: false,
   watchSlidesVisibility: true,
   watchSlidesProgress: true,
   freeMode: true,
   pagination: {
    el: '.swiper-pagination',
    clickable: true,
   },
  });

</script>

<noscript>Your browser does not support JavaScript!</noscript>

</html>