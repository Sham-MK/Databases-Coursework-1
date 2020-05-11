<!DOCTYPE html>
<html>
<?php
	include ("connect.php");
	include ("header.php");

	if(isset($_GET["country"])){
		$country = $_GET["country"];
	} else {
		$country = NULL;
	}
?>
<head>
	<title>Delete A Language</title>
	<meta charset="UTF-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body onload="ChangeForm();">
	<p class='h'>Delete A Language</p>

	<div id="static-form" style="display:block;">
		<form action="delFormLang.php" method="get">
			<div class = "container-fluid">
				<div class="field">
					<label>Country</label></br>
					<select class="field" name="country">
						<option value="" disabled selected>Select a country</option>
						<?php
							$sql = "SELECT * FROM country";
							$query = $db->query($sql);

							while($row = $query->fetch_assoc()){
								$CC = $row["CON_CODE"];
								$CN = $row["CON_NAME"];
								echo "<option value=\"".$CC."\">".$CN."</option>";
							}
						?>
					</select>
					<button type="submit">Select Country</button>

					</br></br>
					<label>Language</label></br>
					<select>
						<option>Please select a country first</option>
					</select>
					
					
				</div>
			</div>
		</form>
	</div>





	<div id="dynamic-form" style="display:none;">
		<form action="delete.php" method="post">
			<div class = "container-fluid">
				<div class="field">
					<label>Country</label></br>
					<select class="field" name="COUNTRY_CODE" id="COUNTRY_CODE">
						<?php
							$sql2 = "SELECT CON_NAME FROM country WHERE CON_CODE = \"$country\"";
							$query2 = $db->query($sql2);

							while($name = $query2->fetch_assoc()){
								echo "<option value=\"".$country."\">".$name["CON_NAME"]."</option>";
							}
						?>
					</select>
yEl]V=9=P=Uf
					</br></br>
					<label>Language</label></br>
					<select class="form-control" name="LANG">
						<option value="" disabled selected>Select a language</option>
						<?php
							$sql3 = "SELECT * FROM languages WHERE CON_CODE = \"$country\"";
							$query3 = $db->query($sql3);
							$flag = 0;

							while($lang = $query3->fetch_assoc()){
								$flag = 1; // Indicates there is a language
								$LANG = $lang["Lang_Spoken"];
								echo "<option value=\"".$LANG."\">".$LANG."</option>";
							}

							if($flag == 0){
								echo "<option value=\"\" disabled>---No Language---</option>";
							}
						?>
					</select>
					</div><button type="submit">Submit</button>
					
				</div>
					
					<input class="field" type="hidden" name="TABLE" id="TABLE" value="lang"/>
					<input class="field" type="hidden" name="LOC" id="LOC" value="delFormLang.php"/>
		
		</form>
	</div>




	<script type="text/javascript">
		function ChangeForm()
		{
			value = "<?php echo $country ?>";
			if(value)
			{
				document.getElementById("static-form").style.display = "none"; //make not visible
				document.getElementById("dynamic-form").style.display = "block"; //make visible
			}
			else
			{
				document.getElementById("static-form").style.display = "block";
				document.getElementById("dynamic-form").style.display = "none";
			}
		}
	</script>

</body>
</html>