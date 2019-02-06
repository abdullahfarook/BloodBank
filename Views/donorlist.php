<?php
include_once("../includes/db.php");
if(empty($_GET['blood'])&&empty($_GET['city'])){
	$query = "SELECT * FROM donors";
	global $db;
	$result = $db->prepare($query);
	$result->execute();
}
else
{
	$blood = $_GET['blood'];
	$city = $_GET['city'];
	if(($blood=="Blood")&&($city=="City"))
	{
		header("Location:../index.php?err=" . urlencode("You mst select Blood and City for Searching"));
	}
	$query = "SELECT * FROM donors AS d WHERE d.Blood=? AND d.City=?";
	global $db;
	$result = $db->prepare($query);
	$result->execute(array($blood,$city));
}

$results = $result->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>
	<meta />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="../css/stylesheet.css" rel="stylesheet" type="text/css" />
	<link href="../css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<script src="../js/prefixfree.min.js"></script>
</head>
<body>
	<div id="header-container">

		<!-- menu contains divs of logo and navigation bar -->
		<div class="header">
			<div class="header-menu">
				<div id="logo">
					<h2 style="border-bottom:5px solid darkred;">
						<span class="fa fa-heartbeat red"></span>Blood Bank
					</h2>
					<p style=" margin-left: 4px;">Management System</p>
				</div>
				<div class="login-menu">
					<div class='preload login--container'>
						<div class='login--username-container'>
							<label>
								<span class="fa fa-user-o">
									Username
							</label>
							<input autofocus placeholder='Username' type='text' />
						</div>
						<div class='login--password-container'>
							<label>
								<span class="fa fa-key">
									Password
							</label>
							<input placeholder='Password' type='password' />
							<button class='js-toggle-login login--login-submit'>Login</button>
						</div>
						<div class='login--toggle-container'>
							<div class='js-toggle-login'>Login</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar">
			<nav class="displayed" id="navlinks">
				<ul>
					<li>
						<a href="../index.php">
							<span class="fa fa-home"></span>Home
						</a>
					</li>
					<li>
						<a href="donorlist.html">Donors List</a>
					</li>
					<li>
						<a href="related.html">Related</a>
					</li>
					<li>
						<a href="eligibilty.html">Eligibility</a>
					</li>
					<li>
						<a href="About us.html">About us</a>
					</li>
					<li>
						<a href="Contact us.html">Contact us</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>




	<div class="container">

		<div class="calendar-container">

			<header class="notice-header">
				<div class="logo-container">
					<h1>
						<span class="fa fa-heartbeat fa-5x"></span>
					</h1>

				</div>
				<div class="uni-title">
					<p>
						Donor Participents list @ Blood Bank
					</p>
				</div>
				<div class="day-header">
					<div class="day">18</div>
					<div class="month">August</div>
					<div class="title">
						&nbsp &nbsp &nbsp &nbsp &nbspBlood Donation Day
					</div>

				</div>





			</header>

		<form method="get" action="profile.php">
			<table class="tbody" name="table">

				<thead>

					<tr>

						<td>No.</td>
						<td>Name</td>
						<td>Age</td>
						<td>City</td>
						<td>&nbsp &nbsp Phone Number &nbsp &nbsp</td>
						<td>Blood Group</td>
						<td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Email &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
						<td>Username</td>
					</tr>

				</thead>

				<tbody>

                    <?php
					foreach($results as $row)
					{

						echo"<tr class=\"cell1\">";
						echo"<td ><a name=\"{$row['id']}\"></a>{$row['id']}</td>";
						echo"<td>{$row['name']}</td>";
						echo"<td>{$row['age']}</td>";
						echo"<td>{$row['city']}</td>";
						echo"<td>{$row['number']}</td>";
						echo"<td>{$row['blood']}</td>";
							echo"<td>{$row['email']}</td>";

							echo"<td><button type=\"submit\" name=\"id\"  value=\"{$row['id']}\" >View</button></td>";
							echo"</tr>";

						}
                    ?>
				   
				</tbody>

			</table>
		</form>
			
		</div><!-- end calendar-container -->

	</div><!-- end container -->
	<div class="clear" style="height: 3px;"></div>
	<div class="footer-container">
		Copyright &copy Blood Bank
		<br />
		Designed By: Sadia Ijaz & Abdullah Farooq
	</div>

	<script src="../js/jquery-3.1.1.js"></script>
	<script src="../js/index.js"></script>

</body>
</html>
