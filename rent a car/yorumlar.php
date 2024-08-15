<!-- 21100011006/VEYSEL/UZUN -->
<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yorumlar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #add8e6;
            background-image: url('arabaresimleri/kar.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .yorum-baslik {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 32px;
        color: white; 
        text-shadow: 1px 1px 2px #000;
        }

        #menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: center;
    z-index: 999; 
}
.user-action {
    margin-left: 200px; 
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

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label,
        input[type="text"],
        textarea,
        input[type="submit"] {
            display: block;
            width: calc(100% - 20px);
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            height: 140px;
            resize: vertical;
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

        .yorumlar {
        padding: 20px;
        background-color: rgba(243, 243, 243, 0.1);
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
        width: 100%;
    }

.yorum:not(:last-child) {
            border-bottom: 1.5px solid black;
        }

        .yorum {
            background-color: white;
            border: 2px solid black;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    margin: 0px auto;
}

.yorumlar .yorum-ekleme {
    margin-top: 0px; 
}

.yorum p {
    margin: 10px 0;
}

.yorum strong {
        display: block;
        font-size: 18px;
        margin-bottom: 8px;
    }

    .yorum-baslik {
    text-align: center;
    font-size: 30px;
    margin-bottom: 20px;
    text-transform: uppercase;
    color: white;
    display: block;
    width: fit-content;
    padding: 5px 15px;
    border-radius: 12px;
    margin: auto auto;
    font-family: 'Arial', sans-serif;
    background-color: rgba(243, 243, 243, 0);
    width: auto; 
    height: 50px;
    line-height: 50px;
}

    .yorum-ekleme {
        background-color: rgba(243, 243, 243, 0);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .yorum-ekleme h2 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 24px;
    }

    .yorum-ekleme form {
        max-width: 400px;
        margin: 0 auto;
    }

    .yorum-ekleme form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .yorum-ekleme form textarea,
    .yorum-ekleme form input[type="text"] {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        resize: vertical;
    }

    .yorum-ekleme form input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s;
        margin-left: 12px;
    }

    .yorum-ekleme form input[type="submit"]:hover {
        background-color: #ADD8E6;
    }
    </style>
</head>
<body>
<div id="menu">
    <ul>
    <?php
        $marginStyle = ($_SESSION['giris_yapildi'] == true) ? '5px' : '430px';
    ?>
        <li style="margin-left: <?php echo $marginStyle; ?>;"><a href="anasayfa.php">Ana Sayfa</a></li>
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
        <?php
            if (($_SESSION['giris_yapildi']) != true) {
                echo '<li class="user-action"><a href="giris.php">Giriş Yap</a></li>';
                echo '<li><a href="kayit.php">Kayıt Ol</a></li>';
            } 
        ?>
    </ul>
</div>
<?php
include 'baglanti.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['yorum_metni'])) {
    if ($_SESSION['giris_yapildi'] != true) {
        echo '<script>alert("Lütfen önce giriş yapın!"); window.location.href = "giris.php";</script>';
        exit; 
    }
    $yorum = $_POST["yorum_metni"];

    $username = $_SESSION['kullanici_adi'];

    $musteriSorgusu = "SELECT musteri_id FROM tbl_musteriler WHERE kullanici_adi = ?";
    $stmt = mysqli_prepare($baglanti, $musteriSorgusu);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $musteri_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $ekleSorgusu = "INSERT INTO tbl_yorumlar (musteri_id, yorum_metni) VALUES (?, ?)";
        $stmt = mysqli_prepare($baglanti, $ekleSorgusu);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "is", $musteri_id, $yorum);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo '<script>alert("Yorum başarıyla eklendi"); window.location.href = "yorumlar.php";</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Yorum eklenirken bir problem oluştu.
                    </div>';
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
            Hazırlama hatası.
            </div>';
    }

    mysqli_close($baglanti);
}
?>


<div class="yorumlar">
    <h2 class="yorum-baslik">YORUMLAR</h2>
    <hr style="background-color: white; height: 2px; border: none; margin-bottom: 20px;">
    <?php
    $yorumlarSorgusu = "SELECT yorumlar.musteri_id, yorumlar.yorum_metni, musteriler.kullanici_adi 
                        FROM tbl_yorumlar AS yorumlar 
                        INNER JOIN tbl_musteriler AS musteriler ON yorumlar.musteri_id = musteriler.musteri_id";

    $yorumlarSonuc = mysqli_query($baglanti, $yorumlarSorgusu);

    if ($yorumlarSonuc && mysqli_num_rows($yorumlarSonuc) > 0) {
        while ($row = mysqli_fetch_assoc($yorumlarSonuc)) {
            echo "<div class='yorum'>
                    <strong>" . $row["kullanici_adi"] . ":</strong>
                    <p>" . $row["yorum_metni"] . "</p>
                  </div>";
        }
    } else {
        echo "<p style='text-align: center;'>Henüz yorum bulunmuyor.</p>";
    }
    ?>
    <div class="yorum-ekleme">
        <form action="yorumlar.php" method="post">
            <textarea id="yorum_metni" name="yorum_metni" required></textarea>
            <input type="submit" value="Yorum Ekle">
            

        </form>
    </div>
</div>

    


    </div>
</body>
</html>

