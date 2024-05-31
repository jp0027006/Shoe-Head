<?php
include("databaseconn.php");
include("index.php");

    $query = 'select * from user where email="'.$_POST['email'].'" and password="'.$_POST['password'].'"';    
    
    $exe = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($exe);
    if($result)
    {
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['login'] = 1;
        if ($_POST['email'] == "admin@gmail.com" || $_POST['password'] == "admin" ) {
        ?>
        <script>
            swal("Good job!", "Login successfully", "success");
            setTimeout(function(){ 
                window.location.href = "dashboard.php";
            }, 2000);
        </script>
        <?php
        }
        else {
            ?>
        <script>
            swal("Good job!", "Login successfully", "success");
            setTimeout(function(){ 
                window.location.href = "products.php";
            }, 2000);
        </script>
        <?php
        }
    }
    else
    { 
?>
    <script>
        swal("Bad Luck!", "Please enter valid email and password", "error");
        setTimeout(function(){ 
            window.location.href = "index.php";
        }, 2000);;
    </script>
<?php
    }	
?>