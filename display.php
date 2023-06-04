<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background: #D071f9;
            }
            table{
                background: white;
                text-align:center;
            }
            td{
                padding-left: 5px;
            }
            .update, .delete{
                background: green;
                color: white;
                border: 0;
                outline: none;
                border-radius: 3px;
                height: 23px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            }
            .delete{
                background: red;
            }
        </style>
    </head>
</html>


<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


$query = "SELECT * FROM FORM";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

// echo $total 

if (!$data) {
    die("Query failed: " . mysqli_error($conn));
    
}

if($total !=0){
    ?>
        <h2 align="center"> <mark> Display All Record </mark></h2>
        <center><table border="1" cellspacing="7" width="90%">
            <tr>
                <th width="5%">ID</th>
                <th width="10%">First Name</th>
                <th width="12%">Last Name</th>
                <th width="10%">Gender</th>
                <th width="10%">Email</th>
                <th width="15%">Phone</th>
                <th width="10%">Address</th>
                <th width="15%">Operations</th>
            </tr>

    <?php
            while ($result = mysqli_fetch_assoc($data)) {
               echo "<tr>
                    <td>".$result['id']."</td>
                    <td>".$result['fname']."</td>
                    <td>".$result['lname']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['address']."</td>
                    <td><a href='update_design.php?id=$result[id]'><input type='Submit' value='Update' class='update'></a>
                    <a href='delete.php?id=$result[id]'><input type='Submit' value='Delete' class='delete'  onclick= 'return checkdelete()'></a></td>   
                </tr>
                ";  
            }
}
            else{
            echo "No records found";
            }

    ?>
        </table>
        </center>

        <script> 
        function checkdelete()
        {
            return Confirm('Are you sure your want to delete this record?');
        }
        </script>

        