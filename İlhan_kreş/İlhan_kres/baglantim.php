<?php
try{
	$db=new PDO("mysql:host=localhost; dbname=ılhan_kres; charest=utf8",'root','');
	//echo'veritabanı Baglantisi basarılı';
}catch(Exception $e){
	echo $e->getMessage();
}
?>