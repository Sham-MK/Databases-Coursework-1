<!DOCTYPE html>
<html>
<head>
	<title>language</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script>
  function getLangData(val)
{
     $.ajax({
           method :"POST",
           url : "getLangDataForInsert.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_lang").html(data);
           }
           });
}
  </script>

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
<body>

<form id ="edit_lang" action="lang.php" method="post">
  <p class='h'>Insert Language</p>

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
  <label for="mainlanguage">Language: </label>
  <input class="field" type="text" id="language" name="LANG_SPOKEN" placeholder="enter name of language" />
  </div>
 

  <div class="field">
  <label for="mainlanguage">Is this the Main Language?</label>
  <input class="field" type="text" id="mainlanguage" name="Main_LANG" placeholder="enter T if YES enter F if NO.." required maxlength="1" />
  </div>
   
  
  <div class="field">
  <label for="percentage">Percentage:</label>
  <input class="field" type="number" step="0.01" id="percentage" name="LANG_PERCENT" placeholder="enter numbers only.." required/>
  </div>  <input type="submit" value="Enter">

  </div>
      

   </form>
   </body>
   </html>