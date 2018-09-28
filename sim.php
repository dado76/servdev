<?php require_once ("dbconnection.php");
	$pnum="";
	$Codification="";
	$sim="";
	$balise="";
	$telephone="";
		if(isset($_GET['ppid'])){
			$ppid = $_GET['ppid'];
			$sqlLoader="Select from carte_sims where id=?";
			$resLoader=$db->prepare($sqlLoader);
			$resLoader->execute(array($ppid));
			while($rowLoader = $resLoader->fetch(PDO::FETCH_ASSOC)){
				$pnum=$rowLoader['id'];
				$Codification=$rowLoader['Codification'];
				$sim=$rowLoader['sim'];
				$balise=$rowLoader['balise'];
				$telephone=$rowLoader['telephone'];


				$IDPORT=$rowLoader['IDPORT'];
				$immatriculation=$rowLoader['immatriculation'];
				$statut=$rowLoader['statut'];


				$probleme=$rowLoader['probleme'];
				$navigation=$rowLoader['navigation'];

			}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Sample</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="fancybox/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="fancybox/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".fancybox").fancybox();
});
</script>
    <style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table_jui.css";
			@import "css/jquery-ui-1.8.4.custom.css";
		</style>
<script src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
				oTable = jQuery('#tbl').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
								} );
				});
		</script>
<style>
#myButton {
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
#myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
	background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
	background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
	background-color:#dfdfdf;
}
#myButton:active {
	position:relative;
	top:1px;
}
</style>

</head>
<br>
<?php include("menut.php")?>
<center><a href="addsim.php" id="myButton" class="fancybox fancybox.ajax"><i class="fa fa-plus"><br></i><br> Ajouter</a>
<a href="simExport.php" id="myButton"><i class="fa fa-file-excel-o"><br></i><br> Excel</a>
<a href="simExport.php" id="myButton"  class="fancybox fancybox.ajax" onclick="javascript:window.print()"><i class="fa fa-print"><br></i><br>Imprimer</a>




</center>
<br/><br/>
<?php
					$sql="Select * from carte_sims";
					$res=$db->prepare($sql);
					$res->execute();
					$str="<div class='demo_jui'><table cellpadding='0' cellspacing='0' border='0' class='display' id='tbl' class='jtable'>";
					$str.="<thead><tr><th>ID</th><th>Codification</th><th>sim</th><th>balise</th><th>telephone</th><th>IDPORT</th><th>immatriculation</th><th>statut</th><th>probleme</th><th>navigation</th><th>Action</th></tr></thead><tbody>";
						while($row = $res->fetch(PDO::FETCH_ASSOC)){
							$str.="<tr><td><center>".$row['id']."</center></td>";
							$str.="<td>".$row['Codification']."</td>";
							$str.="<td>".$row['sim']."</td>";
							$str.="<td>".$row['balise']."</td>";
							$str.="<td>".$row['telephone']."</td>";
							$str.="<td>".$row['IDPORT']."</td>";


							$str.="<td>".$row['immatriculation']."</td>";
							$str.="<td>".$row['statut']."</td>";
							$str.="<td>".$row['probleme']."</td>";
								$str.="<td>".$row['navigation']."</td>";
							$str.="<td><center><a class='fancybox fancybox.ajax' href='addsim.php?ppid=".$row['id']."' onclick='return update()'><img src = 'images/edit-icon.png' height='30' width='30' alt = 'edit' title = 'edit'/></a><a href='delsim.php?pid=".$row['id']."' onclick='return bura()' ><img src = 'images/edit_delete.png' height='30' width='30' alt = 'delete' title = 'delete'/></a></center></td></tr>";
						}
						echo $str;
						echo "</tbody></table></div>";
                ?>


</body>
</html>
