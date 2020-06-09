<?php

session_start();

require_once('includes/mysqli_connect.php');
require_once('includes/functions.inc.php');

log_page($db, "Logout Page");


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
require_once("includes/header.php");
?>


<?php require_once('includes/nav.php'); ?>
<h1>Doodledip</h1>
<div class="success">Congratz, you logged out of doodledip. Come back anytime!</div>
<?php require_once('includes/footer.php') ?>