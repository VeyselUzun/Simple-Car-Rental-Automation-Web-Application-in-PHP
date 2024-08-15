<!-- 21100011006/VEYSEL/UZUN -->
<?php

include("baglanti.php");

$username_err=$parola_err=$ad_err=$soyad_err="";
if(isset($_POST["kaydet"]))
{
    if(empty($_POST["kullaniciadi"]))
    {
        $username_err="Kullanıcı adı boş geçilemez.";
    }
    else if(strlen($_POST["kullaniciadi"])<5)
    {
        $username_err="Kullanıcı adı en az 5 karakterden oluşmalıdır.";
    }
    else if (!preg_match('/^[a-zğüşıöçĞÜŞİÖÇ_\d]{5,20}$/iu', $_POST["kullaniciadi"])) 
    {
        $username_err="Kullanıcı adı büyük küçük harf ve rakamdan oluşmalıdır.";
    }
    else
    {
        $name=$_POST["kullaniciadi"];
    }

    if(empty($_POST["sifre"]))
    {
        $parola_err="Şifre boş geçilemez.";
    }
    else if(strlen($_POST["sifre"])<4)
    {
        $parola_err="Şifre en az 4 karakterden oluşmalıdır.";
    }
    else if(strlen($_POST["sifre"])>10)
    {
        $parola_err="Şifre en fazla 10 karakterden oluşmalıdır.";
    }
    else
    {
        $password=$_POST["sifre"];
    }

    if(empty($_POST["ad"]))
    {
        $ad_err="Ad boş geçilemez.";
    }
    else if (!preg_match('/^[a-zğüşıöçĞÜŞİÖÇ_\d]{5,20}$/iu', $_POST["ad"])) 
    {
        $ad_err="Ad büyük küçük harften oluşmalıdır.";
    }
    else
    {
        $isim=$_POST["ad"];
    }

    if(empty($_POST["soyad"]))
    {
        $soyad_err="Soyad boş geçilemez.";
    }
    else if (!preg_match('/^[a-zğüşıöçĞÜŞİÖÇ_\d]{5,20}$/iu', $_POST["soyad"])) 
    {
        $soyad_err="Soyad büyük küçük harften oluşmalıdır.";
    }
    else
    {
        $soyisim=$_POST["soyad"];
    }

    if (empty($username_err) && empty($parola_err) && empty($ad_err) && empty($soyad_err)) {
        $ekle = "INSERT INTO tbl_musteriler (kullanici_adi, parola, ad, soyad) VALUES ('$name','$password','$isim','$soyisim')";
        $calistirekle = mysqli_query($baglanti, $ekle);
    
        if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">
            Kayıt başarılı bir şekilde eklendi.
            </div>';
            
        }
        mysqli_close($baglanti);
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
            Kayıt eklenirken bir problem oluştu.
            </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENT A CAR - Kayıt Ol</title>
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
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
        <h3 class="fancy-text">KAYIT EKRANI</h3>
        </div>
        <div class="card-body">
            <form action="kayit.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputusername1" class="form-label">Kullanıcı adı</label>
                    <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="exampleInputusername1" name="kullaniciadi">
                    <div class="invalid-feedback"><?php echo $username_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="sifre">
                    <div class="invalid-feedback"><?php echo $parola_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputname1" class="form-label">Ad</label>
                    <input type="text" class="form-control <?php echo (!empty($ad_err)) ? 'is-invalid' : ''; ?>" id="exampleInputname1" name="ad">
                    <div class="invalid-feedback"><?php echo $ad_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputsurname1" class="form-label">Soyad</label>
                    <input type="text" class="form-control <?php echo (!empty($soyad_err)) ? 'is-invalid' : ''; ?>" id="exampleInputsurname1" name="soyad">
                    <div class="invalid-feedback"><?php echo $soyad_err; ?></div>
                </div>
                <button type="submit" name="kaydet" class="btn btn-primary">Kayıt Ol</button>
            </form>
            <a href="giris.php" class="btn btn-secondary">Zaten bir hesabın varsa, <span style="color: white;">Giriş Yap</span></a>
            <a href="anasayfa.php" class="btn btn-secondary">Ana Sayfa</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
