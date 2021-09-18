<?php 
    include_once('config.php');
    session_start(); 
    function filter($data)
    {   
        global $db_config;
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = $db_config->real_escape_string($data);
        return $data;
    }
?>
<!-- for sending massage from contact page -->
<?php
    if (isset($_POST['sms_send'])) {
        extract($_POST);
        $name=filter($name);
        $email=filter($email);
        $sub=filter($sub);
        $sms=filter($sms);
        if (!empty($name) && !empty($email) && !empty($sub) && !empty($sms)) {
           $sql="INSERT INTO mycontact (`sender_name`,`sender_email`,`message_sub`,`message`) VALUES ('$name','$email','$sub','$sms')";
           $db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            header("Location: ../contact.php?alert=success");
            exit();
        }else {
            header("Location: ../contact.php?alert=fail");
            exit();
        }
    }
?>
<!-- for new user signup -->
<?php
    if (isset($_POST['signup'])) {
        extract($_POST);
        $fname=filter($fname);
        $email=filter($email);
        $pass=md5($pass);
        $confpass=md5($confpass);
        if (!empty($fname) && !empty($email) && !empty($pass) && $pass==$confpass) {
           $sql="INSERT INTO myuser (`user_name`,`user_mail`,`user_pass`) VALUES ('$fname','$email','$pass')";
           $db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            $sql="SELECT `id`, `user_name`, `user_mail` FROM myuser WHERE user_mail='$email' AND user_pass='$pass'";
            $result=$db_config->query($sql);
            $data=$result->fetch_object();
            $_SESSION['id'] = $data->id;
            $_SESSION['email'] = $data->user_mail;
            $_SESSION['name'] = $data->user_name;
            header("Location: ../index.php");
            exit();
        }else {
            header("Location: ../sign_up.php?alert=fail");
            exit();
        }
    }
?>
<!-- for login user -->
<?php
    if (isset($_POST['signin'])) {
        extract($_POST);
        $email=filter($email);
        $pass=md5($pass);
        // echo $redirect;
        if (!empty($email) && !empty($pass)) {
           $sql="SELECT `id`, `user_name`, `user_mail` FROM myuser WHERE user_mail='$email' AND user_pass='$pass'";
           $result=$db_config->query($sql);
        }
        if ($result->num_rows > 0) {
            $data=$result->fetch_object();
            $_SESSION['id'] = $data->id;
            $_SESSION['email'] = $data->user_mail;
            $_SESSION['name'] = $data->user_name;
            header("Location: $redirect");
            exit();
        }else {
            header("Location: ../sign_in.php?alert=fail&redirect=$redirect");
            exit();
        }
    }
?>
<!-- for user comment -->
<?php
    if (isset($_POST['ucomment'])) {
        extract($_POST);
        $comment=filter($ucomment);
        if (!empty($ucomment)) {
           $sql="INSERT INTO mycomments (`post_id`,`user_id`,`comment`) VALUES ('$pid','$uid','$ucomment')";
           $result=$db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            $sql="SELECT `comment`, `user_name`, `comment_date` FROM mycomments, myuser WHERE post_id='$pid' AND `user_id`= myuser.id ORDER BY mycomments.id DESC";
            $result=$db_config->query($sql);
            $data=$result->fetch_object();
            $phpdate = strtotime( $data->comment_date );
            $mysqldate = date( 'd M Y, h:i A', $phpdate );
            echo "<div class='d-flex flex-row mt-3'>
                    <i class='far fa-user-circle fs-5 pt-1 pe-2'></i>
                    <div class=''>
                        <h5>$data->user_name <small class='text-muted' style='font-size:11px'>$mysqldate</small></h5>
                        <p>$data->comment</p>
                    </div>
                </div>";
        }
    }
?>
<!-- for showing more comments by jquery ajax -->
<?php
    if (isset($_POST['noc']) && !empty($_POST['newsid'])) {
        $noc=$_POST['noc'];
        $newsid=$_POST['newsid'];
        $sql="SELECT `comment`, `user_name`, `comment_date` FROM mycomments, myuser WHERE post_id='$newsid' AND `user_id`= myuser.id ORDER BY mycomments.id DESC LIMIT 3,$noc";
        $result=$db_config->query($sql);
        while ($data=$result->fetch_object()) {
          $phpdate = strtotime( $data->comment_date );
          $mysqldate = date( 'd M Y, h:i A', $phpdate );
        echo "<div class='d-flex flex-row mt-3'>
                <i class='far fa-user-circle fs-5 pt-1 pe-2'></i>
                <div class=''>
                    <h5>$data->user_name <small class='text-muted' style='font-size:11px'>$mysqldate</small></h5>
                    <p>$data->comment</p>
                </div>
            </div>";
        }
}
?> 
<!-- for user logout -->
<?php
    if (!empty($_GET["logout"]) && $_GET["logout"]=="yes") {
        session_destroy();
        $url= $_SERVER['HTTP_REFERER'];
        header("Location:".$url);
    }
?>

<?php
// echo $actual_link = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
?>