<!-- 21100011006/VEYSEL/UZUN -->
<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Araç Kiralama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
           
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; 
            background-image: url('arabaresimleri/kar.jpg'); 
            background-size: cover; 
            background-attachment: fixed; 
            background-repeat: no-repeat;
        }

        .user-action {
            margin-left: 200px; 
        }

        .anasayfa-action{
            margin-left: 456px;
        }

        #menu {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        #menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #menu ul li {
            display: inline;
            margin-right: 20px;
        }

        #menu ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #menu ul li a:hover {
            background-color: #555; 
        }

        #user-section {
            background-color: #444;
            color: #fff;
            padding: 20px;
            text-align: right;
        }

        #user-section a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #user-section a:hover {
            background-color: #555;
        }

        #main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #00aaff; 
            margin-left: 630px;
            font-size: 28px; 
            text-shadow: 1px 1px 2px #000; 
        }

        hr {
            border: none; 
            border-top: 1px solid #000; 
            margin: 5px 0; 
            width: 90%; 
            margin-left: 75px;
        }

        .car-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            justify-items: center; 
            justify-content: center; 
            margin: 50px auto; 
        }

        .car {
            width: 300px; 
            height: 240px; 
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
            transition: transform 0.3s ease; 
        }

        .car img {
            width: 100%;
            height: 90%; 
            object-fit: cover; 
            border-radius: 5px;
            margin-bottom: 10px; 
        }

        .car p {
            margin: 3px 0; 
            font-weight: bold;
            color: #fff; 
            font-size: 18px; 
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8); 
        }

        .car:hover {
            transform: scale(1.05); 
        }

        @keyframes colorCycle {
            0% { color: red; }
            15% { color: orange; }
            30% { color: yellow; }
            45% { color: green; }
            60% { color: blue; }
            75% { color: indigo; }
            90% { color: violet; }
        }
        
        #hosgeldiniz-yazi {
            animation: colorCycle 6s linear infinite;
        }

    </style>
</head>
<body>
    <?php
        if (isset($_POST['araclar'])) 
        {
            if ($_SESSION['giris_yapildi'] == true)
            {
                header("Location: araclar.php");
                exit;
            }
            else
            {
                header("Location: giris.php");
                exit;
            }
        }
    ?>
    <div id="menu">
    <ul>
        <li class="anasayfa-action"><a>Ana Sayfa</a></li>
        <?php
            if (($_SESSION['giris_yapildi']) == true) {
                // Kullanıcı giriş yapmışsa araclar.php'ye yönlendir
                echo '<li><a href="araclar.php">Araç Filomuz</a></li>';
            } else {
                // Kullanıcı giriş yapmamışsa giris.php'ye yönlendir
                echo '<li><a href="#" onclick="alert(\'Lütfen önce giriş yapın!\'); window.location.href = \'giris.php\';">Araç Filomuz</a></li>';
            }
        ?>
        <li><a href="yorumlar.php">Yorumlar</a></li>
        <li><a href="sorular.php">Sıkça Sorulan Sorular</a></li>
        <?php if ($_SESSION['giris_yapildi'] == true) { ?>
            <li style="margin-left: 140px;" class="hosgeldiniz-action"><a id="hosgeldiniz-yazi">HOŞ GELDİNİZ</a></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        <?php } else { ?>
            <li class="user-action"><a href="giris.php">Giriş Yap</a></li>
            <li><a href="kayit.php">Kayıt Ol</a></li>
        <?php } ?>
    </ul>
</div>

   
<div id="main-content">
    <h1 style="text-align: center; margin-top: 40px; margin-bottom: 2px; color: white; margin-left: 630px; font-size: 32px; text-shadow: 1px 1px 2px #000;">POPÜLER ARAÇLAR</h1>
    <hr style="border: none; border-top: 1px solid white; margin: 5px 0; width: 90%; margin-left: 75px;">
        <div class="car-grid">
            <div class="car">
                <img src="arabaresimleri/bmwx5.jpg" alt="Araç 1">
                <p>BMW-X5</p>
            </div>
            <div class="car">
                <img src="arabaresimleri/audiq5.jpg" alt="Araç 2">
                <p>AUDİ-Q5</p>
            </div>
            <div class="car">
                <img src="arabaresimleri/chevrolet-camaro-1.jpg" alt="Araç 3">
                <p>CHEVROLET-CAMARO</p>
            </div>
            <div class="car">
                <img src="arabaresimleri/fordfocus.jpg" alt="Araç 4">
                <p>FORD-FOCUS</p>
            </div>
            <div class="car">
                <img src="arabaresimleri/teslamodel3.jpg" alt="Araç 5">
                <p>TESLA-MODEL3</p>
            </div>
            <div class="car">
                <img src="arabaresimleri/toyotacorolla.jpg" alt="Araç 6">
                <p>TOYOTA-COROLLA</p>
            </div>
        </div>
