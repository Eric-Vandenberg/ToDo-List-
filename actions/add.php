<?php
require_once('connect.php');
$time = strtotime($_POST['date']);
$query = "INSERT INTO todo_items (title, timestamp, details) VALUES ('$_POST[title]', $time, '$_POST[details]')";
$todos = mysqli_query($con, $query);


 ?>