<?php

session_start();

try {
    include_once 'inc/mysqli_connect.php';
    include_once 'inc/functions.inc.php';
    log_page($db, "Login Page");
} catch (Exception $e) {
    $error = $e->getMessage();
}

function login($db)
{
    $email = $db->real_escape_string($_POST['email']);
    $password = hash('sha512', $_POST['password']);

    $sql = "SELECT * FROM user_account WHERE email='" . $_POST["email"] . "'" . " AND password=" . "'" . $password . "' LIMIT 1";

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
include_once "inc/header.inc.php";
?>

<?php include_once "inc/nav.inc.php";

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
        echo "You need to fill out all the things!";
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

<?php require 'inc/footer.inc.php' ?>