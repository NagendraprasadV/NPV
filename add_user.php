<?php
include_once 'crud.php';
include('header.php');
?>
     <div class="container">
     <?php
     if(isset($_POST['user_name'])){

        if($cruds->insertData($_POST)){

          echo "<div class='alert alert-success'>User have been created successfully .</div>";
        }
        else {
          echo "<div class='alert alert-danger'>Fail to create user .</div>";
        }

        }
      ?>
        <div class="content mt-5 text-center">
            <div class="card">
                <div class="card-body">
                 <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Name</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" class="form-control" id="text" name="user_name" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Last Name</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" class="form-control" id="text" name="user_last_name" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="email">Email address</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" required="">
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="emp_id">Employee Id</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" class="form-control" id="emp_id" name="emp_id" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <label for="phone">Phone</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" class="form-control" id="phone" name="phone" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <label for="address">Address</label>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                      <textarea name="address" id="address" class="form-control" required=""></textarea>
                    </div>
                  </div>
                </div>
                    <button class="btn btn-success">Submit</button>
                  </form> 
                </div>
            </div>

        </div>
     </div>
<?php
include('footer.php')
?>


