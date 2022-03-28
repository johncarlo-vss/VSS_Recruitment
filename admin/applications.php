<?php
//From the interns.
include('../process/db_connect.php');
$qry = $conn->query("SELECT * FROM vacancy ");
while($row=$qry->fetch_assoc()){
  $pos[$row['id']] = $row['position'];
}
$pid = 'all';
if(isset($_GET['pid']) && $_GET['pid'] >= 0){
  $pid = $_GET['pid'];
}
$position_id = 'all';
if(isset($_GET['position_id']) && $_GET['position_id'] >= 0){
  $position_id = $_GET['position_id'];
}

?>
<div class="app-content">
  <div class="content-wrapper">
      <div class="container-fluid">
              <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                              <div class="card">
                                  <div class="card-header">
                                      <div class="col-lg-12">
                                      <span style="font-size:25px"><b>Application List</b></span>
                                          <button type="button" class="btn btn-sm btn-block btn-primary btn-sm col-md-2" style="float:right; font-size:15px; width: 200px;" id="new_application"><i class="material-icons">add</i>New Applicant</button>
                                          <!--From interns, modal was deleted here.-->
                                          <hr class="divider" style="margin: 0 0 50px 0;
                                                                     display: block;
                                                                     border: none;
                                                                     height: 1px;
                                                                      margin-top:10px;
                                                                      margin-bottom:10px;
                                                                      background: #9a9cab;
                                                                     ">
                                          <center>
                                              <div class="col-lg-6">
                                              <label for="position">Position</label>
                                                  <select class="select2" id="position_filter">
                                                    <option value="all"  <?php echo isset($position_id) && $position_id == "all" ? "selected" : '' ?>>All</option>
                                                    <?php foreach($pos as $k => $v): ?>
                                                      <option value="<?php echo $k ?>" <?php echo isset($position_id) && $position_id == $k ? "selected" : '' ?>><?php echo $v ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </center>

                                      </div>
                                  </div>
                                  <center>
                                  <hr class="divider" style="margin: 0 0 50px 0;
                                                                     display: block;
                                                                     width:650px;
                                                                     border: none;
                                                                     height: 1px;
                                                                      margin-top:10px;
                                                                      margin-bottom:10px;
                                                                      background: #9a9cab;
                                                                     ">
                                       </center>
                                      <div class="card-body">
                                          <table id="datatable1" class="display" style="width:100%">
                                              <thead>
                                                  <tr>
                                                  <th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 29.0625px;">#</th>
                                                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Applicant Information: activate to sort column ascending" style="width: 163.153px;">Applicant Information</th>
                                                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 96.108px;">Status</th>
                                                      <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 163.153px;">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  $i = 1;
                                                  $stats = $conn->query("SELECT * FROM recruitment_status order by id asc");
                                                  $stat_arr[0] = "New";
                                                  while ($row = $stats->fetch_assoc()) {
                                                    $stat_arr[$row['id']] = $row['status_label'];
                                                  }
                                                  $awhere = '';
                                                  if(isset($_GET['pid']) && $_GET['pid'] >= 0 && $_GET['pid'] != "all"){
                                                    echo gettype($_GET['pid']);
                                                    $awhere = " where a.process_id = '".$_GET['pid']."' ";
                                                  } else {
                                                    $awhere = " where a.process_id >= 0 ";
                                                  }
                                                  if(isset($_GET['position_id']) && $_GET['position_id'] > 0 && $_GET['position_id'] != "all"){
                                                    if(empty($awhere))
                                                    $awhere = " where a.position_id = '".$_GET['position_id']."' ";
                                                    else
                                                    $awhere .= " and a.position_id = '".$_GET['position_id']."' ";
                                                  } else {
                                                    if(empty($awhere))
                                                    $awhere = " where a.position_id >= 0 ";
                                                    else
                                                    $awhere .= " and a.position_id >= 0 ";
                                                  }
                                                  $application = $conn->query("SELECT a.*,v.position FROM application a inner join vacancy v on v.id = a.position_id $awhere order by a.id asc");
                                                  while($row=$application->fetch_assoc()):
                                                ?>
                                                  <tr role="row" class="odd">
                                                      <td class="text-center sorting_1"><?php echo $i++ ?></td>
                                                      <td class="">
                                                          <p>Name : <b><?php echo ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?></b></p>
                                                          <p>Applied for : <b><?php echo $row['position'] ?></b></p>
                                                      </td>
                                                      <td class="text-center">
                                                          <?php echo $stat_arr[$row['process_id']] ?>
                                                      </td>
                                                      <td>
                                                          <button class="btn btn-secondary view_application" data-bs-toggle="modal" type="button" style="padding:7px" data-id="<?php echo $row['id'] ?>">View</button>
                                                          <button class="btn btn-primary edit_application" style="padding:7px" data-bs-toggle="modal" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
                                                          <button class="btn btn-danger delete_application" type="button" style="padding:7px" data-id="<?php echo $row['id'] ?>">Delete</button>
                                                      </td>
                                                  </tr>
                                                <?php endwhile; ?>
                                              </tbody>

                                          </table>
                                      </div>
                              </div>
                    </div>
                      <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                              <div class="row">
                                  <div class="col-md-12 form-group">
                                  <button class="btn-block  btn filter_status btn-dark" type="button" data-id="all" style="width: 300px; height:30px; margin-bottom:20px;">All</button>
                                  </div>
                              </div>
                              <?php foreach ($stat_arr as $key => $value): ?>
                              <div class="row">
                                  <div class="col-md-12 form-group">
                                  <button class="btn-block  btn filter_status btn-dark" type="button" data-id="<?php echo $key ?>" style="width: 300px; height:30px; margin-bottom:20px;"><?php echo $value ?></button>
                                  </div>
                              </div>
                              <?php endforeach; ?>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
      </div>
  </div>
</div>


<script>
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
	$('.filter_status').each(function(){
		if($(this).attr('data-id') == '<?php echo $pid ?>')
			$(this).addClass('btn-primary')
		else
			$(this).addClass('btn-info')

	})
	$('table').dataTable()
	$("body").on("click", "#new_application", function(){
		uni_modal("New Application","manage_application.php","mid-large")
	})
	$("body").on("click", ".edit_application", function(){
		uni_modal("Edit Application","manage_application.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$("body").on("click", ".view_application", function(){
		uni_modal("","view_application.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('body').on("click", ".delete_application", function(){
		_conf("Are you sure to delete this Applicant?","delete_application",[$(this).attr('data-id')])
	})
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('.filter_status').click(function(){
	location.href = "index.php?page=applications&pid="+$(this).attr('data-id')+'&position_id=<?php echo $position_id ?>'
})
$('#position_filter').change(function(){
	location.href = "index.php?page=applications&position_id="+$(this).val()+'&pid=<?php echo $pid ?>'
})
	function delete_application($id){
		start_load()
		$.ajax({
			url:'../process/ajax.php?action=delete_application',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1000)

				}
			}
		})
	}
</script>
