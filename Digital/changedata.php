<?php
include 'header.php';
include 'dbconn.php';
?>

<?php

if(isset($_POST['add_new'])){
    $selected_item = $_POST['add_new'];
    if($selected_item == 'service_list'){
        addService();
    }
    elseif($selected_item == 'subscriptions'){
        addSubscriptions();
    }

    elseif($selected_item == 'service_category'){
        addServiceCategory();
    }
}

if(isset($_POST['add_category'])){
    $title = $_POST['service_title'];
    $category_name = $_POST['service_name'];
    $category_details = $_POST['service_description'];
    $service_works = $_POST['service_works'];

    $insert_category = $conn->prepare("INSERT INTO `service_category` (service_title, service_name, service_detail, service_works) VALUE (?, ?, ?, ?)");
    $insert_category->execute([$title, $category_name, $category_details, $service_works]);
    if($insert_category){
        echo "<script type='text/javascript'>alert('Data Added Successfully.');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Failed to Add. Please Try again.');</script>";
    }
}

if(isset($_POST['add_service'])){
    $service_name = $_POST['servicename'];
    $service_price = $_POST['serviceprice'];
    $service_offer_price = $_POST['offerprice'];
    $service_details = $_POST['description'];
    $service_category = $_POST['category'];

    $insert_service = $conn->prepare("INSERT INTO `services` (service_name, service_category, service_price, offer_price, service_details) VALUE (?, ?, ?, ?, ?)");
    $insert_service->execute([$service_name, $service_category, $service_price, $service_offer_price, $service_details]);
    if($insert_service){
        echo "<script type='text/javascript'>alert('DataSuccessfully.');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Failed to Add. Please Try again.');</script>";
    }
}

if(isset($_POST['add_subscription'])){
    $name = $_POST['subscriptionname'];
    $price = $_POST['subscriptionprice'];
    $offer_price = $_POST['offerprice'];
    $category = $_POST['category'];
    $validity = $_POST['validity'];
    $subscription_includes = implode(', ',$_POST['services']);

    $insert_subscription = $conn->prepare("INSERT INTO `subscriptions` (subscription_name, subscription_category, subscription_price, offer_price, subscription_details, validity) VALUE (?, ?, ?, ?, ?, ?)");
    $insert_subscription->execute([$name, $category, $price, $offer_price, $subscription_includes, $validity]);
    if($insert_subscription){
        echo "<script type='text/javascript'>alert('Data Added Successfully.');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Failed to Add. Please Try again.');</script>";
    }
}

