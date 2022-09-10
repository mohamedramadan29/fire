<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?></a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة الشركات </li>
                </ol>
            </nav>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم الشركة </th>
                        <th> رقم الهاتف  </th>
                        <th> البريد الالكتروني </th>
                        <th> عدد الزيارات </th>
                        <th> بداية العقد </th>
                        <th> نهاية العقد </th>
                        <th> حالة الشركة </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM company');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['com_name']; ?> </td>
                        <td><?php echo $type['com_mobile']; ?> </td>
                        <td><?php echo $type['com_email']; ?> </td>
                        <td class="bg-gradient-info"> <a href="main.php?dir=company&page=visits&com_id=<?php echo $type['com_id']; ?>"> <?php echo $type['num_visit']; ?>  </a> </td>
                        <td><?php echo $type['start']; ?> </td>
                        <td><?php echo $type['end']; ?> </td>
                        <td>
                        <?php
                        if($type['com_active'] == "فعال"){ ?>
                            <button class="btn btn-sm bg-success"> <?php echo $type['com_active']; ?>  </button>
                            <?php
                        }else{?>
                        <button class="btn btn-sm bg-warning"> <?php echo $type['com_active']; ?>  </button>
                        <?php
                        }
                        ?>
                           
                        </td>
                        
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=company&page=edit&com_id=<?php echo $type['com_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=company&page=delete&com_id=<?php echo $type['com_id']; ?> ">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>