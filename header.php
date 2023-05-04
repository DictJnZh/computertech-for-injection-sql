<div>
    <div class="header">

        <img class="header_logo" src="images/logo.png" onclick="Javascript:window.document.location.href='index.php';" />

        <table class="header_table_categories">
            <tr>
                <td>
                    <form action="recherche.php" method="POST">
                        <input type="hidden" name="cb_pieces" id="cb_pieces" value="on">
                        <button type="submit" class="header_categories">Pièces</button>
                    </form>
                </td>
                <td>
                    <form action="recherche.php" method="POST">
                        <input type="hidden" name="cb_peripheriques" id="cb_peripheriques" value="on">
                        <button type="submit" class="header_categories">Périphériques</button>
                    </form>
                </td>
                <td>
                    <form action="recherche.php" method="POST">
                        <input type="hidden" name="cb_ordinateurs" id="cb_ordinateurs" value="on">
                        <button type="submit" class="header_categories">Ordinateurs</button>
                    </form>
                </td>
            </tr>
        </table>

        <table class="header_table_bouton">
            <tr>
                <td>
                    <form action="recherche.php" method="GET">
                        <input class="header_recherche" type="text" name="recherche" placeholder="Recherche" />
                    </form>
                </td>

                <?php
                if ($_SESSION["identite"] != null) {
                    echo '
                <td>
                    <form action="connexion.php" method="POST" id="decoForm">
                        <img class="header_bouton" src="css/deconnexion.png" onclick="Javascript:window.document.getElementById(\'decoForm\').submit();"/>
                        <input name="deconnexion" type="hidden">
                    </form>
                </td>';/*
                
                <td>
                    <img class="header_bouton" src="css/user.png" onclick="Javascript:window.document.location.href=\'profil.php\';"/>
                </td>';*/
                } else {
                    echo '
                <td>
                    <img class="header_bouton" src="css/user.png" onclick="Javascript:window.document.location.href=\'connexion.php\';"/>
                </td>';
                }
                ?>



                <td>
                    <img class="header_bouton" src="css/cadie.png" onclick="Javascript:window.document.location.href='panier.php';" />
                </td>

            </tr>
        </table>
    </div>

    <?php
    if ($_SESSION["identite"] != null) {
        $sql =  "SELECT utilisateurs.prenom FROM utilisateurs WHERE utilisateurs.id = " . $_SESSION["identite"];

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        $nom = $user["prenom"];

        echo    "<div class='header_connexion' id='connecte'>
                    <p class='header_connexion_nom'> Bonjour, <b>" . $nom . "</b></p>
                </div>";
    } else {
        echo    "<div class='header_connexion' id='connecte'>
                    <a class='header_connexion_lien' href='connexion.php'><b>Connexion</b></a>
                    <b class='header_connexion_lien'> / </b>
                    <a class='header_connexion_lien' href='inscription.php'><b>Inscription</b></a>
                </div>";
    }
    ?>

    <div class="header_espace"></div>
</div>