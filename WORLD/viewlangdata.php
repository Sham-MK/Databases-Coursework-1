<html>
<?php
include ("connect.php");
include ("header.php");
$COUNTRY = $_POST["COUNTRY"];
$sql = "SELECT languages.CON_CODE,LANG_SPOKEN,MAIN_LANG, LANG_PERCENT FROM languages INNER JOIN country on languages.Con_Code = country.Con_Code where country.Con_Name = '$COUNTRY' order by Con_Name";
$query = $db->query($sql);
?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



</head>

<body>



<div class = "container-fluid">
<div  style="overflow-x:auto;">

<table class="table">


<tr>
<th>Country Code</th>
<th>Language</th>
<th>Main Language?</th>
<th>Percentage</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
  echo "<tr>";
  echo "<td>".$row["CON_CODE"]."</td>";
  echo "<td>".$row["LANG_SPOKEN"]."</td>";
  echo "<td>".$row["MAIN_LANG"]."</td>";
  echo "<td>".$row["LANG_PERCENT"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

