
<!DOCTYPE html>
<html>
<?php
include ("header.php");
include ('connect.php');
function strictEmpty($var) {
  // Delete this line if you want space(s) to count as not empty
  $var = trim($var);
  if(isset($var) === true && ($var === ''||$var === NULL))  {
      return NULL;   // It's empty
  }else {
      return $var;  // It's not empty
  }
}
function checkNull($var){//Just in case isNull function not supported anymore
  if ($var==NULL){
    echo "is Null<br>";
    return true;
  }else{
    return false;
  }
}
?>
<head>

<title></title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    $NEW_COUNTRY_CODE= $_POST['NEW_COUNTRY_CODE'];
    $NEW_COUNTRY_NAME= $_POST['NEW_COUNTRY_NAME'];
    $NEW_CONTINENT_SELECTED= $_POST['NEW_CONTINENT_SELECTED'];
    $NEW_SURFACE_AREA= $_POST['NEW_SURFACE_AREA'];
    $NEW_REGION=$_POST['NEW_REGION'];
    $NEW_DATE_OF_FORMATION= $_POST['NEW_DATE_OF_FORMATION'];
    $NEW_DATE_OF_FORMATION= strictEmpty($NEW_DATE_OF_FORMATION);
    $NEW_POPULATION= $_POST['NEW_POPULATION'];
    $NEW_LIFE_EXPECTENCY= $_POST['NEW_LIFE_EXPECTENCY'];
    $NEW_DEATH_PER_YEAR=$_POST['NEW_DEATH_PER_YEAR'];
    $NEW_BIRTH_PER_YEAR=$_POST['NEW_BIRTH_PER_YEAR'];
    $NEW_LOCAL_NAME= $_POST['NEW_LOCAL_NAME'];
    $NEW_GOVERNMENT_TYPE= $_POST['NEW_GOVERNMENT_TYPE'];
    $NEW_RULER= $_POST['NEW_RULER'];
    $NEW_CAPITAL_CITY_INDEX=$_POST['NEW_CAPITAL_CITY_INDEX'];
    $NEW_CON_ABBREVIATE=$_POST['NEW_CON_ABBREVIATE'];
    echo "Capital City Index is ".checkNull($NEW_CAPITAL_CITY_INDEX)."<br>";

    $sqlviewcountry = "SELECT * from country where CON_CODE= '$COUNTRY_SELECTED'";
    $queryview = $db->query($sqlviewcountry);// or die("Failure, no country selected");
    if ($db->query($sqlviewcountry)){
      while ($row = $queryview->fetch_assoc()){
              echo $row['CON_NAME']." is being updated. <br>";
  }
    }else{
      echo "failure";
      }
      $sqlupdatecountry = "UPDATE country 
      SET CON_NAME='$NEW_COUNTRY_NAME', CONTINENT='$NEW_CONTINENT_SELECTED', AREA_O_CON='$NEW_SURFACE_AREA',`POPULATION`='$NEW_POPULATION', DEATH_PER_YEAR='$NEW_DEATH_PER_YEAR', BIRTH_PER_YEAR='$NEW_BIRTH_PER_YEAR', COUNT
      LIFE_EXPECTENCY='$NEW_LIFE_EXPECTENCY', LOCAL_NAME='$NEW_LOCAL_NAME', GOV_TYPE='$NEW_GOVERNMENT_TYPE',REGION_IN_CON=$NEW_REGION, DATE_FORMED='$NEW_DATE_OF_FORMATION',CAPITAL_CITY_INDEX='$NEW_CAPITAL_CITY_INDEX', COUNTRY_ABBREVIATE='$NEW_CON_ABBREVIATE',
      CURRENT_RULER='$NEW_RULER' WHERE CON_CODE= '$COUNTRY_SELECTED'";
	  
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
        echo "Successfully updated";
      }else{
        echo "failure";
      }
      echo "<br>";
      if(checkNull($NEW_DATE_OF_FORMATION)){
        $sqlupdatecountry="UPDATE country SET DATE_FORMED=NULL WHERE CON_CODE= '$COUNTRY_SELECTED'";
      }else{
        $sqlupdatecountry="UPDATE country SET DATE_FORMED='$NEW_DATE_OF_FORMATION' WHERE CON_CODE= '$COUNTRY_SELECTED'";
      }
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
      }else{
        echo "Error in year update";
      }
      echo"<br>";
      if(checkNull($NEW_CAPITAL_CITY_INDEX)){
        $sqlupdatecountry = "UPDATE country SET CAPITAL=NULL WHERE CON_CODE= '$COUNTRY_SELECTED'";
      }else{
        $sqlupdatecountry = "UPDATE country SET CAPITAL='$NEW_CAPITAL_CITY_INDEX' WHERE CON_CODE= '$COUNTRY_SELECTED'";
      }
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
      }else{
        echo "Sorry, capital doen't exist";
      }
      
      $sqlupdatecountry = "UPDATE country SET CON_CODE='$NEW_COUNTRY_CODE' WHERE CON_CODE= '$COUNTRY_SELECTED'";
    $queryupdate = $db->query($sqlupdatecountry);
    if ($db->query($sqlupdatecountry)){
      echo "Country Code succesfully updated";
    }else{
      echo "Sorry, country code already exists, please try again with a UNIQUE set of characters";
      $sqlviewcountry = "SELECT * from country where CON_CODE= '$COUNTRY_SELECTED'";
      $queryupdate = $db->query($sqlviewcountry);
      while ($row = $queryupdate->fetch_assoc()){
        $NEW_COUNTRY_CODE=$row['CON_CODE'];// Just in case, to access the table for updated contents
      }
    }
    echo"<br>";
    
    }
?>
<div class = "container-fluid">
<div style="overflow-x:auto;">
<table class="table">
<tr>
<th>Country Code</th>	
<th>Country Name</th>
<th>Continent</th>
<th>Surface Area</th>
<th>Date Formed</th>
<th>Population</th>
<th>Life Expectancy</th>
<th>Birth per year</th>
<th>Death per year</th>
<th>Local Name</th>
<th>Government Type</th>
<th>Ruler</th>
<th>Capital City Index</th>
<th>Country Abberiation</th>

</tr>


<?php
$sqlviewcountry = "SELECT * from country where CON_CODE= '$NEW_COUNTRY_CODE'"; //just in case the country sucessfully
$queryview = $db->query($sqlviewcountry);
while ($row = $queryview->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["CON_CODE"]."</td>";
    echo "<td>".$row["CON_NAME"]."</td>";
    echo "<td>".$row["CONTINENT"]."</td>";
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
    echo "</tr>";
}


?>
</table>
</div>
</body>
</html>
