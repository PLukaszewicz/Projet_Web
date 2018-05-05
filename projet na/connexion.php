<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ece_links', 'root', '');

if(isset($_POST['formconnexion']))
{
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   if(!empty($mailconnect) AND !empty($pseudoconnect))
   {
      $requser =$bdd->prepare("SELECT * FROM utilisateur WHERE mail = ? AND pseudo = ?");
      $requser->execute(array($mailconnect, $pseudoconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1)
      {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil.php?id=".$_SESSION['id']);

      }
      else
      {
         $erreur= "Mauvais mail ou pseudo";
      }
   }
   else
   {
      $erreur = "Tout les champs doivent etre remplis !";
   }

}


?>

<html lang="fr">
<head>
    <title>ECE Links</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel = "stylesheet" type="text/css" href="css/index.css">

    
</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <img src="img/ece_logo.png">
            </a>
        </div>
        <!--<ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Accueil</a></li>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="jobs.html">Emploi</a></li>
            <li><a href="messenger.html">Messages</a></li>
            <li><a href="network.html">Reseau</a></li>
            <li><a href="notification.html">Notifications</a></li>
            <li><a href="vous.html">Vous</a></li>
        </ul>-->

        <ul class="nav navbar-nav navbar-right">
            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscrivez-vous</a></li>
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> connexion</a></li>
        </ul>

    </div>
</nav>
   <body>
      <div class="row">
         <div class="col-lg-4"></div>
         <div class="col-lg-8">
         <p>Connexion à ECE links</p>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-2"></div>
         <div class="col-lg-6">
            <form method="POST" action="" class="well">
               <input type="email" name="mailconnect" placeholder="Mail" />
               <input type="text" name="pseudoconnect" placeholder="Pseudo" />
               <input type="submit" name="formconnexion" placeholder="Se connecter !" value ="Se connecter !"/>
            </form>
         </div>
         <div class="col-lg-2"></div>
      </div>
      <div class="row">
         <div class="col-lg-2"></div>
         <div class="col-lg-10">
         <p>pas encore inscrit? Cliquez <a href="inscription.php"> ici</a> pour vous inscrire gratuitement !</p>
         </div>
      </div>
      <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
   </body>
</html>