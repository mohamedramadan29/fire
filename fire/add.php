<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?></a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة طفاية جديد </li>
                </ol>
            </nav>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box2">
                            <label id="name">  الاسم <span> * </span> </label>
                            <input required class="form-control" type="text" name="name">
                        </div>
                        <div class="box2">
                            <label id="car_model"> بداية الصيانه </label>
                            <input class="form-control" type="date" name="start">
                        </div>
                        <div class="box2">
                            <label id="car_model"> نهاية الصيانه </label>
                            <input class="form-control" type="date" name="end">
                        </div>
                        <div class="box2">
                            <label id="car_pricepay">  <span> * </span> </label>
                            <input class="form-control" type="number" name="num_visit" required>
                        </div>
                        <div class="box2">
                            <label id="name_en"> حالة الشركة </label>
                            <select name="com_active" id="cat_active" class="form-control">
                                <option value=""> حالة الشركة </option>
                                <option value="فعال"> <?php echo $lang['active']; ?></option>
                                <option value="غير فعال"> <?php echo $lang['no_active']; ?></option>
                            </select>
                        </div>

                        <div class="box">
                            <label id="car_pricerent"> <?php echo $lang['notes']; ?> </label>
                            <textarea name="com_note" class="form-control"></textarea>
                        </div>

                    </div>
                    
                    <div class="box submit_box">
                        <input class="btn btn-primary text-center" name="add_car" type="submit"
                            value="اضافة شركه جديدة">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {
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
                $formerror[] = 'Please Insert Your Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }
            if (empty($formerror)) {
                $stmt = $connect->prepare("INSERT INTO company (com_name,com_email,
                com_mobile,num_visit,start,end,address,com_active,com_note)
                VALUES (:zname,:zemail,:zmobile,:znum_visit,:zstart,
                :zend,:zaddress,:zcom_active,:zcom_note)");
                $stmt->execute([
                    'zname' => $com_name,
                    'zemail' => $com_email,
                    'zmobile' => $com_mobile,
                    'znum_visit' => $num_visit,
                    'zstart' => $start,
                    'zend' => $end,
                    'zaddress' => $address,
                    'zcom_active' => $com_active,
                    'zcom_note' => $com_note
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
       
    </div>

</div>

<?php 

$stmt = $connect->prepare('SELECT * FROM company ORDER BY com_id DESC LIMIT 1');
$stmt->execute();
$allcom = $stmt->fetchAll();
foreach($allcom as $com){
    $start_date = $com['start'];
    $date1 = strtotime($start_date);
    $end_date = $com['end'];
    $date2 = strtotime($end_date);
    $visit_num = $com['num_visit'];
    $correct_date  = $date2 - $date1;
    $correct_date  = abs(round($correct_date/86400));
    $time_to_visit = ceil($correct_date / $visit_num);
    $sales_due_date =  date("Y-m-d");
        for($i=0; $i < $visit_num; $i++){
            $due_dates[] = $sales_due_date;
            $time = date('Y-m-d', strtotime('+' . $time_to_visit . 'day', strtotime($sales_due_date)));
            $sales_due_date = $time;
        $stmt  =$connect->prepare('INSERT INTO appointsment (com_id,visit_date)
        VALUES(:zcom_id,:zvisit_date)');
        $stmt->execute(array(
            'zcom_id'=>$com['com_id'],
            'zvisit_date'=>$time
        ));
        }
}
?>

<div class='container'>
<div class='alert alert-success' role='alert'> تم اضافة شركة جديدة بنجاح </div>
</div>


<?php header('refresh:3;url=main.php?dir=company&page=report'); ?> 
<?php
}
            }
        }
    }