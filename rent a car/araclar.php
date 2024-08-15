<!-- 21100011006/VEYSEL/UZUN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Araçlar</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #add8e6;
        background-image: url('arabaresimleri/kar.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }

    .user-action {
    margin-left: 200px; 
    }

    .anasayfa-action{
        margin-left: 450px;
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
        margin-left: -430px;
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

    .menu-list {
    display: flex;
    justify-content: center;
    padding: 0;
    list-style: none;
}

    .header {
        text-align: center;
        margin-bottom: 20px;
        background-color: rgba(255, 255, 255, 0.2);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        margin-bottom: 5px;
        font-size: 32px;
        color: white; 
        text-shadow: 1px 1px 2px #000; 
    }

    .anasayfa-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .anasayfa-btn:hover {
        background-color: #45a049;
    }

    .arac-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        padding: 20px;
    }

    .arac {
        border: 3px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease;
        background-color: #fff;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .arac:hover {
        transform: scale(1.05);
    }

    .resim img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .bilgi {
        padding: 16px;
        border-radius: 8px;
        margin-top: 3px;
        color: black;
        background-color: #e6f7ff; 
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
    }

    .bilgi p {
        margin: 6px 0;
        font-size: 16px; 
        color: #333; 
        margin-top: 0px;
        margin-bottom: 8px;
    }

    .bilgi strong {
        color: black;
    }

    .kiralama-btn {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
        margin-top: 2px;
    }

    .kiralama-btn:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>
<div id="menu">
    <ul class="menu-list">
        <li class="anasayfa-action"><a href="anasayfa.php">Ana Sayfa</a></li>
        <li><a href="araclar.php">Araç Filomuz</a></li>
        <li><a href="yorumlar.php">Yorumlar</a></li>
    </ul>
</div>


<div class="header">
    <h1>TÜM ARABALAR</h1>
    <hr>
</div>


<?php
include 'baglanti.php';

$sql = "SELECT arac_id, marka, model, yil, fiyat, musaitlik_durumu, resim_yolu FROM tbl_araclar";
$result = mysqli_query($baglanti, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='arac-grid'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $musaitlik_durumu = $row["musaitlik_durumu"];
        $btn_style = ($musaitlik_durumu == 0) ? "background-color: #FF0000; pointer-events: none;" : "";

        echo "<div class='arac' id='arac_" . $row["arac_id"] . "'>
                <div class='resim'>
                    <img src='".$row["resim_yolu"]."' alt='Araç Resmi'>
                </div>
                <div class='bilgi'>
                    <p><strong>Marka:</strong> ".$row["marka"]."</p>
                    <p><strong>Model:</strong> ".$row["model"]."</p>
                    <p><strong>Yıl:</strong> ".$row["yil"]."</p>
                    <p><strong>Fiyat:</strong> ".$row["fiyat"]." TL</p>
                    <a href='rezervasyon.php?arac_id=" . $row["arac_id"] . "' class='kiralama-btn' style='".$btn_style."'>Kirala</a>
                </div>
              </div>";
    }
    echo "</div>";
} else {
    echo "Veritabanında herhangi bir veri bulunamadı.";
}
?>


</body>
</html>
