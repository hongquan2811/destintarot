<?php 

include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
session_start();
if (isset($_SESSION['id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}
unset($_SESSION['thongbaoxuatxu']);
$obj=new Db();
$maxuatxu=$_POST['maxuatxu'];
$tenxuatxu=$_POST['tenxuatxu'];
var_dump($_POST);

if(isset($_POST['them'])){		

	if($tenxuatxu=='')
		{	
			header('Location: index.php');
			$_SESSION['thongbaoxuatxu']='Không được để trống';
		}
	//echo "insert into `sanpham`(`tensp`, `giasp`,`mota`, `maxuatxu`, `anhsp`, `trangthai`) values ('$tensp',$giasp,'$mota',$maxuatxu,'$tenanhsp',$trangthai)";
	else
	{
		echo "insert into `xuatxu`(`tenxuatxu`) values ('$tenxuatxu')";
	$obj->insert("insert into `xuatxu`(`tenxuatxu`) values ('$tenxuatxu')");
	$_SESSION['thongbaoxuatxu']='Thành công thêm';
}
}
if(isset($_POST['sua'])){	
	//echo "UPDATE `sanpham` SET `tensp`='$tensp',`giasp`=$giasp,`mota`='$mota',`maxuatxu`=$maxuatxu,`anhsp`='$tenanhsp',`trangthai`=$trangthai WHERE masp=$masp";
		$sua='';
		if($tenxuatxu!='')
			$sua.="`tenxuatxu`='$tenxuatxu',";
		
		
	$sua=substr($sua, 0, -1);
	echo "UPDATE `xuatxu` SET $sua WHERE maxuatxu=$maxuatxu";
	$obj->update("UPDATE `xuatxu` SET $sua WHERE maxuatxu=$maxuatxu");
	$_SESSION['thongbaoxuatxu']='Thành công sửa';
}
if(isset($_POST['xoa'])){	
	
	$obj->update("DELETE FROM `xuatxu` WHERE `xuatxu`.`maxuatxu` = $maxuatxu");
	$_SESSION['thongbaoxuatxu']='Thành công xóa';
}


header('Location: index.php');