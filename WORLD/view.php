
<html>
<?php
include ("connect.php");
include ("header.php");
$sql = "SELECT * FROM city";
$resultSet = $db->query("SELECT DISTINCT CONTINENT FROM country");
$query = $db->query($sql);
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>



<form action="view2.php" method="POST">
<div class = "container-fluid">
<div class="field">
<label> Select a Continent: </label>

<select class="field" name="CONTINENT">
<?php
while ($row = $resultSet->fetch_assoc())
{
	$CONTINENT = $row['CONTINENT'];
	echo "<option value='$CONTINENT'>".$CONTINENT."</option>";
}
?>
</select>
</div><input type="submit" >
</div>

</form>
</body>
</html>