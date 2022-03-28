<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';

    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login($password, $username){
		/*
		extract($_POST);
		Extract was removed, the interns choose other methods.
		*/
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		/*
		header("location:login.php");
		From the interns, header removed because location is different from the modified system.
		*/
		header("Location: ../admin/signin.php"); // Replacement header added by the interns.
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}

		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}


	function save_recruitment_status(){
		extract($_POST);
		if(trim($status_label)) {
			$data = " status_label = '$status_label' ";
			if(empty($id)){
				$save = $this->db->query("INSERT INTO recruitment_status set ".$data);
			}else{
				$save = $this->db->query("UPDATE recruitment_status set ".$data." where id=".$id);
			}
			if($save)
				return 1;
		}else {
			return 0;
		}
	}
	function delete_recruitment_status(){
		extract($_POST);
		$delete = $this->db->query("UPDATE recruitment_status set status = 0 where id = ".$id);
		if($delete)
			return 1;
	}
	function save_vacancy(){
		extract($_POST);
		$data = " position = '$position' ";
		$data .= ", availability = '$availability' ";
		$data .= ", description = '".htmlentities(str_replace("'","&#x2019;",$description))."' ";
		if(isset($status))
		$data .= ", status = '$status' ";

		if(empty($id)){

			$save = $this->db->query("INSERT INTO vacancy set ".$data);
		}else{
			$save = $this->db->query("UPDATE vacancy set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_vacancy(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM vacancy where id = ".$id);
		if($delete)
			return 1;
	}
	function save_application(){
		extract($_POST);
		$data = " lastname = '$lastname' ";
		$data .= ", firstname = '$firstname' ";
		$data .= ", middlename = '$middlename' ";
		$data .= ", address = '$address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", email = '$email' ";
		$data .= ", gender = '$gender' ";
		$data .= ", cover_letter = '".htmlentities(str_replace("'","&#x2019;",$cover_letter))."' ";
		$data .= ", position_id = '$position_id' ";
		if(isset($status))
		$data .= ", process_id = '$status' ";

		if($_FILES['resume']['tmp_name'] != ''){
					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['resume']['name'];
					$move = move_uploaded_file($_FILES['resume']['tmp_name'], '../admin/assets/resume/'. $fname);
					$data .= ", resume_path = '$fname' ";
		}
		if(empty($id)){
			// echo "INSERT INTO application set ".$data;
			// exit;
			$save = $this->db->query("INSERT INTO application set ".$data);
		}else{
			$save = $this->db->query("UPDATE application set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_application(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM application where id = ".$id);
		if($delete)
			return 1;
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}

	//From the interns, this method is used for the applicant to sign up.
	function applicant_sign_up($creds) {
		$data = json_decode($creds);
		$approved = true;

		if(trim($data->firstName) == ""){
			$approved = false;
		} elseif(trim($data->lastName) == "") {
			$approved = false;
		} elseif(trim($data->eMail) == "") {
			$approved = false;
		} elseif(!filter_var($data->eMail, FILTER_VALIDATE_EMAIL)) {
			$approved = false;
		} elseif(trim($data->password) == "") {
			$approved = false;
		} elseif($data->password != $data->confPassword) {
			$approved = false;
		}

		if($approved) {
			$email = $this->db->real_escape_string($data->eMail);
			$result = $this->db->query("SELECT COUNT(*) as count FROM applicant WHERE email = '$email'");
			if($result) {
				if($result->fetch_row()[0] > 0) {
					return "__exist__";
				} else {
					$password = hash("sha256", mysqli_real_escape_string($this->db, $data->confPassword));
					$result = $this->db->query("INSERT INTO applicant(fname, lname, pass, email) VALUES('$data->firstName', '$data->lastName', '$password', '$email')");
					if($result) {
						return 1;
					} else {
						return 0;
					}
				}
			}
		} else {
			return 0;
		}
	}

	function applicant_info_save($email) {
		extract($_POST);
		$file = fopen("dummy.txt", "w");
		$applicant_email = $this->db->real_escape_string($email);
		$applicant_country = $this->db->real_escape_string($country);
		$applicant_street = $this->db->real_escape_string($street);
		$applicant_city = $this->db->real_escape_string($city);
		$applicant_postal = $this->db->real_escape_string($postal);
		$applicant_contact = $this->db->real_escape_string($contact);
		$applicant_role_description = $this->db->real_escape_string($roleDescription);
		$applicant_primary_school = $this->db->real_escape_string($primary);
		$applicant_secondary_school = $this->db->real_escape_string($secondary);
		$applicant_tertiary_school = $this->db->real_escape_string($tertiary);
		$applicant_prev_job = $this->db->real_escape_string($jobTitle);
		$applicant_prev_com = $this->db->real_escape_string($company);
		$applicant_prev_com_locale = $this->db->real_escape_string($location);

		$applicant_info = "email = '$applicant_email'";
		$applicant_info .= ", ad_heard = '$heard'";
		$applicant_info .= ", ncr_worked = '$ncr'";
		$applicant_info .= ", country = '$applicant_country'";
		$applicant_info .= ", street = '$applicant_street'";
		$applicant_info .= ", city = '$applicant_city'";
		$applicant_info .= ", postal = '$applicant_postal'";
		$applicant_info .= ", contact = '$applicant_contact'";
		$applicant_info .= ", worked_here = '$workedHere'";
		$applicant_info .= ", worked_from = '$workedFrom'";
		$applicant_info .= ", worked_to = '$workedTo'";
		$applicant_info .= ", role_description = '$applicant_role_description'";
		$applicant_info .= ", primary_school = '$applicant_primary_school'";
		$applicant_info .= ", secondary_school = '$applicant_secondary_school'";
		$applicant_info .= ", tertiary_school = '$applicant_tertiary_school'";
		$applicant_info .= ", prev_job = '$applicant_prev_job'";
		$applicant_info .= ", prev_com = '$applicant_prev_com'";
		$applicant_info .= ", prev_job_locale = '$applicant_prev_com_locale'";

		$result = $this->db->query("INSERT INTO applicant_info SET $applicant_info");
		if($result) {
			return 1;
		} else {
			return 0;
		}
	}
}
