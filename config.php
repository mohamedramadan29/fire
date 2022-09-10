<?php

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
} elseif (
    isset($_GET['lang']) &&
    $_SESSION['lang'] != $_GET['lang'] &&
    !empty($_GET['lang'])
) {
    if ($_GET['lang'] == 'ar') {
        $_SESSION['lang'] = 'ar';
    } elseif ($_GET['lang'] == 'en') {
        $_SESSION['lang'] = 'en';
    }
}
if (isset($_GET['dir'])) {
    $dir = $_GET['dir'];
    if ($dir == 'company') {
        include 'company/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'users') {
        include 'users/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'dashboard') {
        include 'dashboard/lang/' . $_SESSION['lang'] . '.php';
    }elseif ($dir == 'rental') {
        include 'rental/lang/' . $_SESSION['lang'] . '.php';
    }
} else {
    include 'languages/lang/' . $_SESSION['lang'] . '.php';
}

?>