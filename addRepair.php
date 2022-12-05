<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding a repair record</title>
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/history.css">
    <link rel="stylesheet" href="css/addRepair.css">
</head>
<body>
<?php include 'php/header.php';
$actings = array();
$costings = array();
$i = 0;
function pushInto($act,$cost){
$actings[$GLOBALS['i']] = $act;
$costings[$GLOBALS['i']] = $cost;

$GLOBALS['i']++;
}
// if(isset($_POST['addRep'])){
//   $action = $_POST['activity'];
//   $cost = $_POST['cost'];
//   echo "entering";
//   pushInto($action,$cost);
// }


?>

<main>
 <section class="flex-wrap">
        
<!-- <button type="button" class="add-btn flex-wrap" onclick="openPop('record-pop')">
            <img src="icons/plus.svg" alt="add" class="icon">
            Add repair record
</button> -->


 </section>
  <form action="php/addRecord.php" method="post" class="form-large" onsubmit="readInput();">
    <h3>Form for recording repair record</h3>
    <p>(Please enter the details below.)</p>

    <div class="input-grp">
          <label for="num_plate">Enter car number plate*</label>
          
          <input type="text" list="plates" name="num_plate" required placeholder="e.g KAA 123A" class="input-elmt plate-input">
          <datalist id="plates">
            <?php
            // show owners cars 
               $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";

               $receivedCar = mysqli_query($connection,$selectCar);
           
               if(!$receivedCar){
                   echo "msqli error" .mysqli_error($connection);
                 }
                 else{ 
                   $row =mysqli_num_rows($receivedCar);
                   // $receivedCar = mysqli_fetch_assoc($receivedCar);
                   while($row = mysqli_fetch_array($receivedCar)){
                   
                    //this means that the user has a car
                    echo ' <option value="'.$row['num_plate'].'">';

                   }
                 }
            ?>
          </datalist>
     </div>

     <div class="input-grp">
       <label for="">Repair activities done*</label>
     <article class="repair-card">

     <div class="holder-tbl">
          <div class="header-row flex-wrap">
              <span class="act-header"><strong>Activity</strong></span>
             <span class="cost-header"><strong>Cost (Kshs)</strong></span>
           </div>

        <ol class="holder-list">
            <li> 
                <div class="data-row">
                    <input name="activity" type="text" id="" placeholder="e.g Wheel alignment" required  class="input-elmt act-input">
                    <input type="number" name="cost" required placeholder="e.g 3000" class="input-elmt cost-input">
                    
                  </div>
              </li>

              <!-- <li> 
                <div class="data-row">
                    <input name="activity"  type="text" id="" placeholder="e.g oil replacement" required  class="input-elmt act-input">
                    <input type="number" name="cost" required placeholder="e.g 3000" class="input-elmt cost-input">
                    
                  </div>
              </li> -->
        </ol>

        <input type="hidden" id="hiddenActivity" name="hiddenActivity" value="">
        <input type="hidden" id="hiddenCost" name="hiddenCost" value="">
        <input type="hidden" id="length" name="length" value="">
            
          <form action="" method="post">
          <button type="button" class="add-btn flex-wrap new-add" name="addRep" onclick="addInput()">
                <img src="icons/blue-plus.svg" alt="add" class="icon">
                Add repair record
            </button>
         
   

        </article>
     </div>

     <div class="input-grp">
       <button type="submit" name="addRecord" class="save-record" onclick="
      //  openPop('op-pop')
      readInput()
       ">
        <img src="icons/white-clipboard.svg" alt="save" class="icon">
       Save Record
       </button>
     </div>
  </form>

<!-- <aside class="record-pop">
      <div class="close-icon" onclick="closePop('record-pop')">X</div>

      <form action="" method="post">
        <div class="input-grp">
          <label for="num_plate">Enter car number plate*</label>
          <input type="text" name="num_plate" required placeholder="e.g KAA 123A" class="input-elmt">
        </div>

        <div class="input-grp">
          <label for="num_plate">Enter repair activity done</label>
          <textarea name="activity" id="" cols="15" rows="3" placeholder="e.g Wheel alignment" required  class="input-elmt"></textarea>
        </div>

        <div class="input-grp">
          <label for="num_plate">Enter cost of repair</label>
            <span>Kshs 
          <input type="number" name="cost" required placeholder="e.g 3000" class="input-elmt cost-input">
            </span>
        </div>
        

        <div class="pwd-btns">
          <button type="submit" name="addRecord" class="save-changes">Save repair record</button>
        <button type="reset" class="cancel-btn" onclick="closePop('record-pop')">Cancel</button>
        </div>

      </form>
</aside> -->


    <div class="dark-overlay"></div>


    <aside class="op-pop">
        <div class="close-icon" onclick="closePop('op-pop')">X</div>

        <img src="icons/green-success.svg" alt="success" class='success-svg'>
        <p class="op-p green-p">
          Operation was successful
        </p>
        <button class="okay" onclick="closePop('op-pop')">
          Okay
        </button>
    </aside>    

  </main>    
<script src="js/nav.js" defer></script>

<script src="js/repair.js" defer>
  // openPop('record-pop');
</script>
</body>
</html>

