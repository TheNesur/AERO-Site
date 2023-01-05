<?php
$bdd = new PDO('mysql:host=localhost;dbname=eolia;charset=utf8;','admin','admin');
if(isset($_POST['envoie'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){

    }else{
        echo "Complétez les informations..";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" align ="center">

    <input type="text" name="pseudo" autocomplete="off">
    <br>
    <input type="password" name = "mdp" autocomplete="off">
    <br><br>
    <input type="submit" name="envoi">
    </form>
</body>
</html>