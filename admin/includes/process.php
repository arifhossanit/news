<?php include_once("config.php"); 
    session_start();
    // db_config->real_escape_string()
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
<!-- admin login in dashboard -->
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
<!-- admin account setting -->
<?php
    if (isset($_POST["admin_submit"])) {
        extract($_POST);
        $admin_name= filter($admin_name);
        $admin_mail= filter($admin_mail);
        $admin_pass= md5($admin_pass);
        $admin_new_pass= md5($admin_new_pass);
        if (!empty($_POST["admin_name"]) && !empty($_POST["admin_mail"]) && !empty($_POST["admin_new_pass"])) {
            $sql="UPDATE myadmin SET admin_name='$admin_name', admin_mail='$admin_mail', admin_pass='$admin_new_pass' WHERE id=$aid AND admin_pass='$admin_pass'";
            $db_config->query($sql);
        }
        
        if ($db_config->affected_rows) {
            header("Location: ../account_setting.php?alert=success");
            exit();
        }else {
            header("Location: ../account_setting.php?alert=fail");
            exit();
        }
    }
?>
<!-- catagory added in database -->
<?php
if (isset($_POST["cat_add"])) {
    extract($_POST);
    $name=filter($cat_name);
    $detail=filter($cat_detail);
    $status=filter($status);
    if (!empty($_POST["cat_name"])) {
        $sql="INSERT INTO mycategory (cat_name,cat_detail,is_active) VALUES ('$name','$detail','$status')";
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
<!-- catagory update in database -->
<?php
    if (isset($_POST["cat_edit"])) {
        extract($_POST);
        if (!empty($_POST["cat_name"])) {
            $sql="UPDATE mycategory SET id='$cat_no', cat_name= '$cat_name', cat_detail='$cat_detail' WHERE id='$cat_no'";
            $data=$db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            header("Location: ../update_category.php?alert=success&id=$cat_no");
            exit();
        }else {
            header("Location: ../update_category.php?alert=fail&id=$cat_no");
            exit();
        }
        
    }
?>
<!-- Delete category from database -->
<?php
    if (!empty($_GET["action"])  && !empty($_GET["id"]) && $_GET["action"]=="cat_del") {
        $id=$_GET["id"];
        $sql="UPDATE mycategory SET is_active='0' WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_category.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_category.php?alert=fail");
            exit();
        }
        
    }
?>
<!-- Restore category from database -->
<?php
    if (!empty($_GET["action"])  && !empty($_GET["id"]) && $_GET["action"]=="cat_store") {
        $id=$_GET["id"];
        $sql="UPDATE mycategory SET is_active='1' WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_category.php?alert=store_success");
            exit();
        }else {
            header("Location: ../manage_category.php?alert=store_fail");
            exit();
        }
        
    }
?>
<!-- Added reporter in databse -->
<?php
    if (isset($_POST['rsubmit'])) {
        extract($_POST);
        $file_name = $_FILES['rimg']['name'];
        $file_size =$_FILES['rimg']['size'];
        $file_tmp =$_FILES['rimg']['tmp_name'];
        $file_type=$_FILES['rimg']['type'];
        $files=explode('.', $file_name);
        $file_ex=end($files);
        $file_ext=strtolower($file_ex);
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            header("Location: ../add_reporter.php?alert=type");
            exit();
        }elseif($file_size >= 2097152){
            header("Location: ../add_reporter.php?alert=size");
            exit();
        }elseif(!empty($_POST['rname']) && !empty($_POST['rmail']) && !empty($_POST['rmobile'])) {
            $sql="INSERT INTO myreporter (id,reporter_name,reporter_mail,reporter_mobile,reporter_img) VALUES ('$rid','$rname','$rmail','$rmobile','$file_name')";
            $data=$db_config->query($sql);
            move_uploaded_file($file_tmp,"../../reporter_img/".$file_name);
        }
        if ($db_config->affected_rows) {
            header("Location: ../add_reporter.php?alert=success");
            exit();
        }else {
            header("Location: ../add_reporter.php?alert=fail");
            exit();
        }
    }
?>
<!-- reporter update in database -->
<?php
    if (isset($_POST['ersubmit'])) {
        extract($_POST);
        if (!empty($_FILES['rimg']['name']) && !empty($_POST['rname']) && !empty($_POST['rmail']) && !empty($_POST['rmobile'])) {
        
            $file_name = $_FILES['rimg']['name'];
            $file_size =$_FILES['rimg']['size'];
            $file_tmp =$_FILES['rimg']['tmp_name'];
            $file_type=$_FILES['rimg']['type'];
            $files=explode('.', $file_name);
            $file_ex=end($files);
            $file_ext=strtolower($file_ex);
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
                header("Location: ../update_reporter.php?alert=type&rid=$rid");
                exit();
            }elseif($file_size >= 2097152){
                header("Location: ../update_reporter.php?alert=size&rid=$rid");
                exit();
            }else{
                $sql="UPDATE myreporter SET id='$rid',reporter_name='$rname',reporter_mail='$rmail',reporter_mobile='$rmobile',reporter_img='$file_name' WHERE id='$rid'";
                $data=$db_config->query($sql);
                move_uploaded_file($file_tmp,"../../reporter_img/".$file_name);
            }
        }elseif(!empty($_POST['rname']) && !empty($_POST['rmail']) && !empty($_POST['rmobile'])) {
            $sql="UPDATE myreporter SET id='$rid',reporter_name='$rname',reporter_mail='$rmail',reporter_mobile='$rmobile' WHERE id='$rid'";
            $data=$db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            header("Location: ../update_reporter.php?alert=success&rid=$rid");
            exit();
        }else {
            header("Location: ../update_reporter.php?alert=fail&rid=$rid");
            exit();
        }
    }
