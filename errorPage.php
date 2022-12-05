<?php include 'php/header.php';
$msg = '';
if(isset($_SESSION['err-msg'])){ 
    $msg = $_SESSION['err-msg'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mechLocator | Error</title>
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/error.css">

</head>
<body>
    <main>

            <img src="Images/error-robot.svg" alt="Error" class="error-img">
            <h3 class="error-title">Error occured</h3>
            <article>
              <?php
                echo $msg;
              ?>
            </article>
    </main>
</body>
</html>