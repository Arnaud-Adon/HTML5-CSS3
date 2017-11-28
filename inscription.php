
<!Doctype>
<html>
    <head>
        <title>S'inscrire</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/style-sign.css">
    </head>
    <body id="sign-content">
            <div id="form-content">
                <h1>Formulaire d'inscription</h1>           

                <form action="#" method="post">
                    <div id="form-sign">
                        <h4>Votre Login*</h4>
                        <input type="text" name="login_register" width="100" size="40" placeholder="Entrer votre pseudo">
                        <h4>Votre Mot de passe*</h4>
                        <input type="password" name="password_register" size="40" placeholder="Entrer votre mot de passe">
                        <input type="password" name="confirm_password_register" size="40" placeholder="Confirmer votre met de passe">
                        <input type="radio" name="sexe" value="Masculain"><input type="radio" name="sexe" value="Feminin">
                        <input type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
    </body>
</html>

<?php
session_start();

if (isset($_POST['login_register']) && isset($_POST['password_register'])) {
    if ($file = fopen('Register.csv', 'a+')) {
        $login = array();
        while ($result = fgetcsv($file, null, ';')) {
            $login[] = $result[0];
        }
        if (in_array($_POST['login_register'], $login)) {
            echo 'Le login existe deja';
        } else {
            fputcsv($file, $_POST, ';');
            //echo 'Bienvenue '.$_POST['login_register'];
            $_SESSION['login'] = $_POST['login_register'];
            //$_SESSION['password']=$_POST['password_register'];
            header('Location:index.php');
        }
    }
    fclose($file);
}
?>