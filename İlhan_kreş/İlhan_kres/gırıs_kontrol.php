<?php
ob_start();
session_start();
include'baglantim.php';

//GİRİŞ YAP BUTONUNA TIKLANIRSA
if(isset($_POST['giris_yap'])){
    if($gırkul=isset($_POST['kuladı'])?$_POST['kuladı']:null and $gırsifre=isset($_POST['sifre'])?$_POST['sifre']:null)
    {
        //echo "$gırkul and $gırsifre";
        //$yen=$gırkul;
    $kullanıcısor=$db->prepare("select * From kullanıcılar where kullanıcı_adı=:ad and parola=:sifre");
	$kullanıcısor->execute(['ad'=>$gırkul,'sifre'=>$gırsifre]);
	$say=$kullanıcısor->rowCount();
	if($say==1)
	{
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
/*$buldum=mysqli_query($vt_baglantısı,"select* from kullanıcılar where kullanıcı_adı='$gırkul'");
while($satir=mysqli_fetch_array($buldum))
{
    $adbulundu=$satir['ad_soyad'];$unvanbulundu=$satir['unvan'];$fotobulundu=$satir['resmi'];
}*/
//Çevrimiçi ol
	$guncelle=mysqli_query($vt_baglantısı,"update kullanıcılar set durum='aktif' where kullanıcı_adı='$gırkul'");
	if($guncelle)
	{
	  echo "<font color='green'><b>Tamamlandı<b></font><br>";
	  echo"<br>";
    }
    else
      {  
	echo "<font color='red'><b>Hata<b></font><br>";
	echo"<br>";
     }

		header('location:Anasayfa.php?durum=basarili');
		exit();
	}
	else{
		header('location:index.php?durum=basarisiz!!!');
		exit();
	}

    }
    else{
        echo"kullanıcı Adı veya sifre boş geçilemez";
    }
}

?>