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

<?php
function insert_post($db)
{
    $user_id = $db->real_escape_string($_SESSION['id']);
    $textbox = $db->real_escape_string($_POST['textbox']);
    $recipetype = $db->real_escape_string($_POST['recipetype']);
    $sql = "INSERT INTO posts (user_id,textbox,recipetype) VALUES ('$user_id','$textbox','$recipetype')";

    $result = $db->query($sql);

    if (!$db->error) {
        header("location: mainpage.php");
    } else {
        return false;
    }
}
?>