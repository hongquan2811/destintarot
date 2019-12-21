<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj=new Db();
var_dump($_POST);
var_dump($_SESSION);


if(isset($_POST['them'])&&$_POST['tenkh']!=""&&$_POST['diachi']!=""&&$_POST['sodienthoai']!=""&&isset($_SESSION['dssp']))
{
$tongsl=0;
$dssp=$_SESSION['dssp'];
foreach ($dssp as $key => $value) {
	$l=$_POST[$key];//lấy số lượng sản phẩm theo mã san phẩm
	$tongsl+=$l;				}
if($tongsl>=0)
{
$tenkh=$_POST['tenkh'];
$diachikh=$_POST['diachi'];
$sodienthoai=$_POST['sodienthoai'];
$obj->INSERT("INSERT INTO `donhang`(`math`, `tenkh`, `diachikh`, `sdtkh`) VALUES (1,'$tenkh','$diachikh','$sodienthoai')");

$x=$obj->SELECT("SELECT * FROM `donhang` ORDER BY `donhang`.`ngaydh` DESC LIMIT 1");
$madh=$x[0]['madh'];



$dssp=$_SESSION['dssp'];
foreach ($dssp as $key => $value) {
	$gia=$value['gia'];
	$l=$_POST[$key];//lấy số lượng sản phẩm theo mã san phẩm
	if($l==0)
		continue;
	else
	$obj->INSERT("INSERT INTO `chitietdh`( `madh`, `masp`, `giasp`, `soluong`) VALUES ($madh,$key,$gia,$l)");
}

	unset($_SESSION['dssp']);
	 header('Location: index.php');

}
}
//echo "$o";

//	$obj->INSERT("INSERT INTO `chitietdh`( `madh`, `masp`, `giasp`, `soluong`) VALUES ()");

//NSERT INTO `donhang`(`math`, `tenkh`, `diachikh`, `sdtkh`) VALUES ()


//var_dump($x);
header('Location: quanlygiohang.php');