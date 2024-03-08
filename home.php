<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" type="text/css" href="home.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
        // Oturumu başlat
        session_start();

        // Eğer oturumda kullanıcı adı varsa, hoşgeldin mesajını göster
        $hoşgeldinMesajı = isset($_SESSION['isim']) ? 'Hoşgeldin ' . $_SESSION['isim'] : '';

        $surucuNo = isset($_SESSION['surucuNo']) ? $_SESSION['surucuNo'] : '';
        $odenen = isset($_SESSION['odenen']) ? $_SESSION['odenen'] : '';
        $odemeKalan = isset($_SESSION['odemeKalan']) ? $_SESSION['odemeKalan'] : '';
        $surucuAd = isset($_SESSION['surucuAd']) ? $_SESSION['surucuAd'] : '';
        $surucuSoyad = isset($_SESSION['surucuSoyad']) ? $_SESSION['surucuSoyad'] : '';
        $toplamOdeme = isset($_SESSION['toplamOdeme']) ? $_SESSION['toplamOdeme'] : '';

        $PersonelAd = isset($_SESSION['Personelad']) ? $_SESSION['Personelad'] : '';
        $Personelsoyad = isset($_SESSION['Personelsoyad']) ? $_SESSION['Personelsoyad'] : '';
        $personelNo = isset($_SESSION['personelNo']) ? $_SESSION['personelNo'] : '';
        $odenen2 = isset($_SESSION['odenen2']) ? $_SESSION['odenen2'] : '';
        $odemeKalan2 = isset($_SESSION['odemeKalan2']) ? $_SESSION['odemeKalan2'] : '';
        $toplamOdeme2 = isset($_SESSION['toplamOdeme2']) ? $_SESSION['toplamOdeme2'] : 0;
    ?>
