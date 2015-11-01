<!DOCTYPE html>
<html lang="en">
<head>
	<title>Futbol Tahmin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#">Futbol Tahmin</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<!--<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Üye Ol</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
				</ul>-->
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Anasayfa</a></li>      
					<li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Hakkımızda</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> İletişim</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<script>
		var myVar = setInterval(uygula, 5000);
		function uygula() 
		{
			metin = 'naber kanka';
			$.get('ajax.php', {yazi: metin}, 
			function (gelen_cevap) 
			{
				$('.skortablosu').html(gelen_cevap);
			});
		}
	</script>

	<div class="container">
		<table class="skortablosu table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th class="text-center">Lig</th>
					<th class="text-center">Maç Durumu</th>
					<th class="text-right">Ev Sahibi</th>
					<th class="text-center">Skor</th>
					<th class="text-left">Rakip</th>
					<th class="text-left">Tahmin Zamanı</th>
					<th class="text-left">Tahmin</th>
					<th class="text-left">Tahmin Durumu</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$url = 'http://www.canliskor.com.tr/api/soccer/livescore/dataquery?date='.date('Y-m-d');
				$content = file_get_contents($url);
				$json = json_decode($content, true);

				foreach($json as $item) 
				{
					if($item['IsPlaying'] == 'true')
					{
						$dakika = '"';
						$aktif = "aktif-mac";
					}
					else
					{
						$dakika = '';
						$aktif = "";
					}
					
					echo '<tr>';
						//Lig Adı
						if(isset($item['Tournament']['ShortName']))
							echo '<td class="text-left '.$aktif.' bilgili" title="'.$item['Tournament']['Name'].'"><img src="img/Bayrak/'.$item['Tournament']['Country']['Name'].'.png" style="width: 25px; height: 17px;">&nbsp;'.$item['Tournament']['ShortName'].'</td>';
						else
							echo '<td class="text-left '.$aktif.' bilgili" title="'.$item['Tournament']['Name'].'"><img src="img/Bayrak/'.$item['Tournament']['Country']['Name'].'.png" style="width: 25px; height: 17px;">&nbsp;'.$item['Tournament']['Name'].'</td>';
						//Dakika veya Kısa Durum Bilgisi
						echo '<td class="text-center '.$aktif.'">'.$item['MinuteOrShortStatus'].$dakika.'</td>';
						//Ev Sahibi Takım
						if($item['HasHomeTeamRedCard'] == "true")
							echo '<td class="text-right '.$aktif.'"><b style="background-color: red; color: white;">&nbsp;'.$item['HomeTeamRedCard'].'&nbsp;</b>&nbsp;'.$item['HomeTeam']['ShortName'].'</td>';
						else
							echo '<td class="text-right '.$aktif.'">'.$item['HomeTeam']['ShortName'].'</td>';
						//Skor	
						if(isset($item['CurrentHomeTeamScore']))
							echo '<td class="text-center '.$aktif.'">'.$item['CurrentHomeTeamScore'].'-'.$item['CurrentAwayTeamScore'].'</td>';
						else
							echo '<td class="text-center '.$aktif.'">-</td>';
						//Rakip Takım
						if($item['HasAwayTeamRedCard'] == "true")
							echo '<td class="text-left '.$aktif.'">'.$item['AwayTeam']['ShortName'].'&nbsp;<b style="background-color: red; color: white;">&nbsp;'.$item['AwayTeamRedCard'].'&nbsp;</b></td>';
						else
							echo '<td class="text-left '.$aktif.'">'.$item['AwayTeam']['ShortName'].'</td>';
						//Tahmin Zamanı
						echo '<td class="text-left '.$aktif.'"></td>';
						//Tahmin
						echo '<td class="text-left '.$aktif.'"></td>';
						//Tahmin Durumu
						echo '<td class="text-left '.$aktif.'"></td>';
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text pull-left">
			Tüm hakları saklıdır &copy 2015 - <i style="color: #337ab7; font-size: 9px;">bu sitede bahis oynanmaz, lisanssız bahis sitelerine aracılık yapılmaz
				Sitedeki tüm bahis sitesi reklamları Türkiye dışında yaşayan ziyaretçiler içindir.</i> 
			</p>
		</div>
	</div>
</body>

</html>