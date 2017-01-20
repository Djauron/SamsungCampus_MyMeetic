<!DOCTYPE html>
<html>
<head>
	<title>confirmation</title>
	<link href="vues/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	<link href="vues/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<body>
		<?php include_once 'header.php'; ?>
		<div>
			<p id="confirmation_affiche"><?php echo $affiche; ?></p>
			<p id="se_connecter"><a href="index.php?page=connexion">Se connecter</a></p>
		</div>
	</body>
</html>