<?php
	include("../function/condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Weapons-Attachments</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <div class="toggle">
            <div class="left">
                <a href="../"><img src="img/apex-light-hero-logo.png" alt="Apex Legends"></a>
            </div>
            <a href="" class="title-span">Attachments</a>
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
    <form action = "attachment.php" method="post">
    <input type="checkbox" name="choose[]" value="white_attachment"><label>白色</label>
    <input type="checkbox" name="choose[]" value="blue_attachment"><label>藍色</label>
    <input type="checkbox" name="choose[]" value="purple_attachment"><label>紫色</label>
    <input type="checkbox" name="choose[]" value="gold_attachment"><label>金色</label>
    <input type="checkbox" name="special" value="hopup"><label>特殊配件</label>
    <input class="button green" type="submit" value="查詢">
    <a class="button blue" href="index.php">編輯</a>
    </form>
    <?php
        include("../function/condb.php");
        if(isset($_POST['choose'])){
        $n=$_POST['choose'];
        header('Content-Type: text/html; charset=UTF-8');
        echo "<br><table border ='1'>
        <tr>
        <th>等級</th>
        <th>配件名稱</th>
        <th>武器名稱</th>
        <th>配件數值</th>
        </tr>";
        //$query = ("select * from weapon");
        for($i=0;$i<count($n);$i++){
            $re=$n[$i];
            $sql = "select * from ".$re;
            $query = $db->query($sql);
            //$stmt =  $db->prepare($query);
            $result = $query->fetchAll();//以上寫法是為了防止「sql injection」
            for($j=0; $j<count($result); $j++){
                echo "<tr>";
                if($re=="white_attachment"){
                    echo "<td>白</td><td>".$result[$j]['AttachmentName']."</td>";
                }else if($re=="blue_attachment"){
                    echo "<td>藍</td><td>".$result[$j]['AttachmentName']."</td>";
                }else if($re=="purple_attachment"){
                    echo "<td>紫</td><td>".$result[$j]['AttachmentName']."</td>";
                }else if($re=="gold_attachment"){
                    echo "<td>金</td><td>".$result[$j]['AttachmentName']."</td>";
                }
                echo "<td>".$result[$j]['WeaponName']."</td>";
                echo "<td>".$result[$j]['Value']."</td>";
                echo "</tr>"; 
            }
          }
        }
        echo "</table>";
        if(isset($_POST['special'])){
            echo "<br><table border ='1'>
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
        echo "</table>";
    ?>
    </main>
    <script src="../js/scripts.js"></script>
</body>
</html>