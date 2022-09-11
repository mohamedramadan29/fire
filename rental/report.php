<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> موقع تاجير السيارات </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة التاجيرات </li>
                </ol>
            </nav>
        </div>

        <div class="title text-right">
            <h6 class=""> <i class="fa fa-plus"></i> مشاهدة التاجيرات </h6>
            <?php $stmt = $connect->prepare('SELECT * FROM company WHERE com_id=?');
            $stmt->execute(array($_SESSION['com_id']));
            $allcom = $stmt->fetch();

            ?>
            <div class="com_title_info">
                <h4> <?php echo $allcom["com_name"]; ?> </h4>
                <img src="../uploads/<?php echo $allcom["com_image"]; ?>" alt="">

            </div>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> <?php echo $lang["person_name"]; ?> </th>
                        <th> <?php echo $lang["email"]; ?></th>
                        <th> <?php echo $lang["mobile"]; ?></th>
                        <th> <?php echo $lang["car_name"]; ?> </th>
                        <th> <?php echo $lang["car_number"]; ?></th>
                        <th><?php echo $lang["car_booking"]; ?></th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare(
                            'SELECT * FROM rental INNER JOIN customer ON rental.cus_id = customer.cus_id
                            INNER JOIN cars ON rental.car_id = cars.car_id WHERE rental.com_id=?'
                        );
                        $stmt->execute([$_SESSION['com_id']]);
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['cus_first_name']; ?> <?php echo $type['cus_last_name']; ?></td>
                        <td><?php echo $type['cus_email']; ?> </td>
                        <td><?php echo $type['cus_mobile']; ?> </td>
                        <td> <?php echo $type['car_name']; ?> </td>
                        <td> <?php echo $type['car_id']; ?> </td>
                        <?php if ($type['ren_state'] == 'pending') { ?>
                        <td> تحت المراجعه </td>
                        <?php
                            } else { ?>
                        <td> تم تفعيل الحجز </td>
                        <?php
                            } ?>

                        <td>
                            <!--
                            <a class=" btn btn-success" href="main.php?dir=rental&page=edit&ren_id=<?php echo $type['ren_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                        -->
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=rental&page=delete&ren_id=<?php echo $type['ren_id']; ?> ">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn btn-success"
                                href="main.php?dir=rental&page=edit&ren_id=<?php echo $type['ren_id']; ?> ">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>