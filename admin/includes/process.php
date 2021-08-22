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
echo $_POST["adminlogin"];
if (isset($_POST["adminlogin"]) && $_POST["adminlogin"] =="Sign In") {
    extract($_POST);
    echo $email=filter($mail);
    echo $adminpass=md5($pass);
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
    // for user log-out
    if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
        session_destroy();
        header('Location:../index.php');
    }
?>