<?php
require_once "../controller/recipe_update_functions.php";
//print_r($_POST);
$recp_id = $_POST["selectversion"];
//print_r($country_id);
$result = getrecpid($rec_id);
?>
<option value=""></option>
<?php
foreach ($result as $row) {
    //print_r($result);
?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
<?php
}
?>
