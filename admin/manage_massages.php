<?php include_once('includes/header.php');?>
<?php
    $sql="SELECT * FROM mycontact";
    $result=$db_config->query($sql);
?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Massages</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php
                if (isset($_GET['alert']) && $_GET['alert']=='success') {
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                        Massage & contact info deleted successfully!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        Fail to delete massage & contact info! Try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List of contact & messages
                </div>
                <div class="card-body table-responsive">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                while ($data=$result->fetch_object()) {
                                echo"<tr>
                                        <td>$data->id</td>
                                        <td>$data->sender_name</td>
                                        <td>$data->sender_email</td>
                                        <td>$data->message_sub</td>
                                        <td>$data->message</td>
                                        <td>$data->send_date</td>
                                        <td>
                                            <a href='includes/process.php?action=sms_del&id=$data->id' class='text-danger' onclick='return confirm(\"Are you sure about delete?\")'>
                                                <i class='fas fa-trash-alt'></i>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php include_once('includes/footer.php');?> 