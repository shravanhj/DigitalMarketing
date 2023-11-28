<?php include 'header.php';?>
<?php include 'dbconn.php';?>


<?php
if(isset($_GET['service'])){
    $selected_service = $_GET['service'];
}
else{
    header('Location:error.php');
}
?>

<?php
$select_service_category = $conn->prepare("SELECT * FROM `service_category` WHERE service_name = ?");
$select_service_category->execute([$selected_service]);
if($select_service_category->rowCount() > 0){
    $row = $select_service_category->fetch(PDO::FETCH_ASSOC);
}
?>
<img class="img-fluid d-block mx-auto mt-3 w-50" src="images/<?= $row['service_image'];?>" height="200" style="margin-top:5px; margin-bottom:5px;">

    <div class="container mb-5">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;"><?= $row['service_title'];?></h1>
    <p class="card-title mb-4 fs-6 w-75"><?= $row['service_detail'];?></p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;"><?= $row['service_works'];?></h4> 
    <div class="card-group">
        <?php
        $select_service = $conn->prepare("SELECT * FROM `services` WHERE service_category = ?");
        $select_service->execute([$selected_service]);
        if($select_service->rowCount() > 0){
            while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
                ?>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-danger"><?= $row['service_name'];?></h4>
                                    <img src="images/<?= $row['service_image'];?>" width="80" height="80" />
                                    <h6 class="card-title text-dark"><small>Price : Rs.<s><?=$row['service_price'];?>/</s></small> Rs. <?=$row['offer_price'];?>/-</h6>
                                    <p class="card-text"><?=$row['service_details'];?></p>
                                    </div>
                            </div>
                <?php

            }
        }
        ?>
    
    </div>
  </div>
</div>

<?php
    $select_service = $conn->prepare("SELECT * FROM `subscriptions` WHERE subscription_category = ? ");
    $select_service->execute([$selected_service]);
    if($select_service->rowCount() > 0){
    ?>
    <div class="container" id="clients">
    <h2 class="text-muted text-center mt-4">Select Based on Price</h2>
    <hr class="mt-2 mb-3"  style="width:30%; margin:auto; border: 1px solid black">
    <div class="card-group justify-content-evenly mt-3">
        <?php
            while($row = $select_service->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title"><?= $row['subscription_name'];?></h4>
                        <div class=" mt-2">
                        
                            <ul class="list-group list-group-flush">
                            <?php
                            $sub_detail = explode(", ", $row['subscription_details']);
                                foreach ($sub_detail as $sub){
                                    echo '<li class="list-group-item"><i class="fa fa-right me-2"></i>'.$sub.'<br>';
                                }
                            ?>
                            <li class="list-group-item">
                            </ul>
                        </div>
                        </div>
                        <div class="card-footer">
                            <h6 class="card-text"><small>Rs.<s><?=$row['subscription_price'];?>/</s></small> Rs. <?=$row['offer_price'];?>/-</h6>
                            <h6 class="card-text">Validity : <?=$row['validity'];?> Days</h6>
                        </div>
                    </div>
                <?php
            }
        }
        ?>

    </div>
  </div>
</div>



























<?php

function WebDesign(){
    ?>
    <div class="container-fluid w-80">
    <div class="mx-auto" style="width:75%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign.png" alt="WebDesign" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign2.png" alt="webdesign2" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign3.png" alt="webdesign3" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="container-fluid">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;">Web Designing</h1>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">What is Web Designing?</h4>
    <p class="card-title mb-4">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">Pricing</h4>
    <p class="card-title mb-3">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
            </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Front End with Backend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">25000 + 1500 per Month Maintanance  </li>
                    <li class="list-group-item">25000 + 15000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>
    
    </div>
  </div>
</div>
    <?php
}

function graphicDesign(){
    ?>
    <div class="container-fluid w-80">
    <div class="mx-auto" style="width:75%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign.png" alt="WebDesign" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign2.png" alt="webdesign2" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign3.png" alt="webdesign3" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="container-fluid">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;">Web Designing</h1>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">What is Web Designing?</h4>
    <p class="card-title mb-4">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">Pricing</h4>
    <p class="card-title mb-3">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Frontend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">15000 + 1000 per Month Maintanance  </li>
                    <li class="list-group-item">15000 + 10000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Front End with Backend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">25000 + 1500 per Month Maintanance  </li>
                    <li class="list-group-item">25000 + 15000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>
    
    </div>
  </div>
</div>
    <?php
}

function Adsense(){
    ?>
    <div class="container-fluid w-80">
    <div class="mx-auto" style="width:75%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign.png" alt="WebDesign" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign2.png" alt="webdesign2" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign3.png" alt="webdesign3" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="container-fluid">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;">Web Designing</h1>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">What is Web Designing?</h4>
    <p class="card-title mb-4">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">Pricing</h4>
    <p class="card-title mb-3">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Frontend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">15000 + 1000 per Month Maintanance  </li>
                    <li class="list-group-item">15000 + 10000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Front End with Backend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">25000 + 1500 per Month Maintanance  </li>
                    <li class="list-group-item">25000 + 15000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>
    
    </div>
  </div>
</div>
    <?php
}

function leadsGenerate(){
    ?>
    <div class="container-fluid w-80">
    <div class="mx-auto" style="width:75%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign.png" alt="WebDesign" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign2.png" alt="webdesign2" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign3.png" alt="webdesign3" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="container-fluid">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;">Web Designing</h1>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">What is Web Designing?</h4>
    <p class="card-title mb-4">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">Pricing</h4>
    <p class="card-title mb-3">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Frontend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">15000 + 1000 per Month Maintanance  </li>
                    <li class="list-group-item">15000 + 10000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Front End with Backend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">25000 + 1500 per Month Maintanance  </li>
                    <li class="list-group-item">25000 + 15000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>
    
    </div>
  </div>
</div>
    <?php
}

function smsBoosting(){
    ?>
    <div class="container-fluid w-80">
    <div class="mx-auto" style="width:75%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign.png" alt="WebDesign" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign2.png" alt="webdesign2" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
            <div class="carousel-item">
            <img class="d-block mx-auto mt-3 w-75" src="images/webdesign3.png" alt="webdesign3" height="300px" style="object-fit:cover; margin-top:5px; margin-bottom:5px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>


    <div class="container-fluid">
    <div class="card-body">
    <h1 class="card-title mb-3" style="text-transform:capitalize;">Web Designing</h1>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">What is Web Designing?</h4>
    <p class="card-title mb-4">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    <h4 class="card-title mb-2" style="text-transform:capitalize;">Pricing</h4>
    <p class="card-title mb-3">Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate.</p>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Frontend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">15000 + 1000 per Month Maintanance  </li>
                    <li class="list-group-item">15000 + 10000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title text-danger">Web Designing with Front End with Backend</h5>
                <p class="card-text">Front-end web development is the process of designing and building the graphical user interface (GUI)</p>
                <h5 class="card-title text-success">Price</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">25000 + 1500 per Month Maintanance  </li>
                    <li class="list-group-item">25000 + 15000 per Year Maintanance</li>
                </ul>
            </div>
            </div>
        </div>
    
    </div>
  </div>
</div>
    <?php
}
?>

    </div>
<?php include 'footer.php';?>