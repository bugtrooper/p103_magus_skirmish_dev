<?php
$conn1 = mysqli_connect("localhost", 'Gameinstance', 'usABKcOrvjYLuvyt', 'magus_active_instance','3306');
if(isset($_GET['first']))
{
    $variable = mysqli_real_escape_string($conn1, $_GET['first']);
    $query = "SELECT ke,id FROM map3_units WHERE 1";
    $result=mysqli_query($conn1, $query);
    $jsonarray= array();
    while($row = mysqli_fetch_assoc($result))
    {
      $jsonarray[]=$row;
    }
    echo $row;
    echo json_encode($jsonarray);

}
?>