function addServiceCategory(){
    include 'dbconn.php';
    ?>
  <div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-9 col-xl-7">
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            <h3 class="mb-4 pb-2 pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Add Service Category Details</h3>
            <form method="post">

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Title (Tobe Displayed on Webpage).(EX: Promotion, Boosting, Designing)</label>
                            <input type="text" name="service_title" id="servicename" class="form-control-sm form-control" required />
                        </div>

                    </div>
                 </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Category Name(Ex: googleRatings, smsBoosting)</label>
                            <input type="text" name="service_name" min="999" max="99999" id="serviceprice" class="form-control-sm form-control" required/>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col mb-4 d-flex align-items-center">
                        <div class="form-outline datepicker w-100">
                            <label>Category Description (Max:500Characters)</label>
                            <textarea name="service_description" class="form-control form-control p-1 shadow-sm bg-white rounded" rows="1" required></textarea>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col mb-4 d-flex align-items-center">
                        <div class="form-outline datepicker w-100">
                            <label>Category Tagline (Max:200Characters)</label>
                            <textarea name="service_works" class="form-control form-control p-1 shadow-sm bg-white rounded" rows="1" required></textarea>
                        </div>
                    </div>

                </div>

                <div class=" pt-2">
                    <input class="btn btn-primary" style="background: linear-gradient(to right, #28313B , #141466);" type="submit" name="add_category" value="Add Category" />
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

function addService(){
    include 'dbconn.php';
    ?>
  <div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-9 col-xl-7">
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            <h3 class="mb-4 pb-2 pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Add Service Detals</h3>
            <form method="post">

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Service ID</label>
                            <input type="text" name="" value="Auto Generates" class="form-control-sm form-control" disabled />
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Service Name</label>
                            <input type="text" name="servicename" id="servicename" class="form-control-sm form-control" required />
                        </div>

                    </div>
                 </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Service Price</label>
                            <input type="text" name="serviceprice" min="999" max="99999" id="serviceprice" class="form-control-sm form-control" required/>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Offer Price</label>
                            <input type="text" name="offerprice" id="offerprice" min="999" max="99999" class="form-control-sm form-control" required />
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col mb-4 d-flex align-items-center">
                        <div class="form-outline datepicker w-100">
                            <label>Service Description (Max:500Characters)</label>
                            <textarea name="description" class="form-control form-control p-1 shadow-sm bg-white rounded" rows="1" required></textarea>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label class="form-label">Service Category</label>
                        <!--use Backend from here-->
                                <div class="form-group">
                                    <select name="category" class="form-select form-select-sm p-1 shadow-sm bg-white rounded" required>
                                        <option selected disabled>--Select--</option>
                                        <?php
                                        $select_category = $conn->prepare("SELECT * FROM `service_category`");
                                        $select_category->execute();
                                        if($select_category->rowCount() > 0){
                                            while($row = $select_category->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                        <option value="<?= $row['service_name'];?>"><?= $row['service_title'];?></option>
                                        <?php
                                    }
                        }
                        ?>
                                    </select>
                                </div>
                        <!--End Back End here-->
                    </div>
                </div>

                <div class=" pt-2">
                    <input class="btn btn-primary" style="background: linear-gradient(to right, #28313B , #141466);" type="submit" name="add_service" value="Add Service" />
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

function addSubscriptions(){
    include 'dbconn.php';
    ?>
  <div class="container p-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-9 col-xl-7">
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            <h3 class="mb-4 pb-2 pb-md-0" style="color: linear-gradient(to right, #28313B , #141466);" >Add Subscription</h3>
            <form method="post">

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subsccription ID</label>
                            <input type="text" name="" value="Auto Generates" class="form-control-sm form-control" disabled />
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label">Subscrption Name</label>
                            <input type="text" name="subscriptionname" id="servicename" class="form-control-sm form-control" required />
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
                            <label class="form-label">Offer Price</label>
                            <input type="text" name="offerprice" id="offerprice" min="999" max="99999" class="form-control-sm form-control" required />
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label class="form-label">Service Category</label>
                        <!--use Backend from here-->
                                <div class="form-group">
                                    <select name="category" class="form-select form-select-sm p-1 shadow-sm bg-white rounded" required>
                                        <option selected disabled>--Select--</option>
                                        <?php
                                        $select_category = $conn->prepare("SELECT * FROM `service_category`");
                                        $select_category->execute();
                                        if($select_category->rowCount() > 0){
                                            while($row = $select_category->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                        <option value="<?= $row['service_name'];?>"><?= $row['service_name'];?></option>
                                        <?php
                                    }
                        }
                        ?>
                                    </select>
                                </div>
                        <!--End Back End here-->
                    </div>

                    <div class="col mb-4 d-flex align-items-center">
                        <div class="form-outline datepicker w-100">
                            <label>Subscription Validity(In Days)</label>
                            <input type="text" name="validity" id="offerprice" min="999" max="99999" class="form-control-sm form-control" required />
                        </div>
                    </div>

                </div>

                <div class="row">
                    <label>Subscription Includes(Select services from above selected Category)</label>
                    <?php
                    $select_service = $conn->prepare("SELECT * FROM `services`");
                    $select_service->execute();
                    if($select_service->rowCount() > 0){
                        while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <div class="mb-2 form-check">
                                <label class="form-check-label"><?= $row['service_name'];?>(Category: <?= $row['service_category'];?>)</label>
                                <input type="checkbox" class="form-check-input" id="Check1" name="services[]" value="<?= $row['service_name'];?>">
                            </div>
                            <?php
                        }
                    }
                    ?>          
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

?>