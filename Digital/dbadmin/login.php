<?php
include 'header.php';
include '../dbconn.php';
?>
<?php
if(isset($_SESSION['dbadmin'])){
}
elseif(isset($_SESSION['madmin'])){
}
elseif(isset($_SESSION['user'])){
}
elseif(isset($_SESSION['telecaller'])){
}
elseif(isset($_SESSION['clients'])){
}
else{

}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $user_type = $_POST['user_type'];

    $table_name = $user_type;

    $select_user = $conn->prepare("SELECT * FROM $table_name WHERE email = ? AND password = ?");
    $select_user->execute([$email, $password]);
    if($select_user->rowCount() > 0){
        $choose_user = $select_user->fetch(PDO::FETCH_ASSOC);
        $_SESSION[$table_name] =  $choose_user['admin_id'];
        header('location:../home.php');
    }
}
?>
<!-- HTML Adding Users Page-->
<section class="vh-90 mt-2" style="background: linear-gradient(to right, #28313B , #141466);">
  <div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-5">
        <div class="card shadow-2-strong card-login">
            <div class="card-body p-4">
                <h3 class="mb-4  pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Database Admin Login</h3>
                <form method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-outline">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control p-1 shadow-sm bg-white rounded" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4 d-flex align-items-center">
                            <div class="form-outline datepicker w-100">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control p-1 shadow-sm bg-white rounded" onchange="onChange()" id="birthdayDate" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
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
                    <div class=" pt-2">
                        <input class="btn btn-primary" style="background: linear-gradient(to right, #28313B , #141466);" type="submit" name="login" value="Login" />
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