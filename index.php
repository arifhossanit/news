<?php include_once('includes/header.php');?>

    <main class="container">
      <!-- carousel started -->
      <div class="row g-3 mt-5 mb-2">
          <div id="carouselExampleCaptions" class="carousel slide carousel-fade col-xl-8" data-bs-ride="carousel">
              <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
              </div>
              <div class="carousel-inner">
                <?php
                  $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC";
                  $result=$db_config->query($sql);
                  $data=$result->fetch_object();
                ?>
                <div class="carousel-item active">
                    <div class="overlay"></div>
                    <img src="post_images/<?php echo $data->post_pic; ?>" class="d-block w-100" alt="News Image">
                    <div class="carousel-caption d-none d-md-block">
                      <h4 class="fw-bold"><?php echo $data->post_title; ?></h4>
                    </div>
                    <a href="news.php?news-id=<?php echo $data->id ?>" class="stretched-link"></a>
                </div>
                <?php
                  $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC LIMIT 1,4";
                  $result=$db_config->query($sql);
                  while ($data=$result->fetch_object()) {
                ?>
                <div class="carousel-item">
                    <div class="overlay"></div>
                    <img src="post_images/<?php echo $data->post_pic; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h4 class="fw-bold"><?php echo $data->post_title; ?></h4>
                    </div>
                    <a href="news.php?news-id=<?php echo $data->id ?>" class="stretched-link"></a>
                </div>
                <?php } ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
              </button>
          </div>
          
          <div class="col-xl-4 d-none d-xl-block">
              <div class="card px-2 rounded-0" style="max-width: 540px;">
                  <div class="card-title pt-2">
                      <h5 class="card-title text-center border-bottom">TRANDING STORIES</h5>
                  </div>
                  <?php
                    $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC LIMIT 5,5";
                    $result=$db_config->query($sql);
                    while ($data=$result->fetch_object()) {
                      $phpdate = strtotime( $data->post_date );
                      $mysqldate = date( 'd M Y, H:i', $phpdate );
                  ?>
                  <div class="row g-0 border-bottom">
                    <div class="col-md-8">
                      <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark hover-link">
                        <p class="card-text "><?php echo substr($data->post_title,0,48).'...';?> 
                      </a>
                      <br><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                    </div>
                    <div class="col-md-4">
                      <img src="post_images/<?php echo $data->post_pic; ?>" class="img-fluid p-2" alt="News picture">
                    </div>
                  </div>
                  <?php } ?>
              </div>
          </div>
      </div>

      <div class="row row-cols-1 row-cols-md-4 g-2 mb-5">
        <?php
          $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC LIMIT 10,4";
          $result=$db_config->query($sql);
          while ($data=$result->fetch_object()) {
            $phpdate = strtotime( $data->post_date );
            $mysqldate = date( 'd M Y, H:i', $phpdate );
        ?>
        <div class="col">
        <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
          <div class="card h-100" style="max-width: 540px;">
            <div class="row p-2">
              <div class="col-md-4 order-md-last">
                <img src="post_images/<?php echo $data->post_pic;?>" class="img-fluid rounded h-100" alt="News Image">
              </div>
              <div class="col-md-8 pe-0">
                <div class="card-body p-0">
                  <h6 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,45).'..'; ?></h6>
                  <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <?php } ?>
      </div>
      <!--1st ads -->
      <?php
        $sql="SELECT ad_pic, ad_url FROM myad WHERE ad_pic_oriantation='landscape' ORDER BY id DESC";
        $result=$db_config->query($sql);
        if ($result->num_rows >0) {
          $data=$result->fetch_object();
          echo "<div class='col text-center mb-4'>
            <a href='$data->ad_url' target='_blank'>
              <img src='ad_pic/$data->ad_pic' alt='Advertisement' class='img-fluid w-100'>
            </a>
          </div>";
        }
      ?>
      <!-- Bangladesh News -->
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` LIMIT 1";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
      <section>
        <h3 class="section-title"><?php echo $cat_name; ?><span class="text-danger"> ></span></h3>
        <div class="row row-cols-1 row-cols-lg-3 g-4">
          <?php
            $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 1";
            $result=$db_config->query($sql);
            while ($data=$result->fetch_object()) {
              $phpdate = strtotime( $data->post_date );
              $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
            <div class="col">
              <div class="card bg-light rounded-0 h-100">
                <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img-top p-1" alt="News Image">
                <div class="card-body">
                  <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                    <h5 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,66); ?></h5>
                    <p class="card-text"><?php echo substr($data->post_excerpt,0,120).'..'; ?></p>
                  </a>
                </div>
                <div class="card-footer py-1">
                  <small class="text-muted"><?php echo $mysqldate; ?></small>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="col">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-2">
              <?php
                $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 1,3";
                $result=$db_config->query($sql);
                while ($data=$result->fetch_object()) {
                  $phpdate = strtotime( $data->post_date );
                  $mysqldate = date( 'd M Y, H:i', $phpdate );
              ?>
              <div class="col">
                <div class="card bg-light rounded-0" style="max-width: 540px;">
                <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                  <div class="row g-2">
                    <div class="col-md-4">
                      <img src="post_images/<?php echo $data->post_pic; ?>" class="img-fluid py-4 ps-1" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-0 py-4">
                        <h6 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,55).'..'; ?></h6>
                        <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
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

            if (!empty($data)) {
          ?>
          <div class="col text-center shadow">
            <h2 class="my-3 border-bottom"><?php echo $data->name; ?><br> Weather Status</h2>
            <div class="time">
                <div><?php echo date("l g:i a", $currentTime); ?></div>
                <div><?php echo date("jS F, Y",$currentTime); ?></div>
                <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="weather-forecast">
                <img
                    src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                    class="weather-icon" /> <?php echo $data->main->temp; ?>&deg;C<span
                    class="min-temperature">
            </div>
            <div class="time">
                <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
                <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
            </div>
          </div>
          <?php }else{
            $sql="SELECT ad_pic, ad_url FROM myad WHERE ad_pic_oriantation='portrait' ORDER BY id DESC LIMIT 1";
            $result=$db_config->query($sql);
            $data=$result->fetch_object();
            echo "<div class='col text-center'>
              <a href='$data->ad_url' target='_blank'>
                <img src='ad_pic/$data->ad_pic' alt='Advertisement' class='img-fluid w-100 h-100'>
              </a>
            </div>";
          } 
          
          
          ?>
        </div>
      </section>

      <!-- Business News -->
      <section class="my-5">
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` LIMIT 1,1";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
        <h3 class="section-title"><?php echo $cat_name; ?><span class="text-danger"> ></span></h3>
        <div class="row g-2">
          <?php
            $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC";
            $result=$db_config->query($sql);
            $data=$result->fetch_object();
            $phpdate = strtotime( $data->post_date );
            $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
          <div class="col-lg-6">
            <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
              <div class="card bg-dark text-white h-100">
                <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img h-100" alt="News picture">
                <div class="card-img-overlay">
                  <h5 class="card-title align-bottom title-bold hover-light"><?php echo $data->post_title; ?></h5>
                  <p class="card-text align-bottom"><?php echo $mysqldate; ?></p>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-6">
            <div class="row row-cols-1 row-cols-sm-2 g-2">
              <?php
                $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 1,2";
                $result=$db_config->query($sql);
                while ($data=$result->fetch_object()) {
                  $phpdate = strtotime( $data->post_date );
                  $mysqldate = date( 'd M Y, H:i', $phpdate );
              ?>
                <div class="col">
                  <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                    <div class="card h-100">
                      <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img-top" alt="News Image">
                      <div class="card-body">
                        <h5 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,48).'..'; ?></h5>
                        <p class="card-text mb-0"><?php echo substr($data->post_excerpt,0,100).'...'; ?></p>
                        <small class="text-muted"><?php echo $mysqldate; ?></small>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-2 mt-1">
          <?php
            $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 3,4";
            $result=$db_config->query($sql);
            while ($data=$result->fetch_object()) {
              $phpdate = strtotime( $data->post_date );
              $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
            <div class="col">
              <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                <div class="card mb-3 h-100" style="max-width: 540px;">
                  <div class="row p-2">
                    <div class="col-md-4 order-md-last">
                      <img src="post_images/<?php echo $data->post_pic;?>" class="img-fluid rounded h-100" alt="News Image">
                    </div>
                    <div class="col-md-8 pe-0">
                      <div class="card-body p-0">
                        <h6 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,45).'..'; ?></h6>
                        <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
      </section>
      <!--2nd ads -->
      <?php
        $sql="SELECT ad_pic, ad_url FROM myad WHERE ad_pic_oriantation='landscape' ORDER BY id DESC LIMIT 1,1";
        $result=$db_config->query($sql);
        if ($result->num_rows >0) {
          $data=$result->fetch_object();
        echo "<div class='col text-center mb-4'>
          <a href='$data->ad_url' target='_blank'>
            <img src='ad_pic/$data->ad_pic' alt='Advertisement' class='img-fluid w-100'>
          </a>
        </div>";
        }
      ?>
      <!-- Entertainment -->
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` LIMIT 2,1";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
      <section>
        <h3 class="section-title"><?php echo $cat_name; ?><span class="text-danger"> ></span></h3>
        <div class="row row-cols-1 row-cols-lg-3 g-4">
          <div class="col">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-3">
              <?php
                $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 0,3";
                $result=$db_config->query($sql);
                while ($data=$result->fetch_object()) {
                  $phpdate = strtotime( $data->post_date );
                  $mysqldate = date( 'd M Y, H:i', $phpdate );
              ?>
              <div class="col">
                <div class="card bg-light rounded-0" style="max-width: 540px;">
                <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                  <div class="row g-2">
                    <div class="col-md-4">
                      <img src="post_images/<?php echo $data->post_pic; ?>" class="img-fluid py-4 ps-1" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-0 py-4">
                        <h6 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,55).'..'; ?></h6>
                        <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php
            $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 3,1";
            $result=$db_config->query($sql);
            while ($data=$result->fetch_object()) {
              $phpdate = strtotime( $data->post_date );
              $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
            <div class="col">
              <div class="card bg-light h-100">
                <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img-top" alt="News Image">
                <div class="card-body">
                  <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                    <h5 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,66); ?></h5>
                    <p class="card-text"><?php echo substr($data->post_excerpt,0,120).'..'; ?></p>
                  </a>
                </div>
                <div class="card-footer py-1">
                  <small class="text-muted"><?php echo $mysqldate; ?></small>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="col">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-3">
              <?php
                $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 4,3";
                $result=$db_config->query($sql);
                while ($data=$result->fetch_object()) {
                  $phpdate = strtotime( $data->post_date );
                  $mysqldate = date( 'd M Y, H:i', $phpdate );
              ?>
              <div class="col">
                <div class="card bg-light rounded-0" style="max-width: 540px;">
                <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                  <div class="row g-2">
                    <div class="col-md-4">
                      <img src="post_images/<?php echo $data->post_pic; ?>" class="img-fluid py-4 ps-1" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-0 py-4">
                        <h6 class="card-title title-bold hover-link"><?php echo substr($data->post_title,0,55).'..'; ?></h6>
                        <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
      <!-- International News -->
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` LIMIT 3,1";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
      <section class="mt-5">
        <div class="row">
          <div class="col-lg-3">
            <div class="d-flex position-relative float-left">
              <h3 class="section-title"><?php echo $cat_name ?><span class="text-danger"> ></span></h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
              <?php
                $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 0,9";
                $result=$db_config->query($sql);
                while ($data=$result->fetch_object()) {
                  $phpdate = strtotime( $data->post_date );
                  $mysqldate = date( 'd M Y, H:i', $phpdate );
              ?>
              <div class="col mb-5 mb-sm-2 shadow-sm">
                <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
                  <div class="position-relative image-hover">
                    <img
                      src="post_images/<?php echo $data->post_pic; ?>"
                      class="img-fluid"
                      alt="world-news"
                    />
                    <div class="video-thumb text-light">
                      <span><i class="mdi mdi-menu-right"></i></span><?php echo $mysqldate; ?>
                    </div>
                  </div>
                  <h5 class="font-weight-600 mt-3">
                    <?php echo substr($data->post_title,0,55).'..'; ?>
                  </h5>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-3">
            <?php
            $sql="SELECT ad_pic, ad_url FROM myad WHERE ad_pic_oriantation='portrait' ORDER BY id DESC LIMIT 1,1";
            $result=$db_config->query($sql);
            if ($result->num_rows >0) {
            $data=$result->fetch_object();
            ?>
            <div class="position-relative mb-3">
              <a href="<?php echo $data->ad_url ?>" target="_blank">
                <img
                  src="ad_pic/<?php echo $data->ad_pic ?>"
                  class="img-fluid"
                  alt="world-news"
                />
              </a>
              <div class="video-thumb text-muted">
                <span><i class="mdi mdi-menu-right"></i></span>Order now!
              </div>
            </div>
            <?php } ?>
            
            <div class="row shadow">
              <div class="col-sm-12 mt-3">
                  <h3 class="section-title text-center border-bottom"><?php //echo $cat_name ?>Online Polling</h3>
              </div>
              <div class="col-sm-12">
                <div style="font: 15px tahoma; padding: 10px;">
                  <div>
                      <h6 style="padding:0 0 10px 0;">Which Programming Language is best for Web Development? </div>
                      <h6 id="pollDisplay">
                          <form>
                              <div style="padding:0 0 5px 0;">
                              <input type="radio" name="poll_option" id="1" class="poll_sys" value="1">
                              <label>JAVA</label>
                              </div>

                              <div style="padding:0 0 5px 0;">
                              <input type="radio" name="poll_option" id="2" class="poll_sys" value="2">
                              <label>PHP</label>
                              </div>

                              <div style="padding:0 0 5px 0;">
                              <input type="radio" name="poll_option" id="3" class="poll_sys" value="3">
                              <label>Asp .Net</label>
                              </div>

                              <div style="padding:0 0 10px 0;">
                              <input type="radio" name="poll_option" id="4" class="poll_sys" value="4">
                              <label>Others</label>
                              </div>

                              <input type="image" onclick="return submitPoll();" class="vote" src="images/submit.jpg" name="poll">
                          </form>
                      </div>
                  </div>
                </div>
              </div>
              <?php //} ?>
            </div>
          </div>
        </div>
      </section>
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` WHERE is_active='1' LIMIT 4,5";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
      <section>
        <div class="row mt-5">
          <div class="col-lg-3">
            <div class="d-flex position-relative float-left">
              <h3 class="section-title"><?php echo $cat_name ?><span class="text-danger"> ></span></h3>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-1 pb-3 border-bottom">
        <?php
          $sql="SELECT id, post_title, post_excerpt, cat_id, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 0,4";
          $result=$db_config->query($sql);
          while ($data=$result->fetch_object()) {
            $phpdate = strtotime( $data->post_date );
            $mysqldate = date( 'd M Y, H:i', $phpdate );
        ?>
        
        <div class="col">
          <a href="news.php?news-id=<?php echo $data->id ?>" class="text-decoration-none text-dark">
            <div class="card h-100 shadow">
              <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img-top" alt="News Image">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data->post_title; ?></h5>
                <p class="card-text"><?php echo substr($data->post_excerpt,0,55).'..'; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>
        </div>
      </section>
    </main>
<?php include_once('includes/footer.php');?>