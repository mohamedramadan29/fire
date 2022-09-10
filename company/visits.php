<?php

if (isset($_GET['com_id']) && is_numeric($_GET['com_id'])) {
    $com_id = $_GET['com_id'];
    $stmt = $connect->prepare('SELECT * FROM company WHERE com_id=?');
    $stmt->execute([$com_id]);
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
                    <li class="breadcrumb-item active" aria-current="page"> توقيتات الزيارات للشركه </li>
                </ol>
            </nav>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="tables" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم الشركة </th>
                        <th> تاريخ الزيارة </th>
                        <th>  حالة الزيارة </th>
                        <th> ملاحطات </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM appointsment
                        INNER JOIN company ON appointsment.com_id = company.com_id 
                        WHERE appointsment.com_id=?');
                        $stmt->execute(array($com_id));
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['com_name']; ?> </td>
                        <td><?php echo $type['visit_date']; ?> </td>
                        <td><?php echo $type['visit_status']; ?> </td>
                        <td><?php echo $type['visit_note']; ?> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=company&page=edit_visit&visit_id=<?php echo $type['appoint_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php
    }
}
    ?>