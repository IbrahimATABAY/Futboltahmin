
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="#">Futbol Tahmini</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Üye Ol</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Anasayfa</a></li>      
        <li><a href="#">Hakkımızda</a></li>
        <li><a href="#">İletişim</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="cevap"></div>
<input type="text" name="metin" /><br/>
<input type="button" value="Gönder" onclick="uygula()" />
<script>
function uygula() {
   metin = $('input[name="metin"]').val();
   $.get('ajax.php', {yazi: metin}, function (gelen_cevap) {
      $('.cevap').html(gelen_cevap);
   });
}
</script>

<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th class="text-center">Ülke</th>
        <th class="text-center">Lig</th>
        <th class="text-center">Durum</th>
        <th class="text-right">Ev Sahibi</th>
        <th class="text-center">Skor</th>
        <th class="text-left">Rakip</th>
        <th class="text-left">İY Tahmini</th>
        <th class="text-center">MS Tahmini</th>
        <th class="text-left">Sonuc</th>
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
				echo '<tr>';
				echo '  <td class="text-center aktif-mac">'.$item['Tournament']['ShortName'].'</td>';
				echo '  <td class="text-center aktif-mac">'.$item['MinuteOrShortStatus'].'"</td>';
				echo '  <td class="text-right aktif-mac">'.$item['HomeTeam']['ShortName'].'</td>';
				if(isset($item['CurrentHomeTeamScore']))
					echo '  <td class="text-center aktif-mac">'.$item['CurrentHomeTeamScore'].'-'.$item['CurrentAwayTeamScore'].'</td>';
				else
					echo '  <td class="text-center aktif-mac"></td>';
				echo '  <td class="text-left aktif-mac">'.$item['AwayTeam']['ShortName'].'</td>';
				echo '  <td class="text-left aktif-mac"></td>';
				echo '  <td class="text-left aktif-mac"></td>';
				echo '</tr>';
			}
			else
			{
				echo '<tr>';
				echo '  <td class="text-center">'.$item['Tournament']['ShortName'].'</td>';
				echo '  <td class="text-center">'.$item['MinuteOrShortStatus'].'</td>';
				echo '  <td class="text-right">'.$item['HomeTeam']['ShortName'].'</td>';
				if(isset($item['CurrentHomeTeamScore']))
					echo '  <td class="text-center">'.$item['CurrentHomeTeamScore'].'-'.$item['CurrentAwayTeamScore'].'</td>';
				else
					echo '  <td class="text-center"></td>';
				echo '  <td class="text-left">'.$item['AwayTeam']['ShortName'].'</td>';
				echo '  <td class="text-left"></td>';
				echo '  <td class="text-left"></td>';
				echo '</tr>';
			}
			
		}
	  ?>
    </tbody>
  </table>
</div>


<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
		<p class="navbar-text pull-left">Tüm hakları saklıdır &copy 2015</p>
	</div>
</div>
  


</body>
</html>
