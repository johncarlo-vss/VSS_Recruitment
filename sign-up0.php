<style type="text/css">

p {
    color: #ACACAC;
}
input[type=radio1]{
    		height:30px;
    		width:10px;
    		vertical-align: middle;
    		margin: 5px;
    	}
h1 {
text-transform: uppercase;
    color: #E5E5E5;
    font-weight: normal;
    text-align: center;
     margin: 10;
    padding: 10
}
#heading {
    text-transform: uppercase;
    color: #1B6123;
    font-weight: normal
}
#msform {
  padding:20px;
    text-align: center;
    position: relative;
    margin-top: 20px
}
#msform fieldset {
    background: #1F1F2B;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding:20px;
    padding-bottom: 20px;
    position: relative
}
.form-card {
    text-align: left
}
#msform fieldset:not(:first-of-type) {
    display: none
}
#msform input
 {
    padding: 8px 15px 8px 15px;
    border: .3px solid gray;
    border-radius: 1px;
    margin-bottom: 15px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: white;
    background-color: #1F1F2B;
    font-size: 16px;
    letter-spacing: 1px
}
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: .3px solid gray;
    border-radius: 1px;
    margin-bottom: 15px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: white;
    background-color: #1F1F2B;
    font-size: 16px;
    letter-spacing: 1px
}
#msform input:focus
{
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #1B6123;
    outline-width: 0
}
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #1B6123;
    outline-width: 0
}
#msform .action-button {
    width: 100px;
    background: #1B6123;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}
#msform .action-button:hover
{
    background-color: #311B92
}
#msform .action-button:focus {
    background-color: #311B92
}
#msform .action-button-pre {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}
#msform .action-button-pre:hover
{
    background-color: #000000
}
#msform .action-button-pre:focus {
    background-color: #000000
}
.card {
    z-index: 0;
    border: none;
    position: relative
}
.fs-title {
    font-size: 25px;
    color: #1B6123;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}
.purple-text {
    color: #1B6123;
    font-weight: normal
}
.steps {
    font-size: 15px;
    color: gray;
    margin-bottom: 1px;
    font-weight: normal;
    text-align: right
}
.fieldlabels {
    color: gray;
    text-align: left
}
#progressbar {
    margin-bottom: 20px;
    overflow: hidden;
    color: lightgrey
}
#progressbar .active {
    color: #1B6123
}
#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 32%;
    float: left;
    /* color: red; */
    position: relative;
    font-weight: 400
}
#progressbar #account:before {
    font-family: Poppins;
    font-weight: 600;
    content: "1"
}
#progressbar #personal:before {
    font-family: Poppins;
    font-weight: 600;
    content: "2"
}
/* #progressbar #Questions:before {
    font-family: FontAwesome;
    content: "3"
}
#progressbar #disclosure:before {
    font-family: FontAwesome;
    content: "4"
}   */

#progressbar #review:before {
    font-family: Poppins;
    font-weight: 600;
    content: "3"
}

#progressbar .active {
  color: #2E7D32;
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: #ACACAC;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}
#progressbar li.active:before
{
    background-color: #1B6123
}
#progressbar li.active:after {
    background-color: #1B6123
}
.progress {
    height: 20px
}

