<?php require_once ("dbconnection.php");
	$ppid="";
	$Codification="";
	$sim="";
	$balise="";
	$telephone="";
		$IDPORT="";
			$immatriculation="";
				$statut="";
					$probleme="";
						$navigation="";
		if(isset($_GET['ppid'])){
			$ppid = $_GET['ppid'];
			$sqlLoader="Select from carte_sims where id=?";
			$resLoader=$db->prepare($sqlLoader);
			$resLoader->execute(array($ppid));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Sample</title>
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
	cursor:pointer;
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
	$sqladd="Select * from carte_sims where id=?";
	$resadd=$db->prepare($sqladd);
	$resadd->execute(array($ppid));
		while($rowadd = $resadd->fetch(PDO::FETCH_ASSOC)){
		$pnum=$rowadd['id'];
		$Codification=$rowadd['Codification'];
		$sim=$rowadd['sim'];
		$balise=$rowadd['balise'];
		$telephone=$rowadd['telephone'];
		$IDPORT=$rowadd['IDPORT'];
			$immatriculation=$rowadd['immatriculation'];
				$statut=$rowadd['statut'];
					$probleme=$rowadd['probleme'];
						$navigation=$rowadd['navigation'];
	}
?>
    <form method="post" name="frmStudent" action="savesim.php">
    <input type="hidden" name="pid" value="<?php echo $ppid; ?>"/>
        <table>
            <tr><td>Codification:</td><td><input type="text" name="Codification" required="required" value="<?php echo $Codification; ?>"/></td></tr>
            <tr><td>sim:</td><td><input type="text" name="sim"  value="<?php echo $sim; ?>"/></td></tr>
            <tr><td>balise:</td><td><input type="text" name="balise"  value="<?php echo $balise; ?>"/></td></tr>
            <tr><td>telephone:</td><td><input type="text" name="telephone" value="<?php echo $telephone; ?>"/></td></tr>
  <tr><td>IDPORT:</td><td><input type="text" name="IDPORT" value="<?php echo $IDPORT; ?>"/></td></tr>
	  <tr><td>immatriculation:</td><td><input type="text" name="immatriculation" value="<?php echo $immatriculation; ?>"/></td></tr>
		  <tr><td>statut:</td><td><input type="text" name="statut" value="<?php echo $statut; ?>"/></td></tr>
	  <tr><td>probleme:</td><td><input type="text" name="probleme" value="<?php echo $probleme; ?>"/></td></tr>
	  <tr><td>navigation:</td><td><input type="text" name="navigation" value="<?php echo $navigation; ?>"/></td></tr>

        </table>
				<br>
				<br>
				<center><input type="submit" class="myButton" value="Sauvegarder"/></center>
    </form>
<body>
</body>
</html>
