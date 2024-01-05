<?php
	include("../function/condb.php");
    session_start();
	if($_SESSION["loggedin"]==true){
		$level=$_SESSION["level"];
	}else{
		?>
		<script>
			alert("你已登出");
		</script>
		<?php
			header('location:weapon.php');
	}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Pragma" Content="No-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>attachments_edit.php</title>
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
        <form action = "attachment_edit.php" method = "POST">
        <h3>Attachments</h3>
        <input type= "radio" name = "choose" value = "white_attachment"><label>白色</label>
        <input type= "radio" name = "choose" value = "blue_attachment"><label>藍色</label>
        <input type= "radio" name = "choose" value = "purple_attachment"><label>紫色</label>
        <input type= "radio" name = "choose" value = "gold_attachment"><label>金色</label>
        <input type= "radio" name = "choose" value = "hopup"><label>特殊配件</label>
        <input type = "submit" value = "查詢">
        </form>
        <?php
            if(isset($_POST['choose'])){
                $chooseType = $_POST['choose'];
                ?>
                <table class="table"><!--  Insertion  -->
                    <thead>
                    <?php if($chooseType == "hopup"){ ?>
                    <tr> 
                        <th>配件名稱</th>
                        <th>武器名稱</th>
                        <th>描述</th>
                        <th>狀態</th>
                        <th>圖片</th>                       
                    </tr>  
                    <?php }else{ ?>
                    <tr>
                        <th>配件名稱</th>
                        <th>武器名稱</th>
                        <th>數值</th> 
                    </tr> 
                    <?php } ?>
                    </thead> 
                    <tbody> 
                    <form action = "attachment_edit.php" method = "POST" enctype = "multipart/form-data">
                    <tr>

                        <?php
                            if($chooseType == "hopup"){
                        ?>
                        <th> <input type = "text" name = "InsertAttachmentName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertWeaponName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertDescription" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertStatus" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertImage" class = "mybar"/> </th>
                        <th> <input type = "submit" name = "InsertHopup" value = "新增" /> </th>
                        <?php }else if($chooseType == "white_attachment"){?>
                        <th> <input type = "text" name = "InsertWhiteAttachmentName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertWhiteWeaponName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertWhiteValue" class = "mybar"/> </th>
                        <th> <input type = "submit" name = "InsertWhite" value = "新增" /> </th>
                        <?php }else if($chooseType == "blue_attachment"){?>
                        <th> <input type = "text" name = "InsertBlueAttachmentName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertBlueWeaponName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertBlueValue" class = "mybar"/> </th>
                        <th> <input type = "submit" name = "InsertBlue" value = "新增" /> </th>
                        <?php }else if($chooseType == "purple_attachment"){?>
                        <th> <input type = "text" name = "InsertPurpleAttachmentName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertPurpleWeaponName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertPurpleValue" class = "mybar"/> </th>
                        <th> <input type = "submit" name = "InsertPurple" value = "新增" /> </th>
                        <?php }else if($chooseType == "gold_attachment"){?>
                        <th> <input type = "text" name = "InsertGoldAttachmentName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertGoldWeaponName" class = "mybar" required/> </th>
                        <th> <input type = "text" name = "InsertGoldValue" class = "mybar"/> </th>
                        <th> <input type = "submit" name = "InsertGold" value = "新增" /> </th>
                        <?php }?>
                    </tr>
                    </form>
                    </tbody>
                </table>
                <br><hr><br>
                <table class="table"><!--  Deletion  &  Updation  -->
                    <thead>
                    <?php if($chooseType == "hopup"){ ?>
                    <tr> 
                        <th>配件名稱</th>
                        <th>武器名稱</th>
                        <th>描述</th>
                        <th>狀態</th>
                        <th>圖片</th>                       
                    </tr>  
                    <?php }else{ ?>
                    <tr>
                        <th>配件名稱</th>
                        <th>武器名稱</th>
                        <th>數值</th> 
                    </tr>
                    <?php } ?>
                    </thead> 
                    <?php
                        if($chooseType == "white_attachment"){
                            $sql = "SELECT * FROM white_attachment";
                        }else if($chooseType == "blue_attachment"){
                            $sql = "SELECT * FROM blue_attachment";
                        }else if($chooseType == "purple_attachment"){
                            $sql = "SELECT * FROM purple_attachment";
                        }else if($chooseType == "gold_attachment"){
                            $sql = "SELECT * FROM gold_attachment";
                        }else if($chooseType == "hopup"){
                            $sql = "SELECT * FROM hopup";
                        }
                        if($stmt = $db->prepare($sql)){
                            $stmt->execute();
                            for($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++){
                    ?>
                    <tbody> 
                        <form action = "attachment_edit.php" method = "POST">
                            <tr> 
                            <?php
                                if($chooseType == "hopup"){ 
                            ?>
                                <td> <input type = "text" name = "UpdateAttachmentName" value = "<?php echo $rows[$count]['AttachmentName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateDescription" value = "<?php echo $rows[$count]['Description'];?>" class = "mybar"/> </td>
                                <!-- <td> <input type = "text" name = "UpdateStatus" value = "<?php# echo $rows[$count]['Status'];?>" class = "mybar"/> </td> -->
                                <td> <?php if($rows[$count]['Status'] == 1){?>
                                <input type = "radio" name = "UpdateStatus" value = "0" />0
                                <input type = "radio" name = "UpdateStatus" value = "1" checked/>1
                                <?php }else{ ?>
                                <input type = "radio" name = "UpdateStatus" value = "0" checked/>0
                                <input type = "radio" name = "UpdateStatus" value = "1" />1
                                <?php } ?> </td>
                                <td> <input type = "text" name = "UpdateImage" value = "IMAGE FUCK OFF" class = "mybar"/> </td>
                                <td> <input type = "submit" name = "UpdateHopup" value = "更新"/> </td>
                                <td> <input type = "submit" name = "DeleteHopup" value = "刪除"/> </td>
                            <?php
                                }else if($chooseType == "white_attachment"){ 
                            ?>
                                <td> <input type = "text" name = "UpdateWhiteAttachmentName" value = "<?php echo $rows[$count]['AttachmentName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateWhiteWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateWhiteValue" value = "<?php echo $rows[$count]['Value'];?>" class = "mybar"/> </td>
                                <td> <input type = "submit" name = "UpdateWhite" value = "更新"/> </td>
                                <td> <input type = "submit" name = "DeleteWhite" value = "刪除"/> </td>
                            <?php
                                }else if($chooseType == "blue_attachment"){ 
                            ?>
                                <td> <input type = "text" name = "UpdateBlueAttachmentName" value = "<?php echo $rows[$count]['AttachmentName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateBlueWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateBlueValue" value = "<?php echo $rows[$count]['Value'];?>" class = "mybar"/> </td>
                                <td> <input type = "submit" name = "UpdateBlue" value = "更新"/> </td>
                                <td> <input type = "submit" name = "DeleteBlue" value = "刪除"/> </td>
                            <?php
                                }else if($chooseType == "purple_attachment"){ 
                            ?>
                                <td> <input type = "text" name = "UpdatePurpleAttachmentName" value = "<?php echo $rows[$count]['AttachmentName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdatePurpleWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdatePurpleValue" value = "<?php echo $rows[$count]['Value'];?>" class = "mybar"/> </td>
                                <td> <input type = "submit" name = "UpdatePurple" value = "更新"/> </td>
                                <td> <input type = "submit" name = "DeletePurple" value = "刪除"/> </td>
                            <?php
                                }else if($chooseType == "gold_attachment"){ 
                            ?>
                                <td> <input type = "text" name = "UpdateGoldAttachmentName" value = "<?php echo $rows[$count]['AttachmentName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateGoldWeaponName" value = "<?php echo $rows[$count]['WeaponName'];?>" readonly class = "mybar"/> </td>
                                <td> <input type = "text" name = "UpdateGoldValue" value = "<?php echo $rows[$count]['Value'];?>" class = "mybar"/> </td>
                                <td> <input type = "submit" name = "UpdateGold" value = "更新"/> </td>
                                <td> <input type = "submit" name = "DeleteGold" value = "刪除"/> </td>
                            <?php
                                }
                            ?>
                            </tr> 
                        </form>
                    </tbody>
                    <?php
                            }
                        }
                    ?>
                </table>

                <?php
/*
                $n=$_POST['choose'];
                header('Content-Type: text/html; charset=UTF-8');
                echo "<table border ='1'>
                <tr>
                <th>配件名稱</th>
                <th>武器名稱</th>
                <th>子彈數量</th>
                </tr>";
                //$query = ("select * from weapon");
                for($i=0;$i<count($n);$i++){
                    $re = $n[$i];
                    $sql = "select * from ".$re;
                    $query = $db->query($sql);
                    //$stmt =  $db->prepare($query);
                    $result = $query->fetchAll();//以上寫法是為了防止「sql injection」
                    for($j=0; $j<count($result); $j++){
                        echo "<tr>";
                        if($re=="white_attachment"){
                            echo "<td>white ".$result[$j]['AttachmentName']."</td>";
                        }else if($re=="blue_attachment"){
                            echo "<td>blue ".$result[$j]['AttachmentName']."</td>";
                        }else if($re=="purple_attachment"){
                            echo "<td>purple ".$result[$j]['AttachmentName']."</td>";
                        }else if($re=="gold_attachment"){
                            echo "<td>gold ".$result[$j]['AttachmentName']."</td>";
                        }
                        echo "<td>".$result[$j]['WeaponName']."</td>";
                        echo "<td>".$result[$j]['Value']."</td>";
                        echo "<td>".$result[$j]['DamageInflu']."</td>";
                        echo "</tr>"; 
                    }
                }
            
            echo "</table>";
            if(isset($_POST['special'])){
                echo "<hr>";
                echo "<table border ='1'>
                <tr>
                <th>特殊配件</th>
                <th>武器名稱</th>
                <th>配件簡介</th>
                <th>賽季存在</th>
                </tr>";
                $m=$_POST['special'];
                $sql = "select * from ".$m;
                $query = $db->query($sql);
                //$stmt =  $db->prepare($query);
                $result = $query->fetchAll();//以上寫法是為了防止「sql injection」
                for($j=0; $j<count($result); $j++){
                    echo "<tr>";
                    echo "<td>".$result[$j]['AttachmentName']."</td>";
                    echo "<td>".$result[$j]['WeaponName']."</td>";
                    echo "<td>".$result[$j]['Description']."</td>";
                    echo "<td>".$result[$j]['Status']."</td>";
                    echo "</tr>"; 
                }
            }
*/
        ?>
			
            <?php
            }//end choose
            /*========================Button Action=======================*/
            if(isset($_POST["InsertWhite"])){
                $InsertWhiteAttachmentName = $_POST["InsertWhiteAttachmentName"];
                $InsertWhiteWeaponName = $_POST["InsertWhiteWeaponName"];
                $InsertWhiteValue = $_POST["InsertWhiteValue"];
                $sql = "INSERT INTO white_attachment (AttachmentName, WeaponName, Value) values (?,?,?)";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($InsertWhiteAttachmentName, $InsertWhiteWeaponName, $InsertWhiteValue));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["InsertBlue"])){
                $InsertBlueAttachmentName = $_POST["InsertBlueAttachmentName"];
                $InsertBlueWeaponName = $_POST["InsertBlueWeaponName"];
                $InsertBlueValue = $_POST["InsertBlueValue"];
                $sql = "INSERT INTO blue_attachment (AttachmentName, WeaponName, Value) values (?,?,?)";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($InsertBlueAttachmentName, $InsertBlueWeaponName, $InsertBlueValue));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["InsertPurple"])){
                $InsertPurpleAttachmentName = $_POST["InsertPurpleAttachmentName"];
                $InsertPurpleWeaponName = $_POST["InsertPurpleWeaponName"];
                $InsertPurpleValue = $_POST["InsertPurpleValue"];
                $sql = "INSERT INTO purple_attachment (AttachmentName, WeaponName, Value) values (?,?,?)";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($InsertPurpleAttachmentName, $InsertPurpleWeaponName, $InsertPurpleValue));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["InsertGold"])){
                $InsertGoldAttachmentName = $_POST["InsertGoldAttachmentName"];
                $InsertGoldWeaponName = $_POST["InsertGoldWeaponName"];
                $InsertGoldValue = $_POST["InsertGoldValue"];
                $sql = "INSERT INTO gold_attachment (AttachmentName, WeaponName, Value) values (?,?,?)";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($InsertGoldAttachmentName, $InsertGoldWeaponName, $InsertGoldValue));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["InsertHopup"])){
                $InsertAttachmentName = $_POST["InsertAttachmentName"];
                $InsertWeaponName = $_POST["InsertWeaponName"];
                $InsertDescription = $_POST["InsertDescription"];
                $InsertStatus = $_POST["InsertStatus"];
                $InsertImage = NULL;
                $sql = "INSERT INTO hopup (AttachmentName, WeaponName, Description, Status, Image) values (?,?,?,?,?)";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($InsertAttachmentName, $InsertWeaponName, $InsertDescription, $InsertStatus, $InsertImage));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["DeleteWhite"])){
                $WhiteWeaponName = $_POST["UpdateWhiteWeaponName"];
                $WhiteAttachmentName = $_POST["UpdateWhiteAttachmentName"];
                $sql = "DELETE FROM white_attachment WHERE AttachmentName = ? and WeaponName = ?";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($WhiteAttachmentName, $WhiteWeaponName));
                    if (!$success) {
                        echo "刪除失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["DeleteBlue"])){
                $BlueWeaponName = $_POST["UpdateBlueWeaponName"];
                $BlueAttachmentName = $_POST["UpdatBlueeAttachmentName"];
                $sql = "DELETE FROM blue_attachment WHERE AttachmentName = ? and WeaponName = ?";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($BlueAttachmentName, $BlueWeaponName));
                    if (!$success) {
                        echo "刪除失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["DeletePurple"])){
                $PurpleWeaponName = $_POST["UpdatePurpleWeaponName"];
                $PurpleAttachmentName = $_POST["PurpleUpdateAttachmentName"];
                $sql = "DELETE FROM purple_attachment WHERE AttachmentName = ? and WeaponName = ?";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($PurpleAttachmentName, $PurpleWeaponName));
                    if (!$success) {
                        echo "刪除失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["DeleteGold"])){
                $GoldWeaponName = $_POST["UpdateGoldWeaponName"];
                $GoldAttachmentName = $_POST["UpdateGoldAttachmentName"];
                $sql = "DELETE FROM gold_attachment WHERE AttachmentName = ? and WeaponName = ?";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($GoldAttachmentName, $GoldWeaponName));
                    if (!$success) {
                        echo "刪除失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["DeleteHopup"])){
                $WeaponName = $_POST["UpdateWeaponName"];
                $AttachmentName = $_POST["UpdateAttachmentName"];
                $sql = "DELETE FROM hopup WHERE AttachmentName = ? and WeaponName = ?";
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "刪除失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["UpdateWhite"])){
                $sql = "UPDATE white_attachment SET Value = ? WHERE Attachment = ? and WeaponName = ?";
                $WeaponName = $_POST["UpdateWhiteWeaponName"];
                $AttachmentName = $_POST["UpdateWhiteAttachmentName"];
                $newValue = $_POST["UpdateWhiteValue"];
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($newValue, $AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["UpdateBlue"])){
                $sql = "UPDATE blue_attachment SET Value = ? WHERE Attachment = ? and WeaponName = ?";
                $WeaponName = $_POST["UpdateBlueWeaponName"];
                $AttachmentName = $_POST["UpdateBlueAttachmentName"];
                $newValue = $_POST["UpdateBlueValue"];
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($newValue, $AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["UpdatePurple"])){
                $sql = "UPDATE purple_attachment SET Value = ? WHERE Attachment = ? and WeaponName = ?";
                $WeaponName = $_POST["UpdatePurpleWeaponName"];
                $AttachmentName = $_POST["UpdatePurpleAttachmentName"];
                $newValue = $_POST["UpdatePurpleValue"];
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($newValue, $AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["UpdateGold"])){
                $sql = "UPDATE gold_attachment SET Value = ? WHERE Attachment = ? and WeaponName = ?";
                $WeaponName = $_POST["UpdateGoldWeaponName"];
                $AttachmentName = $_POST["UpdateGoldAttachmentName"];
                $newValue = $_POST["UpdateGoldValue"];
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($newValue, $AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }else if(isset($_POST["UpdateHopup"])){
                $sql = "UPDATE hopup SET Description = ?, Status = ?, Image = ? WHERE AttachmentName = ? and WeaponName = ?";
                $WeaponName = $_POST["UpdateWeaponName"];
                $AttachmentName = $_POST["UpdateAttachmentName"];
                $newDescription = $_POST["UpdateDescription"];
                $newStatus = $_POST["UpdateStatus"];
                $newImage = NULL;
                if($stmt = $db->prepare($sql)){
                    $success = $stmt->execute(array($newDescription, $newStatus, $newImage, $AttachmentName, $WeaponName));
                    if (!$success) {
                        echo "儲存失敗!".$stmt->errorInfo();
                    }else{
                        #header('Location: weapon_edit.php');
                    }
                }
            }
            echo "<a href='logout.php'>登出</a>";
        ?>
        </div>
	</div>
</body>
</html>