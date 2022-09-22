<?php
ob_start();
$pagetitle = " تقرير عن العقود ";

if (isset($_SESSION["admin_id"])) {
?>
    <div class="container">
        <div class="data">
            <div class="bread">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> موسسة انطفاء </a> <i class="fa fa-chevron-left"></i> </li>
                        <li class="breadcrumb-item active" aria-current="page"> عمل تقارير   شامل عن عقود الشركات </li>
                    </ol>
                </nav>
            </div>
            <div class="title text-right">
                <h6> <i class="fa fa-plus"></i>  عمل تقارير شامل عن  عقود الشركات  </h6>
            </div>

            <div class="myform">

                <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <label for=""> تاريخ بداية   </label>
                                <input class="form-control" id="startdate" type="date" name="start_date" id="start_date2" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['start_date']; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">

                            <div class="box">
                                <label for=""> تاريخ نهاية   </label>
                                <input class="form-control" id="enddate" type="date" name="end_date" id="end_date2" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['end_date']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box print_box">
                        <input name="car_state" class="btn btn-primary" type="submit" value="بحث">
                        <button type="button" name="button" class="btn btn-secondary printbtn2 btn-sm"> طباعه التقرير <i class="fa fa-print"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['car_state'])) {
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $stmt = $connect->prepare("SELECT * FROM company WHERE 
                end BETWEEN '$start_date' and '$end_date'");
                $stmt->execute();
                $alldata = $stmt->fetchall();
                $count = $stmt->rowCount();
                if ($count == 0) { ?>
                    <div class="alert alert-success">
                        لا يوجد بيانات للعرض في هذة الفترة
                    </div>
                <?php
                } else {  ?>
                    <div class="table-responsive print_content2">
                        <table id="tables" class="table table-light table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th> اسم  الشركة </th>
                                    <th> البريد الالكتروني </th>
                                    <th> رقم الهاتف    </th>
                                    <th> بداية العقد </th>
                                    <th> نهاية العقد </th>
                                    <th> العنوان </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($alldata as $type) { 
                                    ?>
                                <tr>
                                    <td><?php echo $type['com_name']; ?> </td>
                                    <td><?php echo $type['com_email']; ?> </td>
                                    <td><?php echo $type['com_mobile']; ?> </td>
                                    <td><?php echo $type['start']; ?> </td>
                                    <td><?php echo $type['end']; ?> </td>
                                    <td><?php echo $type['address']; ?> </td>
                                </tr> <?php }
                                        ?>
                            </tbody>
                        </table>
                    </div>
        <?php
            }
        }
    }
        ?>
    </div>
    <?php
}