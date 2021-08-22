<?php include_once('includes/header.php');?>
    <main class="container">
      <!-- carousel started -->
      <div class="row my-5">
          <div id="carouselExampleCaptions" class="carousel slide carousel-fade col-lg-8" data-bs-ride="carousel">
              <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="images/dashboard/banner.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="images/dashboard/banner_1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="images/dashboard/banner_2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                  </div>
              </div>
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
          <div class="col-lg-4">
              <div class="card mb-3 px-2" style="max-width: 540px;">
                  <div class="card-body">
                      <h5 class="card-title text-center border-bottom">TRANDING STORIES</h5>
                  </div>
                  <div class="row g-0 border-bottom">
                    <div class="col-md-8">
                        <p class="card-text">This is a wider card with supporting text below. <br><small class="text-muted">3 mins ago</small></p>
                        
                    </div>
                    <div class="col-md-4">
                      <img src="images/dashboard/Profile_1.jpg" class="img-fluid p-2" alt="images/dashboard/Profile_2.jpg">
                    </div>
                  </div>
                  <div class="row g-0 border-bottom">
                      <div class="col-md-8">
                          <p class="card-text">This is a wider card with supporting text below. <br><small class="text-muted">3 mins ago</small></p>
                          
                      </div>
                      <div class="col-md-4">
                        <img src="images/dashboard/Profile_2.jpg" class="img-fluid p-2" alt="...">
                      </div>
                    </div>
                    <div class="row g-0">
                      <div class="col-md-8">
                          <p class="card-text">This is a wider card with supporting text below. <br> <small class="text-muted">3 mins ago</small></p>
                          
                      </div>
                      <div class="col-md-4">
                        <img src="images/dashboard/Profile_3.jpg" class="img-fluid p-2 " alt="...">
                      </div>
                    </div>
              </div>
          </div>
      </div>
      <!-- World News -->
      <section>
        <h1>World news</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
          
          <div class="col">
            <div class="card h-100">
              <div class="image-hover">
              <img src="images/dashboard/travel.jpg" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="image-hover">
                  <img src="images/dashboard/news.jpg" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="image-hover">
                  <img src="images/dashboard/art.jpg" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
          </div>
          <div class="col">
              <div class="card h-100 image-hover">
                <div class="image-hover">
                  <img src="images/dashboard/business.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
          </div>
        </div>
      </section>
      <!-- Popular News -->
      <section class="my-5">
        <h1>Popular News</h1>
        <div class="row" style="height: 300px;">
          <div class="card bg-dark text-white col-lg-6 h-100 p-0">
            <img src="images/dashboard/business.jpg" class="card-img h-100" alt="...">
            <div class="card-img-overlay">
              <h5 class="card-title align-bottom">Card title</h5>
              <p class="card-text align-bottom">This is a wider card with supporting text below.</p>
              <p class="card-text align-bottom">Last updated 3 mins ago</p>
            </div>
          </div>
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