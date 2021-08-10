<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "patdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
        die("connection failed".$conn->connect_error);
    }
   

    if(isset($_POST['login']))
    {
        $emailid=$_POST["email"];
        $password=$_POST["password"];
        if($emailid=="admin1@vardhaman.org" && $password=="#edrkadmin")
        {
            header("location:admin.php");
        }
        else
        {
            $result = mysqli_query($conn,"SELECT * FROM reg WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)){
            $_SESSION['email']=$emailid;
            header("location:loginto.php");
        }
        else
        {
            header("location:index.php?error=invalid username and password");
        }
        }  
    }


?>