<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="vues/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="vues/bootstrap/dist/js/bootstrap.min.js"></script>
	<link href="vues/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body id="body_panel">
	<?php require_once 'header.php' ?>
	<h1 class="titreprofil"> PROFILE </h1>
	<div class="profile">
		<div class="profile_avatar">
			<form id="supprimer_compte" method="post">
				<input type="submit" name="supprimer_compte" value="Supprimer mon compte">
			</form>
			<img class="avatar" src="<?php echo $info_membre['avatar'] ?>" alt="Avatar">
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="avatar" id="avatar"/>
				<input class="send_img" type="submit" name="submit" value="Envoyer" />
			</form>
		</div>
		<form method="post">
			<table>
				<tr>
					<td>Pseudo</td>
					<td><?php echo $info_membre['pseudo'];?></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td>
						<input type="text" name="nom" value="<?php echo $info_membre['nom'] ?>">
					</td>
				</tr>
				<tr>
					<td>Prenom</td>
					<td>
						<input type="text" name="prenom" value="<?php echo $info_membre['prenom'] ?>">
					</td>
				</tr>
				<tr>
					<td>Sexe</td>
					<td><?php echo $info_membre['sexe'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" name="mail" value="<?php echo $info_membre['email'] ?>">
					</td>
				</tr>
				<tr>
					<td>Pays</td>
					<td>
						<input type="text" name="pays" value="<?php echo $info_membre['pays'] ?>">
					</td>
				</tr>
				<tr>
					<td>Ville</td>
					<td>
						<input type="text" name="ville" value="<?php echo $info_membre['ville'] ?>">
					</td>
				</tr>
				<tr>
					<td>Region</td>
					<td>
						<input type="text" name="region" value="<?php echo $info_membre['region'] ?>">
					</tr>
				<tr>
					<td>Departement</td>
					<td>
						<input type="text" name="departement" value="<?php echo $info_membre['departement'] ?>">
					</td>
				</tr>		
				<tr>
					<td>Date de naissance</td>
					<td>
						<input type="text" class="form-control" name="date" placeholder="AAAA-MM-JJ" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo $info_membre['date_naissance']; ?>">
					</td>
				</tr>
				<tr>
					<td>Ancien mot de passe</td>
					<td><input type="password" class="form-control" name="ancien_mdp" placeholder="<?php if(isset($mauv_mdp)){echo $mauv_mdp;}else{echo 'votre ancien mdp'; } ?>"></td>
				</tr>
				<tr>
					<td>Nouveau mot de passe</td>
					<td><input type="password" class="form-control" name="new_mdp" placeholder="votre nouveau mdp"></td>
				</tr>
				<tr>
					<td>Confirmation mot de passe</td>
					<td><input type="password" class="form-control" name="confirm_mdp" placeholder="<?php if(isset($mdp_not_eq)){echo $mdp_not_eq;}else{echo 'confirmer le mdp';} ?>"></td>
				</tr>
			</table>
			<input class="send_info" type="submit" name="submit_info" value="Envoyer" id="bouton_chg" />
		</form>
	</div>
</body>
</html>