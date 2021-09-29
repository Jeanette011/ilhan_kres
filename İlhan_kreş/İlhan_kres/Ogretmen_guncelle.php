<?php
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');

if(isset($_POST['ogretmen_Güncelle'])){
//eski Foto sil
$ogretmen_id=$_POST['ıd'];
$ogretmen_tc=$_POST['tc'];
$ogretmen_ad=$_POST['adı'];
$ogretmen_tarih=$_POST['tarih'];
$ogretmen_adres=$_POST['adres'];
$ogretmen_tel=$_POST['telefon'];
$cekilen_poto=$_FILES['poto']['name'];
$tmp_name=$_FILES['poto']['tmp_name'];

//resmin konumunu bulalım
$buldum=mysqli_query($vt_baglantısı,"select* from ogretmen where ogretmen_id='$ogretmen_id'");
while($satir=mysqli_fetch_array($buldum))
{
    $fotobulundu=$satir['foto'];
} 
//Klasorden silelim  
unlink($fotobulundu);
if($cekilen_poto){
    $kaydet_poto_loc="ogretmen_foto/$cekilen_poto";
    move_uploaded_file($tmp_name,$kaydet_poto_loc);
$guncelle=mysqli_query($vt_baglantısı,"update ogretmen set tc_kimlik='$ogretmen_tc',ad_soyad='$ogretmen_ad',d_tarih='$ogretmen_tarih',adres='$ogretmen_adres',telefon='$ogretmen_tel',foto='$kaydet_poto_loc' where ogretmen_id='$ogretmen_id'");
	if($guncelle)
	{
        header('location:Ogretmen_list.php?durum=basarili');
        exit();
    }

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

.k_poto{display:none;}
#sec{
		background-color:blue;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/image.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
	}
	#sec:hover{
		background-color: darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
    input.ogretmen_Güncelle_btn{
  background-color:blue;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/diskette.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
}
input.ogretmen_Güncelle_btn:hover {
  background-color: darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#yazı{font-weight: 16px;color:red;}
.p1{width:32px;height: 32px;background-image: url("ıcon/touch.png");position: absolute;margin-top:0px;margin-left: 50px}
.y1{width: 300px;height: 40px;margin-left:85px;margin-top:23px;}
.p2{width:32px;height: 32px;background-image: url("ıcon/id-cardsad.png");position: absolute;margin-top:20px;margin-left: 50px}
.y2{width: 300px;height: 40px;margin-left:85px;margin-top:23px;}
.p3{width:32px;height: 32px;background-image: url("ıcon/user.png");position: absolute;margin-top:20px;margin-left: 50px}
.y3{width:500px;height: 40px;margin-left:85px;margin-top:23px;}
.p4{width:32px;height: 32px;background-image: url("ıcon/birthday.png");position: absolute;margin-top:20px;margin-left: 50px}
.y4{width:500px;height: 40px;margin-left:85px;margin-top:23px;}
.p5{width:32px;height: 32px;background-image: url("ıcon/navigation.png");position: absolute;margin-top:20px;margin-left: 50px}
.y5{width:100%px;height: 40px;margin-left:85px;margin-top:23px;}
.p6{width:32px;height: 32px;background-image: url("ıcon/telephone.png");position: absolute;margin-top:20px;margin-left: 50px}
.y6{width:300px;height: 40px;margin-left:85px;margin-top:23px;}
.Bul_btn{background-color:darkorange;border: none;color: white;padding:5px 30px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 0px 1px;transition-duration: 0.4s;cursor: pointer;border: 1px solid darkOrange;background-image: url("ıcon/refresh.png");background-repeat: no-repeat;background-position: 5px 2px;margin-left:20px;font-weight: bold;}
.Bul_btn:hover{background-color: white;color:darkorange;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19)}
input[type=text],[type=password],[type=date]{
  width:60%;
  height:30px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
background-color:antiquewhite;
font-weight:21px;color:green;
text-align:center;
}
</style>
<body bgcolor="silver">
<?php   
include("Baslık.php");
?>
<div style="width:80%;height:95px;background-color: darkblue;position:absolute;border-top-left-radius:35px;border-top-right-radius:35px;margin-left:10%;margin-top:200px">
<img src="ıcon/Y_guncelle.png"style="margin-top: 10px;margin-left: 30px">
		
		<font style="font-size:50px;color:white;margin-left:100px;font-family:'Times New Roman';">Öğretmen Güncelle</font></div>
        <div style="width: 80%;height:600px;background-color:white;position:absolute;margin-left:10%;margin-top:295px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
<div style="width:300px;height: 50px;margin-left:200px;">
   
        </div>
    <form action="" method="Post" enctype="multipart/form-data">
	<div class="p1"></div>
	<div class="y1"><h2>ID No:<input  type="text" value="" name="ıd"></h2></div>
	<div class="p2"></div>
	<div class="y2"><h2>Tc Kimlik:<input  type="text" maxlength="11" value="" name="tc"></h2></div>
	<div class="p3"></div>
	<div class="y3"><h2>Ad Soyad:<input  type="text" value="" name="adı"></h2></div>
	<div class="p4"></div>
	<div class="y4"><h2>Doğum tarihi:<input  type="date" value="" name="tarih"></h2></div>
	<div class="p5"></div>
	<div class="y5"><h2>Adres:<input  type="text" value="" name="adres"></h2></div>
	<div class="p6"></div>
	<div class="y6"><h2>Telefon: <input  type="text" value="" maxlength="11" name="telefon"></h2></div>
	<div style="width:102px;height:150px;background-color:darkblue;margin-left:75%;position:absolute;margin-top:-400px"><img id="output" src="" width="100" height="150"></div>
    <div style="width:128px;height:40px;margin-left:74%;position:absolute;margin-top:-250px">
			<input type="file" id="file" name="poto" class="k_poto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
			<label for="file" id="sec">Seçiniz...</label>
            <div style="width:128px;height:40px;margin-left:10%;position:absolute;margin-top:250px"><input type="submit" value="Güncelle" name="ogretmen_Güncelle" class="ogretmen_Güncelle_btn"></div>
		</div>

	</div>
    </div>   
	</form>
</body>
</html>


