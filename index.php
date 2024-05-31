<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://kit.fontawesome.com/0e53af926d.js" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="card" style="border-radius: 1rem;">
          <div class="card-body p-4 p-lg-5 text-black">
            <form id="login" name="login" action="login_process.php" method="POST" onsubmit="return validateForm()">
              <div class="d-flex align-items-center mb-3 pb-1">
                <img class="logo" src="logo.png" width="100" height="80" alt="logo">
                <span class="h1 fw-bold mb-0">Shoe Head</span>
              </div>
              <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
              <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" />
                <p class="text-danger" id="error_email"></p>
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                <p class="text-danger" id="error_pass"></p>
              </div>
              <div class="pt-1 mb-4">
                <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
              </div>
            </form>
            <div>Don't have an account? <a class="a1" href="registration.php">Sign up</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function validateForm() {
  let x = document.forms["login"]["email"].value;
  if (x == "") {
    document.getElementById("error_email").innerHTML="*Email is Empty.";
    return false;
  } else {
    document.getElementById("error_email").innerHTML="";
  }

  let y = document.forms["login"]["password"].value;
  if (y == "") {
    document.getElementById("error_pass").innerHTML="*Password is Empty.";
    return false;
  } else {
    document.getElementById("error_pass").innerHTML="";
  }
}
</script>
</body>
</html>