<?php
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');

if(isset($_POST['Bul'])){
	
	$gonderdi=$_POST['Tum_ogrenciler'];
$buldum=mysqli_query($vt_baglantısı,"select* from ogrenci where Ogr_id='$gonderdi'");
while($satir=mysqli_fetch_array($buldum))
{
    $ad=$satir['adsoyad'];
    $tc=$satir['tc'];
    $tarih=$satir['d_tarih'];
    $veli_ad=$satir['veli_ad_soyad'];
    $ogretmen=$satir['ogretmeni'];
    $adres=$satir['adres'];
    $tel=$satir['veli_tel'];
    $foto=$satir['foto'];
}
$buldum2=mysqli_query($vt_baglantısı,"select* from ogretmen where ogretmen_id='$ogretmen'");
    while($satir2=mysqli_fetch_array($buldum2))
    {
        $ogretmen_adı=$satir2['ad_soyad'];
        $ogretmen_foto=$satir2['foto'];
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
	<style>
.custom-select{height: 30px;color:white;background-color:darkorange;border: 1px solid transparent;font-size:14px}

		#yazı{font-weight: 16px;color:red;}
		.p1{width:32px;height: 32px;background-image: url("ıcon/touch.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y1{width: 300px;height: 40px;margin-left:85px;margin-top:23px;}
		.p2{width:32px;height: 32px;background-image: url("ıcon/user.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y2{width: 300px;height: 40px;margin-left:85px;margin-top:23px;}
		.p3{width:32px;height: 32px;background-image: url("ıcon/id-cardsad.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y3{width:300px;height: 40px;margin-left:85px;margin-top:23px;}
		.p4{width:32px;height: 32px;background-image: url("ıcon/birthday.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y4{width:500px;height: 40px;margin-left:85px;margin-top:23px;}
		.p5{width:32px;height: 32px;background-image: url("ıcon/parents.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y5{width:100%px;height: 40px;margin-left:85px;margin-top:23px;}
		.p6{width:32px;height: 32px;background-image: url("ıcon/telephone.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y6{width:300px;height: 40px;margin-left:85px;margin-top:23px;}
        .p7{width:32px;height: 32px;background-image: url("ıcon/navigation.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y7{width:80%;height: 40px;margin-left:85px;margin-top:23px;}
        .p8{width:32px;height: 32px;background-image: url("ıcon/teacher.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y8{width:300px;height: 40px;margin-left:85px;margin-top:23px;}
		.Bul_btn{background-color:darkorange;border: none;color: white;padding:5px 30px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkOrange;background-image: url("ıcon/search.png");background-repeat: no-repeat;background-position: 5px 2px;margin-left:20px;font-weight: bold;}
		.Bul_btn:hover{background-color: white;color:darkorange;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)}

	</style>
<body bgcolor="silver">
<?php   
include("Baslık.php");
?>
	<div style="width:80%;height:95px;background-color: darkorange;position:absolute;border-top-left-radius:35px;border-top-right-radius:35px;margin-left:10%;margin-top:200px">
		<img src="ıcon/ara.png"style="margin-top: 10px;margin-left: 30px">
		
		<font style="font-size:50px;color:white;margin-left:100px;font-family:'Times New Roman';">Öğrenci Ara</font></div>
	<div style="width: 80%;height:600px;background-color:white;position:absolute;margin-left:10%;margin-top:295px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
<div style="width:300px;height: 50px;margin-left:200px;">
    <form action="" method="Post" enctype="multipart/form-data">
		<table cellpadding="5" cellspacing="5">
        <tr>
           <td> <select name="Tum_ogrenciler" class="custom-select" style="width:200px;">
           <option value="seçim yapılmadı" selected>Lütfen Seçiniz</option>
                <?php
                $arat=mysqli_query($vt_baglantısı,"select * from ogrenci");
                while ($yaz=mysqli_fetch_array($arat)){
                $isim=$yaz['adsoyad'];
                $id=$yaz['Ogr_id'];
				$resim=$yaz['foto'];
                echo "<option value='$id'>$isim</option>";
                }
                ?>
                </select >
                </td>
                <td><input type="submit" value="Bul" name="Bul" class="Bul_btn"></td>
                </tr> 
			
		</table>
        </form>
        </div>
	<div class="p1"></div>
	<div class="y1"><h2>ID No: <font style="color:#367112;"><?php if(isset($gonderdi))echo($gonderdi);?></font></h2></div>
	<div class="p2"></div>
	<div class="y2"><h2>AD Soyad: <font style="color:#367112;"><?php if(isset($ad))echo($ad);?></font></h2></div>
	<div class="p3"></div>
	<div class="y3"><h2>Tc Kimlik: <font style="color:#367112;"><?php if(isset($tc))echo($tc);?></font></h2></div>
	<div class="p4"></div>
	<div class="y4"><h2>Doğum tarihi: <font style="color:#367112;"><?php if(isset($tarih))echo($tarih);?></font></h2></div>
	<div class="p5"></div>
	<div class="y5"><h2>Veli Adı: <font style="color:#367112;"><?php if(isset($veli_ad))echo($veli_ad);?></font></h2></div>
	<div class="p6"></div>
	<div class="y6"><h2>Veli Telefon: <font style="color:#367112;"><?php if(isset($tel))echo($tel);?></font></h2></div>
    <div class="p7"></div>
	<div class="y7"><h2>Adres: <font style="color:#367112;"><?php if(isset($adres))echo($adres);?></font></h2></div>
    <div class="p8"></div>
	<div class="y8"><h2>Öğretmen: <font style="color:#367112;"><?php if(isset($ogretmen_adı))echo($ogretmen_adı);?></font></h2></div>
	<div style="background-color:silver;border-radius:100px;margin-left:70%;width:200px;height:200px;margin-top:-500px;background-size:cover;background-repeat:no-repeat;background-image: url(<?php if(isset($foto))echo($foto);?>)"></div>
	</div>
	
	
</body>
</html>