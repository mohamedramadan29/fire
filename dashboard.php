<?php
ob_start();
$pagetitle = 'Customer report ';

if (isset($_SESSION['admin_name'])) { ?>
<div class="container dashboard">
    <div class="data data2_dash">
        <div class="bread bread_dasha">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?></a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> <?php echo $lang['title']; ?> </li>
                </ol>
            </nav>
        </div>
    </div>

   
    <div class="row">
        <div class="col-lg-3">
            <div class="small_box">
                <div class="icon">
                    <span> <i class="fa fa-cart-plus"></i> </span>
                </div>
                <div class="inner">
                    <span> المواقع والمصانع </span>
                    <?php
                        $stmt = $connect->prepare(
                            'SELECT COUNT(com_id) FROM company'
                        );
                        $stmt->execute();
                        $count = $stmt->fetchcolumn();
                        ?>
                    <h3> <?php echo $count; ?> </h3>
                </div>
                <div class="small_box_footer">
                    <p> <a href="main.php?dir=company&page=add"> <?php echo $lang['add']; ?> </a> </p>
                    <p> <a href="main.php?dir=company&page=report"> مشاهدة الشركات </a> </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small_box small_box2">
                <div class="icon">
                    <span> <i class="fa fa-cart-plus"></i> </span>
                </div>
                <div class="inner">
                    <span> صيانة </span>
                    <?php
                        $stmt = $connect->prepare(
                            'SELECT COUNT(fire_id) FROM fire'
                        );
                        $stmt->execute();
                        $count = $stmt->fetchcolumn();
                        ?>
                    <h3> <?php echo $count; ?> </h3>
                </div>
                <div class="small_box_footer">
                    <p> <a href="main.php?dir=fire&page=add"> <?php echo $lang['add']; ?> </a> </p>
                    <p> <a href="main.php?dir=fire&page=report"> مشاهدة الصيانات </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ob_end_flush();
} else {
   echo "No Session";
}
?>