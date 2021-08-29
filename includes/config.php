<?php
define("db_host", "localhost");
define("db_user", "root");
define("db_pass", "");
define("db_name", "newsroom");

// Create connection
$db_config= @new mysqli(db_host,db_user,db_pass,db_name);
// Showing connection Error Messages
if ($db_config->connect_errno) {
printf("Unable to connect to the database:<br /> %s",$db_config->connect_error);
exit();
}
?>