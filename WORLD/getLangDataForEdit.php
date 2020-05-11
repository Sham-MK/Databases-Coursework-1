<!DOCTYPE html>
<html>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
}
?>
<head>
    <title>language</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>


<form id="edit_lang" action="updateLang.php" method="post">
               <div class = "container-fluid">
               <div class="field">
               <label> Country Selected: </label>

    <select class="field" name = 'COUNTRY_SELECTED' onChange='getLang(this.value);' required>
        <?php 
            $sqllangcountry = "SELECT * FROM country WHERE CON_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqllangcountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
            $sqlcitycountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM languages WHERE country.CON_CODE = languages.CON_CODE)";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
        ?>
    </select>
    </div>
    </div>

    
<div class = "container-fluid">
<div class="field">

<table class="table">
<tr>
<th>Language Name</th>
<th>Main Language?</th>
<th>Percentage of Speakers</th>
</tr>

<?php
$fetchlangdata="SELECT * FROM languages WHERE CON_CODE='$COUNTRY_SELECTED'";
$query = $db->query($fetchlangdata);
while ($row = $query->fetch_assoc())
{
    echo "<tr>";
    
    echo "<td>".$row["Lang_Spoken"]."</td>";
    ?>
    <td>
    <?php
    if($row["Main_Lang"]=='T'){
         echo "<label class='radio-inline'>";
         echo "<input  type='radio' value= 'T' name='NEW_MAIN_LANG_".$row["Lang_Spoken"]."' checked> YES ";
         echo "</label>";

        echo "<label class='radio-inline'>";
        echo "<input type='radio' value= F' name='NEW_MAIN_LANG_".$row["Lang_Spoken"]."'> NO ";
        echo "</label>";
        
    }else{
            echo "<label class='radio-inline'>";
            echo "<input  type='radio' value= 'T' name='NEW_MAIN_LANG_".$row["Lang_Spoken"]."'> YES ";
            echo "</label>";
    

        echo "<label class='radio-inline'>";
        echo "<input  type='radio' value= 'F' class='custom-control-input' id='defaultUncheckedDisabled2' name='NEW_MAIN_LANG_".$row["Lang_Spoken"]."' checked > NO ";
        echo "</label>";
    }
    
    ?>
    </td>
  
<?php
//echo "<td>".$row["OFFICIAL_LANG"]."</td>";
    echo "<td>";
    echo "<input class = 'field' type='number' id='percentage' name='NEW_PERCENTAGE".$row["Lang_Spoken"]."' value = '" .$row["Lang_percent"]."' placeholder='enter numbers only' min = '0' max='100' required ondrop='return false' onpaste='return false' step = 0.1>";
    echo"</td>";

    echo "</tr>";
}
?>
</table>
</div>
</div>


    <input type="submit" value="Enter">
    <input type="reset">





</form>
</body>
</html>