<?php

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $stmt = $connect->prepare('SELECT * FROM admin WHERE admin_id=?');
    $stmt->execute([$admin_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> الادمن </li>
                        </ol>
                    </nav>
                </div>

                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="carid" value="<?php echo $admin_id; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box2">
                                    <label id="name"> اسم المستخدم <span> * </span> </label>
                                    <input required class="form-control" type="text" name="admin_name" value="<?php echo $alltype["admin_name"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="name_en"> كلمة المرور <span> * </span></label>
                                    <input class="form-control" type="password" name="admin_password" value="<?php echo $alltype["admin_password"] ?>">
                                </div>
                                <div class="box2">
                                    <label id="car_model"> البريد الالكتروني <span> * </span></label>
                                    <input class="form-control" type="email" name="admin_email" value="<?php echo $alltype["admin_email"] ?>">
                                </div>
                            </div>

                            <div class="box submit_box">
                                <input class="btn btn-primary text-center" name="add_car" type="submit" value="تعديل">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_password = $_POST['admin_password'];
            /// More Validation To Show Error



            $stmt = $connect->prepare("UPDATE admin SET
                    admin_name=?,admin_password=?,admin_email=? WHERE admin_id=?");
            $stmt->execute([
                $admin_name,
                $admin_password,
                $admin_email,
                $admin_id,
            ]);
            if ($stmt) { ?>
                <div class="container">
                    <div class="alert-success">
                        تم تعديل الادمن بنجاح
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