?>
<!-- Delete reporter from database -->
<?php
    if (!empty($_GET["action"]) && $_GET["action"]=="r_del" && !empty($_GET["id"])) {
        $id=$_GET["id"];
        $img=$_GET["img"];
        $sql="DELETE FROM myreporter WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            unlink("../../reporter_img/$img");
            header("Location: ../manage_reporters.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_reporters.php?alert=fail");
            exit();
        }
        
    }
?>
<!-- add post in database -->

<?php
    if (isset($_POST["post_submit"])) {
        extract($_POST);
        $post_title=filter($post_title);
        $post_detail=filter($post_detail);
        $post_excerpt=filter($post_excerpt);
        $file_name=filter($file_name);

        if (!empty($post_title) && !empty($post_detail) && !empty($post_excerpt) && !empty($_FILES['post_img']['name'])) {
            $errors= array();
            $file_name = $_FILES['post_img']['name'];
            $file_size =$_FILES['post_img']['size'];
            $file_tmp =$_FILES['post_img']['tmp_name'];
            $file_type=$_FILES['post_img']['type'];
            $files=explode('.', $file_name);
            $file_ex=end($files);
            $file_ext=strtolower($file_ex);
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
                header("Location: ../add_posts.php?alert=type");
                exit();
            }elseif($file_size >= 2097152){
                header("Location: ../add_posts.php?alert=size");
                exit();
            }else {
                $sql="INSERT INTO mypost (post_title,post_excerpt,cat_id,post_details,post_pic,reporter_id) VALUES ('$post_title','$post_excerpt','$post_cat','$post_detail','$file_name','$post_reporter')";
                $data=$db_config->query($sql);
                move_uploaded_file($file_tmp,"../../post_images/".$file_name);
            }
        }
        if ($db_config->affected_rows) {
            header("Location: ../add_posts.php?alert=success");
            exit();
        }else {
            header("Location: ../add_posts.php?alert=fail");
            exit();
        }
    }
?>

<!-- Update post in database -->

<?php
    if (isset($_POST["upost_submit"])) {
        extract($_POST);
        $post_title=filter($post_title);
        $post_detail=filter($post_detail);
        $post_excerpt=filter($post_excerpt);
        $file_name=filter($file_name);
        
        if (!empty($post_title) && !empty($post_excerpt) && !empty($post_detail) && !empty($_FILES['post_img']['name'])) {
            
            $file_name = $_FILES['post_img']['name'];
            $file_size =$_FILES['post_img']['size'];
            $file_tmp =$_FILES['post_img']['tmp_name'];
            $file_type=$_FILES['post_img']['type'];
            $files=explode('.', $file_name);
            $file_ex=end($files);
            $file_ext=strtolower($file_ex);
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
                header("Location: ../update_posts.php?alert=type&id=$pid");
                exit();
            }elseif($file_size >= 2097152){
                header("Location: ../update_posts.php?alert=size&id=$pid");
                exit();
            }else {
                $sql="UPDATE mypost SET post_title='$post_title',post_excerpt='$post_excerpt',cat_id='$post_cat',post_details='$post_detail',post_pic='$file_name',reporter_id='$post_reporter' WHERE id=$pid";
                $data=$db_config->query($sql);
                move_uploaded_file($file_tmp,"../../post_images/".$file_name);
            }
        }elseif (!empty($post_title) && !empty($post_detail) && !empty($post_excerpt)) {
            $sql="UPDATE mypost SET post_title='$post_title',post_excerpt='$post_excerpt',cat_id='$post_cat',post_details='$post_detail',reporter_id='$post_reporter' WHERE id=$pid";
            $data=$db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            header("Location: ../update_posts.php?alert=success&id=$pid");
            exit();
        }else {
            header("Location: ../update_posts.php?alert=fail&id=$pid");
            exit();
        }
    }
?>
<!-- Delete news post from database -->
<?php
    if (!empty($_GET["action"]) && $_GET["action"]=="post_del" && !empty($_GET["pid"])) {
        $id=$_GET["pid"];
        $img=$_GET["img"];
        $sql="DELETE FROM mypost WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            unlink("../../post_images/$img");
            header("Location: ../manage_posts.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_posts.php?alert=fail");
            exit();
        }
        
    }
?>

