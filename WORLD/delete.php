<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	include("connect.php");
	
	// Setting Variables
	$TABLE = $_POST["TABLE"];
    $LOC = $_POST["LOC"];

    $COUNTRY_CODE = $_POST["COUNTRY_CODE"];
	$CITY_NUM = $_POST["City_num"];
	$LANG = $_POST["LANG"];

	// Checking which operation to be done
    if(!is_null($COUNTRY_CODE)){
    	if(!is_null($LANG))
    		$WHERE = "COUNTRY_CODE = \"$COUNTRY_CODE\" AND LANG = \"$LANG\"";
    	else
    		$WHERE = "COUNTRY_CODE = \"$COUNTRY_CODE\"";
    }
    else if(!is_null($CITY_NUM))
    	$WHERE = "CITY_NUM = \"$CITY_NUM\"";

    // Deletes the country/city/language
	$sql = "DELETE FROM $TABLE WHERE $WHERE";

    // to check whether connected or not
    $q = $db->query($sql);
	if(!$q)
	{
		echo "error: ".$q;
	}
	else
	{
	    header("location: ".$LOC."?msg=success");
	}

}
?>