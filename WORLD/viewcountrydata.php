<html>
<?php
include ("connect.php");
include ("header.php");
$CONTINENT = $_POST["CONTINENT"];
$sql = "SELECT * FROM country WHERE CONTINENT = '$CONTINENT'";
$query = $db->query($sql);
?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



</head>

<body>



<div class = "container-fluid">
<div style="overflow-x:auto;">

<table class="table ">


<tr>
<th>Country Code</th>	
<th>Country Name</th>
<th>Continent</th>
<th>Region</th>
<th>Surface Area</th>
<th>Date Formed</th>
<th>Population</th>
<th>Life Expectency</th>
<th>Birth Per Year</th>
<th>Death Per Year</th>
<th>Local Name</th>
<th>Political System</th>
<th>Ruler's Name</th>
<th>Capital City Index</th>
<th>Country Abbreviation</th>


</tr>

<?php
while ($row = $query->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["CON_CODE"]."</td>";
    echo "<td>".$row["CON_NAME"]."</td>";
    echo "<td>".$row["CONTINENT"]."</td>";
    echo "<td>".$row["REGION_IN_CON"]."</td>";
    echo "<td>".$row["AREA_O_CON"]."</td>";
	echo "<td>".$row["DATE_FORMED"]."</td>";
	echo "<td>".$row["POPULATION"]."</td>";
	echo "<td>".$row["LIFE_EXPECTANCY"]."</td>";
	echo "<td>".$row["BIRTH_PER_YEAR"]."</td>";
	echo "<td>".$row["DEATH_PER_YEAR"]."</td>";
	echo "<td>".$row["LOCAL_NAME"]."</td>";
	echo "<td>".$row["GOV_TYPE"]."</td>";
	echo "<td>".$row["CURRENT_RULER"]."</td>";
	echo "<td>".$row["CAPITAL_CITY_INDEX"]."</td>";
	echo "<td>".$row["COUNTRY_ABBREVIATE"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

