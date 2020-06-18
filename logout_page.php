<?php

session_start();

try {
    include_once 'inc/functions.inc.php';
    include_once 'inc/mysqli_connect.php';

    // log page usage
    log_page($db, "Logout");
} catch (Exception $e) {
    $error = $e->getMessage();
}


if (isset($_SESSION['loggedin'])) {
    session_unset("loggedin");
    session_unset('username');
    session_unset('fullname');
    session_unset('id');
    session_destroy();
}

?>

<?php
$pageTitle = "Logged Out - Doodledip";
include_once 'inc/header.inc.php';
?>


<?php include_once 'inc/nav.inc.php'; ?>
<h1>Doodledip</h1>
<div class="success">Congratz, you logged out of doodledip. Come back anytime!</div>
<?php require 'inc/footer.inc.php' ?>