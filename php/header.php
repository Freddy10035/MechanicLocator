<!-- <link rel="icon" type="image/png" sizes="32x32" href="icons/new-logo.svg"> -->

<?php
//create db connection
session_start();
require 'connect.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
function checkNotification(){
    $connection = $GLOBALS['connection'];
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        // $selectRecord = "SELECT * FROM repairs WHERE mech_user_id = '$user_id'";
        // $selectCar = "SELECT * FROM cars WHERE user_id='$user_id'";

        $join = "SELECT * FROM repairs INNER JOIN cars ON cars.num_plate = repairs.num_plate  WHERE repairs.seen ='NO' AND mech_user_id>0 AND NOT mech_user_id='$user_id'";
        $joinResult = mysqli_query($connection,$join);
        if(!$joinResult){
            echo "msqli error" .mysqli_error($connection);
        }
        else{ 

            $row = mysqli_num_rows($joinResult);
                if($row > 0){
                    
                    while($row = mysqli_fetch_array($joinResult)){
                        if($row['user_id'] == $user_id){
                            //running
                            $_SESSION['notification'] = 1;
                        }
                        else{
                            $_SESSION['notification'] = 0;
                        }
                    }
                }
                else{
                    $_SESSION['notification'] = 0;
                }
        }
        

        // $received = mysqli_query($connection,$selectRecord);
        // if(!$received){
        //     echo "error".mysqli_error($connection);
        // }

        // echo "received";
        // $Row = mysqli_num_rows($received);
        // while($row = mysqli_fetch_assoc($received)){
        //     if($row['seen']=="NO"){
        //         $_SESSION['notification'] = 1;
        //     }
        //     else{
        //         $_SESSION['notification'] = 0;
        //     }
    
        // }
    }

}

function makeMechanic($user_id){
    $query = "UPDATE `users` SET `is_mech` = 'YES' WHERE `users`.`user_id` = '$user_id'";
    if(!mysqli_query($GLOBALS['connection'], $query)){
        echo "Error updating mechanic";
    }
}
// makeMechanic($user_id);
checkNotification();
// $_SESSION['notification'] = "0";

?>

        <nav class="nav">
        <a href="index.php" class="flex-wrap">
        <img src="icons/new-logo.svg" alt="logo" class="logo">
        <strong class="logo-text">mechLocator</strong>
</a>
        <button class="menu-btn">
            <img src="icons/menu.svg" alt="menu" class="nav-icon">
            Menu

            <!--    code for 3 lines in html -->
        </button>
        <div class="flex-wrap links">

        <a href="motorist-Homepage.php">Home</a>
            <?php
                if(isset($_SESSION['name']) && $_SESSION['name']=='admin'){
                    echo '
                    <a href="adminDashboard.php" class="dash-link">Dashboard</a>
                    ';
                }
            ?>
            <a href="mechNear.php">
                Mechanic near me
            </a>
            <a href="allMechanics.php">
            <!-- <img src="icons/repair.svg" class="icon white-icon" alt="mechanics">     -->
            Our Mechanics</a>
            <a href="repairHistory.php">My Repair History </a>
            <a href="contact.php">
            <!-- <img src="icons/call.svg" class="icon white-icon"alt="call">     -->
            Contact us </a>

            <?php
            if(isset($_SESSION['name'])){

                echo '
               
                <div class="admin-holder user-holder">
                <div class="has-drop">';

                if(isset($_SESSION['mechId'])){
                    $mech = "Mechanic";
                    echo '
                    <img src="icons/mech-white.svg" alt="user" class="icon mech-icon">'.$mech.' '.$_SESSION['name']. '
                    <img src="icons/arrow-white.svg" alt="d" class="down-arrow">
                    </div>';
                }
                else{
                    
                    echo '
                    <img src="icons/prof-pic.svg" alt="user" class="icon">'.$_SESSION['name']. '
                    <img src="icons/arrow-white.svg" alt="d" class="down-arrow">
                    </div>';
                }
                echo '

                <div class="admin-drop">

                <a href="userProfile.php" class="noti-holder prof-link flex-wrap">
                <img src="icons/user.svg" alt="user" class="icon">
                My profile
                 </a>
                 ';
                 if((isset($_SESSION['notification'])) && ($_SESSION['notification']==1)){
                    echo'
                        <a href="notification.php" class="noti-holder prof-link flex-wrap">
                        <img src="icons/notification.svg" alt="noti" class="icon">
                        Notifications
                        <span class="dot"></span>
                         </a>
                    ';
                 }
                 else{
                        echo '
                        <a href="notification.php" class="noti-holder prof-link flex-wrap">
                        <img src="icons/notification.svg" alt="noti" class="icon">
                        Notifications
                        </a>
                        ';
                 }
                 echo '
                <a href="addRepair.php"> 
                <img src="icons/repair-white.svg" alt="repair" class="icon">
                Add Repair</a>

                <a class="noti-holder flex-wrap" onclick="openPop(`car-pop`)">
                    <img src="icons/car-white.svg" alt="notification" class="icon">
                    Add a car
                </a>

                
                <form action="php/destroySession.php" method="post">
                    <input type="submit" value="Log out" class="log-out-btn">
                </form>
                </div>
            </div>
            ';
            }
            else{
                echo '
            <a href="login.php">Log in</a>
            <a href="signup.php">Sign up</a>

                
                ';
            }
            ?>
            

        </div>
        </nav>


    <!-- notification pop up   -->
    <?php 
     if(isset($_SESSION['notification']) && $_SESSION['notification']==1){
        echo'
        <a href="notification.php" class="flex-wrap">
        <p class="noti-pop">

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_imvcfu5s.json"  background="transparent"  speed="1"  style="width: 60px; height: 60px;"  loop  autoplay></lottie-player>
                New notification(s)
                </p>
        </a>
        ';
     }
    ?>
       

<?php include 'php/addCar.php'; ?>


        <!-- <script src="js/nav.js"></script> -->
        <script src="js/profile.js"></script>
