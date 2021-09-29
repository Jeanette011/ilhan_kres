<?php
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
$buldum=mysqli_query($vt_baglantısı,"select* from kullanıcılar where durum='aktif'");
while($satir=mysqli_fetch_array($buldum))
{
    $adbulundu=$satir['ad_soyad'];$unvanbulundu=$satir['unvan'];$fotobulundu=$satir['resmi'];$kulbulundu=$satir['kullanıcı_adı'];
}
//Anasaya Butonuna Tıklanırsa
if(isset($_POST['Home'])){
	header('location:anasayfa.php?durum=basarili');
		exit();

}
//Çıkış BUTONUNA TIKLANIRSA
if(isset($_POST['exıt'])){
	$Cıkıs=mysqli_query($vt_baglantısı,"update kullanıcılar set durum='pasif' where kullanıcı_adı='$kulbulundu'");
	header('location:index.html?durum=basarili');
		exit();

}
//Ögrenci EKLE BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_ekle'])){
	header('location:ogr_ekle.php?durum=basarili');
		exit();

}
//Ögrenci Sil BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_sil'])){
	header('location:ogr_list.php?durum=basarili');
		exit();

}
//Ögrenci Ara BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_ara'])){
	header('location:ogr_ara.php?durum=basarili');
		exit();

}
//Ögrenci Lİst BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_lıstele'])){
	header('location:ogr_tum.php?durum=basarili');
		exit();

}
//Öğrenci Güncelle BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_guncelle'])){
	header('location:ogr_guncelle.php?durum=basarili');
		exit();

}
//Yönetici Ekle BUTONUNA TIKLANIRSA
if(isset($_POST['yonetici_ekle'])){
	header('location:yonetici_ekle.php?durum=basarili');
		exit();

}
//Yönetici Ekle BUTONUNA TIKLANIRSA
if(isset($_POST['y_sil'])){
	header('location:Yoneticiler_list.php?durum=basarili');
		exit();
}
//Öğretmen Ekle BUTONUNA TIKLANIRSA
if(isset($_POST['ogretmen_ekle'])){
	header('location:Ogretmen_ekle.php?durum=basarili');
		exit();
}
//Öğretmen Sil BUTONUNA TIKLANIRSA
if(isset($_POST['ogretmen_sil'])){
	header('location:Ogretmen_list.php?durum=basarili');
		exit();
}
//Öğretmen Tümünü Listele BUTONUNA TIKLANIRSA
if(isset($_POST['ogretmen_lıstele'])){
	header('location:Ogretmen_tum.php?durum=basarili');
		exit();
}
//Öğretmen Ara BUTONUNA TIKLANIRSA
if(isset($_POST['ogretmen_ara'])){
	header('location:Ogretmen_ara.php?durum=basarili');
		exit();
}
//Öğretmen Güncelle BUTONUNA TIKLANIRSA
if(isset($_POST['ogretmen_guncelle'])){
	header('location:Ogretmen_guncelle.php?durum=basarili');
		exit();
}
//Öğretmen yazdır BUTONUNA TIKLANIRSA
if(isset($_POST['ogret_bilgi_yazdır'])){
	header('location:Ogretmen_yazdır.php?durum=basarili');
		exit();
}
//Öğrenciyazdır BUTONUNA TIKLANIRSA
if(isset($_POST['ogr_bilgi_yazdır'])){
	header('location:ogr_yazdır.php?durum=basarili');
		exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/Css" href="Style.Css"/>
</head>
<style>
    /***** RESET *****/
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code,del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, sub, sup, tt, var, b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	/*font-size: 100%;
	vertical-align: baseline;*/
	
}
html, body {height:100%;}
body {line-height: 1;}
ol, ul {list-style: none;}
blockquote, q {quotes: none;}
blockquote:before, blockquote:after, q:before, q:after {content: '';content: none;}
table {border-collapse: collapse;border-spacing: 0;} 
textarea {overflow:auto;}

