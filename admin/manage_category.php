<?php include_once('includes/header.php');?>

<?php
$sql="SELECT * FROM mycategory";
$result=$db_config->query($sql);
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Category deleted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to delete category! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of available catagory
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Posting Date</th>
                                            <th>Last updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Posting Date</th>
                                            <th>Last updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($data=$result->fetch_assoc()) { ?>
                                        <?php echo $data["cat_detail"]?>
                                        <tr>
                                            <td><?php echo $data["id"]?></td>
                                            <td><?php echo $data["cat_name"]?></td>
                                            <td><?php echo $data["cat_detail"]?></td>
                                            <td><?php echo $data["created_date"]?></td>
                                            <td><?php echo $data["updated_date"]?></td>
                                            <td>
                                                <a href="update_category.php?id=<?php echo $data['id']?>" class="me-3"><i class="fas fa-edit"></i></a>
                                                <a href="includes/process.php?action=cat_del&id=<?php echo $data['id']?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
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