<?php include_once('includes/header.php');?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add new poll</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add Poll
            </div>
            <div class="card-body table-responsive">
            <?php
            if (isset($_GET['alert']) && $_GET['alert']=='success') {
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                        Poll question add successfully!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }elseif ( isset($_GET['alert']) && $_GET['alert']=='fail') {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        Fail to add poll question! Try again.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                # code...
            }
            ?>
            <form action="includes/process.php" method="post">
                <div class="mb-3">
                <label for="ques" class="form-label">Question Description</label>
                <textarea name="ques" class="form-control" id="ques" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="opt1" class="form-label">1st option</label>
                    <input type="text" name="opt1" class="form-control" id="opt1" placeholder="Set first choice" required>
                </div>
                <div class="mb-3">
                    <label for="opt2" class="form-label">2nd option</label>
                    <input type="text" name="opt2" class="form-control" id="opt2" placeholder="Set second choice" required>
                </div>
                <div class="mb-3">
                    <label for="opt3" class="form-label">3rd option</label>
                    <input type="text" name="opt3" class="form-control" id="opt3" placeholder="Set third choice" required>
                </div>
                <div class="mb-3">
                    <label for="opt4" class="form-label">4th option</label>
                    <input type="text" name="opt4" class="form-control" id="opt4" placeholder="Set fourth choice" required>
                </div>
                <div class="mb-3">
                <input type="submit" value="Add" name="add_poll" class="btn btn-primary">
                </div>
            </form>
            </div>
        </div>
    </div>
</main>
<?php include_once('includes/footer.php');?>