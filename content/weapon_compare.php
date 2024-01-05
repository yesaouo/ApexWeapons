<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Comparison</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/compare.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href="../"><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="" class="title-span">Comparison</a>
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
                <li><a href="attachment.php">Attachments</a></li>
                <li><a href="weapon.php">Weapons</a></li>
                <li><a href="weapon_compare.php">Comparison</a></li>
                <li><a href="damage_rank.php">Damage Rank</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="row">
            <div class="weapon-left">
                <select id="select1" onchange="callPHP()">
                    <option value="">Choose a Weapon</option>
                    <?php
                        $sql = "SELECT WeaponName FROM Weapon";
                        if ($stmt = $db->prepare($sql)) {
                            $stmt->execute();
                            for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                                echo "<option value=\"{$rows[$count]['WeaponName']}\">{$rows[$count]['WeaponName']}</option>";
                        }
                    ?>
                </select>
                <?php
                    if (!empty($_GET["weapon1"])) {
                        $weapon1 = $_GET["weapon1"];
                        $sql1 = "SELECT * FROM Weapon WHERE WeaponName = :weapon1";
                        $stmt1 = $db->prepare($sql1);
                        $stmt1->bindParam(':weapon1', $weapon1);
                        $stmt1->execute();
                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                        $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $w_stmt = $db->prepare($w_sql);
                        $w_stmt->bindParam(':weapon1', $weapon1);
                        $w_stmt->execute();
                        $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
                        $b_sql = "SELECT Value FROM blue_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $b_stmt = $db->prepare($b_sql);
                        $b_stmt->bindParam(':weapon1', $weapon1);
                        $b_stmt->execute();
                        $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
                        $p_sql = "SELECT Value FROM purple_attachment WHERE WeaponName = :weapon1 and AttachmentName like 'Extended%Mag'";
                        $p_stmt = $db->prepare($p_sql);
                        $p_stmt->bindParam(':weapon1', $weapon1);
                        $p_stmt->execute();
                        $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                        <img src="get_weapon_image.php?name=<?php echo $row1['WeaponName'];?>" alt="<?php echo $row1['WeaponName'];?>">
                        <table>
                            <tr><td><?php echo $row1['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row1['Type'];?></td></tr>
                            <tr><td><?php echo $row1['Ammo'];?></td></tr>
                            <tr><td><?php echo "{$row1['Head']}/{$row1['Body']}/{$row1['Legs']}";?></td></tr>
                            <tr><td><?php 
                                $headDPS = $row1['Head'] * $row1['FireRate'];
                                $bodyDPS = $row1['Body'] * $row1['FireRate'];
                                $legsDPS = $row1['Legs'] * $row1['FireRate'];
                                echo "{$headDPS}/{$bodyDPS}/{$legsDPS}";
                            ?></td></tr>
                            <tr><td><?php echo "{$row1['Magazine']}/{$w_row['Value']}/{$b_row['Value']}/{$p_row['Value']}";?></td></tr>
                            <tr><td><?php echo round($row1['ReloadTime']*1, 2) . "/" . round($row1['ReloadTime']*0.967, 2) . "/" . round($row1['ReloadTime']*0.937, 2) . "/" . round($row1['ReloadTime']*0.9, 2);?></td></tr>
                        </table>
                <?php
                    }
                ?>
            </div>
            <div class="weapon-right">
                <select id="select2" onchange="callPHP()">
                    <option value="">Choose a Weapon</option>
                    <?php
                        $sql = "SELECT WeaponName FROM Weapon";
                        if ($stmt = $db->prepare($sql)) {
                            $stmt->execute();
                            for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                                echo "<option value=\"{$rows[$count]['WeaponName']}\">{$rows[$count]['WeaponName']}</option>";
                        }
                    ?>
                </select>
                <?php
                    if (!empty($_GET["weapon2"])) {
                        $weapon2 = $_GET["weapon2"];
                        $sql2 = "SELECT * FROM Weapon WHERE WeaponName = :weapon2";
                        $stmt2 = $db->prepare($sql2);
                        $stmt2->bindParam(':weapon2', $weapon2);
                        $stmt2->execute();
                        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                        $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $w_stmt = $db->prepare($w_sql);
                        $w_stmt->bindParam(':weapon2', $weapon2);
                        $w_stmt->execute();
                        $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
                        $b_sql = "SELECT Value FROM blue_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $b_stmt = $db->prepare($b_sql);
                        $b_stmt->bindParam(':weapon2', $weapon2);
                        $b_stmt->execute();
                        $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
                        $p_sql = "SELECT Value FROM purple_attachment WHERE WeaponName = :weapon2 and AttachmentName like 'Extended%Mag'";
                        $p_stmt = $db->prepare($p_sql);
                        $p_stmt->bindParam(':weapon2', $weapon2);
                        $p_stmt->execute();
                        $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                        <img src="get_weapon_image.php?name=<?php echo $row2['WeaponName'];?>" alt="<?php echo $row2['WeaponName'];?>">
                        <table>
                            <tr><td><?php echo $row2['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row2['Type'];?></td></tr>
                            <tr><td><?php echo $row2['Ammo'];?></td></tr>
                            <tr><td><?php echo "{$row2['Head']}/{$row2['Body']}/{$row2['Legs']}";?></td></tr>
                            <tr><td><?php 
                                $headDPS = $row2['Head'] * $row2['FireRate'];
                                $bodyDPS = $row2['Body'] * $row2['FireRate'];
                                $legsDPS = $row2['Legs'] * $row2['FireRate'];
                                echo "{$headDPS}/{$bodyDPS}/{$legsDPS}";
                            ?></td></tr>
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
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const weapon1 = urlParams.get('weapon1');
            const weapon2 = urlParams.get('weapon2');
            if (weapon1 !== null)
                document.getElementById('select1').value = weapon1;
            if (weapon2 !== null)
                document.getElementById('select2').value = weapon2;
        }
        function callPHP() {
            const weapon1 = document.getElementById("select1").value;
            const weapon2 = document.getElementById("select2").value;
            window.location.href = `?weapon1=${weapon1}&weapon2=${weapon2}`;
            /*
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xhttp.open("GET", `weapon_compare.php?weapon1=${weapon1}&weapon2=${weapon2}`, true);
            xhttp.send();
            */
            /*
            var xhr = new XMLHttpRequest();
            xhr.open("POST", 'weapon_compare.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log(this.responseText);
                }
            }
            xhr.send(`weapon1=${weapon1}&weapon2=${weapon2}`);
            */
        }
    </script>
</body>
</html>