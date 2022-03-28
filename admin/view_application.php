<?php
include '../process/db_connect.php';
$application = $conn->query("SELECT  a.*,v.position FROM application a inner join vacancy v on v.id = a.position_id where a.id=".$_GET['id'])->fetch_array();
foreach($application as $k => $v){
	$$k = $v;
}
       $fname = explode('_',$resume_path);
       unset($fname[0]);
       $fname = implode("",$fname);
?>
<div class="container-fluid">
	<div class="col-md-12">
		<p><b>Applied for :</b><?php echo $position ?></p>
		<p><b>Name :</b><?php echo ucwords($lastname.', '.$firstname.' '.$middlename) ?></p>
		<p><b>Gender :</b><?php echo $gender ?></p>
		<p><b>Address :</b><?php echo $address ?></p>
		<p><b>Email :</b><?php echo $email ?></p>
		<p><b>Cover Letter :</p>
			<hr>
		<?php echo !empty($cover_letter) ? str_replace("\n","<br>",html_entity_decode($cover_letter)) : 'None'; ?>
		<hr>
		<p><b>Resume</p>
			<!--From the interns, decided to put inline style attribute on this element-->
			<div style="display: flex; justify-content: space-between; align-items: center;">
				<a href="download.php?id=<?php echo $_GET['id'] ?>" target="_blank"><?php echo $fname ?></a>
				<button type="button" style="display: inline-block;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
	</div>
</div>
