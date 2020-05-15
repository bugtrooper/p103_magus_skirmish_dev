<?php
// Login system
$conn = mysqli_connect('magusskirmish.ddns.net', 'root', '', 'loginsys','3306');

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
