<?php 
    include ("databaseconn.php");
    $query = 'select * from user where email="'.$_POST['email'].'"';
    $exe = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($exe);
    if ($result)
    {
        echo "false";
    }
    else {
        $sql = "insert into user(first_name, last_name, email, password,  mobile_number) values ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['ph']."')";
        if ($conn->query($sql) === TRUE)
        {
            header('location:products.php');
        }
        else
        {
            echo "false";
        }
    }
?>