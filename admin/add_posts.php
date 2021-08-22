<?php include_once('includes/header.php');?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">New Post</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add Post
                            </div>
                            <div class="card-body table-responsive">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name of category">
                                </div>
                                <div class="mb-3">
                                    <label for="catagory" class="form-label">Category</label>
                                    <select class="form-select" id="catagory" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Post Details</label>
                                    <textarea class="form-control" id="summernote" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Feature Image</label>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Publish</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>