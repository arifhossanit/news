<?php include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $vote = $_REQUEST['vote'];

    $setPollId = 2;

    if(isset($_COOKIE['poll'."_".$setPollId]))
    {
    $msg = "You have already cast your vote.";
    }

    else
    {
        $sql="UPDATE mypoll SET poll_count=poll_count+1 WHERE id='$vote'";
     $querry= $db_config->query($sql);
    $msg = "You have successfully cast your vote.";
    }

    ?>

<?php
    $expire=time()+60*60*24*30;
    setcookie("poll"."_".$setPollId, "poll"."_".$setPollId, $expire);
    echo '<div class="poll_msg">'.$msg.'</div>';
    ?>

    <div class="">
    <?php

    $queryTotalPoll = "SELECT SUM(poll_count) as poll_count from mypoll";
    $resultTotalPoll = $db_config->query($queryTotalPoll);
    $resultSetresultTotalPoll = $resultTotalPoll->fetch_array();
    $totalCount = $resultSetresultTotalPoll["poll_count"];

    $queryDisplay = "SELECT poll_option, poll_count from mypoll";
    $resultRec = $db_config->query($queryDisplay);
    while($resultSetRec = $resultRec->fetch_array())
    {
    ?>

    <div class="poll_yes floatL paddingb5"><?=$resultSetRec['poll_option'];?></div>
    <div class="paddingb5 floatL">
    <img src="images/option.gif"
    width='<?php echo(100*round($resultSetRec["poll_count"]/($totalCount),2)); ?>'
    height='10'></div>
    <div class="poll_percent floatR paddingb5"><?php echo(100*round($resultSetRec["poll_count"]/($totalCount),2)); ?>%</div>

    <div class="cl"></div>
    <?php }; ?>

    </div>
</body>
</html>