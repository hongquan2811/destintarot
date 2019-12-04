<?php
 date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj=new Db();

$danhsachsanpham=$obj->select("select * from sanpham");
//var_dump($danhsachsanpham);
$chitiet=$obj->select("select * from `chitietdh` WHERE `madh`=3");
//var_dump($chitiet);




if (isset($_SESSION['id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}

if(isset($_SESSION['thongbao']))
{

$thongbao=$_SESSION['thongbao'];
unset($_SESSION['thongbao']);
}

if(isset($_SESSION['thongbaoxuatxu']))
{

$thongbaoxuatxu=$_SESSION['thongbaoxuatxu'];
unset($_SESSION['thongbaoxuatxu']);
}

if(isset($_SESSION['thongbaokm']))
{

$thongbaokm=$_SESSION['thongbaokm'];
unset($_SESSION['thongbaokm']);
}

if(isset($_SESSION['thongbaodh']))
{

$thongbaodh=$_SESSION['thongbaodh'];
unset($_SESSION['thongbaodh']);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a id="C4" href="#">Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo $_SESSION['tendangnhap'];?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
				<br />
				<a href="web.php" title="View the Site">View the Site</a> | <a href="logout.php" title="Sign Out" >Sign Out </a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						<!--Dashboard<?php var_dump($_SESSION); ?>-->
						
					</a>       
				</li>
				
				<li> 
					<a href="index.php" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					Quản lý trang bán hàng
					</a>
					
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Pages
					</a>
					<ul>
						<li><a href="#">Create a new Page</a></li>
						<li><a href="#">Manage Pages</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Image Gallery
					</a>
					<ul>
						<li><a href="#">Upload Images</a></li>
						<li><a href="#">Manage Galleries</a></li>
						<li><a href="#">Manage Albums</a></li>
						<li><a href="#">Gallery Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="#">General</a></li>
						<li><a href="#">Design</a></li>
						<li><a href="#">Your Profile</a></li>
						<li><a href="#">Users and Permissions</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					Download From <a href="http://www.exet.tk">exet.tk</a></div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2><?php echo $_SESSION['tendangnhap'];?></h2>
			<!--<p id="page-intro">What would you like to do?</p>-->
			
		<!--	<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul> End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3></h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tabsanpham" class="default-tab">Sản phẩm</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tabxuatxu">Xuất xứ</a></li>
						<li><a href="#tabkhuyenmai">Khuyến mãi</a></li>
						<li><a href="#tabdonhang">Đơn hàng</a></li>
						<li><a href="#tab2">Forms</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					

<div class="tab-content"  id="tabdonhang"> <!-- This is the target div. id must match the href of this div's tab -->


<!---- Them ---->
					


						<form action="xulydh.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>Mã đơn hàng <input readonly class="text-input small-input" type="text" id="madh" name="madh" /><?php if(isset($thongbaodh)) echo "  $thongbaodh";?>

								</p>
								
								<p>Ngày giao hàng <input class="text-input small-input" type="datetime-local" id="ngaygh" name="ngaygh" />
								</p>
								
								
								<p>Trang thái đơn hàng<select name="math">
									<option value="">Trạng thái</option>
									<?php $rows_xuatxu=$obj->select("select * from trangthai "); 
									foreach ($rows_xuatxu as $value) 

										{?>
										<option value="<?php echo $value['math'] ?>"> <?php echo $value['math'].'-'.($value['trangthai']); ?></option>
									<?php }?>
									</select>
									</p>
								<p>
									<label>Mô tả chi tiết đơn hàng</label>
								<textarea  readonly id="motadh" name="motadh" cols="79" rows="10">
								</textarea>
								</p>
			
								<p>
									<!--<input class="button" type="submit" name="them" value="Thêm" />
										<input class="button" type="submit" name="xoa" value="Xóa" />
									--><input class="button" type="submit" name="sua" value="Sửa" />
									

									
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
									
						<table>
							
							<thead>
								<tr>
								   <th>Mã ĐH</th>
								   <th>Ngày đặt</th>
								   <th>Ngày giao</th>
								   <th>Trạng thái ĐH</th>
								   <th>Mã khách hàng</th>
								   <th>Người nhận</th>
								   <th>Địa chỉ</th>
								   <th>Số điện thoại</th>
								   <th>Tổng</th>
								   <th>Edit</th>
								   
								</tr>
								
							</thead>
						 
							
				<form action="timdh.php" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Tìm kiếm.." name="timdh">
      <input class="button" type="submit" name="tim" value="Tìm">
       		 </form>						
						<tbody>

				
						 <?php 
						 $tim;
						 	if(isset($_SESSION['timdh']))
						 {
						 $tim=$_SESSION['timdh'];
						 $dssanpham=$obj->select("SELECT * FROM `sanpham` WHERE `tensp` LIKE '%$tim%'");
						 unset($_SESSION['timdh']);
						 }				  	
						 else {
						  	$dssanpham=$obj->select("SELECT * FROM `donhang`");
						  } 
						 foreach ($dssanpham as $sanpham) {
						 	?>  
									
									<tr>
									<td><?php echo $sanpham["madh"]; ?></td>
									<td><?php echo $sanpham["ngaydh"];?></td>
									<td><?php echo $sanpham["ngaygh"];?></td>
									<td><?php  

									$e=$obj->select("select * from trangthai");

									
									

									 foreach ($e as $value) {
									 	if($value["math"]==$sanpham["math"]){
									 		echo ($value["trangthai"]);
									 	}
									 }

								

									?></td>
									<td><?php echo $sanpham["makh"];?></td>
									<td><?php echo $sanpham["tenkh"];?></td>
									<td><?php echo $sanpham["diachikh"];?></td>
									<td><?php echo $sanpham["sdtkh"];?></td>


									<!--<td><?php echo number_format($tong ,0 ,'.' ,'.').' Đ';?></td>-->
									
								

									<td><?php $tong=0;

									$e=$obj->select("select * from chitietdh");
									 foreach ($e as $value) {
									 	if($value["madh"]==$sanpham["madh"]){
									 		$tong+=(((int)$value["giasp"])*((int)$value["soluong"]));
									 	}
									 }
									 echo number_format($tong ,0 ,'.' ,'.').' Đ';

									?></td>


									<td>
										<!-- Icons -->
										 <a id="showdh-btn-<?php echo $sanpham["madh"];?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										
									</td>
								</tr>  


<script language="javascript">
            // Lấy đối tượng
            var buttonshowdh = document.getElementById("showdh-btn-<?php echo $sanpham["madh"];?>");
            // Thêm sự kiện cho đối tượng
            buttonshowdh.onclick = function()
            {
            	var masp = document.getElementById("madh");
            	masp.value="<?php echo($sanpham["madh"]);?>";
            	var masp = document.getElementById("motadh");
            	masp.value="<?php 
            	$x=$sanpham['madh'];
            	$t=1;
            	$chitiet=$obj->select("select * from `chitietdh` WHERE `madh`=$x");
            	
				foreach ($chitiet as $value) 				
				{

					//var_dump($value);

					$a1=$value['masp'];
					$a2=$value['giasp'];
					$a3=$value['soluong'];
					$tenssp=$obj->select("select * from `sanpham` WHERE `masp`=$a1");
					$a4=$tenssp[0]['tensp'];
					echo $t;echo ".";
					echo $a4.'-Giá:'.$a2;			
					echo '-Số lượng:'.$a3;
					echo '___';
					
				}
				
            ?>";
            }

        </script>	

								<?php
						 }
						 ?>
						 							
							
								
								
								
							
							</tbody>
							
						</table>
						
					</div> <!-- End #tabdonhang -->



					<div class="tab-content default-tab  "  id="tabsanpham"> <!-- This is the target div. id must match the href of this div's tab -->


<!---- Them ---->
					


						<form action="xulysp.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>Mã sản phẩm <input readonly class="text-input small-input" type="text" id="masp" name="masp" /><?php if(isset($thongbao)) echo "  $thongbao";?>

								</p>
								<p>Tên sản phẩm <input class="text-input small-input" type="text" id="tensp" name="tensp" />
								</p>
								<p>Giá tiền <input class="text-input small-input" type="text" id="giasp" name="giasp" />
								</p>
								<p>Chọn một hình ảnh <input type="file" name="anhsp" id="anhsp"  />				</p>  

							<!--	<p>Trạng thái sản phẩm <form>
									<input checked="checked" name="trangthai" type="radio" value="1" />Còn hàng
								<input name="trangthai" type="radio" value="0" />Hết hàng

								 			</form>-->
								</p>
								<p>Xuất xứ <select name="maxuatxu">
									<option value="">Chọn xuất xứ</option>
									<?php $rows_xuatxu=$obj->select("select * from xuatxu "); 
									foreach ($rows_xuatxu as $value) 

										{?>
										<option value="<?php echo $value['maxuatxu'] ?>"> <?php echo strtoupper($value['tenxuatxu']); ?></option>
									<?php }?>
									</select>
									</p>
								<p>
									<label>Mô tả</label>
									<textarea  id="mota" name="mota" cols="79" rows="10"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" name="them" value="Thêm" />
									<input class="button" type="submit" name="sua" value="Sửa" />
									<input class="button" type="submit" name="xoa" value="Xóa" />

									
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
									
						<table>
							
							<thead>
								<tr>
								   <th>Ảnh</th>
								   <th>Mã</th>
								   <th>Tên</th>
								   <th>Giá tiền</th>
								   <th>Xuất xứ</th>
								   <th>Ngày tạo</th>
								   <th>Edit</th>
								   
								</tr>
								
							</thead>
						 
							
				<form action="timsp.php" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Tìm kiếm.." name="timtensp">
      <input class="button" type="submit" name="tim" value="Tìm">
       		 </form>						
						<tbody>

				
						 <?php 
						 $tim;
						 	if(isset($_SESSION['timtensp']))
						 {
						 $tim=$_SESSION['timtensp'];
						 $dssanpham=$obj->select("SELECT * FROM `sanpham` WHERE `tensp` LIKE '%$tim%'");
						 unset($_SESSION['timtensp']);
						 }				  	
						 else {
						  	$dssanpham=$obj->select("SELECT * FROM `sanpham`");
						  } 
						 foreach ($dssanpham as $sanpham) {
						 	?>  <tr>
									
									<td><img style="width:50px;height:50px;" src="image/<?php echo $sanpham["anhsp"];?>" /></td>
									<td><?php echo $sanpham["masp"]; ?></td>
									<td><?php echo $sanpham["tensp"];?></td>
									<td><?php echo number_format($sanpham["giasp"] ,0 ,'.' ,'.').' Đ';?></td>
									<!--<td><?php echo $sanpham["maxuatxu"];?></td>-->
								<td>	<?php 
									$e=$obj->select("select * from xuatxu");


									 $sanpham["maxuatxu"];

									 foreach ($e as $value) {
									 	if($value["maxuatxu"]==$sanpham["maxuatxu"]){
									 		echo strtoupper($value["tenxuatxu"]);
									 	}
									 }

									// var_dump($ten);
									 ?></td>
									<td><?php echo $sanpham["ngaytao"]; ?></td>




									<td>
										<!-- Icons -->
										 <a href="#C4"  id="show-btn-<?php echo($sanpham["masp"]);?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										
									</td>
								</tr>  


<script language="javascript">
            // Lấy đối tượng
            var buttonshow = document.getElementById("show-btn-<?php echo($sanpham["masp"]);?>");
             
            // Thêm sự kiện cho đối tượng
            buttonshow.onclick = function()
            {
            	var masp = document.getElementById("masp");
            	masp.value="<?php echo($sanpham["masp"]);?>";
            //	var tensp = document.getElementById("tensp");
            //	tensp.value="<?php echo($sanpham["tensp"]);?>";
            //	var giasp = document.getElementById("giasp");
            //	giasp.value="<?php echo($sanpham["giasp"]);?>";
            //	var anhsp = document.getElementById("anhsp");    
            	
            //	var mota = document.getElementById("mota");
            //	mota.value="<?php echo NL2br(($sanpham["mota"])); ?>";
            	

            };

        </script>	

								<?php
						 }
						 ?>
						 							
							
								
								
								
							
							</tbody>
							
						</table>
						
					</div> <!-- End #tabsanpham -->

<div class="tab-content" id="tabxuatxu"> <!-- This is the target div. id must match the href of this div's tabhơ -->



<!---- Them ---->
					


						<form action="xulyxuatxu.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>Mã Xuất xứ <input readonly class="text-input small-input" type="text" id="maxuatxu" name="maxuatxu" /><?php if(isset($thongbaoxuatxu)) echo "  $thongbaoxuatxu";?>
								</p>
								<p>Tên Xuất xứ <input class="text-input small-input" type="text" id="tenxuatxu" name="tenxuatxu" />
								</p>
								<p>
									<input class="button" type="submit" name="them" value="Thêm" />
									<input class="button" type="submit" name="sua" value="Sửa" />
									<input class="button" type="submit" name="xoa" value="Xóa" /></p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
									
						<table>
							
							<thead>
								<tr>
								   
								   <th>Mã</th>
								   <th>Tên</th>
								   								   <th>Edit</th>

								   
							   
								</tr>
								
							</thead>
						 
							

										
						<tbody>

				
						 <?php 
						 
						  	$dssanpham=$obj->select("SELECT * FROM `xuatxu`");
						  
						 foreach ($dssanpham as $sanpham) {
						 	?>  <tr>
									
									
									<td><?php echo $sanpham["maxuatxu"]; ?></td>
									<td><?php echo $sanpham["tenxuatxu"];?></td>
									<td>
										<!-- Icons -->
										 <a id="showxuatxu-btn-<?php echo($sanpham["maxuatxu"]);?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										
									</td>
								</tr>  


<script language="javascript">
            // Lấy đối tượng
            var buttonshow = document.getElementById("showxuatxu-btn-<?php echo($sanpham["maxuatxu"]);?>");
             
            // Thêm sự kiện cho đối tượng
            buttonshow.onclick = function()
            {
            	var masp = document.getElementById("maxuatxu");
            	masp.value="<?php echo($sanpham["maxuatxu"]);?>";
            	var tensp = document.getElementById("tenxuatxu");
            	tensp.value="<?php echo($sanpham["tenxuatxu"]);?>";
            	
            	

            };

        </script>	

								<?php
						 }
						 ?>
						 							
							
								
								
							
							</tbody>
							
						</table>
						
					</div> <!-- End #tabxuatxu -->

					

<div class="tab-content" id="tabkhuyenmai"> <!-- This is the target div. id must match the href of this div's tab -->



<!---- Them ---->
					


						<form action="xulykm.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							<!--	<p><?php  $now = time();

								$time = date_parse_from_format('Y-m-d H:i:s', $now);
								echo "$time";
								?>--></p>
								<p>Mã khuyến mãi<input readonly class="text-input small-input" type="text" id="makm" name="makm" /><?php if(isset($thongbaokm)) echo "  $thongbaokm";?>
								</p>
								<p>Ngay bắt đầu<input class="text-input small-input" type="datetime-local" id="ngaybd" name="ngaybd" />
								</p>
								<p>Ngay kết thúc<input class="text-input small-input" type="datetime-local" id="ngaykt" name="ngaykt" />
								</p>

								<p>Xuất xứ <select name="maxuatxu">
									<option value="">Chọn xuất xứ</option>
									<?php $rows_xuatxu=$obj->select("select * from xuatxu "); 
									foreach ($rows_xuatxu as $value) 

										{?>
										<option value="<?php echo $value['maxuatxu'] ?>"> <?php echo strtoupper($value['tenxuatxu']); ?></option>
									<?php }?>
									</select>
									</p>
									<p>Số tiền<input class="text-input small-input" type="text" id="sotienkm" name="sotienkm" />
								</p>

								<p>
									<input class="button" type="submit" name="them" value="Thêm" />
									<input class="button" type="submit" name="sua" value="Sửa" />
									<input class="button" type="submit" name="xoa" value="Xóa" /></p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
									
						<table>
							
							<thead>
								<tr>
								   
								   <th>Mã khuyến mãi</th>
								  
								   <th>Ngày bắt đầu</th>
								   <th>Ngày kết thúc</th>
								    <th>Ngày tạo</th>
								   <th>Công ty</th>
								   <th>Số tiền</th>
								   <th>Chỉnh sửa</th>
								   <th>Edit
								   </th>

								 
							   
								</tr>
								
							</thead>
						 
							

										
						<tbody>

				
						 <?php 
						 
						  	$dssanpham=$obj->select("SELECT * FROM `khuyenmaisp`");
						 
						  	$time=time();
						 foreach ($dssanpham as $sanpham) {
						 	if (strtotime(date('Y-m-d H:i:s'))<strtotime($sanpham['ngaykt'])) {
						 	?>  <tr>
									
									
									<td><?php echo $sanpham["makm"]; ?></td>
									<td><?php echo $sanpham["ngaybd"];?></td>
									<td><?php echo $sanpham["ngaykt"];?></td>
									<td><?php echo $sanpham["ngaytao"];?></td>
									<td>	<?php 
									$e=$obj->select("select * from xuatxu");


									 

									 foreach ($e as $value) {
									 	if($value["maxuatxu"]==$sanpham["maxuatxu"]){
									 		echo strtoupper($value["tenxuatxu"]);
									 	}
									 }

									// var_dump($ten);
									 ?></td>
									<td> <?php echo number_format($sanpham["sotienkm"] ,0 ,'.' ,'.').' Đ';?></td>
									 <td><?php echo $sanpham["admin"]; echo "-"; 

									 $e=$obj->select("select * from admin");
									 foreach ($e as $value) {
									 	if($value["id"]==$sanpham["admin"]){
									 		echo ($value["ten"]);
									 	}
									 }

									  ?></td>
									<td>
										<!-- Icons -->
										 <a id="showkm-btn-<?php echo($sanpham["makm"]);?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										
									</td>
								</tr>  


<script language="javascript">
            // Lấy đối tượng
            var buttonshow = document.getElementById("showkm-btn-<?php echo($sanpham["makm"]);?>");
             
            // Thêm sự kiện cho đối tượng
            buttonshow.onclick = function()
            {
            	var masp = document.getElementById("makm");
            	masp.value="<?php echo($sanpham["makm"]);?>";
            };

        </script>	

								<?php
						 }}
						 ?>
						 							
							
								
								
							
							</tbody>
							
						</table>
						
					</div> <!-- End #tabxuatxu -->







					<div class="tab-content" id="tab2">
					
						<form action="#" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Small form input</label>
										<input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								
								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>
								
								<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>
								
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>
								
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->    


					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Content box left</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right closed-box">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Content box right</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<!-- End Notifications -->
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>
