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
    <title>VSS | Recruitment Management System</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="assets/plugins/highlight/styles/github-gist.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/darktheme.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />


<style>
    .navbar-brand{
        font-color: white;
        margin-left:150px;
        margin-right:80px;
        height:45px;
        margin-top:10px;
    }


	header.masthead {
		background: url(assets/images/backgrounds/cover4.png);
		background-repeat: no-repeat;
		background-size: cover;
        height:500px;
    }

    .align-self-end.mb-4.page-title {
        background: #0000007a;
        border-radius: 15px;
        width:900px;
    }

    .asd{
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    h1{
        font-family:poppins;
    }

    header.masthead {
        background: url(assets/images/bg.png);
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>

</head>

        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <a class="navbar-brand" href="index.php?page=home" style="margin-left: 25px"> <img src="assets/images/logo.png" width="35" height="35"  style="margin-right: 15px"class="d-inline-block align-center " alt="">VSS | Recruitment HUB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-item active">
                        <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
                    </a>

                </ul>
            </div>
        </nav>


  <header class="masthead">
    <div class="container-fluid h-100" style="margin-left: 40px">
        <div class="row h-100 align-items-start justify-content-start text-left">
            <div class="col-lg-8 align-self-center mb-4 page-title">

            </div>
        </div>
    </div>
  </header>
  <div class="meanimate"></div>

  <section id="">
  <?php include 'process/db_connect.php' ?>

  <?php
  	$qry = $conn->query("SELECT * FROM vacancy where id=".$_GET['id'])->fetch_array();
  	foreach($qry as $k =>$v){
  		$$k = $v;
  	}
  ?>

  <div class="container-fluid mb-2 pt-4 " style="margin-top: 330px;">
  	<div class="card col-10" style="display: block; margin-left: auto; margin-right: auto; margin-top:-320px">
  		<div class="card-body">
              <div class="close">
                  <a href="index.php"><span class="material-icons">clear</span></a>
              </div>
  			<div class="row">
  				<div class="col-lg-12">
  					<h1 class="text-center"><b><?php echo $position ?></b></h1>

  					<p class="text-center">
  						<small>
  							<b>Needed: <larger><?php echo $availability ?></larger></b>
  						</small>
  						<?php if($status == 1): ?>
  							<span class="badge badge-success pt-2"> Hiring</span>
  						<?php else: ?>
  							<span class="badge badge-danger pt-2"> Closed</span>
  						<?php endif; ?>
  					</p>
  				</div>
  			</div>
        <div style="justify-content: center; align-items: center; display: flex">
          <hr class="divider my-4"  style="max-width: calc(90%); background-color: #FD6161; padding: 0.7px;">
        </div>
  			<div class="row" style="display: flex">
  				<div class="col-lg-8">
  					<?php echo html_entity_decode($description) ?>
  				</div>
          <!-- <div class="col-lg-4">
            <div class="card" style="background: #E5E5E5; justify-content: space-between;">
              <div class="card-body">
                <h4 style="color: #4C4C4C;">Job Overview</h4>
                <p style="text-align:left;">
                    Test
                    <span style="float:right;">
                        Test
                    </span>
                </p>
                <p style="text-align:left;">
                    Test
                    <span style="float:right;">
                        Test
                    </span>
                </p>
              </div>
            </div>
          </div> -->
  			</div>
        <div style="justify-content: center; align-items: center; display: flex">
          <hr class="divider my-4"  style="max-width: calc(100%); background-color: #FD6161; padding: 0.7px;">
        </div>
  			<div class="row ">
  				<div class="col-lg-12">
  						<?php if($status == 1): ?>
  							<a href="sign-up.php" class="btn btn-block col-md-4 btn-success float-right" id="apply_now">Apply Now</a>

  						<?php else: ?>
  							<button class="btn btn-block col-md-4 btn-success  float-right" type="button" disabled="" id="">Application Closed</button>
  						<?php endif; ?>

  				</div>
  			</div>
  			</div>
  		</div>
  	</div>
  </section>
<br><br><br>

<!-- Removed Modal -->

<!-- <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="margin-top: 100px">
            <div class="modal-header">
            <h2>Application Form for <?php //echo $position ?></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
					<form id="manage-application">
							<div class="col-md-12">
								<div class="row form-group">
									<div class="col-md-4">
										<label for="" class="control-label">Last Name</label>
										<input type="text" class="form-control" name="lastname" required="">
									</div>
									<div class="col-md-4">
										<label for="" class="control-label">First Name</label>
										<input type="text" class="form-control" name="firstname" required="">
									</div>
									<div class="col-md-4">
										<label for="" class="control-label">Middle Name</label>
										<input type="text" class="form-control" name="middlename" required="">
									</div>
								</div>
								<div class="row form-group">
                                    <div class="col-md-6">
										<label for="" class="control-label">Email</label>
										<input type="email" class="form-control" name="email" required="">
									</div>
                                    <div class="col-md-3">
										<label for="" class="control-label">Contact</label>
										<input type="text" class="form-control" name="contact" required="">
									</div>
									<div class="col-md-3">
                                        <label for="inputState" class="form-label">Gender</label>
                                        <select id="inputState" class="form-select">
                                            <option selected>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>


								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="" class="control-label">Address</label>
										<input type="text" name="address" id="" cols="30" rows="3" required class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="" class="control-label">Cover Letter</label>
										<textarea name="cover_letter" id="" cols="30" rows="3" placeholder="(Optional)" class="form-control"></textarea>
									</div>
								</div>
								<div class="row form-group">
                                    <label for="exampleFormControlFile1">Upload your Resume</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>



							</div>
					</form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div> -->

<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/pace/pace.min.js"></script>
<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/main.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/pages/dashboard.js"></script>
<script src="assets/js/main.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
  $('html, body').animate({
    scrollTop: ($('.meanimate').offset().top - 20)
  }, 1500);
</script>
</body>
</html>
