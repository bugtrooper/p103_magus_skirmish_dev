<head>
	<title>Magus Skirmish Project</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="site">
	<div class="green" id="Headline">
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
				<input type="password" name="pwd" placeholder="Password">
			</div>
			<div class="login-buttons">
				<button type="submit" name="login-submit">Login</button>
			  <a href="signup.php">Signup</a>
			</div>
			</form>'
			;

		}
	?>
	</div>



<!-- <div id="body"> -->
	<div class="red" id="game">
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
	<div class="blue" id="gombok">
		<button type="button" onclick=send()>previous</button>
		<button type="button" onclick=reiceve()>next</button>
		<button type="button" onclick=move_action()>move</button>
		<button type="button" onclick=attack_action()>attack</button>
		<button type="button" onclick=refresh()>new</button>
		<script src="core.js" defer></script>
	</div>
	<div class="purple" id="gamephase">M.A.G.U.S. skirmish ALPHA 001</div>
</div>
</body>
