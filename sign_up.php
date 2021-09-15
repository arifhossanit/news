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
        <?php if ( isset($_GET['alert'])) { ?>
            <div class='position-fixed end-0 translate-middle-y p-3 me-5' style='z-index: 11'>
                <div class='toast align-items-center text-white bg-primary border-0' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='d-flex'>
                        <div class='toast-body'>
                            <?php 
                            if ($_GET['alert']=="fail") {
                                echo "Fail to create account! Try again.";
                            }
                            ?>
                        </div>
                        <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                </div>
            </div>
        <?php } ?>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                        <div class="card-body">
                            <form action="includes/validation.php" method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control required" id="inputFName" type="text" name="fname" placeholder="Enter your full name" />
                                    <label for="inputFName">Full name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control required" id="email" type="text" name="email" placeholder="name@example.com" />
                                    <label for="email">Email address</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control required" id="pass" type="password" name="pass" placeholder="Create a password" />
                                            <label for="pass">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control required" id="confpass" type="password" name="confpass" placeholder="Confirm password" />
                                            <label for="confpass">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="submit" name="signup" value="Create Account" id="check" class="btn btn-primary btn-block"></div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">Have an account? <a href="sign_in.php" class="text-decoration-none">Go to Sign-in</a></div>
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