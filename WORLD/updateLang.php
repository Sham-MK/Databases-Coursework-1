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

</style>
<title>Updated language</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    echo "<br>";
    $sqlviewlang = "SELECT * from languages WHERE CON_CODE= '$COUNTRY_SELECTED'";
    $queryview = $db->query($sqlviewlang);// or die("Failure, no country selected");
    if ($db->query($sqlviewlang)){
      while ($row = $queryview->fetch_assoc()){
            $LANG_SELECTED[$row['Lang_Spoken']]=$row['Lang_Spoken'];
            $NEW_MAIN_LANG[$row['Lang_Spoken']]=$_POST['NEW_MAIN_LANG_'.$row["Lang_Spoken"].''];
            $NEW_PERCENTAGE[$row['Lang_Spoken']]=$_POST['NEW_PERCENTAGE'.$row["Lang_Spoken"].''];
  }
    }else{
      echo "failure";
      }
      $queryview = $db->query($sqlviewlang);// or die("Failure, no country selected");
    if ($db->query($sqlviewlang)){
      while ($row = $queryview->fetch_assoc()){
        $LANG_CHANGED=$row['Lang_Spoken'];
        $MAIN_LANG_IN=$NEW_MAIN_LANG[$row['Lang_Spoken']];
        $PERCENTAGE_IN=$NEW_PERCENTAGE[$row['Lang_Spoken']];
        $sqlupdatecity = "UPDATE languages SET `MAIN_LANG`='$MAIN_LANG_IN', `PERCENTAGE`='$PERCENTAGE_IN' WHERE CON_CODE='$COUNTRY_SELECTED'AND Lang_Spoken ='$LANG_CHANGED'";
        echo "<br>";
        $queryupdate = $db->query($sqlupdatecity);
        if ($db->query($sqlupdatecity)){
          echo "Successfully updated ".$LANG_CHANGED;
        }else{
          echo "Failure to update".$LANG_CHANGED;
        }
        echo "<br>";
  }
    }else{
      echo "failure";
      }
      
      $queryview = $db->query($sqlviewlang);
    }
    echo"<br>";
    
?>
<div class = "container-fluid">
<div style="overflow-x:auto;">
<table class="table">
<tr>
<th>Country Code</th>	
<th>Language</th>
<th>Is it an MAin language?</th>
<th>Percentage</th>
</tr>

<?php
while ($row = $queryview->fetch_assoc())
{
    echo "<tr>";
	  echo "<td>".$row["Con_code"]."</td>";
    echo "<td>".$row["Lang_Spoken"]."</td>";
    echo "<td>".$row["Main_Lang"]."</td>";
    echo "<td>".$row["Lang_percent"]."</td>";
    echo "</tr>";
}


?>
</table>
</div>
</div>
</body>
</html>