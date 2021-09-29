<?php 
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
//Oğrenci Güncelle İşmlemi
if(isset($_POST['Ogrenci_guncelle'])){
    $ogr_id=$_POST['id'];
    $ogr_ad=$_POST['ad'];
    $ogr_tc=$_POST['tcsi'];
    $ogr_tarih=$_POST['tarih'];
    $ogr_veli_ad=$_POST['veli_ad'];
    $ogr_veli_tel=$_POST['veli_tel'];
    $ogr_adres=$_POST['adres'];
    $ogr_ogretmen=$_POST['Tum_ogretmenler'];
    $cekilen_poto=$_FILES['poto']['name'];
    $tmp_name=$_FILES['poto']['tmp_name'];
//resmin konumunu bulalım
$buldum=mysqli_query($vt_baglantısı,"select* from ogrenci where Ogr_id='$ogr_id'");
while($satir=mysqli_fetch_array($buldum))
{
    $fotobulundu=$satir['foto'];
} 
//Klasorden silelim  
unlink($fotobulundu);

    if($cekilen_poto)
    {
        $kaydet_poto_loc="ogrenci_foto/$cekilen_poto";
        move_uploaded_file($tmp_name,$kaydet_poto_loc);
    $guncelle=mysqli_query($vt_baglantısı,"update ogrenci set adsoyad='$ogr_ad',tc='$ogr_tc',d_tarih='$ogr_tarih',veli_ad_soyad='$ogr_veli_ad',veli_tel='$ogr_veli_tel',adres='$ogr_adres',ogretmeni='$ogr_ogretmen',foto='$kaydet_poto_loc' where Ogr_id='$ogr_id'");
	if($guncelle)
	{
        header('location:Ogr_tum.php?durum=basarili');
        exit();
    }
       
    }


  
if($cekilen_poto){
    $kaydet_poto_loc="ogretmen_foto/$cekilen_poto";
    move_uploaded_file($tmp_name,$kaydet_poto_loc);


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
#sec{background-color: blue;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/image.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;}
#sec:hover{background-color:darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
.custom-select{height: 30px;color:darkgreen;background-color:antiquewhite;border: 1px solid transparent;font-size:14px}

input.Ogrenci_guncelle_btn{
  background-color: blue;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/diskette.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
}
input.Ogrenci_guncelle_btn:hover {
  background-color: darkblue;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#yazı{font-weight: 16px;color:red;}
		.p1{width:32px;height: 32px;background-image: url("ıcon/touch.png");position: absolute;margin-top:-5px;margin-left: 50px}
		.y1{width: 300px;height: 40px;margin-left:85px;margin-top:23px;}
		.p2{width:32px;height: 32px;background-image: url("ıcon/user.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y2{width: 350px;height: 40px;margin-left:85px;margin-top:23px;}
		.p3{width:32px;height: 32px;background-image: url("ıcon/id-cardsad.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y3{width:500px;height: 40px;margin-left:85px;margin-top:23px;}
		.p4{width:32px;height: 32px;background-image: url("ıcon/birthday.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y4{width:500px;height: 40px;margin-left:85px;margin-top:23px;}
		.p5{width:32px;height: 32px;background-image: url("ıcon/parents.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y5{width:420px;height: 40px;margin-left:85px;margin-top:23px;}
		.p6{width:32px;height: 32px;background-image: url("ıcon/telephone.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y6{width:420px;height: 40px;margin-left:85px;margin-top:23px;}
        .p7{width:32px;height: 32px;background-image: url("ıcon/navigation.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y7{width:70%;height: 40px;margin-left:85px;margin-top:23px;}
        .p8{width:32px;height: 32px;background-image: url("ıcon/Teacher.png");position: absolute;margin-top:20px;margin-left: 50px}
		.y8{width:350px;height: 40px;margin-left:85px;margin-top:23px;}
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
<body bgcolor="Silver">
<?php
include("Baslık.php");
?>
<div style="width:80%;height:95px;background-color:darkblue;position:absolute;border-top-left-radius:35px;border-top-right-radius:35px;margin-left:10%;margin-top:200px">
		<img src="ıcon/Y_guncelle.png"style="margin-top: 10px;margin-left: 30px">
		
		<font style="font-size:50px;color:white;margin-left:50px;font-family:'Times New Roman';">Öğrenci Güncelle</font></div>
	<div style="width: 80%;height:600px;background-color:white;position:absolute;margin-left:10%;margin-top:295px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
    <form action="" method="Post" enctype="multipart/form-data">
    <div class="p1"></div>
	<div class="y1"><h2>ID No:<input  type="text" value="" name="id"></h2></div>
    <div class="p2"></div>
	<div class="y2"><h2>Ad Soyad:<input  type="text" value="" name="ad"></h2></div>
	<div class="p3"></div>
	<div class="y3"><h2>Tc Kimlik:<input  type="text" maxlength="11" value="" name="tcsi"></h2></div>
	<div class="p4"></div>
	<div class="y4"><h2> Doğum tarihi:<input  type="date" value="" name="tarih"></h2></div>
	<div class="p5"></div>
	<div class="y5"><h2>Veli Adsoyad:<input  type="text" value="" name="veli_ad"></h2></div>
	<div class="p6"></div>
	<div class="y6"><h2>Veli Telefon:<input maxlength="11" type="text" value="" name="veli_tel"> </h2></div>
	<div class="p7"></div>
	<div class="y7"><h2>Adres:<input  type="text" value="" name="adres"></h2></div>
    <div class="p8"></div>
	<div class="y8"><h2>Öğretmeni: <select name="Tum_ogretmenler" class="custom-select" style="width:200px;">
           <option value="seçim yapılmadı" selected>Lütfen Seçiniz</option>
                <?php
                $arat=mysqli_query($vt_baglantısı,"select * from ogretmen");
                while ($yaz=mysqli_fetch_array($arat)){
                $isim=$yaz['ad_soyad'];
                $id=$yaz['ogretmen_id'];
                echo "<option value=$id>$isim</option>";
                }
                ?>
                </select ></h2></div>
                <div style="width:102px;height:150px;background-color:blue;margin-left:79%;position:absolute;margin-top:-500px"><img id="output" src="" width="100" height="150"></div>
                <div style="width:128px;height:40px;margin-left:78%;position:absolute;margin-top:-342px">
			<input type="file" id="file" name="poto" class="k_poto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
			<label for="file" id="sec">Seçiniz...</label>
            
		</div>
        
	</div>
    <div style="width:128px;height:40px;margin-left:58%;position:absolute;margin-top:800px"><input type="submit" value="Güncelle" name="Ogrenci_guncelle" class="Ogrenci_guncelle_btn"></div>
</form>
</body>
</html>