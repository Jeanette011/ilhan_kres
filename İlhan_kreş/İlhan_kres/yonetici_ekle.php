<?php
//Bağlanti oluşturalım
$vt_baglantısı=mysqli_connect("localhost",'root')or die("Bağlanti Basarısız");
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
//poto kaydet
if(isset($_POST['kaydet']))
{
    $durum="pasif";
    $cekilen_k_ad=$_POST['kullanıcı_ad'];
    $cekilen_ad_soyad=$_POST['ısım_soyısım'];
	$cekilen_par=$_POST['pass'];
	$cekilen_unvan=$_POST['unvan_ısımı'];
    $cekilen_poto=$_FILES['poto']['name'];
    $tmp_name=$_FILES['poto']['tmp_name'];
    if($cekilen_poto){
        $kaydet_poto_loc="mudur_foto/$cekilen_poto";
        move_uploaded_file($tmp_name,$kaydet_poto_loc);
        $yonetici_kaydet=mysqli_query($vt_baglantısı,"insert into kullanıcılar (kullanıcı_adı,ad_soyad,parola,unvan,resmi,durum) values('$cekilen_k_ad','$cekilen_ad_soyad','$cekilen_par','$cekilen_unvan','$kaydet_poto_loc','$durum')");
        if($yonetici_kaydet)
        {
                echo "<font color='green'><b>Tamamlandı<b></font><br>";
                echo"<br>";
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
.y{width: 100%;height:auto;margin-top:150px;position:absolute;}
.a{width: 80%;height:auto;margin-left: 10%;margin-top: 50px;border-radius: 50px;position: absolute;}
#a1{width: 100%;height:80px;background-color:#19951e;position: absolute;border-top-left-radius:50px;border-top-right-radius: 50px}
#a2{width: 100%;height:600px;background-color:#f8f8f8;position:absolute;margin-top:80px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
#a2_1{width:80%;height: 100%;margin-left:200px;position:absolute;float:left;}
input[type=text],[type=password]{
  width: 100%;
  padding: 15px 140px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input.y_kayıt_btn{
  background-color: #4CAF50;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/diskette.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
}
input.y_kayıt_btn:hover {
  background-color: #45a049;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
	input.k_poto{display: none;}
#sec{
		background-color: #4CAF50;border: none;color: white;padding: 12px 35px;text-align:right;text-decoration:none;display: inline-block;font-size: 12px;margin: 10px 2px;transition-duration: 0.4s;cursor: pointer;border: 1px solid #4CAF50;background-image: url("ıcon/image.png");background-repeat: no-repeat;background-position: 5px 5px;font-weight: bold;
	}
	#sec:hover{
		background-color: #45a049;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
#label{font-size:25px;color:black;font-weight: bold;}
</style>
<body bgcolor="silver">
<?php
include("Baslık.php");
?>
<div class="y">
<div class="a">
	
	<div id="a1">
		<img src="ıcon/id-card.png" style="margin-left:35px;float:left">
	<font style="margin-left:50px;float:left;margin-top:20px;font-size:50px;font-family:'Times New Roman';color: white">Yönetici Ekle</font>
    
	</div>
	<div id="a2">
		<div id="a2_1">
			
	<form action="" method="Post" enctype="multipart/form-data">
                <table cellpadding="20" cellspacing="20">
                    <tr>
						
                        <td><img src="ıcon/id-cardsad.png"><label id="label"> Kullanıcı Adı</label></td>
                        <td><input type="text" name="kullanıcı_ad"/></td>
                    </tr>
                    <tr>
                        <td><img src="ıcon/user.png"><label id="label"> Ad Soyad</label></td>
                        <td><input type="text" name="ısım_soyısım"/></td>
                    </tr>
                    <tr>
                        <td><img src="ıcon/secure.png"><label id="label"> Parola</label></td>
                        <td><input type="password" name="pass"/></td>
                    </tr>
                    <tr>
                        <td><img src="ıcon/military-rank.png"><label id="label"> Ünvanı</label></td>
                        <td><input type="text" name="unvan_ısımı"/></td>
                    </tr>
					<tr>
					 <td></td>
                    </tr>  
                    <tr>
					  <td><input type="file" id="file" name="poto" class="k_poto"/><label for="file" id="sec">Seçiniz...</label></td>
						
					<td></td>
                    </tr> 
					<tr>
						<td></td>
						<td></td>
					<td><input type="submit" value="Kaydet" name="kaydet" class="y_kayıt_btn"></td>
					</tr>
                    
                </table>
            </form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
