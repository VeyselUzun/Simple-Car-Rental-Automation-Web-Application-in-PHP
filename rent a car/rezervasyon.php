<!-- 21100011006/VEYSEL/UZUN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rezervasyon</title>
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

        .kiralanma-yazi {
            color: white; 
            font-size: 25px;
            margin-bottom: 5px;
            animation: yanipSonen 2s ease-in-out infinite;
        }

        @keyframes yanipSonen {
            0% { opacity: 0; } 
            50% { opacity: 1; } 
            100% { opacity: 0; } 
        }

        .arac-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .arac {
            border: 3px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
            background-color: #fff;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            max-width: 275px; 
            margin: 20px auto; 
            position: relative;
        }

        .arac:hover {
            transform: scale(1.05);
        }

        .resim img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px; 
            margin-bottom: 2px;
            transition: transform 0.3s ease;
        }

        .bilgi {
            padding: 10px;
            border-radius: 8px;
            margin-top: 8px;
            color: black;
            background-color: #e6f7ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
        }

        .bilgi p {
            margin: 5px 0;
            font-size: 16px; 
            color: #333; 
        }

        .bilgi strong {
            color: black;
        }

        .form-container {
            width: 100%; 
            margin-top: 20px;
        }

        .user-action {
            margin-left: 150px;        
    }

    .anasayfa-action{
        margin-left: 20px;
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

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label,
        input[type="date"],
        input[type="submit"] {
            display: block;
            margin-bottom: 15px;
        }

        input[type="date"],
        input[type="submit"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div id="menu">
    <ul>
        <li class="anasayfa-action"><a href="anasayfa.php">Ana Sayfa</a></li>
        <li><a href="araclar.php">Araçlar</a></li>
        <li><a href="yorumlar.php">Yorumlar</a></li>
    </ul>
</div>
<?php
    include 'baglanti.php';

$musteri_id = $_SESSION['musteri_id']; 

if(isset($_POST["rezervasyon"])) {
    $teslimAlmaTarihi = $_POST["teslimAlmaTarihi"];
    $teslimEtmeTarihi = $_POST["teslimEtmeTarihi"];

    $arac_id = $_GET['arac_id'];

    $query = "INSERT INTO rezervasyonlar (arac_id, musteri_id, teslim_alma_tarihi, teslim_etme_tarihi) VALUES ('$arac_id', '$musteri_id', '$teslimAlmaTarihi', '$teslimEtmeTarihi')";

    

    echo '<script>alert("Araç başarılı bir şekilde kiralandı"); window.location.href = "anasayfa.php";</script>';
}


    $arac_id = $_GET['arac_id'];

    $update_query = "UPDATE tbl_araclar SET musaitlik_durumu = 0 WHERE arac_id = $arac_id";
    mysqli_query($baglanti, $update_query);

    $sql = "SELECT * FROM tbl_araclar WHERE arac_id = $arac_id";
    $result = mysqli_query($baglanti, $sql);
    
    if (!$result || mysqli_num_rows($result) === 0) {
        echo "Araç bulunamadı.";
    } else {
        $row = mysqli_fetch_assoc($result);
        echo "<div class='arac'>
                <div class='resim'>
                <div class=\"kiralanma-yazi\">KİRALANAN ARAÇ</div> 
                    <img src='".$row["resim_yolu"]."' alt='Araç Resmi'>
                </div>
                <div class='bilgi'>
                    <p><strong>Marka:</strong> ".$row["marka"]."</p>
                    <p><strong>Model:</strong> ".$row["model"]."</p>
                    <p><strong>Yıl:</strong> ".$row["yil"]."</p>
                    <p><strong>Fiyat:</strong> ".$row["fiyat"]." TL</p>
                </div>
              </div>";
    }
    ?>

    <div class="form-container">
    <form action="rezervasyon.php" method="post">
        <label for="teslimAlmaTarihi">Teslim Alma Tarihi:</label>
        <input type="date" id="teslimAlmaTarihi" name="teslimAlmaTarihi" required>

        <label for="teslimEtmeTarihi">Teslim Etme Tarihi:</label>
        <input type="date" id="teslimEtmeTarihi" name="teslimEtmeTarihi" required>

        <input name="rezervasyon" type="submit" value="Rezervasyon Yap" style="display: block; margin: 0 auto;">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

