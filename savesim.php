<?php
error_reporting(0);
	include ("dbconnection.php");

	$id=$_POST['pid'];

	$Codification=$_POST['Codification'];
	$sim=$_POST['sim'];
	$balise=$_POST['balise'];
	$telephone=$_POST['telephone'];
	$IDPORT=$_POST['IDPORT'];
		$immatriculation=$_POST['immatriculation'];
			$statut=$_POST['statut'];
				$probleme=$_POST['probleme'];
					$navigation=$_POST['navigation'];



	if($id==null){
			$sql="INSERT INTO Carte_sims(Codification,sim,balise,telephone,IDPORT,immatriculation,statut,probleme,navigation)values(:Codification,:sim,:balise,:telephone,:IDPORT,:immatriculation,:statut,:probleme,:navigation)";
			$qry=$db->prepare($sql);
			$qry->execute(array(':Codification'=>$Codification,':sim'=>$sim,':balise'=>$balise,':telephone'=>$telephone,':IDPORT'=>$IDPORT,':immatriculation'=>$immatriculation,':statut'=>$statut,':probleme'=>$probleme,':navigation'=>$navigation));
	}else{
			$sql="UPDATE Carte_sims SET Codification=?, sim=?, balise=?, telephone=?, IDPORT=?, immatriculation=?, statut=?, probleme=?, navigation=? where id=?";
			$qry=$db->prepare($sql);
			$qry->execute(array($Codification,$sim,$balise,$telephone,$IDPORT,$immatriculation,$statut,$probleme,$navigation,$id));
	}

	echo "<script language='javascript' type='text/javascript'>alert('Mise à jour ok!!!');</script>";
	echo "<script language='javascript' type='text/javascript'>window.open('balise.php','_self')</script>";

?>
