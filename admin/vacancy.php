<div class="app-content">
  <div class="content-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <div class="card">
                  <div class="card-header">
                          <div class="col-lg-12">
                              <span style="font-size:30px"><b>Vacancy List</b></span>
                              <button type="button" class="btn btn-sm btn-block btn-dark btn-sm col-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right; font-size:15px;" id="new_vacancy"><i class="material-icons">add</i> New Vacancy</button>
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h2 class="modal-title" id="exampleModalLabel">New Vacancy</h2>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <hr class="divider" style="margin: 0 0 50px 0;
                                                               display: block;
                                                               border: none;
                                                               height: 1px;
                                                               margin-bottom: 0px;
                                                               background: #9a9cab;">
                                      <div class="modal-body">
                                          <div class="example-content">
                                                  <div class="form-floating mb-3">
                                                      <input type="text" class="form-control" id="PName" placeholder="Full Name" required>
                                                      <label for="floatingInput">Position Name</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                      <input type="number" class="form-control" id="Avail" placeholder="Availability" required>
                                                      <label for="floatingInput">Availability</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                   <textarea id="summernote">Enter Some text</textarea>
                                                  </div>
                                          </div>
                                      </div>
                                      <hr class="divider" style="margin: 0 0 50px 0;
                                                               display: block;
                                                               border: none;
                                                               height: 1px;
                                                               margin-bottom: 0px;
                                                               background: #9a9cab;">
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="material-icons">clear</i>Close</button>
                                          <button type="button" class="btn btn-primary"><i class="material-icons">add</i>Add</button>
                                      </div>
                                  </div>
                               </div>
                            </div>
                          </div>
                  </div>
                      <div class="card-body">
                          <table id="datatable1" class="display" style="width:100%">
                            <colgroup>
              								<col width="6%">
              								<col width="40%">
              								<col width="11%">
              								<col width="9%">
              								<col width="29%">
              							</colgroup>
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Vacancy Information</th>
                                      <th>Availability</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                  								$i = 1;
                  								$plan = $conn->query("SELECT * FROM vacancy order by id asc");
                  								while($row=$plan->fetch_assoc()):
                  									$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                  									unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                  									$desc = strtr(html_entity_decode($row['description']),$trans);
                  									$desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                  									// echo htmlentities(strip_tags($desc))
                								?>
                                  <tr>
                                      <td><?php echo $i++ ?></td>
                                      <td>
                                        <p>Position: <b><?php echo $row['position'] ?></b></p>
                                        <p class="truncate"><i><small><?php echo strip_tags($desc) ?></small></i></p>
                                      </td>
                                      <td>
                                        <?php echo $row['availability'] ?>
                                      </td>
                                      <td>
                                        <?php if($row['status'] == 1): ?>
                    											<span class="badge badge-success">Active</span>
                    										<?php else: ?>
                    											<span class="badge badge-danger">Closed</span>
                    										<?php endif; ?>
                                      </td>
                                      <td>
                                        <button class="btn btn-sm btn-primary view_vacancy" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
                                        <button class="btn btn-sm btn-primary edit_vacancy" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
                                        <button class="btn btn-sm btn-danger delete_vacancy" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
  $('table').dataTable()
  $("body").on("click", "#new_vacancy", function(){
  	uni_modal("New Vacancy","manage_vacancy.php","mid-large")
  })
  $("body").on("click", ".edit_vacancy", function(){
  	uni_modal("Edit Vacancy","manage_vacancy.php?id="+$(this).attr('data-id'),"mid-large")
  })
  $("body").on("click", ".view_vacancy", function(){
  	uni_modal("","view_vacancy.php?id="+$(this).attr('data-id'),"mid-large")
  })
  $('body').on("click", ".delete_vacancy", function(){
  	_conf("Are you sure to delete this Vacancy?","delete_vacancy",[$(this).attr('data-id')])
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
  function delete_vacancy($id){
  	start_load()
  	$.ajax({
  		url:'../process/ajax.php?action=delete_vacancy',
  		method:'POST',
  		data:{id:$id},
  		success:function(resp){
  			if(resp==1){
  				alert_toast("Data successfully deleted",'success')
  				setTimeout(function(){
  					location.reload()
  				}, 1500)
  			}
  		}
  	})
  }
</script>
