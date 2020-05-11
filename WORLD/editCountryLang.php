<html>
<?php
include ("header.php");
include ("connect.php");
?>
<head>
  <title>city</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

<script>
function getLang(val)
{
     $.ajax({
           method :"POST",
           url : "getLangDataForEdit.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
            $("#edit_lang").html(data);
           }
           });
}
</script>
<body>
    <p class='h'>Edit Language</p>

<form id="edit_lang" action="updateLang.php" method="post">

              <div class = "container-fluid">
              <div class="field">
              <label> Select a Country: </label>
              <select class="field" name = 'COUNTRY_SELECTED' onChange='getLang(this.value);' required>
              <option value = '' >Choose origin country</option>
        <?php 
            $sqllangcountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM languages WHERE country.CON_CODE = languages.CON_CODE)";
            $query = $db->query($sqllangcountry);
        while ($row = $query->fetch_assoc()){
        echo "<option value = '" . $row['CON_CODE']."'>" . $row ['CON_NAME']."</option>";
        }
        ?>
</select>
</div>
</div>







</form>
</body>
</html>