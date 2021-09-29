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
} 
//Klasorden silelim  
unlink($fotobulundu);
//veritabanından silme işlemi 
$sil=mysqli_query($vt_baglantısı,"delete from ogretmen where ogretmen_id='$kısı'");
if($sil)
{
header('location:Ogretmen_list.php?durum=basarili');
exit();
}
}

?>
