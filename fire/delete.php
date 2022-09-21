<?php
if (isset($_GET['fire_id']) && is_numeric($_GET['fire_id'])) {
    $fire_id = $_GET['fire_id'];

        $stmt = $connect->prepare('SELECT * FROM fire WHERE fire_id= ?');
        $stmt->execute([$fire_id]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $stmt = $connect->prepare('DELETE FROM fire WHERE fire_id=?');
            $stmt->execute([$fire_id]);
            if ($stmt) { ?>
<div class="alert-success">
    تم حذف العنصر بنجاح
    <?php header('LOCATION:main.php?dir=fire&page=report'); ?>

    <?php }
        }
   
}