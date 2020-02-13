<?php
// try {
//     $bdd = new PDO('mysql:host=localhost:3308;dbname=agence immo la manu;charset=utf8', 'root', '');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }

// $reponse = $bdd->query("SELECT  rdv.RDV, creneauHoraire, NomClient, bienimmo.type FROM rdv JOIN clients ON rdv.ID_client = clients.ID_client
// JOIN bienimmo ON rdv.ID_bien = bienimmo.ID_bien WHERE RDV = '2020-02-14'");
$reponse = interrBdd("SELECT  rdv.RDV, creneauHoraire, NomClient, bienimmo.type FROM rdv JOIN clients ON rdv.ID_client = clients.ID_client
JOIN bienimmo ON rdv.ID_bien = bienimmo.ID_bien WHERE RDV = '2020-02-14'");


while ($donnees = $reponse->fetch()) {
?>
    <p>
        <strong>rendez-vous</strong> : <?php echo $donnees['RDV']; ?><br />
        avec Monsieur et Madame : <?php echo $donnees['NomClient']; ?>, entre <?php echo $donnees['creneauHoraire']; ?> heure !<br />
        <em> pour visite <?php echo $donnees['type']; ?><br /></em>


    </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

