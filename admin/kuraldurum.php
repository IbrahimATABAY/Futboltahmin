<?php
	$meyveler = $_POST['meyveler'];
	$baglanti = mysql_connect("localhost", "pcanliV7_ftblth", "58040613Bb");

	if ( !$baglanti )
	exit("Baðlantý saðlanamadý.");

	mysql_select_db("pcanliv7_ftblth");
	mysql_query( "UPDATE tahmin SET Durum = 0;" );
	
	$sorgu = mysql_query("SELECT * FROM tahmin;");

	while($row = mysql_fetch_array( $sorgu )) 
	{
		
	}
?>