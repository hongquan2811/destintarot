<?php
class Sanpham extends Db{
	public function timtheoten($n)
	{
		$sql="select * from sanpham where tensp like '%$n%' ";
		return $this->select($sql);	
	}
	public function timtheoma($n)
	{
		$sql="select * from sanpham where masp = $n ";
		return $this->select($sql);	
	}
	public function duoi2t()
	{
		$sql="select * from sanpham where giasp < 200000 ";
		return $this->select($sql);	
	}
	public function duoi3t6t()
	{
		$sql="select * from sanpham where giasp >= 300000 and giasp <350000 ";
		return $this->select($sql);	
	}
}
?>