<?php
include "databaseconn.php";

$sql = "delete from product WHERE id = '".$_POST['id']."'";
if ($conn->query($sql) === TRUE)
{
    header('location:dashboard.php');
}
else
{
    echo false;
}
?>