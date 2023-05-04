<?php
require_once("db.php");

$prixTotal = 0;
$nbArticle = 0;

if (isset($_SESSION["identite"])) {
    if (isset($_POST["panier_suppr"])) {
        mysqli_query($conn, "DELETE FROM paniers WHERE id = " . $_POST["panier_suppr"]);
    }

    if (isset($_POST["quantiter_update_id"])) {
        mysqli_query($conn, "UPDATE paniers SET paniers.quantiter = " . $_POST["quantiter_update_value"] . " WHERE id = " . $_POST["quantiter_update_id"]);
    }

    if (isset($_POST["validation_panier"])) {
        $prenom     = mysqli_real_escape_string($conn, $_POST["prenom"]);
        $nom        = mysqli_real_escape_string($conn, $_POST["nom"]);
        $email      = mysqli_real_escape_string($conn, $_POST["email"]);
        $telephone  = mysqli_real_escape_string($conn, $_POST["telephone"]);
        $adresse    = mysqli_real_escape_string($conn, $_POST["adresse"]);
        $ville      = mysqli_real_escape_string($conn, $_POST["ville"]);
        $region     = mysqli_real_escape_string($conn, $_POST["region"]);
        $codePostal = mysqli_real_escape_string($conn, $_POST["code_postal"]);
        $prixTotal  = mysqli_real_escape_string($conn, $_POST["prix_total"]);

        mysqli_query($conn, "INSERT INTO commandes VALUES(null, " . $_SESSION["identite"] . ", '" . date('d/m/Y') . "', '" . $prenom . "', '" . $nom . "', '" . $email . "', '" . $telephone . "', '" . $adresse . "', '" . $ville . "', '" . $region . "', " . $codePostal . ", " . $prixTotal . ")");

        $commandeId = mysqli_insert_id($conn);

        $result = mysqli_query($conn, "SELECT * FROM paniers WHERE paniers.id_utilisateurs = " . $_SESSION["identite"]);
        $row = mysqli_fetch_array($result);

        while ($row != "") {
            $resultArticles = mysqli_query($conn, "SELECT * FROM articles WHERE articles.id = " . $row["id_articles"]);
            $article = mysqli_fetch_array($resultArticles);

            mysqli_query($conn, "INSERT INTO commandes_details VALUES(null, " . $commandeId . ", '" . $article["titre"] . "', " . $row["quantiter"] . ", " . ($article["prix"] * $row["quantiter"]) . ")");

            $row = mysqli_fetch_array($result);
        }

        mysqli_query($conn, "DELETE FROM paniers WHERE id_utilisateurs = " . $_SESSION["identite"]);

        header("Location:historique_commandes.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link href="css/style.css" rel="stylesheet">

    <script>
        function augmenterQuantiter(bouton, form_id) {
            var input = bouton.previousElementSibling;
            var value = parseInt(input.value, 10) + 1;
            input.value = value;

            submitForm(form_id);
        }

        function diminuerQuantiter(bouton, form_id) {
            var input = bouton.nextElementSibling;
            var value = parseInt(input.value, 10) - 1;
            if (value > 0) {
                input.value = value;

                submitForm(form_id);
            }
        }

        function submitForm(form_id) {
            var form = document.getElementById(form_id);
            form.submit();
        }
    </script>

</head>

<body class="body">

    <div id="main">

        <?php
        require_once("header.php");
        ?>

        <?php

        $panierVide = false;

        if (isset($_SESSION["identite"])) {
            $sql = "SELECT * FROM paniers WHERE paniers.id_utilisateurs = " . $_SESSION["identite"];

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);

            if ($row != "") {
                $userData = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM utilisateurs WHERE utilisateurs.id = " . $_SESSION["identite"]));

                echo '    <div class="panier_fond">
                                  <div class="panier_border">
                                  <br>
                                  <h1 style="color: white">Produits</h1>';

                while ($row != "") {
                    $sqlArticle = "SELECT * FROM articles WHERE articles.id = " . $row["id_articles"];

                    $article = mysqli_query($conn, $sqlArticle);

                    $article = mysqli_fetch_array($article);

                    echo '
                            <table class="panier_table_article"  style="color: white">
                                <tr>
                                    <td>
                                        <img class="panier_image" src="images/articles/' . $article["nom"] . '-1.png"/>
                                    </td>
        
                                    <td style="width: 400px">
                                        <div class="panier_titre">' . $article["titre"] . '</div>
                                    </td>
        
                                    <td style="width: 200px">
                                        <div class="panier_prix">' . ($article["prix"] * $row["quantiter"]) . ' €</div>
                                    </td>
        
                                    <td style="width: 200px">
                                        <form action="panier.php" method="POST" id="form_' . $nbArticle . '">
                                            <div class="counter">
                                                <input type="hidden" name="quantiter_update_id" value="' . $row["id"] . '" />
                                                <span class="down" onClick=\'diminuerQuantiter(this, "form_' . $nbArticle . '")\'>-</span>
                                                <input class="counter_input" name="quantiter_update_value" type="number" value="' . $row["quantiter"] . '">
                                                <span class="up" onClick=\'augmenterQuantiter(this, "form_' . $nbArticle . '")\'>+</span>
                                            </div>
                                        </form>
                                    </td>
        
                                    <td style="width: 100px; text-align: right">
                                        <form action="panier.php" method="POST">
                                            <input name="panier_suppr" type="hidden" value="' . $row["id"] . '">
                                            <input class="bouton_rond" type="submit" value="X" />
                                        </form>
                                    </td>
                                </tr>
                            </table>';

                    $sousTotal = $sousTotal + ($article["prix"] * $row["quantiter"]);
                    $nbArticle = $nbArticle + 1;

                    $row = mysqli_fetch_array($result);

                    if ($row != "")
                        echo '<br><hr class="panier_hr"><br>';
                }

                echo '    <br>
                            </div>
                        </div>';
            } else {
                $panierVide = true;
            }
        } else {
            $panierVide = true;
        }

        if ($panierVide) {
            echo '  <div class="pleine_page">
                            <div class="centre_pleine_page">
                                <h1 style="text-align: center">Vous n\'avez pas d\'article dans le panier.</h1>
                                
                                <div style="text-align: center">
                                    <button type="submit" class="bouton_vert" onclick="Javascript:window.document.location.href=\'index.php\';">ACHETER SUR COMPUTERTECH.FR</button>
                                </div>
                            </div>
                        </div>';
        }
        ?>

        <?php

        if ($nbArticle > 0) {
            echo '<div class="panier_border">

                        <br>
                        
                        <h1>Total panier</h1>
        
                        <table style="width: 100%; line-height: 0px;">
                            <tr>
                                <td>
                                    <h3>Sous-total</h3>
                                </td>
        
                                <td style="text-align: right">
                                    <h3>' . $sousTotal . ' €</h3>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <h3>Expédition</h3>
                                </td>
        
                                <td style="text-align: right">
                                    <h3>9.99 €</h3>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <h3>Total estimé</h3>
                                </td>
        
                                <td style="text-align: right">
                                    <h3>' . ($sousTotal + 9.99) . ' €</h3>
                                </td>
                            </tr>
                        </table>
                        
                        <br>
                        <hr>
                        <br>
                        
                        <h1>Détails de facturation</h1>
                        
                        <form action="panier.php" method="POST">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <label class="panier_label">Prénom</label><br>
                                        <input class="panier_input" type="text" name="prenom" value="' . $userData["prenom"] . '"/>
                                    </td>
                                    
                                    <td style="width: 5%;"></td>
                                    
                                    <td>
                                        <label class="panier_label">Nom</label><br>
                                        <input class="panier_input" type="text" name="nom" value="' . $userData["nom"] . '"/>
                                    </td>
                                </tr>
                            </table>
                            
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <label class="panier_label">Adresse e-mail</label><br>
                                        <input class="panier_input" type="text" name="email" value="' . $userData["email"] . '"/>
                                    </td>
                                    
                                    <td style="width: 5%;"></td>
                                    
                                    <td>
                                        <label class="panier_label">Téléphone</label><br>
                                        <input class="panier_input" type="text" name="telephone"/>
                                    </td>
                                </tr>
                            </table>
                                
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <label class="panier_label">Adresse</label><br>
                                        <input class="panier_input" type="text" name="adresse"/>
                                    </td>
                                </tr>
                            </table>
                                
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <label class="panier_label">Ville</label><br>
                                        <input class="panier_input" type="text" name="ville"/>
                                    </td>
                                    
                                    <td style="width: 5%;"></td>
                                    
                                    <td>
                                        <label class="panier_label">Région</label><br>
                                        <input class="panier_input" type="text" name="region"/>
                                    </td>
                                    
                                    <td style="width: 5%;"></td>
                                    
                                    <td>
                                        <label class="panier_label">Code Postal</label><br>
                                        <input class="panier_input" type="number" name="code_postal"/>
                                    </td>
                                </tr>
                            </table>
                            
                            <input name="prix_total" type="hidden" value="' . $sousTotal . '">
                            <input name="validation_panier" type="hidden" value="validation_panier">
                        
                            <br>
        
                            <div style="text-align: right">
                                <button type="submit" class="bouton_vert">VALIDER LA COMMANDE</button>
                            </div>
                        </form>
                        
                        <br>
                    </div>';
        }
        ?>

        <?php
        require_once("footer.php");
        ?>

    </div>

</body>

</html>