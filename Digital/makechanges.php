<?php
include 'header.php';
include 'dbconn.php';
?>

<?php
if(isset($_SESSION['dbadmin'])){
    $admin_id = $_SESSION['dbadmin'];
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

if(isset($_POST['update_database'])){
    $selected_item = $_POST['update_database'];
    if($selected_item == 'services'){
        updateServices();
    }
    elseif($selected_item == 'subscriptions'){
        updateSubscriptions();
    }
}

if(isset($_POST['add_user'])){
    $selected_item = $_POST['add_user'];
    echo $selected_item;
}

if(isset($_POST['add_service'])){
    $name = ucfirst($_POST['servicename']);
    $price = $_POST['serviceprice'];
    $offer_price = $_POST['offerprice'];
    $description = ucfirst($_POST['description']);
    $subscriptions = implode(', ', $_POST['subscriptions']);
    
    $insert_data = $conn->prepare("INSERT INTO `services` (service_name, 	service_price, offer_price, subscription_supports, service_details) VALUE (?, ?, ?, ?, ?)");
    $insert_data->execute([$name, $price, $offer_price, $subscriptions, $description]);

    if($insert_data){
        echo "<script type='text/javascript'>alert('Services Data Added Successfully.');</script>
        <script type='text/javascript'>window.close();</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Failed to Add Data.');</script>";
    }
}

if(isset($_POST['add_subscription'])){
    $name = ucfirst($_POST['subscriptionname']);
    $price = $_POST['subscriptionprice'];
    $offer_price = $_POST['offerprice'];
    $details = ucfirst($_POST['description']);
    $validity = $_POST['subscriptionvalidity'];
    
    $insert_data = $conn->prepare("INSERT INTO `subscriptions` (subscription_name, 	subscription_price, offer_price, subscription_details, validity) VALUE (?, ?, ?, ?, ?)");
    $insert_data->execute([$name, $price, $offer_price, $details, $validity]);

    if($insert_data){
        echo "<script type='text/javascript'>alert('Subscription Data Added Successfully.');</script>
        <script type='text/javascript'>window.close();</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Failed to Add Data.');</script>";
    }

}

if(isset($_POST['update_service'])){
    $name = ucfirst($_POST['servicename']);
    $price = $_POST['serviceprice'];
    $offer_price = $_POST['offerprice'];
    $description = ucfirst($_POST['description']);
    $subscriptions = implode(', ', $_POST['subscriptions']);

    $update_data = $conn->prepare("UPDATE `services` SET service_name = ?, 	service_price = ?, offer_price = ?, subscription_supports = ?, service_details = ? ");
    $update_data->execute([$name, $price, $offer_price, $subscriptions, $description]);

    if($update_data){
        echo "<script type='text/javascript'>alert('Subscription Data Added Successfully.');</script>
        <script type='text/javascript'>window.close();</script>";
    }
}
function addSubscriptions(){
    ?>
<div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-9 col-xl-7">
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            <h3 class="mb-4 pb-2 pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Add Subscription Plan Details</h3>
            <form method="post">

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subscription ID</label>
                            <input type="text" name="" value="Auto Generates" class="form-control-sm form-control" disabled />
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subscription Name</label>
                            <input type="text" name="subscriptionname" id="subscriptionname" class="form-control-sm form-control" required />
                        </div>

                    </div>
                 </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subscription Price</label>
                            <input type="text" name="subscriptionprice" min="999" max="99999" id="subscriptionprice" class="form-control-sm form-control" required/>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subscription Price</label>
                            <input type="text" name="offerprice" id="offerprice" min="999" max="99999" class="form-control-sm form-control" required />
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col mb-4 d-flex align-items-center">
                        <div class="form-outline datepicker w-100">
                            <label>Subscription Description (Max:500Characters)</label>
                            <textarea name="description" class="form-control form-control p-1 shadow-sm bg-white rounded" rows="1" required></textarea>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Validity</label>
                            <input type="text" name="subscriptionvalidity" min="1" max="99" class="form-control-sm form-control" required/>
                        </div>

                    </div>

                </div>

                <div class=" pt-2">
                    <input class="btn btn-primary" style="background: linear-gradient(to right, #28313B , #141466);" type="submit" name="add_subscription" value="Add Subscription" />
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
function updateServices(){
    include 'dbconn.php';
    $select_service = $conn->prepare("SELECT * FROM `SERVICES`");
    $select_service->execute();
    if($select_service->rowCount() > 0){
        ?>
        <div class="container">
            <h3 class="text-danger ml-4">List of Services in DB : </h3>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Offer Price</th>
                    <th scope="col">Subscriptions</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <form method="post" id="updateservices">
                        <tr>
                            <th scope="row"><input type="text" class="form-control-sm form-control" name="id" value="<?= $row['id'];?>" disabled></th>
                            <td><input type="text" class="form-control-sm form-control" name="servicename" value="<?= $row['service_name'];?>" disabled></td>
                            <td><input type="text" class="form-control-sm form-control" name="serviceprice" value="<?= $row['service_price'];?>" disabled></td>
                            <td><input type="text" class="form-control-sm form-control" name="offerprice" value="<?= $row['offer_price'];?>" disabled></td>
                            <td><input type="text" class="form-control-sm form-control" name="subscriptions[]" value="<?= $row['subscription_supports'];?>" disabled></td>
                            <td><textarea name="description" class="form-control form-control p-1 shadow-sm bg-white rounded" rows="1" disabled><?= $row['service_details'];?></textarea></td>
                    </tr>
                    </form>     
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <input type="submit" class="btn btn-dark" value="Make Changes" onclick="changeState()">
        </div>
        <?php
    }
}
function updateSubscriptions(){
    echo '<h1> Update Subscriptions Selected</h1>';
}

?>
</section>
<script>
function changeState(){
var form = document.getElementById("updateservice");
var elements = form.elements;
for (var i = 0, len = elements.length; i < len; ++i) {
    elements[i].disabled = false;
}
}
</script>
<?php include 'footer.php';?>