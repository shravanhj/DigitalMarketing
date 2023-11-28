<?php
include 'header.php';
include 'dbconn.php';
?>
<?php
if(isset($_SESSION['dbadmin'])){
    dbadminArea();
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

function dbadminArea(){
    ?>
    <section class="vh-90 mx-auto" style="background: linear-gradient(to right, #28313B , #141466);">

        <div class="container p-5 mx-auto">

            <div class="card-group justify-content-evenly mt-3">

                <div class="card align-items-center justify-content-center border-0" >
                    <div class="card-body  p-4">
                        <h6 class=" " style="color: linear-gradient(to right, #28313B , #141466);" >Add New Data to Database</h6>
                        <form action="changedata.php" method="post">
                            <div class="col">
                                <div class="form-group">
                                    <select name="add_new" onchange='this.form.submit()' class="form-select form-select-sm p-1 shadow-sm bg-white rounded" required>
                                        <option selected disabled>--Select--</option>
                                        <option value="service_category">Add Service Category</option>
                                        <option value="service_list">Add Service</option>
                                        <option value="subscriptions">Add Subscriptions</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <h5 class="text-light p-4"> OR </h5>

                <div class="card align-items-center justify-content-center border-0" >
                    <div class="card-body p-4">
                        <h6 class=" " style="color: linear-gradient(to right, #28313B , #141466);" >Add New User to Database</h6>
                        <form method="post">
                            <div class="col">
                                <div class="form-group">
                                    <select name="add_user" onchange='this.form.submit()' class="form-select form-select-sm p-1 shadow-sm bg-white rounded" required>
                                        <option selected disabled>--Select--</option>
                                        <option value="user_add" name="user_add" disabled>Add New Company User</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php
}
?>
</section>
<?php include 'footer.php'; ?>

