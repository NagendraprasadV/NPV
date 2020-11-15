<?php
session_start();
include_once 'crud.php';


$fetchData = $cruds->fetchData();

// $insertData = $cruds->insertData();

include_once 'header.php';

?>
     <div class="container">
        <div class="content mt-5 text-center">
        <?php
          if(isset($_POST['first_name'])){
           
            if($cruds->updateData($_POST,$_POST['id'])){

              echo "<div class='alert alert-success'>User has been Updated successfully and Reload the page.</div>";
            }
            else {
              echo "<div class='alert alert-danger'>Fail to update user .</div>";
            }

        }
        ?>
            <div class="card">
                <div class="card-body">
                <form action="deleteUser.php" method="post">
                <table class="table table-bordered" id="user_table"> 
                    <thead>
                      <tr>
                          <th><input type="checkbox" name="check" id="check"  title="Click here to select multiple users"/></th>
                          <th>Sl NO</th>
                          <th>Name</th>
                          <th>Email Id</th>
                          <th>Employee Id</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 1;
                      while($user = $fetchData->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <tr>
                        <td><input type="checkbox" name="selectUseId[]" value="<?=$user['id']?>"  /></td>
                        <td><?= $i; ?></td>
                        <td><?= ucfirst($user['first_name'].' '.$user['last_name']) ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['emp_id'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><a href="" class="userModal" data-id="<?=$user['id']?>" data-toggle="modal" data-target="#updateModal"  title="Click here to update User"><i class="fa fa-pencil-square-o"></i></a>  |  <a href="deleteUser.php?id=<?=$user['id']?>"  title="Click here to delete Users" onclick="return confirm('Are you sure you want to paramanently delete this item?');"><i class="fa fa-trash-o btn-danger"></i></a></td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                    </tbody>
                    </table>
                    <input type="submit" name="deleteSelectedIds" value="Delete Selected User" class="btn btn-warning text-left" onclick="return confirm('Are you sure you want to paramanently delete this item?');"> 
                    </form> 
                </div>
            </div>

        </div>

        <!------- update user Modal ---->
         
        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                </div>
                <div class="modal-body">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="updateUser">
                <input type="hidden" name="id" id="id" />
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Name</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="first_name" name="first_name" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Last Name</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="last_name" name="last_name" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="email">Email address</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="emp_id">Employee Id</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="emp_id" name="emp_id" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <label for="phone">Phone</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="phone" name="phone" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <label for="address">Address</label>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <textarea name="address" id="address" class="form-control" required=""></textarea>
                    </div>
                  </div>
                </div>
                    <button class="btn btn-success">Submit</button>
                  </form> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>


     </div>
     <script>
     $(document).ready(function(){
       $('.userModal').click(function(){
         var id = $(this).data('id');
         $.ajax({
           type: "POST",
           url: "updateUser.php",
           data: {id:id},
           dataType: "JSON",
           success: function (response) {
             //console.log(response);
             $('#id').val(response.id);
             $('#first_name').val(response.first_name);
             $('#last_name').val(response.last_name);
             $('#email').val(response.email);
             $('#emp_id').val(response.emp_id);
             $('#phone').val(response.phone);
             $('#address').val(response.address);
           }
         });
       })
     })
     </script>
<?php
include('footer.php')
?>


