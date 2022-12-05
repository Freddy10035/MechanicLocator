<?php include 'php/connect.php';
  // session_start();
  $name = '';
  $email = '';
  $phone = '';
?>
<?php include 'php/header.php'; ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>User profile</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- <link rel="stylesheet" href="css/registration.css"> -->
    <link rel="stylesheet" href="css/profile.css">
  <!-- <script src="js/profile.js"></script> -->

  </head>
  <body>
    <?php
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

    //Fetching profile data
    if(isset($_SESSION['name'])){ 

      //getting user profile details from the db
      $user_id = $_SESSION['user_id'];
      $selectUser = "SELECT * FROM users  WHERE user_id='$user_id' ";

      $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";
      $receivedCar = mysqli_query($connection,$selectCar);

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
              $phone = $received['phone'];
              $oldPassword = $received['password'];
              $avaiStatus = $received['availability'];
            }
          }

        //getting car details from db
        if(!$receivedCar){
          echo "msqli error" .mysqli_error($connection);
        }
        else{ 
          $row =mysqli_num_rows($receivedCar);
          $receivedCar = mysqli_fetch_assoc($receivedCar);
          if($row>0)
          {
            $num_plate = $receivedCar['num_plate'];
          }
          else{ 
            $num_plate = 0;
          }
        }

            //changing the password
    
            if(isset($_POST['pass'])){

      $newPass = mysqli_escape_string($connection,password_hash($_POST['newPass'], PASSWORD_BCRYPT));

      $pass = mysqli_escape_string($connection,$_POST['pass']);
      // $newPass = $_POST['newPass'];

      if(password_verify($pass, $oldPassword)){
        $changePword = "UPDATE users SET password = '$newPass' WHERE user_id = '$user_id'";
        if(mysqli_query($connection,$changePword)){ 
          // echo "Updated password";
        }
        else{ 
          echo "Error updating password".mysqli_error($connection);
        }
      }
      else{ 
        echo "
        <script> 
        <alert> Wrong password</alert>
        </script>
        ";
      }
    }

    //changing all details
    if(isset($_POST['saveBtn'])){
      $name = mysqli_escape_string($connection,$_POST["name"]);
      $email = mysqli_escape_string($connection,$_POST["email"]);
      $phone = mysqli_escape_string($connection,$_POST["phone"]);

      $editDetail = "UPDATE users SET name = '$name', email = '$email' , phone = '$phone' WHERE user_id = '$user_id' ";
      if(mysqli_query($connection,$editDetail)){ 
        // echo "successfully updated details";
        // header("Location:userProfile.php");
        $_SESSION['name'] = $name;
      }
      else{
        echo "Error".mysqli_error($connection);
      }
    }

    }
    else{ 
      //if not logged in, go to login page
      header("location:login.php");
    }
    
     // deleting a user account 
     if(isset($_POST['del-account'])){ 
      $del = "DELETE FROM users WHERE user_id = '$user_id'";
      if(mysqli_query($connection,$del)){
        header("location:php/destroySession.php");
      }
      else{
        echo mysqli_error($connection);
      }
    }


    if(isset($_POST['locUpdates'])){
      $long = $_POST['long'];
      $lat = $_POST['lat'];
      
        $user_id = $_SESSION['user_id'];
        $insertor = "UPDATE map_details SET long_cor='$long',lat_cor='$lat' WHERE user_id = '$user_id')";
        if(mysqli_query($connection,$insertor)){ 
          // echo "Inserted successfully";
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

    if(isset($_POST['avai-btn'])){
      changeAvailability("NO",$user_id);
    }
    
    if(isset($_POST['on-btn'])){
      changeAvailability("YES",$user_id);
    }


    ?>

    <main>
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
  
  <h3>Hello👋!   <?php echo $_SESSION['name']; ?>  </h3>

  <?php
          if(isset($_SESSION['mechId'])){
            echo '
            <form method="post" action="" class="avai-form">
            ';
            if($avaiStatus =='YES'){
              echo ' <button type="submit" class="go-btn flex-wrap" name="avai-btn">
              <aside class="toggle-btn">
                  <aside class="white-circle" id="circle"></aside>
              </aside>
                Go offline</button>
                </form>
                ';
           }
           else{
              echo '
              <button type="submit" class="go-btn flex-wrap greenBorder" name="on-btn">
              <aside class="toggle-btn online-toggle">
                <aside class="white-circle online-circle" id="circle"></aside>
                </aside>
                Go Online</button>
                </form>

                ';
           }      
           
          }

          ?>
</aside>
    <section class="flex-wrap holder-sect">
      <section class="prof-sect">

        <h3>Personal details</h3>
        <h4>(Click on a detail to edit)</h4>

        <form action="" method="post">
          <article class="detail">
            <img src="icons/user-dark.svg" alt="Username" class="icon">
            <div class="input-grp">
              <label for="name">Name</label>
              <div class="">
              
              <input type="name" name="name" id="name" required value="<?php echo $name; ?>" class="input-elmt">
             
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('name')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>

          </article>

          <article class="detail">
            <img src="icons/email-svgrepo-com.svg" alt="email" class="icon">
            <div class="input-grp">
              <label for="email">Email</label>
              <div class="">
           
              <input type="email" name="email" id="email" required value="<?php echo $email; ?>" class="input-elmt">
            
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('email')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>

          </article>

         
          

          <article class="detail">
            <img src="icons/call-grey.svg" alt="Username" class="icon">
            <div class="input-grp">
              <label for="phone">Phone no:</label>
              <div class="">
              
              <input type="number" name="phone" id="phone" required value="<?php echo $phone; ?>" class="input-elmt">
              
                <button type="button" class="edit-btn flex-wrap" onclick="allowWrite('phone')">
                  Edit
                  <img src="icons/edit.svg" alt="edit" class="icon">
                </button>
              </div>
            </div>
          </article>

           <!-- updating location for a mechanic  -->
           <?php
          if(isset($_SESSION['mechId'])){
            echo '
            <article class="detail">
            <form action="" method="post" onsubmit="fetchLoc()">
                  <input type="hidden" name="long" id="long-cord" required>
                  <input type="hidden" name="lat" id="lat-cord" required>
                  <button class="current-loc-btn" type="submit" onclick="fetchLoc()" name="locUpdate">
                    <img src="icons/location.svg" alt="location" class="icon">
                    Update my location
                  </button>
              </form>
          </article>';

          }

          ?>

          <article class="detail">
            <button type="button" name="button" class="edit-btn edit-pwd flex-wrap" onclick="openPop('pwd-pop')">
              <img src="icons/password.svg" alt="password" class="icon">
              Edit password
              <!-- <img src="icons/edit.svg" alt="edit" class="icon"> -->
             </button>
          </article>

          <article class="detail flex-wrap">
           
              <button type="submit" name="saveBtn" class="save-changes">Save Changes</button>
             <a href="#"> <button class="cancel-btn">Default details</button> </a>
        
          </article>

        </form>

      </section>

      <!-- car details  -->
      <section class="prof-sect">

          <h3>Car details</h3>

          <div class="flex-wrap">
          <?php 
          if($num_plate ==0){
            echo "No car added yet";
          }
          else{
            $selectAllCar = "SELECT * FROM cars WHERE user_id = '$user_id'";
            $carsOwned = mysqli_query($connection,$selectAllCar);

            if(!$carsOwned){
          echo "msqli error" .mysqli_error($connection);
            }
            else{
              
             
              while($row1 = mysqli_fetch_array($carsOwned)){
                echo '
                <div class="car-detail">
                <article class="detail">
                  <img src="icons/car.svg" alt="Username" class="icon">
                  <div class="input-grp">
                    <label for="car_plate">Number plate:</label>
                    <div class="flex-wrap">
    
                      
                      <input type="text" name="car_plate" required value="' .$row1["num_plate"].'" class="input-elmt uppercase" readonly>
    
    
                      <button type="button" class="edit-btn flex-wrap">
                        Edit
                        <img src="icons/edit.svg" alt="edit" class="icon">
                      </button>
                    </div>
                  </div>
                </article>
    
                <a href="repairHistory.php">
                <button type="button" name="button" class="repair-btn flex-wrap">
                  <img src="icons/repair.svg" alt="repair" class="icon">
                  Repair History</button>
                </a>
              </div>
                ';
              }
            }
           
          }
          ?>
         </div>

          <button type="button" class="add-btn flex-wrap" onclick="openPop('car-pop')">
            <img src="icons/plus.svg" alt="add" class="icon">
            Add car
          </button>
        </section>
    </section>



    <form action="" method="post">
        <button type="submit" name="del-account" class="del-btn flex-wrap">
          <img src="icons/delete-red.svg" alt="add" class="icon">
          Delete account
        </button>
        
    </form>



    <div class="dark-overlay"></div>

    <aside class="pwd-pop flex-wrap">
      <div class="close-icon" onclick="closePop('pwd-pop')">X</div>
      <!-- <img src="icons/close.svg" alt="close window" class="icon"> -->

      <form action="" method="post">
        <div class="input-grp">
          <label for="pass">Enter old Password*</label>
          <input type="password" name="pass" required placeholder="******" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="pass">Enter new Password*</label>
          <input type="password" name="newPass" required placeholder="******" class="input-elmt">
        </div>

        <div class="pwd-btns">
          <button type="submit" class="save-changes">Save Changes</button>
        <button type="reset" class="cancel-btn" onclick="closePop('pwd-pop')">Cancel</button>
        </div>

      </form>
    </aside>


    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script src="js/map.js" charset="utf-8"></script>


</html>
