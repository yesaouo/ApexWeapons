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
			echo $row['WeaponName'];
		}
	}
	?>
    </main>
    <script src="../js/scripts.js"></script>
</body>
</html>