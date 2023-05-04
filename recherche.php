<?php
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ComputerTech - Recherche</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="images/logo.ico" type="image/x-icon">
    </head>

    <body class="body">
        <div id="main">

            <?php
            require_once("header.php");
            ?>

            <?php

            $recherche = "";
            $compteur = 0;

            $sql = "SELECT * FROM articles";

            if ($_GET["recherche"] != null)
            {
                $recherche = mysqli_real_escape_string($conn, $_GET["recherche"]);

                echo "<h1 style='text-align: center'>Résultats pour '" . $_GET["recherche"] . "' :</h1>";
            }

            $sql .= " WHERE articles.titre LIKE '%" . $recherche . "%'";

            $prix_min = $_POST["prix_min"];
            if ($prix_min != null)
                $sql .= " AND prix >= " . $prix_min;

            $prix_max = $_POST["prix_max"];
            if ($prix_max != null)
                $sql .= " AND prix <= " . $prix_max;

            $categories = array();
            $sql_cb = "";

            $result = mysqli_query($conn, "SELECT * FROM categories");
            $row = mysqli_fetch_array($result);

            while ($row != "")
            {
                $categories[$row["nom"]] = $row;

                if ($_POST["cb_" . $row["nom"]] == "on")
                {
                    if ($sql_cb == "")
                        $sql_cb .= " AND (";
                    else
                        $sql_cb .= " OR";

                    $sql_cb .= " articles.id_categories = " . $row["id"];
                }

                $row = mysqli_fetch_array($result);
            }

            if ($sql_cb != "")
            {
                $sql_cb .= " )";
                $sql .= $sql_cb;
            }

            $tri = $_POST["tri"];
            if ($tri == "decroissant")
                $sql .= " ORDER BY articles.prix DESC";
            else if ($tri == "alphabetique")
                $sql .= " ORDER BY articles.titre";
            else
                $sql .= " ORDER BY articles.prix";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            ?>

            <table>
                <tr>
                    <td style="width: 20%">
                        <div class="recherche_table">

                            <form method="POST" style="padding: 5%;" action="
                            <?php
                            if (isset($_GET["recherche"]))
                            {
                                if ($_GET["recherche"] != null)
                                    echo "recherche.php?recherche=" . $_GET["recherche"];
                                else
                                    echo "recherche.php";
                            }
                            else
                                echo "recherche.php";
                            ?>">

                                <h1 style="text-align: center; font-size: 25px">Options de recherche</h1>

                                <label>Trier par</label><br>
                                <select name="tri" class="recherche_input" style="width: 100%">
                                    <option value="croissant" <?php if ($tri != "decroissant" && $tri != "alphabetique") echo 'selected="selected"' ?>>Prix croissant</option>
                                    <option value="decroissant" <?php if ($tri == "decroissant") echo 'selected="selected"' ?>>Prix décroissant</option>
                                    <option value="alphabetique" <?php if ($tri == "alphabetique") echo 'selected="selected"' ?>>Ordre alphabétique</option>
                                </select>

                                <br>
                                <br>

                                <table style="text-align: start;">
                                    <tr>
                                        <td style="width: 50%">
                                            <label>Prix Minimum</label>
                                            <input class="recherche_input" name="prix_min" type="number" placeholder="-" value="<?php echo $prix_min ?>"/>
                                        </td>

                                        <td style="width: 50%;">
                                            <label>Prix Maximum</label>
                                            <input class="recherche_input" name="prix_max" type="number" placeholder="-" value="<?php echo $prix_max ?>"/>
                                        </td>
                                    </tr>
                                </table>

                                <br>

                                <label>Catégories :</label>
                                <table style="text-align: start;">

                                    <?php

                                    foreach ($categories as $category)
                                    {
                                        $str = '
                                    <tr>
                                        <td>
                                            <input class="recherche_input_checkbox" name="cb_' . $category["nom"] . '" id="cb_' . $category["nom"] . '" type="checkbox" ';

                                        if ($_POST["cb_" . $category["nom"]] == "on") $str .= 'checked';

                                        $str .= '/>
                                            <label for="cb_' . $category["nom"] . '" style="width: 100%; text-align: center; position: relative; top: -6px;">' . $category["titre"] . '</label>
                                        </td>
                                    </tr>';

                                        echo $str;
                                    }

                                    ?>
                                </table>

                                <br>

                                <input class="recherche_filtrer" type="submit" value="FILTRER">
                            </form>
                        </div>
                    </td>

                    <td>
                        <?php

                        $noResult = true;

                        if ($row != "")
                        {
                            $noResult = false;

                            echo '<div class="index_wrapper">';

                            while ($row != "")
                            {
                                echo "<div class='index_articles'>";
                                echo "<a class='recherche_a' href='article.php?article=" . $row["nom"] . "'>";
                                echo    "<img class='recherche_image' src='images/articles/" . $row["nom"] . "-1.png'/>";
                                echo    "<h1 class='recherche_titre'>" . $row["titre"] . "</h1>";
                                echo "</a>";
                                echo    "<h1 class='recherche_prix'>" . $row["prix"] . " €</h1>";
                                echo "</div>";
                                $row = mysqli_fetch_array($result);
                                $compteur += 1;
                            }

                            echo '</div>';
                            echo "Il y a" . $compteur . "article";
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <?php

            if ($noResult)
            {
                echo '  <div class="pleine_page">
                            <div class="centre_pleine_page">
                                <h1 style="text-align: center;">Aucun resultat ne correspond a votre recherche.</h1>
                            </div>
                        </div>';
            }

            ?>

            <br>
            <br>
            <br>

            <?php
            require_once("footer.php");
            ?>

        </div>

    </body>
</html>