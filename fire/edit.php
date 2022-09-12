<?php

if (isset($_GET['fire_id']) && is_numeric($_GET['fire_id'])) {
    $fire_id = $_GET['fire_id'];
    $stmt = $connect->prepare('SELECT * FROM fire WHERE fire_id=?');
    $stmt->execute([$fire_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل الصيانة </li>
                        </ol>
                    </nav>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="carid" value="<?php echo $fire_id; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box2">
                                    <label id="name"> اسم الصيانة <span> * </span> </label>
                                    <input required class="form-control" type="text" name="name" value="<?php echo $alltype["name"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="car_model"> بداية الصيانة </label>
                                    <input class="form-control" type="date" name="start" value="<?php echo $alltype["start"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="car_model"> نهاية الصيانة </label>
                                    <input class="form-control" type="date" name="end" value="<?php echo $alltype["end"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="car_pricepay"> عدد الزيارات <span> * </span> </label>
                                    <input class="form-control" type="number" name="num_visit" required value="<?php echo $alltype["num_visit"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="name_en"> حالة الصيانة </label>
                                    <select name="active" id="cat_active" class="form-control">
                                        <option value=""> حالة الصيانة </option>

                                        <option value="فعال" <?php if ($alltype["com_active"] == "فعال") echo "selected" ?>> <?php echo $lang['active']; ?></option>
                                        <option value="غير فعال" <?php if ($alltype["com_active"] == "غير فعال") echo "selected" ?>> <?php echo $lang['no_active']; ?></option>
                                    </select>
                                </div>

                                <div class="box">
                                    <label id="car_pricerent"> <?php echo $lang['notes']; ?> </label>
                                    <textarea name="note" class="form-control"><?php echo $alltype["note"] ?></textarea>
                                </div>

                            </div>

                            <div class="box submit_box">
                                <input class="btn btn-primary text-center" name="add_car" type="submit" value="تعديل الصيانة">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $num_visit = $_POST['num_visit'];
            $active = $_POST['active'];
            $note = $_POST['note'];
            /// More Validation To Show Error
            $formerror = [];
            if (empty($name)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                $stmt = $connect->prepare("UPDATE fire SET
                     name=?,start=?,
            end=?,num_visit=?,active=?,note=? WHERE fire_id=?");
                $stmt->execute([
                    $name,
                    $start,
                    $end,
                    $num_visit,
                    $active,
                    $note,
                    $fire_id,
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل الصيانة بنجاح
                            <?php header('refresh:3;url=main.php?dir=fire&page=report'); ?>
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
