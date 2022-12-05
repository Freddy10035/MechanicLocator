<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Motorist sign up</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/registration.css">
  </head>
  <body>
  <?php include 'php/header.php';?>

    <main>



    <div class="bgImage">

    </div>
    <section class="form-sect">

      <form class="register-form" action="php/signup.php" method="post">
        <h3>Register</h3>
        <p>Please enter the details below.</p>
        <div class="input-grp">
          <label for="name">Name*</label>
          <input type="text" name="name" required placeholder="e.g John Doe" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="email">Email*</label>
          <input type="email" name="email" required placeholder="e.g john@gmail.com" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="phone">Phone number*</label>
          <input type="number" name="phone" required placeholder="e.g 0712345678" class="input-elmt">
        </div>

        <!-- <div class="input-grp">
          <label for="plate">Car number plate*</label>
          <input type="text" name="plate" required placeholder="e.g KAA 123A" class="input-elmt">
        </div> -->

        <div class="input-grp">
          <label for="pass">Password*</label>
          <input type="Password" name="pass" required placeholder="******" class="input-elmt" id="pass">
        </div>

        <div class="input-grp">
          <label for="pass2">Confirm Password*</label>
          <input type="Password" name="pass2" required placeholder="******" class="input-elmt" id="con-pass">
        </div>


        <div class="input-grp">
          <button type="submit" name="register" class="reg-btn shadow-drop-2-tb" onclick="checker">Register</button>
        </div>

        <p>Already have an account?
          <a href="login.php">Log in</a>
        </p>
      </form>


    </section>

    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>
  <script>
     let firstPassword = document.querySelector("#pass");
        // document.getElementById("pass")

        let secondPassword = document.querySelector("#con-pass");

        // function checker(){} is same as line below

        const checker = ()=>{
            //if it does not match
            if(firstPassword.value!==secondPassword.value){
        // alert("Oops! Validation failed!");
    //  returnToPreviousPage();

    //animation
    secondPassword.classList.add("shake");
    secondPassword.value = "";
    secondPassword.setAttribute("placeholder","Password does not match. Please Try again");
    
    //prevent form from submitting
    event.preventDefault();
      return false;
            }

            else{
                // alert("Validations successful!");
        secondPassword.classList.remove("shake");
        return true;
            }
        }

        const removeShake = ()=>{
            if(secondPassword.classList.contains("shake")){
                secondPassword.classList.remove("shake");
                secondPassword.setAttribute("placeholder","****");
            }
        }
        secondPassword.addEventListener("click",removeShake());
  </script>
</html>
