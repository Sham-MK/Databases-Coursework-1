<html>
<?php

include ("connect.php");
$v = $_POST["CON_CODE"];
$query = "SELECT DISTINCT PROVINCE FROM city WHERE CON_CODE = '$v'";
$result = $db->query($query);
?>
<option >Select Province</option>

<?php

while ($rs=$result-> fetch_assoc())
{
?>
<option  value = "<?php echo $rs ['PROVINCE']; ?>"> <?php echo $rs ["PROVINCE"]; ?></option>
<?php
}
?>

	
</html>