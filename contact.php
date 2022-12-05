

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
    <link rel="stylesheet" href="css/contact.css">

<?php include 'php/header.php';?>

  </head>
  <body>
    <main>
    <section  class="contact">
        <div  class="content">
            <h2 >Contact Us</h2>
            <p>Do you have a question / comment / complaint? Send it to us and we'll get back to you as soon as possible.</p>
        </div>
        <div class="container">
            <div class="contactinfo">
                <div class="box">
                    <div class="icon"><img src="icons/map-loc.svg" alt="map icon" width="20px" height="20px"></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>5537 Masai Lodge<br>Ongata Rongai<br>88060</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><img src="icons/call-grey.svg" class="filter-icon" alt="phone icon" width="20px" height="20px"></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+254 723 805 386</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><img src="icons/email-svgrepo-com.svg" class="filter-icon" alt="email icon" width="20px" height="20px"></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>mechLocator@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactform">
                <form method="POST" action="../../back-end/contact.php">
                    <h2>Send us a Message</h2>
                    <div class="inputBox">
                        <input type="text" name="Username" required="required">
                        <span>Full name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="Useremail" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required" name="message"></textarea>
                        <span>Type your message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
    </main>
    <script src="js/nav.js"></script>
  </body>
</html>