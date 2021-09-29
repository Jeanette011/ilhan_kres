<?php   
include("baglantim.php");
$sorgu=$db->prepare('select *from ogrenci');
$sorgu->execute();
$ogrenci_lıst=$sorgu->fetchAll(PDO::FETCH_OBJ);
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
#a{text-align:center;font-weight: bold;background-color:#2c3034;color:#4CAF50;;font-size:24px;margin-top:10px;}
#b{text-align:center;color:white;}
.yerles{width: 100%;height:auto;margin-top:150px;position:absolute;}
.silme_butonu{color:white;text-decoration: none;background-color: red;display:block;width:60px;height:40px;margin:0px auto;padding-top: 20px;border-radius: 15px;font-weight: bold}
.silme_butonu:hover{background-color:white;color:darkred;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);}
</style>
<body bgcolor="silver">
<?php   
include("Baslık.php");
?>
<div class="yerles">
<table border=0 bgcolor="#212529" bordercolor="silver" cellspacing="5" width=100% cellpadding="5">
<tr>
        <td id="a">ID <img style="width:25px;height:25px;margin-top:2px" src="ıcon/fingerprint-scan.png"></td>
        <td id="a">Adı Soyadı <img style="width:25px;height:25px;margin-top:2px" src="ıcon/user.png"></td>
        <td id="a">Tc Kimlik <img style="width:25px;height:25px;margin-top:2px" src="ıcon/id-cardsad.png"></td>
        <td id="a">Doğum Tarihi <img style="width:25px;height:25px;margin-top:2px" src="ıcon/birthday.png"></td>
        <td id="a">Veli Adı <img style="width:25px;height:25px;margin-top:2px" src="ıcon/parents.png"></td>
        <td id="a">Veli Tel <img style="width:25px;height:25px;margin-top:2px" src="ıcon/telephone.png"></td>
        <td id="a">Adres <img style="width:25px;height:25px;margin-top:2px" src="ıcon/navigation.png"></td>
        <td id="a">Öğretmen <img style="width:25px;height:25px;margin-top:2px" src="ıcon/teacher.png"> </td>
        <td id="a">Fotoğraf <img style="width:25px;height:25px;margin-top:2px" src="ıcon/image.png"></td>
        <td id="a" >Sil <img style="width:25px;height:25px;margin-top:2px" src="ıcon/Actions-user-group-delete-icon.png"></td>
        </tr>
        <?php 
        $vt_baglantısı=mysqli_connect("localhost",'root');
        $vt_secimi=mysqli_select_db($vt_baglantısı,'ılhan_kres');
        foreach($ogrenci_lıst as $ogrenci){
            $no_ad=$ogrenci->ogretmeni;
$buldum=mysqli_query($vt_baglantısı,"select* from ogretmen where ogretmen_id='$no_ad'");
while($satir=mysqli_fetch_array($buldum))
{
    $ad=$satir['ad_soyad'];
    $ogretmen_foto=$satir['foto'];
}
        ?>
        <tr>
        <td id="b"><?=$ogrenci->Ogr_id?></td>
        <td id="b"><?=$ogrenci->adsoyad?></td>
        <td id="b"><?=$ogrenci->tc?></td>
        <td id="b"><?=$ogrenci->d_tarih?></td>
        <td id="b"><?=$ogrenci->veli_ad_soyad?></td>
        <td id="b"><?=$ogrenci->veli_tel?></td>
        <td id="b"><?=$ogrenci->adres?></td>
        <td id="b"><?php echo("<p style='font-size:17px;color:red;margin-top:5px'>".$ad."</p>");?><img style="width:50px;height:50px;border-radius:50px" src="<?php echo($ogretmen_foto);?>"></td>
        
		<td id="b"><img style="width:50px;height:50px;border-radius:50px" src="<?=$ogrenci->foto?>"></td>
        <td id="b"><a class="silme_butonu" href="ogr_sil.php?pid=<?=$ogrenci->Ogr_id?>">Sil</a></td>
         </tr>
          <?php }?>
</table>
</div>
    </body>
</html>
</body>
</html>


