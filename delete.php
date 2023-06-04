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
    

$id = $_GET['id'];

$query = "DELETE FROM FORM WHERE id= '$id'";
$data = mysqli_query($conn,$query);

if ($data)
{
    echo "<script>alert ('Record Deleted')</script>";
    ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />
    <?php
}
else{
    echo "<script>alert ('Failed to Delete')</script>";
    
}

?>