<!DOCTYPE html>
<html>
<head>
	<title> country </title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php
include ("header.php");
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     
  echo "<script type='text/javascript'>alert('your data hasbeen entered successfully!!')</script>";

}
?>

</head>
<?php
include ("connect.php");
?>
include ("connect.php");
include ("header.php");
?>
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
function gettimezone(val)
{
     $.ajax({
           method :'POST',
           url : 'gettimezone.php',
           data: 'CONTINENT='+val,
           success : function(data)
           {
           	$("#time_zone_list").html(data);
           }
           });
}
</script>

<body>
  <p class='h'>Insert Country</p>
<form action="country.php" method="post">

<!-- dropdown to select continent from the list -->
      <div class = "container-fluid">
      <div class="field">
        
             <label > Select a Continent: </label>
             <select class="field" id = "continent_list" onChange="gettimezone(this.value);" name="CONTINENT" required >
             <option > select continent </option>
             <?php
              $sql = "SELECT DISTINCT CONTINENT FROM country";
              $result = $db->query($sql);
              while ($rs=$result-> fetch_assoc())
              {
              ?>
              <option  value = "<?php echo $rs ['CONTINENT']; ?> "> <?php echo $rs ["CONTINENT"]; ?> </option>
              <?php
               }
              ?>
              </select>
              </div>
      



      <div class="field">
      <label for="countrycode">Country Code:</label>
      <input class="field" pattern='[A-Za-z\\s]*' type="text" id="countrycode" name="CON_CODE" placeholder="enter 3 characters only.." required maxlength="3"/>
      </div>
   
      <div class="field">
      <label for="countryname">Country Name:</label>
      <input class = "field" pattern='[A-Za-z\\s]*' type='text' id="countryname" name="CON_NAME" placeholder="enter characters only.." required/>
      </div>

      <div class="field">
      <label for="regionincontinent">Region:</label>
      <input class = "field" pattern='[A-Za-z\\s]*' type='text' id="regionincontinent" name="REGION_IN_CON" placeholder="enter characters only.." required/>
      </div>
   
      <div class="field">
      <label for="surfacearea">Surface Area:</label>
      <input class = "field" type="number" id="surfacearea" name="AREA_O_CON" placeholder="enter numbers only.." required/>
      </div>
      
      <div class="field">
      <label for="dateofformatio">Date of Formation:</label>
      <input class = "field" type="Year" id="yearindipendence" name="DATE_FORMED" placeholder="enter numbers only" required/>
       </div>

      <div class="field">
      <label for="population">Population:</label>
      <input class = "field" type="number" id="population" name="POPULATION" placeholder="enter numbers only" required/>
      </div>

      <div cclass="field">
      <label for="lifeexpectency">Life Expectency:</label>
      <input class = "field" type="number" id="lifeexpectency" step="0.01" name="LIFE_EXPECTENCY" placeholder="enter numbers only.." required/>
      </div>

     
      <div cclass="field">
      <label for="deathperyear">Death Per Year:</label>
      <input class = "field" type="number" id="lifeexpectency"  name="DEATH_PER_YEAR" placeholder="enter numbers only.." required/>
      </div>

      <div class="field">
      <label for="birthperyear">Birth Per Year:</label>
      <input class = "field" type="number" id="gnp" name="BIRTH_PER_YEAR" placeholder="enter numbers only.."required/>
      </div>
      
      <div class="field">
      <label for="localname">Local Name:</label>
      <input class = "field" pattern='[A-Za-z\\s]*' type='text' id="localname" name="LOCAL_NAME" placeholder="enter characters only.." required/>
      </div>
      

      
      <div class="field">
      <label for="governmenttype">Government Type:</label>
      <input class = "field" pattern='[A-Za-z\\s]*' type="text" id="governmenttype" name="GOV_TYPE" placeholder="enter characters only.." required/>
      </div>
      
      <div cclass="field">
      <label for="politicalruler">Ruler's Name:</label>
      <input class = "field" pattern='[A-Za-z\\s]*' type="text" id="currentruler" name="CURRENT_RULER" placeholder="enter characters only.."required/>
      </div>

      <div class="field">
      <label for="capital">Capital City Index:</label>
      <input class = "field" type="number" id="capitalcityindex" name="CAPITAL_CITY_INDEX" placeholder="enter numbers only" required/>
      </div>

      <div class="field">
      <label for="iso3166">Country Abbreviation:</label> 
      <input class = "field" pattern='[A-Za-z\\s]*' type="text" id="countryabbreviate" name="COUNTRY_ABBREVIATE" placeholder="enter 2 characters only.."required maxlength="2"/>
      </div><input type="Submit"  value = "ENTER">
      </div>
    
      
      

     
      

</form>
</body>
</html>