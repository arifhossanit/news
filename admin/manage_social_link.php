<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT * FROM mysocial_link WHERE is_active='1'";
    $result=$db_config->query($sql);
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Social Link Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo"<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Link active successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            if ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to active link! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            if (isset($_GET['alert']) && $_GET['alert']=='success_del') {
                            echo"<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Social link deleted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            if ( isset($_GET['alert']) && $_GET['alert']=='fail_del') {
                            echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to delete social link! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            if ( isset($_GET['alert']) && $_GET['alert']=='url') {
                            echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Social link URL is not valid! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                        ?>
                        <form action="includes/process.php" method="post">
                            <div class="row">
                                <div class="col-5 mb-3">
                                <label for="sname" class="form-label">Link Name</label>
                                <select class="form-select" name="link_id" aria-label="Default select example" id="sname" required>
                                    <option selected disabled value="">Select a social site</option>
                                    <option value="1">Facebook</option>
                                    <option value="2">Twitter</option>
                                    <option value="3">Instagram</option>
                                    <option value="4">Linkedin</option>
                                    <option value="5">Youtube</option>
                                </select>
                                </div>
                                <div class="col-5 mb-3">
                                <label for="surl" class="form-label">Link Url</label>
                                <input type="text" name="surl" class="form-control" id="surl" placeholder="Your social link url" required>
                                </div>
                                <div class="col-2 mb-3">
                                <label for="b" class="form-label">&nbsp;</label>
                                <input type="submit" name="add_link" value="Add" id="b" class="btn btn-primary d-block">
                                </div> 
                            </div>
                        </form>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Social Link
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Social Site Name</th>
                                            <th>Social URL</th>
                                            <th>Modification Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Social Site Name</th>
                                            <th>Social URL</th>
                                            <th>Modification Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while ($data=$result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php if (!empty($data['id'])) echo $data['id']; ?></td>
                                            <td><?php if (!empty($data['link_name'])) echo $data['link_name']; ?></td>
                                            <td><?php if (!empty($data['link_url'])) echo $data['link_url']; ?></td>
                                            <td><?php if (!empty($data['updated_at'])) echo $data['updated_at']; ?></td>
                                            <td>
                                                <a href="includes/process.php?action=del_link&link_id=<?php echo $data['id']?>" class="text-danger" onclick='return confirm("Are you sure about delete?")'>
                                                    <i class='fas fa-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?> 