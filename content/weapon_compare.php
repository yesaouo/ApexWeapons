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
            <div class="weapon-left">
                <select>
                <?php
                    if (!empty($_POST["weapon1"])) {
                        $sql1 = "SELECT WeaponName FROM Weapon WHERE WeaponName = :weapon1";
                        $stmt1 = $db->prepare($sql1);
                        $stmt1->bindParam(':weapon1', $_POST["weapon1"]);
                        $stmt1->execute();
                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                        if($row1 !== false)
                            echo "<option value=\"{$_POST['weapon1']}\">{$_POST['weapon1']}</option>";
                    }
                    $sql = "SELECT WeaponName FROM Weapon";
					if ($stmt = $db->prepare($sql)) {
						$stmt->execute();
						for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                            if ($rows[$count]['WeaponName'] != $_POST['weapon1'])
                                echo "<option value=\"{$rows[$count]['WeaponName']}\">{$rows[$count]['WeaponName']}</option>";
                    }
                ?>
                </select>
                <?php
                    if(isset($row1) && $row1 !== false) {
                        $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $w_stmt = $db->prepare($w_sql);
                        $w_stmt->bindParam(':weapon1', $_POST["weapon1"]);
                        $w_stmt->execute();
                        $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
                        $b_sql = "SELECT Value FROM blue_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $b_stmt = $db->prepare($b_sql);
                        $b_stmt->bindParam(':weapon1', $_POST["weapon1"]);
                        $b_stmt->execute();
                        $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
                        $p_sql = "SELECT Value FROM purple_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $p_stmt = $db->prepare($p_sql);
                        $p_stmt->bindParam(':weapon1', $_POST["weapon1"]);
                        $p_stmt->execute();
                        $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                        <img src="get_weapon_image.php?name=<?php echo $row1['WeaponName'];?>" alt="<?php echo $row1['WeaponName'];?>">
                        <table>
                            <tr><td><?php echo $row['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row['Type'];?></td></tr>
                            <tr><td><?php echo $row['Ammo'];?></td></tr>
                            <tr><td><?php echo "$row['Body']/$row['Head']/$row['Legs']"?></td></tr>
                            <tr><td>17/20/23/26</td></tr>
                            <tr><td>2.45/2.37/2.29/2.21</td></tr>
                        </table>
                <?php
                    }
                ?>
            </div>
            <div class="weapon-right">
                <select>
                <?php
                    if (!empty($_POST["weapon2"])) {
                        $sql2 = "SELECT WeaponName FROM Weapon WHERE WeaponName = :weapon2";
                        $stmt2 = $db->prepare($sql2);
                        $stmt2->bindParam(':weapon2', $_POST["weapon2"]);
                        $stmt2->execute();
                        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                        if($row2 !== false)
                            echo "<option value=\"{$_POST['weapon2']}\">{$_POST['weapon2']}</option>";
                    }
                    $sql = "SELECT WeaponName FROM Weapon";
					if ($stmt = $db->prepare($sql)) {
						$stmt->execute();
						for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                            if ($rows[$count]['WeaponName'] != $_POST['weapon2'])
                                echo "<option value=\"{$rows[$count]['WeaponName']}\">{$rows[$count]['WeaponName']}</option>";
                    }
                ?>
                </select>
                <?php
                    if(isset($row2) && $row2 !== false) {
                        $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $w_stmt = $db->prepare($w_sql);
                        $w_stmt->bindParam(':weapon2', $_POST["weapon2"]);
                        $w_stmt->execute();
                        $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
                        $b_sql = "SELECT Value FROM blue_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $b_stmt = $db->prepare($b_sql);
                        $b_stmt->bindParam(':weapon2', $_POST["weapon2"]);
                        $b_stmt->execute();
                        $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
                        $p_sql = "SELECT Value FROM purple_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $p_stmt = $db->prepare($p_sql);
                        $p_stmt->bindParam(':weapon2', $_POST["weapon2"]);
                        $p_stmt->execute();
                        $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                        <img src="get_weapon_image.php?name=<?php echo $row2['WeaponName'];?>" alt="<?php echo $row2['WeaponName'];?>">
                        <table>
                            <tr><td><?php echo $row2['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row2['Type'];?></td></tr>
                            <tr><td><?php echo $row2['Ammo'];?></td></tr>
                            <tr><td><?php echo "{$row2['Head']}/{$row2['Body']}/{$row2['Legs']}";?></td></tr>
                            <tr><td><?php echo "{$row2['Magazine']}/{$w_row['Value']}/{$b_row['Value']}/{$p_row['Value']}";?></td></tr>
                            <tr><td><?php echo round($row2['ReloadTime']*1, 2) . "/" . round($row2['ReloadTime']*0.967, 2) . "/" . round($row2['ReloadTime']*0.937, 2) . "/" . round($row2['ReloadTime']*0.9, 2);?></td></tr>
                        </table>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>
    <script src="../js/scripts.js"></script>
</body>
</html>