<?php
require_once("db.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ComputerTech - Historique des commandes</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/logo.ico" type="image/x-icon">
</head>

<body class="body">
    <div id="main">
        <?php
        require_once("header.php");
        ?>

        <?php
        if (isset($_SESSION["identite"]))
        {
            $resultCommandes = mysqli_query($conn, "SELECT * FROM commandes WHERE commandes.id_utilisateurs = " . $_SESSION["identite"] . " ORDER BY id DESC");
            $commandes = mysqli_fetch_array($resultCommandes);

            if ($commandes != "")
            {
                while ($commandes != "")
                {
                    $resultDetail = mysqli_query($conn, "SELECT * FROM commandes_details WHERE commandes_details.id_commandes = " . $commandes["id"]);
                    $detail = mysqli_fetch_array($resultDetail);

                    echo '
        <br>
        <br>
        <br>
    
        <div class="historique_commandes_facture">
    
            <h1 style="text-align: center">- - - - ComputerTech.fr - - - -</h1>
        
            <br>
            <br>
        
            <p>N° Commande: ' . $commandes["id"] . '</p>
            <p>Commandé le: ' . $commandes["date"] . '</p>
        
            <br>
        
            <p>Prenom: ' . $commandes["prenom"] . '</p>
            <p>Nom: ' . $commandes["nom"] . '</p>
        
            <br>
        
            <p>Adresse: ' . $commandes["adresse"] . '</p>
            <p>Ville: ' . $commandes["ville"] . '</p>
            <p>Region: ' . $commandes["region"] . '</p>
            <p>Code postal: ' . $commandes["code_postal"] . '</p>
        
            <br>
            <br>
        
            <table class="historique_commandes_table">
                <tr>
                    <td style="width: 60%">
                        <p><b>Article</b></p>
                    </td>
        
                    <td style="width: 20%">
                        <p><b>Quantité</b></p>
                    </td>
        
                    <td style="width: 20%">
                        <p><b>Prix</b></p>
                    </td>
                </tr>';

                    while ($detail != "")
                    {
                        echo '
                <tr>
                    <td>
                        <p>' . $detail["titre"] . '</p>
                    </td>
        
                    <td>
                        <p>x' . $detail["quantiter"] . '</p>
                    </td>
        
                    <td>
                        <p>' . $detail["prix"] . ' €</p>
                    </td>
                </tr>';
                        $detail = mysqli_fetch_array($resultDetail);
                    }

                    echo'
                <tr>
                    <td>
                        <p><b>Total</b></p>
                    </td>
        
                    <td>
                        
                    </td>
        
                    <td>
                        <p><b>' . $commandes["prix_total"] . ' €</b></p>
                    </td>
                </tr>';

                    echo '
            </table>
        </div>
        <br>
        <br>';


                    $commandes = mysqli_fetch_array($resultCommandes);
                }
            }
            else
            {
                echo '
        <div class="pleine_page">
            <div class="centre_pleine_page">
                <h1 style="text-align: center">Vous n\'avez pas d\'ancienne commandes.</h1>
                
                <div style="text-align: center">
                    <button type="submit" class="bouton_vert" onclick="Javascript:window.document.location.href=\'index.php\';">ACHETER SUR COMPUTERTECH.FR</button>
                </div>
            </div>
        </div>';
            }
        }
        else
        {
            header("Location:connexion.php");
        }

        ?>

        <?php
        require_once("footer.php");
        ?>
    </div>
</body>

</html>