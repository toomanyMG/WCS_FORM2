<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thanks</title>
</head>

<body>
    <header>
        Merci <?php echo ($_POST['firstname']) ?> <?php echo ($_POST['lastname']) ?> de nous avoir contacté à propos de “<?php echo ($_POST['subject']) ?>”.

        Un de nos conseiller vous contactera soit à l’adresse <?php echo ($_POST['email']) ?> ou par téléphone au <?php echo ($_POST['telephone']) ?> dans les plus brefs délais pour traiter votre demande :

        <?php echo ($_POST['message']) ?>
    </header>
</body>

</html>