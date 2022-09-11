<?php
if (isset($_GET['ren_id']) && is_numeric($_GET['ren_id'])) {
    $ren_id  = $_GET['ren_id'];

    $stmt = $connect->prepare('SELECT * FROM rental WHERE ren_id=?');
    $stmt->execute([$ren_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    $main_car_id = $alltype['car_id'];
    $main_cus_id = $alltype['cus_id'];

    if ($count > 0) { ?>

<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang["website_title"]; ?> </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang["watch_booking"]; ?> </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> <?php echo $lang["watch_booking"]; ?> </h6>
        </div>
        <?php
                $stmt = $connect->prepare(
                    'SELECT * FROM rental INNER JOIN customer ON rental.cus_id = customer.cus_id
                            INNER JOIN cars ON rental.car_id = cars.car_id WHERE rental.ren_id=?'
                );
                $stmt->execute(array($ren_id));
                $alltype = $stmt->fetch();
                ?>
        <div class="myform show_data_form">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="typ_id" value="<?php echo $ren_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <h2> <?php echo $lang["client_info"]; ?></h2>
                        <div class="box2">
                            <label id="name"> الاسم الاول
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="first_name"
                                value="  <?php echo $alltype["cus_first_name"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name">الاسم الاخير
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="last_name"
                                value="  <?php echo $alltype["cus_last_name"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> <?php echo $lang["email"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="email"
                                value=" <?php echo $alltype["cus_email"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> <?php echo $lang["mobile"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="mobile"
                                value=" <?php echo $alltype["cus_mobile"]; ?>">
                        </div>


                    </div>
                    <div class="col-lg-6 car_data">
                        <h2> <?php echo $lang["car_info"]; ?></h2>

                        <div class="box2">
                            <label id="name"> <?php echo $lang["car_number"]; ?>
                                <span> * </span> </label>
                            <input disabled class="form-control" type="text" name="car_number"
                                value="<?php echo $alltype["car_id"]; ?>">
                        </div>

                        <div class="box2">
                            <label id="name"> <?php echo $lang["car_name"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype["car_name"]; ?>">
                        </div>

                        <div class="box2">
                            <label id="name"> <?php echo $lang["car_model"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="car_model"
                                value="<?php echo $alltype["car_model"]; ?>">
                        </div>
                        <br>

                        <div class="car_image">
                            <ul>
                                <li><a href="#img_1"><img src="../uploads/<?php echo $alltype["car_image1"]; ?>"></a>
                                </li>
                            </ul>
                            <a href="#_1" class="lightbox trans" id="img_1"><img
                                    src="../uploads/<?php echo $alltype["car_image1"]; ?>">
                            </a>

                            <!--<img src="../uploads/<?php echo $alltype["car_image1"]; ?>" alt=""> -->
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <h2> <?php echo $lang["booking_info"]; ?> </h2>
                        <div class="box2">
                            <label id="name"> <?php echo $lang["booking_start"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="booking_start"
                                value="<?php echo $alltype["ren_datefrom"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> <?php echo $lang["booking_end"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="booking_end"
                                value="<?php echo $alltype["ren_dateto"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> <?php echo $lang["location"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="pickup_location"
                                value="<?php echo $alltype["pickup_location"]; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> is child
                                <span> * </span> </label>
                            <select class="form-control" name="is_child" id="">
                                <option value=""> اختر </option>
                                <option value="yes" <?php if ($alltype["ren_ischild"] == "yes") echo "selected";  ?>>
                                    Yes
                                </option>
                                <option value="no" <?php if ($alltype["ren_ischild"] == "no") echo "selected";  ?>> No
                                </option>
                            </select>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="box2">
                            <label id="name"> pricing set
                                <span> * </span> </label>
                            <select class="form-control" name="pricing_set" id="">
                                <option value=""> اختر </option>
                                <option value="yes"
                                    <?php if ($alltype["ren_pricing_set"] == "yes") echo "selected";  ?>> Yes
                                </option>
                                <option value="no" <?php if ($alltype["ren_pricing_set"] == "no") echo "selected";  ?>>
                                    No
                                </option>
                            </select>
                        </div>
                        <div class="box2">
                            <label id="name">gbs
                                <span> * </span> </label>
                            <select class="form-control" name="gps" id="">
                                <option value=""> اختر </option>
                                <option value="yes" <?php if ($alltype["ren_isgps"] == "yes") echo "selected";  ?>> Yes
                                </option>
                                <option value="no" <?php if ($alltype["ren_isgps"] == "no") echo "selected";  ?>>
                                    No </option>
                            </select>

                        </div>
                        <div class="box2">
                            <label id="name"><?php echo $lang["days"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="total_days"
                                value="<?php echo $alltype["total_days"]; ?>">
                        </div>

                        <div class="box2">
                            <label id="name"><?php echo $lang["total_price"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="total_price"
                                value="<?php echo $alltype["total_price"]; ?>">
                        </div>
                        <div class="box">
                            <label id="name"><?php echo $lang["pickup_location"]; ?>
                                <span> * </span> </label>
                            <input class="form-control" type="text" name="location"
                                value="<?php echo $alltype["location"]; ?>">
                        </div>

                        <label class="select_state" for=""> <?php echo $lang["booking_state"]; ?> </label>
                        <select name="ren_state" class="form-control" id="cat_active">
                            <option value=""> <?php echo $lang["booking_state"]; ?></option>
                            <option value="pending" <?php if ($alltype["ren_state"] == "pending") echo "selected"; ?>>
                                <?php echo $lang["pending"]; ?></option>
                            <option value="active" <?php if ($alltype["ren_state"] == "active") echo "selected"; ?>>
                                <?php echo $lang["active"]; ?></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="image">
                            <h4> <?php echo $lang["driving_licence"]; ?></h4>
                            <ul>
                                <li><a href="#img_2"><img src="../uploads/<?php echo $alltype["ren_image1"]; ?>"></a>
                                </li>
                            </ul>
                            <a href="#_2" class="lightbox trans" id="img_2"><img
                                    src="../uploads/<?php echo $alltype["ren_image1"]; ?>">
                            </a>
                            <!-- <img src="../uploads/<?php echo $alltype["ren_image1"]; ?>" alt=""> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="image">
                            <h4> <?php echo $lang["passport"]; ?> </h4>
                            <ul>
                                <li><a href="#img_3"><img src="../uploads/<?php echo $alltype["ren_image2"]; ?>"></a>
                                </li>
                            </ul>
                            <a href="#_3" class="lightbox trans" id="img_3"><img
                                    src="../uploads/<?php echo $alltype["ren_image2"]; ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="image">
                            <h4> <?php echo $lang["flight_ticket"]; ?> </h4>
                            <ul>
                                <li><a href="#img_4"><img src="../uploads/<?php echo $alltype["ren_image3"]; ?>"></a>
                                </li>
                            </ul>
                            <a href="#_4" class="lightbox trans" id="img_4"><img
                                    src="../uploads/<?php echo $alltype["ren_image3"]; ?>">
                            </a>

                        </div>
                    </div>
                    <input class="btn button" type="submit" value="<?php echo $lang["update_rental"]; ?>">
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->
</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book_stat = $_POST['ren_state'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            //   $car_number = $_POST['car_number'];
            $car_name = $_POST['car_name'];
            $car_model = $_POST['car_model'];
            $booking_start = $_POST['booking_start'];
            $booking_end = $_POST['booking_end'];
            $pickup_location = $_POST['pickup_location'];
            $is_child = $_POST['is_child'];
            $pricing_set = $_POST['pricing_set'];
            $gps = $_POST['gps'];
            $total_days = $_POST['total_days'];
            $total_price = $_POST['total_price'];

            $stmt = $connect->prepare('UPDATE rental SET ren_datefrom =?, ren_dateto =?,pickup_location =?
            ,ren_ischild=?,ren_pricing_set=?,ren_isgps=?,total_days=?,total_price=?,ren_state=? WHERE ren_id=?');
            $stmt->execute(array(
                $booking_start, $booking_end, $pickup_location,
                $is_child, $pricing_set, $gps, $total_days, $total_price, $book_stat, $ren_id
            ));
            if ($stmt) { ?>
<div class="alert alert-success"> تم تعديل الحجز بنجاح </div>
<?php
                $stmt = $connect->prepare('SELECT * FROM rental WHERE ren_id=?');
                $stmt->execute(array($ren_id));
                $allstatus = $stmt->fetch();
                $ren_car_id = $allstatus['car_id'];
                if ($allstatus['ren_state'] == 'active') {
                    $stmt = $connect->prepare('SELECT * FROM cars WHERE car_id=?');
                    $stmt->execute(array($ren_car_id));
                    $car_data = $stmt->fetch();
                    $selected_car =  $car_data['car_id'];
                    $stmt = $connect->prepare('UPDATE cars SET car_active = "pending" WHERE car_id=?');
                    $stmt->execute(array($selected_car));
                    if ($stmt) {
                        // echo 'Now the car not active';
                    }
                }
                header('refresh:1;url=main.php?dir=rental&page=report');
            }

            $stmt = $connect->prepare('UPDATE cars SET car_name =?, car_model =? 
             WHERE car_id=?');
            $stmt->execute(array(
                $car_name, $car_model, $main_car_id
            ));
            if ($stmt) {
                header('refresh:1;url=main.php?dir=rental&page=report');
            }
            $stmt = $connect->prepare('UPDATE customer SET cus_first_name =?, cus_last_name =? , cus_email=?,cus_mobile=?
            WHERE cus_id=?');
            $stmt->execute(array(
                $first_name, $last_name, $email, $mobile, $main_cus_id
            ));
            if ($stmt) {
                header('refresh:1;url=main.php?dir=rental&page=report');
            }
        }
    } else { ?>
<div class="container">
    <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
</div>
<?php }
}