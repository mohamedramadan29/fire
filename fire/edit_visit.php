<?php

if (isset($_GET['visit_id']) && is_numeric($_GET['visit_id'])) {
    $visit_id = $_GET['visit_id'];
    $stmt = $connect->prepare('SELECT * FROM appointsment WHERE appoint_id =?');
    $stmt->execute([$visit_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>

        <div class="container">

            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?> </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> تعديل الزيارة </li>
                        </ol>
                    </nav>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="carid" value="<?php echo $carid; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box2">
                                    <label id="name"> تاريخ الصيانه <span> * </span> </label>
                                    <input disabled class="form-control" type="date" name="visit_date" value="<?php echo $alltype["visit_date"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="name_en"> حالة الصيانه </label>
                                    <select name="visit_status" id="cat_active" class="form-control">
                                        <option value=""> حالة الصيانه </option>
                                        <option value="تم الزيارة" <?php if ($alltype["visit_status"] == "تم الزيارة") echo "selected" ?>> تم الزيارة </option>
                                        <option value="لم تمم الزيارة" <?php if ($alltype["visit_status"] == "لم تمم الزيارة") echo "selected" ?>> لم تمم الزيارة </option>
                                    </select>
                                </div>

                                <div class="box">
                                    <label id="car_pricerent"> <?php echo $lang['notes']; ?> </label>
                                    <textarea name="visit_note" class="form-control"><?php echo $alltype["visit_note"] ?></textarea>
                                </div>

                                <div class="box2">
                                    <label id="name"> تاريخ الزيارة الفعلي<span> * </span> </label>
                                    <input class="form-control" type="date" name="rial_date" value="">
                                </div>

                                <div class="box2">
                                    <label id="name"> ملف الزيارة <span> * </span> </label>
                                    <input class="form-control" type="file" name="image1" value="">
                                </div>

                            </div>

                            <div class="box submit_box">
                                <input class="btn btn-primary text-center" name="add_car" type="submit" value="تعديل الزيارة">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image1_name = $_FILES['image1']['name'];
            $image1_tem = $_FILES['image1']['tmp_name'];
            $image1_type = $_FILES['image1']['type'];
            $image1_size = $_FILES['image1']['size'];
            $visit_status = $_POST['visit_status'];
            $visit_note = $_POST['visit_note'];
            $rial_date = $_POST['rial_date'];
            /// More Validation To Show Error

            $image1_uploaded = rand(0, 100000000) . '.' . $image1_name;
            move_uploaded_file(
                $image1_tem,
                'uploads/' . $image1_uploaded
            );

            if ($image1_tem != "") {
                $stmt = $connect->prepare("UPDATE fire_appointment SET
                visit_status=?,visit_note=?,rial_date=?,files=? WHERE appoint_id=?");
                $stmt->execute([
                    $visit_status,
                    $visit_note,
                    $rial_date,
                    $image1_uploaded,
                    $visit_id,
                ]);
            } else {
                $stmt = $connect->prepare("UPDATE fire_appointment SET
                visit_status=?,visit_note=?,rial_date=? WHERE appoint_id=?");
                $stmt->execute([
                    $visit_status,
                    $visit_note,
                    $rial_date,
                    $visit_id,
                ]);
            }

            if ($stmt) { ?>
                <div class="container">
                    <div class="alert-success">
                        تم تعديل الزيارة بنجاح
                        <?php header('refresh:3;url=main.php?dir=fire&page=report'); ?>
                    </div>
                </div>
    <?php }
        }
    }
} else {
    ?>
    <div class="container">
        <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
    </div>
<?php
}
