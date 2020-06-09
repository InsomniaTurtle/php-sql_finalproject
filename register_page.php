<?php

session_start();

try {
    require_once('includes/functions.inc.php');
    require_once('includes/mysqli_connect.php');

    log_page($db, "Register Page");
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doodledip - Registration Page</title>
</head>

<body>
    <div class="header area">
        <div class="title">
            <h1 class="txtype">Doodledip: Create, Share & Enjoy</h1>
        </div>
        <div class="nav">
            <!-- links for later -->
            <h3>home | recipes | post | Login/Logout</h3>
        </div>
    </div>
    <?php require_once("includes/nav.php");

    $success = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $required = array('username', 'fullname', 'email', 'password');

        $error = false;
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
            }
        }

        if ($error) {
            echo '<div class="error">Yeesh it looks like your missing a couple of things. Please fill in all fields.</div>';
        } else {
            $username = $db->real_escape_string($_POST['username']);
            $full_name = $db->real_escape_string($_POST['fullname']);
            $email = $db->real_escape_string($_POST['email']);
            $password = hash('sha512', $_POST['password']);
            $sql = "INSERT INTO users (username,full_name,email,password,) VALUES ('$username' ,'$full_name','$email','$password')";
            // echo $sql;
            $result = $db->query($sql);

            if ($db->error) {
                echo '<div class="error">' . $db->error . '</div>';
            } else {
                echo '<div class="success">Your registration has been successfully processed.</div>';
                $success = true;
            }
        }
    }

    if (!$success) { ?>
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">

            <label class="doodlelabel" for="fullname">Full Name:</label>
            <input class="dipinput" type="text" id="fullname" name="fullname" size="20" maxlength="20" value="<?php if (isset($_POST["fullname"])) {
                                                                                                                    echo $_POST["fullname"];
                                                                                                                } ?>">
            <br>
            <label class="doodlelabel" for="username">Username:</label>
            <input class="dipinput" type="text" id="username" autocomplete="off" name="username" size="20" maxlength="20" value="<?php if (isset($_POST["username"])) {
                                                                                                                                        echo $_POST["username"];
                                                                                                                                    } ?>">
            <br>

            <label class="doodlelabel" for="password">Password:</label>
            <input class="dipinput" type="password" id="password" name="password" size="20" maxlength="20" value="<?php if (isset($_POST["password"])) {
                                                                                                                        echo $_POST["password"];
                                                                                                                    } ?>">
            <br>

            <label class="reglabel" for="email">Email:</label>
            <input class="dipinput" type="email" id="email" name="email" size="40" maxlength="60" value="<?php if (isset($_POST["email"])) {
                                                                                                                echo $_POST["email"];
                                                                                                            } ?>">
            <br>
            <input class="button1" type="submit" value="Register">
        </form>
    <?php } ?>
    <?php require_once('includes/footer.php') ?>
    <?php $db->close(); ?>
</body>

</html>