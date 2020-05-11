<!DOCTYPE html>
<html>
<head>
	<title>city</title>

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
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>


<script>
function getDistrict(val)
{
     $.ajax({
           method :"POST",
           url : "getDistrict.php",
           data: 'CON_CODE='+val,
           success : function(data)
           {
           	$("#Province_list").html(data);
           }
           });
}
</script>
<body>

<form action="city.php" method="post">
  <p class='h'>Insert City</p>

	             <div class = "container-fluid">
               <div class="field">

               <label> Select a Country: </label>
              <select class = "field"  id = "country_list" onChange="getDistrict(this.value);" name="CON_CODE" required>
              <option > select country </option>
              <?php
              $sql = "SELECT CON_NAME,CON_CODE FROM country";
              $result = $db->query($sql);
              while ($rs=$result-> fetch_assoc())
              {
              ?>
              <option  value = "<?php echo $rs ['CON_CODE']; ?>"> <?php echo $rs ["CON_NAME"]; ?> </option>
              <?php
              }
              ?>
              </select>
              </div>
 

 

  <div class="field">
  <label> Select a Province: </label>
  <select class = "field" id = "Province_list" name="Province" required>
  <option value =""> select province </option>
  </select>
  </div>

   <div class="field">
  <label for="concode">Country Code:</label>
  <input class = "field" pattern='[A-Za-z\\s]*' type="text" id="countrycode" name="CON_CODE" placeholder="enter characters only.." required maxlength="3" />
  </div>


  <div class="field">
  <label for="citycode">City Number:</label>
  <input class = "field" type="number" id="citynumber" name="City_Num" placeholder="enter characters only.." required maxlength="3" />
  </div>


  <div class="field">
  <label for="cityname">City Name:</label>
  <input class = "field" pattern='[A-Za-z\\s]*' type="text" id="cityname" name="CITY_NAME" placeholder="enter characters only.." required/>
  </div>
  
  <div class="field">
  <label for="population">Population:</label>
  <input class = "field" type="number" id="population" name="POPULATION" placeholder="enter numbers only.." required/>
  </div><input type="submit" value="Enter">

  </div>
      
  
  



   </form>  </div>

   </body>
   </html>