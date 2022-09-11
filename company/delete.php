<?php
if (isset($_GET['com_id']) && is_numeric($_GET['com_id'])) {
    $com_id = $_GET['com_id'];

        $stmt = $connect->prepare('SELECT * FROM company WHERE com_id= ?');
        $stmt->execute([$com_id]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $stmt = $connect->prepare('DELETE FROM company WHERE com_id=?');
            $stmt->execute([$com_id]);
            if ($stmt) { ?>
<div class="alert-success">
    تم حذف العنصر بنجاح
    <?php header('LOCATION:main.php?dir=company&page=report'); ?>

    <?php }
        }
   
}