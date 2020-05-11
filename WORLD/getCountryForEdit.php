<!DOCTYPE html>
<html>
<head>
<?php
include ('connect.php');
?>

    
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    $sqlviewcountry = "SELECT * from country where CON_CODE= '$COUNTRY_SELECTED'";
    $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
    if ($db->query($sqlviewcountry)){
		while ($row = $query->fetch_assoc()){
            //echo $row['COUNTRY_NAME'];
}
	}else{
		echo "failure".mysqli_error($db);
    }
}
    
?>
<form id="edit_country" action="updateCountry.php" method="post">
<div class = "container-fluid">
    <div class="field">
    <label> Select a Country: </label>
    <select class="field" name = 'COUNTRY_SELECTED' onChange='getCountry(this.value);' required>
    <?php 
    $query = $db->query($sqlviewcountry);
    while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
    {
    	echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
    }
    ?>
    <?php
    $sqlall = "SELECT * FROM country";
    $sqlallbut ="SELECT * FROM country WHERE NOT CON_CODE='$COUNTRY_SELECTED'";
    $query = $db->query($sqlallbut);
    while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
    {
    	echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
    }
?>
    </select>
    </div>

    <div class="field">
        <label for="countrycode">Country Code</label>
        <?php
        $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
        if ($db->query($sqlviewcountry)){
		    while ($row = $query->fetch_assoc()){
                echo "<input class = 'field' pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_COUNTRY_CODE' value = '" . $row['CON_CODE']."' placeholder='enter 3 characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>";
            }
        }else{
        echo "<input class='field' pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_COUNTRY_CODE' placeholder='enter 3 characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>";
        }
        ?>
    </div> 

    <div class="field">
        <label for="countryname">Country Name</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='text' id='countryname' name='NEW_COUNTRY_NAME' value = '" . $row['CON_NAME']."' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class='field' type='text' id='countryname' name='NEW_COUNTRY_NAME' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>

    <div class="field">
        <label for="continent">Continent</label>
            <?php 
            $sqlviewcontinent = "SELECT DISTINCT CONTINENT FROM country";
            echo "<select class = 'field' name = 'NEW_CONTINENT_SELECTED' required>";
            $query = $db->query($sqlviewcountry);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['CONTINENT']."'>" . $row ['CONTINENT']."</option>";
            }
            $query = $db->query($sqlviewcontinent);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['CONTINENT']."'>" . $row ['CONTINENT']."</option>";
            }
            echo "</select>";
            ?>
    </div>
    
    <div class="field">
        <label for="region">Region in continent</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
                while ($row = $query->fetch_assoc()){
                    echo "<input class = 'field' type='text' id='region' name='NEW_REGION' value = '" . $row['REGION_IN_CON']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'field' type='text' id='region' name='NEW_REGION' placeholder='enter characters only..' required>";
            }
            ?>
    </div>
   

    <div class="field">
        <label for="area">Surface Area</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='number' id='surfacearea' name='NEW_SURFACE_AREA' value = '" . $row['AREA_O_CON']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class='field' type='number' id='area' name='NEW_SURFACE_AREA' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="field">
        <label for="dateofformation">Date of Formation</label>
        <?php
        $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
        if ($db->query($sqlviewcountry)){
		    while ($row = $query->fetch_assoc()){
                echo "<input class='field' type='number' id='dateofformation' name='NEW_DATE_OF_FORMATION' value = '" . $row['DATE_FORMED']."' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>";
            }
        }else{
            echo "<input class='field' type='number' id='dateofformation' name='NEW_DATE_OF_FORMATION' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>";
        }
        ?>
    </div>

    <div class="field">
        <label for="number">Population</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='number' id='population' name='NEW_POPULATION' value = '" . $row['POPULATION']."' placeholder='enter numbers only' min = '0' required maxlength='11' ondrop='return false' onpaste='return false'>";
                }
            }else{
                echo "<input class='field' type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>";
            }  
        ?>
    </div>

    <div class='field'>
        <label for="lifeexpectency">Life Expectency</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class='field type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' value = '" . $row['LIFE_EXPECTANCY']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>";
                }
            }else{
                echo "<input class='field type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>";
            }  
            ?>
    </div>

    <div class='field'>
        <label for="birthperyear">Birth per year</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='number' id='birthperyear' name='NEW_BIRTH_PER_YEAR' value = '" . $row['BIRTH_PER_YEAR']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class='field' type='number' id='birthperyear' name='NEW_BIRTH_PER_YEAR' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="field">
        <label for="deathperyear">Death per year</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
                while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='number' id='deathperyear' name='NEW_DEATH_PER_YEAR' value = '" . $row['DEATH_PER_YEAR']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class='field' type='number' id='deathperyear' name='NEW_DEATH_PER_YEAR' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="field">
        <label for="localname">Country Name in local language</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='text' id='localname' name='NEW_LOCAL_NAME' value = '" . $row['LOCAL_NAME']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'form-control' type='text' id='localname' name='NEW_LOCAL_NAME' placeholder='enter characters only..' required>";
            }
            ?>
    </div>

    <div class="field">
        <label for="governmenttype">Government type</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class='field' type='text' id='governmenttype' name='NEW_GOVERNMENT_TYPE' value = '" . $row['GOV_TYPE']."' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class = 'field' type='text' id='governmenttype' name='NEW_GOVERNMENT_TYPE' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>

    <div class="field">
        <label for="currentruler">Ruler's name</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'field' type='text' id='currentruler' name='NEW_RULER' value = '" . $row['CURRENT_RULER']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'field' type='text' id='currentruler' name='NEW_RULER' placeholder='enter characters only..' required>";
            }
            ?>
    </div>

    <div class="field">
         <div class="field">
        <label for="capitalcityindex">Capital city index</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
                while ($row = $query->fetch_assoc()){
                    echo "<input class = 'field' type='text' id='Capitalcityindex' name='NEW_CAPITAL_CITY_INDEX' value = '" . $row['CAPITAL_CITY_INDEX']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'field' type='text' id='currentruler' name='NEW_CAPITAL_CITY_INDEX' placeholder='enter characters only..' required>";
            }
            ?>
        </div>

    <div class="field">
        <label for="countryabbreviate">Country Abbreviation</label> 
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class='field' pattern='[A-Z]*' type='text' id='countryabbreviate' name='NEW_CON_ABBREVIATE' value = '" . $row['COUNTRY_ABBREVIATE']."' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class='field' pattern='[A-Z]*' type='text' id='countryabbreviate' name='NEW_CON_ABBREVIATE' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>
<input  type="submit">
<input type="reset">
</div>

</form>

</html>