<!DOCTYPE html>
<head>
	<title>Magus Skirmish Project</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- <div class="site"> -->
	<div id="Headline">
		<p>Kitöltés</p>
	</div>
	<div id="Login">
	<?php
		session_start();
		if (isset($_SESSION['userId'])) {
			echo '<form action="processing/logout.php" method="post">
				<button type="submit">Logout</button>
			</form>';
		}
		else {
			echo '
			<div class="login-cred">
				<form action="processing/login.php" method="post">
				<input type="text" name="mailuid" placeholder="Username/E-mail...">
				<input type="current-password" name="pwd" placeholder="Password">
				<button type="submit" name="login-submit">Login</button>
				<a href="signup.php">Signup</a>
			</form>
			</div>';
		}
	?>
	</div>
	<div id="game">
		<?php
		require_once 'processing/Adatbazis.php';
		require_once 'processing/engine.php';
		$item_id;
		$adatbazis_helyben = new adatbazis_david();
		$result = $adatbazis_helyben -> adatkeres("SELECT * FROM `map1`");
		require_once 'processing/process_map.php';
			echo "<table>";
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
	</div>
	<div id="status">
		<div id="unit-avatar">
			<button class="unit-avatar" type="button">Unit avatar</button>
		</div>
		<div id="unit-name">
			<button class="unit-name" type="button">Unit name</button>
			<button class="unit-name" type="button">Unit title</button>
		</div>
		<div id="action-buttons">
		<button class="action-buttons" type="button" onclick=send()>previous</button>
		<button class="action-buttons" type="button" onclick=reiceve()>next</button>
		<button class="action-buttons" type="button" onclick=move_action()>move</button>
		<button class="action-buttons" type="button" onclick=attack_action()>attack</button>
		<button class="action-buttons" type="button" onclick=refresh()>new</button>
		<script src="processing/core.js" defer></script>
		</div>
		<div id="unit-stats">
			<div id="unit-stats-title">
				<button class="unit-stats-title" type="button">Stats</button>
			</div>
			<div id="unit-stats-main">
				<button class="main-stats" type="button">Erő</button>
				<button class="main-stats" type="button">Int</button>
				<button class="main-stats" type="button">Szép</button>
				<button class="main-stats" type="button">Gyo</button>
				<button class="main-stats" type="button">Áll</button>
				<button class="main-stats" type="button">Aka</button>
				<button class="main-stats" type="button">Ügy</button>
				<button class="main-stats" type="button">Egé</button>
				<button class="main-stats" type="button">Aszt</button>
			</div>
			<div id="unit-stats-sec">
				<button class="sec-stats" type="button">KÉ</button>
				<button class="sec-stats" type="button">CÉ</button>
				<button class="sec-stats" type="button">TÉ</button>
				<button class="sec-stats" type="button">ÉP</button>
				<button class="sec-stats" type="button">VÉ</button>
				<button class="sec-stats" type="button">FP</button>
			</div>
		</div>
	</div>

	<div id="gamephase">M.A.G.U.S. skirmish ALPHA 001</div>
	<div id="footer">Lábléc</div>
</body>
