<?php
session_start();
try {
    include_once 'inc/functions.inc.php';
    include_once 'inc/mysqli_connect.php';

    // log page usage
    log_page($db, "Contact");
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<?php
include_once 'inc/header.inc.php';
include_once 'inc/nav.inc.php';
?>

<div class="main">
    <p>Thank you for visiting doodledip and posting all your wonderful recipes, i'm very glad we can all come together and share our favorite treats and eats.</p>
    <br><br>
    <p>If there are any problems, bugs or suggestions for the site please contact me at colinpyoung95@gmail.com. We currently don't have any social media set up for Doodledip so there isn't any twitter, facebook, reddit or snapchat set up. Youtube is a maybe where we make some of the posted recipes but we currently lack the knowledge or means to properly film, edit, and post videos.</p>
</div>

<?php require 'inc/footer.inc.php' ?>