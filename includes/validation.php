<?php 
    include_once('config.php'); 
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