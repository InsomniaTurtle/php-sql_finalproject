<?php
session_start();
try {
    include_once 'inc/functions.inc.php';
    include_once 'inc/mysqli_connect.php';

    // log page usage
    log_page($db, "Home");
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<?php
include_once 'inc/header.inc.php';
include_once 'inc/nav.inc.php';
?>

<!-- for now aside and main will have place holder text from the figma -->
<div class="aside">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent accumsan ipsum eu turpis ornare commodo. Quisque cursus elit ac pellentesque condimentum. Sed sodales sagittis lacus quis bibendum. Mauris id mollis tortor. Suspendisse nec consequat turpis. Donec volutpat, quam vel pharetra efficitur, risus lacus auctor quam, et faucibus magna turpis nec odio. Praesent fringilla at lacus in imperdiet. Sed eleifend velit tempor, imperdiet tortor ut, fermentum eros. Praesent a diam id lacus consectetur vehicula. Integer tincidunt eros vitae enim vehicula porttitor.

        Donec sagittis ultrices sollicitudin. Mauris ac dapibus lorem. Mauris quis porta massa. Mauris ac convallis est. Donec elementum, metus vel consectetur imperdiet, erat ligula sagittis lacus, rhoncus tristique est ipsum sed lacus. Aliquam nec tristique sapien. Sed finibus consequat fringilla. Praesent feugiat rutrum augue, vitae ullamcorper sapien malesuada et. Ut interdum erat in quam ullamcorper tempus. Nunc quis sapien sed ante pellentesque mollis eget et nisl. Donec ac lobortis mauris. Donec ac efficitur est.

        Curabitur consequat, dui at fermentum ultrices, mi urna aliquam orci, at rutrum nisl leo at felis.</p>
</div>
<div class="main">
    <p> This website is underway towards the goal of making it into a recipe posting website where a user can register to have an account to have their recipes posted and saved for other users viewing pleasure. There Is still much for me to do and many bits and bobs I need to put in before this site is more presentable. I do have a roadmap of what I must do starting with a good portion of my css but I do know what needs to be done for this following week.</p>
</div>

<?php require 'inc/footer.inc.php' ?>