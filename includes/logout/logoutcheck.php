<?php

defined("ZHANGXUAN") or die("no hacker.");
session_start();
$logincheck = 0;
if (isset($_SESSION['loginuser']) && !empty($_SESSION['loginuser'])) {
    $user = mysqli_real_escape_string($dbconnect, htmlspecialchars($_SESSION['loginuser'], ENT_QUOTES));
    $sql = "DELETE FROM `cookiedata` WHERE `user_name`='$user'";
    delete($sql);
    $logincheck = 1;
}
setcookie("loginname", "", time() - 3600, "/", null, false, true);
setcookie("loginid", "", time() - 3600, "/", null, false, true);
unset($_SESSION['loginuser']);
?>
