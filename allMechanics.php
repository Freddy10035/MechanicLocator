<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Our Mechanics </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- <link rel="stylesheet" href="registration.css"> -->
    <link rel="stylesheet" href="css/allMech.css">
    <script src="js/rate.js"></script>

  </head>
  <body>
    <?php include 'php/header.php';
    
    function getAvgRating($mechId){
      $select = "SELECT AVG(rating) AS avg FROM ratings WHERE user_id = '$mechId'";
      $avgRating = mysqli_query($GLOBALS['connection'],$select);
      if($avgRating){
        while($row = mysqli_fetch_assoc($avgRating)){
        
        return round($row['avg']);

        }
        
      }
      else{
        echo "No rating".mysqli_error($GLOBALS['connection']);
      }
    }
    ?>

    <main>

    <section class="holder-sect">
      <h3>Mechanics on our platform</h3>

      <section class="flex-wrap mech-sect">

      <?php
        $getUsers = "SELECT * FROM users INNER JOIN map_details ON users.user_id = map_details.user_id WHERE is_mech = 'YES'";
        $results = mysqli_query($connection,$getUsers);
        // echo mysqli_num_rows($results);

            if(!$results){
               echo "msqli error" .mysqli_error($connection);
            }
              else{
                $row = mysqli_num_rows($results);

                if($row<1){
                  echo "No mechanics in database";
                }
                else{
                $count = 0;
                $k = 0;
                while($row = mysqli_fetch_assoc($results)){
                  // echo "<br>";
                  // echo $row['name'];
                  $emailArray[$count] = $row['email'];

                  if($count>0 && ($emailArray[$count] === $emailArray[$count-1])){
                     continue;
                  }
                  else{ 

                    echo '
                    <div class="detail-card">
                        <div class="flex-wrap">
                    ';
                    
                    // checking availability 
                    if($row['availability']=="YES"){
                      echo '
                      <div class="status-part">
                        <span class="status-type">Online</span>
                        <span class="status-dot"></span>
                       </div>
                      ';
                    }
                    else{ 
                      echo '
                      <div class="status-part">
                        <span class="status-type">Offline</span>
                        <span class="status-dot red-dot"></span>
                       </div>
                      ';
                    }

                   echo '
                        <img src="icons/mech-white.svg" alt="user" class="user-icon">
  
                        <article class="contact-dets">
                            <div class="username">
                                <strong>'.$row['name'].'</strong>
                              </div>
                              <div class="mech-loc flex-wrap">
                              <img src="icons/loc-dark.svg" alt="mech-location" class="icon loc-icon">
                              '.$row['town'].'
                              </div>
                            

                            <p class="rates rates'.$k.'">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="svg-inline--fa fa-star fa-w-18 icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#BDBDBD" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></xpath></svg>
                            </p>


                             <span class="">
                             <div class="mech-contact flex-wrap">
                             <a href="mailto:'.$row['email'].'">
                               <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                             </a>
                             <a href="https://wa.me/'.$row['phone'].'">
                               <img src="icons/whatsapp.svg" alt="whatsapp" class="icon">
                             </a>
                             <a href="tel:'.$row['phone'].'">
                               <img src="icons/call.svg" alt="call" class="icon">
                             </a>
                           </div>
                             </span>

                        </article>
  
                        </div>
                    </div>
                    ';


                    echo '
                        <script>
                        showColors("rates'.$k.'","'.getAvgRating($row['user_id']).'")
                        </script>
                    ';  
                  }
                  $k++;
                  $count++;

                 
                }
          }
        }
      ?>


          <!-- <article class="detail">
          <picture>
            <img src="Images/lady-mech.jpg" alt="mechanic" class="mech-avatar">
          </picture>
            <div class="input-grp">
              <div class="mech-name">Jane Doe</div>
              <div class="mech-loc flex-wrap">
                <img src="icons/loc-dark.svg" alt="mech-location" class="icon loc-icon">
                Lang'ata
              </div>
              <div class="mech-rating flex-wrap">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
              </div>
              <div class="mech-contact flex-wrap">
                <a href="#">
                  <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                </a>
                <a href="#">
                  <img src="icons/whatsapp.svg" alt="whatsapp" class="icon">
                </a>
                <a href="#">
                  <img src="icons/call.svg" alt="call" class="icon">
                </a>
              </div>
              </div>

          </article>

          <article class="detail">
          <picture>
            <img src="Images/mech1.jpg" alt="mechanic" class="mech-avatar">
          </picture>
            <div class="input-grp">
              <div class="mech-name">John Doe</div>
              <div class="mech-loc flex-wrap">
                <img src="icons/loc-dark.svg" alt="mech-location" class="icon loc-icon">
                Lang'ata
              </div>
              <div class="mech-rating flex-wrap">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
                <img src="icons/orange-Star.svg" alt="rating" class="icon rating-icon">
              </div>
              <div class="mech-contact flex-wrap">
                <a href="#">
                  <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                </a>
                <a href="#">
                  <img src="icons/whatsapp.svg" alt="whatsapp" class="icon">
                </a>
                <a href="#">
                  <img src="icons/call.svg" alt="call" class="icon">
                </a>
              </div>
              </div>

          </article> -->

      </section>


    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>


</html>
