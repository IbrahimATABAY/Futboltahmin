<html lang="en">
<head>
	<title>Lig Filtreleme</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico">
</head>

<body style="padding: 30px;">
	<div class="well text-center">
	<h1>Lig Filtreleme</h1>
	<br>
	<table class="skortablosu table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th class="text-center">Onay</th>
					<th class="text-center">Bayrak</th>
					<th class="text-center">Ülke</th>
					<th class="text-center">Kısaltma</th>
					<th class="text-center">Lig</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-center"><input type="checkbox" value="KISAAD" checked></td>
					<td class="text-center"><img src="../img/Bayrak/Türkiye.png" style="width: 25px; height: 17px;"></td>
					<td class="text-center">Türkiye</td>
					<td class="text-center">TSS</td>
					<td class="text-center">Turkcell Super Lig</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="well text-center">
		<h1>Yeni Lig Ekle</h1>
		<br>
		<form method="post" action="">
			<div class="row text-center">
				<div class="col-xs-4">
					<input name="ulke" type="text" class="form-control" placeholder="Ülke">
				</div>
				<div class="col-xs-4">
					<input name="kisaltma" type="text" class="form-control" placeholder="Kısaltma">
				</div>
				<div class="col-xs-4">
					<input name="ligadi" type="text" class="form-control" placeholder="Lig Adı">
				</div>
			</div>
			<div class="row" style="margin-top: 20px;">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Lig Ekle+</button>
				</div>
			</div>
		</form>
	</div>
</body>