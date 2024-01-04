<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/log.css">
<title>會員註冊</title>
    <script>
        
        function validateForm() {
            var x = document.forms["registerForm"]["password"].value;
            var y = document.forms["registerForm"]["password_check"].value;
            if(x.length<3){
                alert("密碼長度不足");
                return false;
            }
            if (x != y) {
                alert("請確認密碼是否輸入正確");
                return false;
            }
        }
    </script>
    
    </head>
<body>
   <!-- <h1>註冊頁面</h1>
<form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
帳  號：
    <input type="text" name="username"><br/><br/>
密  碼：
<input type="password" name="password" id="password"><br/><br/>
確認密碼：
    <input type="password" name="password_check" id="password_check"><br/><br/>
<input type="submit" value="註冊" name="submit">
<input type="reset" value="重設" name="submit">
</form>-->
<div class="signup_page">
      <div id="container2">

        <div class="signup">  
          
          <h3>註冊 Sign Up</h3>

          <form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
            <input type="text" id="username2" name="username" placeholder="帳號" required>
            <div class="tab"></div>
            <input type="text" id="password2" name="password" placeholder="密碼" required>
            <div class="tab"></div>
            <input type="text" id="comfirm_password" name="comfirm_password" placeholder="確認密碼" required>
            <div class="tab"></div>            
            <input type="submit" value="註冊" class="submit" name="submit">
          </form>  
        </div><!-- signup end-->
      </div><!-- container2 end-->
    </div><!-- signup_page end--> 
</body>   
<?php 
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM user WHERE username='".$username."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO user (username, password , good)
            VALUES('".$username."','".$password."','0')";
        
        if(mysqli_query($conn, $sql)){
            echo "<div class=\"finish\">註冊成功!3秒後將自動跳轉頁面</div>";
            echo "<a href='index.php' class=\"finish\">未成功跳轉頁面請點擊此</a>";
            header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "<div class=\"finish1\">該帳號已有人使用!</div>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}

mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} 
?>
</html>