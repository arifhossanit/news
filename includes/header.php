<?php
  include_once('config.php');
  session_start();
  $sql="SELECT id, cat_name FROM mycategory WHERE is_active='1' LIMIT 6";
  $rows=$db_config->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWSROOM</title>
    <link rel="icon" type="image/png" href="./images/site_icon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4c9f93ac06.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>
    <header>
      <nav class="topnav container">
          <div class="container">
              <div class="row py-3 d-lg-flex align-items-center d-none">
                <div class="col-3">
                  <?php
                  date_default_timezone_set("Asia/Dhaka");
                    $mysqldate = date( 'D, d M, Y');
                    echo $mysqldate;
                  ?>
                </div>
                <div class="col-lg-6 text-center ">
                <a class="text-decoration-none text-dark fs-1 fw-bold" href="index.php">NEWS ROOM</a>
                </div>
                <div class="col-3 text-end">
                  <?php
                   if (!empty($_SESSION['email'])) { ?>
                     <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle text-decoration-none fs-5 text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fas fa-user-circle'></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li class="text-center"><a class="dropdown-item" href="#!"><?php echo $_SESSION['name']; ?></a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <!-- <li><a class="dropdown-item" href="account_setting.php"><i class="fas fa-cog"></i> Account Setting</a></li> -->
                                <li><a class="dropdown-item" href="includes/validation.php?logout=yes"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                  <?php
                   }else {
                     echo "<a href='sign_in.php' class='text-decoration-none text-dark'>
                            <i class='fas fa-user-plus'></i> Sign in
                          </a>";
                   }  
                  ?>
                   
                </div>
              </div>
            </div>              
      </nav>
            
      <!-- primary navbar -->
      <nav class="container navbar navbar-expand-lg navbar-light bg-white navborder" id="sticky-nav">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand d-lg-none" href="index.php">NEWS ROOM</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-scroll">
              <?php $status =  basename($_SERVER['REQUEST_URI'])=="index.php" ? ' active': ' ';?>
              <li class="nav-item">
                <a class="nav-link tabs <?php echo $status ?>" aria-current="page" href="index.php">Latest</a>
              </li>
              <?php
              while ($link=$rows->fetch_object()) {
              $status =  basename($_SERVER['REQUEST_URI'])=="page.php?cat_link=$link->id" ? ' active': ' ';
              echo"<li class='nav-item'>
                    <a class='nav-link $status' href='page.php?cat_link=$link->id'>$link->cat_name</a>
                  </li>";
              }
              ?>
            </ul>
            <form class="d-flex foms" action="search.php" method="post">
              <input class="form-control sinput" type="search" name="search_val" placeholder="Search by title" aria-label="Search">
              <button class="btn btn-outline-success search-btn rounded-0 rounded-end" name="search" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>
      
    </header>

