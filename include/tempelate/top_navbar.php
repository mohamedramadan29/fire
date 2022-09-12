<?php
$date = date("Y-m-d");
//  echo $date;
$stmt = $connect->prepare("SELECT * FROM appointsment 
    INNER JOIN company ON company.com_id = appointsment.com_id 
     WHERE visit_date=?");
$stmt->execute(array($date));
$allvisitdate = $stmt->fetchAll();
$count = $stmt->rowCount();
//echo $count;
echo "</br>";
if ($count > 0) {
    foreach ($allvisitdate as $visit_date) {
        $company_name = $visit_date["com_name"];
        //echo $company_name;
?>
        <!-- <div class="alert alert-danger"> لديك زيارة اليوم في شركه  <?php echo  $company_name; ?></div> -->
<?php
        // send email to admin here
    }
}
?>


<!-- START FIRE SQL -->

<?php
$stmt = $connect->prepare("SELECT * FROM fire_appointment 
    INNER JOIN fire ON fire.fire_id =  fire_appointment.fire_id 
     WHERE visit_date=?");
$stmt->execute(array($date));
$allvisitdate2 = $stmt->fetchAll();
$count2 = $stmt->rowCount();
//echo $count;
//echo "</br>";
if ($count2 > 0) {
    foreach ($allvisitdate2 as $visit_date2) {
        $name = $visit_date2["name"];
        //echo $company_name;
?>
        <!-- <div class="alert alert-danger"> لديك زيارة اليوم في شركه  <?php echo  $company_name; ?></div> -->
<?php
        // send email to admin here
    }
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light mynavbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item mytogglebutton">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto topnav">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?php echo $count; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"> <?php echo $count; ?> صيانة المواقع </span>
                <div class="dropdown-divider"></div>
                <?php
                if ($count > 0) {
                    foreach ($allvisitdate as $visit_date) {
                        $company_name = $visit_date["com_name"];
                        //echo $company_name;
                ?>
                        <a href="main.php?dir=company&page=visits&com_id=<?php echo $visit_date["com_id"]; ?>" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>  زيارة اليوم في   <?php echo  $company_name; ?>
                        </a>
                        <div class="dropdown-divider"></div>
                <?php
                        // send email to admin here
                    }
                }
                ?>
            </div>
        </li>
        <!-- START FIRE NOTIFICATION -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge"><?php echo $count2; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"> <?php echo $count2; ?> صيانة طفايات </span>
                <div class="dropdown-divider"></div>
                <?php
                if ($count2 > 0) {
                    foreach ($allvisitdate2 as $visit_date2) {
                        $company_name = $visit_date2["name"];
                        //echo $company_name;
                ?>
                        <a href="main.php?dir=fire&page=visits&fire_id=<?php echo $visit_date2["fire_id"]; ?>" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>  زيارة اليوم في   <?php echo  $company_name; ?>
                        </a>
                        <div class="dropdown-divider"></div>
                <?php
                        // send email to admin here
                    }
                }
                ?>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="main.php?dir=profile&page=edit" class="dropdown-item">
                            <i class="fas fa-user color4 mr-2"></i> الملف الشخصى
                </a>
                <a href="signout.php" class="dropdown-item">
                            <i class="fa-solid fa-arrow-right-from-bracket color11 mr-2"></i> تسجيل خروج
                </a>
            </div>
        </li>
    </ul>


</nav>
<!-- /.navbar -->