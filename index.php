<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>EssaiBDD</title>

</head>

<!-- //fonction interrogation BDD // -->
<?php
function interrBdd($requete)
{
    try {
        $bdd = new PDO('mysql:host=localhost:3308;dbname=agence immo la manu;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query($requete);
    return $reponse;
}
?>

<body>
    <h1 class="text-center mb-3"> Agence Immo La Manu</h1>
    <div class="container d-flex ">
        <div class="row w-100 justify-content-between">
            <div class="col-sm-3 bg-dark mt-3 text-white">
                <h2>Rendez-vous</h2>

                <?php 
                    $reponse= interrBdd("SELECT  rdv.RDV, creneauHoraire, NomClient, bienimmo.type FROM rdv 
                                            JOIN clients ON rdv.ID_client = clients.ID_client
                                            JOIN bienimmo ON rdv.ID_bien = bienimmo.ID_bien 
                                            WHERE RDV = '2020-02-14'");
                    while ($donnees = $reponse->fetch()) {
                        
                        
                        echo $donnees['RDV']; 
                        ?>
                        <br />
                        avec Monsieur et Madame 
                        <?php 
                            echo $donnees['NomClient']; 
                        ?>
                        <br /> 
                        <?php 
                            echo $donnees['creneauHoraire']; 
                        ?>
                        <br />
                        <em> pour visite 
                        <?php 
                            echo $donnees['type']; 
                        ?>
                        <br /></em>
                        <?php
                    }
                    ?>
            </div>
            <div class="col-sm-3 bg-secondary mt-3 text-white">
               <h2>Clients </h2>
            </div>
            <div class="col-sm-3 bg-info text-white mt-3">
              <h2>  Liste des biens</2>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>