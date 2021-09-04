<?php include_once('includes/header.php');?>

<?php
$sql="SELECT * FROM mycategory WHERE is_active='1'";
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
                                            <th>Last Update</th>
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
                                        <tr>
                                            <td><?php echo $data["id"]?></td>
                                            <td><?php echo $data["cat_name"]?></td>
                                            <td><?php echo $data["cat_detail"]?></td>
                                            <td><?php echo $data["created_date"]?></td>
                                            <td><?php echo $data["updated_date"]?></td>
                                            <td>
                                                <a href="update_category.php?id=<?php echo $data['id']?>" class="me-3"><i class="fas fa-edit"></i></a>
                                                <a href="includes/process.php?action=cat_del&id=<?php echo $data['id']?>" class="text-danger" onclick='return confirm("Are you sure, to move in trash")'>
                                                    <i class='fas fa-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of catagory in trash
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Last Update</th>
                                            <th>Restore</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Last updation Date</th>
                                            <th>Restore</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM mycategory WHERE is_active='0'";
                                        $result=$db_config->query($sql);
                                        while ($data=$result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $data["id"]?></td>
                                            <td><?php echo $data["cat_name"]?></td>
                                            <td><?php echo $data["cat_detail"]?></td>
                                            <td>Inactive</td>
                                            <td><?php echo $data["updated_date"]?></td>
                                            <td class="text-center">
                                                <a href="includes/process.php?action=cat_store&id=<?php echo $data['id']?>" class="text-success fs-5" onclick='return confirm("Are you sure to restore selected category?")'><i class='fas fa-trash-alt'></i>><i class="fas fa-trash-restore"></i></a>
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