<!-- Added ad in databse -->
<?php
    if (isset($_POST['adsubmit'])) {
        extract($_POST);
        $file_name = $_FILES['adpic']['name'];
        $file_size =$_FILES['adpic']['size'];
        $file_tmp =$_FILES['adpic']['tmp_name'];
        $file_type=$_FILES['adpic']['type'];
        $files=explode('.', $file_name);
        $file_ex=end($files);
        $file_ext=strtolower($file_ex);
        
        $extensions= array("gif","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            header("Location: ../add_ad.php?alert=type");
            exit();
        }elseif($file_size >= 2097152){
            header("Location: ../add_ad.php?alert=size");
            exit();
        }elseif (!filter_var($adurl, FILTER_VALIDATE_URL)) {
            header("Location: ../add_ad.php?alert=url");
            exit();
        }elseif(!empty($file_name) && !empty($adori) && !empty($adurl) && !empty($adpname) && !empty($address) && !empty($phone)) {
            echo $adurl=filter($adurl);
            $sql="INSERT INTO myad (ad_pic,ad_pic_oriantation,ad_url,ad_provider_name,ad_provider_address,ad_provider_phone) VALUES ('$file_name','$adori','$adurl','$adpname','$address','$phone')";
            $data=$db_config->query($sql);
            move_uploaded_file($file_tmp,"../../ad_pic/".$file_name);
        }
        if ($db_config->affected_rows) {
            header("Location: ../add_ad.php?alert=success");
            exit();
        }else {
            header("Location: ../add_ad.php?alert=fail");
            exit();
        }
    }
?>

<!-- Delete ad from database -->
<?php
    if (!empty($_GET["action"]) && $_GET["action"]=="ad_del" && !empty($_GET["id"])) {
        $id=$_GET["id"];
        $img=$_GET["img"];
        $sql="DELETE FROM myad WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            unlink("../../ad_pic/$img");
            header("Location: ../manage_ad.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_ad.php?alert=fail");
            exit();
        }
        
    }
?>
<!-- Delete user nassages & contact info from database -->
<?php
    if (!empty($_GET["action"]) && $_GET["action"]=="sms_del" && !empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql="DELETE FROM mycontact WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_massages.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_massages.php?alert=fail");
            exit();
        }
        
    }
?>

<!-- Delete user info from database -->
<?php
    if (isset($_GET["action"]) && $_GET["action"]=="u_del" && !empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql="DELETE FROM myuser WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_users.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_users.php?alert=fail");
            exit();
        }
        
    }
?>
<!-- delete comment from database -->
<?php
    if (isset($_GET["action"]) && $_GET["action"]=="com_del" && !empty($_GET["id"])) {
        $id=$_GET["id"];
        $sql="DELETE FROM mycomments WHERE id='$id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_comments.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_comments.php?alert=fail");
            exit();
        }
        
    }
?>
<!-- active social site link -->
<?php
    if (isset($_POST["add_link"])) {
        extract($_POST);
        if (!filter_var($surl, FILTER_VALIDATE_URL)) {
            header("Location: ../manage_social_link.php?alert=url");
            exit();
        }else {
            $surl=filter($surl);
            $sql="UPDATE `mysocial_link` SET link_url='$surl', is_active='1' WHERE id='$link_id'";
            $data=$db_config->query($sql);
        }
        
        if ($db_config->affected_rows) {
            header("Location: ../manage_social_link.php?alert=success");
            exit();
        }else {
            header("Location: ../manage_social_link.php?alert=fail");
            exit();
        }
    }
?>
<!-- active social site link -->
<?php
    if (isset($_GET["action"]) && $_GET["action"]="del_link") {
        $link_id=$_GET["link_id"];
        $sql="UPDATE `mysocial_link` SET is_active='0' WHERE id='$link_id'";
        $data=$db_config->query($sql);
        if ($db_config->affected_rows) {
            header("Location: ../manage_social_link.php?alert=success_del");
            exit();
        }else {
            header("Location: ../manage_social_link.php?alert=fail_del");
            exit();
        }
    }
?>
<!-- poll question set up -->
<?php
    if (isset($_POST['add_poll'])) {
        extract($_POST);
        $ques=filter($ques);
        $opt1=filter($opt1);
        $opt2=filter($opt2);
        $opt3=filter($opt3);
        $opt4=filter($opt4);
        if (!empty($ques)) { 
            $sql="UPDATE `mypoll` SET poll_option='$opt1',poll_count='0', poll_ques='$ques' WHERE id='1'";
            $data=$db_config->query($sql);
            $sql="UPDATE `mypoll` SET poll_option='$opt2',poll_count='0' WHERE id='2'";
            $data=$db_config->query($sql);
            $sql="UPDATE `mypoll` SET poll_option='$opt3',poll_count='0' WHERE id='3'";
            $data=$db_config->query($sql);
            $sql="UPDATE `mypoll` SET poll_option='$opt4',poll_count='0' WHERE id='4'";
            $data=$db_config->query($sql);
        }
        if ($db_config->affected_rows) {
            header("Location: ../add_poll.php?alert=success");
            exit();
        }else {
            header("Location: ../add_poll.php?alert=fail");
            exit();
        }
    }
?>
<!-- admin logout from dashboard -->
<?php
    // for user log-out
    if (isset($_GET["logout"]) && $_GET["logout"] == "yes") {
        session_destroy();
        header("Location:../index.php");
    }
?>