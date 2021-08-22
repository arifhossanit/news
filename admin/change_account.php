<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Account Settings</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Change/Modify Account
                            </div>
                            <div class="card-body table-responsive">
                                <form class="w-75 m-auto">
                                    <div class="row mb-3">
                                      <label for="inputEmail3" class="col-md-3 col-form-label">Email</label>
                                      <div class="col-md-9">
                                        <input type="email" class="form-control" id="inputEmail3">
                                        <small class="text-muted">Note: For changing user email, type new one.</small>
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <label for="inputPassword3" class="col-md-3 col-form-label">Current Password</label>
                                      <div class="col-md-9">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Type old password">
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-md-3 col-form-label">New Password</label>
                                        <div class="col-md-9">
                                          <input type="password" class="form-control" id="inputPassword3" placeholder="Type new password">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-9 ms-auto">
                                        <button type="submit" class="btn btn-primary">Save Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                </main>
<?php include_once('includes/footer.php');?> 