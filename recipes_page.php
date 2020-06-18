<?php
include_once 'inc/functions.inc.php';
include_once 'inc/header.inc.php';
include_once 'inc/nav.inc.php';
?>

<!-- page to show recipes -->
<?php
$sql = "SELECT user_account.full_name,recipe.username,recipe.post_date,recipe.textbox,recipe.type FROM recipe INNER JOIN user_account ON user_account.username=recipe.username ORDER BY post_date DESC";

$result = $db->query($sql);

if ($result->num_rows == 0) {
    echo "<p>Looks like no one shared a recipe.</p>";
} else {
    echo '<h2>Look at all these recipes!</h2>';
}

$recipetype = strtolower($row['recipetype']);

switch ($recipetype) {
    case 'cook':
        $recipetype = '<img src="img/chef_knife_logo.png" alt="chef knife image" height="50">';
        break;
    case 'bake':
        $recipetype = '<img src="img/whisk_logo.png" alt="chef knife image" height="50">';
        break;
    default:
        $recipetype = "";
        break;
}

echo '<div class="displaypost">';

echo '<i class="fa fa-user-circle-o fa-5 icon"></i>' . " " . $row['full_name'] . " has shared a " . $recipetype . " <span class=\"displaypostdate\">on " . date('F j, Y', strtotime($row['post_date'])) . " " . date("H:i", strtotime($row['post_date']));

echo '<div class="content">' . $row['textbox'] . "</div>";
echo "</div>";

?>

<?php require 'inc/footer.inc.php' ?>