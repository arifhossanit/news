<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Reporter</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Reporter
                            </div>
                            <div class="card-body table-responsive">
                              <div class="mb-3">
                                  <label for="exampleId" class="form-label">Reporter Id</label>
                                  <input type="text" class="form-control" id="exampleId" placeholder="101">
                              </div>
                              <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Reporter Name</label>
                                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="example@mail.com">
                              </div>
                              <div class="mb-3">
                                <label for="examplePhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="examplePhone" placeholder="01xxxxxxxxxx">
                              </div>
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div> 
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>  