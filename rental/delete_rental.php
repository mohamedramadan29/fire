<?php
if (isset($_GET['ren_id']) && is_numeric($_GET['ren_id'])) {
    $ren_id = $_GET['ren_id'];

    $stmt = $connect->prepare('SELECT * FROM rental WHERE ren_id= ?');
    $stmt->execute([$ren_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM rental WHERE ren_id=?');
        $stmt->execute([$ren_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=rental&page=report'); ?>
    <?php }
    }
}