<!-- 21100011006/VEYSEL/UZUN -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENT A CAR - Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; 
            background-image: url('arabaresimleri/giris.jpg'); 
            background-size: cover; 
            background-attachment: fixed; 
            background-repeat: no-repeat;
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
            text-align: center;
            padding: 20px 0;
        }
        .btn-primary {
            width: 100%;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-secondary {
            width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        .fancy-text {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
<?php
session_start();
include("bağlantı.php");

$e_posta_err = $parola_err = "";

if(isset($_POST["giris"])) {
    if(empty($_POST["eposta"])) {
        $e_posta_err = "E-Posta boş bırakılamaz.";
    } elseif (!filter_var($_POST["eposta"], FILTER_VALIDATE_EMAIL)) {
        $e_posta_err = "Geçersiz e-posta adresi formatı.";
    } else {
        $email = $_POST["eposta"];
    }
    
    if(empty($_POST["sifre"])) {
        $parola_err = "Şifre boş geçilemez.";
    } else {
        $password = $_POST["sifre"];
    }

    if (empty($e_posta_err) && empty($parola_err)) {
        $secim = "SELECT * FROM tbl_musteriler WHERE e_posta='$email'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);
    
        if ($kayitsayisi == 1) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashli_sifre = $ilgilikayit["sifre"];
    
            if (($password == $hashli_sifre)) { 
                $_SESSION["e_posta"] = $ilgilikayit["e_posta"];
                $_SESSION["parola"] = $ilgilikayit["parola"];
                $_SESSION["giris_yapildi"] = true;
                header("location: anasayfa.php");
                exit;
            } else {
                $_SESSION["giris_yapildi"] = false;
                echo '<div class="alert alert-danger" role="alert">
                    Parola yanlış.
                </div>';
            }
        } else {
            $_SESSION["giris_yapildi"] = false;
            echo '<div class="alert alert-danger" role="alert">
                E-posta yanlış.
            </div>';
        }
    }
    
    mysqli_close($baglanti);
}
?>



<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="fancy-text">GİRİŞ EKRANI</h3>
        </div>
        <div class="card-body">
            <form action="giris.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputusername1" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control <?php if (!empty($username_err)) { echo "is-invalid"; } ?>" id="exampleInputusername1" name="kullaniciadi">
                        <div class="invalid-feedback"><?php echo $username_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" class="form-control <?php if (!empty($parola_err)) { echo "is-invalid"; } ?>" id="exampleInputPassword1" name="sifre">
                        <div class="invalid-feedback"><?php echo $parola_err; ?></div>
                </div>
                <button type="submit" name="giris" class="btn btn-primary">Giriş Yap</button>
            </form>
            <a href="kayit.php" class="btn btn-secondary">Hesap Oluştur</a>
            <a href="anasayfa.php" class="btn btn-secondary">Ana Sayfa</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
