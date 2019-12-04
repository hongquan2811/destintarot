<?php
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
session_start();
if (isset($_SESSION['id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}
unset($_SESSION['thongbao']);
$obj=new Db();
$masp=$_POST['masp'];
$tensp=$_POST['tensp'];
$giasp=$_POST['giasp'];
$trangthai=1;
$mota=preg_replace('/[\s]+/mu', ' ',NL2br($_POST['mota']) );
$maxuatxu=$_POST['maxuatxu'];
$tenanhsp=$_FILES['anhsp']['name'];
$anhsp_tmp=$_FILES['anhsp']['tmp_name'];
move_uploaded_file($anhsp_tmp,'image/'.$tenanhsp);





//var_dump($_POST);
//var_dump($_FILES);
if(isset($_POST['them'])){		

	if($tensp==''||$giasp==''||$mota==''||$maxuatxu==''||$tenanhsp=='')
		{	
			header('Location: index.php');
			$_SESSION['thongbao']='Không được để trống';
		}
	//echo "insert into `sanpham`(`tensp`, `giasp`,`mota`, `maxuatxu`, `anhsp`, `trangthai`) values ('$tensp',$giasp,'$mota',$maxuatxu,'$tenanhsp',$trangthai)";
	else
	{
	$obj->insert("insert into `sanpham`(`tensp`, `giasp`,`mota`, `maxuatxu`, `anhsp`, `trangthai`) values ('$tensp',$giasp,'$mota',$maxuatxu,'$tenanhsp',$trangthai)");
	$_SESSION['thongbao']='Thành công thêm';
}
}
if(isset($_POST['sua'])){	
	//echo "UPDATE `sanpham` SET `tensp`='$tensp',`giasp`=$giasp,`mota`='$mota',`maxuatxu`=$maxuatxu,`anhsp`='$tenanhsp',`trangthai`=$trangthai WHERE masp=$masp";
	if($tensp==''||$giasp==''||$mota==''||$maxuatxu==''||$tenanhsp=='')
		{	
			header('Location: index.php');
			$_SESSION['thongbao']='Không được để trống';
		}
		$sua='';
		if($tensp!='')
			$sua.="`tensp`='$tensp',";
		if($giasp!='')
			$sua.="`giasp`=$giasp,";
		if($mota!='')
			$sua.="`mota`='$mota',";
		if($maxuatxu!='')
			$sua.="`maxuatxu`=$maxuatxu,";
		if($tenanhsp!='')
			$sua.="`anhsp`='$tenanhsp',";
		
	$sua=substr($sua, 0, -1);
	echo "$sua";
	$obj->update("UPDATE `sanpham` SET $sua WHERE masp=$masp");
	$_SESSION['thongbao']='Thành công sửa';
}
if(isset($_POST['xoa'])){	
	echo "DELETE FROM `sanpham` WHERE 'masp'=$masp";
	$obj->update("DELETE FROM `sanpham` WHERE `sanpham`.`masp` = $masp");
	$_SESSION['thongbao']='Thành công xóa';
}


header('Location: index.php');
