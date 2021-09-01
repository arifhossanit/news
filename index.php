<?php include_once('includes/header.php');?>

    <main class="container">
      <!-- carousel started -->
      <div class="row mt-5 mb-3">
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
                    <img src="post_images/<?php echo $data->post_pic; ?>" class="d-block w-100" alt="...">
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
              <div class="card mb-3 px-2" style="max-width: 540px;">
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
                        <p class="card-text "><?php echo substr($data->post_title,0,55).'...';?> 
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
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
      
        <?php
          $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC LIMIT 10,3";
          $result=$db_config->query($sql);
          while ($data=$result->fetch_object()) {
            $phpdate = strtotime( $data->post_date );
            $mysqldate = date( 'd M Y, H:i', $phpdate );
        ?>
        <div class="col">
          <div class=" card rounded-0 h-100" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="post_images/<?php echo $data->post_pic; ?>" class="img-fluid ps-1 pt-4" alt="News picture">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $data->post_title; ?></h5>
                  <p class="card-text"><small class="text-muted"><?php echo $mysqldate; ?></small></p>
                  <a href="news.php?news-id=<?php echo $data->id ?>" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- International News -->
      
      <section>
        <?php
          $csql="SELECT id, cat_name FROM `mycategory` LIMIT 1";
          $cresult=$db_config->query($csql);
          $cdata=$cresult->fetch_object();
          $cid=$cdata->id;
          $cat_name=$cdata->cat_name;
        ?>
        <h4 class="fw-bold"><?php echo $cat_name; ?><span class="text-danger">></span></h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
          <?php
            $sql="SELECT id, post_title, post_excerpt, cat_id, post_details, post_pic, post_date, updated_at FROM mypost WHERE cat_id='$cid' ORDER BY id DESC LIMIT 4";
            $result=$db_config->query($sql);
            while ($data=$result->fetch_object()) {
              $phpdate = strtotime( $data->post_date );
              $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
          <div class="col">
            <div class="card h-100">
              <div class="image-hover">
              <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img-top" alt="News picture">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $data->post_title; ?></h5>
                <p class="card-text"><?php echo substr($data->post_excerpt,0,120).'...'; ?></p>
                <a href="news.php?news-id=<?php echo $data->id ?>" class="stretched-link"></a>
              </div>
              <div class="card-footer">
                <small class="text-muted"><?php echo $mysqldate; ?></small>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </section>
      <!-- Popular News -->
      <section class="my-5">
      <?php
        $csql="SELECT id, cat_name FROM `mycategory` LIMIT 1,1";
        $cresult=$db_config->query($csql);
        $cdata=$cresult->fetch_object();
        $cid=$cdata->id;
        $cat_name=$cdata->cat_name;
      ?>
        <h4 class="fw-bold"><?php echo $cat_name; ?><span class="text-danger">></span></h4>
        <div class="row" style="height: 300px;">
          <?php
            $sql="SELECT id, post_title, post_excerpt, post_details, post_pic, post_date, updated_at FROM mypost ORDER BY id DESC LIMIT 14,1";
            $result=$db_config->query($sql);
            while ($data=$result->fetch_object()) {
              $phpdate = strtotime( $data->post_date );
              $mysqldate = date( 'd M Y, H:i', $phpdate );
          ?>
          <div class="card bg-dark text-white col-lg-6 h-100 p-0">
            <img src="post_images/<?php echo $data->post_pic; ?>" class="card-img h-100" alt="News picture">
            <div class="card-img-overlay">
              <h5 class="card-title align-bottom"><?php echo $data->post_title; ?></h5>
              <p class="card-text align-bottom"><?php echo $mysqldate; ?></p>
            </div>
            <a href="news.php?news-id=<?php echo $data->id ?>" class="stretched-link"></a>
          </div>
          <?php } ?>
          
          <div class="col-lg-3 h-100">
            <div class="card h-100">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 h-100">
            <div class="card mb-1 h-50" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text.</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>
            <div class="card h-50" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text.</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 mt-1">
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>            
          </div>
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>   
          </div>
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
              </div>
            </div>   
          </div>
        </div>
      </section>
      <!-- Bangladesh -->
      <section>
        <h1>Bangladesh</h1>
        <div class="row row-cols-1 row-cols-lg-3 g-4 mt-1">
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/New Project.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="images/dashboard/glob.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias suscipit laboriosam inventore modi voluptatum incidunt dignissimos aliquam sed quo laudantium dicta aperiam, commodi labore. Suscipit laboriosam voluptates.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Editor Choice -->
      <section class="mt-5">
        <div class="row">
          <div class="col-lg-3">
            <div class="d-flex position-relative float-left">
              <h3 class="section-title">Editor choice</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="row">
              <div class="col-sm-4  mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-9.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">LIFESTYLE</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  The island country that gave Mayor Pete his name
                </h5>
              </div>
              <div class="col-sm-4 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-10.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">SPORTS</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  Disney parks expand (good) vegan food options
                </h5>
              </div>
              <div class="col-sm-4 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-11.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">INTERNET</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  A hot springs where clothing is optional after dark
                </h5>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-12.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">NEWS</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  Japanese chef carves food into incredible pieces of art
                </h5>
              </div>
              <div class="col-sm-4 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-13.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">NEWS</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  The Misanthrope Society: A Taipei bar for people who
                </h5>
              </div>
              <div class="col-sm-4 mb-5 mb-sm-2">
                <div class="position-relative image-hover">
                  <img
                    src="images/dashboard/star-magazine-14.jpg"
                    class="img-fluid"
                    alt="world-news"
                  />
                  <span class="thumb-title">TOURISM</span>
                </div>
                <h5 class="font-weight-600 mt-3">
                  From Pakistan to the Caribbean: Curry's journey
                </h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="position-relative mb-3">
              <img
                src="images/dashboard/star-magazine-15.jpg"
                class="img-fluid"
                alt="world-news"
              />
              <div class="video-thumb text-muted">
                <span><i class="mdi mdi-menu-right"></i></span>LIVE
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex position-relative float-left">
                  <h3 class="section-title">Latest News</h3>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="border-bottom pb-3">
                  <h5 class="font-weight-600 mt-0 mb-0">
                    South Korea’s Moon Jae-in sworn in vowing address
                  </h5>
                  <p class="text-color m-0 d-flex align-items-center">
                    <span class="fs-10 mr-1">2 hours ago</span>
                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                    <span class="fs-10 mr-1">126</span>
                    <i class="mdi mdi-comment-outline"></i>
                  </p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="border-bottom pt-4 pb-3">
                  <h5 class="font-weight-600 mt-0 mb-0">
                    South Korea’s Moon Jae-in sworn in vowing address
                  </h5>
                  <p class="text-color m-0 d-flex align-items-center">
                    <span class="fs-10 mr-1">2 hours ago</span>
                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                    <span class="fs-10 mr-1">126</span>
                    <i class="mdi mdi-comment-outline"></i>
                  </p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="border-bottom pt-4 pb-3">
                  <h5 class="font-weight-600 mt-0 mb-0">
                    South Korea’s Moon Jae-in sworn in vowing address
                  </h5>
                  <p class="text-color m-0 d-flex align-items-center">
                    <span class="fs-10 mr-1">2 hours ago</span>
                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                    <span class="fs-10 mr-1">126</span>
                    <i class="mdi mdi-comment-outline"></i>
                  </p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="pt-4">
                  <h5 class="font-weight-600 mt-0 mb-0">
                    South Korea’s Moon Jae-in sworn in vowing address
                  </h5>
                  <p class="text-color m-0 d-flex align-items-center">
                    <span class="fs-10 mr-1">2 hours ago</span>
                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                    <span class="fs-10 mr-1">126</span>
                    <i class="mdi mdi-comment-outline"></i>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php include_once('includes/footer.php');?>