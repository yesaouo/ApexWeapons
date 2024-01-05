<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Search</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href="../"><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="" class="title-span">Search</a>
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
	<?php
	if (!empty($_GET['search'])) {
		$search = urldecode($_GET['search']);
		$sql = "SELECT * FROM Weapon WHERE WeaponName = :search";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':search', $search);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($row)) {
			echo "搜尋結果<br><br>";
			$searchWithWildcards = "%{$search}%";
			$sql = "SELECT * FROM Weapon WHERE WeaponName LIKE :search";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':search', $searchWithWildcards);
			$stmt->execute();
			$rows = $stmt->fetchAll();
			foreach ($rows as $row) {
				echo "<a href=\"?search=" . $row['WeaponName'] . "\">" . $row['WeaponName'] . "</a>";
			}
		} else {
            $w_sql = "SELECT Value FROM white_attachment WHERE WeaponName = :search and AttachmentName like 'Extended%Mag'";
            $w_stmt = $db->prepare($w_sql);
            $w_stmt->bindParam(':search', $search);
            $w_stmt->execute();
            $w_row = $w_stmt->fetch(PDO::FETCH_ASSOC);
            $b_sql = "SELECT Value FROM blue_attachment WHERE WeaponName = :search and AttachmentName like 'Extended%Mag'";
            $b_stmt = $db->prepare($b_sql);
            $b_stmt->bindParam(':search', $search);
            $b_stmt->execute();
            $b_row = $b_stmt->fetch(PDO::FETCH_ASSOC);
            $p_sql = "SELECT Value FROM purple_attachment WHERE WeaponName = :search and AttachmentName like 'Extended%Mag'";
            $p_stmt = $db->prepare($p_sql);
            $p_stmt->bindParam(':search', $search);
            $p_stmt->execute();
            $p_row = $p_stmt->fetch(PDO::FETCH_ASSOC);
    ?>
            <div class="weapon">
                <select id="select" onchange="callPHP()">
                    <?php
                        $sql = "SELECT WeaponName FROM Weapon";
                        if ($stmt = $db->prepare($sql)) {
                            $stmt->execute();
                            for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++)
                                echo "<option value=\"{$rows[$count]['WeaponName']}\">{$rows[$count]['WeaponName']}</option>";
                        }
                    ?>
                </select>
                <img src="get_weapon_image.php?name=<?php echo $row['WeaponName'];?>" alt="<?php echo $row['WeaponName'];?>">
                <table>
                    <tr><td class="left">Name:</td><td><?php echo $row['WeaponName'];?></td></tr>
                    <tr><td class="left">Type:</td><td><?php echo $row['Type'];?></td></tr>
                    <tr><td class="left">Ammo:</td><td><?php echo $row['Ammo'];?></td></tr>
                    <tr><td class="left">Damage:</td><td><?php echo "{$row['Head']}/{$row['Body']}/{$row['Legs']}";?></td></tr>
                    <tr><td class="left">DPS:</td><td><?php 
                        $headDPS = $row['Head'] * $row['FireRate'];
                        $bodyDPS = $row['Body'] * $row['FireRate'];
                        $legsDPS = $row['Legs'] * $row['FireRate'];
                        echo "{$headDPS}/{$bodyDPS}/{$legsDPS}";
                    ?></td></tr>
                    <tr><td class="left">Magazine:</td><td><?php echo "{$row['Magazine']}/{$w_row['Value']}/{$b_row['Value']}/{$p_row['Value']}";?></td></tr>
                    <tr><td class="left">Reload Time:</td><td><?php echo round($row['ReloadTime']*1, 2) . "/" . round($row['ReloadTime']*0.967, 2) . "/" . round($row['ReloadTime']*0.937, 2) . "/" . round($row['ReloadTime']*0.9, 2);?></td></tr>
                </table>
            </div>
    <?php
		}
	} else {
        echo "搜尋結果<br><br>";
		$sql = "SELECT * FROM Weapon";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) {
			echo "<a href=\"?search=" . $row['WeaponName'] . "\">" . $row['WeaponName'] . "</a>";
		}
    }
	?>
    </main>
    <script src="../js/scripts.js"></script>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const search = urlParams.get('search');
            if (search !== null)
                document.getElementById('select').value = search;
        }
        function callPHP() {
            const select = document.getElementById("select").value;
            window.location.href = `?search=${select}`;
        }
    </script>
</body>
</html>