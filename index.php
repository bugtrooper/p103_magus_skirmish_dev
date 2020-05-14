<?php
	session_start();
 ?>
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
	height: 50px;
	width: 50px;
	cellspacing="0";
	padding-top: 2px;
	padding-right: 1px;
	padding-bottom: 1px;
	padding-left: 1px;
	border-spacing: 0px;
}
</style>
<body>
	<!-- Login -->

	<div>
		<?php
			if (isset($_SESSION['userId'])) {
				echo '<form action="processing/logout.php" method="post">
					<button type="submit">Logout</button>
				</form>';					
			}
			else {
				echo '<form action="processing/login.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/E-mail...">
					<input type="password" name="pwd" placeholder="Password">
					<button type="submit" name="login-submit">Login</button>
				</form>
				<a href="signup.php">Signup</a>
				<form action="logout" method="post">
					<button type="submit" name="logout-submit">Logout</button>
				</form>';
			}
		 ?>

	</div>




<?php
require_once './Adatbazis.php';
require_once './engine.php';
$item_id;
$adatbazis_helyben = new adatbazis_david();
$result = $adatbazis_helyben -> adatkeres("SELECT * FROM `map1`");
require_once './process_map.php';
	echo "M.A.G.U.S. skirmish ALPHA 001";
	echo "<table><br>";
	for($j=1;$j<10;$j++)
	{
		echo "<tr>";
		for($i=1;$i<10;$i++)
		{
			$k=$j*1000;
			$k=$k+$i;
			echo "<td onclick="."selection(".$k.") id=".$k."><img src="."./sprites/50x50_terrain_grass.png"."></th><br>";
		}
		echo "</tr>";
	}
	echo "</table><br>"	;
?>
<button type="button" onclick=send()>previous</button>
<button type="button" onclick=reiceve()>next</button>
<button type="button" onclick=move_action()>move</button>
<button type="button" onclick=attack_action()>attack</button>
<button type="button" onclick=refresh()>new</button>

</body>
<script src="core.js" defer></script>
