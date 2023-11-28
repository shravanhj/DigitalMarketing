<?php
include 'header.php';
include 'dbconn.php';
?>

<?php
if(isset($_GET['service'])){
    $selected_service = $_GET['service'];
}
else{
    header('Location:error.php');
}

$select_service_category = $conn->prepare("SELECT * FROM `service_category` WHERE service_name = ?");
$select_service_category->execute([$selected_service]);
if($select_service_category->rowCount() > 0){
    $row = $select_service_category->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container mb-5 mt-5">
    <h2 class="text-danger  mb-4"><?= $row['service_title'];?></h2>

    <div class="row justify-content-center align-items-center">
        <div class="col-sm">
            <div class="">
                <img class="img-fluid d-block mx-auto mt-3 w-50" src="images/<?= $row['service_image'];?>" height="200" style="margin-top:5px; margin-bottom:5px;">   
            </div>
        </div>
        <div class="col-sm-5">
            <div class="">
                <h5 class="text-primary">Why Company Promotion with Wildcat?</h5>
                <p class="text"><?= $row['service_detail'];?></p>
                <input type="submit" class="btn btn-outline-success" value="Chat with us on Whatsapp">
                <input type="submit" class="btn btn-outline-primary" value="Get a CallBack">
            </div>
            </div>
        </div>
    </div>

</div>

<?php
$select_service = $conn->prepare("SELECT * FROM `services` WHERE service_category = ?");
$select_service->execute([$selected_service]);
if($select_service->rowCount() > 0){
?>
<div class="container mb-5 ">

    <h5 class="">Service We offer in Company Promotion. (Price: If Service Selected as Individually) :-</h5>
    <div class="row justify-content-center">
        <?php
        while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="col-sm-5 mt-3">
            <div class="border border-primary shadow rounded p-3">
                <h4 class="text-dark"><?= $row['service_name'];?></h4>
                <!--<p><small><s>Rs. <?=$row['service_price'];?>/-</s></small> <b class="text-success">Rs. <?=$row['offer_price'];?>/-</b></p>-->
            </div>
        </div>
        <?php
        }
        ?>
    </div>

</div>
    <?php
    }
?>


<?php
    $select_service = $conn->prepare("SELECT * FROM `subscriptions` WHERE subscription_category = ? ");
    $select_service->execute([$selected_service]);
    if($select_service->rowCount() > 0){
    ?>
<div class="container mb-5">
    <h5 class="">Choose the best Subscription Plans :-</h5>
    <form method="post">
    <div class="row justify-content-center">
    <?php
            while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
                ?>
            <div class="col-sm-4 mt-2">
                <div class="border border-primary shadow rounded p-3">
                    <h5 class="text-dark fw-bold"><?= $row['subscription_name'];?></h5><small>Includes</small>
                    <ul class="list-group list-group-flush ">
                    <?php
                    $sub_detail = explode(", ", $row['subscription_details']);
                    foreach ($sub_detail as $sub){
                        echo '<li class="list-group-item"><i class="fa fa-right me-2"></i>'.$sub.'<br>';
                     }
                     ?>
                     <li class="list-group-item">
                    </ul>
                    <button class="btn btn-success">Select</button>
                </div>
            </div>
            <?php
            }
            ?>
        
    </div>
    </form>
</div>
<?php
    }
    ?>
<div class="container rounded shadow bg-primary text-light p-4 w-75" >
    <h4 class="text-center">Feel Free to contact us, our Team is Available 24*7 to your support.</h4>
    <input type="submit" class="btn btn-success" value="Get a CallBack">
    </div>

    <?php include 'footer.php';?>