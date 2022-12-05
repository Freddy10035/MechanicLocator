
<?php
//create db connection
require 'connect.php';


//sanitizing user input
$name = mysqli_escape_string($connection,$_POST["name"]);
$email = mysqli_escape_string($connection,$_POST["email"]);
$phone = mysqli_escape_string($connection,$_POST["phone"]);
// $carPlate = mysqli_escape_string($connection,$_POST["plate"]);

//hashing a password

$pass = mysqli_escape_string($connection,password_hash($_POST['pass'], PASSWORD_BCRYPT));

$insertor = "INSERT INTO users(name,email,phone, password) VALUES('$name','$email','$phone','$pass')";

//checking if user email already exists
$getRecords = "SELECT email FROM users WHERE Email ='$email'";

$receivedEmail = mysqli_query($connection,$getRecords);
if(mysqli_num_rows($receivedEmail)>0)
{
    echo "<h3 style='color:red'>This email is used by someone else. Try a different email kindly.</h3>";
}
else{
    if(mysqli_query($connection,$insertor)){

        echo "<h3 style='color:green'>User added successfully</h3>";
        header("location:../login.php");

    }
    else{
        echo "<h3 style='color:red'>User not added</h3>".mysqli_error($connection);
    }
}

?>