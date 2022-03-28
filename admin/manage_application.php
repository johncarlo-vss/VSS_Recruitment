<?php include '../process/db_connect.php' ?>

<?php
	if(isset($_GET['id'])){
		$application = $conn->query("SELECT  a.*,v.position FROM application a inner join vacancy v on v.id = a.position_id where a.id=".$_GET['id'])->fetch_array();
		foreach($application as $k => $v){
			$$k = $v;
		}
		  $fname = explode('_',$resume_path);
	       unset($fname[0]);
	       $fname = implode("",$fname);
	}
	$qry = $conn->query("SELECT * FROM vacancy ");
	while($row=$qry->fetch_assoc()){
		$pos[$row['id']] = $row['position'];
	}
	$rs = $conn->query("SELECT * FROM recruitment_status");
	while($row=$rs->fetch_assoc()){
		$stat[$row['id']] = $row['status_label'];
	}


?>
<div class="container-fluid">
	<form id="manage-application">
		<input type="hidden" name="id" value="<?php echo isset($id)? $id : '' ?>">
	<div class="col-md-12">
		<div class="row form-group">
			<div class="col-md-6">
				<label for="" class="control-label">Position</label>
				<select class="custom-select browser-default select1" name="position_id">
					<option value=""></option>
					<?php foreach($pos as $k => $v): ?>
						<option value="<?php echo $k ?>" <?php echo isset($position_id) && $position_id == $k ? "selected" : '' ?>><?php echo $v ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="row form-group mt-2">
			<div class="col-md-4">
				<label for="" class="control-label mb-2">Last Name</label>
				<input type="text" class="form-control" name="lastname" required="" value="<?php echo isset($lastname) ? $lastname:''  ?>">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label mb-2">First Name</label>
				<input type="text" class="form-control" name="firstname" required="" value="<?php echo isset($firstname) ? $firstname:''  ?>">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label mb-2">Middle Name</label>
				<input type="text" class="form-control" name="middlename" required="" value="<?php echo isset($middlename) ? $middlename:''  ?>">
			</div>
		</div>
		<div class="row form-group mt-2">
			<div class="col-md-4">
				<label for="" class="control-label mb-2">Gender</label>
				<select name="gender" id="" class="custom-select browser-default select1">
					<option <?php echo isset($gender) && $gender == 'Male' ? "selected" : '' ?>>Male</option>
					<option <?php echo isset($gender) && $gender == 'Female' ? "selected" : '' ?>>Female</option>
				</select>
			</div>
			<div class="col-md-4">
				<label for="" class="control-label mb-2">Email</label>
				<input type="email" class="form-control" name="email" required value="<?php echo isset($email) ? $email:''  ?>">
			</div>
			<div class="col-md-4">
				<label for="" class="control-label mb-2">Contact</label>
				<input type="tel" class="form-control" name="contact" required value="<?php echo isset($contact) ? $contact:''  ?>">
			</div>
		</div>
		<div class="row form-group mt-2">
			<div class="col-md-10">
				<label for="" class="control-label mb-2">Address</label>
				<textarea name="address" id="" cols="30" rows="3" required class="form-control"><?php echo isset($address) ? $address:''  ?></textarea>
			</div>
		</div>
		<div class="row form-group mt-2">
			<div class="col-md-10">
				<label for="" class="control-label mb-2">Cover Letter</label>
				<textarea name="cover_letter" id="" cols="30" rows="3" placeholder="(Optional)" class="form-control"><?php echo isset($cover_letter) ? $cover_letter:''  ?></textarea>
			</div>
		</div>
		<div class="row form-group mt-4">
			<label for="" class="control-label mb-2">Resume</label>
			<div class="input-group col-md-10 mb-3">
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="resume" onchange="displayfname(this,$(this))" name="resume" accept="application/msword,text/plain,application/pdf">
			    <label class="custom-file-label" for="resume"><?php echo isset($fname) ? $fname:'No file chosen'  ?></label>
			  </div>

			</div>
		</div>
		<?php if(isset($id)): ?>
		<div class="row form-group mt-2">
			<div class="col-md-6">
				<label for="" class="control-label">Status</label>
				<select class="custom-select browser-default select1" name="status">
					<option value="0" <?php echo isset($process_id) && $process_id == 0? "selected" : '' ?>>New</option>
					<?php foreach($stat as $k => $v): ?>
						<option value="<?php echo $k ?>" <?php echo isset($process_id) && $process_id == $k ? "selected" : '' ?>><?php echo $v ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" id='submit'>Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	</div>
	</form>
</div>

<script>
	function displayfname(input,_this) {
	  if (input.files && input.files[0]) {
	      var reader = new FileReader();
	      reader.onload = function (e) {
	      	_this.siblings('label').html(input.files[0].name);
	      }
	      reader.readAsDataURL(input.files[0]);
	  }
	}
$(document).ready(function(){
	$('.select1').select2({
		width:"100%",
		placeholder:'Please select here',
		dropdownParent: $('#uni_modal')
	});
	$('#manage-application').submit(function(e){
		e.preventDefault()


		// start_load()
		$.ajax({
			url:'../process/ajax.php?action=save_application',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Application successfully submitted.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
})
</script>
