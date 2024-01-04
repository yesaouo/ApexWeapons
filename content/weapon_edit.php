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
		padding: 50px 130px 220px 130px;
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
				<form action = "weapon_edit.php" method="POST">
				<tr>
					<th> <input type = "search" name = "WeaponName"/> </th>
					<th> <input type = "search" name = "Type"/> </th>
					<th> <input type = "search" name = "Ammo"/> </th>
					<th> <input type = "search" name = "Body"/> </th>
					<th> <input type = "search" name = "Head"/> </th>
					<th> <input type = "search" name = "Legs"/> </th>
					<th> <input type = "search" name = "Magazine"/> </th>
					<th> <input type = "search" name = "ReloadTime"/> </th>
					<th> Image </th>
					<input type="submit" name = "Insert" value = "新增" />
				</tr>
				</form>
                </tbody>
            </table>
            <table class="table">
                <thead>
                <tr> 
                    <th></th>
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
                    <form action = "weapon_edit.php" method="POST">
                    <input type="submit" name = "Delete" value = "刪除"/>
                    <?php
                        $sql = "SELECT * FROM weapon";
                        if($stmt = $db->prepare($sql)){
                            $stmt->execute();
                            for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
                    ?>
                        <tr> 
                            <!--<th scope="row"><?php# echo $count;?></th> -->
                            <td><input type = "checkbox" name = "choose[]" value = "<?php echo $rows[$count]['WeaponName'];?>" ></td> 
                            <td><?php echo $rows[$count]['WeaponName'];?></td> 
                            <td><?php echo $rows[$count]['Type'];?></td> 
                            <td><?php echo $rows[$count]['Ammo'];?></td> 
                            <td><?php echo $rows[$count]['Body'];?></td> 
                            <td><?php echo $rows[$count]['Head'];?></td> 
                            <td><?php echo $rows[$count]['Legs'];?></td> 
                            <td><?php echo $rows[$count]['Magazine'];?></td> 
                            <td><?php echo $rows[$count]['ReloadTime'];?></td> 
                            <td><?php #echo $rows[$count]['Image'];?></td> 
                        </tr> 
                    <?php
                            }
                        }
                    ?>
                    </form>
                </tbody>
            </table>
            <table class="table">
                <thead>
                <tr> 
                    <th></th>
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
                    <form action = "test.php" method="POST">
                    <input type="submit" name = "Update" value = "更新"/>
                    <?php
                        $sql = "SELECT * FROM weapon";
                        if($stmt = $db->prepare($sql)){
                            $stmt->execute();
                            for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
                    ?>
                        <!--<tr> 
                            <th scope="row"><?php# echo $count;?></th>
                            <td>
                            <input type = "checkbox" name = "choose[]" value = "<?php# echo $rows[$count]['WeaponName'];?>" >
                            </td> 
                            <td><?php# echo $rows[$count]['WeaponName'];?></td> 
                            <td><?php# echo $rows[$count]['Type'];?></td> 
                            <td><?php# echo $rows[$count]['Ammo'];?></td> 
                            <td><?php# echo $rows[$count]['Body'];?></td> 
                            <td><?php# echo $rows[$count]['Head'];?></td> 
                            <td><?php# echo $rows[$count]['Legs'];?></td> 
                            <td><?php# echo $rows[$count]['Magazine'];?></td> 
                            <td><?php# echo $rows[$count]['ReloadTime'];?></td> 
                            <td><?php# echo $rows[$count]['Image'];?></td> 
                        </tr>-->
                        <tbody>
                        <tr>
                            <td> <input type = "checkbox" name = "choose[]" value = "<?php #echo $rows[$count]['WeaponName'];?>" > </td>
                            <td> <input type = "text" name = "WeaponName" placeholder = "<?php #echo $rows[$count]['WeaponName'];?>"/> </td>
                            <td> <input type = "text" name = "Type" placeholder = "<?php #echo $rows[$count]['Type'];?>"/> </td>
                            <td> <input type = "text" name = "Ammo" placeholder = "<?php #echo $rows[$count]['Ammo'];?>"/> </td>
                            <td> <input type = "text" name = "Body" placeholder = "<?php #echo $rows[$count]['Body'];?>"/> </td>
                            <td> <input type = "text" name = "Head" placeholder = "<?php #echo $rows[$count]['Head'];?>"/> </td>
                            <td> <input type = "text" name = "Legs" placeholder = "<?php #echo $rows[$count]['Legs'];?>"/> </td>
                            <td> <input type = "text" name = "Magazine" placeholder = "<?php #echo $rows[$count]['Magazine'];?>"/> </td>
                            <td> <input type = "text" name = "ReloadTime" placeholder = "<?php #echo $rows[$count]['ReloadTime'];?>"/> </td>
                            <td> <input type = "text" name = "Image" placeholder = "NAH<?php# echo $rows[$count]['Image'];?>"/> </td>
                        </tr>
                        </tbody>
                    <?php
                            }
                        }
                    ?>
                    </form>
            </table>

                <?php
                    #$id = ((int)$_POST["id"]);
                    if(isset($_POST["Insert"])){
                        if(empty($_POST["WeaponName"]) || empty($_POST["Type"]) || empty($_POST["Ammo"]) || empty($_POST["Body"]) || empty($_POST["Head"]) || empty($_POST["Leg"])|| empty($_POST["Magazine"]) || empty($_POST["ReloadTime"])){
                            ?>
                            <script>
                                alert("少輸入東西");
                            </script>
                            <?php
                        }else{
                        $WeaponName = $_POST["WeaponName"];
                        $Type = $_POST["Type"];
                        $Ammo = $_POST["Ammo"];
                        $Body = $_POST["Body"];
                        $Head = $_POST["Head"];
                        $Legs = $_POST["Legs"];
                        $Magazine = $_POST["Magazine"];
                        $ReloadTime = $_POST["ReloadTime"];
                        $Image = "";
                        $sql = "INSERT INTO weapon (WeaponName, Type, Ammo, Body, Head, Legs, Magazine, ReloadTime, Image) values (?,?,?,?,?,?,?,?,NULL)";
                        if($stmt = $db->prepare($sql)){
                            $success = $stmt->execute(array($WeaponName, $Type, $Ammo, $Body, $Head, $Legs, $Magazine, $ReloadTime));
                            if (!$success) {
                                echo "儲存失敗!".$stmt->errorInfo();
                            }else{
                                #header('Location: weapon_edit.php');
                            }
                        }
                      }
                    }else if(isset($_POST["Delete"])){
                        $n = $_POST["choose"];
                        for($i = 0; $i < count($n); $i++){
                            $WeaponName = $n[$i];
                            $sql = "DELETE FROM weapon WHERE WeaponName = ?";
                            if($stmt = $db->prepare($sql)){
                                $success = $stmt->execute(array($WeaponName));
                                if (!$success) {
                                    echo "刪除失敗!".$stmt->errorInfo();
                                }else{
                                    #header('Location: weapon_edit.php');
                                }
                            }
                        }
                    }else if(isset($_POST["Update"])){
                        $n = $_POST["choose"];
                        $sql = "UPDATE weapon SET WeaponName = ?, Type = ?, Ammo = ?, Body = ?, Head = ?, Legs = ?, Magazine = ?, ReloadTime = ?, Image = ? WHERE WeaponName = ?";
                        for($i = 0; $i < count($n); $i++){
                            $WeaponName = $n[$i];
                            $newWeaponName = $_POST['WeaponName'];# ? $_POST["WeaponName"] : NULL;
                            $newType = $_POST["Type"];# ? $_POST["Type"] : NULL;
                            $newAmmo = $_POST["Ammo"];# ? $_POST["Ammo"] : NULL;
                            $newBody = $_POST["Body"];# ? $_POST["Body"] : NULL;
                            $newHead = $_POST["Head"];# ? $_POST["Head"] : NULL;
                            $newLegs = $_POST["Legs"];# ? $_POST["Legs"] : NULL;
                            $newMagazine = $_POST["Magazine"];# ? $_POST["Magazine"] : NULL;
                            $newReloadTime = $_POST["ReloadTime"];# ? $_POST["ReloadTime"] : NULL;
                            $newImage = NULL;
                            if($stmt = $db->prepare($sql)){
                                $success = $stmt->execute(array($newWeaponName, $newType, $newAmmo, $newBody, $newHead, $newLegs, $newMagazine, $newReloadTime, $newImage, $WeaponName));
                                if (!$success) {
                                    echo "儲存失敗!".$stmt->errorInfo();
                                }else{
                                    #header('Location: weapon_edit.php');
                                }
                            }
                        }
                    }
                ?>
        </div>
	</div>
</body>
</html>