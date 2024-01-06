<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true) {
    $previous_page = $_SERVER['HTTP_REFERER'];
    if (strpos($previous_page, 'attachment.php') !== false) {
        header('Location: attachment_edit.php');
    } elseif (strpos($previous_page, 'weapon.php') !== false) {
        header('Location: weapon_edit.php');
    } else {
        header('Location: ../index.html');
    }
    exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/log.css">
<title>登入介面</title>
</head>
<!--<body>
    <h1>Log In</h1>
    <h2>你可以選擇登入或是註冊帳號~</h2>
<form method="post" action="login.php">
帳號：
<input type="text" name="username"><br/><br/>
密碼：
<input type="password" name="password"><br><br>
<input type="submit" value="登入" name="submit"><br><br>
<a href="register.php">還沒有帳號？現在就註冊！</a>
</form>
</body>-->
<body>
    <div class="system_name">
      <h2>武器系統</h2>
    </div>
    
    <div class="login_page">
      <div id="container1">

        <div class="login">  
          
          <h3>登入 Login</h3>

          <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="帳號" required>
            <div class="tab"></div>
            <input type="password" id="password" name="password" placeholder="密碼" required>
            <div class="tab"></div>
            <input type="submit" value="登入" class="submit" name="submit">
          </form>  

          <h5 ><a href="register.php">註冊帳號</a></h5>
          
        </div><!-- login end-->
      </div><!-- container1 end-->
    </div><!-- login_page end-->
  </body>
</html>
