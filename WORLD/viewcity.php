
<html>
<?php
include ("connect.php");
include ("header.php");
$resultSet = $db->query("select DISTINCT CON_NAME FROM country ORDER BY CON_NAME");
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style>
<style>

</style>
</head>
<body>

<form action="viewcitydata.php" method="POST">
  <div class = "container-fluid">
  <div class="field">
  <label> Select a Country: </label>

<select class="field"  name="COUNTRY">
<?php
while ($row = $resultSet->fetch_assoc())
{
	$CON_NAME = $row['CON_NAME'];
	echo "<option value='$CON_NAME'>".$CON_NAME."</option>";
}
?>
</select><input type="submit">
</div>




</form>
</body>
</html>