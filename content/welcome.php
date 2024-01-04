<?php
session_start();  //很重要，可以用的變數存在session裡
echo "<a href='logout.php'>登出</a>";
$username=$_SESSION["username"];
$level=$_SESSION["level"];
echo $username;
echo $level;
?>