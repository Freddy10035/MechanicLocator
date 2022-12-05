<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>mechLocator | sign up</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/registration.css">
  </head>
  <body>
  <?php include 'php/header.php';


  if(isset($_POST['register'])){ 
    if(isset($_SESSION['user_id'])){
      $location = mysqli_escape_string($connection,$_POST["location"]);

      $long = $_POST['long'];
      $lat = $_POST['lat'];
      
      if($long == '' || $lat == ''){ 
        $_SESSION['err-msg'] = "Could not get location";
        header('Location: errorPage.php');
      }
        $user_id = $_SESSION['user_id'];
        makeMechanic($user_id);
      $_SESSION['mechId'] = $user_id;
        $insertor = "INSERT INTO map_details (user_id,long_cor,lat_cor,town) VALUES ('$user_id','$lat','$long','$location')";
        if(mysqli_query($connection,$insertor)){ 
          echo "Inserted successfully";
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
    else{
      header('Location:login.php');
    }
  }

  
  
  ?>


    <main>

    <section class="form-sect wrap">
      <img src="icons/Welcome.svg" alt="welcome" class="welcome-svg">

      <form class="register-form" action="" method="post" onsubmit="fetchLoc()">
        <h3>Apply as a mechanic</h3>
        <p>Please enter the details below.</p>
        <p id="demo"></p>
       
        <div class="input-grp">
          <label for="location" class="loc" data-tooltip="(We need your location to find customers near you.)">Your location<img src="icons/question-dark.svg" alt="ask" class="icon"></label>
          <input type="text" name="location" required placeholder="e.g Rongai" class="input-elmt">
         
      
          <input type="hidden" name="long" id="long-cord" required>
          <input type="hidden" name="lat" id="lat-cord" required>
          <!-- <button class="add-btn current-loc-btn" type="button" onclick="fetchLoc()">
            <img src="icons/location.svg" alt="location" class="icon">
            Use current location
          </button> -->
          

         

          <!-- <p>or</p>

          <button class="add-btn current-loc-btn loc-map" type="submit">
            <img src="icons/map-loc.svg" alt="location" class="icon">
            Choose location on map
          </button> -->

        </div>

        <div class="input-grp">
        <!-- <p>
          Kindly allow mechLocator to access your location. We need it to find customers near you.
          </p> -->
        </div>
        <div class="input-grp">
          <button type="submit" name="register" class="reg-btn shadow-drop-2-tb" onclick="fetchLoc()">Apply now</button>
        </div>

      </form>


    </section>

    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script src="js/map.js" charset="utf-8"></script>


</html>
