<?php
error_reporting(0);
	include ("dbconnection.php");

	$id=$_POST['pid'];
	$Num=$_POST['Num'];
	$Codification=$_POST['Codification'];
	$NS=$_POST['NS'];
	$ETAT=$_POST['ETAT'];





	if($id==null){
			$sql="INSERT INTO radio(Num,Codification,NS)values(:Num,:Codification,:NS)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':Num'=>$Num,':Codification'=>$Codification,':NS'=>$NS, ':ETAT'=>$ETAT));
	}else{
			$sql="UPDATE radio SET Num=?, Codification=?, NS=?, ETAT=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($Num,$Codification,$NS,$ETAT,$id));
	}

	echo "<script language='javascript' type='text/javascript'>alert('Mise à jour ok!!!');</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('radio.php','_self')</script>";

?>
