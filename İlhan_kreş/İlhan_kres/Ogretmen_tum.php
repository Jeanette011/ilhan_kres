<?php   
include("baglantim.php");
$sorgu=$db->prepare('select *from ogretmen');
$sorgu->execute();
$ogretmenlıst=$sorgu->fetchAll(PDO::FETCH_OBJ);
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
#a{text-align:center;font-weight: bold;background-color:#2c3034;color:#4CAF50;;font-size:24px;}
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
        <td id="a">Tc Kimlik <img style="width:25px;height:25px;margin-top:2px" src="ıcon/id-cardsad.png"></td>
        <td id="a">Adı Soyadı <img style="width:25px;height:25px;margin-top:2px" src="ıcon/user.png"></td>
        <td id="a">Doğum Tarihi <img style="width:25px;height:25px;margin-top:2px" src="ıcon/birthday.png"></td>
        <td id="a">Adres <img style="width:25px;height:25px;margin-top:2px" src="ıcon/navigation.png"></td>
        <td id="a">Telefon <img style="width:25px;height:25px;margin-top:2px" src="ıcon/telephone.png"></td>
        <td id="a">Foto <img style="width:25px;height:25px;margin-top:2px" src="ıcon/image.png"></td>
        </tr>
        <?php 
        foreach($ogretmenlıst as $ogretmen){
        ?>
        <tr>
        <td id="b"><?=$ogretmen->ogretmen_id?></td>
        <td id="b"><?=$ogretmen->tc_kimlik?></td>
        <td id="b"><?=$ogretmen->ad_soyad?></td>
        <td id="b"><?=$ogretmen->d_tarih?></td>
        <td id="b"><?=$ogretmen->adres?></td>
        <td id="b"><?=$ogretmen->telefon?></td>
        
		<td id="b"><img style="width:50px;height:50px;border-radius:50px" src="<?=$ogretmen->foto?>"></td>
         </tr>
          <?php }?>
</table>
</div>
    </body>
</html>
</body>
</html>


