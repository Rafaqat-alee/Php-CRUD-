<?php 

error_reporting(0);
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "responsiveform";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
    // echo "Connection ok";
}
else{
    echo "Connection failed".mysql_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="style.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">
                Registration Form
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $id; ?>" class="input" name="fname" required>
                </div>

                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>

                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" required>
                </div>

                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpassword" required>
                </div>

                <div class="input_field">
                    <label>Gender</label>
                    <select name="gender" class="selectbox" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="input_field">
                    <label>Email</label>
                    <input type="text" class="input" name="email" required>
                </div>

                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone" required>
                </div>

                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address" required></textarea>
                </div>

                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" >
                        <span class="checkmark" ></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>

            </div>
        </form>
    </div>
</body>
</html>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if($_POST['register']){
        $fname          = $_POST['fname'];
        $lname          = $_POST['lname'];
        $password       = $_POST['password'];
        $conpassword    = $_POST['conpassword'];
        $gender         = $_POST['gender'];
        $email          = $_POST['email'];
        $phone          = $_POST['phone'];
        $address        = $_POST['address'];
        
        $query = "INSERT INTO FORM (fname, lname, password, conpassword,gender, email, phone, address) VALUES('$fname','$lname','$password','$conpassword','$gender','$email','$phone','$address')";

        $data = mysqli_query($conn,$query);

        if($data){
            echo "Data Inserted into Database";
        }
        else{
            echo "Failed";
        }
    }
?>