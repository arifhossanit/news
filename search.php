<?php include_once('includes/header.php');?>
<?php
  function filter($data)
  {   
      global $db_config;
      $data = trim($data);
      $data = htmlspecialchars($data);
      $data = stripcslashes($data);
      $data = $db_config->real_escape_string($data);
      return $data;
  }  
?>

<main class="container">
    <div class='row'>
        <div class="col-10 py-5 m-auto">
            <?php
            if (isset($_POST['search'])) {
                $search_val=filter($_POST['search_val']);
                $sql="SELECT id, post_title, post_excerpt, post_details, post_pic, post_date, updated_at FROM mypost WHERE post_title LIKE '%$search_val%' ORDER BY id DESC";
                $result=$db_config->query($sql);
            }
            if (!empty($search_val) && $result->num_rows > 0) {
                while ($data=$result->fetch_object()) {
                    $id=$data->id;
                    $post_title=$data->post_title;
                    $post_excerpt=$data->post_excerpt;
                    $post_pic=$data->post_pic;
                    $post_date=$data->post_date;
            ?>
            <a href="news.php?news-id=<?php echo $id ?>" class="text-decoration-none text-dark">
            <div class="row border-bottom mb-2">
                <div class="col-sm-4">
                <div class="position-relative image-hover">
                    <img
                    src="post_images/<?php echo $post_pic ?>"
                    alt="news"
                    class="img-fluid"
                    />
                </div>
                </div>
                <div class="col-sm-8">
                <div class="position-relative image-hover">
                    <h3 class="fw-bold">
                    <?php echo $post_title ?>
                    </h3>
                    <p><?php echo $post_excerpt.'...' ?></p>
                    <p class="fs-15">23 February, 2018</p>
                </div>
                </div>
            </div>
            </a>
            <?php 
                }
            }else {
               echo"<div class='row'>
                        <div class='col-10 text-center py-5 m-auto'>
                        <h1 class='text-danger'>Oops! Nothing have been Found.</h1>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</main>
<!-- footer starting -->
<?php include_once('includes/footer.php');?>