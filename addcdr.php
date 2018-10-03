<?php require_once ("dbconnection.php");
	$ppid="";
	$adresse="";
$horaire="";
$horaire_img="";
	$equipement="";
		$camera="";
				$capteur_vol="";
		$capteur_porte="";


		if(isset($_GET['ppid'])){
			$ppid = $_GET['ppid'];
			$sqlLoader="Select from cdrs where id=?";
			$resLoader=$db->prepare($sqlLoader);
			$resLoader->execute(array($ppid));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajouter une site</title>
<style>
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
	background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
	background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	capteur_volrsor:pointer;
	color:#777777;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
	background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
	background-color:#dfdfdf;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>
</head>
<?php
	$sqladd="Select * from cdrs where id=?";
	$resadd=$db->prepare($sqladd);
	$resadd->execute(array($ppid));
		while($rowadd = $resadd->fetch(PDO::FETCH_ASSOC)){
		$pnum=$rowadd['id'];
		$adresse=$rowadd['adresse'];
		$horaire=$rowadd['horaire'];
		$horaire_img=$rowadd['horaire_img'];
		$equipement=$rowadd['equipement'];
		$cameras=$rowadd['cameras'];
			$capteur_vol=$rowadd['capteur_vol'];
$capteur_porte=$rowadd['capteur_porte'];


	}
?>
    <form method="post" name="frmStudent" action="savecdr.php">
    <input type="hidden" name="pid" value="<?php echo $ppid; ?>"/>
        <table>
            <tr><td>adresse:</td><td><input type="text" name="adresse" size="200"  required="required" value="<?php echo $adresse; ?>"/></td></tr>
            <tr><td>horaire:</td><td><input type="text" name="horaire" size="200"   value="<?php echo $horaire; ?>"/></td></tr>
            <tr><td>horaire_img:</td><td><input type="text"name="horaire_img" size="200"  value="<?php echo $horaire_img; ?>"/></td></tr>
						<tr><td>equipement:</td><td><input type="text" name="equipement" size="200"   value="<?php echo $equipement; ?>"/></td></tr>
								<tr><td>camera:</td><td><input type="text" name="cameras" size="200"  value="<?php echo $cameras; ?>"/></td></tr>
										<tr><td>capteur_vol:</td><td><input type="text" name="capteur_vol" size="200"  value="<?php echo $capteur_vol; ?>"/></td></tr>
<tr><td>capteur_porte:</td><td><input type="text" name="capteur_porte" size="200"   value="<?php echo $capteur_porte; ?>"/></td></tr>

        </table>
				<br>
				<br>
				<center><input type="submit" class="myButton" value="Sauvegarder"/></center>
    </form>
<body>
</body>
</html>
