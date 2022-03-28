<?php
  //From the interns.
  require("./admin_class.php");
  require("./ajax.php");

  $data = json_decode(file_get_contents("php://input"));
  $approved = true;

  if(trim($data->firstName) == ""){
    $approved = false;
  } elseif(trim($data->lastName) == "") {
    $approved = false;
  } elseif(trim($data->eMail) == "")) {
    $approved = false;
  } elseif(filter_var($data->eMail, FILTER_VALIDATE_EMAIL)) {
    $approved = false;
  } elseif(trim($data->password) == "") {
    $approved = false;
  } elseif($data->password != $data->confPassword) {
    $approved = false;
  }

  if($approved) {

  } else {
    //Do something here.
  }

?>
