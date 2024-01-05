<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html" ; charset="UTF-8">
    <meta http-equiv="Pragma" Content="No-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attachments</title>
</head>
<center>
<body>
    <form action = "attachment.php" method="post">
    <h3>Attachments</h3>
    <input type="checkbox" name="choose[]" value="white_attachment"><label>白色</label>
    <input type="checkbox" name="choose[]" value="blue_attachment"><label>藍色</label>
    <input type="checkbox" name="choose[]" value="purple_attachment"><label>紫色</label>
    <input type="checkbox" name="choose[]" value="gold_attachment"><label>金色</label>
    <input type="checkbox" name="special" value="hopup"><label>特殊配件</label>
    <input type = "submit" value="查詢">
    </form>
    <?php
        include("../function/condb.php");
        if(isset($_POST['choose'])){
        $n=$_POST['choose'];
        header('Content-Type: text/html; charset=UTF-8');
        echo "<table border ='1'>
        <tr>
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
                echo "</tr>"; 
            }
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
        echo "</table>";
    ?>
    <a href="index.php">編輯</a>
</body>
</center>
</html>
