<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kural Ekleme</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico">
</head>

<body style="padding: 30px;">
	<div class="well">
		<h1 class="text-center"> KURAL GİRİŞİ </h1>
		<form method="post" action="kuralekle.php">
			<hr>
			<h3>Dakika :</h3>
			<div class="row text-center">
				<div class="col-xs-4">
					<input name="Bas_DK" type="number" class="form-control" placeholder="Başlangıç Dakikası">
				</div>
				<div class="col-xs-4">
					<b style="font-size: 25px;"> ≤ &nbsp;&nbsp;&nbsp; T &nbsp;&nbsp;&nbsp; ≤  </b>
				</div>
				<div class="col-xs-4">
					<input name="Bit_DK" type="number" class="form-control" placeholder="Bitiş Dakikası">
				</div>
			</div>
			
			<hr>
			<h3>Kurallar :</h3>
			<div id="kurallar">
			<div class="row text-center">
				<div class="col-xs-5">
					<select name="Kural[]" class="form-control">
						<option value="BYETG">BYETG ( Birinci Yarı Ev Sahibi Toplam Gol )</option>
						<option value="BYEKK">BYEKK ( Birinci Yarı Ev Sahibi Kırmızı Kart )</option>
						<option value="BYRTG">BYRTG ( Birinci Yarı Rakip Takım Toplam Gol )</option>
						<option value="BYRKK">BYRKK ( Birinci Yarı Rakip Takım Kırmızı Kart )</option>
						<option value="BYTG">BYTG  ( Birinci Yarı Toplam Gol )</option>
						<option value="BYKK">BYKK  ( Birinci Yarı Kırmızı Kart )</option>
						<option value="IYETG">İYETG ( İkinci Yarı Ev Sahibi Toplam Gol )</option>
						<option value="IYEKK">İYEKK ( İkinci Yarı Ev Sahibi Kırmızı Kart )</option>
						<option value="IYRTG">İYRTG ( İkinci Yarı Rakip Takım Toplam Gol )</option>
						<option value="IYRKK">İYRKK ( İkinci Yarı Rakip Takım Kırmızı Kart )</option>
						<option value="IYTG">İYTG  ( İkinci Yarı Toplam Gol )</option>
						<option value="IYKK">İYKK  ( İkinci Yarı Kırmızı Kart )</option>
						<option value="MSETG">MSETG ( Maç Sonucu Ev Sahibi Toplam Gol )</option>
						<option value="MSEKK">MSEKK ( Maç Sonucu Ev Sahibi Kırmızı Kart )</option>
						<option value="MSRTG">MSRTG ( Maç Sonucu Rakip Takım Toplam Gol )</option>
						<option value="MSRKK">MSRKK ( Maç Sonucu Rakip Takım Kırmızı Kart )</option>
						<option value="MSTG">MSTG  ( Maç Sonucu Toplam Gol )</option>
						<option value="MSKK">MSKK  ( Maç Sonucu Kırmızı Kart )</option>
					</select>
				</div>
				<div class="col-xs-2">
					<select Name="Opt[]" class="form-control">
						<option value="<"><</option>
						<option value=">">></option>
						<option value="==">==</option>
						<option value="<="><=</option>
						<option value=">=">>=</option>
						<option value=">=">!=</option>
					</select>
				</div>
				<div class="col-xs-5">
					<input Name="Kural_Skor[]" type="number" class="form-control" placeholder="Skor" step="0.5">
				</div>
			</div>
			</div>
			
			<div class="row" style="margin-top: 20px;">
				<div class="col-xs-12">
					<button type="button" class="btn btn-success btn-xs btn-block" onclick="myFunction()">Yeni +</button>
				</div>
			</div>
			
			<hr>
			<h3>Sonuç : </h3>
			<div class="row">
				<div class="col-xs-6">
					<select name="Sonuc" class="form-control">
						<option value="by">BY ( Birinci Yarı )</option>
						<option value="iy">İY ( İkinci Yarı )</option>
						<option value="by+">BY+ ( Birinci Yarı + )</option>
						<option value="iy+">İY+ (İkinci Yarı + )</option>
					</select>
				</div>
				<div class="col-xs-5">
					<input name="Sonuc_Skor" type="number" class="form-control" placeholder="Skor" step="0.5">
				</div>
				<div class="col-xs-1">
					<b style="font-size: 25px;">Ü</b>
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Yeni Kuralı Ekle</button>
				</div>
			</div>
		</form>
	</div>
	
	<div class="well text-center">
		<form method="post" action="kuraldurum.php">
			<table class="skortablosu table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th id="bosluk" class="text-center">No</th>
						<th class="text-center">Zaman(T)</th>
						<th class="text-center">Kural</th>
						<th class="text-center">Tahmin</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$true = "";
					$baglanti = mysql_connect("localhost", "pcanliV7_ftblth", "58040613Bb");
					if ( !$baglanti ) exit("Bağlantı sağlanamadı.");
					mysql_select_db("pcanliv7_ftblth");
					
					$sorgu = mysql_query("SELECT * FROM tahmin;");
					while($row = mysql_fetch_array( $sorgu )) 
					{
						if($row["Durum"] == 1)
							$true = "checked";
						else
							$true = "";
						echo "<tr>";
						echo "<td class='text-left'><input name='durumlar[]' type='checkbox' value='".$row["ID"]."' ".$true."</td>";
						echo "<td class='text-center'>".$row["BasDK"]." ≤ T ≤ ".$row["BitDK"]."</td>";
						
						$sorgu1 = mysql_query("SELECT * FROM kural WHERE T_ID = ".$row["ID"].";");
						echo "<td class='text-center'>";
						$i = 0;
						while($satir = mysql_fetch_array( $sorgu1 )) 
						{
							$i++;
							if($i > 1)
								echo "<b> ʌ </b>";
							echo "<b>( </b>".$satir["Kural"]." ".$satir["Opt"]." ".$satir["Kural_Skor"]."<b> )</b>";
						}
						echo "</td>";
						
						echo "<td class='text-center'>".$row["Sonuc"]." ".$row["Sonuc_Skor"]."<b> Ü </b></td>";
						echo "<tr>";
					}
					mysql_close();
				?>
				</tbody>
			</table>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Kaydet</button>
		</form>
	</div>
	
	<script>
		var i = parseInt("0");
		function myFunction()
		{ 
			i++;
			
			var satir_div = document.createElement("div");
			satir_div.className = "row text-center";
			satir_div.id = "";
			
			//ilk satır
			var sutun1 = document.createElement("div");
			sutun1.className = "col-xs-5"
			var kuralselect = document.createElement("select");
			kuralselect.className = "form-control";
			kuralselect.name = "Kural[]";
			var array1 = ["BYETG","BYEKK","BYRTG","BYRKK","BYTG","BYKK","IYETG","IYEKK","IYRTG","IYRKK","IYTG","IYKK","MSETG","MSEKK","MSRTG","MSRKK","MSTG","MSKK"];
			var array2 = 
			[
			"BYETG ( Birinci Yarı Ev Sahibi Toplam Gol )",
			"BYEKK ( Birinci Yarı Ev Sahibi Kırmızı Kart )",
			"BYRTG ( Birinci Yarı Rakip Takım Toplam Gol )",
			"BYRKK ( Birinci Yarı Rakip Takım Kırmızı Kart )",
			"BYTG  ( Birinci Yarı Toplam Gol )",
			"BYKK  ( Birinci Yarı Kırmızı Kart )",
			"İYETG ( İkinci Yarı Ev Sahibi Toplam Gol )",
			"İYEKK ( İkinci Yarı Ev Sahibi Kırmızı Kart )",
			"İYRTG ( İkinci Yarı Rakip Takım Toplam Gol )",
			"İYRKK ( İkinci Yarı Rakip Takım Kırmızı Kart )",
			"İYTG  ( İkinci Yarı Toplam Gol )",
			"İYKK  ( İkinci Yarı Kırmızı Kart )",
			"MSETG ( Maç Sonucu Ev Sahibi Toplam Gol )",
			"MSEKK ( Maç Sonucu Ev Sahibi Kırmızı Kart )",
			"MSRTG ( Maç Sonucu Rakip Takım Toplam Gol )",
			"MSRKK ( Maç Sonucu Rakip Takım Kırmızı Kart )",
			"MSTG  ( Maç Sonucu Toplam Gol )",
			"MSKK  ( Maç Sonucu Kırmızı Kart )"
			];
			for (var i = 0; i < array1.length; i++) {
				var option = document.createElement("option");
				option.value = array1[i];
				option.text = array2[i];
				kuralselect.appendChild(option);
			}
			sutun1.appendChild(kuralselect);
			satir_div.appendChild(sutun1);
			//ikinci satır
			var sutun2 = document.createElement("div");
			sutun2.className = "col-xs-2"
			var optselect = document.createElement("select");
			optselect.className = "form-control";
			optselect.name = "Opt[]";
			var array3 = ["<",">","==","<=",">=","!="];
			for (var i = 0; i < array3.length; i++) {
				var option1 = document.createElement("option");
				option1.value = array3[i];
				option1.text = array3[i];
				optselect.appendChild(option1);
			}
			sutun2.appendChild(optselect);
			satir_div.appendChild(sutun2);
			//üçüncü satır
			var sutun3 = document.createElement("div");
			sutun3.className = "col-xs-5"
			var input = document.createElement("input");
			input.type="number";
			input.className="form-control";
			input.step="0.5";
			input.placeholder="Skor";
			input.name = "Kural_Skor[]";
			
			sutun3.appendChild(input);
			satir_div.appendChild(sutun3);
			
			satir_div.style.marginTop = "20px";

			var element = document.getElementById("kurallar");
			element.appendChild(satir_div);
		}
	</script>
</body>

</html>