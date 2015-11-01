<!DOCTYPE html>

<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico">
</head>
<body>
	<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Admin Paneli</h1>
		  <p id="uyari" class="text-center aktif-mac">
		  <?php
			if($_POST)
			{
				$nick = $_POST['nick'];
				$sifre = $_POST['sifre'];
	
				if(!empty($_POST['nick']) && !empty($_POST['sifre']))
				{
					echo "Giriş Yapılıyor...";
					if($nick == 'admin' && $sifre == 'admin')
					{
						echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=kurallar.php">';
					}
					else
					{
						echo "<br>Giriş Başarısız...";
					}
				}
				else
				{
					echo "Lütfen Bilgileri Kontrol Edip Tekrar Deneyiniz.";
				}
			}
		?>
		</p>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="index.php">
            <div class="form-group">
              <input name="nick" type="text" class="form-control input-lg" placeholder="Kullanıcı Adı">
            </div>
            <div class="form-group">
              <input name="sifre" type="password" class="form-control input-lg" placeholder="Şifre">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Giriş</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <a href="../"><button class="btn" data-dismiss="modal" aria-hidden="true">İptal</button></a>
		  </div>	
      </div>
  </div>
  </div>
</div>
</body>
</html>