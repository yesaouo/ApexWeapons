<?php
	include("../function/condb.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Weapon_edit.php</title>
  <style>
	body {
		margin: 0px;
	}
	a {
		text-decoration: none;
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
	}
	
	.menu {
		position:fixed;
		width: 100%;
		height: 40px;
		background-color: dimgrey;
		z-index: 9999999;
	}
	
	.menu a {
		text-decoration: none;
		color: white;
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
	}
	
	.menu_css {
		float: left;
		width: 70%;
		height: inherit;
		overflow: hidden;
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
		color: white;
		border-spacing: 0px;
	}
	.menu_css tr {
		display: block;
	}
	.menu_css td {
		height: 40px;
		padding: 0px 15px 0px 15px;
		white-space: nowrap;
	}
	.menu_css td:hover {
		background-color: black;
	}
	
	.menu_search{
		width: 30%;
		height: inherit;
		white-space: nowrap;
		overflow: hidden;
		font-family: 微軟正黑體,新細明體,標楷體;
		font-weight: bold;
		font-size: 17px;
		color: white;
	}
	.menu_search tr {
		display: block;
	}
	.menu_search td {
		height: 40px;
		padding: 0px 15px 0px 15px;
	}
	.menu_search td:hover {
		background-color: black;
	}
	
	.content {
		position: relative;
		word-wrap: break-word;
		width: 100%;
		top: 40px;
		background-color: #f1f1f1;
	}
	
	.inner_content {
		padding: 50px 70px 220px 70px;
	}
	
	.inner_content table {
		background-color: white;
	}
	
	li img {
		width: 100%;
		height: 100%;
	}
	
	input[type=text] {
		color: black;
	}
	
	form {
		margin-bottom: 0em;
	}

    .mybar {
        width:130px;
    }
  </style>
</head>
<body>
	<div class="menu">
		<table class="menu_css">
			<tr>
				<td>
					<a href="../index.html">Home</a>
				</td>
				<td>
					<a href="Weapon.php">武器</a>
				</td>
				<td>
					<a href="attachment.php">配件</a>
				</td>
			</tr>
		</table>
		<!--<table class="menu_search">
			<tr>
				<td>
					<form method="post" action="toy.php">
					Search
					  <input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" />
					  <input type="submit" value="送出">				
					</form>
				</td>
			</tr>
		</table>-->
	</div>
	<div class="content">
		<div class="inner_content">
			<table class="table">
			    <thead>
                    <tr> 
                    <th>武器名稱</th> 
                    <th>類型</th> 
                    <th>彈藥</th> 
                    <th>身體傷害</th> 
                    <th>頭部傷害</th> 
                    <th>腿部傷害</th> 
                    <th>彈夾容量</th>
                    <th>裝填時間</th>
                    <th>圖片</th>
                    </tr>  
			    </thead> 
			    <tbody> 
				<form action = "weapon_edit.php" method="POST" enctype="multipart/form-data">
				<tr>
					<th> <input type = "text" name = "InsertWeaponName" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertType" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertAmmo" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertBody" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertHead" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertLegs" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertMagazine" class = "mybar" required/> </th>
					<th> <input type = "text" name = "InsertReloadTime" class = "mybar" required/> </th>
					<th> <input type = "file" name = "InsertImage"> </th>
					<th> <input type = "submit" name = "Insert" value = "新增" /> </th>
				</tr>
				</form>
                </tbody>
            </table>
            <br><hr><br>
            <table class="table">
                <thead>
                <tr> 
                    <th>武器名稱</th> 
                    <th>類型</th> 
                    <th>彈藥</th> 
                    <th>身體傷害</th> 
                    <th>頭部傷害</th> 
                    <th>腿部傷害</th> 
                    <th>彈夾容量</th>
                    <th>裝填時間</th>
                    <th>圖片</th>
                </tr>  
                </thead> 
                    <?php
                        $sql = "SELECT * FROM weapon";
                        if($stmt = $db->prepare($sql)){
                            $stmt->execute();
                            for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
                    ?>
                <tbody> 
                    <form action = "weapon_edit.php" method="POST">
                        <tr> 
                            <td> <input type = "text" name = "UpdateWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateType" value = "<?php echo $rows[$count]['Type'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateAmmo" value = "<?php echo $rows[$count]['Ammo'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateBody" value = "<?php echo $rows[$count]['Body'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateHead" value = "<?php echo $rows[$count]['Head'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateLegs" value = "<?php echo $rows[$count]['Legs'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateMagazine" value = "<?php echo $rows[$count]['Magazine'];?>" class = "mybar"/> </td>
                            <td> <input type = "text" name = "UpdateReloadTime" value = "<?php echo $rows[$count]['ReloadTime'];?>" class = "mybar"/> </td>
                            <td> <img src = "get_weapon_image.php?name=<?php echo $rows[$count]['WeaponName'];?>" alt = "<?php echo $rows[$count]['WeaponName'];?>" width = 200px height = 150px> </td>
                            <td> <input type = "submit" name = "Update" value = "更新"/> </td>
                            <td> <input type = "submit" name = "Delete" value = "刪除"/> </td>
                        </tr> 
                    </form>
                </tbody>
                    <?php
                            }
                        }
                    ?>
            </table>

                <?php
                    if(isset($_POST["Insert"])){
                        $InsertWeaponName = $_POST["InsertWeaponName"];
                        $InsertType = $_POST["InsertType"];
                        $InsertAmmo = $_POST["InsertAmmo"];
                        $InsertBody = $_POST["InsertBody"];
                        $InsertHead = $_POST["InsertHead"];
                        $InsertLegs = $_POST["InsertLegs"];
                        $InsertMagazine = $_POST["InsertMagazine"];
                        $InsertReloadTime = $_POST["InsertReloadTime"];
                        
                        #失敗QQ
                        /*if(!empty($_FILES["InsertImage"]["name"])){
                            $filename = basename($_FILES["InsertImage"]["name"]);
                            $targetFilePath = 'upload/' . $filename;
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                            if(in_array($fileType, $allowTypes)){
                                if(move_uploaded_file($_FILES["InsertImage"]["tmp_name"], $targetFilePath)){
                                    $sql = "INSERT INTO weapon (WeaponName, Type, Ammo, Body, Head, Legs, Magazine, ReloadTime, Image) values (?,?,?,?,?,?,?,?,?)";
                                    if($stmt = $db->prepare($sql)){
                                        $success = $stmt->execute(array($InsertWeaponName, $InsertType, $InsertAmmo, $InsertBody, $InsertHead, $InsertLegs, $InsertMagazine, $InsertReloadTime, $filename));
                                        if (!$success) {
                                            echo "儲存失敗!".$stmt->errorInfo();
                                        }else{
                                            #header('Location: weapon_edit.php');
                                        }
                                    }
                                }else{
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            }else{
                                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed to upload.";
                            }
                        }else{
                            echo "Please select a file to upload.";
                        }*/
                        
                        #$sql = "INSERT INTO weapon (WeaponName, Type, Ammo, Body, Head, Legs, Magazine, ReloadTime, Image) values (?,?,?,?,?,?,?,?,?)";
                        #Image都先設定成NULL
                        $sql = "INSERT INTO weapon (WeaponName, Type, Ammo, Body, Head, Legs, Magazine, ReloadTime) values (?,?,?,?,?,?,?,?)";
                        if($stmt = $db->prepare($sql)){
                            #$success = $stmt->execute(array($InsertWeaponName, $InsertType, $InsertAmmo, $InsertBody, $InsertHead, $InsertLegs, $InsertMagazine, $InsertReloadTime, $InsertImage));
                            $success = $stmt->execute(array($InsertWeaponName, $InsertType, $InsertAmmo, $InsertBody, $InsertHead, $InsertLegs, $InsertMagazine, $InsertReloadTime));
                            if (!$success) {
                                echo "儲存失敗!".$stmt->errorInfo();
                            }else{
                                #header('Location: weapon_edit.php');
                            }
                        }
                    }else if(isset($_POST["Delete"])){
                        $WeaponName = $_POST["UpdateWeaponName"];
                        $sql = "DELETE FROM weapon WHERE WeaponName = ?";
                        if($stmt = $db->prepare($sql)){
                            $success = $stmt->execute(array($WeaponName));
                            if (!$success) {
                                echo "刪除失敗!".$stmt->errorInfo();
                            }else{
                                #header('Location: weapon_edit.php');
                            }
                        }
                    }else if(isset($_POST["Update"])){
                        $sql = "UPDATE weapon SET Type = ?, Ammo = ?, Body = ?, Head = ?, Legs = ?, Magazine = ?, ReloadTime = ?, Image = ? WHERE WeaponName = ?";
                        $WeaponName = $_POST["UpdateWeaponName"];
                        $newType = $_POST["UpdateType"];
                        if(isset($_POST["UpdateType"]) && !empty($_POST["UpdateType"])){
                            echo "Success";
                        }else{
                            echo "FUCK";
                        }
                        $newAmmo = $_POST["UpdateAmmo"];
                        $newBody = $_POST["UpdateBody"];
                        $newHead = $_POST["UpdateHead"];
                        $newLegs = $_POST["UpdateLegs"];
                        $newMagazine = $_POST["UpdateMagazine"];
                        $newReloadTime = $_POST["UpdateReloadTime"];
                        $newImage = NULL;
                        if($stmt = $db->prepare($sql)){
                            $success = $stmt->execute(array($newType, $newAmmo, $newBody, $newHead, $newLegs, $newMagazine, $newReloadTime, $newImage, $WeaponName));
                            if (!$success) {
                                echo "儲存失敗!".$stmt->errorInfo();
                            }else{
                                #header('Location: weapon_edit.php');
                            }
                        }
                    }
                ?>
        </div>
	</div>
</body>
</html>