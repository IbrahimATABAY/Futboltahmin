<?php
	$Bas_DK = $_POST['Bas_DK'];
	$Bit_DK = $_POST['Bit_DK'];
	$Sonuc = $_POST['Sonuc'];
	$Sonuc_Skor = $_POST['Sonuc_Skor'];
	
	$Kural = $_POST['Kural'];
	$Opt = $_POST['Opt'];
	$Kural_Skor = $_POST['Kural_Skor'];
	
	$MAXID;
	
	$baglanti = mysql_connect("localhost", "pcanliV7_ftblth", "58040613Bb");

	if ( !$baglanti )
	exit("Bağlantı sağlanamadı.");

	mysql_select_db("pcanliv7_ftblth");
	
	mysql_query( "INSERT INTO tahmin (BasDK, BitDK, Sonuc, Sonuc_Skor, Durum) VALUES (".$Bas_DK.",".$Bit_DK." , '".$Sonuc."', ".$Sonuc_Skor.", 1);" );
	$sorgu = mysql_query("SELECT MAX(ID) FROM tahmin;");

	while($row = mysql_fetch_array( $sorgu )) 
	{
		$MAXID = $row["MAX(ID)"];
	}
	
	foreach($Kural as $key => $n) 
	{
		mysql_query( "INSERT INTO kural (Kural, Opt, Kural_Skor, T_ID) VALUES ('".$Kural[$key]."','".$Opt[$key]."' , ".$Kural_Skor[$key].", ".$MAXID.");" );
	}
   
	mysql_close();
	
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=kurallar.php">';
?>