</head>
<body>

    <div id="main-container">
        <div id="navbar">
            <div><?php echo $hoşgeldinMesajı; ?></div>
            <div class="menu-item" onclick="showContent('surucu-adayi-content')">Sürücü Adayı</div>
            <div class="menu-item" onclick="showContent('personel-bilgisi-content')">Personel Bilgisi</div>
            <div class="menu-item" onclick="showContent('muhasebe-content')">Muhasebe</div>
            <div class="menu-item" onclick="showContent('raporlama-content')">Raporlama</div>
            <div class="menu-item" onclick="showContent('hakkimda-content')">Hakkımda</div>
        </div>

        <div id="content">
                <!-- Sürücü Adayı içeriği buraya gelecek -->
                <div class="container text-center" id="surucu-adayi-content">
                    <div class="row">
                        <div class="col">
                            <!-- Sürücü Bilgileri Formu -->
                            <form method="post" action="Surucu.Php/sürücükayit.php" id="surucu-bilgileri-form">
                                <label>Sürücü Bilgileri</label>
                                <br>
                                <label for="tc">TC Kimlik No:</label>
                                <input type="text" id="tc" name="tc" required>
                                <br>
                                <label for="ad">Adı:</label>
                                <input type="text" id="ad" name="ad" required>
                                <br>
                                <label for="soyad">Soyadı:</label>
                                <input type="text" id="soyad" name="soyad" required>
                                <br>
                                <label for="babaAdi">Baba Adı:</label>
                                <input type="text" id="babaAdi" name="babaAdi" required>
                                <br>
                                <label for="anneAdi">Anne Adı:</label>
                                <input type="text" id="anneAdi" name="anneAdi" required>
                                <br>
                                <label for="dogumYeri">Doğum Yeri:</label>
                                <input type="text" id="dogumYeri" name="dogumYeri" required>
                                <br>
                                <label for="dogumTarihi">Kayıt Tarihi:</label>
                                <input type="date" id="dogumTarihi" name="dogumTarihi" required>
                                <br>
                                <label for="kanGrubu">Kan Grubu:</label>
                                <input type="text" id="kanGrubu" name="kanGrubu" required>
                                <br>
                                <label for="egitimDurumu">Eğitim Durumu:</label>
                                <input type="text" id="egitimDurumu" name="egitimDurumu" required>
                                <br>
                                <label for="ceptel">Cep Tel:</label>
                                <input type="tel" id="ceptel" name="ceptel" required>
                                <br>
                                <label for="ehliyetsınıfı">Ehliyet Sınıfı:</label>
                                <input type="text" id="ehliyetsınıfı" name="ehliyetsınıfı" required>
                                <br>
                                <label for="adres">Adres</label>
                                <input type="text" id="adres" name="adres" required>
                                <br>
                                <button type="submit">Kaydet</button>
                            </form>
                        </div>
                        <div class="col order-5">
                        <form id="surucu-bilgileri-form2" method="post" action="Surucu.Php/Ode.php">
                            <label>Ödeme Durumu</label>
                            <br>
                            <label>Sürücü No: <?php echo isset($surucuNo) ? $surucuNo : ''; ?></label>
                            <br>
                            <label>Sürücü İsim: <?php echo isset($surucuAd) ? $surucuAd : ''; ?></label>
                            <br>
                            <label>Sürücü Soyisim: <?php echo isset($surucuSoyad) ? $surucuSoyad : ''; ?></label>
                            <br>
                            <label>Toplam: <?php echo isset($toplamOdeme) ? $toplamOdeme : 0; ?> TL</label>
                            <br>
                            <label>Ödenen: <?php echo isset($odenen) ? $odenen : 0; ?> TL</label>
                            <br>
                            <label>Kalan: <?php echo isset($odemeKalan) ? $odemeKalan : 0; ?> TL</label>
                            <br>
                            <label for="ödeme">Ödencek Tutar</label>
                            <input type="text" id="ödeme" name="ödeme" placeholder="Türk Lirası" required>
                            <button type="submit">Öde</button>
                        </form>
                        </div>
                        <div class="col order-1">
                            <form id ="surucu-bilgileri-form3" method="post" action="Surucu.Php/surucu_sorgula.php">
                                <label for="sürücüad">Sürücü Adı</label>
                                <input type="text" id="sürücüad" name="sürücüad" required>
                                <br>
                                <label for="sürücüsoyad">Sürücü Soyadı:</label>
                                <input type="text" id="sürücüsoyad" name="sürücüsoyad" required>
                                <br>
                                <button type="submit">Sorgula</button>
                            </form>

                            <form method="post" action="Surucu.Php/surucu_sil.php" id="surucu-bilgileri-form3">
                                <label>Sürücü Sil</label>
                                <br>
                                <label for="sürücüad-sil">Sürücü Adı</label>
                                <input type="text" id="sürücüad" name="sürücüad" required>
                                <br>
                                <label for="sürücüsoyad-sil">Sürücü Soyadı:</label>
                                <input type="text" id="sürücüsoyad" name="sürücüsoyad" required>
                                <br>
                                <button type="submit">Sil</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="container text-center" id="personel-bilgisi-content">
                    <!-- Personel Bilgisi içeriği buraya gelecek -->
                    <div class="row">
                        <div class="col">
                            <!-- personel Bilgileri Formu -->
                            <form id="personel-bilgileri-form" action="Personel.Php/PersonelKayit.php" method="post">
                                <label>Personel Bilgileri</label>
                                <br>
                                <label for="Personelad">Adı:</label>
                                <input type="text" id="Personelad" name="Personelad" required>
                                <br>
                                <label for="Personelsoyad">Soyadı:</label>
                                <input type="text" id="Personelsoyad" name="Personelsoyad" required>
                                <br>
                                <label for="giristarih">Giriş Tarihi:</label>
                                <input type="date" id="giristarih" name="giristarih" required>
                                <br>
                                <label for="gorev">Görevi:</label>
                                <input type="text" id="gorev" name="gorev" required>
                                <br>
                                <label for="maas">Maaşı:</label>
                                <input type="text" id="maas" name="maas" required>
                                <br>
                                <button type="submit">Kaydet</button>
                            </form>
                        </div>
                        <div class="col order-5">
                            <form id="personel-bilgileri-form2" method="post" action="Personel.Php/ode.php">
                            <label>Ödeme Durumu</label>
                            <br>
                            <label>Personel No: <?php echo isset($personelNo) ? $personelNo : ''; ?></label>
                            <br>
                            <label>Personel İsim: <?php echo isset($PersonelAd) ? $PersonelAd : ''; ?></label>
                            <br>
                            <label>Personel Soyisim: <?php echo isset($Personelsoyad) ? $Personelsoyad : ''; ?></label>
                            <br>
                            <label>Toplam: <?php echo isset($toplamOdeme2) ? $toplamOdeme2 : 0; ?> TL</label>
                            <br>
                            <label>Ödenen: <?php echo isset($odenen2) ? $odenen2 : 0; ?> TL</label>
                            <br>
                            <label>Kalan: <?php echo isset($odemeKalan2) ? $odemeKalan2 : 0; ?> TL</label>
                            <br>
                            <label for="ödeme">Ödencek Tutar</label>
                            <input type="text" id="ödeme" name="ödeme" placeholder="Türk Lirası" required>
                            <button type="submit">Öde</button>
                        </form>
                        </div>
                        <div class="col order-1">
                            <form id="personel-bilgileri-form3" method="post" action="Personel.Php/personel_sorgula.php">
                                <label>Personel Sorgula</label>
                                <br>
                                <label for="Personelad">Personel Adı</label>
                                <input type="text" id="Personelad" name="Personelad" required>
                                <br>
                                <label for="Personelsoyad">Personel Soyadı:</label>
                                <input type="text" id="Personelsoyad" name="Personelsoyad" required>
                                <br>
                                <button type="submit">Sorgula</button>
                            </form>

                            <form method="post" action="Personel.Php/personel_sil.php" id="personel-bilgileri-form3">
                                <label>Personel Sil</label>
                                <br>
                                <label for="personelad-sil">Sürücü Adı</label>
                                <input type="text" id="personelad" name="personelad" required>
                                <br>
                                <label for="personelsoyad-sil">Sürücü Soyadı:</label>
                                <input type="text" id="personelsoyad" name="personelsoyad" required>
                                <br>
                                <button type="submit">Sil</button>
                            </form>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table" id="personel-tablosu">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>İşe Giriş Tarihi</th>
                                        <th>Adı</th>
                                        <th>Soyadı</th>
                                        <th>Görevi</th>
                                        <th>Maaşı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tablo içeriği buraya eklenecek -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div id="muhasebe-content">
                <div class="gelir-bilgileri">
                    <h2>Gelir Bilgileri</h2>
                    <form method="post" action="Muhasebe.Php/Gelir_Kayit.php">
                        <label for="gelirAd">Gelir Adı:</label>
                        <input type="text" id="gelirAd" name="gelirAd" required>

                        <label for="gelirMiktar">Gelir Miktar:</label>
                        <input type="number" id="gelirMiktar" name="gelirMiktar" required>

                        <label for="gelirTarih">Tarih:</label>
                        <input type="date" id="gelirTarih" name="gelirTarih" required>

                        <label for="gelirAciklama">Açıklama:</label>
                        <input type="text" id="gelirAciklama" name="gelirAciklama" required>

                        <button type="submit">Ekle</button>
                    </form>
                    <table id="gelirTablo">
                                <thead>
                                    <tr>
                                        <th>Tarih</th>
                                        <th>Gelir Adı</th>
                                        <th>Gelir Miktarı</th>
                                        <th>Açıklama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tablo içeriği buraya eklenecek -->
                                </tbody>
                            </table>
                </div>

                <div class="gider-bilgileri">
                    <h2>Gider Bilgileri</h2>
                    <form method="post" action="Muhasebe.Php/Gider_Kayit.php">
                        <label for="giderAd">Gider Ad:</label>
                        <input type="text" id="giderAd" name="giderAd" required>

                        <label for="giderMiktar">Gider Miktar:</label>
                        <input type="number" id="giderMiktar" name="giderMiktar" required>

                        <label for="giderTarih">Tarih:</label>
                        <input type="date" id="giderTarih" name="giderTarih" required>

                        <label for="giderAciklama">Açıklama:</label>
                        <input type="text" id="giderAciklama" name="giderAciklama" required>

                        <button type="submit">Ekle</button>
                    </form>
                    <table id="giderTablo">
                                <thead>
                                    <tr>
                                        <th>Tarih</th>
                                        <th>Gider Adı</th>
                                        <th>Gider Miktarı</th>
                                        <th>Açıklama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Tablo içeriği buraya eklenecek -->
                                </tbody>
                            </table>
                </div>
            </div>
            <!-- Raporlama içeriği buraya gelecek -->
            <div class="container text-center" id="raporlama-content">
                <main>
                    <div class="rapor-kutu">
                        <h2>Tarih Aralığı ile Arama</h2>
                        <form id="rapor-tarih-form">
                            <label for="tarihBaslangic">Başlangıç Tarihi:</label>
                            <input type="date" id="tarihBaslangic" name="tarihBaslangic" required>
                            <br>
                            <label for="tarihBitis">Bitiş Tarihi:</label>
                            <input type="date" id="tarihBitis" name="tarihBitis" required>
                            <br>
                            <button type="button" onclick="listeleByDate()">Listele</button>
                        </form>
                    </div>

                    <div class="rapor-kutu">
                        <h2>Yazı ile Arama</h2>
                        <form id="rapor-yazi-form">
                            <label for="yaziArama">Aday Adı veya Soyadı:</label>
                            <input type="text" id="yaziArama" name="yaziArama" required>
                            <br>
                            <button type="button" onclick="listeleByYazi()">Listele</button>
                        </form>
                    </div>

                    <div class="rapor-kutu">
                        <h2>Tüm Adayları Listele</h2>
                        <button type="button" onclick="listeleTumAdaylar()">Tüm Adayları Listele</button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TC No</th>
                                <th>Aday No</th>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>Ehliyet</th>
                                <th>Kayıt Tarihi</th>
                            </tr>
                        </thead>
                        <tbody id="raporAdayListesi">
                            <!-- Tablo içeriği buraya eklenecek -->
                        </tbody>
                    </table>
                </main>
            </div>
            <div id="hakkimda-content">
                <main>
                    <section id="genel-bilgi" style="text-align: center; font-weight: bold;">
                        <p>DMR Sürücü Kursu Otomasyonunu Tercih Ettiğiniz için Teşekkürler</p>
                        <img src="img/DMR.png" alt="DMR">
                    </section>
                </main>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function showContent(contentId) {
            // Tüm içerikleri gizle
            document.getElementById('surucu-adayi-content').style.display = 'none';
            document.getElementById('personel-bilgisi-content').style.display = 'none';
            document.getElementById('muhasebe-content').style.display = 'none';
            document.getElementById('raporlama-content').style.display = 'none';
            document.getElementById('hakkimda-content').style.display = 'none';

            // İstenen içeriği göster
            document.getElementById(contentId).style.display = 'block';

        }

        $(document).ready(function() {
            // Sayfa yüklendiğinde verileri çek
            $.ajax({
                url: 'Personel.Php/verilerigetir.php', // Verileri çekecek PHP dosyanızın adını ve yolunu belirtin
                type: 'GET',
                success: function(data) {
                    $('#personel-tablosu tbody').html(data);
                }
            });
        });

        $(document).ready(function() {
            // Sayfa yüklendiğinde verileri çek
            $.ajax({
                url: 'Muhasebe.Php/gelirverilerigetir.php', // Verileri çekecek PHP dosyanızın adını ve yolunu belirtin
                type: 'GET',
                success: function(data) {
                    $('#gelirTablo tbody').html(data);
                }
            });
        });

        $(document).ready(function() {
            // Sayfa yüklendiğinde verileri çek
            $.ajax({
                url: 'Muhasebe.Php/giderverilerigetir.php', // Verileri çekecek PHP dosyanızın adını ve yolunu belirtin
                type: 'GET',
                success: function(data) {
                    $('#giderTablo tbody').html(data);
                }
            });
        });

        function listeleByDate() {
            var baslangicTarihi = document.getElementById("tarihBaslangic").value;
            var bitisTarihi = document.getElementById("tarihBitis").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("raporAdayListesi").innerHTML = xhr.responseText;
                }
            };

            xhr.open("GET", "Raporlama.Php/listeleByDate.php?baslangicTarihi=" + baslangicTarihi + "&bitisTarihi=" + bitisTarihi, true);
            xhr.send();
        }

        function listeleByYazi() {
            var adSoyad = document.getElementById("yaziArama").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("raporAdayListesi").innerHTML = xhr.responseText;
                }
            };

            xhr.open("GET", "Raporlama.Php/listeleByYazi.php?adSoyad=" + adSoyad, true);
            xhr.send();
        }

        function listeleTumAdaylar() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("raporAdayListesi").innerHTML = xhr.responseText;
                }
            };

            xhr.open("GET", "Raporlama.Php/listeleTumAdaylar.php", true);
            xhr.send();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
