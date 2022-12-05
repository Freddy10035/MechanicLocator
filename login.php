<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>mechLocator | Log in</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/registration.css">
  </head>
  <body>
  <?php include 'php/header.php';
    function checkError() {
      if(isset($_SESSION['errorNumber'])){
        if($_SESSION['errorNumber'] == 1){
          $errMsg = "<strong style = 'color:var(--red);'>Check Your password </strong>";
        }
        else{ 
          $errMsg = "<strong style= 'color:var(--red);'>User not registered</strong> <br> ";
        }
        echo $errMsg;
      }
    }

  ?>

    <main>



    <div class="bgImage">

    </div>
    <section class="form-sect">

      <form class="login-form" action="php/login.php" method="post">
        <h3>Log in</h3>
        <p>Please enter the details below.</p>

      <?php checkError();?>

        <div class="input-grp">
          <label for="email">Email*</label>
          <input type="email" name="email" required placeholder="e.g john@gmail.com" class="input-elmt">
        </div>


        <div class="input-grp">
          <label for="pass">Password*</label>
          <input type="password" name="pass" required placeholder="******" class="input-elmt">
        </div>



        <div class="input-grp">
          <button type="submit" name="login" class="reg-btn shadow-drop-2-tb">Log in</button>
        </div>

        <p>Join us today for free.
          <a href="signup.php">Register now</a>
        </p>
      </form>


    </section>

    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>

</html>
