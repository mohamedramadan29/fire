<?php

if (isset($_GET['fire_id']) && is_numeric($_GET['fire_id'])) {
    $fire_id = $_GET['fire_id'];
    $stmt = $connect->prepare('SELECT * FROM fire WHERE fire_id=?');
    $stmt->execute([$fire_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
 <div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?></a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> توقيتات  الصيانات </li>
                </ol>
            </nav>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="tables" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم الصيانه </th>
                        <th> تاريخ الزيارة </th>
                        <th>  حالة الزيارة </th>
                        <th> ملاحطات </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM fire_appointment
                        INNER JOIN fire ON  fire_appointment.fire_id = fire.fire_id 
                        WHERE fire_appointment.fire_id=?');
                        $stmt->execute(array($fire_id));
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?>
                        <tr>
                        <td><?php echo $type['name']; ?> </td>
                        <td><?php echo $type['visit_date']; ?> </td>
                        <td><?php echo $type['visit_status']; ?> </td>
                        <td><?php echo $type['visit_note']; ?> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=fire&page=edit_visit&visit_id=<?php echo $type['appoint_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    }
}
    ?>