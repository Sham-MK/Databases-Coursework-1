<!DOCTYPE html>
<html>
<?php
	include ("connect.php");
	include ("header.php");
	$sql = "SELECT * FROM country";
	$query = $db->query($sql);
?>
<head>
	<title>Delete A Country</title>
	
	<meta charset="UTF-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	
</head>
<body>

	<form action="delete.php" method="post">
		<div class = "container-fluid">
			<div class="field">
				<label>Delete a Country from the Database</label></br>
				<select class="field" id="Con_Code" name="Con_Code">
					<option value="" disabled selected>Select a country</option>
					<?php
						while($row = $query->fetch_assoc()){
							echo "<option value=\"".$row["Con_Code"]."\">".$row["CON_NAME"]."</option>";
						}
					?>
				</select>
			</div><button type="submit">Submit</button>

				<input class="field" type="hidden" name="TABLE" id="TABLE" value="country"/>
				<input class="field" type="hidden" name="LOC" id="LOC" value="delFormCountry.php"/>
		</div>
				
			
	</form>

</body>
</html>