<?php
try
{
    // On se connecte à MySQL
    $pdo = new PDO('pgsql:host=ec2-54-83-35-31.compute-1.amazonaws.com;dbname=deiqj4kis49amj;', 'zepzolwjgevsfz', '503aabf5507c93f4e13cc2c8e41ab9a22706e49df453744a3769d34c892754f0');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$query = 'INSERT INTO categories (nom, description) VALUES (?, ?);';
$prep = $pdo->prepare($query);
 
$prep->bindValue(1, 'Tran', PDO::PARAM_STR);
$prep->bindValue(2, 'ceci est un test pour desc', PDO::PARAM_STR);
$prep->execute();
$resultat = $pdo->query('SELECT * FROM categories');
while ($donnees = $resultat->fetch())
{
  echo '<br/>';
  echo $donnees['nom'];
  echo ' : ';
  echo $donnees['description'];
}
