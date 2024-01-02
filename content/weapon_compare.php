<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Compare</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/compare.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href=""><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="index.html" class="title-span">Welcome</a>
            <div class="right">
                <div class="search-bar">
                    <input id="searchBarInput" type="text" placeholder="Search">
                    <button id="searchBarSearch"><img src="img/search.png" alt="search"></button>
                </div>
                <button id="menuBtn"><img src="img/menu-burger.png" alt="menu-btn"></button>
            </div>
        </div>
        
        <div id="menuSearch">
            <input id="menuSearchInput" type="text" placeholder="Search">
            <button id="menuSearchSearch"><img src="img/search.png" alt="search"></button>
        </div>

        <nav>
            <ul id="menuUl">
                <li><a href="content/weapon.php">Weapons</a></li>
                <li><a href="content/attachment.php">Attachments</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="row">
            <?php/*
				$sql = "SELECT COUNT(*) FROM toy WHERE AreaCode = '201609260001'";
				$stmt =  $db->prepare($sql);
				$error = $stmt->execute();
				
				if($rowcount = $stmt->fetchColumn())
					echo $rowcount;*/
			?>


            <div class="weapon-left">
                <select>
                <?php/*
                    if (!empty($_POST["ToyID"])) {
                        $sql = "SELECT image FROM images WHERE id = :id";
                        $stmt = $db->prepare($sql);

                        // 綁定id參數到你想要取得的圖片
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();

                        // 取得圖片資料
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        // 確保圖片資料不為空
                        if($row !== false) {
                            // 設定正確的Content-Type header
                            header("Content-Type: image/jpeg");

                            // 輸出圖片資料
                            echo $row['image'];
                        }
                    }
                    echo '<option value="'.$_POST['Weapon1'].'">'.$_POST['Weapon1'].'</option>';*/
                ?>
                <?php
                    $sql = "SELECT WeaponName FROM Weapon";
					if ($stmt = $db->prepare($sql)) {
						$stmt->execute();
						for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                            if ($rows[$count]['WeaponName'] != '')
                                echo "<option value=\"{$rows[$count]["WeaponName"]}\">{$rows[$count]["WeaponName"]}</option>";
                    }
                ?>
                </select>

                <?php
                    $sql = "SELECT * FROM Weapon WHERE WeaponName = 'R-99 SMG'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($row !== false) {
                        $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = 'R-99 SMG' and AttachmentName like 'Extended%Mag'";
                        $w_stmt = $db->prepare($w_sql);
                        $w_stmt->execute();
                        $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
                        $b_sql = "SELECT Value FROM white_attachment WHERE WeaponName = 'R-99 SMG' and AttachmentName like 'Extended%Mag'";
                        $b_stmt = $db->prepare($b_sql);
                        $b_stmt->execute();
                        $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
                        $p_sql = "SELECT Value FROM white_attachment WHERE WeaponName = 'R-99 SMG' and AttachmentName like 'Extended%Mag'";
                        $p_stmt = $db->prepare($p_sql);
                        $p_stmt->execute();
                        $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                        <img src="get_weapon_image.php?name=<?php echo $row['WeaponName'];?>" alt="<?php echo $row['WeaponName'];?>">
                        <table>
                            <tr><td><?php echo $row['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row['Type'];?></td></tr>
                            <tr><td><?php echo $row['Ammo'];?></td></tr>
                            <tr><td><?php echo "{$row['Body']}/{$row['Head']}/{$row['Legs']}";?></td></tr>
                            <tr><td><?php echo "{$row['Magazine']}/{$w_row['Value']}/{$b_row['Value']}/{$p_row['Value']}";?></td></tr>
                            <tr><td><?php echo round($row['ReloadTime']*1, 2) . "/" . round($row['ReloadTime']*0.967, 2) . "/" . round($row['ReloadTime']*0.937, 2) . "/" . round($row['ReloadTime']*0.9, 2);?></td></tr>
                        </table>
                <?php
                    }
                ?>
            </div>
            <div class="weapon-right">
                <select>
                    <option value="object4">Volt SMG</option>
                    <option value="object5">Object 5</option>
                    <option value="object6">Object 6</option>
                </select>
                <img src="Volt_SMG.png" alt="">
                <table>
                    <tr><td>SMG</td></tr>
                    <tr><td>Energy</td></tr>
                    <tr><td>19/15/12</td></tr>
                    <tr><td>19/21/23/26</td></tr>
                    <tr><td>2.03/1.96/1.89/1.83</td></tr>
                </table>
            </div>
        </div>
    </main>
    <script src="../js/scripts.js"></script>
</body>
</html>