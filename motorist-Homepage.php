<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <meta charset="utf-8">
    <title>MechLocator</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">  
    <link rel="stylesheet" href="css/profile.css">
    <!-- <script src="https://kit.fontawesome.com/e5226850c4.js" crossorigin="anonymous"></script> -->

  </head>
  <body>
    
<?php include 'php/header.php';
function changeAvailability($status,$user_id) {
  $connection = $GLOBALS['connection'];
  $changeStatus = "UPDATE users SET availability = '$status' WHERE user_id = '$user_id'";
  if(mysqli_query($connection,$changeStatus)){
    echo '
  
      <aside class="op-pop">
        <div class="close-icon" onclick="closePop(`op-pop`)">X</div>

        <img src="icons/green-success.svg" alt="success" class="success-svg">
        <p class="op-p green-p">
          Operation was successful
        </p>
        <button class="okay" onclick="closePop(`op-pop`)">
          Okay
        </button>
    </aside> 
    <script type="text/javascript">
      openPop(`op-pop`);
    </script>
  ';
    }
    else{ 
      echo "error ".mysqli_error($connection);
    }
  
}

if(!isset($_SESSION['name'])){
  header("Location:index.php");
}

else{
    //getting user profile details from the db
    $user_id = $_SESSION['user_id'];
    $selectUser = "SELECT * FROM users  WHERE user_id='$user_id' ";

    //  $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";
    //  $receivedCar = mysqli_query($connection,$selectCar);

    $received = mysqli_query($connection,$selectUser);

      //getting person details from the db
        if(!$received){
          echo "msqli error" .mysqli_error($connection);
        }
        else{ 
          $row =mysqli_num_rows($received);
          $received = mysqli_fetch_assoc($received);
          if($row>0)
          {
            $name = $received['name'];
            $email = $received['email'];
            $avaiStatus = $received['availability'];
          }
          //  else{ echo "no row";}
        }
}

if(isset($_POST['avai-btn'])){
  changeAvailability("NO",$user_id);
}

if(isset($_POST['on-btn'])){
  changeAvailability("YES",$user_id);
}
?>


    <main>


       <section class="landing">
      <aside class="bgPattern circleBg">
        <?php
        if(isset($_SESSION['mechId'])){
          echo '
        <img src="icons/mech-notebook.svg" class="user-img mech-img" alt="image">
          
          ';
        }
        else{
          echo'
        <img src="icons/user.svg" class="user-img" alt="image">
          
          ';
        }
        ?>
        
        <h3>Hello👋!   <?php echo $name; ?>  </h3>

        <?php
          // if(isset($_SESSION['mechId'])){
          //   echo '
          //   <form method="post" action="" class="avai-form">
          //   ';
          //  if($avaiStatus =='YES'){
          //     echo ' <button type="submit" class="go-btn flex-wrap" name="avai-btn">
          //     <aside class="toggle-btn">
          //         <aside class="white-circle" id="circle"></aside>
          //     </aside>
          //       Go offline</button>
          //       </form>
          //       ';
          //  }
          //  else{
          //     echo '
          //     <button type="submit" class="go-btn flex-wrap greenBorder" name="on-btn">
          //     <aside class="toggle-btn online-toggle">
          //       <aside class="white-circle online-circle" id="circle"></aside>
          //       </aside>
          //       Go Online</button>
          //       </form>

          //       ';
          //  }
        
           
          // }

        ?>
      </aside>
           <!-- <article class="mid-landing">
              <article class="search-holder">
                  <input type="text" name="search" id="" placeholder="Search mechanic by location.." class="searchType">
                  <img src="icons/search-icon.svg" alt="search" class="icon search-icon">
               </article>
          </article> -->
<!-- 
          <div class="swiper-container">

             <section class="swiper-wrapper swiper-wrapper-new houses-sect">


               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>

               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>
               <div class="swiper-slide" >
                 <img src="Images/broken-car.jpg" alt="broken" class="slide-img">
               </div>

             </section>

       <div class="swiper-button-next swiper-button-next-img"></div>
       <div class="swiper-button-prev swiper-button-prev-img"></div>
       <div class="swiper-pagination swiper-pagination-new"></div>

     </div> -->

        </section>

        <section class="flex-wrap card-sect minh">
          <a href="repairHistory.php">
            <article class="card">
              <img src="icons/repair.svg" alt="repair history" class="card-icon">
              <p>My Repair History</p>
            </article>
          </a>

          <a href="allMechanics.php">
              <article class="card">
                <img src="icons/tools.svg" alt="repair history" class="card-icon">
                <p>Our Mechanics</p>
              </article>
          </a>

          <button class="card" onclick="openPop('car-pop')">
          <img src="icons/blue-plus.svg" alt="add" class="icon">
            Add new Car
          </button>

          <a href="addRepair.php" class="add-btn flex-wrap">
          <img src="icons/plus.svg" alt="add" class="icon">
            Add repair record
          </a>

                <!-- button for locating a mech  -->
        <a href="mechNear.php">
        <button type="button" name="button" class="loc-btn flex-wrap">
        <img src="icons/location.svg" alt="locate" class="icon"> Mechanic near me
      </button>
        </a>
      
<?php
    if(!isset($_SESSION['mechId'])){
        echo '
        <a href="mech-signup.php">
        <button class="add-btn">
        Apply to be a mechanic
        </button>
      </a>
        ';

    }
  ?>
        </section>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script src="js/swiperJs/swiper.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="js/swiperJs/swiper.min.css">

  <script type="text/javascript">
  let swiperNew = new Swiper('.swiper-container', {
 slidesPerView: 'auto',
 spaceBetween: 15,
 // centeredSlides: true,
 watchSlidesVisibility: true,
 watchSlidesProgress: true,
 freeMode: false,
 pagination: {
  el: '.swiper-pagination-new',
  clickable: true,
 },
 loop:false,
 navigation: {
  nextEl: '.swiper-button-next-img',
  prevEl: '.swiper-button-prev-img',
 },
});

// toggleBtn = document.querySelector(".toggle-btn");
// circle = document.querySelector(".white-circle");
// toggleBtn.addEventListener('click',()=>{
//     toggleBtn.classList.toggle("green");
//     circle.classList.toggle("move");
//     circle.classList.toggle("dark");
// })
  </script>
</html>
