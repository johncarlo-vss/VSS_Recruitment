              <div class="app-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                              <form action="" id="manage-status-cat">
                                <div class="card">
                                    <div class="card-header">
                                        Status Form
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <textarea name="status_label" id="stat_name" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-outline-primary col-sm-3 offset-md-3"> Save</button>
                                                <button class="btn btn-sm btn-outline-warning col-sm-3" type="button" onclick="_reset()"> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                            </div>


                    <!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Status Category</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
  								$i = 1;
  								$types = $conn->query("SELECT * FROM recruitment_status where status = 1 order by id asc");
  								while($row=$types->fetch_assoc()):
								?>
								<tr>
                  <td class="text-center" scope="row"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $row['status_label'] ?></td>
									<td class="text-center">
              			<button type="button" class="btn btn-sm btn-primary edit_scat" data-id="<?php echo $row['id'] ?>" data-status_label="<?php echo $row['status_label'] ?>"> Edit</button>
										<button type="button" class="btn btn-sm btn-danger delete_scat" data-id="<?php echo $row['id'] ?>" data-status_label="<?php echo $row['status_label'] ?>">Delete</button>
                  </td>
								</tr>
                <?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
    </div>
  </div>
</div>
</div>

<script>
  function _reset(){
    $('[name="id"]').val('');
    $('#manage-status-cat').get(0).reset();
  }

  $('.edit_scat').click(function(){
    start_load()
    var cat = $('#manage-status-cat')
    cat.get(0).reset()
    cat.find("[name='id']").val($(this).attr('data-id'))
    cat.find("[name='status_label']").val($(this).attr('data-status_label'))
    end_load()
  })

  $('#manage-status-cat').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'../process/ajax.php?action=save_recruitment_status',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				} else {
          alert("Invalid status.");
          location.reload();
        }
			}
		})
	})

  $('.delete_scat').click(function(){
		_conf("Are you sure to delete this recruitment status category","delete_scat",[$(this).attr('data-id')])
	})

  function delete_scat($id){
		start_load()
		$.ajax({
			url:'../process/ajax.php?action=delete_recruitment_status',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					}, 500)
				}
			}
		})
	}
</script>
