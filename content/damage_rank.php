<!--
<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Apex Legends 武器排行</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            color: #333;
            text-align: center;
            padding: 20px 0;
        }
        label, select {
            display: block;
            margin: 0 0 10px;
            padding: 10px;
            font-size: 16px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        li:last-child {
            border-bottom: none;
        }
    </style>
    <script>
        // 這裡是你的武器數據
        var weapons = {
            "沒有": {
                "單發": ["武器1", "武器2", "武器3"],
                "一管": ["武器4", "武器5", "武器6"],
                "DPS": ["武器7", "武器8", "武器9"]
            },
            // 其他配件等級的數據...
        };

        function updateRanking() {
            var accessoryLevel = document.getElementById("accessoryLevel").value;
            var damageType = document.getElementById("damageType").value;

            var ranking = weapons[accessoryLevel][damageType];

            var list = document.getElementById("ranking");
            list.innerHTML = "";

            for (var i = 0; i < ranking.length; i++) {
                var item = document.createElement("li");
                item.textContent = ranking[i];
                list.appendChild(item);
            }
        }
    </script>
</head>
<body>
    <h1>Apex Legends 武器排行</h1>

    <label for="accessoryLevel">配件等級:</label>
    <select id="accessoryLevel" onchange="updateRanking()">
        <option value="沒有">沒有</option>
        <option value="白色">白色</option>
        <option value="藍色">藍色</option>
        <option value="紫色">紫色</option>
        <option value="金色">金色</option>
    </select>

    <label for="damageType">傷害類型:</label>
    <select id="damageType" onchange="updateRanking()">
        <option value="單發">單發</option>
        <option value="一管">一管</option>
        <option value="DPS">DPS</option>
    </select>

    <h2>排行:</h2>
    <ul id="ranking"></ul>
</body>
</html>-->
<?php
include("../function/condb.php");
$level = "none"; $type = 0; $weapons = []; $sql = "SELECT * FROM Weapon";
if (isset($_GET["level"]) && ($_GET["level"] == "white" || $_GET["level"] == "blue" || $_GET["level"] == "purple" || $_GET["level"] == "gold"))
    $level = $_GET["level"];
if (isset($_GET["type"]) && ($_GET["type"] == 1 || $_GET["type"] == 2))
    $type = $_GET["type"];

if ($type == 1) {
    $sql = "SELECT WeaponName, Head * Magazine AS Head, Body * Magazine AS Body, Legs * Magazine AS Legs FROM weapon";
    if ($level != "none") {
        $sql = "SELECT w.WeaponName, 
                    w.Head * COALESCE(wa.Value, w.Magazine) AS Head, 
                    w.Body * COALESCE(wa.Value, w.Magazine) AS Body, 
                    w.Legs * COALESCE(wa.Value, w.Magazine) AS Legs
                FROM weapon w LEFT JOIN {$level}_attachment wa ON w.WeaponName = wa.WeaponName AND wa.AttachmentName LIKE 'Extended%Mag';
        ";
    }
} elseif ($type == 2) {
    $sql = "SELECT WeaponName, Head * FireRate AS Head, Body * FireRate AS Body, Legs * FireRate AS Legs FROM weapon";
    if ($level != "none") {
        $sql = "SELECT w.WeaponName, 
                    w.Head * COALESCE(wa.Value, w.FireRate) AS Head, 
                    w.Body * COALESCE(wa.Value, w.FireRate) AS Body, 
                    w.Legs * COALESCE(wa.Value, w.FireRate) AS Legs
                FROM weapon w LEFT JOIN {$level}_attachment wa ON w.WeaponName = wa.WeaponName AND wa.AttachmentName = 'Shotgun Bolt';
        ";
    }
}

if ($level == "gold") {
    #$sql = "";
}

if ($stmt = $db->prepare($sql)) {
    $stmt->execute();
    $weapons = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Comparison</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/rank.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href="../"><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="" class="title-span">Damage Rank</a>
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
        <label for="damageType">傷害類型:</label>
        <select id="damageType" onchange="updateRanking()">
            <option value="0">單發</option>
            <option value="1">一管</option>
            <option value="2">DPS</option>
        </select>
        <label for="accessoryLevel">配件等級:</label>
        <select id="accessoryLevel" onchange="updateRanking()">
            <option value="none">無</option>
            <option value="white">白</option>
            <option value="blue">藍</option>
            <option value="purple">紫</option>
            <option value="gold">金</option>
        </select>
        <table id="weaponsTable">
            <tr>
                <th>武器</th>
                <th onclick="sortTable(1)">頭部傷害</th>
                <th onclick="sortTable(2)">身體傷害</th>
                <th onclick="sortTable(3)">腿部傷害</th>
            </tr>
            <?php foreach ($weapons as $weapon): ?>
            <tr>
                <td><?php echo $weapon["WeaponName"]; ?></td>
                <td><?php echo $weapon["Head"]; ?></td>
                <td><?php echo $weapon["Body"]; ?></td>
                <td><?php echo $weapon["Legs"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <script src="../js/scripts.js"></script>
    <script>
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');
    const level = urlParams.get('level');
    if (type !== null)
        document.getElementById('damageType').value = type;
    if (level !== null)
        document.getElementById('accessoryLevel').value = level;
}
function updateRanking() {
    const type = document.getElementById("damageType").value;
    const level = document.getElementById("accessoryLevel").value;
    window.location.href = `?type=${type}&level=${level}`;
}
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("weaponsTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                    shouldSwitch= true;
                    break;
                }
            } else if (dir == "desc") {
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;      
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
    </script>
</body>
</html>