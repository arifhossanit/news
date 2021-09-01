<?php
  include_once('config.php');
  $sql="SELECT id, cat_name FROM mycategory WHERE is_active='1' LIMIT 6";
  $rows=$db_config->query($sql);
?>
<?php
$apiKey = "abbdc193ac7c098e2f90b22a1289652f";
$cityId = "1337179";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4c9f93ac06.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>
<body>
    <header>
      <nav class="topnav container">
          <div class="container">
              <div class="row py-3 d-lg-flex align-items-center d-none">
                <div class="col-2">
                  <?php
                  date_default_timezone_set("Asia/Dhaka");
                    $mysqldate = date( 'D d M Y');
                    echo $mysqldate;
                  ?>
                </div>
                <div class="col-1">
                  30°C,London
                </div>
                <div class="col-lg-6 text-center fs-1 fw-bold">
                  NEWS ROOM
                </div>
                <div class="col-3 text-end">
                  facebook
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
          <a class="navbar-brand d-lg-none" href="#">NEWS ROOM</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-nav-scroll">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Latest</a>
              </li>
              <?php
              while ($link=$rows->fetch_object()) {
              echo"<li class='nav-item'>
                    <a class='nav-link' href='page.php?cat_link=$link->id'>$link->cat_name</a>
                  </li>";
              }
              ?>
            </ul>
            <form class="d-flex">
              <input class="form-control sinput" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success search-btn rounded-0 rounded-end" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <!-- <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div> -->