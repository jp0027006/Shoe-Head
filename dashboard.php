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

    session_start();
    if(!isset($_SESSION["login"]))
    {
        header("location:index.php");
    }
    else
    {
        $email = $_SESSION['email'];
    }
?>
<body>
<nav class="nav1 navbar navbar-light">
  <div class="container-fluid">
	<div class="div1">
  		<img src="logo.png" style="height: 12vh;" alt="logo" >
	</div>
		<span class="h1 fw-bold mb-0" style="margin-left: -74%;">Shoe Head</span><?php echo $_SESSION['email'];?>
    <a class="btn btn-danger add1" href="logout_process.php">
		<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
		<polyline points="16 17 21 12 16 7"></polyline>
		<line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span class="ml-2">Logout</span></a>
  </div>
</nav>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="product_delete.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
					<input type="hidden" name="id" id="id">
                    <center>Are you sure ?</center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger light delete-data">Delete</button>
                </div>
			</form>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="product-form" name="product-form" action="product_upload.php" method="POST" onsubmit="return validateForm()">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product Detalis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
						<label class="col-lg-4 col-form-label" for="val-file">Product Image
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group col-lg-6" style="flex: 0 0 65%; max-width: 65%;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                            </div>
                        </div>
                        <label class="col-lg-4 col-form-label" for="name">Product name
                            <span class="text-danger" name="text-danger1">*</span>
                        </label>
                        <div class="col-lg-6 in">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name...">
							<p class="text-danger" id="error_name"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="brand">Poduct Brand
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6 in">
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand...">
							<p class="text-danger" id="error_brand"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="price">Product Price
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-6 in">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price...">
							<p class="text-danger" id="error_price"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="validateForm()">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<section style="height: fit-content; background-color: #9A616D;">
  <div class="container container1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
					<div class="card-header">
						<h4 class="card-title">Manage Product</h4>
						<a class="btn btn-primary add" href="#" data-bs-toggle="modal" data-bs-target="#addModal">
							<span class="btn-icon-left text"><i class="fa fa-plus color-info"></i></span> Add Product
						</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" style="min-width: 845px">
								<?php 
								if($result->num_rows > 0)
									{
										$arr_product = $result->fetch_all(MYSQLI_ASSOC);
								?>
								<thead>
									<tr>
										<th>Image</th>
										<th>Id</th>
										<th>Product Name</th>
										<th>Product Brand</th>
										<th>Product Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<?php
									}else{
										?><th>No Details Avilable !!!</th><?php
									}
								?>
								<tbody>
								<?php if(!empty($arr_product)) { ?>
									<?php foreach($arr_product as $r) { ?>
									<tr>
										<td><img src=<?php echo "images/products/".$r['image'] ?> width="100" alt=""/></td>
										<td><?php echo $r['id'] ?></td>
										<td><?php echo $r['name'] ?></td>
										<td><?php echo $r['brand'] ?></td>
										<td><?php echo $r['price'] ?></td>
										<td><a class="btn btn-danger delete-modal" href="#" data-id="<?php echo $r['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></td>
									</tr>
									<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</body>
<script>
function validateForm() {
  let x = document.forms["product-form"]["name"].value;
  if (x == "") {
    document.getElementById("error_name").innerHTML="*Name is Empty.";
    return false;
  }
  else{
	document.getElementById("error_name").innerHTML="";
  }

  let y = document.forms["product-form"]["brand"].value;
  if (y == "") {
    document.getElementById("error_brand").innerHTML="*Brand is Empty.";
    return false;
  }else{
	document.getElementById("error_brand").innerHTML="";
  }

  let z = document.forms["product-form"]["price"].value;
  if (z == "") {
    document.getElementById("error_price").innerHTML="*Price is Empty.";
    return false;
  }else{
	document.getElementById("error_price").innerHTML="";
  }
}

$('.delete-modal').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "product_fetch_by_id.php",
        dataType: "json",
        data: { id: id },
        success: function(data) {
            if (data) {
                $('#id').val(data.id);
            } else {
                swal("Bad Luck!", "Something went wrong, Please try again later.", "error");
            }
        }
    });
});
</script>
</html>