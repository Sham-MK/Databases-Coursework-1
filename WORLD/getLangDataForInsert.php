<!DOCTYPE html>
<html>
<head>
	<title>language</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

<?php
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     
  echo "<script type='text/javascript'>alert('your data hasbeen entered successfully!!')</script>";

}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$COUNTRY_SELECTED=$_POST['COUNTRY_SELECTED'];
}
?>

	

</head>
<?php
include ("connect.php");
include("header.php")
?>
<body>

<form id ="edit_lang" action="lang.php" method="post">

	             <div class = "container-fluid">
               <div class="field">

              <label> Select a Country: </label>
              <select class="field"  id = "country_list"  name="CON_CODE" onChange='gtLangData(this.value);' required>
              <?php
              $sql = "SELECT CON_NAME,CON_CODE FROM country WHERE CON_CODE='$COUNTRY_SELECTED'";
              $result = $db->query($sql);
              while ($rs=$result-> fetch_assoc())
              {
              ?>
              <option  value = "<?php echo $rs ['CON_CODE']; ?>"> <?php echo $rs ["CON_NAME"]; ?> </option>
              <?php
              }
              ?>
              <?php
              $sql = "SELECT CON_NAME,CON_CODE FROM country WHERE NOT CON_CODE='$COUNTRY_SELECTED'";
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
  <div <?php if (isset($lang_error)): ?> class="form_error" <?php endif ?> >
  <label for="LANGUAGE">LANGUAGE:</label>
  
  <select class="field" name = 'LANG_SPOKEN' required>
  <option>Choose a language</option>
  <?php
  $sqlgetlang = "SELECT * FROM lang_exists WHERE NOT EXISTS(SELECT * FROM LANG_SPOKEN WHERE lang.LANG_SPOKEN=lang_exists.LANG AND lang.CON_CODE='$COUNTRY_SELECTED')";
    $query = $db->query($sqlgetlang);// or die("Failure, no country selected");
            if ($db->query($sqlgetlang)){
    	        while ($row = $query->fetch_assoc()){
                    echo "<option value='" . $row['LANG_SPOKEN']."'>".$row['LANG_SPOKEN']."</option>";
                }
            }else{
                echo "<option value = ''>No Lang</option>";
            }
  ?>
  </select>
  </div>
  </div>

  <div class="field">
  <label for="mainlanguage">Is this the MAIN Language?</label>
  <input class="field" type="text" id="mainlanguage" name="MAIN_LANG" placeholder="enter T if YES enter F if NO.." required maxlength="1" />
  </div>
   
  
  <div class="field">
  <label for="percentage">Percentage:</label>
  <input class="field" type="number" step="0.01" id="percentage" name="LANG_PERCENT" placeholder="enter numbers only.." required/>
  </div><input type="submit" value="Enter">
  </div>
      
  

   </form>
   </body>
   </html>