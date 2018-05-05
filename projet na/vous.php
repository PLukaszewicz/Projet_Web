<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ece_links', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
   $id=$id =$_GET["id"];
   $getid=intval($_GET['id']);
   $requser = $bdd ->prepare('SELECT * FROM cv WHERE ID_proprio = ?');
   $requser->execute(array($getid));
    $userexist = $requser->rowCount();
      if($userexist == 1)
      {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['ID_proprio'];
         $_SESSION['nom'] = $userinfo['CVnom'];
         $_SESSION['prenom'] = $userinfo['CVprenom'];
         $_SESSION['emploi'] = $userinfo['Emploi'];
         $_SESSION['bio'] = $userinfo['bio'];
         $_SESSION['passion'] = $userinfo['passion'];
      }
      else
      {
         header("Location: creation.php?id=".$_SESSION['id']);
      }
}
if(isset($_POST['modifier']))
{
    $id=$id =$_GET["id"];
    header("Location: vousformulaire.php?id=".$id);
}

?>


<html lang="fr">
<head>
   <title>ECE links</title>
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
      <div class="col-lg-6">La page Vous correspond à l'endroit où sont recencé vos information</div>
      <div class="col-lg-2"></div>
      <div class="col-lg-2">
         <a href="<?php echo "vousformulaire.php?id=".$id.""?>">modifier</a></li>
         </form>
         
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <table class="table table-bordered table-striped table-condensed">
         <caption>
            <h4>Vos information</h4>
         </caption>
         <thead>
            <tr>
                  <th></th>
                  <th>renseignement</th>
            </tr>
         </thead>
         <tbody>
                <tr>
                  <td>Nom</td>
                  <td><?php echo $_SESSION['nom']; ?></td>
                </tr>
                <tr>
                  <td>Prénom</td>
                  <td><?php echo $_SESSION['prenom']; ?></td>
                </tr>
                <tr>
                  <td>emploi</td>
                  <td><?php echo $_SESSION['emploi']; ?></td>
                </tr>
                <tr>
                  <td>bio</td>
                  <td><?php echo $_SESSION['bio']; ?></td>
                </tr>
                <tr>
                  <td>passion </td>
                  <td><?php echo $_SESSION['passion']; ?></td>
                </tr>
                
         </tbody>
         </table>
      </div>
   </div>
</body>
</html>