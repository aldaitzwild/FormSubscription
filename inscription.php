<?php

    $data = array_map('trim', $_POST);

    $firstname =  htmlentities($data['firstname']); 
    $lastname = htmlentities($data['lastname']); 
    $birthdate = htmlentities($data['birthdate']); 
    $login = htmlentities($data['login']); 
    $pwd = $data['pwd']; 
    $confirmationPwd = $data['cpwd']; 

    $errors = [];

    if($pwd != $confirmationPwd)
        $errors[] = 'Le mot de passe n\'est pas identique à sa confirmation';

    if(strlen($pwd) < 7)
        $errors[] = 'Le mot de passe doit faire plus de 6 caractères';

    if(empty($firstname))
        $errors[] = 'Le prénom est obligatoire';
    
    if(empty($lastname))
    $errors[] = 'Le nom est obligatoire';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription !</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        //Séparation de l'affichage KO/OK
        if(count($errors) > 0) 
        {
    ?>

    <div id="errors">
        <h2>Erreurs : </h2>
            <ul>
                <?php

                    foreach($errors as $error) {
                        echo "<li>$error</li>";
                    }

                ?>
            </ul>
    </div>

    <?php
        } else {
    ?>

    <div id="success">
            <p>
            <?php

                echo "Félicitations $firstname $lastname ! 
                vous êtes bien inscrit avec le login : $login";
            
            ?>
            </p>
    </div>

    <?php
        }
    ?>
    
</body>
</html>