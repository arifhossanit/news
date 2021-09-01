<?php include_once('includes/header.php');?>
<?php
  $sql="SELECT admin_name, admin_mail FROM myadmin";
  $result=$db_config->query($sql);
  $data=$result->fetch_object();
?>
  <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Account Settings</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <?php
          if (isset($_GET['alert']) && $_GET['alert']=='success') {
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                    Account updation successfull!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
          if ( isset($_GET['alert']) && $_GET['alert']=='fail') {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    Fail to update account! Try again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Change/Modify Account
            </div>
            <div class="card-body table-responsive">
              <form class="w-75 m-auto" action="includes/process.php" method="post">
                <input type="hidden" name="aid" value="1">
                  <div class="row mb-3">
                    <label for="inputName" class="col-md-3 col-form-label">Admin Name</label>
                    <div class="col-md-9">
                      <input type="text" name="admin_name" value="<?php if(!empty($data->admin_name)) echo $data->admin_name ?>" class="form-control" id="inputName">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <input type="email" name="admin_mail" value="<?php if(!empty($data->admin_mail)) echo $data->admin_mail ?>" class="form-control" id="inputEmail3">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-md-3 col-form-label">Current Password</label>
                    <div class="col-md-9">
                      <input type="password" name="admin_pass" class="form-control" id="inputPassword3" placeholder="Type old password">
                    </div>
                  </div>
                  <div class="row mb-3">
                      <label for="inputPassword3" class="col-md-3 col-form-label">New Password</label>
                      <div class="col-md-9">
                        <input type="password" name="admin_new_pass" class="form-control" id="inputPassword3" placeholder="Type new password">
                        <small class="text-muted">If don't want to chenge password, type current password</small>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-9 ms-auto">
                      <button type="submit" name="admin_submit" class="btn btn-primary">Save Change</button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
  </main>
<?php include_once('includes/footer.php');?> 