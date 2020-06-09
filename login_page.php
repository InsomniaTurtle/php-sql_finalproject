<?php

session_start();

try {
    require_once('includes/mysqli_connect.php');
    require_once('includes/functions.inc.php');
    log_page($db, "Login Page");
} catch (Exception $e) {
    $error = $e->getMessage();
}

function login($db)
{
    $email = $db->real_escape_string($_POST['email']);
    $password = hash('sha512', $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'" . " AND password=" . "'" . $password . "' LIMIT 1";

    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        // return true;
        $row = $result->fetch_assoc();
        $_SESSION['fullname'] = $row['full_name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['loggedin'] = 1;
        header("location: clarkbook.php");
    } else {
        return false;
    }
}

?>

<?php
$pageTitle = "Login Page - Doodledip";
require_once("includes/header.php");
?>

<?php require_once("includes/nav.php");

$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Required fields
    $required = array('email', 'password');

    $error = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }

    if ($error) {
        echo "All these fields are required!";
    } else {
        $status = login($db);

        if ($status) {
            echo "<br>Congratz, you have logged in!";
            $success = true;
        } else {
            echo "<br>Yeesh there was a problem logging you in. Please try again.";
        }
    }
}

$db->close();

if (!$success) { ?>

    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="style.css">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doodledip login - page</title>
    </head>

    <body>
        <div class="header area">
            <div class="title">
                <h1 class="txtype">Doodledip: Create, Share & Enjoy</h1>
                <h2 class="txtype">Login Page</h2>
            </div>
            <div class="nav">
                <!-- links for later -->
                <h3>home | recipes | post | Login/Logout</h3>
            </div>

        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">

            <label class="doodlelabel" for="username">Username:</label>
            <input class="dipinput" type="text" id="username" name="username" size="20" maxlength="20" value="<?php if (isset($_POST["username"])) {
                                                                                                                    echo $_POST["username"];
                                                                                                                } ?>">
            <br>

            <label class="doodlelabel" for="password">Password:</label>
            <input class="dipinput" type="password" id="password" name="password" size="20" maxlength="20" value="<?php if (isset($_POST["password"])) {
                                                                                                                        echo $_POST["password"];
                                                                                                                    } ?>">
            <br>

            <input class="button1" type="submit" value="Login">
        </form>
    <?php } ?>

    <?php require_once('includes/footer.php') ?>
    </body>

    </html>