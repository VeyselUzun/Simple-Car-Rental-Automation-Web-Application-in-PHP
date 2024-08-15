<!-- 21100011006/VEYSEL/UZUN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

        body{
            background-image: url('arabaresimleri/kar.jpg'); 
            background-size: cover; 
            background-attachment: fixed; 
            background-repeat: no-repeat;
        }

        h1 {
            text-align: center;
            margin-bottom: 35px;
            margin-top: 15px;
            color: white;
        }

        h1:after {
            content: '';
            display: block;
            width: 1290px;
            height: 2px;
            background-color: white;
            margin: 20px auto;
        }

        .accordion-button {
            background-color: rgb(191, 225, 255);
            color: #333;
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

    </style>
</head>
<body>

    <div id="menu">
        <ul>
            <li class="anasayfa-action"><a href="anasayfa.php">Ana Sayfa</a></li>
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
        </ul>
    </div>

    <div class="container">
        <h1 style="text-align: center;">Sıkça Sorulan Sorular</h1>

    <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Günlük veya aylık araç kiralanabilir mi?
        </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Elbette, ihtiyacınız olan süreye göre araç kiralayabilirsiniz. Günlük veya aylık araç rezervasyonlarınızı dilerseniz www.renticar.com sitemizden veya 0538 262 37 68 numarasını arayarak yapabilirsiniz.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Kiralama hizmetini hangi marka ve model araçlarda sunmaktasınız?
        </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Tercih ettiğiniz segmentler için çeşitli marka ve modellerde araçlar, kiralama hizmetini sunan anlaşmalı firmalarımızda bulunmaktadır.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Kiralama yaşı ve sürücü belgesi şartları nelerdir?
        </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Koşullar araç kiralama firmalarına göre farklılık göstermekle beraber genel uygulamada 21 yaş ve minimum 1 yıllık B grubu sürücü belgesi sahibi olma koşulu aranmaktadır.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Kimler araç kiralayabilir?
        </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Araç kiralamak için sürücü belgesi sahibi olmak ve aracı sağlayan kiralama firmasının belirlediği minimum sürücü belgesine sahip olma süresine uymak yeterlidir. Bu süre, aracınızı kiralayacağınız firmanın belirlediği koşullara göre değişiklik gösterebilmektedir.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            Kiralanan araçla yurt dışına çıkılır mı?
        </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Kiralanan araçların yurt dışında kullanımı yasaktır.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
            Aracın kiralama süresi nasıl uzatılır?
        </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Araç kiralama süresini uzatma talebinin onaylanması, araç kiralama firmasındaki uygunluk durumuna göre değişkenlik göstermektedir. Uzatma talebi için 0850 308 0 308 numaralı RentiCar İletişim Merkezi ile irtibata geçilmelidir.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
            Araç tesliminde bulunması gereken belgeler nelerdir?
        </button>
        </h2>
        <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Aracı teslim alırken sürücü belgesi, sürücüye ait kredi kartı, kimlik ve Rezervasyon Bilgi Formu'nun yanınızda olması gerekmektedir.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
            Aracı iade ederken nelere dikkat etmeli?
        </button>
        </h2>
        <div id="flush-collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Aracı iade etmeye giderken, yanınızda ruhsat, anahtar, teslim formu gibi araç tesliminde alınan tüm evrak ve eşyalar bulunmalıdır. Araç başında ilgili firma yetkilisi ile beraber gerekli kontroller sağlandıktan sonra Araç iade Formu mutlaka doldurulmalıdır.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
            Kiralanan aracın iade gününde teslim edilememesi halinde ne yapılmalıdır?
        </button>
        </h2>
        <div id="flush-collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Kiralama sözleşmesi gereği aracın taahhüt edilen zamanda teslim edimesi zorunludur. Herhangi bir sebepten dolayı aracın teslim tarihi gecikmiş ise, hiç vakit kaybetmeden araç kiralama firması ile iletişime geçilmelidir.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
            Aracın rutin bakım ücretleri kime aittir?
        </button>
        </h2>
        <div id="flush-collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Aracın rutin bakım ücretleri araç kiralama firması tarafından karşılanmaktadır.</div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>