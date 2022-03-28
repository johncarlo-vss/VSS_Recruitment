<?php
session_start();
include('process/db_connect.php');
ob_start();
$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
 foreach ($query as $key => $value) {
  if(!is_numeric($key))
    $_SESSION['setting_'.$key] = $value;
}
ob_end_flush();

?>
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
    <title>VSS | Recruitment Hub</title>



    <?php
      include('includes/links.php');
      include('includes/scripts.php');
    ?>

<style>

    .body{
        background-color:#181821;
    }
    .navbar-brand{
        font-color: white;
        margin-left:150px;
        margin-right:80px;
        height:45px;
        margin-top:10px;
    }


	header.masthead {
		/* background: url(assets/images/backgrounds/cover4.png); */
		background-repeat: no-repeat;
		background-size: cover;
        height:500px;

    }

    .align-self-end.mb-4.page-title {
        /* background: #c7c2c27a; */
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
    .card1:hover{
        /* box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); */
        /* box-shadow: 4px 4px 4px #2B2B2B;     */
        /* transform: scale(1.02);  */
        box-shadow: 0 1px 2px 5px rgba(171,168,168, 0.27), 0 1px 2px 5px rgba(171,168,168, 0.1);
        transition: 0.4s;

        }

    .card1 {
        inline-size: 450px;
        overflow: hidden;
    }
    .demo-bg {
        opacity: 0.6;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
    }

    .card1 {
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        transition: 0.3s;
        background-color:#232330;
        border: none;
        /* border-radius:10px; */
        color:white;
        }

    .text {
        overflow: hidden;
        font-size: 12px;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* number of lines to show */
                line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    ::marker {
        content: "»";
        font-size: 1.5em;

        --hue: 200;
        color: hsl(var(--hue) 50% 50%);
    }

    li {
        padding-inline-start: 1ch;
    }

    li:nth-child(2)::marker { --hue: 200; font-size: 1.5em; }
    li:nth-child(3)::marker { --hue: 200; font-size: 1.5em; }
    li:nth-child(4)::marker { --hue: 200; font-size: 1.5em; }
    li:nth-child(5)::marker { --hue: 200; font-size: 1.5em; }

    .overlay {
        width: 100%;
        height: 600px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        content: '';
   }

   header.masthead {
        background: url(assets/images/bg.png);
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>

</head>
<body>

  <?php include('includes/navbar.php')?>

<div class="body">
    <header class="masthead">
      <div class="container-fluid h-100" style="margin-left: 70px">
          <div class="row h-100 align-items-start justify-content-start text-left">
              <div class="col-lg-8 align-self-center mb-4 page-title">

                  <h2 class="mb-3" style="font-size: 38px; font-family: poppins; font-weight: bold; color: white;">Welcome to VSS Recruitment HUB</h2>
                          <h3 class="subheading" style="color: white; font-style: italic">Why work with us?</h3>
                  <p style= "color:white; font-size: 13px">We are here to help you build your career. Grow with the company with the great team.</p>

                  <div class="col-md-12 mb-2 text-left">
                      <div class="form-group">
                          <div class="input-group col-8">
                              <input type="text" class="form-control" id="filter" style="margin-left:-30px ;background-color: white; border-color: #181821; border-width: 2px; border-radius: 0px; color: #000;" placeholder="Find Vacancies">
                              <!-- <div class="input-group-append">
                                  <span class="input-group-text" style="background-color:#181821; color:white;border-color: #181821; border-width: 2px; width: 60px"><i class="material-icons"> search</i></span>
                              </div> -->
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
    </header>

    <section id="list">
        <div class="container-fluid float-left"><br>

            <div class="row">
                <?php include('includes/left-container.php');?>
                <!-- Right Side Column -->
                <div class="col-md-8"><br>
                  <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : "home";
                    include $page.'.php';
                  ?>

                </div>
            </div>

        </div>
    </section>
  </div>

  </body>
  <?php $conn->close() ?>
</html>
