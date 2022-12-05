<?php 

if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];

}


    //adding a vehicle
    if(isset($_POST['addCar'])){


        $num_plate = mysqli_escape_string($connection,$_POST["num_plate"]);
        $addCar = "INSERT INTO cars(user_id,num_plate) VALUES ('$user_id','$num_plate')";
  
        if(mysqli_query($connection,$addCar)){
            // echo "Car added successfully";
            unset($_POST['num_plate']);
        }
        else{
        echo "<h3 style='color:red'>Car number plate is already added</h3>".mysqli_error($connection);
  
        }
  
    }
?>
<aside class="car-pop flex-wrap">
      <div class="close-icon" onclick="closePop('car-pop')">X</div>
      <!-- <img src="icons/close.svg" alt="close window" class="icon"> -->

      <form action="" method="post">
        <div class="input-grp">
          <label for="num_plate">Enter car number plate</label>
          <input type="text" name="num_plate" required placeholder="e.g KAA 123A" class="input-elmt number-plate">
        </div>

        

        <div class="pwd-btns">
          <button type="submit" name="addCar" class="save-changes">Save Changes</button>
        <button type="reset" class="cancel-btn" onclick="closePop('car-pop')">Cancel</button>
        </div>

      </form>
    </aside>
    <div class="dark-overlay"></div>

    <script src="../js/profile.js"></script>