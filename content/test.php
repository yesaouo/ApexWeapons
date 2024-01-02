<?php

    include("../function/condb.php");
                    $sql = "SELECT * FROM Weapon WHERE WeaponName = 'R-99 SMG'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($row !== false) {
                        // 設定正確的Content-Type header
                        //header("Content-Type: image/jpeg");

                        // 輸出圖片資料
                        //echo $row['image'];
                ?>
                        <?php echo $row['Image'];?>
                        <table>
                            <tr><td><?php echo $row['WeaponName'];?></td></tr>
                            <tr><td><?php echo $row['Type'];?></td></tr>
                            <tr><td><?php echo $row['Ammo'];?></td></tr>
                            <tr><td><?php echo $row['Body'].'/'.$row['Head'].'/'.$row['Legs'];?></td></tr>
                            <tr><td>17/20/23/26</td></tr>
                            <tr><td>2.45/2.37/2.29/2.21</td></tr>
                        </table>
                <?php
                    }
                ?>