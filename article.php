<?php
require_once("db.php");
?>

<?php

if (isset($_GET)) {
    $article = $_GET["article"];

    $article = mysqli_real_escape_string($conn, $article);

    $sql = "SELECT * FROM articles where nom = '" . $article . "'";

    $result = mysqli_query($conn, $sql);
    $article_data = mysqli_fetch_array($result);

    if ($article_data == null) {
        header("Location:index.php");
    }

    if (isset($_POST)) {
        if (isset($_POST["commentaire"])) {
            if (isset($_SESSION["identite"])) {
                $note = 0;
                $titre = $_POST["titre"];
                $commentaire = $_POST["commentaire"];
                $commentaire = mysqli_real_escape_string($conn, $article);
                $sql = "INSERT INTO avis VALUES (NULL, " . $note . ", '" . $titre . "', '" . $_POST["commentaire"] . "', " . $_SESSION["identite"] . ", " . $article_data["id"] . ")";
                mysqli_query($conn, $sql);
            } else {
                header("Location:connexion.php");
            }
        }

        if (isset($_POST["commentaire_suppr"])) {
            if (isset($_SESSION["identite"])) {
                mysqli_query($conn, "DELETE FROM avis WHERE id = " . $_POST["commentaire_suppr"]);
            } else {
                header("Location:connexion.php");
            }
        }

        if (isset($_POST["panier"])) {
            if (isset($_SESSION["identite"])) {
                $quantiter = 1;

                $result = mysqli_query($conn, "SELECT * FROM paniers WHERE paniers.id_utilisateurs = " . $_SESSION["identite"] . " AND paniers.id_articles = " . $article_data["id"]);
                $row = mysqli_fetch_array($result);

                if ($row != "") {
                    mysqli_query($conn, "UPDATE paniers SET quantiter = " . ($row["quantiter"] + 1) . " WHERE id = " . $row["id"]);
                } else {
                    mysqli_query($conn, "INSERT INTO paniers VALUES (NULL, " . $quantiter . ", " . $_SESSION["identite"] . ", " . $article_data["id"] . ")");
                }
            } else {
                header("Location:connexion.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ComputerTech - Article</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/logo.ico" type="image/x-icon">
    <script type="text/javascript" src="javascript.js"></script>
</head>

<body class="body">
    <div id="main">

        <?php
        require_once("header.php");
        ?>

        <div class="article_haut">
            <table class="article_table">
                <tr>
                    <td style="text-align: center">
                        <img class="article_image" id="image" src="images/articles/<?php echo $article_data["nom"] ?>-1.png" />

                        <table class="article_table_image_mini">
                            <tr>
                                <?php

                                if ($article_data["images"] > 1) {
                                    for ($i = 0; $i < $article_data["images"]; $i++) {
                                        echo '
                                                <td>
                                                    <img class="article_image_mini" id="miniImage' . ($i + 1) . '" src="images/articles/' . $article_data["nom"] . '-' . ($i + 1) . '.png"/>
                                                </td>';
                                    }
                                }

                                ?>
                            </tr>
                        </table>

                    </td>

                    <td>
                        <div class="article_infos">
                            <div class="article_background">
                                <h1 class="article_titre"><?php echo $article_data["titre"] ?></h1>
                                <h1 class="article_prix"><?php echo $article_data["prix"] ?> €</h1>

                                <p class="article_liste"><?php echo $article_data["liste"] ?></p>

                                <hr>
                                <br>

                                <form action="article.php?article=<?php echo $article; ?>" method="POST">
                                    <input type="hidden" name="panier" id="panier" value="panier">

                                    <div style="text-align: center">
                                        <button type="submit" class="bouton_vert">AJOUTER AU PANIER</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
            </table>
        </div>

        <div class="article_bas">
            <div class="article_background">
                <h1 class="article_titre">Description</h1>
                <p><?php echo $article_data["description"] ?></p>

                <hr>

                <h1 class="article_titre">Avis</h1>

                <div>
                    <form action="article.php?article=<?php echo $article; ?>" method="POST">

                        <input class="article_avis_texte_titre" type="text" name="titre" id="titre" placeholder="Entrez un titre" maxlength="2000"></input>

                        <br>

                        <textarea class="article_avis_texte_ecrire" type="text" name="commentaire" id="commentaire" placeholder="Entrez un commentaire" maxlength="2000"></textarea>

                        <div class="article_commentaire_submit">
                            <input class="bouton_vert" type="submit" value="ENVOYER" />
                        </div>
                    </form>
                </div>

                <div>
                    <?php
                    $sql = "SELECT * FROM avis WHERE avis.id_articles = " . $article_data["id"];

                    $result = mysqli_query($conn, $sql);

                    $avis = mysqli_fetch_array($result);

                    while ($avis["commentaire"] != null) {
                        $result2 = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE id = " . $avis["id_utilisateurs"]);

                        $utilisateur = mysqli_fetch_array($result2);

                        echo '<br><div class="article_avis">
                                    <table class="article_avis_table">
                                        <tr>
                                            <td>
                                                <div class="article_avis_titre">' . $avis["titre"] . '</div>
            
                                                <div class="article_avis_poste">Posté par <i>' . $utilisateur["prenom"] . '</i></div>
                                            </td>
            
                                            <td class="article_avis_table_suppr">
                                                ';

                        if ($avis["id_utilisateurs"] == $_SESSION["identite"]) {
                            echo '<form action="article.php?article=' . $article . '" method="POST">
                                        <input name="commentaire_suppr" type="hidden" value="' . $avis["id"] . '">
                                        <input class="article_avis_suppr" type="submit" value="SUPPRIMER" />
                                    </form>';
                        }

                        echo            '</td>
                                        </tr>
                                    </table>
            
                                    <div class="article_avis_texte">' . $avis["commentaire"] . '</div>
                                </div>';

                        $avis = mysqli_fetch_array($result);
                    }
                    ?>
                </div>
            </div>
        </div>

        <br>
        <br>

        <?php
        require_once("footer.php");
        ?>

    </div>
</body>


<script>
    image = document.getElementById("image");

    <?php

    if ($article_data["images"] > 1) {
        for ($i = 0; $i < $article_data["images"]; $i++) {
            echo 'var miniImage' . ($i + 1) . ' = document.getElementById("miniImage' . ($i + 1) . '"); ';
            echo 'miniImage' . ($i + 1) . '.addEventListener("mouseover", mouseOver); ';
        }
    }

    ?>

    function mouseOver() {
        image.src = this.src;
    }
</script>

</html>