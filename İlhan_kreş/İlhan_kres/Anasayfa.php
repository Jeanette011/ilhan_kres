<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.n{width: 100%;height:auto;background-color:silver;margin-top:150px;position:absolute;}
.pngler{width: 200px;height:330px;background-color: mediumpurple;margin-top:15px;position:absolute;margin-left:25px;border-radius:15px}
</style>
<body bgcolor="orange">
<?php
include("Baslık.php");
?>
<div class="n">
	<div class="pngler">
		<div style="color: white;margin-left:25px;margin-top:25px">Toplam Öğretmen</div>
		<div style="width:150px;height:50px;background-color:crimson;margin-left:20px;margin-top:10px;border-radius: 10px">
			<div style="margin-top: 5px;margin-left:10px;float: left"><img  style="width:40px;height:40px;"src="ıcon/classroom.png"></div>
			<div style="margin-left:40px;float:left;margin-top:7px">
			<h1 style="color: white">
<?php  
				
$result=mysqli_query($vt_baglantısı,"SELECT count(*) as total FROM ogretmen");
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?>
			</h1></div>
			
		</div>
		
<div style="color: white;margin-left:30px;margin-top:25px;float: left">Toplam Öğrenci</div>
		<div style="width:150px;height:50px;background-color:crimson;margin-left:20px;margin-top:50px;border-radius: 10px">
			<div style="margin-top: 5px;margin-left:10px;float: left"><img  style="width:40px;height:40px;"src="ıcon/children.png"></div>
			<div style="margin-left:40px;float:left;margin-top:7px">
			<h1 style="color: white">
<?php  
				
$result2=mysqli_query($vt_baglantısı,"SELECT count(*) as total FROM ogrenci");
$data2=mysqli_fetch_assoc($result2);
echo $data2['total'];
?>
			</h1></div>
			
		</div>
		
<div style="color: white;margin-left:30px;margin-top:25px;float: left">Toplam Yönetici</div>
		<div style="width:150px;height:50px;background-color:crimson;margin-left:20px;margin-top:50px;border-radius: 10px">
			<div style="margin-top: 5px;margin-left:10px;float: left"><img  style="width:40px;height:40px;"src="ıcon/user.png"></div>
			<div style="margin-left:40px;float:left;margin-top:7px">
			<h1 style="color: white">
<?php  
				
$result3=mysqli_query($vt_baglantısı,"SELECT count(*) as total FROM kullanıcılar");
$data3=mysqli_fetch_assoc($result3);
echo $data3['total'];
?>
			</h1></div>
			
		</div>
		
	</div>
    <h1 style="margin-left:35%;color: white;margin-top: 15px">İlhan Kreş Anasaya Yönetim Paneli</h1>
<img style="margin-left: 42%;margin-top:30px" width="200" height="200" src="site_poto/ılhan_kres.png">
   
<img style="width: 100%;height:460px;margin-top:85px" src="site_poto/banner.jpg">

</div>

</body>
</html>