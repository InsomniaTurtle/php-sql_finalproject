<!-- function area -->
<?php
function log_page($db, $page_name)
{
    if (!isset($_SESSION['id'])) {
        $user_id = "0";
    } else {
        $user_id = $_SESSION['id'];
    }
    $sql = "INSERT INTO logs (user_id,page_name) VALUES ('$user_id','$page_name')";
    $result = $db->query($sql);
}
?>
<!-- recipe typing area -->
<?php
if (isset($_GET['bake'])) {
    // if user chooses bake puts a whisk image next to post @ username
} elseif (isset($_GET['cook'])) {
    // if the user selected the other option then put a knife image instead
};
?>