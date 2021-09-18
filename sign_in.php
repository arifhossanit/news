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
<body class="body_bg">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <?php if ( isset($_GET['alert'])) { ?>
                        <div class='position-fixed end-0 translate-middle-y p-3 me-5' style='z-index: 11'>
                            <div class='toast align-items-center text-dark bg-warning border-0' role='alert' aria-live='assertive' aria-atomic='true'>
                                <div class='d-flex'>
                                    <div class='toast-body'>
                                        <?php 
                                        if ($_GET['alert']=="fail") {
                                            echo "Incorrect email or password! Try again.";
                                        }
                                        ?>
                                    </div>
                                    <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                            <form action="includes/validation.php" method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required/>
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" type="password" name="pass" placeholder="Password" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <?php
                                if (!empty($_GET['redirect'])) {
                                    $url =$_GET['redirect'];
                                    echo '<input type="hidden" name="redirect" value="'. $url.'" >';
                                }elseif (!empty($_SERVER['HTTP_REFERER'])) {
                                    $url=$_SERVER['HTTP_REFERER'];
                                    echo '<input type="hidden" name="redirect" value="'. $url.'" >';
                                    }
                                ?>
                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                    <input type="submit" name="signin" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">Need an account? <a href="sign_up.php" class="text-decotration-none">Create one!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>                         

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>
</html>