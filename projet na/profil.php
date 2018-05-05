<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ece_links', 'root', '');


   if(isset($_POST['submit_r']))
{
         header("Location: reseau.php?id=".$_SESSION['id']);
   }

      if(isset($_POST['submit_n']))
{
         header("Location: notifications.php?id=".$_SESSION['id']);
   }

      if(isset($_POST['submit_e']))
{
         header("Location: emplois.php?id=".$_SESSION['id']);
   }
         if(isset($_POST['submit_m']))
{
         header("Location: messages.php?id=".$_SESSION['id']);
   }
         if(isset($_POST['submit_v']))
{
         header("Location: vous.php?id=".$_SESSION['id']);
   }


if(isset($_GET['id']) AND $_GET['id'] > 0)
{

   $getid=intval($_GET['id']);
   $requser = $bdd ->prepare('SELECT * FROM utilisateur WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

$id =$_GET["id"];
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
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <img src="img/ece_logo.png">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Accueil</a></li>
            <li><a href="<?php echo "profil.php?id=".$id.""?>">Profil</a></li>
            <li><a href="<?php echo "emploi.php?id=".$id.""?>">Emploi</a></li>
            <li><a href="<?php echo "messages.php?id=".$id.""?>">Messages</a></li>
            <li><a href="<?php echo "reseau.php?id=".$id.""?>">Reseau</a></li>
            <li><a href="<?php echo "notifications.php?id=".$id.""?>">Notifications</a></li>
            <li><a href="<?php echo "vous.php?id=".$id.""?>">Vous</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscrivez-vous</a></li>
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> connexion</a></li>
        </ul>

    </div>
 </nav>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
  <h1>Bienvenue sur ECE-LINK !</h1>
</div>
</div>
<div class ="row">
  
  <div class="col-lg-8">
  <p>Bienvenue <?php echo $userinfo['prenom']; ?> <?php echo $userinfo['nom']; ?> Vous avez accés a toutes les notifications de vos contacts ici.<br>N'hesitez pas a utiliser la barre de recherche afin d'affiner votre recherche.</p>
  <input type="text" name="recherche" id="recherche"  size=50" placeholder="Recherche"/> </td>
  </div>
</div>
  

</br>
</br>

<footer> 
  <p> Copyright &copy; 2018 ECE-LINK<br /> </p>
  <a href="mailto:pierre.lukaszewicz@edu.ece.fr">pierre.lukaszewicz@edu.ece.fr</a>
  <a href="mailto:nail.ali-khodja@edu.ece.fr">nail.ali-khodja@edu.ece.fr</a>
  <a href="mailto:charles.baillet@edu.ece.fr">charles.baillet@edu.ece.fr</a>
</footer>

</body>
</html>
<?php
}
?>