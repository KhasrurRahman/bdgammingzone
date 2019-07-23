<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'game');

$input = filter_input_array(INPUT_POST);

$p1_kill = mysqli_real_escape_string($connect, $input["k1"]);
$p2_kill = mysqli_real_escape_string($connect, $input["k2"]);
$p3_kill = mysqli_real_escape_string($connect, $input["k3"]);
$p4_kill = mysqli_real_escape_string($connect, $input["k4"]);

if($input["action"] === 'edit')
{




 $query = "
 UPDATE results 
 SET k1 = '".$p1_kill."', 
 k2 = '".$p2_kill."', 
 k3 = '".$p3_kill."', 
 k4 = '".$p4_kill."',
 w1 = '".($p1_kill*5)."',
 w2 = '".($p1_kill*5)."',
 w3 = '".($p1_kill*5)."',
 w4 = '".($p1_kill*5)."',
 total_kill = '".($p1_kill+$p2_kill+$p3_kill+$p4_kill)."',
 total_win = '".(($p1_kill+$p2_kill+$p3_kill+$p4_kill)*250)."'
 WHERE participants_id = '".$input["id"]."'
 ";



 $query2 = "
 UPDATE accounts 
 SET
 win_amount = 'total_win'

 WHERE `accounts`.`user_id` = `user`.`user_id`
 ";



 mysqli_query($connect, $query);

}
// if($input["action"] === 'delete')
// {
//  $query = "
//  DELETE FROM tbl_user 
//  WHERE id = '".$input["id"]."'
//  ";
//  mysqli_query($connect, $query);
// }

echo json_encode($input);

?>
