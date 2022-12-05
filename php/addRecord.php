<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding record</title>
    <link rel="stylesheet" href="../css/addRepair.css">

</head>
<body>


<?php
include "connect.php";
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else{ 
    header('Location:../login.php');
}



if(isset($_POST['addRecord'])){
    $num_plate = mysqli_escape_string($connection,$_POST["num_plate"]);


    // if a mechanic is using the system 
    if(isset($_SESSION['mechId'])){
        $mech_user_id = $_SESSION['mechId'];
        // echo "I am a mechanic";
        $actArray =($_POST['hiddenActivity']);
        $costArray = ($_POST['hiddenCost']);
        $length = ($_POST['length']);
    
        $actArray = explode(",",$actArray);
        $costArray = explode(",",$costArray);


        $length = $length/2;
        // echo "length" .$length;

        for($i=$length;$i>-1;$i--){

            if($i > 0){
                // echo "<br>";
                // echo $actArray[$i] . "=" .$costArray[$i];
                // echo "<br>";
                enter($actArray[$i],$costArray[$i],$mech_user_id);
            }                   
        }
    }

    else{ 

    //other users can only enter details about their own cars
    $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";

    $receivedCar = mysqli_query($connection,$selectCar);
    $carsEntered = 0;
    if(!$receivedCar){
        echo "msqli error" .mysqli_error($connection);
      }
      else{ 
        $row =mysqli_num_rows($receivedCar);
        // $receivedCar = mysqli_fetch_assoc($receivedCar);
        while($row = mysqli_fetch_array($receivedCar)){
        {
         //this means that the user has a car
                if($row['num_plate'] == $num_plate){ 
                   
                       $carsEntered++;
                        $actArray =($_POST['hiddenActivity']);
                        $costArray = ($_POST['hiddenCost']);
                        $length = ($_POST['length']);
                    
                        $actArray = explode(",",$actArray);
                        $costArray = explode(",",$costArray);


                        $length = $length/2;
                        // echo "length" .$length;

                        for($i=$length;$i>-1;$i--){

                            if($i > 0){
                                // echo "<br>";
                                // echo $actArray[$i] . "=" .$costArray[$i];
                                // echo "<br>";
                                enter($actArray[$i],$costArray[$i],0);
                            }                   
                        }
                }
                    
                }
                
        }
       
      }
    }


      //when no value is stored
      if($carsEntered==0){
          
          echo "No repair added".mysqli_error($connection);
        //       echo '
        //       <aside class="op-pop">
        //       <div class="close-icon" onclick="closePop(`op-pop`)">X</div>
      
        //       <img src="icons/green-success.svg" alt="success" class="success-svg">
        //       <p class="op-p green-p">
        //         Operation not successful
        //       </p>
        //       <button class="okay" onclick="closePop(`op-pop`)">
        //         Okay
        //       </button>
        //   </aside>
        //       ';
          
      }
   
    }


    // array_map(function($act,$cost){
    //     // echo "$act costs $cost\n";
    //     enter($act,$cost);
    // },$actArray, $costArray);

 
//    foreach($actArray as $item){
//        echo "<br>".$item;
//        echo "The end";
//    }

//    echo "<br> count: ";
//    echo count($actArray);
   

  

else{ 
    echo "button not clicked";
}

// function for entering records  
function enter($acti,$costi,$mech_user_id){ 
    // $user_id = $_SESSION['user_id'];

    // $num_plate = mysqli_escape_string($GLOBALS['$connection'],$_POST["num_plate"]);
    $num_plate1 = $GLOBALS['num_plate'];
    // $user_id = $GLOBALS['user_id'];

    $addRecord = "INSERT INTO repairs(num_plate,activity,cost,mech_user_id) VALUES ('$num_plate1','$acti','$costi','$mech_user_id')";
   
    if(mysqli_query($GLOBALS['connection'],$addRecord)){ 
        // echo "Successfully added repair";
    //     echo '
    //     <aside class="op-pop">
    //     <div class="close-icon" onclick="closePop(`op-pop`)">X</div>

    //     <img src="icons/green-success.svg" alt="success" class="success-svg">
    //     <p class="op-p green-p">
    //       Operation was successful
    //     </p>
    //     <button class="okay" onclick="closePop(`op-pop`)">
    //       Okay
    //     </button>
    // </aside>
    //     ';
    header("location:../motorist-Homepage.php");
    }
    else{ 
        echo "error";
    }
}

?>


    
<script src="../js/repair.js" defer></script>
</body>
</html>