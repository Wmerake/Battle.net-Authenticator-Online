<?php

//fix
include('includes/config.php');
include('classes/Authenticator.php');
$topnavvalue = "添加安全令";
include('includes/html_toubu/html_toubu.php');
include('includes/page_inc/header_normal.php');
if ($logincheck == 0) {
    $jumpurl = SITEHOST . 'index.php';
    $innertxt = "你还没登入，添加个态君吖。即将返回首页";
    include('includes/auth_add/authadd_error.php');
} else if ($logincheck == 1) {
    $query = "SELECT * FROM `users` WHERE `user_name`='$user'";
    $rowtemp = queryRow($query);
    $user_id = $rowtemp['user_id'];
    $user_donated = $rowtemp['user_donated'];
    if ($user_donated > 0) {
        define("USER_DONATED", TRUE);
    }
    $query = "SELECT * FROM `authdata` WHERE `user_id`='$user_id'";
    $number_rows = queryNum_rows($query);
    if ((!USER_DONATED && $number_rows < MOST_AUTH) || (USER_DONATED && $number_rows < MOST_AUTH_DONATED)) {
        include('includes/page_inc/addauth_inc.php');
    } else {
        $jumpurl = SITEHOST . 'myauthall.php';
        if (USER_DONATED) {
            $innertxt = "你已经拥有" . MOST_AUTH_DONATED . "枚安全令了，不能再多了。<br>如要添加请到我的安全令中删除已有的安全令。";
        } else {
            $innertxt = "你已经拥有" . MOST_AUTH . "枚安全令了，不能再多了。<br>如要添加请到我的安全令中删除已有的安全令。";
        }
        include('includes/auth_add/authadd_error.php');
    }
}
include('includes/page_inc/footer.php');
?>
