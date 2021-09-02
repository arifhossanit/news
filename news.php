<?php include_once('includes/header.php');?>
<?php
if (!empty($_GET['news-id'])) {
  $news_id=$_GET['news-id'];
  $sql="SELECT id, post_title, post_details, post_pic, post_date, updated_at FROM mypost WHERE id=$news_id";
  $result=$db_config->query($sql);
  $data=$result->fetch_object();
  $post_title=$data->post_title;
  $post_details=$data->post_details;
  $post_pic=$data->post_pic;
  $post_date=$data->post_date;
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
                    <a href="#" class="btn btn-dark font-weight-bold mb-4">News</a>
                  </div>
                  <p
                    class="fs-15 d-flex justify-content-center align-items-center m-0"
                  >
                    <img
                      src="post_images/<?php echo $post_pic ?>"
                      alt=""
                      class="img-xs img-rounded me-2"
                    />
                    Oka Tomoaki | 23 February, 2018
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
                
                 
                  <div class="text-center pb-5 mb-2 border-bottom">
                    <a
                      href="#"
                      class="btn btn-dark font-weight-bold mr-2 mb-2 mb-sm-0"
                      >News</a
                    >
                    <a
                      href="#"
                      class="btn btn-dark font-weight-bold mr-2 mb-2 mb-sm-0"
                      >News</a
                    >
                    <a
                      href="#"
                      class="btn btn-dark font-weight-bold mr-2 mb-2 mb-sm-0"
                      >News</a
                    >
                    <a
                      href="#"
                      class="btn btn-dark font-weight-bold mr-2 mb-2 mb-sm-0"
                      >News</a
                    >
                    <a
                      href="#"
                      class="btn btn-dark font-weight-bold mr-2 mb-2 mb-sm-0"
                      >News</a
                    >
                  </div>
                  <div class="d-flex flex-row">
                        <img
                        src="./images/dashboard/Profile_1.jpg"
                        alt=""
                        class="img-xs img-rounded me-2"
                        />
                    <div class="form-floating input-group">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                        <button class="input-group-text" type="submit">Post</button>
                    </div>
                  </div>
                  <div class="d-flex flex-row mt-3">
                    <img
                    src="./images/dashboard/Profile_1.jpg"
                    alt=""
                    class="img-xs img-rounded me-2"
                    />
                    <div class="">
                        <h5>Name <small class="text-muted fs-6">Today 2:30pm</small></h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>                
                  <h1 class="font-weight-600 text-center my-5">
                    You may also like
                  </h1>
    
                  <div class="border-top py-5">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="position-relative image-hover">
                          <img
                            src="./images/news/news-6.jpg"
                            alt="news"
                            class="img-fluid"
                          />
                          <span class="thumb-title">NEWS</span>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="position-relative image-hover">
                          <h1 class="font-weight-600">
                            A hot springs where clothing is optional after dark
                          </h1>
                          <p class="fs-15">Oka Tomoaki | 23 February, 2018</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="border-top py-5">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="position-relative image-hover">
                          <img
                            src="./images/news/news-7.jpg"
                            alt="news"
                            class="img-fluid"
                          />
                          <span class="thumb-title">NEWS</span>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="position-relative image-hover">
                          <h1 class="font-weight-600">
                            A hot springs where clothing is optional after dark
                          </h1>
                          <p class="fs-15">Oka Tomoaki | 23 February, 2018</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
    <!-- footer starting -->
<?php include_once('includes/footer.php');?>