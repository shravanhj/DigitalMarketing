<?php
include 'header.php';
?>
<!--
<img src="images/mainimage.webp" alt="" style="position:absolute;border-radius:40%; width:500px; height:500px; transform: translateX(-70%); ">
-->
<div class="main-2 text-white" style="background: linear-gradient(to right, #28313B , #141466); width:100%; height:500px;">

<h1 class="fade-in-down" style="text-align:center;padding-top:50px; color:">WILDCAT DIGITAL MARKETING  ಡಿಜಿಟಲ್ ಮಾರ್ಕೆಟಿಂಗ್</h1>
<p class="fs-4" style="text-align:center; padding-top:50px;">ou can use any type of digital marketing channel including social media, email, and content marketing to engage potential consumers.</p>

</div>



<div class="container-fluid" id="features">
    <h2 class="text-muted text-dark text-center mt-4">Why Choose us ?</h2>
    <hr class="mt-2 mb-3"  style="width:30%; margin:auto; border: 1px solid black">
    <div class="container-fluid d-flex align-items-center justify-content-evenly">

    <div class="card" style="width: 9rem; border:0px;">
      <img class=" card-image mx-auto image-fluid" src="images/features (1).jpg" width="100px" height="100px" alt="features image">
      <div class="card-body">
        <h5 class="text-center">Customised Service</h5>
      </div>
    </div>

    <div class="card" style="width: 10rem; border:0px; ">
      <img class="card-image mx-auto image-fluid" src="images/features (1).png" width="100px" height="100px" alt="features image">
      <div class="card-body">
        <h5 class="text-center">Services at Low Cost</h5>
      </div>
    </div>
    <div class="card" style="width: 10rem; border:0px;">
      <img class="card-image mx-auto image-fluid" src="images/features (2).png" width="100px" height="100px" alt="features image">
      <div class="card-body">
        <h5 class="text-center">Customer Support</h5>
      </div>
    </div>
  </div>
</div>

<!--Service Section start-->
  <h2 class="text-muted text-center mt-4">What we do</h2>
  <hr class="mt-2 mb-3"  style="width:30%; margin:auto; border: 1px solid black">
<!--First Service-->
    <div class="card-group justify-content-evenly mt-3">
      <?php
      $select_service = $conn->prepare("SELECT * FROM `service_category` ORDER BY id ASC LIMIT 3");
      $select_service->execute();
      if($select_service->rowCount() > 0){
        while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="card align-items-center justify-content-center border-0" >
            <div class="card-body">
              <a href="welcome.php?service=<?= $row['service_name'];?>">
              <img class="card-img-top mx-auto" src="images/<?= $row['service_image'];?>" style="width:250px; height:150px;">
              <h4 class="card-title bg-primary p-2 text-success rounded text-center"><?= $row['service_title'];?></h4>
              </a>
              
            </div>
          </div>
          <?php
        }
      }
      ?>

    </div>
<!--First service-->
<!--Second Service-->
<div class="card-group justify-content-evenly mt-3">
      <?php
      $select_service = $conn->prepare("SELECT * FROM `service_category` ORDER BY id DESC LIMIT 3");
      $select_service->execute();
      if($select_service->rowCount() > 0){
        while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="card align-items-center justify-content-center border-0" >
            <div class="card-body">
              <a href="servicepage.php?service=<?= $row['service_name'];?>">
              <img class="card-img-top mx-auto" src="images/<?= $row['service_image'];?>" style="width:250px; height:150px;">
              <h4 class="card-title bg-primary p-2 text-success rounded text-center"><?= $row['service_title'];?></h4>
            </a>
            </div>
          </div>
          <?php
        }
      }
      ?>

</div>
<!--Second Service-->
<!--Service Section end-->


<div class="container bg-success p-1 mt-4" id="clients">
    <h2 class="text-muted text-center mt-4">Our Pricing Plans</h2>
    <hr class="mt-2 mb-3"  style="width:30%; margin:auto; border: 1px solid black">
    <div class="card-group justify-content-evenly mt-3">

    <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-bold">Basic</h5>
          <div class=" mt-2">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Promotion</li>
              <li class="list-group-item">Leads Generating</li>
              <li class="list-group-item">SMS/Email Boosting</li>
              <li class="list-group-item">Google Ads</li>
              <li class="list-group-item"></li>
            </ul>
            <h6 class="card-text">Price : 1599/-</h6>
            <h6 class="card-text">Validity : 5 Days</h6>
          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Silver</h5>
          <div class=" mt-2">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Promotion</li>
              <li class="list-group-item">Google Ratings</li>
              <li class="list-group-item">Leads Generating</li>
              <li class="list-group-item">Graphic Design</li>
              <li class="list-group-item"></li>
            </ul>
            <h6 class="card-text">Price : 1799/-</h6>
            <h6 class="card-text">Validity : 30 Days</h6>
          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gold</h5>
          <div class=" mt-2">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Promotion</li>
              <li class="list-group-item">Google Ratings</li>
              <li class="list-group-item">Leads Generating</li>
              <li class="list-group-item">Graphic Design</li>
              <li class="list-group-item"></li>
            </ul>
            <h6 class="card-text">Price : 17990/-</h6>
            <h6 class="card-text">Validity : 90 Days</h6>
          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>

    </div>
  </div>
</div>
<?php include 'footer.php';?>