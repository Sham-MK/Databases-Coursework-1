<!DOCTYPE html>
<html>
<head>
<?php
include ("header.php");
include ("connect.php");
?>
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
function getCountry(val)
{
     $.ajax({
           method :"POST",
           url : "getCountryForEdit.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_country").html(data);
           }
           });
}
</script>


       
</head>
<body>
<div style="overflow-x:auto;">

  <p class='h'>Edit Country</p>

<form id="edit_country" action="updateCountry.php" method="post">
<div class = "container-fluid">
<div class="field">
<label> Select a Country: </label>
<select class="field"" name = 'COUNTRY_SELECTED' onChange='getCountry(this.value);' required>
<option value = NULL >choose a country</option>
<?php
    $sql = "SELECT * FROM country";
    $query = $db->query($sql);
    while ($row = $query->fetch_assoc()){
    echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
    }
?>
    </select>
    </div>
    <div class="field">
        <label for="countrycode">Country Code</label>
        <input class = "field" pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_CON_CODE' placeholder='enter 3 upper case characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>
    </div> 

    <div class="field">
        <label for="countryname">Country Name</label>
        <input class="field" type='text' id='countryname' name='NEW_CON_NAME' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>
    </div>
    
    <div class="field">
        <label for="continent">Continent</label>
        
            <?php 
            $sqlviewcontinent = "SELECT DISTINCT CONTINENT FROM country";
            $query = $db->query($sqlviewcontinent);
            ?>
            <select class = "field" name = 'NEW_CONTINENT_SELECTED' required>
            <option value = ''>Choose a continent</option>
            <?php
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['CONTINENT']."'>" . $row ['CONTINENT']."</option>";
            }
            echo "</select>";
            ?>
    </div>

     <div class="field">
        <label for="region">Region in continent</label>
        <input class="field" type='text' id='region' name='NEW_REGION' placeholder='enter characters only..' required>
    </div>
    

    <div class="field">
        <label for="area">Surface Area</label>
        <input class="field" type='number' id='surfacearea' name='NEW_SURFACE_AREA' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>
    
    <div class="field">
        <label for="dateofformation">Date of Formation</label>
        <input class="field" type='number' id='dateofformation' name='NEW_DATE_OF_FORMATION' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>
    </div>

    <div class="field">
        <label for="number">Population</label>
        <input class="field" type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>
    </div>

    <div class="field">
        <label for="lifeexpectency">Life Expectency</label>
        <input class="field" type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>
    </div>

    <div class="field">
        <label for="birthperyear">Birth per year</label>
        <input class="field" type='number' id='birthperyear' name='NEW_BIRTH_PER_YEAR' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>

    <div class="field">
        <label for="deathperyear">Death per year</label>
        <input class="field" type='number' id='deathperyear' name='NEW_DEATH_PER_YEAR' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>

    <div class="field">
        <label for="localname">Country Name in local language</label>
        <input class="field" type='text' id='localname' name='NEW_LOCAL_NAME' placeholder='enter characters only..' required>
    </div>

    <div class="field">
        <label for="governmenttype">Government type</label>
        <input class="field" type='text' id='governmenttype' name='NEW_GOVERNMENT_TYPE' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>
    </div>

    <div class="field">
        <label for="currentruler">Ruler's name</label>
        <input class="field" type='text' id='currentruler' name='NEW_RULER' placeholder='enter characters only..' required>
    </div>
    <div class="field">
        <label for="capitalcityindex">Capital city index</label>
        <input class="field" type='number' id='capitalcityindex' name='NEW_CAPITAL_CITY_INDEX' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' >
    </div>
    
    
    <div class="field">
        <label for="countryabbreviate">Country Abbreviation</label> 
        <input class="field" pattern='[A-Z]*' type='text' id='countryabbreviate' name='NEW_CON_ABBREVIATE' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>"
    </div>
<input type="submit">
<input type="reset">
</div>


</form>
</div>

</body>
</html>