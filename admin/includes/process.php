<?php include_once('config.php'); 
    session_start();
    function filter($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
    
        return $data;
    }
?>

<?php
if (isset($_POST["adminlogin"]) && $_POST["adminlogin"] =="Sign In") {
    extract($_POST);
    $email=filter($mail);
    $adminpass=md5($pass);
    $sql="SELECT admin_mail, admin_pass FROM myadmin WHERE admin_mail='$email' AND admin_pass='$adminpass'";
    $data=$db_config->query($sql);
    if ($data->num_rows > 0) {
        $_SESSION["mail"] = "admin";
        header("Location: ../dashboard.php");
        exit();
    }else {
        header("Location: ../index.php");
        exit();
    }
}
?>

<?php
if (isset($_POST["cat_add"])) {
    extract($_POST);
    $name=filter($cat_name);
    $detail=filter($cat_detail);
    if (!empty($_POST["cat_name"])) {
        $sql="INSERT INTO mycategory (cat_name,cat_detail) VALUES ('$name','$detail')";
        $data=$db_config->query($sql);
    }
    
    if ($db_config->affected_rows) {
        header("Location: ../add_category.php?alert=success");
        exit();
    }else {
        header("Location: ../add_category.php?alert=fail");
        exit();
    }
}
?>

<?php
    // for user log-out
    if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
        session_destroy();
        header('Location:../index.php');
    }
?>