<?php
include_once("../includes/db.php");
if(empty($_GET['blood'])&&empty($_GET['city'])){
	$query = "SELECT * FROM donors where id=?";
	global $db;
	$result = $db->prepare($query);
	$result->execute(array($_GET["id"]));
	$data=$result->fetch();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link href="../css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/profile.css" media="screen" type="text/css" />

	<script src="../js/jquery-3.1.1.js"></script>
	
</head>
<body>
	<!-- Card widget -->
	<div class="card">

		<!-- Face 1 -->
		<div class="card-face face-1">
			<!-- Menu trigger -->

			<div class="card-face__avatar"><!-- User avatar --><i class="fa fa-user-circle-o fa-5x" aria-hidden="true" width="110" height="110" draggable="false" ></i></div><!-- Name -->
			<h2 class="card-face__name"><?php echo$data["name"] ?></h2><!-- Title --><span class="card-face__title">City: <?php echo$data["city"] ?></span><!-- Cart Footer -->
			<div class="card-face-footer">
			<div>
				<button class="notification1"><?php echo$data["blood"] ?></button>
			</div>
				<div id="response-ajax">
					<button id="btn">Notify</button>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/profile.js"></script>
</body>
</html>