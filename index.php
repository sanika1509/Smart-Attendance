<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Attedance Management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css">
    <script type="text/javascript" language="javascript">
    var uid=''
    uid=window.document.demo.email.value
    var pass=''
    pass=window.document.demo.password.value
    if((uid=="admin")&&(pass=="admin"))
    {
      window.document.demo.btn.disabled="false"
      <?php
      
      session_start();
      $_SESSION['user']='Admin';
      
      ?>
    }
    else{
        
    }
    
    </script>
</head>

<body style="font-family: Poppins, sans-serif;">
    <div class="container" style="position:absolute; left:0; right:0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%);">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="text-dark mb-4" style="font-size: 20.704px;color: var(--bs-primary);filter: blur(0px);">ATTENDANCE MANAGEMENT SYSTEM</h2>
                                        <h6 class="text-dark mb-4" style="color: var(--bs-blue);">Log in to continue</h6>
                                    </div>
                                    <form name="demo" class="user" action="dashboard.php">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address" name="email" required=""></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" required=""></div>
                                        <div class="row mb-3">
                                            <p id="errorMsg" class="text-danger" style="display:none;">Paragraph</p>
                                        </div><button class="btn btn-primary d-block btn-user w-100" id="submitBtn" name="btn" disabled="true" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><script>
	let email = document.getElementById("email")
	let submitBtn = document.getElementById("submitBtn")
	let errorMsg = document.getElementById('errorMsg')
        
	function displayErrorMsg(e) {
		errorMsg.style.display = "block"
		errorMsg.innerHTML = e
		submitBtn.disabled = true
	}

	function hideErrorMsg() {
		errorMsg.style.display = "none"
		submitBtn.disabled = false
	}
	
	// Validate email upon change
	email.addEventListener("change", function() {
		// Check if the email is valid using a regular expression (string@string.string)
		if(email.value=="admin")
                {hideErrorMsg()
                   // flag1=1;
               }
		else
			displayErrorMsg("Invalid userid")
	});
        
        password.addEventListener("change", function() {
		// Check if the email is valid using a regular expression (string@string.string)
		if(password.value=="admin")
                {hideErrorMsg()
                   // flag2=1;
               }
		else
			displayErrorMsg("Invalid password")
	});
        
    
</script>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
</body>

</html>