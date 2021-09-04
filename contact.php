<?php include_once('includes/header.php');?>
<main class="container">
    <div class="section-content">
        <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
        <h5>We're open for any suggestion or ad with us</h5>
    </div>
    <?php if ( isset($_GET['alert'])) { ?>
        <div class='position-fixed end-0 translate-middle-y p-3 me-5' style='z-index: 11'>
            <div class='toast align-items-center text-white bg-primary border-0' role='alert' aria-live='assertive' aria-atomic='true'>
                <div class='d-flex'>
                    <div class='toast-body'>
                        <?php 
                        if ($_GET['alert']=="success") {
                            echo "Your message send successfully!";
                        }
                        if ($_GET['alert']=="fail") {
                            echo "Fail to sending message! Try again.";
                        }
                        ?>
                    
                    </div>
                    <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
                </div>
            </div>
        </div>
    <?php } ?>
    <section class="contact row my-5 shadow-lg">
        <div class="col-md-8 p-5 bg-form">
            <form class="row g-3 text-white" action="includes/validation.php" method="post">
                <h3>Send us a message</h3>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="Your full name" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="validationDefault02" placeholder="Your valid email" required>
                </div>
                <div class="col-md-12">
                    <label for="validationDefault03" class="form-label">Subject</label>
                    <input type="text" name="sub" class="form-control" id="validationDefault03" placeholder="Subject of your message">
                </div>
                <div class="col-md-12">
                    <label for="validationDefault04" class="form-label">Message Details</label>
                    <textarea name="sms" class="form-control" id="validationTextarea" placeholder="Write your message.." required></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="sms_send"><i class="fa fa-paper-plane"></i> Send Message</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 order-md-first bg-light p-5">
            <h3 class="ps-4 fw-bolder contact-line">Contact Us</h3>
            <div class="d-flex flex-row align-items-center">
                <i class="fas fa-user fs-3 text-primary p-4"></i>
                <div class="p-2">
                    <div class="fw-bold">Company Name</div>
                    <div class="text-muted">NEWSROOM</div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <i class="fas fa-map-marker-alt fs-3 text-primary p-4"></i>
                <div class="p-2">
                    <div class="fw-bold">Address</div>
                    <div class="text-muted">Dhaka, Bangladesh</div>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center">
                <i class="fas fa-envelope fs-3 text-primary p-4"></i>
                <div class="p-2">
                    <div class="fw-bold">General Support</div>
                    <div class="text-muted">newsroom@mail.com</div>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center">
                <i class="fa fa-globe fs-3 text-primary p-4"></i>
                <div class="p-2">
                    <div class="fw-bold">Website</div>
                    <div class="text-muted">www.newsroom.com</div>
                </div>
            </div>
        </div>
    </section> 
</main>	
	
<!-- footer starting -->
<?php include_once('includes/footer.php');?>