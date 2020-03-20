<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'skirmish_map_magus');

// Check for POST variable
if(isset($_POST['id']))
{
  $variable = mysqli_real_escape_string($conn, $_POST['id']);
  $id = substr($variable,0,-1);
  echo $id;
//  $newstring = substr($dynamicstring, -7);
  $terrain = substr($variable,-1);
  echo $terrain;
//  $query = "INSERT INTO `map2`(`id`) VALUES('$variable')";
  $query = "UPDATE map2 SET terrain= '$terrain'  WHERE id = '$id'";



  if(mysqli_query($conn, $query))
  {
    //echo 'User Added...';
  } else
  {
    echo 'ERROR: '. mysqli_error($conn);
  }
}

if(isset($_GET['name'])){
  //echo 'GET: Your name is '. $_GET['name'];
}
