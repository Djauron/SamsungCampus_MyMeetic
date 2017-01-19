<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">My-Meetic</a>
    </div>

    <ul class="nav navbar-nav">
      <?php 
      if(isset($_SESSION['pseudo']))
      { 
      ?> 
        <li><a href="index.php?page=profile">Mon profil</a></li>
        <li><a href="index.php?page=recherche">Rechercher</a></li>
        <?php
      }
      ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        if(!isset($_SESSION['pseudo']))
        { 
        ?>
          <li><a href="index.php?page=inscription"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
          <li><a href="index.php?page=connexion"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
        <?php 
        }
        else
        { 
        ?>
          <li><a href="index.php?page=deconnexion"><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
        <?php 
        }
        ?>
      </ul>
  </div>
</nav>