
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	include("connect.php");


	
	//Setting Variables to add a new country if the user wants to
    $COUNTRY_CODE= ($_POST["CON_CODE"]);
    $LANG_SPOKEN= ($_POST["LANG_SPOKEN"]);
    $MAIN_LANG= ($_POST["MAIN_LANG"]);
    $LANG_PERCENT= ($_POST["LANG_PERCENT"]);
    


  	$sql_l = "SELECT * FROM languages WHERE LANG_SPOKEN='$LANG_SPOKEN' AND CON_CODE = '$CON_CODE'";
  	$res_l = mysqli_query($db, $sql_l);

   if(mysqli_num_rows($res_l) > 0)
    
    {
			 $lang_error = "language already exists";
			 echo $lang_error; 	
    }
  	else
  	{
    
    //to insert data in to country table
	$sql = "insert into languages (CON_CODE, LANG_SPOKEN, MAIN_LANG, LANG_PERCENT) values ('$CON_CODE','$LANG_SPOKEN','$MAIN_LANG','$LANG_PERCENT')";
	$db->query($sql);
	if($db->query($sql))
	{
		echo "error: ".$db->query($sql);
	}
	else
	{ 
		?>
		<script>window.location='languageform.php?success=1';</script>;
		<?php
	}
    }

    //to check whether connected or not
   

}