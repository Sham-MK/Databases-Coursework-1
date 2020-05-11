<!DOCTYPE html>
<html>
<?php
	include ("connect.php");
	include ("header.php");
	$sql = "SELECT city.CITY_NUM, city.CITY_NAME, country.CON_NAME FROM city LEFT JOIN country ON city.CON_CODE = country.CON_CODE ORDER BY country.CON_NAME";
	$query = $db->query($sql);
?>
<head>
	<p class='h'>Delete City</p>
	<title>Delete A City</title>
	<meta charset="UTF-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	
</head>
<body>
	<form action="delete.php" method="post">
		<div class = "container-fluid">
			<div class="field">
				<label  class="field">Delete a City from the Database</label></br>
				<select class="field" name="ID">
					<option value="" disabled selected>Select a city</option>
					<?php
						$past = NULL;
						while($row = $query->fetch_assoc()){
							$CoName = $row["CON_NAME"];
							$CiName = $row["CITY_NAME"];
							$CityNUM = $row["CITY_NUM"];

							if($CoName != $past){
								if($past != NULL){
									echo "</optgroup>";
								}
								echo "<optgroup label=\"".$CoName."\">";
							}
							echo "<option value=\"".$CiID."\">".$CiName."</option>";

							$past = $CoName;
						}
						echo "</optgroup>";
					?>
				</select>
			</div><button type="submit">Submit</button>

		</div>
				
				<input  class="field" type="hidden" name="TABLE" id="TABLE" value="city"/>
				<input  class="field" type="hidden" name="LOC" id="LOC" value="delFormCity.php"/>
			
	</form>

</body>
</html>