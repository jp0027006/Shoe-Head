<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0e53af926d.js"></script>
    <title>Registration Page</title>
</head>
<body>
<section class="vh-100" style="height: max-content !important; background-color: #9A616D;">
  <div class="container py-5 h-100" style="max-width: 45%;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form id="registration" name="registration" action="registration_process.php" method="POST" onsubmit="return validateForm()">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img class="logo" src="logo.png" width="100" height="80" alt="logo" >
                    <span class="h1 fw-bold mb-0">Shoe Head</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">First name</label>
                    <input type="text" name="fname" id="fname" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_fname"></p>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Last name</label>
                    <input type="text" name="lname" id="lname" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_lname"></p>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Email address</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_email"></p>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Mobile no.</label>
                    <input type="tel" name="ph" id="ph" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_ph"></p>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_pass"></p>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Confirm password</label>
                    <input type="password" name="repassword" id="repassword" class="form-control form-control-lg" />
                    <p class="text-danger" id="error_repass"></p>
                  </div>
                  <div class="pt-1 mb-4" style="margin-left: 26vh;">
                    <input class="btn btn-dark btn-lg btn-block" type="submit"></input>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>