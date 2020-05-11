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
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>updated city</title>


</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CITY_SELECTED= $_POST['CITY_SELECTED'];
    $NEW_COUNTRY_CODE= $_POST['NEW_COUNTRY_CODE'];
    $NEW_CITY_NAME= $_POST['NEW_CITY_NAME'];
    $NEW_CITY_NUMBER= $_POST['NEW_CITY_NUMBER'];
    $NEW_POPULATION= $_POST['NEW_POPULATION'];
    $NEW_PROVINCE= $_POST['NEW_PROVINCE'];

    $sqlviewcity = "SELECT * from city WHERE City_num= '$CITY_SELECTED'";
      $sqlupdatecity = "UPDATE city 
      SET `Population`='$NEW_POPULATION', CON_CODE='$NEW_COUNTRY_CODE', City_name='$NEW_CITY_NAME', CITY_NUMBER='$NEW_CITY_NUMBER'
      PROVINCE='$NEW_PROVINCE' WHERE City_num= '$CITY_SELECTED'";
      $queryupdate = $db->query($sqlupdatecity);
      if ($db->query($sqlupdatecity)){
      }else{
        echo "failure";
      }
      echo "<br>";
      
      $queryview = $db->query($sqlviewcity);
    }
    echo"<br>";
    
?>
<div class = "container-fluid">
<div  style="overflow-x:auto;">

<table class="table">
<tr>
<th>City Number</th>
<th>Country Code</th>	
<th>City Name</th>
<th>Province</th>
<th>Population</th>
</tr>

<?php
while ($row = $queryview->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row["City_num"]."</td>";
	  echo "<td>".$row["Con_Code"]."</td>";
    echo "<td>".$row["City_name"]."</td>";
    echo "<td>".$row["Province"]."</td>";
    echo "<td>".$row["Population"]."</td>";
    echo "</tr>";
}


?>
</table>
</div>
</div>
</body>
</html>