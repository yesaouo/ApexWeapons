<?php
include("../function/condb.php");

// 假設你的圖片儲存在名為Weapon的表格中，並且有一個名為id的欄位來唯一識別每一張圖片
$sql = "SELECT Image FROM Weapon WHERE WeaponName = :name";
$stmt = $db->prepare($sql);

// 綁定name參數到你想要取得的圖片
$stmt->bindParam(':name', $name);
$stmt->execute();

// 取得圖片資料
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// 確保圖片資料不為空
if($row !== false) {
    // 設定正確的Content-Type header
    header("Content-Type: image/jpeg");

    // 輸出圖片資料
    echo $row['Image'];
}
?>
