<?php
    session_start();
    if(isset($_SESSION['name'])){

        unset($_SESSION['name']);
        session_destroy();

    }

    session_abort();

    header("location: ../motorist-Homepage.php");
?>
