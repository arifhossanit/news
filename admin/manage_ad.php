<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT * FROM myad";
    $result=$db_config->query($sql);
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Ad</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Ad deleted successfully!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    Fail to delete Ad! Try again.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of advertisement
                            </div>
                            <div class="card-body table-responsive">
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ad title</th>
                                            <th>Provider name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Ad title</th>
                                            <th>Provider name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while ($data=$result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php if (!empty($data['id'])) echo $data['id']; ?></td>
                                            <td><?php if (!empty($data['ad_title'])) echo $data['ad_title']; ?></td>
                                            <td><?php if (!empty($data['ad_provider_name'])) echo $data['ad_provider_name']; ?></td>
                                            <td><?php if (!empty($data['ad_provider_address'])) echo $data['ad_provider_address']; ?></td>
                                            <td><?php if (!empty($data['ad_provider_phone'])) echo $data['ad_provider_phone']; ?></td>
                                            <td><?php if (!empty($data['ad_post_date'])) echo $data['ad_post_date']; ?></td>
                                            <td>
                                                <a href="update_ad.php?adid=<?php echo $data['id']?>" class="me-3"></a>
                                                <a href="includes/process.php?action=ad_del&id=<?php echo $data['id']?>" class="text-danger" onclick='return confirm("Are you sure about delete?")'>
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