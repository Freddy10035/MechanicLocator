
<?php
//create db connection
session_start();
require 'connect.php';




if(isset($_POST['email']) && isset($_POST['pass'])){
    
$email = mysqli_escape_string($connection,$_POST['email']);
$pass = mysqli_escape_string($connection,$_POST['pass']);

//the username entered should match with the password
$selectUser = "SELECT * FROM users  WHERE email='$email' ";
$received = mysqli_query($connection,$selectUser);

//checking number of rows received
if(!$received){
    echo "msqli error" .mysqli_error($connection);
}
else{
    $row =mysqli_num_rows($received);
    $received = mysqli_fetch_assoc($received);
    if($row>0)
    {


            //php ftn for checking hashed passwords
                if(password_verify($pass,$received['password']))
                {

                    $_SESSION['name'] = $received['name'];
                    $_SESSION['user_id'] = $received['user_id'];
                    // echo $_SESSION['username'] ."welcome";
                   //delay the code below for 5 seconds
                    // sleep(5);

                    //when a mechanic logs in
                    if($received['is_mech']=="YES"){
                        $_SESSION['mechId'] = $received['user_id'];
                    }

                    //if its the admin logging in, take him to admin page
                    if($_SESSION['name'] == 'admin' && $pass=='admin1234'){
                        header("location: ../adminDashboard.php");
                    }
                    //go to landing page
                    else{
                        header("location: ../motorist-Homepage.php");
                    }
                     
                }
                else{
                    $_SESSION['errorNumber'] = 1;
                   $checkPassword = "<div style = 'color:red'> <strong>Check Your password </strong></div>";
                 
                   header("location:../login.php");

                }
            }
    else
         {
            $_SESSION['errorNumber'] = 3;
             $noUser = "<h1 style= 'color:red;'>User not registered</h1> <br> ";
            //  echo $noUser;
    // echo "hellow welcome";

             header("location:../login.php");

            }
        }


}

?>