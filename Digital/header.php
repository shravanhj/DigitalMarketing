<?php include 'dbconn.php';?>
<!DOCTYPE html>
<html>
    <header>
        <title>Wildcat Digital Marketing</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="bootstrap.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--
        <style>
            
            @keyframes slidetopbottom {
              0% {
                transform: translateY(-100%);
              }
              100% {
                transform: translateY(0);
              }
            }

            nav {
              animation: 3s linear 0s 1 slidetopbottom;
            }
            @keyframes slideleftright {
              0% {
                transform: translateX(-100%);
                opacity: 0.5;
              }
              100% {
                transform: translateX(0);
                opacity: 1;
              }
            }

            .main {
              animation: 5s ease 0s 1 slideleftright;
            }

            @keyframes sliderightleft {
              0% {
                transform: translateX(100%);
                opacity: 0.5;
              }
              100% {
                transform: translateX(0);
                opacity: 1;
              }
            }

            .main-2 {
              animation: 5s ease 0s 1 sliderightleft;
            }

        </style>
        <!-->
    </header>

    <body>
      <?php
      session_start();
      if(isset($_SESSION['dbadmin'])){
        $select_user = $conn->prepare("SELECT * FROM `dbadmin` WHERE admin_id = ?");
        $select_user->execute([$_SESSION['dbadmin']]);
        $selected = $select_user->fetch(PDO::FETCH_ASSOC);
        ?>
        <nav class="navbar navbar-expand-lg   navbar-light">
          <div class="container-fluid">
              <img src="images/logo.jpg" alt="" width="220" height="60">
              <button class="navbar-toggler p-0" style="border:0px;"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-center ml-5" id="navbarNavDropdown">
              <ul class="navbar-nav">
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="edit.php">Edit Database</a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Account</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="">My Account Info</a></li>
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  </li>
              </ul>
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
              <ul class="navbar-nav">
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Help</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Contact</a>
                  </li>
              </ul>
              </div>
          </div>
        </nav>
        <h6 class="text-danger text-end m-1 fs-6">Hi, <?= $selected['name'];?>(Database Admin)</h6>    
        <?php
      }
      else{
        ?>
        <nav class="navbar navbar-expand-lg   navbar-light">
        <div class="container">
            <img src="images/logo.jpg" alt="" width="220" height="60">
            <button class="navbar-toggler p-0" style="border:0px;"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center ml-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Compnany Promotion</a></li>
                    <li><a class="dropdown-item" href="servicepage.php/?=webDesigning">Web Designing</a></li>
                    <li><a class="dropdown-item" href="#">Logo/Visiting Card Design</a></li>
                    <li><a class="dropdown-item" href="#">Video Ads</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Our Clients</a>
                </li>
            </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Help</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
        <?php
      }
      ?>