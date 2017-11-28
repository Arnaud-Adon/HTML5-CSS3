<?php
//ouverture d'une session
session_start();

//
if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($file = fopen('Register.csv', 'r')) {
        $login = array();
        $password = array();
        while ($result = fgetcsv($file, null, ';')) {
            $login[] = $result[0];
            $password[] = $result[1];
        }
        if (in_array($_POST['login'], $login)) {
            if (in_array($_POST['password'], $password)) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
            }
        } else {
            echo "Votre login ou votre mot de passe est incorrect";
        }
    }
    fclose($file);
}
?>
<!Doctype>
<html>
    <head>
        <title>TP Connexion</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>

        <header>      
            <nav>
                <marquee class="warning">URGENT : Infos</marquee>
                <?php if (isset($_SESSION['login'])) { ?> 
                    <h2>Bienvenue <?php echo $_SESSION['login'] ?></h2>
                    <a href="deconnexion.php?deco=1">Se déconnecter</a>

                    <h2>Liste des utilisateurs</h2>
                    <table border="2">
                        <thead><tr><th>Utilisateurs inscrits</th></tr></thead>
                        <tbody>
                            <?php
                            if ($file = fopen('Register.csv', 'r')) {
                                $login = array();
                                while ($result = fgetcsv($file, null, ';')) {
                                    $login[] = $result[0];
                                }
                                fclose($file);
                                foreach ($login as $pseudo) {
                                    echo '<tr><td>' . $pseudo . '</td><td><a href="modification.php?login=' . $pseudo . '">Modifier</a></td><td><a href="suppression.php?login=' . $pseudo . '">supprimer</a></td></tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <div id="sign">
                        <form action="#" method="post">
                            <table>                            
                                <tr><th><label for="login">Login</label></th><td><input id="login" type="text" name="login" width="100" size="40" placeholder="Entrer votre pseudo" value=""></td><th><label for="password">Mot de passe</label></th><td><input id="password" type="password" name="password" size="40" placeholder="Entrer votre mot de passe" value=""></td><td><input class="submit" type="submit" value="Validez"></td><td><a href="inscription.php">S'inscrire</a></td></tr><br>                                 
                            </table>
                        </form>                       
                    </div>
                </nav>
            </header>
            <?php
        }
        ?>
        <!--<div id="banniere"></div>-->
        <section>
            <article>
                <p class="ariane">Nouveauté > Articles > Lorem ipsum</p>
                <h1>Lorem ipsum</h1>
                <p><em>Par Lorem, le 27 novembre 2017</em></p>
                <img src="img/lorem.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>
            </article>
            <aside>
                <div id="pub"><img src="img/montre.jpg"></div>
                <div id="liste-article">
                    <h4>Derniers articles</h4>
                    <ul>
                        <li>Lorem</li>
                        <li>ipsum</li>
                        <li>natus</li>
                        <li>error</li>
                    </ul>
                </div>
                <div id="aside-text">
                    <h4>A propos de l'auteur</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor</p>
                </div>
            </aside>
        </section>
        <footer>
            <div id="footer-list">
                <div>
                    <dt><h3>Derniers tweets</h3></dt>
                    <dd>Dev du 95</dd>
                    <dd>Dev du 72</dd>
                    <dd>Dev du 75</dd>
                </div>
                <div>
                    <dt><h3>Plan du site</h3></dt>
                    <dd>Accueil</dd>
                    <dd>A propos</dd>
                    <dd>Inscription</dd>
                    <dd>Contact</dd>                                       
                </div>
                <div>
                    <dt></dt>
                    <ul>
                        <li><img></li>
                        <li><img></li>
                        <li><img></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div id="copyright">Arnaud Adon -  2017 | Tous droits réservés</div>
        </footer>      
        <div id="newsletter">Newsletter<input type="email" name="email" placeholder="Votre email"></div>
    </body>
</html>
