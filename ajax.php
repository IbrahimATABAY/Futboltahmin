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