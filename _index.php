<meta charset="utf-8">
<style>
table {
	border: "0";
	border-style: none;
	cellspacing="0";
	cellpadding="0";
	border-collapse: collapse;
	border-spacing: 0px;
}

table, td {
	font-size: "0";
	border: "0";
	border-collapse: collapse;
	height: 30px;
	width: 30px;
	cellspacing="0";
	padding-top: 1px;
	padding-right: 1px;
	padding-bottom: 1px;
	padding-left: 1px;
	border-spacing: 0px;
}
</style>
<body>
<?php
require_once './Adatbazis.php';
$item_id;
$adatbazis_helyben = new adatbazis_david();
$result = $adatbazis_helyben -> adatkeres("SELECT * FROM `map1`");
require_once '../Adatbazis.php';
	echo "M.A.G.U.S. skirmish ALPHA 001";
	echo "<table><br>";
	for($j=1;$j<10;$j++)
	{
		echo "<tr>";
		for($i=1;$i<10;$i++)
		{
			$k=$j*1000;
			$k=$k+$i;
			echo "<td onclick="."selection(".$k.") id=".$k."><img src="."yellow.png"."></th><br>";
		}
		echo "</tr>";
	}
	echo "</table><br>"	;
?>
<button type="button" onclick="send">Submit</button><button type="button" onclick="reiceve">Retrieve</button>
</body>
<script src="core.js" defer></script>
