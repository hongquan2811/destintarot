<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj=new Db();
//$dansachsanphamngaytao1=$obj->select("SELECT * FROM `sanpham` ORDER BY `ngaytao` DESC LIMIT 0,4");
$today=date('YmdHis');
$danhsachkhuyenmai=$obj->select("SELECT * FROM `khuyenmaisp` where `ngaykt`>$today");
//if(isset($_SESSION['dssp']))
//$x=$_SESSION['dssp'];
//var_dump($_Session);
//var_dump($dssp);
?>
<!DOCTYPE HTML>
<html>
<?php		include"subpage/head.php";?>
<body>
  <div class="wrap">
	<div class="header">	
		<?php

		include"subpage/header_top.php";
		include"subpage/h_menu.php";
		include"subpage/header_bottom.php";				
			
			
		?>		
	</div>
	 <div class="clear"></div>
 <div id="main">
 	

<br>
<br>
<br>
<br>
<form action="xulydonhang.php" method="post" enctype="multipart/form-data">	
<table style="border:1px solid #ccc; width: 100%">
	

<?php   if(isset($_SESSION['dssp']))   

				foreach ($_SESSION['dssp'] as $key => $value) { 
				$key;
				$gia=$value['gia'];
				$soluongsp=$value['luong'];

				$sanpham=$obj->select("select * from `sanpham` where `masp`=$key  ");
	?>
	<tr>
		<td>		<img style="width: 85px;height:60px;" src="admin/image/<?php echo $sanpham[0]['anhsp'];?>"></td>
		<td >		<?php echo $sanpham[0]['tensp'];?>												</td>
		<td>		<?php
					 	echo number_format($gia ,0 ,'.' ,'.').' Đ';
		?>														</td>
<td><p>Số lượng <select  name="<?php echo $sanpham[0]['masp']; ?>" id="soluong" >
									
									<?php 
										for ($i=0; $i <11 ; $i++) { 
											
										
									?>
										<option <?php if($soluongsp==$i) echo "selected='selected'"; ?> value="<?php echo $i ?>"> <?php echo $i?></option>
									<?php }?>

									




									</select>
									</p>														</td>



		
		
	</tr>
	
<?php }?>

	
</table>				
							<p>Tên khách hàng:<input type="text" id="tenkh" name="tenkh" />	</p>
							<p>Địa chỉ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="diachi" name="diachi" />	</p>
						<p>Số điện thoại: <input type="text" id="sodienthoai" name="sodienthoai" />
						</p>
								<p><?php  var_dump($_SESSION); ?></p>						
					<input class="button" type="submit" name="them" value="Đặt hàng" />
										
							<div class="clear"></div><!-- End .clear -->
							
						</form>

 </div>
</div>
   	<?php
   		include"subpage/footer.php";
   	?>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
</body>
</html>

