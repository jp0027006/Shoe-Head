<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e53af926d.js"></script><script src="vendor/global/global.min.js"></script>
    <title>Product Page</title>
</head>
<?php
	include "databaseconn.php";
	$query1 = "select * from product";
	$result = mysqli_query($conn, $query1);
	$arr_product = [];
?>
<body>
<nav class="nav1 navbar navbar-light">
  <div class="container-fluid">
	<div class="div1">
  		<img src="logo.png" style="height: 12vh;" alt="logo" >
	</div>
		<span class="h1 fw-bold mb-0" style="margin-left: -74%;">Shoe Head</span>
    <a class="btn btn-danger add1" href="logout_process.php">
		<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
		<polyline points="16 17 21 12 16 7"></polyline>
		<line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span class="ml-2">Logout</span></a>
  </div>
</nav>

<section style="background-color: #9A616D;">
    <div class="container container1 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div>
                <div class="card" style="margin-left: -40px; width: 106%;">
                <?php 
                if($result->num_rows > 0)
                    {
                        $arr_product = $result->fetch_all(MYSQLI_ASSOC);
                ?>
                <div class="product-section" class="section-p1">
                    <div class="pro-collection">
                        <?php if(!empty($arr_product)) { ?>
                        <?php foreach($arr_product as $r) { ?>
                        <div class="product-cart">
                            <img src=<?php echo "images/products/".$r['image'] ?> alt="product image"/>
                            <span><?php echo $r['brand'] ?></span>
                            <h4><?php echo $r['name'] ?></h4>
                            <h4 class="price"><?php echo $r['price'] ?></h4>
                            <a href="#"><i class="fa-solid fa-cart-shopping buy-icon"></i></a>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <?php
                    }else{
                        ?><th>No Details Avilable !!!</th><?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>