/***** RESET *****/
.foto{width: 120px;height:150px;background-color:black;margin-left: 15px;border-radius: 10px;position: absolute;background-image: url(<?php echo($fotobulundu);?>);background-repeat: no-repeat;background-size: cover;}
.bilgiler{width: 220px;height:150px;margin-left: 150px;position: absolute;border-radius: 10px;}
.t_bilgi{width: 100%;height: 20px;background-color: silver;}
.b1{width: 100%;height: 43px;background-color: #fbf1be;}
.b2{width: 100%;height: 43px;background-color:#fbf1be;}
.b3{width: 100%;height: 43px;background-color:#fbf1be;}
.yonetimsel{width: 170px;background-color:#808e9b;border-radius: 3px;height: 150px;position: absolute;margin-left:400px;}
.yonetimsel2{width: 170px;background-color:#808e9b;border-radius: 3px;height: 100px;position: absolute;margin-left:575px;}
.yonetimsel3{width: 170px;background-color:#808e9b;border-radius: 3px;height: 150px;position: absolute;margin-left:750px;}
.yonetimsel4{width: 170px;background-color:#808e9b;border-radius: 3px;height: 100px;position: absolute;margin-left:950px;}
.kullanıcıadıyazımı{font-size:12px;margin-left:10px;margin-top:10px;}
/*ogreci ekle butonu*/
input.ekle_btn{background-color:#4CAF50;border: none;color: white;padding: 3px 25px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/add-ıcon.png");background-repeat: no-repeat;background-position: 5px 2px;margin-left:20px;font-weight: bold;}
input.ekle_btn:hover{background-color: white;color:#4CAF50;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*ogreci sil butonu*/	
input.del_btn{background-color:#f44336;border: none;color: white;padding: 3px 31px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #f44336;background-image: url("ıcon/User-Delete-icon.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
input.del_btn:hover{background-color: white;color:#f44336;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*ogreci guncelle butonu*/
input.update_btn{background-image: url("ıcon/refresh.png");background-color:darkblue;border: none;color: white;padding: 3px 23px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkblue;background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
input.update_btn:hover{background-color: white;color:darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*ogreci ara butonu*/
input.search_btn{background-color:darkorange;border: none;color: white;padding: 3px 27px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkOrange;background-image: url("ıcon/search.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
input.search_btn:hover{background-color: white;color:darkorange;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)}
/*ogreci tum listele butonu*/
input.allstudent_btn{background-color:darkgrey;border: none;color: white;padding: 3px 25px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkgrey;background-image: url("ıcon/note.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
input.allstudent_btn:hover{background-color: white;color:darkgray;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Yönetici ekle butonu*/
.y_ekle_btn{background-color: #4CAF50;border: none;color: white;padding: 5px 25px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/Actions-list-add-user-icon.png");background-repeat: no-repeat;background-position: 5px 1px;font-weight: bold;margin-left:20px;}
.y_ekle_btn:hover{background-color: white;color: green;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Yönetici Sil butonu*/
.y_sil_btn{background-color: #f44336;border: none;color: white;padding: 5px 30px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #f44336;background-image: url("ıcon/Actions-user-group-delete-icon.png");background-repeat: no-repeat;background-position: 5px 1px;font-weight: bold;margin-left:20px;}
.y_sil_btn:hover{background-color: white;color: #f44336;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Çıkış butonu*/	
.exıt_btn{width: 100%;height: 37px;background-color: #f44336;border:none;background-image: url("ıcon/exit.png");cursor: pointer;border: 1px solid #f44336;}
.exıt_btn:hover{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);background-color: white;}
/*Anasayfa butonu*/
.home_btn{width: 100%;height:37px;background-color:#4CAF50;border:none;background-image: url("ıcon/home.png");cursor: pointer;border: 1px solid #4CAF50;background-repeat: no-repeat;}
.home_btn:hover{box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);background-color:white;border: 1px solid #4CAF50;}
/*Öğretmen ekle butonu*/
.ogret_ekle_btn{background-color:#4CAF50;border: none;color: white;padding: 3px 18px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/add-ıcon.png");background-repeat: no-repeat;background-position: 5px 2px;margin-left:20px;font-weight: bold;}
.ogret_ekle_btn:hover{background-color: white;color:#4CAF50;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Öğretmen Sil butonu*/
.ogret_del_btn{background-color:#f44336;border: none;color: white;padding: 3px 23px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #f44336;background-image: url("ıcon/User-Delete-icon.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
.ogret_del_btn:hover{background-color: white;color:#f44336;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Öğretmen Güncelle butonu*/
.ogret_update_btn{background-image: url("ıcon/refresh.png");background-color:darkblue;border: none;color: white;padding: 3px 23px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkblue;background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
.ogret_update_btn:hover{background-color: white;color:darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/*Öğretmen Ara butonu*/
.ogret_search_btn{background-color:darkorange;border: none;color: white;padding: 3px 20px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkOrange;background-image: url("ıcon/search.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
.ogret_search_btn:hover{background-color: white;color:darkorange;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)}
/*Öğretmen tüm listele butonu*/
.ogret_tum_btn{background-color:darkgrey;border: none;color: white;padding: 3px 26px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkgrey;background-image: url("ıcon/note.png");background-repeat: no-repeat;background-position: 5px 1px;margin-left:20px;font-weight: bold;}
.ogret_tum_btn:hover{background-color: white;color:darkgray;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/* hoca yazdır butonu*/
.hoca_bilgi_btn{background-color:#6D214F;border: none;color: white;padding: 5px 30px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #6D214F;background-image: url("ıcon/print.png");background-repeat: no-repeat;background-position: 1px 1px;font-weight: bold;margin-left:10px;}
.hoca_bilgi_btn:hover{background-color: white;color:#6D214F;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
/* öğrenci bilgi yazdır butonu*/
.ogr_bilgiyaz_btn{background-color:#6D214F;border: none;color: white;padding: 5px 37px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #6D214F;background-image: url("ıcon/print.png");background-repeat: no-repeat;background-position: 1px 1px;font-weight: bold;margin-left:10px;}
.ogr_bilgiyaz_btn:hover{background-color: white;color:#6D214F;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
</style>
<body>
	
    <div style="width:100%; height: 150px;background-color:#2f3542;position: absolute;">
	<div style="width:37px;height:32px;background-color:blue;position:absolute;margin-left:575px;margin-top:105px">
		<form action="" method="Post">
                 <input type="submit" value="" name="Home" class="home_btn">
				</form>
		</div>
	<div style="width:37px;height:32px;background-color:blue;position:absolute;margin-left:620px;margin-top:105px">
		<form action="" method="Post">
                 <input type="submit" name="exıt" class="exıt_btn" value="">
				</form>
	</div>
    <div class="foto"></div>
    <div class='bilgiler'>
        <div class='t_bilgi'><h4 style="text-align: center;color: white;">Genel Bilgiler</h4></div>
        <div class='b1'><img src="ıcon/user.png" style="margin-left:3px;width:16px;height:16px;margin-top: 5px"><font style='color:black;font-size:14px;margin-left:10px;margin-top:5px;'>Hoş Geldiniz</font><font class='kullanıcıadıyazımı'style='color:red'><?php echo $kulbulundu;?></font></div>
        <div class='b2'><img src="ıcon/id-cardsad.png" style="margin-left:3px;width:16px;height:16px;margin-top: 5px"><font style='color:black;font-size:14px;margin-left:10px;margin-top:10px'>Adı Soyadı</font><font class='kullanıcıadıyazımı'style='color:red'><?php echo $adbulundu;?></font></div>
        <div class='b3'><img src="ıcon/military-rank.png" style="margin-left:3px;width:16px;height:16px;margin-top: 5px;"><font style='color:black;font-size:14px;margin-left:10px;margin-top:10px'>Ünvanı</font><font class='kullanıcıadıyazımı'style='color:red'><?php echo $unvanbulundu;?></font></div></div>
    </div>
    <div class="yonetimsel">
        <div style="width: 100%;height:17px;background-color: #d2dae2;border-radius: 3px;"><h4 style="text-align: center;color: darkred">Öğrenci İşlemleri</h4></div>
        <div style="width: 100%;height: 26px;">
        <form action="" method="Post">
                 <input type="submit" value="Öğrenci Ekle" name="ogr_ekle" class="ekle_btn">
				</form>
        </div>
		<div style="width: 100%;height: 26px;">
        <form action="" method="Post">
                 <input type="submit" value="Öğrenci sil" name="ogr_sil" class="del_btn">
				</form>
        </div>
		<div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Bilgi Güncelle" name="ogr_guncelle" class="update_btn">
				</form>
		</div>
        <div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Öğrenci Ara" name="ogr_ara" class="search_btn">
				</form>
		</div>
		<div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Kayıt Listele" name="ogr_lıstele" class="allstudent_btn">
				</form>
		</div>
    </div>
	<div class="yonetimsel2">
	<div style="width: 100%;height:17px;background-color: #d2dae2;border-radius: 3px;"><h4 style="text-align: center;color: darkred">Yönetici Panel</h4></div>
		<div style="width: 100%;height:45px;">
			<form action="" method="Post">
                 <input type="submit" value="Yönetici Ekle" name="yonetici_ekle" class="y_ekle_btn">
				</form>
		</div>
		<div style="width: 100%;height:45px;">
			<form action="" method="Post">
                 <input type="submit" value="Yönetici Sil" name="y_sil" class="y_sil_btn">
				</form>
		</div>
	</div>
	<div class="yonetimsel3">
        <div style="width: 100%;height:17px;background-color: #d2dae2;border-radius: 3px;"><h4 style="text-align: center;color: darkred">Öğretmen İşlemleri</h4></div>
        <div style="width: 100%;height: 26px;">
        <form action="" method="Post">
                 <input type="submit" value="Öğretmen Ekle" name="ogretmen_ekle" class="ogret_ekle_btn">
				</form>
        </div>
		<div style="width: 100%;height: 26px;">
        <form action="" method="Post">
                 <input type="submit" value="Öğretmen Sil" name="ogretmen_sil" class="ogret_del_btn">
				</form>
        </div>
		<div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Bilgi Güncelle" name="ogretmen_guncelle" class="ogret_update_btn">
				</form>
		</div>
        <div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Öğretmen Ara" name="ogretmen_ara" class="ogret_search_btn">
				</form>
		</div>
		<div style="width: 100%;height: 26px;">
		<form action="" method="Post">
                 <input type="submit" value="Kayıt Listele" name="ogretmen_lıstele" class="ogret_tum_btn">
				</form>
		</div>
    </div>
<div class="yonetimsel4">
	<div style="width: 100%;height:17px;background-color: #d2dae2;border-radius: 3px;"><h4 style="text-align: center;color: darkred">Yazdırma Panel</h4></div>
		<div style="width: 100%;height:45px;">
			<form action="" method="Post">
                 <input type="submit" value="Öğretmen Bilgi" name="ogret_bilgi_yazdır" class="hoca_bilgi_btn">
				</form>
		</div>
		<div style="width: 100%;height:45px;">
			<form action="" method="Post">
                 <input type="submit" value="Öğrenci Bilgi" name="ogr_bilgi_yazdır" class="ogr_bilgiyaz_btn">
				</form>
		</div>
    </div>
	
</body>
</html>