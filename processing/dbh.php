<?php
// Login system
$conn = mysqli_connect('magusskirmish.ddns.net', 'Gameinstance', 'usABKcOrvjYLuvyt', 'loginsys','3306');

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
