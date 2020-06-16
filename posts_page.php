<?php
include_once 'inc/functions.inc.php';
include_once 'inc/header.inc.php';
include_once 'inc/nav.inc.php';
?>

<h1>Please post your favorite recipes!</h1>
<div class="recipes">
    <form action="" method="post">
        <label class="doodlelabel" for="rectype">Type of recipe; </label>
        <select name="rectype" id="rectype">
            <!-- input php guts -->
        </select>
        <br>
        <!-- fix text area to fit 5000 characters (look up appropraite text area size) -->
        <textarea name="post" cols="100" rows="50"></textarea>
        <br><br>
        <input type="submit" value="post" class="recButton">
    </form>
</div>

<?php require 'inc/footer.inc.php' ?>