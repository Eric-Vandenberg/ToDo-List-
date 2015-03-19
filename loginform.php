<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>

    <link rel="stylesheet" href="assets/external/bootstrap/css/bootstrap.min.css">
    <script src="assets/external/jquery.min.js"></script>
    <script src="assets/external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/main.js"></script>
</head>
<body>
 	<?php include( 'includes/header.php'); ?>   
	<div class="login_form">
	    <div id="showing_name"></div>
	    <form action="login.php" method="post">
	        <input class="usrnm"type="text" name="username" placeholder="Username">
	        <input class="usrnm"type="text" name="password" placeholder="Password">
	        <button type="submit" id="usrlgn" class="btn">Login</button>
	    </form>
	</div>
	<?php include( 'includes/footer.php'); ?>
</body>
</html>