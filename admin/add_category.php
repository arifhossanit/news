<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Category
                            </div>
                            <div class="card-body table-responsive">
                              <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Category</label>
                                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                              <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div> 
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>  