<?php
session_start();
if (isset($_SESSION['fufix_cc_loggedin']) && !empty($_SESSION['fufix_cc_loggedin'])) {
	$logged_in_as = $_SESSION['fufix_cc_username'];
	$logged_in_role = $_SESSION['fufix_cc_role'];
}
else {
	$logged_in_role = "";
	$logged_in_as = "";
}
require_once "inc/vars.inc.php";
$link = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
require_once "inc/functions.inc.php";
require_once "inc/triggers.inc.php";
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $MYHOSTNAME ?></title>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="css/material.min.css" rel="stylesheet">
<link href="css/ripples.min.css" rel="stylesheet">
<?php
if (basename($_SERVER['PHP_SELF']) == "mailbox.php") {
?>
<style>
.row{
margin-top:40px;
padding: 0 10px;
}
.clickable{
cursor: pointer;
}
.panel-heading div {
margin-top: -18px;
font-size: 15px;
}
.panel-heading div span{
margin-left:5px;
}
.panel-body{
display: none;
}
</style>
<?php
}
?>

</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="inc/xs_mailcow.png" /></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/rc">Webmail</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Control center<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php if (isset($_SESSION['fufix_cc_loggedin']) && $_SESSION['fufix_cc_loggedin'] == "yes") {
							if ($logged_in_role == "admin") { ?>
						<li><a href="/admin.php">Administration</a></li>
							<?php } if ($logged_in_role == "admin" || $logged_in_role == "domainadmin") { ?>
						<li><a href="/mailbox.php">Mailboxes</a></li>
						<?php } } else { ?>
						<li><a href="/admin.php">Login</a></li>
						<?php } ?>
					</ul>
				</li>
				<li class="divider"></li>
				<li>
					<a href="#" onclick="logout.submit()"><?php	if (isset($_SESSION['fufix_cc_loggedin']) && $_SESSION['fufix_cc_loggedin'] == "yes") { echo "Hello, <strong>$logged_in_as</strong> (logout)"; } ?></a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</nav>
<form action="/admin.php" method="post" id="logout"><input type="hidden" name="logout"></form>
