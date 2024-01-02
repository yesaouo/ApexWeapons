<html>
<?php    
header('Content-Type: text/html; charset=UTF-8');
include("../function/condb.php");
echo "<table border ='1'>
<tr>
<th></th>
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
?>
<form action="damn.php" method="post">
<?php
for($i=0; $i<count($result); $i++){
        echo "<tr>";
        $name=$result[$i]['WeaponName'];
        echo "<td>"."<input type='checkbox' name='weapon[]' value='$name'>"."</td>";  
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
    ?>
    <input type="submit" value="回傳">
</form>
<?php    
echo "</table>";   
?>
</html>
