<?php

if (isset($_GET['com_id']) && is_numeric($_GET['com_id'])) {
    $com_id = $_GET['com_id'];
    $stmt = $connect->prepare('SELECT * FROM company WHERE com_id=?');
    $stmt->execute([$com_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        
        $start_date = $alltype['start'];
        $date1 = strtotime($start_date);
        $end_date = $alltype['end'];
        $date2 = strtotime($end_date);
        $visit_num = $alltype['num_visit'];
        $diff = abs($date2 - $date1);
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(
            ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)
        );
        $days = floor(
            ($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) /
                (60 * 60 * 24)
        );
 
        echo "عدد الايام";
      
        echo "</br>";
        $correct_date = $date2 - $date1;
        $correct_date = abs(round($correct_date/86400));
        echo $correct_date;

        $time_to_visit = $correct_date / $visit_num;

        echo "</br>";

        echo ceil($time_to_visit);
        $datevisit = 1;
        echo "</br>" ;
        
        for($i=0; $i< $visit_num; $i++){
            $Date1 = $start_date;
            $date = new DateTime($Date1);
            $date->modify('+'. $time_to_visit .'day');
            $Date2 = $date->format('Y-m-d');
            echo $Date2;
            echo "</br>" ;
        }
        ?>

<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?> </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> تعديل الشركة </li>
                </ol>
            </nav>
        </div>

        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="carid" value="<?php echo $carid; ?>">
               <div class="row">
                    <div class="col-lg-12">
                        <div class="box2">
                            <label id="name"> اسم الشركة <span> * </span> </label>
                            <input required class="form-control" type="text" name="com_name" value="<?php echo $alltype["com_name"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> بداية العقد </label>
                            <input disabled class="form-control" type="date" name="start" value="<?php echo $alltype["start"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> نهاية العقد </label>
                            <input disabled class="form-control" type="date" name="end" value="<?php echo $alltype["end"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_pricepay"> عدد الزيارات <span> * </span> </label>
                            <input disabled class="form-control" type="number" name="num_visit" required value="<?php echo $alltype["num_visit"]?>">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $com_name = $_POST['com_name'];
            $com_email = $_POST['com_email'];
            $com_mobile = $_POST['com_mobile'];
            $num_visit = $_POST['num_visit'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $address = $_POST['address'];
            $com_active = $_POST['com_active'];
            $com_note = $_POST['com_note'];
            /// More Validation To Show Error
            $formerror = [];
            if (empty($com_name)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                    $stmt = $connect->prepare("UPDATE company SET
                     com_name=?,com_email=?,
            com_mobile=?,num_visit=?,start=?,end=?,address=?,com_active=?,com_note=? WHERE com_id=?");
                    $stmt->execute([
                        $com_name,
                        $com_email,
                        $com_mobile,
                        $num_visit,
                        $start,
                        $end,
                        $address,
                        $com_active,
                        $com_note,
                        $com_id,
                    ]);

                    if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل الشركة بنجاح
        <?php header('refresh:3;url=main.php?dir=company&page=report'); ?>
    </div>
</div>
<?php }
            }
        }
    }
} else {
    ?>
<div class="container">
    <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
</div>
<?php
}