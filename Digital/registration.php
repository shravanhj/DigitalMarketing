<?php
include 'header.php';
include 'dbconn.php';
?>
<!--php Code to Add user into database-->
<?php
if(isset($_POST['add_user'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];

    $name = $first_name . $last_name;
    $new_password = sha1($password);
    $table_name = $user_type; 

    $check_users = $conn->prepare("SELECT * FROM $table_name WHERE email = ?");
    $check_users->execute([$email]);

    if($check_users->rowCount() > 0){
        echo "<script type='text/javascript'>alert('User Already Registered.');window.location.href='#';</script>";  
    }
    else{
        try{
            $insert_user = $conn->prepare("INSERT INTO $table_name (name, email, phone, password, password2) VALUES (?, ?, ?, ?,?)");
            $insert_user->execute([$name, $email, $phone, $new_password, $password]);
            if($insert_user){
                $select_user = $conn->prepare("SELECT * FROM $table_name WHERE email = ?");
                $select_user->execute([$email]);
                $choose_user = $select_user->fetch(PDO::FETCH_ASSOC);
                $id_name = substr($table_name, 0, 3);
                $ids = $id_name.$choose_user['id'];
                
                $update_table = $conn->prepare("UPDATE $table_name SET admin_id = ?");
                $update_table->execute([$ids]);
                echo "<script type='text/javascript'>alert('User Registered successfully.');window.location.href='#';</script>";  

            }
        }
        catch(Exception $e){
            echo $e;
        }
    }

}
?>


<!-- HTML Adding Users Page-->
<section class="vh-90 mt-2" style="background: linear-gradient(to right, #28313B , #141466);">
  <div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-9 col-xl-7">
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            <h3 class="mb-4 pb-2 pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Add Company Users</h3>
            <form method="post">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstName" class="form-control-sm form-control" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastName" class="form-control-sm form-control" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label">User Email</label>
                    <input type="email" name="email" id="email" class="form-control-sm form-control" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label">User Phone No.</label>
                    <input type="tel" name="phone" id="mobile_number" class="form-control-sm form-control" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm" min="8" onchange="onChange()"/>
                  </div>

                </div>

                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control form-control-sm" onchange="onChange()"/>
                  </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                      <label class="form-label">User type</label>
                      <select name="user_type" class="form-select form-select-sm p-1 shadow-sm bg-white rounded" required>
                        <option selected disabled>--Select--</option>
                        <option value="dbadmin">Database Admin</option>
                        <option value="madmin">Management Admin</option>
                        <option value="user">CompanyUser</option>
                        <option value="telecaller">Telecaller</option>
                        <option value="clients">Clients</option>
                      </select>
                    </div>
                  </div>

                </div>

                <div class=" pt-2">
                    <input class="btn btn-primary" style="background: linear-gradient(to right, #28313B , #141466);" type="submit" name="add_user" value="Add User" />
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function onChange() {
  const password = document.querySelector('input[name=password]');
  const confirm = document.querySelector('input[name=confirm_password]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}
</script>

<?php include 'footer.php';?>