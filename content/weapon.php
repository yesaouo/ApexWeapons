<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Weapons</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href="../"><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="" class="title-span">Weapons</a>
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
echo "<table border ='1'>
<tr>
<th>武器名稱</th>
<th>武器種類</th>
<th>子彈種類</th>
<th>頭部傷害</th>
<th>身體傷害</th>
<th>腿部傷害</th>
<th>彈夾容量</th>
<th>裝填時間</th>
</tr>";
//$query = ("select * from weapon");
$sql = "select * from weapon";
$query = $db->query($sql);
//$stmt =  $db->prepare($query);
$result = $query->fetchAll();//以上寫法是為了防止「sql injection」
for($i=0; $i<count($result); $i++){
        echo "<tr>";
        $name=$result[$i]['WeaponName']; 
        echo "<td>".$result[$i]['WeaponName']."</td>";
        echo "<td>".$result[$i]['Type']."</td>";
        echo "<td>".$result[$i]['Ammo']."</td>";
        echo "<td>".$result[$i]['Body']."</td>";
        echo "<td>".$result[$i]['Head']."</td>";
        echo "<td>".$result[$i]['Legs']."</td>";
        echo "<td>".$result[$i]['Magazine']."</td>";
        echo "<td>".$result[$i]['ReloadTime']."</td>";
        //echo "<td>".$result[$i]['Image']."</td>";
        echo "</tr>"; 
    }   
  echo "</table>"; 
?>
    <a href="index.php">編輯</a>
    </main>
    <script src="../js/scripts.js"></script>
</body>
</html>