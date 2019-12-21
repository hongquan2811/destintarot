<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
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

			$x=$_GET['masp'];

include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
$obj=new Db();
$sanpham=$obj->select("SELECT * FROM `sanpham` where `masp`=$x");
//$today=date('YmdHis');
$danhsachkhuyenmai=$obj->select("SELECT * FROM  `chitietkm` where `id`=1")
//var_dump($sanpham);



//function themsp($i)
//{
//	if(isset($_SESSION['$i']))
//		$_SESSION['$i']+=1;
//	else
//		$_SESSION['$i']=1;
//}
		?>		
	
	</div>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img  src="admin/image/<?php echo $sanpham[0]['anhsp']?>" alt="" />	<!-- Ảnh sản phẩm	 -->			
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $sanpham[0]['tensp']?></h2><!-- Tên sản phẩm	 -->	
					<p><?php echo $sanpham[0]['mota']?></p>	<!-- Thông tin chi tiết -->				
					<div class="price">

						<p>Giá: <span ><strike  style="font-size:13px"><?php echo number_format($sanpham[0]["giasp"] ,0 ,'.' ,'.').' Đ';?></strike>

<?php
					 	$tongkm=0;
					 	foreach ($danhsachkhuyenmai as $item) {

					 		if($item['maxuatxu']==$sanpham[0]["maxuatxu"])
					 			$tongkm+=$item['sotienkm'];
					 	}
					 	$gia=$sanpham[0]["giasp"]-$tongkm;
					 	$masp=$sanpham[0]["masp"];
					 	echo number_format($gia ,0 ,'.' ,'.').' Đ';
						?>
						</span></p><!-- Giá sản phẩm -->	
					</div>
					
					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img src="images/youtube.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/facebook.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/twitter.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/linkedin.png" alt=""></a></li>
			    		</ul>
					</div>
				<div class="add-cart" h >
					
					<div  class="button"><span ><a href="xulythemgiohang.php?masp=<?php echo $masp;?>&gia=<?php echo $gia?>&vitri=sanpham.php?masp=<?php echo $masp;?>">Thêm giỏ hàng</a></span></div><!-- Viết J-->
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php var_dump($_SESSION); ?>
				
				<span id="txtHint"></span></p>
			</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div><!-- Mô tả -->
	    				
	</div>

	

				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="#">Mobile Phones</a></li>
				      <li><a href="#">Desktop</a></li>
				      <li><a href="#">Laptop</a></li>
				      <li><a href="#">Accessories</a></li>
				      <li><a href="#">Software</a></li>
				       <li><a href="#">Sports & Fitness</a></li>
				       <li><a href="#">Footwear</a></li>
				       <li><a href="#">Jewellery</a></li>
				       <li><a href="#">Clothing</a></li>
				       <li><a href="#">Home Decor & Kitchen</a></li>
				       <li><a href="#">Beauty & Healthcare</a></li>
				       <li><a href="#">Toys, Kids & Babies</a></li>
    				</ul>
    				<div class="subscribe">
    					<h2>Newsletters Signup</h2>
    						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
						    <div class="signup">
							    <form>
							    	<input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
							    </form>
						    </div>
      				</div>
      				 <div class="community-poll">
      				 	<h2>Community POll</h2>
      				 	<p>What is the main reason for you to purchase products online?</p>
      				 	<div class="poll">
      				 		<form>
      				 			<ul>
									<li>
									<input type="radio" name="vote" class="radio" value="1">
									<span class="label"><label>More convenient shipping and delivery </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="2">
									<span class="label"><label for="vote_2">Lower price</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="3">
									<span class="label"><label for="vote_3">Bigger choice</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="5">
									<span class="label"><label for="vote_5">Payments security </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="6">
									<span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="7">
									<span class="label"><label for="vote_7">Other.</label></span>
									</li>
									</ul>
      				 		</form>
      				 	</div>
      				 </div>
 				</div>
 		</div>
 	</div>
	</div>
</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#"><span>Advanced Search</span></a></li>
						<li><a href="#">Orders and Returns</a></li>
						<li><a href="#"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="faq.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html"><span>Site Map</span></a></li>
						<li><a href="preview-2.html"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="faq.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>&copy; 2013 Shop Destin. All Rights Reserved | Design by <a href="http://w3layouts.com">W3Layouts</a> </p>
		   </div>
     </div>
    </div>
</body>
</html>

 