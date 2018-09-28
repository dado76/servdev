<?php
error_reporting(0);
	include ("dbconnection.php");

	$id=$_POST['pid'];

	$Codification=$_POST['Codification'];
	$Secteur=$_POST['Secteur'];
	$Cuabge=$_POST['Cubage'];
	$PTAC=$_POST['PTAC'];
	$PV=$_POST['PV'];
	$CU=$_POST['CU'];


	if($id==null){
			$sql="INSERT INTO bom(Codification,Secteur,Cubage,PTAC,PV,CU)values(:Codification,:Secteur,:Cubage,:PTAC,:PV,:CU)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':Codification'=>$Codification,':Secteur'=>$Secteur,':Cubage'=>$Cubage,':PTAC'=>$PTAC,':PV'=>$PV,':CU'=>$CU));
	}else{
			$sql="UPDATE bom SET Codification=?, Secteur=?, Cubage=?, PTAC=?, PV=?, CU=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($Codification,$Secteur,$Cubage,$PTAC,$PV,$CU,$id));
	}

	echo "<script language='javascript' type='text/javascript'>alert('Mise à jour ok!!!');</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('bom.php','_self')</script>";

?>
