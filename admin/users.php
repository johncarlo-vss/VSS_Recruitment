<?php include ('../process/db_connect.php');?>

  <div class="app-content">
      <div class="content-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col">
                      <div class="card">
                      <div class="card-header">
                          <div class="col-lg-12">
                              <button id="new_user" type="button" class="btn btn-sm btn-block btn-dark btn-sm col-md-2" style="float:right; font-size:15px;"><i class="material-icons">add</i> New Users</button>
                              <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                      <div class="modal-content">
                                         <div class="modal-header">
                                           <h1 class="modal-title" id="exampleModalLabel">New User</h1>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">

                                              <div class="example-content">
                                                  <div class="form-floating mb-3">
                                                      <input type="text" class="form-control" id="Name" placeholder="Full Name" required>
                                                      <label for="floatingInput">Name</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                      <input type="text" class="form-control" id="username" placeholder="Username" required>
                                                      <label for="floatingInput">Username</label>
                                                  </div>
                                                  <div class="form-floating">
                                                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                                      <label for="floatingPassword">Password</label>
                                                  </div>
                                                  <br>
                                                  <div class="form-floating">
                                                  <label for="floatingPassword">User Type</label>
                                                      <select class="form-select" aria-label="Default select example">
                                                          <option selected>  </option>
                                                          <option value="1">Admin</option>
                                                          <option value="2">Staff</option>

                                                      </select>
                                                  </div>
                                          </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="material-icons">clear</i>Close</button>
                                            <button type="button" class="btn btn-primary"><i class="material-icons">add</i>Add</button>
                                          </div>
                                          </div>
                                      </div>
                                </div> -->
                          </div>
                      </div>
                          <div class="card-body">
                              <table id="datatable1" class="display" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Username</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                             					$users = $conn->query("SELECT * FROM users order by name asc");
                             					$i = 1;
                             					while($row= $users->fetch_assoc()):
                            				?>
                                      <tr>
                                          <td><?php echo $i++ ?></td>
                                          <td><?php echo $row['name'] ?></td>
                                          <td><?php echo $row['username'] ?></td>
                                          <td>
                                            <button type="button" class="btn btn-primary edit_user" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'><i class="material-icons">edit</i>Edit</button>
                                            <button type="button" class="btn btn-danger delete_user" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'><i class="material-icons">delete</i>Delete</button>
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

  $('#new_user').click(function(){
  	uni_modal('New User','manage_user.php')
  })
  $('.edit_user').click(function(){
  	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
  })
  $('.delete_user').click(function(){
  		_conf("Are you sure to delete this user?","delete_user",[$(this).attr('data-id')])
  	})
  	function delete_user($id){
  		start_load()
  		$.ajax({
  			url:'../process/ajax.php?action=delete_user',
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
