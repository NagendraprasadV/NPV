<?php
ini_set('display_errors', 1);
error_reporting(1);
include_once 'crud.php';
include_once 'header.php';

?>
     <div class="container">
     <?php

     if(isset($_POST['user_name'])){

        if($cruds->insertData($_POST) == "newUser"){

          echo "<div class='alert alert-success'>User have been created successfully .</div>";
        }
        else if($cruds->insertData($_POST) == "existingUser"){

          echo "<div class='alert alert-info'>User Already Exist .</div>";
        }
        else {
          echo "<div class='alert alert-danger'>Fail to create user .</div>";
        }

        }
      ?>
        <div class="content mt-5 text-center">
            <div class="card">
                <div class="card-body">
                 <form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="user_form">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Name</label>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control" id="user_name" name="user_name" required="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div id="user_name_error_message"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="name">Last Name</label>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control" id="user_last_name" name="user_last_name" required="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div id="user_last_name_error_message"></div>
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
                    <div class="col-sm-4">
                      <div id="email_error_message"></div>
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
                    <div class="col-sm-4">
                      <div id="emp_id_error_message"></div>
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
                    <div class="col-sm-4">
                      <div id="phone_error_message"></div>
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
                    <div class="col-sm-4">
                      <div id="address_error_message"></div>
                    </div>
                  </div>
                    <button class="btn btn-success">Submit</button>
                  </form> 
                </div>
            </div>

        </div>
     </div>
     <script type="text/javascript">
      $(document).ready(function (){

           $("#user_name_error_message").hide();
           $("#email_error_message").hide();
           $("#emp_id_error_message").hide();
           $("#phone_error_message").hide();
           $("#address_error_message").hide();

           var user_name_error = false;
           var user_last_name_error = false;
           var email_error = false;
           var empId_error = false;
           var phone_error = false;
           var address_error = false;

           $('#user_name').focusout(function(){
              validate_username();
           });

           $('#user_last_name').focusout(function(){
              validate_user_last_name();
           });

           $('#email').focusout(function(){
              validate_email();
           });

           $('#emp_id').focusout(function(){
              validate_emp_id();
           });

           $('#phone').focusout(function(){
              validate_phone();
           });

           $('#address').focusout(function(){
              validate_address();
           });

          function validate_username() {
            var pattern = /^[a-zA-Z]*$/;
            var user_name = $("#user_name").val();
            var user_name_length = $("#user_name").val().length;
            if ((pattern.test(user_name)) && (user_name !== '') && (user_name_length > 3)) {
               $("#user_name_error_message").hide();
               $("#user_name").css("border-bottom","2px solid #34F458");
               
            } else {
               $('input[name=user_name]').focus();
               $("#user_name_error_message").html("Username should be valid and only Characters");
               $("#user_name_error_message").show();
               $("#user_name").css("border-bottom","2px solid #F90A0A");
               $("#user_name_error_message").css("color","#F90A0A");

               user_name_error = true;
            }
         }

          function validate_user_last_name() {
            var pattern = /^[a-zA-Z]*$/;
            var user_last_name = $("#user_last_name").val();
            
            if ((pattern.test(user_last_name)) && (user_last_name !== '')) {
               $("#user_last_name_error_message").hide();
               $("#user_last_name").css("border-bottom","2px solid #34F458");
               
            } else {
               $("#user_last_name_error_message").html("last name should be valid and contain only Characters");
               $("#user_last_name_error_message").show();
               $("#user_last_name").css("border-bottom","2px solid #F90A0A");
               $("#user_last_name_error_message").css("color","#F90A0A");
               user_last_name_error = true;
            }
         }

         function validate_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#email").css("border-bottom","2px solid #F90A0A");
               $("#email_error_message").css("color","#F90A0A");
               email_error = true;
            }
         }

         function validate_emp_id() {
            var pattern =/^[a-zA-Z0-9]*$/;
            var emp_id = $("#emp_id").val();
            var emp_id_length = $("#emp_id").val().length;
            if (pattern.test(emp_id) && (emp_id !== '') && emp_id_length < 20) {
               $("#emp_id_error_message").hide();
               $("#emp_id").css("border-bottom","2px solid #34F458");
            } else {
               $("#emp_id_error_message").html("Invalid employee id and it shoud be less than 20 characters");
               $("#emp_id_error_message").show();
               $("#emp_id").css("border-bottom","2px solid #F90A0A");
               $("#emp_id_error_message").css("color","#F90A0A");
               emp_id_error = true;
            }
         }

         function validate_phone() {
            var pattern =/^\d{10}$/;
            var phone = $("#phone").val();
            if (pattern.test(phone) && phone !== '') {
               $("#phone_error_message").hide();
               $("#phone").css("border-bottom","2px solid #34F458");
            } else {
               $("#phone_error_message").html("Invalid Phone Number");
               $("#phone_error_message").show();
               $("#phone").css("border-bottom","2px solid #F90A0A");
               $("#phone_error_message").css("color","#F90A0A");
               phone_error = true;
            }
         }

         function validate_address() {
            var pattern =/^[#.0-9a-zA-Z\s,-]+$/;
            var address = $("#address").val();
            
            if (pattern.test(address) && (address !== '')) {
               $("#address_error_message").hide();
               $("#address").css("border-bottom","2px solid #34F458");
            } else {
               $("#address_error_message").html("Invalid employee id and it shoud be less than 20 characters");
               $("#address_error_message").show();
               $("#address").css("border-bottom","2px solid #F90A0A");
               $("#address_error_message").css("color","#F90A0A");
               address_error = true;
            }
         }  

         $("#user_form").on('submit', function() {
           
           var user_name_error = false;
           var user_last_name_error = false;
           var email_error = false;
           var emp_id_error = false;
           var phone_error = false;
           var address_error = false;

            validate_username();
            validate_user_last_name();
            validate_email();
            validate_emp_id();
            validate_phone();
            validate_address();

           
            if(user_name_error === false && user_last_name_error === false && email_error=== false && emp_id_error === false && phone_error === false && address_error === false){
              
              return true;
            }
            else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });

      })
     </script>
<?php
include('footer.php')
?>


