<?php include_once('includes/header.php');?>
<?php
if (!empty($_GET['news-id'])) {
  $news_id=$_GET['news-id'];
  $sql="SELECT id, post_title, cat_id, post_details, post_pic, reporter_id, post_date, updated_at FROM mypost WHERE id=$news_id";
  $result=$db_config->query($sql);
  $data=$result->fetch_object();
  $post_title=$data->post_title;
  $cat_id=$data->cat_id;
  $post_details=$data->post_details;
  $reporter_id=$data->reporter_id;
  $post_pic=$data->post_pic;
  $post_date=$data->post_date;
  

  $rsql="SELECT reporter_name, reporter_img FROM myreporter WHERE id=$reporter_id";
  $rresult=$db_config->query($rsql);
  $rdata=$rresult->fetch_object();
  $rname=$rdata->reporter_name;
  $rimg=$rdata->reporter_img;

  $csql="SELECT id, cat_name FROM mycategory WHERE id=$cat_id";
  $cresult=$db_config->query($csql);
  $cdata=$cresult->fetch_object();
  $cid=$cdata->id;
  $cname=$cdata->cat_name;
}
  
?>
    <!-- body contant start -->
    <main class="container">
        <div class="row">
            <div class="col-sm-12">
              <div class="news-post-wrapper">
                <div class="news-post-wrapper-sm mt-5">
                  <h1 class="text-center">
                    <?php echo $post_title ?>
                  </h1>
                  <div class="text-center">
                    <a href="page.php?cat_link=<?php echo $cid ?>" class="btn btn-dark font-weight-bold mb-4"><?php echo $cname?></a>
                  </div>
                  <p
                    class="fs-15 d-flex justify-content-center align-items-center m-0"
                  >
                    <img
                      src="reporter_img/<?php if(!empty($rimg)) echo $rimg ?>"
                      alt=" "
                      class="img-xs img-rounded me-2"
                    />
                    <?php echo $rname ?> | <?php echo $x=date( 'd M, Y', strtotime($post_date)) ?>
                  </p>
                  <img
                  src="post_images/<?php echo $post_pic ?>"
                  alt="news"
                  class="w-100 my-4"/>
                </div>
                
                <div class="news-post-wrapper-sm">
                  <p class="pt-4 pb-4 mb-4">
                    <?php echo html_entity_decode($post_details); ?>
                  </p>
                </div>
                
                 
                  <div class="text-center pb-5 mb-2 border-bottom"></div>
                    <div class="alert alert-secondary alert-dismissible d-none" id='show' role="alert">
                      For make a comment, please <a href="sign_in.php" class="alert-link">sign-in</a> first.
                      <button type="button" class="btn-close hide-alert"></button>
                    </div>
                  <div class="d-flex flex-row">
                    <i class="far fa-user-circle fs-4 pt-3 pe-2"></i>
                    <form class="form-floating input-group" action="" method="post">
                        <input type="hidden" id="pid" value="<?php echo $news_id; ?>">
                        <input type="hidden" id="uid" value="<?php if(!empty($_SESSION['id'])) echo $_SESSION['id']; ?>">
                        <textarea class="form-control" id="comment" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                        <?php
                          if (!empty($_SESSION['email'])) {
                            echo "<input type='button' value='Post' id='sendcomment' class='input-group-text'>";
                          }else {
                            echo "<button type='button' id='login' class='input-group-text'>Post</button>";
                          }
                        ?>
                    </form>
                  </div>
                  <div id="view"> </div>
                  <?php
                    $sql="SELECT `comment`, `user_name`, `comment_date` FROM mycomments, myuser WHERE post_id='$news_id' AND `user_id`= myuser.id ORDER BY mycomments.id DESC LIMIT 3";
                    $result=$db_config->query($sql);
                    while ($data=$result->fetch_object()) {
                      $phpdate = strtotime( $data->comment_date );
                      $mysqldate = date( 'd M Y, h:i A', $phpdate )
                  ?>
                  <div class="d-flex flex-row mt-3">
                    <i class="far fa-user-circle fs-5 pt-1 pe-2"></i>
                    <div class="">
                        <h5><?php echo $data->user_name ?> <small class="text-muted" style="font-size:11px"><?php echo $mysqldate ?></small></h5>
                        <p><?php echo $data->comment ?></p>
                    </div>
                  </div>
                  <?php } ?> 
                  <div id="shows"> </div>
                  <?php
                  if ($result->num_rows > 0) {
                  ?>
                  <button type="button" id="clicks" class="btn btn-secondary ms-4" value="<?php echo $news_id; ?>">Show More</button>              
                  <?php } ?>
                  <h1 class="font-weight-600 text-center my-5">
                    You may also like
                  </h1>
                  <div class="border-top py-5">
                  <?php
                    $sql="SELECT id, post_title, post_excerpt, post_pic, post_date FROM mypost WHERE id<>$news_id AND cat_id=$cat_id LIMIT 2";
                    $result=$db_config->query($sql);
                    while ($data=$result->fetch_object()) {
                      $id=$data->id;
                      $post_title=$data->post_title;
                      $post_excerpt=$data->post_excerpt;
                      $post_pic=$data->post_pic;
                      $post_date=$data->post_date;
                  ?>
                  <a href="news.php?news-id=<?php echo $id ?>" class="text-decoration-none text-dark">
                    <div class="row">
                    
                      <div class="col-sm-4">
                        <div class="position-relative image-hover">
                          <img
                            src="post_images/<?php echo $post_pic ?>"
                            alt="news"
                            class="img-fluid"
                          />
                          <span class="thumb-title"><?php echo $cname?></span>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="position-relative image-hover">
                          <h1 class="fw-bold">
                          <?php echo $post_title ?>
                          </h1>
                          <p><?php echo $post_excerpt.'...' ?></p>
                          <p class="fs-15">23 February, 2018</p>
                        </div>
                      </div>
                    </div>
                    </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
    <!-- footer starting -->
<?php include_once('includes/footer.php');?>