.pbar {
    background-color: #2E7D32
}
.fit-image {
    width: 100%;
    object-fit: cover
}
.ast{
  color: red;
  font-weight: 600;
  float: left;

}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

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

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">

                <div class="app-auth-background">

                </div>


                <div class="app-auth-container">
                    <div class="logo">
                        <a href="index.php">Neptune</a>
                    </div>
                    <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="sign-in.php">Sign In</a></p>

                    <div class="auth-credentials m-b-xxl">
                        <label for="signUpUsername" class="form-label">Username</label>
                        <input type="text" class="form-control m-b-md" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter username">

                        <label for="signUpEmail" class="form-label">Email address</label>
                        <input type="Email" class="form-control m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com">

                        <label for="signUpPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                        <div id="emailHelp" class="form-text">Password must be minimum 8 characters length*</div>
                    </div>

                    <div class="auth-submit">
                        <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <!-- Multi step form -->


                                          <h1> Welcome to VSS Recruitment Hub </h1>
                                              <div class="row justify-content-center">
                                                  <div class="col-lg-12">
                                                      <div class="card px-0 pt-4 pb-0 mt-3 mb-3"
                                                          <form id="msform">
                                                          <h2 id="heading"> </h2>
                                                              <ul id="progressbar">
                                                                  <li class="active" id="account"><strong> My Information </strong></li>
                                                                  <li id="personal"><strong> My Experience </strong></li>
                                                                  <!-- <li id="Questions"><strong> Application Questions </strong></li>
                                                                  <li id="disclosure"><strong> Voluntary Disclosure </strong></li>   -->
                                                                  <li id="Review"><strong> Review </strong></li>
                                                              </ul>
                                                              <div class="progress">
                                                                  <div class="pbar pbar-striped pbar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"> </div>
                                                              </div> <br>

                                                              <fieldset>
                                                                <h5 style="float:left; text-indent:4px;"><span class="ast">*</span>  Indicates a required field</h5>
                                                                <br><br>
                                                                  <div class="form-card mt-3">
                                                                      <p style="float:left;"> how did you learn about us? <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                      <div class="example-content mb-5">
                                                                          <select class="form-select" aria-label="Default select example">
                                                                              <option selected>SELECT ONE </option>
                                                                              <option value="1">Company Website</option>
                                                                              <option value="2">Facebook Ads</option>
                                                                              <option value="3">Twitter</option>
                                                                              <option value="3">LinkedIn</option>
                                                                          </select>
                                                                      </div>
                                                                      <p style="float:left;"> Have you worked for NCR in the past or are you currently working as a Contractor at NCR?  <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                      <div class="example-content mt-4 mb-5">
                                                                        <br><br>
                                                                            <div class="form-check">
                                                                                <input style="width:.5px;"class="form-check-input inline-block" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                <label class="form-check-label" for="flexRadioDefault1">YES</label>
                                                                                <br>
                                                                            </div>
                                                                            <div class="form-check">
                                                                            <input style="width:.5px;" class="form-check-input inline-block" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                <label class="form-check-label" for="flexRadioDefault1">NO</label>
                                                                            </div>
                                                                      </div>
                                                                      <div class="example-content mb-5">
                                                                      <p style="float:left;"> Country  <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                          <input style="border-radius:5px" type="email" class="form-control form-control-rounded m-b-sm" aria-describedby="roundedInputExample" placeholder="">
                                                                      </div>
                                                                      <hr>
                                                                      <h6>LEGAL NAME</h6>
                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;"> Given Name <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                        <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="First Name">
                                                                      </div>
                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;"> Family Name <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                        <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="Family Name">
                                                                      </div>

                                                                      <hr>
                                                                      <h6>ADDRESS</h6>

                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;"> Street Name </p>
                                                                        <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                      </div>
                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;">  City</p>
                                                                        <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                      </div>
                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;"> Postal Code</p>
                                                                        <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                      </div>
                                                                      <div class="example-content mt-4">
                                                                        <p style="float:left;">Phone/Contact Number</p>
                                                                        <input  style="border-radius:5px" type="contact" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                      </div>

                                                                  </div>
                                                                   <input type="button" name="next" class="next action-button" value="Next" />
                                                              </fieldset>
                                                              <fieldset>
                                                                   <h5 style="float:left; text-indent:4px;"><span class="ast">*</span>  Indicates a required field</h5>
                                                                  <div class="form-card">
                                                                            <br>
                                                                            <hr>
                                                                            <h6>Where have you worked?</h6>
                                                                            <br>
                                                                            <p style="float:left;">Please provide your most recent Professional Experience</p>
                                                                            <div class="example-content mt-5 mb-4">
                                                                                <p style="float:left;">Job Title <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>
                                                                            <div class="example-content mt-4">
                                                                                <p style="float:left;">Company <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>
                                                                            <div class="example-content mt-4">
                                                                                <p style="float:left;">Location</p>
                                                                                <input  style="border-radius:5px" type="contact" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>
                                                                            <div class="form-check mt-3">
                                                                                        <input style="width:.5px;"class="form-check-input inline-block" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                                        I currently worked here
                                                                                        </label>
                                                                                        <br>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="example-content col-lg-6 mt-4 ">
                                                                                    <p style="float:left;">From:</p>
                                                                                    <input  style="border-radius:5px" type="date" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                                </div>
                                                                                <div class="example-content col-lg-6 mt-4 ">
                                                                                    <p style="float:left;">to:</p>
                                                                                    <input  style="border-radius:5px" type="date" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="example-content mt-5 mb-5">
                                                                                <p style="float:left;">Role Description <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <textarea  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder=""></textarea>
                                                                            </div>
                                                                            <hr>
                                                                            <h6>Schools Attended</h6>
                                                                            <div class="example-content mt-5 mb-4">
                                                                                <p style="float:left;">Primary <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>
                                                                            <div class="example-content mt-5 mb-4">
                                                                                <p style="float:left;">Secondary <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>
                                                                            <div class="example-content mt-5 mb-4">
                                                                                <p style="float:left;">Tertiary <span class="ast" style="float:right; text-indent:4px"> *</span> </p>
                                                                                <input  style="border-radius:5px" type="text" class="form-control form-control-solid-bordered form-control-rounded" aria-describedby="roundedSolidBorderedInputExample" placeholder="">
                                                                            </div>

                                                                   </div>
                                                                <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="pre" class="pre action-button-pre" value="Pre" />
                                                              </fieldset>

                                                              <fieldset>
                                                                  <div class="form-card">
                                                                      <div class="row">
                                                                          <div class="col-7">
                                                                              <h2 class="fs-title"> Finish: </h2>
                                                                          </div>
                                                                          <div class="col-5">
                                                                              <h2 class="steps"> Step 3 - 3 </h2>
                                                                          </div>
                                                                      </div> <br> <br>
                                                                      <h2 class="purple-text text-center"><strong> SUCCESS ! </strong></h2> <br>
                                                                      <div class="row justify-content-center">
                                                                          <div class="col-3"> <img src="../assets/images/complete.png" class="fit-image"> </div>
                                                                      </div> <br><br>
                                                                      <div class="row justify-content-center">
                                                                          <div class="col-7 text-center">
                                                                              <h5 class="purple-text text-center"> You Have Successfully Signed Up </h5>
                                                                          </div>
                                                                      </div>
                                                                      <a href="sign-in.php" type="button">Login</a>
                                                                  </div>
                                                              </fieldset>
                                                          </form>
                                                      </div>
                                                  </div>


                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="auth-alts">
                        <a href="#" class="auth-alts-google"></a>
                        <a href="#" class="auth-alts-facebook"></a>
                        <a href="#" class="auth-alts-twitter"></a>
                    </div>
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
    <script>
$(document).ready(function() {
var current_fs, next_fs, pre_fs;
var opacity;
var current = 1;
var steps = $("fieldset").length;
setProgressBar(current);
$(".next").click(function() {
current_fs = $(this).parent();
next_fs = $(this).parent().next();
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
next_fs.show();
current_fs.animate({opacity: 0}, {
step: function(now) {
opacity = 1 - now;
current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});
$(".pre").click(function() {
current_fs = $(this).parent();
pre_fs = $(this).parent().prev();
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
pre_fs.show();
current_fs.animate({opacity: 0}, {
step: function(now) {
opacity = 1 - now;
current_fs.css({
'display': 'none',
'position': 'relative'
});
pre_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});
function setProgressBar(curStep) {
var percent = parseFloat(100 / steps) * curStep;
percentpercent = percent.toFixed();
$(".pbar")
.css("width",percent+"%")
}
$(".submit").click(function() {
return false;
})
});
</script>
</body>
</html>
