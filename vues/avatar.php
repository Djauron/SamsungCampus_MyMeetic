<div class="profile_avatar">
	<img class="avatar" src="<?php echo 'avatars/'.$_SESSION['id'] ?>">
	<form method="post" action="profile.php" enctype="multipart/form-data">
	     <input type="file" name="avatar" id="avatar" />
	     
	
	<?php 
		if(isset($_FILES['avatar']))
		{
			$nom = "/var/www/html/projects/Projet_Web_my_weblog/avatars/".$_SESSION['id'];
			$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$nom);
		}

	?>
	
</div>