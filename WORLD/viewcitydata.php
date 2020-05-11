<html>
<?php
include ("connect.php");
include ("header.php");
$COUNTRY = $_POST["COUNTRY"];
$sql = "SELECT CITY_NUM,CITY_NAME,Province, city.Population, city.CON_CODE from city INNER JOIN country on city.Con_Code = country.Con_Code where country.Con_Name = '$COUNTRY' order by CITY_NAME";
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
<th>City Number</th>
<th>City Name</th>
<th>Country Code</th>
<th>Province</th>
<th>Population</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
  echo "<tr>";
  echo "<td>".$row["CITY_NUM"]."</td>";
  echo "<td>".$row["CITY_NAME"]."</td>";
  echo "<td>".$row["CON_CODE"]."</td>";
  echo "<td>".$row["Province"]."</td>";
  echo "<td>".$row["Population"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

