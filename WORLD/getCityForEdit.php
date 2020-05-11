<!DOCTYPE html>
<html>
<head>
    <title> get city</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
}
    
?>
<form id="edit_city" action="updateCity.php" method="post">
    <div class = "container-fluid">
    <div class="field">
    <label for="City">Selected Country</label>
    <select class="field" name = 'COUNTRY_SELECTED' onChange='getCity(this.value);' required>
        <?php 
            $sqlcitycountry = "SELECT * FROM country WHERE CON_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
            $sqlcitycountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM city WHERE country.CON_CODE = city.CON_CODE)";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
        ?>
    </select>
    </div>
    
        <div class="field">
        <label for="City">Select a City to Edit</label>
        <select class="field" name = 'CITY_SELECTED' onChange='getCityData(this.value);' required>
            
            <?php
            echo "<option value = ''>Select city</option>";
            $sqlviewcity="SELECT * FROM city WHERE CON_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqlviewcity);// or die("Failure, no country selected");
            if ($db->query($sqlviewcity)){
    	        while ($row = $query->fetch_assoc()){
                    echo "<option value='" . $row['City_num']."'>".$row['City_name']."</option>";
                }
            }else{
                echo "<option value = ''>No city</option>";
            }  
            ?>
            </select>
        </div>
        </div> 


    <div id = 'edit_city_data' class="row">
    </div>
  

</form>
</html>