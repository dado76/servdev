<?php
error_reporting(0);
	include ("dbconnection.php");

	$id=$_POST['pid'];

	$adresse=$_POST['adresse'];
	$horaire=$_POST['horaire'];
	$horaire_img=$_POST['horaire_img'];
	$equipement=$_POST['equipement'];
	$cameras=$_POST['cameras'];
	$capteur_vol=$_POST['capteur_vol'];
	$capteur_porte=$_POST['capteur_porte'];

	if($id==null){
			$sql="INSERT INTO cdrs(adresse,horaire,horaire_img,equipement,cameras,capteur_vol,capteur_porte)values(:adresse,:horaire,:horaire_img,:equipement,:cameras,:capteur_vol,:capteur_porte)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':adresse'=>$adresse,':horaire'=>$horaire,':horaire_img'=>$horaire_img,':equipement'=>$equipement,':cameras'=>$cameras,':capteur_vol=?'=>$capteur_vol,':capteur_porte=?'=>$capteur_porte));
	}else{
			$sql="UPDATE cdrs SET adresse=?, horaire=?, horaire_img=?, equipement=?, cameras=?, capteur_vol=?, capteur_porte=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($adresse,$horaire,$horaire_img,$equipement,$cameras,$capteur_vol,$capteur_porte,$id));
	}

	echo "<script language='javascript' type='text/javascript'>alert('Mise à jour ok!!!');</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('cdr.php','_self')</script>";

?>
