<?php

include ("databaseconn.php");
$sql1 = "insert into product(image,name, brand, price) values ('".$_POST['image']."','".$_POST['name']."', '".$_POST['brand']."', '".$_POST['price']."')";

if ($conn->query($sql1) === TRUE)
{
    header('location:dashboard.php');
}
else
{
    echo "false";
}

?>