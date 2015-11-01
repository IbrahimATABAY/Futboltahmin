<?php
	$tahmin = array();
	
	$ID = $_GET['ID'];

	$baglanti = mysql_connect("localhost", "pcanliV7_ftblth", "58040613Bb");

	if ( !$baglanti )
	exit("Baðlantý saðlanamadý.");

	mysql_select_db("pcanliv7_ftblth");
	
	$sorgu = mysql_query("SELECT * FROM tahmin WHERE ID = ".$ID.";");
	while($row = mysql_fetch_array( $sorgu )) 
	{
		$tahmin[0] = $row['BasDK'];
		$tahmin[1] = $row['BitDK'];
		$tahmin[2] = $row['Sonuc'];
		$tahmin[3] = $row['Sonuc_Skor'];
		$i = 4;
		$sorgu2 = mysql_query("SELECT * FROM kural WHERE T_ID = ".$row['ID'].";");
		while($row2 = mysql_fetch_array( $sorgu2 )) 
		{
			$tahmin[i] = $row['Kural'];
			i++;
			$tahmin[i] = $row['Opt'];
			i++;
			$tahmin[i] = $row['Kural_Skor'];
			i++;
		}
	}
	
	echo json_encode($arr);
   
	mysql_close();
?>