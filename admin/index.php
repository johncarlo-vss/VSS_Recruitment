<?php
  //From the interns.

  session_start();

  if(!isset($_SESSION["login_id"]))
    header("Location: ./signin.php");

  include('../process/db_connect.php');

  $pages = array("dashboard", "applications", "vacancy", "status", "users", "settings");

  //A bug was discovered by the TL (John Carlo Villas) at exactly 6:16:07 3/17/2022 US Time.

  if(isset($_GET["page"]) && in_array($_GET["page"], $pages)) {
    $page = $_GET["page"];
  } elseif(!isset($_GET["page"])) {
    header("Location: index.php?page=dashboard");
  }

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
    <title>Administrator | VSS Recruitment Hub</title>

    <!--Something was deleted here-->
    <!--Wise choice, from the interns-->
    <?php require_once("./includes/links.php"); ?>
    <?php require_once("./includes/scripts.php"); ?>
    <style>
      .modal-dialog.large {
        width: 80% !important;
        max-width: unset;
      }
      .modal-dialog.mid-large {
        width: 60% !important;
        max-width: unset;
      }
      #preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        overflow: hidden;
        background: #fff;
      }

      #preloader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #1977cc;
        border-top-color: #d1e6f9;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
      }
      #preloader2 {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        overflow: hidden;
        background: #ffffff82;
      }

      #preloader2:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #1977cc;
        border-top-color: #d1e6f9;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
      }
      @-webkit-keyframes animate-preloader {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

      @keyframes animate-preloader {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }
    </style>

</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <?php include('includes/aside.php')?>
        <div class="app-container">
          <?php include('includes/navbar.php')?>
          <?php include($page . '.php')?>
        </div>
    </div>

    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
          </div>
          <div class="modal-body">
            <div id="delete_content"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
          </div>
          <!-- <div class="modal-footer">
            <input type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()" value="Save">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div> -->
          </div>
        </div>
      </div>

    <!--Something was deleted here-->
    <!--Wise choice from the inters-->
    <?php //require_once("./includes/scripts.php"); ?>
    <script>

    	 window.start_load = function(){
        $('body').prepend('<di id="preloader2"></di>')
      }
      window.end_load = function(){
        $('#preloader2').fadeOut('fast', function() {
            $(this).remove();
          })
      }

      window.uni_modal = function($title = '' , $url='',$size=""){
        // start_load()
        $('#uni_modal').modal({show:true});
        $.ajax({
            url:$url,
            error:err=>{
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size)
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    // end_load()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
         $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
         $('#confirm_modal .modal-body').html($msg)
         $('#confirm_modal').modal('show')
      }
       window.alert_toast= function($msg = 'TEST',$bg = 'success'){
          $('#alert_toast').removeClass('bg-success')
          $('#alert_toast').removeClass('bg-danger')
          $('#alert_toast').removeClass('bg-info')
          $('#alert_toast').removeClass('bg-warning')

        if($bg == 'success')
          $('#alert_toast').addClass('bg-success')
        if($bg == 'danger')
          $('#alert_toast').addClass('bg-danger')
        if($bg == 'info')
          $('#alert_toast').addClass('bg-info')
        if($bg == 'warning')
          $('#alert_toast').addClass('bg-warning')
        $('#alert_toast .toast-body').html($msg)
        $('#alert_toast').toast({delay:3000}).toast('show');
      }
      $(document).ready(function(){
        $('#preloader').fadeOut('fast', function() {
            $(this).remove();
          })
      })
      $('.datetimepicker').datetimepicker({
          format:'Y/m/d H:i',
          startDate: '+3d'
      })

    </script>

    <!-- From the interns, toggling active-page indicator in aside -->
    <script type="text/javascript">
      $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active-page');
    </script>
</body>
</html>
