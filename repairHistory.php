<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <meta name="keywords" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="">
   <meta name="author" content="">
    <title>Repair History </title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/history.css">
  </head>
  <body>
<?php include 'php/header.php';?>
    <main>



    <section class="holder-sect">
          <a href="addRepair.php" class="add-btn flex-wrap">
          <img src="icons/plus.svg" alt="add" class="icon">
            Add repair record
          </a>
    <?php
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['name'];
        }
        else{ 
            header('Location:login.php');
        }
      ?>
      <h4>
        (Records are sorted by car number plate and date)
      </h4>

      <section class="flex-wrap reverse">

                

                    <?php
                    $selectAllCars = "SELECT * FROM cars WHERE user_id = '$user_id'";
                    $TotalCost = 0;
                    $results = mysqli_query($connection,$selectAllCars);
                    if(!$results){
                      echo 'Error getting cars';
                    }
                    else{

                          $row = mysqli_num_rows($results);
                          if($row > 0){
                                while($row = mysqli_fetch_array($results)){
                                  $car_plate = $row['num_plate'];
                                  $selectRecord = "SELECT * FROM repairs WHERE num_plate = '$car_plate'";
                                  $received = mysqli_query($connection,$selectRecord);
                                  $repair_row = mysqli_num_rows($received);
                                  if($repair_row>0){

                                  
                                  echo '
                                  <article class="repair-card">

                                  <h4><span class="num-plate"> <img src="icons/car.svg" class="icon" alt="car">'.$car_plate.'</span></h4> 
                                        
                                          <div class="holder-tbl">
                                            <div class="header-row flex-wrap">
                                              <span class="act-header"><strong>Activity</strong></span>
                                              <span class="cost-header"><strong>Cost (Kshs)</strong></span>
                                            </div>

                                          <ol>
                                  ';
                                    $counter = 0;
                                    while($repair_row = mysqli_fetch_array($received)){ 
                                      // echo 'working';
                                      $activity = $repair_row['activity'];
                                      $cost = $repair_row['cost'];
                                      $date = $repair_row['date'];
                                      $id = $repair_row['repair_id'];


                                      
                                      $mechId = $repair_row['mech_user_id'];

                                      if($mechId > 0){
                                        $mechName = mysqli_query($connection,"SELECT * FROM users WHERE user_id = '$mechId' LIMIT 1");
                                      $mechName = mysqli_fetch_array($mechName);
                                     
                                        $mechanicName = $mechName['name'];
                                        $username = $mechanicName;
                                        // continue;
                                      }
                                      



                                      //showing that its seen  
                                      $setSeen = "UPDATE `repairs` SET `seen` = 'YES' WHERE `repairs`.`repair_id` = '$id'";
                                      if(!mysqli_query($connection,$setSeen)){ 
                                          echo "Error setting seen";
                                      }

                                      //create an array for storing the date 
                                      $dateArray[$counter] = $date;

                                      // separating by date 
                                      if($counter>0 && $dateArray[$counter-1] != $dateArray[$counter]){
                                        //card ends when dates are different
                                              
                                                  echo '
                                                  <div class="header-row flex-wrap">
                                                      <span class="total-header"><strong>Total</strong></span>
                                                      <span class="total-val"> '.$TotalCost.' </span>
                                                    </div>

                                                    <div class="row1 flex-wrap">
                                                    <div class="mech-name">Recorded by: '.$username.'</div>

                                                        <div class="date">'.$dateArray[$counter-1].'</div>
                                                      </div>

                                                  </div>
                                              </article>';
                                          $TotalCost = 0;


                                              //creating a new card
                                              echo '
                                              <article class="repair-card">
            
                                              <h4><span class="num-plate"> <img src="icons/car.svg" class="icon" alt="car">'.$car_plate.'</span></h4> 
                                                    
                                                      <div class="holder-tbl">
                                                        <div class="header-row flex-wrap">
                                                          <span class="act-header"><strong>Activity</strong></span>
                                                          <span class="cost-header"><strong>Cost (Kshs)</strong></span>
                                                        </div>
            
                                                      <ol>
                                              ';
                                              echo '
                                                <div class="data-row">
                                                <li> <div class="row-activity">'.$activity.'</div></li>
                                                  <div class="row-cost">'.$cost.'</div>
                                                </div>
                                            ';

                                        // break;
                                      $TotalCost = $TotalCost + $cost;

                                      }

                                      //if the dates are the same
                                      else{
                                            echo '
                                              <div class="data-row">
                                              <li> <div class="row-activity">'.$activity.'</div></li>
                                                <div class="row-cost">'.$cost.'</div>
                                              </div>
                                          ';
                                      $TotalCost = $TotalCost + $cost;


                                      }
                                      $counter++;                                
                                    }
                                    echo '
                                    <div class="header-row flex-wrap">
                                        <span class="total-header"><strong>Total</strong></span>
                                        <span class="total-val"> '.$TotalCost.' </span>
                                      </div>

                                      <div class="row1 flex-wrap">
                                      <div class="mech-name">Recorded by: '.$username.'</div>

                                          <div class="date">'.$date.'</div>
                                        </div>

                                    </div>
                                </article>
                                
                                    ';
                                    $TotalCost = 0;
                                  }
                                }
                          }
                          else{
                            // echo '       <h3><span class="num-plate">KAA 123A</span> Repair History</h3>        ';
                            echo  '<h3><span class="num-plate">No repair history added</span></h3>        ';
                          }
                        }        
 ?>


         
      </section>


    </main>
  </body>
  <script src="js/nav.js" charset="utf-8"></script>

</html>
