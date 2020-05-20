<?php

// Connect to a database
$conn = mysqli_connect('magusskirmish.ddns.net', 'root', '', 'skirmish_map_magus','3306');
$conn1 = mysqli_connect('magusskirmish.ddns.net', 'root', '', 'magus_active_instance','3306');
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

if(isset($_GET['id']))
{
  $variable = mysqli_real_escape_string($conn1, $_POST['id']);
  $query = "SELECT 'unitid' FROM 'map3' WHERE id = '$id'";
  if(mysqli_query($conn1, $query))
  {
    //echo 'User Added...';
  } else
  {
    echo 'ERROR: '. mysqli_error($conn1);
  }
}
if(isset($_GET['mapunit']))
{
  $variable = mysqli_real_escape_string($conn, $_POST['id']);
  $query = "SELECT 'unitid' FROM 'map2' WHERE id = '$id'";
  if(mysqli_query($conn, $query))
  {
    //echo 'User Added...';
  } else
  {
    echo 'ERROR: '. mysqli_error($conn);
  }
}
