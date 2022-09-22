<?php
ob_start();
$pagetitle = 'Main';
session_start();
include 'init.php';

include $tem . 'top_navbar.php';
include $tem . 'left_sidebar.php';
?>
<div class="content-wrapper">
    <?php if (isset($_SESSION['admin_name'])) { ?>
    <div class="category">
        <?php
        $page = '';
        if (isset($_GET['page']) && isset($_GET['dir'])) {
            $page = $_GET['page'];
            $dir = $_GET['dir'];
        } else {
            $page = 'manage';
        }
        // START NEW WEBSITE
        // START COMPANY
        if ($dir == 'company' && $page == 'add') {
            include 'company/add.php';
        } elseif ($dir == 'company' && $page == 'edit') {
            include 'company/edit.php';
        } elseif ($dir == 'company' && $page == 'delete') {
            include 'company/delete.php';
        } elseif ($dir == 'company' && $page == 'report') {
            include 'company/report.php';
        }
        elseif ($dir == 'company' && $page == 'visits') {
            include 'company/visits.php';
        }
        elseif ($dir == 'company' && $page == 'edit_visit') {
            include 'company/edit_visit.php';
        }
        // END COMPANY
        // START ADMIN PROFILE
        if ($dir == 'profile' && $page == 'edit') {
            include 'profile/edit.php';
        } 
        // START COMPANY
        if ($dir == 'fire' && $page == 'add') {
            include 'fire/add.php';
        } elseif ($dir == 'fire' && $page == 'edit') {
            include 'fire/edit.php';
        } elseif ($dir == 'fire' && $page == 'delete') {
            include 'fire/delete.php';
        } elseif ($dir == 'fire' && $page == 'report') {
            include 'fire/report.php';
        }
        elseif ($dir == 'fire' && $page == 'visits') {
            include 'fire/visits.php';
        }
        elseif ($dir == 'fire' && $page == 'edit_visit') {
            include 'fire/edit_visit.php';
        }
        // START COMPANY
        if ($dir == 'reports' && $page == 'company_report') {
            include 'reports/company_report.php';
        }if ($dir =='reports' && $page == 'fire_report') {
            include 'reports/fire_report.php';
        }
        if ($dir =='reports' && $page == 'end_date_fire') {
            include 'reports/end_date_fire.php';
        }
        if ($dir =='reports' && $page == 'end_date_company') {
            include 'reports/end_date_company.php';
        }
        // END COMPANY
        // END ADMIN PROFILE
        // END NEW WEBSITE
        // START REPORTS
        elseif ($dir = 'dashboard' && $page == 'dashboard') {
            include 'dashboard.php';
        }
        // START REPORT 

        

    } else {
        header('Location:index.php');
        exit();
    }
    // if ($page != 'report') {
        ?>
    </div>
</div>
</div>
<?php
include $tem . 'footer.php';

ob_end_flush();


?>