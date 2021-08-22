
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4c9f93ac06.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="js/styles.css?v=<?php echo time();?>">
    </head>
    <body class="bg-primary">
        <div class="card text-center form-width my-5 m-auto">
            <div class="card-header fs-2 py-4">
                <i class="fas fa-power-off"></i> Admin Login
            </div>
            <div class="card-body">
                <form action="includes/process.php" method="post">
                    <div class="form-floating mb-3 input-group">
                        <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <span class="input-group-text fs-5">
                            <i class="fas fa-envelope"></i>  
                        </span>
                        <label for="floatingInput">User Email</label>
                    </div>
                    <div class="form-floating mb-3 input-group">
                        <input type="password" name="pass" class="form-control" id="myPass" placeholder="Password">
                        <button class="input-group-text" onclick="showPass()" type="button">
                            <i class="fas fa-eye-slash" id="iconPass"></i> 
                        </button>
                        <label for="myPass">Password</label>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="adminlogin" value="Sign In" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted py-3">
                <a class="small" href="#">Forget Password?</a>
            </div>
        </div>
        <footer class="fixed-bottom navbar-light bg-light p-4">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; NEWSROOM 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
