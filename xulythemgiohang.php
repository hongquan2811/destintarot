<?php
session_start();
if(!isset($_SESSION['id']))
{
$masp = $_REQUEST["masp"];
$gia = $_REQUEST["gia"];
$_SESSION['dssp']["$masp"]['gia']=$gia;
if(!isset($_SESSION['dssp']["$masp"]['luong']))
$_SESSION['dssp']["$masp"]['luong']=1;
else
$_SESSION['dssp']["$masp"]['luong']+=1;
}
if (isset($_REQUEST['vitri'])) {
	$vitri=$_REQUEST['vitri'];
	header("Location: $vitri");
}
else
 header('Location: index.php');

