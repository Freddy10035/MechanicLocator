<?php include 'php/header.php';?>
<?php
//check if its the admin 
if(isset($_SESSION['name'])){
      if($_SESSION['name'] != 'admin'){
        header('Location:motorist-homepage.php');
      }
}
  else{
    header('Location:motorist-homepage.php');
  }


           function getTotal($table){
            $getNumUsers = "SELECT * FROM `$table`";
            $totalUsers = mysqli_query($GLOBALS['connection'],$getNumUsers);
            $row = mysqli_num_rows($totalUsers);

                if($row<1){
                  echo "0";
                }
                else{
                echo $row;
                }
           }
          
           function getNumMechs($table){
            $getNumUsers = "SELECT * FROM `$table` WHERE is_mech = 'YES'";
            $totalUsers = mysqli_query($GLOBALS['connection'],$getNumUsers);
            $row = mysqli_num_rows($totalUsers);

                if($row<1){
                  echo "0";
                }
                else{
                echo $row;
                }
           }
                
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/adminPanel.css">
  </head>
  <body>


<main>
    <section class="menu-sect">
      <button class="menu-btn menu-dark">
          <img src="icons/menu-dark.svg" alt="menu" class="nav-icon">
          <span class="nav-text">Menu</span>
          <!--    code for 3 lines in html -->
      </button>
      <div class="menu-links">

                <div class="overview-btn  menu-option-btn activeBtn">
                  <img src="icons/overview-dark.svg" alt="overview" class="icon">
                  <span class="nav-text">Overview</span>
                </div>

                <div class="owners-btn menu-option-btn ">
                  <img src="icons/user-dark.svg" alt="owners" class="icon">
                <span class="nav-text">Car owners</span>
              </div>

                <div class="mechanics-btn menu-option-btn ">
                  <img src="icons/mechanic.svg" alt="Mechanics" class="icon">
                  <span class="nav-text">Mechanics</span>
                </div>

                <div class="cars-btn menu-option-btn ">
                    <img src="icons/car.svg" alt="Mechanics" class="icon">
                    <span class="nav-text">Cars</span>
                  </div>

                
      </div>
    </section>

    <!-- overview  -->
    <section class="view-details overview-details">
      <div class="detail-title">
        <img src="icons/overview-dark.svg" alt="overview" class="icon">
        Overview
      </div>

      <div class="detail-cards-holder flex-wrap">
        <!-- number of users  -->
        <div class="detail-card">
          <img src="icons/user-dark.svg" alt="users" class="icon detail-icon">
          <p class="num-value">
           <?php getTotal('users'); ?>
          </p>

          <p class="detail-desc">
            Total no. of users
          </p>
        </div>

        <!-- number of mechs  -->
        <div class="detail-card">
          <img src="icons/mechanic.svg" alt="mechanic" class="icon detail-icon">
          <p class="num-value">
          <?php 
          getNumMechs("users");
          ?>
          
          </p>

          <p class="detail-desc">
            Total no. of mechanics
          </p>
        </div>

        <!-- number of cars  -->
        <div class="detail-card">
          <img src="icons/car.svg" alt="cars" class="icon detail-icon">
          <p class="num-value">
          <?php getTotal('cars'); ?>
          </p>

          <p class="detail-desc">
            Total no. of cars
          </p>
        </div>

       
       

      </div>
    </section>


    <!-- owners -->
    <section class="view-details owners-details">
      <div class="detail-title">
        <img src="icons/user-dark.svg" alt="owners" class="icon">
        Car owners
      </div>

      <div class="detail-cards-holder flex-wrap">

      <?php
        $getUsers = "SELECT users.name, users.email, users.phone FROM users INNER JOIN cars ON users.user_id = cars.user_id";
        $results = mysqli_query($connection,$getUsers);
        // echo mysqli_num_rows($results);

            if(!$results){
               echo "msqli error" .mysqli_error($connection);
            }
              else{
                $row = mysqli_num_rows($results);

                if($row<1){
                  echo "No car owners in database";
                }
                else{
                $count = 0;
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
                            <img src="icons/user-holder.svg" alt="user" class="user-icon">
  
                        <article class="contact-dets">
                            <div class="username">
                                <strong>'.$row['name'].'</strong>
                              </div>
                              <div class="detail-option">
                                <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                                '.$row['email'].'
                              </div>
                              <a href="tel:'.$row['phone'].'" >
                              <div class="detail-option">
                                <img src="icons/call-grey.svg" alt="call" class="icon">
                                '.$row['phone'].'
                              </div>
                              </a>
                            
                        </article>
  
                        </div>
                    </div>
                    ';
                  }

                  $count++;

                 
                }
          }
        }
      ?>
      
        <!-- one owner -->
        

      </div>
      <button class="accept-btn print-btn">
        <img src="icons/white-print.svg" alt="print" class="icon">
        Print report
      </button>
    </section>

    <!-- mechs section -->
    <section class="view-details mech-details">
      <div class="detail-title">
        <img src="icons/mechanic.svg" alt="user" class="icon">
        Mechanics
      </div>

      <div class="detail-cards-holder flex-wrap">

      <?php
        $getUsers = "SELECT * FROM users WHERE is_mech = 'YES'";
        $results = mysqli_query($connection,$getUsers);
        // echo mysqli_num_rows($results);

            if(!$results){
               echo "msqli error" .mysqli_error($connection);
            }
              else{
                $row = mysqli_num_rows($results);

                if($row<1){
                  echo "No car owners in database";
                }
                else{
                $count = 0;
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
                            <img src="icons/mech-white.svg" alt="user" class="user-icon">
  
                        <article class="contact-dets">
                            <div class="username">
                                <strong>'.$row['name'].'</strong>
                              </div>
                              <div class="detail-option">
                                <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                                '.$row['email'].'
                              </div>
                              <a href="tel:'.$row['phone'].'" >
                              <div class="detail-option">
                                <img src="icons/call-grey.svg" alt="call" class="icon">
                                '.$row['phone'].'
                              </div>
                              </a>
                            
                        </article>
  
                        </div>
                    </div>
                    ';
                  }

                  $count++;

                 
                }
          }
        }
      ?>
      
         <!-- one mech -->
         <!-- <div class="detail-card">
            <div class="flex-wrap">
                <img src="icons/user-holder.svg" alt="user" class="user-icon">
    
            <article class="contact-dets">
                <div class="username">
                    <strong>George Doe</strong>
                  </div>
                  <div class="detail-option">
                    <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                    john@gmail.com
                  </div>
                  <div class="detail-option">
                    <img src="icons/call-grey.svg" alt="call" class="icon">
                    0712345678
                  </div>
                  <div class="detail-option">
                    <img src="icons/loc-dark.svg" alt="call" class="icon">
                    Karen
                  </div>
                  <div class="detail-option">
                    Rating:
                    <img src="icons/orange-Star.svg" alt="call" class="icon rating-icon">
                    <img src="icons/orange-Star.svg" alt="call" class="icon rating-icon">
                    <img src="icons/orange-Star.svg" alt="call" class="icon rating-icon">
                    <img src="icons/orange-Star.svg" alt="call" class="icon rating-icon">
                    <img src="icons/orange-Star.svg" alt="call" class="icon rating-icon">

                   
                  </div>
                  <div class="detail-option">
                    <button class="remove-btn">
                        <img src="icons/red-remove.svg" alt="remove" class="icon">
                    Remove mechanic status
                    </button>
                  </div>
            </article>
    
            </div>
              <div class="detail-option">
               <button class="del-btn">
                <img src="icons/delete-red.svg" alt="delete" class="icon">
                Delete user
                </button>
              </div>
    
            </div>
    
      </div> -->

      <button class="accept-btn print-btn">
        <img src="icons/white-print.svg" alt="print" class="icon">
        Print report
      </button>
    </section>

     <!-- cars section -->
     <section class="view-details cars-details">
        <div class="detail-title">
          <img src="icons/car.svg" alt="car" class="icon">
          Cars
        </div>
  
        <div class="detail-cards-holder flex-wrap">
  
          <?php 
              //getting cars 
              $selectAllCars = "SELECT * FROM `cars` INNER JOIN users ON cars.user_id = users.user_id ORDER BY name ASC";
              $results = mysqli_query($connection,$selectAllCars);
              // $row = mysqli_num_rows($results);
              if(!$results){
            echo "msqli error" .mysqli_error($connection);
              }
              else{
                $row = mysqli_num_rows($results);

                if($row<1){
                  echo "No cars in database";
                }
                else{
                while($row = mysqli_fetch_assoc($results)){
                  echo '
                  <div class="detail-card">
                    <div class="flex-wrap">
                     <img src="icons/car.svg" alt="user" class="icon">
  
                      <article class="contact-dets">
                          <div class="num-plate">
                              '.$row["num_plate"].'
                          </div>
                          
                          <div class="detail-option">
                            Owner: <strong class="own-name">'.$row['name'].'</strong>
                          </div>
                      </article>
                  </div>
          </div>  
                  ';
              }
                }
                
                }
          ?>
          <!-- car -->
            
        </div>
  
        </div>
        <button class="accept-btn print-btn">
        <img src="icons/white-print.svg" alt="print" class="icon">
        Print report
      </button>
      </section>

       <!-- applications section -->
    
       <!-- <section class="view-details applications-details">
        <div class="detail-title">
          <img src="icons/application.svg" alt="user" class="icon">
          Applications
        </div>
  
        <div class="detail-cards-holder flex-wrap">
  
               
                  <div class="detail-card">
                    <div class="flex-wrap">
                        <img src="icons/user-holder.svg" alt="user" class="user-icon">
            
                    <article class="contact-dets">
                        <div class="username">
                            <strong>George Doe</strong>
                          </div>
                          <div class="detail-option">
                            <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
                            john@gmail.com
                          </div>
                          <div class="detail-option">
                            <img src="icons/call-grey.svg" alt="call" class="icon">
                            0712345678
                          </div>
                          <div class="detail-option">
                            <button class="edit-btn">
                                <img src="icons/qualification.svg" alt="remove" class="icon">
                            Open qualification
                            </button>
                          </div>
                    </article>
            
                    </div>
                      <div class="detail-option around">
                       <button class="accept-btn">
                           Accept
                       </button>
                       <button class="del-btn">
                           Decline
                       </button>
                      </div>
            
                    </div>
        </div>
  
      </section> -->




    <!-- <form action="" class="register-form">
        <div class="close-icon close-btn">
            X
        </div>
        <div class="form-elements">
            <h3>Add a question</h3>
        <p>Please enter the details below.</p>
        <div class="input-grp grid">
          <label for="title" class="quesTitle">Question title*</label>
         <textarea name="title" id="" cols="24" rows="3" placeholder="Type title here.."></textarea>
        </div>
         <label for="" class="tick">
             ( Tick the correct answer )
         </label>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type first choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type second choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type third choice" class="input-elmt">
         </div>

         <div class="input-grp">
            <div class="square"></div>
           <input type="text" name="name" required placeholder="Type four choice" class="input-elmt">
         </div>

        </div>
         <div class="detail-option around">
            <button class="edit-btn">
                Save Question
            </button>
            <div class="cancel-btn">
                Cancel
            </div>
           </div>
    </form> -->

      </section>

<div class="dark-overlay"></div>
  </main>
  <script src="http://localhost/mechLocator/js/admin.js"></script>
  <!-- <script src="js/admin.js"></script> -->
</body>
</html>