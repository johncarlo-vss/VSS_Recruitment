<style>
    .radio {
    --border-radius: 50%;
    
    padding: 5px;
}
.checkbox {
    --border-radius: 0;
    
    padding: 5px;
}
.radio input[type="radio"], .checkbox input[type="checkbox"] {
    display: none;
}
.radio label, .checkbox label {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 1px solid white;
    border-radius: var(--border-radius);
    box-sizing: border-box;
}
.radio label::before, .checkbox label::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    width: 13px;
    height: 13px;
    border-radius: var(--border-radius);
    background-color: transparent;
    transform: translate(-50%, -50%);
    transition: background-color 0.25s;
}

.radio :checked ~ label::before, .checkbox :checked ~ label::before {
    background-color: lightskyblue;
}
.radio span, .checkbox span {
    color: grey;
    vertical-align: top;
    transition: color 0.25s;
}

.radio :checked ~ span, .checkbox :checked ~ span {
    color: white;
}
.far {
  position: absolute;
  right: 80px;
  display: inline-block;
  top: 370px;
  padding: 15px;
  border-radius: 50%;
  text-align: center;
  cursor: pointer;
  transition: all .3s ease-in-out;
  font-size: 25px;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  line-height: 1;
}



</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="sign-in">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>VSS | Sign-in</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/darktheme.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/new_logo_white.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo/new_logo_white.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="#">VSS RECRUITMENT</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="sign-up.php">Sign Up</a></p>

            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" placeholder="example@gmail.com" required>

                <label for="signInPassword" class="form-label">Password</label>
                <i id="icon" class="far fa-eye-slash"></i>
                <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
              
               
                <div class="checkbox mt-3">
                    <input type="checkbox" id="checkbox-1" name="example" />
                    <label for="checkbox-1"></label>
                    <span> By clicking this checbox you agreee to Virtual Staffing Solutions Term and Conditions and Privacy Policy.</span>
                </div>
            </div>

            <div class="auth-submit">
                <a href="index.php" class="btn btn-primary">Sign In</a>
                <a href="#" class="auth-forgot-password float-end">Forgot password?</a>
            </div>
            <div class="divider"></div>
            <div class="auth-alts">
                <a href="#" class="auth-alts-google"></a>
                <a href="#" class="auth-alts-facebook"></a>
                <a href="#" class="auth-alts-twitter"></a>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script>
   var myInput = document.getElementById('signInPassword'),
    myIcon = document.getElementById('icon');

    // myInput.onfocus = function () {
    // myIcon.style.right = '0px'
    // }

    // myInput.onblur = function () {
    // myIcon.style.right = '0px'
    // }

    myIcon.onclick = function () {



    if (myIcon.classList.contains('fa-eye-slash')) {

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');

        myInput.setAttribute('type', 'text');



    } else {


        myInput.setAttribute('type', 'password');

        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');

    };
    }
    </script>
</body>
</html>
