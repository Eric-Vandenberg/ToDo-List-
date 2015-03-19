<?php 
require_once('connect.php');
$output = [];
$items_to_delete = implode(',',$_POST['data_id']); 
$query = "DELETE FROM todo_items WHERE ID IN ($items_to_delete)";

$resultDeleted = mysqli_query($con, $query);

if( mysqli_affected_rows($con)> 0) {
	$output['success']=true;
	$output['message']="File deleted successfully!";

}
else 
{
	$output['success']=false;
	$output['message']="Failed to delete items";
}


echo json_encode($output);

?>