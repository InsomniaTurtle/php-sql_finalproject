<header>
    <nav>
        <?php

        if (isset($_SESSION['loggedin'])) {
            $logtext = '|&nbsp;&nbsp;<a href="logout_page.php" title="Logout">Logout</a>&nbsp;&nbsp;';
        } else {
            $logtext = '|&nbsp;&nbsp;<a href="login_page.php" title="Login">Login</a>&nbsp;&nbsp;';
        }

        if (isset($_SESSION['loggedin'])) {
            $post = '|&nbsp;&nbsp;<a href="posts_page.php" title="Posts">Post</a>&nbsp;&nbsp;';
        } else {
            $post = '';
        }

        ?> <span class="doodledip">Doodledip</span>
        <a href="mainpage.php" title="Doodledip Homepage">Home Page</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="register_page.php" title="Register">Register</a>&nbsp;&nbsp;<?php echo $post ?><?php echo $logtext ?>
        <img class="logo" src="img/doodledip_logo.png" alt="doodledip Logo" />
    </nav>
</header>