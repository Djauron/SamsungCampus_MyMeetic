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

	<div class="search_profile">
		<p>Rechercher un utilisateur</p>
		<form method="post">
			<input class="user_search" type="text" name="user_search" value="<?php if(isset($_POST['user_search']))echo $_POST['user_search']; ?>">
			<input class="user_submit" type=image alt="logo d'une loupe" src="vues/images/loupe.png"/>
		</form>
	</div>

	<h1 class="titreprofil"> PROFILE </h1>
	<div class="profile">

		<?php if($info_membre == true){?>
		<div class="profile_avatar">
			<img class="avatar" src="<?php echo $info_membre['avatar'] ?>" alt="Avatar">
			
			<?php if($info_membre['id'] == $_SESSION['id']){ ?>
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="avatar" id="avatar"/>
				<input class="send_img" type="submit" name="submit" value="Envoyer" />
			</form>
			<?php } ?>

		</div>
		<?php } ?>

		<?php if($info_membre == true){?>
		<form method="post">
			<table>
				<tr>
					<td>Pseudo</td>
					<td><?php echo $info_membre['pseudo'];?></td>
				</tr>

				<tr>
					<td>Nom</td>
					<td>

						<?php if($_SESSION['id'] == $info_membre['id']){ ?>
						<input type="text" name="nom" value="<?php echo $info_membre['nom'] ?>">
						<?php } ?>

						<?php if($_SESSION['id'] != $info_membre['id']){
							echo $info_membre['nom'];}?>
					</td>
				</tr>

				<tr>
					<td>Prenom</td>
					<td>
						<?php if($_SESSION['id'] == $info_membre['id']){ ?>
						<input type="text" name="prenom" value="<?php echo $info_membre['prenom'] ?>">
						<?php } ?>
						<?php if($_SESSION['id'] != $info_membre['id']){
							echo $info_membre['prenom'];}?>
					</td>
				</tr>

				<tr>
					<td>Email</td>
					<td><?php echo $info_membre['email'] ?></td>
				</tr>

				<tr>
					<td>Date de naissance</td>
					<td>
						<?php if($_SESSION['id'] == $info_membre['id']){ ?>
						<input type="text" class="form-control" name="date" placeholder="AAAA-MM-JJ" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="<?php echo $info_membre['date_naissance']; ?>">
						<?php } ?>
						<?php if($_SESSION['id'] != $info_membre['id']){ 
							echo $info_membre['date_naissance'];
						}
						?>
					</td>
				</tr>

				<?php if($_SESSION['id'] == $info_membre['id']){ ?>
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
				<?php } ?>

			</table>

			<?php if($_SESSION['id'] == $info_membre['id']){ ?>
			<input class="send_info" type="submit" name="submit_info" value="Envoyer" />
			<?php } ?>
		</form>

		<?php } else{?>
		<p>Aucun utilisateur avec ce pseudo</p>
		<?php } ?>
	</div>
</body>
</html>