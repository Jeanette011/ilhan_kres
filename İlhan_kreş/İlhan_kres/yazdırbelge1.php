<?php
include("baglantim.php");
$vt_baglantısı=mysqli_connect("localhost",'root');
$vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
//silme butonu tıklandığında
if(isset($_GET["pid"])){
$kısı=$_GET['pid'];

//resmin konumunu bulalım
$buldum=mysqli_query($vt_baglantısı,"select* from ogretmen where ogretmen_id='$kısı'");
while($satir=mysqli_fetch_array($buldum))
{
    $fotobulundu=$satir['foto'];
    $tcsi=$satir['tc_kimlik'];
    $ad=$satir['ad_soyad'];
    $dogumu=$satir['d_tarih'];
    $adresi=$satir['adres'];
    $teli=$satir['telefon'];
} 
/*echo($fotobulundu);
echo($tcsi);
echo($ad);
echo($dogumu);
echo($adresi);
echo($teli);

*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link media="screen,print">
    <title>Document</title>
</head>
<style>
	#yazdırıcı{background-color: black;color: white;border-radius:5px;margin-left:250px;margin-top:400px}
	#yazdırıcı:hover{cursor: pointer;}
	@media print{
		#yazdırıcı{display: none};
	}
</style>
<body>
<font style="margin-left:25%;font-size:30px;color:Purple;font-family:'Times New Roman';">İlhan Yurt Öğretmen Bilgi</font>
<div style="margin-left:20%;height:600px;width:50%;background-color: silver;border-radius: 15px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">

	<img style="width:25%;height:25%;margin-left: 50px;" src="site_poto/ılhan_kres.png">
	<img style="width: 25%;height:25%;margin-left: 60px;margin-top:20px" src="<?php if(isset($fotobulundu))echo($fotobulundu);?>">
	
	<table cellpadding="5" cellspacing="5">
		<tr>
		<td>Adı:</td>
		<td><?php if(isset($ad))echo($ad);?></td>
		</tr>
		<tr>
		<td>TC:</td>
		<td><?php if(isset($tcsi))echo($tcsi);?></td>
		</tr>
		<tr>
		<td>Tel:</td>
		<td><?php if(isset($teli))echo($teli);?></td>
		</tr>
		<tr>
		<td>Doğum Tarihi:</td>
		<td><?php if(isset($dogumu))echo($dogumu);?></td>
		</tr>
		<tr>
		<td>Adres:</td>
		<td><?php if(isset($adresi))echo($adresi);?></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		</tr>
	</table>
	<a id="yazdırıcı"onClick="window.print()">yazdır</a>
</div>

</body>
</html>