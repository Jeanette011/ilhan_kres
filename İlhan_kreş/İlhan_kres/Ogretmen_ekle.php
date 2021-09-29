<?php
//Bağlanti oluşturalım
$vt_baglantısı=mysqli_connect("localhost",'root')or die("Bağlanti Basarısız");
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
//poto kaydet
if(isset($_POST['ogretmen_kayıt']))
{
    
    $ogretmen_tc=$_POST['tcsi'];
    $ogretmen_adsoyad=$_POST['adsoyad'];
	$ogretmen_dogum=$_POST['d_tarihi'];
	$ogretmen_adres=$_POST['adres'];
	$ogretmen_tel=$_POST['PHONE'];
    $cekilen_poto=$_FILES['poto']['name'];
    $tmp_name=$_FILES['poto']['tmp_name'];
    if($cekilen_poto){
        $kaydet_poto_loc="ogretmen_foto/$cekilen_poto";
        move_uploaded_file($tmp_name,$kaydet_poto_loc);
        $ogret_kaydet=mysqli_query($vt_baglantısı,"insert into ogretmen (tc_kimlik,ad_soyad,d_tarih,adres,telefon,foto) values('$ogretmen_tc','$ogretmen_adsoyad','$ogretmen_dogum','$ogretmen_adres','$ogretmen_tel','$kaydet_poto_loc')");
        if($ogret_kaydet)
        {
                header('location:Ogretmen_list.php?durum=basarili');
		        exit();
        }
        else
        {
              echo "<font color='red'><b>Hata<b></font><br>";
              echo"<br>";

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
.Ogretmen{width: 100%;height:auto;margin-top:150px;position:absolute;}
.ogr_ekle{width: 80%;height:700px;;margin-left: 10%;margin-top: 50px;position: absolute;}
.o_baslık{width: 100%;height:80px;background-color:#19951e;border-top-left-radius:50px;border-top-right-radius:50px}
#label{font-size:25px;color:black;font-weight: bold;}
input[type=text],[type=password],[type=date]{
  width:100%;
  padding: 15px 140px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
background-color:antiquewhite;
}
.alan{
	width: 100%;
border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
background-color:antiquewhite;
	}
.k_poto{display:none;}
#sec{
		background-color: #4CAF50;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/image.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
	}
	#sec:hover{
		background-color: #45a049;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
input.ogretmen_kayıt_btn{
  background-color: #4CAF50;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/diskette.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
}
input.ogretmen_kayıt_btn:hover {
  background-color: #45a049;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<body bgcolor="silver">
<?php
include("Baslık.php");
?>
<div class="Ogretmen">
<div class="ogr_ekle">
	<div class="o_baslık">
	<img src="ıcon/classroom.png" style="margin-left:40px;margin-top: 10px;">
		<div style="width:100%;height:100%;margin-left: 100px;margin-top:-50px;"><font size="25px" style="color:white;margin-left: 100px;margin-top: -25px;font-family:'Times New Roman';">Öğretmen Ekle</font></div>
	</div>
	<div style="width:100%;background-color:white;height:620px;position:absolute;float: left;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
	<form action="" method="Post" enctype="multipart/form-data">
		<table cellpadding="30" cellspacing="30">
                    <tr>
                    <td><img src="ıcon/user.png"><label id="label"> Tc Kimlik</label></td>
                        <td><input type="text" maxlength="11" name="tcsi"/></td>
                    </tr>
			        <tr>
                        <td><img src="ıcon/id-cardsad.png"><label id="label"> Ad Soyad</label></td>
                        <td><input type="text" name="adsoyad"/></td>
                    </tr>
			        <tr>
                        <td><img src="ıcon/birthday.png"><label id="label"> Doğum Tarihi</label></td>
                        <td><input type="date" name="d_tarihi"/></td>
                    </tr>
			        <tr>
                        <td><img src="ıcon/navigation.png"><label id="label"> Adres</label></td>
                        <td><textarea name="adres" class="alan"></textarea></td>
                    </tr>
			        <tr>
                    <td><img src="ıcon/telephone.png"><label id="label"> Telefon</label></td>
                        <td><input type="text"  maxlength="11" name="PHONE"/></td>
                    </tr>
                    </tr>
			
		</table>
		<div style="width:102px;height:150px;background-color:#19951e;margin-left:79%;position:absolute;margin-top:-550px"><img id="output" src="" width="100" height="150"></div>
		
		<div style="width:128px;height:40px;margin-left:78%;position:absolute;margin-top:-380px">
			<input type="file" id="file" name="poto" class="k_poto" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
			<label for="file" id="sec">Seçiniz...</label>
		</div>
		<div style="width:128px;height:40px;margin-left:70%;position:absolute;margin-top: -25px"><input type="submit" value="Kaydet" name="ogretmen_kayıt" class="ogretmen_kayıt_btn"></div>
		   
	</form>
		
	</div>
</div>
</div>

</body>
</html>