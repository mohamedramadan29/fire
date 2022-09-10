<?php

if (isset($_GET['com_id']) && is_numeric($_GET['com_id'])) {
    $com_id = $_GET['com_id'];
    $stmt = $connect->prepare('SELECT * FROM company WHERE com_id=?');
    $stmt->execute([$com_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>

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
                            <label id="name_en"> رقم الهاتف <span> * </span></label>
                            <input class="form-control" type="tel" name="com_mobile" value="<?php echo $alltype["com_mobile"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> البريد الالكتروني  <span> * </span></label>
                            <input class="form-control" type="email" name="com_email" value="<?php echo $alltype["com_email"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> العنوان <span> * </span></label>
                            <input class="form-control" type="text" name="address" value="<?php echo $alltype["address"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> بداية العقد </label>
                            <input class="form-control" type="date" name="start" value="<?php echo $alltype["start"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_model"> نهاية العقد </label>
                            <input class="form-control" type="date" name="end" value="<?php echo $alltype["end"]?>">
                        </div>
                        <div class="box2">
                            <label id="car_pricepay"> عدد الزيارات <span> * </span> </label>
                            <input class="form-control" type="number" name="num_visit" required value="<?php echo $alltype["num_visit"]?>">
                        </div>
                        <div class="box2">
                            <label id="name_en"> حالة الشركة </label>
                            <select name="com_active" id="cat_active" class="form-control">
                                <option value=""> حالة الشركة </option>

                                <option value="فعال" <?php if($alltype["com_active"] == "فعال") echo "selected" ?> > <?php echo $lang['active']; ?></option>
                                <option value="غير فعال" <?php if($alltype["com_active"] == "غير فعال") echo "selected" ?>> <?php echo $lang['no_active']; ?></option>
                            </select>
                        </div>

                        <div class="box">
                            <label id="car_pricerent"> <?php echo $lang['notes']; ?> </label>
                            <textarea name="com_note" class="form-control"><?php echo $alltype["com_note"]?></textarea>
                        </div>

                    </div>
                    
                    <div class="box submit_box">
                        <input class="btn btn-primary text-center" name="add_car" type="submit"
                            value="تعديل الشركه">
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