<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	//From the interns.
	$data = json_decode(file_get_contents("php://input")); //From the interns, JSON data from client.
	$login = $crud->login($data->password, $data->username); //From the interns, functions arguments.
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_recruitment_status"){
	$save = $crud->save_recruitment_status();
	if($save)
		echo $save;
}
if($action == "delete_recruitment_status"){
	$save = $crud->delete_recruitment_status();
	if($save)
		echo $save;
}
if($action == "save_vacancy"){
	$save = $crud->save_vacancy();
	if($save)
		echo $save;
}
if($action == "delete_vacancy"){
	$save = $crud->delete_vacancy();
	if($save)
		echo $save;
}
if($action == "save_application"){
	$save = $crud->save_application();
	if($save)
		echo $save;
}
if($action == "delete_application"){
	$save = $crud->delete_application();
	if($save)
		echo $save;
}

//From the interns, signing up for applicants.

if($action == "applicant_sign_up") {
	$data = file_get_contents("php://input");
	$save = $crud->applicant_sign_up($data);
	if($save)
		echo $save;
}

if($action == "applicant_info_save") {
	$save = $crud->applicant_info_save($_GET["email"]);
	if($save)
		echo $save;
}
