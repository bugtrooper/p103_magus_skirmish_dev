<?php
//$conn = mysqli_connect('localhost', 'root', '', 'skirmish_map_magus');
$conn1 = mysqli_connect("localhost", 'root', '', 'magus_active_instance');
if(isset($_POST['command']))
{
  //szetbontas
  $variable = mysqli_real_escape_string($conn1, $_POST['command']);
  echo "commencing command: ";
  $com_to = $variable;
  $com_what = $variable;
  $com_who = $variable;
  $com_to = substr($variable,0,-3); //take the id minus legth of action and source
  $com_what = substr($variable,-3,1); // only the action
  $com_who = substr($variable,-2,2);
  // if what = 1 move 2 attack
  $query = "SELECT 'pos' FROM 'map3_units' WHERE id = '$com_who'";
  $com_from=mysqli_query($conn1, $query);
  //query serch 'who' and extract its id
  if($com_what==1)
  {
    //move
    //original unitpos erase
    //to pos update
    $query = "SELECT 'kep' FROM 'map3_units' WHERE id = '$com_who'";
    $unit_pic=mysqli_query($conn1, $query);
    echo "unitpic="+'$unit_pic';
    $query = "UPDATE 'map3_units' SET pos= '$com_to'  WHERE id = '$com_who'";
    mysqli_query($conn1, $query);
    echo "updated map3_units positionof:"+$com_who;
    $query = "UPDATE 'map3' SET unitid= '0'  WHERE id = '$com_from'";
    mysqli_query($conn1, $query);
    $query = "UPDATE 'map3' SET unitid= '1'  WHERE id = '$com_to'";
    mysqli_query($conn1, $query);
    echo "moved unit from:"+$com_from+" to:"+$com_to;
  }
  if($com_what==2)
  {
    //attack
    //search unit a weapon data
    $query = "SELECT 'att' FROM 'map3_units' WHERE id = '$com_who'";
    $unit_att=mysqli_query($conn1, $query);
    //target health update
    $query = "SELECT 'hp' FROM 'map3_units' WHERE pos = '$com_to'";
    $target_health=mysqli_query($conn1, $query);
    $target_health=$target_health-$unit_att;
    $query = "UPDATE 'map3_units' SET hp= '$target_health'  WHERE pos = '$com_to'";
    mysqli_query($conn1, $query);
    //if die than erase from database
  }

  //javasrcipt update

  if(mysqli_query($conn1, $query))
  {
    //echo 'User Added...';
  } else
  {
    echo 'ERROR: '. mysqli_error($conn1);
  }
}
?>
