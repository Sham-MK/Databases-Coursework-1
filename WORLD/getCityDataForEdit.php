<!DOCTYPE html>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CITY_SELECTED= $_POST['CITY_SELECTED'];
}  
?>
<html>
<head>
    <title>city</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class = "container-fluid">
<div class="field">
<label for ="cityname">City Name:</label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where CITY_NUM='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='text' id='cityname' name='NEW_CITY_NAME' placeholder='enter characters only' value = '".$row['City_name']."' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>
        
        <div class="field">
        <label for="newcountry">New Country:</label>
            <?php 
            $sqlgetoricountry = "SELECT * FROM country WHERE CON_CODE=(SELECT CON_CODE FROM city where City_num='$CITY_SELECTED')";
            $query = $db->query($sqlgetoricountry);
            
            ?>
            <select class = "field" name = 'NEW_COUNTRY_CODE' required>
            <?php
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
            ?>
            <?php 
            $sqlcountries = "SELECT * FROM country";
            $query = $db->query($sqlcountries);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
            }
            ?>
            </select>
        </div>
    
            <div class="field">
            <label for ="Province">Province: </label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where City_num='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='text' id='province' name='NEW_Province' placeholder='enter characters only' value = '".$row['Province']."' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>


        <div class="field">
        <label for ="population">Population :</label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where CITY_NUM='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' value = '".$row['Population']."' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>

        <div class="field">
        <label for ="citynumber">City Number :</label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where CITY_NUM='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='number' id='citynumber' name='NEW_CITY_NUMBER' placeholder='enter numbers only' value = '".$row['City_num']."' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>

        <input type="submit" value="Enter">
    <input type="reset">

        </div>
    
    
    </body>
    </html>