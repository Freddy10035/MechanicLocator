<?php 
include 'connect.php';
session_start();
  if(isset($_POST['saveReview'])){
      echo  isset($_SESSION['mechId']);
    echo "button clicked";
    $mechId = $_SESSION['mechId'];
   $rating = $_POST['hiddenRating'];
    $rating++;
    $message = mysqli_escape_string($connection,$_POST['message']);
    // $mechId = $GLOBALS['mechId']; 

    $insertRating = "INSERT INTO `ratings` (`user_id`, `rating`, `message`) VALUES  ('$mechId','$rating','$message')";
    if(!mysqli_query($connection,$insertRating)){
      echo "Error inserting rating";
      } 
    else{ 
      echo "Rating updated successfully";
      header("Location:../repairHistory.php");
    } 
  }

?>