</div>
    <table style="margin: 0 auto; width: 80%; border-collapse: collapse; border: 2px solid white; margin-bottom: 30px; background-color: rgba(0, 0, 0, 0.5);">
        <tr>
            <td style="padding: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left; padding-bottom: 20px;">
                            <h2 style="margin-bottom: 15px; color: #00aaff; margin-left: 20px; font-weight: 1000;">Araç Kiralarken Nelere Dikkat Etmeliyim?</h2>
                            <p style="margin-left: 25px; line-height: 1.6; color: white;">Bir araç kiralarken dikkate alınması gereken birkaç önemli nokta şunlar olabilir:</p>
                            <ul style="text-align: left; margin-left: 40px; padding-left: 0;">
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Farklı rent a car firmalarının araç alternatiflerini detaylıca karşılaştırıp inceleyin.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">İhtiyacınıza uygun özellikteki araçlar arasından seçim yapın. Örneğin eğer çok sayıda valiziniz varsa kiralayacağınız aracın bagaj hacminin geniş olmasına dikkat edin.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Kiraladığınız aracı teslim alacağınız ve teslim edeceğiniz yerin adresini kontrol edin.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Aracı, teslim aldığınız yerden farklı bir lokasyonda teslim etme alternatifini değerlendirebilirsiniz.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Bazı firmalar kiralayacağınız aracı adresinize teslim edebiliyor.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Araç kiralamak için ehliyetinizi aldığınız tarihin üzerinden en az 2 yıl geçmesi gerektiğini unutmayın.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Kiralayacağınız araç için gerekli şartları sağladığınızdan emin olun.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Araç kiralarken kullanım koşullarını dikkatli bir şekilde okuyun.</li>
                                <li style="margin-bottom: 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Aracınızı teslim alırken sigorta ve sözleşmeyi dikkatli inceleyin ve aracı teslim almadan önce aracın dışını ve içini kontrol edin.</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div id="iletisim" style="text-align: center; margin-top: 50px;">
    <h2 style="color: #00aaff; margin-bottom: 15px; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 5px; margin: 0 auto; width: 1275px; font-weight: bold; font-size: 24px; text-shadow: 1px 1px 2px #000;">İLETİŞİM BİLGİLERİ</h2>
    <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
        <div style="text-align: left; width: 40%; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 5px; margin: 10px;">
            <img src="arabaresimleri/telefon.jpg" alt="Telefon" style="width: 30px; height: 30px; margin-bottom: 10px; float: left; margin-right: 10px;">
            <strong style="color: white; text-transform: uppercase; display: block; margin-bottom: 10px;">Telefon:</strong>
            <p style="color: white; margin-bottom: 10px;">0538 262 37 68</p>
        </div>
        <div style="text-align: left; width: 40%; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 5px; margin: 10px;">
            <img src="arabaresimleri/mail.jpg" alt="E-posta" style="width: 30px; height: 30px; margin-bottom: 10px; float: left; margin-right: 10px;">
            <strong style="color: white; text-transform: uppercase; display: block; margin-bottom: 10px;">E-posta:</strong>
            <p style="color: white; margin-bottom: 10px;">veyseluznn@gmail.com</p>
        </div>
        <div style="text-align: left; width: 40%; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 5px; margin: 10px;">
            <img src="arabaresimleri/adres.jpg" alt="Adres" style="width: 30px; height: 30px; margin-bottom: 10px; float: left; margin-right: 10px;">
            <strong style="color: white; text-transform: uppercase; display: block; margin-bottom: 10px;">Adres:</strong>
            <p style="color: white; margin-bottom: 10px;">Örnek evler Mahallesi İstasyon Caddesi No:73/A Kocasinan Kayseri</p>
        </div>
        <div style="text-align: left; width: 40%; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 5px; margin: 10px;">
            <img src="arabaresimleri/web.jpg" alt="Çalışma Saatleri" style="width: 30px; height: 30px; margin-bottom: 10px; float: left; margin-right: 10px;">
            <strong style="color: white; text-transform: uppercase; display: block; margin-bottom: 10px;">Çalışma Saatleri:</strong>
            <p style="color: white; margin-bottom: 10px;">7/24 Online Araç Kiralama</p>
        </div>
    </div>
</div>



</body>
</html>