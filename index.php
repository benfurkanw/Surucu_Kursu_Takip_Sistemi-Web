<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css?v=<?php echo time(); ?>">
    <title>Giriş Paneli</title>
</head>
<body>
<div class="header">
    <h1>DMR Sürücü Kursu Otomasyonu</h1>
</div>
<div class="panel-container" id="kayitPanel">
    <h2>Kayıt Ol</h2>
    <form method="post" action="GirisKayit.Php/kayit.php">
        <label for="isim">İsiminiz: </label>
        <input type="text" id="isim" name="isim" required>
        <br>
        <br>
        <label for="soyad">Soyadınız: </label>
        <input type="text" id="soyad" name="soyad" required>
        <br>
        <br>
        <label for="mail">Mail adresiniz: </label>
        <input type="email" id="mail" name="mail" required>
        <br>
        <br>
        <label for="kullaniciAdi">Kullanıcı Adınız: </label>
        <input type="text" id="kullaniciAdi" name="kullaniciAdi" required>
        <br>
        <br>
        <label for="sifre">Şifreniz: </label>
        <input type="password" id="sifre" name="sifre" required>
        <br>
        <br>
        <button type="submit">Kayıt Ol</button>
    </form>
</div>


<div class="panel-container" id="girisPanel">
    <h2>Giriş Yap</h2>
    <form method="post" action="GirisKayit.Php/giris.php">
        <label for="girisKullaniciAdi">Kullanıcı Adı:</label>
        <input type="text" id="girisKullaniciAdi" name="girisKullaniciAdi" required>
        <br>
        <br>
        <label for="girisSifre">Şifre:</label>
        <input type="password" id="girisSifre" name="girisSifre" required>
        <br>
        <br>
        <button type="submit">Giriş Yap</button>
    </form>
</div>


<button id="kayitOlButton" class="custom-button">Kayıt Ol</button>
<button id="girisYapButton" class="custom-button">Giriş Yap</button>

<script src="index.js"></script>
</body>
</html>
