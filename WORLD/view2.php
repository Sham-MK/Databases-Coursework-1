<html>
<?php
include ("connect.php");
include ("header.php");
$CONTINENT = $_POST["CONTINENT"];
$sql = "SELECT country.CON_CODE, Con_name, country.population, REGION_IN_CON, AREA_O_CON, LIFE_EXPECTANCY, DATE_FORMED, BIRTH_PER_YEAR, DEATH_PER_YEAR, LOCAL_NAME, GOV_TYPE, CURRENT_RULER, COUNTRY_ABBREVIATE, city.City_name, city.Province, languages.Lang_Spoken, languages.Lang_percent, city.Population AS CITY_POPULATION FROM country INNER JOIN city ON country.CON_CODE = city.Con_Code 
INNER JOIN languages ON country.CON_CODE = languages.Con_code
WHERE Continent = 'Asia' AND languages.Main_Lang = 'T'";
$query = $db->query($sql);
?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<div class = "container-fluid">
<div  style="overflow-x:auto;">

<table class="table">



<tr>
<th>Country Code</th>	
<th>Country Name</th>
<th>Region</th>
<th>Surface Area</th>
<th>Life Expectency</th>
<th>Date of Formation</th>
<th>Country Population</th>
<th>Birth Per Year</th>
<th>Death Per Year</th>
<th>Local Name</th>
<th>Government Type</th>
<th>Ruler's Name</th>
<th>Country Abbreviation</th>
<th>City Name</th>
<th>City Population</th>
<th>Province</th>
<th>Language spoken</th>
<th>Percentage of speakers</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["CON_CODE"]."</td>";
    echo "<td>".$row["Con_name"]."</td>";
    echo "<td>".$row["REGION_IN_CON"]."</td>";
	echo "<td>".$row["AREA_O_CON"]."</td>";
	echo "<td>".$row["LIFE_EXPECTANCY"]."</td>";
	echo "<td>".$row["DATE_FORMED"]."</td>";
	echo "<td>".$row["population"]."</td>";
	echo "<td>".$row["BIRTH_PER_YEAR"]."</td>";
	echo "<td>".$row["DEATH_PER_YEAR"]."</td>";
	echo "<td>".$row["LOCAL_NAME"]."</td>";
	echo "<td>".$row["GOV_TYPE"]."</td>";
	echo "<td>".$row["CURRENT_RULER"]."</td>";
	echo "<td>".$row["COUNTRY_ABBREVIATE"]."</td>";
	echo "<td>".$row["City_name"]."</td>";
	echo "<td>".$row["CITY_POPULATION"]."</td>";
	echo "<td>".$row["Province"]."</td>";
	echo "<td>".$row["Lang_Spoken"]."</td>";
	echo "<td>".$row["Lang_percent"]."</td>";
    echo "</tr>";
}
?>
</table>
</div>
</div>
</body>
</html>