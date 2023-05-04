<?php
require_once("db.php");
?>

<?php
$_SESSION["identite"] = null;

if ($_POST != null)
{
    if (isset($_POST["email"]) && isset($_POST["mdp"]))
    {
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];

        $mdp = md5($mdp);

        $email= mysqli_real_escape_string($conn, $email);
        $mdp= mysqli_real_escape_string($conn, $mdp);

        $sql = "SELECT utilisateurs.id FROM utilisateurs where email = '" . $email . "' and mdp = '" . $mdp . "'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if ($row == null)
        {
            $_SESSION["erreur"] = true;
        }
        else
        {
            $_SESSION["identite"] = $row["id"];
            header("Location:index.php");
        }
    }

    if (isset($_POST["deconnexion"]))
    {
        header("Location:index.php");
    }

    /*require('ReCaptcha/autoload.php');
    if(isset($_POST['submitpost'])) {
        if(isset($_POST['g-recaptcha-response'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha('6LcaX1cbAAAAABtVPkCdLSNQGyC4vWLdC6SO09lx');
            $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
            if ($resp->isSuccess()) {
                var_dump('Captcha Valide');
            } else {
                $errors = $resp->getErrorCodes();
                var_dump('Captcha Invalide');
                var_dump($errors);
            }
        } else {
            var_dump('Captcha non rempli');
        }
    }*/
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ComputerTech - Connexion</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="images/logo.ico" type="image/x-icon">
        <script type="text/javascript" src="javascript.js"></script>
        <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    </head>

    <body class="body">

        <div class="background_image_connexion"></div>

        <div id="main">

            <img class="header_logo" src="images/logo.png" onclick="Javascript:window.document.location.href='index.php';"/>

            <div class="inscr_conn_center">
                <div class="inscr_conn_table">
                    <div class="titres">Se connecter à ComputerTech</div>

                    <br>

                    <form action="connexion.php" method="POST">
                        <p>
                            <input class="input_connexion" type="text" name="email" placeholder="Adresse e-mail" />
                        </p>
                        <p>
                            <input class="input_connexion" type="password" name="mdp" placeholder="Mot de passe" />
                        </p>

                        <!--<div class="g-recaptcha" data-sitekey="6LcaX1cbAAAAAEE6AL5arWGgbZ4p_sxor3vJSnlj"></div>-->

                        <br>
                        <hr>
                        <br>

                        <p>
                            <input class="bouton_vert" type="submit" value="CONNEXION"/>
                        </p>
                    </form>

                    <form action="inscription.php">
                        <p>
                            <button class="bouton_gris" type="submit">ENREGISTRER UN NOUVEAU COMPTE</button>
                        </p>
                    </form>
                </div>
            </div>

            <?php
            require_once("footer.php");
            ?>

        </div>
    </body>
</html>