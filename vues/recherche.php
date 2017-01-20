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
		<form method="post" class="formu_recherche">
			<P><select name="recherche_sexe">
				<option value="">Recherchez par sexe</option>
				<option value="homme">Homme</option>
				<option value="femme">Femme</option>
				<option value="autre">Autre...</option>
			</select></P>
			<P><label id="recherche_pays">Pays</label>
			<input type="text" name="recherche_pays"></p>
			<P><label id="recherche_region">Region</label>
			<input type="text" name="recherche_region"></p>
			<P><label id="recherche_departement">Departement</label>
			<input type="text" name="recherche_departement"></p>
			<P><label id="recherche_ville">Ville</label>
			<input type="text" name="recherche_ville"></p>
			<p><input type="submit" name="recherche_profil_sexe" value="Rechercher"></p>
		</form>
	</div>

	<h1 class="titreprofil"> PROFILE </h1>
	<div class="profile">
		<div>
			<form action="index.php?page=profile" method="POST">
				<table>
					<?php
					if(isset($resultat_profil))
					{
						foreach($resultat_profil as $trie_profil)
						{
							$age = (time() - strtotime($trie_profil['date_naissance'])) / 3600 / 24 / 365;
							?>
							<tr>
								<?php
								echo "<td>".$trie_profil['pseudo']."</td>";
								echo "<td>".$trie_profil['sexe']."</td>";
								echo "<td>".floor($age)."</td>";
								echo "<td><img alt='image profil' style='height:100px; width:100px;' src=".$trie_profil['avatar']."></td>";
								?>
								
									<td><button name="valid_recherche" class="buton_noir" value="<?php echo $trie_profil['id']?>">Voir profil</button></td>
							</tr>
							<?php
						}
					}
					?>
				</table>
			</form>
		</div>
		<?php if(isset($info_membre) && $info_membre == true){?>
		<form method="post">
			<table>
				<tr>
					<td>Pseudo</td>
					<td><?php echo $info_membre['pseudo'];?></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td>
						<?php echo $info_membre['nom'];?>
					</td>
				</tr>
				<tr>
					<td>Prenom</td>
					<td>
						<?php echo $info_membre['prenom'];?>
					</td>
				</tr>
				<tr>
					<td>Sexe</td>
					<td><?php echo $info_membre['sexe'];?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $info_membre['email'] ?></td>
				</tr>
				<tr>
					<td>Pays</td>
					<td>
						<?php echo $info_membre['pays'];?>
					</td>
				</tr>
				<tr>
					<td>Ville</td>
					<td>
						<?php echo $info_membre['ville'];?>
					</td>
				</tr>
				<tr>
					<td>Region</td>
					<td>
						<?php echo $info_membre['region'];?>
					</td>
				</tr>
				<tr>
					<td>Departement</td>
					<td>
						<?php echo $info_membre['departement'];?>
					</td>
				</tr>		
				<tr>
					<td>Date de naissance</td>
					<td>
						<?php echo $info_membre['date_naissance'];?>
					</td>
				</tr>

			</table>
		</form>

		<?php }
		elseif(isset($info_membre) && $info_membre == false)
		{?>
		<p>Aucun utilisateur avec ce pseudo</p>
		<?php } ?>
	</div>
</body>
</html>